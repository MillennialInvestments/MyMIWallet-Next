<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use Config\ApiResearch;
use Config\Services;

class ApiAiSummarizer
{
    protected $config;

    public function __construct()
    {
        $config = config('ApiResearch');

        if (! $config instanceof ApiResearch) {
            $config = new ApiResearch();
        }

        $this->config = $config;
    }

    public function summarize(array $snapshot): string
    {
        if (! $this->config->enableAiSummary || empty($this->config->aiProvider)) {
            return '';
        }

        if ($this->config->aiProvider === 'ollama') {
            return $this->summarizeWithOllama($snapshot);
        }

        return '';
    }

    protected function summarizeWithOllama(array $snapshot): string
    {
        if (empty($this->config->ollamaEndpoint) || empty($this->config->ollamaModel)) {
            return '';
        }

        $prompt = "Summarize this API research snapshot for CodeIgniter 4 integration.\n\n"
            . json_encode($snapshot, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        try {
            $client = Services::curlrequest([
                'timeout'     => 60,
                'http_errors' => false,
                'verify'      => false,
            ]);

            $response = $client->post($this->config->ollamaEndpoint, [
                'json' => [
                    'model'  => $this->config->ollamaModel,
                    'prompt' => $prompt,
                    'stream' => false,
                ],
            ]);

            $payload = json_decode((string) $response->getBody(), true);

            return (string) ($payload['response'] ?? '');
        } catch (\Throwable $e) {
            log_message('error', 'ApiAiSummarizer failed: {message}', ['message' => $e->getMessage()]);
            return '';
        }
    }
}