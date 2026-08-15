<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed\Provider;

use App\Services\Marketing\MarketFeed\AlphaVantageNewsSentimentAdapter;
use App\Services\Marketing\MarketFeed\Provider\AlphaVantageNewsSentimentClient;
use App\Services\Marketing\MarketFeed\Provider\AlphaVantageProviderException;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpRequest;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpResponse;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpTransportInterface;
use App\Services\Marketing\MarketFeed\Transport\PublicIpv4ResolverInterface;
use Config\MarketingMarketFeed;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class AlphaVantageNewsSentimentClientTest extends TestCase
{
    public function testFixedProviderContract(): void
    {
        $transport = new FakeTransport(
            new BoundedHttpResponse(
                200,
                [],
                '{"feed":[]}'
            )
        );

        $resolver = new FakeResolver();

        $client = new AlphaVantageNewsSentimentClient(
            $this->config(),
            $resolver,
            $transport,
            new AlphaVantageNewsSentimentAdapter()
        );

        self::assertSame(
            [],
            $client->collect()
        );

        self::assertSame(
            'www.alphavantage.co',
            $resolver->hostname
        );

        self::assertSame(
            'www.alphavantage.co',
            $transport->request?->host()
        );

        self::assertSame(
            '/query',
            $transport->request?->path()
        );

        self::assertSame(
            'NEWS_SENTIMENT',
            $transport->request
                ?->queryParameters()['function']
        );
    }

    /**
     * @dataProvider statusProvider
     */
    public function testStatusClassification(
        int $status,
        string $reason
    ): void {
        try {
            $this->client(
                new FakeTransport(
                    new BoundedHttpResponse(
                        $status,
                        [],
                        '{"feed":[]}'
                    )
                )
            )->collect();

            self::fail(
                'Expected provider failure.'
            );
        } catch (
            AlphaVantageProviderException $exception
        ) {
            self::assertSame(
                $reason,
                $exception->reasonCode()
            );
        }
    }

    public static function statusProvider(): array
    {
        return [
            [
                429,
                AlphaVantageProviderException::
                    RATE_LIMITED,
            ],
            [
                500,
                AlphaVantageProviderException::
                    UPSTREAM_UNAVAILABLE,
            ],
            [
                418,
                AlphaVantageProviderException::
                    UNEXPECTED_HTTP_STATUS,
            ],
        ];
    }

    public function testDisabledProviderStopsBeforeTransport(): void
    {
        $config = $this->config();
        $config->alpha_vantage_enabled =
            false;

        $transport = new FakeTransport(
            new BoundedHttpResponse(
                200,
                [],
                '{"feed":[]}'
            )
        );

        try {
            (
                new AlphaVantageNewsSentimentClient(
                    $config,
                    new FakeResolver(),
                    $transport,
                    new AlphaVantageNewsSentimentAdapter()
                )
            )->collect();

            self::fail(
                'Expected disabled provider.'
            );
        } catch (
            AlphaVantageProviderException $exception
        ) {
            self::assertSame(
                AlphaVantageProviderException::
                    PROVIDER_DISABLED,
                $exception->reasonCode()
            );

            self::assertSame(
                0,
                $transport->calls
            );
        }
    }

    public function testLiveNetworkGateStopsTransport(): void
    {
        $config = $this->config();
        $config->live_network_enabled =
            false;

        $transport = new FakeTransport(
            new BoundedHttpResponse(
                200,
                [],
                '{"feed":[]}'
            )
        );

        try {
            (
                new AlphaVantageNewsSentimentClient(
                    $config,
                    new FakeResolver(),
                    $transport,
                    new AlphaVantageNewsSentimentAdapter()
                )
            )->collect();

            self::fail(
                'Expected network gate.'
            );
        } catch (
            AlphaVantageProviderException $exception
        ) {
            self::assertSame(
                AlphaVantageProviderException::
                    LIVE_NETWORK_DISABLED,
                $exception->reasonCode()
            );

            self::assertSame(
                0,
                $transport->calls
            );
        }
    }

    public function testEmptyAndMalformedBodiesFail(): void
    {
        foreach (
            [
                [
                    '',
                    AlphaVantageProviderException::
                        EMPTY_RESPONSE,
                ],
                [
                    '{bad',
                    AlphaVantageProviderException::
                        MALFORMED_PROVIDER_RESPONSE,
                ],
            ] as [$body, $reason]
        ) {
            try {
                $this->client(
                    new FakeTransport(
                        new BoundedHttpResponse(
                            200,
                            [],
                            $body
                        )
                    )
                )->collect();

                self::fail(
                    'Expected body rejection.'
                );
            } catch (
                AlphaVantageProviderException $exception
            ) {
                self::assertSame(
                    $reason,
                    $exception->reasonCode()
                );
            }
        }
    }

    private function client(
        FakeTransport $transport
    ): AlphaVantageNewsSentimentClient {
        return new AlphaVantageNewsSentimentClient(
            $this->config(),
            new FakeResolver(),
            $transport,
            new AlphaVantageNewsSentimentAdapter()
        );
    }

    private function config(): MarketingMarketFeed
    {
        $reflection = new ReflectionClass(
            MarketingMarketFeed::class
        );

        /** @var MarketingMarketFeed $config */
        $config = $reflection
            ->newInstanceWithoutConstructor();

        $config->enabled = true;
        $config->live_network_enabled =
            true;
        $config->persist_enabled = false;
        $config->alpha_vantage_enabled =
            true;
        $config->alpha_vantage_api_key =
            'synthetic-key';
        $config
            ->alpha_vantage_connect_timeout_ms =
            3000;
        $config->alpha_vantage_timeout_ms =
            10000;
        $config
            ->alpha_vantage_max_response_bytes =
            1048576;
        $config
            ->alpha_vantage_retry_attempts =
            0;

        return $config;
    }
}

final class FakeResolver implements PublicIpv4ResolverInterface
{
    public ?string $hostname = null;

    public function resolvePublicIpv4(
        string $hostname
    ): string {
        $this->hostname = $hostname;

        return '8.8.8.8';
    }
}

final class FakeTransport implements BoundedHttpTransportInterface
{
    public ?BoundedHttpRequest $request =
        null;

    public int $calls = 0;

    public function __construct(
        private readonly BoundedHttpResponse $response
    ) {
    }

    public function request(
        BoundedHttpRequest $request
    ): BoundedHttpResponse {
        $this->calls++;
        $this->request = $request;

        return $this->response;
    }
}
