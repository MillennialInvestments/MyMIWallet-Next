<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Services\TbiProjectCoinService;

class TbiProjectCoinsAPIController extends BaseAPIController
{
    protected TbiProjectCoinService $service;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->service = new TbiProjectCoinService();
    }

    public function createDefaults(int $projectId)
    {
        $data = $this->service->createDefaultCoinsForProject($projectId);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Default TBI coins prepared.', 'data' => $data, 'errors' => []]);
    }

    public function getProjectCoins(int $projectId)
    {
        $data = $this->service->getProjectCoins($projectId);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Project coins loaded.', 'data' => $data, 'errors' => []]);
    }

    public function recordContribution()
    {
        $rules = ['project_id' => 'required|integer','coin_id' => 'required|integer','category_id' => 'required|integer','contribution_type' => 'required|in_list[cash,work,expense,service,adjustment]','usd_value' => 'required|decimal'];
        if (! $this->validateData($this->request->getPost(), $rules)) {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => 'Validation failed.', 'data' => [], 'errors' => $this->validator->getErrors()]);
        }
        $payload = $this->request->getPost();
        $payload['user_id'] = auth()->user()->id ?? 0;
        $id = $this->service->recordContribution($payload);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Contribution recorded.', 'data' => ['ledger_id' => $id], 'errors' => []]);
    }

    public function approveContribution(int $ledgerId)
    {
        $ok = $this->service->approveContribution($ledgerId, (int) (auth()->user()->id ?? 0));
        return $this->response->setJSON(['status' => $ok ? 'success' : 'error', 'message' => $ok ? 'Contribution approved.' : 'Unable to approve contribution.', 'data' => ['ledger_id' => $ledgerId], 'errors' => []]);
    }

    public function rejectContribution(int $ledgerId)
    {
        $reason = (string) ($this->request->getPost('reason') ?? '');
        $ok = $this->service->rejectContribution($ledgerId, (int) (auth()->user()->id ?? 0), $reason);
        return $this->response->setJSON(['status' => $ok ? 'success' : 'error', 'message' => $ok ? 'Contribution rejected.' : 'Unable to reject contribution.', 'data' => ['ledger_id' => $ledgerId], 'errors' => []]);
    }

    public function prepareSolanaMint(int $coinId)
    {
        $data = $this->service->prepareSolanaMintPayload($coinId);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Solana mint payload prepared only.', 'data' => $data, 'errors' => []]);
    }

    public function prepareExchangeAsset(int $coinId)
    {
        $data = $this->service->prepareExchangeAssetPayload($coinId);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Exchange asset payload prepared only.', 'data' => $data, 'errors' => []]);
    }
}
