<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinWalletModel extends Model
{
    protected $table = 'bf_coin_vault_wallets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_id', 'user_id', 'available_balance', 'locked_balance', 'voting_balance',
        'lifetime_earned', 'lifetime_withdrawn', 'status', 'created_by', 'updated_by',
    ];
}
