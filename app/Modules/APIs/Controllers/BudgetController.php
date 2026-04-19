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
        $requestUri = (string) $this->request->getUri();
        $requestMethod = (string) $this->request->getMethod();
        $sessionId = method_exists($this->session, 'getId') ? (string) $this->session->getId() : '';
        $cookieHeader = (string) ($this->request->getHeaderLine('Cookie') ?? '');
        $sessionKeys = method_exists($this->session, 'get') ? array_keys((array) $this->session->get()) : [];

        [$userId, $source] = $this->resolveAuthenticatedUserId();

        log_message('debug', '[APIs\\BudgetController] {method} request: uri={uri} http_method={http_method} session_id={session_id} cookie_header_present={cookie_header_present} resolved_user_id={resolved_user_id} source={source} session_keys={session_keys}', [
            'method' => $method,
            'uri' => $requestUri,
            'http_method' => $requestMethod,
            'session_id' => $sessionId,
            'cookie_header_present' => $cookieHeader !== '' ? 'yes' : 'no',
            'resolved_user_id' => $userId ?? 'null',
            'source' => $source ?? 'none',
            'session_keys' => implode(',', $sessionKeys),
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

    /**
     * Resolve using the same path as authenticated page controllers first,
     * then fallback to known app compatibility session/auth keys.
     *
     * @return array{0:int|null,1:string|null}
     */
    protected function resolveAuthenticatedUserId(): array
    {
        if (isset($this->cuID) && is_numeric($this->cuID) && (int) $this->cuID > 0) {
            return [(int) $this->cuID, 'cuID'];
        }

        $parentResolvedId = parent::resolveCurrentUserId();
        if (is_numeric($parentResolvedId) && (int) $parentResolvedId > 0) {
            return [(int) $parentResolvedId, 'parent::resolveCurrentUserId'];
        }

        if (function_exists('auth')) {
            try {
                $auth = auth();
                if ($auth && method_exists($auth, 'id')) {
                    $authId = $auth->id();
                    if (is_numeric($authId) && (int) $authId > 0) {
                        return [(int) $authId, 'auth()->id()'];
                    }
                }
            } catch (\Throwable $e) {
                log_message('debug', '[APIs\\BudgetController] auth() lookup failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        if ($this->auth && method_exists($this->auth, 'id')) {
            $serviceAuthId = $this->auth->id();
            if (is_numeric($serviceAuthId) && (int) $serviceAuthId > 0) {
                return [(int) $serviceAuthId, 'service(authentication)->id()'];
            }
        }

        foreach (['cuID', 'user_id', 'userId', 'id', 'currentUserID', 'currentUserId'] as $sessionKey) {
            $value = $this->session->get($sessionKey);
            if (is_numeric($value) && (int) $value > 0) {
                return [(int) $value, "session:{$sessionKey}"];
            }
        }

        $sessionUser = $this->session->get('user');
        if (is_array($sessionUser)) {
            foreach (['id', 'user_id', 'cuID'] as $userIdKey) {
                $candidate = $sessionUser[$userIdKey] ?? null;
                if (is_numeric($candidate) && (int) $candidate > 0) {
                    return [(int) $candidate, "session:user.{$userIdKey}"];
                }
            }
        } elseif (is_object($sessionUser)) {
            foreach (['id', 'user_id', 'cuID'] as $userIdKey) {
                $candidate = $sessionUser->{$userIdKey} ?? null;
                if (is_numeric($candidate) && (int) $candidate > 0) {
                    return [(int) $candidate, "session:user->{$userIdKey}"];
                }
            }
        }

        $loggedIn = $this->session->get('logged_in');
        if (is_array($loggedIn)) {
            foreach (['id', 'user_id', 'cuID'] as $loggedInIdKey) {
                $candidate = $loggedIn[$loggedInIdKey] ?? null;
                if (is_numeric($candidate) && (int) $candidate > 0) {
                    return [(int) $candidate, "session:logged_in.{$loggedInIdKey}"];
                }
            }
        } elseif (is_numeric($loggedIn) && (int) $loggedIn > 0) {
            return [(int) $loggedIn, 'session:logged_in'];
        }

        return [null, null];
    }

    protected function showExceptionDetails(): bool
    {
        $siteSettings = config('SiteSettings');
        $debugEnabled = (int) ($siteSettings->debug ?? 0) === 1;

        return ENVIRONMENT !== 'production' || $debugEnabled;
    }
}
