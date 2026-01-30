<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditNavSnapshotModel extends Model
{
    protected $table = 'bf_mdit_nav_snapshots';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'as_of_date',
        'nav_total',
        'token_supply',
        'nav_per_unit',
        'cash_value',
        'equities_value',
        'created_on',
    ];
}
