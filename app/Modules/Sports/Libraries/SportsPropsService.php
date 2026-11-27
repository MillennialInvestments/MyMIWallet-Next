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
                'rb_rec_def_rank'     => $row['rb_rec_def_rank'] ?? null,
                'rush_yds_allowed_pg' => $row['rush_yds_allowed_pg'] ?? null,
                'updated_at'          => $now,
            ];
            foreach (['pass_def_rank', 'pass_yds_allowed_pg', 'pass_td_def_rank', 'scoring_def_rank', 'points_allowed_pg'] as $col) {
                if (isset($row[$col]) && $this->db->fieldExists($col, self::T_DEFENSE)) {
                    $data[$col] = $row[$col];
                }
            }
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
            foreach (['pass_att', 'completions', 'pass_yds', 'pass_td', 'interceptions'] as $col) {
                if (isset($row[$col]) && $this->db->fieldExists($col, self::T_LOGS)) {
                    $data[$col] = $row[$col];
                }
            }
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

    /**
     * Downloads the current nflverse season file and imports it. Used by the
     * daily timer (sports:import) and the on-page refresh button.
     *
     * @return array<string,mixed>
     */
    public function refreshNflverse(?int $season = null, ?callable $fetch = null): array
    {
        $season ??= Providers\NflverseStatsProvider::currentSeason();
        $path = Providers\NflverseStatsProvider::defaultPath($season);
        $dl = Providers\NflverseStatsProvider::download($season, $path, $fetch);
        $r = $this->import(new Providers\NflverseStatsProvider($path));
        $r['download'] = ['url' => $dl['url'], 'bytes' => $dl['bytes']];

        return $r;
    }

    /** When the stats were last downloaded (UTC "Y-m-d H:i"), or null. */
    public static function statsUpdatedAt(?int $season = null): ?string
    {
        $path = Providers\NflverseStatsProvider::defaultPath($season ?? Providers\NflverseStatsProvider::currentSeason());

        return is_file($path) ? gmdate('Y-m-d H:i', (int) filemtime($path)) : null;
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

    public function listPlayers(?int $season = null, ?string $position = null): array
    {
        $hasPassing = $this->db->fieldExists('pass_yds', self::T_LOGS);
        $select = 'p.id, p.full_name, p.team, p.position, p.provider, COUNT(l.id) AS games, SUM(l.rush_yds) AS rush_yds, SUM(l.rec_yds) AS rec_yds, MAX(l.season) AS season';
        if ($hasPassing) {
            $select .= ', SUM(l.pass_yds) AS pass_yds, SUM(l.pass_td) AS pass_td, SUM(l.receptions) AS receptions';
        }

        $builder = $this->db->table(self::T_LOGS . ' l')
            ->select($select)
            ->join(self::T_PLAYERS . ' p', 'p.id = l.player_id')
            ->groupBy('p.id, p.full_name, p.team, p.position, p.provider')
            ->orderBy('p.full_name', 'ASC');

        if ($season !== null) {
            $builder->where('l.season', $season);
        }
        if ($position !== null && strtoupper($position) !== 'ALL') {
            $builder->where('p.position', strtoupper($position));
        }

        $rows = $builder->get()->getResultArray();
        foreach ($rows as &$r) {
            $games = max(1, (int) $r['games']);
            $r['rush_avg'] = round((int) ($r['rush_yds'] ?? 0) / $games, 1);
            $r['rec_avg']  = round((int) ($r['rec_yds'] ?? 0) / $games, 1);
            $r['pass_avg'] = round((int) ($r['pass_yds'] ?? 0) / $games, 1);
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
        $pos = strtoupper(trim((string) ($player['position'] ?? 'RB')));

        $games = $season === null ? [] : $this->db->table(self::T_LOGS)
            ->where(['player_id' => $playerId, 'season' => $season])
            ->orderBy('week', 'ASC')->get()->getResultArray();

        $defenseResolver = fn (array $g) => $this->defenseFor((string) $g['opponent'], (int) $g['season'], (int) $g['week'], $provider);

        if ($pos === 'QB') {
            $tagged = QbSplitsCalculator::tagGames($games, $defenseResolver);
            $splits = QbSplitsCalculator::splits($tagged);
        } elseif ($pos === 'WR' || $pos === 'TE') {
            $tagged = ReceiverSplitsCalculator::tagGames($games, $defenseResolver);
            $splits = ReceiverSplitsCalculator::splits($tagged);
        } else {
            $tagged = RbSplitsCalculator::tagGames($games, $defenseResolver);
            $splits = RbSplitsCalculator::splits($tagged);
        }

        $report = [
            'player'     => $player,
            'position'   => $pos,
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
                'team'                => $opponent,
                'rush_def_rank'       => $defense['rush_def_rank'] ?? null,
                'rb_rec_def_rank'     => $defense['rb_rec_def_rank'] ?? null,
                'pass_def_rank'       => $defense['pass_def_rank'] ?? null,
                'pass_yds_allowed_pg' => $defense['pass_yds_allowed_pg'] ?? null,
                'pass_td_def_rank'    => $defense['pass_td_def_rank'] ?? null,
                'scoring_def_rank'    => $defense['scoring_def_rank'] ?? null,
                'points_allowed_pg'   => $defense['points_allowed_pg'] ?? null,
                'known'               => $defense !== null,
            ];
            $report['goldilocks'] = GoldilocksEngine::evaluate($tagged, $defense ?? [], $lines, $pos);
        }

        return $report;
    }

    /**
     * Models Team vs Team game matchups: final score projections, spread, total, moneyline,
     * win probabilities, and Goldilocks picks.
     */
    public function matchupReport(string $homeTeam, string $awayTeam, ?int $season = null, array $lines = []): array
    {
        $homeTeam = strtoupper(trim($homeTeam));
        $awayTeam = strtoupper(trim($awayTeam));
        $season ??= Providers\NflverseStatsProvider::currentSeason();

        // Get defensive & offensive metrics for both teams from latest defense ranks
        $homeDef = $this->defenseFor($homeTeam, $season, 99, 'nflverse') ?? $this->defenseFor($homeTeam, $season, 99, 'sample');
        $awayDef = $this->defenseFor($awayTeam, $season, 99, 'nflverse') ?? $this->defenseFor($awayTeam, $season, 99, 'sample');

        $homeAllowed = isset($homeDef['points_allowed_pg']) && (float) $homeDef['points_allowed_pg'] > 0
            ? (float) $homeDef['points_allowed_pg']
            : TeamMatchupCalculator::LEAGUE_AVG_POINTS;

        $awayAllowed = isset($awayDef['points_allowed_pg']) && (float) $awayDef['points_allowed_pg'] > 0
            ? (float) $awayDef['points_allowed_pg']
            : TeamMatchupCalculator::LEAGUE_AVG_POINTS;

        $homeRank = (int) ($homeDef['scoring_def_rank'] ?? 16);
        $awayRank = (int) ($awayDef['scoring_def_rank'] ?? 16);
        $homeScored = round(TeamMatchupCalculator::LEAGUE_AVG_POINTS + (16 - $homeRank) * 0.4, 1);
        $awayScored = round(TeamMatchupCalculator::LEAGUE_AVG_POINTS + (16 - $awayRank) * 0.4, 1);

        $homeStats = [
            'points_scored_pg'  => $homeScored,
            'points_allowed_pg' => $homeAllowed,
        ];
        $awayStats = [
            'points_scored_pg'  => $awayScored,
            'points_allowed_pg' => $awayAllowed,
        ];

        $projection = TeamMatchupCalculator::projectMatchup($homeStats, $awayStats);

        $candidates = [];
        foreach ($lines as $line) {
            $m = $line['market'] ?? '';
            if ($m === 'spread') {
                $spreadLine = (float) $line['line'];
                $homeOdds = $line['over_odds'] ?? -110;
                $awayOdds = $line['under_odds'] ?? -110;
                $ev = TeamMatchupCalculator::evaluateSpread($projection['projected_spread'], $spreadLine, $homeOdds, $awayOdds);
                $candidates[] = $ev['home'];
                $candidates[] = $ev['away'];
            } elseif ($m === 'total') {
                $totalLine = (float) $line['line'];
                $overOdds = $line['over_odds'] ?? -110;
                $underOdds = $line['under_odds'] ?? -110;
                $ev = TeamMatchupCalculator::evaluateTotal($projection['projected_total'], $totalLine, $overOdds, $underOdds);
                $candidates[] = $ev['over'];
                $candidates[] = $ev['under'];
            } elseif ($m === 'moneyline') {
                $homeMl = $line['over_odds'] ?? -110;
                $awayMl = $line['under_odds'] ?? 100;
                $ev = TeamMatchupCalculator::evaluateMoneyline($projection['home_win_prob'], $homeMl, $awayMl);
                $candidates[] = $ev['home'];
                $candidates[] = $ev['away'];
            }
        }

        $goldilocks = array_values(array_filter($candidates, static fn ($c) => $c['goldilocks'] ?? false));
        usort($goldilocks, static fn ($a, $b) => ($b['ev_per_dollar'] ?? 0) <=> ($a['ev_per_dollar'] ?? 0));
        $best = $goldilocks[0] ?? null;

        return [
            'home_team'   => $homeTeam,
            'away_team'   => $awayTeam,
            'season'      => $season,
            'home_stats'  => $homeStats,
            'away_stats'  => $awayStats,
            'home_def'    => $homeDef,
            'away_def'    => $awayDef,
            'projection'  => $projection,
            'candidates'  => $candidates,
            'best'        => $best,
            'verdict'     => $best !== null
                ? sprintf('%s is the Goldilocks pick: %.0f%% model chance vs %.0f%% priced in.', $best['pick'], ($best['model_prob'] ?? 0) * 100, ($best['market_prob'] ?? 0) * 100)
                : 'Projected score: ' . $homeTeam . ' ' . $projection['home_score'] . ', ' . $awayTeam . ' ' . $projection['away_score'] . '. Spread: ' . ($projection['projected_spread'] <= 0 ? $homeTeam . ' ' . $projection['projected_spread'] : $awayTeam . ' -' . $projection['projected_spread']) . ', Total: ' . $projection['projected_total'],
            'disclaimer'  => self::DISCLAIMER,
        ];
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
