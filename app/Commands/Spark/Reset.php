<?php

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Reset extends SafeBaseCommand
{
    protected $group       = 'Spark';
    protected $name        = 'spark-reset';
    protected $description = 'Reset Spark caches, purge command metadata, and rebuild autoload (guarded).';
    protected $usage       = 'spark-reset [--emit=docs] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit'    => 'Output mode: docs (default: docs).',
        '--out'     => 'Override artifact directory (must be inside docs/aiops/artifacts).',
        '--dry-run' => 'Preview actions without mutating state.',
        '--approve' => 'Allow destructive mutations (required).',
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

        CLI::write('🔁 Spark Reset starting...', 'yellow');

        $cacheDir = WRITEPATH . 'cache';
        $targets = [];
        $deleted = [];

        if (is_dir($cacheDir)) {
            $items = glob($cacheDir . '/*spark*') ?: [];
            $items = array_merge($items, glob($cacheDir . '/*command*') ?: []);
            $items = array_merge($items, [WRITEPATH . 'cache/Commands.php']);
            $targets = array_values(array_unique($items));
        }

        foreach ($targets as $target) {
            if (! $dryRun && is_file($target)) {
                if (@unlink($target)) {
                    $deleted[] = $target;
                }
            }
        }

        // Composer autoload rebuild
        $composer = file_exists(ROOTPATH . 'composer.phar')
            ? PHP_BINARY . ' composer.phar'
            : 'composer';

        $composerResult = null;

        if (! $dryRun) {
            CLI::write('🔧 Rebuilding Composer autoload...');
            passthru($composer . ' dump-autoload -o', $composerResult);

            if ($composerResult !== 0) {
                CLI::error('❌ Composer autoload rebuild failed');
                return EXIT_ERROR;
            }

            CLI::write('✔ Autoload rebuilt');
        }

        $report = [
            'command'       => $this->name,
            'timestamp'     => $resolved['timestamp'],
            'dry_run'       => $dryRun,
            'emit'          => $emit,
            'cache_dir'     => $cacheDir,
            'targets'       => $targets,
            'deleted'       => $deleted,
            'composer_exit' => $composerResult,
        ];

        $summaryLines = [
            '# Spark Reset',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Cache dir: ' . $cacheDir,
            '- Targets: ' . count($targets),
            '- Deleted: ' . count($deleted),
            '- Composer rebuilt: ' . ($dryRun ? 'no (dry run)' : 'yes'),
        ];

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('✔ Spark reset artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);
        CLI::write('✅ Spark reset complete. Run `php spark list` to verify.', 'green');

        return EXIT_SUCCESS;
    }
}
