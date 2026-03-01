<?php

namespace App\Modules\APIs\Controllers;

use App\Modules\APIs\Controllers\MditBaseAPIController;
use App\Models\MDIT\MditTokenLedgerModel;
use App\Models\MDIT\MditDepositModel;
use App\Services\MDIT\MditInvestorService;
use App\Services\MDIT\MditIssuanceService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditIssuanceAPIController extends MditBaseAPIController
{
    private MditIssuanceService $issuanceService;
    private MditInvestorService $investorService;
    private MditTokenLedgerModel $ledger;
    private MditDepositModel $deposits;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->issuanceService = new MditIssuanceService();
        $this->investorService = new MditInvestorService();
        $this->ledger = new MditTokenLedgerModel();
        $this->deposits = new MditDepositModel();
    }

    public function mint(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $payload = $this->request->getJSON(true) ?? [];
        $depositId = (int) ($payload['deposit_id'] ?? 0);

        if ($depositId <= 0) {
            return $this->failValidationErrors('Deposit ID is required.');
        }

        $deposit = $this->deposits->find($depositId);
        if (! $deposit) {
            return $this->failNotFound('Deposit not found.');
        }

        if (! $this->investorService->isVerifiedAndAccredited((int) $deposit['user_id'])) {
            return $this->failForbidden('KYC/Accreditation required.');
        }

        try {
            $ledgerEntry = $this->issuanceService->mintForDeposit($depositId);
        } catch (\Throwable $e) {
            return $this->failValidationErrors($e->getMessage());
        }

        $navPerUnit = (float) ($ledgerEntry['nav_at_mint'] ?? 1.0);

        return $this->respond([
            'status' => 'success',
            'data' => [
                'ledger_id' => $ledgerEntry['id'],
                'minted_units' => (float) $ledgerEntry['units'],
                'nav_per_unit' => $navPerUnit,
            ],
        ]);
    }
}
