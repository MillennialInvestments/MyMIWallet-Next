<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;
use Psr\Log\LoggerInterface;

abstract class SafeBaseCommand extends BaseCommand
{
    /**
     * ⚠️ DO NOT CHANGE THIS SIGNATURE
     * Must match CodeIgniter\CLI\BaseCommand exactly (CI 4.6+)
     */
    public function __construct(LoggerInterface $logger, Commands $commands)
    {
        parent::__construct($logger, $commands);
    }

    /**
     * CI4-safe param parser.
     */
    protected function parseParams(array $params): array
    {
        $args  = [];
        $flags = [];

        foreach ($params as $param) {
            if (str_starts_with($param, '--')) {
                $flags[ltrim($param, '-')] = true;
            } else {
                $args[] = $param;
            }
        }

        return [$args, $flags];
    }

    protected function resolveDryRun(array $flags): bool
    {
        return isset($flags['dry-run']);
    }

    /**
     * Guard destructive commands
     */
    protected function guardDestructive(array $flags): ?int
    {
        if (!method_exists($this, 'isDestructive') || ! $this->isDestructive()) {
            return null;
        }

        if (isset($flags['force'])) {
            return null;
        }

        CLI::error('This action is destructive. Re-run with --force.');
        return EXIT_ERROR;
    }
}
