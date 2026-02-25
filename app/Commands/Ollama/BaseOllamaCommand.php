<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Commands\SafeBaseCommand;
use App\Models\OllamaRunModel;
use App\Services\LLM\OllamaClient;
use CodeIgniter\CLI\CLI;
use Config\Ollama;

abstract class BaseOllamaCommand extends SafeBaseCommand
{
    protected $group = 'Ollama - Control';
    protected $argvFlags = null;

    protected const EXIT_WARNING = 10;
    protected const EXIT_ERROR = 20;
    protected const EXIT_CRITICAL = 30;

    protected function client(): OllamaClient
    {
        return new OllamaClient(config(Ollama::class));
    }

    /**
     * Spark CLI passes options via request options, not always through $params.
     * Merge both so --key=value is consistently available to Ollama commands.
     *
     * @param array<int, string> $params
     * @return array{0: array<int, string>, 1: array<string, mixed>}
     */
    protected function parseParams(array $params): array
    {
        [$args, $flags] = parent::parseParams($params);

        if ($this->request !== null) {
            $options = $this->request->getOptions();
            if (is_array($options)) {
                foreach ($options as $key => $value) {
                    if (! is_string($key) || $key === '') {
                        continue;
                    }

                    if (strpos($key, '=') !== false) {
                        [$realKey, $realValue] = explode('=', $key, 2);
                        $key = $realKey;
                        $value = $realValue;
                    }

                    $flags[$key] = $value === null ? true : $value;
                }
            }
        }

        foreach ($this->extractArgvFlags() as $key => $value) {
            $flags[$key] = $value;
        }

        $this->parsedFlags = $flags;

        return [$args, $flags];
    }

    /** @return array<string, mixed> */
    protected function extractArgvFlags(): array
    {
        if (is_array($this->argvFlags)) {
            return $this->argvFlags;
        }

        $argv = $_SERVER['argv'] ?? [];
        if (! is_array($argv)) {
            $this->argvFlags = [];
            return $this->argvFlags;
        }

        $flags = [];
        $count = count($argv);
        for ($i = 0; $i < $count; $i++) {
            $token = (string) $argv[$i];
            if (! str_starts_with($token, '-')) {
                continue;
            }

            $keyValue = ltrim($token, '-');
            if (strpos($keyValue, '=') !== false) {
                [$key, $value] = explode('=', $keyValue, 2);
                $flags[$key] = $value;
                continue;
            }

            $next = ($i + 1 < $count) ? (string) $argv[$i + 1] : null;
            if ($next !== null && ! str_starts_with($next, '-')) {
                $flags[$keyValue] = $next;
                $i++;
            } else {
                $flags[$keyValue] = true;
            }
        }

        $this->argvFlags = $flags;

        return $flags;
    }

    protected function emitPayload(array $payload, array $flags, int $exit = EXIT_SUCCESS): int
    {
        $payload['exit_code'] = $exit;
        if ($this->optBool($flags, 'json', false)) {
            CLI::write(json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '{}');
        } else {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?: '{}');
        }

        return $exit;
    }

    protected function runUuid(): string
    {
        return bin2hex(random_bytes(16));
    }

    /** @param array<string,mixed> $params */
    protected function writeRun(string $type, string $model, string $runUuid, array $params, string $status, int $latencyMs = 0, ?int $tokenIn = null, ?int $tokenOut = null, string $error = ''): void
    {
        try {
            $modelObj = new OllamaRunModel();
            $modelObj->insert([
                'run_uuid' => $runUuid,
                'type' => $type,
                'model' => $model,
                'params_json' => json_encode($params, JSON_UNESCAPED_SLASHES),
                'prompt_hash' => isset($params['prompt']) ? sha1((string) $params['prompt']) : null,
                'status' => $status,
                'started_at' => date('Y-m-d H:i:s'),
                'finished_at' => date('Y-m-d H:i:s'),
                'latency_ms' => $latencyMs,
                'token_in' => $tokenIn,
                'token_out' => $tokenOut,
                'error' => $error !== '' ? $error : null,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'ollama run log persistence failed: {message}', ['message' => $e->getMessage(), 'run_uuid' => $runUuid]);
        }
    }

    protected function resolveBaseUrl(array $flags): string
    {
        $cfg = config(Ollama::class);

        return $this->optString($flags, 'base-url', $cfg->baseUrl);
    }

    protected function resolveTimeout(array $flags): int
    {
        $cfg = config(Ollama::class);

        return $this->optInt($flags, 'timeout', $cfg->timeout);
    }
}
