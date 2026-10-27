<?php

declare(strict_types=1);

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use App\Libraries\Security\TotpService;
use App\Libraries\Security\Crypto;
use App\Models\UserTwoFactorModel;
use App\Modules\User\Controllers\AccountController;
use App\Controllers\AuthController;

/**
 * @internal
 */
final class TwoFactorAuthTest extends CIUnitTestCase
{
    public function testTotpServiceGeneratesSecretAndValidOtpauthUrl(): void
    {
        $secret = TotpService::generateSecret();
        $this->assertNotEmpty($secret);
        $this->assertGreaterThanOrEqual(16, strlen($secret));

        $url = TotpService::otpauthUrl('MyMI Wallet', 'testuser@example.com', $secret);
        $this->assertStringStartsWith('otpauth://totp/MyMI%20Wallet:testuser%40example.com', $url);
        $this->assertStringContainsString('secret=' . $secret, $url);
        $this->assertStringContainsString('digits=6', $url);
    }

    public function testTotpServiceGeneratesAndVerifiesValidCode(): void
    {
        $secret = TotpService::generateSecret();
        $timeSlice = (int) floor(time() / 30);
        $validCode = TotpService::code($secret, $timeSlice);

        $this->assertSame(6, strlen($validCode));
        $this->assertTrue(TotpService::verify($secret, $validCode));

        // Negative test: invalid 6-digit code
        $invalidCode = str_pad((string) ((intval($validCode) + 111111) % 1000000), 6, '0', STR_PAD_LEFT);
        if ($invalidCode === $validCode) {
            $invalidCode = '999999';
        }
        $this->assertFalse(TotpService::verify($secret, $invalidCode));
    }

    public function testCryptoEncryptAndDecryptRoundTrip(): void
    {
        $plaintextSecret = TotpService::generateSecret();
        $enc = Crypto::encrypt($plaintextSecret);

        $this->assertArrayHasKey('ciphertext', $enc);
        $this->assertArrayHasKey('iv', $enc);
        $this->assertArrayHasKey('tag', $enc);

        $decrypted = Crypto::decrypt($enc['ciphertext'], $enc['iv'], $enc['tag']);
        $this->assertSame($plaintextSecret, $decrypted);
    }

    public function testBackupCodeGenerationAndArgon2idHashing(): void
    {
        if (! function_exists('crypto_hash_password')) {
            require_once APPPATH . 'Helpers/CryptoHelper.php';
        }

        $backupCodes = [];
        for ($i = 0; $i < 5; $i++) {
            $backupCodes[] = strtoupper(bin2hex(random_bytes(4)));
        }

        $this->assertCount(5, $backupCodes);
        $this->assertSame(8, strlen($backupCodes[0]));

        $hashes = array_map(static fn($c) => \crypto_hash_password($c), $backupCodes);

        $this->assertCount(5, $hashes);
        $this->assertStringStartsWith('$argon2id$', $hashes[0]);

        // Test positive verification
        $this->assertTrue(\crypto_verify_password($backupCodes[0], $hashes[0]));

        // Test negative verification
        $this->assertFalse(\crypto_verify_password('WRONGCOD', $hashes[0]));

        // Test consumption (single-use invariant)
        $consumedIndex = 0;
        unset($hashes[$consumedIndex]);
        $remainingHashes = array_values($hashes);
        $this->assertCount(4, $remainingHashes);

        // Code 0 should no longer match any remaining hash
        $stillMatches = false;
        foreach ($remainingHashes as $h) {
            if (\crypto_verify_password($backupCodes[0], $h)) {
                $stillMatches = true;
                break;
            }
        }
        $this->assertFalse($stillMatches, 'Consumed backup code must not match remaining hashes');
    }

    public function testTwoFactorModelAndControllerMethodContract(): void
    {
        $model = new UserTwoFactorModel();
        $this->assertSame('bf_user_2fa', $model->getTable());

        // AccountController TOTP endpoints
        $this->assertTrue(method_exists(AccountController::class, 'twoFactor'));
        $this->assertTrue(method_exists(AccountController::class, 'enable2fa'));
        $this->assertTrue(method_exists(AccountController::class, 'verify2fa'));
        $this->assertTrue(method_exists(AccountController::class, 'disable2fa'));
        $this->assertTrue(method_exists(AccountController::class, 'regenerateBackupCodes'));

        // AuthController 2FA & social routes
        $this->assertTrue(method_exists(AuthController::class, 'get2FAQRCode'));
        $this->assertTrue(method_exists(AuthController::class, 'verify2FACode'));
        $this->assertTrue(method_exists(AuthController::class, 'redirectToProvider'));
        $this->assertTrue(method_exists(AuthController::class, 'handleProviderCallback'));
        $this->assertTrue(method_exists(AuthController::class, 'linkProvider'));
        $this->assertTrue(method_exists(AuthController::class, 'unlinkProvider'));
    }
}
