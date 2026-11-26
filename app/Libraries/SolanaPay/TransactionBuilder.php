<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use App\Libraries\SecureTransfer\Base58;
use InvalidArgumentException;

/**
 * Builds unsigned Solana (legacy-format) transactions in PHP so a wallet can
 * sign what the server built. Checked against @solana/web3.js: its
 * Message.from() decodes these bytes to the same instructions, flags, payer
 * and blockhash as a transaction it built itself.
 * Only the instructions checkout needs: compute budget, system transfer, SPL
 * token transferChecked and memo.
 *
 * An instruction is ['program' => base58, 'keys' => [[pubkey, isSigner, isWritable], ...], 'data' => bytes].
 */
final class TransactionBuilder
{
    public const SYSTEM_PROGRAM = '11111111111111111111111111111111';
    public const TOKEN_PROGRAM = 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA';
    public const COMPUTE_BUDGET_PROGRAM = 'ComputeBudget111111111111111111111111111111';
    public const MEMO_PROGRAM = 'MemoSq4gqABAXKb96qnH8TysNcWxMyWCqXgDLGmfcHr';

    public static function computeUnitLimit(int $units): array
    {
        return ['program' => self::COMPUTE_BUDGET_PROGRAM, 'keys' => [], 'data' => chr(2) . pack('V', $units)];
    }

    public static function computeUnitPrice(int $microLamports): array
    {
        return ['program' => self::COMPUTE_BUDGET_PROGRAM, 'keys' => [], 'data' => chr(3) . self::u64($microLamports)];
    }

    /** @param list<string> $extraReadonly extra read-only keys, e.g. a Solana Pay reference */
    public static function systemTransfer(string $from, string $to, int $lamports, array $extraReadonly = []): array
    {
        $keys = [[$from, true, true], [$to, false, true]];
        foreach ($extraReadonly as $k) {
            $keys[] = [$k, false, false];
        }
        return ['program' => self::SYSTEM_PROGRAM, 'keys' => $keys, 'data' => pack('V', 2) . self::u64($lamports)];
    }

    /** @param list<string> $extraReadonly extra read-only keys, e.g. a Solana Pay reference */
    public static function transferChecked(string $source, string $mint, string $destination, string $owner, int $amount, int $decimals, array $extraReadonly = []): array
    {
        $keys = [[$source, false, true], [$mint, false, false], [$destination, false, true], [$owner, true, false]];
        foreach ($extraReadonly as $k) {
            $keys[] = [$k, false, false];
        }
        return ['program' => self::TOKEN_PROGRAM, 'keys' => $keys, 'data' => chr(12) . self::u64($amount) . chr($decimals)];
    }

    public static function memo(string $text): array
    {
        return ['program' => self::MEMO_PROGRAM, 'keys' => [], 'data' => $text];
    }

    /**
     * The message bytes the fee payer signs.
     *
     * @param list<array{program: string, keys: list<array{0: string, 1: bool, 2: bool}>, data: string}> $instructions
     */
    public static function compileMessage(string $feePayer, string $recentBlockhash, array $instructions): string
    {
        // Insertion order (payer, then each program id followed by its keys),
        // flags merged, then grouped signer-writable, signer-readonly,
        // writable, readonly, as the runtime requires.
        $metas = [$feePayer => ['signer' => true, 'writable' => true]];
        $add = static function (string $key, bool $signer, bool $writable) use (&$metas): void {
            if (! isset($metas[$key])) {
                $metas[$key] = ['signer' => false, 'writable' => false];
            }
            $metas[$key]['signer'] = $metas[$key]['signer'] || $signer;
            $metas[$key]['writable'] = $metas[$key]['writable'] || $writable;
        };
        foreach ($instructions as $ix) {
            $add($ix['program'], false, false);
            foreach ($ix['keys'] as [$k, $s, $w]) {
                $add($k, (bool) $s, (bool) $w);
            }
        }

        $groups = [[], [], [], []];
        foreach ($metas as $key => $m) {
            $groups[($m['signer'] ? 0 : 2) + ($m['writable'] ? 0 : 1)][] = (string) $key;
        }
        $ordered = array_merge(...$groups);
        $index = array_flip($ordered);

        $out = chr(count($groups[0]) + count($groups[1])) . chr(count($groups[1])) . chr(count($groups[3]));
        $out .= self::compactU16(count($ordered));
        foreach ($ordered as $key) {
            $out .= self::key($key);
        }
        $out .= self::key($recentBlockhash);
        $out .= self::compactU16(count($instructions));
        foreach ($instructions as $ix) {
            $out .= chr($index[$ix['program']]);
            $out .= self::compactU16(count($ix['keys']));
            foreach ($ix['keys'] as [$k]) {
                $out .= chr($index[$k]);
            }
            $out .= self::compactU16(strlen($ix['data'])) . $ix['data'];
        }
        return $out;
    }

    /** A transaction with an empty signature slot for each required signer, base64. */
    public static function unsignedTransaction(string $message): string
    {
        $signers = ord($message[0]);
        return base64_encode(self::compactU16($signers) . str_repeat("\0", 64 * $signers) . $message);
    }

    public static function compactU16(int $n): string
    {
        $out = '';
        do {
            $byte = $n & 0x7f;
            $n >>= 7;
            $out .= chr($n > 0 ? $byte | 0x80 : $byte);
        } while ($n > 0);
        return $out;
    }

    private static function u64(int $n): string
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Amounts cannot be negative.');
        }
        return pack('P', $n);
    }

    private static function key(string $base58): string
    {
        $raw = Base58::decode($base58);
        if ($raw === null || strlen($raw) !== 32) {
            throw new InvalidArgumentException('Not a 32-byte Solana key: ' . $base58);
        }
        return $raw;
    }
}
