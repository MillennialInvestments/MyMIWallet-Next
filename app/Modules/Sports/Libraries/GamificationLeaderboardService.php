<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

use CodeIgniter\Database\BaseConnection;

/**
 * Service managing Gamified Social Competitions & Leaderboards.
 * Fully compliant with UIGEA 31 U.S.C. § 5362(1)(E)(ix) (Skill-based Fantasy / Social Gaming).
 * Users compete with virtual bankrolls; zero cash or crypto is wagered.
 */
class GamificationLeaderboardService
{
    public const TABLE = 'bf_sports_gamified_leaderboard';

    public function __construct(private readonly BaseConnection $db)
    {
    }

    public function tablesReady(): bool
    {
        return $this->db->tableExists(self::TABLE, false);
    }

    /**
     * Seeds initial community rankings if empty.
     */
    public function ensureSampleLeaderboard(): void
    {
        if (! $this->tablesReady()) {
            return;
        }

        $count = $this->db->table(self::TABLE)->countAllResults();
        if ($count > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $community = [
            [
                'user_id'           => 1001,
                'username'          => 'AlphaSharp_99',
                'avatar_badge'      => 'legend',
                'tier_level'        => 5,
                'season_year'       => 2025,
                'virtual_bankroll'  => 6840.50,
                'total_predictions' => 142,
                'won_predictions'   => 94,
                'lost_predictions'  => 48,
                'win_rate_pct'      => 66.20,
                'net_roi_pct'       => 173.62,
                'current_streak'    => 7,
                'best_streak'       => 11,
                'xp_points'         => 14200,
            ],
            [
                'user_id'           => 1002,
                'username'          => 'QuantVigCrusher',
                'avatar_badge'      => 'whale',
                'tier_level'        => 4,
                'season_year'       => 2025,
                'virtual_bankroll'  => 5210.00,
                'total_predictions' => 118,
                'won_predictions'   => 74,
                'lost_predictions'  => 44,
                'win_rate_pct'      => 62.71,
                'net_roi_pct'       => 108.40,
                'current_streak'    => 4,
                'best_streak'       => 9,
                'xp_points'         => 10800,
            ],
            [
                'user_id'           => 1003,
                'username'          => 'SatoshiProphet',
                'avatar_badge'      => 'prodigy',
                'tier_level'        => 4,
                'season_year'       => 2025,
                'virtual_bankroll'  => 4480.25,
                'total_predictions' => 95,
                'won_predictions'   => 58,
                'lost_predictions'  => 37,
                'win_rate_pct'      => 61.05,
                'net_roi_pct'       => 79.21,
                'current_streak'    => 3,
                'best_streak'       => 8,
                'xp_points'         => 8900,
            ],
            [
                'user_id'           => 1004,
                'username'          => 'GoldilocksTrader',
                'avatar_badge'      => 'sharp',
                'tier_level'        => 3,
                'season_year'       => 2025,
                'virtual_bankroll'  => 3820.00,
                'total_predictions' => 76,
                'won_predictions'   => 45,
                'lost_predictions'  => 31,
                'win_rate_pct'      => 59.21,
                'net_roi_pct'       => 52.80,
                'current_streak'    => 2,
                'best_streak'       => 6,
                'xp_points'         => 6400,
            ],
            [
                'user_id'           => 1005,
                'username'          => 'CryptoKelly_X',
                'avatar_badge'      => 'sharp',
                'tier_level'        => 3,
                'season_year'       => 2025,
                'virtual_bankroll'  => 3410.75,
                'total_predictions' => 64,
                'won_predictions'   => 38,
                'lost_predictions'  => 26,
                'win_rate_pct'      => 59.38,
                'net_roi_pct'       => 36.43,
                'current_streak'    => 5,
                'best_streak'       => 7,
                'xp_points'         => 5200,
            ],
        ];

        foreach ($community as $row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
            $this->db->table(self::TABLE)->insert($row);
        }
    }

    /**
     * @return list<array<string,mixed>>
     */
    public function getLeaderboard(int $limit = 50): array
    {
        if (! $this->tablesReady()) {
            return [];
        }

        $this->ensureSampleLeaderboard();

        $rows = $this->db->table(self::TABLE)
            ->where('season_year', 2025)
            ->orderBy('net_roi_pct', 'DESC')
            ->orderBy('xp_points', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $ranked = [];
        $rank = 1;
        foreach ($rows as $r) {
            $r['rank'] = $rank++;
            $ranked[] = $r;
        }

        return $ranked;
    }

    public function getUserPrestige(int $userId, ?string $username = null): array
    {
        return $this->getUserStats($userId, $username);
    }

    public function getWeeklyTournamentInfo(): array
    {
        return $this->getWeeklyContest();
    }

    /**
     * Gets or creates user gamified profile.
     *
     * @return array<string,mixed>
     */
    public function getUserStats(int $userId, ?string $username = null): array
    {
        $default = [
            'user_id'           => $userId,
            'username'          => $username ?? ('User_' . $userId),
            'avatar_badge'      => 'rookie',
            'tier_level'        => 1,
            'season_year'       => 2025,
            'virtual_bankroll'  => 2500.00,
            'total_predictions' => 0,
            'won_predictions'   => 0,
            'lost_predictions'  => 0,
            'win_rate_pct'      => 0.00,
            'net_roi_pct'       => 0.00,
            'current_streak'    => 0,
            'best_streak'       => 0,
            'xp_points'         => 0,
            'rank'              => 999,
        ];

        if ($userId <= 0 || ! $this->tablesReady()) {
            return $default;
        }

        $row = $this->db->table(self::TABLE)
            ->where('user_id', $userId)
            ->where('season_year', 2025)
            ->get()
            ->getRowArray();

        if ($row === null) {
            $now = date('Y-m-d H:i:s');
            $row = $default;
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
            unset($row['rank']);
            $this->db->table(self::TABLE)->insert($row);
            $row['rank'] = $this->db->table(self::TABLE)->where('season_year', 2025)->countAllResults();
            return $row;
        }

        // Calculate rank
        $better = $this->db->table(self::TABLE)
            ->where('season_year', 2025)
            ->where('net_roi_pct >', (float) $row['net_roi_pct'])
            ->countAllResults();

        $row['rank'] = $better + 1;

        return $row;
    }

    /**
     * Returns weekly UIGEA-exempt skill prediction tournament details.
     *
     * @return array<string,mixed>
     */
    public function getWeeklyContest(): array
    {
        return [
            'title'             => 'Week 13 Quantitative Strategy Challenge',
            'rule_type'         => 'UIGEA § 5362(1)(E)(ix) Skill-Based Tournament',
            'status'            => 'active',
            'entry_cost'        => 'FREE (Zero Purchase Necessary)',
            'prize_pool_usd'    => '1,500 USDC',
            'participants'      => 248,
            'picks_required'    => 5,
            'scoring_method'    => 'Net ROI % across 5 quantitative prop/market selections',
            'starts_at'         => '2025-01-01 00:00:00',
            'ends_at'           => '2025-01-07 23:59:59',
            'top_rewards'       => [
                '1st Place' => '750 USDC + Legend Badge + Pro Year Pass',
                '2nd Place' => '450 USDC + Whale Badge',
                '3rd Place' => '300 USDC + Sharp Badge',
            ],
        ];
    }
}
