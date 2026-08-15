<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use InvalidArgumentException;

final class BoundedHttpResponse
{
    private readonly int $statusCode;
    private readonly array $headers;
    private readonly string $body;

    public function __construct(
        int $statusCode,
        array $headers,
        string $body
    ) {
        if (
            $statusCode < 100
            || $statusCode > 599
        ) {
            throw new InvalidArgumentException(
                'HTTP status code is outside allowed bounds.'
            );
        }

        $this->validateHeaders($headers);

        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function receivedByteCount(): int
    {
        return strlen($this->body);
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
}
