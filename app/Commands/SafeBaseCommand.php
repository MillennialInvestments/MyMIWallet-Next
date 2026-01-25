<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

abstract class SafeBaseCommand extends BaseCommand
{
    /**
     * Parse CI4 CLI params into args + flags.
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
     * Override in destructive commands.
     */
    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * Standard dry-run resolver.
     */
    protected function resolveDryRun(array $flags): bool
    {
        return isset($flags['dry-run']);
    }

    /**
     * Enforce destructive safety.
     */
    protected function enforceSafety(array $flags): void
    {
        if ($this->isDestructive() && ! isset($flags['force'])) {
            CLI::error('This action is destructive. Re-run with --force to proceed.');
            log_message('warning', '[spark] Destructive command blocked', [
                'command' => static::class,
                'flags'   => $flags,
            ]);
            exit(EXIT_ERROR);
        }
    }

    /**
     * Standardized logging helpers.
     */
    protected function logStart(array $context = []): void
    {
        log_message('info', '[spark] Started ' . static::class, $context);
    }

    protected function logSuccess(array $context = []): void
    {
        log_message('info', '[spark] Completed ' . static::class, $context);
    }

    protected function logFailure(string $message, array $context = []): void
    {
        log_message('error', '[spark] Failed ' . static::class, array_merge([
            'message' => $message,
        ], $context));
    }
}
