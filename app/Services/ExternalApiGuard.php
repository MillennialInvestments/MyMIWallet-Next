<?php

declare(strict_types=1);

namespace App\Services;

use Config\ExternalApiPolicy;

class ExternalApiGuard
{
    private ExternalApiPolicy $policy;

    /** @var array<string,int> */
    private array $counts = [];

    public function __construct(?ExternalApiPolicy $policy = null)
    {
        $this->policy = $policy ?? config('ExternalApiPolicy');
    }

    /**
     * Registers an external API attempt and returns whether caller may proceed.
     */
    public function allow(string $provider): bool
    {
        if ((string) getenv('MYMI_DISABLE_EXTERNAL') !== '') {
            return false;
        }

        $key = strtolower(trim($provider));
        if ($key === '') {
            $key = 'unknown';
        }

        $this->counts[$key] = ($this->counts[$key] ?? 0) + 1;
        $cap = $this->policy->providerCaps[$key] ?? PHP_INT_MAX;

        if ($this->counts[$key] > $cap) {
            log_message('critical', 'ExternalApiGuard cap exceeded provider={provider} count={count} cap={cap}', [
                'provider' => $key,
                'count' => $this->counts[$key],
                'cap' => $cap,
            ]);

            return false;
        }

        if ($this->policy->enableBackoff && $this->policy->microSleepBackoffUs > 0) {
            usleep($this->policy->microSleepBackoffUs);
        }

        return true;
    }

    /** @return array<string,int> */
    public function counts(): array
    {
        return $this->counts;
    }

    public function capFor(string $provider): int
    {
        $key = strtolower(trim($provider));
        return (int) ($this->policy->providerCaps[$key] ?? PHP_INT_MAX);
    }

    public function reset(): void
    {
        $this->counts = [];
    }
}
