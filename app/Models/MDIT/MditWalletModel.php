<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditWalletModel extends Model
{
    protected $table = 'bf_mdit_wallets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'user_id',
        'wallet_address',
        'chain',
        'is_primary',
        'status',
        'created_on',
    ];
}
