<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropFirmEngine;
use App\Modules\PropFirms\Libraries\PropNotificationService;
use App\Modules\PropFirms\Models\PropBrokerConnectionModel;
use App\Modules\PropFirms\Models\PropFirmModel;
use App\Modules\PropFirms\Models\PropRuleSetModel;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class AccountsController extends UserController
{
    private UserPropAccountModel $accounts;
    private PropFirmModel $firms;
    private PropRuleSetModel $ruleSets;
    private PropBrokerConnectionModel $brokers;

    public function __construct()
    {
        $this->accounts = new UserPropAccountModel();
        $this->firms = new PropFirmModel();
        $this->ruleSets = new PropRuleSetModel();
        $this->brokers = new PropBrokerConnectionModel();
    }

    public function index()
    {
        $userId = (int) ($this->cuID ?? 0);
        $data = $this->commonData();
        $data['pageTitle'] = 'Prop Accounts';
        $data['firms'] = $this->firms->orderBy('name', 'ASC')->findAll();
        $data['ruleSets'] = $this->ruleSets->orderBy('name', 'ASC')->findAll();
        $data['accounts'] = $this->accounts->where('user_id', $userId)->orderBy('id', 'DESC')->findAll();

        return $this->renderTheme('App\Modules\PropFirms\Views\accounts\index', $data);
    }

    public function create()
    {
        return $this->response->setJSON([
            'status' => 'ok',
            'data' => [
                'firms' => $this->firms->orderBy('name', 'ASC')->findAll(),
                'rule_sets' => $this->ruleSets->orderBy('name', 'ASC')->findAll(),
                'platforms' => ['tradovate', 'rithmic', 'ninjatrader', 'tradingview'],
                'account_types' => ['eval', 'funded', 'swing', 'pa'],
            ],
        ]);
    }

    public function store()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $userId = (int) ($this->cuID ?? 0);
        $insert = $this->normalizeAccountPayload($payload, $userId);

        $id = $this->accounts->insert($insert, true);
        if (! $id) {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => 'Unable to create account.']);
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Account created.',
            'data' => $this->accounts->find((int) $id),
        ]);
    }

    public function edit(int $id)
    {
        return $this->detail($id);
    }

    public function detail(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        return $this->response->setJSON(['status' => 'ok', 'data' => $account]);
    }

    public function update(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $update = $this->normalizeAccountPayload($payload, (int) $account['user_id'], true);

        $this->accounts->update($id, $update);

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Account updated.',
            'data' => $this->accounts->find($id),
        ]);
    }

    public function delete(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $this->accounts->delete($id);

        return $this->response->setJSON(['status' => 'ok', 'message' => 'Account deleted.']);
    }

    public function refreshState(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $state = (new PropFirmEngine())->evaluateAccountState($id, ['source' => 'manual_refresh']);

        if (($state['risk_state'] ?? '') === 'breached') {
            (new PropNotificationService())->notify([
                'user_prop_account_id' => $id,
                'type' => 'RISK_WARNING',
                'subject' => 'Risk Warning: account breached',
                'body' => (string) ($state['breach_reason'] ?? 'Risk rules breached.'),
                'data' => $state,
            ]);
        }

        if (! empty($state['thresholds'])) {
            (new PropNotificationService())->notify([
                'user_prop_account_id' => $id,
                'type' => 'THRESHOLD_ALERT',
                'subject' => 'Thresholds refreshed',
                'body' => 'Account risk thresholds were refreshed.',
                'data' => ['thresholds' => $state['thresholds']],
            ], 300);
        }

        return $this->response->setJSON(['status' => 'ok', 'data' => $state]);
    }

    public function connectBroker(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $row = [
            'user_prop_account_id' => $id,
            'broker_name' => (string) ($payload['broker_name'] ?? 'manual'),
            'external_account_id' => (string) ($payload['external_account_id'] ?? ($account['account_ref'] ?? '')),
            'connection_status' => 'connected',
            'last_heartbeat_at' => date('Y-m-d H:i:s'),
            'credentials_json' => json_encode([
                'label' => $payload['label'] ?? null,
                'connected_via' => 'dashboard',
            ], JSON_UNESCAPED_SLASHES),
        ];

        $connectionId = $this->brokers->insert($row, true);

        if (! $connectionId) {
            (new PropNotificationService())->notify([
                'user_prop_account_id' => $id,
                'type' => 'SYNC_ERROR',
                'subject' => 'Broker connection failed',
                'body' => 'Unable to save broker connection row.',
                'data' => $row,
            ]);

            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => 'Broker connect failed.']);
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Broker connected.',
            'data' => ['id' => $connectionId],
        ]);
    }

    public function accountState(int $id)
    {
        $account = $this->findOwnedAccount($id);
        if ($account === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $state = (new PropFirmEngine())->evaluateAccountState($id, ['source' => 'api_account_state']);

        return $this->response->setJSON([
            'status' => 'ok',
            'data' => [
                'account' => [
                    'id' => (int) $account['id'],
                    'account_ref' => (string) $account['account_ref'],
                    'firm_id' => (int) ($account['prop_firm_id'] ?? 0),
                    'rule_set_id' => (int) ($account['prop_rule_set_id'] ?? 0),
                    'status' => (string) ($account['account_status'] ?? 'active'),
                ],
                'state' => $state,
            ],
        ]);
    }

    private function findOwnedAccount(int $id): ?array
    {
        $userId = (int) ($this->cuID ?? 0);

        return $this->accounts
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }

    private function normalizeAccountPayload(array $payload, int $userId, bool $partial = false): array
    {
        $metadata = [
            'platform' => strtolower((string) ($payload['platform'] ?? 'tradovate')),
            'account_type' => strtolower((string) ($payload['account_type'] ?? 'eval')),
            'account_size' => (float) ($payload['account_size'] ?? ($payload['starting_balance'] ?? 0)),
            'initial_daily_loss_limit' => (float) ($payload['initial_daily_loss_limit'] ?? 0),
            'rule_set_label' => $payload['rule_set_label'] ?? null,
        ];

        $row = [
            'user_id' => $userId,
            'prop_firm_id' => (int) ($payload['prop_firm_id'] ?? 0),
            'prop_rule_set_id' => !empty($payload['prop_rule_set_id']) ? (int) $payload['prop_rule_set_id'] : null,
            'account_ref' => trim((string) ($payload['account_ref'] ?? '')),
            'account_status' => (string) ($payload['account_status'] ?? 'active'),
            'starting_balance' => (float) ($payload['starting_balance'] ?? $payload['account_size'] ?? 0),
            'current_balance' => (float) ($payload['current_balance'] ?? $payload['starting_balance'] ?? $payload['account_size'] ?? 0),
            'metadata_json' => json_encode($metadata, JSON_UNESCAPED_SLASHES),
        ];

        if ($partial) {
            return array_filter($row, static fn ($value) => $value !== null && $value !== '');
        }

        return $row;
    }
}
