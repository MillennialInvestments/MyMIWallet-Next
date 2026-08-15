<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed\Transport;

use App\Services\Marketing\MarketFeed\Transport\MarketFeedTransportException;
use App\Services\Marketing\MarketFeed\Transport\SystemPublicIpv4Resolver;
use Closure;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class SystemPublicIpv4ResolverTest extends TestCase
{
    public function testSelectsDeterministically(): void
    {
        $resolver = $this->resolver([
            ['ip' => '8.8.8.8'],
            ['ip' => '1.1.1.1'],
            ['ip' => '8.8.8.8'],
        ]);

        self::assertSame(
            '1.1.1.1',
            $resolver->resolvePublicIpv4(
                'www.alphavantage.co'
            )
        );
    }

    /**
     * @dataProvider rejectedAddressProvider
     */
    public function testRejectsNonPublicAddresses(
        string $address
    ): void {
        $resolver = $this->resolver([
            ['ip' => $address],
        ]);

        try {
            $resolver->resolvePublicIpv4(
                'www.alphavantage.co'
            );

            self::fail(
                'Expected address rejection.'
            );
        } catch (
            MarketFeedTransportException $exception
        ) {
            self::assertSame(
                MarketFeedTransportException::
                    NON_PUBLIC_PROVIDER_ADDRESS,
                $exception->reasonCode()
            );
        }
    }

    public static function rejectedAddressProvider(): array
    {
        return [
            ['0.0.0.0'],
            ['10.0.0.1'],
            ['100.64.0.1'],
            ['127.0.0.1'],
            ['169.254.1.1'],
            ['172.16.0.1'],
            ['192.0.2.1'],
            ['192.168.1.1'],
            ['198.18.0.1'],
            ['198.51.100.1'],
            ['203.0.113.1'],
            ['224.0.0.1'],
            ['255.255.255.255'],
        ];
    }

    public function testMixedResolutionFailsClosed(): void
    {
        $resolver = $this->resolver([
            ['ip' => '8.8.8.8'],
            ['ip' => '10.0.0.1'],
        ]);

        try {
            $resolver->resolvePublicIpv4(
                'www.alphavantage.co'
            );

            self::fail(
                'Expected mixed resolution rejection.'
            );
        } catch (
            MarketFeedTransportException $exception
        ) {
            self::assertSame(
                MarketFeedTransportException::
                    NON_PUBLIC_PROVIDER_ADDRESS,
                $exception->reasonCode()
            );
        }
    }

    public function testEmptyResolutionFails(): void
    {
        $resolver = $this->resolver([]);

        try {
            $resolver->resolvePublicIpv4(
                'www.alphavantage.co'
            );

            self::fail(
                'Expected DNS failure.'
            );
        } catch (
            MarketFeedTransportException $exception
        ) {
            self::assertSame(
                MarketFeedTransportException::
                    DNS_RESOLUTION_FAILED,
                $exception->reasonCode()
            );
        }
    }

    public function testInvalidHostnameFailsBeforeLookup(): void
    {
        $resolver = $this->resolver([
            ['ip' => '8.8.8.8'],
        ]);

        $this->expectException(
            InvalidArgumentException::class
        );

        $resolver->resolvePublicIpv4(
            '127.0.0.1'
        );
    }

    private function resolver(
        array $records
    ): SystemPublicIpv4Resolver {
        return new SystemPublicIpv4Resolver(
            Closure::fromCallable(
                static fn (
                    string $hostname
                ): array => $records
            )
        );
    }
}
