<?php

namespace App\Models;

use CodeIgniter\Model;

class SignalsModel extends Model
{
    protected $table            = 'bf_investment_signals';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'week_key',
        'signal_date',
        'symbol',
        'category',
        'signal_type',
        'source',
        'source_file',
        'row_hash',
        'score',
        'appearances',
        'metrics_json',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function upsertSignal(array $row): array
    {
        // Must include: source_file, row_hash
        $existing = $this->where('source_file', $row['source_file'])
            ->where('row_hash', $row['row_hash'])
            ->first();

        if ($existing) {
            // Optional: increment appearances or update score/metrics if desired.
            return ['status' => 'duplicate', 'id' => $existing['id']];
        }

        $id = $this->insert($row, true);
        return ['status' => 'inserted', 'id' => $id];
    }

    public function listSignals(string $weekKey, int $limit = 5000): array
    {
        return $this->where('week_key', $weekKey)
            ->orderBy('score', 'DESC')
            ->limit($limit)
            ->findAll(20);
    }

    public function isSymbolHotThisWeek(string $symbol, string $weekKey): bool
    {
        $symbol = strtoupper(trim($symbol));
        if ($symbol === '') {
            return false;
        }

        return $this->where('week_key', $weekKey)
            ->where('symbol', $symbol)
            ->countAllResults() > 0;
    }

    /**
     * Cross-file reinforcement:
     * - group by symbol/week, count appearances
     * - boost score by appearances (cap)
     */
    public function recalcWeeklyScores(string $weekKey): array
    {
        $db = $this->db;

        // Compute appearances per symbol/week
        $rows = $db->table($this->table)
            ->select('symbol, COUNT(*) as c')
            ->where('week_key', $weekKey)
            ->groupBy('symbol')
            ->limit(20)->get()->getResultArray();

        $map = [];
        foreach ($rows as $r) {
            $map[$r['symbol']] = (int) $r['c'];
        }

        // Update each signal with appearances and score boost (simple, safe)
        $signals = $this->where('week_key', $weekKey)->findAll(20);
        $updated = 0;

        foreach ($signals as $s) {
            $app = $map[$s['symbol']] ?? 1;
            $base = (int) ($s['score'] ?? 50);
            $boost = min(30, max(0, ($app - 1) * 5)); // +5 per extra appearance, cap 30
            $newScore = min(100, $base + $boost);

            $this->update($s['id'], [
                'appearances' => $app,
                'score'       => $newScore,
            ]);
            $updated++;
        }

        return ['updated' => $updated, 'symbols' => count($map)];
    }
}
