<?php

declare(strict_types=1);

namespace App\Modules\APIs\Models;

use App\Models\ObservedModel;

class ScannerModel extends ObservedModel
{
    protected $table = 'bf_scanner_jobs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'job_uuid', 'created_on', 'started_on', 'finished_on', 'status', 'provider_used',
        'timeframe', 'symbol_source', 'symbol_count', 'params_json', 'error_message',
    ];

    public function createJob(array $data): int
    {
        $this->insert($data);
        return (int) $this->getInsertID();
    }

    public function updateJob(int $jobId, array $data): void
    {
        $this->update($jobId, $data);
    }

    public function insertResults(array $rows): void
    {
        if ($rows !== []) {
            $this->db->table('bf_scanner_results')->insertBatch($rows);
        }
    }

    public function getResults(array $filters): array
    {
        $builder = $this->db->table('bf_scanner_results')->orderBy('occurred_on', 'DESC');
        foreach (['signal', 'direction', 'timeframe'] as $key) {
            if (! empty($filters[$key])) {
                $builder->where($key, $filters[$key]);
            }
        }
        if (! empty($filters['symbol'])) {
            $builder->where('symbol', strtoupper((string) $filters['symbol']));
        }
        if (! empty($filters['since'])) {
            $builder->where('occurred_on >=', $filters['since']);
        }
        $limit = (int) ($filters['limit'] ?? 100);
        $offset = (int) ($filters['offset'] ?? 0);
        return $builder->limit($limit, $offset)->get()->getResultArray();
    }

    public function syncUniverseFromTickers(): int
    {
        if (! $this->db->tableExists('bf_investment_tickers')) {
            return 0;
        }
        $rows = $this->db->table('bf_investment_tickers')->select('ticker as symbol, exchange, asset_type')->get()->getResultArray();
        $count = 0;
        foreach ($rows as $row) {
            $this->db->table('bf_scanner_symbol_universe')->replace([
                'symbol' => strtoupper((string) $row['symbol']),
                'exchange' => $row['exchange'] ?? null,
                'asset_type' => $row['asset_type'] ?? 'stock',
                'is_active' => 1,
                'updated_on' => date('Y-m-d H:i:s'),
            ]);
            $count++;
        }
        return $count;
    }

    public function symbolsFromSource(string $source, ?int $userId = null, int $limit = 500): array
    {
        if ($source === 'manual') {
            return [];
        }
        if ($source === 'watchlist' && $userId && $this->db->tableExists('bf_users_watchlist')) {
            $rows = $this->db->table('bf_users_watchlist')->select('symbol')->where('user_id', $userId)->limit($limit)->get()->getResultArray();
            return array_values(array_unique(array_map(static fn($r) => strtoupper((string) $r['symbol']), $rows)));
        }
        $rows = $this->db->table('bf_scanner_symbol_universe')->select('symbol')->where('is_active', 1)->limit($limit)->get()->getResultArray();
        return array_values(array_unique(array_map(static fn($r) => strtoupper((string) $r['symbol']), $rows)));
    }
}
