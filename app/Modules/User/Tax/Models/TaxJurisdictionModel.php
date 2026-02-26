<?php

declare(strict_types=1);

namespace App\Modules\User\Tax\Models;

use App\Models\ObservedModel;
use DateTime;

class TaxJurisdictionModel extends ObservedModel
{
    protected $table         = 'bf_tax_jurisdictions';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['state', 'parish', 'name', 'code', 'active'];

    public function getAllocationsForReturn(int $returnId): array
    {
        return $this->db->table('bf_user_tax_return_jurisdictions uj')
            ->select('uj.*, j.name, j.code, j.parish, j.state')
            ->join('bf_tax_jurisdictions j', 'j.id = uj.jurisdiction_id', 'left')
            ->where('uj.return_id', $returnId)
            ->get()
            ->getResultArray();
    }

    public function getEffectiveRateForDate(int $jurisdictionId, ?string $date = null): ?array
    {
        $targetDate = $date ? new DateTime($date) : new DateTime();

        $row = $this->db->table('bf_tax_rates')
            ->where('jurisdiction_id', $jurisdictionId)
            ->where('effective_start <=', $targetDate->format('Y-m-d'))
            ->groupStart()
                ->where('effective_end >=', $targetDate->format('Y-m-d'))
                ->orWhere('effective_end', null)
            ->groupEnd()
            ->orderBy('effective_start', 'DESC')
            ->get()
            ->getRowArray();

        return $row ?: null;
    }
}
