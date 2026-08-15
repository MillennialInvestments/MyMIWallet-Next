<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed\Transport;

use App\Services\Marketing\MarketFeed\Transport\BoundedHttpRequest;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpResponse;
use App\Services\Marketing\MarketFeed\Transport\MarketFeedTransportException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class BoundedHttpContractsTest extends TestCase
{
    public function testTrustedRequestContract(): void
    {
        $request = new BoundedHttpRequest(
            ' Example.COM ',
            ' /query ',
            ['apikey' => 'synthetic-secret'],
            ['Accept' => 'application/json'],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );

        self::assertSame('GET', $request->method());
        self::assertSame(443, $request->port());
        self::assertSame(
            'example.com',
            $request->host()
        );
        self::assertSame('/query', $request->path());
        self::assertSame(
            'synthetic-secret',
            $request->queryParameters()['apikey']
        );
    }

    public function testFullUrlIsRejectedAsHost(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            'https://example.com',
            '/query',
            [],
            [],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testIpAddressIsRejectedAsHost(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            '127.0.0.1',
            '/query',
            [],
            [],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testQueryInPathIsRejected(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            'example.com',
            '/query?x=1',
            [],
            [],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testInvalidHeaderTokenIsRejected(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            'example.com',
            '/query',
            [],
            ['Bad Header' => 'value'],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testHeaderInjectionIsRejected(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            'example.com',
            '/query',
            [],
            [
                'X-Test' =>
                    "safe\r\nInjected: yes",
            ],
            3000,
            10000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testTimeoutOrderIsRejected(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpRequest(
            'example.com',
            '/query',
            [],
            [],
            5000,
            4000,
            1048576,
            '8.8.8.8'
        );
    }

    public function testResponseByteCountIsDerived(): void
    {
        $body = '{"ok":true}';

        $response = new BoundedHttpResponse(
            200,
            ['Content-Type' => 'application/json'],
            $body
        );

        self::assertSame(
            strlen($body),
            $response->receivedByteCount()
        );
    }

    public function testResponseRejectsBadHeader(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new BoundedHttpResponse(
            200,
            ['Bad Header' => 'value'],
            'body'
        );
    }

    public function testTransportExceptionContract(): void
    {
        $previous = new RuntimeException(
            'internal'
        );

        $exception =
            new MarketFeedTransportException(
                MarketFeedTransportException::
                    TRANSPORT_TIMEOUT,
                $previous
            );

        self::assertSame(
            'transport_timeout',
            $exception->reasonCode()
        );

        self::assertSame(
            0,
            $exception->getCode()
        );

        self::assertSame(
            $previous,
            $exception->getPrevious()
        );
    }

    public function testUnsupportedReasonIsRejected(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        new MarketFeedTransportException(
            'not_supported'
        );
    }

    public function testRequestErrorDoesNotLeakQueryValue(): void
    {
        $secret = 'C2_SECRET_SENTINEL';

        try {
            new BoundedHttpRequest(
                'example.com',
                '/query',
                ['apikey' => $secret],
                [],
                1,
                10000,
                1048576,
                '8.8.8.8'
            );

            self::fail(
                'Expected invalid request.'
            );
        } catch (InvalidArgumentException $e) {
            self::assertStringNotContainsString(
                $secret,
                $e->getMessage()
            );
        }
    }
}
