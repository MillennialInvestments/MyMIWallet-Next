<?php

namespace App\Modules\APIs\Controllers;

use App\Modules\APIs\Controllers\MditBaseAPIController;
use App\Models\MDIT\MditDepositModel;
use App\Services\MDIT\MditDepositService;
use App\Services\MDIT\MditInvestorService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditDepositAPIController extends MditBaseAPIController
{
    private MditDepositService $depositService;
    private MditInvestorService $investorService;
    private MditDepositModel $deposits;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->depositService = new MditDepositService();
        $this->investorService = new MditInvestorService();
        $this->deposits = new MditDepositModel();
    }

    public function initiate(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        if (! $this->investorService->isVerifiedAndAccredited($userId)) {
            return $this->failForbidden('KYC/Accreditation required.');
        }

        $payload = $this->request->getJSON(true) ?? [];
        $chain = strtoupper(trim((string) ($payload['chain'] ?? '')));
        $asset = strtoupper(trim((string) ($payload['asset_symbol'] ?? '')));
        $walletAddress = trim((string) ($payload['wallet_address'] ?? ''));
        $amount = (float) ($payload['amount'] ?? 0);

        if ($chain === '' || $asset === '' || $walletAddress === '' || $amount <= 0) {
            return $this->failValidationErrors('Invalid deposit payload.');
        }

        if (! $this->depositService->ensureWalletOwned($userId, $walletAddress, $chain)) {
            return $this->failForbidden('Wallet must be linked to your account.');
        }

        $bucket = (int) floor(time() / 600);
        $idempotencyKey = hash('sha256', implode('|', [$userId, $walletAddress, $asset, $amount, $bucket]));

        $deposit = $this->depositService->initiateDeposit([
            'user_id' => $userId,
            'wallet_address' => $walletAddress,
            'chain' => $chain,
            'asset_symbol' => $asset,
            'amount' => $amount,
            'status' => 'CREATED',
            'idempotency_key' => $idempotencyKey,
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $this->respond([
            'status' => 'success',
            'data' => [
                'deposit_id' => $deposit['id'],
                'status' => $deposit['status'],
                'instructions' => 'Send the specified asset to the provided wallet address. Sandbox mode only.',
            ],
        ]);
    }

    public function confirm(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $payload = $this->request->getJSON(true) ?? [];
        $depositId = (int) ($payload['deposit_id'] ?? 0);
        $txHash = trim((string) ($payload['tx_hash'] ?? ''));

        if ($depositId <= 0 || $txHash === '') {
            return $this->failValidationErrors('Invalid confirmation payload.');
        }

        $deposit = $this->deposits->find($depositId);
        if (! $deposit || (int) $deposit['user_id'] !== $userId) {
            return $this->failForbidden('Deposit does not belong to this user.');
        }

        try {
            $deposit = $this->depositService->confirmDeposit($depositId, $txHash);
        } catch (\Throwable $e) {
            return $this->failValidationErrors($e->getMessage());
        }

        return $this->respond([
            'status' => 'success',
            'data' => [
                'deposit_id' => $deposit['id'],
                'status' => $deposit['status'],
                'tx_hash' => $deposit['tx_hash'],
            ],
        ]);
    }
}
