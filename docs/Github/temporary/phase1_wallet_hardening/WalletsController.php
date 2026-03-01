<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

/**
 * Phase 1 hardened controller patch for wallet mutation endpoints.
 * Source target: app/Modules/User/Controllers/WalletsController.php
 */
class WalletsController extends UserController
{
    private function jsonError(int $statusCode, string $message, array $errors = []): ResponseInterface
    {
        $payload = ['status' => 'error', 'message' => $message];
        if ($errors !== []) {
            $payload['errors'] = $errors;
        }

        return $this->response->setStatusCode($statusCode)->setJSON($payload);
    }

    private function jsonSuccess(string $message, array $data = [], int $statusCode = 200): ResponseInterface
    {
        return $this->response->setStatusCode($statusCode)->setJSON([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ]);
    }

    private function ensureMutationAuth(): ?ResponseInterface
    {
        $userId = (int) ($this->resolveCurrentUserId() ?? 0);
        if ($userId <= 0) {
            return $this->jsonError(401, 'Unauthorized');
        }

        $this->cuID = $userId;
        return null;
    }

    private function requirePost(): ?ResponseInterface
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return $this->jsonError(400, 'Malformed payload: POST required.');
        }

        return null;
    }

    private function validateMutation(array $rules): ?ResponseInterface
    {
        if (! $this->validate($rules)) {
            return $this->jsonError(422, 'Validation failed.', $this->validator->getErrors());
        }

        return null;
    }

    public function add(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) {
                return $resp;
            }
            if ($resp = $this->requirePost()) {
                return $resp;
            }

            if ($resp = $this->validateMutation([
                'wallet_id' => 'permit_empty|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'wallet_type' => 'required|string|max_length[64]',
            ])) {
                return $resp;
            }

            $service = $this->getWalletService();
            if (! method_exists($service, 'create')) {
                return $this->jsonError(500, 'Wallet service create() not available.');
            }

            $payload = $this->request->getPost();
            $walletType = strtolower((string) ($payload['wallet_type'] ?? ''));
            $data = $this->mapFormToWalletData($walletType, $payload);
            $data['created_on'] = date('Y-m-d H:i:s');

            $walletId = $service->create($data);
            if (! $walletId) {
                return $this->jsonError(500, 'Wallet mutation failed.');
            }

            return $this->jsonSuccess('Wallet added successfully.', ['wallet_id' => (int) $walletId], 201);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::add failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Wallet mutation failed.');
        }
    }

    public function deposit(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'transaction_id' => 'permit_empty|string|max_length[255]',
            ])) return $resp;

            $walletId = (int) $this->request->getPost('wallet_id');
            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $tx = (string) ($this->request->getPost('transaction_id') ?? '');

            $result = $this->getWalletService()->processDeposit($walletId, $amount, $currency, (int) $this->cuID, $tx);
            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Deposit already settled.', ['transaction_id' => $result['transaction_id']]);
            }

            return $this->jsonSuccess('Deposit successful.', ['transaction_id' => $result['transaction_id'] ?? null]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::deposit failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Deposit mutation failed.');
        }
    }

    public function withdraw(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'transaction_id' => 'permit_empty|string|max_length[255]',
            ])) return $resp;

            $walletId = (int) $this->request->getPost('wallet_id');
            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $tx = (string) ($this->request->getPost('transaction_id') ?? '');

            $result = $this->getWalletService()->processWithdrawal($walletId, $amount, $currency, (int) $this->cuID, $tx);
            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Withdrawal already settled.', ['transaction_id' => $result['transaction_id']]);
            }

            return $this->jsonSuccess('Withdrawal successful.', ['transaction_id' => $result['transaction_id'] ?? null]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::withdraw failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Withdrawal mutation failed.');
        }
    }

    public function transferFunds(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'to_wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'transaction_id' => 'permit_empty|string|max_length[255]',
            ])) return $resp;

            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $fromWallet = (int) $this->request->getPost('wallet_id');
            $toWallet = (int) $this->request->getPost('to_wallet_id');
            $transactionId = (string) ($this->request->getPost('transaction_id') ?? '');

            $result = $this->getWalletService()->processTransfer(
                $fromWallet,
                $toWallet,
                $amount,
                $currency,
                (int) $this->cuID,
                $transactionId
            );

            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Transfer already settled.', [
                    'out_transaction_id' => $result['out_transaction_id'] ?? null,
                    'in_transaction_id' => $result['in_transaction_id'] ?? null,
                ]);
            }

            return $this->jsonSuccess('Transfer successful.', [
                'out_transaction_id' => $result['out_transaction_id'] ?? null,
                'in_transaction_id' => $result['in_transaction_id'] ?? null,
            ]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::transferFunds failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Transfer mutation failed.');
        }
    }

    public function purchase(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'purchase_identifier' => 'required|string|max_length[128]',
            ])) return $resp;

            $walletId = (int) $this->request->getPost('wallet_id');
            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $purchaseId = (string) $this->request->getPost('purchase_identifier');

            $result = $this->getWalletService()->processWithdrawal($walletId, $amount, $currency, (int) $this->cuID, 'purchase_' . $purchaseId);
            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Purchase already settled.', ['purchase_identifier' => $purchaseId]);
            }

            return $this->jsonSuccess('Purchase successful.', ['transaction_id' => $result['transaction_id'] ?? null], 201);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::purchase failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Purchase mutation failed.');
        }
    }

    public function purchaseComplete($coin = null, $trans_id = null): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'purchase_identifier' => 'required|string|max_length[128]',
            ])) return $resp;

            $purchaseId = (string) ($this->request->getPost('purchase_identifier') ?? $trans_id ?? '');
            if ($purchaseId === '') {
                return $this->jsonError(400, 'Malformed payload: purchase_identifier is required.');
            }

            if ($this->getWalletService()->isTransactionSettled($purchaseId)) {
                return $this->jsonSuccess('Purchase already settled.', ['purchase_identifier' => $purchaseId]);
            }

            $order = $this->mymigoldModel->getLastCompletedOrderInfo($purchaseId);
            if (! $order || (int) ($order['user_id'] ?? 0) !== (int) $this->cuID) {
                return $this->jsonError(401, 'Unauthorized');
            }

            return $this->jsonSuccess('Purchase completion verified.', ['order' => $order]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::purchaseComplete failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Purchase completion mutation failed.');
        }
    }

    public function purchaseMyMIGold(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'purchase_identifier' => 'required|string|max_length[128]',
            ])) return $resp;

            $walletId = (int) $this->request->getPost('wallet_id');
            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $purchaseId = (string) $this->request->getPost('purchase_identifier');

            $result = $this->getWalletService()->processWithdrawal($walletId, $amount, $currency, (int) $this->cuID, 'mymig_' . $purchaseId);
            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('MyMI Gold purchase already settled.', ['purchase_identifier' => $purchaseId]);
            }

            return $this->jsonSuccess('MyMI Gold purchase successful.', ['transaction_id' => $result['transaction_id'] ?? null], 201);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::purchaseMyMIGold failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'MyMI Gold purchase mutation failed.');
        }
    }

    public function confirmDeposit(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'transaction_id' => 'required|string|max_length[255]',
            ])) return $resp;

            $walletId = (int) $this->request->getPost('wallet_id');
            $amount = (float) $this->request->getPost('amount');
            $currency = (string) $this->request->getPost('currency');
            $transactionId = (string) $this->request->getPost('transaction_id');

            $result = $this->getWalletService()->processDeposit($walletId, $amount, $currency, (int) $this->cuID, $transactionId);
            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Deposit already settled.', ['transaction_id' => $transactionId]);
            }

            return $this->jsonSuccess('Deposit confirmed.', ['transaction_id' => $result['transaction_id'] ?? $transactionId]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::confirmDeposit failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Deposit confirmation mutation failed.');
        }
    }

    public function depositComplete($transID): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;

            $transactionId = (string) ($this->request->getPost('transaction_id') ?? $transID ?? '');
            if ($transactionId === '') {
                return $this->jsonError(400, 'Malformed payload: transaction_id is required.');
            }

            if ($resp = $this->validateMutation([
                'transaction_id' => 'required|string|max_length[255]',
            ])) {
                return $resp;
            }

            if ($this->getWalletService()->isTransactionSettled($transactionId)) {
                return $this->jsonSuccess('Deposit already completed.', ['transaction_id' => $transactionId]);
            }

            $ok = $this->getWalletService()->completeDeposit($transactionId);
            if (! $ok) {
                return $this->jsonError(500, 'Deposit completion failed.');
            }

            return $this->jsonSuccess('Deposit completed.', ['transaction_id' => $transactionId]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::depositComplete failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Deposit completion mutation failed.');
        }
    }

    public function handleMyMIGPayPalCallback(): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;
            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'transaction_id' => 'required|string|max_length[255]',
                'purchase_identifier' => 'required|string|max_length[128]',
            ])) return $resp;

            $result = $this->getWalletService()->processPayPalPurchaseCallback(
                (int) $this->request->getPost('wallet_id'),
                (float) $this->request->getPost('amount'),
                (string) $this->request->getPost('currency'),
                (int) $this->cuID,
                (string) $this->request->getPost('transaction_id'),
                (string) $this->request->getPost('purchase_identifier'),
                (string) ($this->request->getPost('user_email') ?? null),
                (float) ($this->request->getPost('trans_fee') ?? 0)
            );

            if (($result['status'] ?? '') === 'already_settled') {
                return $this->jsonSuccess('Callback already settled.', ['transaction_id' => $result['transaction_id']]);
            }

            return $this->jsonSuccess('Callback processed.', ['transaction_id' => $result['transaction_id'] ?? null]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::handleMyMIGPayPalCallback failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Callback mutation failed.');
        }
    }

    public function linkAccount($id = null): ResponseInterface
    {
        try {
            if ($resp = $this->ensureMutationAuth()) return $resp;
            if ($resp = $this->requirePost()) return $resp;

            if ($resp = $this->validateMutation([
                'wallet_id' => 'required|integer',
                'amount' => 'required|decimal|greater_than[0]',
                'currency' => 'required|alpha_numeric',
                'purchase_identifier' => 'required|string|max_length[128]',
            ])) {
                return $resp;
            }

            if (! method_exists($this->getWalletService(), 'linkAccount')) {
                return $this->jsonError(500, 'Wallet link service unavailable.');
            }

            $result = $this->getWalletService()->linkAccount([
                'wallet_id' => (int) $this->request->getPost('wallet_id'),
                'amount' => (float) $this->request->getPost('amount'),
                'currency' => (string) $this->request->getPost('currency'),
                'purchase_identifier' => (string) $this->request->getPost('purchase_identifier'),
                'account_id' => $id,
                'user_id' => (int) $this->cuID,
            ]);

            return $this->jsonSuccess('Account linked.', ['result' => $result]);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::linkAccount failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->jsonError(500, 'Account link mutation failed.');
        }
    }
}
