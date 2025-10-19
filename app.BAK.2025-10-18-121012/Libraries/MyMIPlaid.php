<?php
namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;

class MyMIPlaid
{
    private string $clientId;
    private string $secret;
    private string $env;       // production | development | sandbox
    private string $baseUrl;   // https://production.plaid.com, etc.
    private array  $products;
    private array  $countryCodes;
    private ?string $redirectUri;

    /** @var CURLRequest */
    private $http;

    public function __construct()
    {
        $cfg = config('APIs');

        $this->env = strtolower(getenv('PLAID_ENVIRONMENT') ?: ($cfg->plaidEnvironment ?? 'production'));
        $this->baseUrl = match ($this->env) {
        'production'  => 'https://production.plaid.com',
        'development' => 'https://development.plaid.com',
        default       => 'https://sandbox.plaid.com',
        };


        $this->clientId = (string) ($cfg->plaidClientID ?? getenv('PLAID_CLIENT_ID') ?? '');
        // pick the correct secret for the active environment
        $this->clientId = (string) (getenv('PLAID_CLIENT_ID') ?: ($cfg->plaidClientID ?? ''));
        $this->secret   = $this->env === 'sandbox'
            ? (string) (getenv('PLAID_SANDBOX_SECRET') ?: ($cfg->plaidSandboxSecret ?? (getenv('PLAID_SECRET') ?: ($cfg->plaidSecret ?? ''))))
            : (string) (getenv('PLAID_SECRET') ?: ($cfg->plaidSecret ?? ''));

        $prods = getenv('PLAID_PRODUCTS') ?: ($cfg->plaidProducts ?? 'auth,transactions');
        $codes = getenv('PLAID_COUNTRY_CODES') ?: ($cfg->plaidCountryCodes ?? 'US');

        $this->products     = array_values(array_filter(array_map('trim', is_array($prods) ? $prods : explode(',', (string)$prods))));
        $this->countryCodes = array_values(array_filter(array_map('trim', is_array($codes) ? $codes : explode(',', (string)$codes))));
        $this->redirectUri = (property_exists($cfg,'plaidRedirectUri') && $cfg->plaidRedirectUri)
            ? $cfg->plaidRedirectUri
            : null;


        $this->http = service('curlrequest', [
            'baseURI' => $this->baseUrl,
            'headers' => ['Content-Type' => 'application/json'],
            'http_errors' => false,
            'timeout' => 15,
        ]);

        log_message('debug', 'MyMIPlaid init env='.$this->env.' base='.$this->baseUrl);
    }

    private function post(string $path, array $payload): array
    {
        $resp = $this->http->post($path, ['json' => $payload]);
        $json = json_decode($resp->getBody() ?? '[]', true) ?: [];
        if ($resp->getStatusCode() >= 400) {
            log_message('error', 'Plaid '.$path.' error '.$resp->getStatusCode().': '.($json['error_message'] ?? $resp->getBody()));
        }
        return $json;
    }

    public function createLinkToken(int $userId, string $clientName = 'MyMI Wallet'): ?string
    {
        $payload = [
            'client_id' => $this->clientId,
            'secret'    => $this->secret,
            'client_name' => $clientName,
            'user'      => ['client_user_id' => (string)$userId],
            'products'  => $this->products,
            'country_codes' => $this->countryCodes,
            'language'  => 'en',
        ];
        if ($this->redirectUri) {
            $payload['redirect_uri'] = $this->redirectUri;
        }

        $j = $this->post('/link/token/create', $payload);
        if (!empty($j['link_token'])) {
            // Helpful for cutover: you’ll see env/base in logs when link tokens are minted
            log_message('debug', 'Plaid link token created (env='.$this->env.')');
            return $j['link_token'];
        }
        return null;
    }

    public function exchangePublicToken(string $publicToken): array
    {
        $j = $this->post('/item/public_token/exchange', [
            'client_id'    => $this->clientId,
            'secret'       => $this->secret,
            'public_token' => $publicToken,
        ]);
        return $j;
    }

    public function getAccountsWithBalances(string $accessToken): array
    {
        $j = $this->post('/accounts/balance/get', [
            'client_id'    => $this->clientId,
            'secret'       => $this->secret,
            'access_token' => $accessToken,
        ]);
        return $j['accounts'] ?? [];
    }

    // Small helper to let you confirm which env the server is using
    public function envInfo(): array
    {
        return [
            'env'      => $this->env,
            'base_url' => $this->baseUrl,
            'products' => $this->products,
            'countries'=> $this->countryCodes,
            'redirect'=> $this->redirectUri,
        ];
    }
}
