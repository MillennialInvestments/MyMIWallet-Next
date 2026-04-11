<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropTradeJournalModel extends ObservedModel
{
    protected $table = 'bf_prop_trade_journal';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
