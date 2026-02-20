<?php

declare(strict_types=1);

namespace App\Integrations\Contracts;

interface HealthcheckInterface
{
    /**
     * @return array<string,mixed>
     */
    public function healthcheck(): array;
}
