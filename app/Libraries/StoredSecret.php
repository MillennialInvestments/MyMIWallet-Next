<?php

declare(strict_types=1);

namespace App\Libraries;

use CodeIgniter\Encryption\EncrypterInterface;

/**
 * SEC-KEYS-001: at-rest encryption for wallet secrets stored in the database
 * (for example bf_users.private_key). A stored value looks like
 * "enc:v1:<base64 ciphertext>". Plain values are legacy and must be migrated
 * with `php spark security:encrypt-legacy-keys --apply`.
 */
final class StoredSecret
{
    public const PREFIX = 'enc:v1:';

    public static function isEncrypted(?string $value): bool
    {
        return is_string($value) && str_starts_with($value, self::PREFIX);
    }

    /** Encrypts a secret for storage. Empty stays null; an already encrypted value is returned as is. */
    public static function seal(?string $secret, ?EncrypterInterface $encrypter = null): ?string
    {
        $secret = trim((string) $secret);
        if ($secret === '') {
            return null;
        }
        if (self::isEncrypted($secret)) {
            return $secret;
        }

        $encrypter ??= service('encrypter');

        return self::PREFIX . base64_encode($encrypter->encrypt($secret));
    }

    /** Decrypts a stored secret. A legacy plain value is returned unchanged so old rows still work. */
    public static function open(?string $stored, ?EncrypterInterface $encrypter = null): ?string
    {
        if ($stored === null || $stored === '') {
            return null;
        }
        if (! self::isEncrypted($stored)) {
            return $stored;
        }

        $encrypter ??= service('encrypter');
        $raw = base64_decode(substr($stored, strlen(self::PREFIX)), true);
        if ($raw === false) {
            throw new \RuntimeException('Stored secret is not valid base64.');
        }

        return $encrypter->decrypt($raw);
    }
}
