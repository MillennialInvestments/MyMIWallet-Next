<?php

declare(strict_types=1);

namespace App\Integrations\Http;

class CircuitBreaker
{
    private int $failures = 0;
    private ?int $openedAt = null;

    public function __construct(
        private readonly int $failureThreshold = 5,
        private readonly int $openSeconds = 60,
    ) {
    }

    public function isOpen(): bool
    {
        if ($this->openedAt === null) {
            return false;
        }

        if ((time() - $this->openedAt) >= $this->openSeconds) {
            $this->openedAt = null;
            $this->failures = 0;

            return false;
        }

        return true;
    }

    public function recordSuccess(): void
    {
        $this->failures = 0;
        $this->openedAt = null;
    }

    public function recordFailure(): void
    {
        $this->failures++;

        if ($this->failures >= $this->failureThreshold) {
            $this->openedAt = time();
        }
    }
}
