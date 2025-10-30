<?php
namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;
use App\Libraries\{MyMIUser, ExchangeConnectorInterface}; 
/**
 * MyMIRobinhood
 *
 * Official Robinhood Crypto API helper:
 *  - Ed25519 key generation & signing
 *  - Auth headers (x-api-key, x-timestamp, x-signature)
 *  - HTTP requests (exact-body signing)
 *  - FULL endpoint coverage for the common Crypto APIs you listed:
 *      - Accounts
 *      - Trading Pairs (with pagination params)
 *      - Holdings (with pagination params)
 *      - Best Bid/Ask
 *      - Estimated Price
 *      - Orders: list, get, cancel, place (generic + typed helpers)
 *
 * ENV:
 *  ROBINHOOD_API_KEY="rh-api-xxxxxxxx-...."
 *  ROBINHOOD_PRIVATE_SEED_B64="BASE64_32_BYTE_SEED"
 *  ROBINHOOD_BASE_URL="https://trading.robinhood.com"
 */
#[\AllowDynamicProperties]
class MyMIRobinhood implements ExchangeConnectorInterface
{
    protected string $apiKey;
    protected string $seedB64;
    protected string $base;
    protected int    $timeout = 30;

    public function __construct(?string $apiKey = null, ?string $seedB64 = null, ?string $base = null, int $timeout = 30)
    {
        $userLib = new MyMIUser();
        $creds = $userLib->getBrokerCredential(null, 'robinhood'); // current user
        if ($creds) {
            $this->apiKey = $creds['api_key'] ?? null;
            $this->privateKeyB64 = $creds['private_key_b64'] ?? null;
        }

        $this->apiKey  = $apiKey  ?? $this->envGet('ROBINHOOD_API_KEY', '');
        $this->seedB64 = $seedB64 ?? $this->envGet('ROBINHOOD_PRIVATE_SEED_B64', '');
        $this->base    = rtrim($base ?? ($this->envGet('ROBINHOOD_BASE_URL', 'https://trading.robinhood.com')), '/');
        $this->timeout = $timeout;

        log_message('info', 'MyMIRobinhood:init apiKey(len)={len}, base={base}', [
            'len'  => strlen($this->apiKey),
            'base' => $this->base,
        ]);

        if (!$this->apiKey)  throw new \RuntimeException('ROBINHOOD_API_KEY is not set.');
        if (!$this->seedB64) throw new \RuntimeException('ROBINHOOD_PRIVATE_SEED_B64 is not set.');
        if (!\function_exists('sodium_crypto_sign_seed_keypair')) {
            throw new \RuntimeException('Sodium extension not available. Enable libsodium in PHP.');
        }
    }

    private function envGet(string $key, ?string $default = null): ?string
    {
        $candidates = [
            function($k){ return function_exists('env') ? env($k) : null; },
            function($k){ return $_ENV[$k]   ?? null; },
            function($k){ return $_SERVER[$k]?? null; },
            function($k){ $v = getenv($k); return $v === false ? null : $v; },
            function($k){ return defined($k) ? constant($k) : null; },
        ];
        foreach ($candidates as $fn) {
            $v = $fn($key);
            if ($v !== null && $v !== '') {
                // strip surrounding quotes/spaces just in case
                return trim((string)$v, " \t\n\r\0\x0B\"'");
            }
        }
        return $default;
    }

    // ===================== Signing & headers =====================

    /** Create a new Ed25519 key pair (seed+public) */
    public function generateKeyPair(): array
    {
        $seed = random_bytes(32);
        $kp   = sodium_crypto_sign_seed_keypair($seed);
        $pub  = sodium_crypto_sign_publickey($kp);
        return [
            'private_key_b64' => base64_encode($seed), // KEEP SECRET
            'public_key_b64'  => base64_encode($pub),  // paste into RH portal
        ];
    }

    /** Ed25519-detached sign of raw $message with base64 seed */
    public function sign(string $privateKeyB64, string $message): string
    {
        $seed = base64_decode($privateKeyB64, true);
        if ($seed === false || strlen($seed) !== 32) {
            throw new \InvalidArgumentException('Private key must be a base64-encoded 32-byte seed.');
        }
        $kp  = sodium_crypto_sign_seed_keypair($seed);
        $sec = sodium_crypto_sign_secretkey($kp);
        $sig = sodium_crypto_sign_detached($message, $sec);
        return base64_encode($sig);
    }

    /**
     * message = api_key + timestamp + path + method + body
     * (omit body for GET / empty)
     */
    public function buildMessage(string $apiKey, string $timestamp, string $path, string $method, ?string $minifiedJsonBody = null): string
    {
        $method = strtoupper($method);
        $body   = $minifiedJsonBody ?? '';
        return $apiKey . $timestamp . $path . $method . $body;
    }

    /** Build auth headers (+ JSON defaults) */
    public function headers(string $apiKey, string $timestamp, string $signatureB64): array
    {
        return [
            'x-api-key'   => $apiKey,
            'x-timestamp' => $timestamp,
            'x-signature' => $signatureB64,
            'Content-Type'=> 'application/json; charset=utf-8',
            'Accept'      => 'application/json',
        ];
    }

    // ===================== HTTP helpers =====================

    /** Ensure our GET query strings are built exactly as we intend */
    protected function buildQuery(array $params): string
    {
        if (empty($params)) return '';
        // Support multi-value keys: ['symbol' => ['BTC-USD','ETH-USD']]
        $parts = [];
        foreach ($params as $key => $val) {
            if ($val === null || $val === '') continue;
            if (is_array($val)) {
                foreach ($val as $v) {
                    $parts[] = rawurlencode($key) . '=' . rawurlencode((string) $v);
                }
            } else {
                $parts[] = rawurlencode($key) . '=' . rawurlencode((string) $val);
            }
        }
        return $parts ? ('?' . implode('&', $parts)) : '';
    }

    /** Minify JSON (no extra spaces), stable enough for signing/sending as-is */
    protected function minifyJson(array $data): string
    {
        $json = json_encode($data, JSON_UNESCAPED_SLASHES);
        if ($json === false) throw new \RuntimeException('Failed to JSON-encode body for signing.');
        return $json;
    }

    /** Core signed request; $path should NOT include domain; may include query already */
    public function request(string $method, string $path, ?array $json = null, array $extraHeaders = [])
    {
        /** @var CURLRequest $http */
        $http = service('curlrequest', ['timeout' => $this->timeout]);

        $method   = strtoupper($method);
        $ts       = (string) time();
        $bodyStr  = $json ? $this->minifyJson($json) : null;
        $message  = $this->buildMessage($this->apiKey, $ts, $path, $method, $bodyStr);
        $sigB64   = $this->sign($this->seedB64, $message);
        $headers  = array_merge($this->headers($this->apiKey, $ts, $sigB64), $extraHeaders);

        $opts = ['headers' => $headers];
        if ($json !== null && in_array($method, ['POST','PUT','PATCH','DELETE'], true)) {
            // send EXACT body that we signed
            $opts['body'] = $bodyStr;
        }

        return $http->request($method, $this->base . $path, $opts);
    }

    // ===================== Endpoints =====================

    /** --- Account --- */
    public function getAccount()
    {
        $path = '/api/v1/crypto/trading/accounts/';
        return $this->request('GET', $path, null);
    }

    /** --- Trading Pairs (supports: symbol[], limit, cursor) --- */
    public function getTradingPairs(array $symbols = [], ?int $limit = null, ?string $cursor = null)
    {
        $q = $this->buildQuery([
            'symbol' => $symbols ?: null, // array of 'BTC-USD'…
            'limit'  => $limit,
            'cursor' => $cursor,
        ]);
        $path = '/api/v1/crypto/trading/trading_pairs/' . $q;
        return $this->request('GET', $path, null);
    }

    /** --- Holdings (supports: asset_code[], limit, cursor) --- */
    public function getHoldings(array $assetCodes = [], ?int $limit = null, ?string $cursor = null)
    {
        $q = $this->buildQuery([
            'asset_code' => $assetCodes ?: null, // array of 'BTC','ETH'…
            'limit'      => $limit,
            'cursor'     => $cursor,
        ]);
        $path = '/api/v1/crypto/trading/holdings/' . $q;
        return $this->request('GET', $path, null);
    }

    /** --- Best Bid/Ask (supports multiple symbol params) --- */
    public function getBestBidAsk(array $symbols = [])
    {
        $q = $this->buildQuery([
            'symbol' => $symbols ?: null, // array of 'BTC-USD','ETH-USD'…
        ]);
        $path = '/api/v1/crypto/marketdata/best_bid_ask/' . $q;
        return $this->request('GET', $path, null);
    }

    /** --- Estimated Price (symbol, side=bid|ask|both, quantity string "0.1,1,...") --- */
    public function getEstimatedPrice(string $symbol, string $side, string $quantityCsv)
    {
        $q = $this->buildQuery([
            'symbol'   => strtoupper($symbol),
            'side'     => strtolower($side),  // 'bid' | 'ask' | 'both'
            'quantity' => $quantityCsv,       // e.g. "0.1,1,1.999"
        ]);
        $path = '/api/v1/crypto/marketdata/estimated_price/' . $q;
        return $this->request('GET', $path, null);
    }

    /**
     * --- Orders (list) ---
     * Filters supported (pass only what you need):
     *  - created_at_start / created_at_end (ISO 8601)
     *  - updated_at_start / updated_at_end (ISO 8601)
     *  - symbol, id (uuid), side (buy|sell), state (open|canceled|partially_filled|filled|failed)
     *  - type (limit|market|stop_limit|stop_loss)
     *  - cursor, limit
     */
    public function getOrders(array $filters = [])
    {
        $q = $this->buildQuery($filters);
        $path = '/api/v1/crypto/trading/orders/' . $q;
        return $this->request('GET', $path, null);
    }

    /** --- Get Single Order --- */
    public function getOrder(string $orderId)
    {
        $path = "/api/v1/crypto/trading/orders/{$orderId}/";
        return $this->request('GET', $path, null);
    }

    /** --- Cancel Order --- */
    public function cancelOrder(string $orderId)
    {
        $path = "/api/v1/crypto/trading/orders/{$orderId}/cancel/";
        return $this->request('POST', $path, null);
    }

    /**
     * --- Place Order (generic) ---
     * $order = [
     *   'symbol' => 'BTC-USD', 'client_order_id' => 'uuid',
     *   'side' => 'buy'|'sell', 'type' => 'market'|'limit'|'stop_limit'|'stop_loss',
     *   'market_order_config' => ['asset_quantity' => '0.1' | 'quote_amount' => '10'],
     *   'limit_order_config'  => [...],
     *   'stop_loss_order_config' => [...],
     *   'stop_limit_order_config'=> [...],
     * ]
     */
    public function placeOrder(array $order)
    {
        $path = '/api/v1/crypto/trading/orders/';
        // IMPORTANT: body must be minified & EXACT string sent (handled in request())
        return $this->request('POST', $path, $order);
    }

    // === Typed helpers for convenience ===

    public function placeMarketBuy(string $symbol, string $assetQty, ?string $clientOrderId = null)
    {
        return $this->placeOrder([
            'symbol'               => strtoupper($symbol),
            'client_order_id'      => $clientOrderId ?: $this->uuidv4(),
            'side'                 => 'buy',
            'type'                 => 'market',
            'market_order_config'  => ['asset_quantity' => (string) $assetQty],
        ]);
    }

    public function placeMarketSell(string $symbol, string $assetQty, ?string $clientOrderId = null)
    {
        return $this->placeOrder([
            'symbol'               => strtoupper($symbol),
            'client_order_id'      => $clientOrderId ?: $this->uuidv4(),
            'side'                 => 'sell',
            'type'                 => 'market',
            'market_order_config'  => ['asset_quantity' => (string) $assetQty],
        ]);
    }

    public function placeLimit(string $side, string $symbol, string $assetQty, string $limitPrice, string $tif = 'gtc', ?string $clientOrderId = null)
    {
        return $this->placeOrder([
            'symbol'              => strtoupper($symbol),
            'client_order_id'     => $clientOrderId ?: $this->uuidv4(),
            'side'                => strtolower($side) === 'sell' ? 'sell' : 'buy',
            'type'                => 'limit',
            'limit_order_config'  => [
                'asset_quantity' => (string) $assetQty,
                'limit_price'    => (string) $limitPrice,
                'time_in_force'  => $tif,
            ],
        ]);
    }

    // ===================== Utils =====================

    protected function uuidv4(): string
    {
        $d = random_bytes(16);
        $d[6] = chr((ord($d[6]) & 0x0f) | 0x40);
        $d[8] = chr((ord($d[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($d), 4));
    }

    public function debugConfig(): array
    {
        return [
            'apiKey'  => $this->apiKey ? substr($this->apiKey, 0, 8) . '…' : null,
            'base'    => $this->base,
            'timeout' => $this->timeout,
        ];
    }

    // ExchangeConnectorInterface implementation
    public function getQuote(array $p): array
    {
        $symbol = $p['symbol'] ?? '';
        $resp   = $this->getBestBidAsk([$symbol]);
        $body   = json_decode($resp->getBody(), true);
        $price  = $body['results'][0]['ask_price'] ?? null;
        return ['symbol' => $symbol, 'price' => $price];
    }

    public function trade(array $p): array
    {
        return $this->placeOrder($p);
    }

    public function price(string $symbol): ?float
    {
        $resp = $this->getBestBidAsk([$symbol]);
        $body = json_decode($resp->getBody(), true);
        return isset($body['results'][0]['ask_price']) ? (float) $body['results'][0]['ask_price'] : null;
    }

    public function balances(string $accountId): array
    {
        $resp = $this->getHoldings();
        $body = json_decode($resp->getBody(), true);
        return $body['results'] ?? [];
    }

    public function setApiKey(string $apiKey): self { $this->apiKey = $apiKey; return $this; }
    public function setSeed(string $seedB64): self   { $this->seedB64 = $seedB64; return $this; }
    public function setBase(string $base): self      { $this->base = rtrim($base, '/'); return $this; }
    public function setTimeout(int $s): self         { $this->timeout = $s; return $this; }
}
