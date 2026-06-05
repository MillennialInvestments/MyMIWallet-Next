<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinWalletModel extends Model
{
    protected $table = 'bf_tbi_coin_wallets';
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
        'user_id',
        'available_balance',
        'locked_balance',
        'voting_balance',
        'lifetime_earned',
        'lifetime_withdrawn',
        'lifetime_redeemed',
        'status',
        'created_by',
        'updated_by',
    ];
}
