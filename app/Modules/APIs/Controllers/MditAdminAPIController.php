<?php

namespace App\Modules\APIs\Controllers;

use App\Modules\APIs\Controllers\MditBaseAPIController;
use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditRedemptionModel;
use App\Models\MDIT\MditWebhookEventModel;
use App\Services\MDIT\MditNavService;
use App\Services\MDIT\MditRedemptionService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class MditAdminAPIController extends MditBaseAPIController
{
    private MditRedemptionModel $redemptions;
    private MditDepositModel $deposits;
    private MditRedemptionService $redemptionService;
    private MditNavService $navService;
    private MditWebhookEventModel $webhookEvents;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->redemptions = new MditRedemptionModel();
        $this->deposits = new MditDepositModel();
        $this->redemptionService = new MditRedemptionService();
        $this->navService = new MditNavService();
        $this->webhookEvents = new MditWebhookEventModel();
    }

    public function pendingRedemptions(): ResponseInterface
    {
        $pending = $this->redemptions->where('status', 'REQUESTED')->orderBy('requested_on', 'ASC')->findAll();

        return $this->respond([
            'status' => 'success',
            'data' => $pending,
        ]);
    }

    public function approveRedemption(): ResponseInterface
    {
        $adminId = $this->requireUserId();
        if ($adminId instanceof ResponseInterface) {
            return $adminId;
        }

        $payload = $this->request->getJSON(true) ?? [];
        $redemptionId = (int) ($payload['redemption_id'] ?? 0);
        $notes = isset($payload['notes']) ? trim((string) $payload['notes']) : null;

        if ($redemptionId <= 0) {
            return $this->failValidationErrors('Redemption ID is required.');
        }

        try {
            $redemption = $this->redemptionService->approveRedemption($redemptionId, $adminId, $notes);
        } catch (\Throwable $e) {
            return $this->failValidationErrors($e->getMessage());
        }

        $eventPayload = [
            'provider' => 'internal',
            'event_id' => 'redemption-' . $redemptionId,
            'event_type' => 'redemption.approved',
            'payload_json' => json_encode($redemption),
            'payload_hash' => hash('sha256', json_encode($redemption)),
            'received_on' => date('Y-m-d H:i:s'),
            'processed_on' => date('Y-m-d H:i:s'),
            'status' => 'PROCESSED',
            'error_message' => null,
        ];
        $this->webhookEvents->insert($eventPayload);
        log_message('info', 'MDIT redemption approved', ['redemption_id' => $redemptionId, 'admin_id' => $adminId]);

        return $this->respond([
            'status' => 'success',
            'data' => $redemption,
        ]);
    }

    public function pendingDeposits(): ResponseInterface
    {
        $pending = $this->deposits->where('status', 'CONFIRMED_ONCHAIN')->orderBy('created_on', 'ASC')->findAll();

        return $this->respond([
            'status' => 'success',
            'data' => $pending,
        ]);
    }

    public function computeNavToday(): ResponseInterface
    {
        $payload = $this->request->getJSON(true) ?? [];
        $cashValue = (float) ($payload['cash_value'] ?? 0);
        $equitiesValue = (float) ($payload['equities_value'] ?? 0);
        $asOfDate = date('Y-m-d');

        $snapshot = $this->navService->computeDailyNav($asOfDate, $cashValue, $equitiesValue);

        return $this->respond([
            'status' => 'success',
            'data' => $snapshot,
        ]);
    }
}
