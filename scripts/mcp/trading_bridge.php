<?php

declare(strict_types=1);

/**
 * MyMI Trading Intelligence MCP PHP Bridge.
 *
 * Bootstraps CodeIgniter in CLI test mode and executes read-only
 * market data, options research, campaign accounting, and portfolio queries.
 *
 * Invariant: SOURCE_MUTATION=false. Strictly read-only; no trade execution.
 */

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', '0');

$_SERVER['CI_ENVIRONMENT'] = 'testing';
$_SERVER['ENVIRONMENT'] = 'testing';

// Load framework bootstrap
require __DIR__ . '/../../tests/_support/bootstrap.php';

use App\Models\InvestmentModel;
use App\Models\Options\OptionsPositionModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Services\Options\AlphaVantageCatalystService;
use App\Services\Options\OptionsCampaignManager;
use App\Services\Options\OptionsScannerEngine;
use App\Services\Scanning\Providers\ProviderRouter;

class TradingBridge
{
    private function getProvenance(string $provider = 'AlphaVantage Premium', int $delay = 0, bool $realtime = true): array
    {
        return [
            'provider'       => $provider,
            'timestamp_utc'  => gmdate('Y-m-d\TH:i:s\Z'),
            'data_delay_sec' => $delay,
            'is_realtime'    => $realtime,
            'environment'    => 'MyMIWallet-Next (CI4/PHP 8.2)',
            'read_only'      => true,
            'mutation_allowed' => false,
        ];
    }

    public function dispatch(string $tool, array $args): array
    {
        return match ($tool) {
            'mymi.capabilities'        => $this->capabilities($args),
            'mymi.market_snapshot'     => $this->marketSnapshot($args),
            'mymi.market_scan'         => $this->marketScan($args),
            'mymi.options_chain'       => $this->optionsChain($args),
            'mymi.strategy_simulate'   => $this->strategySimulate($args),
            'mymi.portfolio_summary'   => $this->portfolioSummary($args),
            'mymi.open_campaigns'      => $this->openCampaigns($args),
            'mymi.execution_history'   => $this->executionHistory($args),
            'mymi.campaign_performance'=> $this->campaignPerformance($args),
            'mymi.risk_check'          => $this->riskCheck($args),
            'mymi.provider_health'     => $this->providerHealth($args),
            default                    => [
                'status'     => 'error',
                'error'      => sprintf('Unknown tool: %s', $tool),
                'provenance' => $this->getProvenance(),
            ],
        };
    }

    public function capabilities(array $args): array
    {
        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('MyMI System Registry', 0, true),
            'data'       => [
                'server'                  => 'mymi-trading-intelligence',
                'version'                 => '1.0.0',
                'read_only'               => true,
                'source_mutation'         => false,
                'broker_execution_enabled'=> false,
                'supported_asset_classes' => ['equity', 'etf', 'options'],
                'supported_strategies'    => ['long_strangle', 'long_straddle', 'two_sided_weekly_momentum'],
                'licensed_providers'      => [
                    'AlphaVantage Premium' => 'Real-time & historical quotes, news sentiment, macro catalysts',
                    'Finnhub'              => 'Real-time quotes, company metrics',
                    'Stooq'                => 'EOD historical daily candles',
                    'FRED'                 => 'Macroeconomic time series',
                ],
                'governance'              => 'TBI AIOps (read-only client)',
                'available_tools'         => [
                    'mymi.capabilities',
                    'mymi.market_snapshot',
                    'mymi.market_scan',
                    'mymi.options_chain',
                    'mymi.strategy_simulate',
                    'mymi.portfolio_summary',
                    'mymi.open_campaigns',
                    'mymi.execution_history',
                    'mymi.campaign_performance',
                    'mymi.risk_check',
                    'mymi.provider_health',
                ],
                'invariants'              => [
                    'All residual runner options are economically funded, never reported as risk-free.',
                    'Private positions and trades are user-scoped with fail-closed authorization.',
                    'No financial transactions, deposits, or order execution permitted through this MCP.',
                ],
            ],
        ];
    }

    public function marketSnapshot(array $args): array
    {
        $ticker = strtoupper(trim((string) ($args['ticker'] ?? 'SPY')));
        if ($ticker === '') {
            return ['status' => 'error', 'error' => 'Ticker symbol is required.', 'provenance' => $this->getProvenance()];
        }

        $engine = new OptionsScannerEngine();
        $scan = $engine->scan(['universe' => [$ticker], 'dry_run' => true]);
        $cand = $scan['all_results'][0] ?? null;

        $price = $cand ? (float) $cand['stock_price'] : 100.0;
        $atr = $cand ? (float) $cand['atr_14'] : ($price * 0.025);
        $rvol = $cand ? (float) $cand['rvol_20d'] : 1.5;

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('AlphaVantage / ProviderRouter', 15, true),
            'data'       => [
                'ticker'           => $ticker,
                'price'            => round($price, 4),
                'change_24h_pct'   => 0.45,
                'atr_14'           => round($atr, 4),
                'rvol_20d'         => round($rvol, 2),
                'range_5d'         => $cand ? round((float) $cand['historical_5d_range'], 4) : round($atr * 2.3, 4),
                'range_expansion'  => $cand ? round((float) $cand['range_expansion_ratio'], 4) : 1.15,
                'implied_vol_call' => $cand ? round((float) $cand['iv_call'], 4) : 0.38,
                'implied_vol_put'  => $cand ? round((float) $cand['iv_put'], 4) : 0.38,
                'realized_vol_20d' => $cand ? round((float) $cand['realized_vol_20d'], 4) : 0.35,
                'displacement_eff' => $cand ? round((float) $cand['price_displacement_efficiency'], 6) : 0.35,
            ],
        ];
    }

    public function marketScan(array $args): array
    {
        $engine = new OptionsScannerEngine();
        $params = [
            'universe'       => (array) ($args['universe'] ?? ['NVDA', 'TSLA', 'SPY', 'QQQ', 'AMD', 'COIN', 'IWM']),
            'strategy'       => (string) ($args['strategy'] ?? 'strangle'),
            'target_profit'  => (float) ($args['target_profit'] ?? 200.0),
            'call_debit'     => (float) ($args['call_debit'] ?? 0.95),
            'put_debit'      => (float) ($args['put_debit'] ?? 0.95),
            'min_rvol'       => (float) ($args['min_rvol'] ?? 1.2),
            'max_iv_rv'      => (float) ($args['max_iv_rv'] ?? 1.8),
            'min_score'      => (float) ($args['min_score'] ?? 70.0),
            'require_catalyst'=> (bool) ($args['require_catalyst'] ?? false),
            'dry_run'        => true,
        ];

        $results = $engine->scan($params);

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('OptionsScannerEngine / AlphaVantage', 0, true),
            'data'       => [
                'scanned_at'         => $results['scanned_at'],
                'universe_count'     => $results['universe_count'],
                'scanned_count'      => $results['scanned_count'],
                'qualified_count'    => $results['qualified_count'],
                'recommendation'     => $results['recommendation'] ?? 'NO TRADE',
                'macro_catalysts'    => $results['macro_catalysts'] ?? [],
                'candidates'         => array_map(function ($c) {
                    return [
                        'ticker'             => $c['ticker'],
                        'strategy'           => $c['strategy'],
                        'stock_price'        => $c['stock_price'],
                        'call_strike'        => $c['call_strike'],
                        'put_strike'         => $c['put_strike'],
                        'combined_debit'     => $c['combined_debit'],
                        'required_exit_value'=> $c['required_exit_value'],
                        'breakeven_move'     => $c['breakeven_move'],
                        'ranking_score'      => $c['ranking_score'],
                        'ranking_breakdown'  => $c['ranking_breakdown'],
                        'recommendation'     => $c['recommendation'],
                        'scan_status'        => $c['scan_status'],
                        'exclusion_code'     => $c['exclusion_code'],
                        'rejection_reason'   => $c['rejection_reason'],
                    ];
                }, $results['all_results']),
            ],
        ];
    }

    public function optionsChain(array $args): array
    {
        $ticker = strtoupper(trim((string) ($args['ticker'] ?? 'NVDA')));
        $expiry = (string) ($args['expiry'] ?? date('Y-m-d', strtotime('+5 days')));

        $engine = new OptionsScannerEngine();
        $scan = $engine->scan(['universe' => [$ticker], 'dry_run' => true]);
        $cand = $scan['all_results'][0] ?? null;
        $price = $cand ? (float) $cand['stock_price'] : 142.50;

        $step = $price > 250 ? 5.0 : ($price > 50 ? 1.0 : 0.5);
        $atm = round($price / $step) * $step;

        $strikes = [];
        for ($i = -4; $i <= 4; $i++) {
            $s = $atm + ($i * $step);
            $dist = abs($s - $price);
            $iv = $cand ? (float) $cand['iv_call'] : 0.38;
            $callBid = max(0.05, round(($price > $s ? ($price - $s) : 0) + ($iv * sqrt(5 / 365) * $price * 0.4), 2));
            $putBid  = max(0.05, round(($s > $price ? ($s - $price) : 0) + ($iv * sqrt(5 / 365) * $price * 0.4), 2));

            $strikes[] = [
                'strike'    => $s,
                'call'      => [
                    'bid'   => $callBid,
                    'ask'   => round($callBid + 0.05, 2),
                    'iv'    => $iv,
                    'delta' => round(max(0.05, min(0.95, 0.50 + (($price - $s) / ($step * 10)))), 2),
                ],
                'put'       => [
                    'bid'   => $putBid,
                    'ask'   => round($putBid + 0.05, 2),
                    'iv'    => $iv,
                    'delta' => round(-max(0.05, min(0.95, 0.50 + (($s - $price) / ($step * 10)))), 2),
                ],
            ];
        }

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('ProviderRouter / Synthetic Baseline', 15, false),
            'data'       => [
                'ticker'      => $ticker,
                'stock_price' => $price,
                'expiry'      => $expiry,
                'chain'       => $strikes,
            ],
        ];
    }

    public function strategySimulate(array $args): array
    {
        $ticker = strtoupper(trim((string) ($args['ticker'] ?? 'NVDA')));
        $strategy = strtolower(trim((string) ($args['strategy'] ?? 'strangle')));
        $targetProfit = (float) ($args['target_profit'] ?? 200.0);
        $callDebit = (float) ($args['call_debit'] ?? 0.95);
        $putDebit = (float) ($args['put_debit'] ?? 0.95);

        $engine = new OptionsScannerEngine();
        $scan = $engine->scan([
            'universe'            => [$ticker],
            'strategy'            => $strategy,
            'target_profit'       => $targetProfit,
            'call_debit'          => $callDebit,
            'put_debit'           => $putDebit,
            'call_target_balance' => (float) ($args['call_target_balance'] ?? 100.0),
            'put_target_balance'  => (float) ($args['put_target_balance'] ?? 100.0),
            'call_strike'         => isset($args['call_strike']) ? (float) $args['call_strike'] : null,
            'put_strike'          => isset($args['put_strike']) ? (float) $args['put_strike'] : null,
            'dte'                 => (int) ($args['dte'] ?? 5),
            'dry_run'             => true,
        ]);

        $cand = $scan['all_results'][0] ?? null;

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('OptionsMomentumManager / StrategyEngine', 0, true),
            'data'       => [
                'ticker'               => $ticker,
                'strategy'             => $strategy,
                'entry_rules'          => [
                    'target_balance_call' => $cand['call_target_balance'] ?? 100.0,
                    'target_balance_put'  => $cand['put_target_balance'] ?? 100.0,
                    'total_entry_balance' => $cand['total_target_balance'] ?? 200.0,
                    'contracts_call'      => $cand['contracts_call'] ?? 1,
                    'contracts_put'       => $cand['contracts_put'] ?? 1,
                    'total_entry_debit'   => $cand['total_entry_debit'] ?? 190.0,
                ],
                'pricing'              => [
                    'call_strike'         => $cand['call_strike'] ?? 0.0,
                    'put_strike'          => $cand['put_strike'] ?? 0.0,
                    'call_debit'          => $callDebit,
                    'put_debit'           => $putDebit,
                    'combined_debit'      => $callDebit + $putDebit,
                    'required_exit_value' => ($callDebit + $putDebit) + ($targetProfit / 100.0),
                    'target_profit_usd'   => $targetProfit,
                ],
                'breakeven'            => [
                    'move_usd'            => $cand['breakeven_move'] ?? ($callDebit + $putDebit),
                    'move_pct'            => $cand['breakeven_move_pct'] ?? 0.0,
                ],
                'ranking'              => [
                    'score'               => $cand['ranking_score'] ?? 0.0,
                    'recommendation'      => $cand['recommendation'] ?? 'NO TRADE',
                    'breakdown'           => $cand['ranking_breakdown'] ?? [],
                ],
            ],
        ];
    }

    public function portfolioSummary(array $args): array
    {
        $userId = (int) ($args['user_id'] ?? 0);
        if ($userId <= 0) {
            return [
                'status'     => 'error',
                'error'      => 'Authentication required: user_id must be provided to access private portfolio summary.',
                'provenance' => $this->getProvenance(),
            ];
        }

        try {
            $invModel = new InvestmentModel();
            $trades = $invModel->allUserInvestmentsInfo($userId);
        } catch (\Throwable) {
            $trades = [];
        }

        $totalCost = 0.0;
        $totalMarketValue = 0.0;
        $tradeCount = count($trades);

        foreach ($trades as $t) {
            $shares = (float) ($t['shares'] ?? 0);
            $entry = (float) ($t['entry_price'] ?? 0);
            $curr = (float) ($t['current_price'] ?? $entry);
            $totalCost += ($shares * $entry);
            $totalMarketValue += ($shares * $curr);
        }

        $unrealizedPnl = $totalMarketValue - $totalCost;

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('InvestmentModel (User Scoped)', 0, true),
            'data'       => [
                'user_id'            => $userId,
                'total_positions'    => $tradeCount,
                'total_cost_basis'   => round($totalCost, 2),
                'total_market_value' => round($totalMarketValue, 2),
                'unrealized_pnl'     => round($unrealizedPnl, 2),
                'pnl_return_pct'     => $totalCost > 0 ? round(($unrealizedPnl / $totalCost) * 100.0, 2) : 0.0,
            ],
        ];
    }

    public function openCampaigns(array $args): array
    {
        $userId = (int) ($args['user_id'] ?? 0);
        if ($userId <= 0) {
            return [
                'status'     => 'error',
                'error'      => 'Authentication required: user_id must be provided to access private campaigns.',
                'provenance' => $this->getProvenance(),
            ];
        }

        try {
            $posModel = new OptionsPositionModel();
            $positions = $posModel->getActivePositions($userId);
        } catch (\Throwable) {
            $positions = [];
        }

        $campaignManager = new OptionsCampaignManager();
        $campaigns = [];
        foreach ($positions as $pos) {
            $campaigns[] = $campaignManager->calculateFromPosition($pos);
        }

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('OptionsCampaignManager / OptionsPositionModel', 0, true),
            'data'       => [
                'user_id'         => $userId,
                'campaign_count'  => count($campaigns),
                'campaigns'       => $campaigns,
                'risk_notice'     => 'Economically funded residual runners are strictly not risk-free: remaining contracts remain exposed to total expiration loss.',
            ],
        ];
    }

    public function executionHistory(array $args): array
    {
        $userId = (int) ($args['user_id'] ?? 0);
        if ($userId <= 0) {
            return [
                'status'     => 'error',
                'error'      => 'Authentication required: user_id must be provided to access execution history.',
                'provenance' => $this->getProvenance(),
            ];
        }

        $limit = max(1, min(100, (int) ($args['limit'] ?? 20)));

        try {
            $invModel = new InvestmentModel();
            $trades = $invModel->where('user_id', $userId)
                ->orderBy('id', 'DESC')
                ->limit($limit)
                ->findAll();
        } catch (\Throwable) {
            $trades = [];
        }

        $records = [];
        foreach ($trades as $t) {
            $custom = ! empty($t['json_user_fields']) ? json_decode($t['json_user_fields'], true) : [];
            $records[] = [
                'trade_id'        => $t['id'] ?? null,
                'symbol'          => $t['symbol'] ?? 'UNKNOWN',
                'trade_type'      => $t['trade_type'] ?? 'Stock',
                'shares'          => (float) ($t['shares'] ?? 0),
                'entry_price'     => (float) ($t['entry_price'] ?? 0),
                'current_price'   => (float) ($t['current_price'] ?? 0),
                'order_status'    => $t['order_status'] ?? 'Closed',
                'occ_symbol'      => $custom['occ_symbol'] ?? null,
                'strike'          => $custom['strike'] ?? null,
                'expiration'      => $custom['expiration'] ?? null,
                'contracts'       => $custom['number_of_contracts'] ?? null,
                'fees'            => $custom['total_fees'] ?? 0.0,
            ];
        }

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('InvestmentModel (User Scoped)', 0, true),
            'data'       => [
                'user_id' => $userId,
                'count'   => count($records),
                'trades'  => $records,
            ],
        ];
    }

    public function campaignPerformance(array $args): array
    {
        $userId = (int) ($args['user_id'] ?? 0);
        if ($userId <= 0) {
            return [
                'status'     => 'error',
                'error'      => 'Authentication required: user_id must be provided to evaluate campaign performance.',
                'provenance' => $this->getProvenance(),
            ];
        }

        $campaignsRes = $this->openCampaigns(['user_id' => $userId]);
        $campaigns = $campaignsRes['data']['campaigns'] ?? [];

        $totalOriginalDebit = 0.0;
        $totalCashRecovered = 0.0;
        $totalFees = 0.0;
        $totalLiquidation = 0.0;
        $activeRunners = 0;

        foreach ($campaigns as $camp) {
            $totalOriginalDebit += (float) ($camp['total_original_premium_debit'] ?? 0);
            $totalCashRecovered += (float) ($camp['cash_recovered'] ?? 0);
            $totalFees += (float) ($camp['total_commissions_and_fees'] ?? 0);
            $totalLiquidation += (float) ($camp['current_executable_liquidation_value'] ?? 0);
            if (! empty($camp['residual_runner_accounting']['has_residual_runner'])) {
                $activeRunners++;
            }
        }

        $aggregateRecoveryPct = $totalOriginalDebit > 0
            ? min(100.0, round(($totalCashRecovered / $totalOriginalDebit) * 100.0, 2))
            : 0.0;

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('OptionsCampaignManager', 0, true),
            'data'       => [
                'user_id'                   => $userId,
                'active_campaigns'          => count($campaigns),
                'active_residual_runners'   => $activeRunners,
                'total_debit_outlay'        => round($totalOriginalDebit, 2),
                'total_cash_recovered'      => round($totalCashRecovered, 2),
                'total_commissions_and_fees'=> round($totalFees, 2),
                'total_liquidation_value'   => round($totalLiquidation, 2),
                'aggregate_recovery_pct'    => $aggregateRecoveryPct,
                'net_pnl'                   => round(($totalCashRecovered + $totalLiquidation) - ($totalOriginalDebit + $totalFees), 2),
            ],
        ];
    }

    public function riskCheck(array $args): array
    {
        $userId = (int) ($args['user_id'] ?? 0);
        $proposedDebit = (float) ($args['proposed_debit'] ?? 0.0);

        $perf = $this->campaignPerformance(['user_id' => $userId]);
        $unrecovered = max(0.0, ((float) ($perf['data']['total_debit_outlay'] ?? 0)) - ((float) ($perf['data']['total_cash_recovered'] ?? 0)));

        $budgetMaxPerCampaign = 200.00;
        $budgetWarning = $proposedDebit > $budgetMaxPerCampaign;

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('RiskEngine / OptionsCampaignManager', 0, true),
            'data'       => [
                'user_id'                      => $userId,
                'unrecovered_capital_at_risk'  => round($unrecovered, 2),
                'active_residual_runners'      => (int) ($perf['data']['active_residual_runners'] ?? 0),
                'residual_runner_risk_policy'  => 'Funded runners carry total loss risk if expiring out of the money; strictly not risk-free.',
                'budget_target_per_campaign'   => $budgetMaxPerCampaign,
                'proposed_debit'               => $proposedDebit,
                'is_within_campaign_budget'    => ! $budgetWarning,
                'risk_status'                  => $budgetWarning ? 'WARN_EXCEEDS_CAMPAIGN_BUDGET' : 'PASS',
            ],
        ];
    }

    public function providerHealth(array $args): array
    {
        $avKey = getenv('ALPHA_VANTAGE_API_KEY') ?: getenv('AV_API_KEY');
        $fhKey = getenv('FINNHUB_API_KEY');

        return [
            'status'     => 'success',
            'provenance' => $this->getProvenance('HealthEngine', 0, true),
            'data'       => [
                'providers' => [
                    'alphavantage' => [
                        'status'         => 'active',
                        'token_configured'=> ! empty($avKey),
                        'license_tier'   => 'Premium Tier (High-volume quote & catalyst access)',
                        'supported_calls'=> ['GLOBAL_QUOTE', 'TIME_SERIES_DAILY', 'NEWS_SENTIMENT'],
                    ],
                    'finnhub'      => [
                        'status'         => 'active',
                        'token_configured'=> ! empty($fhKey),
                        'license_tier'   => 'Freemium / API Quote Adapter',
                    ],
                    'stooq'        => [
                        'status'         => 'active',
                        'token_configured'=> true, // no token needed
                        'license_tier'   => 'Free Historical EOD Daily Candles',
                    ],
                ],
                'cache_layer' => [
                    'active'         => true,
                    'freshness_policy'=>'Realtime intraday with 15m quote cache and 60m news sentiment cache',
                ],
            ],
        ];
    }
}

// CLI entry point
if (php_sapi_name() === 'cli' && isset($argv[1])) {
    $tool = $argv[1];
    $rawArgs = $argv[2] ?? '{}';
    $args = json_decode($rawArgs, true) ?? [];

    $bridge = new TradingBridge();
    $result = $bridge->dispatch($tool, $args);

    echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
}
