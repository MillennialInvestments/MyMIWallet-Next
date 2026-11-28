<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ProjectsModel;
use App\Models\ProjectsRealEstateModel;
use App\Models\ProjectsRealEstateRevenueModel;
use CodeIgniter\Database\BaseConnection;
use InvalidArgumentException;
use RuntimeException;

/**
 * Service: RealEstateDealService
 *
 * Provides real estate syndication underwriting, pro forma modeling
 * for STR (Airbnb/VRBO) and Commercial Leases, deal intake, and audited
 * pro-rata crypto revenue distribution calculations.
 */
class RealEstateDealService
{
    private BaseConnection $db;
    private ProjectsModel $projectsModel;
    private ProjectsRealEstateModel $realEstateModel;
    private ProjectsRealEstateRevenueModel $revenueModel;

    public function __construct(
        ?BaseConnection $db = null,
        ?ProjectsModel $projectsModel = null,
        ?ProjectsRealEstateModel $realEstateModel = null,
        ?ProjectsRealEstateRevenueModel $revenueModel = null
    ) {
        $this->db = $db ?? db_connect();
        $this->projectsModel = $projectsModel ?? new ProjectsModel();
        $this->realEstateModel = $realEstateModel ?? new ProjectsRealEstateModel();
        $this->revenueModel = $revenueModel ?? new ProjectsRealEstateRevenueModel();
    }

    /**
     * Underwrite Residential Short-Term Rental (Airbnb / VRBO) Pro Forma.
     *
     * @param array<string, mixed> $inputs
     * @return array<string, mixed>
     */
    public function calculateStrProForma(array $inputs): array
    {
        $purchasePrice     = max(0.0, (float) ($inputs['purchase_price'] ?? 0.0));
        $renovationBudget  = max(0.0, (float) ($inputs['renovation_budget'] ?? 0.0));
        $furnishingBudget  = max(0.0, (float) ($inputs['furnishing_budget'] ?? 0.0));
        $closingCosts      = max(0.0, (float) ($inputs['closing_costs'] ?? ($purchasePrice * 0.03)));
        $adr               = max(0.0, (float) ($inputs['adr'] ?? $inputs['projected_adr'] ?? 0.0));
        $occupancyPct      = min(100.0, max(0.0, (float) ($inputs['occupancy_pct'] ?? $inputs['projected_occupancy_pct'] ?? 70.0)));
        $sponsorFeePct     = min(50.0, max(0.0, (float) ($inputs['sponsor_fee_pct'] ?? $inputs['sponsor_management_fee_pct'] ?? 15.0)));

        $totalAcquisitionCost = round($purchasePrice + $renovationBudget + $furnishingBudget + $closingCosts, 2);

        // Annual Nightly Revenue
        $bookedNights         = round(365 * ($occupancyPct / 100), 1);
        $grossAnnualRevenue   = round($adr * $bookedNights, 2);

        // Standard STR Operational Deductions
        $platformCleaningFees = round($grossAnnualRevenue * 0.15, 2); // Airbnb 3% fee + cleaning turnover
        $operatingExpenses    = round($grossAnnualRevenue * 0.20, 2); // Utilities, maintenance, insurance, taxes
        $sponsorFee           = round($grossAnnualRevenue * ($sponsorFeePct / 100), 2);

        $projectedAnnualNoi   = max(0.0, round($grossAnnualRevenue - $platformCleaningFees - $operatingExpenses - $sponsorFee, 2));
        $targetCocReturn      = $totalAcquisitionCost > 0
            ? round(($projectedAnnualNoi / $totalAcquisitionCost) * 100, 2)
            : 0.0;

        return [
            'property_category'           => 'residential_str',
            'monetization_strategy'       => 'airbnb_vrbo',
            'purchase_price'              => $purchasePrice,
            'renovation_budget'           => $renovationBudget,
            'furnishing_budget'           => $furnishingBudget,
            'closing_costs'               => $closingCosts,
            'total_acquisition_cost'      => $totalAcquisitionCost,
            'projected_adr'               => $adr,
            'projected_occupancy_pct'     => $occupancyPct,
            'projected_booked_nights'     => $bookedNights,
            'gross_annual_revenue'        => $grossAnnualRevenue,
            'platform_cleaning_fees'      => $platformCleaningFees,
            'operating_expenses'          => $operatingExpenses,
            'sponsor_management_fee'      => $sponsorFee,
            'sponsor_management_fee_pct'  => $sponsorFeePct,
            'projected_annual_noi'        => $projectedAnnualNoi,
            'target_coc_return'           => $targetCocReturn,
            'projected_monthly_distributable' => round($projectedAnnualNoi / 12, 2),
        ];
    }

    /**
     * Underwrite Pure Long-Term Rental (LTR) Traditional Lease Pro Forma.
     *
     * @param array<string, mixed> $inputs
     * @return array<string, mixed>
     */
    public function calculateLtrProForma(array $inputs): array
    {
        $purchasePrice       = max(0.0, (float) ($inputs['purchase_price'] ?? 0.0));
        $renovationBudget    = max(0.0, (float) ($inputs['renovation_budget'] ?? 0.0));
        $closingCosts        = max(0.0, (float) ($inputs['closing_costs'] ?? ($purchasePrice * 0.03)));

        // Auto-estimate long-term rent if not provided: ~0.85% to 1.0% of purchase price or default $1,350
        $monthlyRent         = max(0.0, (float) ($inputs['ltr_monthly_rent'] ?? $inputs['pure_monthly_rent'] ?? $inputs['monthly_rent'] ?? 0.0));
        if ($monthlyRent <= 0.0 && $purchasePrice > 0.0) {
            $monthlyRent = round(max(950.0, min(3500.0, $purchasePrice * 0.0085)), -1);
        } elseif ($monthlyRent <= 0.0) {
            $monthlyRent = 1350.0;
        }

        $vacancyReservePct   = min(50.0, max(0.0, (float) ($inputs['vacancy_reserve_pct'] ?? 5.0)));
        $sponsorFeePct       = min(50.0, max(0.0, (float) ($inputs['sponsor_fee_pct'] ?? $inputs['sponsor_management_fee_pct'] ?? 8.0)));
        $opexPct             = min(50.0, max(0.0, (float) ($inputs['ltr_opex_pct'] ?? 20.0))); // taxes, insurance, routine repairs

        // Pure rentals do not need a furnishing budget
        $totalAcquisitionCost = round($purchasePrice + $renovationBudget + $closingCosts, 2);

        $grossAnnualRent     = round($monthlyRent * 12, 2);
        $vacancyReserve      = round($grossAnnualRent * ($vacancyReservePct / 100), 2);
        $effectiveGrossRent  = round($grossAnnualRent - $vacancyReserve, 2);
        $operatingExpenses   = round($effectiveGrossRent * ($opexPct / 100), 2);
        $sponsorFee          = round($effectiveGrossRent * ($sponsorFeePct / 100), 2);

        $projectedAnnualNoi  = max(0.0, round($effectiveGrossRent - $operatingExpenses - $sponsorFee, 2));
        $targetCocReturn     = $totalAcquisitionCost > 0
            ? round(($projectedAnnualNoi / $totalAcquisitionCost) * 100, 2)
            : 0.0;

        return [
            'property_category'           => 'residential_ltr',
            'monetization_strategy'       => 'pure_long_term_rental',
            'purchase_price'              => $purchasePrice,
            'renovation_budget'           => $renovationBudget,
            'furnishing_budget'           => 0.00,
            'closing_costs'               => $closingCosts,
            'total_acquisition_cost'      => $totalAcquisitionCost,
            'projected_monthly_rent'      => $monthlyRent,
            'vacancy_reserve_pct'         => $vacancyReservePct,
            'gross_annual_rent'           => $grossAnnualRent,
            'effective_gross_rent'        => $effectiveGrossRent,
            'operating_expenses'          => $operatingExpenses,
            'sponsor_management_fee'      => $sponsorFee,
            'sponsor_management_fee_pct'  => $sponsorFeePct,
            'projected_annual_noi'        => $projectedAnnualNoi,
            'target_coc_return'           => $targetCocReturn,
            'projected_monthly_distributable' => round($projectedAnnualNoi / 12, 2),
        ];
    }

    /**
     * Underwrite Wholesale Contract Flip & Cash Buyer Economics (Tranchi-Style).
     *
     * @param array<string, mixed> $inputs
     * @return array<string, mixed>
     */
    public function calculateWholesaleFlipProForma(array $inputs): array
    {
        $contractPrice       = max(0.0, (float) ($inputs['contract_price'] ?? $inputs['purchase_price'] ?? 0.0));
        $renovationBudget    = max(0.0, (float) ($inputs['renovation_budget'] ?? $inputs['rehab_estimate'] ?? 0.0));
        $estimatedArv        = max(0.0, (float) ($inputs['after_repair_value'] ?? $inputs['arv'] ?? 0.0));

        // Auto-estimate ARV if not provided: ~1.38x contract price or contract + rehab + $35k margin
        if ($estimatedArv <= 0.0 && $contractPrice > 0.0) {
            $estimatedArv = round(max($contractPrice * 1.38, $contractPrice + $renovationBudget + 35000.0), -2);
        }

        // Wholesale Assignment Fee target: default $15,000 or ~8% of contract price, min $7,500
        $assignmentFee       = max(0.0, (float) ($inputs['assignment_fee'] ?? $inputs['wholesale_fee'] ?? 0.0));
        if ($assignmentFee <= 0.0 && $contractPrice > 0.0) {
            $assignmentFee = round(max(7500.0, min(35000.0, $contractPrice * 0.08)), -2);
        } elseif ($assignmentFee <= 0.0) {
            $assignmentFee = 15000.0;
        }

        // End Buyer Cash Purchase Price = Contract Price + Assignment Fee
        $endBuyerPrice       = round($contractPrice + $assignmentFee, 2);

        // End Buyer Closing Costs (~2.5% of end buyer price)
        $endBuyerClosing     = round($endBuyerPrice * 0.025, 2);

        // End Buyer All-In Capital Investment (Purchase + Assignment + Rehab + Closing)
        $endBuyerAllIn       = round($endBuyerPrice + $renovationBudget + $endBuyerClosing, 2);

        // End Buyer Projected Net Profit upon retail resale at ARV (accounting for ~6% broker/resale fee)
        $retailResaleFees    = round($estimatedArv * 0.06, 2);
        $endBuyerProfit      = max(0.0, round($estimatedArv - $endBuyerAllIn - $retailResaleFees, 2));
        $endBuyerRoiPct      = $endBuyerAllIn > 0 ? round(($endBuyerProfit / $endBuyerAllIn) * 100, 2) : 0.0;

        // MAO @ 70% rule = (ARV * 0.70) - Renovation - Assignment Fee
        $mao70Pct            = max(0.0, round(($estimatedArv * 0.70) - $renovationBudget - $assignmentFee, 2));

        // TBI Upfront Capital: Earnest Money Deposit only
        $earnestMoneyDeposit = min(10000.0, max(1000.0, (float) ($inputs['earnest_money_deposit'] ?? 2500.0)));
        $daysToClose         = max(7, min(60, (int) ($inputs['days_to_close'] ?? 14)));

        // CoC Return on Wholesale Capital Outlay: (Assignment Fee / EMD) * 100
        $tbiWholesaleCoc     = $earnestMoneyDeposit > 0
            ? round(($assignmentFee / $earnestMoneyDeposit) * 100, 2)
            : 0.0;

        return [
            'property_category'           => 'wholesale_flip',
            'monetization_strategy'       => 'wholesale_contract_flip',
            'purchase_price'              => $contractPrice,
            'contract_price'              => $contractPrice,
            'after_repair_value'          => $estimatedArv,
            'renovation_budget'           => $renovationBudget,
            'furnishing_budget'           => 0.00,
            'closing_costs'               => round($contractPrice * 0.03, 2),
            'assignment_fee'              => $assignmentFee,
            'end_buyer_price'             => $endBuyerPrice,
            'end_buyer_closing_costs'     => $endBuyerClosing,
            'end_buyer_all_in'            => $endBuyerAllIn,
            'end_buyer_net_profit'        => $endBuyerProfit,
            'end_buyer_roi_pct'           => $endBuyerRoiPct,
            'mao_70_pct'                  => $mao70Pct,
            'earnest_money_deposit'       => $earnestMoneyDeposit,
            'days_to_close'               => $daysToClose,
            'total_acquisition_cost'      => $endBuyerPrice,
            'projected_annual_noi'        => $assignmentFee,
            'target_coc_return'           => $tbiWholesaleCoc,
            'projected_monthly_distributable' => round($assignmentFee / 12, 2),
        ];
    }

    /**
     * Underwrite Commercial Leased Property Pro Forma (NNN or Gross).
     *
     * @param array<string, mixed> $inputs
     * @return array<string, mixed>
     */
    public function calculateCommercialProForma(array $inputs): array
    {
        $purchasePrice       = max(0.0, (float) ($inputs['purchase_price'] ?? 0.0));
        $renovationBudget    = max(0.0, (float) ($inputs['renovation_budget'] ?? 0.0)); // Tenant Improvements (TI)
        $closingCosts        = max(0.0, (float) ($inputs['closing_costs'] ?? ($purchasePrice * 0.03)));
        $monthlyRent         = max(0.0, (float) ($inputs['monthly_rent'] ?? $inputs['projected_monthly_rent'] ?? 0.0));
        $vacancyReservePct   = min(50.0, max(0.0, (float) ($inputs['vacancy_reserve_pct'] ?? 5.0)));
        $sponsorFeePct       = min(50.0, max(0.0, (float) ($inputs['sponsor_fee_pct'] ?? $inputs['sponsor_management_fee_pct'] ?? 8.0)));
        $leaseType           = (string) ($inputs['lease_type'] ?? 'triple_net_nnn');

        $totalAcquisitionCost = round($purchasePrice + $renovationBudget + $closingCosts, 2);

        $grossAnnualRent     = round($monthlyRent * 12, 2);
        $vacancyReserve      = round($grossAnnualRent * ($vacancyReservePct / 100), 2);
        $effectiveGrossRent  = round($grossAnnualRent - $vacancyReserve, 2);

        // NNN leases have near-zero landlord opex; gross leases require maintenance and taxes
        $operatingExpenses   = $leaseType === 'triple_net_nnn'
            ? round($effectiveGrossRent * 0.03, 2) // administrative & structural reserve
            : round($effectiveGrossRent * 0.22, 2);

        $sponsorFee          = round($effectiveGrossRent * ($sponsorFeePct / 100), 2);
        $projectedAnnualNoi  = max(0.0, round($effectiveGrossRent - $operatingExpenses - $sponsorFee, 2));
        $targetCocReturn     = $totalAcquisitionCost > 0
            ? round(($projectedAnnualNoi / $totalAcquisitionCost) * 100, 2)
            : 0.0;

        return [
            'property_category'           => 'commercial_lease',
            'monetization_strategy'       => $leaseType,
            'purchase_price'              => $purchasePrice,
            'renovation_budget'           => $renovationBudget,
            'furnishing_budget'           => 0.00,
            'closing_costs'               => $closingCosts,
            'total_acquisition_cost'      => $totalAcquisitionCost,
            'projected_monthly_rent'      => $monthlyRent,
            'vacancy_reserve_pct'         => $vacancyReservePct,
            'gross_annual_rent'           => $grossAnnualRent,
            'effective_gross_rent'        => $effectiveGrossRent,
            'operating_expenses'          => $operatingExpenses,
            'sponsor_management_fee'      => $sponsorFee,
            'sponsor_management_fee_pct'  => $sponsorFeePct,
            'projected_annual_noi'        => $projectedAnnualNoi,
            'target_coc_return'           => $targetCocReturn, // Cap Rate / CoC
            'projected_monthly_distributable' => round($projectedAnnualNoi / 12, 2),
        ];
    }

    /**
     * Ingest and create a Real Estate Project with pro forma underwriting.
     *
     * @param int $userId Sponsoring user ID
     * @param array<string, mixed> $input Form data
     * @return array{ok: bool, project_id?: int, error?: string, pro_forma?: array}
     */
    public function intakePropertyDeal(int $userId, array $input): array
    {
        $address = trim(strip_tags((string) ($input['property_address'] ?? $input['address_line1'] ?? '')));
        $city    = trim(strip_tags((string) ($input['city'] ?? '')));
        $state   = strtoupper(trim(strip_tags((string) ($input['state'] ?? ''))));
        $zip     = trim(strip_tags((string) ($input['postal_code'] ?? '')));
        $title   = trim(strip_tags((string) ($input['title'] ?? $input['name'] ?? '')));

        if ($address === '' && empty($input['zillow_url'])) {
            return ['ok' => false, 'error' => 'Property address or Zillow URL is required.'];
        }

        if ($title === '') {
            $title = $address !== '' ? $address : 'Real Estate Syndicate Opportunity';
        }

        $category = (string) ($input['property_category'] ?? 'residential_str');
        $proForma = match ($category) {
            'commercial_lease' => $this->calculateCommercialProForma($input),
            'residential_ltr'  => $this->calculateLtrProForma($input),
            'wholesale_flip'   => $this->calculateWholesaleFlipProForma($input),
            default            => $this->calculateStrProForma($input),
        };

        $totalRaise = (float) $proForma['total_acquisition_cost'];
        if ($totalRaise <= 0.0) {
            $totalRaise = max(1000.0, (float) ($input['purchase_price'] ?? 100000.0));
            $proForma['total_acquisition_cost'] = $totalRaise;
        }

        $this->db->transStart();

        // 1. Create or update parent bf_projects record
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . substr(md5(uniqid('', true)), 0, 6);
        $projectData = [
            'name'                     => $title,
            'title'                    => $title,
            'slug'                     => $slug,
            'description'              => (string) ($input['description'] ?? "Private equity real estate syndication: {$title}."),
            'asset_url'                => (string) ($input['zillow_url'] ?? ''),
            'purchase_price'           => $proForma['purchase_price'],
            'target_amount'            => $totalRaise,
            'target_raise'             => $totalRaise,
            'current_amount'           => 0.00,
            'min_commit'               => max(100.0, (float) ($input['min_commit'] ?? 500.0)),
            'max_commit'               => (float) ($input['max_commit'] ?? $totalRaise),
            'project_type'             => 'real_estate_syndication',
            'is_active'                => 1,
            'is_system'                => 0,
            'status'                   => 'active',
            'nav_per_unit'             => 1.00000000,
            'total_units_issued'       => $totalRaise,
            'total_fund_value'         => $totalRaise,
            'created_by'               => $userId,
            'compliance_required'      => 1, // SEC Reg D 506(c) accredited check
            'primary_issuance_enabled' => 1,
            'secondary_trading_enabled'=> 0, // Invariant: no secondary exchange without full qualification
            'created_at'               => date('Y-m-d H:i:s'),
            'updated_at'               => date('Y-m-d H:i:s'),
        ];

        // Sanitize to available fields in bf_projects
        $availableFields = $this->db->getFieldNames('bf_projects');
        $filtered = array_intersect_key($projectData, array_flip($availableFields));
        $this->db->table('bf_projects')->insert($filtered);
        $projectId = (int) $this->db->insertID();

        // 2. Insert bf_projects_real_estate record
        $reData = [
            'project_id'                 => $projectId,
            'property_category'          => $proForma['property_category'],
            'monetization_strategy'      => $proForma['monetization_strategy'],
            'property_address'           => $address,
            'city'                       => $city,
            'state'                      => $state,
            'postal_code'                => $zip,
            'zillow_url'                 => $input['zillow_url'] ?? null,
            'mls_number'                 => $input['mls_number'] ?? null,
            'purchase_price'             => $proForma['purchase_price'],
            'renovation_budget'          => $proForma['renovation_budget'],
            'furnishing_budget'          => $proForma['furnishing_budget'],
            'closing_costs'              => $proForma['closing_costs'],
            'total_acquisition_cost'     => $proForma['total_acquisition_cost'],
            'projected_adr'              => $proForma['projected_adr'] ?? null,
            'projected_occupancy_pct'    => $proForma['projected_occupancy_pct'] ?? null,
            'projected_monthly_rent'     => $proForma['projected_monthly_rent'] ?? null,
            'projected_annual_noi'       => $proForma['projected_annual_noi'],
            'target_coc_return'          => $proForma['target_coc_return'],
            'sponsor_management_fee_pct' => $proForma['sponsor_management_fee_pct'],
            'operational_stage'          => 'sourcing',
            'airbnb_listing_url'         => $input['airbnb_listing_url'] ?? null,
            'vrbo_listing_url'           => $input['vrbo_listing_url'] ?? null,
            'spv_entity_name'            => $input['spv_entity_name'] ?? ('TBI ' . $title . ' LLC (Managed by Timothy Burks Incorporated, LLC.)'),
        ];
        $this->realEstateModel->saveOrUpdate($projectId, $reData);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['ok' => false, 'error' => 'Database transaction failed during deal intake.'];
        }

        $cfg = config(\Config\Projects::class);

        return [
            'ok'                 => true,
            'project_id'         => $projectId,
            'pro_forma'          => $proForma,
            'sponsor_entity'     => $cfg->sponsorEntity ?? 'Timothy Burks Incorporated, LLC.',
            'operating_managers' => array_keys($cfg->operatingManagers ?? []),
            'jurisdiction'       => $cfg->sponsorJurisdiction ?? 'Bossier City, Louisiana',
        ];
    }

    /**
     * Calculate Pro-Rata Distribution breakdown for all active unit holders.
     *
     * @param int $projectId
     * @param float $distributableAmount Net cash available to distribute
     * @return array{total_units: float, distributable_amount: float, payout_per_unit: float, holders: array}
     */
    public function calculateProRataDistributions(int $projectId, float $distributableAmount): array
    {
        if ($distributableAmount <= 0.0) {
            throw new InvalidArgumentException('Distributable amount must be strictly positive.');
        }

        // Fetch active holders from bf_projects_fund_holders
        $holders = $this->db->table('bf_projects_fund_holders')
            ->select('id, user_id, units_owned, capital_contributed')
            ->where('project_id', $projectId)
            ->where('units_owned >', 0)
            ->get()
            ->getResultArray();

        $totalUnits = 0.0;
        foreach ($holders as $h) {
            $totalUnits += (float) $h['units_owned'];
        }

        if ($totalUnits <= 0.0) {
            // Fallback to project target units if holders have not been minted yet
            $proj = $this->projectsModel->find($projectId);
            $totalUnits = (float) ($proj['total_units_issued'] ?? $proj['target_amount'] ?? 1000.0);
        }

        $payoutPerUnit = round($distributableAmount / $totalUnits, 8);

        $breakdown = [];
        foreach ($holders as $h) {
            $units = (float) $h['units_owned'];
            $pct = round(($units / $totalUnits) * 100, 4);
            $payout = round($units * $payoutPerUnit, 2);

            $breakdown[] = [
                'holder_id'     => (int) $h['id'],
                'user_id'       => (int) $h['user_id'],
                'units_owned'   => $units,
                'ownership_pct' => $pct,
                'payout_usd'    => $payout,
            ];
        }

        return [
            'total_units'          => $totalUnits,
            'distributable_amount' => $distributableAmount,
            'payout_per_unit'      => $payoutPerUnit,
            'holders_count'        => count($breakdown),
            'holders'              => $breakdown,
        ];
    }

    /**
     * Atomically execute a monthly/quarterly distribution.
     *
     * @param int $projectId
     * @param int $revenueId
     * @param int $actorId Sponsor / Admin approving distribution
     * @return array
     */
    public function executeRevenueDistribution(int $projectId, int $revenueId, int $actorId): array
    {
        $revenue = $this->revenueModel->find($revenueId);
        if (! $revenue || (int) $revenue['project_id'] !== $projectId) {
            throw new RuntimeException("Revenue record {$revenueId} not found for project {$projectId}.");
        }

        $netDistributable = (float) ($revenue['net_distributable'] ?? 0.0);
        if ($netDistributable <= 0.0) {
            throw new RuntimeException('Cannot distribute zero or negative net profit.');
        }

        $calculation = $this->calculateProRataDistributions($projectId, $netDistributable);

        $this->db->transStart();

        // 1. Mark revenue record as distributed
        $this->revenueModel->markDistributed($revenueId);

        // 2. Record in bf_projects_fund_distributions if table exists
        if ($this->db->tableExists('bf_projects_fund_distributions')) {
            $this->db->table('bf_projects_fund_distributions')->insert([
                'project_id'        => $projectId,
                'distribution_type' => 'real_estate_cashflow',
                'total_amount'      => $netDistributable,
                'amount_per_unit'   => $calculation['payout_per_unit'],
                'status'            => 'completed',
                'notes'             => "Distribution for period {$revenue['reporting_period']} by User {$actorId}.",
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
        }

        // 3. Log audit event
        if (method_exists($this->projectsModel, 'logFundAuditEvent')) {
            $this->projectsModel->logFundAuditEvent($projectId, $actorId, 'EXECUTE_DISTRIBUTION', [
                'revenue_id'           => $revenueId,
                'reporting_period'     => $revenue['reporting_period'],
                'distributable_amount' => $netDistributable,
                'payout_per_unit'      => $calculation['payout_per_unit'],
                'holders_count'        => $calculation['holders_count'],
            ]);
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            throw new RuntimeException('Failed to commit distribution transaction.');
        }

        return [
            'ok'             => true,
            'revenue_id'     => $revenueId,
            'distributed'    => $netDistributable,
            'payout_per_unit'=> $calculation['payout_per_unit'],
            'holders_count'  => $calculation['holders_count'],
        ];
    }
}
