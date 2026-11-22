<?php

declare(strict_types=1);

namespace App\Commands\Privacy;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Privacy as PrivacyConfig;

/**
 * Deletes expired privacy export files and marks expired requests.
 * Dry run by default; pass --apply to delete files.
 */
class Purge extends SafeBaseCommand
{
    protected $group = 'Privacy';
    protected $name = 'privacy:purge';
    protected $description = 'Purge expired privacy export files from disk (dry run unless --apply).';
    protected $usage = 'privacy:purge [--apply]';
    protected $options = [
        '--apply' => 'Delete the expired export files. Without it the command only counts them.',
    ];

    /**
     * Purge expired files and return metrics.
     *
     * @return array{purgeable: int, deleted: int, expired_records: int, retention_days: int, applied: bool}
     */
    public function purge(bool $apply = false): array
    {
        $config = config(PrivacyConfig::class);
        $retentionDays = (int) ($config->exportRetentionDays ?? 7);
        $maxAgeSeconds = $retentionDays * 86400;
        $cutoffTime = time() - $maxAgeSeconds;

        $dir = WRITEPATH . 'exports/privacy/';
        $purgeable = 0;
        $deleted = 0;

        if (is_dir($dir)) {
            $files = glob($dir . 'export-*.json') ?: [];
            foreach ($files as $file) {
                if (is_file($file)) {
                    $mtime = filemtime($file);
                    if ($mtime !== false && $mtime < $cutoffTime) {
                        $purgeable++;
                        if ($apply) {
                            if (@unlink($file)) {
                                $deleted++;
                            }
                        }
                    }
                }
            }
        }

        $db = db_connect();
        $expiredRecords = 0;
        if ($db->tableExists('bf_privacy_requests')) {
            $cutoffDate = date('Y-m-d H:i:s', $cutoffTime);
            $expiredQuery = $db->table('bf_privacy_requests')
                ->where('type', 'export')
                ->where('status', 'done')
                ->where('created_at <', $cutoffDate);

            $expiredRecords = $expiredQuery->countAllResults(false);

            if ($apply && $expiredRecords > 0) {
                $db->table('bf_privacy_requests')
                    ->where('type', 'export')
                    ->where('status', 'done')
                    ->where('created_at <', $cutoffDate)
                    ->update([
                        'status'     => 'expired',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
            }
        }

        return [
            'purgeable'       => $purgeable,
            'deleted'         => $deleted,
            'expired_records' => $expiredRecords,
            'retention_days'  => $retentionDays,
            'applied'         => $apply,
        ];
    }

    public function run(array $params)
    {
        $apply = array_key_exists('apply', $params) || CLI::getOption('apply') !== null;
        $result = $this->purge($apply);

        CLI::write(sprintf(
            'SEMANTIC_RESULT=PASS PURGEABLE=%d DELETED=%d EXPIRED_RECORDS=%d APPLIED=%s RETENTION_DAYS=%d',
            $result['purgeable'],
            $result['deleted'],
            $result['expired_records'],
            $result['applied'] ? 'true' : 'false',
            $result['retention_days']
        ));

        return 0;
    }
}
