<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsPositionLegModel extends Model
{
    protected $table = 'bf_options_position_legs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'position_id',
        'leg_type',
        'contract_symbol',
        'strike',
        'expiry',
        'quantity',
        'fill_price',
        'current_bid',
        'current_ask',
        'current_iv',
        'delta',
        'gamma',
        'theta',
        'vega',
        'status',
        'exit_price',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function getLegsForPosition(int $positionId): array
    {
        return $this->where('position_id', $positionId)->findAll();
    }
}
