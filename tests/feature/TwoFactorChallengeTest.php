<?php

use App\Libraries\Security\Crypto;
use App\Libraries\Security\TotpService;
use App\Services\TwoFactorService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Services;

/**
 * GTM-020: the login challenge page renders and accepts a valid TOTP code.
 *
 * @internal
 */
final class TwoFactorChallengeTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private const UID = 4301;
    private string $secret;

    protected function setUp(): void
    {
        parent::setUp();
        // The user has already passed the password step.
        Services::injectMock('authentication', new class {
            public function check(): bool { return true; }
            public function id(): int { return 4301; }
            public function user() { return null; }
        });
        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_user_2fa (
            id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, is_enabled INTEGER DEFAULT 0,
            secret_ciphertext BLOB NULL, secret_iv BLOB NULL, secret_tag BLOB NULL,
            backup_codes_hashes TEXT NULL, created_at DATETIME NULL, updated_at DATETIME NULL)');
        $db->table('bf_user_2fa')->where('user_id', self::UID)->delete();
        $this->secret = TotpService::generateSecret();
        $enc = Crypto::encrypt($this->secret);
        $db->table('bf_user_2fa')->insert([
            'user_id' => self::UID, 'is_enabled' => 1,
            'secret_ciphertext' => $enc['ciphertext'], 'secret_iv' => $enc['iv'], 'secret_tag' => $enc['tag'],
        ]);
    }

    protected function tearDown(): void
    {
        db_connect()->table('bf_user_2fa')->where('user_id', self::UID)->delete();
        parent::tearDown();
    }

    public function testChallengePageRenders(): void
    {
        $result = $this->withSession(['user_id' => self::UID])->get('Auth/Two-Factor');
        $result->assertStatus(200);
        $result->assertSee('Two-factor verification');
    }

    public function testValidCodeMarksSessionVerified(): void
    {
        $code   = TotpService::code($this->secret, intdiv(time(), 30));
        $result = $this->postVerify($code);
        $result->assertRedirectTo(site_url('Dashboard'));
        $result->assertSessionHas(TwoFactorService::SESSION_VERIFIED, self::UID);
    }

    public function testWrongCodeIsRejected(): void
    {
        $result = $this->postVerify('000000');
        $result->assertRedirectTo(site_url('Auth/Two-Factor'));
        $result->assertSessionMissing(TwoFactorService::SESSION_VERIFIED);
    }

    private function postVerify(string $code)
    {
        $token = csrf_hash();

        return $this->withSession(['user_id' => self::UID, csrf_token() => $token])
            ->post('Auth/Two-Factor/verify', [csrf_token() => $token, 'code' => $code]);
    }
}
