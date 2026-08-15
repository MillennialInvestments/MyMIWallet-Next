<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed\Transport;

use App\Services\Marketing\MarketFeed\Transport\CurlBoundedHttpTransport;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class CurlBoundedHttpTransportPolicyTest extends TestCase
{
    public function testTransportContainsRequiredSecurityPolicy(): void
    {
        $file = (
            new ReflectionClass(
                CurlBoundedHttpTransport::class
            )
        )->getFileName();

        self::assertNotFalse($file);

        $source = file_get_contents($file);

        self::assertIsString($source);

        foreach ([
            'CURLOPT_RESOLVE',
            'CURLOPT_SSL_VERIFYPEER => true',
            'CURLOPT_SSL_VERIFYHOST => 2',
            'CURLOPT_PROTOCOLS => CURLPROTO_HTTPS',
            'CURLOPT_FOLLOWLOCATION => false',
            "CURLOPT_PROXY => ''",
            "CURLOPT_NOPROXY => '*'",
            'CURLOPT_CONNECTTIMEOUT_MS',
            'CURLOPT_TIMEOUT_MS',
            'CURLOPT_WRITEFUNCTION',
            'CURLOPT_HEADERFUNCTION',
        ] as $required) {
            self::assertStringContainsString(
                $required,
                $source
            );
        }

        self::assertStringNotContainsString(
            'curl_error(',
            $source
        );
    }
}
