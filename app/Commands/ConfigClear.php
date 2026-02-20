<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class ConfigClear extends SafeBaseCommand
{
    protected $group       = 'Config';
    protected $name        = 'config:clear';
    protected $description = 'Clear configuration-related caches safely (guarded).';
    protected $usage       = 'config:clear [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit'    => 'Output mode: docs (default: docs).',
        '--out'     => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Preview actions without deleting files.',
        '--approve' => 'Allow destructive deletions (required).',
    ];

    protected $defaultDryRun = true;

    protected function isDestructive(): bool
    {
        return true;
    }

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

        CLI::write('🧹 Config Clear starting...', 'yellow');

        $cacheDir = WRITEPATH . 'cache';

        // Only specific config-related cache patterns
        $patterns = [
            $cacheDir . '/FactoriesCache_*',
            $cacheDir . '/Commands.php',
            $cacheDir . '/config-*',
        ];

        $targets = [];
        $deleted = [];

        foreach ($patterns as $pattern) {
            foreach (glob($pattern) ?: [] as $file) {
                if (is_file($file)) {
                    $targets[] = $file;

                    if (! $dryRun && @unlink($file)) {
                        $deleted[] = $file;
                    }
                }
            }
        }

        $targets = array_values(array_unique($targets));

        $report = [
            'command'   => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run'   => $dryRun,
            'emit'      => $emit,
            'cache_dir' => $cacheDir,
            'targets'   => $targets,
            'deleted'   => $deleted,
        ];

        $summaryLines = [
            '# Config Clear',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Cache dir: ' . $cacheDir,
            '- Targets found: ' . count($targets),
            '- Files deleted: ' . count($deleted),
        ];

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('✔ Config cache artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);
        CLI::write('✅ Config clear complete.', 'green');

        return EXIT_SUCCESS;
    }
}
