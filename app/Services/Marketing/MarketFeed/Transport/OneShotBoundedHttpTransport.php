<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use RuntimeException;

final class OneShotBoundedHttpTransport implements
    BoundedHttpTransportInterface
{
    public const REQUEST_ALREADY_CONSUMED =
        'one_shot_request_already_consumed';

    private int $requestCount = 0;

    public function __construct(
        private readonly BoundedHttpTransportInterface $inner
    ) {
    }

    public function request(
        BoundedHttpRequest $request
    ): BoundedHttpResponse {
        if ($this->requestCount >= 1) {
            throw new RuntimeException(
                self::REQUEST_ALREADY_CONSUMED
            );
        }

        $this->requestCount++;

        return $this->inner->request(
            $request
        );
    }

    public function requestCount(): int
    {
        return $this->requestCount;
    }
}
