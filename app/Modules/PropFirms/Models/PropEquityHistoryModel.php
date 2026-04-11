<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropEquityHistoryModel extends ObservedModel
{
    protected $table = 'bf_prop_equity_history';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
