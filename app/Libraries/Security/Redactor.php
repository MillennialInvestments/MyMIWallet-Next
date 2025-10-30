<?php
namespace App\Libraries\Security;

final class Redactor
{
    /** Mask email local part & domain: j***@e***.com */
    public static function email(string $email): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return self::truncate($email);
        [$local, $domain] = explode('@', $email, 2);
        $local = self::maskMiddle($local);
        $dparts = explode('.', $domain);
        $dparts[0] = self::maskMiddle($dparts[0]);
        return $local.'@'.implode('.', $dparts);
    }

    /** Keep first/last 3 chars */
    public static function addr(string $s): string { return self::maskMiddle($s, 3, 3); }
    public static function phone(string $s): string
    {
        $digits = preg_replace('~\D+~', '', $s);
        if (strlen($digits) < 7) return self::truncate($s);
        return substr($digits,0,3) . '-***-'. substr($digits,-4);
    }

    /** Generic truncate for unexpected input */
    public static function truncate(string $s, int $max=64): string
    {
        return mb_strlen($s) > $max ? mb_substr($s, 0, $max).'…' : $s;
    }

    /** Mask middle portion of a string */
    private static function maskMiddle(string $s, int $keepStart=1, int $keepEnd=1): string
    {
        $len = mb_strlen($s);
        if ($len <= $keepStart + $keepEnd) return str_repeat('*', $len);
        return mb_substr($s, 0, $keepStart) . str_repeat('*', $len - $keepStart - $keepEnd) . mb_substr($s, -$keepEnd);
    }

    /** Quick JSON-safe meta redaction */
    public static function meta(array $meta): array
    {
        $out = [];
        foreach ($meta as $k=>$v) {
            if ($v === null) { $out[$k] = null; continue; }
            if (!is_scalar($v)) { $out[$k] = $v; continue; }
            $ks = strtolower((string)$k);
            $sv = (string)$v;
            if (str_contains($ks,'email')) $out[$k] = self::email($sv);
            elseif (str_contains($ks,'phone')) $out[$k] = self::phone($sv);
            elseif (str_contains($ks,'address') || str_contains($ks,'wallet')) $out[$k] = self::addr($sv);
            elseif (str_contains($ks,'token') || str_contains($ks,'secret') || str_contains($ks,'key')) $out[$k] = '***';
            else $out[$k] = self::truncate($sv, 160);
        }
        return $out;
    }

    /** Keyed, consistent hash (for searchable digests) */
    public static function kHash(string $plaintext): string
    {
        $env = getenv('MYMI_PII_HASH_KEY');
        $key = str_starts_with($env,'base64:') ? base64_decode(substr($env,7)) : (string)$env;
        return hash_hmac('sha256', $plaintext, $key);
    }
}
