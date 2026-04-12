<?php

namespace App\Services\Marketing\Distribution;

use Config\MarketingDistribution;

class LinkedInDistributionService
{
    public function __construct(private ?MarketingDistribution $config = null)
    {
        $this->config ??= config('MarketingDistribution');
    }

    public function publish(array $payload): array
    {
        if (! (bool) ($this->config->linkedin['enabled'] ?? false)) {
            return ['status' => 'skipped', 'error' => 'LinkedIn phase II scaffold is disabled'];
        }

        // TODO: Replace with OAuth2 + organization posting workflow when LinkedIn app review is approved.
        // TODO: Support ugcPosts endpoint with organization URN after production scopes are granted.
        return ['status' => 'skipped', 'error' => 'LinkedIn publishing not enabled until app review/auth scopes are complete'];
    }
}
