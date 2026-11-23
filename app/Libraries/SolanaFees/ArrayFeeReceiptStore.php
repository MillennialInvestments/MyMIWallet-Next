<?php

namespace App\Libraries\SolanaFees;

final class ArrayFeeReceiptStore implements FeeReceiptStore
{
    /** @var array<string, array<string, mixed>> */
    public array $rows = [];

    public function find(string $signature): ?array
    {
        return $this->rows[$signature] ?? null;
    }

    public function insert(array $row): bool
    {
        if (isset($this->rows[$row['signature']])) {
            return false;
        }
        $this->rows[$row['signature']] = $row;
        return true;
    }

    public function rebind(string $signature, string $reference): void
    {
        $this->rows[$signature]['reference'] = $reference;
    }
}
