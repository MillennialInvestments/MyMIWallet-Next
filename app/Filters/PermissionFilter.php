<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Exceptions\PermissionException;

class PermissionFilter extends BaseFilter implements FilterInterface
{
    /**
     * @param array|null $arguments
     *
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $isAuthenticated = $this->safeAuthenticateCheck();

        if (! $isAuthenticated) {
            redirect_url_store((string) current_url(), [
                'writer' => 'PermissionFilter::before',
                'route' => trim((string) $request->getUri()->getPath(), '/'),
            ]);
            return redirect($this->reservedRoutes['login']);
        }

        if (empty($arguments)) {
            return;
        }

        if (! isset($this->authorize)) {
            throw new \RuntimeException('Authorization service not initialized.');
        }

        $userId = $this->safeAuthenticateId();

        foreach ($arguments as $permission) {
            if (! $this->authorize->hasPermission($permission, $userId)) {
                $isSilent = false;

                try {
                    $isSilent = $this->authenticate && method_exists($this->authenticate, 'silent')
                        ? (bool) $this->authenticate->silent()
                        : false;
                } catch (\Throwable $e) {
                    log_message('error', 'PermissionFilter silent check failed: {message}', [
                        'message' => $e->getMessage(),
                        'trace'   => $e->getTraceAsString(),
                    ]);
                }

                if ($isSilent) {
                    $redirectURL = session('redirect_url') ?? route_to($this->landingRoute);
                    unset($_SESSION['redirect_url']);

                    return redirect()
                        ->to($redirectURL)
                        ->with('error', lang('Auth.notEnoughPrivilege'));
                }

                throw new PermissionException(lang('Auth.notEnoughPrivilege'));
            }
        }
    }

    /**
     * @param array|null $arguments
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

    private function safeAuthenticateCheck(): bool
    {
        try {
            if (isset($this->authenticate) && $this->authenticate && method_exists($this->authenticate, 'check')) {
                return (bool) $this->authenticate->check();
            }
        } catch (\Throwable $e) {
            log_message('error', 'PermissionFilter safeAuthenticateCheck failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return false;
    }

    private function safeAuthenticateId(): int
    {
        try {
            if (isset($this->authenticate) && $this->authenticate && method_exists($this->authenticate, 'id')) {
                return (int) ($this->authenticate->id() ?? 0);
            }
        } catch (\Throwable $e) {
            log_message('error', 'PermissionFilter safeAuthenticateId failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return 0;
    }
}