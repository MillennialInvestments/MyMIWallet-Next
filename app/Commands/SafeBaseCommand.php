<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

abstract class SafeBaseCommand extends BaseCommand
{
    /**
     * CI4-safe param parser.
     *
     * Returns:
     *   [
     *     array $args,   // positional arguments
     *     array $flags   // ['flag' => true]
     *   ]
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

    /**
     * Resolve dry-run state using standardized flags.
     */
    protected function resolveDryRun(array $flags): bool
    {
        return isset($flags['dry-run']);
    }

    /**
     * Enforce destructive command guard rails.
     *
     * @return int|null EXIT_ERROR when blocked, or null when allowed.
     */
    protected function guardDestructive(array $flags, array $params): ?int
    {
        if (! $this->isDestructive()) {
            return null;
        }

        if (isset($flags['force'])) {
            return null;
        }

        CLI::error('This action is destructive. Re-run with --force to proceed.');
        log_message('warning', sprintf('[spark:%s] Destructive command blocked', $this->name ?? 'unknown'), [
            'params' => $params,
        ]);

        return EXIT_ERROR;
    }

    abstract protected function isDestructive(): bool;
}
