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

        // Clear caches first
        $this->runCommand('php spark cache:clear');

        // Run optimize ONCE
        $exitCode = $this->runCommand('php spark optimize');

        if ($exitCode !== 0) {
            CLI::error('Optimization failed.');
            return EXIT_ERROR;
        }

        CLI::write('Optimization complete.', 'green');
        return EXIT_SUCCESS;
    }

    private function isCiRuntime(): bool
    {
        return getenv('CI') === 'true'
            || getenv('GITHUB_ACTIONS') === 'true'
            || (defined('ENVIRONMENT') && ENVIRONMENT === 'ci');
    }

    protected function runCommand(string $command): int
    {
        CLI::write("→ {$command}", 'dark_gray');
        passthru($command, $code);
        return (int) $code;
    }
}
