<?php

declare(strict_types=1);

namespace App\Modules\Sports\Controllers;

use App\Controllers\UserController;
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\PropLinesService;
use App\Modules\Sports\Libraries\SportsPropsService;

/**
 * Read-only NFL running back prop analytics. No wagers are placed, stored or
 * brokered; every page and JSON response carries the educational disclaimer.
 */
class SportsController extends UserController
{
    private ?SportsPropsService $sports = null;

    protected function sports(): SportsPropsService
    {
        return $this->sports ??= new SportsPropsService(db_connect());
    }

    public function index()
    {
        return redirect()->to(site_url('MyMISports/NFL'));
    }

    public function nfl()
    {
        $svc = $this->sports();
        $ready = $svc->tablesReady();

        return $this->renderTheme('App\Modules\Sports\Views\nfl\index', [
            'pageTitle'   => 'NFL Running Back Props',
            'tablesReady' => $ready,
            'players'     => $ready ? $svc->listPlayers() : [],
            'picks'       => $ready ? $svc->weeklyPicks(PropLinesService::fromEnv(db_connect())) : [],
            'statsUpdated' => SportsPropsService::statsUpdatedAt(),
            'notice'      => session()->getFlashdata('sports_notice'),
            'disclaimer'  => SportsPropsService::DISCLAIMER,
        ]);
    }

    public function player(int $playerId)
    {
        $svc = $this->sports();
        if (! $svc->tablesReady()) {
            return redirect()->to(site_url('MyMISports/NFL'));
        }

        $opponent = $this->opponentParam();
        $lines = $this->linesParam();
        $bookLines = null;

        // No matchup typed in: use the player's next game and the sportsbook
        // lines fetched by sports:lines, when there are any.
        if ($opponent === null && $lines === [] && $this->request->getGet('manual') === null) {
            $player = $svc->findPlayer($playerId);
            if ($player !== null) {
                $bookLines = PropLinesService::fromEnv(db_connect())->upcomingFor((string) $player['full_name'], (string) $player['team']);
                if ($bookLines !== null && $bookLines['opponent'] !== null) {
                    $opponent = $bookLines['opponent'];
                    $lines = $bookLines['lines'];
                } else {
                    $bookLines = null;
                }
            }
        }

        $report = $svc->playerReport($playerId, $this->seasonParam(), $opponent, $lines);
        if ($report === null) {
            return $this->response->setStatusCode(404)->setBody('Player not found.');
        }

        return $this->renderTheme('App\Modules\Sports\Views\nfl\player', [
            'pageTitle' => $report['player']['full_name'] . ' | RB Props',
            'report'    => $report,
            'lines'     => $lines,
            'bookLines' => $bookLines,
            'notice'    => session()->getFlashdata('sports_notice'),
        ]);
    }

    /** Minutes between on-demand refreshes (stats for everyone; lines per team). */
    public const STATS_COOLDOWN_MIN = 15;
    public const LINES_COOLDOWN_MIN = 15;

    /**
     * "Refresh stats" button: re-downloads the free nflverse file and
     * re-imports it. One refresh per 15 minutes site-wide; nflverse itself
     * publishes after games, so more often adds nothing.
     */
    public function refreshStats()
    {
        $svc = $this->sports();
        $back = redirect()->to(site_url('MyMISports/NFL'));
        if (! $svc->tablesReady()) {
            return $back;
        }
        $key = 'sports_refresh_stats';
        $last = cache($key);
        if (is_int($last) && time() - $last < self::STATS_COOLDOWN_MIN * 60) {
            return $back->with('sports_notice', sprintf('Stats were refreshed %d min ago. They can be refreshed again in %d min.', intdiv(time() - $last, 60), self::STATS_COOLDOWN_MIN - intdiv(time() - $last, 60)));
        }
        cache()->save($key, time(), self::STATS_COOLDOWN_MIN * 60);

        try {
            $r = $svc->refreshNflverse();
            $msg = $r['ok']
                ? sprintf('Stats refreshed: %d running backs, %d new and %d updated games.', $r['players'], $r['game_logs_inserted'], $r['game_logs_updated'])
                : 'The stats refresh did not finish. Try again later.';
        } catch (\Throwable $e) {
            log_message('error', 'sports refreshStats: ' . $e->getMessage());
            $msg = 'Could not reach the stats source right now. Try again later.';
        }

        return $back->with('sports_notice', $msg);
    }

    /**
     * "Refresh lines" button on a player page: pulls current sportsbook lines
     * for that player's next game only (about 3 API credits). One refresh per
     * team per 15 minutes, and never below a 100-credit reserve.
     */
    public function refreshLines(int $playerId)
    {
        $svc = $this->sports();
        $back = redirect()->to(site_url('MyMISports/NFL/Player/' . $playerId));
        $player = $svc->tablesReady() ? $svc->findPlayer($playerId) : null;
        if ($player === null) {
            return redirect()->to(site_url('MyMISports/NFL'));
        }
        $team = strtoupper((string) $player['team']);
        $key = 'sports_refresh_lines_' . preg_replace('/[^A-Z]/', '', $team);
        $last = cache($key);
        if (is_int($last) && time() - $last < self::LINES_COOLDOWN_MIN * 60) {
            return $back->with('sports_notice', sprintf('%s lines were refreshed %d min ago. They can be refreshed again in %d min.', $team, intdiv(time() - $last, 60), self::LINES_COOLDOWN_MIN - intdiv(time() - $last, 60)));
        }
        cache()->save($key, time(), self::LINES_COOLDOWN_MIN * 60);

        try {
            $r = PropLinesService::fromEnv(db_connect())->fetchForTeam($team);
            $msg = match ($r['status']) {
                'PASS'  => sprintf('Lines refreshed for %s\'s next game (%d lines).', $team, $r['lines_saved']),
                default => match ($r['reason'] ?? '') {
                    'ODDS_API_KEY not set' => 'Live sportsbook lines are not switched on.',
                    'credit_reserve'       => 'Live line refreshes are paused until the monthly allowance resets.',
                    'no upcoming game'     => $team . ' has no game in the next week with lines posted yet.',
                    default                => 'Lines could not be refreshed right now.',
                },
            };
        } catch (\Throwable $e) {
            log_message('error', 'sports refreshLines: ' . $e->getMessage());
            $msg = 'Could not reach the sportsbook data source right now. Try again later.';
        }

        return $back->with('sports_notice', $msg);
    }

    public function goldilocksApi()
    {
        $svc = $this->sports();
        if (! $svc->tablesReady()) {
            return $this->response->setStatusCode(503)->setJSON(['status' => 'error', 'message' => 'Sports tables are not migrated.']);
        }

        $playerId = (int) ($this->request->getGet('player_id') ?? 0);
        $report = $playerId > 0 ? $svc->playerReport($playerId, $this->seasonParam(), $this->opponentParam(), $this->linesParam()) : null;
        if ($report === null) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Player not found.']);
        }

        unset($report['teams']);

        return $this->response->setJSON(['status' => 'ok', 'data' => $report]);
    }

    private function seasonParam(): ?int
    {
        $s = $this->request->getGet('season');

        return is_numeric($s) && (int) $s >= 2000 && (int) $s <= 2100 ? (int) $s : null;
    }

    private function opponentParam(): ?string
    {
        $o = strtoupper(trim((string) ($this->request->getGet('opponent') ?? '')));

        return preg_match('/^[A-Z]{2,4}$/', $o) ? $o : null;
    }

    private function linesParam(): array
    {
        $g = fn (string $k) => array_values(array_map('strval', (array) ($this->request->getGet($k) ?? [])));

        return GoldilocksEngine::parseLines(
            is_string($this->request->getGet('lines')) ? $this->request->getGet('lines') : null,
            $g('market'),
            $g('line'),
            $g('over'),
            $g('under'),
        );
    }
}
