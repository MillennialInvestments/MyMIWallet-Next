<?php

declare(strict_types=1);

namespace App\Services\LLM;

use Config\Services;

class OllamaCircuitBreaker
{
    protected string $stateKey = 'ollama:circuit:state';
    protected string $failKey = 'ollama:circuit:failures';
    protected string $openedKey = 'ollama:circuit:opened_at';

    protected int $failureThreshold = 5;
    protected int $cooldownSeconds = 60;

    protected $redis;

    public function __construct()
    {
        $this->redis = Services::redis();
    }

    public function isOpen(): bool
    {
        $state = $this->redis->get($this->stateKey);

        if ($state !== 'open') {
            return false;
        }

        $openedAt = (int) $this->redis->get($this->openedKey);
        if ($openedAt === 0) {
            return false;
        }

        if (time() - $openedAt >= $this->cooldownSeconds) {
            $this->redis->set($this->stateKey, 'half-open');
            return false;
        }

        return true;
    }

    public function recordSuccess(): void
    {
        $this->redis->set($this->stateKey, 'closed');
        $this->redis->set($this->failKey, 0);
    }

    public function recordFailure(): void
    {
        $failures = (int) $this->redis->incr($this->failKey);

        if ($failures >= $this->failureThreshold) {
            $this->redis->set($this->stateKey, 'open');
            $this->redis->set($this->openedKey, time());
        }
    }

    public function status(): array
    {
        return [
            'state' => $this->redis->get($this->stateKey) ?? 'closed',
            'failures' => (int) $this->redis->get($this->failKey),
            'opened_at' => $this->redis->get($this->openedKey),
        ];
    }

    public function reset(): void
    {
        $this->redis->set($this->stateKey, 'closed');
        $this->redis->set($this->failKey, 0);
        $this->redis->del($this->openedKey);
    }
}