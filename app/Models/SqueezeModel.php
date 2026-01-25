<?php

namespace App\Models;

use CodeIgniter\Database\BaseConnection;

class SqueezeModel
{
    protected BaseConnection $db;
    protected ?\Redis $redis = null;
    protected bool $redisReady = false;
    protected int $cacheHits = 0;
    protected int $cacheMisses = 0;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
        $this->initRedis();
    }

    protected function initRedis(): void
    {
        if (!class_exists('Redis')) {
            return;
        }

        $this->redis = new \Redis();
        try {
            $connected = $this->redis->connect('127.0.0.1', 6379, 1.0);
            if ($connected) {
                $this->redisReady = true;
            }
        } catch (\Throwable $exception) {
            log_message('error', 'Redis unavailable: ' . $exception->getMessage());
        }
    }

    protected function cacheGet(string $key): ?array
    {
        if (!$this->redisReady || $this->redis === null) {
            return null;
        }

        $value = $this->redis->get($key);
        if ($value === false) {
            $this->cacheMisses++;
            return null;
        }

        $this->cacheHits++;

        return json_decode($value, true);
    }

    protected function cacheSet(string $key, $value, int $ttl): bool
    {
        if (!$this->redisReady || $this->redis === null) {
            return false;
        }

        return (bool) $this->redis->setex($key, $ttl, json_encode($value));
    }

    public function upsertUniverseRow(array $data): bool
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');

        return (bool) $this->db->table('bf_squeeze_universe')->replace($data);
    }

    public function insertScorecard(array $data): bool
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');

        return (bool) $this->db->table('bf_squeeze_scorecards')->insert($data);
    }

    public function insertZoomOut(array $data): bool
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');

        return (bool) $this->db->table('bf_squeeze_zoomout')->replace($data);
    }

    public function insertFadeSetups(array $rows): int
    {
        if (empty($rows)) {
            return 0;
        }

        $builder = $this->db->table('bf_squeeze_fade_setups');
        foreach ($rows as $row) {
            $row['created_at'] = $row['created_at'] ?? date('Y-m-d H:i:s');
            $builder->insert($row);
        }

        return count($rows);
    }

    public function getLatestScorecards(int $limit = 25, ?string $symbol = null): array
    {
        $limit = $limit > 0 ? $limit : 25;
        $cacheKey = $symbol
            ? "squeeze:scorecard:{$symbol}:{$limit}"
            : "squeeze:scorecard:latest:{$limit}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $builder = $this->db->table('bf_squeeze_scorecards');
        if ($symbol) {
            $builder->where('symbol', $symbol);
        }

        $rows = $builder
            ->orderBy('as_of_datetime', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $this->cacheSet($cacheKey, $rows, 300);

        return $rows;
    }

    public function getZoomOut(string $symbol, string $date): ?array
    {
        $cacheKey = "squeeze:zoomout:{$symbol}:{$date}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $row = $this->db->table('bf_squeeze_zoomout')
            ->getWhere([
                'symbol' => $symbol,
                'as_of_date' => $date,
            ])
            ->getRowArray();

        if ($row) {
            $this->cacheSet($cacheKey, $row, 43200);
        }

        return $row ?: null;
    }

    public function getFadeSetups(string $symbol, string $date): array
    {
        $cacheKey = "squeeze:fade:{$symbol}:{$date}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $rows = $this->db->table('bf_squeeze_fade_setups')
            ->where('symbol', $symbol)
            ->where('DATE(as_of_datetime)', $date, false)
            ->orderBy('as_of_datetime', 'DESC')
            ->get()
            ->getResultArray();

        $this->cacheSet($cacheKey, $rows, 1800);

        return $rows;
    }

    public function getHighRiskCount(int $threshold = 80, int $hours = 24): int
    {
        $cacheKey = "squeeze:scorecard:highrisk:{$threshold}:{$hours}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached !== null) {
            return (int) $cached;
        }

        $since = date('Y-m-d H:i:s', strtotime("-{$hours} hours"));
        $count = (int) $this->db->table('bf_squeeze_scorecards')
            ->where('score_total >=', $threshold)
            ->where('as_of_datetime >=', $since)
            ->countAllResults();

        $this->cacheSet($cacheKey, $count, 300);

        return $count;
    }

    public function getLatestBySymbols(array $symbols): array
    {
        $symbols = array_filter(array_unique(array_map('strtoupper', $symbols)));
        if (empty($symbols)) {
            return [];
        }

        $hash = substr(sha1(implode('|', $symbols)), 0, 12);
        $cacheKey = "squeeze:scorecard:symbols:{$hash}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $symbolsList = array_map([$this->db, 'escape'], $symbols);
        $symbolsSql = implode(',', $symbolsList);
        $sql = "
            SELECT s1.*
            FROM bf_squeeze_scorecards s1
            INNER JOIN (
                SELECT symbol, MAX(as_of_datetime) AS max_dt
                FROM bf_squeeze_scorecards
                WHERE symbol IN ({$symbolsSql})
                GROUP BY symbol
            ) s2 ON s1.symbol = s2.symbol AND s1.as_of_datetime = s2.max_dt
        ";

        $query = $this->db->query($sql);
        $rows = $query ? $query->getResultArray() : [];

        $this->cacheSet($cacheKey, $rows, 300);

        return $rows;
    }

    public function getCacheStats(): array
    {
        return [
            'hits' => $this->cacheHits,
            'misses' => $this->cacheMisses,
        ];
    }
}
