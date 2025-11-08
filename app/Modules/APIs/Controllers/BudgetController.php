<?php
namespace App\Modules\APIs\Controllers;

use App\Modules\User\Controllers\BudgetController as UserBudgetController;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class BudgetController extends UserBudgetController
{
    private function guard(): ?ResponseInterface
    {
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