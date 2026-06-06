<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialOrchestrationSmokeTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:orchestration-smoke-test';
    protected $description = 'Validate social export/Zapier/TBI Marketing orchestration safety.';

    public function run(array $params)
    {
        $db = Database::connect();
        $failures = [];

        foreach ([
            'bf_social_webhooks',
            'bf_social_export_jobs',
            'bf_social_delivery_logs',
            'bf_social_performance_events',
        ] as $table) {
            if (! $db->tableExists($table)) {
                $failures[] = 'Missing table: ' . $table;
            }
        }

        foreach ([
            \App\Services\SocialExportService::class,
            \App\Services\ZapierWebhookService::class,
        ] as $class) {
            if (! class_exists($class)) {
                $failures[] = 'Missing service: ' . $class;
            }
        }

        $zapierEnabled = filter_var(env('MYMI_ZAPIER_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        if ($zapierEnabled) {
            $failures[] = 'MYMI_ZAPIER_EXPORT_ENABLED must default false for smoke test safety.';
        }

        foreach ([
            'docs/integrations/zapier/community_marketing_zapier_strategy.md',
            'docs/integrations/zapier/payload_contract.md',
            'docs/integrations/zapier/zapier_setup_checklist.md',
            'docs/integrations/tbi-marketing/mymiwallet_to_tbi_marketing_contract.md',
            'docs/integrations/tbi-marketing/status_sync_strategy.md',
        ] as $doc) {
            if (! is_file(ROOTPATH . $doc)) {
                $failures[] = 'Missing doc: ' . $doc;
            }
        }

        $status = empty($failures) ? 'PASS' : 'FAIL';
        CLI::write('Social Orchestration Smoke Test: ' . $status, empty($failures) ? 'green' : 'red');

        foreach ($failures as $failure) {
            CLI::error($failure);
        }

        $reportDir = ROOTPATH . 'docs/_aiops/reports';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        file_put_contents(
            $reportDir . '/marketing-social-orchestration-smoke-test.md',
            "# Marketing Social Orchestration Smoke Test\n\n"
            . "- Status: {$status}\n"
            . "- Generated UTC: " . gmdate('c') . "\n\n"
            . "## Failures\n"
            . (empty($failures) ? "- None\n" : "- " . implode("\n- ", $failures) . "\n")
        );

        return empty($failures) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
