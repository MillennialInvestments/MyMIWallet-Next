<?php

declare(strict_types=1);

namespace App\Integrations\Contracts;

interface ProviderInterface
{
    public function getName(): string;

    /**
     * @return array<string,mixed>
     */
    public function healthcheck(): array;
}
