<?php

namespace App\Libraries;

use RuntimeException;

class CryptoHelper
{
    private const VERSION_XCHACHA20 = 1;

    public function encrypt(string $plaintext, int $version = self::VERSION_XCHACHA20): array
    {
        if ($plaintext === '') {
            return ['ciphertext' => '', 'nonce' => '', 'version' => $version];
        }

        $key = $this->getKeyForVersion($version);
        $nonce = random_bytes(SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES);

        $ciphertext = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
            $plaintext,
            '',
            $nonce,
            $key
        );

        return [
            'ciphertext' => base64_encode($ciphertext),
            'nonce'      => base64_encode($nonce),
            'version'    => $version,
        ];
    }

    public function decrypt(string $ciphertext, string $nonce, int $version = self::VERSION_XCHACHA20): string
    {
        if ($ciphertext === '') {
            return '';
        }

        $key = $this->getKeyForVersion($version);

        $plain = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt(
            base64_decode($ciphertext),
            '',
            base64_decode($nonce),
            $key
        );

        if ($plain === false) {
            throw new RuntimeException('Unable to decrypt value with the provided key and nonce.');
        }

        return $plain;
    }

    private function getKeyForVersion(int $version): string
    {
        $envKey = env('AI_CRYPTO_KEY');
        if (!$envKey) {
            throw new RuntimeException('AI_CRYPTO_KEY is not configured.');
        }

        $decoded = base64_decode($envKey, true);
        if ($decoded === false || strlen($decoded) !== SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES) {
            throw new RuntimeException('AI_CRYPTO_KEY must be base64-encoded and match the required length.');
        }

        if ($version !== self::VERSION_XCHACHA20) {
            throw new RuntimeException('Unsupported encryption_version: ' . $version);
        }

        return $decoded;
    }
}
