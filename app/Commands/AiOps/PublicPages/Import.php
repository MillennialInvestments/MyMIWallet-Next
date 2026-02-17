<?php

declare(strict_types=1);

namespace App\Commands\AiOps\PublicPages;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Import extends SafeBaseCommand
{
    protected $group = 'AIOps - Public Pages';
    protected $name = 'aiops:public-pages:import';
    protected $description = 'Import docs/_aiops/inputs/public_pages.csv into bf_public_pages_catalog.';

    public function run(array $params)
    {
        $file = ROOTPATH . 'docs/_aiops/inputs/public_pages.csv';
        if (! is_file($file)) {
            CLI::error('CSV file missing: ' . $file);
            return EXIT_ERROR;
        }

        $handle = fopen($file, 'rb');
        $header = fgetcsv($handle) ?: [];
        $required = ['page_id', 'slug', 'title', 'module', 'type', 'topic_keywords', 'source_mode', 'db_query_key', 'google_query', 'refresh_days', 'status', 'notes'];
        if ($header !== $required) {
            CLI::error('Invalid CSV header contract.');
            return EXIT_ERROR;
        }

        $rows = [];
        while (($row = fgetcsv($handle)) !== false) {
            if (count(array_filter($row, static fn($v) => trim((string) $v) !== '')) === 0) {
                continue;
            }
            $rows[] = array_combine($required, $row);
        }
        fclose($handle);

        $pageIds = array_column($rows, 'page_id');
        $slugs = array_column($rows, 'slug');
        if (count($pageIds) !== count(array_unique($pageIds))) {
            CLI::error('CSV has duplicate page_id values.');
            return EXIT_ERROR;
        }
        if (count($slugs) !== count(array_unique($slugs))) {
            CLI::error('CSV has duplicate slug values.');
            return EXIT_ERROR;
        }

        $db = Database::connect();
        $table = $db->table('bf_public_pages_catalog');
        $now = date('Y-m-d H:i:s');

        foreach ($rows as $row) {
            $existing = $table->where('page_id', $row['page_id'])->get()->getRowArray();
            $payload = [
                'page_id' => $row['page_id'],
                'slug' => $row['slug'],
                'title' => $row['title'],
                'module' => $row['module'],
                'type' => $row['type'],
                'topic_keywords' => $row['topic_keywords'],
                'source_mode' => $row['source_mode'],
                'db_query_key' => $row['db_query_key'] ?: null,
                'google_query' => $row['google_query'] ?: null,
                'refresh_days' => (int) $row['refresh_days'],
                'status' => $row['status'],
                'updated_at' => $now,
            ];

            if (! $existing) {
                $payload['created_at'] = $now;
                $payload['next_run_at'] = date('Y-m-d H:i:s', strtotime("+{$payload['refresh_days']} days"));
                $table->insert($payload);
            } else {
                if (empty($existing['next_run_at'])) {
                    $payload['next_run_at'] = date('Y-m-d H:i:s', strtotime("+{$payload['refresh_days']} days"));
                }
                $table->where('id', $existing['id'])->update($payload);
            }
        }

        CLI::write('Imported pages: ' . count($rows), 'green');
        return EXIT_SUCCESS;
    }
}
