<?php namespace App\Libraries;

use App\Config\SiteSettings;

use CodeIgniter\Database\ConnectionInterface;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIDexScreener
{

    protected $apiBaseUrl = 'https://api.dexscreener.com/latest/dex/';
    protected $db;
    protected $siteSettings;
    protected $debug;
    protected $cache;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->cache = Services::cache();   
    }

    public function getDexInfo()
    {
        $getDexInfo = [];
        return $getDexInfo;
    }

    /**
     * Retrieve top tokens for a chain and normalize for UI tables.
     */
    public function topTokens(string $chain = 'solana', int $limit = 50): array
    {
        $limit = max(1, min($limit, 50));
        $cacheKey = 'dex_top_' . $chain . '_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);

        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->apiBaseUrl . 'tokens/' . $chain . '?limit=' . $limit;
        try {
            $resp = $this->sendRequest($url);
            $tokens = $resp['tokens'] ?? [];
            $normalized = [];
            foreach ($tokens as $t) {
                $normalized[] = [
                    'coin_logo'  => $t['info']['image']   ?? null,
                    'coin_name'  => $t['info']['name']    ?? null,
                    'symbol'     => $t['info']['symbol']  ?? null,
                    'coin_value' => $t['priceUsd']        ?? 0,
                    'market_cap' => $t['fdv']             ?? 0,
                    'volume'     => $t['volume']['h24']   ?? 0,
                    'website'    => $t['info']['website'] ?? null,
                ];
            }
            $this->cache->save($cacheKeySanitized, $normalized, 120);
            return $normalized;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDexScreener::topTokens failure: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Detailed token information for a given id/mint.
     */
    public function tokenDetails(string $chain, string $idOrMint): array
    {
        $cacheKey = 'dex_token_' . $chain . '_' . $idOrMint;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->apiBaseUrl . 'tokens/' . $idOrMint;
        try {
            $resp = $this->sendRequest($url);
            $t = $resp['pairs'][0] ?? [];
            $details = [
                'coin_logo'  => $t['info']['image']      ?? null,
                'coin_name'  => $t['baseToken']['name']  ?? null,
                'symbol'     => $t['baseToken']['symbol'] ?? null,
                'coin_value' => $t['priceUsd']           ?? 0,
                'market_cap' => $t['fdv']                ?? 0,
                'volume'     => $t['volume']['h24']      ?? 0,
                'website'    => $t['info']['website']    ?? null,
            ];
            $this->cache->save($cacheKeySanitized, $details, 120);
            return $details;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDexScreener::tokenDetails failure: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    public function getLiquidityPools()
    {
        $url = $this->apiBaseUrl . 'pairs';
        $response = $this->sendRequest($url);
        return $response['pairs'] ?? [];
    }
    
    public function getTokenMarketData($tokenAddress) {
        $url = $this->apiBaseUrl . 'tokens/' . $tokenAddress;
        $response = $this->sendRequest($url);
        return $response ?? null;
    }
    
    public function getAvailableTokens()
    {
        $url = 'https://raw.githubusercontent.com/solana-labs/token-list/main/src/tokens/solana.tokenlist.json';
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public function getTokenPrice($tokenAddress)
    {
        $url = $this->apiBaseUrl . 'tokens/' . $tokenAddress;
        $response = $this->sendRequest($url);
        return $response['pairs'][0]['priceUsd'] ?? null;
    }

    public function updateSolanaTokenPrices()
    {
        $tokens = $this->db->table('bf_exchanges_assets')
            ->where('blockchain', 'SOL')
            ->get()
            ->getResultArray();
        $tokenAddresses = array_column($tokens, 'coin_address');
        if ($this->debug) {
            log_message('debug', 'MyMIDexScreener - $tokenAddresses: ' . print_r($tokenAddresses, true));
        }
        $chunks = array_chunk($tokenAddresses, 10);
        foreach ($chunks as $chunk) {
            $this->updateTokenPrices($chunk);
        }
    }

    private function updateTokenPrices($tokenAddresses)
    {
        foreach ($tokenAddresses as $address) {
            $url = $this->apiBaseUrl . 'tokens/' . $address;
            if ($this->debug) {
                log_message('debug', 'MyMIDexScreener - API Request URL: ' . $url);
            }
            $response = $this->sendRequest($url);
            if ($this->debug) {
                log_message('debug', 'MyMIDexScreener - API Response: ' . print_r($response, true));
            }
            if (isset($response['pairs']) && is_array($response['pairs'])) {
                $this->updateTokenInDatabase($response['pairs'][0], $address);
            } else {
                log_message('error', 'Invalid response from API for address ' . $address . ': ' . print_r($response, true));
            }
        }
    }

    private function updateTokenInDatabase($pair, $address)
    {
        $data = [
            'dex_id' => $pair['dexId'] ?? 'N/A',
            'dex_url' => $pair['url'] ?? 'N/A',
            'dex_pair' => $pair['pairAddress'] ?? 'N/A',
            'dex_swap_name' => $pair['quoteToken']['name'] ?? 'N/A',
            'dex_swap_symbol' => $pair['quoteToken']['symbol'] ?? 'N/A',
            'dex_swap_address' => $pair['quoteToken']['address'] ?? 'N/A',
            'coin_value' => $pair['priceUsd'] ?? 0,
            'initial_value' => $pair['priceNative'] ?? 0,
            'market_cap' => $pair['liquidity']['usd'] ?? 0,
            'volume' => $pair['volume']['h24'] ?? 'N/A',
            'volume_array' => json_encode($pair['volume']) ?? 'N/A',
            'price_change' => json_encode($pair['priceChange']) ?? 'N/A',
            'liquidity' => json_encode($pair['liquidity']) ?? 'N/A',
            'fdv' => $pair['fdv'] ?? 0,
            'unix_timestamp' => $pair['pairCreatedAt'] ?? 'N/A',
        ];

        $existingData = $this->db->table('bf_exchanges_assets')
            ->select(array_keys($data))
            ->where('coin_address', $address)
            ->get()
            ->getRowArray();

        if ($existingData) {
            $updateData = [];
            foreach ($data as $key => $value) {
                if ($existingData[$key] != $value) {
                    $updateData[$key] = $value;
                }
            }

            if (!empty($updateData)) {
                $this->db->table('bf_exchanges_assets')
                    ->where('coin_address', $address)
                    ->update($updateData);
            }
            log_message('debug', 'MyMIDexScreener L114: $updateData to database array: ' . (print_r($updateData, true)));
        } else {
            log_message('error', 'Token address not found in the database: ' . $address);
        }
    }

    private function sendRequest($endpoint, $data = [], $method = 'GET')
    {
        $url = $endpoint;
        if ($this->debug) {
            log_message('debug', 'MyMIDexScreener - Request URL: ' . $url);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        }
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception('Request Error:' . curl_error($ch));
        }
        curl_close($ch);
        log_message('debug', 'MyMIDexScreener - Raw API Response: ' . $response);
        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('JSON decode error: ' . json_last_error_msg());
        }
        return $decodedResponse;
    }
}
