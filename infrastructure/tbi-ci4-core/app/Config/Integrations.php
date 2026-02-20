<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Integrations extends BaseConfig
{
    /** @var array<string,array<string,mixed>> */
    public array $providers = [
        'alphavantage' => [
            'base_url' => 'https://www.alphavantage.co',
            'api_key' => '',
            'timeout' => 12,
            'cache_ttl' => 120,
            'rate_limit_per_minute' => 5,
        ],
        'marketaux' => [
            'base_url' => 'https://api.marketaux.com',
            'api_token' => '',
            'timeout' => 12,
            'cache_ttl' => 120,
            'rate_limit_per_minute' => 10,
        ],
        'coingecko' => [
            'base_url' => 'https://api.coingecko.com/api/v3',
            'api_key' => '',
            'timeout' => 12,
            'cache_ttl' => 60,
            'rate_limit_per_minute' => 20,
        ],
        'discord' => [
            'webhook' => '',
            'timeout' => 8,
            'rate_limit_per_minute' => 20,
        ],
        'zapier' => [
            'webhook' => '',
            'timeout' => 8,
            'rate_limit_per_minute' => 20,
        ],
        'imap' => [
            'host' => 'imap.dreamhost.com',
            'port' => 993,
            'user' => '',
            'pass' => '',
            'mailbox' => 'INBOX',
        ],
        'twilio' => [
            'account_sid' => '',
            'auth_token' => '',
            'from_number' => '',
        ],
    ];
}
