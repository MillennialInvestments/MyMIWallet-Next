<?php

namespace App\Libraries;

use CodeIgniter\Cache\CacheInterface;
use Config\Services;

class SafeCache
{
    private CacheInterface $cache;
    private array $trace = [];
    private int $traceLimit = 10;
    private bool $debugEnabled;
    private array $userScopedKeys = [
        'user_id',
        'cuid',
        'email',
        'username',
    ];

    public function __construct(?CacheInterface $cache = null)
    {
        $this->cache = $cache ?? Services::cache();
        $this->debugEnabled = ENVIRONMENT !== 'production';
    }

    public function getTrace(): array
    {
        return $this->trace;
    }

    public function get(string $key)
    {
        $key = $this->sanitizeKey($key);
        $value = $this->cache->get($key);
        $this->pushTrace([
            'op'  => 'get',
            'key' => $key,
            'hit' => $value !== null,
        ]);

        if ($value !== null) {
            log_message('debug', '[CACHE_HIT] ' . $key);
        } else {
            log_message('debug', '[CACHE_MISS] ' . $key);
        }

        return $value;
    }

    public function save(string $key, $value, int $ttl = 300, ?int $userId = null): bool
    {
        $key = $this->sanitizeKey($key);
        $this->enforceUserScope($key, $value, $userId);

        $ok = $this->cache->save($key, $value, $ttl);
        $this->pushTrace([
            'op'  => 'save',
            'key' => $key,
            'hit' => null,
        ]);

        return (bool) $ok;
    }

    public function delete(string $key): bool
    {
        $key = $this->sanitizeKey($key);
        $ok = $this->cache->delete($key);
        $this->pushTrace([
            'op'  => 'delete',
            'key' => $key,
            'hit' => null,
        ]);

        return (bool) $ok;
    }

    public function getUser(string $module, string $feature, int $userId, array $params = [])
    {
        $key = CacheKey::user($module, $feature, $userId, $params);
        return $this->get($key);
    }

    public function saveUser(string $module, string $feature, int $userId, $value, int $ttl = 300, array $params = []): bool
    {
        $key = CacheKey::user($module, $feature, $userId, $params);
        return $this->save($key, $value, $ttl, $userId);
    }

    public function deleteUser(string $module, string $feature, int $userId, array $params = []): bool
    {
        $key = CacheKey::user($module, $feature, $userId, $params);
        return $this->delete($key);
    }

    public function getGlobal(string $module, string $feature, array $params = [])
    {
        $key = CacheKey::global($module, $feature, $params);
        return $this->get($key);
    }

    public function saveGlobal(string $module, string $feature, $value, int $ttl = 300, array $params = []): bool
    {
        $key = CacheKey::global($module, $feature, $params);
        return $this->save($key, $value, $ttl);
    }

    public function deleteGlobal(string $module, string $feature, array $params = []): bool
    {
        $key = CacheKey::global($module, $feature, $params);
        return $this->delete($key);
    }

    public function getGuest(string $module, string $feature, array $params = [])
    {
        $key = CacheKey::guest($module, $feature, $params);
        return $this->get($key);
    }

    public function saveGuest(string $module, string $feature, $value, int $ttl = 300, array $params = []): bool
    {
        $key = CacheKey::guest($module, $feature, $params);
        return $this->save($key, $value, $ttl);
    }

    public function deleteGuest(string $module, string $feature, array $params = []): bool
    {
        $key = CacheKey::guest($module, $feature, $params);
        return $this->delete($key);
    }

    public function clearUserNamespace(int $userId, array $modules = []): void
    {
        if ($userId <= 0) {
            return;
        }

        $modules = $modules ?: ['dashboard', 'budget', 'wallets', 'investments', 'tax'];
        $features = [
            'dashboard'   => ['summary', 'data'],
            'budget'      => ['summary', 'snapshot', 'records', 'categories'],
            'wallets'     => ['summary', 'budget'],
            'investments' => ['dashboard'],
            'tax'         => ['liability'],
        ];

        foreach ($modules as $module) {
            $pattern = sprintf('mymiwallet:%s:%s:*:uid:%d:*', CacheKey::environment(), $module, $userId);
            $pattern = $this->sanitizeKey($pattern);
            if (method_exists($this->cache, 'deleteMatching')) {
                $this->cache->deleteMatching($pattern);
                $this->pushTrace([
                    'op'  => 'deleteMatching',
                    'key' => $pattern,
                    'hit' => null,
                ]);
                continue;
            }

            foreach ($features[$module] ?? [] as $feature) {
                $this->deleteUser($module, $feature, $userId);
            }
        }
    }

    private function pushTrace(array $entry): void
    {
        $entry['ts'] = microtime(true);
        $this->trace[] = $entry;
        if (count($this->trace) > $this->traceLimit) {
            array_shift($this->trace);
        }
    }

    private function sanitizeKey(string $key): string
    {
        $sanitized = function_exists('sanitize_cache_key') ? sanitize_cache_key($key) : $key;

        if ($sanitized !== $key && $this->debugEnabled) {
            log_message('warning', '[SafeCache] Cache key sanitized', [
                'original'  => $key,
                'sanitized' => $sanitized,
            ]);
        }

        return $sanitized;
    }

    private function enforceUserScope(string $key, $value, ?int $userId): void
    {
        if (! $this->debugEnabled) {
            return;
        }

        if ($userId !== null && $userId > 0) {
            $needleRaw = 'uid:' . $userId;
            $needleSanitized = 'uid_' . $userId;
            if (strpos($key, $needleRaw) === false && strpos($key, $needleSanitized) === false) {
                log_message('warning', '[SafeCache] Missing uid in cache key for user-scoped write', [
                    'key'     => $key,
                    'user_id' => $userId,
                ]);
            }
        }

        if ($this->containsUserScopedValue($value)) {
            if (strpos($key, 'uid:') === false && strpos($key, 'uid_') === false) {
                log_message('warning', '[SafeCache] User-scoped payload saved without uid in key', [
                    'key' => $key,
                ]);
            }
        }
    }

    private function containsUserScopedValue($value): bool
    {
        if (is_object($value)) {
            $value = (array) $value;
        }

        if (! is_array($value)) {
            return false;
        }

        foreach ($value as $key => $val) {
            if (is_string($key) && in_array(strtolower($key), $this->userScopedKeys, true)) {
                return true;
            }

            if (is_array($val) || is_object($val)) {
                if ($this->containsUserScopedValue($val)) {
                    return true;
                }
            }
        }

        return false;
    }
}
