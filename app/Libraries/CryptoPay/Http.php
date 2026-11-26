<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

/** The HTTP calls crypto checkout makes. Fakeable in tests. */
interface Http
{
    /** Decoded JSON body of a POST, or null on any network/HTTP/JSON failure. */
    public function postJson(string $url, array $body): ?array;

    /** Raw body of a GET with status 200, or null on any failure. */
    public function get(string $url): ?string;
}
