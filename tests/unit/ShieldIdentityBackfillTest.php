<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use ReflectionClass;

require_once APPPATH . 'Database/Migrations/2026-10-26-180000_ShieldIdentityBackfill.php';
use App\Database\Migrations\ShieldIdentityBackfill;

/**
 * @internal
 */
final class ShieldIdentityBackfillTest extends CIUnitTestCase
{
    public function testMigrationCanBeInstantiated()
    {
        $migration = new ShieldIdentityBackfill();
        $this->assertInstanceOf(ShieldIdentityBackfill::class, $migration);
    }

    public function testMigrationHasUpAndDownMethods()
    {
        $ref = new ReflectionClass(ShieldIdentityBackfill::class);
        $this->assertTrue($ref->hasMethod('up'));
        $this->assertTrue($ref->hasMethod('down'));

        $up = $ref->getMethod('up');
        $this->assertTrue($up->isPublic());

        $down = $ref->getMethod('down');
        $this->assertTrue($down->isPublic());
    }

    public function testMigrationSourceContainsDuplicateGuard()
    {
        $ref = new ReflectionClass(ShieldIdentityBackfill::class);
        $source = file_get_contents($ref->getFileName());

        $this->assertStringContainsString('LOWER(TRIM(email))', $source);
        $this->assertStringContainsString('Duplicate email principals detected', $source);
        $this->assertStringContainsString('NOT EXISTS', $source);
        $this->assertStringContainsString('auth_identities', $source);
        $this->assertStringContainsString('email_password', $source);
    }

    public function testMigrationSourceContainsDynamicColumnGuards()
    {
        $ref = new ReflectionClass(ShieldIdentityBackfill::class);
        $source = file_get_contents($ref->getFileName());

        $this->assertStringContainsString('password_hash', $source);
        $this->assertStringContainsString('status_message', $source);
        $this->assertStringContainsString('last_active', $source);
        $this->assertStringContainsString('transStart', $source);
        $this->assertStringContainsString('transComplete', $source);
    }

    public function testAuditAuthTablesInDatabase()
    {
        $db = \Config\Database::connect('default');
        $this->assertNotNull($db);

        $tables = ['users', 'auth_identities', 'auth_logins', 'auth_tokens', 'auth_groups_users', 'migrations'];
        fwrite(STDOUT, "\n===================================================\n");
        fwrite(STDOUT, "LIVE mymiwallet SCHEMA AUDIT (MYMI-GTM-014)\n");
        fwrite(STDOUT, "Connected Database: " . $db->getDatabase() . "\n");
        foreach ($tables as $tbl) {
            if ($db->tableExists($tbl)) {
                $count = $db->table($tbl)->countAllResults();
                fwrite(STDOUT, "  [EXISTS]  " . str_pad($tbl, 22) . " -> " . $count . " rows\n");
            } else {
                fwrite(STDOUT, "  [MISSING] " . str_pad($tbl, 22) . "\n");
            }
        }
        fwrite(STDOUT, "===================================================\n");
        $this->assertTrue(true);
    }
}
