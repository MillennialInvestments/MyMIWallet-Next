<?php

namespace App\Libraries\SolanaFees;

/**
 * Every SOL fee payment MyMI accepted, one row per transaction signature.
 * A receipt is 'pending' while its charge runs, then 'spent' or 'released'
 * (the charge failed, so the same payer may use it again).
 */
interface FeeReceiptStore
{
    public function find(string $signature): ?array;

    /** Inserts a new 'pending' receipt. False when the signature was already recorded. */
    public function insert(array $row): bool;

    /**
     * Atomically take a receipt for a new reference: only when it belongs to this
     * user and kind and is 'released', or 'pending' since before $staleBefore
     * (an attempt that crashed). False when another request holds it or spent it.
     */
    public function reclaim(string $signature, int $userId, string $kind, string $reference, int $now, int $staleBefore): bool;

    /** Mark a pending receipt 'spent' or 'released'. */
    public function settle(string $signature, string $reference, string $status, int $now): void;
}
