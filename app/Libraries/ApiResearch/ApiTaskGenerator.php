<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiTaskGenerator
{
    public function generate(string $providerSlug, array $snapshot): array
    {
        $tasks = [];

        $classBase = ucfirst(str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $providerSlug))));

        $tasks[] = 'Create App\\Libraries\\Integrations\\' . $classBase . 'Service';
        $tasks[] = 'Add .env keys for ' . $providerSlug . '.baseUrl, ' . $providerSlug . '.timeout, and credentials';
        $tasks[] = 'Add retry and rate-limit handling wrapper for ' . $providerSlug . ' requests';
        $tasks[] = 'Log request failures to application logger / bf_error_logs';

        $authType = (string) ($snapshot['auth']['primary_auth_type'] ?? 'unknown');

        if ($authType === 'oauth2') {
            $tasks[] = 'Implement OAuth token acquisition and refresh storage for ' . $providerSlug;
        } elseif ($authType === 'api_key') {
            $tasks[] = 'Implement API key header injection for ' . $providerSlug;
        } elseif ($authType === 'bearer_token') {
            $tasks[] = 'Implement Bearer token handling for ' . $providerSlug;
        }

        if (! empty($snapshot['webhooks'])) {
            $tasks[] = 'Create webhook endpoint controller and signature validation for ' . $providerSlug;
        }

        if (! empty($snapshot['rate_limits'])) {
            $tasks[] = 'Add queue/batching strategy to respect documented rate limits for ' . $providerSlug;
        }

        if (! empty($snapshot['servers'])) {
            $tasks[] = 'Add production and sandbox base URL switching in config/.env for ' . $providerSlug;
        }

        if (! empty($snapshot['endpoints'])) {
            $tasks[] = 'Create smoke test Spark command for one auth endpoint and one business endpoint';
        }

        return array_values(array_unique($tasks));
    }
}