<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

abstract class SafeBaseCommand extends BaseCommand
{
    /**
     * CI4-safe param parser.
     *
     * @return array{0: array<int, string>, 1: array<string, bool>}
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
     * Guard destructive commands.
     *
     * @return int|null EXIT_ERROR when blocked, null when allowed
     */
    protected function guardDestructive(array $flags): ?int
    {
        if (! method_exists($this, 'isDestructive') || ! $this->isDestructive()) {
            return null;
        }

        if (isset($flags['force'])) {
            return null;
        }

        CLI::error('This action is destructive. Re-run with --force.');
        return EXIT_ERROR;
    }

    /**
     * Override in child commands if destructive.
     */
    protected function isDestructive(): bool
    {
        return false;
    }
}
