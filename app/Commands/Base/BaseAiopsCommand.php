<?php

declare(strict_types=1);

namespace App\Commands\Base;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Shared, CI4-safe AIOps command base.
 */
abstract class BaseAiopsCommand extends SafeBaseCommand
{
    /**
     * Write a standardized command output line.
     */
    protected function writeOutput(string $message, string $level = 'info'): void
    {
        $palette = [
            'success' => 'green',
            'warning' => 'yellow',
            'error'   => 'red',
            'info'    => 'light_gray',
        ];

        $color = $palette[$level] ?? 'light_gray';
        CLI::write($message, $color);
    }

    /**
     * Unified command event logger.
     *
     * @param array<string, mixed> $context
     */
    protected function logCommandEvent(string $event, array $context = []): void
    {
        $payload = [
            'command' => static::class,
            'event'   => $event,
            'context' => $context,
        ];

        log_message('info', '[AIOPS_CMD] ' . json_encode($payload, JSON_UNESCAPED_SLASHES));
    }

    /**
     * Execute callback and guard runtime failures.
     *
     * @return int Exit code
     */
    protected function safeRun(callable $callback): int
    {
        try {
            $result = $callback();

            return is_int($result) ? $result : EXIT_SUCCESS;
        } catch (\Throwable $e) {
            $this->writeOutput('[ERROR] ' . $e->getMessage(), 'error');
            log_message('error', '[AIOPS_CMD_ERROR] ' . static::class . ': ' . $e->getMessage());

            return EXIT_ERROR;
        }
    }
}
