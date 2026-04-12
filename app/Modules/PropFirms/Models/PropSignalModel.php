<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropSignalModel extends ObservedModel
{
    protected $table = 'bf_prop_signals';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'symbol',
        'signal_type',
        'signal_strength',
        'payload_json',
        'triggered_at',
    ];
}
