<?php

namespace App\Filters;

use CodeIgniter\Filters\CSRF;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Security\Exceptions\SecurityException;

class CsrfDebugFilter extends CSRF
{
    /**
     * Wrap the core CSRF filter so we can emit targeted diagnostics for login failures
     * during development without exposing token values.
     *
     * @param list<string>|null $arguments
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (ENVIRONMENT !== 'production') {
            log_message('debug', '[CSRF] token name=' . csrf_token() . ' hash=' . csrf_hash());
        }
        $this->primeBudgetAccountTokenFallback($request);

        try {
            return parent::before($request, $arguments);
        } catch (SecurityException $exception) {
            log_message('warning', '[CSRF][EXCEPTION] ' . $exception->getMessage());
            $this->logCsrfDebug($request, $exception);

            throw $exception;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return parent::after($request, $response, $arguments);
    }

    private function logCsrfDebug(RequestInterface $request, SecurityException $exception): void
    {
        if (ENVIRONMENT === 'production') {
            return;
        }

        $path = trim($request->getUri()->getPath(), '/');

        $isLogin = $path === 'login' || str_ends_with($path, '/login');
        $isBudgetAccount = str_contains(strtolower($path), 'budget/account');

        if (! $isLogin && ! $isBudgetAccount) {
            return;
        }

        $securityConfig = config('Security');
        $sessionConfig  = config('Session');

        $tokenFieldName = $securityConfig->tokenName ?? 'csrf_test_name';
        $cookieName     = $securityConfig->cookieName ?? 'csrf_cookie_name';
        $headerName     = $securityConfig->headerName ?? 'X-CSRF-TOKEN';
        $sessionCookie  = $sessionConfig->cookieName ?? 'ci_session';

        $postToken     = $request->getPost($tokenFieldName);
        $headerToken   = $request->getHeaderLine($headerName);
        $cookieToken   = $request->getCookie($cookieName);
        $sessionCookieValue = $request->getCookie($sessionCookie);

        log_message('debug', 'CSRF failure on tracked route', [
            'method'               => strtoupper($request->getMethod()),
            'uri'                  => (string) $request->getUri(),
            'routeType'            => $isBudgetAccount ? 'budget-account' : 'login',
            'tokenFieldName'       => $tokenFieldName,
            'postTokenPresent'     => $postToken !== null && $postToken !== '',
            'postTokenLength'      => is_string($postToken) ? strlen($postToken) : 0,
            'headerName'           => $headerName,
            'headerTokenPresent'   => $headerToken !== '',
            'headerTokenLength'    => is_string($headerToken) ? strlen($headerToken) : 0,
            'csrfCookieName'       => $cookieName,
            'csrfCookiePresent'    => $cookieToken !== null && $cookieToken !== '',
            'csrfCookieLength'     => is_string($cookieToken) ? strlen($cookieToken) : 0,
            'sessionCookieName'    => $sessionCookie,
            'sessionCookiePresent' => $sessionCookieValue !== null && $sessionCookieValue !== '',
            'sessionIdPresent'     => session()->getId() !== null,
            'exceptionMessage'     => $exception->getMessage(),
        ]);
    }

    private function primeBudgetAccountTokenFallback(RequestInterface $request): void
    {
        $path = strtolower(trim($request->getUri()->getPath(), '/'));
        if (! str_contains($path, 'budget/account')) {
            return;
        }

        if (strtoupper($request->getMethod()) !== 'POST') {
            return;
        }

        $securityConfig = config('Security');
        $tokenFieldName = $securityConfig->tokenName ?? 'csrf_test_name';
        $headerName = $securityConfig->headerName ?? 'X-CSRF-TOKEN';

        $postToken = $request->getPost($tokenFieldName);
        if (is_string($postToken) && $postToken !== '') {
            return;
        }

        $headerToken = $request->getHeaderLine($headerName);
        if ($headerToken === '') {
            $headerToken = $request->getHeaderLine('X-CSRF-Token');
        }
        if ($headerToken === '') {
            $headerToken = $request->getHeaderLine('X-XSRF-TOKEN');
        }

        if ($headerToken !== '') {
            $_POST[$tokenFieldName] = $headerToken;
            if (ENVIRONMENT !== 'production') {
                log_message('debug', '[CSRF] Primed POST token from header for budget/account route.');
            }
        }
    }
}
