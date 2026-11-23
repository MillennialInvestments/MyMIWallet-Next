<?php

namespace App\Libraries\SolanaFees;

/** Every SOL fee payment MyMI accepted, one row per transaction signature. */
interface FeeReceiptStore
{
    public function find(string $signature): ?array;

    /** False when the signature was already recorded (a payment is used once). */
    public function insert(array $row): bool;

    /** Point an unused receipt at a new reference (only for the same user and kind). */
    public function rebind(string $signature, string $reference): void;
}
