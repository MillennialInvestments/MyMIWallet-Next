<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class DynamicDataConfig extends BaseConfig
{
    public array $dataMappings = [
        'Dashboard' => [
            'index' => [
                'fetch' => ['marketData', 'userAssets', 'notifications'],
                'updateInterval' => 30000, // 30 seconds
            ],
            'account' => [
                'fetch' => ['accountDetails', 'billingData'],
                'updateInterval' => 60000, // 60 seconds
            ],
            'goals' => [
                'fetch' => ['goalProgress'],
                'updateInterval' => 30000, // 30 seconds
            ],
        ],
        'Exchange' => [
            'Solana' => [
                'fetch' => ['marketPrice', 'topTokens', 'userAssets'],
                'updateInterval' => 20000, // 20 seconds
            ],
        ],
    ];
}
