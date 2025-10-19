<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Services\{JupiterService, BirdeyeService, CoinGeckoService};
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\HTTP\CURLRequest;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIMarketData
{

    protected $curl;
    protected CacheInterface $cache;
    private string $cgBase = 'https://api.coingecko.com/api/v3';

    public function __construct(?CacheInterface $cache = null)
    {
        $this->curl = service('curlrequest');
        $this->cache = $cache ?? Services::cache();
    }

    public function fetchLatestNews($symbol)
    {
        // Example API call to fetch market news
        $apiUrl = "https://api.example.com/market-news?symbol=" . $symbol;

        try {
            $response = $this->curl->get($apiUrl);
            $newsData = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException("Invalid JSON received");
            }

            return $newsData;
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch market news: ' . $e->getMessage());
            return false;
        }
    }

    public function getPriceSOLFromJupiter(string $mint): ?float
    {
        $svc = new JupiterService();
        $res = $svc->prices([$mint]);
        return $res['data'][$mint]['price'] ?? null;
    }

    public function getPriceFromBirdeye(string $address): ?float
    {
        $svc = new BirdeyeService();
        $res = $svc->price($address);
        return $res['data']['value'] ?? null;
    }

    public function getPriceDGBFromCoingecko(): ?float
    {
        $svc = new CoinGeckoService();
        $res = $svc->simplePrice(['digibyte'], ['usd']);
        return $res['digibyte']['usd'] ?? null;
    }

    public function getPriceBTCFromCoingecko(): ?float
    {
        $svc = new CoinGeckoService();
        $res = $svc->simplePrice(['bitcoin'], ['usd']);
        return $res['bitcoin']['usd'] ?? null;
    }

    public function price(string $symbol, ?string $chain = null): ?float
    {
        $symbol = strtolower($symbol);
        $cacheKey = "md_price_{$symbol}_{$chain}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if (($val = $this->cache->get($cacheKeySanitized)) !== null) {
            return $val;
        }
        $url = $this->cgBase . '/simple/price?ids=' . urlencode($symbol) . '&vs_currencies=usd';
        try {
            $json = json_decode(file_get_contents($url), true);
            $price = $json[$symbol]['usd'] ?? null;
            if ($price !== null) {
                $this->cache->save($cacheKeySanitized, $price, 300);
            }
            return $price;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketData::price failed for {sym}: {msg}', [
                'sym' => $symbol,
                'msg' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function snapshot(string $symbol, ?string $chain = null): array
    {
        $symbol = strtolower($symbol);
        $cacheKey = "md_snap_{$symbol}_{$chain}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->cgBase . '/coins/' . urlencode($symbol);
        try {
            $json = json_decode(file_get_contents($url), true);
            $result = [
                'currentPrice' => $json['market_data']['current_price']['usd'] ?? 0,
                'market_cap'   => $json['market_data']['market_cap']['usd'] ?? 0,
                'dailyVolume'  => $json['market_data']['total_volume']['usd'] ?? 0,
            ];
            $this->cache->save($cacheKeySanitized, $result, 300);
            return $result;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIMarketData::snapshot failed for {sym}: {msg}', [
                'sym' => $symbol,
                'msg' => $e->getMessage(),
            ]);
            return ['currentPrice' => 0, 'market_cap' => 0, 'dailyVolume' => 0];
        }
    }
}
