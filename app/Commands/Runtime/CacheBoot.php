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
    protected $usage       = 'runtime:cache-boot [--emit=docs|raw|both] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs, raw, or both (default: both).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts or writable/aiops/artifacts).',
        '--dry-run' => 'Preview actions without changing cache state.',
        '--approve' => 'Allow cache mutations (required).',
    ];

    protected $defaultDryRun = true;

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'both';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $writeDocs = in_array($emit, ['docs', 'both'], true);
        $writeRaw = in_array($emit, ['raw', 'both'], true);
        if (! $writeDocs && ! $writeRaw) {
            $writeDocs = true;
            $writeRaw = true;
        }

        $cacheDir = WRITEPATH . 'cache';
        $actions = [];

        $cacheExists = is_dir($cacheDir);
        $cacheWritable = $cacheExists && is_writable($cacheDir);

        if (! $cacheExists) {
            $actions[] = 'create_cache_dir';
            if (! $dryRun) {
                mkdir($cacheDir, 0755, true);
            }
        }

        if ($cacheExists && ! $cacheWritable) {
            $actions[] = 'cache_dir_not_writable';
        }

        $warmFile = $cacheDir . '/aiops-cache-boot.txt';
        $warmPayload = "cache-boot " . gmdate('c') . PHP_EOL;
        $warmed = false;

        if (! $dryRun && $cacheExists && $cacheWritable) {
            $warmed = file_put_contents($warmFile, $warmPayload) !== false;
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

        if (! ArtifactHelper::writeArtifacts($resolved['docsDir'], $resolved['rawDir'], $summary, $report, $writeDocs, $writeRaw)) {
            return EXIT_ERROR;
        }

        CLI::write('Cache boot artifacts written.', 'green');
        CLI::write('Docs: ' . $resolved['docsDir']);
        CLI::write('Raw: ' . $resolved['rawDir']);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
