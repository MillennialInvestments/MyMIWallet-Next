<?php

declare(strict_types=1);

namespace App\Services\Gold;

use CodeIgniter\Database\BaseConnection;

/**
 * Double-entry credit ledger for MyMI Gold closed-loop service credit.
 *
 * Invariants:
 * 1. Balance is strictly positive/non-negative (balance_after >= 0).
 * 2. Balance = sum of all entries for the user.
 * 3. Idempotent retries: duplicate (user_id, reference_type, reference_id) returns existing entry without double-mutation.
 * 4. Per-user daily purchase cap (MYMIGOLD_DAILY_CAP_USD, default 2000), checked before payment by purchaseAllowed().
 * 5. Concurrent writers cannot both build on the same latest entry (locking read + unique user_id/prev_hash).
 * 6. Strictly closed-loop: NO transfer, withdraw, or cash-out methods exist.
 * 7. Cryptographically hash-chained entries.
 */
class GoldLedgerService
{
    private const TABLE = 'bf_gold_ledger';
    public const DEFAULT_DAILY_CAP_USD = 2000.0;

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * Get the active Gold credit balance for a user.
     */
    public function getBalance(int $userId): float
    {
        if ($userId <= 0 || ! $this->db->tableExists(self::TABLE)) {
            return 0.0;
        }

        $latest = $this->latestEntry($userId);

        return $latest ? (float) $latest['balance_after'] : 0.0;
    }

    /**
     * Credit Gold to a user's balance (purchase, refund, or admin credit).
     *
     * A paid purchase is never refused here: the money has already arrived, so
     * the daily cap is enforced before payment with purchaseAllowed().
     *
     * @return array{ok: bool, idempotent?: bool, balance?: float, error?: string, entry_id?: int}
     */
    public function credit(int $userId, float $amount, string $reason, string $refType, string $refId): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'invalid_user'];
        }
        if ($amount <= 0) {
            return ['ok' => false, 'error' => 'amount_must_be_positive'];
        }
        if (! in_array($reason, ['purchase', 'refund', 'admin_credit'], true)) {
            return ['ok' => false, 'error' => 'invalid_credit_reason'];
        }

        return $this->append($userId, round($amount, 8), $reason, $refType, $refId);
    }

    /**
     * Whether a new purchase of $amount Gold fits the per-user daily cap.
     * Call before taking payment (checkout), never after.
     *
     * @return array{ok: bool, error?: string, cap_usd?: float, daily_purchased?: float, attempted?: float}
     */
    public function purchaseAllowed(int $userId, float $amount): array
    {
        $cap = (float) env('MYMIGOLD_DAILY_CAP_USD', self::DEFAULT_DAILY_CAP_USD);
        $dailyPurchased = $this->getDailyPurchasedUsd($userId);
        if (($dailyPurchased + $amount) > $cap) {
            return [
                'ok'              => false,
                'error'           => 'daily_purchase_cap_exceeded',
                'cap_usd'         => $cap,
                'daily_purchased' => $dailyPurchased,
                'attempted'       => $amount,
            ];
        }

        return ['ok' => true];
    }

    /**
     * Spend Gold for in-app services/features.
     * Fails closed if balance is insufficient (no negative balances permitted).
     *
     * @return array{ok: bool, idempotent?: bool, balance?: float, error?: string, entry_id?: int}
     */
    public function spend(int $userId, float $amount, string $refType, string $refId): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'invalid_user'];
        }
        if ($amount <= 0) {
            return ['ok' => false, 'error' => 'amount_must_be_positive'];
        }

        return $this->append($userId, -round($amount, 8), 'spend', $refType, $refId);
    }

    /**
     * Append one entry. The user's latest row is read with a locking read on
     * MySQL, and the unique (user_id, prev_hash) key added by
     * AddGoldLedgerChainUniqueKey makes two writers that read the same latest
     * row collide, so a concurrent spend can never reuse a stale balance.
     *
     * @return array{ok: bool, idempotent?: bool, balance?: float, error?: string, entry_id?: int}
     */
    private function append(int $userId, float $signed, string $reason, string $refType, string $refId): array
    {
        if (($prior = $this->findByRef($userId, $refType, $refId)) !== null) {
            return $this->idempotentResult($prior);
        }

        // Only the outermost transaction may clear a failed status afterwards;
        // inside a caller's transaction the failure must reach the caller.
        $ownsTransaction = (int) $this->db->transDepth === 0;
        $this->db->transStart();

        $latest = $this->latestEntry($userId, true);
        $currentBalance = $latest ? (float) $latest['balance_after'] : 0.0;
        $prevHash = (string) ($latest['hash'] ?? '');
        $newBalance = round($currentBalance + $signed, 8);

        if ($newBalance < 0) {
            $this->db->transComplete();

            return [
                'ok'               => false,
                'error'            => 'insufficient_gold_balance',
                'current_balance'  => $currentBalance,
                'required_balance' => abs($signed),
            ];
        }

        $now = time();
        $hash = hash('sha256', sprintf(
            '%s:%d:%.8f:%.8f:%s:%s:%s:%d',
            $prevHash,
            $userId,
            $signed,
            $newBalance,
            $reason,
            $refType,
            $refId,
            $now
        ));

        $error = null;
        try {
            $inserted = (bool) $this->db->table(self::TABLE)->insert([
                'user_id'        => $userId,
                'amount_gold'    => $signed,
                'balance_after'  => $newBalance,
                'reason'         => $reason,
                'reference_type' => $refType,
                'reference_id'   => $refId,
                'prev_hash'      => $prevHash,
                'hash'           => $hash,
                'created_at'     => $now,
            ]);
            $insertId = $inserted ? (int) $this->db->insertID() : 0;
        } catch (\Throwable $e) {
            $inserted = false;
            $insertId = 0;
            $error = $e->getMessage();
        }

        $this->db->transComplete();
        $committed = $inserted && $this->db->transStatus() !== false;
        if (! $committed && $ownsTransaction) {
            // Strict mode would otherwise fail every later transaction on this
            // connection (for example the rest of a reconcile run).
            $this->db->resetTransStatus();
        }

        if ($committed) {
            return ['ok' => true, 'idempotent' => false, 'balance' => $newBalance, 'entry_id' => $insertId];
        }

        // Another request wrote the same reference first: report its result.
        if (($race = $this->findByRef($userId, $refType, $refId)) !== null) {
            return $this->idempotentResult($race);
        }

        // Another entry for this user landed first: nothing was written, the caller may retry.
        return ['ok' => false, 'error' => 'ledger_conflict_retry', 'msg' => (string) $error];
    }

    private function findByRef(int $userId, string $refType, string $refId): ?array
    {
        return $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->where('reference_type', $refType)
            ->where('reference_id', $refId)
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    private function idempotentResult(array $row): array
    {
        return [
            'ok'         => true,
            'idempotent' => true,
            'balance'    => (float) $row['balance_after'],
            'entry_id'   => (int) $row['id'],
        ];
    }

    private function latestEntry(int $userId, bool $forUpdate = false): ?array
    {
        if ($forUpdate && $this->db->DBDriver === 'MySQLi') {
            $row = $this->db->query(
                'SELECT id, balance_after, hash FROM ' . $this->db->prefixTable(self::TABLE)
                . ' WHERE user_id = ? ORDER BY id DESC LIMIT 1 FOR UPDATE',
                [$userId]
            )->getRowArray();

            return $row ?: null;
        }

        return $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    /**
     * Total USD/Gold purchased in the rolling 24-hour window by user.
     */
    public function getDailyPurchasedUsd(int $userId): float
    {
        if ($userId <= 0 || ! $this->db->tableExists(self::TABLE)) {
            return 0.0;
        }

        $cutoff = time() - 86400;
        $row = $this->db->table(self::TABLE)
            ->selectSum('amount_gold', 'total')
            ->where('user_id', $userId)
            ->where('reason', 'purchase')
            ->where('created_at >=', $cutoff)
            ->get()
            ->getRowArray();

        return (float) ($row['total'] ?? 0.0);
    }

    /**
     * Reports: total outstanding deferred revenue balance, purchases, and spends.
     */
    public function reports(int $startAt = 0, int $endAt = 0): array
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return ['outstanding_balance' => 0.0, 'purchases_usd' => 0.0, 'spends_usd' => 0.0, 'by_day' => []];
        }

        $endAt = $endAt > 0 ? $endAt : time();
        $startAt = $startAt > 0 ? $startAt : ($endAt - (30 * 86400));

        // Total outstanding Gold across all users = sum of net amount_gold
        $totalRow = $this->db->table(self::TABLE)->selectSum('amount_gold', 'net_gold')->get()->getRowArray();
        $outstanding = (float) ($totalRow['net_gold'] ?? 0.0);

        // Purchases and spends in window, aggregated per UTC day (at most 92
        // days, so the report never loads raw ledger rows).
        $startAt = max($startAt, $endAt - (92 * 86400));
        $byDay = [];
        $totalPurchased = 0.0;
        $totalSpent = 0.0;

        for ($dayStart = $startAt - ($startAt % 86400); $dayStart <= $endAt; $dayStart += 86400) {
            $rows = $this->db->table(self::TABLE)
                ->select('reason')
                ->selectSum('amount_gold', 'total')
                ->selectCount('id', 'n')
                ->where('created_at >=', max($startAt, $dayStart))
                ->where('created_at <', min($endAt + 1, $dayStart + 86400))
                ->whereIn('reason', ['purchase', 'spend'])
                ->groupBy('reason')
                ->get()
                ->getResultArray();

            foreach ($rows as $r) {
                $day = gmdate('Y-m-d', $dayStart);
                $byDay[$day] ??= ['purchases' => 0.0, 'spends' => 0.0, 'count' => 0];
                $byDay[$day]['count'] += (int) $r['n'];
                $sum = (float) $r['total'];
                if ($r['reason'] === 'purchase') {
                    $byDay[$day]['purchases'] += $sum;
                    $totalPurchased += $sum;
                } else {
                    $byDay[$day]['spends'] += abs($sum);
                    $totalSpent += abs($sum);
                }
            }
        }

        return [
            'outstanding_balance' => $outstanding,
            'total_purchased'     => $totalPurchased,
            'total_spent'         => $totalSpent,
            'by_day'              => $byDay,
        ];
    }
}
