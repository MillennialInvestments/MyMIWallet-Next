<?php

namespace App\Models;

use CodeIgniter\Model;

class EconomicDataPointModel extends Model
{
    protected $table = 'bf_economic_data_points';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'indicator_id',
        'date',
        'value',
        'created_on',
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;
}
