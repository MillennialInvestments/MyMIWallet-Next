<?php

declare(strict_types=1);

namespace App\Commands\Sports;

use App\Modules\Sports\Libraries\Providers\CsvStatsProvider;
use App\Modules\Sports\Libraries\Providers\NflverseStatsProvider;
use App\Modules\Sports\Libraries\SportsPropsService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Loads NFL running back game logs and defense ranks into the sports tables.
 * Writes only bf_sports_* reference tables. The nflverse provider downloads
 * one free public CSV per season (no key); the others read local files.
 */
class SportsImport extends SafeBaseCommand
{
    use SportsOptionsTrait;

    protected $group       = 'Sports';
    protected $name        = 'sports:import';
    protected $description = 'Import RB game logs + defense ranks (nflverse real stats, bundled sample, or your CSV files). Use --remove-sample to delete sample rows.';
    protected $usage       = 'sports:import [--provider=nflverse [--season=2026] [--file=PATH]] [--provider=sample] [--logs=FILE --defense=FILE] [--remove-sample --approve] [--json]';
    protected $options     = [
        '--provider'      => 'nflverse (real stats, free download), sample (bundled fictional data) or csv (default when --logs is given).',
        '--season'        => 'nflverse season (default: the current NFL season).',
        '--file'          => 'nflverse: use this already-downloaded CSV instead of downloading.',
        '--logs'          => 'Path to a game log CSV.',
        '--defense'       => 'Path to a defense rank CSV.',
        '--remove-sample' => 'Delete only rows imported by the sample provider (needs --approve).',
        '--approve'       => 'Confirm --remove-sample.',
        '--json'          => 'JSON output.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->flag($params, 'json');
        $svc = new SportsPropsService(db_connect());

        if (! $svc->tablesReady()) {
            return $this->out($json, ['status' => 'FAIL', 'reason' => 'tables_not_migrated', 'hint' => 'Run migration 2026-11-27-000100_CreateSportsPropAnalyticsTables'], 1);
        }

        if ($this->flag($params, 'remove-sample')) {
            $r = $svc->removeSample();

            return $this->out($json, ['status' => $r['ok'] ? 'PASS' : 'FAIL'] + $r, $r['ok'] ? 0 : 1);
        }

        $logs = $this->opt($params, 'logs');
        $defense = $this->opt($params, 'defense');
        $providerName = (string) ($this->opt($params, 'provider') ?? ($logs ? 'csv' : 'sample'));

        try {
            if ($providerName === NflverseStatsProvider::NAME) {
                $seasonOpt = $this->opt($params, 'season');
                $season = is_numeric($seasonOpt) ? (int) $seasonOpt : NflverseStatsProvider::currentSeason();
                $file = $this->opt($params, 'file');
                if (! is_string($file)) {
                    $r = $svc->refreshNflverse($season);

                    return $this->out($json, ['status' => $r['ok'] ? 'PASS' : 'FAIL'] + $r + ['counts' => $svc->counts()], $r['ok'] ? 0 : 1);
                }
                $provider = new NflverseStatsProvider($file);
            } elseif ($providerName === 'sample') {
                $provider = CsvStatsProvider::sample();
            } else {
                if (! is_string($logs) || ! is_string($defense)) {
                    return $this->out($json, ['status' => 'FAIL', 'reason' => 'need --logs and --defense for csv import'], 1);
                }
                $name = preg_match('/^[a-z0-9_-]{2,32}$/', $providerName) ? $providerName : 'csv';
                if ($name === 'sample') {
                    $name = 'csv';
                }
                $provider = new CsvStatsProvider($logs, $defense, $name);
            }
            $r = $svc->import($provider);
        } catch (\Throwable $e) {
            return $this->out($json, ['status' => 'FAIL', 'reason' => $e->getMessage()], 1);
        }

        if ($download !== null) {
            $r['download'] = ['url' => $download['url'], 'bytes' => $download['bytes']];
        }

        return $this->out($json, ['status' => $r['ok'] ? 'PASS' : 'FAIL'] + $r + ['counts' => $svc->counts()], $r['ok'] ? 0 : 1);
    }

    /** Only --remove-sample deletes rows, so only it needs --approve. */
    public function isDestructive(): bool
    {
        return array_key_exists('remove-sample', $this->parsedFlags);
    }

    private function out(bool $json, array $data, int $code): int
    {
        if ($json) {
            CLI::write((string) json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            $pairs = [];
            foreach ($data as $k => $v) {
                $pairs[] = strtoupper((string) $k) . '=' . (is_array($v) ? json_encode($v) : var_export($v, true));
            }
            CLI::write('SEMANTIC_RESULT=' . implode(' ', $pairs), $code === 0 ? 'green' : 'red');
        }

        return $code;
    }
}
