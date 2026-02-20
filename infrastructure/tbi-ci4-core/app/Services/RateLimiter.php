<?php

declare(strict_types=1);

namespace App\Services;

use App\Integrations\Contracts\RateLimitInterface;

class RateLimiter implements RateLimitInterface
{
    /** @var array<string,array{count:int,windowStart:int}> */
    private array $buckets = [];

    public function allow(string $bucket, int $limit, int $windowSeconds): bool
    {
        $now = time();
        $state = $this->buckets[$bucket] ?? ['count' => 0, 'windowStart' => $now];

        if (($now - $state['windowStart']) >= $windowSeconds) {
            $state = ['count' => 0, 'windowStart' => $now];
        }

        if ($state['count'] >= $limit) {
            $this->buckets[$bucket] = $state;

            return false;
        }

        $state['count']++;
        $this->buckets[$bucket] = $state;

        return true;
    }
}
