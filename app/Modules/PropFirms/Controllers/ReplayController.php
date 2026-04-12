<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropJournalService;
use App\Modules\PropFirms\Libraries\PropReplayAnalysisService;
use App\Modules\PropFirms\Models\PropReplayDiagnosticModel;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class ReplayController extends UserController
{
    private PropReplayAnalysisService $replay;
    private PropJournalService $journal;
    private UserPropAccountModel $accounts;

    public function __construct()
    {
        $this->replay = new PropReplayAnalysisService();
        $this->journal = new PropJournalService();
        $this->accounts = new UserPropAccountModel();
    }

    public function index(int $accountId, string $symbol = 'ES')
    {
        $account = $this->ownedAccount($accountId);
        if ($account === null) {
            return redirect()->to(site_url('PropFirms/Accounts'));
        }

        $timeline = $this->replay->buildReplayTimeline($accountId, $symbol);
        $diagnostics = $this->replay->diagnoseAccountFailure($accountId, $symbol, $timeline);

        $data = $this->commonData();
        $data['pageTitle'] = 'Replay - ' . strtoupper($symbol);
        $data['account'] = $account;
        $data['symbol'] = strtoupper($symbol);
        $data['timeline'] = $timeline;
        $data['diagnostics'] = $diagnostics;
        $data['recentReviews'] = $this->journal->recentFindings($accountId, 10);

        return $this->renderTheme('App\Modules\PropFirms\Views\replay\index', $data);
    }

    public function apiReplay(int $accountId, string $symbol)
    {
        if ($this->ownedAccount($accountId) === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $timeline = $this->replay->buildReplayTimeline($accountId, $symbol);

        return $this->response->setJSON(['status' => 'ok', 'data' => $timeline]);
    }

    public function saveReview(int $accountId)
    {
        if ($this->ownedAccount($accountId) === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $result = $this->journal->saveReview($accountId, (array) $payload);

        return $this->response->setJSON($result);
    }

    public function diagnosticsSummary(int $accountId)
    {
        if ($this->ownedAccount($accountId) === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Account not found.']);
        }

        $rows = (new PropReplayDiagnosticModel())
            ->select('bf_prop_replay_diagnostics.*, bf_prop_replay_events.user_prop_account_id')
            ->join('bf_prop_replay_events', 'bf_prop_replay_events.id = bf_prop_replay_diagnostics.prop_replay_event_id', 'inner')
            ->where('bf_prop_replay_events.user_prop_account_id', $accountId)
            ->orderBy('bf_prop_replay_diagnostics.logged_at', 'DESC')
            ->findAll(20);

        return $this->response->setJSON(['status' => 'ok', 'data' => $rows]);
    }

    private function ownedAccount(int $accountId): ?array
    {
        $userId = (int) ($this->cuID ?? 0);

        return $this->accounts->where('id', $accountId)->where('user_id', $userId)->first();
    }
}
