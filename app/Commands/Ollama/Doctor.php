<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use Config\Ollama;

class Doctor extends BaseOllamaCommand
{
    protected $name = 'ollama:doctor';
    protected $description = 'Deep diagnostics for Ollama connectivity and runtime hints.';
    protected $options = [
        '--base-url' => 'Override URL',
        '--timeout' => 'Timeout seconds',
        '--json' => 'JSON output',
        '--include-env' => 'Include relevant env values',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $baseUrl = $this->resolveBaseUrl($flags);
        $timeout = $this->resolveTimeout($flags);
        $parts = parse_url($baseUrl) ?: [];
        $host = (string) ($parts['host'] ?? '');

        $health = $this->client()->health($baseUrl, $timeout);
        $dns = $host !== '' ? gethostbynamel($host) : false;

        $maxUpload = ini_get('upload_max_filesize');
        $maxPost = ini_get('post_max_size');

        $payload = [
            'status' => ($health['status'] ?? 'down') === 'ok' ? 'ok' : 'warning',
            'base_url' => $baseUrl,
            'timeout' => $timeout,
            'parsed_url' => $parts,
            'dns' => [
                'host' => $host,
                'resolved_ips' => is_array($dns) ? $dns : [],
            ],
            'latency_ms' => $health['latency_ms'] ?? null,
            'last_error' => $health['last_error'] ?? null,
            'hints' => [
                'memory_limit' => ini_get('memory_limit'),
                'max_execution_time' => ini_get('max_execution_time'),
                'upload_max_filesize' => $maxUpload,
                'post_max_size' => $maxPost,
                'disk_free_bytes' => disk_free_space(ROOTPATH),
            ],
        ];

        if ($this->optBool($flags, 'include-env', false)) {
            $cfg = config(Ollama::class);
            $payload['env'] = [
                'OLLAMA_BASE_URL' => env('OLLAMA_BASE_URL', $cfg->baseUrl),
                'OLLAMA_TIMEOUT' => env('OLLAMA_TIMEOUT', (string) $cfg->timeout),
                'OLLAMA_DEFAULT_CHAT_MODEL' => env('OLLAMA_DEFAULT_CHAT_MODEL', $cfg->defaultChatModel),
                'OLLAMA_DEFAULT_EMBED_MODEL' => env('OLLAMA_DEFAULT_EMBED_MODEL', $cfg->defaultEmbedModel),
            ];
        }

        $exit = ($health['status'] ?? 'down') === 'ok' ? EXIT_SUCCESS : self::EXIT_WARNING;

        return $this->emitPayload($payload, $flags, $exit);
    }
}
