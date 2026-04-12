<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Libraries\ApiResearch\ApiResearchManager;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ApiResearch extends SafeBaseCommand
{
    protected $group       = 'API';
    protected $name        = 'api:research';
    protected $description = 'Research API documentation, parse specs, extract endpoints, and write reports.';
    protected $usage       = 'api:research <docs_url> [--domain example.com] [--max-pages 50] [--max-depth 3]';
    protected $arguments   = [
        'docs_url' => 'Documentation entry URL.',
    ];
    protected $options     = [
        '--domain'    => 'Optional domain restriction.',
        '--max-pages' => 'Maximum pages to crawl.',
        '--max-depth' => 'Maximum crawl depth.',
    ];

    public function run(array $params)
    {
        $docsUrl = $params[0] ?? null;

        if (empty($docsUrl)) {
            CLI::error('Missing documentation URL.');
            return;
        }

        $options = [
            'domain'    => CLI::getOption('domain') ?: null,
            'max_pages' => (int) (CLI::getOption('max-pages') ?: 50),
            'max_depth' => (int) (CLI::getOption('max-depth') ?: 3),
        ];

        try {
            $manager = new ApiResearchManager();
            $result  = $manager->run($docsUrl, $options);

            CLI::write('API research completed.', 'green');
            CLI::write('Provider: ' . ($result['provider_slug'] ?? 'unknown'));
            CLI::write('Report: ' . ($result['markdown_report_path'] ?? 'N/A'));
            CLI::write('Snapshot: ' . ($result['json_snapshot_path'] ?? 'N/A'));
            CLI::write('Raw Crawl: ' . ($result['raw_markdown_path'] ?? 'N/A'));
            CLI::write('Diff: ' . ($result['diff_markdown_path'] ?? 'N/A'));
        } catch (\Throwable $e) {
            CLI::error('API research failed: ' . $e->getMessage());
            log_message('error', 'api:research failed: {message}', ['message' => $e->getMessage()]);
        }
    }
}