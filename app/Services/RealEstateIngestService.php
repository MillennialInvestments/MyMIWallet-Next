<?php
namespace App\Services;

use GuzzleHttp\Client;

class RealEstateIngestService
{
  public function queue(int $id): bool { return $this->runIngest($id); }

  public function runIngest(int $id): bool
  {
    $pm = model('ProjectsModel');
    $rec = $pm->reFindIntake($id);
    if (!$rec) return false;

    $data = $rec['source']==='address' ? $this->ingestByAddress($rec) : $this->ingestByUrl((string)$rec['zillow_url']);
    if (is_array($data) && $data) {
      return $pm->reUpdateIntake($id, array_merge($data, [
        'status' => 'scraped',
        'last_scraped_at' => date('Y-m-d H:i:s'),
      ]));
    }
    return $pm->reUpdateIntake($id, ['status'=>'review']);
  }

  protected function ingestByAddress(array $rec): ?array
  {
    $raw = trim(($rec['address_line1'] ?? '') . ', ' . ($rec['city'] ?? '') . ', ' . ($rec['state'] ?? '') . ' ' . ($rec['postal_code'] ?? ''));
    if ($raw === '' || $raw === ',  ') {
        $raw = (string) ($rec['raw_input'] ?? '');
    }
    if ($raw === '') {
        return null;
    }

    $client = new Client([
        'timeout' => 8,
        'headers' => [
            'User-Agent' => 'MyMI-Wallet-RealEstate/1.0 (contact@mymiwallet.com)',
            'Accept'     => 'application/json',
        ],
    ]);

    // Tier 1: US Census Bureau Geocoding API (100% Free, Unlimited, No Key)
    try {
        $url = 'https://geocoding.geo.census.gov/geocoder/locations/onelineaddress?address='
            . urlencode($raw) . '&benchmark=Public_AR_Current&format=json';
        $res = $client->get($url);
        if ($res->getStatusCode() === 200) {
            $json = json_decode((string) $res->getBody(), true);
            $matches = $json['result']['addressMatches'] ?? [];
            if (! empty($matches[0])) {
                $m = $matches[0];
                $coords = $m['coordinates'] ?? [];
                $comp   = $m['addressComponents'] ?? [];
                return [
                    'latitude'       => (float) ($coords['y'] ?? null),
                    'longitude'      => (float) ($coords['x'] ?? null),
                    'matched_address'=> (string) ($m['matchedAddress'] ?? $raw),
                    'city'           => $comp['city'] ?? ($rec['city'] ?? null),
                    'state'          => $comp['state'] ?? ($rec['state'] ?? null),
                    'postal_code'    => $comp['zip'] ?? ($rec['postal_code'] ?? null),
                    'source_tier'    => 'us_census_geocoder',
                ];
            }
        }
    } catch (\Throwable $e) {
        log_message('notice', 'Census Geocoder fallback: {msg}', ['msg' => $e->getMessage()]);
    }

    // Tier 2: OpenStreetMap Nominatim Fallback (100% Free)
    try {
        $osmUrl = 'https://nominatim.openstreetmap.org/search?q='
            . urlencode($raw) . '&format=json&addressdetails=1&countrycodes=us&limit=1';
        $res = $client->get($osmUrl);
        if ($res->getStatusCode() === 200) {
            $json = json_decode((string) $res->getBody(), true);
            if (! empty($json[0])) {
                $item = $json[0];
                $addr = $item['address'] ?? [];
                return [
                    'latitude'       => (float) ($item['lat'] ?? null),
                    'longitude'      => (float) ($item['lon'] ?? null),
                    'matched_address'=> (string) ($item['display_name'] ?? $raw),
                    'city'           => $addr['city'] ?? ($addr['town'] ?? ($rec['city'] ?? null)),
                    'state'          => $addr['state'] ?? ($rec['state'] ?? null),
                    'postal_code'    => $addr['postcode'] ?? ($rec['postal_code'] ?? null),
                    'source_tier'    => 'osm_nominatim',
                ];
            }
        }
    } catch (\Throwable $e) {
        log_message('notice', 'Nominatim fallback: {msg}', ['msg' => $e->getMessage()]);
    }

    return [
        'latitude'       => null,
        'longitude'      => null,
        'matched_address'=> $raw,
        'source_tier'    => 'manual_entry',
    ];
  }

  protected function ingestByUrl(string $url): ?array
  {
    if (!filter_var($url, FILTER_VALIDATE_URL)) return null;
    $client = new Client(['timeout'=>12,'headers'=>[
      'User-Agent'=>'Mozilla/5.0 (compatible; MyMI/1.0)',
      'Accept'=>'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
    ]]);
    try { $html = (string)$client->get($url)->getBody(); }
    catch (\Throwable $e) { log_message('error','Listing fetch error: {e}', ['e'=>$e->getMessage()]); return null; }

    if (preg_match_all('~<script\s+type="application/ld\+json">(.*?)</script>~si',$html,$m)) {
      foreach ($m[1] as $raw) {
        $obj = json_decode(html_entity_decode($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8'), true);
        $c   = (is_array($obj) && isset($obj[0])) ? $obj : [$obj];
        foreach ($c as $o) {
          if (!is_array($o) || !isset($o['@type'])) continue;
          $addr  = $o['address']['streetAddress']   ?? null;
          $city  = $o['address']['addressLocality'] ?? null;
          $state = $o['address']['addressRegion']   ?? null;
          $zip   = $o['address']['postalCode']      ?? null;
          $beds  = $o['numberOfBedrooms']           ?? ($o['numberOfRooms'] ?? null);
          $baths = $o['numberOfBathroomsTotal']     ?? null;
          $price = $o['offers']['price']            ?? null;
          $img   = $o['image']                      ?? null;

          if ($addr || $price || $beds || $baths) {
            return [
              'address_line1'=>$addr,'city'=>$city,'state'=>$state,'postal_code'=>$zip,
              'beds'=>is_numeric($beds)?(float)$beds:null, 'baths'=>is_numeric($baths)?(float)$baths:null,
              'list_price'=>is_numeric($price)?(float)$price:null,
              'images_json'=>$img ? json_encode($img) : null,
            ];
          }
        }
      }
    }
    $host = parse_url($url, PHP_URL_HOST);
    if ($host && stripos($host, 'zillow') === false) {
      try {
        $scraper = service('MarketingScraper');
        if ($scraper && method_exists($scraper, 'extract')) {
          $ms = $scraper->extract($url);
          if (is_array($ms) && $ms) {
            $addr = [
              'address_line1' => $ms['address_line1'] ?? ($ms['address'] ?? null),
              'city'          => $ms['city'] ?? null,
              'state'         => $ms['state'] ?? null,
              'postal_code'   => $ms['postal_code'] ?? null,
            ];
            $out = [];
            if ($addr['address_line1']) {
              $out = array_merge($out, $addr);
              $addrData = $this->ingestByAddress($addr);
              if (is_array($addrData)) $out = array_merge($out, $addrData);
            }
            if (isset($ms['beds']) && is_numeric($ms['beds'])) $out['beds'] = (float)$ms['beds'];
            if (isset($ms['baths']) && is_numeric($ms['baths'])) $out['baths'] = (float)$ms['baths'];
            if (isset($ms['list_price']) && is_numeric($ms['list_price'])) $out['list_price'] = (float)$ms['list_price'];
            if (!empty($ms['images'])) $out['images_json'] = json_encode($ms['images']);
            if (!empty($ms['features'])) $out['features_json'] = json_encode($ms['features']);
            if ($out) return $out;
          }
        }
      } catch (\Throwable $e) {
        log_message('error','MarketingScraper error: {e}', ['e'=>$e->getMessage()]);
      }
    }
    return null;
  }
}
?>