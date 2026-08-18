<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Provider;

use InvalidArgumentException;
use RuntimeException;
use Throwable;

final class AlphaVantageProviderException extends RuntimeException
{
    public const PROVIDER_DISABLED =
        'provider_disabled';
    public const LIVE_NETWORK_DISABLED =
        'live_network_disabled';
    public const MISSING_API_KEY =
        'missing_api_key';
    public const INVALID_PROVIDER_ENDPOINT =
        'invalid_provider_endpoint';
    public const RATE_LIMITED =
        'rate_limited';
    public const PROVIDER_ERROR =
        'provider_error';
    public const UPSTREAM_UNAVAILABLE =
        'upstream_unavailable';
    public const UNEXPECTED_HTTP_STATUS =
        'unexpected_http_status';
    public const EMPTY_RESPONSE =
        'empty_response';
    public const MALFORMED_PROVIDER_RESPONSE =
        'malformed_provider_response';

    private readonly string $reasonCode;

    public function __construct(
        string $reasonCode,
        ?Throwable $previous = null
    ) {
        $messages = [
            self::PROVIDER_DISABLED =>
                'Provider is disabled.',
            self::LIVE_NETWORK_DISABLED =>
                'Live network access is disabled.',
            self::MISSING_API_KEY =>
                'Provider credential is unavailable.',
            self::INVALID_PROVIDER_ENDPOINT =>
                'Provider endpoint is invalid.',
            self::RATE_LIMITED =>
                'Provider rate limit reached.',
            self::PROVIDER_ERROR =>
                'Provider reported an error.',
            self::UPSTREAM_UNAVAILABLE =>
                'Provider is unavailable.',
            self::UNEXPECTED_HTTP_STATUS =>
                'Provider returned an unexpected HTTP status.',
            self::EMPTY_RESPONSE =>
                'Provider returned an empty response.',
            self::MALFORMED_PROVIDER_RESPONSE =>
                'Provider response is malformed.',
        ];

        if (! isset($messages[$reasonCode])) {
            throw new InvalidArgumentException(
                'Unsupported provider reason code.'
            );
        }

        $this->reasonCode = $reasonCode;

        parent::__construct(
            $messages[$reasonCode],
            0,
            $previous
        );
    }

    public function reasonCode(): string
    {
        return $this->reasonCode;
    }
}
