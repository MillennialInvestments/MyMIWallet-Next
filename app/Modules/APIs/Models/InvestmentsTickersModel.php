<?php

namespace App\Modules\APIs\Models;

use App\Models\ObservedModel;

class InvestmentsTickersModel extends ObservedModel
{
    protected $table      = 'bf_investment_tickers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'symbol',
        'company_name',
    ];
}