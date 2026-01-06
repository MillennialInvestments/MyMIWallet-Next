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
        try {
            return parent::before($request, $arguments);
        } catch (SecurityException $exception) {
            $this->logLoginCsrfDebug($request, $exception);

            throw $exception;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return parent::after($request, $response, $arguments);
    }

    private function logLoginCsrfDebug(RequestInterface $request, SecurityException $exception): void
    {
        if (ENVIRONMENT === 'production') {
            return;
        }

        $path = trim($request->getUri()->getPath(), '/');

        // Only add the verbose diagnostics for the login endpoint
        if ($path !== 'login' && ! str_ends_with($path, '/login')) {
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

        log_message('debug', 'CSRF failure on login route', [
            'method'               => strtoupper($request->getMethod()),
            'uri'                  => (string) $request->getUri(),
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
}
