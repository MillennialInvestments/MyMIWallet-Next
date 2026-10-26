<?php

declare(strict_types=1);

namespace App\Commands\Options;

use App\Commands\SafeBaseCommand;
use App\Models\Options\OptionsScanCandidateModel;
use App\Services\Options\OptionsScannerEngine;
use CodeIgniter\CLI\CLI;
use Config\OptionsStrategy;

class OptionsScan extends SafeBaseCommand
{
    protected $group       = 'Options';
    protected $name        = 'options:scan';
    protected $description = 'Scan liquid weekly options with $100 Call / $100 Put target balance entry and $200 profit reachability.';
    protected $usage       = 'options:scan [--universe=NVDA,TSLA,AMD] [--balance-call=100] [--balance-put=100] [--profit=200] [--call=0.95] [--put=0.95] [--dte=5] [--min-rvol=1.2] [--dry-run]';
    protected $options     = [
        '--universe'     => 'Comma-separated ticker universe (default: NVDA,TSLA,AMD,COIN,SPY,QQQ,IWM)',
        '--balance-call' => 'Call leg target entry balance in USD (default: from config, $100.00)',
        '--balance-put'  => 'Put leg target entry balance in USD (default: from config, $100.00)',
        '--profit'       => 'Target net profit in USD (default: 200.0)',
        '--call'         => 'Call leg target debit in USD (default: 0.95)',
        '--put'          => 'Put leg target debit in USD (default: 0.95)',
        '--dte'          => 'Target days to expiration (default: 5)',
        '--min-rvol'     => 'Minimum relative volume (default: 1.2)',
        '--max-iv-rv'    => 'Maximum IV/RV ratio (default: 1.8)',
        '--dry-run'      => 'Preview scan without saving candidate rows',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

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

        $universeRaw = (string) ($flags['universe'] ?? '');
        $universe = $universeRaw !== '' ? explode(',', $universeRaw) : $cfg->universe;
        $callTargetBalance = isset($flags['balance-call']) ? (float) $flags['balance-call'] : $cfg->callTargetBalance;
        $putTargetBalance  = isset($flags['balance-put'])  ? (float) $flags['balance-put']  : $cfg->putTargetBalance;
        $targetProfit = isset($flags['profit']) ? (float) $flags['profit'] : $cfg->targetNetProfit;
        $callDebit = isset($flags['call']) ? (float) $flags['call'] : $cfg->defaultCallDebit;
        $putDebit = isset($flags['put']) ? (float) $flags['put'] : $cfg->defaultPutDebit;
        $dte = isset($flags['dte']) ? (int) $flags['dte'] : $cfg->defaultDte;
        $minRvol = isset($flags['min-rvol']) ? (float) $flags['min-rvol'] : $cfg->minRvol;
        $maxIvRv = isset($flags['max-iv-rv']) ? (float) $flags['max-iv-rv'] : $cfg->maxIvRv;

        CLI::write('=========================================================================', 'cyan');
        CLI::write('      MyMI Options Opportunity Scanner · Two-Sided Weekly Momentum       ', 'green');
        CLI::write('=========================================================================', 'cyan');
        CLI::write(sprintf('Target Balance: $%.2f Call + $%.2f Put = $%.2f Total Entry Balance', $callTargetBalance, $putTargetBalance, $callTargetBalance + $putTargetBalance), 'yellow');
        CLI::write(sprintf('Pricing Target: $%.2f Call + $%.2f Put = $%.2f Debit | Target Net Profit: +$%.2f', $callDebit, $putDebit, $callDebit + $putDebit, $targetProfit), 'white');
        CLI::write(sprintf('Universe: %s (%d tickers) | DTE: %d days | Min RVOL: %.2fx%s', implode(', ', $universe), count($universe), $dte, $minRvol, $dryRun ? ' [DRY-RUN]' : ''), 'white');
        CLI::newLine();

        $candidateModel = null;
        if (! $dryRun) {
            try {
                $candidateModel = new OptionsScanCandidateModel();
            } catch (\Throwable) {
                $candidateModel = null;
            }
        }

        $scanner = new OptionsScannerEngine($candidateModel);

        $result = $scanner->scan([
            'universe' => $universe,
            'target_profit' => $targetProfit,
            'call_debit' => $callDebit,
            'put_debit' => $putDebit,
            'call_target_balance' => $callTargetBalance,
            'put_target_balance' => $putTargetBalance,
            'dte' => $dte,
            'min_rvol' => $minRvol,
            'max_iv_rv' => $maxIvRv,
            'dry_run' => $dryRun,
        ]);

        CLI::write(sprintf('Scanned: %d tickers | Qualified: %d opportunities', $result['scanned_count'], $result['qualified_count']), 'green');
        CLI::newLine();

        // Print formatted table of results
        $headers = ['Ticker', 'Price', 'Call Strk', 'Put Strk', 'Target Bal', '5D Range', 'RVOL', 'Reachability', 'Score', 'Status'];
        $tableRows = [];

        foreach ($result['all_results'] as $r) {
            $tableRows[] = [
                $r['ticker'],
                sprintf('$%.2f', $r['stock_price']),
                sprintf('$%.0f', $r['call_strike']),
                sprintf('$%.0f', $r['put_strike']),
                sprintf('$%.0fC / $%.0fP', $r['call_target_balance'], $r['put_target_balance']),
                sprintf('$%.2f', $r['historical_5d_range']),
                sprintf('%.2fx', $r['rvol_20d']),
                sprintf('%.1f%%', $r['reachability_score']),
                sprintf('%.1f', $r['ranking_score']),
                $r['scan_status'] === 'qualified' ? 'QUALIFIED' : 'REJECTED',
            ];
        }

        CLI::table($tableRows, $headers);
        CLI::newLine();

        if (! empty($result['qualified_count'])) {
            CLI::write('Top Recommended Two-Sided Weekly Opportunities:', 'green');
            foreach ($result['top_ranked'] as $top) {
                if ($top['scan_status'] === 'qualified') {
                    CLI::write(sprintf(
                        ' -> %s: Score %.1f | Reachability %.1f%% | Call: $%.0f / Put: $%.0f | Req Move: $%.2f (%.2f%%) vs 5D Range: $%.2f',
                        $top['ticker'],
                        $top['ranking_score'],
                        $top['reachability_score'],
                        $top['call_strike'],
                        $top['put_strike'],
                        $top['target_move'],
                        $top['target_move_pct'],
                        $top['historical_5d_range']
                    ), 'yellow');
                }
            }
        } else {
            CLI::write('No candidates met strict criteria today (market conditions did not justify two-sided entry).', 'light_red');
        }

        return EXIT_SUCCESS;
    }
}
