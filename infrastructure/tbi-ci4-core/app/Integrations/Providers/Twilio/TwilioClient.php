<?php

declare(strict_types=1);

namespace App\Integrations\Providers\Twilio;

use App\Integrations\Contracts\ProviderInterface;

class TwilioClient implements ProviderInterface
{
    public function __construct(
        private readonly string $accountSid,
        private readonly string $authToken,
    ) {
    }

    public function getName(): string
    {
        return 'twilio';
    }

    public function healthcheck(): array
    {
        return ['ok' => $this->accountSid !== '' && $this->authToken !== '', 'provider' => $this->getName()];
    }
}
