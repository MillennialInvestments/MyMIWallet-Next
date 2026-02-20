<?php

declare(strict_types=1);

namespace App\Services;

use App\Integrations\Contracts\ProviderInterface;

class IntegrationRegistry
{
    /** @var array<string,ProviderInterface> */
    private array $providers = [];

    public function register(ProviderInterface $provider): void
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /** @return array<string,ProviderInterface> */
    public function all(): array
    {
        return $this->providers;
    }

    public function get(string $name): ?ProviderInterface
    {
        return $this->providers[$name] ?? null;
    }
}
