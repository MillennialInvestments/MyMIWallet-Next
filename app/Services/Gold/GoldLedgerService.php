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
 * 4. Per-user daily purchase cap (MYMIGOLD_DAILY_CAP_USD, default 2000 USD).
 * 5. Strictly closed-loop: NO transfer, withdraw, or cash-out methods exist.
 * 6. Cryptographically hash-chained entries.
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

        $latest = $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();

        return $latest ? (float) $latest['balance_after'] : 0.0;
    }

    /**
     * Credit Gold to a user's balance (purchase, refund, or admin credit).
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

        // Idempotency check: duplicate ref must return prior result without mutating balance
        $existing = $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->where('reference_type', $refType)
            ->where('reference_id', $refId)
            ->get()
            ->getRowArray();

        if ($existing !== null) {
            return [
                'ok'         => true,
                'idempotent' => true,
                'balance'    => (float) $existing['balance_after'],
                'entry_id'   => (int) $existing['id'],
            ];
        }

        // Enforce per-user daily purchase cap for new purchases
        if ($reason === 'purchase') {
            $dailyPurchased = $this->getDailyPurchasedUsd($userId);
            $cap = (float) env('MYMIGOLD_DAILY_CAP_USD', self::DEFAULT_DAILY_CAP_USD);
            if (($dailyPurchased + $amount) > $cap) {
                return [
                    'ok'              => false,
                    'error'           => 'daily_purchase_cap_exceeded',
                    'cap_usd'         => $cap,
                    'daily_purchased' => $dailyPurchased,
                    'attempted'       => $amount,
                ];
            }
        }

        $currentBalance = $this->getBalance($userId);
        $newBalance = round($currentBalance + $amount, 8);
        $prevHash = $this->getLatestHash($userId);
        $now = time();

        $hash = hash('sha256', sprintf(
            '%s:%d:%.8f:%.8f:%s:%s:%s:%d',
            $prevHash,
            $userId,
            $amount,
            $newBalance,
            $reason,
            $refType,
            $refId,
            $now
        ));

        $data = [
            'user_id'        => $userId,
            'amount_gold'    => $amount,
            'balance_after'  => $newBalance,
            'reason'         => $reason,
            'reference_type' => $refType,
            'reference_id'   => $refId,
            'prev_hash'      => $prevHash,
            'hash'           => $hash,
            'created_at'     => $now,
        ];

        try {
            $this->db->table(self::TABLE)->insert($data);
            $insertId = (int) $this->db->insertID();

            return [
                'ok'         => true,
                'idempotent' => false,
                'balance'    => $newBalance,
                'entry_id'   => $insertId,
            ];
        } catch (\Throwable $e) {
            // Race condition idempotency catch
            $race = $this->db->table(self::TABLE)
                ->where('user_id', $userId)
                ->where('reference_type', $refType)
                ->where('reference_id', $refId)
                ->get()
                ->getRowArray();

            if ($race !== null) {
                return [
                    'ok'         => true,
                    'idempotent' => true,
                    'balance'    => (float) $race['balance_after'],
                    'entry_id'   => (int) $race['id'],
                ];
            }

            return ['ok' => false, 'error' => 'ledger_insert_failed', 'msg' => $e->getMessage()];
        }
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

        // Idempotency check
        $existing = $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->where('reference_type', $refType)
            ->where('reference_id', $refId)
            ->get()
            ->getRowArray();

        if ($existing !== null) {
            return [
                'ok'         => true,
                'idempotent' => true,
                'balance'    => (float) $existing['balance_after'],
                'entry_id'   => (int) $existing['id'],
            ];
        }

        $currentBalance = $this->getBalance($userId);
        if ($currentBalance < $amount) {
            return [
                'ok'               => false,
                'error'            => 'insufficient_gold_balance',
                'current_balance'  => $currentBalance,
                'required_balance' => $amount,
            ];
        }

        $newBalance = round($currentBalance - $amount, 8);
        $prevHash = $this->getLatestHash($userId);
        $now = time();

        $hash = hash('sha256', sprintf(
            '%s:%d:%.8f:%.8f:%s:%s:%s:%d',
            $prevHash,
            $userId,
            -$amount,
            $newBalance,
            'spend',
            $refType,
            $refId,
            $now
        ));

        $data = [
            'user_id'        => $userId,
            'amount_gold'    => -$amount, // negative debit
            'balance_after'  => $newBalance,
            'reason'         => 'spend',
            'reference_type' => $refType,
            'reference_id'   => $refId,
            'prev_hash'      => $prevHash,
            'hash'           => $hash,
            'created_at'     => $now,
        ];

        try {
            $this->db->table(self::TABLE)->insert($data);
            $insertId = (int) $this->db->insertID();

            return [
                'ok'         => true,
                'idempotent' => false,
                'balance'    => $newBalance,
                'entry_id'   => $insertId,
            ];
        } catch (\Throwable $e) {
            return ['ok' => false, 'error' => 'ledger_spend_failed', 'msg' => $e->getMessage()];
        }
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

        // Purchases and spends in window
        $rows = $this->db->table(self::TABLE)
            ->where('created_at >=', $startAt)
            ->where('created_at <=', $endAt)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->getResultArray();

        $byDay = [];
        $totalPurchased = 0.0;
        $totalSpent = 0.0;

        foreach ($rows as $r) {
            $day = gmdate('Y-m-d', (int) $r['created_at']);
            $byDay[$day] ??= ['purchases' => 0.0, 'spends' => 0.0, 'count' => 0];
            $byDay[$day]['count']++;

            $amount = (float) $r['amount_gold'];
            if ($r['reason'] === 'purchase') {
                $byDay[$day]['purchases'] += $amount;
                $totalPurchased += $amount;
            } elseif ($r['reason'] === 'spend') {
                $abs = abs($amount);
                $byDay[$day]['spends'] += $abs;
                $totalSpent += $abs;
            }
        }

        return [
            'outstanding_balance' => $outstanding,
            'total_purchased'     => $totalPurchased,
            'total_spent'         => $totalSpent,
            'by_day'              => $byDay,
        ];
    }

    private function getLatestHash(int $userId): string
    {
        $latest = $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();

        return (string) ($latest['hash'] ?? '');
    }
}
