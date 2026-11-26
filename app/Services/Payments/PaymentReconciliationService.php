<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;

/**
 * GTM-035: Payment claims and ledger transaction reconciliation.
 *
 * Compares PayPal claims in bf_payment_claims against ledger entries
 * in bf_users_wallet_transactions to identify discrepancies, unfulfilled
 * orders, and orphaned ledger mutations.
 */
class PaymentReconciliationService
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * Run full reconciliation between payment claims and ledger transactions.
     *
     * @return array{
     *   timestamp: string,
     *   claims_count: int,
     *   reconciled_count: int,
     *   unfulfilled_count: int,
     *   discrepancy_count: int,
     *   unverified_count: int,
     *   orphaned_tx_count: int,
     *   total_verified_amount: float,
     *   total_ledger_amount: float,
     *   unfulfilled_claims: list<array<string, mixed>>,
     *   discrepancies: list<array<string, mixed>>,
     *   orphaned_transactions: list<array<string, mixed>>,
     *   status: string
     * }
     */
    public function reconcile(): array
    {
        $now = gmdate('Y-m-d H:i:s') . ' UTC';

        if (! $this->db->tableExists('bf_payment_claims')) {
            return [
                'timestamp'             => $now,
                'claims_count'          => 0,
                'reconciled_count'      => 0,
                'unfulfilled_count'     => 0,
                'discrepancy_count'     => 0,
                'unverified_count'      => 0,
                'orphaned_tx_count'     => 0,
                'total_verified_amount' => 0.0,
                'total_ledger_amount'   => 0.0,
                'unfulfilled_claims'    => [],
                'discrepancies'         => [],
                'orphaned_transactions' => [],
                'status'                => 'SKIPPED_NO_TABLE',
            ];
        }

        $claims = $this->db->table('bf_payment_claims')
            ->orderBy('id', 'ASC')
            ->limit(1000)
            ->get()
            ->getResultArray();

        $txTableExists = $this->db->tableExists('bf_users_wallet_transactions');
        $transactions = [];
        if ($txTableExists) {
            $txRows = $this->db->table('bf_users_wallet_transactions')
                ->whereIn('trans_type', ['MyMI Gold Purchase', 'Membership Purchase'])
                ->orWhere('type', 'Purchase')
                ->limit(1000)
                ->get()
                ->getResultArray();

            foreach ($txRows as $tx) {
                $txId = strtoupper(trim((string) ($tx['transaction_id'] ?? '')));
                if ($txId !== '') {
                    $transactions[$txId] = $tx;
                }
            }
        }

        $reconciledCount = 0;
        $unfulfilledCount = 0;
        $discrepancyCount = 0;
        $unverifiedCount = 0;
        $totalVerified = 0.0;
        $totalLedger = 0.0;

        $unfulfilledClaims = [];
        $discrepancies = [];
        $matchedTxIds = [];

        foreach ($claims as $claim) {
            $providerTxId = strtoupper(trim((string) ($claim['provider_txn_id'] ?? '')));
            $claimStatus  = (string) ($claim['status'] ?? '');
            $claimedAmt   = (float) ($claim['claimed_amount'] ?? 0);
            $verifiedAmt  = is_numeric($claim['verified_amount'] ?? null) ? (float) $claim['verified_amount'] : null;

            if ($verifiedAmt !== null) {
                $totalVerified += $verifiedAmt;
            }

            // Flag claimed vs verified discrepancy
            if ($verifiedAmt !== null && abs($claimedAmt - $verifiedAmt) > 0.01) {
                $discrepancyCount++;
                $discrepancies[] = [
                    'claim_id'        => (int) $claim['id'],
                    'provider_txn_id' => $providerTxId,
                    'user_id'         => (int) $claim['user_id'],
                    'claimed_amount'  => $claimedAmt,
                    'verified_amount' => $verifiedAmt,
                    'difference'      => round($claimedAmt - $verifiedAmt, 2),
                ];
            }

            // Handle unverified claims
            // A real payment that did not match its plan (MembershipFulfillmentService
            // holds these as review_*): money was taken, so a person must act.
            if (str_starts_with($claimStatus, 'review_')) {
                $unfulfilledCount++;
                $unfulfilledClaims[] = [
                    'claim_id'        => (int) $claim['id'],
                    'provider_txn_id' => $providerTxId,
                    'user_id'         => (int) $claim['user_id'],
                    'kind'            => (string) ($claim['kind'] ?? ''),
                    'verified_amount' => $verifiedAmt,
                    'status'          => $claimStatus,
                    'created_at'      => (string) ($claim['created_at'] ?? ''),
                ];
                continue;
            }

            if (! str_starts_with($claimStatus, 'verified') && $claimStatus !== 'fulfilled') {
                $unverifiedCount++;
                continue;
            }

            // Memberships are fulfilled in bf_users_subscriptions, auction balance in
            // the auction ledger and fund units in the fund ledger, not the wallet
            // ledger: a fulfilled claim of those kinds is reconciled as it stands.
            if (in_array((string) ($claim['kind'] ?? ''), ['membership', 'auction_topup', 'fund_units'], true) && $claimStatus === 'fulfilled') {
                $reconciledCount++;
                continue;
            }

            // Crypto checkout Gold purchases (Solana Pay, CryptoPay) are written to the ledger under a short id.
            $cryptoKey = \App\Libraries\SolanaPay\Fulfillers::ledgerKey((string) ($claim['provider'] ?? ''), trim((string) ($claim['provider_txn_id'] ?? '')));
            $ledgerKey = $cryptoKey !== null ? strtoupper($cryptoKey) : $providerTxId;

            // Check if matching ledger entry exists
            if (isset($transactions[$ledgerKey])) {
                $tx = $transactions[$ledgerKey];
                $matchedTxIds[$ledgerKey] = true;
                $txTotalCost = (float) ($tx['total_cost'] ?? $tx['amount'] ?? 0);
                $totalLedger += $txTotalCost;
                $reconciledCount++;
            } else {
                $unfulfilledCount++;
                $unfulfilledClaims[] = [
                    'claim_id'        => (int) $claim['id'],
                    'provider_txn_id' => $providerTxId,
                    'user_id'         => (int) $claim['user_id'],
                    'kind'            => (string) ($claim['kind'] ?? ''),
                    'verified_amount' => $verifiedAmt,
                    'status'          => $claimStatus,
                    'created_at'      => (string) ($claim['created_at'] ?? ''),
                ];
            }
        }

        // Identify orphaned transactions (ledger purchases with no matching claim)
        $orphanedTransactions = [];
        foreach ($transactions as $txId => $tx) {
            if (! isset($matchedTxIds[$txId])) {
                $orphanedTransactions[] = [
                    'transaction_id' => $txId,
                    'user_id'        => (int) ($tx['user_id'] ?? 0),
                    'amount'         => (float) ($tx['amount'] ?? 0),
                    'total_cost'     => (float) ($tx['total_cost'] ?? 0),
                    'submitted_date' => (string) ($tx['submitted_date'] ?? ''),
                ];
            }
        }

        $allOk = ($unfulfilledCount === 0 && $discrepancyCount === 0);

        return [
            'timestamp'             => $now,
            'claims_count'          => count($claims),
            'reconciled_count'      => $reconciledCount,
            'unfulfilled_count'     => $unfulfilledCount,
            'discrepancy_count'     => $discrepancyCount,
            'unverified_count'      => $unverifiedCount,
            'orphaned_tx_count'     => count($orphanedTransactions),
            'total_verified_amount' => round($totalVerified, 2),
            'total_ledger_amount'   => round($totalLedger, 2),
            'unfulfilled_claims'    => $unfulfilledClaims,
            'discrepancies'         => $discrepancies,
            'orphaned_transactions' => $orphanedTransactions,
            'status'                => $allOk ? 'RECONCILED' : 'DISCREPANCY_DETECTED',
        ];
    }
}
