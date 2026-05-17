<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinLedgerModel extends Model
{
    protected $table = 'bf_coin_vault_ledger';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_id', 'wallet_id', 'user_id', 'transaction_type', 'direction', 'amount',
        'balance_after', 'reference_table', 'reference_id', 'source', 'source_id',
        'blockchain_network', 'blockchain_tx', 'memo', 'metadata', 'created_by', 'updated_by',
    ];
}
