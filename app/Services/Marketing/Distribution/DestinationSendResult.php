<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution;

final class DestinationSendResult
{
    public function __construct(
        public bool $success,
        public ?int $httpStatus = null,
        public bool $retryable = false,
        public ?string $failureClass = null,
        public ?string $externalId = null,
        public ?string $responseExcerpt = null,
        public ?string $sentAt = null,
        public ?string $nextRetryAt = null,
        public ?array $responseHeaders = null,
        public ?string $responseBody = null,
    ) {
    }
}
