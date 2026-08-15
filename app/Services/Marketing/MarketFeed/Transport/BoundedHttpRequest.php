<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use InvalidArgumentException;

final class BoundedHttpRequest
{
    private readonly string $host;
    private readonly string $path;
    private readonly array $queryParameters;
    private readonly array $headers;
    private readonly int $connectTimeoutMs;
    private readonly int $timeoutMs;
    private readonly int $maxResponseBytes;
    private readonly string $pinnedIpv4Address;

    public function __construct(
        string $host,
        string $path,
        array $queryParameters,
        array $headers,
        int $connectTimeoutMs,
        int $timeoutMs,
        int $maxResponseBytes,
        string $pinnedIpv4Address
    ) {
        $host = strtolower(trim($host));
        $path = trim($path);

        $this->validateHost($host);
        $this->validatePath($path);
        $this->validateQueryParameters($queryParameters);
        $this->validateHeaders($headers);
        $this->validateConnectTimeout($connectTimeoutMs);
        $this->validateTimeout(
            $timeoutMs,
            $connectTimeoutMs
        );
        $this->validateMaxResponseBytes(
            $maxResponseBytes
        );
        $this->validatePinnedIpv4Address(
            $pinnedIpv4Address
        );

        $this->host = $host;
        $this->path = $path;
        $this->queryParameters = $queryParameters;
        $this->headers = $headers;
        $this->connectTimeoutMs = $connectTimeoutMs;
        $this->timeoutMs = $timeoutMs;
        $this->maxResponseBytes = $maxResponseBytes;
        $this->pinnedIpv4Address =
            $pinnedIpv4Address;
    }

    public function method(): string
    {
        return 'GET';
    }

    public function host(): string
    {
        return $this->host;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function queryParameters(): array
    {
        return $this->queryParameters;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function connectTimeoutMs(): int
    {
        return $this->connectTimeoutMs;
    }

    public function timeoutMs(): int
    {
        return $this->timeoutMs;
    }

    public function maxResponseBytes(): int
    {
        return $this->maxResponseBytes;
    }

    public function pinnedIpv4Address(): string
    {
        return $this->pinnedIpv4Address;
    }

    public function port(): int
    {
        return 443;
    }

    private function validateHost(
        string $host
    ): void {
        if ($host === '') {
            throw new InvalidArgumentException(
                'Host must be non-empty.'
            );
        }

        if (
            filter_var(
                $host,
                FILTER_VALIDATE_IP
            ) !== false
        ) {
            throw new InvalidArgumentException(
                'Host must be a domain name.'
            );
        }

        if (
            filter_var(
                $host,
                FILTER_VALIDATE_DOMAIN,
                FILTER_FLAG_HOSTNAME
            ) === false
        ) {
            throw new InvalidArgumentException(
                'Host must be a valid domain name.'
            );
        }
    }

    private function validatePath(
        string $path
    ): void {
        if ($path === '') {
            throw new InvalidArgumentException(
                'Path must be non-empty.'
            );
        }

        if ($path[0] !== '/') {
            throw new InvalidArgumentException(
                'Path must start with slash.'
            );
        }

        if (
            str_contains($path, '?')
            || str_contains($path, '#')
        ) {
            throw new InvalidArgumentException(
                'Path must not contain query or fragment.'
            );
        }
    }

    private function validateQueryParameters(
        array $queryParameters
    ): void {
        foreach (
            $queryParameters as $key => $value
        ) {
            if (
                ! is_string($key)
                || $key === ''
            ) {
                throw new InvalidArgumentException(
                    'Query parameter names must be non-empty strings.'
                );
            }

            if (! is_string($value)) {
                throw new InvalidArgumentException(
                    'Query parameter values must be strings.'
                );
            }
        }
    }

    private function validateHeaders(
        array $headers
    ): void {
        foreach ($headers as $name => $value) {
            if (
                ! is_string($name)
                || $name === ''
            ) {
                throw new InvalidArgumentException(
                    'Header names must be non-empty strings.'
                );
            }

            if (
                preg_match(
                    "/^[!#$%&'*+.^_`|~0-9A-Za-z-]+$/",
                    $name
                ) !== 1
            ) {
                throw new InvalidArgumentException(
                    'Header name is invalid.'
                );
            }

            if (! is_string($value)) {
                throw new InvalidArgumentException(
                    'Header values must be strings.'
                );
            }

            if (
                str_contains($value, "\r")
                || str_contains($value, "\n")
            ) {
                throw new InvalidArgumentException(
                    'Header value contains prohibited line break.'
                );
            }
        }
    }

    private function validateConnectTimeout(
        int $connectTimeoutMs
    ): void {
        if (
            $connectTimeoutMs < 250
            || $connectTimeoutMs > 10000
        ) {
            throw new InvalidArgumentException(
                'Connect timeout is outside allowed bounds.'
            );
        }
    }

    private function validateTimeout(
        int $timeoutMs,
        int $connectTimeoutMs
    ): void {
        if (
            $timeoutMs < 1000
            || $timeoutMs > 30000
        ) {
            throw new InvalidArgumentException(
                'Total timeout is outside allowed bounds.'
            );
        }

        if ($timeoutMs < $connectTimeoutMs) {
            throw new InvalidArgumentException(
                'Total timeout must not be less than connect timeout.'
            );
        }
    }

    private function validateMaxResponseBytes(
        int $maxResponseBytes
    ): void {
        if (
            $maxResponseBytes < 4096
            || $maxResponseBytes > 4194304
        ) {
            throw new InvalidArgumentException(
                'Maximum response size is outside allowed bounds.'
            );
        }
    }

    private function validatePinnedIpv4Address(
        string $pinnedIpv4Address
    ): void {
        if (
            filter_var(
                $pinnedIpv4Address,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_IPV4
            ) === false
        ) {
            throw new InvalidArgumentException(
                'Pinned address must be IPv4.'
            );
        }
    }
}
