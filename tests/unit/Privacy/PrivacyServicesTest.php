<?php

namespace Tests\Unit\Privacy;

use App\Libraries\Privacy\DataErasureService;
use App\Libraries\Privacy\DataExportService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-045: export holds the user's own data minus secrets; erasure removes personal data.
 */
final class PrivacyServicesTest extends CIUnitTestCase
{
    private const UID = 6601;
    private const OTHER = 6602;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_users (id INTEGER PRIMARY KEY AUTOINCREMENT, email TEXT NULL, username TEXT NULL, password_hash TEXT NULL, reset_hash TEXT NULL, activate_hash TEXT NULL, status TEXT NULL, status_message TEXT NULL, active INTEGER DEFAULT 0, force_pass_reset INTEGER DEFAULT 0, banned INTEGER DEFAULT 0, created_at TEXT NULL, updated_at TEXT NULL, deleted_at TEXT NULL)');
        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, amount NUMERIC DEFAULT 0, created_on DATETIME NULL, modified_on DATETIME NULL)');
        foreach (['credentials TEXT', 'account_number TEXT', 'nickname TEXT'] as $col) {
            try {
                $db->query('ALTER TABLE bf_users_wallet ADD COLUMN ' . $col . ' NULL');
            } catch (\Throwable $e) {
                // column already there
            }
        }
        $db->query('CREATE TABLE IF NOT EXISTS bf_user_ip_history (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NULL, email TEXT NULL, ip_address TEXT NOT NULL, user_agent TEXT NULL, first_seen_at TEXT NULL, last_seen_at TEXT NULL, hits INTEGER DEFAULT 1, created_at TEXT NULL, updated_at TEXT NULL, deleted_at TEXT NULL)');
        $this->cleanup();
        $db->table('bf_users')->insert(['id' => self::UID, 'email' => 'pat@example.com', 'username' => 'pat', 'password_hash' => 'HASH', 'active' => 1]);
        $db->table('bf_users')->insert(['id' => self::OTHER, 'email' => 'sam@example.com', 'username' => 'sam', 'password_hash' => 'HASH2', 'active' => 1]);
        $db->table('bf_users_wallet')->insert(['user_id' => self::UID, 'amount' => 50, 'credentials' => 'plaid-access-xyz', 'account_number' => '123456789', 'nickname' => 'Pat checking']);
        $db->table('bf_users_wallet')->insert(['user_id' => self::OTHER, 'amount' => 75, 'credentials' => 'other', 'account_number' => '999988887777']);
        $db->table('bf_user_ip_history')->insert(['user_id' => self::UID, 'ip_address' => '203.0.113.7']);
    }

    protected function tearDown(): void
    {
        $this->cleanup();
        parent::tearDown();
    }

    public function testExportContainsOnlyThisUsersDataWithoutSecrets(): void
    {
        $bundle = (new DataExportService(db_connect()))->buildBundle(self::UID);
        $json = json_encode($bundle);

        $this->assertSame('pat@example.com', $bundle['account']['email']);
        $this->assertArrayNotHasKey('password_hash', $bundle['account']);
        $this->assertCount(1, $bundle['tables']['bf_users_wallet']);
        $this->assertArrayNotHasKey('credentials', $bundle['tables']['bf_users_wallet'][0]);
        $this->assertSame('*****6789', $bundle['tables']['bf_users_wallet'][0]['account_number']);
        $this->assertStringNotContainsString('sam@example.com', $json);
        $this->assertStringNotContainsString('plaid-access-xyz', $json);
        $this->assertStringNotContainsString('HASH', $json);
    }

    public function testErasureRemovesPersonalDataButKeepsBalances(): void
    {
        $changed = (new DataErasureService(db_connect()))->pseudonymizeUser(self::UID);
        $this->assertGreaterThan(0, $changed);

        $db = db_connect();
        $user = $db->table('bf_users')->where('id', self::UID)->get()->getRowArray();
        $this->assertStringStartsWith('deleted+', $user['email']);
        $this->assertNull($user['password_hash']);
        $this->assertSame(0, (int) $user['active']);

        $wallet = $db->table('bf_users_wallet')->where('user_id', self::UID)->get()->getRowArray();
        $this->assertNull($wallet['credentials']);
        $this->assertNull($wallet['account_number']);
        $this->assertEqualsWithDelta(50.0, (float) $wallet['amount'], 0.001);

        $this->assertSame(0, $db->table('bf_user_ip_history')->where('user_id', self::UID)->countAllResults());

        $other = $db->table('bf_users')->where('id', self::OTHER)->get()->getRowArray();
        $this->assertSame('sam@example.com', $other['email']);
        $this->assertSame('other', $db->table('bf_users_wallet')->where('user_id', self::OTHER)->get()->getRow()->credentials);
    }

    private function cleanup(): void
    {
        $db = db_connect();
        $db->table('bf_users')->whereIn('id', [self::UID, self::OTHER])->delete();
        $db->table('bf_users_wallet')->whereIn('user_id', [self::UID, self::OTHER])->delete();
        $db->table('bf_user_ip_history')->whereIn('user_id', [self::UID, self::OTHER])->delete();
    }
}
