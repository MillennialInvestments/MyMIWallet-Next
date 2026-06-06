<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Services\SocialContentGenerationService;
use App\Services\SocialExportService;
use App\Services\TbiMarketingExportService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialTbiHttpHandoffTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:tbi-http-handoff-test';
    protected $description = 'Create one social draft export job and send it to TBI Marketing over authenticated HTTP when enabled.';

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

        if (! empty($failures)) {
            CLI::error('Phase 4D handoff precheck failed.');
            foreach ($failures as $failure) {
                CLI::error('- ' . $failure);
            }

            return EXIT_ERROR;
        }

        $generation = new SocialContentGenerationService();
        $pack = $generation->generateFromManualInput(
            'Phase 4D authenticated MyMI Wallet to TBI Marketing handoff test',
            'business',
            'website'
        );

        $saved = $generation->saveGeneratedPack($pack, 'phase4d_http_handoff', 0);

        $post = $db->table('bf_social_generated_posts')
            ->orderBy('id', 'DESC')
            ->get(1)
            ->getRowArray();

        if (! $post) {
            CLI::error('No generated social post found after generation.');
            return EXIT_ERROR;
        }

        $export = new SocialExportService();

        $job = $export->createExportJobFromGeneratedPost((int) $post['id'], 'tbi_marketing');

        if (($job['status'] ?? '') !== 'success') {
            CLI::error('Failed to create export job: ' . json_encode($job));
            return EXIT_ERROR;
        }

        $jobId = (int) $job['export_job_id'];
        $export->approveExportJob($jobId);

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
            . "- Generated post ID: " . ($post['id'] ?? '') . "\n"
            . "- Export job ID: {$jobId}\n"
            . "- Saved drafts: " . json_encode($saved) . "\n\n"
            . "## Send Result\n\n```json\n"
            . json_encode($sendResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            . "\n```\n"
        );

        CLI::write(json_encode([
            'status' => 'complete',
            'generated_post_id' => (int) $post['id'],
            'export_job_id' => $jobId,
            'send_result' => $sendResult,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return (($sendResult['status'] ?? '') === 'sent') ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
