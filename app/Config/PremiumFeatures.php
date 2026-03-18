<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class PremiumFeatures extends BaseConfig
{
    /** @var array<string,int> */
    public array $tierWeights = [
        'guest' => -1,
        'free' => 0,
        'trial' => 1,
        'tier1' => 1,
        'tier2' => 2,
        'tier3' => 3,
        'premium' => 3,
    ];

    /** @var array<string,array<string,mixed>> */
    public array $catalog = [
        'budget.dashboard' => [
            'module' => 'Budget',
            'label' => 'Budget dashboard',
            'min_tier' => 'free',
            'trial' => true,
            'frontend' => ['Budget/index'],
            'backend' => ['App\\Modules\\User\\Controllers\\BudgetController::index'],
        ],
        'budget.forecasting' => [
            'module' => 'Budget',
            'label' => 'Budget forecasting',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'budget-forecasting',
            'user_flags' => ['personal_budgeting', 'features_activated'],
            'frontend' => ['Budget/Financial_Forecaster', 'Budget/forecast'],
            'backend' => ['App\\Modules\\User\\Controllers\\BudgetController::financialForecaster', 'App\\Modules\\User\\Controllers\\BudgetController::forecast'],
        ],
        'budget.financial_analysis' => [
            'module' => 'Budget',
            'label' => 'Budget financial analysis',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'budget-financial-analysis',
            'user_flags' => ['features_activated'],
            'frontend' => ['Budget/Financial_Analysis'],
            'backend' => ['App\\Modules\\User\\Controllers\\BudgetController::financialAnalysis'],
        ],
        'budget.connected_accounts' => [
            'module' => 'Budget',
            'label' => 'Connected account integrations',
            'min_tier' => 'tier2',
            'trial' => false,
            'identifier' => 'connected-accounts',
            'user_flags' => ['banking_integration', 'brokerage_integration', 'automated_integration'],
            'frontend' => ['Budget linked account controls'],
            'backend' => ['App\\Modules\\APIs\\Controllers\\BudgetAPIController linked account endpoints'],
        ],
        'investments.dashboard' => [
            'module' => 'Investments',
            'label' => 'Investments dashboard',
            'min_tier' => 'free',
            'trial' => true,
            'frontend' => ['Investments/index'],
            'backend' => ['App\\Modules\\User\\Controllers\\InvestmentsController::index'],
        ],
        'investments.watchlist' => [
            'module' => 'Investments',
            'label' => 'Watchlist',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'watchlist',
            'user_flags' => ['portfolio_manager', 'features_activated'],
            'frontend' => ['Investments watchlist widgets'],
            'backend' => ['App\\Modules\\User\\Controllers\\InvestmentsController::addWatchlist', 'App\\Modules\\User\\Controllers\\InvestmentsController::getUserWatchlist'],
        ],
        'investments.analytics' => [
            'module' => 'Investments',
            'label' => 'Investment analytics',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'investment-analytics',
            'user_flags' => ['portfolio_manager', 'features_activated'],
            'frontend' => ['Investments analytics cards'],
            'backend' => ['App\\Modules\\User\\Controllers\\InvestmentsController::forecastModal', 'App\\Modules\\APIs\\Controllers\\InvestmentsAPIController forecast endpoints'],
        ],
        'investments.realtime_data' => [
            'module' => 'Investments',
            'label' => 'Real-time data',
            'min_tier' => 'tier2',
            'trial' => false,
            'identifier' => 'real-time-data',
            'frontend' => ['Investments real-time widgets'],
            'backend' => ['App\\Modules\\User\\Controllers\\InvestmentsController::fetchRealTimeData'],
        ],
        'investments.retirement_planner' => [
            'module' => 'Investments',
            'label' => 'Retirement planner',
            'min_tier' => 'tier2',
            'trial' => false,
            'identifier' => 'retirement-planner',
            'user_flags' => ['investment_wallets', 'features_activated'],
            'frontend' => ['Investments/Retirement_Planner'],
            'backend' => ['App\\Modules\\User\\Controllers\\InvestmentsController::retirementPlanner'],
        ],
        'exchange.swap' => [
            'module' => 'Exchange',
            'label' => 'Swap execution',
            'min_tier' => 'tier2',
            'trial' => false,
            'identifier' => 'exchange-swap',
            'frontend' => ['Exchange/Solana/swap'],
            'backend' => ['App\\Modules\\Exchange\\Controllers\\SolanaController::executeSwap', 'App\\Modules\\User\\Controllers\\WalletsController::executeSwap'],
        ],
        'wallets.dashboard' => [
            'module' => 'Wallets',
            'label' => 'Wallet dashboard',
            'min_tier' => 'free',
            'trial' => true,
            'frontend' => ['Wallets/index'],
            'backend' => ['App\\Modules\\User\\Controllers\\WalletsController::index'],
        ],
        'wallets.account_integration' => [
            'module' => 'Wallets',
            'label' => 'Wallet integrations',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'wallet-integrations',
            'user_flags' => ['automated_integration', 'investment_wallets', 'features_activated'],
            'frontend' => ['Wallet connect/import/create actions'],
            'backend' => ['App\\Modules\\Exchange\\Controllers\\SolanaController wallet actions', 'App\\Modules\\Exchange\\Controllers\\MetaMaskController wallet actions'],
        ],
        'alerts.trade_alerts' => [
            'module' => 'Alerts',
            'label' => 'Trade alerts',
            'min_tier' => 'tier1',
            'trial' => true,
            'identifier' => 'trade-alerts',
            'user_flags' => ['trade_alerts', 'features_activated'],
            'frontend' => ['Alerts/Preview'],
            'backend' => ['App\\Modules\\User\\Controllers\\AlertsController', 'App\\Modules\\APIs\\Controllers\\ChatAPIController'],
        ],
    ];
}
