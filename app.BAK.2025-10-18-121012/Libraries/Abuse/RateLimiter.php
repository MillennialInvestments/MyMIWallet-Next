<?php
namespace App\Libraries\Abuse;

use CodeIgniter\Database\BaseConnection;

class RateLimiter
{
    public function __construct(private BaseConnection $db) {}

    /**
     * Attempt an action within limit & window.
     *
     * @return array{allowed:bool, remaining:int, reset_at:int, blocked_until:int|null, count:int}
     */
    public function attempt(string $scope, string $key, int $limit, int $perSeconds, int $blockSecondsOnExceed = 0): array
    {
        $now = time();
        $winStart = date('Y-m-d H:i:s', $now - $perSeconds + 1);

        $row = $this->db->table('bf_users_rate_limits')->where(['scope' => $scope, 'rl_key' => $key])->get()->getRowArray();
        if ($row) {
            if (!empty($row['blocked_until']) && strtotime($row['blocked_until']) > $now) {
                return [
                    'allowed' => false,
                    'remaining' => 0,
                    'reset_at' => $now + $perSeconds,
                    'blocked_until' => strtotime($row['blocked_until']),
                    'count' => (int) $row['count'],
                ];
            }
            if (strtotime($row['window_started']) < strtotime($winStart)) {
                $row['count'] = 0;
                $this->db->table('bf_users_rate_limits')->where('id', $row['id'])->set([
                    'count' => 0,
                    'window_started' => date('Y-m-d H:i:s'),
                ])->update();
            }
        } else {
            $this->db->table('bf_users_rate_limits')->insert([
                'scope' => $scope,
                'rl_key' => $key,
                'count' => 0,
                'window_started' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $row = $this->db->table('bf_users_rate_limits')->where(['scope' => $scope, 'rl_key' => $key])->get()->getRowArray();
        }

        $count = (int) $row['count'] + 1;
        $allowed = $count <= $limit;

        $update = ['count' => $count, 'updated_at' => date('Y-m-d H:i:s')];
        if (! $allowed && $blockSecondsOnExceed > 0) {
            $update['blocked_until'] = date('Y-m-d H:i:s', $now + $blockSecondsOnExceed);
        }
        $this->db->table('bf_users_rate_limits')->where('id', $row['id'])->set($update)->update();

        return [
            'allowed' => $allowed,
            'remaining' => max(0, $limit - $count),
            'reset_at' => $now + $perSeconds,
            'blocked_until' => $update['blocked_until'] ?? null ? ($now + $blockSecondsOnExceed) : null,
            'count' => $count,
        ];
    }
}
