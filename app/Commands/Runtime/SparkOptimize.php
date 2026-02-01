<?php

declare(strict_types=1);

namespace App\Commands\Runtime;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SparkOptimize extends BaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'optimize:safe';
    protected $description = 'Run CI4 optimize safely (CI-only)';
    protected $usage       = 'optimize:safe';

    public function run(array $params)
    {
        // 🔒 HARD GUARD — but ONLY at execution time
        if (ENVIRONMENT !== 'ci') {
            CLI::error('spark optimize is CI-only. Aborting.');
            return EXIT_ERROR;
        }

        CLI::write('Running CI-safe optimization...', 'yellow');

        // Clear caches first (safe)
        $this->exec('php spark cache:clear');

        // Run framework optimize
        $this->exec('php spark optimize');

        CLI::write('Optimization complete.', 'green');

        return EXIT_SUCCESS;
    }

    /**
     * Execute a shell command safely and stream output.
     */
    protected function exec(string $command): void
    {
        CLI::write("→ {$command}", 'dark_gray');
        passthru($command);
    }
}
