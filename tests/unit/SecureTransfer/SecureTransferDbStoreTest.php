<?php

namespace Tests\Unit\SecureTransfer;

use App\Database\Migrations\CreateSecureTransferAuditTables;
use App\Database\Migrations\CreateSecureTransferTables;
use App\Libraries\SecureTransfer\AuditLog;
use App\Libraries\SecureTransfer\DbAuditLog;
use CodeIgniter\Database\BaseConnection;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\TransferStore;
use Config\Database;

require_once __DIR__ . "/SecureTransferTest.php";
require_once APPPATH . "Database/Migrations/2026-11-21-000100_CreateSecureTransferTables.php";
require_once APPPATH . "Database/Migrations/2026-11-23-000100_CreateSecureTransferAuditTables.php";

/**
 * Runs every SecureTransferTest case again against the real SQL store, on a
 * private in-memory SQLite database built by the real migration.
 */
final class SecureTransferDbStoreTest extends SecureTransferTest
{
    private ?BaseConnection $auditDb = null;

    private static function sqlite(): BaseConnection
    {
        return Database::connect([
            'DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8',
            'DBCollat' => '', 'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false,
            'failover' => [], 'port' => 0, 'foreignKeys' => true, 'busyTimeout' => 1000,
        ], false);
    }

    protected function newStore(): TransferStore
    {
        $db = self::sqlite();
        $migration = new CreateSecureTransferTables(Database::forge($db));
        $migration->up();
        $migration->up(); // idempotent: second run only logs
        return new DbTransferStore($db);
    }

    protected function newAudit(): AuditLog
    {
        $this->auditDb = self::sqlite();
        $this->assertFalse(DbAuditLog::available($this->auditDb));
        $migration = new CreateSecureTransferAuditTables(Database::forge($this->auditDb));
        $migration->up();
        $migration->up(); // idempotent
        $this->assertTrue(DbAuditLog::available($this->auditDb));
        return new DbAuditLog($this->auditDb);
    }

    protected function editAuditRow(AuditLog $audit, int $id, array $set): void
    {
        $this->auditDb->table('bf_secure_transfer_audit')->where('id', $id)->update($set);
    }
}
