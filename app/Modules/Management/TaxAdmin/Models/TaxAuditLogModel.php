<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use CodeIgniter\Model;

class TaxAuditLogModel extends Model
{
    protected $table         = 'bf_tax_audit_log';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'user_id',
        'action',
        'entity_type',
        'entity_id',
        'before_json',
        'after_json',
        'created_at',
    ];
}
