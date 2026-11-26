<?php

declare(strict_types=1);

namespace App\Services\CryptoPay;

use CodeIgniter\Database\BaseConnection;

/**
 * Service managing the pre-generated Bitcoin address pool.
 *
 * Guarantees:
 * - One address per checkout
 * - No address reuse: addresses transition unused -> reserved -> used
 * - Fail-closed: returns null if the pool is exhausted
 */
class BtcAddressPoolService
{
    private const TABLE = 'bf_btc_address_pool';

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function isConfigured(string $network = 'testnet'): bool
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return false;
        }

        return $this->db->table(self::TABLE)
            ->where('network', $network)
            ->countAllResults() > 0;
    }

    /**
     * Atomically acquire the next unused pool address for a checkout.
     * Returns null if no unused addresses remain (pool exhaustion, fail closed).
     */
    public function acquireAddress(string $checkoutRef, string $network = 'testnet'): ?string
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return null;
        }

        $now = time();

        // Find the lowest unused derivation index
        $row = $this->db->table(self::TABLE)
            ->where('network', $network)
            ->where('status', 'unused')
            ->orderBy('derivation_index', 'ASC')
            ->limit(1)
            ->get()
            ->getRowArray();

        if ($row === null) {
            return null;
        }

        $updated = $this->db->table(self::TABLE)
            ->where('id', (int) $row['id'])
            ->where('status', 'unused')
            ->update([
                'status'       => 'reserved',
                'checkout_ref' => $checkoutRef,
                'used_at'      => $now,
            ]);

        if ($updated && $this->db->affectedRows() === 1) {
            return (string) $row['address'];
        }

        // Retry once in case of concurrency collision
        $retry = $this->db->table(self::TABLE)
            ->where('network', $network)
            ->where('status', 'unused')
            ->orderBy('derivation_index', 'ASC')
            ->limit(1)
            ->get()
            ->getRowArray();

        if ($retry === null) {
            return null;
        }

        $this->db->table(self::TABLE)
            ->where('id', (int) $retry['id'])
            ->where('status', 'unused')
            ->update([
                'status'       => 'reserved',
                'checkout_ref' => $checkoutRef,
                'used_at'      => $now,
            ]);

        return $this->db->affectedRows() === 1 ? (string) $retry['address'] : null;
    }

    /**
     * Mark an address as confirmed and settled ('used').
     */
    public function markUsed(string $address): bool
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return false;
        }

        return (bool) $this->db->table(self::TABLE)
            ->where('address', $address)
            ->update([
                'status'  => 'used',
                'used_at' => time(),
            ]);
    }

    /**
     * Import a batch of pre-generated addresses into the pool.
     *
     * @param list<array{address: string, derivation_index: int}> $addresses
     * @return int Number of addresses newly imported
     */
    public function importAddresses(array $addresses, string $network = 'testnet'): int
    {
        if (! $this->db->tableExists(self::TABLE) || $addresses === []) {
            return 0;
        }

        $now = time();
        $imported = 0;

        foreach ($addresses as $item) {
            $addr = trim((string) ($item['address'] ?? ''));
            $index = (int) ($item['derivation_index'] ?? $item['index'] ?? -1);

            if ($addr === '' || $index < 0) {
                continue;
            }

            $exists = $this->db->table(self::TABLE)
                ->where('address', $addr)
                ->countAllResults() > 0;

            if ($exists) {
                continue;
            }

            try {
                $this->db->table(self::TABLE)->insert([
                    'address'          => $addr,
                    'derivation_index' => $index,
                    'network'          => $network,
                    'status'           => 'unused',
                    'checkout_ref'     => null,
                    'created_at'       => $now,
                    'used_at'          => null,
                ]);
                $imported++;
            } catch (\Throwable $e) {
                // Ignore unique constraint collisions
            }
        }

        return $imported;
    }

    /**
     * Return inventory stats for the network pool.
     *
     * @return array{total: int, unused: int, reserved: int, used: int}
     */
    public function stats(string $network = 'testnet'): array
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return ['total' => 0, 'unused' => 0, 'reserved' => 0, 'used' => 0];
        }

        $total = $this->db->table(self::TABLE)->where('network', $network)->countAllResults();
        $unused = $this->db->table(self::TABLE)->where('network', $network)->where('status', 'unused')->countAllResults();
        $reserved = $this->db->table(self::TABLE)->where('network', $network)->where('status', 'reserved')->countAllResults();
        $used = $this->db->table(self::TABLE)->where('network', $network)->where('status', 'used')->countAllResults();

        return [
            'total'    => $total,
            'unused'   => $unused,
            'reserved' => $reserved,
            'used'     => $used,
        ];
    }
}
