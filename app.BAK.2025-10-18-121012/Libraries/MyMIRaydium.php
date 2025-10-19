<?php namespace App\Libraries;


use Config\Services;

#[\AllowDynamicProperties]
class MyMIRaydium
{


    protected $apiBase;
    protected $cache;

    public function __construct()
    {
        $this->apiBase = env('RAYDIUM_API_BASE', 'https://api.raydium.io');
        $this->cache   = Services::cache();
    }

    protected function request(string $endpoint, array $params = [], string $method = 'GET'): array
    {
        $client = Services::curlrequest();
        $url = rtrim($this->apiBase, '/') . $endpoint;
        if ($method === 'GET' && $params) {
            $url .= '?' . http_build_query($params);
        }
        $options = ['timeout' => 5];
        if ($method !== 'GET') {
            $options['json'] = $params;
        }
        $response = $client->request($method, $url, $options);
        return json_decode($response->getBody(), true) ?? [];
    }

    public function getQuote(array $params): array
    {
        $data = $this->request('/v2/quote', $params);
        return [
            'inMint'  => $params['srcMint'] ?? '',
            'outMint' => $params['dstMint'] ?? '',
            'amount'  => $params['amount'] ?? '',
            'price'   => $data['price'] ?? null,
        ];
    }

    public function swap(array $params): array
    {
        $data = $this->request('/v2/swap', $params, 'POST');
        return ['txid' => $data['txid'] ?? null];
    }

    public function getPools(): array
    {
        $cacheKey = 'raydium_pools';
        $pools = $this->cache->get($cacheKey);
        if (!$pools) {
            $pools = $this->request('/v2/pools');
            $this->cache->save($cacheKey, $pools, 600);
        }
        return $pools;
    }

    public function getLiquidity(string $poolId): array
    {
        return $this->request('/v2/pools/' . $poolId);
    }

    /**
     * Retrieve top tokens (placeholder implementation).
     */
    public function topTokens(string $chain = 'solana', int $limit = 50): array
    {
        $cacheKey = 'raydium_top_' . $chain . '_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        try {
            $data = $this->request('/v2/main/coins', ['limit' => $limit]);
            $tokens = [];
            foreach ($data['data'] ?? [] as $t) {
                $tokens[] = [
                    'coin_logo'  => $t['logo'] ?? null,
                    'coin_name'  => $t['name'] ?? null,
                    'symbol'     => $t['symbol'] ?? null,
                    'coin_value' => $t['price'] ?? null,
                    'market_cap' => $t['marketCap'] ?? null,
                    'volume'     => $t['volume24h'] ?? null,
                    'website'    => $t['website'] ?? null,
                ];
            }
            $this->cache->save($cacheKeySanitized, $tokens, 120);
            return $tokens;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIRaydium::topTokens error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Token details (placeholder implementation).
     */
    public function tokenDetails(string $chain, string $mintOrId): array
    {
        $cacheKey = 'raydium_tok_' . $mintOrId;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        try {
            $t = $this->request('/v2/token/' . $mintOrId);
            $details = [
                'coin_logo'  => $t['logo'] ?? null,
                'coin_name'  => $t['name'] ?? null,
                'symbol'     => $t['symbol'] ?? null,
                'coin_value' => $t['price'] ?? null,
                'market_cap' => $t['marketCap'] ?? null,
                'volume'     => $t['volume24h'] ?? null,
                'website'    => $t['website'] ?? null,
            ];
            $this->cache->save($cacheKeySanitized, $details, 120);
            return $details;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIRaydium::tokenDetails error: ' . $e->getMessage());
            return [];
        }
    }
}
