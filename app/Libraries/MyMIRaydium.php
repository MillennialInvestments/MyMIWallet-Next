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
        $network = (string) ($params['network'] ?? env('SOLANA_NETWORK', 'mainnet'));
        return $this->solanaLibraryGuard('swap', $network, [
            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
            'provider' => 'raydium',
        ]);
    }

    public function getPools(): array
    {
        $cacheKey = sanitizeCacheKey('raydium_pools');
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

    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
    {
        $config = config(\Config\Solana::class);
        $network = strtolower((string) ($network ?: env('SOLANA_NETWORK', 'mainnet')));
        $isMainnet = str_contains($network, 'mainnet');
        $actionKey = strtolower($action);
        $isMint = in_array($actionKey, ['mint', 'minttokens', 'createtoken', 'createspltoken'], true);

        if (!($config->allowTransactionExecution ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Solana library transaction execution is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
            ], $extra);
        }

        if ($isMainnet && !($config->allowMainnetBroadcast ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
            ], $extra);
        }

        if ($isMainnet && $isMint && !($config->allowMainnetMint ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Mainnet Solana library minting is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
            ], $extra);
        }

        if ($config->defaultDryRun ?? true) {
            return array_merge([
                'success' => true,
                'allowed' => true,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
            ], $extra);
        }

        return [
            'success' => true,
            'allowed' => true,
            'action' => $action,
            'network' => $network,
            'dry_run' => false,
            'broadcast' => false,
            'message' => 'Solana library guard passed, but this adapter does not broadcast transactions directly.',
        ];
    }

}
