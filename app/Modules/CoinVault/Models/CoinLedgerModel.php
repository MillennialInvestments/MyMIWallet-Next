<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Models;

use CodeIgniter\Model;

class CoinLedgerModel extends Model
{
    protected $table = 'bf_tbi_coin_contribution_ledger';
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
        'category_id',
        'wallet_id',
        'contribution_type',
        'transaction_type',
        'direction',
        'description',
        'external_reference',
        'usd_value',
        'coin_quantity',
        'amount',
        'balance_after',
        'unit_value_usd',
        'status',
        'reviewed_by',
        'reviewed_at',
        'idempotency_key',
        'source',
        'source_id',
        'external_client',
        'external_event_id',
        'reference_table',
        'reference_id',
        'blockchain_network',
        'blockchain_tx',
        'memo',
        'metadata_json',
        'created_by',
        'updated_by',
    ];
}
