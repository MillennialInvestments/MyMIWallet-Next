<?php

namespace App\Commands\Config;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Drift extends SafeBaseCommand
{
    protected $group       = 'audit';
    protected $name        = 'config:drift';
    protected $description = 'Compare deployed config and environment to repo baselines.';
    protected $usage       = 'config:drift [--emit=docs|raw|both] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs, raw, or both (default: both).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts or writable/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
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

        $configDir = APPPATH . 'Config';
        $configFiles = glob($configDir . '/*.php') ?: [];
        $configSnapshot = [];

        foreach ($configFiles as $file) {
            $configSnapshot[] = [
                'file' => basename($file),
                'mtime' => filemtime($file),
                'size' => filesize($file),
            ];
        }

        $envPath = ROOTPATH . '.env';
        $envExamplePath = ROOTPATH . '.env.example';

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'config_dir' => $configDir,
            'config_files' => $configSnapshot,
            'env_file_present' => is_file($envPath),
            'env_example_present' => is_file($envExamplePath),
        ];

        $summaryLines = [
            '# Config Drift Report',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Config dir: ' . $configDir,
            '- Config files: ' . count($configSnapshot),
            '- .env present: ' . (is_file($envPath) ? 'yes' : 'no'),
            '- .env.example present: ' . (is_file($envExamplePath) ? 'yes' : 'no'),
            '',
            '## Config Files',
        ];

        foreach ($configSnapshot as $file) {
            $summaryLines[] = '- ' . $file['file'] . ' (mtime: ' . date('c', (int) $file['mtime']) . ', size: ' . $file['size'] . ')';
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['docsDir'], $resolved['rawDir'], $summary, $report, $writeDocs, $writeRaw)) {
            return EXIT_ERROR;
        }

        CLI::write('Config drift artifacts written.', 'green');
        CLI::write('Docs: ' . $resolved['docsDir']);
        CLI::write('Raw: ' . $resolved['rawDir']);

        return EXIT_SUCCESS;
    }
}
