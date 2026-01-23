<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Squeeze_model extends CI_Model
{
    protected $redis = null;
    protected $redisReady = false;
    protected $cacheHits = 0;
    protected $cacheMisses = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->initRedis();
    }

    protected function initRedis()
    {
        if (!class_exists('Redis')) {
            return;
        }

        $this->redis = new Redis();
        try {
            $connected = $this->redis->connect('127.0.0.1', 6379, 1.0);
            if ($connected) {
                $this->redisReady = true;
            }
        } catch (Exception $exception) {
            log_message('error', 'Redis unavailable: ' . $exception->getMessage());
        }
    }

    protected function cacheGet($key)
    {
        if (!$this->redisReady) {
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

    protected function cacheSet($key, $value, $ttl)
    {
        if (!$this->redisReady) {
            return false;
        }
        return $this->redis->setex($key, $ttl, json_encode($value));
    }

    public function upsertUniverseRow(array $data)
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        return $this->db->replace('bf_squeeze_universe', $data);
    }

    public function insertScorecard(array $data)
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        return $this->db->insert('bf_squeeze_scorecards', $data);
    }

    public function insertZoomOut(array $data)
    {
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        return $this->db->replace('bf_squeeze_zoomout', $data);
    }

    public function insertFadeSetups(array $rows)
    {
        if (empty($rows)) {
            return 0;
        }
        foreach ($rows as $row) {
            $row['created_at'] = $row['created_at'] ?? date('Y-m-d H:i:s');
            $this->db->insert('bf_squeeze_fade_setups', $row);
        }
        return count($rows);
    }

    public function getLatestScorecards($limit = 25, $symbol = null)
    {
        $limit = (int) $limit;
        $limit = $limit > 0 ? $limit : 25;
        $cacheKey = $symbol
            ? "squeeze:scorecard:{$symbol}:{$limit}"
            : "squeeze:scorecard:latest:{$limit}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $this->db->from('bf_squeeze_scorecards');
        if ($symbol) {
            $this->db->where('symbol', $symbol);
        }
        $this->db->order_by('as_of_datetime', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        $rows = $query->result_array();

        $ttl = 300;
        $this->cacheSet($cacheKey, $rows, $ttl);

        return $rows;
    }

    public function getZoomOut($symbol, $date)
    {
        $cacheKey = "squeeze:zoomout:{$symbol}:{$date}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $query = $this->db->get_where('bf_squeeze_zoomout', [
            'symbol' => $symbol,
            'as_of_date' => $date,
        ]);
        $row = $query->row_array();

        if ($row) {
            $this->cacheSet($cacheKey, $row, 43200);
        }

        return $row;
    }

    public function getFadeSetups($symbol, $date)
    {
        $cacheKey = "squeeze:fade:{$symbol}:{$date}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        $this->db->from('bf_squeeze_fade_setups');
        $this->db->where('symbol', $symbol);
        $this->db->where('DATE(as_of_datetime) =', $date, false);
        $this->db->order_by('as_of_datetime', 'DESC');
        $query = $this->db->get();
        $rows = $query->result_array();

        $this->cacheSet($cacheKey, $rows, 1800);

        return $rows;
    }

    public function getHighRiskCount($threshold = 80, $hours = 24)
    {
        $threshold = (int) $threshold;
        $hours = (int) $hours;
        $cacheKey = "squeeze:scorecard:highrisk:{$threshold}:{$hours}";
        $cached = $this->cacheGet($cacheKey);
        if ($cached !== null) {
            return (int) $cached;
        }

        $since = date('Y-m-d H:i:s', strtotime("-{$hours} hours"));
        $this->db->from('bf_squeeze_scorecards');
        $this->db->where('score_total >=', $threshold);
        $this->db->where('as_of_datetime >=', $since);
        $count = (int) $this->db->count_all_results();

        $this->cacheSet($cacheKey, $count, 300);

        return $count;
    }

    public function getLatestBySymbols(array $symbols)
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

        $symbolsList = $this->db->escape($symbols);
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
        $rows = $query ? $query->result_array() : [];

        $this->cacheSet($cacheKey, $rows, 300);

        return $rows;
    }

    public function getCacheStats()
    {
        return [
            'hits' => $this->cacheHits,
            'misses' => $this->cacheMisses,
        ];
    }
}
