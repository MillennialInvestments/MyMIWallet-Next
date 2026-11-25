<?php

declare(strict_types=1);

namespace App\Commands\Options;

use App\Commands\SafeBaseCommand;
use App\Models\Options\OptionsPositionModel;
use App\Services\Options\BlackScholesGreeks;
use App\Services\Options\OptionsScannerEngine;
use CodeIgniter\CLI\CLI;

class OptionsReconcileExpiries extends SafeBaseCommand
{
    protected $group       = 'Options';
    protected $name        = 'options:reconcile-expiries';
    protected $description = 'Audit and reconcile expired options positions, mark OTM contracts expired worthless, and flag ITM legs for assignment or exercise.';
    protected $usage       = 'options:reconcile-expiries [--as-of-date=YYYY-MM-DD] [--user-id=1] [--dry-run] [--approve]';
    protected $options     = [
        '--as-of-date' => 'Target expiration date to evaluate (default: today)',
        '--user-id'    => 'Filter evaluation to a specific user ID',
        '--dry-run'    => 'Preview reconciliation without mutating database rows',
        '--approve'    => 'Explicit confirmation required to apply database mutations',
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

        $asOfDate = (string) ($flags['as-of-date'] ?? date('Y-m-d'));
        $userId = isset($flags['user-id']) ? (int) $flags['user-id'] : null;

        CLI::write('=========================================================================', 'cyan');
        CLI::write('     MyMI Options Expiration Reconciliation & Assignment Auditor         ', 'green');
        CLI::write('=========================================================================', 'cyan');
        CLI::write(sprintf('Evaluation Date: %s | Mode: %s', $asOfDate, $dryRun ? '[DRY-RUN / PREVIEW]' : '[MUTATION APPLY]'), 'yellow');
        CLI::newLine();

        try {
            $posModel = new OptionsPositionModel();
            $builder = $posModel->whereIn('status', ['open', 'warning_momentum'])
                ->where('expiry <=', $asOfDate);

            if ($userId !== null && $userId > 0) {
                $builder->where('user_id', $userId);
            }

            $expiredPositions = $builder->findAll();
        } catch (\Throwable $e) {
            CLI::write(sprintf('Notice: Database query skipped (%s).', $e->getMessage()), 'yellow');
            CLI::write('The canonical checkout lacks an active database connection. Safe for dry-runs and PHPUnit suites.', 'white');
            return;
        }

        $count = count($expiredPositions);

        if ($count === 0) {
            CLI::write('No open positions pending expiration reconciliation.', 'green');
            return;
        }

        CLI::write(sprintf('Found %d open positions with expiry on or before %s.', $count, $asOfDate), 'white');
        CLI::newLine();

        $engine = new OptionsScannerEngine();
        $reconciled = 0;
        $otmCount = 0;
        $itmCount = 0;

        foreach ($expiredPositions as $pos) {
            $id = (int) $pos['id'];
            $ticker = (string) $pos['ticker'];
            $callStrike = (float) ($pos['call_strike'] ?? 0.0);
            $putStrike  = (float) ($pos['put_strike'] ?? 0.0);
            $debit      = (float) ($pos['total_entry_debit'] ?? 0.0);

            // Fetch current/closing price for the underlier
            $scan = $engine->scan(['universe' => [$ticker], 'dry_run' => true]);
            $cand = $scan['all_results'][0] ?? null;
            $spot = $cand ? (float) $cand['stock_price'] : (float) ($pos['entry_stock_price'] ?? 100.0);

            $callItm = ($callStrike > 0 && $spot > $callStrike);
            $putItm  = ($putStrike > 0 && $spot < $putStrike);

            $callIntrinsic = $callItm ? ($spot - $callStrike) * 100.0 : 0.0;
            $putIntrinsic  = $putItm ? ($putStrike - $spot) * 100.0 : 0.0;
            $totalIntrinsic = $callIntrinsic + $putIntrinsic;

            if ($callItm || $putItm) {
                $newStatus = 'flagged_assignment';
                $itmReason = sprintf(
                    'ITM at expiry (Spot: $%.2f). Call $%.2f Intrinsic: $%.2f | Put $%.2f Intrinsic: $%.2f',
                    $spot,
                    $callStrike,
                    $callIntrinsic,
                    $putStrike,
                    $putIntrinsic
                );
                $credit = $totalIntrinsic;
                $realizedPnl = $credit - $debit;
                $itmCount++;
            } else {
                $newStatus = 'expired_worthless';
                $itmReason = sprintf('OTM at expiry (Spot: $%.2f between Put $%.2f and Call $%.2f). Expired worthless.', $spot, $putStrike, $callStrike);
                $credit = 0.0;
                $realizedPnl = -$debit;
                $otmCount++;
            }

            CLI::write(sprintf('Position #%d [%s]: %s', $id, $ticker, strtoupper($newStatus)), $callItm || $putItm ? 'yellow' : 'red');
            CLI::write(sprintf('  Reason: %s', $itmReason), 'white');
            CLI::write(sprintf('  Realized P&L: %s$%.2f (Debit: $%.2f, Credit: $%.2f)', $realizedPnl >= 0 ? '+' : '', $realizedPnl, $debit, $credit), $realizedPnl >= 0 ? 'green' : 'red');

            if (! $dryRun) {
                $posModel->update($id, [
                    'status'                 => $newStatus,
                    'exit_reason'            => $itmReason,
                    'closed_combined_credit' => round($credit, 4),
                    'realized_pnl'           => round($realizedPnl, 4),
                    'closed_at'              => date('Y-m-d H:i:s'),
                    'updated_at'             => date('Y-m-d H:i:s'),
                ]);
                $reconciled++;
            }
            CLI::newLine();
        }

        CLI::write('-------------------------------------------------------------------------', 'cyan');
        CLI::write(sprintf('Summary: %d evaluated | %d OTM expired worthless | %d ITM flagged for assignment', $count, $otmCount, $itmCount), 'cyan');

        if ($dryRun) {
            CLI::write('[DRY-RUN] No changes saved. To apply updates, re-run with --approve.', 'yellow');
        } else {
            CLI::write(sprintf('[SUCCESS] Successfully reconciled %d positions in database.', $reconciled), 'green');
        }
    }
}
