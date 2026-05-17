<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinProjectModel extends Model
{
    protected $table = 'bf_coin_vault_projects';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_key', 'project_name', 'coin_name', 'coin_symbol', 'coin_type',
        'total_supply', 'released_supply', 'vault_balance', 'usd_reference_value',
        'blockchain_network', 'solana_mint_address', 'status', 'metadata',
        'created_by', 'updated_by',
    ];
}
