<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Config\Services;

class CacheService
{
    public function __construct(private ?CacheInterface $cache = null)
    {
        $this->cache = $cache ?? Services::cache();
    }

    public function remember(string $key, int $ttlSeconds, callable $resolver): mixed
    {
        $cached = $this->cache->get($key);
        if ($cached !== null) {
            return $cached;
        }

        $value = $resolver();
        $this->cache->save($key, $value, $ttlSeconds);

        return $value;
    }
}
