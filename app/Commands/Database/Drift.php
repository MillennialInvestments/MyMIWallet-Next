<?php

namespace App\Commands\Database;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class Drift extends SafeBaseCommand
{
    protected $group       = 'db';
    protected $name        = 'db:drift';
    protected $description = 'Compare live schema to expected inventory.';
    protected $usage       = 'db:drift [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs (default: docs).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'docs';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $tables = [];
        $error = null;

        try {
            $db = Database::connect();
            $query = $db->query('SHOW TABLES');
            $tables = $query->getResultArray();
        } catch (Throwable $exception) {
            $error = $exception->getMessage();
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'error' => $error,
            'table_count' => count($tables),
            'tables' => $tables,
        ];

        $summaryLines = [
            '# Database Drift Report',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
        ];

        if ($error) {
            $summaryLines[] = '- Connection error: ' . $error;
        } else {
            $summaryLines[] = '- Table count: ' . count($tables);
            $summaryLines[] = '';
            $summaryLines[] = '## Tables';
            foreach ($tables as $table) {
                $summaryLines[] = '- ' . implode(' | ', $table);
            }
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Database drift artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
