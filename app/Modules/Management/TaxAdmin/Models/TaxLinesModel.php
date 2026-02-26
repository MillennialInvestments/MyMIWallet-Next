<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use App\Models\ObservedModel;

class TaxLinesModel extends ObservedModel
{
    protected $table         = 'bf_tax_return_lines';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'template_id',
        'line_number',
        'label',
        'type',
        'calc_rule',
        'requires_explain',
        'sort_order',
    ];
}
