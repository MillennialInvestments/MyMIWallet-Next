<?php

namespace App\Libraries\SolanaFees;

/** The one RPC call fee checks need. */
interface SolanaRpc
{
    /** getTransaction(signature, jsonParsed). Null when not found or the RPC failed. */
    public function getTransaction(string $signature): ?array;
}
