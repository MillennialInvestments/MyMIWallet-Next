<?php

declare(strict_types=1);

namespace App\Services\CryptoPay;

use CodeIgniter\Database\BaseConnection;

/**
 * Service managing the pre-generated multi-asset UTXO address pool (Litecoin, Dogecoin).
 *
 * Guarantees:
 * - One dedicated address per checkout per chain.
 * - No address reuse: addresses transition unused -> reserved -> used.
 * - Fail-closed: returns null if the pool for the specified chain is exhausted.
 */
class UtxoAddressPoolService
{
    private const TABLE = 'bf_utxo_address_pool';

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function isConfigured(string $chain = 'ltc', string $network = 'testnet'): bool
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return false;
        }

        return $this->db->table(self::TABLE)
            ->where('chain', strtolower(trim($chain)))
            ->where('network', strtolower(trim($network)))
            ->countAllResults() > 0;
    }

    /**
     * Atomically acquire the next unused pool address for a checkout on a specific chain.
     * Returns null if no unused addresses remain (pool exhaustion, fail closed).
     */
    public function acquireAddress(string $chain, string $checkoutRef, string $network = 'testnet'): ?string
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return null;
        }

        $c = strtolower(trim($chain));
        $net = strtolower(trim($network));
        $now = time();

        $row = $this->db->table(self::TABLE)
            ->where('chain', $c)
            ->where('network', $net)
            ->where('status', 'unused')
            ->orderBy('derivation_index', 'ASC')
            ->limit(1)
            ->get()
            ->getRowArray();

        if ($row === null) {
            log_message('error', "UTXO address pool exhausted for {$c} on {$net}. Checkout {$checkoutRef} failed to acquire address.");
            return null;
        }

        $address = (string) $row['address'];
        $id = (int) $row['id'];

        $updated = $this->db->table(self::TABLE)
            ->where('id', $id)
            ->where('status', 'unused')
            ->update([
                'status'       => 'reserved',
                'checkout_ref' => $checkoutRef,
                'used_at'      => $now,
            ]);

        if (! $updated || $this->db->affectedRows() === 0) {
            // Concurrent race condition hit; retry once
            return $this->acquireAddress($chain, $checkoutRef, $network);
        }

        return $address;
    }

    /**
     * Mark an address as permanently 'used' once a payment confirms on chain.
     */
    public function markUsed(string $chain, string $address): bool
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return false;
        }

        return $this->db->table(self::TABLE)
            ->where('chain', strtolower(trim($chain)))
            ->where('address', trim($address))
            ->update(['status' => 'used']);
    }

    /**
     * Release a reserved address back to 'unused' if an uncompleted checkout expires.
     */
    public function releaseAddress(string $chain, string $address, string $checkoutRef): bool
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return false;
        }

        return $this->db->table(self::TABLE)
            ->where('chain', strtolower(trim($chain)))
            ->where('address', trim($address))
            ->where('checkout_ref', $checkoutRef)
            ->where('status', 'reserved')
            ->update([
                'status'       => 'unused',
                'checkout_ref' => null,
                'used_at'      => null,
            ]);
    }

    /**
     * Import pre-generated addresses into the pool.
     *
     * @param list<array{address: string, index: int}> $addresses
     */
    public function importAddresses(string $chain, array $addresses, string $network = 'testnet'): int
    {
        if (! $this->db->tableExists(self::TABLE) || $addresses === []) {
            return 0;
        }

        $c = strtolower(trim($chain));
        $net = strtolower(trim($network));
        $now = time();
        $imported = 0;

        foreach ($addresses as $item) {
            $addr = trim((string) ($item['address'] ?? ''));
            $index = (int) ($item['index'] ?? -1);

            if ($addr === '' || $index < 0) {
                continue;
            }

            // Skip if address or index already exists for this chain
            $exists = $this->db->table(self::TABLE)
                ->where('chain', $c)
                ->groupStart()
                    ->where('address', $addr)
                    ->orWhere('derivation_index', $index)
                ->groupEnd()
                ->countAllResults() > 0;

            if ($exists) {
                continue;
            }

            $inserted = $this->db->table(self::TABLE)->insert([
                'chain'            => $c,
                'network'          => $net,
                'address'          => $addr,
                'derivation_index' => $index,
                'status'           => 'unused',
                'created_at'       => $now,
            ]);

            if ($inserted) {
                $imported++;
            }
        }

        return $imported;
    }

    /**
     * Get pool metrics for observability and operational alerting.
     *
     * @return array{total: int, unused: int, reserved: int, used: int}
     */
    public function getPoolStats(string $chain, string $network = 'testnet'): array
    {
        if (! $this->db->tableExists(self::TABLE)) {
            return ['total' => 0, 'unused' => 0, 'reserved' => 0, 'used' => 0];
        }

        $c = strtolower(trim($chain));
        $net = strtolower(trim($network));

        $rows = $this->db->table(self::TABLE)
            ->select('status, COUNT(*) as count')
            ->where('chain', $c)
            ->where('network', $net)
            ->groupBy('status')
            ->get()
            ->getResultArray();

        $stats = ['total' => 0, 'unused' => 0, 'reserved' => 0, 'used' => 0];
        foreach ($rows as $r) {
            $status = (string) $r['status'];
            $count = (int) $r['count'];
            if (isset($stats[$status])) {
                $stats[$status] = $count;
            }
            $stats['total'] += $count;
        }

        return $stats;
    }
}
