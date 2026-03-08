<?php

namespace App\Commands\Ops\Commands;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Inventory extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:commands:inventory';
    protected $description = 'Generate Spark command inventory from Console.php and command files.';
    protected $usage       = 'ops:commands:inventory [--emit=docs] [--out=path] [--dry-run] [--approve]';
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

        $consolePath = APPPATH . 'Config/Console.php';
        $registered = [];
        if (is_file($consolePath)) {
            $contents = file_get_contents($consolePath) ?: '';
            if (preg_match_all('/App\\\\\\\\Commands\\\\\\\\[A-Za-z0-9_\\\\\\\\]+::class/', $contents, $matches)) {
                $registered = array_map('trim', $matches[0]);
            }
        }

        $files = [];
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

        if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
            return EXIT_ERROR;
        }

        CLI::write('Command inventory artifacts written.', 'green');
        CLI::write('Artifacts: ' . $resolved['dir']);

        return EXIT_SUCCESS;
    }
}
