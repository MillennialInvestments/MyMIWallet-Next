<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use CodeIgniter\Model;

class TaxLinesModel extends Model
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
