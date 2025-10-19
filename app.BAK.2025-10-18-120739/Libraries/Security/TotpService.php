<?php
// PATCH: TOTP generator/validator
namespace App\Libraries\Security;

class TotpService
{
    public static function generateSecret(int $length = 20): string
    {
        return rtrim(strtr(base64_encode(random_bytes($length)), '+/', 'AB'), '=');
    }

    public static function otpauthUrl(string $issuer, string $account, string $secret): string
    {
        return sprintf('otpauth://totp/%s:%s?secret=%s&issuer=%s&digits=6&period=30&algorithm=SHA1',
            rawurlencode($issuer), rawurlencode($account), $secret, rawurlencode($issuer));
    }

    public static function verify(string $secret, string $code, int $window = 1): bool
    {
        $timeSlice = floor(time() / 30);
        for ($i = -$window; $i <= $window; $i++) {
            if (hash_equals(self::code($secret, $timeSlice + $i), $code)) {
                return true;
            }
        }
        return false;
    }

    public static function code(string $secret, int $timeSlice): string
    {
        $key = base64_decode(strtr($secret, 'AB', '+/'));
        $time = pack('N*', 0) . pack('N*', $timeSlice);
        $hm = hash_hmac('sha1', $time, $key, true);
        $offset = ord($hm[19]) & 0xf;
        $bin = ((ord($hm[$offset]) & 0x7f) << 24) |
               ((ord($hm[$offset + 1]) & 0xff) << 16) |
               ((ord($hm[$offset + 2]) & 0xff) << 8) |
               (ord($hm[$offset + 3]) & 0xff);
        return str_pad((string) ($bin % 1000000), 6, '0', STR_PAD_LEFT);
    }
}
