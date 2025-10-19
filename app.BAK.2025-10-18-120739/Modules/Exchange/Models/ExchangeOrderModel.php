<?php
namespace App\Modules\Exchange\Models;

use CodeIgniter\Model;

/**
 * Placeholder model for exchange orders.
 */
class ExchangeOrderModel extends Model
{
    protected $table      = 'exchange_orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','symbol','side','quantity','price','status','created_at'];
    protected $useTimestamps = true;
}
