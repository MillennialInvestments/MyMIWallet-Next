<?php

declare(strict_types=1);

namespace Tests\Unit\Ops;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GTM-060: Prove Backup, Restore, and Disaster Recovery Invariants.
 */
final class BackupRestoreDisasterRecoveryTest extends CIUnitTestCase
{
    private const BACKUP_SCRIPT = ROOTPATH . 'scripts/ops/backup/mysql-backup.sh';
    private const RESTORE_SCRIPT = ROOTPATH . 'scripts/ops/backup/mysql-restore-check.sh';
    private const OFFSITE_SCRIPT = ROOTPATH . 'scripts/ops/backup/offsite-sync.sh';
    private const SYSTEMD_DIR = ROOTPATH . 'scripts/ops/backup/systemd/';

    public function testBackupScriptInvariants(): void
    {
        $this->assertFileExists(self::BACKUP_SCRIPT);
        $content = (string) file_get_contents(self::BACKUP_SCRIPT);

        $this->assertStringContainsString('set -euo pipefail', $content);
        $this->assertStringContainsString('umask 077', $content, 'Backups must enforce private umask');
        $this->assertStringContainsString('--single-transaction', $content, 'Must use non-locking single transaction');
        $this->assertStringContainsString('Dump completed', $content, 'Must verify completeness trailer');
        $this->assertStringContainsString('sha256sum', $content, 'Must generate sha256 checksum');
    }

    public function testRestoreCheckScriptInvariants(): void
    {
        $this->assertFileExists(self::RESTORE_SCRIPT);
        $content = (string) file_get_contents(self::RESTORE_SCRIPT);

        $this->assertStringContainsString('set -euo pipefail', $content);
        $this->assertStringContainsString('Refusing: scratch DB name equals the live DB', $content, 'Must prevent overwriting live DB');
        $this->assertStringContainsString('DROP DATABASE IF EXISTS', $content, 'Must clean up scratch database');
        $this->assertStringContainsString('sha256sum -c', $content, 'Must verify checksum integrity if present');
        $this->assertStringContainsString('bf_users', $content, 'Must verify users table restoration');
        $this->assertStringContainsString('bf_users_wallet', $content, 'Must verify wallets table restoration');
        $this->assertStringContainsString('RESTORE CHECK PASSED', $content);
    }

    public function testOffsiteSyncScriptInvariants(): void
    {
        $this->assertFileExists(self::OFFSITE_SCRIPT);
        $content = (string) file_get_contents(self::OFFSITE_SCRIPT);

        $this->assertStringContainsString('set -euo pipefail', $content);
        $this->assertStringContainsString('umask 077', $content);
        $this->assertStringContainsString('--ignore-existing', $content, 'Must never overwrite immutable dumps');
        $this->assertStringContainsString('offsite ok:', $content);
    }

    public function testSystemdUnitsConfigured(): void
    {
        $expectedUnits = [
            'mymi-db-backup.service',
            'mymi-db-backup.timer',
            'mymi-db-restore-check.service',
            'mymi-db-restore-check.timer',
        ];

        foreach ($expectedUnits as $unit) {
            $path = self::SYSTEMD_DIR . $unit;
            $this->assertFileExists($path, "Systemd unit {$unit} missing");
            $content = (string) file_get_contents($path);
            $this->assertNotEmpty($content);
        }
    }
}
