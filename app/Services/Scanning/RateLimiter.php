<?php

declare(strict_types=1);

namespace App\Services\Scanning;

class RateLimiter
{
    private int $windowStart;
    private int $count = 0;

    public function __construct(private readonly int $maxPerMinute = 75)
    {
        $this->windowStart = time();
    }

    public function throttle(string $provider): void
    {
        if ($provider !== 'alpha') {
            return;
        }

        $now = time();
        if (($now - $this->windowStart) >= 60) {
            $this->windowStart = $now;
            $this->count = 0;
        }

        if ($this->count >= $this->maxPerMinute) {
            $sleep = 60 - ($now - $this->windowStart);
            if ($sleep > 0) {
                log_message('warning', 'SCANNER: AlphaVantage rate limit hit, sleeping {sleep}s', ['sleep' => $sleep]);
                sleep($sleep);
            }
            $this->windowStart = time();
            $this->count = 0;
        }

        $this->count++;
    }
}
