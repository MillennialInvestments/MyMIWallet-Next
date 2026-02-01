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

    public function __construct()
    {
        $env = env('AIOPS_SAFE_MODE');
        if ($env !== null && $env !== '') {
            $this->safe_mode = filter_var($env, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true;
        }

        $scraperAutoFix = env('AIOPS_SCRAPER_AUTOFIX');
        if ($scraperAutoFix !== null && $scraperAutoFix !== '') {
            $this->enableScraperAutoFix = filter_var($scraperAutoFix, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
        }
    }
}
