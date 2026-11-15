<?php

declare(strict_types=1);

use App\Database\Migrations\AlignUsersViewForAuth;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Config\Database;

/**
 * GTM-017/018. The migration only acts where `users` is a MySQL view over
 * bf_users (production). Its MySQL behaviour was exercised against a MariaDB
 * replica of the production view (see PR #703). Here: it must leave every other
 * database untouched, and its column list must cover what the auth models write.
 *
 * @internal
 */
final class AlignUsersViewForAuthMigrationTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    public function testIsANoOpWhereUsersIsNotAMysqlView(): void
    {
        require_once APPPATH . 'Database/Migrations/2026-11-15-000100_AlignUsersViewForAuth.php';

        $prefix = $this->db->getPrefix();
        $this->db->setPrefix('');
        $this->db->query('DROP TABLE IF EXISTS bf_users');
        $this->db->query('CREATE TABLE bf_users (id INTEGER PRIMARY KEY, email TEXT)');
        $this->db->resetDataCache();

        try {
            (new AlignUsersViewForAuth(Database::forge($this->db)))->up();
            $this->assertSame(['id', 'email'], $this->db->getFieldNames('bf_users'));
            $this->assertFalse($this->db->tableExists('bf_schema_view_backups', false));
        } finally {
            $this->db->query('DROP TABLE IF EXISTS bf_users');
            $this->db->setPrefix($prefix);
        }
    }

    public function testAddsEveryColumnMythAuthWritesThroughTheView(): void
    {
        $columns = (new ReflectionClassConstant(AlignUsersViewForAuth::class, 'BF_USERS_COLUMNS'))->getValue();

        // Myth\Auth UserModel uses timestamps and soft deletes; its User entity
        // and the reset/ban flows write these.
        foreach (['created_at', 'updated_at', 'deleted_at', 'reset_at', 'reset_expires', 'force_pass_reset', 'status', 'status_message'] as $c) {
            $this->assertArrayHasKey($c, $columns);
        }
        $this->assertStringContainsString('GENERATED ALWAYS AS', $columns['deleted_at'], 'deleted_at must stay derived from the deleted flag');
        foreach ($columns as $c => $definition) {
            $this->assertMatchesRegularExpression('/NULL|DEFAULT|GENERATED/', $definition, $c . ' must not need a value on existing rows');
        }
    }
}
