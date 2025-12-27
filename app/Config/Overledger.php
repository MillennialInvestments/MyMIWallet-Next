<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Overledger extends BaseConfig
{
    /** @var string sandbox|production */
    public string $environment;
    public string $baseUrl;
    public string $oauthUrl;
    public string $clientId;
    public string $clientSecret;
    public int $timeout = 20;
    public string $cachePrefix = 'overledger';
    public int $tokenLeewaySeconds = 120;
    public array $allowedNetworks = [
        'eth-sepolia',
        'polygon-amoy',
        'xrpl-testnet',
    ];

    public function __construct()
    {
        parent::__construct();

        $this->environment        = env('OVERLEDGER_ENV', 'sandbox');
        $this->baseUrl            = env('OVERLEDGER_BASE_URL', 'https://api.sandbox.overledger.io');
        $this->oauthUrl           = env('OVERLEDGER_OAUTH_URL', 'https://api.sandbox.overledger.io/oauth/token');
        $this->clientId           = env('OVERLEDGER_CLIENT_ID', '');
        $this->clientSecret       = env('OVERLEDGER_CLIENT_SECRET', '');
        $this->timeout            = (int) env('OVERLEDGER_TIMEOUT', $this->timeout);
        $this->cachePrefix        = env('OVERLEDGER_CACHE_PREFIX', $this->cachePrefix);
        $this->tokenLeewaySeconds = (int) env('OVERLEDGER_TOKEN_LEEWAY_SECONDS', $this->tokenLeewaySeconds);

        $allowedNetworks = env('OVERLEDGER_ALLOWED_NETWORKS');
        if (is_string($allowedNetworks) && $allowedNetworks !== '') {
            $parts = array_filter(array_map('trim', explode(',', $allowedNetworks)));
            if (!empty($parts)) {
                $this->allowedNetworks = $parts;
            }
        }
    }
}
