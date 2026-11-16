<?php

declare(strict_types=1);

namespace App\Commands\Gtm;

use App\Commands\SafeBaseCommand;
use App\Services\Payments\PaymentReconciliationService;
use CodeIgniter\CLI\CLI;

/**
 * GTM Payment Reconciliation Command
 *
 * Compares PayPal claims in bf_payment_claims against ledger mutations in
 * bf_users_wallet_transactions to audit consistency, single-use enforcement,
 * and detect unfulfilled or mismatched payments.
 */
class PaymentReconciliation extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:payments:reconcile';
    protected $description = 'Audit and reconcile payment claims against wallet ledger transactions.';

    public function run(array $params)
    {
        CLI::write('===== MyMI Wallet Payment & Webhook Reconciliation Audit =====', 'yellow');
        CLI::write('Timestamp: ' . gmdate('Y-m-d H:i:s') . ' UTC', 'white');
        CLI::newLine();

        $service = new PaymentReconciliationService();
        $report = $service->reconcile();

        if ($report['status'] === 'SKIPPED_NO_TABLE') {
            CLI::write('NOTE: Table bf_payment_claims does not exist in active database. Reconciliation skipped.', 'yellow');
            return 0;
        }

        $thead = ['Metric', 'Count / Value'];
        $tbody = [
            ['Total Claims Audited', (string) $report['claims_count']],
            ['Reconciled & Matched Claims', CLI::color((string) $report['reconciled_count'], 'green')],
            ['Unfulfilled Claims', CLI::color((string) $report['unfulfilled_count'], $report['unfulfilled_count'] === 0 ? 'green' : 'red')],
            ['Claim / Verified Discrepancies', CLI::color((string) $report['discrepancy_count'], $report['discrepancy_count'] === 0 ? 'green' : 'red')],
            ['Unverified Claims', (string) $report['unverified_count']],
            ['Orphaned Ledger Purchases', (string) $report['orphaned_tx_count']],
            ['Total Verified Amount', '$' . number_format($report['total_verified_amount'], 2)],
            ['Total Ledger Amount', '$' . number_format($report['total_ledger_amount'], 2)],
        ];

        CLI::table($tbody, $thead);
        CLI::newLine();

        if (! empty($report['discrepancies'])) {
            CLI::write('--- Discrepancies Detected ---', 'red');
            foreach ($report['discrepancies'] as $d) {
                CLI::write("  - Claim #{$d['claim_id']} ({$d['provider_txn_id']}): Claimed \${$d['claimed_amount']} vs Verified \${$d['verified_amount']} (Diff: \${$d['difference']})", 'red');
            }
            CLI::newLine();
        }

        if (! empty($report['unfulfilled_claims'])) {
            CLI::write('--- Unfulfilled Verified Claims ---', 'red');
            foreach ($report['unfulfilled_claims'] as $u) {
                CLI::write("  - Claim #{$u['claim_id']} ({$u['provider_txn_id']}): User #{$u['user_id']} ({$u['kind']}) \${$u['verified_amount']} - status: {$u['status']}", 'red');
            }
            CLI::newLine();
        }

        if ($report['status'] === 'RECONCILED') {
            CLI::write('RECONCILIATION RESULT: PASS (All verified claims are strictly reconciled with ledger).', 'green');
            return 0;
        }

        CLI::write('RECONCILIATION RESULT: AUDIT_REQUIRED (Discrepancies or unfulfilled claims detected).', 'yellow');
        return 1;
    }
}
