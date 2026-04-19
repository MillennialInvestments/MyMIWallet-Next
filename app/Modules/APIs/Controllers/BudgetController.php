<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Services\AccountService;
use App\Services\BudgetService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class BudgetController extends BaseAPIController
{
    use ResponseTrait;

    protected $auth;
    protected $session;
    protected BudgetService $budgetService;
    protected AccountService $accountService;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->auth = service('authentication');
        $this->session = session();
        $this->budgetService = new BudgetService();
        $this->accountService = new AccountService();
    }

    public function getUserBudgetRecords(): ResponseInterface
    {
        return $this->handleRequest('getUserBudgetRecords', 'Failed to load budget records', function (int $userId): array {
            $records = $this->budgetService->getUserBudgetRecords($userId) ?? [];

            log_message('debug', '[APIs\\BudgetController] getUserBudgetRecords result count: {count}', [
                'count' => is_countable($records) ? count($records) : 0,
            ]);

            return [
                'records' => is_array($records) ? $records : [],
            ];
        });
    }

    public function getUserCreditBalances(): ResponseInterface
    {
        return $this->handleRequest('getUserCreditBalances', 'Failed to load credit balances', function (int $userId): array {
            $creditAccounts = $this->budgetService->getUserCreditAccounts($userId) ?? [];
            $currentBalances = $this->budgetService->getCurrentBalances(is_array($creditAccounts) ? $creditAccounts : []);

            log_message('debug', '[APIs\\BudgetController] getUserCreditBalances result count: {count}', [
                'count' => is_countable($creditAccounts) ? count($creditAccounts) : 0,
            ]);

            return [
                'creditAccounts' => is_array($creditAccounts) ? $creditAccounts : [],
                'currentBalances' => is_array($currentBalances) ? $currentBalances : [],
            ];
        });
    }

    public function getUserAvailableBalances(): ResponseInterface
    {
        return $this->handleRequest('getUserAvailableBalances', 'Failed to load available balances', function (int $userId): array {
            $creditAccounts = $this->budgetService->getUserCreditAccounts($userId) ?? [];
            $debtAccounts = $this->budgetService->getUserDebtAccounts($userId) ?? [];

            $repaymentSchedules = $this->budgetService->calculateRepaymentSchedules(is_array($creditAccounts) ? $creditAccounts : []);
            $availableBalances = $this->budgetService->getAvailableBalances(is_array($repaymentSchedules) ? $repaymentSchedules : []);
            $totalAvailableBalance = $this->budgetService->getTotalAvailableBalance(is_array($debtAccounts) ? $debtAccounts : []);

            log_message('debug', '[APIs\\BudgetController] getUserAvailableBalances result count: {count}', [
                'count' => is_countable($repaymentSchedules) ? count($repaymentSchedules) : 0,
            ]);

            return [
                'repaymentSchedules' => is_array($repaymentSchedules) ? $repaymentSchedules : [],
                'availableBalances' => is_array($availableBalances) ? $availableBalances : [],
                'totalAvailableBalance' => (float) ($totalAvailableBalance ?? 0),
            ];
        });
    }

    public function getUserRepaymentSummary(): ResponseInterface
    {
        return $this->handleRequest('getUserRepaymentSummary', 'Failed to load repayment summary', function (int $userId): array {
            $repaymentSummary = $this->budgetService->getRepaymentSummary($userId) ?? [];

            log_message('debug', '[APIs\\BudgetController] getUserRepaymentSummary result count: {count}', [
                'count' => is_countable($repaymentSummary) ? count($repaymentSummary) : 0,
            ]);

            return [
                'repaymentSummary' => $repaymentSummary,
            ];
        });
    }

    protected function handleRequest(string $method, string $failureMessage, callable $resolver): ResponseInterface
    {
        log_message('debug', '[APIs\\BudgetController] method entered: {method} uri: {uri}', [
            'method' => $method,
            'uri' => (string) $this->request->getUri(),
        ]);

        $userId = $this->resolveCurrentUserId();
        log_message('debug', '[APIs\\BudgetController] {method} resolved user id: {userId}', [
            'method' => $method,
            'userId' => $userId,
        ]);

        if ($userId === null) {
            log_message('debug', '[APIs\\BudgetController] {method} response status chosen: 401', [
                'method' => $method,
            ]);

            return $this->response
                ->setStatusCode(401)
                ->setContentType('application/json')
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ]);
        }

        try {
            $data = $resolver($userId);

            log_message('debug', '[APIs\\BudgetController] {method} response status chosen: 200', [
                'method' => $method,
            ]);

            return $this->response
                ->setStatusCode(200)
                ->setContentType('application/json')
                ->setJSON([
                    'status' => 'success',
                    'data' => $data,
                ]);
        } catch (\Throwable $e) {
            log_message('error', '[APIs\\BudgetController::{method}] {message}', [
                'method' => $method,
                'message' => $e->getMessage(),
            ]);

            $payload = [
                'status' => 'error',
                'message' => $failureMessage,
            ];

            if ($this->showExceptionDetails()) {
                $payload['error'] = $e->getMessage();
            }

            log_message('debug', '[APIs\\BudgetController] {method} response status chosen: 500', [
                'method' => $method,
            ]);

            return $this->response
                ->setStatusCode(500)
                ->setContentType('application/json')
                ->setJSON($payload);
        }
    }

    protected function resolveCurrentUserId(): ?int
    {
        $userId = null;

        if ($this->auth && method_exists($this->auth, 'id')) {
            $id = $this->auth->id();
            if ($id !== null && $id !== '') {
                $userId = (int) $id;
            }
        }

        if ($userId === null) {
            $sessionUserId = $this->session->get('user_id');
            if ($sessionUserId !== null && $sessionUserId !== '') {
                $userId = (int) $sessionUserId;
            }
        }

        return $userId;
    }

    protected function showExceptionDetails(): bool
    {
        $siteSettings = config('SiteSettings');
        $debugEnabled = (int) ($siteSettings->debug ?? 0) === 1;

        return ENVIRONMENT !== 'production' || $debugEnabled;
    }
}
