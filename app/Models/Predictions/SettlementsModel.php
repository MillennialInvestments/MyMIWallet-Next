<?php

declare(strict_types=1);

namespace App\Models\Predictions;

use CodeIgniter\Model;

class SettlementsModel extends Model
{
    protected $table = 'bf_predictions_settlements';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'market_id',
        'winning_option_id',
        'resolver_user_id',
        'resolution_note',
        'resolved_at',
        'created_at',
    ];
}
