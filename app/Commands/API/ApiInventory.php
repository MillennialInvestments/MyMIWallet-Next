<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Libraries\ApiResearch\ApiReportWriter;
use App\Models\ApiResearchRunModel;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ApiInventory extends SafeBaseCommand
{
    protected $group       = 'API';
    protected $name        = 'api:inventory';
    protected $description = 'Build docs/APIs/_inventory.md from latest API research runs.';

    public function run(array $params)
    {
        $runModel = new ApiResearchRunModel();
        $rows = $runModel->select('provider_slug, provider_name, status, markdown_report_path, json_snapshot_path, pages_scraped, endpoints_found, integration_score, completed_at, start_url')
            ->orderBy('id', 'DESC')
            ->findAll();

        $latest = [];

        foreach ($rows as $row) {
            $slug = (string) $row['provider_slug'];

            if (! isset($latest[$slug])) {
                $latest[$slug] = $row;
            }
        }

        $lines = [];
        $lines[] = '# API Research Inventory';
        $lines[] = '';
        $lines[] = '| Provider | Status | Pages | Endpoints | Score | Completed | Docs URL | Report |';
        $lines[] = '|---|---:|---:|---:|---:|---|---|---|';

        foreach ($latest as $row) {
            $lines[] = '| '
                . ($row['provider_name'] ?: $row['provider_slug']) . ' | '
                . $row['status'] . ' | '
                . (int) $row['pages_scraped'] . ' | '
                . (int) $row['endpoints_found'] . ' | '
                . number_format((float) $row['integration_score'], 2) . ' | '
                . ($row['completed_at'] ?: '-') . ' | '
                . str_replace('|', '\|', (string) $row['start_url']) . ' | '
                . str_replace('|', '\|', (string) $row['markdown_report_path']) . ' |';
        }

        $writer = new ApiReportWriter();
        $path = $writer->write(ROOTPATH . 'docs/APIs', '_inventory.md', implode("\n", $lines));

        CLI::write('Inventory generated.', 'green');
        CLI::write('File: ' . $path);
    }
}