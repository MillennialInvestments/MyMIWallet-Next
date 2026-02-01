<?php

declare(strict_types=1);

namespace App\Services\Ops;

use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\CLI;

class SparkGovernanceService
{
    /**
     * @return array{
     *   violations: list<array<string, mixed>>,
     *   ran_audit: bool
     * }
     */
    public function audit(): array
    {
        $this->runCommand('ops:commands:audit');

        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');

        return [
            'violations' => $violations,
            'ran_audit' => true,
        ];
    }

    private function runCommand(string $command): int
    {
        if (function_exists('service')) {
            $runner = service('commands');
            if (is_object($runner) && method_exists($runner, 'run')) {
                return (int) $runner->run($command);
            }
        }

        if (function_exists('command')) {
            return (int) command($command);
        }

        CLI::error('Spark command runner unavailable for: ' . $command);
        return EXIT_ERROR;
    }
}
