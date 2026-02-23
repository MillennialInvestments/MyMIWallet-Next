<?php

namespace App\Services\Observability;

use Config\Database;

class ErrorAggregationService
{
    public function kpisLastMinutes(int $minutes = 15): array
    {
        $db = Database::connect();
        $since = date('Y-m-d H:i:s', time() - ($minutes * 60));

        $rows = $db->query("
            SELECT level, COUNT(*) AS c
            FROM bf_error_logs
            WHERE created_at >= ?
            GROUP BY level
        ", [$since])->getResultArray();

        $out = ['since' => $since, 'total' => 0, 'byLevel' => []];
        foreach ($rows as $r) {
            $lvl = strtoupper((string)($r['level'] ?? 'UNKNOWN'));
            $c = (int)($r['c'] ?? 0);
            $out['byLevel'][$lvl] = $c;
            $out['total'] += $c;
        }
        return $out;
    }

    public function topControllers(int $minutes = 60, int $limit = 20): array
    {
        $db = Database::connect();
        $since = date('Y-m-d H:i:s', time() - ($minutes * 60));

        // controller may be in context JSON; if not, we fallback to uri grouping
        $rows = $db->query("
            SELECT
              COALESCE(
                NULLIF(JSON_UNQUOTE(JSON_EXTRACT(context, '$.controller')), ''),
                NULLIF(JSON_UNQUOTE(JSON_EXTRACT(context, '$.controllerFQCN')), ''),
                NULLIF(JSON_UNQUOTE(JSON_EXTRACT(context, '$.service')), ''),
                NULLIF(uri, ''),
                'unknown'
              ) AS controller_key,
              COUNT(*) AS c
            FROM bf_error_logs
            WHERE created_at >= ?
            GROUP BY controller_key
            ORDER BY c DESC
            LIMIT {$limit}
        ", [$since])->getResultArray();

        return ['since' => $since, 'rows' => $rows];
    }

    public function heatmapByController(int $hoursBack = 24): array
    {
        $db = Database::connect();
        $since = date('Y-m-d H:i:s', time() - ($hoursBack * 3600));

        // Bucket by hour for a compact heatmap
        $rows = $db->query("
            SELECT
              DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') AS bucket,
              COALESCE(
                NULLIF(JSON_UNQUOTE(JSON_EXTRACT(context, '$.controller')), ''),
                NULLIF(JSON_UNQUOTE(JSON_EXTRACT(context, '$.controllerFQCN')), ''),
                NULLIF(uri, ''),
                'unknown'
              ) AS controller_key,
              COUNT(*) AS c
            FROM bf_error_logs
            WHERE created_at >= ?
            GROUP BY bucket, controller_key
            ORDER BY bucket ASC
        ", [$since])->getResultArray();

        return ['since' => $since, 'rows' => $rows];
    }
}