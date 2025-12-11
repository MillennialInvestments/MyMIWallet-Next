<?php

namespace App\Libraries;

use App\Config\Kimi as KimiConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

class KimiClient
{
    private Client $http;
    private KimiConfig $config;

    public function __construct(?Client $http = null, ?KimiConfig $config = null)
    {
        $this->http   = $http ?? new Client();
        $this->config = $config ?? config(KimiConfig::class);
    }

    protected function guardEnabled(): void
    {
        if (function_exists('aiKimiEnabled') && ! aiKimiEnabled()) {
            throw new RuntimeException('Kimi-K2 AI is disabled in SiteSettings.');
        }
    }

    private function requireKey(): void
    {
        if ($this->config->apiKey === '') {
            throw new RuntimeException('KIMI_API_KEY is missing. Set it in your environment.');
        }
    }

    /**
     * Execute a chat completion request.
     *
     * @param array<int,array<string,mixed>> $messages
     * @param array<int,array<string,mixed>> $tools
     * @param array<string,mixed>|null $toolChoice
     */
    public function chat(array $messages, array $tools = [], ?array $toolChoice = null, array $options = []): array
    {
        $this->guardEnabled();
        $this->requireKey();

        $payload = array_filter([
            'model'       => $options['model'] ?? $this->config->model,
            'messages'    => $messages,
            'temperature' => $options['temperature'] ?? 0.4,
            'tools'       => $tools ?: null,
            'tool_choice' => $toolChoice,
            'response_format' => $options['response_format'] ?? null,
        ], static fn($value) => $value !== null);

        try {
            $response = $this->http->post($this->config->apiBase . '/chat/completions', [
                'headers' => array_filter($this->config->headers, static fn($h) => $h !== ''),
                'json'    => $payload,
                'timeout' => $this->config->timeout,
            ]);

            $data = json_decode((string) $response->getBody(), true);
            return is_array($data) ? $data : ['status' => 'error', 'message' => 'Unexpected response from Kimi.'];
        } catch (GuzzleException $e) {
            throw new RuntimeException('Kimi request failed: ' . $e->getMessage(), (int) $e->getCode(), $e);
        }
    }

    public function simple(string $instruction, string $input): array
    {
        $messages = [
            ['role' => 'system', 'content' => $instruction],
            ['role' => 'user', 'content' => $input],
        ];

        return $this->chat($messages);
    }
}