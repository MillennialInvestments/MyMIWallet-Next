<?php

declare(strict_types=1);

namespace App\Integrations\Providers\Zapier;

use App\Integrations\Contracts\ProviderInterface;

class ZapierClient implements ProviderInterface
{
    public function __construct(private readonly string $webhookUrl)
    {
    }

    public function getName(): string
    {
        return 'zapier';
    }

    public function dispatch(array $payload): array
    {
        return ['ok' => $this->webhookUrl !== '', 'provider' => $this->getName(), 'payloadKeys' => array_keys($payload)];
    }

    public function healthcheck(): array
    {
        return ['ok' => $this->webhookUrl !== '', 'provider' => $this->getName()];
    }
}
