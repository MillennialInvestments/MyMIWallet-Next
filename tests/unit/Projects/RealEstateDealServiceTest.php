<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Services\RealEstateDealService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Unit Test: RealEstateDealServiceTest
 *
 * Verifies residential STR and commercial lease pro forma underwriting math,
 * operational expense deductions, and pro-rata revenue-share distribution logic.
 */
class RealEstateDealServiceTest extends CIUnitTestCase
{
    private RealEstateDealService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RealEstateDealService();
    }

    public function testStrProFormaCalculation(): void
    {
        $inputs = [
            'purchase_price'              => 400000.00,
            'renovation_budget'           => 30000.00,
            'furnishing_budget'           => 20000.00,
            'closing_costs'               => 12000.00, // 3% of purchase
            'adr'                         => 300.00,
            'occupancy_pct'               => 70.0,     // 70% of 365 = 255.5 nights
            'sponsor_management_fee_pct'  => 15.0,
        ];

        $proForma = $this->service->calculateStrProForma($inputs);

        $this->assertSame('residential_str', $proForma['property_category']);
        $this->assertSame('airbnb_vrbo', $proForma['monetization_strategy']);
        $this->assertSame(462000.00, $proForma['total_acquisition_cost']);
        $this->assertSame(255.5, $proForma['projected_booked_nights']);
        $this->assertSame(76650.00, $proForma['gross_annual_revenue']);

        // 15% platform/cleaning = 11497.50
        $this->assertSame(11497.50, $proForma['platform_cleaning_fees']);
        // 20% opex = 15330.00
        $this->assertSame(15330.00, $proForma['operating_expenses']);
        // 15% sponsor fee = 11497.50
        $this->assertSame(11497.50, $proForma['sponsor_management_fee']);

        // NOI = 76650 - 11497.50 - 15330 - 11497.50 = 38325.00
        $this->assertSame(38325.00, $proForma['projected_annual_noi']);

        // CoC = (38325 / 462000) * 100 = 8.30%
        $this->assertSame(8.30, $proForma['target_coc_return']);
        $this->assertSame(3193.75, $proForma['projected_monthly_distributable']);
    }

    public function testCommercialNnnProFormaCalculation(): void
    {
        $inputs = [
            'purchase_price'              => 500000.00,
            'renovation_budget'           => 15000.00,
            'closing_costs'               => 15000.00,
            'monthly_rent'                => 5000.00,
            'vacancy_reserve_pct'         => 5.0,
            'sponsor_management_fee_pct'  => 8.0,
            'lease_type'                  => 'triple_net_nnn',
        ];

        $proForma = $this->service->calculateCommercialProForma($inputs);

        $this->assertSame('commercial_lease', $proForma['property_category']);
        $this->assertSame('triple_net_nnn', $proForma['monetization_strategy']);
        $this->assertSame(530000.00, $proForma['total_acquisition_cost']);
        $this->assertSame(60000.00, $proForma['gross_annual_rent']);
        $this->assertSame(57000.00, $proForma['effective_gross_rent']);

        // NNN lease opex = 3% admin reserve = 1710.00
        $this->assertSame(1710.00, $proForma['operating_expenses']);
        // 8% sponsor fee = 4560.00
        $this->assertSame(4560.00, $proForma['sponsor_management_fee']);

        // NOI = 57000 - 1710 - 4560 = 50730.00
        $this->assertSame(50730.00, $proForma['projected_annual_noi']);

        // Cap Rate / CoC = (50730 / 530000) * 100 = 9.57%
        $this->assertSame(9.57, $proForma['target_coc_return']);
    }

    public function testCommercialGrossLeaseProFormaCalculation(): void
    {
        $inputs = [
            'purchase_price'              => 300000.00,
            'renovation_budget'           => 10000.00,
            'closing_costs'               => 9000.00,
            'monthly_rent'                => 3500.00,
            'vacancy_reserve_pct'         => 5.0,
            'sponsor_management_fee_pct'  => 10.0,
            'lease_type'                  => 'gross_lease',
        ];

        $proForma = $this->service->calculateCommercialProForma($inputs);

        $this->assertSame('gross_lease', $proForma['monetization_strategy']);
        $this->assertSame(319000.00, $proForma['total_acquisition_cost']);
        $this->assertSame(42000.00, $proForma['gross_annual_rent']);
        $this->assertSame(39900.00, $proForma['effective_gross_rent']);

        // Gross lease opex = 22% = 8778.00
        $this->assertSame(8778.00, $proForma['operating_expenses']);
        // 10% sponsor fee = 3990.00
        $this->assertSame(3990.00, $proForma['sponsor_management_fee']);

        // NOI = 39900 - 8778 - 3990 = 27132.00
        $this->assertSame(27132.00, $proForma['projected_annual_noi']);
        $this->assertSame(8.51, $proForma['target_coc_return']);
    }

    public function testProFormaClampsNegativeValues(): void
    {
        $inputs = [
            'purchase_price'    => -100000.00,
            'renovation_budget' => -5000.00,
            'adr'               => -150.00,
            'occupancy_pct'     => -20.0,
        ];

        $proForma = $this->service->calculateStrProForma($inputs);

        $this->assertSame(0.0, $proForma['purchase_price']);
        $this->assertSame(0.0, $proForma['renovation_budget']);
        $this->assertSame(0.0, $proForma['projected_adr']);
        $this->assertSame(0.0, $proForma['projected_occupancy_pct']);
        $this->assertSame(0.0, $proForma['total_acquisition_cost']);
        $this->assertSame(0.0, $proForma['target_coc_return']);
    }

    public function testLtrProFormaCalculation(): void
    {
        $inputs = [
            'purchase_price'              => 200000.00,
            'renovation_budget'           => 10000.00,
            'closing_costs'               => 6000.00,
            'ltr_monthly_rent'            => 1800.00,
            'vacancy_reserve_pct'         => 5.0,
            'sponsor_management_fee_pct'  => 8.0,
            'ltr_opex_pct'                => 20.0,
        ];

        $proForma = $this->service->calculateLtrProForma($inputs);

        $this->assertSame('residential_ltr', $proForma['property_category']);
        $this->assertSame('pure_long_term_rental', $proForma['monetization_strategy']);
        $this->assertSame(0.0, $proForma['furnishing_budget']);
        $this->assertSame(216000.00, $proForma['total_acquisition_cost']);
        $this->assertSame(21600.00, $proForma['gross_annual_rent']);
        $this->assertSame(20520.00, $proForma['effective_gross_rent']);
        $this->assertSame(4104.00, $proForma['operating_expenses']);
        $this->assertSame(1641.60, $proForma['sponsor_management_fee']);
        $this->assertSame(14774.40, $proForma['projected_annual_noi']);
        $this->assertSame(6.84, $proForma['target_coc_return']);
        $this->assertSame(1231.20, $proForma['projected_monthly_distributable']);
    }
}
