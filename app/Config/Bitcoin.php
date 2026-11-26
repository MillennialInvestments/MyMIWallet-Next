<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Bitcoin extends BaseConfig
{
    public string $provider = 'blockstream';
    public string $base = 'https://blockstream.info/api';
    public int $timeout = 10;
    public string $network = 'mainnet';

    // Safety guardrails and money switches (strictly disabled by default)
    public bool $allowTransactionExecution = false;
    public bool $allowMainnetBroadcast = false;
    public bool $allowPrivateKeySubmission = false;
    public bool $defaultDryRun = true;
}
