<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use App\Models\ObservedModel;

class TaxRatesModel extends ObservedModel
{
    protected $table         = 'bf_tax_rates';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'jurisdiction_id',
        'rate_total',
        'rate_components',
        'effective_start',
        'effective_end',
    ];

    protected $useSoftDeletes = false;

    public function findActiveRange(int $jurisdictionId, string $startDate, ?string $endDate = null): array
    {
        $builder = $this->where('jurisdiction_id', $jurisdictionId)
            ->groupStart()
                ->where('effective_start <=', $endDate ?? $startDate)
                ->where('effective_end >=', $startDate)
                ->orWhere('effective_end', null)
            ->groupEnd();

        return $builder->findAll();
    }
}
