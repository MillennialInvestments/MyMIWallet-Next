<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class SqueezeScorecardModel extends Model
{
    protected $table = 'bf_squeeze_scorecards';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'symbol',
        'short_interest',
        'float_shares',
        'borrow_rate',
        'squeeze_score',
        'created_at',
    ];

    protected $useTimestamps = false;
}
