<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class CacheBoot extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:cache-boot';
    protected $description = 'Validate cache boot health and warm critical cache keys.';
    protected $usage       = 'runtime:cache-boot [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs (default: docs).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Preview actions without changing cache state.',
        '--approve' => 'Allow cache mutations (required).',
    ];

    protected $defaultDryRun = true;

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'docs';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $cacheDir = rtrim($resolved['dir'], '/') . '/cache';
        $actions = [];

        $cacheExists = is_dir($cacheDir);
        $cacheWritable = $cacheExists && is_writable($cacheDir);

        if (! $cacheExists) {
            $actions[] = 'create_cache_dir';
            if (! $dryRun) {
                ArtifactHelper::ensureArtifactDir($cacheDir);
                $cacheExists = is_dir($cacheDir);
                $cacheWritable = $cacheExists && is_writable($cacheDir);
            }
        }

        if ($cacheExists && ! $cacheWritable) {
            $actions[] = 'cache_dir_not_writable';
        }

        $warmFile = $cacheDir . '/aiops-cache-boot.txt';
        $warmPayload = "cache-boot " . gmdate('c') . PHP_EOL;
        $warmed = false;

        if (! $dryRun && $cacheExists && $cacheWritable) {
            $warmed = ArtifactHelper::safeWrite($warmFile, $warmPayload);
            if ($warmed) {
                $actions[] = 'warm_cache_marker';
            }
        }

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'cache_dir' => $cacheDir,
            'cache_exists' => $cacheExists,
            'cache_writable' => $cacheWritable,
            'warm_marker_written' => $warmed,
            'actions' => $actions,
        ];

        $summaryLines = [
            '# Cache Boot Report',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Cache dir: ' . $cacheDir,
            '- Cache exists: ' . ($cacheExists ? 'true' : 'false'),
            '- Cache writable: ' . ($cacheWritable ? 'true' : 'false'),
            '- Warm marker written: ' . ($warmed ? 'true' : 'false'),
            '',
            '## Actions',
        ];

        if (empty($actions)) {
            $summaryLines[] = '- none';
        } else {
            foreach ($actions as $action) {
                $summaryLines[] = '- ' . $action;
            }
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Cache boot artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
