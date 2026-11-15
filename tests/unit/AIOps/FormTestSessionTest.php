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

    public function testRequestOptionsCarryBasicAuthAndCookieJar(): void
    {
        $opts = (new FormTestSession(null, null, 'staging:secret-pass'))->requestOptions();

        $this->assertSame(['staging', 'secret-pass', 'basic'], $opts['auth']);
        $this->assertNotEmpty($opts['cookie']);
    }

    public function testNoEnvMeansNoSession(): void
    {
        putenv('AIOPS_FORM_TEST_BASIC_AUTH');
        putenv('AIOPS_FORM_TEST_LOGIN');
        unset($_ENV['AIOPS_FORM_TEST_BASIC_AUTH'], $_ENV['AIOPS_FORM_TEST_LOGIN'], $_SERVER['AIOPS_FORM_TEST_BASIC_AUTH'], $_SERVER['AIOPS_FORM_TEST_LOGIN']);

        $this->assertNull(FormTestSession::fromEnv());
    }
}
