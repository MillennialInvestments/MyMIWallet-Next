<?php

declare(strict_types=1);

namespace App\Modules\Sports\Controllers;

use App\Controllers\UserController;
use App\Modules\Sports\Libraries\GoldilocksEngine;
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
            'disclaimer'  => SportsPropsService::DISCLAIMER,
        ]);
    }

    public function player(int $playerId)
    {
        $svc = $this->sports();
        if (! $svc->tablesReady()) {
            return redirect()->to(site_url('MyMISports/NFL'));
        }

        $report = $svc->playerReport($playerId, $this->seasonParam(), $this->opponentParam(), $this->linesParam());
        if ($report === null) {
            return $this->response->setStatusCode(404)->setBody('Player not found.');
        }

        return $this->renderTheme('App\Modules\Sports\Views\nfl\player', [
            'pageTitle' => $report['player']['full_name'] . ' | RB Props',
            'report'    => $report,
            'lines'     => $this->linesParam(),
        ]);
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
