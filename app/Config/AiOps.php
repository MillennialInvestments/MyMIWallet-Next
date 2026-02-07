<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AiOps extends BaseConfig
{
    public bool $safe_mode = true;
    public bool $enableScraperAutoFix = false;
    public bool $enableChatGovernanceIndexing = true;
    public bool $enableChatGovernanceDbSync = true;
    public bool $enableChatGovernanceMetrics = true;
    public bool $enableChatGovernanceWriteFiles = true;
    public bool $enableChatGovernanceWorker = false;

    public bool $paused = false;
    public string $manualPath = 'docs/_aiops/manual/priorities';
    public string $donePath = 'docs/_aiops/manual/done';
    public string $statePath = 'docs/_aiops/aiops-state';
    public string $errorInputPath = 'docs/_aiops/error-input';
    public string $notificationsPath = 'docs/_aiops/notifications/channels.json';
    public int $defaultTaskLimit = 1;
    public int $defaultErrorLimit = 3;
    public string $discordWebhook = '';
    public string $githubToken = '';

    public function __construct()
    {
        $this->safe_mode = $this->envBool('AIOPS_SAFE_MODE', $this->safe_mode);
        $this->enableScraperAutoFix = $this->envBool('AIOPS_SCRAPER_AUTOFIX', $this->enableScraperAutoFix);
        $this->paused = $this->envBool('AIOPS_PAUSED', $this->paused);

        $this->discordWebhook = (string) (env('AIOPS_DISCORD_WEBHOOK') ?: $this->discordWebhook);
        $this->githubToken = (string) (env('AIOPS_GITHUB_TOKEN') ?: env('GITHUB_TOKEN') ?: $this->githubToken);
    }

    private function envBool(string $key, bool $default): bool
    {
        $env = env($key);
        if ($env === null || $env === '') {
            return $default;
        }

        return filter_var($env, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $default;
    }
}
