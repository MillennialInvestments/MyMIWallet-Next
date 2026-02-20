<?php

declare(strict_types=1);

namespace App\Integrations\Http;

class RetryMiddleware
{
    public function __construct(
        private readonly int $maxAttempts = 3,
        private readonly int $baseDelayMs = 250,
    ) {
    }

    public function execute(callable $request): array
    {
        $attempt = 0;
        $last = null;

        while ($attempt < $this->maxAttempts) {
            $attempt++;

            try {
                return $request($attempt);
            } catch (\Throwable $exception) {
                $last = $exception;
                usleep($this->baseDelayMs * $attempt * 1000);
            }
        }

        throw $last ?? new \RuntimeException('Retry middleware failed without exception detail.');
    }
}
