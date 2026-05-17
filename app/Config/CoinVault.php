<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class CoinVault extends BaseConfig
{
    /**
     * External contribution clients. Set real secrets in environment-specific config only.
     * HMAC signs the raw request body with sha256 and sends it as X-CoinVault-Signature.
     */
    public array $externalClients = [
        'timothyburks_contribution_tracker' => [
            'label' => 'TimothyBurks.com Contribution Tracker',
            'apiKeyEnv' => 'COINVAULT_TIMOTHYBURKS_API_KEY',
            'hmacSecretEnv' => 'COINVAULT_TIMOTHYBURKS_HMAC_SECRET',
            'autoApprove' => false,
            'enabled' => true,
        ],
    ];

    public array $defaultRewardRules = [
        'cash_coin_per_usd' => 1.0,
        'hourly_rate_usd' => 25.0,
        'task_count_per_coin' => 5,
    ];

    public array $tables = [
        'projects' => 'bf_coin_vault_projects',
        'wallets' => 'bf_coin_vault_wallets',
        'ledger' => 'bf_coin_vault_ledger',
        'contributions' => 'bf_coin_vault_contributions',
        'payouts' => 'bf_coin_vault_payout_requests',
        'externalLogs' => 'bf_coin_vault_external_event_logs',
    ];
}
