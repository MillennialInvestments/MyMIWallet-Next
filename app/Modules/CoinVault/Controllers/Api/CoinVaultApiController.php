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
        $adminId = (int) (service('authentication')->id() ?? auth()->id() ?? session()->get('user_id') ?? 0);
        if ($adminId <= 0) {
            return $this->failUnauthorized('Admin authentication required.');
        }
        $result = (new CoinVaultService())->approveContribution($id, $adminId);
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }

    public function rejectContribution(int $id)
    {
        $adminId = (int) (service('authentication')->id() ?? auth()->id() ?? session()->get('user_id') ?? 0);
        if ($adminId <= 0) {
            return $this->failUnauthorized('Admin authentication required.');
        }
        $ok = (new CoinVaultService())->rejectContribution($id, $adminId, (string) $this->request->getPost('reason'));
        return $this->respond(['ok' => $ok]);
    }

    public function requestPayout()
    {
        $userId = (int) (service('authentication')->id() ?? auth()->id() ?? session()->get('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->failUnauthorized('User authentication required.');
        }
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        $result = (new CoinVaultService())->requestPayout((int) ($payload['project_id'] ?? 0), $userId, (float) ($payload['coin_amount'] ?? 0), (string) ($payload['memo'] ?? ''));
        return $this->respond($result, $result['ok'] ? 201 : 400);
    }

    public function approvePayout(int $id)
    {
        $adminId = (int) (service('authentication')->id() ?? auth()->id() ?? session()->get('user_id') ?? 0);
        if ($adminId <= 0) {
            return $this->failUnauthorized('Admin authentication required.');
        }
        $result = (new CoinVaultService())->approvePayout($id, $adminId);
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }

    public function rejectPayout(int $id)
    {
        $adminId = (int) (service('authentication')->id() ?? auth()->id() ?? session()->get('user_id') ?? 0);
        if ($adminId <= 0) {
            return $this->failUnauthorized('Admin authentication required.');
        }
        $result = (new CoinVaultService())->rejectPayout($id, $adminId, (string) $this->request->getPost('reason'));
        return $this->respond($result, $result['ok'] ? 200 : 400);
    }
}
