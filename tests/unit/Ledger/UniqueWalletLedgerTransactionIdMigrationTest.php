<?php

declare(strict_types=1);

namespace Tests\Unit\Ledger;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-032: the wallet ledger must reject a replayed transaction_id at the DB level.
 */
final class UniqueWalletLedgerTransactionIdMigrationTest extends CIUnitTestCase
{
    private const FILE = APPPATH . 'Database/Migrations/2026-11-16-000100_UniqueWalletLedgerTransactionId.php';

    public function testMigrationExistsAndTargetsLedger(): void
    {
        $this->assertFileExists(self::FILE);
        $src = (string) file_get_contents(self::FILE);
        $this->assertStringContainsString('bf_users_wallet_transactions', $src);
        $this->assertStringContainsString('uq_wallet_tx_transaction_id', $src);
        $this->assertStringContainsString('function down', $src);
    }

    public function testMigrationRefusesWhenDuplicatesExist(): void
    {
        $src = (string) file_get_contents(self::FILE);
        $this->assertMatchesRegularExpression('/HAVING\s+COUNT\(\*\)\s*>\s*1/i', $src, 'must detect duplicates before adding the index');
    }
}
