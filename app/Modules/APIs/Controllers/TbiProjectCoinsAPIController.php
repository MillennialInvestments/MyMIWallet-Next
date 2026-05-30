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

    private function standardJson(bool $success, string $message, array $data = [], array $errors = [], int $status = 200)
    {
        $network = (new \App\Services\SolanaService())->resolveNetwork();
        return $this->response->setStatusCode($status)->setJSON([
            'success' => $success,
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
            'meta' => [
                'request_id' => service('request')->getHeaderLine('X-Request-ID') ?: bin2hex(random_bytes(8)),
                'network' => $network,
                'timestamp' => date('c'),
            ],
        ]);
    }

    public function createDefaults(int $projectId)
    {
        $data = $this->service->createDefaultCoinsForProject($projectId);
        return $this->standardJson(true, 'Default TBI coins prepared.', ['coins' => $data]);
    }

    public function getProjectCoins(int $projectId)
    {
        $data = $this->service->getProjectCoins($projectId);
        return $this->standardJson(true, 'Project coins loaded.', ['coins' => $data]);
    }

    public function recordContribution()
    {
        $rules = ['project_id' => 'required|integer','coin_id' => 'required|integer','category_id' => 'required|integer','contribution_type' => 'required|in_list[cash,work,expense,service,adjustment]','usd_value' => 'required|decimal'];
        if (! $this->validateData($this->request->getPost(), $rules)) {
            return $this->standardJson(false, 'Validation failed.', [], $this->validator->getErrors(), 422);
        }
        $payload = $this->request->getPost();
        $payload['user_id'] = auth()->user()->id ?? 0;
        $id = $this->service->recordContribution($payload);
        return $this->standardJson(true, 'Contribution recorded.', ['ledger_id' => $id]);
    }

    public function approveContribution(int $ledgerId)
    {
        $ok = $this->service->approveContribution($ledgerId, (int) (auth()->user()->id ?? 0));
        return $this->standardJson($ok, $ok ? 'Contribution approved.' : 'Unable to approve contribution.', ['ledger_id' => $ledgerId], $ok ? [] : ['ledger' => 'not_pending'], $ok ? 200 : 409);
    }

    public function rejectContribution(int $ledgerId)
    {
        $reason = (string) ($this->request->getPost('reason') ?? '');
        $ok = $this->service->rejectContribution($ledgerId, (int) (auth()->user()->id ?? 0), $reason);
        return $this->standardJson($ok, $ok ? 'Contribution rejected.' : 'Unable to reject contribution.', ['ledger_id' => $ledgerId], $ok ? [] : ['ledger' => 'not_pending'], $ok ? 200 : 409);
    }

    public function prepareSolanaMint(int $coinId)
    {
        $data = $this->service->prepareSolanaMintPayload($coinId);
        return $this->standardJson(true, 'Solana mint payload prepared only.', $data);
    }

    public function prepareExchangeAsset(int $coinId)
    {
        $data = $this->service->prepareExchangeAssetPayload($coinId);
        return $this->standardJson(true, 'Exchange asset payload prepared only.', $data);
    }
}
