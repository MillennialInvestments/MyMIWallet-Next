<?php

namespace App\Modules\APIs\Controllers;

use App\Modules\APIs\Controllers\MditBaseController;
use App\Models\MDIT\MditInvestorProfileModel;
use App\Models\MDIT\MditTokenLedgerModel;
use App\Services\MDIT\MditInvestorService;
use App\Services\MDIT\MditNavService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditInvestorAPIController extends MditBaseController
{
    private MditInvestorService $investorService;
    private MditNavService $navService;
    private MditInvestorProfileModel $profiles;
    private MditTokenLedgerModel $ledger;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->investorService = new MditInvestorService();
        $this->navService = new MditNavService();
        $this->profiles = new MditInvestorProfileModel();
        $this->ledger = new MditTokenLedgerModel();
    }

    public function startKyc(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $result = $this->investorService->startKyc($userId);

        return $this->respond([
            'status' => 'success',
            'data' => $result,
        ]);
    }

    public function kycStatus(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $profile = $this->investorService->refreshKycStatus($userId);

        return $this->respond([
            'status' => 'success',
            'data' => [
                'kyc_status' => $profile['kyc_status'] ?? 'PENDING',
                'accreditation_status' => $profile['accreditation_status'] ?? 'PENDING',
            ],
        ]);
    }

    public function attestAccreditation(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $payload = $this->request->getJSON(true) ?? [];
        $attested = filter_var($payload['accredited'] ?? false, FILTER_VALIDATE_BOOLEAN);

        $profile = $this->investorService->attestAccreditation($userId, $attested);

        return $this->respond([
            'status' => 'success',
            'data' => [
                'kyc_status' => $profile['kyc_status'] ?? 'PENDING',
                'accreditation_status' => $profile['accreditation_status'] ?? 'PENDING',
            ],
        ]);
    }

    public function portfolioSummary(): ResponseInterface
    {
        $userId = $this->requireUserId();
        if ($userId instanceof ResponseInterface) {
            return $userId;
        }

        $profile = $this->profiles->where('user_id', $userId)->first();
        $minted = (float) ($this->ledger->selectSum('units')->where('user_id', $userId)->where('status', 'MINTED')->first()['units'] ?? 0);
        $burned = (float) ($this->ledger->selectSum('units')->where('user_id', $userId)->where('status', 'BURNED')->first()['units'] ?? 0);
        $units = $minted - $burned;
        $latestNav = $this->navService->latestSnapshot();
        $navPerUnit = (float) ($latestNav['nav_per_unit'] ?? 1.0);

        return $this->respond([
            'status' => 'success',
            'data' => [
                'kyc_status' => $profile['kyc_status'] ?? 'PENDING',
                'accreditation_status' => $profile['accreditation_status'] ?? 'PENDING',
                'token_units_total' => $units,
                'estimated_value' => $units * $navPerUnit,
                'last_nav_date' => $latestNav['as_of_date'] ?? null,
            ],
        ]);
    }
}
