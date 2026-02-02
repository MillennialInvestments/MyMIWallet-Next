<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class SparkReset extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:spark-reset';
    protected $description = 'Reset Spark-related caches and metadata (guarded).';
    protected $usage       = 'ops:spark-reset [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs (default: docs).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Preview actions without mutating cache state.',
        '--approve' => 'Allow cache mutations (required).',
    ];

    protected $defaultDryRun = true;

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

        $cacheDir = WRITEPATH . 'cache';
        $targets = [];
        $deleted = [];

        if (is_dir($cacheDir)) {
            $items = glob($cacheDir . '/*spark*') ?: [];
            $items = array_merge($items, glob($cacheDir . '/*command*') ?: []);
            $targets = array_values(array_unique($items));
        }

        foreach ($targets as $target) {
            if (! $dryRun && is_file($target)) {
                if (@unlink($target)) {
                    $deleted[] = $target;
                }
            }
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'cache_dir' => $cacheDir,
            'targets' => $targets,
            'deleted' => $deleted,
        ];

        $summaryLines = [
            '# Spark Reset',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Cache dir: ' . $cacheDir,
            '- Targets: ' . count($targets),
            '- Deleted: ' . count($deleted),
        ];

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Spark reset artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
