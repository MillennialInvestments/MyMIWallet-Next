<?php

declare(strict_types=1);

use App\Legacy\Auth\Config\Auth as LegacyAuth;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Myth\Auth\Models\LoginModel;

/**
 * AUTH-LOGIN-006: Myth reads some settings from config('Auth'), which is the
 * Shield config here. Each one it reads must exist, or the login, reset or
 * remember-me path that reads it throws "Undefined property".
 *
 * @internal
 */
final class MythConfigCompatTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = false;

    public function testShieldConfigCarriesEverySettingMythReadsFromIt(): void
    {
        $config = config('Auth');
        $legacy = new LegacyAuth();

        foreach (['allowRemembering', 'rememberLength', 'resetTime'] as $name) {
            $this->assertTrue(property_exists($config, $name), "config('Auth') is missing {$name}");
            $this->assertSame($legacy->{$name}, $config->{$name}, "{$name} differs from the legacy Myth config");
        }
    }

    public function testRememberTokenPurgeDoesNotThrow(): void
    {
        $forge = \Config\Database::forge();
        $forge->addField([
            'id'              => ['type' => 'INTEGER', 'auto_increment' => true],
            'selector'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'hashedValidator' => ['type' => 'VARCHAR', 'constraint' => 255],
            'user_id'         => ['type' => 'INTEGER'],
            'expires'         => ['type' => 'DATETIME'],
        ]);
        $forge->addKey('id', true);
        $forge->createTable('auth_tokens', true);

        $db = db_connect();
        $db->table('auth_tokens')->insert(['selector' => 'old', 'hashedValidator' => 'x', 'user_id' => 1, 'expires' => '2000-01-01 00:00:00']);

        model(LoginModel::class)->purgeOldRememberTokens();

        $this->assertSame(0, $db->table('auth_tokens')->where('selector', 'old')->countAllResults());
        $forge->dropTable('auth_tokens', true);
    }
}
