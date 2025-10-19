<?php
namespace App\Models;

use CodeIgniter\Model;

class PushSubscriptionModel extends Model
{
    protected $table = 'bf_push_subscriptions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','endpoint','p256dh','auth','user_agent','created_at','revoked_at','last_sent_at'];
    protected $useTimestamps = false;

    public function activeByUser(int $userId): array
    {
        return $this->where('user_id',$userId)->where('revoked_at', null)->findAll(100);
    }

    public function upsertForUser(int $userId, array $sub): void
    {
        $existing = $this->where('endpoint',$sub['endpoint'])->first();
        $payload = [
            'user_id'=>$userId,
            'endpoint'=>$sub['endpoint'],
            'p256dh'=>$sub['keys']['p256dh'] ?? '',
            'auth'=>$sub['keys']['auth'] ?? '',
            'user_agent'=>$sub['ua'] ?? null,
            'revoked_at'=>null,
            'last_sent_at'=>null,
            'created_at'=>date('Y-m-d H:i:s'),
        ];
        if ($existing) {
            $this->update($existing['id'], $payload);
        } else {
            $this->insert($payload);
        }
    }

    public function revokeByEndpoint(string $endpoint): int
    {
        return $this->where('endpoint',$endpoint)->set(['revoked_at'=>date('Y-m-d H:i:s')])->update();
    }
}
