<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $isAuthenticated = $this->safeAuthCheck();

        if ($isAuthenticated) {
            return null;
        }

        if ($this->expectsJson($request)) {
            return Services::response()
                ->setStatusCode(401)
                ->setJSON([
                    'error'   => 'unauthorized',
                    'message' => 'Authentication required.',
                ]);
        }

        redirect_url_store((string) current_url(), [
            'writer' => 'AuthCheckFilter::before',
            'route' => trim((string) $request->getUri()->getPath(), '/'),
        ]);

        return redirect()->to(site_url('login'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function safeAuthCheck(): bool
    {
        try {
            $auth = service('authentication');
            if ($auth && method_exists($auth, 'check')) {
                return (bool) $auth->check();
            }
        } catch (\Throwable $e) {
            log_message('error', 'AuthCheckFilter safeAuthCheck failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return false;
    }

    private function expectsJson(RequestInterface $request): bool
    {
        $accepts = strtolower($request->getHeaderLine('Accept'));
        $content = strtolower($request->getHeaderLine('Content-Type'));
        $path = trim(strtolower((string) $request->getUri()->getPath()), '/');

        return str_contains($accepts, 'application/json')
            || str_contains($content, 'application/json')
            || str_starts_with($path, 'api/')
            || str_ends_with($path, '.js')
            || str_ends_with($path, '.mjs')
            || (method_exists($request, 'isAJAX') && $request->isAJAX());
    }
}