<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialFunnelAudit extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:funnel-audit';
    protected $description = 'Audit social funnel attribution and community analytics.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialTrackingService();
        $result = $service->audit();

        $reportDir = ROOTPATH . 'docs/_aiops/reports';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        file_put_contents(
            $reportDir . '/social-funnel-audit.md',
            "# Social Funnel Audit\n\n"
            . "- Generated UTC: " . gmdate('c') . "\n"
            . "- Status: " . ($result['status'] ?? 'unknown') . "\n\n"
            . "## Top Platform\n\n```json\n" . json_encode($result['top_platform'], JSON_PRETTY_PRINT) . "\n```\n\n"
            . "## Top Campaign\n\n```json\n" . json_encode($result['top_campaign'], JSON_PRETTY_PRINT) . "\n```\n\n"
            . "## Top Community\n\n```json\n" . json_encode($result['top_community'], JSON_PRETTY_PRINT) . "\n```\n"
        );

        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
