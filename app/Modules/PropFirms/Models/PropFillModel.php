<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropFillModel extends ObservedModel
{
    protected $table = 'bf_prop_fills';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'prop_order_id',
        'fill_qty',
        'fill_price',
        'fee_amount',
        'filled_at',
        'external_fill_id',
    ];
}
