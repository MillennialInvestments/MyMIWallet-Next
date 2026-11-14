<?php

namespace App\Libraries;

/**
 * Display-safe versions of sensitive user columns. Pages and JS never get the
 * raw SSN or a stored wallet private key: an SSN shows only its last 4 digits,
 * and a private key is never sent to the browser at all.
 */
final class SensitiveField
{
    public static function maskSsn(?string $ssn): string
    {
        $digits = preg_replace('/\D/', '', (string) $ssn);

        return strlen($digits) === 9 ? '***-**-' . substr($digits, -4) : '';
    }

    public static function hidePrivateKey(?string $key): string
    {
        return '';
    }
}
