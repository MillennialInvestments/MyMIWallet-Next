<?php

declare(strict_types=1);

namespace App\Modules\Sports\Controllers;

use App\Controllers\UserController;
use App\Modules\Sports\Libraries\BettingCalculators;
use App\Modules\Sports\Libraries\GamificationLeaderboardService;
use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\NbaSplitsCalculator;
use App\Modules\Sports\Libraries\OnrampRevenueService;
use App\Modules\Sports\Libraries\PredictionMarketsService;
use App\Modules\Sports\Libraries\PropLinesService;
use App\Modules\Sports\Libraries\SportsBetTrackerService;
use App\Modules\Sports\Libraries\SportsPropsService;

/**
 * Read-only NFL running back prop analytics. No wagers are placed, stored or
 * brokered; every page and JSON response carries the educational disclaimer.
 */
class SportsController extends UserController
{
    private ?SportsPropsService $sports = null;
    private ?SportsBetTrackerService $betTracker = null;
    private ?PredictionMarketsService $predictionMarkets = null;
    private ?GamificationLeaderboardService $gamification = null;
    private ?OnrampRevenueService $onramp = null;

    protected function sports(): SportsPropsService
    {
        return $this->sports ??= new SportsPropsService(db_connect());
    }

    protected function betTracker(): SportsBetTrackerService
    {
        return $this->betTracker ??= new SportsBetTrackerService(db_connect());
    }

    protected function predictionMarketsService(): PredictionMarketsService
    {
        return $this->predictionMarkets ??= new PredictionMarketsService(db_connect());
    }

    protected function gamificationService(): GamificationLeaderboardService
    {
        return $this->gamification ??= new GamificationLeaderboardService(db_connect());
    }

    protected function onrampService(): OnrampRevenueService
    {
        return $this->onramp ??= new OnrampRevenueService(db_connect());
    }

    protected function activeUserId(): int
    {
        return (int) ($this->getCuID() ?? (function_exists('auth') && auth()->id() ? auth()->id() : 0));
    }

    public function index()
    {
        return redirect()->to(site_url('MyMISports/NFL'));
    }

    public function nfl()
    {
        $svc = $this->sports();
        $ready = $svc->tablesReady();
        $pos = strtoupper(trim((string) ($this->request->getGet('pos') ?? 'ALL')));
        if (! in_array($pos, ['ALL', 'RB', 'QB', 'WR', 'TE', 'MATCHUPS'], true)) {
            $pos = 'ALL';
        }

        $season = $this->seasonParam();
        $players = $ready && $pos !== 'MATCHUPS' ? $svc->listPlayers($season, $pos === 'ALL' ? null : $pos) : [];
        $picks = $ready ? $svc->weeklyPicks(PropLinesService::fromEnv(db_connect())) : [];

        // Teams for matchups tab
        $teams = $ready ? $svc->teams($season ?? \App\Modules\Sports\Libraries\Providers\NflverseStatsProvider::currentSeason(), 'nflverse') : [];
        if ($teams === [] && $ready) {
            $teams = $svc->teams($season ?? 2025, 'sample');
        }

        $pageTitle = match ($pos) {
            'QB'       => 'NFL Quarterback Props & Pass D Splits',
            'WR', 'TE' => 'NFL Receiver Props & Secondary Splits',
            'MATCHUPS' => 'NFL Team vs Team Game Matchups',
            default    => 'NFL Props & Matchup Intelligence',
        };

        return $this->renderTheme('App\Modules\Sports\Views\nfl\index', [
            'pageTitle'    => $pageTitle,
            'activePos'    => $pos,
            'tablesReady'  => $ready,
            'players'      => $players,
            'teams'        => $teams,
            'picks'        => $picks,
            'statsUpdated' => SportsPropsService::statsUpdatedAt($season),
            'notice'       => session()->getFlashdata('sports_notice'),
            'disclaimer'   => SportsPropsService::DISCLAIMER,
        ]);
    }

    public function matchups()
    {
        return redirect()->to(site_url('MyMISports/NFL?pos=MATCHUPS'));
    }

    public function matchup(string $home, string $away)
    {
        $svc = $this->sports();
        if (! $svc->tablesReady()) {
            return redirect()->to(site_url('MyMISports/NFL'));
        }

        $home = strtoupper(trim($home));
        $away = strtoupper(trim($away));
        $lines = $this->matchupLinesParam();

        $report = $svc->matchupReport($home, $away, $this->seasonParam(), $lines);

        return $this->renderTheme('App\Modules\Sports\Views\nfl\matchup', [
            'pageTitle' => $away . ' @ ' . $home . ' | NFL Game Matchup',
            'report'    => $report,
            'lines'     => $lines,
            'notice'    => session()->getFlashdata('sports_notice'),
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

    private function matchupLinesParam(): array
    {
        $markets = (array) ($this->request->getGet('market') ?? []);
        $lines = (array) ($this->request->getGet('line') ?? []);
        $overs = (array) ($this->request->getGet('over') ?? []);
        $unders = (array) ($this->request->getGet('under') ?? []);

        $out = [];
        foreach ($markets as $i => $m) {
            $market = (string) $m;
            $line = isset($lines[$i]) && is_numeric($lines[$i]) ? (float) $lines[$i] : null;
            $over = isset($overs[$i]) && is_numeric($overs[$i]) ? (int) $overs[$i] : null;
            $under = isset($unders[$i]) && is_numeric($unders[$i]) ? (int) $unders[$i] : null;

            if ($market !== '') {
                $out[] = [
                    'market'     => $market,
                    'line'       => $line ?? 0.0,
                    'over_odds'  => $over,
                    'under_odds' => $under,
                ];
            }
        }

        return $out;
    }

    public function nba()
    {
        $svc = $this->sports();
        $ready = $svc->nbaTablesReady();
        $pos = strtoupper(trim((string) ($this->request->getGet('pos') ?? 'ALL')));
        if (! in_array($pos, ['ALL', 'PG', 'SG', 'SF', 'PF', 'C'], true)) {
            $pos = 'ALL';
        }

        $players = $ready ? $svc->listNbaPlayers(2025, $pos === 'ALL' ? null : $pos) : [];
        $picks = [];
        if ($ready && $players !== []) {
            foreach (array_slice($players, 0, 3) as $p) {
                $report = $svc->nbaPlayerReport((int) $p['id'], 2025, 'WAS');
                if ($report !== null && ! empty($report['evaluation']['goldilocks'])) {
                    $topPick = $report['evaluation']['goldilocks'][0];
                    $topPick['player_name'] = $p['full_name'];
                    $topPick['team'] = $p['team'];
                    $topPick['market_label'] = NbaSplitsCalculator::MARKET_LABELS[$topPick['market']] ?? $topPick['market'];
                    $picks[] = $topPick;
                }
            }
        }

        return $this->renderTheme('App\Modules\Sports\Views\nba\index', [
            'pageTitle'    => 'NBA Props & Matchup Intelligence',
            'activePos'    => $pos,
            'tablesReady'  => $ready,
            'players'      => $players,
            'picks'        => $picks,
            'statsUpdated' => date('M j, Y H:i'),
            'notice'       => session()->getFlashdata('sports_notice'),
            'disclaimer'   => SportsPropsService::DISCLAIMER,
        ]);
    }

    public function nbaPlayer(int $playerId)
    {
        $svc = $this->sports();
        if (! $svc->nbaTablesReady()) {
            return redirect()->to(site_url('MyMISports/NBA'));
        }

        $opponent = $this->opponentParam();
        $report = $svc->nbaPlayerReport($playerId, 2025, $opponent);
        if ($report === null) {
            return redirect()->to(site_url('MyMISports/NBA'));
        }

        $teams = $svc->nbaTeams(2025);

        return $this->renderTheme('App\Modules\Sports\Views\nba\player', [
            'pageTitle'        => $report['player']['full_name'] . ' | NBA Prop Splits',
            'player'           => $report['player'],
            'report'           => $report,
            'teams'            => $teams,
            'selectedOpponent' => $opponent,
            'disclaimer'       => SportsPropsService::DISCLAIMER,
        ]);
    }

    public function refreshNbaStats()
    {
        $svc = $this->sports();
        if ($svc->nbaTablesReady()) {
            $svc->ensureNbaSampleData();
            session()->setFlashdata('sports_notice', 'NBA player stats refreshed successfully.');
        }

        return redirect()->to(site_url('MyMISports/NBA'));
    }

    public function tracker()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $tracker = $this->betTracker();
        $status = strtolower(trim((string) ($this->request->getGet('status') ?? 'all')));
        $sport = strtoupper(trim((string) ($this->request->getGet('sport') ?? 'all')));
        $sportsbook = trim((string) ($this->request->getGet('sportsbook') ?? 'all'));

        $filters = [
            'status'     => $status,
            'sport'      => $sport,
            'sportsbook' => $sportsbook,
        ];

        $summary = $tracker->getSummary($userId);
        $bets = $tracker->listBets($userId, $filters);
        $settings = $tracker->getUserSettings($userId);

        return $this->renderTheme('App\Modules\Sports\Views\tracker\index', [
            'pageTitle'  => 'Sports Bet Tracker & Bankroll Intelligence',
            'summary'    => $summary,
            'bets'       => $bets,
            'filters'    => $filters,
            'settings'   => $settings,
            'disclaimer' => SportsPropsService::DISCLAIMER,
            'notice'     => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function createBet()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $this->betTracker()->createBet($userId, $post);
        session()->setFlashdata('sports_notice', 'Bet slip successfully recorded to your ledger.');

        $returnUrl = (string) ($this->request->getServer('HTTP_REFERER') ?? site_url('MyMISports/Tracker'));
        return redirect()->to($returnUrl);
    }

    public function updateBetStatus(int $betId)
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $status = (string) ($this->request->getPost('status') ?? 'won');
        $this->betTracker()->updateStatus($userId, $betId, $status);
        session()->setFlashdata('sports_notice', 'Bet slip updated.');

        $returnUrl = (string) ($this->request->getServer('HTTP_REFERER') ?? site_url('MyMISports/Tracker'));
        return redirect()->to($returnUrl);
    }

    public function deleteBet(int $betId)
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $this->betTracker()->deleteBet($userId, $betId);
        session()->setFlashdata('sports_notice', 'Bet slip deleted.');

        return redirect()->to(site_url('MyMISports/Tracker'));
    }

    public function importBets()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $file = $this->request->getFile('csv_file');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $content = (string) file_get_contents($file->getRealPath());
            $res = $this->betTracker()->importCsv($userId, $content);
            session()->setFlashdata('sports_notice', "Imported {$res['imported']} slips ({$res['skipped']} skipped).");
        } else {
            session()->setFlashdata('sports_notice', 'Failed to upload CSV file.');
        }

        return redirect()->to(site_url('MyMISports/Tracker'));
    }

    public function exportBets()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $csv = $this->betTracker()->exportCsv($userId);
        return $this->response
            ->setHeader('Content-Type', 'text/csv; charset=utf-8')
            ->setHeader('Content-Disposition', 'attachment; filename="mymi-bets-' . date('Y-m-d') . '.csv"')
            ->setBody($csv);
    }

    public function odds()
    {
        $sport = strtoupper(trim((string) ($this->request->getGet('sport') ?? 'NFL')));
        if (! in_array($sport, ['NFL', 'NBA'], true)) {
            $sport = 'NFL';
        }

        $userId = $this->activeUserId();
        $hasByok = $this->betTracker()->getUserSettings($userId)['has_odds_api_key'] ?? false;
        $oddsBoard = $this->sports()->multiBookOddsMatrix($sport);

        return $this->renderTheme('App\Modules\Sports\Views\odds\index', [
            'pageTitle'    => 'Multi-Book Line Shopping & Odds Comparison Matrix',
            'activeSport'  => $sport,
            'oddsBoard'    => $oddsBoard,
            'hasByok'      => $hasByok,
            'disclaimer'   => SportsPropsService::DISCLAIMER,
            'notice'       => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function calculators()
    {
        $userId = $this->activeUserId();
        $settings = $this->betTracker()->getUserSettings($userId);

        return $this->renderTheme('App\Modules\Sports\Views\calculators\index', [
            'pageTitle'       => 'Quantitative Sports Betting & Bankroll Calculators',
            'defaultBankroll' => (float) ($settings['default_bankroll'] ?? 2500.0),
            'defaultUnit'     => (float) ($settings['default_unit_size'] ?? 50.0),
            'disclaimer'      => SportsPropsService::DISCLAIMER,
            'notice'          => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function calculateApi()
    {
        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $type = (string) ($post['type'] ?? 'kelly');

        $result = match ($type) {
            'kelly' => BettingCalculators::kelly(
                (float) ($post['bankroll'] ?? 1000.0),
                (int) ($post['odds'] ?? -110),
                (float) ($post['win_prob'] ?? 0.55),
                (float) ($post['fraction'] ?? 0.5)
            ),
            'arbitrage' => BettingCalculators::arbitrage(
                (float) ($post['total_stake'] ?? 1000.0),
                (int) ($post['odds_a'] ?? 120),
                (int) ($post['odds_b'] ?? -105)
            ),
            'no_vig' => BettingCalculators::noVig(
                (int) ($post['odds_a'] ?? -110),
                (int) ($post['odds_b'] ?? -110),
                isset($post['model_prob']) ? (float) $post['model_prob'] : null
            ),
            default => ['error' => 'Unknown calculator type: ' . $type],
        };

        return $this->response->setJSON($result);
    }

    public function settings()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $settings = $this->betTracker()->getUserSettings($userId);

        return $this->renderTheme('App\Modules\Sports\Views\settings\index', [
            'pageTitle'  => 'Sports Integrations & BYOK Settings',
            'settings'   => $settings,
            'disclaimer' => SportsPropsService::DISCLAIMER,
            'notice'     => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function saveSettings()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $this->betTracker()->saveUserSettings($userId, $post);
        session()->setFlashdata('sports_notice', 'Settings and encrypted BYOK credentials saved successfully.');

        return redirect()->to(site_url('MyMISports/Settings'));
    }

    public function predictions()
    {
        $userId = $this->activeUserId();
        $svc = $this->predictionMarketsService();
        $category = (string) ($this->request->getGet('category') ?? 'all');
        $provider = (string) ($this->request->getGet('provider') ?? 'all');

        $svc->ensureSampleMarkets();
        $markets = $svc->listMarkets(
            $category === 'all' ? null : $category,
            $provider === 'all' ? null : $provider
        );
        $userOrders = $userId > 0 ? $svc->listUserOrders($userId) : [];

        return $this->renderTheme('App\Modules\Sports\Views\predictions\index', [
            'pageTitle'      => 'Non-Custodial Prediction Markets Hub',
            'markets'        => $markets,
            'userOrders'     => $userOrders,
            'activeCategory' => $category,
            'activeProvider' => $provider,
            'disclaimer'     => SportsPropsService::DISCLAIMER,
            'notice'         => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function placePredictionOrder()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'Unauthenticated']);
        }

        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $marketId = (int) ($post['market_id'] ?? 0);
        $outcome = (string) ($post['outcome'] ?? '');
        $stakeUsdc = (float) ($post['stake_usdc'] ?? 0.0);
        $userWallet = (string) ($post['user_wallet'] ?? '');
        $odds = isset($post['odds']) ? (float) $post['odds'] : null;

        try {
            $svc = $this->predictionMarketsService();
            $svc->ensureSampleMarkets();
            $order = $svc->prepareOrderPayload(
                $userId,
                $marketId,
                $outcome,
                $stakeUsdc,
                $userWallet,
                $odds
            );

            return $this->response->setJSON(['success' => true, 'order' => $order]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function confirmPredictionOrder()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'Unauthenticated']);
        }

        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $orderId = (int) ($post['order_id'] ?? 0);
        $txHash = (string) ($post['tx_hash'] ?? '');

        try {
            $confirmed = $this->predictionMarketsService()->confirmOrderExecution($userId, $orderId, $txHash);

            return $this->response->setJSON([
                'success' => $confirmed,
                'message' => $confirmed ? 'Order confirmed on-chain.' : 'Order confirmation failed.',
            ]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function leaderboard()
    {
        $userId = $this->activeUserId();
        $svc = $this->gamificationService();

        $svc->ensureSampleLeaderboard();
        $leaders = $svc->getLeaderboard(50);
        $userStats = $userId > 0 ? $svc->getUserPrestige($userId) : null;
        $tournament = $svc->getWeeklyTournamentInfo();

        return $this->renderTheme('App\Modules\Sports\Views\leaderboard\index', [
            'pageTitle'  => 'Social Prediction Leaderboard & Weekly Tournament',
            'leaders'    => $leaders,
            'userStats'  => $userStats,
            'tournament' => $tournament,
            'disclaimer' => SportsPropsService::DISCLAIMER,
            'notice'     => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function onramp()
    {
        $userId = $this->activeUserId();
        $svc = $this->onrampService();

        $config = $svc->getOnrampConfig($userId);
        $transactions = $userId > 0 ? $svc->listUserTransactions($userId) : [];

        return $this->renderTheme('App\Modules\Sports\Views\onramp\index', [
            'pageTitle'    => 'Licensed Crypto On-Ramp & Monetization Gateway',
            'config'       => $config,
            'transactions' => $transactions,
            'disclaimer'   => SportsPropsService::DISCLAIMER,
            'notice'       => session()->getFlashdata('sports_notice'),
        ]);
    }

    public function onrampCheckout()
    {
        $userId = $this->activeUserId();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'Unauthenticated']);
        }

        $post = (array) ($this->request->getPost() ?: $this->request->getJSON(true) ?: []);
        $asset = (string) ($post['crypto_asset'] ?? 'USDC');
        $wallet = (string) ($post['destination_wallet'] ?? '');
        $fiatAmount = (float) ($post['fiat_amount'] ?? 100.0);
        $provider = (string) ($post['provider'] ?? 'moonpay');

        try {
            $result = $this->onrampService()->generateOnrampUrl(
                $userId,
                $asset,
                $wallet,
                $fiatAmount,
                $provider
            );

            return $this->response->setJSON(array_merge(['success' => true], $result));
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
