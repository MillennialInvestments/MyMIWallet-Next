<?php namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\Cache\CacheInterface;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIFinnhub
{
    protected $apiKey;
    protected $baseUrl = 'https://finnhub.io/api/v1';
    protected $client;
    protected CacheInterface $cache;

    public function __construct()
    {
        $this->apiKey = getenv('FINNHUB_API_KEY') ?? '';
        $this->client = Services::curlrequest([
            'baseURI' => $this->baseUrl,
            'timeout' => 10,
        ]);
        $this->cache = Services::cache();
    }

    /**
     * Get recent news for a specific company/ticker
     */
    public function getCompanyNews(string $symbol, string $from, string $to)
    {
        return $this->makeRequest('/company-news', [
            'symbol' => $symbol,
            'from'   => $from,
            'to'     => $to,
        ]);
    }

    /**
     * Get general news (market-wide)
     */
    public function getGeneralNews(string $category = 'general')
    {
        return $this->makeRequest('/news', [
            'category' => $category,
        ]);
    }

    /**
     * Get sentiment data for a ticker
     */
    public function getNewsSentiment(string $symbol)
    {
        return $this->makeRequest('/news-sentiment', [
            'symbol' => $symbol,
        ]);
    }

    /**
     * Latest crypto news normalized for UI consumption.
     */
    public function latestCryptoNews(int $limit = 20): array
    {
        $cacheKey = 'finnhub_crypto_news_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);

        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        try {
            $raw = $this->makeRequest('/crypto/news', ['limit' => $limit]);
            $items = [];
            foreach ($raw as $n) {
                $items[] = [
                    'id'           => $n['id'] ?? md5($n['headline'] ?? ''),
                    'title'        => $n['headline'] ?? '',
                    'url'          => $n['url'] ?? '',
                    'source'       => $n['source'] ?? '',
                    'published_at' => $n['datetime'] ?? '',
                    'tickers'      => isset($n['related']) ? explode(',', $n['related']) : [],
                    'summary'      => $n['summary'] ?? '',
                ];
            }
            $this->cache->save($cacheKeySanitized, $items, 300);
            return $items;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIFinnhub::latestCryptoNews error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Snapshot quotes for a list of symbols.
     */
    public function marketSnapshot(array $symbols): array
    {
        $cacheKey = 'finnhub_snap_' . md5(implode(',', $symbols));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);

        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $out = [];
        foreach ($symbols as $sym) {
            try {
                $out[$sym] = $this->makeRequest('/quote', ['symbol' => $sym]);
            } catch (\Throwable $e) {
                log_message('error', 'MyMIFinnhub::marketSnapshot error for {sym}: {msg}', ['sym' => $sym, 'msg' => $e->getMessage()]);
            }
        }
        $this->cache->save($cacheKeySanitized, $out, 300);
        return $out;
    }

    /**
     * Core method to send API requests
     */
    private function makeRequest(string $endpoint, array $params = [])
    {
        if (empty($this->apiKey)) {
            log_message('critical', '❌ MyMIFinnhub: API key missing.');
            return ['error' => 'API key missing'];
        }

        $params['token'] = $this->apiKey;

        try {
            $response = $this->client->get($endpoint, ['query' => $params]);
            $body     = $response->getBody();
            $decoded  = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', '❌ MyMIFinnhub: JSON decode error - ' . json_last_error_msg());
                return ['error' => 'JSON decode failed'];
            }

            return $decoded;
        } catch (\Throwable $e) {
            log_message('critical', '❌ MyMIFinnhub: Request failed - ' . $e->getMessage());
            return ['error' => 'Request failed', 'details' => $e->getMessage()];
        }
    }
}
