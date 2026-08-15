<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed\Transport;

use Closure;
use InvalidArgumentException;
use Throwable;

final class SystemPublicIpv4Resolver implements PublicIpv4ResolverInterface
{
    private readonly Closure $lookup;

    public function __construct(
        ?Closure $lookup = null
    ) {
        $this->lookup = $lookup
            ?? static function (
                string $hostname
            ): array {
                $records = dns_get_record(
                    $hostname,
                    DNS_A
                );

                return is_array($records)
                    ? $records
                    : [];
            };
    }

    public function resolvePublicIpv4(
        string $hostname
    ): string {
        $hostname = strtolower(trim($hostname));

        if (
            $hostname === ''
            || filter_var(
                $hostname,
                FILTER_VALIDATE_IP
            ) !== false
            || filter_var(
                $hostname,
                FILTER_VALIDATE_DOMAIN,
                FILTER_FLAG_HOSTNAME
            ) === false
        ) {
            throw new InvalidArgumentException(
                'Hostname must be a valid domain name.'
            );
        }

        try {
            $records = ($this->lookup)(
                $hostname
            );
        } catch (Throwable $exception) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    DNS_RESOLUTION_FAILED,
                $exception
            );
        }

        if (
            ! is_array($records)
            || $records === []
        ) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    DNS_RESOLUTION_FAILED
            );
        }

        $addresses = [];

        foreach ($records as $record) {
            $address = is_array($record)
                && isset($record['ip'])
                && is_string($record['ip'])
                    ? trim($record['ip'])
                    : '';

            if (
                $address === ''
                || ! $this->isPublicIpv4(
                    $address
                )
            ) {
                throw new MarketFeedTransportException(
                    MarketFeedTransportException::
                        NON_PUBLIC_PROVIDER_ADDRESS
                );
            }

            $addresses[$address] = true;
        }

        if ($addresses === []) {
            throw new MarketFeedTransportException(
                MarketFeedTransportException::
                    DNS_RESOLUTION_FAILED
            );
        }

        $addresses = array_keys($addresses);

        sort($addresses, SORT_STRING);

        return $addresses[0];
    }

    private function isPublicIpv4(
        string $address
    ): bool {
        if (
            filter_var(
                $address,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_IPV4
                | FILTER_FLAG_NO_PRIV_RANGE
                | FILTER_FLAG_NO_RES_RANGE
            ) === false
        ) {
            return false;
        }

        foreach (
            [
                '100.64.0.0/10',
                '192.0.0.0/24',
                '192.0.2.0/24',
                '192.88.99.0/24',
                '198.18.0.0/15',
                '198.51.100.0/24',
                '203.0.113.0/24',
            ] as $cidr
        ) {
            if (
                $this->isInCidr(
                    $address,
                    $cidr
                )
            ) {
                return false;
            }
        }

        return true;
    }

    private function isInCidr(
        string $address,
        string $cidr
    ): bool {
        [$network, $prefix] = explode(
            '/',
            $cidr,
            2
        );

        $addressLong = ip2long($address);
        $networkLong = ip2long($network);

        if (
            $addressLong === false
            || $networkLong === false
        ) {
            return true;
        }

        $addressUnsigned = (int) sprintf(
            '%u',
            $addressLong
        );
        $networkUnsigned = (int) sprintf(
            '%u',
            $networkLong
        );

        $blockSize = 2 ** (
            32 - (int) $prefix
        );

        return intdiv(
            $addressUnsigned,
            $blockSize
        ) === intdiv(
            $networkUnsigned,
            $blockSize
        );
    }
}
