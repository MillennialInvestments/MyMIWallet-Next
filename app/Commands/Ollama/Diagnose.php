<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

class Diagnose extends BaseOllamaCommand
{
    protected $name = 'ollama:diagnose';
    protected $description = 'Operator diagnostic report for Ollama connectivity and env.';
    protected $options = ['--base-url' => 'Override URL', '--timeout' => 'Timeout', '--include-env' => 'Include env snapshot', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $baseUrl = $this->resolveBaseUrl($flags);
        $health = $this->client()->health($baseUrl, $this->resolveTimeout($flags));
        $parts = parse_url($baseUrl) ?: [];
        $payload = [
            'base_url' => $baseUrl,
            'host' => $parts['host'] ?? null,
            'port' => $parts['port'] ?? 11434,
            'health' => $health,
            'disk_free_bytes' => disk_free_space(ROOTPATH),
            'memory_limit' => ini_get('memory_limit'),
            'ci_env' => env('CI_ENVIRONMENT', 'production'),
        ];

        if ($this->optBool($flags, 'include-env', false)) {
            $payload['env'] = [
                'OLLAMA_BASE_URL' => env('OLLAMA_BASE_URL'),
                'OLLAMA_TIMEOUT' => env('OLLAMA_TIMEOUT'),
                'OLLAMA_DEFAULT_CHAT_MODEL' => env('OLLAMA_DEFAULT_CHAT_MODEL'),
            ];
        }

        $exit = ($health['status'] ?? 'down') === 'ok' ? EXIT_SUCCESS : self::EXIT_WARNING;

        return $this->emitPayload($payload, $flags, $exit);
    }
}
