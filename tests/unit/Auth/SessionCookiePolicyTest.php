<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-019: session cookie policy and logout behaviour.
 *
 * @internal
 */
final class SessionCookiePolicyTest extends CIUnitTestCase
{
    public function testSessionCookieIsSecureHttpOnlyAndSameSite(): void
    {
        $cookie = new \Config\Cookie();

        $this->assertTrue($cookie->secure, 'cookies only over HTTPS');
        $this->assertTrue($cookie->httponly, 'scripts cannot read the session cookie');
        $this->assertContains(strtolower($cookie->samesite), ['lax', 'strict']);
    }

    public function testSessionExpiresAndLoginRotatesTheSessionId(): void
    {
        $session = new \Config\Session();
        $this->assertGreaterThan(0, $session->expiration);
        $this->assertLessThanOrEqual(86400, $session->expiration, 'idle sessions end within a day');

        $source = (string) file_get_contents(APPPATH . 'Controllers/AuthController.php');
        $this->assertStringContainsString('$this->session->regenerate(true);', $source, 'login must rotate the session id (fixation)');

        $logout = substr($source, (int) strpos($source, 'public function logout()'), 1500);
        $this->assertStringContainsString('$this->session->destroy();', $logout, 'logout must destroy the server-side session');
    }
}
