<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ExternalApiPolicy extends BaseConfig
{
    /**
     * Hard caps per provider for a single process run.
     *
     * @var array<string,int>
     */
    public array $providerCaps = [
        'alphavantage' => 120,
        'marketaux' => 120,
        'plaid' => 80,
        'robinhood' => 80,
        'discord' => 200,
        'llm' => 100,
    ];

    /**
     * Optional micro-sleep backoff (microseconds) after each allowed call.
     */
    public int $microSleepBackoffUs = 0;

    /**
     * Whether to apply micro-sleep backoff automatically.
     */
    public bool $enableBackoff = true;
}
