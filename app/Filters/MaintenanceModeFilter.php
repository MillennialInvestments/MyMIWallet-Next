<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MaintenanceModeFilter implements FilterInterface
{
    /**
     * @var list<string>
     */
    private array $exemptPaths = [
        'maintenance',
        'support',
        'api/*',
        'management/*',
        'ops/*',
        'chat/*',
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        if (is_cli()) {
            return null;
        }

        $appConfig = config('App');
        if (! ($appConfig->maintenanceMode ?? false)) {
            return null;
        }

        if ($this->isAdminSession()) {
            return null;
        }

        $path = strtolower(trim((string) $request->getPath(), '/'));

        foreach ($this->exemptPaths as $pattern) {
            if ($this->matches($path, $pattern)) {
                return null;
            }
        }

        $retryAfter = (string) env('app.maintenanceRetryAfter', '600');

        return redirect()
            ->to(site_url('Maintenance'))
            ->setStatusCode(503)
            ->setHeader('Retry-After', $retryAfter);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function matches(string $path, string $pattern): bool
    {
        $normalized = strtolower(trim($pattern, '/'));

        if ($normalized === $path) {
            return true;
        }

        if (str_ends_with($normalized, '/*')) {
            $prefix = rtrim(substr($normalized, 0, -2), '/');

            if ($prefix === '') {
                return true;
            }

            return $path === $prefix || str_starts_with($path, $prefix . '/');
        }

        return false;
    }

    private function isAdminSession(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        if (function_exists('in_groups') && in_groups(['admin', 'superadmin'])) {
            return true;
        }

        try {
            $isAuthenticated = false;
            $user = null;

            $auth = service('authentication');
            if ($auth && method_exists($auth, 'check')) {
                $isAuthenticated = (bool) $auth->check();
            }

            if (! $isAuthenticated) {
                return false;
            }

            if ($auth && method_exists($auth, 'user')) {
                $user = $auth->user();
            }

            if ($user && method_exists($user, 'can') && $user->can('admin.access')) {
                return true;
            }
        } catch (\Throwable $e) {
            log_message('debug', 'MaintenanceModeFilter admin check skipped: ' . $e->getMessage());
        }

        return false;
    }
}
