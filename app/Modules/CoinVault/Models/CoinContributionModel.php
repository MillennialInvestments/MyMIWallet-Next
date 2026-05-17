<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinContributionModel extends Model
{
    protected $table = 'bf_coin_vault_contributions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_id', 'project_key', 'coin_symbol', 'user_id', 'user_email', 'contribution_type',
        'source', 'source_id', 'usd_amount', 'hours', 'task_count', 'calculated_coin_amount',
        'status', 'memo', 'metadata', 'approved_by', 'approved_at', 'rejected_by', 'rejected_at',
        'rejection_reason', 'created_by', 'updated_by',
    ];
}
