<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    /**
     * Myth/Auth route names that should not be intercepted by this filter.
     * Adjust to match your app if you renamed routes.
     */
    protected array $reservedRoutes = [
        'login',
        'logout',
        'register',
        'register-success',
        'register-resend-activation',
        'register-segment',
        'dynamic-register',
        'dynamic-register-referral',
        'forgot',
        'forgot-password',
        'reset-password',
        'activate',
        'activate-account-get',
        'activate-account',
        'activate-account-by-uri',
        'resend-activation',
        'resend-activation-code',
        'resend-activate-account',
        'auth-provider',
        'auth-provider-callback',
        'auth-link-provider',
        'auth-unlink-provider',
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        // 1) Skip reserved auth routes
        foreach ($this->reservedRoutes as $reservedRoute) {
            try {
                $route = route_to($reservedRoute);
                if ($route && url_is($route)) {
                    return;
                }
            } catch (\Throwable $e) {
                // route_to() will throw if a route name doesn't exist — ignore safely
            }
        }

        // 2) If Myth/Auth is present, use it (preferred)
        if (function_exists('logged_in')) {
            if (! logged_in()) {
                $session    = session();
                $currentUrl = current_url();

                if (! $session->has('redirect_url')) {
                    $session->set('redirect_url', $currentUrl);
                }

                log_message('debug', 'LoginFilter redirecting guest to login from: ' . $currentUrl);

                return redirect()->to(site_url('login'));
            }

            return;
        }

        // 3) Fallback: session-based login checks (covers non-Myth setups)
        $session = session();
        $isLoggedIn =
            (bool) $session->get('logged_in')
            || (bool) $session->get('isLoggedIn')
            || (bool) $session->get('user_id')
            || (bool) $session->get('cuID');

        if (! $isLoggedIn) {
            $currentUrl = current_url();

            if (! $session->has('redirect_url')) {
                $session->set('redirect_url', $currentUrl);
            }

            log_message('debug', 'LoginFilter redirecting guest to login from: ' . $currentUrl);

            return redirect()->to(site_url('login'));
        }

        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // no-op
    }
}
