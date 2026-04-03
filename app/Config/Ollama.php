<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Ollama extends BaseConfig
{
    public string $baseUrl = 'http://127.0.0.1:11434';
    public int $timeout = 30;
    public int $maxTokens = 1200;
    public string $defaultChatModel = 'llama3.2:latest';
    public string $defaultEmbedModel = 'mxbai-embed-large:latest';
    public string $governanceProfile = 'aiops';
    public float $defaultTemperature = 0.2;
    public bool $allowShellFallback = false;
    public bool $writeSidecarJson = true;


    /**
     * @var array<string, array<string, mixed>>
     */
    public array $profiles = [
        'default' => [
            'allowed_models' => ['llama3.2:latest', 'mxbai-embed-large:latest'],
            'max_tokens' => 1200,
            'require_logging' => true,
            'pii_redaction' => false,
        ],
        'aiops' => [
            'allowed_models' => ['llama3.2:latest', 'mxbai-embed-large:latest'],
            'max_tokens' => 1200,
            'require_logging' => true,
            'pii_redaction' => true,
        ],
        'marketing' => [
            'allowed_models' => ['llama3.2:latest'],
            'max_tokens' => 800,
            'require_logging' => true,
            'pii_redaction' => true,
        ],
        'alerts' => [
            'allowed_models' => ['llama3.2:latest'],
            'max_tokens' => 600,
            'require_logging' => true,
            'pii_redaction' => true,
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        $this->baseUrl = (string) env('OLLAMA_BASE_URL', $this->baseUrl);
        $this->timeout = (int) env('OLLAMA_TIMEOUT', (string) $this->timeout);
        $this->maxTokens = (int) env('OLLAMA_MAX_TOKENS', (string) $this->maxTokens);
        $this->defaultChatModel = (string) env('OLLAMA_DEFAULT_CHAT_MODEL', $this->defaultChatModel);
        $this->defaultEmbedModel = (string) env('OLLAMA_DEFAULT_EMBED_MODEL', $this->defaultEmbedModel);
        $this->governanceProfile = (string) env('OLLAMA_GOV_PROFILE', $this->governanceProfile);
        $this->defaultTemperature = (float) env('OLLAMA_DEFAULT_TEMPERATURE', (string) $this->defaultTemperature);
        $allowShellFallback = filter_var(env('OLLAMA_ALLOW_SHELL_FALLBACK', $this->allowShellFallback), FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
        $writeSidecarJson = filter_var(env('OLLAMA_WRITE_SIDECAR_JSON', $this->writeSidecarJson), FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);

        $this->allowShellFallback = $allowShellFallback ?? $this->allowShellFallback;
        $this->writeSidecarJson = $writeSidecarJson ?? $this->writeSidecarJson;
    }
}
