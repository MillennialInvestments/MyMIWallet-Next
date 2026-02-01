<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class CommandsInventory extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:commands:inventory';
    protected $description = 'Generate Spark command inventory from Console.php and command files.';
    protected $usage       = 'ops:commands:inventory [--emit=docs|raw|both] [--out=path] [--dry-run] [--approve]';
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

        $consolePath = APPPATH . 'Config/Console.php';
        $registered = [];
        if (is_file($consolePath)) {
            $contents = file_get_contents($consolePath) ?: '';
            if (preg_match_all('/App\\\\\\\\Commands\\\\\\\\[A-Za-z0-9_\\\\\\\\]+::class/', $contents, $matches)) {
                $registered = array_map('trim', $matches[0]);
            }
        }

        $files = [];
        if (! class_exists(\RecursiveDirectoryIterator::class)) {
            CLI::error('RecursiveDirectoryIterator unavailable; cannot scan command files.');
            return EXIT_ERROR;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(APPPATH . 'Commands')
        );
        foreach ($iterator as $fileInfo) {
            if (! $fileInfo->isFile()) {
                continue;
            }
            if ($fileInfo->getExtension() !== 'php') {
                continue;
            }
            $files[] = str_replace(APPPATH, 'app/', $fileInfo->getPathname());
        }
        sort($files);
        sort($registered);

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'console_path' => $consolePath,
            'registered' => $registered,
            'command_files' => $files,
        ];

        $summaryLines = [
            '# Spark Command Inventory',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Registered commands: ' . count($registered),
            '- Command files: ' . count($files),
            '',
            '## Registered',
        ];

        if (empty($registered)) {
            $summaryLines[] = '- none';
        } else {
            foreach ($registered as $command) {
                $summaryLines[] = '- ' . $command;
            }
        }

        $summaryLines[] = '';
        $summaryLines[] = '## Command Files';

        foreach ($files as $file) {
            $summaryLines[] = '- ' . $file;
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['docsDir'], $resolved['rawDir'], $summary, $report, $writeDocs, $writeRaw)) {
            return EXIT_ERROR;
        }

        CLI::write('Command inventory artifacts written.', 'green');
        CLI::write('Docs: ' . $resolved['docsDir']);
        CLI::write('Raw: ' . $resolved['rawDir']);

        return EXIT_SUCCESS;
    }
}
