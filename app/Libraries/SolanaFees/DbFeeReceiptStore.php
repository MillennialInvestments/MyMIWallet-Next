<?php

namespace App\Libraries\SolanaFees;

use CodeIgniter\Database\BaseConnection;

final class DbFeeReceiptStore implements FeeReceiptStore
{
    public const TABLE = 'bf_solana_fee_receipts';

    public function __construct(private BaseConnection $db)
    {
    }

    /** Table and the status columns (migration 2026-11-23-000300) both present. */
    public static function available(BaseConnection $db): bool
    {
        return $db->tableExists(self::TABLE) && in_array('status', array_map(fn ($f) => $f->name, $db->getFieldData(self::TABLE)), true);
    }

    public function find(string $signature): ?array
    {
        return $this->db->table(self::TABLE)->where('signature', $signature)->get(1)->getRowArray() ?: null;
    }

    public function insert(array $row): bool
    {
        try {
            return (bool) $this->db->table(self::TABLE)->insert($row + ['status' => 'pending', 'updated_at' => $row['created_at'] ?? time()]);
        } catch (\Throwable $e) {
            return false; // unique signature: already used
        }
    }

    public function reclaim(string $signature, int $userId, string $kind, string $reference, int $now, int $staleBefore): bool
    {
        // One conditional UPDATE: only one concurrent request can win it.
        $this->db->table(self::TABLE)->where('signature', $signature)->where('user_id', $userId)->where('kind', $kind)
            ->groupStart()->where('status', 'released')
                ->orGroupStart()->where('status', 'pending')->where('updated_at <', $staleBefore)->groupEnd()
            ->groupEnd()
            ->update(['reference' => $reference, 'status' => 'pending', 'updated_at' => $now]);
        return $this->db->affectedRows() === 1;
    }

    public function settle(string $signature, string $reference, string $status, int $now): void
    {
        $this->db->table(self::TABLE)->where('signature', $signature)->where('reference', $reference)->where('status', 'pending')
            ->update(['status' => $status, 'updated_at' => $now]);
    }
}
