<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

use CodeIgniter\Database\BaseConnection;
use RuntimeException;

/**
 * Running back prop lines from The Odds API (https://the-odds-api.com).
 *
 * Off unless ODDS_API_KEY is set in .env. Each game's player props cost
 * credits (markets x regions), so fetch() spends at most one call per game,
 * only for games starting within the next few days, and stops when the
 * account's remaining credits fall to the reserve. The events list is free.
 * Lines are reference data for the analytics pages; nothing is wagered.
 */
final class PropLinesService
{
    public const TABLE    = 'bf_sports_prop_lines';
    public const PROVIDER = 'oddsapi';
    public const BASE     = 'https://api.the-odds-api.com/v4/sports/americanfootball_nfl';

    /** Odds API market key => our market key */
    public const MARKETS = [
        'player_rush_yds'           => 'rush_yds',
        'player_reception_yds'      => 'rec_yds',
        'player_rush_reception_yds' => 'rush_rec_yds',
    ];

    /** Preferred books, in order. Two books bill as one region. */
    public const BOOKMAKERS = ['draftkings', 'fanduel'];

    /** Odds API full team names => nflverse abbreviations */
    public const TEAMS = [
        'Arizona Cardinals' => 'ARI', 'Atlanta Falcons' => 'ATL', 'Baltimore Ravens' => 'BAL', 'Buffalo Bills' => 'BUF',
        'Carolina Panthers' => 'CAR', 'Chicago Bears' => 'CHI', 'Cincinnati Bengals' => 'CIN', 'Cleveland Browns' => 'CLE',
        'Dallas Cowboys' => 'DAL', 'Denver Broncos' => 'DEN', 'Detroit Lions' => 'DET', 'Green Bay Packers' => 'GB',
        'Houston Texans' => 'HOU', 'Indianapolis Colts' => 'IND', 'Jacksonville Jaguars' => 'JAX', 'Kansas City Chiefs' => 'KC',
        'Las Vegas Raiders' => 'LV', 'Los Angeles Chargers' => 'LAC', 'Los Angeles Rams' => 'LA', 'Miami Dolphins' => 'MIA',
        'Minnesota Vikings' => 'MIN', 'New England Patriots' => 'NE', 'New Orleans Saints' => 'NO', 'New York Giants' => 'NYG',
        'New York Jets' => 'NYJ', 'Philadelphia Eagles' => 'PHI', 'Pittsburgh Steelers' => 'PIT', 'San Francisco 49ers' => 'SF',
        'Seattle Seahawks' => 'SEA', 'Tampa Bay Buccaneers' => 'TB', 'Tennessee Titans' => 'TEN', 'Washington Commanders' => 'WAS',
    ];

    /** @var callable(string):array{status:int, body:string, headers:array<string,string>} */
    private $http;

    public function __construct(private readonly BaseConnection $db, private readonly string $apiKey = '', ?callable $http = null)
    {
        $this->http = $http ?? static function (string $url): array {
            $client = \Config\Services::curlrequest(['timeout' => 30, 'connect_timeout' => 10, 'http_errors' => false]);
            try {
                $res = $client->get($url, ['headers' => ['User-Agent' => 'MyMIWallet-SportsLines/1.0']]);
            } catch (\Throwable $e) {
                // Never echo the URL: it carries the API key.
                throw new RuntimeException('Odds API request failed: ' . preg_replace('/apiKey=[^&\s]+/', 'apiKey=***', $e->getMessage()));
            }
            $headers = [];
            foreach (['x-requests-remaining', 'x-requests-used', 'x-requests-last'] as $h) {
                $headers[$h] = $res->hasHeader($h) ? $res->getHeaderLine($h) : '';
            }

            return ['status' => $res->getStatusCode(), 'body' => (string) $res->getBody(), 'headers' => $headers];
        };
    }

    public static function fromEnv(BaseConnection $db): self
    {
        return new self($db, trim((string) env('ODDS_API_KEY', '')));
    }

    public function enabled(): bool
    {
        return $this->apiKey !== '';
    }

    public function tableReady(): bool
    {
        return $this->db->tableExists(self::TABLE, false);
    }

    /**
     * Pulls current RB prop lines for upcoming games and upserts them.
     *
     * @return array<string,mixed>
     */
    public function fetch(int $days = 7, int $maxEvents = 16, int $reserve = 25): array
    {
        if (! $this->enabled()) {
            return ['status' => 'SKIP', 'reason' => 'ODDS_API_KEY not set'];
        }
        if (! $this->tableReady()) {
            return ['status' => 'FAIL', 'reason' => 'table_not_migrated'];
        }

        $now = time();
        $to = gmdate('Y-m-d\TH:i:s\Z', $now + $days * 86400);
        $events = $this->get(self::BASE . '/events?' . http_build_query(['apiKey' => $this->apiKey, 'dateFormat' => 'iso', 'commenceTimeTo' => $to]));
        $list = json_decode($events['body'], true);
        if (! is_array($list)) {
            throw new RuntimeException('Odds API events response was not JSON');
        }

        $out = ['status' => 'PASS', 'events_seen' => count($list), 'events_fetched' => 0, 'lines_saved' => 0, 'credits_remaining' => $events['headers']['x-requests-remaining'] ?? '', 'stopped' => null];
        $remaining = is_numeric($out['credits_remaining']) ? (float) $out['credits_remaining'] : null;
        $cost = count(self::MARKETS); // markets x 1 region

        foreach ($list as $event) {
            if ($out['events_fetched'] >= $maxEvents) {
                $out['stopped'] = 'max_events';
                break;
            }
            $start = strtotime((string) ($event['commence_time'] ?? '')) ?: 0;
            if ($start < $now || empty($event['id'])) {
                continue; // already started: live lines are not what we model
            }
            if ($remaining !== null && $remaining - $cost < $reserve) {
                $out['stopped'] = 'credit_reserve';
                break;
            }

            $res = $this->get(self::BASE . '/events/' . rawurlencode((string) $event['id']) . '/odds?' . http_build_query([
                'apiKey'     => $this->apiKey,
                'markets'    => implode(',', array_keys(self::MARKETS)),
                'bookmakers' => implode(',', self::BOOKMAKERS),
                'oddsFormat' => 'american',
                'dateFormat' => 'iso',
            ]));
            $out['events_fetched']++;
            $rem = $res['headers']['x-requests-remaining'] ?? '';
            if (is_numeric($rem)) {
                $remaining = (float) $rem;
                $out['credits_remaining'] = $rem;
            }
            $data = json_decode($res['body'], true);
            if (is_array($data)) {
                $out['lines_saved'] += $this->store($data);
            }
        }

        return $out;
    }

    /**
     * On-demand refresh for one team's next game: the events list is free and
     * the one game costs about 3 credits. Stops at a larger reserve than the
     * scheduled run so user clicks can never drain the monthly allowance.
     *
     * @return array<string,mixed>
     */
    public function fetchForTeam(string $team, int $days = 8, int $reserve = 100): array
    {
        if (! $this->enabled()) {
            return ['status' => 'SKIP', 'reason' => 'ODDS_API_KEY not set'];
        }
        if (! $this->tableReady()) {
            return ['status' => 'FAIL', 'reason' => 'table_not_migrated'];
        }
        $team = strtoupper($team);
        $names = array_keys(self::TEAMS, $team, true);
        if ($names === []) {
            return ['status' => 'SKIP', 'reason' => 'unknown team'];
        }

        $now = time();
        $events = $this->get(self::BASE . '/events?' . http_build_query(['apiKey' => $this->apiKey, 'dateFormat' => 'iso', 'commenceTimeTo' => gmdate('Y-m-d\TH:i:s\Z', $now + $days * 86400)]));
        $list = json_decode($events['body'], true);
        $remaining = $events['headers']['x-requests-remaining'] ?? '';
        foreach (is_array($list) ? $list : [] as $event) {
            $start = strtotime((string) ($event['commence_time'] ?? '')) ?: 0;
            if ($start < $now || empty($event['id']) || ! array_intersect($names, [(string) ($event['home_team'] ?? ''), (string) ($event['away_team'] ?? '')])) {
                continue;
            }
            if (is_numeric($remaining) && (float) $remaining - count(self::MARKETS) < $reserve) {
                return ['status' => 'SKIP', 'reason' => 'credit_reserve', 'credits_remaining' => $remaining];
            }
            $res = $this->get(self::BASE . '/events/' . rawurlencode((string) $event['id']) . '/odds?' . http_build_query([
                'apiKey'     => $this->apiKey,
                'markets'    => implode(',', array_keys(self::MARKETS)),
                'bookmakers' => implode(',', self::BOOKMAKERS),
                'oddsFormat' => 'american',
                'dateFormat' => 'iso',
            ]));
            $data = json_decode($res['body'], true);

            return ['status' => 'PASS', 'lines_saved' => is_array($data) ? $this->store($data) : 0, 'credits_remaining' => $res['headers']['x-requests-remaining'] ?? ''];
        }

        return ['status' => 'SKIP', 'reason' => 'no upcoming game', 'credits_remaining' => $remaining];
    }

    /**
     * Saves one event-odds payload. Pairs each player's Over and Under at the
     * same point for a book into one row.
     */
    public function store(array $event): int
    {
        $home = (string) ($event['home_team'] ?? '');
        $away = (string) ($event['away_team'] ?? '');
        $commence = strtotime((string) ($event['commence_time'] ?? '')) ?: null;
        $eventId = substr((string) ($event['id'] ?? ''), 0, 64);
        if ($eventId === '') {
            return 0;
        }
        $now = date('Y-m-d H:i:s');
        $saved = 0;

        foreach ((array) ($event['bookmakers'] ?? []) as $book) {
            $bookKey = substr((string) ($book['key'] ?? ''), 0, 32);
            foreach ((array) ($book['markets'] ?? []) as $market) {
                $ours = self::MARKETS[(string) ($market['key'] ?? '')] ?? null;
                if ($ours === null) {
                    continue;
                }
                $pairs = [];
                foreach ((array) ($market['outcomes'] ?? []) as $o) {
                    $player = trim((string) ($o['description'] ?? ''));
                    $side = strtolower((string) ($o['name'] ?? ''));
                    if ($player === '' || ! isset($o['point'], $o['price']) || ! in_array($side, ['over', 'under'], true)) {
                        continue;
                    }
                    $key = $player . '|' . (float) $o['point'];
                    $pairs[$key]['player'] = $player;
                    $pairs[$key]['line'] = (float) $o['point'];
                    $pairs[$key][$side] = (int) $o['price'];
                }
                foreach ($pairs as $p) {
                    $row = [
                        'provider'      => self::PROVIDER,
                        'event_id'      => $eventId,
                        'commence_time' => $commence ? gmdate('Y-m-d H:i:s', $commence) : null,
                        'home_team'     => self::TEAMS[$home] ?? substr($home, 0, 8),
                        'away_team'     => self::TEAMS[$away] ?? substr($away, 0, 8),
                        'player_name'   => substr($p['player'], 0, 120),
                        'player_key'    => self::nameKey($p['player']),
                        'market'        => $ours,
                        'bookmaker'     => $bookKey,
                        'line'          => $p['line'],
                        'over_odds'     => $p['over'] ?? null,
                        'under_odds'    => $p['under'] ?? null,
                        'fetched_at'    => $now,
                    ];
                    $where = ['event_id' => $eventId, 'player_key' => $row['player_key'], 'market' => $ours, 'bookmaker' => $bookKey];
                    $existing = $this->db->table(self::TABLE)->select('id')->where($where)->get()->getRowArray();
                    if ($existing) {
                        $this->db->table(self::TABLE)->where('id', $existing['id'])->update($row);
                    } else {
                        $this->db->table(self::TABLE)->insert($row);
                    }
                    $saved++;
                }
            }
        }

        return $saved;
    }

    /**
     * Latest upcoming lines for a player, one per market (preferred book first).
     *
     * @return array{opponent:?string, commence_time:?string, bookmaker:?string, fetched_at:?string, lines:list<array{market:string,line:float,over_odds:?int,under_odds:?int}>}|null
     */
    public function upcomingFor(string $playerName, ?string $team = null): ?array
    {
        if (! $this->tableReady()) {
            return null;
        }
        $rows = $this->db->table(self::TABLE)
            ->where('player_key', self::nameKey($playerName))
            ->where('commence_time >=', gmdate('Y-m-d H:i:s', time() - 4 * 3600))
            ->orderBy('commence_time', 'ASC')->orderBy('fetched_at', 'DESC')
            ->get()->getResultArray();
        if ($rows === []) {
            return null;
        }

        $eventId = $rows[0]['event_id'];
        $rank = array_flip(self::BOOKMAKERS);
        $best = [];
        foreach ($rows as $r) {
            if ($r['event_id'] !== $eventId) {
                continue;
            }
            $m = $r['market'];
            $score = $rank[$r['bookmaker']] ?? 99;
            if (! isset($best[$m]) || $score < $best[$m]['_score']) {
                $best[$m] = $r + ['_score' => $score];
            }
        }

        $first = $rows[0];
        $team = $team !== null ? strtoupper($team) : null;
        $opponent = match (true) {
            $team !== null && $team === $first['home_team'] => $first['away_team'],
            $team !== null && $team === $first['away_team'] => $first['home_team'],
            default                                         => null,
        };

        $lines = [];
        foreach (array_keys(array_flip(self::MARKETS)) as $m) {
            if (isset($best[$m])) {
                $lines[] = [
                    'market'     => $m,
                    'line'       => (float) $best[$m]['line'],
                    'over_odds'  => $best[$m]['over_odds'] !== null ? (int) $best[$m]['over_odds'] : null,
                    'under_odds' => $best[$m]['under_odds'] !== null ? (int) $best[$m]['under_odds'] : null,
                ];
            }
        }
        $firstBest = reset($best) ?: $first;

        return [
            'opponent'      => $opponent,
            'commence_time' => $first['commence_time'],
            'bookmaker'     => $firstBest['bookmaker'] ?? null,
            'fetched_at'    => $firstBest['fetched_at'] ?? null,
            'lines'         => $lines,
        ];
    }

    /** Distinct player keys with upcoming lines (for the weekly picks list). */
    public function upcomingPlayerKeys(): array
    {
        if (! $this->tableReady()) {
            return [];
        }
        $rows = $this->db->table(self::TABLE)->distinct()->select('player_key')
            ->where('commence_time >=', gmdate('Y-m-d H:i:s', time() - 4 * 3600))
            ->get()->getResultArray();

        return array_column($rows, 'player_key');
    }

    /** "Kenneth Walker III" and "Kenneth Walker" match; punctuation and case ignored. */
    public static function nameKey(string $name): string
    {
        $n = strtolower(trim($name));
        $n = (string) preg_replace('/[^a-z0-9 ]+/', '', $n);
        $n = (string) preg_replace('/\s+(jr|sr|ii|iii|iv|v)$/', '', $n);

        return trim((string) preg_replace('/\s+/', ' ', $n));
    }

    /** @return array{status:int, body:string, headers:array<string,string>} */
    private function get(string $url): array
    {
        $res = ($this->http)($url);
        if (($res['status'] ?? 0) === 401) {
            throw new RuntimeException('Odds API rejected the key (HTTP 401)');
        }
        if (($res['status'] ?? 0) === 429) {
            throw new RuntimeException('Odds API quota or rate limit reached (HTTP 429)');
        }
        if (($res['status'] ?? 0) !== 200) {
            throw new RuntimeException('Odds API HTTP ' . ($res['status'] ?? 0));
        }

        return $res;
    }
}
