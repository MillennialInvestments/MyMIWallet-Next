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

    public function testMigrationRollbackLogicDefined()
    {
        $ref = new ReflectionClass(ShieldIdentityBackfill::class);
        $source = file_get_contents($ref->getFileName());

        $this->assertStringContainsString('DELETE FROM auth_identities', $source);
        $this->assertStringContainsString('email_password', $source);
        $this->assertTrue(true);
    }
}
