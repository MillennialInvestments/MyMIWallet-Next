<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropSyncLogModel extends ObservedModel
{
    protected $table = 'bf_prop_sync_logs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'sync_type',
        'status',
        'started_at',
        'finished_at',
        'summary_json',
    ];
}
