<?php

namespace Tests\Unit\Projects;

use App\Services\RealEstateDealFinderService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class RealEstateDealFinderServiceTest extends CIUnitTestCase
{
    private RealEstateDealFinderService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RealEstateDealFinderService();
    }

    public function testBuildPlatformSearchUrls(): void
    {
        $urls = $this->service->buildPlatformSearchUrls([
            'max_price' => 50000,
            'min_sqft'  => 1700,
            'beds'      => 3,
            'city'      => 'Bossier City',
            'state'     => 'LA',
            'zip'       => '71111',
        ]);

        $this->assertArrayHasKey('foreclosure', $urls);
        $this->assertArrayHasKey('auction', $urls);
        $this->assertArrayHasKey('equator', $urls);
        $this->assertArrayHasKey('xome', $urls);
        $this->assertArrayHasKey('realtytrac', $urls);

        $this->assertStringContainsString('foreclosure.com', $urls['foreclosure']['search_url']);
        $this->assertStringContainsString('price_max=50000', $urls['foreclosure']['search_url']);
        $this->assertStringContainsString('auction.com', $urls['auction']['search_url']);
        $this->assertStringContainsString('equator.com', $urls['equator']['search_url']);
        $this->assertStringContainsString('xome.com', $urls['xome']['search_url']);
        $this->assertStringContainsString('realtytrac.com', $urls['realtytrac']['search_url']);
    }

    public function testHudFairMarketRentBenchmarks(): void
    {
        $fmr = $this->service->getHudFairMarketRent('71111');

        $this->assertSame('Bossier City', $fmr['city']);
        $this->assertSame('LA', $fmr['state']);
        $this->assertGreaterThan(1400, $fmr['fmr_schedule']['3bed']);
        $this->assertGreaterThan(1600, $fmr['fmr_schedule']['4bed']);
        $this->assertStringContainsString('huduser.gov', $fmr['source']);
    }

    public function testEvaluateFinancingAndUnderwriting(): void
    {
        $evaluation = $this->service->evaluateFinancingAndUnderwriting([
            'purchase_price'   => 45000.0,
            'sqft'             => 1850,
            'beds'             => 3,
            'zip'              => '71111',
            'renovation_budget'=> 15000.0,
            'appraised_arv'    => 125000.0,
        ]);

        // 1. 70% of appraisal MAO rule
        $this->assertArrayHasKey('rule_70_appraisal', $evaluation);
        // MAO = ($125,000 * 0.70) - $15,000 = $72,500
        $this->assertSame(72500.0, $evaluation['rule_70_appraisal']['mao_limit']);
        $this->assertTrue($evaluation['rule_70_appraisal']['passes_70_rule']);
        $this->assertSame(27500.0, $evaluation['rule_70_appraisal']['discount_under_mao']);

        // 2. Business CC Stacking
        $this->assertArrayHasKey('business_cc_stacking', $evaluation);
        $this->assertTrue($evaluation['business_cc_stacking']['eligible']);

        // 3. DSCR Loan Underwriting
        $this->assertArrayHasKey('dscr_loan_underwriting', $evaluation);
        $this->assertGreaterThan(1.5, $evaluation['dscr_loan_underwriting']['dscr_ratio']);
        $this->assertTrue($evaluation['dscr_loan_underwriting']['no_personal_income']);

        // 4. Section 8 Cash Flow
        $this->assertArrayHasKey('section_8_cashflow', $evaluation);
        $this->assertGreaterThan(0, $evaluation['section_8_cashflow']['cash_on_cash_return']);
        $this->assertGreaterThan(1000, $evaluation['section_8_cashflow']['gross_monthly_rent']);
    }

    public function testSearchDistressedOpportunities(): void
    {
        $results = $this->service->searchDistressedOpportunities([
            'max_price' => 50000,
            'min_sqft'  => 1700,
            'beds'      => 3,
            'zip'       => '71111',
        ]);

        $this->assertSame('ok', $results['status']);
        $this->assertGreaterThan(0, $results['deals_count']);
        foreach ($results['deals'] as $deal) {
            $this->assertLessThanOrEqual(50000, $deal['purchase_price']);
            $this->assertGreaterThanOrEqual(1700, $deal['sqft']);
            $this->assertGreaterThanOrEqual(3, $deal['beds']);
            $this->assertArrayHasKey('underwriting', $deal);
            $this->assertArrayHasKey('dscr_loan_underwriting', $deal['underwriting']);
        }
    }
}
