<?php

declare(strict_types=1);

namespace App\Libraries\Ollama;

use CodeIgniter\Config\Services;
use Config\Ollama as OllamaConfig;
use RuntimeException;
use Throwable;

class OllamaClient
{
    protected OllamaConfig $config;

    public function __construct(?OllamaConfig $config = null)
    {
        $this->config = $config ?? config(OllamaConfig::class);
    }

    /**
     * @param array<string,mixed> $options
     * @return array<string,mixed>
     */
    public function generate(string $prompt, array $options = []): array
    {
        $payload = $this->buildGeneratePayload($prompt, $options);
        $preferInternal = (bool) ($options['prefer_internal'] ?? false);
        $baseUrl = rtrim((string) ($options['base_url'] ?? $this->config->getResolvedBaseUrl($preferInternal)), '/');
        $timeout = (int) ($options['timeout'] ?? $this->config->timeout);
        $maxTokens = (int) ($payload['options']['num_predict'] ?? $this->config->maxTokens);
        $model = (string) ($payload['model'] ?? $this->config->defaultChatModel);

        $client = Services::curlrequest([
            'timeout' => $timeout,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        try {
            log_message('debug', 'Ollama generate resolved config', [
                'base_url' => $baseUrl,
                'mode' => $this->config->mode,
                'model' => $model,
                'timeout' => $timeout,
                'max_tokens' => $maxTokens,
            ]);
            $response = $client->post($baseUrl . '/api/generate', ['json' => $payload]);
        } catch (Throwable $e) {
            throw new RuntimeException('Unable to reach Ollama API: ' . $e->getMessage(), 0, $e);
        }

        $status = $response->getStatusCode();
        $body = (string) $response->getBody();

        if ($status !== 200) {
            throw new RuntimeException('Ollama API returned HTTP ' . $status . '.');
        }

        $decoded = json_decode($body, true);
        if (! is_array($decoded)) {
            throw new RuntimeException('Ollama API returned invalid JSON.');
        }

        $responseText = $decoded['response'] ?? null;
        if (! is_string($responseText)) {
            throw new RuntimeException('Ollama API response missing "response" field.');
        }

        return [
            'success' => true,
            'model' => (string) $payload['model'],
            'response' => $responseText,
            'raw' => $decoded,
            'metrics' => [
                'total_duration' => (int) ($decoded['total_duration'] ?? 0),
                'load_duration' => (int) ($decoded['load_duration'] ?? 0),
                'prompt_eval_count' => (int) ($decoded['prompt_eval_count'] ?? 0),
                'eval_count' => (int) ($decoded['eval_count'] ?? 0),
            ],
        ];
    }

    /**
     * @return array{name:string,settings:array<string,mixed>}
     */
    public function resolveProfile(?string $profile = null): array
    {
        $resolved = trim((string) ($profile ?? $this->config->governanceProfile));
        if ($resolved === '') {
            $resolved = 'default';
        }

        $profiles = $this->config->profiles;
        if (! isset($profiles[$resolved]) || ! is_array($profiles[$resolved])) {
            throw new RuntimeException('Governance profile not found: ' . $resolved);
        }

        /** @var array<string,mixed> $settings */
        $settings = $profiles[$resolved];

        return [
            'name' => $resolved,
            'settings' => $settings,
        ];
    }

    public function assertModelAllowed(string $model, string $profile): void
    {
        $profiles = $this->config->profiles;
        $settings = $profiles[$profile] ?? null;

        if (! is_array($settings)) {
            throw new RuntimeException('Governance profile not found: ' . $profile);
        }

        $allowedModels = $settings['allowed_models'] ?? [];
        if (! is_array($allowedModels) || ! in_array($model, $allowedModels, true)) {
            throw new RuntimeException(sprintf('Model "%s" is not allowed by profile "%s".', $model, $profile));
        }
    }

    /**
     * @param array<string,mixed> $options
     * @return array<string,mixed>
     */
    public function buildGeneratePayload(string $prompt, array $options = []): array
    {
        $model = (string) ($options['model'] ?? $this->config->defaultChatModel);
        $maxTokens = (int) ($options['max_tokens'] ?? $this->config->maxTokens);
        $temperature = $options['temperature'] ?? $this->config->defaultTemperature;

        $payload = [
            'model' => $model,
            'prompt' => $prompt,
            'stream' => false,
            'options' => [
                'num_predict' => $maxTokens,
                'temperature' => (float) $temperature,
            ],
        ];

        if (isset($options['system']) && trim((string) $options['system']) !== '') {
            $payload['system'] = (string) $options['system'];
        }

        return $payload;
    }
}
