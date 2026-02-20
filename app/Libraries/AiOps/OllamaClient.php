<?php

namespace App\Libraries\AiOps;

use Config\Services;

class OllamaClient
{
    protected string $baseUrl;

    public function __construct(?string $baseUrl = null)
    {
        $this->baseUrl = rtrim($baseUrl ?? env('OLLAMA_BASE_URL') ?: 'http://localhost:11434', '/');
    }

    public function generate(string $model, string $prompt, array $options = []): array
    {
        $client = Services::curlrequest(['http_errors' => false]);
        $payload = array_merge([
            'model'  => $model,
            'prompt' => $prompt,
            'stream' => false,
        ], $options);

        $response = $client->post($this->baseUrl . '/api/generate', [
            'headers' => ['Content-Type' => 'application/json'],
            'json'    => $payload,
        ]);

        return [
            'status' => $response->getStatusCode(),
            'body'   => json_decode($response->getBody(), true) ?? [],
        ];
    }
}
