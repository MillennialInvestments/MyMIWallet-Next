<?php

namespace App\Libraries\Security;

/**
 * RFC 6238 TOTP (SHA-1, 6 digits, 30 s) with RFC 4648 base32 secrets, which is
 * what Google Authenticator, 1Password, Authy and similar apps expect.
 *
 * Secrets created by the earlier implementation (base64 with "+/" mapped to "AB")
 * are still accepted by verify() so no enrolled user is locked out.
 */
class TotpService
{
    private const BASE32 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

    public static function generateSecret(int $bytes = 20): string
    {
        return self::base32Encode(random_bytes($bytes));
    }

    public static function otpauthUrl(string $issuer, string $account, string $secret): string
    {
        return sprintf(
            'otpauth://totp/%s:%s?secret=%s&issuer=%s&digits=6&period=30&algorithm=SHA1',
            rawurlencode($issuer),
            rawurlencode($account),
            $secret,
            rawurlencode($issuer)
        );
    }

    public static function verify(string $secret, string $code, int $window = 1, ?int $now = null): bool
    {
        return self::matchingTimeSlice($secret, $code, $window, $now) !== null;
    }

    /**
     * Returns the matching time slice (for replay protection) or null.
     */
    public static function matchingTimeSlice(string $secret, string $code, int $window = 1, ?int $now = null): ?int
    {
        $code = trim($code);
        if (! preg_match('/^\d{6}$/', $code)) {
            return null;
        }

        $key = self::decodeSecret($secret);
        if ($key === '') {
            return null;
        }

        $timeSlice = intdiv($now ?? time(), 30);
        for ($i = -$window; $i <= $window; $i++) {
            if (hash_equals(self::codeForKey($key, $timeSlice + $i), $code)) {
                return $timeSlice + $i;
            }
        }

        return null;
    }

    public static function code(string $secret, int $timeSlice): string
    {
        return self::codeForKey(self::decodeSecret($secret), $timeSlice);
    }

    public static function base32Encode(string $data): string
    {
        $bits = '';
        foreach (str_split($data) as $char) {
            $bits .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
        }
        $out = '';
        foreach (str_split($bits, 5) as $chunk) {
            $out .= self::BASE32[bindec(str_pad($chunk, 5, '0', STR_PAD_RIGHT))];
        }

        return $out;
    }

    public static function base32Decode(string $secret): ?string
    {
        $secret = strtoupper(str_replace([' ', '-', '='], '', $secret));
        if ($secret === '' || strspn($secret, self::BASE32) !== strlen($secret)) {
            return null;
        }
        $bits = '';
        foreach (str_split($secret) as $char) {
            $bits .= str_pad(decbin(strpos(self::BASE32, $char)), 5, '0', STR_PAD_LEFT);
        }
        $out = '';
        foreach (str_split($bits, 8) as $byte) {
            if (strlen($byte) === 8) {
                $out .= chr(bindec($byte));
            }
        }

        return $out;
    }

    private static function decodeSecret(string $secret): string
    {
        $key = self::base32Decode($secret);
        if ($key !== null && $key !== '') {
            return $key;
        }

        // Legacy secrets: base64 with "+/" replaced by "AB".
        $legacy = base64_decode(strtr($secret, 'AB', '+/'), true);

        return $legacy === false ? '' : $legacy;
    }

    private static function codeForKey(string $key, int $timeSlice): string
    {
        $time   = pack('N*', 0) . pack('N*', $timeSlice);
        $hm     = hash_hmac('sha1', $time, $key, true);
        $offset = ord($hm[19]) & 0xf;
        $bin    = ((ord($hm[$offset]) & 0x7f) << 24)
            | ((ord($hm[$offset + 1]) & 0xff) << 16)
            | ((ord($hm[$offset + 2]) & 0xff) << 8)
            | (ord($hm[$offset + 3]) & 0xff);

        return str_pad((string) ($bin % 1000000), 6, '0', STR_PAD_LEFT);
    }
}
