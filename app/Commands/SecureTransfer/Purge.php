<?php

declare(strict_types=1);

namespace App\Commands\SecureTransfer;

use App\Libraries\SecureTransfer\CiphertextStore;
use App\Libraries\SecureTransfer\DbAuditLog;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\SecureTransferService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\SecureTransfer as SecureTransferConfig;

/**
 * Deletes the ciphertext of expired and withdrawn Secure Transfer files.
 * Lists only by default; --apply deletes. Metadata rows stay (marked purged).
 */
class Purge extends SafeBaseCommand
{
    protected $group = 'SecureTransfer';
    protected $name = 'securetransfer:purge';
    protected $description = 'Delete ciphertext of expired or withdrawn secure transfers (dry run unless --apply).';
    protected $usage = 'securetransfer:purge [--apply]';
    protected $options = ['--apply' => 'Delete the files. Without it the command only counts them.'];

    public function run(array $params)
    {
        $db = db_connect();
        if (!$db->tableExists('bf_secure_transfers')) {
            CLI::write('SEMANTIC_RESULT=PASS PURGEABLE=0 REASON=tables_not_migrated');
            return 0;
        }
        $config = config(SecureTransferConfig::class);
        $apply = array_key_exists('apply', $params) || CLI::getOption('apply') !== null;
        $audit = DbAuditLog::available($db) ? new DbAuditLog($db) : null;
        if ($audit === null && $apply) {
            CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=audit_tables_not_migrated (legal holds cannot be checked; nothing deleted)');
            return 1;
        }
        $result = (new SecureTransferService($config, new DbTransferStore($db), null, $audit))
            ->purge(new CiphertextStore($config->storagePath), $apply);
        CLI::write(sprintf('SEMANTIC_RESULT=PASS PURGEABLE=%d HELD=%d APPLIED=%s', $result['purgeable'], $result['held'], $apply ? 'true' : 'false'));
        return 0;
    }
}
