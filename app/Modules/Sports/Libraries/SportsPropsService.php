<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

use App\Modules\Sports\Libraries\Providers\StatsProviderInterface;
use CodeIgniter\Database\BaseConnection;

/**
 * Stores and reads NFL running back game logs and defense ranks, and turns
 * them into per-defense-tier splits and Goldilocks prop recommendations.
 * Reference data only (not user records), so reads need no ownership check.
 */
final class SportsPropsService
{
    public const T_PLAYERS = 'bf_sports_players';
    public const T_LOGS    = 'bf_sports_rb_game_logs';
    public const T_DEFENSE = 'bf_sports_defense_ranks';

    public const DISCLAIMER = 'Educational analytics only, not betting advice. MyMI Wallet does not accept, place or broker wagers. '
        . 'Sports betting is regulated by each state; check your local laws. Gambling problem? Call 1-800-GAMBLER.';

    /** @var array<string, list<array>> */
    private array $defenseCache = [];

    public function __construct(private readonly BaseConnection $db)
    {
    }

    public function tablesReady(): bool
    {
        foreach ([self::T_PLAYERS, self::T_LOGS, self::T_DEFENSE] as $t) {
            if (! $this->db->tableExists($t, false)) {
                return false;
            }
        }

        return true;
    }

    public function counts(): array
    {
        if (! $this->tablesReady()) {
            return ['tables_ready' => false];
        }

        return [
            'tables_ready'   => true,
            'players'        => $this->db->table(self::T_PLAYERS)->countAllResults(),
            'game_logs'      => $this->db->table(self::T_LOGS)->countAllResults(),
            'defense_ranks'  => $this->db->table(self::T_DEFENSE)->countAllResults(),
            'sample_players' => $this->db->table(self::T_PLAYERS)->where('provider', 'sample')->countAllResults(),
        ];
    }

    /** Idempotent upsert of everything the provider returns. */
    public function import(StatsProviderInterface $provider): array
    {
        $now = date('Y-m-d H:i:s');
        $name = $provider->name();
        $result = ['provider' => $name, 'players' => 0, 'game_logs_inserted' => 0, 'game_logs_updated' => 0, 'defense_ranks' => 0];

        $this->db->transStart();

        foreach ($provider->defenseRanks() as $row) {
            $key = ['provider' => $name, 'season' => $row['season'], 'week' => $row['week'], 'team' => $row['team']];
            $existing = $this->db->table(self::T_DEFENSE)->where($key)->get()->getRowArray();
            $data = [
                'rush_def_rank'       => $row['rush_def_rank'],
                'rb_rec_def_rank'     => $row['rb_rec_def_rank'],
                'rush_yds_allowed_pg' => $row['rush_yds_allowed_pg'],
                'updated_at'          => $now,
            ];
            if ($existing) {
                $this->db->table(self::T_DEFENSE)->where('id', $existing['id'])->update($data);
            } else {
                $this->db->table(self::T_DEFENSE)->insert($key + $data + ['created_at' => $now]);
            }
            $result['defense_ranks']++;
        }

        $playerIds = [];
        foreach ($provider->gameLogs() as $row) {
            $ext = $row['external_id'];
            if (! isset($playerIds[$ext])) {
                $player = $this->db->table(self::T_PLAYERS)->where(['provider' => $name, 'external_id' => $ext])->get()->getRowArray();
                $pdata = ['full_name' => $row['player_name'], 'team' => $row['team'], 'position' => $row['position'], 'updated_at' => $now];
                if ($player) {
                    $this->db->table(self::T_PLAYERS)->where('id', $player['id'])->update($pdata);
                    $playerIds[$ext] = (int) $player['id'];
                } else {
                    $this->db->table(self::T_PLAYERS)->insert(['provider' => $name, 'external_id' => $ext, 'created_at' => $now] + $pdata);
                    $playerIds[$ext] = (int) $this->db->insertID();
                }
                $result['players']++;
            }

            $key = ['player_id' => $playerIds[$ext], 'season' => $row['season'], 'week' => $row['week']];
            $data = [
                'provider' => $name, 'game_date' => $row['game_date'], 'team' => $row['team'], 'opponent' => $row['opponent'],
                'home_away' => $row['home_away'], 'rush_att' => $row['rush_att'], 'rush_yds' => $row['rush_yds'],
                'rush_td' => $row['rush_td'], 'targets' => $row['targets'], 'receptions' => $row['receptions'],
                'rec_yds' => $row['rec_yds'], 'rec_td' => $row['rec_td'], 'updated_at' => $now,
            ];
            $existing = $this->db->table(self::T_LOGS)->where($key)->get()->getRowArray();
            if ($existing) {
                $this->db->table(self::T_LOGS)->where('id', $existing['id'])->update($data);
                $result['game_logs_updated']++;
            } else {
                $this->db->table(self::T_LOGS)->insert($key + $data + ['created_at' => $now]);
                $result['game_logs_inserted']++;
            }
        }

        $this->db->transComplete();
        $result['ok'] = $this->db->transStatus();
        $this->defenseCache = [];

        return $result;
    }

    /** Removes only rows imported by the bundled sample provider. */
    public function removeSample(): array
    {
        $ids = array_map('intval', array_column($this->db->table(self::T_PLAYERS)->select('id')->where('provider', 'sample')->get()->getResultArray(), 'id'));
        $this->db->transStart();
        if ($ids !== []) {
            $this->db->table(self::T_LOGS)->whereIn('player_id', $ids)->delete();
            $this->db->table(self::T_PLAYERS)->whereIn('id', $ids)->delete();
        }
        $this->db->table(self::T_DEFENSE)->where('provider', 'sample')->delete();
        $this->db->transComplete();

        return ['removed_players' => count($ids), 'ok' => $this->db->transStatus()];
    }

    public function listPlayers(?int $season = null): array
    {
        $builder = $this->db->table(self::T_LOGS . ' l')
            ->select('p.id, p.full_name, p.team, p.position, p.provider, COUNT(l.id) AS games, SUM(l.rush_yds) AS rush_yds, SUM(l.rec_yds) AS rec_yds, MAX(l.season) AS season')
            ->join(self::T_PLAYERS . ' p', 'p.id = l.player_id')
            ->groupBy('p.id, p.full_name, p.team, p.position, p.provider')
            ->orderBy('p.full_name', 'ASC');
        if ($season !== null) {
            $builder->where('l.season', $season);
        }
        $rows = $builder->get()->getResultArray();
        foreach ($rows as &$r) {
            $games = max(1, (int) $r['games']);
            $r['rush_avg'] = round((int) $r['rush_yds'] / $games, 1);
            $r['rec_avg'] = round((int) $r['rec_yds'] / $games, 1);
        }

        return $rows;
    }

    public function findPlayer(int|string $idOrName): ?array
    {
        $b = $this->db->table(self::T_PLAYERS);
        if (is_int($idOrName) || ctype_digit((string) $idOrName)) {
            $b->where('id', (int) $idOrName);
        } else {
            $b->like('full_name', (string) $idOrName);
        }

        return $b->orderBy('id', 'ASC')->get(1)->getRowArray() ?: null;
    }

    public function latestSeason(int $playerId): ?int
    {
        $row = $this->db->table(self::T_LOGS)->selectMax('season')->where('player_id', $playerId)->get()->getRowArray();

        return isset($row['season']) ? (int) $row['season'] : null;
    }

    /** @return list<string> */
    public function teams(int $season, string $provider): array
    {
        $rows = $this->defenseRows($season, $provider);

        return array_values(array_unique(array_column($rows, 'team')));
    }

    /**
     * Defense row used for a game: the latest weekly rank published before
     * that week (no look-ahead), else the season-level (week 0) rank.
     */
    public function defenseFor(string $team, int $season, int $week, string $provider): ?array
    {
        $best = null;
        foreach ($this->defenseRows($season, $provider) as $row) {
            if ($row['team'] !== $team) {
                continue;
            }
            $w = (int) $row['week'];
            if ($w === 0 && $best === null) {
                $best = $row;
            } elseif ($w > 0 && $w < $week && ($best === null || (int) $best['week'] === 0 || $w > (int) $best['week'])) {
                $best = $row;
            }
        }

        return $best;
    }

    /**
     * Full report for one player: tagged games, tier splits, and (when an
     * opponent is given) a Goldilocks evaluation of the offered lines.
     */
    public function playerReport(int $playerId, ?int $season = null, ?string $opponent = null, array $lines = []): ?array
    {
        $player = $this->findPlayer($playerId);
        if ($player === null) {
            return null;
        }
        $season ??= $this->latestSeason($playerId);
        $provider = (string) $player['provider'];

        $games = $season === null ? [] : $this->db->table(self::T_LOGS)
            ->where(['player_id' => $playerId, 'season' => $season])
            ->orderBy('week', 'ASC')->get()->getResultArray();

        $tagged = RbSplitsCalculator::tagGames($games, fn (array $g) => $this->defenseFor((string) $g['opponent'], (int) $g['season'], (int) $g['week'], $provider));
        $splits = RbSplitsCalculator::splits($tagged);

        $report = [
            'player'     => $player,
            'season'     => $season,
            'games'      => $tagged,
            'splits'     => $splits,
            'teams'      => $season === null ? [] : $this->teams($season, $provider),
            'opponent'   => null,
            'goldilocks' => null,
            'disclaimer' => self::DISCLAIMER,
            'provenance' => ['provider' => $provider, 'is_sample' => $provider === 'sample', 'read_only' => true, 'wagering' => false,
                'attribution' => $provider === Providers\NflverseStatsProvider::NAME ? Providers\NflverseStatsProvider::ATTRIBUTION : null],
        ];

        if ($opponent !== null && $opponent !== '' && $season !== null) {
            $opponent = strtoupper($opponent);
            // Upcoming game: use the most recent rank we have for that defense.
            $defense = $this->defenseFor($opponent, $season, 99, $provider);
            $report['opponent'] = [
                'team'            => $opponent,
                'rush_def_rank'   => $defense['rush_def_rank'] ?? null,
                'rb_rec_def_rank' => $defense['rb_rec_def_rank'] ?? null,
                'known'           => $defense !== null,
            ];
            $report['goldilocks'] = GoldilocksEngine::evaluate($tagged, $defense ?? [], $lines);
        }

        return $report;
    }

    /**
     * Goldilocks verdicts for every player who has upcoming sportsbook lines.
     * Players are matched by name; when the same name exists under several
     * providers, real data wins over the sample set.
     *
     * @return list<array{player:array, opponent:?string, commence_time:?string, bookmaker:?string, best:?array, verdict:string}>
     */
    public function weeklyPicks(PropLinesService $lines, int $limit = 60): array
    {
        $keys = array_flip($lines->upcomingPlayerKeys());
        if ($keys === [] || ! $this->tablesReady()) {
            return [];
        }

        $players = [];
        foreach ($this->listPlayers() as $p) {
            $k = PropLinesService::nameKey((string) $p['full_name']);
            if (isset($keys[$k]) && (! isset($players[$k]) || $players[$k]['provider'] === 'sample')) {
                $players[$k] = $p;
            }
        }

        $out = [];
        foreach (array_slice($players, 0, $limit) as $p) {
            $up = $lines->upcomingFor((string) $p['full_name'], (string) $p['team']);
            if ($up === null || $up['opponent'] === null || $up['lines'] === []) {
                continue;
            }
            $report = $this->playerReport((int) $p['id'], null, $up['opponent'], $up['lines']);
            $gold = $report['goldilocks'] ?? null;
            $out[] = [
                'player'        => $p,
                'opponent'      => $up['opponent'],
                'commence_time' => $up['commence_time'],
                'bookmaker'     => $up['bookmaker'],
                'best'          => $gold['best'] ?? null,
                'verdict'       => (string) ($gold['verdict'] ?? ''),
            ];
        }

        usort($out, static fn ($a, $b) => [$b['best'] !== null, $b['best']['ev_per_dollar'] ?? 0] <=> [$a['best'] !== null, $a['best']['ev_per_dollar'] ?? 0]);

        return $out;
    }

    private function defenseRows(int $season, string $provider): array
    {
        $key = $provider . ':' . $season;
        if (! isset($this->defenseCache[$key])) {
            $this->defenseCache[$key] = $this->db->table(self::T_DEFENSE)
                ->where(['season' => $season, 'provider' => $provider])
                ->orderBy('team', 'ASC')->orderBy('week', 'ASC')
                ->get()->getResultArray();
        }

        return $this->defenseCache[$key];
    }
}
