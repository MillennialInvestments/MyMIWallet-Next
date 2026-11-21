<?php

namespace App\Libraries\SecureTransfer;

/**
 * Bitcoin-alphabet Base58, as used for Solana wallet addresses.
 */
final class Base58
{
    private const ALPHABET = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public static function encode(string $bytes): string
    {
        if ($bytes === '') {
            return '';
        }
        $digits = [];
        $len = strlen($bytes);
        for ($i = 0; $i < $len; $i++) {
            $carry = ord($bytes[$i]);
            foreach ($digits as $k => $d) {
                $carry += $d << 8;
                $digits[$k] = $carry % 58;
                $carry = intdiv($carry, 58);
            }
            while ($carry > 0) {
                $digits[] = $carry % 58;
                $carry = intdiv($carry, 58);
            }
        }
        $out = '';
        for ($i = 0; $i < $len && $bytes[$i] === "\0"; $i++) {
            $out .= '1';
        }
        for ($k = count($digits) - 1; $k >= 0; $k--) {
            $out .= self::ALPHABET[$digits[$k]];
        }
        return $out;
    }

    /** Returns null for any character outside the alphabet. */
    public static function decode(string $text): ?string
    {
        if ($text === '' || strlen($text) > 128) {
            return null;
        }
        $bytes = []; // little-endian base-256 digits of the number
        $len = strlen($text);
        for ($i = 0; $i < $len; $i++) {
            $value = strpos(self::ALPHABET, $text[$i]);
            if ($value === false) {
                return null;
            }
            $carry = $value;
            foreach ($bytes as $k => $b) {
                $carry += $b * 58;
                $bytes[$k] = $carry & 0xff;
                $carry >>= 8;
            }
            while ($carry > 0) {
                $bytes[] = $carry & 0xff;
                $carry >>= 8;
            }
        }
        $out = str_repeat("\0", strspn($text, '1'));
        for ($k = count($bytes) - 1; $k >= 0; $k--) {
            $out .= chr($bytes[$k]);
        }
        return $out;
    }

    /** A Solana wallet address: Base58 of exactly 32 bytes (an Ed25519 public key). */
    public static function walletPublicKey(string $address): ?string
    {
        $raw = self::decode($address);
        return ($raw !== null && strlen($raw) === SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES) ? $raw : null;
    }
}
