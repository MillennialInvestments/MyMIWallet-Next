<?php

namespace App\Commands\Database;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Config\Migrations;

class MigrateDryRun extends SafeBaseCommand
{
    protected string $group       = 'database';
    protected string $name        = 'migrate:dry-run';
    protected $description = 'List pending migrations without executing them.';

    public function run(array $params)
    {
        $config = config(Migrations::class);
        $db = Database::connect();
        $table = $config->table ?? 'migrations';

        $applied = [];
        $lastBatch = 0;
        if ($db->tableExists($table)) {
            $rows = $db->table($table)->select('version,batch')->get()->getResultArray();
            foreach ($rows as $row) {
                $applied[] = (string) $row['version'];
                $lastBatch = max($lastBatch, (int) ($row['batch'] ?? 0));
            }
        } else {
            CLI::write('Warning: migrations table not found. Assuming no migrations applied.', 'yellow');
        }

        $nextBatch = $lastBatch + 1;
        $migrations = $this->discoverMigrations();
        $pending = array_values(array_filter($migrations, static fn(array $migration) => !in_array($migration['version'], $applied, true)));

        CLI::write(sprintf('Pending migrations: %d', count($pending)));
        CLI::newLine();

        if ($pending === []) {
            CLI::write('No pending migrations found.', 'green');
            return EXIT_SUCCESS;
        }

        CLI::write($this->formatMarkdownPlan($pending, $nextBatch));

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * @return array<int,array{version:string,class:string,impact:string,filename:string,tables:array<int,string>}>
     */
    private function discoverMigrations(): array
    {
        $path = rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Migrations';
        $files = is_dir($path) ? glob($path . DIRECTORY_SEPARATOR . '*.php') : [];

        $migrations = [];
        foreach ($files ?: [] as $file) {
            $base = basename($file);
            if (!str_contains($base, '_')) {
                continue;
            }
            [$version, $rest] = explode('_', $base, 2);
            $class = $this->extractClassName($file) ?? str_replace('.php', '', $rest);
            $tables = $this->extractTables($file);
            $impact = $this->estimateImpact($tables);

            $migrations[] = [
                'version' => $version,
                'class' => $class,
                'impact' => $impact,
                'filename' => $base,
                'tables' => $tables,
            ];
        }

        usort($migrations, static fn(array $a, array $b) => strcmp($a['version'], $b['version']));

        return $migrations;
    }

    private function extractClassName(string $file): ?string
    {
        $content = file_get_contents($file);
        if ($content === false) {
            return null;
        }

        if (preg_match('/class\\s+(\\w+)\\s+extends\\s+Migration/', $content, $matches)) {
            return $matches[1];
        }

        return null;
    }

    private function estimateImpact(array $tables): string
    {
        if ($tables === []) {
            return 'Unknown tables';
        }

        return sprintf('Touches %d table(s): %s', count($tables), implode(', ', $tables));
    }

    private function extractTables(string $file): array
    {
        $content = file_get_contents($file);
        if ($content === false) {
            return [];
        }

        if (preg_match_all('/(?:createTable|dropTable|addColumn|dropColumn|modifyColumn|addField)\\s*\\(\\s*[\\\'\\\"]([^\\\'\\\"]+)[\\\'\\\"]/', $content, $matches)) {
            return array_values(array_unique($matches[1]));
        }

        return [];
    }

    /**
     * @param array<int,array{version:string,class:string,impact:string,filename:string,tables:array<int,string>}> $pending
     */
    private function formatMarkdownPlan(array $pending, int $batch): string
    {
        $lines = [];
        $lines[] = '## Migration Dry-Run Plan';
        $lines[] = '';
        $lines[] = '- Estimated batch: **' . $batch . '**';
        $lines[] = '- Pending migrations: **' . count($pending) . '**';
        $lines[] = '';
        $lines[] = '| Migration | Filename | Estimated Batch | Affected Tables |';
        $lines[] = '| --- | --- | --- | --- |';

        foreach ($pending as $migration) {
            $tables = $migration['tables'] !== [] ? implode(', ', $migration['tables']) : 'Unknown';
            $lines[] = sprintf(
                '| %s | %s | %d | %s |',
                $migration['class'],
                $migration['filename'],
                $batch,
                $tables
            );
        }

        $lines[] = '';

        return implode("\n", $lines);
    }
}
