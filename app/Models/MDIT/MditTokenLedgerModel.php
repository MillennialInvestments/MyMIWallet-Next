<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditTokenLedgerModel extends Model
{
    protected $table = 'bf_mdit_token_ledger';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'user_id',
        'wallet_address',
        'token_symbol',
        'units',
        'nav_at_mint',
        'minted_on',
        'burned_on',
        'source_deposit_id',
        'source_redemption_id',
        'status',
    ];
}
