<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIPump {

    protected $client;
    protected $baseUri;
    protected $accessToken;
        protected string $apiBaseUrl = 'https://pump.fun/api/';
        protected $cache;

    public function __construct($baseUri, $accessToken) {
        $this->client = new Client();
        $this->baseUri = $baseUri;
        $this->accessToken = $accessToken; // Assume the access token is already obtained through OAuth
        $this->cache = Services::cache();
    }

    // Post a message to the pump.io network
    public function postMessage($content) {
        try {
            $response = $this->client->request('POST', $this->baseUri . '/api/user/nick/activity', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'verb' => 'post',
                    'object' => [
                        'objectType' => 'note',
                        'content' => $content
                    ]
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return 'Error posting message: ' . $e->getMessage();
        }
    }

    // Fetch the user's activity stream
    public function getActivityStream() {
        try {
            $response = $this->client->request('GET', $this->baseUri . '/api/user/nick/feed', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return 'Error fetching activity stream: ' . $e->getMessage();
        }
    }

    // Authentication (OAuth) -- Skeleton Method
    public function authenticate($clientId, $clientSecret, $redirectUri, $code) {
        // This method should handle the OAuth exchange; this is just a placeholder
        try {
            $response = $this->client->request('POST', $this->baseUri . '/oauth/access_token', [
                'form_params' => [
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'redirect_uri' => $redirectUri,
                    'code' => $code,
                    'grant_type' => 'authorization_code'
                ]
            ]);
            $body = json_decode($response->getBody(), true);
            $this->accessToken = $body['access_token'];
            return $body;
        } catch (GuzzleException $e) {
            return 'Error in authentication: ' . $e->getMessage();
        }
    }

    /**
     * Fetch top tokens for a chain.
     *
     * @return array<int,array{coin_logo:?string,coin_name:?string,symbol:?string,coin_value:float,market_cap:float,volume:float,website:?string}>
     */
    public function topTokens(string $chain = 'solana', int $limit = 50): array
    {
        $limit = max(1, min($limit, 50));
        $cacheKey = 'pump_top_' . $chain . '_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);

        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->apiBaseUrl . 'top/' . $chain . '?limit=' . $limit;
        try {
            $resp = $this->sendRequest($url);
            $tokens = $resp['tokens'] ?? [];
            $normalized = [];
            foreach ($tokens as $t) {
                $normalized[] = [
                    'coin_logo'  => $t['image']     ?? null,
                    'coin_name'  => $t['name']      ?? null,
                    'symbol'     => $t['symbol']    ?? null,
                    'coin_value' => $t['priceUsd']  ?? 0.0,
                    'market_cap' => $t['fdv']       ?? 0.0,
                    'volume'     => $t['volume24h'] ?? 0.0,
                    'website'    => $t['website']   ?? null,
                ];
            }
            $this->cache->save($cacheKeySanitized, $normalized, 120);
            return $normalized;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIPump::topTokens failure: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Retrieve detailed information for a token by id/mint.
     */
    public function tokenDetails(string $chain, string $idOrMint): array
    {
        $cacheKey = 'pump_token_' . $chain . '_' . $idOrMint;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->apiBaseUrl . 'token/' . $idOrMint;
        try {
            $resp = $this->sendRequest($url);
            $t = $resp['token'] ?? [];
            $details = [
                'coin_logo'  => $t['image']     ?? null,
                'coin_name'  => $t['name']      ?? null,
                'symbol'     => $t['symbol']    ?? null,
                'coin_value' => $t['priceUsd']  ?? 0.0,
                'market_cap' => $t['fdv']       ?? 0.0,
                'volume'     => $t['volume24h'] ?? 0.0,
                'website'    => $t['website']   ?? null,
            ];
            $this->cache->save($cacheKeySanitized, $details, 120);
            return $details;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIPump::tokenDetails failure: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Internal helper to perform HTTP requests with basic retries/backoff.
     */
    protected function sendRequest(string $url): array
    {
        $delay = 1;
        for ($i = 0; $i < 3; $i++) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_HTTPHEADER => ['Accept: application/json'],
            ]);
            $response = curl_exec($ch);
            $err      = curl_errno($ch) ? curl_error($ch) : null;
            curl_close($ch);
            if (!$err && $response !== false) {
                $decoded = json_decode($response, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $decoded;
                }
                $err = json_last_error_msg();
            }
            log_message('warning', 'MyMIPump request error: {msg}', ['msg' => $err]);
            sleep($delay);
            $delay *= 2;
        }
        throw new \RuntimeException('Pump API request failed');
    }
}
