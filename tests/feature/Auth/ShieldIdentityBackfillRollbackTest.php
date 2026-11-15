<?php

declare(strict_types=1);

use App\Database\Migrations\ShieldIdentityBackfill;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Config\Database;

/**
 * GTM-015: the backfill's down() must remove only the identities it created,
 * never ones made by real registrations or password changes.
 *
 * @internal
 */
final class ShieldIdentityBackfillRollbackTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        require_once APPPATH . 'Database/Migrations/2026-10-26-180000_ShieldIdentityBackfill.php';

        $this->prefix = $this->db->getPrefix();
        $this->db->setPrefix('');
        $this->db->query('DROP TABLE IF EXISTS users');
        $this->db->query('DROP TABLE IF EXISTS auth_identities');
        $this->db->query('CREATE TABLE users (id INTEGER PRIMARY KEY, email VARCHAR(255), password_hash VARCHAR(255), created_at DATETIME)');
        $this->db->query('CREATE TABLE auth_identities (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, type VARCHAR(255), name VARCHAR(255), secret VARCHAR(255), secret2 VARCHAR(255), force_reset TINYINT, created_at DATETIME, updated_at DATETIME)');
        $this->db->resetDataCache();
    }

    protected function tearDown(): void
    {
        $this->db->query('DROP TABLE IF EXISTS users');
        $this->db->query('DROP TABLE IF EXISTS auth_identities');
        $this->db->setPrefix($this->prefix);
        parent::tearDown();
    }

    private function migration(): ShieldIdentityBackfill
    {
        return new ShieldIdentityBackfill(Database::forge($this->db));
    }

    private function identities(): array
    {
        return $this->db->query('SELECT user_id, name FROM auth_identities ORDER BY user_id')->getResultArray();
    }

    public function testDownRemovesOnlyBackfilledIdentities(): void
    {
        $this->db->query("INSERT INTO users (id, email, password_hash) VALUES (1, 'a@example.test', 'h1'), (2, 'B@example.test ', 'h2'), (3, 'c@example.test', 'h3')");
        // User 3 already has a real identity from a normal registration.
        $this->db->query("INSERT INTO auth_identities (user_id, type, name, secret, secret2) VALUES (3, 'email_password', NULL, 'c@example.test', 'h3')");

        $this->migration()->up();

        $this->assertSame([
            ['user_id' => '1', 'name' => ShieldIdentityBackfill::BACKFILL_MARKER],
            ['user_id' => '2', 'name' => ShieldIdentityBackfill::BACKFILL_MARKER],
            ['user_id' => '3', 'name' => null],
        ], array_map(static fn ($r) => ['user_id' => (string) $r['user_id'], 'name' => $r['name']], $this->identities()));

        $this->migration()->down();

        $this->assertSame([['user_id' => '3', 'name' => null]],
            array_map(static fn ($r) => ['user_id' => (string) $r['user_id'], 'name' => $r['name']], $this->identities()));
    }

    public function testUpAbortsOnDuplicateEmailsWithoutWriting(): void
    {
        $this->db->query("INSERT INTO users (id, email, password_hash) VALUES (1, 'dup@example.test', 'h1'), (2, ' DUP@example.test', 'h2')");

        try {
            $this->migration()->up();
            $this->fail('Expected the duplicate-email guard to abort');
        } catch (RuntimeException $e) {
            $this->assertStringContainsString('Duplicate email principals', $e->getMessage());
        }

        $this->assertSame([], $this->identities());
    }
}
