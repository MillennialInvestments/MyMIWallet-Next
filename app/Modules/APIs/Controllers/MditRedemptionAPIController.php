<?php

namespace App\Modules\APIs\Controllers;

use App\Modules\APIs\Controllers\MditBaseAPIController;
use App\Services\MDIT\MditInvestorService;
use App\Services\MDIT\MditRedemptionService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditRedemptionAPIController extends MditBaseAPIController
{
    private MditInvestorService $investorService;
    private MditRedemptionService $redemptionService;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->investorService = new MditInvestorService();
        $this->redemptionService = new MditRedemptionService();
    }

    public function requestRedemption(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        if (! $this->investorService->isVerifiedAndAccredited($userId)) {
            return $this->failForbidden('KYC/Accreditation required.');
        }

        $payload = $this->request->getJSON(true) ?? [];
        $tokenUnits = (float) ($payload['token_units'] ?? 0);
        $payoutAsset = strtoupper(trim((string) ($payload['payout_asset'] ?? '')));
        $walletAddress = trim((string) ($payload['wallet_address'] ?? ''));

        if ($tokenUnits <= 0 || $payoutAsset === '' || $walletAddress === '') {
            return $this->failValidationErrors('Invalid redemption payload.');
        }

        try {
            $redemption = $this->redemptionService->requestRedemption([
                'user_id' => $userId,
                'wallet_address' => $walletAddress,
                'token_units' => $tokenUnits,
                'requested_on' => date('Y-m-d H:i:s'),
                'status' => 'REQUESTED',
                'payout_asset' => $payoutAsset,
            ]);
        } catch (\Throwable $e) {
            return $this->failValidationErrors($e->getMessage());
        }

        return $this->respond([
            'status' => 'success',
            'data' => [
                'redemption_id' => $redemption['id'],
                'status' => $redemption['status'],
            ],
        ]);
    }
}
