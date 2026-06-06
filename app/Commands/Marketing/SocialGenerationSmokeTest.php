<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialGenerationSmokeTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:generation-smoke-test';
    protected $description = 'Validate multi-platform social content generation without external posting.';

    public function run(array $params)
    {
        $failures = [];

        if (! class_exists(\App\Services\SocialContentGenerationService::class)) {
            $failures[] = 'Missing SocialContentGenerationService';
        }

        $service = new \App\Services\SocialContentGenerationService();
        $pack = $service->generateFromManualInput('Crypto budgeting watchlist with $SOL and $BTC', 'advanced', 'join_discord');

        if (($pack['status'] ?? '') !== 'success') {
            $failures[] = 'Pack generation failed.';
        }

        if (count($pack['items'] ?? []) < 8) {
            $failures[] = 'Expected at least 8 platform items.';
        }

        foreach (($pack['items'] ?? []) as $item) {
            if (($item['status'] ?? '') !== 'draft') {
                $failures[] = 'Generated item was not draft.';
            }
            if (empty($item['post_body'])) {
                $failures[] = 'Generated item missing post body.';
            }
        }

        $status = empty($failures) ? 'PASS' : 'FAIL';
        CLI::write('Social Generation Smoke Test: ' . $status, empty($failures) ? 'green' : 'red');

        foreach ($failures as $failure) {
            CLI::error($failure);
        }

        $reportDir = ROOTPATH . 'docs/_aiops/reports';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        file_put_contents(
            $reportDir . '/marketing-social-generation-smoke-test.md',
            "# Marketing Social Generation Smoke Test\n\n"
            . "- Status: {$status}\n"
            . "- Generated UTC: " . gmdate('c') . "\n"
            . "- Items: " . count($pack['items'] ?? []) . "\n\n"
            . "## Failures\n"
            . (empty($failures) ? "- None\n" : "- " . implode("\n- ", $failures) . "\n")
        );

        return empty($failures) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
