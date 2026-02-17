<?php

declare(strict_types=1);

namespace App\Commands\AiOps\PublicPages;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Report extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:public-pages:report';
    protected $description = 'Generate report artifacts for a public pages run.';

    public function run(array $params)
    {
        $runUuid = null;
        foreach ($params as $param) {
            if (str_starts_with($param, '--run=')) {
                $runUuid = substr($param, 6);
            }
        }

        if (! $runUuid) {
            CLI::error('Usage: aiops:public-pages:report --run=<uuid>');
            return EXIT_ERROR;
        }

        $db = Database::connect();
        $run = $db->table('bf_public_pages_runs')->where('run_uuid', $runUuid)->get()->getRowArray();
        if (! $run) {
            CLI::error('Run not found.');
            return EXIT_ERROR;
        }

        $datePath = date('Y-m-d', strtotime((string) $run['started_at']));
        $dir = ROOTPATH . 'docs/_aiops/public-pages/runs/' . $datePath . '/' . $runUuid;
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($dir . '/run_summary.json', (string) ($run['summary_json'] ?: '{}'));

        $pages = $db->query('SELECT c.page_id,c.slug,c.title,c.type,d.status,d.created_at FROM bf_public_pages_drafts d JOIN bf_public_pages_catalog c ON c.id=d.page_id WHERE d.run_id=?', [$run['id']])->getResultArray();
        $sources = $db->query('SELECT page_id,source_type,source_ref,title,created_at FROM bf_public_pages_sources WHERE run_id=?', [$run['id']])->getResultArray();
        $drafts = $db->query('SELECT id,page_id,draft_title,status,created_at FROM bf_public_pages_drafts WHERE run_id=?', [$run['id']])->getResultArray();

        $this->writeCsv($dir . '/pages_processed.csv', $pages);
        $this->writeCsv($dir . '/sources_collected.csv', $sources);
        $this->writeCsv($dir . '/drafts_created.csv', $drafts);

        $schemaTypes = [];
        $hybridCount = 0;
        foreach ($pages as $page) {
            $schemaTypes[] = (string) ($page['type'] ?? '');
            if (($page['type'] ?? '') === 'hybrid') {
                $hybridCount++;
            }
        }
        $schemaTypes = array_values(array_unique(array_filter($schemaTypes)));

        $md = "# Publish Suggestions\n\n";
        $md .= "## PR Factory Governance\n\n";
        $md .= "- Label: `aiops-public-pages`\n";
        $md .= "- Pages affected: " . count($pages) . "\n";
        $md .= "- Schema types added: " . ($schemaTypes === [] ? 'none' : implode(', ', $schemaTypes)) . "\n";
        $md .= "- Hybrid pages count: " . $hybridCount . "\n\n";
        foreach ($pages as $page) {
            $md .= '- ' . $page['title'] . ' (`' . $page['status'] . "`)\n";
        }
        file_put_contents($dir . '/publish_suggestions.md', $md);

        CLI::write('Report generated at: ' . $dir, 'green');
        return EXIT_SUCCESS;
    }

    private function writeCsv(string $path, array $rows): void
    {
        $fp = fopen($path, 'wb');
        if ($rows === []) {
            fclose($fp);
            return;
        }
        fputcsv($fp, array_keys($rows[0]));
        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
    }
}
