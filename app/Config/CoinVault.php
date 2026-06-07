<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class CoinVault extends BaseConfig
{
    public array $externalClients = [
        'timothyburks_partner_subscription' => [
            'label' => 'TimothyBurks.com Partner Subscription',
            'apiKeyEnv' => 'COINVAULT_TIMOTHYBURKS_API_KEY',
            'hmacSecretEnv' => 'COINVAULT_TIMOTHYBURKS_HMAC_SECRET',
            'autoApprove' => false,
            'enabled' => true,
            'clientId' => 'tbi',
        ],
        'timothyburks_contribution_tracker' => [
            'label' => 'TimothyBurks.com Contribution Tracker',
            'apiKeyEnv' => 'COINVAULT_TIMOTHYBURKS_API_KEY',
            'hmacSecretEnv' => 'COINVAULT_TIMOTHYBURKS_HMAC_SECRET',
            'autoApprove' => false,
            'enabled' => true,
            'clientId' => 'tbi',
        ],
    ];

    public array $defaultRewardRules = [
        'cash_coin_per_usd' => 1.0,
        'hourly_rate_usd' => 25.0,
        'task_count_per_coin' => 5,
    ];

    public array $tables = [
        'projects' => 'bf_tbi_project_coins',
        'wallets' => 'bf_tbi_coin_wallets',
        'ledger' => 'bf_tbi_coin_contribution_ledger',
        'contributions' => 'bf_tbi_coin_contribution_ledger',
        'payouts' => 'bf_tbi_coin_payout_requests',
        'externalLogs' => 'bf_tbi_coin_external_event_logs',
        'categories' => 'bf_tbi_coin_contribution_categories',
    ];
}
