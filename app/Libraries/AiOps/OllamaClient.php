<?php

namespace App\Libraries\AiOps;

use Config\Services;
use Config\Ollama as OllamaConfig;

class OllamaClient
{
    protected string $baseUrl;
    protected OllamaConfig $config;

    public function __construct(?string $baseUrl = null, ?OllamaConfig $config = null, bool $preferInternal = false)
    {
        $this->config = $config ?? config(OllamaConfig::class);
        $resolved = $baseUrl ?? $this->config->getResolvedBaseUrl($preferInternal);
        $this->baseUrl = rtrim($resolved, '/');
    }

    public function generate(string $model, string $prompt, array $options = []): array
    {
        $client = Services::curlrequest(['http_errors' => false]);
        $payload = array_merge([
            'model'  => $model,
            'prompt' => $prompt,
            'stream' => false,
        ], $options);
        $timeout = (int) ($options['timeout'] ?? $this->config->timeout);
        $maxTokens = (int) ($payload['options']['num_predict'] ?? $this->config->maxTokens);

        log_message('debug', 'AIOps Ollama client resolved config', [
            'base_url' => $this->baseUrl,
            'mode' => $this->config->mode,
            'model' => $model,
            'timeout' => $timeout,
            'max_tokens' => $maxTokens,
        ]);

        $response = $client->post($this->baseUrl . '/api/generate', [
            'headers' => ['Content-Type' => 'application/json'],
            'json'    => $payload,
            'timeout' => $timeout,
        ]);

        return [
            'status' => $response->getStatusCode(),
            'body'   => json_decode($response->getBody(), true) ?? [],
        ];
    }
}
