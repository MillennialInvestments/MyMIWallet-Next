<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Services\RealEstateDocumentService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Unit Test: RealEstateDocumentServiceTest
 *
 * Verifies institutional PDF generation for:
 * 1. Louisiana Assignable Purchase Agreement & Assignment of Contract (LREC Standard)
 * 2. Institutional Lender DSCR Loan Underwriting Package
 */
class RealEstateDocumentServiceTest extends CIUnitTestCase
{
    private RealEstateDocumentService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RealEstateDocumentService();
    }

    public function testGenerateAssignmentContractPdf(): void
    {
        $deal = [
            'address'               => '1842 Barksdale Blvd',
            'city'                  => 'Bossier City',
            'state'                 => 'LA',
            'zip'                   => '71111',
            'contract_price'        => 42500.0,
            'assignment_fee'        => 15000.0,
            'earnest_money_deposit' => 2500.0,
            'days_to_close'         => 14,
            'sqft'                  => 1820,
            'beds'                  => 3,
            'baths'                 => 2.0,
            'title_escrow_agent'    => 'North Louisiana Title & Escrow, LLC',
        ];

        $buyer = [
            'name'    => 'Bayou Equity Capital Partners, LLC',
            'company' => 'Bayou Equity Fund I',
            'phone'   => '318-555-0192',
            'email'   => 'acquisitions@bayouequity.com',
            'address' => '700 Texas St, Suite 400, Shreveport, LA 71101',
        ];

        $pdfPath = $this->service->generateAssignmentContractPdf($deal, $buyer);

        $this->assertFileExists($pdfPath);
        $this->assertGreaterThan(4000, filesize($pdfPath));

        // Cleanup
        if (file_exists($pdfPath)) {
            unlink($pdfPath);
        }
    }

    public function testGenerateDscrLenderPackagePdf(): void
    {
        $deal = [
            'address'           => '1842 Barksdale Blvd',
            'city'              => 'Bossier City',
            'state'             => 'LA',
            'zip'               => '71111',
            'purchase_price'    => 42500.0,
            'sqft'              => 1820,
            'beds'              => 3,
            'baths'             => 2.0,
            'renovation_budget' => 15000.0,
            'appraised_arv'     => 125000.0,
            'monthly_rent'      => 1485.0,
        ];

        $pdfPath = $this->service->generateDscrLenderPackagePdf($deal);

        $this->assertFileExists($pdfPath);
        $this->assertGreaterThan(4000, filesize($pdfPath));

        // Cleanup
        if (file_exists($pdfPath)) {
            unlink($pdfPath);
        }
    }
}
