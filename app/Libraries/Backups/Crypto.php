<?php
namespace App\Libraries\Backups;

class Crypto
{
    public static function encrypt(string $plaintext): array
    {
        $key = self::key();
        $iv  = random_bytes(12);
        $tag = '';
        $ct  = openssl_encrypt($plaintext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
        return ['iv'=>base64_encode($iv), 'tag'=>base64_encode($tag), 'data'=>base64_encode($ct)];
    }

    public static function decrypt(string $b64data, string $b64iv, string $b64tag): string
    {
        $key = self::key();
        return openssl_decrypt(base64_decode($b64data), 'aes-256-gcm', $key, OPENSSL_RAW_DATA, base64_decode($b64iv), base64_decode($b64tag)) ?: '';
    }

    private static function key(): string
    {
        $raw = getenv('BACKUP_KMS_KEY') ?: '';
        if (str_starts_with($raw, 'base64:')) {
            $raw = base64_decode(substr($raw, 7));
        }
        if (strlen($raw) !== 32) {
            throw new \RuntimeException('BACKUP_KMS_KEY must be 32 bytes');
        }
        return $raw;
    }
}
