<?php

declare(strict_types=1);

namespace App\Integrations\Contracts;

interface RateLimitInterface
{
    public function allow(string $bucket, int $limit, int $windowSeconds): bool;
}
