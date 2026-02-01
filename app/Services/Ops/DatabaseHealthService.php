<?php

declare(strict_types=1);

namespace App\Services\Ops;

use CodeIgniter\Database\BaseConnection;
use Config\Database;
use Config\Migrations;
use Config\Services;
use Throwable;

class DatabaseHealthService
{
    /**
     * @return array{
     *   connected: bool,
     *   migrations_table: bool,
     *   pending_migrations: list<string>,
     *   last_batch: int|null,
     *   ran_migrations: bool,
     *   warnings: list<string>,
     *   failures: list<string>
     * }
     */
    public function check(bool $runMigrations, bool $dryRun): array
    {
        $warnings = [];
        $failures = [];
        $connected = false;
        $migrationsTable = false;
        $pending = [];
        $lastBatch = null;
        $ranMigrations = false;

        try {
            $db = Database::connect();
            $this->assertConnection($db);
            $connected = true;
        } catch (Throwable $e) {
            $failures[] = 'Database connection failed: ' . $e->getMessage();
            return [
                'connected' => false,
                'migrations_table' => false,
                'pending_migrations' => [],
                'last_batch' => null,
                'ran_migrations' => false,
                'warnings' => $warnings,
                'failures' => $failures,
            ];
        }

        $config = new Migrations();
        $table = $config->table ?? 'migrations';

        if ($connected) {
            $migrationsTable = $db->tableExists($table);
            if (! $migrationsTable) {
                $failures[] = sprintf('Migrations table missing: %s', $table);
            } else {
                $lastBatch = $this->fetchLastBatch($db, $table);
                $pending = $this->findPendingMigrations();
                if ($pending !== []) {
                    $warnings[] = sprintf('Pending migrations: %d', count($pending));
                }
            }
        }

        if ($runMigrations && $pending !== []) {
            if ($dryRun) {
                $warnings[] = 'Dry-run: migrations not applied.';
            } else {
                try {
                    $runner = Services::migrations();
                    $runner->latest();
                    $ranMigrations = true;
                    $pending = $this->findPendingMigrations();
                } catch (Throwable $e) {
                    $failures[] = 'Migration run failed: ' . $e->getMessage();
                }
            }
        }

        return [
            'connected' => $connected,
            'migrations_table' => $migrationsTable,
            'pending_migrations' => array_values($pending),
            'last_batch' => $lastBatch,
            'ran_migrations' => $ranMigrations,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }

    private function assertConnection(BaseConnection $db): void
    {
        $db->query('SELECT 1');
    }

    private function fetchLastBatch(BaseConnection $db, string $table): ?int
    {
        try {
            $builder = $db->table($table);
            $row = $builder->selectMax('batch')->get()->getRowArray();
            if (isset($row['batch'])) {
                return (int) $row['batch'];
            }
        } catch (Throwable $e) {
            return null;
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function findPendingMigrations(): array
    {
        $runner = Services::migrations();
        $history = $runner->getHistory();
        $found = $runner->findMigrations();
        $flat = [];

        foreach ($found as $migrations) {
            foreach ($migrations as $version => $path) {
                $flat[$version] = $path;
            }
        }

        $pending = array_diff_key($flat, $history);
        return array_keys($pending);
    }
}
