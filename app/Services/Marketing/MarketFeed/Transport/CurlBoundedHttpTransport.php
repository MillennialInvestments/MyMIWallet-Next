<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use Throwable;

final class CurlBoundedHttpTransport implements BoundedHttpTransportInterface
{
    private const MAX_HEADER_BYTES = 65536;

    public function request(
        BoundedHttpRequest $request
    ): BoundedHttpResponse {
        if (
            ! function_exists('curl_init')
            || ! defined('CURLOPT_PROTOCOLS')
            || ! defined('CURLPROTO_HTTPS')
        ) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    TRANSPORT_INITIALIZATION_FAILED
            );
        }

        $handle = curl_init();

        if ($handle === false) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    TRANSPORT_INITIALIZATION_FAILED
            );
        }

        $body = '';
        $headers = [];
        $headerBytes = 0;
        $tooLarge = false;

        $requestHeaders = [];

        foreach (
            $request->headers()
            as $name => $value
        ) {
            $requestHeaders[] =
                $name . ': ' . $value;
        }

        $options = [
            CURLOPT_URL =>
                $this->buildUrl($request),
            CURLOPT_PORT => 443,
            CURLOPT_HTTPGET => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => false,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_MAXREDIRS => 0,
            CURLOPT_CONNECTTIMEOUT_MS =>
                $request->connectTimeoutMs(),
            CURLOPT_TIMEOUT_MS =>
                $request->timeoutMs(),
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
            CURLOPT_NOSIGNAL => true,
            CURLOPT_PROXY => '',
            CURLOPT_NOPROXY => '*',
            CURLOPT_IPRESOLVE =>
                CURL_IPRESOLVE_V4,
            CURLOPT_RESOLVE => [
                $request->host()
                    . ':443:'
                    . $request->pinnedIpv4Address(),
            ],
            CURLOPT_HTTPHEADER =>
                $requestHeaders,
            CURLOPT_HEADERFUNCTION =>
                static function (
                    $handle,
                    string $line
                ) use (
                    &$headers,
                    &$headerBytes,
                    &$tooLarge
                ): int {
                    $length = strlen($line);

                    $headerBytes += $length;

                    if (
                        $headerBytes
                        > self::MAX_HEADER_BYTES
                    ) {
                        $tooLarge = true;

                        return 0;
                    }

                    $trimmed = trim($line);

                    if ($trimmed === '') {
                        return $length;
                    }

                    if (
                        str_starts_with(
                            $trimmed,
                            'HTTP/'
                        )
                    ) {
                        $headers = [];

                        return $length;
                    }

                    $separator = strpos(
                        $trimmed,
                        ':'
                    );

                    if ($separator === false) {
                        return $length;
                    }

                    $name = trim(
                        substr(
                            $trimmed,
                            0,
                            $separator
                        )
                    );

                    $value = trim(
                        substr(
                            $trimmed,
                            $separator + 1
                        )
                    );

                    if ($name !== '') {
                        $headers[$name] = isset(
                            $headers[$name]
                        )
                            ? $headers[$name]
                                . ', '
                                . $value
                            : $value;
                    }

                    return $length;
                },
            CURLOPT_WRITEFUNCTION =>
                static function (
                    $handle,
                    string $chunk
                ) use (
                    &$body,
                    &$tooLarge,
                    $request
                ): int {
                    $length = strlen($chunk);

                    if (
                        strlen($body) + $length
                        > $request
                            ->maxResponseBytes()
                    ) {
                        $tooLarge = true;

                        return 0;
                    }

                    $body .= $chunk;

                    return $length;
                },
        ];

        try {
            $configured = curl_setopt_array(
                $handle,
                $options
            );
        } catch (Throwable $exception) {
            curl_close($handle);

            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    TRANSPORT_INITIALIZATION_FAILED,
                $exception
            );
        }

        if (! $configured) {
            curl_close($handle);

            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    TRANSPORT_INITIALIZATION_FAILED
            );
        }

        $result = curl_exec($handle);
        $errno = curl_errno($handle);

        $statusCode = (int) curl_getinfo(
            $handle,
            CURLINFO_RESPONSE_CODE
        );

        curl_close($handle);

        if ($result === false) {
            if ($tooLarge) {
                throw new MarketFeedTransportException(
                    MarketFeedTransportException::
                        RESPONSE_TOO_LARGE
                );
            }

            if (
                $errno
                === CURLE_OPERATION_TIMEDOUT
            ) {
                throw new MarketFeedTransportException(
                    MarketFeedTransportException::
                        TRANSPORT_TIMEOUT
                );
            }

            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    UNEXPECTED_TRANSPORT_FAILURE
            );
        }

        if (
            $statusCode >= 300
            && $statusCode <= 399
        ) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    REDIRECT_REJECTED
            );
        }

        try {
            return new BoundedHttpResponse(
                $statusCode,
                $headers,
                $body
            );
        } catch (Throwable $exception) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    UNEXPECTED_TRANSPORT_FAILURE,
                $exception
            );
        }
    }

    private function buildUrl(
        BoundedHttpRequest $request
    ): string {
        $url = 'https://'
            . $request->host()
            . $request->path();

        $query = http_build_query(
            $request->queryParameters(),
            '',
            '&',
            PHP_QUERY_RFC3986
        );

        return $query === ''
            ? $url
            : $url . '?' . $query;
    }
}
