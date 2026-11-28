<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Services\RealEstateAiUnderwriterService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Unit Test: RealEstateAiUnderwriterServiceTest
 *
 * Validates AIOps Real Estate Quick-Analysis underwriting scoring, pro forma synthesis,
 * playbook generation, and community crowdfund structuring for Timothy Burks Incorporated, LLC.
 */
class RealEstateAiUnderwriterServiceTest extends CIUnitTestCase
{
    private RealEstateAiUnderwriterService $underwriter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->underwriter = new RealEstateAiUnderwriterService();
    }

    public function testUnderwriteStrDealReturnsScoreAndGrade(): void
    {
        $input = [
            'title'                   => 'Bossier City Luxury STR',
            'property_category'       => 'residential_str',
            'address_line1'           => '1420 Benton Rd',
            'city'                    => 'Bossier City',
            'state'                   => 'LA',
            'postal_code'             => '71111',
            'purchase_price'          => 320000.0,
            'renovation_budget'       => 25000.0,
            'furnishing_budget'       => 20000.0,
            'projected_adr'           => 265.0,
            'projected_occupancy_pct' => 72.0,
        ];

        $analysis = $this->underwriter->analyze($input, 1);

        $this->assertSame('ok', $analysis['status']);
        $this->assertSame('Timothy Burks Incorporated, LLC.', $analysis['sponsor_entity']);
        $this->assertGreaterThanOrEqual(70, $analysis['deal_score']);
        $this->assertContains($analysis['deal_grade'], ['A+', 'A', 'B+', 'B']);
        $this->assertGreaterThan(0.0, $analysis['pro_forma']['projected_annual_noi']);
        $this->assertGreaterThan(0.0, $analysis['pro_forma']['target_coc_return']);
        $this->assertNotEmpty($analysis['value_add_playbook']);
        $this->assertNotEmpty($analysis['stress_test_risks']);
    }

    public function testUnderwriteCommercialDealReturnsNoiAndPlaybook(): void
    {
        $input = [
            'title'                  => 'Airline Dr Commercial Plaza',
            'property_category'      => 'commercial_lease',
            'address_line1'          => '2150 Airline Dr',
            'city'                   => 'Bossier City',
            'state'                  => 'LA',
            'postal_code'            => '71111',
            'purchase_price'         => 650000.0,
            'renovation_budget'      => 30000.0,
            'projected_monthly_rent' => 5500.0,
            'lease_type'             => 'triple_net_nnn',
        ];

        $analysis = $this->underwriter->analyze($input, 1);

        $this->assertSame('ok', $analysis['status']);
        $this->assertSame('Commercial NNN Lease', $analysis['property']['category_label']);
        $this->assertGreaterThan(0.0, $analysis['pro_forma']['cap_rate']);
        $this->assertArrayHasKey('Tenant Underwriting', $analysis['value_add_playbook']);
        $this->assertSame(100.0, $analysis['crowdfund_structure']['unit_nav_usd']);
        $this->assertGreaterThan(0, $analysis['crowdfund_structure']['total_units_issued']);
    }
}
