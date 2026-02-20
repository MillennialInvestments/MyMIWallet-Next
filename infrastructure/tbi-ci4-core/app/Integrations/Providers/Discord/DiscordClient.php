<?php

declare(strict_types=1);

namespace App\Integrations\Providers\Discord;

use App\Integrations\Contracts\ProviderInterface;

class DiscordClient implements ProviderInterface
{
    public function __construct(private readonly string $webhookUrl)
    {
    }

    public function getName(): string
    {
        return 'discord';
    }

    public function post(string $message): array
    {
        return ['ok' => $this->webhookUrl !== '', 'channel' => 'discord', 'preview' => mb_substr($message, 0, 80)];
    }

    public function healthcheck(): array
    {
        return ['ok' => $this->webhookUrl !== '', 'provider' => $this->getName()];
    }
}
