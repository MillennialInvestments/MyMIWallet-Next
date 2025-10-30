<?php
namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;

/**
 * MyMISnapTrader
 *
 * Equities/Options via SnapTrade (aggregator).
 * This library intentionally stays separate from MyMIRobinhood (crypto).
 *
 * Typical SnapTrade setup:
 *  - Create a developer app in SnapTrade
 *  - Get API key + client id (+ secret if required)
 *  - Implement their "Link/OAuth" to authorize the user's brokerage account(s)
 *  - Use returned authorization IDs / user tokens to place orders & read positions
 *
 * ENV (example):
 *   SNAPTRADE_API_KEY="..."
 *   SNAPTRADE_CLIENT_ID="..."
 *   SNAPTRADE_BASE_URL="https://api.snaptrade.com"
 *   SNAPTRADE_REDIRECT_URL="https://yourapp.com/snaptrade/callback"
 *
 * IMPORTANT: Replace the placeholder endpoint paths with the exact ones from SnapTrade's docs.
 */
#[\AllowDynamicProperties]
class MyMISnapTrader
{
    protected string $apiKey;
    protected string $clientId;
    protected string $base;
    protected ?string $redirectUrl;
    protected int $timeout = 30;

    public function __construct(
        ?string $apiKey = null,
        ?string $clientId = null,
        ?string $base = null,
        ?string $redirectUrl = null,
        int $timeout = 30
    ) {
        $this->apiKey      = $apiKey      ?? (string) getenv('SNAPTRADE_API_KEY');
        $this->clientId    = $clientId    ?? (string) getenv('SNAPTRADE_CLIENT_ID');
        $this->base        = rtrim($base  ?? (string) (getenv('SNAPTRADE_BASE_URL') ?: 'https://api.snaptrade.com'), '/');
        $this->redirectUrl = $redirectUrl ?? (string) getenv('SNAPTRADE_REDIRECT_URL') ?: null;
        $this->timeout     = $timeout;

        if (!$this->apiKey)   throw new \RuntimeException('SNAPTRADE_API_KEY is not set.');
        if (!$this->clientId) throw new \RuntimeException('SNAPTRADE_CLIENT_ID is not set.');
    }

    // ===================== Core HTTP =====================

    protected function http(): CURLRequest
    {
        /** @var CURLRequest $http */
        $http = service('curlrequest', ['timeout' => $this->timeout]);
        return $http;
    }

    protected function defaultHeaders(array $extra = []): array
    {
        // SnapTrade commonly uses keyed headers; confirm exact names in your docs
        return array_merge([
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
            'X-API-KEY'    => $this->apiKey,
            'X-CLIENT-ID'  => $this->clientId,
        ], $extra);
    }

    protected function buildQuery(array $params): string
    {
        if (empty($params)) return '';
        $parts = [];
        foreach ($params as $k => $v) {
            if ($v === null || $v === '') continue;
            if (is_array($v)) {
                foreach ($v as $vv) $parts[] = rawurlencode($k) . '=' . rawurlencode((string) $vv);
            } else {
                $parts[] = rawurlencode($k) . '=' . rawurlencode((string) $v);
            }
        }
        return $parts ? ('?' . implode('&', $parts)) : '';
    }

    protected function jsonBody(array $data): string
    {
        $j = json_encode($data, JSON_UNESCAPED_SLASHES);
        if ($j === false) throw new \RuntimeException('Failed to encode JSON body.');
        return $j;
    }

    // ===================== Link / OAuth convenience =====================

    /**
     * Start link flow (get a connect URL).
     * Return value shape depends on SnapTrade API; replace endpoint path below.
     */
    public function createConnectLink(string $userId, array $options = [])
    {
        $path = '/link/create'; // TODO: replace with actual SnapTrade "create connect link" endpoint
        $body = [
            'userId'       => $userId,
            'redirect_url' => $options['redirect_url'] ?? $this->redirectUrl,
            // add other vendor-required fields: broker filters, permissions, etc.
        ];

        $res = $this->http()->request('POST', $this->base . $path, [
            'headers' => $this->defaultHeaders(),
            'body'    => $this->jsonBody($body),
        ]);
        return $res;
    }

    /**
     * Poll/verify that user finished connecting their brokerage.
     * Often you’ll receive some authorization id or token to use in trade calls.
     */
    public function getAuthorizations(string $userId, array $params = [])
    {
        $path = '/authorizations'; // TODO: replace with actual endpoint
        $q = $this->buildQuery(array_merge(['userId' => $userId], $params));
        $res = $this->http()->request('GET', $this->base . $path . $q, [
            'headers' => $this->defaultHeaders(),
        ]);
        return $res;
    }

    // ===================== Accounts / Positions =====================

    /** List user’s linked brokerage accounts */
    public function listAccounts(string $userId, array $params = [])
    {
        $path = '/accounts'; // TODO: replace with actual endpoint
        $q = $this->buildQuery(array_merge(['userId' => $userId], $params));
        return $this->http()->request('GET', $this->base . $path . $q, [
            'headers' => $this->defaultHeaders(),
        ]);
    }

    /** Get positions (equities) */
    public function getPositions(string $userId, string $authorizationId, array $params = [])
    {
        $path = "/accounts/{$authorizationId}/positions"; // TODO
        $q = $this->buildQuery(array_merge(['userId' => $userId], $params));
        return $this->http()->request('GET', $this->base . $path . $q, [
            'headers' => $this->defaultHeaders(),
        ]);
    }

    // ===================== Trading (equities) =====================

    /**
     * Place an equities order.
     * $order example (map to SnapTrade spec):
     * [
     *   'userId' => 'user-123',
     *   'authorizationId' => 'auth-abc',
     *   'symbol' => 'AAPL',
     *   'side' => 'buy',                 // buy|sell
     *   'quantity' => 1,
     *   'type' => 'market',              // market|limit|stop|stop_limit...
     *   'time_in_force' => 'day',        // day|gtc|...
     *   'limit_price' => '185.00',       // required for limit
     *   'stop_price'  => '180.00',       // if stop or stop_limit
     *   'client_order_id' => 'uuid-...',
     * ]
     */
    public function placeEquityOrder(array $order)
    {
        $path = '/trade/placeOrder'; // TODO: replace with actual endpoint
        $body = $order;
        return $this->http()->request('POST', $this->base . $path, [
            'headers' => $this->defaultHeaders(),
            'body'    => $this->jsonBody($body),
        ]);
    }

    /** Cancel equities order */
    public function cancelEquityOrder(string $userId, string $authorizationId, string $orderId)
    {
        $path = "/trade/orders/{$orderId}/cancel"; // TODO
        $body = [
            'userId' => $userId,
            'authorizationId' => $authorizationId,
        ];
        return $this->http()->request('POST', $this->base . $path, [
            'headers' => $this->defaultHeaders(),
            'body'    => $this->jsonBody($body),
        ]);
    }

    /** Get equities order */
    public function getEquityOrder(string $userId, string $authorizationId, string $orderId)
    {
        $path = "/trade/orders/{$orderId}"; // TODO
        $q = $this->buildQuery(['userId' => $userId, 'authorizationId' => $authorizationId]);
        return $this->http()->request('GET', $this->base . $path . $q, [
            'headers' => $this->defaultHeaders(),
        ]);
    }

    // ===================== Trading (options) =====================

    /**
     * Place an options order.
     * $order example:
     * [
     *   'userId' => 'user-123',
     *   'authorizationId' => 'auth-abc',
     *   'underlying' => 'AAPL',
     *   'symbol'     => 'AAPL   240920C00185000', // OCC-formatted if required
     *   'side'       => 'buy_to_open',            // depends on API (BTO/STO/BTC/STC)
     *   'quantity'   => 1,
     *   'type'       => 'limit',
     *   'limit_price'=> '2.35',
     *   'time_in_force' => 'day',
     *   'client_order_id' => 'uuid-...',
     * ]
     */
    public function placeOptionsOrder(array $order)
    {
        $path = '/options/placeOrder'; // TODO: replace with actual endpoint
        return $this->http()->request('POST', $this->base . $path, [
            'headers' => $this->defaultHeaders(),
            'body'    => $this->jsonBody($order),
        ]);
    }

    public function cancelOptionsOrder(string $userId, string $authorizationId, string $orderId)
    {
        $path = "/options/orders/{$orderId}/cancel"; // TODO
        $body = [
            'userId' => $userId,
            'authorizationId' => $authorizationId,
        ];
        return $this->http()->request('POST', $this->base . $path, [
            'headers' => $this->defaultHeaders(),
            'body'    => $this->jsonBody($body),
        ]);
    }

    public function getOptionsOrder(string $userId, string $authorizationId, string $orderId)
    {
        $path = "/options/orders/{$orderId}"; // TODO
        $q = $this->buildQuery(['userId' => $userId, 'authorizationId' => $authorizationId]);
        return $this->http()->request('GET', $this->base . $path . $q, [
            'headers' => $this->defaultHeaders(),
        ]);
    }

    // ===================== Utils =====================

    public function debugConfig(): array
    {
        return [
            'base'     => $this->base,
            'clientId' => $this->clientId ? substr($this->clientId, 0, 6) . '…' : null,
            'hasApiKey'=> (bool) $this->apiKey,
            'timeout'  => $this->timeout,
        ];
    }

    public function setTimeout(int $s): self { $this->timeout = $s; return $this; }
    public function setBase(string $b): self  { $this->base = rtrim($b, '/'); return $this; }
}
