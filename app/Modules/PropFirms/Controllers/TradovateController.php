<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\TradovateService;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class TradovateController extends UserController
{
    private TradovateService $tradovate;
    private UserPropAccountModel $accounts;

    public function __construct()
    {
        $this->tradovate = new TradovateService();
        $this->accounts = new UserPropAccountModel();
    }

    public function connect(int $accountId)
    {
        if (! $this->isOwnedAccount($accountId)) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $result = $this->tradovate->connect($accountId, (array) $payload);

        return $this->response->setJSON(['status' => 'ok', 'data' => $result]);
    }

    public function disconnect(int $accountId)
    {
        if (! $this->isOwnedAccount($accountId)) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $ok = $this->tradovate->disconnect($accountId);

        return $this->response->setJSON(['status' => $ok ? 'ok' : 'error']);
    }

    public function sync(int $accountId)
    {
        return $this->doSync($accountId, 'full_account_sync');
    }

    public function syncOrders(int $accountId)
    {
        return $this->doSync($accountId, 'orders_only');
    }

    public function syncFills(int $accountId)
    {
        return $this->doSync($accountId, 'fills_only');
    }

    public function syncPositions(int $accountId)
    {
        return $this->doSync($accountId, 'positions_only');
    }

    private function doSync(int $accountId, string $syncType)
    {
        if (! $this->isOwnedAccount($accountId)) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $payload['sync_type'] = $syncType;

        $summary = $this->tradovate->syncAccount($accountId, (array) $payload);

        return $this->response->setJSON(['status' => 'ok', 'data' => $summary]);
    }

    private function isOwnedAccount(int $accountId): bool
    {
        $userId = (int) ($this->cuID ?? 0);

        return $this->accounts->where('id', $accountId)->where('user_id', $userId)->first() !== null;
    }
}
