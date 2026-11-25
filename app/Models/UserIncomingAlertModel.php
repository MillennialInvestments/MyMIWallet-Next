<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class UserIncomingAlertModel extends Model
{
    protected $table            = 'bf_user_incoming_alerts';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $allowedFields    = [
        'user_id',
        'webhook_id',
        'provider',
        'ticker',
        'action',
        'price',
        'entry_price',
        'target_price',
        'stop_loss',
        'strategy',
        'timeframe',
        'message',
        'raw_payload',
        'status',
    ];

    /**
     * Get alerts for a specific user with optional filters.
     */
    public function getForUser(int $userId, int $limit = 50, ?string $provider = null): array
    {
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return [];
        }

        $builder = $this->where('user_id', $userId)
            ->where('status !=', 'archived');

        if ($provider !== null && $provider !== '' && $provider !== 'all') {
            $builder->where('provider', $provider);
        }

        return $builder->orderBy('id', 'DESC')
            ->limit(max(1, min(200, $limit)))
            ->findAll();
    }

    /**
     * Enforce free tier retention limit: prune/archive older alerts beyond $keep limit.
     */
    public function pruneFreeTier(int $userId, int $keep = 5): void
    {
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return;
        }

        $allIds = $this->select('id')
            ->where('user_id', $userId)
            ->where('status !=', 'archived')
            ->orderBy('id', 'DESC')
            ->findAll();

        if (count($allIds) > $keep) {
            $idsToArchive = array_column(array_slice($allIds, $keep), 'id');
            if (! empty($idsToArchive)) {
                $this->whereIn('id', $idsToArchive)
                    ->set(['status' => 'archived'])
                    ->update();
            }
        }
    }
}
