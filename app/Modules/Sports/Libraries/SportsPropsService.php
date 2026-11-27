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

    public const T_NBA_LOGS         = 'bf_sports_nba_game_logs';
    public const T_NBA_DEFENSE      = 'bf_sports_nba_defense_ranks';
    public const T_MLB_PITCHER_LOGS = 'bf_sports_mlb_pitcher_logs';
    public const T_MLB_BATTER_LOGS  = 'bf_sports_mlb_batter_logs';
    public const T_MLB_PARK_FACTORS = 'bf_sports_mlb_park_factors';
    public const T_NHL_SKATER_LOGS  = 'bf_sports_nhl_skater_logs';
    public const T_NHL_GOALIE_LOGS  = 'bf_sports_nhl_goalie_logs';
    public const T_NHL_DEFENSE      = 'bf_sports_nhl_team_defense';
    public const T_SGP_CORRELATIONS = 'bf_sports_sgp_correlations';

    public function nbaTablesReady(): bool
    {
        return $this->db->tableExists(self::T_PLAYERS, false)
            && $this->db->tableExists(self::T_NBA_LOGS, false)
            && $this->db->tableExists(self::T_NBA_DEFENSE, false);
    }

    /**
     * Seeds realistic NBA players and sample defensive rankings if none exist yet.
     */
    public function ensureNbaSampleData(): void
    {
        if (! $this->nbaTablesReady()) {
            return;
        }

        $count = $this->db->table(self::T_PLAYERS)->where('sport', 'NBA')->countAllResults();
        if ($count > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $season = 2025;

        // Sample NBA teams
        $teams = [
            'BOS' => ['pts' => 2, 'reb' => 4, 'ast' => 3, 'threes' => 2, 'def' => 2],
            'MIN' => ['pts' => 1, 'reb' => 2, 'ast' => 1, 'threes' => 5, 'def' => 1],
            'DEN' => ['pts' => 12, 'reb' => 14, 'ast' => 11, 'threes' => 15, 'def' => 12],
            'DAL' => ['pts' => 15, 'reb' => 18, 'ast' => 16, 'threes' => 14, 'def' => 15],
            'OKC' => ['pts' => 3, 'reb' => 5, 'ast' => 4, 'threes' => 3, 'def' => 3],
            'NYK' => ['pts' => 8, 'reb' => 6, 'ast' => 9, 'threes' => 10, 'def' => 7],
            'LAL' => ['pts' => 17, 'reb' => 19, 'ast' => 20, 'threes' => 18, 'def' => 18],
            'GSW' => ['pts' => 11, 'reb' => 10, 'ast' => 12, 'threes' => 11, 'def' => 11],
            'CHA' => ['pts' => 28, 'reb' => 27, 'ast' => 29, 'threes' => 28, 'def' => 29],
            'WAS' => ['pts' => 30, 'reb' => 30, 'ast' => 30, 'threes' => 29, 'def' => 30],
            'DET' => ['pts' => 25, 'reb' => 24, 'ast' => 26, 'threes' => 26, 'def' => 25],
            'POR' => ['pts' => 26, 'reb' => 28, 'ast' => 25, 'threes' => 27, 'def' => 27],
        ];

        foreach ($teams as $t => $r) {
            $this->db->table(self::T_NBA_DEFENSE)->replace([
                'season'          => $season,
                'team'            => $t,
                'pts_def_rank'    => $r['pts'],
                'reb_def_rank'    => $r['reb'],
                'ast_def_rank'    => $r['ast'],
                'three_def_rank'  => $r['threes'],
                'def_rating_rank' => $r['def'],
                'created_at'      => $now,
                'updated_at'      => $now,
            ]);
        }

        $superstars = [
            ['name' => 'Nikola Jokic', 'team' => 'DEN', 'pos' => 'C', 'base_pts' => 29.5, 'base_reb' => 13.2, 'base_ast' => 10.1, 'base_3s' => 1.8],
            ['name' => 'Luka Doncic', 'team' => 'DAL', 'pos' => 'PG', 'base_pts' => 33.8, 'base_reb' => 9.2, 'base_ast' => 9.8, 'base_3s' => 3.8],
            ['name' => 'Shai Gilgeous-Alexander', 'team' => 'OKC', 'pos' => 'SG', 'base_pts' => 31.2, 'base_reb' => 5.5, 'base_ast' => 6.2, 'base_3s' => 1.9],
            ['name' => 'Giannis Antetokounmpo', 'team' => 'MIL', 'pos' => 'PF', 'base_pts' => 30.4, 'base_reb' => 11.5, 'base_ast' => 6.5, 'base_3s' => 0.5],
            ['name' => 'Jayson Tatum', 'team' => 'BOS', 'pos' => 'SF', 'base_pts' => 27.5, 'base_reb' => 8.1, 'base_ast' => 4.9, 'base_3s' => 3.2],
        ];

        $opponents = array_keys($teams);

        foreach ($superstars as $star) {
            $this->db->table(self::T_PLAYERS)->insert([
                'provider'    => 'sample',
                'external_id' => 'nba_' . strtolower(str_replace(' ', '_', $star['name'])),
                'full_name'   => $star['name'],
                'team'        => $star['team'],
                'position'    => $star['pos'],
                'sport'       => 'NBA',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
            $playerId = (int) $this->db->insertID();

            // Generate 12 realistic game logs across tough, neutral, and weak matchups
            for ($i = 1; $i <= 12; $i++) {
                $opp = $opponents[($i - 1) % count($opponents)];
                if ($opp === $star['team']) {
                    $opp = 'WAS';
                }
                $defRank = $teams[$opp]['pts'] ?? 15;
                // Matchup factor: tough defense suppresses scoring by 10%, weak increases by 10%
                $factor = $defRank <= 10 ? 0.90 : ($defRank >= 21 ? 1.12 : 1.0);
                $noise = (($i % 3) - 1) * 2;

                $pts = max(10, (int) round($star['base_pts'] * $factor + $noise));
                $reb = max(1, (int) round($star['base_reb'] * $factor + (($i % 2) - 0.5)));
                $ast = max(1, (int) round($star['base_ast'] * $factor + ((($i + 1) % 2) - 0.5)));
                $threes = max(0, (int) round($star['base_3s'] * $factor));

                $this->db->table(self::T_NBA_LOGS)->insert([
                    'player_id'  => $playerId,
                    'season'     => $season,
                    'game_date'  => date('Y-m-d', strtotime("-{$i} days")),
                    'opponent'   => $opp,
                    'home_away'  => $i % 2 === 0 ? 'H' : 'A',
                    'minutes'    => 35.5,
                    'pts'        => $pts,
                    'reb'        => $reb,
                    'ast'        => $ast,
                    'threes'     => $threes,
                    'steals'     => ($i % 3 === 0) ? 2 : 1,
                    'blocks'     => ($star['pos'] === 'C' || $star['pos'] === 'PF') ? 2 : 0,
                    'turnovers'  => 3,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }

    /**
     * @return list<array<string,mixed>>
     */
    public function listNbaPlayers(?int $season = null, ?string $pos = null): array
    {
        if (! $this->nbaTablesReady()) {
            return [];
        }

        $this->ensureNbaSampleData();

        $season ??= 2025;
        $b = $this->db->table(self::T_PLAYERS)
            ->where('sport', 'NBA');

        if ($pos !== null && $pos !== 'ALL') {
            $b->where('position', strtoupper(trim($pos)));
        }

        $players = $b->orderBy('full_name', 'ASC')->get()->getResultArray();
        $out = [];

        foreach ($players as $p) {
            $logs = $this->db->table(self::T_NBA_LOGS)
                ->where('player_id', (int) $p['id'])
                ->where('season', $season)
                ->get()
                ->getResultArray();

            $n = count($logs);
            if ($n === 0) {
                continue;
            }

            $sumPts = array_sum(array_column($logs, 'pts'));
            $sumReb = array_sum(array_column($logs, 'reb'));
            $sumAst = array_sum(array_column($logs, 'ast'));
            $sum3s = array_sum(array_column($logs, 'threes'));

            $out[] = array_merge($p, [
                'games'     => $n,
                'season'    => $season,
                'pts_pg'    => round($sumPts / $n, 1),
                'reb_pg'    => round($sumReb / $n, 1),
                'ast_pg'    => round($sumAst / $n, 1),
                'threes_pg' => round($sum3s / $n, 1),
                'pra_pg'    => round(($sumPts + $sumReb + $sumAst) / $n, 1),
            ]);
        }

        return $out;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function nbaPlayerReport(int $playerId, ?int $season = null, ?string $opponent = null, array $lines = []): ?array
    {
        if (! $this->nbaTablesReady()) {
            return null;
        }

        $player = $this->db->table(self::T_PLAYERS)
            ->where('id', $playerId)
            ->get()
            ->getRowArray();

        if ($player === null) {
            return null;
        }

        $season ??= 2025;
        $games = $this->db->table(self::T_NBA_LOGS)
            ->where('player_id', $playerId)
            ->where('season', $season)
            ->orderBy('game_date', 'ASC')
            ->get()
            ->getResultArray();

        $defenseRows = $this->db->table(self::T_NBA_DEFENSE)
            ->where('season', $season)
            ->get()
            ->getResultArray();

        $defByTeam = [];
        foreach ($defenseRows as $dr) {
            $defByTeam[$dr['team']] = $dr;
        }

        $tagged = NbaSplitsCalculator::tagGames($games, $defByTeam);
        $splits = NbaSplitsCalculator::splits($tagged);

        $eval = [];
        if ($opponent !== null && $opponent !== '') {
            $oppDef = $defByTeam[strtoupper(trim($opponent))] ?? [];
            if ($lines === []) {
                // If no specific lines offered, build baseline lines around player season averages
                $lines = [
                    ['market' => 'pts', 'line' => (float) ($splits['pts']['overall']['avg'] ?? 25.5), 'over_odds' => -110, 'under_odds' => -110],
                    ['market' => 'reb', 'line' => (float) ($splits['reb']['overall']['avg'] ?? 7.5), 'over_odds' => -110, 'under_odds' => -110],
                    ['market' => 'ast', 'line' => (float) ($splits['ast']['overall']['avg'] ?? 6.5), 'over_odds' => -110, 'under_odds' => -110],
                    ['market' => 'pra', 'line' => (float) ($splits['pra']['overall']['avg'] ?? 39.5), 'over_odds' => -110, 'under_odds' => -110],
                ];
            }
            $eval = GoldilocksEngine::evaluate($tagged, $oppDef, $lines, $player['position']);
        }

        return [
            'player'       => $player,
            'season'       => $season,
            'opponent'     => $opponent,
            'tagged_games' => $tagged,
            'splits'       => $splits,
            'evaluation'   => $eval,
        ];
    }

    /**
     * @return list<string>
     */
    public function nbaTeams(?int $season = null): array
    {
        if (! $this->nbaTablesReady()) {
            return [];
        }

        $season ??= 2025;
        $rows = $this->db->table(self::T_NBA_DEFENSE)
            ->select('team')
            ->where('season', $season)
            ->orderBy('team', 'ASC')
            ->get()
            ->getResultArray();

        return array_column($rows, 'team');
    }

    /**
     * Returns multi-book odds comparison matrix across DraftKings, FanDuel, BetMGM, and Caesars.
     *
     * @return list<array<string,mixed>>
     */
    public function multiBookOddsMatrix(string $sport = 'NFL'): array
    {
        $sport = strtoupper(trim($sport));

        if ($sport === 'NBA') {
            return [
                [
                    'name'            => 'Nikola Jokic',
                    'event'           => 'DEN @ BOS',
                    'market_label'    => 'Points',
                    'consensus_line'  => 29.5,
                    'books'           => [
                        'DraftKings' => ['line' => 29.5, 'over_odds' => -110, 'under_odds' => -110],
                        'FanDuel'    => ['line' => 28.5, 'over_odds' => -120, 'under_odds' => 100],
                        'BetMGM'     => ['line' => 29.5, 'over_odds' => -115, 'under_odds' => -105],
                        'Caesars'    => ['line' => 30.5, 'over_odds' => 105, 'under_odds' => -125],
                    ],
                    'best_over_book'  => 'FanDuel',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => '2.0 Pt Line Gap (FD 28.5 vs CZR 30.5)',
                ],
                [
                    'name'            => 'Luka Doncic',
                    'event'           => 'DAL @ OKC',
                    'market_label'    => 'Pts + Reb + Ast',
                    'consensus_line'  => 51.5,
                    'books'           => [
                        'DraftKings' => ['line' => 51.5, 'over_odds' => -115, 'under_odds' => -105],
                        'FanDuel'    => ['line' => 51.5, 'over_odds' => -110, 'under_odds' => -110],
                        'BetMGM'     => ['line' => 50.5, 'over_odds' => -125, 'under_odds' => 105],
                        'Caesars'    => ['line' => 52.5, 'over_odds' => 100, 'under_odds' => -120],
                    ],
                    'best_over_book'  => 'BetMGM',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => '+EV Spread Gap (MGM 50.5 vs CZR 52.5)',
                ],
                [
                    'name'            => 'Boston Celtics',
                    'event'           => 'DEN @ BOS',
                    'market_label'    => 'Point Spread',
                    'consensus_line'  => -4.5,
                    'books'           => [
                        'DraftKings' => ['line' => -4.5, 'over_odds' => -110, 'under_odds' => -110],
                        'FanDuel'    => ['line' => -4.0, 'over_odds' => -115, 'under_odds' => -105],
                        'BetMGM'     => ['line' => -4.5, 'over_odds' => -110, 'under_odds' => -110],
                        'Caesars'    => ['line' => -5.0, 'over_odds' => 100, 'under_odds' => -120],
                    ],
                    'best_over_book'  => 'FanDuel',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => 'Key 1-Pt Spread Discrepancy (-4.0 vs -5.0)',
                ],
            ];
        }

        if ($sport === 'MLB') {
            return [
                [
                    'name'            => 'Tarik Skubal',
                    'event'           => 'DET @ CLE',
                    'market_label'    => 'Pitcher Strikeouts',
                    'consensus_line'  => 7.5,
                    'books'           => [
                        'DraftKings' => ['line' => 7.5, 'over_odds' => -115, 'under_odds' => -105],
                        'FanDuel'    => ['line' => 6.5, 'over_odds' => -130, 'under_odds' => 105],
                        'BetMGM'     => ['line' => 7.5, 'over_odds' => -110, 'under_odds' => -110],
                        'Caesars'    => ['line' => 7.5, 'over_odds' => -105, 'under_odds' => -120],
                    ],
                    'best_over_book'  => 'FanDuel',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => '1.0 K Line Gap (FD 6.5 vs DK/MGM 7.5)',
                ],
                [
                    'name'            => 'Aaron Judge',
                    'event'           => 'NYY @ BOS',
                    'market_label'    => 'Total Bases',
                    'consensus_line'  => 1.5,
                    'books'           => [
                        'DraftKings' => ['line' => 1.5, 'over_odds' => -110, 'under_odds' => -110],
                        'FanDuel'    => ['line' => 1.5, 'over_odds' => -105, 'under_odds' => -118],
                        'BetMGM'     => ['line' => 1.5, 'over_odds' => -115, 'under_odds' => -105],
                        'Caesars'    => ['line' => 1.5, 'over_odds' => 102, 'under_odds' => -125],
                    ],
                    'best_over_book'  => 'Caesars',
                    'best_under_book' => 'FanDuel',
                    'discrepancy'     => '+EV Plus-Money Over Available (+102 CZR)',
                ],
                [
                    'name'            => 'New York Yankees',
                    'event'           => 'NYY @ BOS',
                    'market_label'    => 'First 5 (F5) Run Line',
                    'consensus_line'  => -0.5,
                    'books'           => [
                        'DraftKings' => ['line' => -0.5, 'over_odds' => -125, 'under_odds' => 105],
                        'FanDuel'    => ['line' => -0.5, 'over_odds' => -120, 'under_odds' => 100],
                        'BetMGM'     => ['line' => -0.5, 'over_odds' => -130, 'under_odds' => 110],
                        'Caesars'    => ['line' => -0.5, 'over_odds' => -118, 'under_odds' => -105],
                    ],
                    'best_over_book'  => 'Caesars',
                    'best_under_book' => 'BetMGM',
                    'discrepancy'     => '12c Juice Differential on F5 Favorite',
                ],
            ];
        }

        if ($sport === 'NHL') {
            return [
                [
                    'name'            => 'Connor McDavid',
                    'event'           => 'EDM @ CGY',
                    'market_label'    => 'Shots on Goal (SOG)',
                    'consensus_line'  => 3.5,
                    'books'           => [
                        'DraftKings' => ['line' => 3.5, 'over_odds' => -115, 'under_odds' => -105],
                        'FanDuel'    => ['line' => 3.5, 'over_odds' => -108, 'under_odds' => -114],
                        'BetMGM'     => ['line' => 3.5, 'over_odds' => -120, 'under_odds' => 100],
                        'Caesars'    => ['line' => 4.5, 'over_odds' => 115, 'under_odds' => -140],
                    ],
                    'best_over_book'  => 'FanDuel',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => '1.0 SOG Line Spread (FD 3.5 vs CZR 4.5)',
                ],
                [
                    'name'            => 'Igor Shesterkin',
                    'event'           => 'NYR @ NJD',
                    'market_label'    => 'Goalie Saves',
                    'consensus_line'  => 28.5,
                    'books'           => [
                        'DraftKings' => ['line' => 28.5, 'over_odds' => -110, 'under_odds' => -110],
                        'FanDuel'    => ['line' => 27.5, 'over_odds' => -125, 'under_odds' => 102],
                        'BetMGM'     => ['line' => 28.5, 'over_odds' => -115, 'under_odds' => -105],
                        'Caesars'    => ['line' => 29.5, 'over_odds' => 105, 'under_odds' => -130],
                    ],
                    'best_over_book'  => 'FanDuel',
                    'best_under_book' => 'Caesars',
                    'discrepancy'     => '2.0 Save Margin Across Books (27.5 vs 29.5)',
                ],
                [
                    'name'            => 'Edmonton Oilers',
                    'event'           => 'EDM @ CGY',
                    'market_label'    => 'Puck Line (-1.5)',
                    'consensus_line'  => -1.5,
                    'books'           => [
                        'DraftKings' => ['line' => -1.5, 'over_odds' => 135, 'under_odds' => -160],
                        'FanDuel'    => ['line' => -1.5, 'over_odds' => 140, 'under_odds' => -170],
                        'BetMGM'     => ['line' => -1.5, 'over_odds' => 130, 'under_odds' => -155],
                        'Caesars'    => ['line' => -1.5, 'over_odds' => 142, 'under_odds' => -175],
                    ],
                    'best_over_book'  => 'Caesars',
                    'best_under_book' => 'BetMGM',
                    'discrepancy'     => '12c Spread on +Money Puck Line',
                ],
            ];
        }

        // NFL Multi-Book Board
        return [
            [
                'name'            => 'Patrick Mahomes',
                'event'           => 'KC @ BUF',
                'market_label'    => 'Passing Yards',
                'consensus_line'  => 255.5,
                'books'           => [
                    'DraftKings' => ['line' => 254.5, 'over_odds' => -110, 'under_odds' => -110],
                    'FanDuel'    => ['line' => 255.5, 'over_odds' => -112, 'under_odds' => -108],
                    'BetMGM'     => ['line' => 253.5, 'over_odds' => -118, 'under_odds' => -102],
                    'Caesars'    => ['line' => 256.5, 'over_odds' => 104, 'under_odds' => -124],
                ],
                'best_over_book'  => 'BetMGM',
                'best_under_book' => 'Caesars',
                'discrepancy'     => '3.0 Yd Passing Gap (MGM 253.5 vs CZR 256.5)',
            ],
            [
                'name'            => 'Saquon Barkley',
                'event'           => 'PHI @ DAL',
                'market_label'    => 'Rushing Yards',
                'consensus_line'  => 82.5,
                'books'           => [
                    'DraftKings' => ['line' => 82.5, 'over_odds' => -110, 'under_odds' => -110],
                    'FanDuel'    => ['line' => 81.5, 'over_odds' => -118, 'under_odds' => -102],
                    'BetMGM'     => ['line' => 82.5, 'over_odds' => -115, 'under_odds' => -105],
                    'Caesars'    => ['line' => 83.5, 'over_odds' => 102, 'under_odds' => -122],
                ],
                'best_over_book'  => 'FanDuel',
                'best_under_book' => 'Caesars',
                'discrepancy'     => '2.0 Yd Rush Line Discrepancy',
            ],
            [
                'name'            => 'Kansas City Chiefs',
                'event'           => 'KC @ BUF',
                'market_label'    => 'Point Spread',
                'consensus_line'  => 2.5,
                'books'           => [
                    'DraftKings' => ['line' => 2.5, 'over_odds' => -110, 'under_odds' => -110],
                    'FanDuel'    => ['line' => 3.0, 'over_odds' => -115, 'under_odds' => -105],
                    'BetMGM'     => ['line' => 2.5, 'over_odds' => -112, 'under_odds' => -108],
                    'Caesars'    => ['line' => 3.0, 'over_odds' => -105, 'under_odds' => -115],
                ],
                'best_over_book'  => 'FanDuel',
                'best_under_book' => 'DraftKings',
                'discrepancy'     => 'Critical 3.0 Key Number Spread Line',
            ],
        ];
    }

    public function mlbTablesReady(): bool
    {
        return $this->db->tableExists(self::T_PLAYERS, false)
            && $this->db->tableExists(self::T_MLB_PITCHER_LOGS, false)
            && $this->db->tableExists(self::T_MLB_BATTER_LOGS, false)
            && $this->db->tableExists(self::T_MLB_PARK_FACTORS, false);
    }

    public function ensureMlbSampleData(): void
    {
        if (! $this->mlbTablesReady()) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $season = 2025;

        // Seed park factors
        $parks = [
            ['team' => 'COL', 'venue' => 'Coors Field', 'run' => 1.180, 'hr' => 1.150, 'alt' => 5280, 'dome' => 0],
            ['team' => 'BOS', 'venue' => 'Fenway Park', 'run' => 1.080, 'hr' => 0.980, 'alt' => 20, 'dome' => 0],
            ['team' => 'NYY', 'venue' => 'Yankee Stadium', 'run' => 1.040, 'hr' => 1.140, 'alt' => 54, 'dome' => 0],
            ['team' => 'LAD', 'venue' => 'Dodger Stadium', 'run' => 1.020, 'hr' => 1.120, 'alt' => 267, 'dome' => 0],
            ['team' => 'HOU', 'venue' => 'Minute Maid Park', 'run' => 0.990, 'hr' => 1.030, 'alt' => 42, 'dome' => 1],
            ['team' => 'SD',  'venue' => 'Petco Park', 'run' => 0.920, 'hr' => 0.880, 'alt' => 13, 'dome' => 0],
        ];

        foreach ($parks as $p) {
            $this->db->table(self::T_MLB_PARK_FACTORS)->replace([
                'team'          => $p['team'],
                'venue_name'    => $p['venue'],
                'run_factor'    => $p['run'],
                'hr_factor'     => $p['hr'],
                'altitude_feet' => $p['alt'],
                'is_dome'       => $p['dome'],
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }

        $count = $this->db->table(self::T_PLAYERS)->where('sport', 'MLB')->countAllResults();
        if ($count > 0) {
            return;
        }

        $opponents = ['COL', 'BOS', 'NYY', 'LAD', 'HOU', 'SD'];

        // Pitchers
        $pitchers = [
            ['name' => 'Tarik Skubal', 'team' => 'DET', 'pos' => 'SP', 'base_k' => 8.2, 'base_ip' => 6.2, 'base_er' => 1.8],
            ['name' => 'Zack Wheeler', 'team' => 'PHI', 'pos' => 'SP', 'base_k' => 7.6, 'base_ip' => 6.1, 'base_er' => 2.1],
            ['name' => 'Paul Skenes', 'team' => 'PIT', 'pos' => 'SP', 'base_k' => 8.5, 'base_ip' => 6.0, 'base_er' => 1.9],
        ];

        foreach ($pitchers as $pitcher) {
            $this->db->table(self::T_PLAYERS)->insert([
                'provider'    => 'sample',
                'external_id' => 'mlb_' . strtolower(str_replace(' ', '_', $pitcher['name'])),
                'full_name'   => $pitcher['name'],
                'team'        => $pitcher['team'],
                'position'    => $pitcher['pos'],
                'sport'       => 'MLB',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
            $playerId = (int) $this->db->insertID();

            for ($i = 1; $i <= 12; $i++) {
                $opp = $opponents[($i - 1) % count($opponents)];
                $kRank = ($i % 3 === 0) ? 5 : (($i % 3 === 1) ? 15 : 26);
                $noise = (($i % 4) - 1.5);
                $ks = max(3, (int) round($pitcher['base_k'] + $noise + ($kRank <= 10 ? 1.5 : -1.0)));
                $er = max(0, (int) round($pitcher['base_er'] + (($i % 3) - 1)));

                $this->db->table(self::T_MLB_PITCHER_LOGS)->insert([
                    'player_id'       => $playerId,
                    'season'          => $season,
                    'game_date'       => date('Y-m-d', strtotime("-{$i} days")),
                    'opponent'        => $opp,
                    'home_away'       => $i % 2 === 0 ? 'H' : 'A',
                    'ip'              => $pitcher['base_ip'],
                    'strikeouts'      => $ks,
                    'walks'           => ($i % 3 === 0) ? 2 : 1,
                    'hits_allowed'    => max(2, (int) round(4.5 + (($i % 3) - 1))),
                    'er'              => $er,
                    'pitches'         => (int) round(92 + (($i % 3) * 4)),
                    'swings_misses'   => (int) round(14 + (($i % 3) * 2)),
                    'opp_k_rate_rank' => $kRank,
                    'created_at'      => $now,
                    'updated_at'      => $now,
                ]);
            }
        }

        // Batters
        $batters = [
            ['name' => 'Aaron Judge', 'team' => 'NYY', 'pos' => 'OF', 'base_tb' => 2.4, 'base_hits' => 1.3, 'base_hr' => 0.38],
            ['name' => 'Shohei Ohtani', 'team' => 'LAD', 'pos' => 'DH', 'base_tb' => 2.5, 'base_hits' => 1.4, 'base_hr' => 0.40],
            ['name' => 'Juan Soto', 'team' => 'NYY', 'pos' => 'OF', 'base_tb' => 2.0, 'base_hits' => 1.2, 'base_hr' => 0.28],
            ['name' => 'Gunnar Henderson', 'team' => 'BAL', 'pos' => 'SS', 'base_tb' => 2.1, 'base_hits' => 1.2, 'base_hr' => 0.25],
        ];

        foreach ($batters as $batter) {
            $this->db->table(self::T_PLAYERS)->insert([
                'provider'    => 'sample',
                'external_id' => 'mlb_' . strtolower(str_replace(' ', '_', $batter['name'])),
                'full_name'   => $batter['name'],
                'team'        => $batter['team'],
                'position'    => $batter['pos'],
                'sport'       => 'MLB',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
            $playerId = (int) $this->db->insertID();

            for ($i = 1; $i <= 12; $i++) {
                $opp = $opponents[($i - 1) % count($opponents)];
                $hand = $i % 3 === 0 ? 'L' : 'R';
                $hits = ($i % 4 === 0) ? 0 : (($i % 4 === 3) ? 2 : 1);
                $isHr = ($i % 3 === 0) ? 1 : 0;
                $is2b = ($i % 4 === 2) ? 1 : 0;
                $tb = $isHr ? 4 : ($is2b ? 2 : $hits);

                $this->db->table(self::T_MLB_BATTER_LOGS)->insert([
                    'player_id'        => $playerId,
                    'season'           => $season,
                    'game_date'        => date('Y-m-d', strtotime("-{$i} days")),
                    'opponent'         => $opp,
                    'home_away'        => $i % 2 === 0 ? 'H' : 'A',
                    'opp_pitcher_hand' => $hand,
                    'at_bats'          => 4,
                    'hits'             => $hits,
                    'doubles'          => $is2b,
                    'triples'          => 0,
                    'home_runs'        => $isHr,
                    'total_bases'      => $tb,
                    'rbi'              => $isHr ? 2 : ($hits > 0 ? 1 : 0),
                    'runs'             => $hits > 0 ? 1 : 0,
                    'strikeouts'       => ($i % 2 === 0) ? 1 : 0,
                    'walks'            => ($i % 3 === 0) ? 1 : 0,
                    'created_at'       => $now,
                    'updated_at'       => $now,
                ]);
            }
        }
    }

    /**
     * @return list<array<string,mixed>>
     */
    public function listMlbPlayers(?int $season = null, ?string $pos = null): array
    {
        if (! $this->mlbTablesReady()) {
            return [];
        }

        $this->ensureMlbSampleData();

        $season ??= 2025;
        $b = $this->db->table(self::T_PLAYERS)->where('sport', 'MLB');

        if ($pos !== null && $pos !== 'ALL') {
            if ($pos === 'PITCHER') {
                $b->whereIn('position', ['SP', 'RP']);
            } elseif ($pos === 'BATTER') {
                $b->whereNotIn('position', ['SP', 'RP']);
            } else {
                $b->where('position', strtoupper(trim($pos)));
            }
        }

        $players = $b->orderBy('full_name', 'ASC')->get()->getResultArray();
        $out = [];

        foreach ($players as $p) {
            $isPitcher = in_array($p['position'], ['SP', 'RP'], true);
            $logTable = $isPitcher ? self::T_MLB_PITCHER_LOGS : self::T_MLB_BATTER_LOGS;

            $logs = $this->db->table($logTable)
                ->where('player_id', (int) $p['id'])
                ->where('season', $season)
                ->get()
                ->getResultArray();

            $n = count($logs);
            if ($n === 0) {
                continue;
            }

            if ($isPitcher) {
                $sumK = array_sum(array_column($logs, 'strikeouts'));
                $sumIp = array_sum(array_column($logs, 'ip'));
                $sumEr = array_sum(array_column($logs, 'er'));
                $out[] = array_merge($p, [
                    'games'    => $n,
                    'season'   => $season,
                    'type'     => 'Pitcher',
                    'k_pg'     => round($sumK / $n, 1),
                    'ip_pg'    => round($sumIp / $n, 1),
                    'era'      => round(($sumEr * 9.0) / max(1.0, $sumIp), 2),
                ]);
            } else {
                $sumHits = array_sum(array_column($logs, 'hits'));
                $sumAb = array_sum(array_column($logs, 'at_bats'));
                $sumTb = array_sum(array_column($logs, 'total_bases'));
                $sumHr = array_sum(array_column($logs, 'home_runs'));
                $out[] = array_merge($p, [
                    'games'    => $n,
                    'season'   => $season,
                    'type'     => 'Batter',
                    'avg'      => round($sumHits / max(1, $sumAb), 3),
                    'tb_pg'    => round($sumTb / $n, 1),
                    'hr_total' => (int) $sumHr,
                ]);
            }
        }

        return $out;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function mlbPlayerReport(int $playerId, ?int $season = null, ?string $opponent = null): ?array
    {
        if (! $this->mlbTablesReady()) {
            return null;
        }

        $player = $this->db->table(self::T_PLAYERS)->where('id', $playerId)->get()->getRowArray();
        if ($player === null) {
            return null;
        }

        $season ??= 2025;
        $isPitcher = in_array($player['position'], ['SP', 'RP'], true);
        $logTable = $isPitcher ? self::T_MLB_PITCHER_LOGS : self::T_MLB_BATTER_LOGS;

        $games = $this->db->table($logTable)
            ->where('player_id', $playerId)
            ->where('season', $season)
            ->orderBy('game_date', 'ASC')
            ->get()
            ->getResultArray();

        $parks = $this->mlbParkFactors();
        $opp = strtoupper(trim((string) ($opponent ?? 'COL')));
        $park = $parks[$opp] ?? ['run_factor' => 1.0, 'hr_factor' => 1.0, 'altitude_feet' => 0];

        $splits = $isPitcher ? MlbSplitsCalculator::pitcherSplits($games) : MlbSplitsCalculator::batterSplits($games);
        $f5 = $isPitcher ? MlbSplitsCalculator::f5Projection(3.20, 4.10, (float) ($park['run_factor'] ?? 1.0), true) : [];

        return [
            'player'     => $player,
            'is_pitcher' => $isPitcher,
            'season'     => $season,
            'opponent'   => $opp,
            'park'       => $park,
            'games'      => $games,
            'splits'     => $splits,
            'f5'         => $f5,
        ];
    }

    /**
     * @return array<string,array<string,mixed>>
     */
    public function mlbParkFactors(): array
    {
        if (! $this->mlbTablesReady()) {
            return [];
        }

        $rows = $this->db->table(self::T_MLB_PARK_FACTORS)->get()->getResultArray();
        $out = [];
        foreach ($rows as $r) {
            $out[$r['team']] = $r;
        }

        return $out;
    }

    public function nhlTablesReady(): bool
    {
        return $this->db->tableExists(self::T_PLAYERS, false)
            && $this->db->tableExists(self::T_NHL_SKATER_LOGS, false)
            && $this->db->tableExists(self::T_NHL_GOALIE_LOGS, false)
            && $this->db->tableExists(self::T_NHL_DEFENSE, false);
    }

    public function ensureNhlSampleData(): void
    {
        if (! $this->nhlTablesReady()) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $season = 2025;

        // Seed defense rankings
        $defTeams = [
            'CAR' => ['sog_pg' => 25.8, 'sog_r' => 1,  'ga_pg' => 2.38, 'ga_r' => 1,  'pk' => 86.2, 'pk_r' => 1,  'pp' => 24.1, 'pp_r' => 5],
            'BOS' => ['sog_pg' => 27.2, 'sog_r' => 2,  'ga_pg' => 2.45, 'ga_r' => 2,  'pk' => 84.5, 'pk_r' => 3,  'pp' => 23.2, 'pp_r' => 8],
            'NYR' => ['sog_pg' => 29.5, 'sog_r' => 12, 'ga_pg' => 2.75, 'ga_r' => 8,  'pk' => 83.1, 'pk_r' => 6,  'pp' => 26.5, 'pp_r' => 2],
            'EDM' => ['sog_pg' => 28.4, 'sog_r' => 9,  'ga_pg' => 2.85, 'ga_r' => 11, 'pk' => 79.5, 'pk_r' => 18, 'pp' => 27.8, 'pp_r' => 1],
            'ANA' => ['sog_pg' => 33.8, 'sog_r' => 30, 'ga_pg' => 3.65, 'ga_r' => 30, 'pk' => 75.1, 'pk_r' => 27, 'pp' => 17.8, 'pp_r' => 26],
            'SJS' => ['sog_pg' => 35.1, 'sog_r' => 32, 'ga_pg' => 3.92, 'ga_r' => 32, 'pk' => 73.2, 'pk_r' => 31, 'pp' => 16.5, 'pp_r' => 28],
        ];

        foreach ($defTeams as $t => $d) {
            $this->db->table(self::T_NHL_DEFENSE)->replace([
                'season'         => $season,
                'team'           => $t,
                'sog_allowed_pg' => $d['sog_pg'],
                'sog_def_rank'   => $d['sog_r'],
                'ga_pg'          => $d['ga_pg'],
                'ga_def_rank'    => $d['ga_r'],
                'pk_pct'         => $d['pk'],
                'pk_def_rank'    => $d['pk_r'],
                'pp_pct'         => $d['pp'],
                'pp_rank'        => $d['pp_r'],
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
        }

        $count = $this->db->table(self::T_PLAYERS)->where('sport', 'NHL')->countAllResults();
        if ($count > 0) {
            return;
        }

        $opponents = array_keys($defTeams);

        // Skaters
        $skaters = [
            ['name' => 'Connor McDavid', 'team' => 'EDM', 'pos' => 'C', 'base_sog' => 3.9, 'base_pts' => 1.6, 'base_g' => 0.6, 'base_a' => 1.0],
            ['name' => 'Auston Matthews', 'team' => 'TOR', 'pos' => 'C', 'base_sog' => 4.4, 'base_pts' => 1.3, 'base_g' => 0.8, 'base_a' => 0.5],
            ['name' => 'Nathan MacKinnon', 'team' => 'COL', 'pos' => 'C', 'base_sog' => 4.6, 'base_pts' => 1.6, 'base_g' => 0.6, 'base_a' => 1.0],
            ['name' => 'Nikita Kucherov', 'team' => 'TBL', 'pos' => 'RW', 'base_sog' => 3.8, 'base_pts' => 1.7, 'base_g' => 0.5, 'base_a' => 1.2],
        ];

        foreach ($skaters as $skater) {
            $this->db->table(self::T_PLAYERS)->insert([
                'provider'    => 'sample',
                'external_id' => 'nhl_' . strtolower(str_replace(' ', '_', $skater['name'])),
                'full_name'   => $skater['name'],
                'team'        => $skater['team'],
                'position'    => $skater['pos'],
                'sport'       => 'NHL',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
            $playerId = (int) $this->db->insertID();

            for ($i = 1; $i <= 12; $i++) {
                $opp = $opponents[($i - 1) % count($opponents)];
                $sog = max(1, (int) round($skater['base_sog'] + (($i % 3) - 1)));
                $g = ($i % 3 === 0) ? 1 : (($i % 5 === 0) ? 2 : 0);
                $a = ($i % 2 === 0) ? 1 : (($i % 4 === 0) ? 2 : 0);

                $this->db->table(self::T_NHL_SKATER_LOGS)->insert([
                    'player_id'        => $playerId,
                    'season'           => $season,
                    'game_date'        => date('Y-m-d', strtotime("-{$i} days")),
                    'opponent'         => $opp,
                    'home_away'        => $i % 2 === 0 ? 'H' : 'A',
                    'toi_minutes'      => 21.5,
                    'shots_on_goal'    => $sog,
                    'shot_attempts'    => (int) round($sog * 1.6),
                    'goals'            => $g,
                    'assists'          => $a,
                    'points'           => $g + $a,
                    'powerplay_points' => ($g > 0 && $i % 2 === 0) ? 1 : 0,
                    'blocked_shots'    => ($i % 3 === 0) ? 1 : 0,
                    'created_at'       => $now,
                    'updated_at'       => $now,
                ]);
            }
        }

        // Goalies
        $goalies = [
            ['name' => 'Igor Shesterkin', 'team' => 'NYR', 'pos' => 'G', 'base_saves' => 29.5, 'base_ga' => 2.3, 'base_sp' => 0.925],
            ['name' => 'Connor Hellebuyck', 'team' => 'WPG', 'pos' => 'G', 'base_saves' => 28.8, 'base_ga' => 2.1, 'base_sp' => 0.930],
        ];

        foreach ($goalies as $goalie) {
            $this->db->table(self::T_PLAYERS)->insert([
                'provider'    => 'sample',
                'external_id' => 'nhl_' . strtolower(str_replace(' ', '_', $goalie['name'])),
                'full_name'   => $goalie['name'],
                'team'        => $goalie['team'],
                'position'    => $goalie['pos'],
                'sport'       => 'NHL',
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
            $playerId = (int) $this->db->insertID();

            for ($i = 1; $i <= 12; $i++) {
                $opp = $opponents[($i - 1) % count($opponents)];
                $saves = max(20, (int) round($goalie['base_saves'] + (($i % 4) - 1.5) * 3));
                $ga = max(0, (int) round($goalie['base_ga'] + (($i % 3) - 1)));
                $shots = $saves + $ga;
                $sp = round($saves / max(1, $shots), 3);

                $this->db->table(self::T_NHL_GOALIE_LOGS)->insert([
                    'player_id'     => $playerId,
                    'season'        => $season,
                    'game_date'     => date('Y-m-d', strtotime("-{$i} days")),
                    'opponent'      => $opp,
                    'home_away'     => $i % 2 === 0 ? 'H' : 'A',
                    'shots_faced'   => $shots,
                    'saves'         => $saves,
                    'goals_against' => $ga,
                    'save_pct'      => $sp,
                    'xga'           => round($ga + 0.3, 2),
                    'decision'      => $ga <= 2 ? 'W' : 'L',
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ]);
            }
        }
    }

    /**
     * @return list<array<string,mixed>>
     */
    public function listNhlPlayers(?int $season = null, ?string $pos = null): array
    {
        if (! $this->nhlTablesReady()) {
            return [];
        }

        $this->ensureNhlSampleData();

        $season ??= 2025;
        $b = $this->db->table(self::T_PLAYERS)->where('sport', 'NHL');

        if ($pos !== null && $pos !== 'ALL') {
            if ($pos === 'SKATER') {
                $b->where('position !=', 'G');
            } elseif ($pos === 'GOALIE') {
                $b->where('position', 'G');
            } else {
                $b->where('position', strtoupper(trim($pos)));
            }
        }

        $players = $b->orderBy('full_name', 'ASC')->get()->getResultArray();
        $out = [];

        foreach ($players as $p) {
            $isGoalie = $p['position'] === 'G';
            $logTable = $isGoalie ? self::T_NHL_GOALIE_LOGS : self::T_NHL_SKATER_LOGS;

            $logs = $this->db->table($logTable)
                ->where('player_id', (int) $p['id'])
                ->where('season', $season)
                ->get()
                ->getResultArray();

            $n = count($logs);
            if ($n === 0) {
                continue;
            }

            if ($isGoalie) {
                $sumSaves = array_sum(array_column($logs, 'saves'));
                $sumGa = array_sum(array_column($logs, 'goals_against'));
                $sumShots = array_sum(array_column($logs, 'shots_faced'));
                $out[] = array_merge($p, [
                    'games'    => $n,
                    'season'   => $season,
                    'type'     => 'Goalie',
                    'saves_pg' => round($sumSaves / $n, 1),
                    'ga_pg'    => round($sumGa / $n, 2),
                    'save_pct' => round($sumSaves / max(1, $sumShots), 3),
                ]);
            } else {
                $sumSog = array_sum(array_column($logs, 'shots_on_goal'));
                $sumPts = array_sum(array_column($logs, 'points'));
                $sumG = array_sum(array_column($logs, 'goals'));
                $sumA = array_sum(array_column($logs, 'assists'));
                $out[] = array_merge($p, [
                    'games'    => $n,
                    'season'   => $season,
                    'type'     => 'Skater',
                    'sog_pg'   => round($sumSog / $n, 1),
                    'pts_pg'   => round($sumPts / $n, 1),
                    'goals'    => (int) $sumG,
                    'assists'  => (int) $sumA,
                ]);
            }
        }

        return $out;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function nhlPlayerReport(int $playerId, ?int $season = null, ?string $opponent = null): ?array
    {
        if (! $this->nhlTablesReady()) {
            return null;
        }

        $player = $this->db->table(self::T_PLAYERS)->where('id', $playerId)->get()->getRowArray();
        if ($player === null) {
            return null;
        }

        $season ??= 2025;
        $isGoalie = $player['position'] === 'G';
        $logTable = $isGoalie ? self::T_NHL_GOALIE_LOGS : self::T_NHL_SKATER_LOGS;

        $games = $this->db->table($logTable)
            ->where('player_id', $playerId)
            ->where('season', $season)
            ->orderBy('game_date', 'ASC')
            ->get()
            ->getResultArray();

        $defByTeam = $this->nhlTeamsDefense($season);
        $opp = strtoupper(trim((string) ($opponent ?? 'SJS')));
        $oppDef = $defByTeam[$opp] ?? [];

        $splits = $isGoalie ? [] : NhlSplitsCalculator::skaterSplits($games, $defByTeam);
        $specialTeams = NhlSplitsCalculator::specialTeamsEdge(26.5, (float) ($oppDef['pk_pct'] ?? 80.0));

        return [
            'player'        => $player,
            'is_goalie'     => $isGoalie,
            'season'        => $season,
            'opponent'      => $opp,
            'opp_defense'   => $oppDef,
            'games'         => $games,
            'splits'        => $splits,
            'special_teams' => $specialTeams,
        ];
    }

    /**
     * @return array<string,array<string,mixed>>
     */
    public function nhlTeamsDefense(?int $season = null): array
    {
        if (! $this->nhlTablesReady()) {
            return [];
        }

        $season ??= 2025;
        $rows = $this->db->table(self::T_NHL_DEFENSE)
            ->where('season', $season)
            ->get()
            ->getResultArray();

        $out = [];
        foreach ($rows as $r) {
            $out[$r['team']] = $r;
        }

        return $out;
    }

    public function sgpTablesReady(): bool
    {
        return $this->db->tableExists(self::T_SGP_CORRELATIONS, false);
    }

    public function ensureSgpCorrelations(): void
    {
        if (! $this->sgpTablesReady()) {
            return;
        }

        $count = $this->db->table(self::T_SGP_CORRELATIONS)->countAllResults();
        if ($count > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        foreach (SgpCorrelationEngine::CORRELATION_MATRIX as $sport => $list) {
            foreach ($list as $item) {
                $this->db->table(self::T_SGP_CORRELATIONS)->replace([
                    'sport'             => $sport,
                    'leg_a_market'      => $item['leg_a'],
                    'leg_b_market'      => $item['leg_b'],
                    'direction'         => $item['direction'],
                    'correlation_coeff' => $item['r'],
                    'synergy_label'     => $item['synergy'],
                    'notes'             => $item['description'],
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ]);
            }
        }
    }

    /**
     * @return list<array<string,mixed>>
     */
    public function getSgpCorrelations(?string $sport = null): array
    {
        if (! $this->sgpTablesReady()) {
            if ($sport !== null) {
                return SgpCorrelationEngine::CORRELATION_MATRIX[strtoupper($sport)] ?? [];
            }
            $flat = [];
            foreach (SgpCorrelationEngine::CORRELATION_MATRIX as $sp => $arr) {
                foreach ($arr as $row) {
                    $row['sport'] = $sp;
                    $flat[] = $row;
                }
            }
            return $flat;
        }

        $this->ensureSgpCorrelations();

        $b = $this->db->table(self::T_SGP_CORRELATIONS);
        if ($sport !== null && $sport !== 'ALL') {
            $b->where('sport', strtoupper(trim($sport)));
        }

        return $b->orderBy('sport', 'ASC')->orderBy('correlation_coeff', 'DESC')->get()->getResultArray();
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
