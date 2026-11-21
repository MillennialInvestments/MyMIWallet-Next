<?php

namespace App\Libraries\SecureTransfer;

use InvalidArgumentException;

/**
 * MyMI Secure Transfer, protocol MST1.
 *
 * End-to-end encrypted file transfer between Solana wallets. The server stores
 * only ciphertext and a signed manifest; it never sees a file key or plaintext.
 *
 * Identity. A wallet (Solana Ed25519 key, Base58) authorizes a device "transfer
 * key" (X25519) by signing a binding statement that carries a server nonce. The
 * wallet's own secret key is never used for encryption, because browser wallets
 * only sign: they cannot decrypt.
 *
 * File. A random 32-byte file key K encrypts the file in 64 KiB chunks with
 * XSalsa20-Poly1305 (crypto_secretbox), nonce = 16 random bytes || uint64 BE chunk
 * index. The file name and type are sealed the same way into "meta". The chunk
 * count and the SHA-256 of the whole ciphertext are in the signed manifest, so a
 * reordered, truncated or swapped file fails.
 *
 * Recipients. K is wrapped for each recipient's transfer key with crypto_box
 * (X25519 + XSalsa20-Poly1305) from a fresh ephemeral key pair.
 *
 * Signature. The sender's wallet signs the text "MyMI Secure Transfer manifest v1"
 * plus the SHA-256 of the canonical manifest JSON. A wallet shows this text to its
 * owner before signing.
 *
 * Every primitive is in both PHP libsodium and tweetnacl-js, so browser and server
 * produce the same bytes. The seal/open helpers here are the reference client.
 */
final class TransferCrypto
{
    public const VERSION = 1;
    public const CHUNK_BYTES = 65536;
    public const MANIFEST_PREFIX = "MyMI Secure Transfer manifest v1\nsha256: ";
    public const BINDING_TITLE = 'MyMI Secure Transfer key binding';

    /** Canonical JSON: keys sorted at every level, no whitespace, no escaped slashes or unicode. */
    public static function canonicalJson(array $value): string
    {
        $sort = static function ($v) use (&$sort) {
            if (is_array($v)) {
                if (array_is_list($v)) {
                    return array_map($sort, $v);
                }
                ksort($v, SORT_STRING);
                return array_map($sort, $v);
            }
            return $v;
        };
        $json = json_encode($sort($value), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
        return $json;
    }

    public static function manifestDigest(array $manifest): string
    {
        return hash('sha256', self::canonicalJson($manifest));
    }

    /** The exact UTF-8 text the sender's wallet signs. */
    public static function manifestMessage(array $manifest): string
    {
        return self::MANIFEST_PREFIX . self::manifestDigest($manifest);
    }

    /** The exact UTF-8 text a wallet signs to authorize a device transfer key. */
    public static function bindingMessage(string $domain, string $wallet, string $transferKeyB64, string $nonce, int $issuedAt): string
    {
        return self::BINDING_TITLE . "\n"
            . "version: 1\n"
            . "domain: {$domain}\n"
            . "wallet: {$wallet}\n"
            . "transfer_key: {$transferKeyB64}\n"
            . "nonce: {$nonce}\n"
            . "issued_at: {$issuedAt}";
    }

    public static function verifyWalletSignature(string $wallet, string $message, string $signatureB64): bool
    {
        $pk = Base58::walletPublicKey($wallet);
        $sig = self::b64decode($signatureB64);
        if ($pk === null || $sig === null || strlen($sig) !== SODIUM_CRYPTO_SIGN_BYTES) {
            return false;
        }
        try {
            return sodium_crypto_sign_verify_detached($sig, $message, $pk);
        } catch (\SodiumException) {
            return false;
        }
    }

    public static function b64(string $bytes): string
    {
        return base64_encode($bytes);
    }

    public static function b64decode(string $text): ?string
    {
        $raw = base64_decode($text, true);
        return $raw === false ? null : $raw;
    }

    /** A transfer key is a base64 X25519 public key of exactly 32 bytes. */
    public static function isTransferKey(string $b64): bool
    {
        $raw = self::b64decode($b64);
        return $raw !== null && strlen($raw) === SODIUM_CRYPTO_BOX_PUBLICKEYBYTES && $raw !== str_repeat("\0", 32);
    }

    // ---- reference client (the browser does the same in JavaScript) --------

    /**
     * Encrypt a file for recipients. Returns [ciphertext, unsigned manifest].
     *
     * @param array<int, array{wallet: string, transfer_key: string}> $recipients
     */
    public static function seal(string $plaintext, string $name, string $mime, string $senderWallet, string $senderKeyB64, array $recipients, int $expiresAt, ?int $now = null): array
    {
        if ($recipients === []) {
            throw new InvalidArgumentException('recipients_required');
        }
        $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
        $base = random_bytes(16);
        $ciphertext = '';
        $chunks = 0;
        $length = strlen($plaintext);
        for ($offset = 0; $offset < $length || $chunks === 0; $offset += self::CHUNK_BYTES) {
            $ciphertext .= sodium_crypto_secretbox(substr($plaintext, $offset, self::CHUNK_BYTES), self::chunkNonce($base, $chunks), $key);
            $chunks++;
        }
        $metaNonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $meta = sodium_crypto_secretbox(self::canonicalJson(['bytes' => $length, 'mime' => $mime, 'name' => $name]), $metaNonce, $key);

        $wrapped = [];
        foreach ($recipients as $r) {
            $wrapped[] = ['wallet' => $r['wallet'], 'transfer_key' => $r['transfer_key']] + self::wrapKey($key, $r['transfer_key']);
        }
        sodium_memzero($key);
        $now ??= time();
        $manifest = [
            'v' => self::VERSION,
            'transfer_id' => bin2hex(random_bytes(16)),
            'sender_wallet' => $senderWallet,
            'sender_key' => $senderKeyB64,
            'recipients' => $wrapped,
            'chunk_bytes' => self::CHUNK_BYTES,
            'chunks' => $chunks,
            'chunk_nonce_base' => self::b64($base),
            'ciphertext_bytes' => strlen($ciphertext),
            'ciphertext_sha256' => hash('sha256', $ciphertext),
            'meta_nonce' => self::b64($metaNonce),
            'meta' => self::b64($meta),
            'created_at' => $now,
            'expires_at' => $expiresAt,
        ];
        return [$ciphertext, $manifest];
    }

    /** Decrypt with the recipient's transfer key pair. Returns [plaintext, meta] or throws. */
    public static function open(string $ciphertext, array $manifest, string $recipientWallet, string $recipientKeyPair): array
    {
        if (!hash_equals((string) $manifest['ciphertext_sha256'], hash('sha256', $ciphertext))) {
            throw new InvalidArgumentException('ciphertext_hash_mismatch');
        }
        $entry = null;
        $myKey = self::b64(sodium_crypto_box_publickey($recipientKeyPair));
        foreach ($manifest['recipients'] as $r) {
            if ($r['wallet'] === $recipientWallet && ($entry === null || $r['transfer_key'] === $myKey)) {
                $entry = $r;
            }
        }
        if ($entry === null) {
            throw new InvalidArgumentException('not_a_recipient');
        }
        $key = sodium_crypto_box_open(
            self::b64decode($entry['box']) ?? '',
            self::b64decode($entry['nonce']) ?? '',
            sodium_crypto_box_keypair_from_secretkey_and_publickey(sodium_crypto_box_secretkey($recipientKeyPair), self::b64decode($entry['epk']) ?? '')
        );
        if ($key === false) {
            throw new InvalidArgumentException('key_unwrap_failed');
        }
        $base = self::b64decode($manifest['chunk_nonce_base']) ?? '';
        $step = (int) $manifest['chunk_bytes'] + SODIUM_CRYPTO_SECRETBOX_MACBYTES;
        $plain = '';
        for ($i = 0; $i < (int) $manifest['chunks']; $i++) {
            $part = sodium_crypto_secretbox_open(substr($ciphertext, $i * $step, $step), self::chunkNonce($base, $i), $key);
            if ($part === false) {
                throw new InvalidArgumentException('chunk_auth_failed');
            }
            $plain .= $part;
        }
        if (strlen($ciphertext) !== (int) $manifest['ciphertext_bytes']) {
            throw new InvalidArgumentException('ciphertext_length_mismatch');
        }
        $meta = sodium_crypto_secretbox_open(self::b64decode($manifest['meta']) ?? '', self::b64decode($manifest['meta_nonce']) ?? '', $key);
        sodium_memzero($key);
        if ($meta === false) {
            throw new InvalidArgumentException('meta_auth_failed');
        }
        return [$plain, json_decode($meta, true)];
    }

    public static function chunkNonce(string $base, int $index): string
    {
        return $base . pack('J', $index);
    }

    /** @return array{epk: string, nonce: string, box: string} */
    private static function wrapKey(string $key, string $recipientKeyB64): array
    {
        $recipient = self::b64decode($recipientKeyB64);
        if ($recipient === null || strlen($recipient) !== SODIUM_CRYPTO_BOX_PUBLICKEYBYTES) {
            throw new InvalidArgumentException('invalid_recipient_key');
        }
        $ephemeral = sodium_crypto_box_keypair();
        $nonce = random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES);
        $box = sodium_crypto_box($key, $nonce, sodium_crypto_box_keypair_from_secretkey_and_publickey(sodium_crypto_box_secretkey($ephemeral), $recipient));
        $epk = sodium_crypto_box_publickey($ephemeral);
        sodium_memzero($ephemeral);
        return ['epk' => self::b64($epk), 'nonce' => self::b64($nonce), 'box' => self::b64($box)];
    }
}
