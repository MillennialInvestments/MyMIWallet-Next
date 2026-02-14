<?php

namespace App\Models;

use CodeIgniter\Model;

class UserIpHistoryModel extends Model
{
    protected $table = 'bf_user_ip_history';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id', 'email', 'ip_address', 'user_agent', 'first_seen_at', 'last_seen_at', 'hits',
    ];

    public function record(?int $userId, ?string $email, string $ip, string $userAgent): void
    {
        try {
            $now = date('Y-m-d H:i:s');

            $builder = $this->builder()->where('ip_address', $ip);

            if ($userId) {
                $builder->where('user_id', $userId);
            } elseif ($email) {
                $builder->where('email', $email);
            }

            $existing = $builder->get()->getRowArray();

            if ($existing) {
                $this->update((int) $existing['id'], [
                    'user_id'     => $userId ?: ($existing['user_id'] ?? null),
                    'email'       => $email ?: ($existing['email'] ?? null),
                    'user_agent'  => mb_substr($userAgent, 0, 1000),
                    'last_seen_at'=> $now,
                    'login_count' => (int) ($existing['login_count'] ?? 1) + 1,
                ]);
            } else {
                $this->insert([
                    'user_id'       => $userId,
                    'email'         => $email,
                    'ip_address'    => $ip,
                    'user_agent'    => mb_substr($userAgent, 0, 1000),
                    'login_count'   => 1,
                    'first_seen_at' => $now,
                    'last_seen_at'  => $now,
                ]);
            }

        } catch (\Throwable $e) {
            log_message('error', 'UserIpHistoryModel::record failed: ' . $e->getMessage());
        }
    }

}
