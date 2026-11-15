<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\WalletModel;
use CodeIgniter\Database\BaseConnection;
use Throwable;

/**
 * MYMI-GT-FORM-LEDGER-001 (F4): owner-scoped, atomic wallet balance changes.
 *
 * Each deposit or withdrawal is one database transaction that:
 *  1. checks the wallet belongs to the acting user (same "wallet_not_found"
 *     answer for missing and foreign wallets, so ids cannot be probed),
 *  2. changes the balance with the owner and (for withdrawals) the
 *     no-overdraft predicate in the UPDATE itself,
 *  3. writes exactly one ledger row for the same amount.
 * If any step fails, everything is rolled back: the balance change always
 * equals the sum of its ledger rows.
 *
 * A non-empty $requestId (a per-form nonce) makes the call idempotent: a
 * repeated submission returns "duplicate_request" and changes nothing.
 */
final class WalletBalanceService
{
    public const TYPE_DEPOSIT    = 'Deposit';
    public const TYPE_WITHDRAWAL = 'Withdrawal';

    private BaseConnection $db;

    public function __construct(
        ?BaseConnection $db = null,
        private readonly string $walletTable = 'bf_users_wallet',
        private readonly string $ledgerTable = 'bf_users_wallet_transactions'
    ) {
        $this->db = $db ?? db_connect();
    }

    /** @return array{ok: bool, reason: string, transaction_id?: string, amount?: string, balance?: string} */
    public function deposit(int $userId, int $walletId, mixed $amount, string $requestId = ''): array
    {
        return $this->apply(self::TYPE_DEPOSIT, $userId, $walletId, $amount, $requestId);
    }

    /** @return array{ok: bool, reason: string, transaction_id?: string, amount?: string, balance?: string} */
    public function withdraw(int $userId, int $walletId, mixed $amount, string $requestId = ''): array
    {
        return $this->apply(self::TYPE_WITHDRAWAL, $userId, $walletId, $amount, $requestId);
    }

    private function apply(string $type, int $userId, int $walletId, mixed $amount, string $requestId): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'unauthenticated'];
        }
        if ($walletId <= 0) {
            return ['ok' => false, 'reason' => 'wallet_not_found'];
        }
        $value = WalletModel::normalizeAmount($amount);
        if ($value === null) {
            return ['ok' => false, 'reason' => 'invalid_amount'];
        }

        $txId = $requestId !== ''
            ? 'WTX-' . substr(hash('sha256', $userId . '|' . $walletId . '|' . $type . '|' . $requestId), 0, 24)
            : 'WTX-' . bin2hex(random_bytes(12));

        if ($this->db->transDepth === 0) {
            // A failed query in an earlier call leaves transStatus false; start clean.
            $this->db->resetTransStatus();
        }
        if (! $this->db->transBegin()) {
            return ['ok' => false, 'reason' => 'transactions_unavailable'];
        }

        try {
            $owned = $this->db->table($this->walletTable)
                ->select('id')
                ->where('id', $walletId)
                ->where('user_id', $userId)
                ->get();
            if ($owned === false || $owned->getRowArray() === null) {
                return $this->fail('wallet_not_found');
            }

            if ($requestId !== '') {
                $dup = $this->db->table($this->ledgerTable)->select('id')->where('transaction_id', $txId)->get();
                if ($dup === false) {
                    return $this->fail('ledger_read_failed');
                }
                if ($dup->getRowArray() !== null) {
                    return $this->fail('duplicate_request', ['transaction_id' => $txId]);
                }
            }

            // $value is a normalised positive decimal string (digits and one dot), safe unescaped.
            $update = $this->db->table($this->walletTable)
                ->set('amount', 'amount ' . ($type === self::TYPE_DEPOSIT ? '+' : '-') . ' ' . $value, false)
                ->where('id', $walletId)
                ->where('user_id', $userId);
            if ($type === self::TYPE_WITHDRAWAL) {
                $update->where('amount >=', $value, false);
            }
            if ($update->update() === false || $this->db->affectedRows() !== 1) {
                return $this->fail($type === self::TYPE_WITHDRAWAL ? 'insufficient_funds' : 'balance_update_failed');
            }

            $now = time();
            $inserted = $this->db->table($this->ledgerTable)->insert([
                'transaction_id' => $txId,
                'user_id'        => $userId,
                'wallet_id'      => $walletId,
                'trans_type'     => $type,
                'type'           => $type,
                'amount'         => $value,
                'currency'       => 'USD',
                'status'         => 'Completed',
                'active'         => 'Yes',
                'unix_timestamp' => $now,
                'submitted_date' => date('Y-m-d H:i:s', $now),
            ]);
            if ($inserted === false) {
                return $this->fail('ledger_write_failed');
            }

            if ($this->db->transStatus() === false) {
                return $this->fail('transaction_failed');
            }
            $this->db->transCommit();
        } catch (Throwable $e) {
            log_message('error', 'WalletBalanceService {type} failed for wallet {wallet}: {msg}', [
                'type' => $type, 'wallet' => $walletId, 'msg' => $e->getMessage(),
            ]);

            return $this->fail('internal_error');
        }

        $row = $this->db->table($this->walletTable)->select('amount')->where('id', $walletId)->get()->getRowArray();

        return [
            'ok'             => true,
            'reason'         => 'completed',
            'transaction_id' => $txId,
            'amount'         => $value,
            'balance'        => (string) ($row['amount'] ?? ''),
        ];
    }

    private function fail(string $reason, array $extra = []): array
    {
        try {
            $this->db->transRollback();
        } catch (Throwable) {
            // nothing else to undo
        }

        return ['ok' => false, 'reason' => $reason] + $extra;
    }
}
