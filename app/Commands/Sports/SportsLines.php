<?php

declare(strict_types=1);

namespace App\Commands\Sports;

use App\Commands\SafeBaseCommand;
use App\Modules\Sports\Libraries\PropLinesService;
use CodeIgniter\CLI\CLI;

/**
 * Fetches upcoming NFL running back prop lines from The Odds API into
 * bf_sports_prop_lines. Does nothing unless ODDS_API_KEY is set. Spends API
 * credits (3 per game), so it is capped by --max-events and keeps a reserve
 * of unused credits. No wagers are placed.
 */
class SportsLines extends SafeBaseCommand
{
    use SportsOptionsTrait;

    protected $group       = 'Sports';
    protected $name        = 'sports:lines';
    protected $description = 'Fetch upcoming RB prop lines from The Odds API (needs ODDS_API_KEY; about 3 credits per game).';
    protected $usage       = 'sports:lines [--days=7] [--max-events=16] [--reserve=25] [--json]';
    protected $options     = [
        '--days'       => 'Only games starting within this many days (default 7).',
        '--max-events' => 'Most games to fetch in one run (default 16, about 48 credits).',
        '--reserve'    => 'Stop when remaining credits would drop below this (default 25).',
        '--json'       => 'JSON output.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->flag($params, 'json');
        $int = fn (string $k, int $d, int $min, int $max) => is_numeric($v = $this->opt($params, $k)) ? max($min, min($max, (int) $v)) : $d;

        try {
            $r = PropLinesService::fromEnv(db_connect())->fetch($int('days', 7, 1, 14), $int('max-events', 16, 1, 40), $int('reserve', 25, 0, 100000));
        } catch (\Throwable $e) {
            $r = ['status' => 'FAIL', 'reason' => $e->getMessage()];
        }

        $code = $r['status'] === 'FAIL' ? 1 : 0;
        if ($json) {
            CLI::write((string) json_encode($r, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            $pairs = [];
            foreach ($r as $k => $v) {
                $pairs[] = strtoupper((string) $k) . '=' . var_export($v, true);
            }
            CLI::write('SEMANTIC_RESULT=' . implode(' ', $pairs), $code === 0 ? 'green' : 'red');
        }

        return $code;
    }
}
