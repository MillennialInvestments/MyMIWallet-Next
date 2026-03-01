<?php

declare(strict_types=1);

namespace App\Services;

use RuntimeException;
use Throwable;

/**
 * Phase 1 hardened service patch for atomic wallet mutations.
 * Source target: app/Services/WalletService.php
 */
class WalletService
{
    /**
     * Migration note:
     * Ensure unique idempotency protection on ledger transaction id:
     * ALTER TABLE bf_users_wallet_transactions
     *   ADD UNIQUE KEY uq_wallet_txn_transaction_id (transaction_id);
     */

    public function isTransactionSettled(string $transactionId): bool
    {
        $transactionId = trim($transactionId);
        if ($transactionId === '') {
            return false;
        }

        $row = db_connect()->table('bf_users_wallet_transactions')
            ->where('transaction_id', $transactionId)
            ->where('status', 'Completed')
            ->get()
            ->getRowArray();

        return ! empty($row);
    }

    public function processDeposit(int $walletId, float $amount, string $currency, int $userId, ?string $transactionRef = null): array
    {
        $currency = strtoupper(trim($currency));
        $transactionRef = trim((string) ($transactionRef ?? ''));
        if ($transactionRef === '') {
            $transactionRef = 'dep_' . uniqid('', true);
        }

        if ($this->isTransactionSettled($transactionRef)) {
            return ['status' => 'already_settled', 'transaction_id' => $transactionRef];
        }

        $db = db_connect();

        try {
            $db->transStart();

            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
            if (! $wallet) {
                throw new RuntimeException('Wallet not found for deposit.');
            }

            $db->table('bf_users_wallet_transactions')->insert([
                'transaction_id' => $transactionRef,
                'status' => 'Pending',
                'active' => 'No',
                'user_id' => $userId,
                'wallet_id' => $walletId,
                'trans_type' => 'Deposit',
                'currency' => $currency,
                'amount' => $amount,
                'type' => 'Deposit',
                'unix_timestamp' => time(),
                'submitted_date' => date('Y-m-d H:i:s'),
            ]);

            $db->table('bf_users_wallet')
                ->set('amount', 'amount + ' . $db->escape($amount), false)
                ->where('id', $walletId)
                ->update();

            $db->table('bf_users_wallet_transactions')
                ->where('transaction_id', $transactionRef)
                ->update([
                    'status' => 'Completed',
                    'active' => 'Yes',
                    'deposit_date' => date('Y-m-d H:i:s'),
                ]);

            $db->transComplete();

            if (! $db->transStatus()) {
                throw new RuntimeException('Deposit transaction failed during commit.');
            }

            return ['status' => 'success', 'transaction_id' => $transactionRef];
        } catch (Throwable $e) {
            if ($db->transStatus() !== false) {
                $db->transRollback();
            }
            log_message('error', 'WalletService::processDeposit failed: {msg}', ['msg' => $e->getMessage()]);
            throw $e;
        }
    }

    public function processWithdrawal(int $walletId, float $amount, string $currency, int $userId, ?string $transactionRef = null): array
    {
        $currency = strtoupper(trim($currency));
        $transactionRef = trim((string) ($transactionRef ?? ''));
        if ($transactionRef === '') {
            $transactionRef = 'wd_' . uniqid('', true);
        }

        if ($this->isTransactionSettled($transactionRef)) {
            return ['status' => 'already_settled', 'transaction_id' => $transactionRef];
        }

        $db = db_connect();

        try {
            $db->transStart();

            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
            if (! $wallet) {
                throw new RuntimeException('Wallet not found for withdrawal.');
            }

            $currentAmount = (float) ($wallet['amount'] ?? 0);
            if ($currentAmount < $amount) {
                throw new RuntimeException('Insufficient wallet balance for withdrawal.');
            }

            $db->table('bf_users_wallet_transactions')->insert([
                'transaction_id' => $transactionRef,
                'status' => 'Pending',
                'active' => 'No',
                'user_id' => $userId,
                'wallet_id' => $walletId,
                'trans_type' => 'Withdraw',
                'currency' => $currency,
                'amount' => $amount,
                'type' => 'Withdraw',
                'unix_timestamp' => time(),
                'submitted_date' => date('Y-m-d H:i:s'),
            ]);

            $db->table('bf_users_wallet')
                ->set('amount', 'amount - ' . $db->escape($amount), false)
                ->where('id', $walletId)
                ->update();

            $db->table('bf_users_wallet_transactions')
                ->where('transaction_id', $transactionRef)
                ->update([
                    'status' => 'Completed',
                    'active' => 'Yes',
                    'withdraw_date' => date('Y-m-d H:i:s'),
                ]);

            $db->transComplete();

            if (! $db->transStatus()) {
                throw new RuntimeException('Withdrawal transaction failed during commit.');
            }

            return ['status' => 'success', 'transaction_id' => $transactionRef];
        } catch (Throwable $e) {
            if ($db->transStatus() !== false) {
                $db->transRollback();
            }
            log_message('error', 'WalletService::processWithdrawal failed: {msg}', ['msg' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Single atomic transfer with row-level lock on both wallets.
     */
    public function processTransfer(
        int $fromWalletId,
        int $toWalletId,
        float $amount,
        string $currency,
        int $userId,
        ?string $transactionRef = null
    ): array {
        $currency = strtoupper(trim($currency));
        $transactionRef = trim((string) ($transactionRef ?? ''));
        if ($transactionRef === '') {
            $transactionRef = 'xfer_' . uniqid('', true);
        }

        $outRef = $transactionRef . '_out';
        $inRef  = $transactionRef . '_in';

        if ($this->isTransactionSettled($outRef) && $this->isTransactionSettled($inRef)) {
            return [
                'status' => 'already_settled',
                'out_transaction_id' => $outRef,
                'in_transaction_id' => $inRef,
            ];
        }

        if ($fromWalletId === $toWalletId) {
            throw new RuntimeException('Source and destination wallets must differ.');
        }

        $db = db_connect();

        try {
            $db->transStart();

            $first = min($fromWalletId, $toWalletId);
            $second = max($fromWalletId, $toWalletId);

            $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$first]);
            $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$second]);

            $fromWallet = $db->table('bf_users_wallet')->where('id', $fromWalletId)->get()->getRowArray();
            $toWallet = $db->table('bf_users_wallet')->where('id', $toWalletId)->get()->getRowArray();

            if (! $fromWallet || ! $toWallet) {
                throw new RuntimeException('One or both wallets do not exist.');
            }

            $fromBalance = (float) ($fromWallet['amount'] ?? 0);
            if ($fromBalance < $amount) {
                throw new RuntimeException('Insufficient balance for transfer.');
            }

            $db->table('bf_users_wallet')->set('amount', 'amount - ' . $db->escape($amount), false)->where('id', $fromWalletId)->update();
            $db->table('bf_users_wallet')->set('amount', 'amount + ' . $db->escape($amount), false)->where('id', $toWalletId)->update();

            $now = date('Y-m-d H:i:s');

            // ledger row 1: withdrawal leg
            $db->table('bf_users_wallet_transactions')->insert([
                'transaction_id' => $outRef,
                'status' => 'Completed',
                'active' => 'Yes',
                'user_id' => $userId,
                'wallet_id' => $fromWalletId,
                'trans_type' => 'Transfer Out',
                'currency' => $currency,
                'amount' => $amount,
                'type' => 'Transfer',
                'withdraw_date' => $now,
                'unix_timestamp' => time(),
                'submitted_date' => $now,
            ]);

            // ledger row 2: deposit leg
            $db->table('bf_users_wallet_transactions')->insert([
                'transaction_id' => $inRef,
                'status' => 'Completed',
                'active' => 'Yes',
                'user_id' => $userId,
                'wallet_id' => $toWalletId,
                'trans_type' => 'Transfer In',
                'currency' => $currency,
                'amount' => $amount,
                'type' => 'Transfer',
                'deposit_date' => $now,
                'unix_timestamp' => time(),
                'submitted_date' => $now,
            ]);

            $db->transComplete();

            if (! $db->transStatus()) {
                throw new RuntimeException('Transfer transaction failed during commit.');
            }

            return [
                'status' => 'success',
                'out_transaction_id' => $outRef,
                'in_transaction_id' => $inRef,
            ];
        } catch (Throwable $e) {
            if ($db->transStatus() !== false) {
                $db->transRollback();
            }
            log_message('error', 'WalletService::processTransfer failed: {msg}', ['msg' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Atomic PayPal callback settlement via service layer.
     */
    public function processPayPalPurchaseCallback(
        int $walletId,
        float $amount,
        string $currency,
        int $userId,
        string $transactionId,
        string $purchaseIdentifier,
        ?string $userEmail = null,
        float $fees = 0.0
    ): array {
        $transactionId = trim($transactionId);
        if ($transactionId === '') {
            throw new RuntimeException('Missing callback transaction id.');
        }

        if ($this->isTransactionSettled($transactionId)) {
            return [
                'status' => 'already_settled',
                'transaction_id' => $transactionId,
            ];
        }

        $db = db_connect();

        try {
            $db->transStart();

            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
            if (! $wallet) {
                throw new RuntimeException('Wallet not found for callback settlement.');
            }

            $balance = (float) ($wallet['amount'] ?? 0);
            if ($balance < $amount) {
                throw new RuntimeException('Insufficient balance for callback settlement.');
            }

            $db->table('bf_users_wallet')->set('amount', 'amount - ' . $db->escape($amount), false)->where('id', $walletId)->update();

            $db->table('bf_users_wallet_transactions')->insert([
                'transaction_id' => $transactionId,
                'status' => 'Completed',
                'active' => 'Yes',
                'user_id' => $userId,
                'wallet_id' => $walletId,
                'user_email' => $userEmail,
                'trans_type' => 'MyMI Gold Purchase',
                'currency' => strtoupper(trim($currency)),
                'amount' => $amount,
                'fees' => $fees,
                'type' => 'Purchase',
                'provider' => 'PayPal',
                'label' => $purchaseIdentifier,
                'withdraw_date' => date('Y-m-d H:i:s'),
                'unix_timestamp' => time(),
                'submitted_date' => date('Y-m-d H:i:s'),
            ]);

            $db->transComplete();

            if (! $db->transStatus()) {
                throw new RuntimeException('PayPal callback settlement failed during commit.');
            }

            return [
                'status' => 'success',
                'transaction_id' => $transactionId,
            ];
        } catch (Throwable $e) {
            if ($db->transStatus() !== false) {
                $db->transRollback();
            }
            log_message('error', 'WalletService::processPayPalPurchaseCallback failed: {msg}', ['msg' => $e->getMessage()]);
            throw $e;
        }
    }

    public function completeDeposit(string $transactionId): bool
    {
        $transactionId = trim($transactionId);
        if ($transactionId === '') {
            return false;
        }

        if ($this->isTransactionSettled($transactionId)) {
            return true;
        }

        $db = db_connect();
        $db->transStart();

        $db->table('bf_users_wallet_transactions')
            ->where('transaction_id', $transactionId)
            ->update([
                'status' => 'Completed',
                'active' => 'Yes',
                'deposit_date' => date('Y-m-d H:i:s'),
            ]);

        $db->transComplete();

        return $db->transStatus();
    }
}
