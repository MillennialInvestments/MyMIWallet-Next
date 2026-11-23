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
        $this->rows[$row['signature']] = $row + ['status' => 'pending', 'updated_at' => $row['created_at'] ?? 0];
        return true;
    }

    public function reclaim(string $signature, int $userId, string $kind, string $reference, int $now, int $staleBefore): bool
    {
        $r = $this->rows[$signature] ?? null;
        if ($r === null || (int) $r['user_id'] !== $userId || $r['kind'] !== $kind
            || !($r['status'] === 'released' || ($r['status'] === 'pending' && (int) $r['updated_at'] < $staleBefore))) {
            return false;
        }
        $this->rows[$signature] = ['reference' => $reference, 'status' => 'pending', 'updated_at' => $now] + $r;
        return true;
    }

    public function settle(string $signature, string $reference, string $status, int $now): void
    {
        if (($this->rows[$signature]['reference'] ?? null) === $reference && $this->rows[$signature]['status'] === 'pending') {
            $this->rows[$signature]['status'] = $status;
            $this->rows[$signature]['updated_at'] = $now;
        }
    }
}
