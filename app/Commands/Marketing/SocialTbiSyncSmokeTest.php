<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialTbiSyncSmokeTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:tbi-sync-smoke-test';
    protected $description = 'Validate MyMI Wallet to TBI Marketing sync safety.';

    public function run(array $params)
    {
        $failures = [];
        $db = Database::connect();

        if (! class_exists(\App\Services\TbiMarketingExportService::class)) {
            $failures[] = 'Missing TbiMarketingExportService';
        }

        if (! class_exists(\App\Services\SocialExportService::class)) {
            $failures[] = 'Missing SocialExportService';
        }

        foreach (['bf_social_export_jobs', 'bf_social_delivery_logs'] as $table) {
            if (! $db->tableExists($table)) {
                $failures[] = 'Missing table: ' . $table;
            }
        }

        $enabled = filter_var(env('MYMI_MARKETING_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        if ($enabled) {
            $failures[] = 'MYMI_MARKETING_EXPORT_ENABLED must default false for safety smoke.';
        }

        $status = empty($failures) ? 'PASS' : 'FAIL';
        CLI::write('TBI Marketing Sync Smoke Test: ' . $status, empty($failures) ? 'green' : 'red');

        foreach ($failures as $failure) {
            CLI::error($failure);
        }

        file_put_contents(
            ROOTPATH . 'docs/_aiops/reports/marketing-tbi-sync-smoke-test.md',
            "# Marketing TBI Sync Smoke Test\n\n"
            . "- Status: {$status}\n"
            . "- Generated UTC: " . gmdate('c') . "\n"
            . "- Export enabled: " . ($enabled ? 'true' : 'false') . "\n"
        );

        return empty($failures) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
