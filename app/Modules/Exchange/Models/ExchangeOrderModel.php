<?php
namespace App\Modules\Exchange\Models;

use App\Models\ObservedModel;

/**
 * Placeholder model for exchange orders.
 */
class ExchangeOrderModel extends ObservedModel
{
    protected $table      = 'exchange_orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','symbol','side','quantity','price','status','created_at'];
    protected $useTimestamps = true;
}
