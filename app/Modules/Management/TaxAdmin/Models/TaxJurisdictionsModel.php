<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use CodeIgniter\Model;

class TaxJurisdictionsModel extends Model
{
    protected $table         = 'bf_tax_jurisdictions';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['state', 'parish', 'name', 'code', 'active'];

    public function getActiveWithCurrentRate(): array
    {
        $today = date('Y-m-d');
        return $this->select('bf_tax_jurisdictions.*, r.rate_total, r.effective_start, r.effective_end')
            ->join('bf_tax_rates r', 'r.jurisdiction_id = bf_tax_jurisdictions.id AND r.effective_start <= "'.$today.'" AND (r.effective_end IS NULL OR r.effective_end >= "'.$today.'")', 'left')
            ->where('bf_tax_jurisdictions.active', 1)
            ->orderBy('bf_tax_jurisdictions.code', 'ASC')
            ->findAll();
    }
}
