<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Modules\User\Controllers\BudgetController as UserBudgetController;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class BudgetAPIController extends BaseAPIController
{
    private function guard(): ?ResponseInterface
    {
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId !== null && $userId > 0) {
            return null;
        }

        if (! $this->auth || ! method_exists($this->auth, 'check') || ! $this->auth->check()) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Unauthorized. User not found.',
                'asOf'    => date('Y-m-d H:i:s'),
            ]);
        }

        if (method_exists($this->auth, 'user')) {
            $this->user = $this->auth->user();
        }

        return null;
    }

    public function summary(): ResponseInterface
    {
        return $this->apiBudgetData();
    }

    public function credit(): ResponseInterface
    {
        return $this->apiCreditData();
    }

    public function available(): ResponseInterface
    {
        return $this->apiAvailableData();
    }

    public function repayment(): ResponseInterface
    {
        return $this->apiRepaymentSummary();
    }

    public function categories(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $start = (string) ($this->request->getGet('from') ?? date('Y-m-01'));
        $end   = (string) ($this->request->getGet('to') ?? date('Y-m-t'));
        $categories = $this->getBudgetService()->getSpendingByCategory($userId, $start, $end);

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'categories' => $categories,
                'from'       => $start,
                'to'         => $end,
            ],
        ]);
    }

    public function transactions(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $start = (string) ($this->request->getGet('from') ?? date('Y-m-01'));
        $end   = (string) ($this->request->getGet('to') ?? date('Y-m-t'));
        $type  = $this->request->getGet('type');
        $rows  = $this->getBudgetService()->getMonthlyTransactions($userId, $start, $end, is_string($type) ? $type : null);

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'transactions' => $rows,
                'from'         => $start,
                'to'           => $end,
            ],
        ]);
    }

    public function goals(): ResponseInterface
    {
        return $this->savingsGoals();
    }

    public function insights(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $summary = $this->getBudgetService()->getUserFinancialSummary($userId);
        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $summary,
        ]);
    }

    public function trends(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $months = max(1, (int) ($this->request->getGet('months') ?? 6));
        $trends = $this->getBudgetService()->forecastBasedOnTrends($userId, $months);

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $trends,
        ]);
    }

    public function netWorth(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $budget = $this->getBudgetService()->getUserBudget($userId);
        $checking = (float) ($budget['checkingSummary'] ?? 0.0);
        $crypto   = (float) ($budget['cryptoSummary'] ?? 0.0);
        $invest   = (float) ($budget['investSummary'] ?? 0.0);
        $debt     = (float) ($budget['debtSummary'] ?? 0.0);

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'assets'      => round($checking + $crypto + $invest, 2),
                'liabilities' => round($debt, 2),
                'netWorth'    => round(($checking + $crypto + $invest) - $debt, 2),
            ],
        ]);
    }

    public function cashFlow(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $records  = $this->getBudgetService()->getUserBudgetRecords($userId) ?? [];
        $debts    = $this->getBudgetService()->getUserDebtAccounts($userId) ?? [];
        $snapshot = $this->getBudgetService()->summarizeCashFlow($records, $debts);

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $snapshot->toArray(),
        ]);
    }

    public function budgets(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $records = $this->getBudgetService()->getUserBudgetRecords($userId) ?? [];
        return $this->response->setJSON([
            'status' => 'success',
            'data'   => ['records' => $records],
        ]);
    }

    public function savingsGoals(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => ['goals' => [], 'userId' => $userId],
        ]);
    }

    public function investmentAccounts(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $accounts = method_exists($this->accountsModel, 'getUserInvestAccounts')
            ? ($this->accountsModel->getUserInvestAccounts($userId) ?? [])
            : [];

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => ['accounts' => $accounts],
        ]);
    }

    public function linkedAccounts(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        $bankAccounts   = $this->getBudgetService()->getUserBankAccounts($userId) ?? [];
        $creditAccounts = $this->getBudgetService()->getUserCreditAccounts($userId) ?? [];
        $debtAccounts   = $this->getBudgetService()->getUserDebtAccounts($userId) ?? [];

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'bankAccounts'   => $bankAccounts,
                'creditAccounts' => $creditAccounts,
                'debtAccounts'   => $debtAccounts,
            ],
        ]);
    }

    public function addLinkedAccount(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Linked account request accepted.',
            'data'    => ['userId' => $userId],
        ]);
    }

    public function removeLinkedAccount(string $accountKey): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Linked account unlinked.',
            'data'    => ['userId' => $userId, 'accountKey' => $accountKey],
        ]);
    }

    public function refreshLinkedAccount(string $accountKey): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized.']);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Linked account refresh queued.',
            'data'    => ['userId' => $userId, 'accountKey' => $accountKey],
        ]);
    }

    public function apiBudgetData(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Unauthorized. User not found.',
                'asOf'    => date('Y-m-d H:i:s'),
            ]);
        }

        $from = $this->request->getGet('from');
        $to   = $this->request->getGet('to');

        try {
            $service = $this->getBudgetService();
            $period  = $service->resolvePeriodWindow($from, $to);
            $context = [
                'from' => $period['from']->toDateString(),
                'to'   => $period['to']->toDateString(),
            ];

            $result = $this->rememberUserData(
                'api-summary',
                $userId,
                fn () => $service->buildBudgetSummary($userId, ['from' => $from, 'to' => $to]),
                $context
            );

            $resultData = $result['data'] ?? [];
            $status     = $resultData['status'] ?? 'success';
            $payload    = $resultData['data'] ?? $resultData;

            return $this->response->setJSON([
                'status'    => $status,
                'data'      => $payload,
                'fromCache' => $result['fromCache'] ?? false,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'apiBudgetData failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Budget data failed',
            ]);
        }
    }

    public function apiCreditData(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Unauthorized. User not found.',
                'asOf'    => date('Y-m-d H:i:s'),
            ]);
        }

        try {
            $service = $this->getBudgetService();
            $result  = $this->rememberUserData(
                'api-credit',
                $userId,
                fn () => $service->buildCreditBreakdown($userId)
            );

            $resultData = $result['data'] ?? [];
            $status     = $resultData['status'] ?? 'success';
            $payload    = $resultData['data'] ?? $resultData;

            return $this->response->setJSON([
                'status'    => $status,
                'data'      => $payload,
                'fromCache' => $result['fromCache'] ?? false,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'apiCreditData failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Credit data failed',
            ]);
        }
    }

    public function apiAvailableData(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Unauthorized. User not found.',
                'asOf'    => date('Y-m-d H:i:s'),
            ]);
        }

        $from = $this->request->getGet('from');
        $to   = $this->request->getGet('to');

        try {
            $service = $this->getBudgetService();
            $period  = $service->resolvePeriodWindow($from, $to);
            $context = [
                'from' => $period['from']->toDateString(),
                'to'   => $period['to']->toDateString(),
            ];

            $result = $this->rememberUserData(
                'api-available',
                $userId,
                fn () => $service->buildAvailableSnapshot($userId, ['from' => $from, 'to' => $to]),
                $context
            );

            $resultData = $result['data'] ?? [];
            $status     = $resultData['status'] ?? 'success';
            $payload    = $resultData['data'] ?? $resultData;

            return $this->response->setJSON([
                'status'    => $status,
                'data'      => $payload,
                'fromCache' => $result['fromCache'] ?? false,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'apiAvailableData failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Available balance data failed',
            ]);
        }
    }

    public function apiRepaymentSummary(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Unauthorized. User not found.',
                'asOf'    => date('Y-m-d H:i:s'),
            ]);
        }

        $strategyParam = $this->request->getGet('strategy');
        $strategy = $strategyParam ? strtolower((string) $strategyParam) : 'avalanche';
        if (! in_array($strategy, ['avalanche', 'snowball'], true)) {
            $strategy = 'avalanche';
        }

        try {
            $service = $this->getBudgetService();
            $result  = $this->rememberUserData(
                'api-repayment',
                $userId,
                fn () => $service->buildRepaymentSnapshot($userId, ['strategy' => $strategy]),
                ['strategy' => $strategy]
            );

            $resultData = $result['data'] ?? [];
            $status     = $resultData['status'] ?? 'success';
            $payload    = $resultData['data'] ?? $resultData;

            return $this->response->setJSON([
                'status'    => $status,
                'data'      => $payload,
                'fromCache' => $result['fromCache'] ?? false,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'apiRepaymentSummary failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Repayment summary failed',
            ]);
        }
    }
}