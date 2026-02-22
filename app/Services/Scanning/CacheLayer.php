<?php

declare(strict_types=1);

namespace App\Services\Scanning;

use CodeIgniter\Cache\CacheInterface;

class CacheLayer
{
    public function __construct(private readonly CacheInterface $cache)
    {
    }

    public function get(string $key): mixed
    {
        return $this->cache->get($key);
    }

    public function set(string $key, mixed $value, int $ttl): bool
    {
        return $this->cache->save($key, $value, $ttl);
    }

    public function ttlForTimeframe(string $timeframe): int
    {
        return match (strtolower($timeframe)) {
            '1m', '1min' => 90,
            '5m', '5min' => 240,
            '15m', '15min' => 720,
            '1d', '1day', 'daily' => 28800,
            default => 300,
        };
    }

    public function key(string $prefix, array $parts): string
    {
        return $prefix . ':' . md5(json_encode($parts, JSON_THROW_ON_ERROR));
    }
}
