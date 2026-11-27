<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Database\Migrations\CreateSportsPropLinesTable;
use App\Modules\Sports\Libraries\PropLinesService;
use App\Modules\Sports\Libraries\Providers\NflverseStatsProvider;
use App\Modules\Sports\Libraries\SportsPropsService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000200_CreateSportsPropLinesTable.php';

/**
 * nflverse import (real-stats CSV format, computed weekly defense ranks with
 * no look-ahead) and The Odds API prop lines (credit guard, storage, pre-fill
 * and weekly picks), all offline with fixtures.
 */
final class NflverseAndLinesTest extends CIUnitTestCase
{
    private const HEADER = 'player_id,player_name,player_display_name,position,position_group,headshot_url,season,week,season_type,game_id,team,opponent_team,completions,carries,rushing_yards,rushing_tds,receptions,targets,receiving_yards,receiving_tds';

    private SportsPropsService $svc;
    private string $tmp;
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->up();
        (new CreateSportsPropLinesTable(Database::forge()))->up();
        $db->resetDataCache();
        $this->svc = new SportsPropsService($db);
        $this->tmp = sys_get_temp_dir() . '/nflv_' . bin2hex(random_bytes(4));
        mkdir($this->tmp);
    }

    protected function tearDown(): void
    {
        (new CreateSportsPropLinesTable(Database::forge()))->down();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        array_map('unlink', glob($this->tmp . '/*') ?: []);
        @rmdir($this->tmp);
        parent::tearDown();
    }

    /**
     * Two weeks, four teams. Week 1: AAA held BBB's back to 20 rush yds, CCC
     * gave DDD's back 150. Week 2 flips the matchups.
     */
    private function fixture(): string
    {
        $rows = [
            self::HEADER,
            // id,name,display,pos,grp,url,season,week,type,game_id,team,opp,cmp,car,ryd,rtd,rec,tgt,recyd,rectd
            '00-1,R.Back,Runner Back,RB,RB,,2026,1,REG,2026_01_BBB_AAA,BBB,AAA,0,10,20,0,2,3,15,0',
            '00-2,D.Back,Dash Back,RB,RB,,2026,1,REG,2026_01_DDD_CCC,DDD,CCC,0,20,150,2,1,1,5,0',
            '00-3,Q.Back,Quarter Back,QB,QB,,2026,1,REG,2026_01_DDD_CCC,DDD,CCC,20,3,40,0,0,0,0,0',
            '00-4,A.Back,Alpha Back,RB,RB,,2026,1,REG,2026_01_BBB_AAA,AAA,BBB,0,15,90,1,4,5,40,0',
            '00-5,C.Back,Charlie Back,RB,RB,,2026,1,REG,2026_01_DDD_CCC,CCC,DDD,0,12,60,0,3,4,30,0',
            '00-1,R.Back,Runner Back,RB,RB,,2026,2,REG,2026_02_BBB_CCC,BBB,CCC,0,18,130,1,3,3,25,0',
            '00-2,D.Back,Dash Back,RB,RB,,2026,2,REG,2026_02_AAA_DDD,DDD,AAA,0,14,35,0,2,2,10,0',
        ];
        $path = $this->tmp . '/stats_player_week_2026.csv';
        file_put_contents($path, implode("\n", $rows) . "\n");

        return $path;
    }

    public function testNflverseProviderReadsRbRowsAndHomeAway(): void
    {
        $logs = iterator_to_array((new NflverseStatsProvider($this->fixture()))->gameLogs(), false);
        $this->assertCount(6, $logs, 'QB row must be skipped');
        $runner = $logs[0];
        $this->assertSame('Runner Back', $runner['player_name']);
        $this->assertSame('AAA', $runner['opponent']);
        $this->assertSame('A', $runner['home_away'], 'BBB is the away team in 2026_01_BBB_AAA');
        $this->assertSame(10, $runner['rush_att']);
        $this->assertSame(15, $runner['rec_yds']);
    }

    public function testDefenseRanksUseOnlyEarlierWeeks(): void
    {
        $ranks = iterator_to_array((new NflverseStatsProvider($this->fixture()))->defenseRanks(), false);
        $w1 = [];
        foreach ($ranks as $r) {
            if ($r['week'] === 1) {
                $w1[$r['team']] = $r;
            }
        }
        // Week 1 RB rush yds allowed: AAA 20, BBB 90, CCC 150, DDD 60 -> AAA best, CCC worst
        $this->assertSame(1, $w1['AAA']['rush_def_rank']);
        $this->assertSame(32, $w1['CCC']['rush_def_rank']);
        $this->assertLessThan($w1['BBB']['rush_def_rank'], $w1['DDD']['rush_def_rank']);
        $this->assertSame(20.0, $w1['AAA']['rush_yds_allowed_pg']);

        $r = $this->svc->import(new NflverseStatsProvider($this->fixture()));
        $this->assertTrue($r['ok']);
        $this->assertSame(4, $r['players']);
        // Week 2 game vs CCC is tagged with CCC's week-1 rank (32 = bottom tier), not a rank that includes week 2.
        $def = $this->svc->defenseFor('CCC', 2026, 2, 'nflverse');
        $this->assertSame(1, (int) $def['week']);
        $this->assertSame(32, (int) $def['rush_def_rank']);
        $this->assertNull($this->svc->defenseFor('AAA', 2026, 1, 'nflverse'), 'week 1 has no earlier rank');

        $runner = $this->svc->findPlayer('Runner Back');
        $report = $this->svc->playerReport((int) $runner['id']);
        $this->assertSame('bottom', $report['games'][1]['tiers']['rush_yds']);
        $this->assertSame(NflverseStatsProvider::ATTRIBUTION, $report['provenance']['attribution']);
    }

    public function testDownloadValidatesAndWritesAtomically(): void
    {
        $dest = $this->tmp . '/dl.csv';
        $body = file_get_contents($this->fixture());
        $seen = null;
        $r = NflverseStatsProvider::download(2026, $dest, static function (string $url) use ($body, &$seen) {
            $seen = $url;

            return $body;
        });
        $this->assertStringEndsWith('/stats_player/stats_player_week_2026.csv', (string) $seen);
        $this->assertSame(strlen($body), $r['bytes']);
        $this->assertFileExists($dest);

        $this->expectException(\RuntimeException::class);
        NflverseStatsProvider::download(2026, $dest, static fn () => "<html>not a csv</html>");
    }

    public function testCurrentSeasonRollsOverInSeptember(): void
    {
        $this->assertSame(2026, NflverseStatsProvider::currentSeason(new \DateTimeImmutable('2026-11-27')));
        $this->assertSame(2025, NflverseStatsProvider::currentSeason(new \DateTimeImmutable('2026-02-01')));
    }

    private function oddsHttp(array &$calls, int $remaining = 400): callable
    {
        $start = gmdate('Y-m-d\TH:i:s\Z', time() + 2 * 86400);
        $started = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);

        return static function (string $url) use (&$calls, &$remaining, $start, $started) {
            $calls[] = $url;
            $headers = ['x-requests-remaining' => (string) $remaining];
            if (str_contains($url, '/events?')) {
                return ['status' => 200, 'headers' => $headers, 'body' => json_encode([
                    ['id' => 'ev1', 'commence_time' => $start, 'home_team' => 'New Orleans Saints', 'away_team' => 'Las Vegas Raiders'],
                    ['id' => 'ev0', 'commence_time' => $started, 'home_team' => 'Chicago Bears', 'away_team' => 'Detroit Lions'],
                ])];
            }
            $remaining -= 3;

            return ['status' => 200, 'headers' => ['x-requests-remaining' => (string) $remaining], 'body' => json_encode([
                'id' => 'ev1', 'commence_time' => $start, 'home_team' => 'New Orleans Saints', 'away_team' => 'Las Vegas Raiders',
                'bookmakers' => [
                    ['key' => 'fanduel', 'markets' => [
                        ['key' => 'player_rush_yds', 'outcomes' => [
                            ['name' => 'Over', 'description' => 'Runner Back Jr.', 'price' => -120, 'point' => 49.5],
                            ['name' => 'Under', 'description' => 'Runner Back Jr.', 'price' => -110, 'point' => 49.5],
                        ]],
                    ]],
                    ['key' => 'draftkings', 'markets' => [
                        ['key' => 'player_rush_yds', 'outcomes' => [
                            ['name' => 'Over', 'description' => 'Runner Back Jr.', 'price' => -115, 'point' => 50.5],
                            ['name' => 'Under', 'description' => 'Runner Back Jr.', 'price' => -105, 'point' => 50.5],
                        ]],
                        ['key' => 'player_reception_yds', 'outcomes' => [
                            ['name' => 'Over', 'description' => 'Runner Back Jr.', 'price' => 100, 'point' => 18.5],
                            ['name' => 'Under', 'description' => 'Runner Back Jr.', 'price' => -130, 'point' => 18.5],
                        ]],
                    ]],
                ],
            ])];
        };
    }

    public function testLinesAreOffWithoutKey(): void
    {
        $calls = [];
        $r = (new PropLinesService(Database::connect(), '', $this->oddsHttp($calls)))->fetch();
        $this->assertSame('SKIP', $r['status']);
        $this->assertSame([], $calls, 'no key means no network calls');
    }

    public function testFetchStoresLinesSkipsStartedGamesAndPrefillsPlayer(): void
    {
        $calls = [];
        $lines = new PropLinesService(Database::connect(), 'test-key', $this->oddsHttp($calls));
        $r = $lines->fetch();
        $this->assertSame('PASS', $r['status']);
        $this->assertSame(1, $r['events_fetched'], 'the game that already started is skipped');
        $this->assertSame(3, $r['lines_saved']);
        $this->assertCount(2, $calls);
        $this->assertStringContainsString('markets=player_rush_yds%2Cplayer_reception_yds%2Cplayer_rush_reception_yds', $calls[1]);
        $this->assertStringContainsString('bookmakers=draftkings%2Cfanduel', $calls[1]);

        // Re-fetch updates in place.
        $lines->fetch();
        $this->assertSame(3, Database::connect()->table(PropLinesService::TABLE)->countAllResults());

        // nflverse "Runner Back" (team BBB) matches the book's "Runner Back Jr."; we pretend BBB plays NO/LV by name only.
        $up = $lines->upcomingFor('Runner Back', 'LV');
        $this->assertSame('NO', $up['opponent']);
        $this->assertSame('draftkings', $up['bookmaker'], 'DraftKings is preferred over FanDuel');
        $byMarket = array_column($up['lines'], null, 'market');
        $this->assertSame(50.5, $byMarket['rush_yds']['line']);
        $this->assertSame(-115, $byMarket['rush_yds']['over_odds']);
        $this->assertSame(18.5, $byMarket['rec_yds']['line']);
    }

    public function testCreditReserveStopsSpending(): void
    {
        $calls = [];
        $r = (new PropLinesService(Database::connect(), 'test-key', $this->oddsHttp($calls, 20)))->fetch(7, 16, 25);
        $this->assertSame('credit_reserve', $r['stopped']);
        $this->assertSame(0, $r['events_fetched']);
        $this->assertCount(1, $calls, 'only the free events list was called');
    }

    public function testWeeklyPicksUseStoredLines(): void
    {
        $this->svc->import(new NflverseStatsProvider($this->fixture()));
        Database::connect()->table('bf_sports_players')->where('external_id', '00-1')->update(['team' => 'LV']);
        // Give the matchup defense (NO) a rank so the projection has a tier.
        Database::connect()->table('bf_sports_defense_ranks')->insert(['provider' => 'nflverse', 'season' => 2026, 'week' => 2, 'team' => 'NO', 'rush_def_rank' => 30, 'rb_rec_def_rank' => 30, 'rush_yds_allowed_pg' => 140]);
        $calls = [];
        $lines = new PropLinesService(Database::connect(), 'test-key', $this->oddsHttp($calls));
        $lines->fetch();

        $picks = $this->svc->weeklyPicks($lines);
        $this->assertCount(1, $picks);
        $this->assertSame('Runner Back', $picks[0]['player']['full_name']);
        $this->assertSame('NO', $picks[0]['opponent']);
        $this->assertNotSame('', $picks[0]['verdict']);
    }

    public function testNameKeyIgnoresSuffixAndPunctuation(): void
    {
        $this->assertSame('kenneth walker', PropLinesService::nameKey('Kenneth Walker III'));
        $this->assertSame('dandre swift', PropLinesService::nameKey("D'Andre Swift"));
        $this->assertSame('travis etienne', PropLinesService::nameKey('Travis Etienne Jr.'));
    }

    /** Optional check against the real nflverse file: NFLVERSE_FILE=/path/stats_player_week_2026.csv */
    public function testRealNflverseFileWhenProvided(): void
    {
        $file = getenv('NFLVERSE_FILE');
        if (! is_string($file) || ! is_file($file)) {
            $this->markTestSkipped('set NFLVERSE_FILE to run against the real nflverse CSV');
        }
        $r = $this->svc->import(new NflverseStatsProvider($file));
        $this->assertTrue($r['ok']);
        $this->assertGreaterThan(80, $r['players']);
        $this->assertGreaterThan(500, $r['game_logs_inserted']);
        $teams = array_unique(array_column(Database::connect()->table('bf_sports_defense_ranks')->select('team')->get()->getResultArray(), 'team'));
        $this->assertCount(32, $teams);
        fwrite(STDERR, "\nreal import: " . json_encode($r) . "\n");
    }
}
