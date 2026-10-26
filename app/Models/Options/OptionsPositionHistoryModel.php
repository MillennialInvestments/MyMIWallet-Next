<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsPositionHistoryModel extends Model
{
    protected $table = 'bf_options_position_history';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'position_id',
        'stock_price',
        'call_bid',
        'put_bid',
        'combined_bid',
        'unrealized_pnl',
        'rvol',
        'momentum_score',
        'risk_flag',
        'recorded_at',
    ];
    protected $useTimestamps = false;

    public function getRecentHistory(int $positionId, int $limit = 50): array
    {
        return $this->where('position_id', $positionId)
            ->orderBy('recorded_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
