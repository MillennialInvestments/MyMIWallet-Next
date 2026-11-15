<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use Config\Services;

/**
 * STAGING-002: a signed-in browser-like session for live form tests on staging.
 *
 * Reads these env values (all optional; without them submits stay anonymous):
 *   AIOPS_FORM_TEST_BASIC_AUTH  "user:password" for the staging basic-auth prompt
 *   AIOPS_FORM_TEST_LOGIN       test account email (e.g. the staging tester)
 *   AIOPS_FORM_TEST_PASSWORD    test account password
 *
 * It keeps a cookie jar, signs in once through /login with the page's CSRF
 * token, and adds the current CSRF token to every POST. It refuses to run in
 * production.
 */
final class FormTestSession
{
    private ?string $basicUser = null;
    private ?string $basicPass = null;
    private string $cookieFile;
    private bool $loggedIn = false;
    private ?string $csrfToken = null;
    private string $csrfName;
    /** @var list<string> */
    private array $notes = [];

    public function __construct(
        private readonly ?string $login = null,
        private readonly ?string $password = null,
        ?string $basicAuth = null,
    ) {
        if ($basicAuth !== null && str_contains($basicAuth, ':')) {
            [$this->basicUser, $this->basicPass] = explode(':', $basicAuth, 2);
        }
        $this->cookieFile = tempnam(sys_get_temp_dir(), 'formtest-cookies-') ?: (WRITEPATH . 'formtest-cookies.txt');
        $this->csrfName = (string) (config('Security')->tokenName ?? 'csrf_test_name');
    }

    public static function fromEnv(): ?self
    {
        if (ENVIRONMENT === 'production') {
            return null;
        }
        $basic = trim((string) env('AIOPS_FORM_TEST_BASIC_AUTH', ''));
        $login = trim((string) env('AIOPS_FORM_TEST_LOGIN', ''));
        $password = (string) env('AIOPS_FORM_TEST_PASSWORD', '');
        if ($basic === '' && $login === '') {
            return null;
        }

        return new self($login !== '' ? $login : null, $password !== '' ? $password : null, $basic !== '' ? $basic : null);
    }

    public function __destruct()
    {
        if (is_file($this->cookieFile)) {
            @unlink($this->cookieFile);
        }
    }

    /** @return list<string> */
    public function notes(): array
    {
        return $this->notes;
    }

    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    /** Options to merge into a curlrequest call: basic auth and the cookie jar. */
    public function requestOptions(): array
    {
        $opts = ['cookie' => $this->cookieFile];
        if ($this->basicUser !== null) {
            $opts['auth'] = [$this->basicUser, (string) $this->basicPass, 'basic'];
        }

        return $opts;
    }

    /** Adds the CSRF token to a POST payload, signing in first when a login is configured. */
    public function preparePayload(string $method, array $payload): array
    {
        $this->ensureLoggedIn();
        if (strtoupper($method) !== 'GET' && $this->csrfToken !== null) {
            $payload[$this->csrfName] = $this->csrfToken;
        }

        return $payload;
    }

    public function ensureLoggedIn(): void
    {
        if ($this->loggedIn || $this->login === null || $this->password === null) {
            if ($this->csrfToken === null) {
                $this->refreshCsrf('login');
            }
            return;
        }

        $this->refreshCsrf('login');
        $payload = ['login' => $this->login, 'password' => $this->password];
        if ($this->csrfToken !== null) {
            $payload[$this->csrfName] = $this->csrfToken;
        }

        $resp = $this->client(false)->request('POST', site_url('login'), $this->requestOptions() + ['form_params' => $payload]);
        $location = $resp->getHeaderLine('Location');
        $this->loggedIn = in_array($resp->getStatusCode(), [302, 303], true) && stripos($location, 'login') === false;
        $this->notes[] = $this->loggedIn
            ? 'Signed in as the form-test account.'
            : 'Sign-in failed (HTTP ' . $resp->getStatusCode() . '); submits run anonymous.';

        // The token is kept per session; read it again from a signed-in page.
        $this->refreshCsrf($this->loggedIn ? 'Dashboard' : 'login');
    }

    public static function extractCsrf(string $html, string $name): ?string
    {
        $q = preg_quote($name, '/');
        foreach ([
            '/name=["\']' . $q . '["\'][^>]*value=["\']([^"\']+)["\']/i',
            '/value=["\']([^"\']+)["\'][^>]*name=["\']' . $q . '["\']/i',
            '/meta[^>]+name=["\']csrf-token["\'][^>]*content=["\']([^"\']+)["\']/i',
            '/meta[^>]+content=["\']([^"\']+)["\'][^>]*name=["\']csrf-token["\']/i',
        ] as $re) {
            if (preg_match($re, $html, $m)) {
                return $m[1];
            }
        }

        return null;
    }

    private function refreshCsrf(string $path): void
    {
        try {
            $resp = $this->client(true)->request('GET', site_url($path), $this->requestOptions());
            $token = self::extractCsrf((string) $resp->getBody(), $this->csrfName);
            if ($token !== null) {
                $this->csrfToken = $token;
            } elseif ($resp->getStatusCode() === 401) {
                $this->notes[] = 'Basic auth was refused (HTTP 401); check AIOPS_FORM_TEST_BASIC_AUTH.';
            }
        } catch (\Throwable $e) {
            $this->notes[] = 'CSRF fetch failed: ' . $e->getMessage();
        }
    }

    private function client(bool $followRedirects)
    {
        return Services::curlrequest([
            'timeout' => 25,
            'http_errors' => false,
            'allow_redirects' => $followRedirects,
        ], null, null, false);
    }
}
