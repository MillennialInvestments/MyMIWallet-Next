<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

use App\Libraries\StoredSecret;
use CodeIgniter\Database\BaseConnection;

/**
 * Service managing user personal sports bet tracking, bankroll accounting,
 * closing-line value (CLV) evaluation, BYOK API credentials, and CSV import/export.
 *
 * Hard Invariant: All mutations and lookups enforce fail-closed user isolation
 * ($userId resolved strictly from session context; never trusts request body).
 * Analytics only; no real wagers are accepted or brokered.
 */
class SportsBetTrackerService
{
    public function __construct(private readonly BaseConnection $db)
    {
    }

    public function tablesReady(): bool
    {
        return $this->db->tableExists('bf_sports_user_bets')
            && $this->db->tableExists('bf_sports_user_settings');
    }

    /**
     * Calculates comprehensive bankroll and betting performance summary KPIs for a user.
     *
     * @return array<string,mixed>
     */
    public function getSummary(int $userId): array
    {
        if ($userId <= 0 || ! $this->tablesReady()) {
            return $this->emptySummary();
        }

        $builder = $this->db->table('bf_sports_user_bets')->where('user_id', $userId);
        $bets = $builder->get()->getResultArray();

        $totalBets = count($bets);
        $totalStaked = 0.0;
        $settledStaked = 0.0;
        $openRisk = 0.0;
        $netPnl = 0.0;
        $wonCount = 0;
        $lostCount = 0;
        $pushCount = 0;
        $openCount = 0;
        $cashedCount = 0;
        $clvEdgeSum = 0.0;
        $clvCount = 0;

        $bySport = [];
        $bySportsbook = [];

        foreach ($bets as $b) {
            $stake = (float) ($b['stake_amount'] ?? 0);
            $pnl = (float) ($b['pnl_amount'] ?? 0);
            $status = strtolower((string) ($b['status'] ?? 'open'));
            $sport = strtoupper(trim((string) ($b['sport'] ?? 'NFL')));
            $book = trim((string) ($b['sportsbook'] ?? 'DraftKings'));

            $totalStaked += $stake;

            if ($status === 'open') {
                $openCount++;
                $openRisk += $stake;
            } else {
                $settledStaked += $stake;
                $netPnl += $pnl;

                if ($status === 'won') {
                    $wonCount++;
                } elseif ($status === 'lost') {
                    $lostCount++;
                } elseif ($status === 'push') {
                    $pushCount++;
                } elseif ($status === 'cashed_out') {
                    $cashedCount++;
                }
            }

            if (isset($b['clv_edge']) && $b['clv_edge'] !== null) {
                $clvEdgeSum += (float) $b['clv_edge'];
                $clvCount++;
            }

            // By Sport aggregation
            $bySport[$sport] ??= ['total' => 0, 'won' => 0, 'lost' => 0, 'staked' => 0.0, 'pnl' => 0.0];
            $bySport[$sport]['total']++;
            $bySport[$sport]['staked'] += $stake;
            if ($status !== 'open') {
                $bySport[$sport]['pnl'] += $pnl;
                if ($status === 'won') {
                    $bySport[$sport]['won']++;
                } elseif ($status === 'lost') {
                    $bySport[$sport]['lost']++;
                }
            }

            // By Sportsbook aggregation
            $bySportsbook[$book] ??= ['total' => 0, 'won' => 0, 'lost' => 0, 'staked' => 0.0, 'pnl' => 0.0];
            $bySportsbook[$book]['total']++;
            $bySportsbook[$book]['staked'] += $stake;
            if ($status !== 'open') {
                $bySportsbook[$book]['pnl'] += $pnl;
                if ($status === 'won') {
                    $bySportsbook[$book]['won']++;
                } elseif ($status === 'lost') {
                    $bySportsbook[$book]['lost']++;
                }
            }
        }

        $settledDecided = $wonCount + $lostCount;
        $winRatePct = $settledDecided > 0 ? round(($wonCount / $settledDecided) * 100.0, 2) : 0.0;
        $roiPct = $settledStaked > 0 ? round(($netPnl / $settledStaked) * 100.0, 2) : 0.0;
        $avgClvEdge = $clvCount > 0 ? round($clvEdgeSum / $clvCount, 2) : 0.0;

        $settings = $this->getUserSettings($userId);
        $bankroll = (float) ($settings['default_bankroll'] ?? 2500.0);
        $currentBankroll = round($bankroll + $netPnl, 2);

        return [
            'total_bets'       => $totalBets,
            'open_bets'        => $openCount,
            'won_bets'         => $wonCount,
            'lost_bets'        => $lostCount,
            'push_bets'        => $pushCount,
            'cashed_bets'      => $cashedCount,
            'total_staked'     => round($totalStaked, 2),
            'settled_staked'   => round($settledStaked, 2),
            'open_risk'        => round($openRisk, 2),
            'net_pnl'          => round($netPnl, 2),
            'win_rate_pct'     => $winRatePct,
            'roi_pct'          => $roiPct,
            'avg_clv_edge_pct' => $avgClvEdge,
            'initial_bankroll' => $bankroll,
            'current_bankroll' => $currentBankroll,
            'currency'         => $settings['bankroll_currency'] ?? 'USD',
            'by_sport'         => $bySport,
            'by_sportsbook'    => $bySportsbook,
        ];
    }

    /**
     * @return array<string,mixed>
     */
    private function emptySummary(): array
    {
        return [
            'total_bets'       => 0,
            'open_bets'        => 0,
            'won_bets'         => 0,
            'lost_bets'        => 0,
            'push_bets'        => 0,
            'cashed_bets'      => 0,
            'total_staked'     => 0.0,
            'settled_staked'   => 0.0,
            'open_risk'        => 0.0,
            'net_pnl'          => 0.0,
            'win_rate_pct'     => 0.0,
            'roi_pct'          => 0.0,
            'avg_clv_edge_pct' => 0.0,
            'initial_bankroll' => 2500.0,
            'current_bankroll' => 2500.0,
            'currency'         => 'USD',
            'by_sport'         => [],
            'by_sportsbook'    => [],
        ];
    }

    /**
     * Lists user bets with optional status / sport / sportsbook filtering.
     *
     * @param array{status?:string,sport?:string,sportsbook?:string,limit?:int,offset?:int} $filters
     * @return list<array<string,mixed>>
     */
    public function listBets(int $userId, array $filters = []): array
    {
        if ($userId <= 0 || ! $this->tablesReady()) {
            return [];
        }

        $builder = $this->db->table('bf_sports_user_bets')->where('user_id', $userId);

        if (! empty($filters['status']) && $filters['status'] !== 'all') {
            $builder->where('status', strtolower(trim((string) $filters['status'])));
        }
        if (! empty($filters['sport']) && $filters['sport'] !== 'all') {
            $builder->where('sport', strtoupper(trim((string) $filters['sport'])));
        }
        if (! empty($filters['sportsbook']) && $filters['sportsbook'] !== 'all') {
            $builder->where('sportsbook', trim((string) $filters['sportsbook']));
        }

        $limit = isset($filters['limit']) ? max(1, min(500, (int) $filters['limit'])) : 100;
        $offset = isset($filters['offset']) ? max(0, (int) $filters['offset']) : 0;

        return $builder->orderBy('placed_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }

    /**
     * Creates a new bet slip for the user.
     *
     * @param array<string,mixed> $data
     */
    public function createBet(int $userId, array $data): int
    {
        if ($userId <= 0) {
            throw new \InvalidArgumentException('Unauthenticated user cannot create bets.');
        }

        $odds = (int) ($data['odds'] ?? -110);
        $stake = max(0.01, (float) ($data['stake_amount'] ?? 10.0));
        $status = strtolower(trim((string) ($data['status'] ?? 'open')));
        if (! in_array($status, ['open', 'won', 'lost', 'push', 'cashed_out'], true)) {
            $status = 'open';
        }

        $potentialPayout = BettingCalculators::calculatePayout($stake, $odds);
        $pnl = BettingCalculators::calculatePnl($stake, $odds, $status);

        $closingLine = isset($data['closing_line']) && $data['closing_line'] !== '' ? (float) $data['closing_line'] : null;
        $clvEdge = null;
        if (isset($data['closing_odds']) && $data['closing_odds'] !== '') {
            $clvEdge = BettingCalculators::clvEdge($odds, (int) $data['closing_odds']);
        }

        $now = date('Y-m-d H:i:s');
        $placedAt = ! empty($data['placed_at']) ? date('Y-m-d H:i:s', strtotime((string) $data['placed_at'])) : $now;

        $row = [
            'user_id'           => $userId,
            'placed_at'         => $placedAt,
            'sportsbook'        => trim((string) ($data['sportsbook'] ?? 'DraftKings')),
            'sport'             => strtoupper(trim((string) ($data['sport'] ?? 'NFL'))),
            'league'            => strtoupper(trim((string) ($data['league'] ?? ($data['sport'] ?? 'NFL')))),
            'bet_type'          => trim((string) ($data['bet_type'] ?? 'Prop')),
            'event_description' => trim((string) ($data['event_description'] ?? 'Event')),
            'selection'         => trim((string) ($data['selection'] ?? 'Selection')),
            'line'              => isset($data['line']) && $data['line'] !== '' ? (float) $data['line'] : null,
            'odds'              => $odds,
            'stake_amount'      => round($stake, 2),
            'potential_payout'  => $potentialPayout,
            'status'            => $status,
            'closing_line'      => $closingLine,
            'clv_edge'          => $clvEdge,
            'pnl_amount'        => $pnl,
            'notes'             => ! empty($data['notes']) ? trim((string) $data['notes']) : null,
            'created_at'        => $now,
            'updated_at'        => $now,
        ];

        $this->db->table('bf_sports_user_bets')->insert($row);

        return (int) $this->db->insertID();
    }

    /**
     * Updates status and resolves P&L for a specific bet.
     */
    public function updateStatus(int $userId, int $betId, string $status, ?float $closingLine = null, ?int $closingOdds = null): bool
    {
        if ($userId <= 0 || $betId <= 0) {
            return false;
        }

        $bet = $this->db->table('bf_sports_user_bets')
            ->where('id', $betId)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($bet === null) {
            return false;
        }

        $status = strtolower(trim($status));
        if (! in_array($status, ['open', 'won', 'lost', 'push', 'cashed_out'], true)) {
            return false;
        }

        $stake = (float) $bet['stake_amount'];
        $odds = (int) $bet['odds'];
        $pnl = BettingCalculators::calculatePnl($stake, $odds, $status);

        $updates = [
            'status'     => $status,
            'pnl_amount' => $pnl,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($closingLine !== null) {
            $updates['closing_line'] = $closingLine;
        }
        if ($closingOdds !== null) {
            $updates['clv_edge'] = BettingCalculators::clvEdge($odds, $closingOdds);
        }

        return $this->db->table('bf_sports_user_bets')
            ->where('id', $betId)
            ->where('user_id', $userId)
            ->update($updates);
    }

    /**
     * Deletes a bet with fail-closed user verification.
     */
    public function deleteBet(int $userId, int $betId): bool
    {
        if ($userId <= 0 || $betId <= 0) {
            return false;
        }

        $bet = $this->db->table('bf_sports_user_bets')
            ->where('id', $betId)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($bet === null) {
            return false;
        }

        return (bool) $this->db->table('bf_sports_user_bets')
            ->where('id', $betId)
            ->where('user_id', $userId)
            ->delete();
    }

    /**
     * Retrieves user BYOK and bankroll settings.
     *
     * @return array<string,mixed>
     */
    public function getUserSettings(int $userId): array
    {
        $default = [
            'user_id'                 => $userId,
            'default_unit_size'       => 50.00,
            'default_bankroll'        => 2500.00,
            'bankroll_currency'       => 'USD',
            'has_odds_api_key'        => false,
            'has_api_sports_key'      => false,
        ];

        if ($userId <= 0 || ! $this->tablesReady()) {
            return $default;
        }

        $row = $this->db->table('bf_sports_user_settings')
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($row === null) {
            return $default;
        }

        return [
            'user_id'                 => $userId,
            'default_unit_size'       => (float) ($row['default_unit_size'] ?? 50.00),
            'default_bankroll'        => (float) ($row['default_bankroll'] ?? 2500.00),
            'bankroll_currency'       => (string) ($row['bankroll_currency'] ?? 'USD'),
            'has_odds_api_key'        => ! empty($row['odds_api_key_encrypted']),
            'has_api_sports_key'      => ! empty($row['api_sports_key_encrypted']),
        ];
    }

    /**
     * Saves user settings, securely encrypting BYOK API keys at rest via StoredSecret.
     *
     * @param array<string,mixed> $data
     */
    public function saveUserSettings(int $userId, array $data): bool
    {
        if ($userId <= 0 || ! $this->tablesReady()) {
            return false;
        }

        $existing = $this->db->table('bf_sports_user_settings')
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        $now = date('Y-m-d H:i:s');
        $row = [
            'default_unit_size' => isset($data['default_unit_size']) ? max(1.0, (float) $data['default_unit_size']) : 50.00,
            'default_bankroll'  => isset($data['default_bankroll']) ? max(1.0, (float) $data['default_bankroll']) : 2500.00,
            'bankroll_currency' => ! empty($data['bankroll_currency']) ? strtoupper(substr(trim((string) $data['bankroll_currency']), 0, 8)) : 'USD',
            'updated_at'        => $now,
        ];

        // Encrypt BYOK keys if provided; if explicitly cleared, set to null
        if (isset($data['odds_api_key'])) {
            $rawKey = trim((string) $data['odds_api_key']);
            $row['odds_api_key_encrypted'] = $rawKey !== '' ? StoredSecret::seal($rawKey) : null;
        }
        if (isset($data['api_sports_key'])) {
            $rawKey = trim((string) $data['api_sports_key']);
            $row['api_sports_key_encrypted'] = $rawKey !== '' ? StoredSecret::seal($rawKey) : null;
        }

        if ($existing === null) {
            $row['user_id'] = $userId;
            $row['created_at'] = $now;
            return $this->db->table('bf_sports_user_settings')->insert($row);
        }

        return $this->db->table('bf_sports_user_settings')
            ->where('user_id', $userId)
            ->update($row);
    }

    /**
     * Resolves the decrypted personal The Odds API key for a user if configured,
     * otherwise falls back to system env('THE_ODDS_API_KEY').
     */
    public function resolveOddsApiKey(int $userId): ?string
    {
        if ($userId > 0 && $this->tablesReady()) {
            $row = $this->db->table('bf_sports_user_settings')
                ->select('odds_api_key_encrypted')
                ->where('user_id', $userId)
                ->get()
                ->getRowArray();

            if (! empty($row['odds_api_key_encrypted'])) {
                try {
                    $decrypted = StoredSecret::open($row['odds_api_key_encrypted']);
                    if ($decrypted !== null && $decrypted !== '') {
                        return $decrypted;
                    }
                } catch (\Throwable) {
                    // Fall back to env
                }
            }
        }

        $envKey = (string) env('THE_ODDS_API_KEY', '');
        return $envKey !== '' ? $envKey : null;
    }

    /**
     * Imports bet slips from CSV (Action Network, Pikkit, or Universal format).
     *
     * @return array{imported:int,skipped:int,errors:list<string>}
     */
    public function importCsv(int $userId, string $csvContent, string $format = 'universal'): array
    {
        if ($userId <= 0 || ! $this->tablesReady()) {
            return ['imported' => 0, 'skipped' => 0, 'errors' => ['Authentication or tables missing.']];
        }

        $lines = preg_split('/\r\n|\r|\n/', trim($csvContent)) ?: [];
        if (count($lines) < 2) {
            return ['imported' => 0, 'skipped' => 0, 'errors' => ['CSV contains no data rows.']];
        }

        $header = str_getcsv(array_shift($lines));
        $headerMap = [];
        foreach ($header as $idx => $col) {
            $headerMap[strtolower(trim($col))] = $idx;
        }

        $imported = 0;
        $skipped = 0;
        $errors = [];

        foreach ($lines as $lineNum => $line) {
            if (trim($line) === '') {
                continue;
            }
            $row = str_getcsv($line);

            // Flexible column resolution
            $date = $row[$headerMap['date'] ?? $headerMap['placed_at'] ?? $headerMap['time'] ?? 0] ?? date('Y-m-d');
            $sport = $row[$headerMap['sport'] ?? $headerMap['league'] ?? 1] ?? 'NFL';
            $event = $row[$headerMap['event'] ?? $headerMap['game'] ?? $headerMap['matchup'] ?? $headerMap['event_description'] ?? 2] ?? 'Game';
            $selection = $row[$headerMap['selection'] ?? $headerMap['pick'] ?? $headerMap['bet'] ?? 3] ?? 'Selection';
            $odds = (int) ($row[$headerMap['odds'] ?? $headerMap['american_odds'] ?? $headerMap['price'] ?? 4] ?? -110);
            $stake = (float) ($row[$headerMap['stake'] ?? $headerMap['stake_amount'] ?? $headerMap['risk'] ?? 5] ?? 10.0);
            $status = strtolower(trim((string) ($row[$headerMap['status'] ?? $headerMap['outcome'] ?? $headerMap['result'] ?? 6] ?? 'open')));
            $book = $row[$headerMap['sportsbook'] ?? $headerMap['book'] ?? $headerMap['bookmaker'] ?? 7] ?? 'DraftKings';
            $type = $row[$headerMap['bet_type'] ?? $headerMap['type'] ?? 8] ?? 'Prop';
            $lineVal = isset($headerMap['line']) && isset($row[$headerMap['line']]) && $row[$headerMap['line']] !== '' ? (float) $row[$headerMap['line']] : null;

            if ($status === 'win') {
                $status = 'won';
            } elseif ($status === 'loss') {
                $status = 'lost';
            } elseif ($status === 'tie' || $status === 'void') {
                $status = 'push';
            }

            try {
                $this->createBet($userId, [
                    'placed_at'         => $date,
                    'sport'             => $sport,
                    'sportsbook'        => $book,
                    'bet_type'          => $type,
                    'event_description' => $event,
                    'selection'         => $selection,
                    'odds'              => $odds,
                    'stake_amount'      => $stake,
                    'status'            => $status,
                    'line'              => $lineVal,
                ]);
                $imported++;
            } catch (\Throwable $e) {
                $skipped++;
                $errors[] = 'Row ' . ($lineNum + 2) . ': ' . $e->getMessage();
            }
        }

        return ['imported' => $imported, 'skipped' => $skipped, 'errors' => $errors];
    }

    /**
     * Exports all user bets to CSV for local download.
     */
    public function exportCsv(int $userId): string
    {
        $bets = $this->listBets($userId, ['limit' => 1000]);
        $fp = fopen('php://memory', 'w+');
        fputcsv($fp, ['ID', 'Date', 'Sportsbook', 'Sport', 'Bet Type', 'Event', 'Selection', 'Line', 'Odds', 'Stake', 'Potential Payout', 'Status', 'P&L', 'Closing Line', 'CLV Edge %', 'Notes']);

        foreach ($bets as $b) {
            fputcsv($fp, [
                $b['id'],
                $b['placed_at'],
                $b['sportsbook'],
                $b['sport'],
                $b['bet_type'],
                $b['event_description'],
                $b['selection'],
                $b['line'] ?? '',
                $b['odds'],
                $b['stake_amount'],
                $b['potential_payout'],
                $b['status'],
                $b['pnl_amount'],
                $b['closing_line'] ?? '',
                $b['clv_edge'] ?? '',
                $b['notes'] ?? '',
            ]);
        }

        rewind($fp);
        $csv = stream_get_contents($fp);
        fclose($fp);

        return $csv !== false ? $csv : '';
    }
}
