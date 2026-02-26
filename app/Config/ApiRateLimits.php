<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ApiRateLimits extends BaseConfig
{
    public array $policies = [
        'alpha_vantage' => ['limit' => '75/min', 'enforcement' => 'ratelimit'],
        'marketaux' => ['limit' => 'daily-credits', 'enforcement' => 'queue+ratelimit'],
        'zapier' => ['limit' => 'retry-backoff', 'enforcement' => 'job-queue'],
        'discord' => ['limit' => 'provider-limits', 'enforcement' => 'queue+ratelimit'],
        'email_scrape' => ['limit' => 'per-run-cap', 'enforcement' => 'cli-only cap'],
    ];

    public array $endpointPolicies = [
        "API/Alerts/*" => "alpha_vantage",
        "API/News/*" => "marketaux",
        "API/Webhooks/Zapier*" => "zapier",
        "API/Discord/*" => "discord",
        "API/EmailScrape/*" => "email_scrape",
    ];
}
