<?php

declare(strict_types=1);

namespace App\Filters;

use App\Services\TwoFactorService;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

/**
 * Holds a signed-in user at the two-factor challenge until they enter a code,
 * when they have two-factor turned on (GTM-020). Users without 2FA are untouched.
 */
class TwoFactorFilter implements FilterInterface
{
    /** Paths reachable while a challenge is pending (lowercase, no leading slash). */
    private const ALLOW = [
        'auth/two-factor',
        'auth/two-factor/verify',
        'logout',
        'auth/logout',
        'health',
        'healthz',
        'system/healthz',
    ];

    private const ALLOW_PREFIXES = ['assets/', 'favicon', 'robots.txt', 'manifest'];

    public function before(RequestInterface $request, $arguments = null)
    {
        $userId = (int) (session('user_id') ?: session('cuID') ?: 0);
        if ($userId <= 0) {
            return null;
        }

        $uri  = $request->getUri();
        $path = method_exists($uri, 'getRoutePath') ? $uri->getRoutePath() : $uri->getPath();
        $path = trim(strtolower((string) $path), '/');
        if (str_starts_with($path, 'index.php/')) {
            $path = substr($path, 10);
        }
        if (in_array($path, self::ALLOW, true)) {
            return null;
        }
        foreach (self::ALLOW_PREFIXES as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return null;
            }
        }

        $service = new TwoFactorService();
        if ($service->isVerifiedInSession($userId) || ! $service->isEnabledCached($userId)) {
            return null;
        }

        if ($this->expectsJson($request, $path)) {
            return Services::response()->setStatusCode(401)->setJSON([
                'error'   => 'two_factor_required',
                'message' => 'Two-factor verification required.',
            ]);
        }

        if (strtolower($request->getMethod()) === 'get' && function_exists('redirect_url_store')) {
            redirect_url_store((string) current_url(), [
                'writer' => 'TwoFactorFilter::before',
                'route'  => $path,
            ]);
        }

        return redirect()->to(site_url('Auth/Two-Factor'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function expectsJson(RequestInterface $request, string $path): bool
    {
        return str_contains(strtolower($request->getHeaderLine('Accept')), 'application/json')
            || str_starts_with($path, 'api/')
            || (method_exists($request, 'isAJAX') && $request->isAJAX());
    }
}
