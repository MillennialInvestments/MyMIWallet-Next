<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries\Providers;

use RuntimeException;

/**
 * Reads game logs and defense ranks from CSV files.
 *
 * Game log columns (header row required):
 *   player_id,player_name,team,position,season,week,game_date,opponent,home_away,
 *   rush_att,rush_yds,rush_td,targets,receptions,rec_yds,rec_td
 * Defense rank columns:
 *   season,week,team,rush_def_rank,rb_rec_def_rank,rush_yds_allowed_pg
 */
final class CsvStatsProvider implements StatsProviderInterface
{
    public const MAX_ROWS = 20000;

    public function __construct(
        private readonly string $gameLogPath,
        private readonly string $defensePath,
        private readonly string $providerName = 'csv',
    ) {
    }

    public static function sample(): self
    {
        $dir = dirname(__DIR__, 2) . '/Data';

        return new self($dir . '/sample_rb_game_logs.csv', $dir . '/sample_defense_ranks.csv', 'sample');
    }

    public function name(): string
    {
        return $this->providerName;
    }

    public function gameLogs(): iterable
    {
        foreach ($this->rows($this->gameLogPath) as $row) {
            $playerId = trim((string) ($row['player_id'] ?? ''));
            $name = trim((string) ($row['player_name'] ?? ''));
            $opponent = strtoupper(trim((string) ($row['opponent'] ?? '')));
            if ($playerId === '' || $name === '' || $opponent === '' || ! is_numeric($row['season'] ?? null) || ! is_numeric($row['week'] ?? null)) {
                continue;
            }
            $date = trim((string) ($row['game_date'] ?? ''));

            yield [
                'external_id' => substr($playerId, 0, 64),
                'player_name' => substr($name, 0, 120),
                'team'        => strtoupper(substr(trim((string) ($row['team'] ?? '')), 0, 8)),
                'position'    => strtoupper(substr(trim((string) ($row['position'] ?? 'RB')), 0, 8)) ?: 'RB',
                'season'      => (int) $row['season'],
                'week'        => (int) $row['week'],
                'game_date'   => preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) ? $date : null,
                'opponent'    => substr($opponent, 0, 8),
                'home_away'   => strtoupper(substr(trim((string) ($row['home_away'] ?? '')), 0, 1)) === 'A' ? 'A' : 'H',
                'pass_att'    => (int) ($row['pass_att'] ?? 0),
                'completions' => (int) ($row['completions'] ?? 0),
                'pass_yds'    => (int) ($row['pass_yds'] ?? 0),
                'pass_td'     => (int) ($row['pass_td'] ?? 0),
                'interceptions' => (int) ($row['interceptions'] ?? 0),
                'rush_att'    => (int) ($row['rush_att'] ?? 0),
                'rush_yds'    => (int) ($row['rush_yds'] ?? 0),
                'rush_td'     => (int) ($row['rush_td'] ?? 0),
                'targets'     => (int) ($row['targets'] ?? 0),
                'receptions'  => (int) ($row['receptions'] ?? 0),
                'rec_yds'     => (int) ($row['rec_yds'] ?? 0),
                'rec_td'      => (int) ($row['rec_td'] ?? 0),
            ];
        }
    }

    public function defenseRanks(): iterable
    {
        foreach ($this->rows($this->defensePath) as $row) {
            $team = strtoupper(trim((string) ($row['team'] ?? '')));
            $rank = $row['rush_def_rank'] ?? null;
            if ($team === '' || ! is_numeric($rank) || ! is_numeric($row['season'] ?? null)) {
                continue;
            }
            $recRank = $row['rb_rec_def_rank'] ?? '';
            $allowed = $row['rush_yds_allowed_pg'] ?? '';
            $passRank = $row['pass_def_rank'] ?? '';
            $passYdsPg = $row['pass_yds_allowed_pg'] ?? '';
            $passTdRank = $row['pass_td_def_rank'] ?? '';
            $scoreRank = $row['scoring_def_rank'] ?? '';
            $ptsAllowedPg = $row['points_allowed_pg'] ?? '';

            yield [
                'season'              => (int) $row['season'],
                'week'                => is_numeric($row['week'] ?? null) ? (int) $row['week'] : 0,
                'team'                => substr($team, 0, 8),
                'rush_def_rank'       => max(1, min(32, (int) $rank)),
                'rb_rec_def_rank'     => is_numeric($recRank) ? max(1, min(32, (int) $recRank)) : null,
                'rush_yds_allowed_pg' => is_numeric($allowed) ? round((float) $allowed, 1) : null,
                'pass_def_rank'       => is_numeric($passRank) ? max(1, min(32, (int) $passRank)) : null,
                'pass_yds_allowed_pg' => is_numeric($passYdsPg) ? round((float) $passYdsPg, 1) : null,
                'pass_td_def_rank'    => is_numeric($passTdRank) ? max(1, min(32, (int) $passTdRank)) : null,
                'scoring_def_rank'    => is_numeric($scoreRank) ? max(1, min(32, (int) $scoreRank)) : null,
                'points_allowed_pg'   => is_numeric($ptsAllowedPg) ? round((float) $ptsAllowedPg, 1) : null,
            ];
        }
    }

    /** @return \Generator<array<string,string>> */
    private function rows(string $path): \Generator
    {
        if (! is_file($path) || ! is_readable($path)) {
            throw new RuntimeException('CSV file not readable: ' . basename($path));
        }
        $fh = fopen($path, 'rb');
        if ($fh === false) {
            throw new RuntimeException('CSV file not readable: ' . basename($path));
        }
        try {
            $header = fgetcsv($fh, 0, ',', '"', '\\');
            if (! is_array($header)) {
                return;
            }
            $header = array_map(static fn ($h) => strtolower(trim((string) preg_replace('/^\xEF\xBB\xBF/', '', (string) $h))), $header);
            $count = 0;
            while (($line = fgetcsv($fh, 0, ',', '"', '\\')) !== false) {
                if ($line === [null] || count($line) < 2) {
                    continue;
                }
                if (++$count > self::MAX_ROWS) {
                    break;
                }
                $row = [];
                foreach ($header as $i => $key) {
                    $row[$key] = (string) ($line[$i] ?? '');
                }
                yield $row;
            }
        } finally {
            fclose($fh);
        }
    }
}
