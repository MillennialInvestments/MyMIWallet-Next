<?php

declare(strict_types=1);

namespace App\Commands\Exchange;

use App\Commands\SafeBaseCommand;
use App\Services\ExchangeService;
use CodeIgniter\CLI\CLI;

class Reconcile extends SafeBaseCommand
{
    protected $group       = 'Exchange';
    protected $name        = 'exchange:reconcile';
    protected $description = 'Audit and reconcile exchange order balances, ledger holds, and settlement consistency.';
    protected $usage       = 'exchange:reconcile [--asset=<symbol>] [--json]';
    protected $options     = [
        '--asset' => 'Filter by asset symbol (e.g. MYMI).',
        '--json'  => 'Output structured JSON report.',
    ];

    public function run(array $params)
    {
        $db = db_connect();
        if (! $db->tableExists('bf_exchanges_orders', false)) {
            if (array_key_exists('json', $params) || CLI::getOption('json') !== null) {
                CLI::write(json_encode([
                    'status' => 'PASS',
                    'reason' => 'tables_not_migrated',
                    'orders_audited' => 0,
                ], JSON_PRETTY_PRINT));
            } else {
                CLI::write('SEMANTIC_RESULT=PASS AUDITED=0 REASON=tables_not_migrated', 'yellow');
            }
            return 0;
        }

        $symbol = (string) ($params['asset'] ?? CLI::getOption('asset') ?? '');
        $isJson = array_key_exists('json', $params) || CLI::getOption('json') !== null;

        $service = new ExchangeService($db);
        $report  = $service->reconcileBalances($symbol !== '' ? $symbol : null);

        if ($isJson) {
            CLI::write(json_encode($report, JSON_PRETTY_PRINT));
            return $report['status'] === 'PASS' ? 0 : 1;
        }

        CLI::newLine();
        CLI::write('====================================================', 'cyan');
        CLI::write('      MYMI EXCHANGE RECONCILIATION AUDIT            ', 'cyan');
        CLI::write('====================================================', 'cyan');
        CLI::write(sprintf('Status:               %s', $report['status'] === 'PASS' ? CLI::color('PASS', 'green') : CLI::color('FAIL', 'red')));
        CLI::write(sprintf('Orders Audited:       %d', $report['orders_audited']));
        CLI::write(sprintf('  - Open:             %d', $report['open_orders_count']));
        CLI::write(sprintf('  - Closed/Filled:    %d', $report['closed_orders_count']));
        CLI::write(sprintf('  - Cancelled:        %d', $report['cancelled_orders_count']));
        CLI::write(sprintf('  - Partial:          %d', $report['partial_orders_count']));
        CLI::write(sprintf('Total Audited Volume: $%s', number_format((float) $report['total_volume_usd'], 2)));
        CLI::write(sprintf('Discrepancies:        %d', $report['discrepancies_count']));
        CLI::write(sprintf('Negative Balances:    %d', $report['negative_balances_count']));
        CLI::write('====================================================', 'cyan');

        if (! empty($report['discrepancies'])) {
            CLI::write('Discrepancies Detected:', 'red');
            foreach ($report['discrepancies'] as $disc) {
                CLI::write(sprintf('  [!] %s: %s', $disc['type'], $disc['message']), 'yellow');
            }
        }

        if (! empty($report['negative_balances'])) {
            CLI::write('Negative Balances Detected:', 'red');
            foreach ($report['negative_balances'] as $neg) {
                CLI::write(sprintf('  [!] User #%d currency %s has negative balance: %s', $neg['user_id'], $neg['currency'], $neg['available_balance'] ?? $neg['hold_balance']), 'red');
            }
        }

        CLI::newLine();
        CLI::write(sprintf('SEMANTIC_RESULT=%s DISCREPANCIES=%d NEGATIVE_BALANCES=%d', $report['status'], $report['discrepancies_count'], $report['negative_balances_count']));

        return $report['status'] === 'PASS' ? 0 : 1;
    }
}
