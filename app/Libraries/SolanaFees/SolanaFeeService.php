<?php

namespace App\Libraries\SolanaFees;

use App\Libraries\SecureTransfer\Base58;
use Config\SolanaFees as SolanaFeesConfig;

/**
 * Checks that a user paid a MyMI service fee in SOL before the service runs.
 *
 * The user pays from their own wallet to the treasury and gives MyMI the
 * transaction signature. The payment is accepted only when the confirmed
 * transaction succeeded, is recent, was signed by the expected wallet, and moved
 * at least the fee from that wallet to the treasury. Each signature pays for
 * one charge only.
 */
final class SolanaFeeService
{
    public function __construct(
        private SolanaFeesConfig $config,
        private SolanaRpc $rpc,
        private FeeReceiptStore $receipts,
        private ?\Closure $clock = null,
    ) {
    }

    private function now(): int
    {
        return $this->clock ? (int) ($this->clock)() : time();
    }

    public function lamports(string $kind): int
    {
        if (!in_array($kind, SolanaFeesConfig::KINDS, true) || Base58::walletPublicKey($this->config->treasury) === null) {
            return 0;
        }
        return (int) ($this->config->lamports[$kind] ?? 0);
    }

    public function required(string $kind): bool
    {
        return $this->lamports($kind) > 0;
    }

    /** What the page shows the payer. */
    public function quote(string $kind): array
    {
        $l = $this->lamports($kind);
        return ['kind' => $kind, 'required' => $l > 0, 'lamports' => $l, 'sol' => self::sol($l),
            'treasury' => $l > 0 ? $this->config->treasury : '', 'cluster' => $this->config->cluster];
    }

    public static function sol(int $lamports): string
    {
        return rtrim(rtrim(number_format($lamports / 1_000_000_000, 9, '.', ''), '0'), '.') ?: '0';
    }

    /** A pending receipt older than this is treated as an attempt that crashed. */
    public const STALE_PENDING_SECONDS = 900;

    /**
     * Reserve $signature as payment of $kind by $payerWallet for $reference (a
     * transfer id, payment id, ...). The receipt stays 'pending' until settle()
     * marks it spent (the charge completed) or released (it failed, so the same
     * user may retry with it). Only one request can hold a receipt at a time.
     */
    /**
     * @param callable(string): bool|null $completed Tells whether an earlier reference's charge actually
     *        finished (e.g. its transfer exists). A receipt left pending by a crash is reused only when
     *        this says it did not; without it, stale pending receipts are never reused.
     */
    public function claim(string $kind, int $userId, string $payerWallet, string $signature, string $reference, ?callable $completed = null): array
    {
        $fee = $this->lamports($kind);
        if ($fee === 0) {
            return ['ok' => true, 'charged' => false];
        }
        $raw = Base58::decode($signature);
        if ($raw === null || strlen($raw) !== 64) {
            return ['ok' => false, 'error' => 'fee_signature_invalid'];
        }
        $now = $this->now();
        $existing = $this->receipts->find($signature);
        if ($existing !== null) {
            $stale = ($existing['status'] ?? '') === 'pending' && (int) ($existing['updated_at'] ?? 0) < $now - self::STALE_PENDING_SECONDS;
            if ($stale && ($completed === null || $completed((string) $existing['reference']))) {
                // The crashed attempt may have finished its charge: never reuse; record it as spent when we know it was.
                if ($completed !== null) {
                    $this->receipts->settle($signature, (string) $existing['reference'], 'spent', $now);
                }
                return ['ok' => false, 'error' => 'fee_signature_already_used'];
            }
            if ($existing['kind'] !== $kind || (int) $existing['user_id'] !== $userId || $existing['payer_wallet'] !== $payerWallet
                || ($existing['status'] ?? '') === 'spent') {
                return ['ok' => false, 'error' => 'fee_signature_already_used'];
            }
            // A released payment must still meet today's terms: price, treasury, network and age.
            $stillValid = (int) $existing['lamports'] >= $fee && $existing['treasury'] === $this->config->treasury
                && $existing['cluster'] === $this->config->cluster && (int) $existing['block_time'] >= $now - $this->config->maxAgeSeconds;
            if (!$stillValid) {
                return ['ok' => false, 'error' => 'fee_payment_no_longer_valid', 'fee' => $this->quote($kind)];
            }
            if ($existing['payer_wallet'] === $payerWallet
                && $this->receipts->reclaim($signature, $userId, $kind, $reference, $now, $now - self::STALE_PENDING_SECONDS)) {
                return ['ok' => true, 'charged' => true, 'lamports' => (int) $existing['lamports'], 'signature' => $signature, 'reused_unspent' => true];
            }
            return ['ok' => false, 'error' => 'fee_signature_already_used'];
        }
        $tx = $this->rpc->getTransaction($signature);
        if ($tx === null) {
            return ['ok' => false, 'error' => 'fee_payment_not_found'];
        }
        if (($tx['meta']['err'] ?? null) !== null) {
            return ['ok' => false, 'error' => 'fee_payment_failed_on_chain'];
        }
        $blockTime = (int) ($tx['blockTime'] ?? 0);
        if ($blockTime <= 0 || $blockTime < $now - $this->config->maxAgeSeconds || $blockTime > $now + 300) {
            return ['ok' => false, 'error' => 'fee_payment_too_old'];
        }
        if (!self::signedBy($tx, $payerWallet)) {
            return ['ok' => false, 'error' => 'fee_payment_not_from_your_wallet'];
        }
        $paid = self::paidTo($tx, $payerWallet, $this->config->treasury);
        if ($paid < $fee) {
            return ['ok' => false, 'error' => 'fee_payment_too_small', 'paid_lamports' => $paid, 'fee_lamports' => $fee];
        }
        $ok = $this->receipts->insert(['signature' => $signature, 'kind' => $kind, 'user_id' => $userId, 'payer_wallet' => $payerWallet,
            'treasury' => $this->config->treasury, 'lamports' => $paid, 'fee_lamports' => $fee, 'reference' => $reference,
            'cluster' => $this->config->cluster, 'block_time' => $blockTime, 'slot' => (int) ($tx['slot'] ?? 0), 'created_at' => $now]);
        if (!$ok) {
            return ['ok' => false, 'error' => 'fee_signature_already_used'];
        }
        return ['ok' => true, 'charged' => true, 'lamports' => $paid, 'signature' => $signature];
    }

    /** After claim(): $completed true marks the receipt spent, false releases it for a retry. */
    public function settle(string $signature, string $reference, bool $completed): void
    {
        $this->receipts->settle($signature, $reference, $completed ? 'spent' : 'released', $this->now());
    }

    private static function accountKeys(array $tx): array
    {
        $keys = [];
        foreach ($tx['transaction']['message']['accountKeys'] ?? [] as $k) {
            $keys[] = is_array($k) ? ['pubkey' => (string) ($k['pubkey'] ?? ''), 'signer' => (bool) ($k['signer'] ?? false)] : ['pubkey' => (string) $k, 'signer' => false];
        }
        return $keys;
    }

    private static function signedBy(array $tx, string $wallet): bool
    {
        foreach (self::accountKeys($tx) as $k) {
            if ($k['pubkey'] === $wallet && $k['signer']) {
                return true;
            }
        }
        return false;
    }

    /** Lamports moved from $from to $to by top-level and inner System Program transfers. */
    private static function paidTo(array $tx, string $from, string $to): int
    {
        $ins = $tx['transaction']['message']['instructions'] ?? [];
        foreach ($tx['meta']['innerInstructions'] ?? [] as $inner) {
            foreach ($inner['instructions'] ?? [] as $i) {
                $ins[] = $i;
            }
        }
        $sum = 0;
        foreach ($ins as $i) {
            $p = $i['parsed'] ?? null;
            if (($i['program'] ?? '') !== 'system' || !is_array($p) || !in_array($p['type'] ?? '', ['transfer', 'transferWithSeed'], true)) {
                continue;
            }
            $info = $p['info'] ?? [];
            if (($info['source'] ?? '') === $from && ($info['destination'] ?? '') === $to) {
                $sum += (int) ($info['lamports'] ?? 0);
            }
        }
        return $sum;
    }
}
