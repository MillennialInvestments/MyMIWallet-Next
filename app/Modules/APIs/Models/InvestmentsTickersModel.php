<?php

namespace App\Modules\APIs\Models;

use CodeIgniter\Model;

class InvestmentsTickersModel extends Model
{
    protected $table      = 'bf_investments_tickers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'symbol',
        'company_name',
    ];
}
