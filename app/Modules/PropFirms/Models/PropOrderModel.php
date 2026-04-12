<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropOrderModel extends ObservedModel
{
    protected $table = 'bf_prop_orders';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'prop_broker_connection_id',
        'symbol',
        'side',
        'order_type',
        'qty',
        'limit_price',
        'status',
        'external_order_id',
        'submitted_at',
    ];
}
