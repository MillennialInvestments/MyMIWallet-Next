<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class DiscordOps extends BaseConfig
{
    public string $aiopsPrimaryBaseUrl = 'https://aiops.timothyburks.com';
    public string $aiopsFallbackBaseUrl = '';
    public string $aiopsInternalToken = '';

    public string $ollamaPrimaryBaseUrl = 'https://ollama.timothyburks.com';
    public string $ollamaFallbackBaseUrl = '';
    public string $ollamaInternalToken = '';

    /** @var array<string,string> */
    public array $channelRouting = [
        'customer_support' => 'support',
        'ticker_lookup' => 'ops',
        'aiops_chat' => 'aiops_chat',
        'ollama_chat' => 'ollama_chat',
        'admin_spark' => 'admin_spark',
    ];

    /** @var list<string> */
    public array $adminUserIds = [];
    /** @var list<string> */
    public array $adminRoleIds = [];

    /** @var list<string> */
    public array $sparkAllowlist = [
        'marketing:daily-audit',
        'marketing:news:debug',
        'marketing:news:generate',
        'marketing:discord:test-category',
        'marketing:discord:test-all-categories',
        'discord:wire-check',
        'ollama:health',
        'aiops:alerts-health',
        'logs:summarize',
    ];

    public int $relayTimeoutSeconds = 20;
    public int $maxDiscordReplyLength = 1400;

    public function __construct()
    {
        parent::__construct();

        $this->aiopsPrimaryBaseUrl = rtrim((string) env('AIOPS_PRIMARY_BASE_URL', $this->aiopsPrimaryBaseUrl), '/');
        $this->aiopsFallbackBaseUrl = rtrim((string) env('AIOPS_FALLBACK_BASE_URL', $this->aiopsFallbackBaseUrl), '/');
        $this->aiopsInternalToken = (string) env('AIOPS_INTERNAL_TOKEN', $this->aiopsInternalToken);

        $this->ollamaPrimaryBaseUrl = rtrim((string) env('OLLAMA_PRIMARY_BASE_URL', $this->ollamaPrimaryBaseUrl), '/');
        $this->ollamaFallbackBaseUrl = rtrim((string) env('OLLAMA_FALLBACK_BASE_URL', $this->ollamaFallbackBaseUrl), '/');
        $this->ollamaInternalToken = (string) env('OLLAMA_INTERNAL_TOKEN', $this->ollamaInternalToken);

        $adminUsers = trim((string) env('DISCORD_ADMIN_USER_IDS', ''));
        if ($adminUsers !== '') {
            $this->adminUserIds = array_values(array_filter(array_map('trim', explode(',', $adminUsers))));
        }

        $adminRoles = trim((string) env('DISCORD_ADMIN_ROLE_IDS', ''));
        if ($adminRoles !== '') {
            $this->adminRoleIds = array_values(array_filter(array_map('trim', explode(',', $adminRoles))));
        }

        $allowlist = trim((string) env('DISCORD_SPARK_ALLOWLIST', ''));
        if ($allowlist !== '') {
            $this->sparkAllowlist = array_values(array_filter(array_map('trim', explode(',', $allowlist))));
        }

        foreach ($this->channelRouting as $routeKey => $channelKey) {
            $envKey = 'DISCORD_ROUTE_' . strtoupper($routeKey);
            $this->channelRouting[$routeKey] = (string) env($envKey, (string) $channelKey);
        }

        $this->relayTimeoutSeconds = max(3, (int) env('DISCORD_RELAY_TIMEOUT_SECONDS', (string) $this->relayTimeoutSeconds));
        $this->maxDiscordReplyLength = max(300, (int) env('DISCORD_MAX_REPLY_LENGTH', (string) $this->maxDiscordReplyLength));
    }
}
