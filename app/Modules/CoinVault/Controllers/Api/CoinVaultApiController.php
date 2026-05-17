<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Controllers\Api;

use App\Controllers\BaseController;
use App\Modules\CoinVault\Services\CoinVaultService;
use App\Modules\CoinVault\Services\ExternalContributionService;
use CodeIgniter\API\ResponseTrait;

class CoinVaultApiController extends BaseController
{
    use ResponseTrait;

    public function contributionEvent()
    {
        $raw = (string) $this->request->getBody();
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        $result = (new ExternalContributionService())->ingest((array) $payload, $this->request, $raw);
        return $this->respond($result, $result['ok'] ? 202 : (str_contains((string) ($result['error'] ?? ''), 'tables_missing') ? 503 : 400));
    }

    public function approveContribution(int $id)
    {
        $adminId = (int) (service('authentication')->id() ?? 0);
        $result = (new CoinVaultService())->approveContribution($id, $adminId);
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }

    public function rejectContribution(int $id)
    {
        $adminId = (int) (service('authentication')->id() ?? 0);
        $ok = (new CoinVaultService())->rejectContribution($id, $adminId, (string) $this->request->getPost('reason'));
        return $this->respond(['ok' => $ok]);
    }

    public function requestPayout()
    {
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        $userId = (int) (service('authentication')->id() ?? ($payload['user_id'] ?? 0));
        $result = (new CoinVaultService())->requestPayout((int) ($payload['project_id'] ?? 0), $userId, (float) ($payload['coin_amount'] ?? 0), (string) ($payload['memo'] ?? ''));
        return $this->respond($result, $result['ok'] ? 201 : 400);
    }

    public function approvePayout(int $id)
    {
        $result = (new CoinVaultService())->approvePayout($id, (int) (service('authentication')->id() ?? 0));
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }

    public function rejectPayout(int $id)
    {
        $result = (new CoinVaultService())->rejectPayout($id, (int) (service('authentication')->id() ?? 0), (string) $this->request->getPost('reason'));
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }
}
