<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Models\Options\OptionsExitAlertModel;
use App\Models\Options\OptionsPositionHistoryModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Models\Options\OptionsPositionModel;
use App\Models\Options\OptionsScanCandidateModel;
use App\Models\Options\OptionsSignalEventModel;
use App\Services\Options\OptionsMomentumManager;
use App\Services\Options\TradingViewWebhookService;
use CodeIgniter\HTTP\ResponseInterface;

class OptionsWebhookController extends BaseAPIController
{
    /**
     * Ingest TradingView Pine v6 Webhook Signals.
     * POST /API/Options/webhook
     */
    public function receiveWebhook(): ResponseInterface
    {
        $raw = (string) $this->request->getBody();
        $payload = json_decode($raw, true);

        if (! is_array($payload)) {
            $payload = $this->request->getPost();
        }

        if (empty($payload)) {
            return $this->error('Empty or invalid JSON webhook payload', 400);
        }

        // Webhook security verification: fail-closed, require authenticated ingress, timing-safe compare
        $authHeader = (string) $this->request->getHeaderLine('Authorization');
        $bearerToken = '';
        if (preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
            $bearerToken = trim($matches[1]);
        }

        $secret = (string) ($this->request->getHeaderLine('X-MyMI-Secret') ?: $bearerToken ?: ($payload['secret'] ?? ''));
        $expectedSecret = (string) (getenv('OPTIONS_WEBHOOK_SECRET') ?: (function_exists('env') ? env('OPTIONS_WEBHOOK_SECRET') : ''));

        if ($expectedSecret === '') {
            return $this->error('Webhook ingress secret is not configured on this host. Access denied.', 401);
        }

        if ($secret === '' || ! hash_equals($expectedSecret, $secret)) {
            return $this->error('Unauthorized webhook secret token', 401);
        }

        $signalModel = new OptionsSignalEventModel();
        $positionModel = new OptionsPositionModel();
        $legModel = new OptionsPositionLegModel();
        $historyModel = new OptionsPositionHistoryModel();
        $exitAlertModel = new OptionsExitAlertModel();

        $momentumManager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel);
        $webhookService = new TradingViewWebhookService($signalModel, $positionModel, $momentumManager);

        $result = $webhookService->ingest($payload);

        if ($result['status'] === 'rejected') {
            return $this->error($result['reason'] ?? 'Rejected signal', 422);
        }

        return $this->success($result, $result['status'] === 'deduplicated' ? 200 : 201);
    }

    /**
     * Get top options scan candidates.
     * GET /API/Options/candidates
     */
    public function candidates(): ResponseInterface
    {
        $limit = max(1, min(100, (int) ($this->request->getGet('limit') ?? 20)));
        $model = new OptionsScanCandidateModel();
        $candidates = $model->getTopOpportunities($limit);

        return $this->success([
            'count' => count($candidates),
            'candidates' => $candidates,
        ]);
    }

    /**
     * Get active positions and live valuations.
     * GET /API/Options/positions
     */
    public function positions(): ResponseInterface
    {
        $positionModel = new OptionsPositionModel();
        $active = $positionModel->getActivePositions();
        $summary = $positionModel->getActiveSummary();

        return $this->success([
            'summary' => $summary,
            'positions' => $active,
        ]);
    }
}
