<?php

namespace Tests\Unit\SecureTransfer;

use App\Database\Migrations\CreateSecureTransferTables;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\TransferStore;
use Config\Database;

require_once __DIR__ . "/SecureTransferTest.php";
require_once APPPATH . "Database/Migrations/2026-11-21-000100_CreateSecureTransferTables.php";

/**
 * Runs every SecureTransferTest case again against the real SQL store, on a
 * private in-memory SQLite database built by the real migration.
 */
final class SecureTransferDbStoreTest extends SecureTransferTest
{
    protected function newStore(): TransferStore
    {
        $db = Database::connect([
            'DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8',
            'DBCollat' => '', 'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false,
            'failover' => [], 'port' => 0, 'foreignKeys' => true, 'busyTimeout' => 1000,
        ], false);
        $migration = new CreateSecureTransferTables(Database::forge($db));
        $migration->up();
        $migration->up(); // idempotent: second run only logs
        return new DbTransferStore($db);
    }
}
