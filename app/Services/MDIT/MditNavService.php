<?php

namespace App\Services\MDIT;

use App\Models\MDIT\MditNavSnapshotModel;
use App\Models\MDIT\MditTokenLedgerModel;
use CodeIgniter\Cache\CacheInterface;

class MditNavService
{
    private MditNavSnapshotModel $snapshots;
    private MditTokenLedgerModel $ledger;
    private CacheInterface $cache;

    public function __construct(
        ?MditNavSnapshotModel $snapshots = null,
        ?MditTokenLedgerModel $ledger = null,
        ?CacheInterface $cache = null
    ) {
        $this->snapshots = $snapshots ?? new MditNavSnapshotModel();
        $this->ledger = $ledger ?? new MditTokenLedgerModel();
        $this->cache = $cache ?? service('cache');
    }

    public function computeDailyNav(string $asOfDate, float $cashValue = 0.0, float $equitiesValue = 0.0): array
    {
        $minted = (float) ($this->ledger->selectSum('units')->where('status', 'MINTED')->first()['units'] ?? 0);
        $burned = (float) ($this->ledger->selectSum('units')->where('status', 'BURNED')->first()['units'] ?? 0);
        $tokenSupply = max($minted - $burned, 0.0);

        $navTotal = $cashValue + $equitiesValue;
        $navPerUnit = $tokenSupply > 0 ? $navTotal / $tokenSupply : 1.0;

        $payload = [
            'as_of_date' => $asOfDate,
            'nav_total' => $navTotal,
            'token_supply' => $tokenSupply,
            'nav_per_unit' => $navPerUnit,
            'cash_value' => $cashValue,
            'equities_value' => $equitiesValue,
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $existing = $this->snapshots->where('as_of_date', $asOfDate)->first();
        if ($existing) {
            $this->snapshots->update($existing['id'], $payload);
            $snapshotId = $existing['id'];
        } else {
            $snapshotId = $this->snapshots->insert($payload, true);
        }

        $payload['id'] = $snapshotId;

        $this->cacheLatest($payload);

        return $payload;
    }

    public function latestSnapshot(): ?array
    {
        $cached = $this->cache->get('mdit_nav_latest');
        if (is_array($cached)) {
            return $cached;
        }

        $snapshot = $this->snapshots->orderBy('as_of_date', 'DESC')->first();
        if ($snapshot) {
            $this->cacheLatest($snapshot);
        }

        return $snapshot ?: null;
    }

    private function cacheLatest(array $snapshot): void
    {
        $this->cache->save('mdit_nav_latest', $snapshot, 3600);
    }
}
