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

    protected const EXIT_WARNING = 10;
    protected const EXIT_ERROR = 20;
    protected const EXIT_CRITICAL = 30;

    protected function client(): OllamaClient
    {
        return new OllamaClient(config(Ollama::class));
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
