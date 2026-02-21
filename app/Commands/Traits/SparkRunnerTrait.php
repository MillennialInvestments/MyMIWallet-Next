<?php

declare(strict_types=1);

namespace App\Commands\Traits;

use CodeIgniter\CLI\CLI;
use RuntimeException;

trait SparkRunnerTrait
{
    protected function sparkRun(string $command, bool $optional = false): int
    {
        [$output, $code, $missing] = $this->executeSpark($command, false);

        if ($optional && $missing) {
            CLI::write('Skipping missing command: ' . $command, 'yellow');
            return EXIT_SUCCESS;
        }

        if ($code !== EXIT_SUCCESS) {
            if ($optional) {
                return $code;
            }

            throw new RuntimeException("Spark command failed: {$command} (exit {$code})");
        }

        return $code;
    }

    protected function sparkCapture(string $command, bool $optional = false): string
    {
        [$output, $code, $missing] = $this->executeSpark($command, true);

        if ($optional && $missing) {
            CLI::write('Skipping missing command: ' . $command, 'yellow');
            return '[skipped]';
        }

        if ($code !== EXIT_SUCCESS) {
            if ($optional) {
                return $output;
            }

            throw new RuntimeException("Spark command failed: {$command} (exit {$code})");
        }

        return $output;
    }

    protected function sparkExists(string $command): bool
    {
        $name = trim(strtok($command, ' ') ?: $command);

        $listOutput = $this->sparkCapture('list', true);
        if ($listOutput !== '[skipped]' && $listOutput !== '') {
            if (preg_match('/^\s*' . preg_quote($name, '/') . '\s+/m', $listOutput) === 1) {
                return true;
            }
        }

        [$output, , $missing] = $this->executeSpark($name . ' --help', true);

        return ! $missing && ! $this->isMissingCommandOutput($output);
    }

    private function executeSpark(string $command, bool $capture): array
    {
        $full = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $command;
        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $proc = proc_open($full, $descriptors, $pipes, ROOTPATH);
        if (! is_resource($proc)) {
            throw new RuntimeException('Unable to execute Spark command: ' . $command);
        }

        fclose($pipes[0]);
        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);

        $out = '';
        $err = '';

        while (true) {
            $status = proc_get_status($proc);
            $running = $status['running'];

            $stdout = stream_get_contents($pipes[1]);
            if ($stdout !== false && $stdout !== '') {
                $out .= $stdout;
                if (! $capture) {
                    foreach (preg_split('/\R/', $stdout) as $line) {
                        if ($line !== '') {
                            CLI::write($line);
                        }
                    }
                }
            }

            $stderr = stream_get_contents($pipes[2]);
            if ($stderr !== false && $stderr !== '') {
                $err .= $stderr;
                if (! $capture) {
                    foreach (preg_split('/\R/', $stderr) as $line) {
                        if ($line !== '') {
                            CLI::write($line, 'red');
                        }
                    }
                }
            }

            if (! $running) {
                break;
            }

            usleep(10000);
        }

        fclose($pipes[1]);
        fclose($pipes[2]);
        $code = proc_close($proc);

        $combined = trim($out . ($err !== '' ? "\n" . $err : ''));
        return [$combined, $code, $this->isMissingCommandOutput($combined)];
    }

    private function isMissingCommandOutput(string $output): bool
    {
        return (str_contains($output, 'Command "') && str_contains($output, '" not found'))
            || (str_contains($output, 'Did you mean'));
    }
}
