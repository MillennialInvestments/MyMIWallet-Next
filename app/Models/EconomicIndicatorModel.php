<?php

namespace App\Models;

use CodeIgniter\Model;

class EconomicIndicatorModel extends Model
{
    protected $table = 'bf_economic_indicators';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'series_id',
        'source',
        'frequency',
        'unit',
        'created_on',
        'last_updated',
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;
}
