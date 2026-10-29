<?php

declare(strict_types=1);

namespace App\Commands\Options;

use App\Commands\SafeBaseCommand;
use App\Models\Options\OptionsExitAlertModel;
use App\Models\Options\OptionsPositionHistoryModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Models\Options\OptionsPositionModel;
use App\Services\Options\OptionsMomentumManager;
use CodeIgniter\CLI\CLI;
use Config\OptionsStrategy;

class OptionsSimulateStraddle extends SafeBaseCommand
{
    protected $group       = 'Options';
    protected $name        = 'options:simulate-straddle';
    protected $description = 'Open a simulated paper-trade weekly options straddle with $100 target balance per leg and $200 target profit.';
    protected $usage       = 'options:simulate-straddle [ticker] [--balance-call=100] [--balance-put=100] [--call-strike=143] [--put-strike=143] [--contracts=1] [--call=0.95] [--put=0.95] [--price=142.50] [--dte=5] [--dry-run]';
    protected $arguments   = [
        'ticker' => 'Ticker symbol (default: NVDA)',
    ];
    protected $options     = [
        '--strategy'     => 'Strategy structure: strangle (default, OTM strikes) or straddle (ATM strikes)',
        '--otm-offset'   => 'Out-of-the-money offset percentage for strangle strikes (default: 4.0)',
        '--balance-call' => 'Call leg target entry balance in USD (default: from config, $100.00)',
        '--balance-put'  => 'Put leg target entry balance in USD (default: from config, $100.00)',
        '--call-strike'  => 'Explicit Call strike price (default: ATM rounded)',
        '--put-strike'   => 'Explicit Put strike price (default: ATM rounded)',
        '--contracts'    => 'Override contract pairs count directly',
        '--call-contracts'=> 'Explicit Call contracts count (v7 independent sizing)',
        '--put-contracts' => 'Explicit Put contracts count (v7 independent sizing)',
        '--call'         => 'Call debit per contract (default: 0.95)',
        '--put'          => 'Put debit per contract (default: 0.95)',
        '--price'        => 'Underlying stock price (default: 142.50)',
        '--dte'              => 'Days to expiry (default: 5)',
        '--alphavantage-key' => 'AlphaVantage API key to inspect catalyst news',
        '--dry-run'          => 'Calculate and preview straddle economics without persisting to database',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        // Normalize flags with key=value
        foreach ($flags as $k => $v) {
            if (is_string($k) && str_contains($k, '=')) {
                [$realK, $realV] = explode('=', $k, 2);
                $flags[$realK] = $realV;
            }
        }

        $cfg = function_exists('config') ? config('OptionsStrategy') : new OptionsStrategy();
        if (! ($cfg instanceof OptionsStrategy)) {
            $cfg = new OptionsStrategy();
        }

        $ticker = strtoupper((string) ($args[0] ?? $flags['ticker'] ?? 'NVDA'));
        $callDebit = isset($flags['call']) ? (float) $flags['call'] : $cfg->defaultCallDebit;
        $putDebit = isset($flags['put']) ? (float) $flags['put'] : $cfg->defaultPutDebit;
        $stockPrice = isset($flags['price']) ? (float) $flags['price'] : 142.50;
        $dte = isset($flags['dte']) ? (int) $flags['dte'] : $cfg->defaultDte;

        // Target balance configuration ($100 Call / $100 Put)
        $callTargetBalance = isset($flags['balance-call']) ? (float) $flags['balance-call'] : $cfg->callTargetBalance;
        $putTargetBalance  = isset($flags['balance-put'])  ? (float) $flags['balance-put']  : $cfg->putTargetBalance;

        // Strategy & Strikes
        $strategy = (string) ($flags['strategy'] ?? $cfg->defaultStrategy ?? 'strangle');
        $otmOffset = isset($flags['otm-offset']) ? (float) $flags['otm-offset'] : ($cfg->defaultOtmOffsetPct ?? 2.6);
        $strikesOtm = isset($flags['strikes-otm']) ? (int) $flags['strikes-otm'] : ($cfg->defaultStrikesOtm ?? 2);
        $stepOverrides = $cfg->strikeStepOverrides ?? ['BA' => 2.50, 'AAPL' => 2.50, 'DIS' => 2.50];
        $stepSize = isset($flags['strike-step']) ? (float) $flags['strike-step'] : ($stepOverrides[$ticker] ?? ($stockPrice > 250.0 ? 5.0 : ($stockPrice > 50.0 ? 1.0 : 0.5)));
        $atmStrike = round($stockPrice / $stepSize) * $stepSize;

        if ($strategy === 'straddle') {
            $callStrike = isset($flags['call-strike']) ? (float) $flags['call-strike'] : $atmStrike;
            $putStrike  = isset($flags['put-strike'])  ? (float) $flags['put-strike']  : $atmStrike;
        } else {
            // Default: OTM Strangle (Brent Sweet Spot: 2 strikes out from ATM)
            if ($strikesOtm > 0 && (! isset($flags['otm-offset']) || (float) $flags['otm-offset'] === 2.6 || (float) $flags['otm-offset'] === 4.0)) {
                $defaultCall = $atmStrike + ($strikesOtm * $stepSize);
                $defaultPut  = $atmStrike - ($strikesOtm * $stepSize);
            } else {
                $defaultCall = round(($stockPrice * (1.0 + ($otmOffset / 100.0))) / $stepSize) * $stepSize;
                $defaultPut  = round(($stockPrice * (1.0 - ($otmOffset / 100.0))) / $stepSize) * $stepSize;
            }
            $callStrike = isset($flags['call-strike']) ? (float) $flags['call-strike'] : $defaultCall;
            $putStrike  = isset($flags['put-strike'])  ? (float) $flags['put-strike']  : $defaultPut;
        }

        // Contracts sizing (v7 supports independent Call & Put counts)
        if (isset($flags['call-contracts']) || isset($flags['put-contracts'])) {
            $contractsCall = max(0, (int) ($flags['call-contracts'] ?? 1));
            $contractsPut  = max(0, (int) ($flags['put-contracts'] ?? 1));
        } elseif (isset($flags['contracts'])) {
            $contractsCall = max(1, (int) $flags['contracts']);
            $contractsPut  = max(1, (int) $flags['contracts']);
        } else {
            $contractsCall = max(1, (int) round($callTargetBalance / ($callDebit * 100.0)));
            $contractsPut  = max(1, (int) round($putTargetBalance  / ($putDebit * 100.0)));
        }

        $contracts = max($contractsCall, $contractsPut);
        $actualOutlayCall = $contractsCall * $callDebit * 100.0;
        $actualOutlayPut  = $contractsPut * $putDebit * 100.0;
        $totalDebit = $actualOutlayCall + $actualOutlayPut;
        $combinedDebit = $callDebit + $putDebit; // $1.90
        $targetProfit = isset($flags['target-profit']) ? (float) $flags['target-profit'] : (float) $cfg->targetNetProfit; // default $200.00 net position profit
        $targetLiquidation = $totalDebit + $targetProfit;
        $targetExitPerPair = ($contractsCall + $contractsPut) > 0
            ? round(($targetLiquidation / (($contractsCall + $contractsPut) / 2.0)) / 100.0, 4)
            : ($combinedDebit + ($targetProfit / (100.0 * max(1, $contracts))));

        $callExpiryTarget = $contractsCall > 0 ? round($callStrike + ($targetLiquidation / ($contractsCall * 100.0)), 4) : 0.0;
        $putExpiryTarget  = $contractsPut  > 0 ? round($putStrike  - ($targetLiquidation / ($contractsPut  * 100.0)), 4) : 0.0;

        $uuid = sprintf('opt-%s-%s-%s', strtolower($ticker), date('Ymd-His'), bin2hex(random_bytes(4)));
        $expiry = date('Y-m-d', strtotime("+{$dte} days"));

        CLI::write('=========================================================================', 'cyan');
        CLI::write('         MyMI Weekly Options Momentum Strategy · Paper Position (v7)      ', 'green');
        CLI::write('=========================================================================', 'cyan');
        CLI::write(sprintf('Position UUID: %s%s | Strategy: %s', $uuid, $dryRun ? ' [DRY-RUN]' : '', strtoupper($strategy)), 'yellow');
        CLI::write(sprintf(' - Underlier: %s at $%.2f', $ticker, $stockPrice), 'white');
        CLI::write(sprintf(' - Call Leg: Strike $%.2f | Debit: $%.2f -> %d contract(s) ($%.2f outlay)', $callStrike, $callDebit, $contractsCall, $actualOutlayCall), 'white');
        CLI::write(sprintf(' - Put Leg:  Strike $%.2f | Debit: $%.2f -> %d contract(s) ($%.2f outlay)', $putStrike, $putDebit, $contractsPut, $actualOutlayPut), 'white');
        CLI::write(sprintf(' - Expiration: %s (%d DTE)', $expiry, $dte), 'white');
        CLI::write(sprintf(' - Total Outlay: $%.2f | Target Net Profit: +$%.2f | Liquidation Target: $%.2f', $totalDebit, $targetProfit, $targetLiquidation), 'yellow');
        CLI::write(sprintf(' - Expiration Targets: Call >= $%.2f | Put <= $%.2f', $callExpiryTarget, $putExpiryTarget), 'green');

        $avKey = $flags['alphavantage-key'] ?? null;
        $catalystSvc = new \App\Services\Options\AlphaVantageCatalystService($avKey);
        if ($catalystSvc->isConfigured()) {
            $cat = $catalystSvc->getTickerCatalyst($ticker);
            if ($cat['available']) {
                CLI::write(sprintf(' - AlphaVantage Catalyst: %s (%+.2f) | %s', $cat['sentiment_label'], $cat['sentiment_score'], $cat['catalyst_type']), 'cyan');
                if (! empty($cat['top_headline'])) {
                    CLI::write(sprintf('   Headline: "%s"', substr($cat['top_headline'], 0, 75)), 'white');
                }
            }
        }
        CLI::write(sprintf(' - Total Target Balance: $%.2f | Actual Total Outlay: $%.2f', $callTargetBalance + $putTargetBalance, $totalDebit), 'yellow');
        CLI::write(sprintf(' - Target Net Profit: +$%.2f', $targetProfit), 'yellow');
        CLI::write(sprintf(' - Required Combined Exit: $%.2f / pair ($%.2f total value)', $targetExitPerPair, $targetExitPerPair * 100 * $contracts), 'yellow');
        CLI::newLine();

        if ($dryRun) {
            CLI::write('Dry-run enabled. Position calculated successfully without database write.', 'green');
            return EXIT_SUCCESS;
        }

        try {
            $positionModel = new OptionsPositionModel();
            $legModel = new OptionsPositionLegModel();
            $historyModel = new OptionsPositionHistoryModel();
            $exitAlertModel = new OptionsExitAlertModel();

            $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel);

            $result = $manager->openSimulatedPosition(
                ticker: $ticker,
                callDebit: $callDebit,
                putDebit: $putDebit,
                contracts: $contracts,
                stockPrice: $stockPrice,
                dte: $dte,
                callStrike: $callStrike,
                putStrike: $putStrike,
                callTargetBalance: $callTargetBalance,
                putTargetBalance: $putTargetBalance,
                strategy: $strategy
            );

            CLI::write(sprintf('Successfully saved position #%d to database.', $result['position_id']), 'green');
            CLI::write('Position is now active and will be tracked by `php spark options:monitor`.', 'green');
        } catch (\Throwable $e) {
            CLI::write('NOTE: Database persistence skipped: ' . $e->getMessage(), 'yellow');
        }

        return EXIT_SUCCESS;
    }
}
