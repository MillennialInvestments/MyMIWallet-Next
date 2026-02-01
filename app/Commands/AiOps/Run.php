<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Run extends SafeBaseCommand
{
    protected $group       = 'AI-Ops';
    protected $name        = 'aiops:run';
    protected $description = 'Manually run the AI-Ops worker and generate docs/_aiops reports';
    protected $usage       = 'aiops:run [--mode=manual|nightly] [--dry-run]';

    protected $options = [
        '--mode' => 'Run mode (manual|nightly). Default: manual',
        '--dry-run' => 'Validate paths and configuration without executing the worker',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $mode = (string) (ArtifactHelper::parseOptionValue($params, 'mode') ?? 'manual');
        $dryRun = isset($flags['dry-run']);

        $root = realpath(APPPATH . '..');
        $worker = $root . '/aiops/aiops_worker.php';

        CLI::write('AI-Ops Spark Runner', 'yellow');
        CLI::write('--------------------');

        if (!is_file($worker)) {
            CLI::error("AI-Ops worker not found: {$worker}");
            return EXIT_ERROR;
        }

        CLI::write("Worker: {$worker}");
        CLI::write("Mode: {$mode}");
        CLI::write("Dry run: " . ($dryRun ? 'YES' : 'NO'));
        CLI::newLine();

        if ($dryRun) {
            CLI::write('[DRY RUN] Validating environment...', 'cyan');

            $checks = [
                'docs/' => is_dir($root . '/docs'),
                'docs/_aiops/' => is_dir($root . '/docs/_aiops'),
                'writable/aiops/' => is_dir($root . '/writable/aiops'),
                'PHP executable' => defined('PHP_BINARY'),
            ];

            foreach ($checks as $label => $ok) {
                $ok
                    ? CLI::write("✔ {$label}", 'green')
                    : CLI::write("✖ {$label}", 'red');
            }

            CLI::newLine();
            CLI::write('[DRY RUN] No files were modified.', 'yellow');
            return EXIT_SUCCESS;
        }

        $cmd = escapeshellcmd(PHP_BINARY) . ' '
             . escapeshellarg($worker)
             . ' --mode=' . escapeshellarg($mode);

        CLI::write("Executing worker...", 'cyan');
        CLI::newLine();

        passthru($cmd, $exitCode);

        CLI::newLine();

        if ($exitCode !== 0) {
            CLI::error("AI-Ops worker exited with code {$exitCode}");
            return EXIT_ERROR;
        }

        CLI::write('AI-Ops worker completed successfully.', 'green');
        CLI::write('Outputs written to: docs/_aiops/', 'green');

        $summary = $root . '/docs/_aiops/nightly-summary.md';
        if (is_file($summary)) {
            CLI::newLine();
            CLI::write('Nightly Summary Preview:', 'yellow');
            CLI::write('------------------------');
            CLI::write(file_get_contents($summary));
        } else {
            CLI::write('No nightly-summary.md found yet.', 'yellow');
        }

        return EXIT_SUCCESS;
    }
}
