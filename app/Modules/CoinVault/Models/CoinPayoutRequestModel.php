<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinPayoutRequestModel extends Model
{
    protected $table = 'bf_tbi_coin_payout_requests';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowedFields = [
        'project_id',
        'coin_id',
        'wallet_id',
        'user_id',
        'coin_amount',
        'requested_coin_amount',
        'usd_reference_amount',
        'requested_usd_amount',
        'status',
        'memo',
        'notes',
        'payment_method',
        'payout_provider',
        'payout_metadata',
        'external_reference',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
        'rejection_reason',
        'paid_by',
        'paid_at',
        'created_by',
        'updated_by',
    ];
}
