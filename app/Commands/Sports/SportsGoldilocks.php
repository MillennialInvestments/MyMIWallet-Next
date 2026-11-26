<?php

declare(strict_types=1);

namespace App\Commands\Sports;

use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\SportsPropsService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Read-only: prints a running back's defense-tier splits and the Goldilocks
 * prop pick for an upcoming opponent. Never places or records a wager.
 */
class SportsGoldilocks extends SafeBaseCommand
{
    use SportsOptionsTrait;

    protected $group       = 'Sports';
    protected $name        = 'sports:goldilocks';
    protected $description = 'Show RB splits by opponent defense rank and the Goldilocks prop pick (read-only).';
    protected $usage       = 'sports:goldilocks --player=<id|name> --opponent=<TEAM> [--lines="rush_yds:65.5:-115:-105,rec_yds:22.5"] [--season=2025] [--json]';
    protected $options     = [
        '--player'   => 'Player id or part of the name.',
        '--opponent' => 'Upcoming opponent team code (e.g. KC).',
        '--lines'    => 'Comma list of market:line[:over_odds[:under_odds]]. Markets: rush_yds, rec_yds, rush_rec_yds.',
        '--season'   => 'Season (defaults to the latest with data).',
        '--json'     => 'JSON output.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->flag($params, 'json');
        $svc = new SportsPropsService(db_connect());
        if (! $svc->tablesReady()) {
            CLI::error('SEMANTIC_RESULT=FAIL REASON=tables_not_migrated');

            return 1;
        }

        $needle = trim((string) ($this->opt($params, 'player') ?? ''));
        $player = $needle === '' ? null : $svc->findPlayer($needle);
        if ($player === null) {
            CLI::error('SEMANTIC_RESULT=FAIL REASON=player_not_found');

            return 1;
        }

        $season = $this->opt($params, 'season');
        $opponent = strtoupper(trim((string) ($this->opt($params, 'opponent') ?? '')));
        $lines = GoldilocksEngine::parseLines((string) ($this->opt($params, 'lines') ?? ''));
        $report = $svc->playerReport((int) $player['id'], is_numeric($season) ? (int) $season : null, $opponent !== '' ? $opponent : null, $lines);

        if ($json) {
            unset($report['teams']);
            CLI::write((string) json_encode(['status' => 'PASS'] + $report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            return 0;
        }

        CLI::write(sprintf('%s (%s) season %s, %d games', $player['full_name'], $player['team'], (string) $report['season'], count($report['games'])), 'cyan');
        $rows = [];
        foreach (['overall', 'last5', 'top', 'mid', 'bottom'] as $k) {
            $row = [$k];
            foreach (['rush_yds', 'rec_yds', 'rush_rec_yds'] as $m) {
                $s = $report['splits'][$m][$k];
                $row[] = $s['avg'] === null ? '-' : sprintf('%.1f (%d)', $s['avg'], $s['games']);
            }
            $rows[] = $row;
        }
        CLI::table($rows, ['split', 'rush yds', 'rec yds', 'rush+rec']);

        if ($report['goldilocks'] !== null) {
            $g = $report['goldilocks'];
            CLI::write('vs ' . $opponent . ': ' . $g['verdict'], $g['best'] ? 'green' : 'yellow');
            foreach ($g['projections'] as $m => $p) {
                $sl = $g['suggested_lines'][$m];
                CLI::write(sprintf('  %-14s projection %s (tier %s, %s confidence) | Goldilocks over <= %s, under >= %s', $m, (string) $p['projection'], $p['opponent_tier'], $p['confidence'], (string) $sl['over_at_or_below'], (string) $sl['under_at_or_above']));
            }
        }
        CLI::write('SEMANTIC_RESULT=PASS', 'green');
        CLI::write(SportsPropsService::DISCLAIMER, 'light_gray');

        return 0;
    }
}
