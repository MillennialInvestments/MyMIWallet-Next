<?php

namespace App\Commands\Database;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Config\Migrations;

class MigrateDryRun extends SafeBaseCommand
{
    protected $group       = 'database';
    protected $name        = 'migrate:dry-run';
    protected $description = 'List pending migrations without executing them.';

    public function run(array $params)
    {
        $config = config(Migrations::class);
        $db = Database::connect();
        $table = $config->table ?? 'migrations';

        $applied = [];
        if ($db->tableExists($table)) {
            $rows = $db->table($table)->select('version')->get()->getResultArray();
            foreach ($rows as $row) {
                $applied[] = (string) $row['version'];
            }
        } else {
            CLI::write('Warning: migrations table not found. Assuming no migrations applied.', 'yellow');
        }

        $migrations = $this->discoverMigrations();
        $pending = array_values(array_filter($migrations, static fn(array $migration) => !in_array($migration['version'], $applied, true)));

        CLI::write(sprintf('Pending migrations: %d', count($pending)));
        CLI::newLine();

        if ($pending === []) {
            CLI::write('No pending migrations found.', 'green');
            return EXIT_SUCCESS;
        }

        foreach ($pending as $migration) {
            CLI::write('Migration: ' . $migration['class']);
            CLI::write('  Version: ' . $migration['version']);
            CLI::write('  Estimated impact: ' . $migration['impact']);
            CLI::newLine();
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * @return array<int,array{version:string,class:string,impact:string}>
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
            $impact = $this->estimateImpact($file);

            $migrations[] = [
                'version' => $version,
                'class' => $class,
                'impact' => $impact,
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

    private function estimateImpact(string $file): string
    {
        $content = file_get_contents($file);
        if ($content === false) {
            return 'Unknown';
        }

        $tables = [];
        if (preg_match_all('/(?:createTable|dropTable|addColumn|dropColumn|modifyColumn|addField)\\s*\\(\\s*[\\\'\\\"]([^\\\'\\\"]+)[\\\'\\\"]/', $content, $matches)) {
            $tables = array_values(array_unique($matches[1]));
        }

        if ($tables === []) {
            return 'Unknown tables';
        }

        return sprintf('Touches %d table(s): %s', count($tables), implode(', ', $tables));
    }
}
