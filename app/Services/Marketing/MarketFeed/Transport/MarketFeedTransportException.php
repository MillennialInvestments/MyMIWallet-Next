<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use InvalidArgumentException;
use RuntimeException;
use Throwable;

final class MarketFeedTransportException extends RuntimeException
{
    public const INVALID_REQUEST = 'invalid_request';
    public const DNS_RESOLUTION_FAILED = 'dns_resolution_failed';
    public const NON_PUBLIC_PROVIDER_ADDRESS = 'non_public_provider_address';
    public const TRANSPORT_INITIALIZATION_FAILED = 'transport_initialization_failed';
    public const TRANSPORT_TIMEOUT = 'transport_timeout';
    public const RESPONSE_TOO_LARGE = 'response_too_large';
    public const REDIRECT_REJECTED = 'redirect_rejected';
    public const UNEXPECTED_TRANSPORT_FAILURE = 'unexpected_transport_failure';

    private readonly string $reasonCode;

    public function __construct(
        string $reasonCode,
        ?Throwable $previous = null
    ) {
        if (!in_array($reasonCode, [
            self::INVALID_REQUEST,
            self::DNS_RESOLUTION_FAILED,
            self::NON_PUBLIC_PROVIDER_ADDRESS,
            self::TRANSPORT_INITIALIZATION_FAILED,
            self::TRANSPORT_TIMEOUT,
            self::RESPONSE_TOO_LARGE,
            self::REDIRECT_REJECTED,
            self::UNEXPECTED_TRANSPORT_FAILURE,
        ], true)) {
            throw new InvalidArgumentException('Unsupported reason code');
        }

        $message = match ($reasonCode) {
            self::INVALID_REQUEST => 'Invalid request',
            self::DNS_RESOLUTION_FAILED => 'DNS resolution failed',
            self::NON_PUBLIC_PROVIDER_ADDRESS => 'Non-public provider address',
            self::TRANSPORT_INITIALIZATION_FAILED => 'Transport initialization failed',
            self::TRANSPORT_TIMEOUT => 'Transport timeout',
            self::RESPONSE_TOO_LARGE => 'Response too large',
            self::REDIRECT_REJECTED => 'Redirect rejected',
            self::UNEXPECTED_TRANSPORT_FAILURE => 'Unexpected transport failure',
        };

        parent::__construct($message, 0, $previous);
        $this->reasonCode = $reasonCode;
    }

    public function reasonCode(): string
    {
        return $this->reasonCode;
    }
}
