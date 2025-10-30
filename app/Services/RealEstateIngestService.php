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
    // Use free sources: geocode (Nominatim), public listing JSON-LD if discoverable.
    // Respect rate limits / robots. Best-effort; return partials when available.
    return ['latitude'=>null,'longitude'=>null];
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