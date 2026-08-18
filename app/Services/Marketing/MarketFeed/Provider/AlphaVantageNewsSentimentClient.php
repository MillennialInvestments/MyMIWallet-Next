<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Provider;

use App\Services\Marketing\MarketFeed\AlphaVantageNewsSentimentAdapter;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpRequest;
use App\Services\Marketing\MarketFeed\Transport\BoundedHttpTransportInterface;
use App\Services\Marketing\MarketFeed\Transport\MarketFeedTransportException;
use App\Services\Marketing\MarketFeed\Transport\PublicIpv4ResolverInterface;
use Config\MarketingMarketFeed;
use Throwable;

final class AlphaVantageNewsSentimentClient
{
    private const HOST =
        'www.alphavantage.co';

    private const PATH =
        '/query';

    private const FUNCTION_NAME =
        'NEWS_SENTIMENT';

    public function __construct(
        private readonly MarketingMarketFeed $config,
        private readonly PublicIpv4ResolverInterface $resolver,
        private readonly BoundedHttpTransportInterface $transport,
        private readonly AlphaVantageNewsSentimentAdapter $adapter
    ) {
    }

    public function collect(): array
    {
        if (
            ! $this->config->enabled
            || ! $this->config
                ->alpha_vantage_enabled
        ) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    PROVIDER_DISABLED
            );
        }

        if (
            ! $this->config
                ->live_network_enabled
        ) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    LIVE_NETWORK_DISABLED
            );
        }

        $apiKey = trim(
            $this->config
                ->alpha_vantage_api_key
        );

        if ($apiKey === '') {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    MISSING_API_KEY
            );
        }

        $address = $this->resolver
            ->resolvePublicIpv4(
                self::HOST
            );

        $request = new BoundedHttpRequest(
            self::HOST,
            self::PATH,
            [
                'function' =>
                    self::FUNCTION_NAME,
                'apikey' => $apiKey,
            ],
            [
                'Accept' =>
                    'application/json',
            ],
            $this->config
                ->alpha_vantage_connect_timeout_ms,
            $this->config
                ->alpha_vantage_timeout_ms,
            $this->config
                ->alpha_vantage_max_response_bytes,
            $address
        );

        $response = $this->transport
            ->request($request);

        $status = $response->statusCode();

        if (
            $status >= 300
            && $status <= 399
        ) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    REDIRECT_REJECTED
            );
        }

        if ($status === 429) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    RATE_LIMITED
            );
        }

        if (
            $status >= 500
            && $status <= 599
        ) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    UPSTREAM_UNAVAILABLE
            );
        }

        if (
            $status < 200
            || $status >= 300
        ) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    UNEXPECTED_HTTP_STATUS
            );
        }

        $body = $response->body();

        if (trim($body) === '') {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    EMPTY_RESPONSE
            );
        }

        try {
            $decoded = json_decode(
                $body,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (Throwable $exception) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    MALFORMED_PROVIDER_RESPONSE,
                $exception
            );
        }

        if (! is_array($decoded)) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    MALFORMED_PROVIDER_RESPONSE
            );
        }

        $providerReason =
            $this->providerEnvelopeReason(
                $decoded
            );

        if ($providerReason !== null) {
            throw new AlphaVantageProviderException(
                $providerReason
            );
        }

        try {
            return $this->adapter->parse(
                $body
            );
        } catch (Throwable $exception) {
            throw new AlphaVantageProviderException(
                AlphaVantageProviderException::
                    MALFORMED_PROVIDER_RESPONSE,
                $exception
            );
        }
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function providerEnvelopeReason(
        array $payload
    ): ?string {
        if (
            array_key_exists(
                'Error Message',
                $payload
            )
        ) {
            return AlphaVantageProviderException::
                PROVIDER_ERROR;
        }

        foreach (
            ['Note', 'Information']
            as $field
        ) {
            if (! array_key_exists($field, $payload)) {
                continue;
            }

            $value = $payload[$field];

            $message = is_scalar($value)
                ? strtolower(
                    trim((string) $value)
                )
                : '';

            if (
                $message !== ''
                && (
                    str_contains(
                        $message,
                        'rate limit'
                    )
                    || str_contains(
                        $message,
                        'call frequency'
                    )
                    || str_contains(
                        $message,
                        'calls per'
                    )
                    || str_contains(
                        $message,
                        'requests per'
                    )
                )
            ) {
                return AlphaVantageProviderException::
                    RATE_LIMITED;
            }

            return AlphaVantageProviderException::
                PROVIDER_ERROR;
        }

        return null;
    }
}
