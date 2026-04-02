<?php

declare(strict_types=1);

namespace App\Services\PyOps;

use Config\PyOps;
use RuntimeException;

final class PythonRunner
{
    public function __construct(
        private readonly string $projectRoot,
        private readonly string $writePath,
        private readonly ?PyOps $config = null,
    ) {
    }

    /**
     * @return array{ok: bool, exit_code: int, stdout: string, stderr: string, response: array<string,mixed>|null}
     */
    public function runRequestFile(string $requestFile, ?int $timeoutSeconds = null): array
    {
        $config = $this->config ?? config('PyOps');
        $entrypoint = $this->projectRoot . trim($config->entrypoint, '/');

        if (!is_file($entrypoint)) {
            throw new RuntimeException('PyOps entrypoint missing: ' . $entrypoint);
        }

        if (!is_file($requestFile)) {
            throw new RuntimeException('Request file missing: ' . $requestFile);
        }

        $pythonBin = $this->resolvePythonBinary($config);
        $timeout = max(1, $timeoutSeconds ?? $config->defaultTimeoutSeconds);

        $cmd = [$pythonBin, $entrypoint, '--request', $requestFile];
        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open(
            $cmd,
            $descriptors,
            $pipes,
            $this->projectRoot,
            $this->minimalEnv(),
            ['bypass_shell' => true]
        );

        if (!is_resource($process)) {
            throw new RuntimeException('Failed to start Python process.');
        }

        fclose($pipes[0]);
        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);

        $stdout = '';
        $stderr = '';
        $start = microtime(true);

        while (true) {
            $status = proc_get_status($process);
            $running = (bool) ($status['running'] ?? false);

            $read = [$pipes[1], $pipes[2]];
            $write = null;
            $except = null;
            @stream_select($read, $write, $except, 0, 200_000);

            foreach ($read as $stream) {
                $chunk = (string) fread($stream, 8192);
                if ($chunk === '') {
                    continue;
                }

                if ($stream === $pipes[1]) {
                    $stdout .= $chunk;
                } else {
                    $stderr .= $chunk;
                }

                if (strlen($stdout) + strlen($stderr) > $config->maxOutputBytes) {
                    proc_terminate($process, 9);
                    break 2;
                }
            }

            if (!$running) {
                break;
            }

            if ((microtime(true) - $start) > $timeout) {
                proc_terminate($process, 9);
                break;
            }
        }

        $stdout .= (string) stream_get_contents($pipes[1]);
        $stderr .= (string) stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        $exitCode = proc_close($process);

        $response = null;
        $trimmed = trim($stdout);
        if ($trimmed !== '') {
            $decoded = json_decode($trimmed, true);
            if (is_array($decoded)) {
                $response = $decoded;
            }
        }

        return [
            'ok' => $exitCode === 0 && is_array($response) && (($response['ok'] ?? false) === true),
            'exit_code' => $exitCode,
            'stdout' => $stdout,
            'stderr' => $stderr,
            'response' => $response,
        ];
    }

    private function resolvePythonBinary(PyOps $config): string
    {
        $candidates = [
            $config->pythonBinary,
            $this->projectRoot . 'pyops/.venv/bin/python',
            $this->projectRoot . 'pyops/.venv/Scripts/python.exe',
            'python3',
            'python',
        ];

        foreach ($candidates as $candidate) {
            $candidate = trim((string) $candidate);
            if ($candidate === '') {
                continue;
            }

            if (str_contains($candidate, DIRECTORY_SEPARATOR) && is_file($candidate)) {
                return $candidate;
            }

            if (!str_contains($candidate, DIRECTORY_SEPARATOR)) {
                return $candidate;
            }
        }

        throw new RuntimeException('No Python binary found. Set PYOPS_PYTHON or create pyops/.venv.');
    }

    /**
     * @return array<string, string>
     */
    private function minimalEnv(): array
    {
        return [
            'PYTHONUNBUFFERED' => '1',
            'PYTHONDONTWRITEBYTECODE' => '1',
            'PYOPS_PROJECT_ROOT' => $this->projectRoot,
            'PYOPS_WRITE_PATH' => $this->writePath,
            'OLLAMA_API_KEY' => (string) (getenv('OLLAMA_API_KEY') ?: ''),
            'OLLAMA_BASE_URL' => (string) (getenv('OLLAMA_BASE_URL') ?: ''),
        ];
    }
}
