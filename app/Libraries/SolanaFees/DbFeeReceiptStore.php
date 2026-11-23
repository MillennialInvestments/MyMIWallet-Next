<?php

namespace App\Libraries\SolanaFees;

use CodeIgniter\Database\BaseConnection;

final class DbFeeReceiptStore implements FeeReceiptStore
{
    public const TABLE = 'bf_solana_fee_receipts';

    public function __construct(private BaseConnection $db)
    {
    }

    public static function available(BaseConnection $db): bool
    {
        return $db->tableExists(self::TABLE);
    }

    public function find(string $signature): ?array
    {
        return $this->db->table(self::TABLE)->where('signature', $signature)->get(1)->getRowArray() ?: null;
    }

    public function insert(array $row): bool
    {
        try {
            return (bool) $this->db->table(self::TABLE)->insert($row);
        } catch (\Throwable $e) {
            return false; // unique signature: already used
        }
    }

    public function rebind(string $signature, string $reference): void
    {
        $this->db->table(self::TABLE)->where('signature', $signature)->update(['reference' => $reference]);
    }
}
