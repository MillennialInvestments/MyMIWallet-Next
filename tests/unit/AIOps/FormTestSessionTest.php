<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Services\AIOps\FormTestSession;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * STAGING-002: the staging form-test session finds the CSRF token and sends
 * basic auth plus a cookie jar.
 *
 * @internal
 */
final class FormTestSessionTest extends CIUnitTestCase
{
    public function testExtractsCsrfFromHiddenInputEitherOrder(): void
    {
        $this->assertSame('abc123', FormTestSession::extractCsrf('<input type="hidden" name="csrf_test_name" value="abc123">', 'csrf_test_name'));
        $this->assertSame('def456', FormTestSession::extractCsrf("<input value='def456' name='csrf_test_name' type='hidden'>", 'csrf_test_name'));
    }

    public function testExtractsCsrfFromMetaTag(): void
    {
        $this->assertSame('meta789', FormTestSession::extractCsrf('<meta name="csrf-token" content="meta789">', 'csrf_test_name'));
        $this->assertNull(FormTestSession::extractCsrf('<p>no token</p>', 'csrf_test_name'));
    }

    public function testRequestOptionsCarryBasicAuthAndSessionCookies(): void
    {
        $session = new FormTestSession(null, null, 'staging:secret-pass');
        $session->absorbCookieLine('ci_session=abc123; expires=Mon, 16-Nov-2026 00:00:00 GMT; path=/; HttpOnly');
        $session->absorbCookieLine('ci_session=def456; path=/');
        $session->absorbCookieLine('other=1; path=/');
        $session->absorbCookieLine('other=deleted; path=/');
        $opts = $session->requestOptions();

        $this->assertSame(['staging', 'secret-pass', 'basic'], $opts['auth']);
        $this->assertSame('ci_session=def456', $opts['headers']['Cookie']);
    }

    public function testNoEnvMeansNoSession(): void
    {
        putenv('AIOPS_FORM_TEST_BASIC_AUTH');
        putenv('AIOPS_FORM_TEST_LOGIN');
        unset($_ENV['AIOPS_FORM_TEST_BASIC_AUTH'], $_ENV['AIOPS_FORM_TEST_LOGIN'], $_SERVER['AIOPS_FORM_TEST_BASIC_AUTH'], $_SERVER['AIOPS_FORM_TEST_LOGIN']);

        $this->assertNull(FormTestSession::fromEnv());
    }

    public function testAbsorbReadsEverySetCookieHeader(): void
    {
        $response = new \CodeIgniter\HTTP\Response(config('App'));
        $response->addHeader('Set-Cookie', 'ci_session=one; path=/');
        $response->addHeader('Set-Cookie', 'remember=two; path=/');
        $session = new FormTestSession();
        $session->absorb($response);

        $this->assertSame(['ci_session' => 'one', 'remember' => 'two'], $session->cookies());
    }

    public function testExtractsLoginAlertText(): void
    {
        $html = '<div class="alert alert-danger" role="alert"><strong>Login failed.</strong> Please verify your password. AUTH-LOGIN-003</div>';
        $this->assertSame('Login failed. Please verify your password. AUTH-LOGIN-003', FormTestSession::extractAlert($html));
        $this->assertNull(FormTestSession::extractAlert('<p>ok</p>'));
    }

    public function testAppLogSinceReturnsOnlyNewSignInLines(): void
    {
        $dir = sys_get_temp_dir() . '/formtest-log-' . bin2hex(random_bytes(3));
        mkdir($dir);
        file_put_contents($dir . '/log-2026-11-15.php', implode("\n", [
            'NOTICE - 2026-11-15 22:30:00 --> [AUTH_FAIL] old line',
            'INFO - 2026-11-15 22:35:01 --> CSRF token verified.',
            'DEBUG - 2026-11-15 22:35:01 --> unrelated',
            'NOTICE - 2026-11-15 22:35:02 --> [AUTH_FAIL] Login validation failed',
        ]));

        $lines = FormTestSession::appLogSince('2026-11-15 22:35:00', $dir);

        $this->assertSame(['22:35:01 CSRF token verified.', '22:35:02 [AUTH_FAIL] Login validation failed'], $lines);
        array_map('unlink', glob($dir . '/*'));
        rmdir($dir);
    }
}
