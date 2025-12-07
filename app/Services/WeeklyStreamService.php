<?php

namespace App\Services;

use App\Models\AlertsModel;
use App\Models\WeeklyStreamWatchlistModel;
use CodeIgniter\Database\BaseConnection;
use Config\Services as ConfigServices;
use DateTime;

class WeeklyStreamService
{
    protected AlertsModel $alertsModel;
    protected WeeklyStreamWatchlistModel $watchlistModel;
    protected BaseConnection $db;

    public function __construct()
    {
        $this->alertsModel    = model(AlertsModel::class);
        $this->watchlistModel = model(WeeklyStreamWatchlistModel::class);
        $this->db             = ConfigServices::database();
    }

    public function generateWeeklyWatchlistSnapshot(?string $weekStartDate = null): array
    {
        $weekStart = $weekStartDate ? new DateTime($weekStartDate) : $this->getDefaultWeekStart();
        $weekKey   = $weekStart->format('Y-m-d');

        log_message('info', '📺 WeeklyStreamService::generateWeeklyWatchlistSnapshot starting for ' . $weekKey);

        $streamWatchlists = $this->fetchStreamWatchlists();
        $alertStats       = $this->fetchAlertStats();

        $insertRows = [];
        foreach ($streamWatchlists as $watchlistName => $symbols) {
            $scored = [];
            foreach ($symbols as $symbol) {
                $stats     = $alertStats[$symbol] ?? null;
                $score     = $this->scoreSymbol($stats);
                $notes     = $this->buildNotes($stats);
                $scored[]  = [
                    'symbol' => $symbol,
                    'score'  => $score,
                    'notes'  => $notes,
                ];
            }

            usort($scored, static function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });

            $topSymbols = array_slice($scored, 0, 10);
            foreach ($topSymbols as $entry) {
                $insertRows[] = [
                    'week_start_date' => $weekKey,
                    'watchlist_name'  => $watchlistName,
                    'symbol'          => $entry['symbol'],
                    'score'           => $entry['score'],
                    'notes'           => $entry['notes'],
                    'created_at'      => date('Y-m-d H:i:s'),
                ];
            }
        }

        $this->db->transStart();
        $this->watchlistModel
            ->where('week_start_date', $weekKey)
            ->delete();

        if (! empty($insertRows)) {
            $this->watchlistModel->insertBatch($insertRows);
        }
        $this->db->transComplete();

        $totalInserted = count($insertRows);
        $watchlistsProcessed = count($streamWatchlists);

        log_message(
            'info',
            sprintf(
                '✅ WeeklyStreamService completed: %d watchlists, %d records inserted for %s',
                $watchlistsProcessed,
                $totalInserted,
                $weekKey
            )
        );

        return [
            'week_start_date'      => $weekKey,
            'total_watchlists'     => $watchlistsProcessed,
            'total_records'        => $totalInserted,
            'watchlists_processed' => array_keys($streamWatchlists),
        ];
    }

    public function getDefaultWeekStart(): DateTime
    {
        $today = new DateTime('today');

        // Use the upcoming Saturday as the default stream reference.
        // If today is Saturday, use today; otherwise pick the next Saturday.
        if ((int) $today->format('w') === 6) {
            return $today;
        }

        return (clone $today)->modify('next saturday');
    }

    protected function fetchStreamWatchlists(): array
    {
        $builder = $this->db->table('bf_users_watchlist');
        if ($this->tableHasColumn('bf_users_watchlist', 'list_type')) {
            $builder->where('list_type', 'stream');
        }
        $results = $builder->get()->getResultArray();

        $watchlists = [];
        foreach ($results as $row) {
            $symbol = $row['symbol'] ?? $row['ticker'] ?? null;
            if (! $symbol) {
                continue;
            }

            $watchlistName = $row['watchlist_name']
                ?? $row['list_name']
                ?? $row['list_type']
                ?? 'Stream Watchlist';

            $watchlists[$watchlistName] = $watchlists[$watchlistName] ?? [];
            if (! in_array($symbol, $watchlists[$watchlistName], true)) {
                $watchlists[$watchlistName][] = $symbol;
            }
        }

        if (empty($watchlists)) {
            $fallbackList = $this->fetchTopSymbolsFromAlerts();
            $watchlists['Stream Watchlist'] = $fallbackList;
        }

        return $watchlists;
    }

    protected function fetchAlertStats(): array
    {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder
            ->select('ticker AS symbol')
            ->selectMax('created_on', 'latest_alert')
            ->selectCount('id', 'alert_count');

        if ($this->tableHasColumn('bf_investment_trade_alerts', 'change_percent')) {
            $builder->selectAvg('change_percent', 'avg_change_percent');
        }

        $records = $builder
            ->groupBy('ticker')
            ->get()
            ->getResultArray();

        $stats = [];
        foreach ($records as $record) {
            $stats[$record['symbol']] = $record;
        }

        return $stats;
    }

    protected function fetchTopSymbolsFromAlerts(): array
    {
        $rows = $this->alertsModel
            ->select('ticker')
            ->selectMax('created_on', 'latest_alert')
            ->groupBy('ticker')
            ->orderBy('latest_alert', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        return array_values(array_filter(array_map(static function ($row) {
            return $row['ticker'] ?? null;
        }, $rows)));
    }

    protected function scoreSymbol(?array $stats): float
    {
        if (empty($stats)) {
            return 0.0;
        }

        $alertCount   = (int) ($stats['alert_count'] ?? 0);
        $latestAlert  = $stats['latest_alert'] ?? null;
        $recencyBonus = 0.0;

        if ($latestAlert) {
            $latest = new DateTime($latestAlert);
            $days   = max(0, (new DateTime('now'))->diff($latest)->days);
            $recencyBonus = max(0, 30 - $days) / 30;
        }

        $performance = (float) ($stats['avg_change_percent'] ?? 0);
        return round($alertCount + $recencyBonus + ($performance / 10), 4);
    }

    protected function buildNotes(?array $stats): string
    {
        if (empty($stats)) {
            return 'No recent alert history found.';
        }

        $parts   = [];
        $count   = (int) ($stats['alert_count'] ?? 0);
        $latest  = $stats['latest_alert'] ?? null;
        $average = $stats['avg_change_percent'] ?? null;

        $parts[] = sprintf('%d alert(s) recorded', $count);
        if ($latest) {
            $parts[] = 'Latest: ' . date('M j, g:ia', strtotime($latest));
        }
        if ($average !== null) {
            $parts[] = 'Avg Δ%: ' . round((float) $average, 2);
        }

        return implode(' | ', $parts);
    }

    protected function tableHasColumn(string $table, string $column): bool
    {
        try {
            $fields = $this->db->getFieldNames($table);
            return in_array($column, $fields, true);
        } catch (\Throwable $e) {
            log_message('error', 'WeeklyStreamService: failed to inspect columns for ' . $table . ' - ' . $e->getMessage());
            return false;
        }
    }
}
