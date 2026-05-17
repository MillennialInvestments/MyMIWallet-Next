<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinPayoutRequestModel extends Model
{
    protected $table = 'bf_coin_vault_payout_requests';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_id', 'wallet_id', 'user_id', 'coin_amount', 'usd_reference_amount', 'status',
        'memo', 'payout_provider', 'payout_metadata', 'approved_by', 'approved_at',
        'rejected_by', 'rejected_at', 'rejection_reason', 'paid_by', 'paid_at',
        'created_by', 'updated_by',
    ];
}
