<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Real Estate Cash Buyer CRM Model
 *
 * Manages institutional and private cash buyers for off-market
 * acquisitions and wholesale contract dispo matching.
 */
class RealEstateCashBuyerModel extends Model
{
    protected $table = 'bf_real_estate_cash_buyers';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'full_name',
        'company_name',
        'email',
        'phone',
        'buyer_type',
        'max_purchase_price',
        'min_roi_pct',
        'target_zips',
        'target_cities',
        'proof_of_funds_verified',
        'proof_of_funds_amount',
        'status',
        'notes',
        'deals_received_count',
        'deals_closed_count',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Find cash buyers matching an off-market deal profile.
     *
     * @param float $price End-buyer purchase price
     * @param float $roi End-buyer projected ROI percentage
     * @param string|null $zip Target ZIP code
     * @return array<int, array<string, mixed>>
     */
    public function findMatchingBuyers(float $price, float $roi = 0.0, ?string $zip = null): array
    {
        if (! $this->db->tableExists($this->table)) {
            return [];
        }

        $builder = $this->where('status', 'active');

        if ($price > 0) {
            $builder->where('max_purchase_price >=', $price);
        }

        if ($roi > 0) {
            $builder->where('min_roi_pct <=', $roi);
        }

        $buyers = $builder->orderBy('proof_of_funds_verified', 'DESC')
                          ->orderBy('max_purchase_price', 'DESC')
                          ->findAll();

        if ($zip !== null && $zip !== '') {
            $cleanZip = trim($zip);
            // Sort buyers who specifically list this target ZIP to the top
            usort($buyers, function($a, $b) use ($cleanZip) {
                $aHas = str_contains((string) ($a['target_zips'] ?? ''), $cleanZip);
                $bHas = str_contains((string) ($b['target_zips'] ?? ''), $cleanZip);
                if ($aHas === $bHas) return 0;
                return $aHas ? -1 : 1;
            });
        }

        return $buyers;
    }

    /**
     * Increment deal broadcast count for buyers who received a deal alert.
     *
     * @param array<int> $buyerIds
     * @return void
     */
    public function recordBroadcast(array $buyerIds): void
    {
        if (empty($buyerIds) || ! $this->db->tableExists($this->table)) {
            return;
        }

        $this->whereIn('id', $buyerIds)
             ->set('deals_received_count', 'deals_received_count + 1', false)
             ->update();
    }
}
