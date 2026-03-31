<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class CommandRunner
{
    public function run(string $command, int $timeoutSeconds = 300): array
    {
        $start = microtime(true);
        $phpBinary = PHP_BINARY ?: 'php';

        $fullCommand = $this->normalizeCommand($command, $phpBinary);

        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open($fullCommand, $descriptors, $pipes, ROOTPATH);

        if (! is_resource($process)) {
            return $this->buildResult($command, $fullCommand, 1, '', 'Failed to spawn process', microtime(true) - $start, true, false);
        }

        fclose($pipes[0]);
        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);

        $stdout = '';
        $stderr = '';
        $timedOut = false;

        do {
            $status = proc_get_status($process);
            $stdout .= (string) stream_get_contents($pipes[1]);
            $stderr .= (string) stream_get_contents($pipes[2]);

            if ((microtime(true) - $start) > $timeoutSeconds) {
                $timedOut = true;
                proc_terminate($process, 15);
                usleep(200000);
                $status = proc_get_status($process);
                if (! empty($status['running'])) {
                    proc_terminate($process, 9);
                }
                break;
            }

            if (! empty($status['running'])) {
                usleep(100000);
            }
        } while (! empty($status['running']));

        $stdout .= (string) stream_get_contents($pipes[1]);
        $stderr .= (string) stream_get_contents($pipes[2]);

        fclose($pipes[1]);
        fclose($pipes[2]);

        $exitCode = proc_close($process);
        if ($timedOut && $exitCode === 0) {
            $exitCode = 124;
        }

        return $this->buildResult($command, $fullCommand, (int) $exitCode, trim($stdout), trim($stderr), microtime(true) - $start, $timedOut, false);
    }

    private function normalizeCommand(string $command, string $phpBinary): string
    {
        $trimmed = trim($command);

        if (str_starts_with($trimmed, 'php spark ')) {
            $parts = preg_split('/\s+/', $trimmed);
            $args = array_slice($parts ?: [], 2);
            $escaped = array_map(static fn ($arg) => escapeshellarg($arg), $args);

            return escapeshellarg($phpBinary) . ' spark ' . implode(' ', $escaped);
        }

        return $trimmed;
    }

    private function buildResult(
        string $command,
        string $fullCommand,
        int $exitCode,
        string $stdout,
        string $stderr,
        float $duration,
        bool $timedOut,
        bool $skipped
    ): array {
        return [
            'command' => $command,
            'full_command' => $fullCommand,
            'exit_code' => $exitCode,
            'success' => $exitCode === 0,
            'stdout' => $stdout,
            'stderr' => $stderr,
            'duration_seconds' => round($duration, 3),
            'timed_out' => $timedOut,
            'skipped' => $skipped,
        ];
    }

    public function skipped(string $command, string $reason): array
    {
        return [
            'command' => $command,
            'full_command' => $command,
            'exit_code' => 0,
            'success' => true,
            'stdout' => '',
            'stderr' => $reason,
            'duration_seconds' => 0.0,
            'timed_out' => false,
            'skipped' => true,
        ];
    }
}
