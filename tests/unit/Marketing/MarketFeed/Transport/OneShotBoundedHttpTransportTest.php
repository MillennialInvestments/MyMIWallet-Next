<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed\Transport;

use App\Services\Marketing\MarketFeed\Transport\BoundedHttpRequest;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpResponse;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpTransportInterface;
use App\Services\Marketing\MarketFeed\Transport\OneShotBoundedHttpTransport;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class OneShotBoundedHttpTransportTest extends TestCase
{
    public function testExactlyOneRequestIsAllowed(): void
    {
        $inner = new OneShotFakeTransport();

        $transport =
            new OneShotBoundedHttpTransport(
                $inner
            );

        $request = $this->request();

        $response = $transport->request(
            $request
        );

        self::assertSame(
            200,
            $response->statusCode()
        );

        self::assertSame(
            1,
            $transport->requestCount()
        );

        self::assertSame(
            1,
            $inner->calls
        );

        try {
            $transport->request(
                $request
            );

            self::fail(
                'Expected one-shot refusal.'
            );
        } catch (RuntimeException $exception) {
            self::assertSame(
                OneShotBoundedHttpTransport::
                    REQUEST_ALREADY_CONSUMED,
                $exception->getMessage()
            );
        }

        self::assertSame(
            1,
            $transport->requestCount()
        );

        self::assertSame(
            1,
            $inner->calls
        );
    }

    private function request(): BoundedHttpRequest
    {
        return new BoundedHttpRequest(
            'example.com',
            '/query',
            [],
            ['Accept' => 'application/json'],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }
}

final class OneShotFakeTransport implements
    BoundedHttpTransportInterface
{
    public int $calls = 0;

    public function request(
        BoundedHttpRequest $request
    ): BoundedHttpResponse {
        $this->calls++;

        return new BoundedHttpResponse(
            200,
            [],
            '{"feed":[]}'
        );
    }
}
