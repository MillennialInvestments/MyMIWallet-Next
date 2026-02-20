<?php

declare(strict_types=1);

namespace App\Integrations\Providers\IMAP;

use App\Integrations\Contracts\ProviderInterface;

class IMAPClient implements ProviderInterface
{
    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $username,
        private readonly string $password,
    ) {
    }

    public function getName(): string
    {
        return 'imap';
    }

    public function healthcheck(): array
    {
        return [
            'ok' => $this->host !== '' && $this->username !== '' && $this->password !== '',
            'provider' => $this->getName(),
            'mailbox' => sprintf('%s:%d', $this->host, $this->port),
        ];
    }
}
