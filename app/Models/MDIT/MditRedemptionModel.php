<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditRedemptionModel extends Model
{
    protected $table = 'bf_mdit_redemptions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'user_id',
        'wallet_address',
        'token_units',
        'requested_on',
        'approved_on',
        'approved_by',
        'status',
        'payout_asset',
        'payout_amount',
        'notes',
    ];
}
