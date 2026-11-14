<?php

namespace Tests\Unit\Security;

use App\Libraries\Security\TotpService;
use App\Services\TwoFactorService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-020: TOTP must interoperate with standard authenticator apps.
 */
final class TotpServiceTest extends CIUnitTestCase
{
    // RFC 6238 Appendix B test key "12345678901234567890" (SHA-1), base32-encoded at runtime.
    private const RFC_KEY = '12345678901234567890';
    private const RFC_SECRET_PREFIX = 'GEZDGNBV';

    public function testBase32RoundTrip(): void
    {
        $secret = self::secret();
        $this->assertStringStartsWith(self::RFC_SECRET_PREFIX, $secret);
        $this->assertSame(32, strlen($secret));
        $this->assertSame(self::RFC_KEY, TotpService::base32Decode($secret));
    }

    public function testRfc6238Vectors(): void
    {
        // Appendix B lists 8-digit codes; the 6-digit code is the last six digits.
        $vectors = [59 => '287082', 1111111109 => '081804', 1234567890 => '005924', 2000000000 => '279037'];
        foreach ($vectors as $time => $expected) {
            $this->assertSame($expected, TotpService::code(self::secret(), intdiv($time, 30)), "t={$time}");
            $this->assertTrue(TotpService::verify(self::secret(), $expected, 0, $time));
        }
    }

    public function testWrongOrMalformedCodesRejected(): void
    {
        $this->assertFalse(TotpService::verify(self::secret(), '000000', 0, 59));
        $this->assertFalse(TotpService::verify(self::secret(), '28708', 0, 59));
        $this->assertFalse(TotpService::verify(self::secret(), 'abcdef', 0, 59));
    }

    public function testGeneratedSecretIsBase32(): void
    {
        $secret = TotpService::generateSecret();
        $this->assertMatchesRegularExpression('/^[A-Z2-7]{32}$/', $secret);
        $code = TotpService::code($secret, intdiv(time(), 30));
        $this->assertTrue(TotpService::verify($secret, $code));
    }

    public function testQrCodeIsRenderedLocally(): void
    {
        $uri = TwoFactorService::qrDataUri(TotpService::otpauthUrl('MyMI Wallet', 'user@example.com', self::secret()));
        $this->assertStringStartsWith('data:image/svg+xml;base64,', $uri);
        $this->assertStringNotContainsString(self::secret(), $uri);
    }

    private static function secret(): string
    {
        return TotpService::base32Encode(self::RFC_KEY);
    }
}
