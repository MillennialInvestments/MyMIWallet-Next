<?php

declare(strict_types=1);

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SparkOptimize extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'optimize:safe';
    protected $description = 'Run CI4 optimize safely (CI-only)';
    protected $usage       = 'optimize:safe';

    public function run(array $params)
    {
        if (! $this->isCiRuntime()) {
            CLI::error('optimize:safe is CI-only.');
            return EXIT_ERROR;
        }

        CLI::write('Running CI-safe optimization...', 'yellow');

        $exitCode = $this->runCommand(PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' cache:clear');

        if ($exitCode !== 0) {
            CLI::error('Cache clear failed.');
            return EXIT_ERROR;
        }

        CLI::write('Skipping full spark optimize in CI-safe mode.', 'yellow');
        CLI::write('CI-safe optimization complete.', 'green');

        return EXIT_SUCCESS;
    }

    protected function isCiRuntime(): bool
    {
        return parent::isCiRuntime()
            || env('GITHUB_ACTIONS') === 'true'
            || (defined('ENVIRONMENT') && ENVIRONMENT === 'ci');
    }

    protected function runCommand(string $command): int
    {
        CLI::write("→ {$command}", 'dark_gray');
        passthru($command, $code);
        return (int) $code;
    }
}
