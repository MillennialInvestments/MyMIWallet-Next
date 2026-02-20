<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Features extends BaseConfig
{
    public array $integration = [
        'alphavantage' => false,
        'marketaux' => false,
        'coingecko' => false,
        'discord' => false,
        'zapier' => false,
        'imap' => false,
        'twilio' => false,
    ];

    public array $systems = [
        'infrastructure' => false,
        'aiops' => false,
        'chat' => false,
        'python' => false,
        'governance' => false,
        'redis' => false,
        'email' => false,
        'logging' => true,
        'debug' => false,
        'security' => true,
        'cron' => false,
    ];
}
