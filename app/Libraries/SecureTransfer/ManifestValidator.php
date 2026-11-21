<?php

namespace App\Libraries\SecureTransfer;

use Config\SecureTransfer as SecureTransferConfig;

/**
 * Structural, limit and signature checks on an MST1 manifest. Pure: no database.
 * Returns a list of fixed reason codes; an empty list means valid.
 */
final class ManifestValidator
{
    private const B64_FIELDS_24 = ['meta_nonce'];
    private const RECIPIENT_KEYS = ['box', 'epk', 'nonce', 'transfer_key', 'wallet'];
    private const REQUIRED = [
        'v', 'transfer_id', 'sender_wallet', 'sender_key', 'recipients', 'chunk_bytes', 'chunks',
        'chunk_nonce_base', 'ciphertext_bytes', 'ciphertext_sha256', 'meta_nonce', 'meta', 'created_at', 'expires_at',
    ];

    public function __construct(private SecureTransferConfig $config)
    {
    }

    /** @return list<string> */
    public function validate(array $manifest, string $signatureB64, ?int $now = null): array
    {
        $now ??= time();
        $errors = [];
        foreach (self::REQUIRED as $field) {
            if (!array_key_exists($field, $manifest)) {
                $errors[] = "missing_{$field}";
            }
        }
        if ($errors !== []) {
            return $errors;
        }
        $extra = array_diff(array_keys($manifest), self::REQUIRED);
        if ($extra !== []) {
            $errors[] = 'unknown_fields';
        }
        if ($manifest['v'] !== TransferCrypto::VERSION) {
            $errors[] = 'unsupported_version';
        }
        if (!is_string($manifest['transfer_id']) || !preg_match('/^[0-9a-f]{32}$/', $manifest['transfer_id'])) {
            $errors[] = 'invalid_transfer_id';
        }
        if (!is_string($manifest['sender_wallet']) || Base58::walletPublicKey($manifest['sender_wallet']) === null) {
            $errors[] = 'invalid_sender_wallet';
        }
        if (!is_string($manifest['sender_key']) || !TransferCrypto::isTransferKey($manifest['sender_key'])) {
            $errors[] = 'invalid_sender_key';
        }
        if ($manifest['chunk_bytes'] !== TransferCrypto::CHUNK_BYTES) {
            $errors[] = 'invalid_chunk_bytes';
        }
        $bytes = $manifest['ciphertext_bytes'];
        $chunks = $manifest['chunks'];
        if (!is_int($bytes) || $bytes < SODIUM_CRYPTO_SECRETBOX_MACBYTES || $bytes > $this->config->maxBytes) {
            $errors[] = 'ciphertext_size_out_of_range';
        } elseif (!is_int($chunks) || !self::chunkCountMatches($bytes, $chunks)) {
            $errors[] = 'chunk_count_mismatch';
        }
        if (!is_string($manifest['ciphertext_sha256']) || !preg_match('/^[0-9a-f]{64}$/', $manifest['ciphertext_sha256'])) {
            $errors[] = 'invalid_ciphertext_sha256';
        }
        $base = is_string($manifest['chunk_nonce_base']) ? TransferCrypto::b64decode($manifest['chunk_nonce_base']) : null;
        if ($base === null || strlen($base) !== 16) {
            $errors[] = 'invalid_chunk_nonce_base';
        }
        foreach (self::B64_FIELDS_24 as $field) {
            $raw = is_string($manifest[$field]) ? TransferCrypto::b64decode($manifest[$field]) : null;
            if ($raw === null || strlen($raw) !== SODIUM_CRYPTO_SECRETBOX_NONCEBYTES) {
                $errors[] = "invalid_{$field}";
            }
        }
        $meta = is_string($manifest['meta']) ? TransferCrypto::b64decode($manifest['meta']) : null;
        if ($meta === null || strlen($meta) < SODIUM_CRYPTO_SECRETBOX_MACBYTES || strlen($meta) > 4096) {
            $errors[] = 'invalid_meta';
        }
        if (!is_int($manifest['created_at']) || abs($manifest['created_at'] - $now) > 900) {
            $errors[] = 'created_at_out_of_window';
        }
        if (!is_int($manifest['expires_at']) || $manifest['expires_at'] <= $now || $manifest['expires_at'] > $now + $this->config->maxDays * 86400) {
            $errors[] = 'expires_at_out_of_range';
        }
        $errors = array_merge($errors, $this->validateRecipients($manifest['recipients']));
        if ($errors === [] && !TransferCrypto::verifyWalletSignature($manifest['sender_wallet'], TransferCrypto::manifestMessage($manifest), $signatureB64)) {
            $errors[] = 'bad_sender_signature';
        }
        return array_values(array_unique($errors));
    }

    /** bytes = plaintext + 16 per chunk, and chunks = ceil(plaintext / 64 KiB), at least 1. */
    public static function chunkCountMatches(int $bytes, int $chunks): bool
    {
        if ($chunks < 1) {
            return false;
        }
        $plain = $bytes - $chunks * SODIUM_CRYPTO_SECRETBOX_MACBYTES;
        return $plain >= 0 && $chunks === max(1, intdiv($plain + TransferCrypto::CHUNK_BYTES - 1, TransferCrypto::CHUNK_BYTES));
    }

    private static function sortedKeys(array $a): array
    {
        $k = array_map('strval', array_keys($a));
        sort($k, SORT_STRING);
        return $k;
    }

    /** @return list<string> */
    private function validateRecipients($recipients): array
    {
        if (!is_array($recipients) || !array_is_list($recipients) || $recipients === []) {
            return ['recipients_required'];
        }
        // One entry per (wallet, device key): a wallet with several linked devices gets one wrap per device.
        if (count($recipients) > $this->config->maxRecipients * $this->config->maxKeysPerWallet) {
            return ['too_many_recipients'];
        }
        $seen = [];
        $wallets = [];
        foreach ($recipients as $r) {
            if (!is_array($r) || self::sortedKeys($r) !== self::RECIPIENT_KEYS) {
                return ['invalid_recipient_entry'];
            }
            if (!is_string($r['wallet']) || Base58::walletPublicKey($r['wallet']) === null) {
                return ['invalid_recipient_wallet'];
            }
            foreach (['transfer_key', 'epk'] as $k) {
                if (!is_string($r[$k]) || !TransferCrypto::isTransferKey($r[$k])) {
                    return ["invalid_recipient_{$k}"];
                }
            }
            $pair = $r['wallet'] . '|' . $r['transfer_key'];
            if (isset($seen[$pair])) {
                return ['duplicate_recipient'];
            }
            $seen[$pair] = true;
            $wallets[$r['wallet']] = true;
            if (count($wallets) > $this->config->maxRecipients) {
                return ['too_many_recipients'];
            }
            $nonce = is_string($r['nonce']) ? TransferCrypto::b64decode($r['nonce']) : null;
            $box = is_string($r['box']) ? TransferCrypto::b64decode($r['box']) : null;
            if ($nonce === null || strlen($nonce) !== SODIUM_CRYPTO_BOX_NONCEBYTES || $box === null
                || strlen($box) !== SODIUM_CRYPTO_SECRETBOX_KEYBYTES + SODIUM_CRYPTO_BOX_MACBYTES) {
                return ['invalid_recipient_wrap'];
            }
        }
        return [];
    }
}
