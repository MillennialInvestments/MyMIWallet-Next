<?php
// PATCH: simple AES-256-GCM helper
namespace App\Libraries\Security;

class Crypto
{
    private static function key(): string
    {
        $env = getenv('MYMI_KMS_KEY');
        if (strpos($env, 'base64:') === 0) {
            return base64_decode(substr($env, 7));
        }
        return $env ?: '';
    }

    public static function encrypt(string $plaintext): array
    {
        $key = self::key();
        $iv  = random_bytes(16);
        $cipher = 'aes-256-gcm';
        $tag = '';
        $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);
        return ['ciphertext' => $ciphertext, 'iv' => $iv, 'tag' => $tag];
    }

    public static function decrypt(string $ciphertext, string $iv, string $tag): string
    {
        $key = self::key();
        return openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag) ?: '';
    }
}
