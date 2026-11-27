<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries\Providers;

use RuntimeException;

/**
 * Real NFL running back stats from nflverse (free, no key, CC BY 4.0).
 *
 * Source file: the weekly player stats CSV that nflverse publishes per season,
 *   https://github.com/nflverse/nflverse-data/releases/download/stats_player/stats_player_week_{season}.csv
 * It is refreshed during the season. download() saves it locally; the
 * provider then reads that file, so imports and tests never need the network.
 *
 * Game logs: every row whose position is RB.
 * Defense ranks: computed from the same file. After each week, every defense
 * is ranked by rushing yards per game it has allowed to running backs so far
 * (rank 1 = fewest allowed), and separately by receiving yards allowed to
 * running backs. A game in week N is tagged with the ranks published after
 * week N-1, so there is no look-ahead. Week 1 games have no earlier rank and
 * show as "rank unknown".
 */
final class NflverseStatsProvider implements StatsProviderInterface
{
    public const NAME        = 'nflverse';
    public const URL         = 'https://github.com/nflverse/nflverse-data/releases/download/stats_player/stats_player_week_%d.csv';
    public const ATTRIBUTION = 'Stats: nflverse (CC BY 4.0)';
    public const MAX_ROWS    = 60000;
    public const MAX_BYTES   = 40_000_000;
    public const POSITIONS_ALL = ['RB', 'QB', 'WR', 'TE'];

    /** @var list<array<string,string>>|null */
    private ?array $rows = null;
    private readonly array $positions;

    public function __construct(private readonly string $csvPath, ?array $positions = null)
    {
        $this->positions = $positions !== null ? array_map('strtoupper', $positions) : self::POSITIONS_ALL;
    }

    public function name(): string
    {
        return self::NAME;
    }

    /** NFL season that is current on a date: September onward is that year, January to August is the year before. */
    public static function currentSeason(?\DateTimeInterface $now = null): int
    {
        $now ??= new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $year = (int) $now->format('Y');

        return (int) $now->format('n') >= 9 ? $year : $year - 1;
    }

    public static function defaultPath(int $season): string
    {
        return rtrim(WRITEPATH, '/') . '/cache/nflverse/stats_player_week_' . $season . '.csv';
    }

    /**
     * Downloads one season file to $dest (atomic replace). $fetch is injectable
     * for tests: fn(string $url): string returns the body or throws.
     *
     * @return array{url:string, path:string, bytes:int}
     */
    public static function download(int $season, string $dest, ?callable $fetch = null): array
    {
        if ($season < 1999 || $season > 2100) {
            throw new RuntimeException('Season out of range: ' . $season);
        }
        $url = sprintf(self::URL, $season);
        $fetch ??= static function (string $url): string {
            $client = \Config\Services::curlrequest(['timeout' => 90, 'connect_timeout' => 15, 'http_errors' => false]);
            $res = $client->get($url, ['allow_redirects' => ['max' => 5], 'headers' => ['User-Agent' => 'MyMIWallet-SportsImport/1.0']]);
            if ($res->getStatusCode() !== 200) {
                throw new RuntimeException('nflverse download failed: HTTP ' . $res->getStatusCode() . ' for season file');
            }

            return (string) $res->getBody();
        };

        $body = $fetch($url);
        if (strlen($body) > self::MAX_BYTES) {
            throw new RuntimeException('nflverse file larger than expected; refusing to import');
        }
        $firstLine = strtok($body, "\n");
        if ($firstLine === false || ! str_contains($firstLine, 'player_id') || ! str_contains($firstLine, 'opponent_team') || ! str_contains($firstLine, 'rushing_yards')) {
            throw new RuntimeException('nflverse file does not have the expected columns');
        }

        $dir = dirname($dest);
        if (! is_dir($dir) && ! mkdir($dir, 0775, true) && ! is_dir($dir)) {
            throw new RuntimeException('Cannot create ' . $dir);
        }
        $tmp = $dest . '.tmp' . getmypid();
        if (file_put_contents($tmp, $body) === false || ! rename($tmp, $dest)) {
            @unlink($tmp);
            throw new RuntimeException('Cannot write ' . basename($dest));
        }

        return ['url' => $url, 'path' => $dest, 'bytes' => strlen($body)];
    }

    public function gameLogs(): iterable
    {
        foreach ($this->rows() as $r) {
            $pos = strtoupper($r['position'] ?? '');
            if (! in_array($pos, $this->positions, true)) {
                continue;
            }
            $team = strtoupper($r['team'] ?? '');

            yield [
                'external_id' => substr($r['player_id'], 0, 64),
                'player_name' => substr($r['player_display_name'] !== '' ? $r['player_display_name'] : ($r['player_name'] ?? ''), 0, 120),
                'team'        => substr($team, 0, 8),
                'position'    => $pos,
                'season'      => (int) $r['season'],
                'week'        => (int) $r['week'],
                'game_date'   => null,
                'opponent'    => substr(strtoupper($r['opponent_team']), 0, 8),
                'home_away'   => self::homeAway((string) ($r['game_id'] ?? ''), $team),
                'pass_att'    => self::int($r, 'attempts'),
                'completions' => self::int($r, 'completions'),
                'pass_yds'    => self::int($r, 'passing_yards'),
                'pass_td'     => self::int($r, 'passing_tds'),
                'interceptions' => self::int($r, 'interceptions'),
                'rush_att'    => self::int($r, 'carries'),
                'rush_yds'    => self::int($r, 'rushing_yards'),
                'rush_td'     => self::int($r, 'rushing_tds'),
                'targets'     => self::int($r, 'targets'),
                'receptions'  => self::int($r, 'receptions'),
                'rec_yds'     => self::int($r, 'receiving_yards'),
                'rec_td'      => self::int($r, 'receiving_tds'),
            ];
        }
    }

    public function defenseRanks(): iterable
    {
        // [season][week][defense] => [rush yds (RB), rec yds (RB), pass yds (QB), pass tds, pts allowed]
        $allowed = [];
        foreach ($this->rows() as $r) {
            $pos = strtoupper($r['position'] ?? '');
            $def = strtoupper($r['opponent_team']);
            $s = (int) $r['season'];
            $w = (int) $r['week'];
            $allowed[$s][$w][$def] ??= [
                'rush'    => 0,
                'rb_rec'  => 0,
                'pass'    => 0,
                'pass_td' => 0,
                'points'  => 0,
            ];

            if ($pos === 'RB') {
                $allowed[$s][$w][$def]['rush'] += self::int($r, 'rushing_yards');
                $allowed[$s][$w][$def]['rb_rec'] += self::int($r, 'receiving_yards');
            }
            if ($pos === 'QB') {
                $allowed[$s][$w][$def]['pass'] += self::int($r, 'passing_yards');
                $allowed[$s][$w][$def]['pass_td'] += self::int($r, 'passing_tds');
            }
            // Estimate offensive scoring allowed (rush TDs + pass TDs * 7)
            $allowed[$s][$w][$def]['points'] += (self::int($r, 'rushing_tds') + self::int($r, 'passing_tds')) * 7;
        }

        foreach ($allowed as $season => $weeks) {
            ksort($weeks);
            $totals = []; // defense => ['rush', 'rb_rec', 'pass', 'pass_td', 'points', 'games']
            foreach ($weeks as $week => $byDefense) {
                foreach ($byDefense as $def => $stats) {
                    $totals[$def] ??= ['rush' => 0, 'rb_rec' => 0, 'pass' => 0, 'pass_td' => 0, 'points' => 0, 'games' => 0];
                    $totals[$def]['rush'] += $stats['rush'];
                    $totals[$def]['rb_rec'] += $stats['rb_rec'];
                    $totals[$def]['pass'] += $stats['pass'];
                    $totals[$def]['pass_td'] += $stats['pass_td'];
                    $totals[$def]['points'] += $stats['points'];
                    $totals[$def]['games']++;
                }
                $rushPg = $rbRecPg = $passPg = $passTdPg = $pointsPg = [];
                foreach ($totals as $def => $tot) {
                    $g = max(1, $tot['games']);
                    $rushPg[$def] = $tot['rush'] / $g;
                    $rbRecPg[$def] = $tot['rb_rec'] / $g;
                    $passPg[$def] = $tot['pass'] / $g;
                    $passTdPg[$def] = $tot['pass_td'] / $g;
                    $pointsPg[$def] = $tot['points'] / $g;
                }
                $rushRank = self::rank($rushPg);
                $rbRecRank = self::rank($rbRecPg);
                $passRank = self::rank($passPg);
                $passTdRank = self::rank($passTdPg);
                $scoringRank = self::rank($pointsPg);

                foreach ($rushPg as $def => $pg) {
                    yield [
                        'season'              => (int) $season,
                        'week'                => (int) $week,
                        'team'                => substr((string) $def, 0, 8),
                        'rush_def_rank'       => $rushRank[$def],
                        'rb_rec_def_rank'     => $rbRecRank[$def],
                        'rush_yds_allowed_pg' => round($pg, 1),
                        'pass_def_rank'       => $passRank[$def] ?? null,
                        'pass_yds_allowed_pg' => isset($passPg[$def]) ? round($passPg[$def], 1) : null,
                        'pass_td_def_rank'    => $passTdRank[$def] ?? null,
                        'scoring_def_rank'    => $scoringRank[$def] ?? null,
                        'points_allowed_pg'   => isset($pointsPg[$def]) ? round($pointsPg[$def], 1) : null,
                    ];
                }
            }
        }
    }

    /**
     * Rank 1 = fewest yards allowed. Ties share the better rank. Scaled onto
     * 1-32 so tiers stay meaningful before every team has played.
     *
     * @param array<string,float> $perGame
     * @return array<string,int>
     */
    private static function rank(array $perGame): array
    {
        asort($perGame);
        $n = count($perGame);
        $out = [];
        $pos = 0;
        $prev = null;
        $rank = 0;
        foreach ($perGame as $def => $v) {
            $pos++;
            if ($prev === null || abs($v - $prev) > 1e-9) {
                $rank = $pos;
                $prev = $v;
            }
            $out[$def] = $n >= 32 ? min(32, $rank) : max(1, (int) round(1 + ($rank - 1) * 31 / max(1, $n - 1)));
        }

        return $out;
    }

    /** nflverse game ids are SEASON_WEEK_AWAY_HOME. */
    private static function homeAway(string $gameId, string $team): string
    {
        $parts = explode('_', $gameId);

        return count($parts) >= 4 && strtoupper($parts[2]) === $team ? 'A' : 'H';
    }

    private static function int(array $r, string $k): int
    {
        $v = $r[$k] ?? '';

        return is_numeric($v) ? (int) round((float) $v) : 0;
    }

    /** @return list<array<string,string>> */
    private function rows(): array
    {
        if ($this->rows !== null) {
            return $this->rows;
        }
        if (! is_file($this->csvPath) || ! is_readable($this->csvPath)) {
            throw new RuntimeException('nflverse file not found: ' . basename($this->csvPath) . ' (run with --download)');
        }
        $fh = fopen($this->csvPath, 'rb');
        if ($fh === false) {
            throw new RuntimeException('nflverse file not readable');
        }
        $rows = [];
        try {
            $header = fgetcsv($fh, 0, ',', '"', '\\');
            if (! is_array($header)) {
                return $this->rows = [];
            }
            $header = array_map(static fn ($h) => strtolower(trim((string) $h)), $header);
            foreach (['player_id', 'position', 'season', 'week', 'opponent_team'] as $need) {
                if (! in_array($need, $header, true)) {
                    throw new RuntimeException('nflverse file missing column ' . $need);
                }
            }
            $keep = array_flip(['player_id', 'player_name', 'player_display_name', 'position', 'season', 'week', 'season_type', 'game_id', 'team', 'opponent_team',
                'carries', 'rushing_yards', 'rushing_tds', 'targets', 'receptions', 'receiving_yards', 'receiving_tds',
                'attempts', 'completions', 'passing_yards', 'passing_tds', 'interceptions']);
            while (($line = fgetcsv($fh, 0, ',', '"', '\\')) !== false) {
                if (count($rows) >= self::MAX_ROWS) {
                    break;
                }
                $row = [];
                foreach ($header as $i => $key) {
                    if (isset($keep[$key])) {
                        $row[$key] = trim((string) ($line[$i] ?? ''));
                    }
                }
                $row += ['player_display_name' => '', 'player_name' => '', 'game_id' => '', 'team' => ''];
                if ($row['player_id'] === '' || $row['opponent_team'] === '' || ! is_numeric($row['season']) || ! is_numeric($row['week'])) {
                    continue;
                }
                $rows[] = $row;
            }
        } finally {
            fclose($fh);
        }

        return $this->rows = $rows;
    }
}
