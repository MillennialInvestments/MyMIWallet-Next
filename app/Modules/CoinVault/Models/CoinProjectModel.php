<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinProjectModel extends Model
{
    protected $table = 'bf_tbi_project_coins';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowedFields = [
        'project_id',
        'coin_key',
        'coin_name',
        'symbol',
        'coin_type',
        'unit_value_usd',
        'total_supply',
        'released_supply',
        'vault_balance',
        'blockchain_network',
        'solana_mint_address',
        'exchange_asset_id',
        'project_exchange_symbol',
        'primary_issuance_enabled',
        'secondary_trading_enabled',
        'compliance_required',
        'status',
        'metadata_json',
    ];
}
