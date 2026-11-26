<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Models\UserIncomingAlertModel;
use App\Services\Alerts\AlertWebhookService;
use CodeIgniter\HTTP\ResponseInterface;

class AlertWebhookAPIController extends BaseAPIController
{
    protected AlertWebhookService $webhookService;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->webhookService = new AlertWebhookService();
    }

    /**
     * Ingest an incoming webhook alert from TradingView, TrendSpider, or custom client.
     * POST /API/Alerts/webhook/{token}
     */
    public function receiveWebhook(string $token): ResponseInterface
    {
        $raw = (string) $this->request->getBody();
        $postData = (array) $this->request->getPost();

        $result = $this->webhookService->ingestByToken($token, $raw, $postData);

        if (! $result['ok']) {
            $statusCode = $result['status'] === 'unauthorized' ? 401 : 422;
            return $this->error($result['message'] ?? 'Failed to ingest webhook alert', $statusCode);
        }

        return $this->success($result, 201);
    }

    /**
     * Regenerate user's personal webhook token.
     * POST /API/Alerts/regenerateWebhook
     */
    public function regenerateWebhook(): ResponseInterface
    {
        $userId = (int) ($this->cuID ?? session('cuID') ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->error('Authentication required', 401);
        }

        $webhook = $this->webhookService->regenerateWebhook($userId);

        return $this->success([
            'message'     => 'Webhook token regenerated successfully',
            'webhook'     => $webhook,
            'webhook_url' => $webhook['webhook_url'],
        ]);
    }

    /**
     * Fetch user's incoming custom alerts.
     * GET /API/Alerts/userAlerts
     */
    public function userAlerts(): ResponseInterface
    {
        $userId = (int) ($this->cuID ?? session('cuID') ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->error('Authentication required', 401);
        }

        $provider = $this->request->getGet('provider');
        $provider = is_string($provider) ? trim($provider) : null;
        $alerts   = $this->webhookService->getUserAlerts($userId, $provider);

        return $this->success([
            'alerts' => $alerts,
            'count'  => count($alerts),
        ]);
    }

    /**
     * Archive or dismiss an incoming alert.
     * POST /API/Alerts/dismissAlert/{id}
     */
    public function dismissAlert(int $alertId): ResponseInterface
    {
        $userId = (int) ($this->cuID ?? session('cuID') ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->error('Authentication required', 401);
        }

        $model = new UserIncomingAlertModel();
        $alert = $model->where('id', $alertId)->where('user_id', $userId)->first();

        if (! $alert) {
            return $this->error('Alert not found', 404);
        }

        $model->update($alertId, ['status' => 'archived']);

        return $this->success(['message' => 'Alert dismissed']);
    }
}
