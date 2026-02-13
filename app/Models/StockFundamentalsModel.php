<?php

namespace App\Models;

use CodeIgniter\Model;

class StockFundamentalsModel extends Model
{
    protected $table = 'bf_stock_fundamentals';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'ticker',
        'data',
        'created_on',
        'last_refreshed',
    ];
}

