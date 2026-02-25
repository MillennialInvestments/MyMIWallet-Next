<?php

declare(strict_types=1);

namespace App\Services\LLM;

use Config\Ollama;
use Config\Services;
use RuntimeException;

class OllamaClient
{
    protected Ollama $config;

    public function __construct(?Ollama $config = null)
    {
        $this->config = $config ?? config(Ollama::class);
    }

    /** @return array<string,mixed> */
    public function health(string $baseUrl = '', int $timeout = 0): array
    {
        $start = microtime(true);
        try {
            $this->request('GET', '/api/tags', [], $baseUrl, $timeout);

            return [
                'status' => 'ok',
                'latency_ms' => (int) ((microtime(true) - $start) * 1000),
                'last_error' => null,
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'down',
                'latency_ms' => (int) ((microtime(true) - $start) * 1000),
                'last_error' => $e->getMessage(),
            ];
        }
    }

    /** @return array<string,mixed> */
    public function listModels(string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('GET', '/api/tags', [], $baseUrl, $timeout);
    }

    /** @return array<string,mixed> */
    public function showModel(string $name, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('POST', '/api/show', ['name' => $name], $baseUrl, $timeout);
    }

    /** @return array<string,mixed> */
    public function pull(string $name, bool $stream = false, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('POST', '/api/pull', ['name' => $name, 'stream' => $stream], $baseUrl, $timeout);
    }

    /** @return array<string,mixed> */
    public function rm(string $name, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('DELETE', '/api/delete', ['name' => $name], $baseUrl, $timeout);
    }

    /** @param array<string,mixed> $request */
    public function generate(array $request, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('POST', '/api/generate', $request, $baseUrl, $timeout);
    }

    /** @param array<string,mixed> $request */
    public function chat(array $request, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('POST', '/api/chat', $request, $baseUrl, $timeout);
    }

    /** @param array<string,mixed> $request */
    public function embed(array $request, string $baseUrl = '', int $timeout = 0): array
    {
        return $this->request('POST', '/api/embed', $request, $baseUrl, $timeout);
    }

    /** @param array<string,mixed> $payload * @return array<string,mixed> */
    protected function request(string $method, string $path, array $payload = [], string $baseUrl = '', int $timeout = 0): array
    {
        $baseUrl = rtrim($baseUrl !== '' ? $baseUrl : $this->config->baseUrl, '/');
        $timeout = $timeout > 0 ? $timeout : $this->config->timeout;
        $runUuid = bin2hex(random_bytes(8));

        try {
            $client = Services::curlrequest([
                'timeout' => $timeout,
                'http_errors' => false,
                'headers' => ['Accept' => 'application/json'],
            ]);

            $options = [];
            if ($payload !== []) {
                $options['json'] = $payload;
            }

            $response = $client->request($method, $baseUrl . $path, $options);
            $status = $response->getStatusCode();
            $body = (string) $response->getBody();
            $data = $body === '' ? [] : (json_decode($body, true) ?: []);

            if ($status >= 400) {
                throw new RuntimeException('Ollama HTTP ' . $status . ': ' . $body);
            }

            log_message('info', 'Ollama call success', ['run_uuid' => $runUuid, 'path' => $path, 'status' => $status]);

            if (! is_array($data)) {
                return ['raw' => $body];
            }

            return $data;
        } catch (\Throwable $e) {
            log_message('error', 'Ollama call failure: {msg}', ['msg' => $e->getMessage(), 'run_uuid' => $runUuid, 'path' => $path]);
            throw $e;
        }
    }
}
