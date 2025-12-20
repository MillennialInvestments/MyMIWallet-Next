<?php

namespace App\Libraries\Overledger;

use App\Config\Overledger as OverledgerConfig;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Cache\CacheFactory;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\I18n\Time;
use Config\Services;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class MyMIOverledger
{
    protected OverledgerConfig $config;
    protected CacheInterface $cache;
    protected ClientInterface $http;
    protected string $tokenCacheKey;

    public function __construct(
        ?OverledgerConfig $config = null,
        ?CacheInterface $cache = null,
        ?ClientInterface $http = null
    ) {
        $this->config = $config ?? config('Overledger');
        $this->cache  = $cache ?? $this->buildCache();
        $this->http   = $http ?? $this->buildHttpClient();

        $this->tokenCacheKey = $this->normalizeCacheKey(sprintf(
            '%s_token_%s_%s',
            $this->config->cachePrefix,
            $this->config->environment,
            substr(hash('sha256', $this->config->clientId), 0, 12)
        ));
    }

    /**
     * Retrieve an access token, using cache when possible.
     */
    public function getAccessToken(bool $forceRefresh = false): string
    {
        if (!$forceRefresh) {
            $cached = $this->cache->get($this->tokenCacheKey);
            if (is_array($cached) && !empty($cached['token']) && !empty($cached['expires_at'])) {
                if (!$this->isExpiringSoon((int) $cached['expires_at'])) {
                    return $cached['token'];
                }
            }
        }

        return $this->refreshToken();
    }

    /**
     * Perform an authenticated request with retries and auth refresh on 401/403.
     *
     * @param string               $method  HTTP verb
     * @param string               $path    Relative or absolute path
     * @param array<string,mixed>|null $payload Request body (JSON)
     * @param array<string,string> $headers Extra headers
     * @param array<string,mixed>  $options Extra Guzzle options (e.g., ['query' => []])
     *
     * @return array{success: bool, status: int, data: mixed, error: string|null, request_id: string, latency_ms: int}
     */
    public function request(
        string $method,
        string $path,
        ?array $payload = null,
        array $headers = [],
        array $options = []
    ): array {
        $requestId = $options['request_id'] ?? $this->generateRequestId();
        $url       = $this->resolveUrl($path);
        $attempts  = 0;
        $maxAttempts = 3; // initial + 2 retries for 429/503
        $authRetried = false;
        $start     = microtime(true);
        $lastError = null;
        $status    = 0;
        $data      = null;

        while ($attempts < $maxAttempts) {
            $attempts++;
            try {
                $token = $this->getAccessToken();
                $reqHeaders = array_merge([
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ], $headers);

                $requestOptions = array_merge([
                    'headers' => $reqHeaders,
                    'timeout' => $this->config->timeout,
                ], $options);

                if ($payload !== null) {
                    $requestOptions['json'] = $payload;
                }

                $response = $this->http->request($method, $url, $requestOptions);
                $status   = $response->getStatusCode();
                $body     = $this->decodeResponse($response);

                if (in_array($status, [401, 403], true) && !$authRetried) {
                    // force refresh token once
                    $authRetried = true;
                    $this->cache->delete($this->tokenCacheKey);
                    $this->refreshToken();
                    continue;
                }

                if (in_array($status, [429, 503], true) && $attempts < $maxAttempts) {
                    $this->backoff($attempts);
                    continue;
                }

                $latency = (int) round((microtime(true) - $start) * 1000);
                return [
                    'success'    => $status >= 200 && $status < 300,
                    'status'     => $status,
                    'data'       => $body,
                    'error'      => $status >= 400 ? $this->extractError($body) : null,
                    'request_id' => $requestId,
                    'latency_ms' => $latency,
                ];
            } catch (\Throwable $e) {
                $lastError = $e;
                $status    = $this->mapExceptionToStatus($e);

                if ($status === 401 && !$authRetried) {
                    $authRetried = true;
                    $this->cache->delete($this->tokenCacheKey);
                    try {
                        $this->refreshToken();
                    } catch (\Throwable $inner) {
                        $lastError = $inner;
                        break;
                    }
                    continue;
                }

                if (in_array($status, [429, 503], true) && $attempts < $maxAttempts) {
                    $this->backoff($attempts);
                    continue;
                }

                break;
            }
        }

        $latency = (int) round((microtime(true) - $start) * 1000);
        $this->logFailure('Overledger request failed', [
            'request_id' => $requestId,
            'path'       => $path,
            'status'     => $status,
            'error'      => $lastError ? $lastError->getMessage() : 'unknown error',
            'attempts'   => $attempts,
        ]);

        return [
            'success'    => false,
            'status'     => $status,
            'data'       => null,
            'error'      => $lastError ? $lastError->getMessage() : 'Request failed',
            'request_id' => $requestId,
            'latency_ms' => $latency,
        ];
    }

    public function get(string $path, array $query = [], array $headers = [], array $options = []): array
    {
        if (!empty($query)) {
            $options['query'] = $query;
        }
        return $this->request('GET', $path, null, $headers, $options);
    }

    public function post(string $path, array $payload, array $headers = [], array $options = []): array
    {
        return $this->request('POST', $path, $payload, $headers, $options);
    }

    public function healthCheck(array $options = []): array
    {
        return $this->get('/health', [], [], $options);
    }

    public function getSupportedNetworks(array $options = []): array
    {
        $cacheKey = $this->normalizeCacheKey(sprintf(
            '%s_networks_%s',
            $this->config->cachePrefix,
            $this->config->environment
        ));
        $cached = $this->cache->get($cacheKey);
        if ($cached) {
            return $cached;
        }

        $result = $this->get('/networks', [], [], $options);
        if ($result['success']) {
            $this->cache->save($cacheKey, $result, 300);
        }
        return $result;
    }

    public function getBalance(string $network, string $address, ?string $asset = null, array $options = []): array
    {
        $cacheKey = $this->normalizeCacheKey(sprintf(
            '%s_balance_%s_%s_%s_%s',
            $this->config->cachePrefix,
            $this->config->environment,
            $network,
            hash('sha256', $address),
            $asset ? hash('sha256', $asset) : 'na'
        ));
        $cached = $this->cache->get($cacheKey);
        if ($cached) {
            return $cached;
        }

        $query  = $asset ? ['asset' => $asset] : [];
        $result = $this->get("/balances/{$network}/{$address}", $query, [], $options);

        if ($result['success']) {
            $this->cache->save($cacheKey, $result, 60);
        }

        return $result;
    }

    public function prepareTransaction(array $tx, array $options = []): array
    {
        return $this->post('/transactions/prepare', $tx, [], $options);
    }

    public function submitTransaction(array $preparedTx, array $options = []): array
    {
        return $this->post('/transactions/submit', $preparedTx, [], $options);
    }

    protected function refreshToken(): string
    {
        $requestId = $this->generateRequestId();
        try {
            $response = $this->http->request('POST', $this->config->oauthUrl, [
                'timeout' => $this->config->timeout,
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => $this->config->clientId,
                    'client_secret' => $this->config->clientSecret,
                ],
            ]);

            $data    = $this->decodeResponse($response);
            $token   = $data['access_token'] ?? null;
            $expires = (int) ($data['expires_in'] ?? 0);

            if (!$token || $expires <= 0) {
                throw new HTTPException('Invalid token response from Overledger');
            }

            $expiresAt = time() + $expires;
            $this->cache->save($this->tokenCacheKey, [
                'token'      => $token,
                'expires_at' => $expiresAt,
            ], $expires);

            return $token;
        } catch (\Throwable $e) {
            $this->logFailure('Overledger token refresh failed', [
                'request_id' => $requestId,
                'error'      => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    protected function decodeResponse(ResponseInterface $response)
    {
        $body = (string) $response->getBody();
        if ($body === '') {
            return null;
        }

        $decoded = json_decode($body, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }

        return $body;
    }

    protected function extractError($body): string
    {
        if (is_array($body)) {
            return $body['error'] ?? $body['message'] ?? 'Unknown error';
        }
        return is_string($body) ? $body : 'Unknown error';
    }

    protected function buildCache(): CacheInterface
    {
        $config = config('Cache');
        try {
            $cache = CacheFactory::getHandler('redis', $config, 'file');
            if ($cache->isSupported()) {
                return $cache;
            }
        } catch (\Throwable $e) {
            // fall through to default cache service
        }

        return Services::cache();
    }

    protected function buildHttpClient(): ClientInterface
    {
        return new Client([
            'base_uri' => rtrim($this->config->baseUrl, '/') . '/',
            'timeout'  => $this->config->timeout,
        ]);
    }

    protected function resolveUrl(string $path): string
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return ltrim($path, '/');
    }

    protected function isExpiringSoon(int $expiresAt): bool
    {
        $leeway = $this->config->tokenLeewaySeconds;
        return (time() + $leeway) >= $expiresAt;
    }

    protected function backoff(int $attempt): void
    {
        $delayMs = 100 * (2 ** max(0, $attempt - 1));
        usleep($delayMs * 1000);
    }

    protected function normalizeCacheKey(string $key): string
    {
        $key = preg_replace('/[{}()\\/\\\\@:\\s]+/', '_', $key);
        return trim($key, '_');
    }

    protected function generateRequestId(): string
    {
        return 'ovr_' . bin2hex(random_bytes(6));
    }

    protected function mapExceptionToStatus(\Throwable $e): int
    {
        if ($e instanceof GuzzleException && method_exists($e, 'getResponse')) {
            $resp = $e->getResponse();
            if ($resp instanceof ResponseInterface) {
                return $resp->getStatusCode();
            }
        }

        return 500;
    }

    protected function logFailure(string $message, array $context = []): void
    {
        $safeContext = $this->maskSecrets($context);
        log_message('error', $message . ' {context}', ['context' => json_encode($safeContext)]);
    }

    protected function maskSecrets(array $context): array
    {
        $sensitiveKeys = ['client_id', 'client_secret', 'token', 'access_token', 'Authorization'];
        foreach ($context as $key => $value) {
            if (in_array($key, $sensitiveKeys, true) && is_string($value)) {
                $context[$key] = substr($value, 0, 4) . '...' . substr($value, -2);
            }
        }
        return $context;
    }
}
