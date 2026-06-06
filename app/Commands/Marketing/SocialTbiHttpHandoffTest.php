<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Services\TbiMarketingExportService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialTbiHttpHandoffTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:tbi-http-handoff-test';
    protected $description = 'Create one direct TBI Marketing export job and send it over authenticated HTTP when enabled.';

    public function run(array $params)
    {
        $db = Database::connect();

        $enabled = filter_var(env('MYMI_MARKETING_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        $baseUrl = (string) env('TBI_MARKETING_API_BASE', '');
        $apiKey  = (string) env('TBI_MARKETING_API_KEY', '');

        $failures = [];

        if (! $enabled) {
            $failures[] = 'MYMI_MARKETING_EXPORT_ENABLED is false. Enable only for this controlled test.';
        }

        if ($baseUrl === '') {
            $failures[] = 'TBI_MARKETING_API_BASE is missing.';
        }

        if ($apiKey === '') {
            $failures[] = 'TBI_MARKETING_API_KEY is missing.';
        }

        foreach (['bf_social_export_jobs', 'bf_social_delivery_logs'] as $table) {
            if (! $db->tableExists($table)) {
                $failures[] = 'Missing table: ' . $table;
            }
        }

        if (! empty($failures)) {
            CLI::error('Phase 4D handoff precheck failed.');
            foreach ($failures as $failure) {
                CLI::error('- ' . $failure);
            }

            return EXIT_ERROR;
        }

        $now = date('Y-m-d H:i:s');
        $syntheticPostId = (int) date('YmdHis');

        $payload = [
            'source_app' => 'mymiwallet',
            'generated_post_id' => $syntheticPostId,
            'export_job_id' => null,
            'platform_key' => 'discord',
            'campaign_key' => 'phase4d-http-handoff',
            'post_title' => 'Phase 4D Authenticated MyMI to TBI Marketing Handoff',
            'post_body' => 'This is a controlled Phase 4D authenticated HTTP handoff test from MyMI Wallet to TBI Marketing. Draft only. No Zapier dispatch. No external social posting.',
            'hashtags' => '#MyMIWallet #TBIMarketing #AIOps',
            'tickers' => '$BTC $SOL',
            'cta_link' => 'https://www.mymiwallet.com/Register',
            'approval_required' => true,
            'external_posting' => false,
            'created_at' => gmdate('c'),
        ];

        $payloadJson = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $db->table('bf_social_export_jobs')->insert([
            'generated_post_id' => $syntheticPostId,
            'destination_type' => 'tbi_marketing',
            'destination_key' => 'tbi_marketing',
            'payload_json' => $payloadJson,
            'status' => 'approved',
            'attempts' => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $jobId = (int) $db->insertID();

        if ($jobId <= 0) {
            CLI::error('Failed to create direct export job: ' . json_encode($db->error()));
            return EXIT_ERROR;
        }

        $payload['export_job_id'] = $jobId;

        $db->table('bf_social_export_jobs')
            ->where('id', $jobId)
            ->update([
                'payload_json' => json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $sender = new TbiMarketingExportService();
        $sendResult = $sender->send($jobId);

        $reportDir = ROOTPATH . 'docs/_aiops/reports';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        file_put_contents(
            $reportDir . '/mymi-tbi-marketing-phase4d-http-handoff-test.md',
            "# MyMI to TBI Marketing Phase 4D HTTP Handoff Test\n\n"
            . "- Generated UTC: " . gmdate('c') . "\n"
            . "- Base URL: {$baseUrl}\n"
            . "- Synthetic generated post ID: {$syntheticPostId}\n"
            . "- Export job ID: {$jobId}\n\n"
            . "## Send Result\n\n```json\n"
            . json_encode($sendResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            . "\n```\n"
        );

        CLI::write(json_encode([
            'status' => 'complete',
            'synthetic_generated_post_id' => $syntheticPostId,
            'export_job_id' => $jobId,
            'send_result' => $sendResult,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return (($sendResult['status'] ?? '') === 'sent') ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
