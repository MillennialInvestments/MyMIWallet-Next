<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

/**
 * Admin-only API guard (GTM-027). Lets a request through when either:
 *  - the session user is an admin (admin.access permission, or admin/superadmin group), or
 *  - it carries a valid X-Cron-Key / X-Internal-Token, for automations.
 * Everything else gets a JSON 401/403. Fails closed when the secrets are unset.
 */
class ApiAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($this->hasServiceToken($request)) {
            return null;
        }

        $userId = $this->userId();
        if ($userId <= 0) {
            return $this->deny(401, 'unauthorized', 'Authentication required.');
        }
        if ($this->isAdmin()) {
            return null;
        }

        return $this->deny(403, 'forbidden', 'Admin access required.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function hasServiceToken(RequestInterface $request): bool
    {
        $pairs = [
            [(string) env('CRON_KEY'), trim($request->getHeaderLine('X-Cron-Key'))],
            [(string) env('INTERNAL_API_TOKEN'), trim($request->getHeaderLine('X-Internal-Token'))],
        ];
        foreach ($pairs as [$expected, $provided]) {
            $expected = trim($expected);
            if ($expected !== '' && $provided !== '' && hash_equals($expected, $provided)) {
                return true;
            }
        }

        return false;
    }

    private function userId(): int
    {
        try {
            $auth = service('authentication');
            if ($auth && method_exists($auth, 'check') && $auth->check() && method_exists($auth, 'id')) {
                return (int) $auth->id();
            }
        } catch (\Throwable $e) {
            log_message('error', 'ApiAdminFilter auth check failed: {msg}', ['msg' => $e->getMessage()]);
        }

        return 0;
    }

    private function isAdmin(): bool
    {
        try {
            if (function_exists('has_permission') && has_permission('admin.access')) {
                return true;
            }
            if (function_exists('in_groups') && in_groups(['admin', 'superadmin'])) {
                return true;
            }
        } catch (\Throwable $e) {
            log_message('error', 'ApiAdminFilter role check failed: {msg}', ['msg' => $e->getMessage()]);
        }

        return false;
    }

    private function deny(int $status, string $code, string $message): ResponseInterface
    {
        return Services::response()->setStatusCode($status)->setJSON(['error' => $code, 'message' => $message]);
    }
}
