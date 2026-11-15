<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-018: the reset email must carry a working link, and Myth's reset-token
 * code must find its settings in this app's Shield-based Config\Auth.
 *
 * @internal
 */
final class PasswordResetTokenTest extends CIUnitTestCase
{
    public function testPlainFallbackResetEmailRendersAWorkingLink(): void
    {
        $this->assertInstanceOf(\Myth\Auth\Authentication\Resetters\ResetterInterface::class, service('resetter'));

        // The branded sender falls back to Myth's own template and config (GTM-017).
        $html = view((new \Myth\Auth\Config\Auth())->views['emailForgot'], ['hash' => 'abc123']);

        $this->assertStringContainsString(url_to('reset-password') . '?token=abc123', $html);
    }

    public function testBrandedResetEmailRendersAWorkingLink(): void
    {
        $html = view('emails/reset', ['name' => 'Member', 'ctaLabel' => 'Reset My Password', 'supportEmail' => 'support@example.com', 'actionUrl' => url_to('reset-password') . '?token=abc123']);

        $this->assertStringContainsString(url_to('reset-password') . '?token=abc123', $html);
    }

    public function testMythUserCanGenerateAnExpiringResetToken(): void
    {
        $user = new \Myth\Auth\Entities\User(['email' => 'member@example.com']);
        $user->generateResetHash();

        $this->assertSame(32, strlen((string) $user->reset_hash));
        $expires = strtotime((string) $user->toRawArray()['reset_expires']);
        $this->assertGreaterThan(time() + 3000, $expires);
        $this->assertLessThanOrEqual(time() + 3600, $expires);
    }
}
