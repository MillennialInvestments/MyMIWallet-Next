<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditDepositModel extends Model
{
    protected $table = 'bf_mdit_deposits';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'updated_on';

    protected $allowedFields = [
        'user_id',
        'wallet_address',
        'chain',
        'asset_symbol',
        'amount',
        'tx_hash',
        'confirmations',
        'status',
        'idempotency_key',
        'provider_event_id',
        'created_on',
        'updated_on',
    ];
}
