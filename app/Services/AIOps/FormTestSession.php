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
    /** @var array<string, string> cookie name => value, kept by hand (no curl cookie jar) */
    private array $cookies = [];
    private bool $loggedIn = false;
    private bool $loginTried = false;
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

    /** @return list<string> */
    public function notes(): array
    {
        return $this->notes;
    }

    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    /** Options to merge into a curlrequest call: basic auth and the session cookies. */
    public function requestOptions(): array
    {
        $opts = ['headers' => []];
        if ($this->cookies !== []) {
            $pairs = [];
            foreach ($this->cookies as $name => $value) {
                $pairs[] = $name . '=' . $value;
            }
            $opts['headers']['Cookie'] = implode('; ', $pairs);
        }
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

    /** Keeps the cookies a response sets (the session id changes at sign-in). */
    public function absorb($response): void
    {
        $headers = $response->header('Set-Cookie');
        foreach (is_array($headers) ? $headers : ($headers === null ? [] : [$headers]) as $header) {
            foreach ((array) $header->getValue() as $line) {
                $this->absorbCookieLine((string) $line);
            }
        }
    }

    public function absorbCookieLine(string $line): void
    {
        $first = trim(explode(';', $line, 2)[0]);
        if (! str_contains($first, '=')) {
            return;
        }
        [$name, $value] = array_map('trim', explode('=', $first, 2));
        if ($name === '') {
            return;
        }
        if ($value === '' || strcasecmp($value, 'deleted') === 0) {
            unset($this->cookies[$name]);
            return;
        }
        $this->cookies[$name] = $value;
    }

    /** @return array<string, string> */
    public function cookies(): array
    {
        return $this->cookies;
    }

    public function ensureLoggedIn(): void
    {
        // Sign in at most once per run: retrying on every form trips the login rate limit.
        if ($this->loggedIn || $this->loginTried || $this->login === null || $this->password === null) {
            if ($this->csrfToken === null && ! $this->loginTried) {
                $this->loginTried = true;
                $this->refreshCsrf('login');
            }
            return;
        }
        $this->loginTried = true;

        $this->refreshCsrf('login');
        $payload = ['login' => $this->login, 'password' => $this->password];
        if ($this->csrfToken !== null) {
            $payload[$this->csrfName] = $this->csrfToken;
        }

        $resp = $this->client(false)->request('POST', site_url('login'), $this->requestOptions() + ['form_params' => $payload]);
        $this->absorb($resp);
        $location = $resp->getHeaderLine('Location');
        $this->loggedIn = in_array($resp->getStatusCode(), [302, 303], true) && stripos($location, 'login') === false;
        $this->notes[] = $this->loggedIn
            ? 'Signed in as the form-test account (redirect to ' . (parse_url($location, PHP_URL_PATH) ?: '/') . ').'
            : sprintf(
                'Sign-in failed (HTTP %d, redirect to %s, csrf token %s, cookies sent: %s); submits run anonymous. '
                . 'If the redirect is /login the password is wrong: run sudo bash ~/mymi-staging.sh set-password tester.',
                $resp->getStatusCode(),
                parse_url($location, PHP_URL_PATH) ?: 'none',
                $this->csrfToken !== null ? 'found' : 'MISSING',
                $this->cookies !== [] ? implode(',', array_keys($this->cookies)) : 'none'
            );

        if (! $this->loggedIn) {
            $this->notes[] = 'Login page says: ' . ($this->loginPageMessage() ?? '(no message found)');
        }

        // The token is kept per session; read it again from a signed-in page.
        $this->refreshCsrf($this->loggedIn ? 'Dashboard' : 'login');
    }

    /** The error the login page shows after a failed sign-in (flash message), as plain text. */
    private function loginPageMessage(): ?string
    {
        try {
            $resp = $this->client(false)->request('GET', site_url('login'), $this->requestOptions());
            $this->absorb($resp);

            return self::extractAlert((string) $resp->getBody());
        } catch (\Throwable $e) {
            return 'could not read the login page: ' . $e->getMessage();
        }
    }

    public static function extractAlert(string $html): ?string
    {
        if (preg_match_all('~class=["\'][^"\']*\balert\b[^"\']*["\'][^>]*>(.*?)</div>~is', $html, $m)) {
            foreach ($m[1] as $chunk) {
                $text = trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($chunk))));
                if ($text !== '') {
                    return mb_substr($text, 0, 240);
                }
            }
        }

        return null;
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
            $resp = $this->client(false)->request('GET', site_url($path), $this->requestOptions());
            $this->absorb($resp);
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
