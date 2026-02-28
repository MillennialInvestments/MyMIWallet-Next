<?php

declare(strict_types=1);

namespace App\Services\LLM;

use CodeIgniter\Cache\CacheInterface;
use Config\Services;
use Throwable;

class OllamaCircuitBreaker
{
    protected string $stateKey = 'ollama:circuit:state';
    protected string $failKey = 'ollama:circuit:failures';
    protected string $openedKey = 'ollama:circuit:opened_at';

    protected int $failureThreshold = 5;
    protected int $cooldownSeconds = 60;

    private ?CacheInterface $cache = null;
    private bool $cacheReady = false;

    public function __construct()
    {
        $this->cache = $this->resolveCache();
        $this->cacheReady = $this->cache !== null;
    }

    public function isOpen(): bool
    {
        if (! $this->cacheReady) {
            return false;
        }

        $state = $this->safeGet($this->stateKey);

        if ($state !== 'open') {
            return false;
        }

        $openedAt = (int) $this->safeGet($this->openedKey);
        if ($openedAt === 0) {
            return false;
        }

        if (time() - $openedAt >= $this->cooldownSeconds) {
            $this->safeSet($this->stateKey, 'half-open', $this->cooldownSeconds);
            return false;
        }

        return true;
    }

    public function recordSuccess(): void
    {
        if (! $this->cacheReady) {
            return;
        }

        $this->safeSet($this->stateKey, 'closed', $this->cooldownSeconds);
        $this->safeSet($this->failKey, 0, $this->cooldownSeconds);
    }

    public function recordFailure(): void
    {
        if (! $this->cacheReady) {
            return;
        }

        $failures = ((int) $this->safeGet($this->failKey)) + 1;
        $this->safeSet($this->failKey, $failures, $this->cooldownSeconds);

        if ($failures >= $this->failureThreshold) {
            $this->safeSet($this->stateKey, 'open', $this->cooldownSeconds);
            $this->safeSet($this->openedKey, time(), $this->cooldownSeconds);
        }
    }

    public function status(): array
    {
        return [
            'state' => $this->safeGet($this->stateKey) ?? 'closed',
            'failures' => (int) $this->safeGet($this->failKey),
            'opened_at' => $this->safeGet($this->openedKey),
            'cache_ready' => $this->cacheReady,
        ];
    }

    public function reset(): void
    {
        if (! $this->cacheReady) {
            return;
        }

        $this->safeSet($this->stateKey, 'closed', $this->cooldownSeconds);
        $this->safeSet($this->failKey, 0, $this->cooldownSeconds);
        $this->safeDelete($this->openedKey);
    }

    private function resolveCache(): ?CacheInterface
    {
        try {
            return Services::cache();
        } catch (Throwable $e) {
            log_message('warning', 'OllamaCircuitBreaker cache service unavailable: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    /** @return mixed */
    private function safeGet(string $key)
    {
        if ($this->cache === null) {
            return null;
        }

        try {
            return $this->cache->get($key);
        } catch (Throwable $e) {
            $this->cacheReady = false;
            log_message('warning', 'OllamaCircuitBreaker cache get failed: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    private function safeSet(string $key, $value, int $ttl): void
    {
        if ($this->cache === null) {
            return;
        }

        try {
            $this->cache->save($key, $value, $ttl);
        } catch (Throwable $e) {
            $this->cacheReady = false;
            log_message('warning', 'OllamaCircuitBreaker cache save failed: {msg}', ['msg' => $e->getMessage()]);
        }
    }

    private function safeDelete(string $key): void
    {
        if ($this->cache === null) {
            return;
        }

        try {
            $this->cache->delete($key);
        } catch (Throwable $e) {
            $this->cacheReady = false;
            log_message('warning', 'OllamaCircuitBreaker cache delete failed: {msg}', ['msg' => $e->getMessage()]);
        }
    }
}
