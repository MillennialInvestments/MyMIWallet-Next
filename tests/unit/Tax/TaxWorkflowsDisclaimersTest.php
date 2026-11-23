<?php

declare(strict_types=1);

namespace Tests\Unit\Tax;

use App\Modules\Management\TaxAdmin\Controllers\TaxConfig;
use App\Modules\Management\TaxAdmin\Models\TaxJurisdictionsModel;
use App\Modules\Management\TaxAdmin\Models\TaxRatesModel;
use App\Modules\Management\TaxAdmin\Models\TaxTemplatesModel;
use App\Modules\User\Tax\Controllers\Tax;
use App\Modules\User\Tax\Models\TaxJurisdictionModel;
use App\Modules\User\Tax\Models\TaxReturnModel;
use App\Modules\User\Tax\Models\TaxTemplateModel;
use CodeIgniter\Config\Services;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use ReflectionClass;
use ReflectionMethod;
use RuntimeException;

final class TaxWorkflowsDisclaimersTest extends CIUnitTestCase
{
    protected $db;
    protected TaxReturnModel $returnModel;
    protected TaxTemplateModel $templateModel;
    protected TaxJurisdictionModel $jurisdictionModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = Database::connect();
        $this->db->resetDataCache();

        $this->ensureTables();

        $this->returnModel       = new TaxReturnModel();
        $this->templateModel     = new TaxTemplateModel();
        $this->jurisdictionModel = new TaxJurisdictionModel();
    }

    protected function tearDown(): void
    {
        $this->cleanTables();
        parent::tearDown();
    }

    private function ensureTables(): void
    {
        $schemas = [
            'settings' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                class VARCHAR(255) NOT NULL,
                key VARCHAR(255) NOT NULL,
                value TEXT NULL,
                type VARCHAR(31) NOT NULL DEFAULT 'string',
                context VARCHAR(255) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'users' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username VARCHAR(100) NULL,
                status VARCHAR(255) NULL,
                status_message VARCHAR(255) NULL,
                active TINYINT(1) NOT NULL DEFAULT 1,
                last_active DATETIME NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL,
                deleted_at DATETIME NULL,
                email VARCHAR(255) NULL
            )",
            'tax_jurisdictions' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                state VARCHAR(2) DEFAULT 'LA',
                parish VARCHAR(100) NOT NULL,
                name VARCHAR(150) NOT NULL,
                code VARCHAR(10) NOT NULL,
                active TINYINT(1) DEFAULT 1,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'tax_rates' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                jurisdiction_id INTEGER NOT NULL,
                rate_total DECIMAL(7,4) NOT NULL,
                rate_components TEXT NULL,
                effective_start DATE NOT NULL,
                effective_end DATE NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'tax_return_templates' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(150) NOT NULL,
                authority VARCHAR(150) NOT NULL,
                frequency VARCHAR(20) DEFAULT 'monthly',
                notes TEXT NULL,
                active TINYINT(1) DEFAULT 1,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'tax_return_lines' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                template_id INTEGER NOT NULL,
                line_number INTEGER NOT NULL,
                label VARCHAR(255) NOT NULL,
                type VARCHAR(20) DEFAULT 'input',
                calc_rule VARCHAR(255) NULL,
                requires_explain TINYINT(1) DEFAULT 0,
                sort_order INTEGER DEFAULT 0,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'user_tax_returns' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                template_id INTEGER NOT NULL,
                filing_period_start DATE NOT NULL,
                filing_period_end DATE NOT NULL,
                due_date DATE NOT NULL,
                file_date DATE NULL,
                status VARCHAR(20) DEFAULT 'draft',
                total_remitted DECIMAL(12,2) DEFAULT '0.00',
                notes TEXT NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'user_tax_return_values' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                return_id INTEGER NOT NULL,
                line_id INTEGER NOT NULL,
                amount DECIMAL(12,2) DEFAULT '0.00',
                explain_text VARCHAR(255) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'user_tax_return_jurisdictions' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                return_id INTEGER NOT NULL,
                jurisdiction_id INTEGER NOT NULL,
                taxable_amount DECIMAL(12,2) DEFAULT '0.00',
                tax_due DECIMAL(12,2) DEFAULT '0.00',
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'tax_audit_log' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                action VARCHAR(50) NOT NULL,
                entity_type VARCHAR(50) NOT NULL,
                entity_id INTEGER NOT NULL,
                before_json TEXT NULL,
                after_json TEXT NULL,
                created_at DATETIME NULL
            )",
        ];

        foreach ($schemas as $table => $ddl) {
            $this->db->query(sprintf($ddl, $table));
            $this->db->query(sprintf($ddl, 'bf_' . $table));
            $this->db->query(sprintf($ddl, 'bf_bf_' . $table));
        }
    }

    private function cleanTables(): void
    {
        $tables = [
            'tax_audit_log',
            'user_tax_return_jurisdictions',
            'user_tax_return_values',
            'user_tax_returns',
            'tax_return_lines',
            'tax_return_templates',
            'tax_rates',
            'tax_jurisdictions',
            'settings',
            'users',
        ];

        foreach ($tables as $t) {
            $this->db->query("DELETE FROM {$t}");
            $this->db->query("DELETE FROM bf_{$t}");
            $this->db->query("DELETE FROM bf_bf_{$t}");
        }
    }

    private function seedTaxFixture(): array
    {
        // 1. Template
        $this->db->table('bf_tax_return_templates')->insert([
            'name' => 'Louisiana Sales and Use Tax Return',
            'authority' => 'LDR',
            'frequency' => 'monthly',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $templateId = (int) $this->db->insertID();

        // 2. Lines (1 = Gross Sales, 2..10 = Deductions, 11 = Total Deductions, 12 = Net Taxable, 26 = Total Tax Due)
        $lines = [
            ['line_number' => 1, 'label' => 'Gross Sales', 'type' => 'input', 'sort_order' => 1],
            ['line_number' => 2, 'label' => 'Sales for Resale', 'type' => 'input', 'sort_order' => 2],
            ['line_number' => 3, 'label' => 'Cash Discounts', 'type' => 'input', 'sort_order' => 3],
            ['line_number' => 11, 'label' => 'Total Allowable Deductions', 'type' => 'calc', 'sort_order' => 11],
            ['line_number' => 12, 'label' => 'Adjusted Gross Sales', 'type' => 'calc', 'sort_order' => 12],
            ['line_number' => 26, 'label' => 'Total Tax Due', 'type' => 'calc', 'sort_order' => 26],
        ];

        foreach ($lines as $l) {
            $this->db->table('bf_tax_return_lines')->insert(array_merge($l, [
                'template_id' => $templateId,
                'created_at' => date('Y-m-d H:i:s'),
            ]));
        }

        // 3. Jurisdiction & Rate
        $this->db->table('bf_tax_jurisdictions')->insert([
            'state' => 'LA',
            'parish' => 'Orleans',
            'name' => 'City of New Orleans',
            'code' => 'ORL-01',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $jurisdictionId = (int) $this->db->insertID();

        $this->db->table('bf_tax_rates')->insert([
            'jurisdiction_id' => $jurisdictionId,
            'rate_total' => '5.0000', // 5%
            'effective_start' => '2026-01-01',
            'effective_end' => null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'template_id' => $templateId,
            'jurisdiction_id' => $jurisdictionId,
        ];
    }

    /**
     * 1. Test tax return creation, due date calculation, line and jurisdiction seeding
     */
    public function testTaxReturnCreationAndFilingPeriod(): void
    {
        $fixture = $this->seedTaxFixture();
        $templateId = $fixture['template_id'];

        $userId = 15;
        $periodStart = '2026-10-01';
        $periodEnd = '2026-10-31';

        $returnId = $this->returnModel->createReturn($userId, $templateId, $periodStart, $periodEnd);
        $this->assertGreaterThan(0, $returnId);

        $return = $this->returnModel->find($returnId);
        $this->assertSame($userId, (int) $return['user_id']);
        $this->assertSame($templateId, (int) $return['template_id']);
        $this->assertSame($periodStart, $return['filing_period_start']);
        $this->assertSame($periodEnd, $return['filing_period_end']);
        // Due date = period end + 20 days -> 2026-11-20
        $this->assertSame('2026-11-20', $return['due_date']);
        $this->assertSame('draft', $return['status']);

        // Check values seeded
        $values = $this->db->table('bf_user_tax_return_values')->where('return_id', $returnId)->get()->getResultArray();
        $this->assertCount(6, $values);

        // Check jurisdiction allocation seeded
        $allocs = $this->db->table('bf_user_tax_return_jurisdictions')->where('return_id', $returnId)->get()->getResultArray();
        $this->assertCount(1, $allocs);
        $this->assertEqualsWithDelta(0.0, (float) $allocs[0]['taxable_amount'], 0.001);
    }

    /**
     * 2. Test line saving and mathematical return recalculation
     */
    public function testTaxLineValueSaveAndRecalculation(): void
    {
        $fixture = $this->seedTaxFixture();
        $returnId = $this->returnModel->createReturn(10, $fixture['template_id'], '2026-10-01', '2026-10-31');

        // Line 1: Gross Sales = $10,000.00
        $ok1 = $this->returnModel->saveLineValue($returnId, 1, 10000.00);
        $this->assertTrue($ok1);

        // Line 2: Resale deductions = $1,500.00
        $ok2 = $this->returnModel->saveLineValue($returnId, 2, 1500.00);
        $this->assertTrue($ok2);

        // Line 3: Cash discounts = $500.00
        $ok3 = $this->returnModel->saveLineValue($returnId, 3, 500.00);
        $this->assertTrue($ok3);

        // Recalculate
        $recalc = $this->returnModel->recalculateReturn($returnId);

        // Line 11 = sum(lines 2..10) = 1500 + 500 = 2000.00
        $this->assertEqualsWithDelta(2000.00, (float) $recalc['line11'], 0.01);

        // Line 12 = Line 1 - Line 11 = 10000 - 2000 = 8000.00
        $this->assertEqualsWithDelta(8000.00, (float) $recalc['line12'], 0.01);
    }

    /**
     * 3. Test jurisdiction allocation updating and tax liability calculation
     */
    public function testTaxAllocationUpdateAndRecalc(): void
    {
        $fixture = $this->seedTaxFixture();
        $returnId = $this->returnModel->createReturn(10, $fixture['template_id'], '2026-10-01', '2026-10-31');

        $alloc = $this->db->table('bf_user_tax_return_jurisdictions')->where('return_id', $returnId)->get()->getRowArray();
        $this->assertNotNull($alloc);
        $allocId = (int) $alloc['id'];

        // Taxable amount $8,000 at 5% rate = $400.00 tax due
        $updated = $this->returnModel->updateAllocation($returnId, $allocId, 8000.00);
        $this->assertNotNull($updated);
        $this->assertEqualsWithDelta(400.00, (float) $updated['tax_due'], 0.01);

        // Verify return total_remitted updated
        $return = $this->returnModel->find($returnId);
        $this->assertEqualsWithDelta(400.00, (float) $return['total_remitted'], 0.01);
    }

    /**
     * 4. Test Tax controller ownership validation and IDOR protection
     */
    public function testTaxControllerOwnershipAndIdorProtection(): void
    {
        $fixture = $this->seedTaxFixture();
        // Return belongs to User 10
        $returnId = $this->returnModel->createReturn(10, $fixture['template_id'], '2026-10-01', '2026-10-31');

        $controller = new Tax();
        $request = Services::incomingrequest(null, false);
        $response = Services::response();
        $logger = Services::logger();
        $controller->initController($request, $response, $logger);

        // Inject User 99 (attacker) into controller
        $refUser = new \ReflectionProperty(Tax::class, 'currentUserId');
        $refUser->setAccessible(true);
        $refUser->setValue($controller, 99);

        // Attacker attempts ajaxSaveLine on User 10's return
        $request->setGlobal('post', [
            'return_id' => $returnId,
            'line_number' => 1,
            'amount' => 999999.00,
        ]);

        $saveLineRes = $controller->ajaxSaveLine();
        $this->assertSame(403, $saveLineRes->getStatusCode(), 'User 99 must be forbidden from saving lines on User 10 return');

        // Attacker attempts ajaxRecalc on User 10's return
        $recalcRes = $controller->ajaxRecalc($returnId);
        $this->assertSame(403, $recalcRes->getStatusCode(), 'User 99 must be forbidden from triggering recalc on User 10 return');

        // Attacker attempts ajaxSaveAllocation on User 10's return
        $alloc = $this->db->table('bf_user_tax_return_jurisdictions')->where('return_id', $returnId)->get()->getRowArray();
        $request->setGlobal('post', [
            'return_id' => $returnId,
            'allocation_id' => $alloc['id'],
            'taxable_amount' => 999999.00,
        ]);

        $allocRes = $controller->ajaxSaveAllocation();
        $this->assertSame(403, $allocRes->getStatusCode(), 'User 99 must be forbidden from modifying allocations on User 10 return');

        // Legitimate Owner (User 10) succeeds
        $refUser->setValue($controller, 10);
        $request->setGlobal('post', [
            'return_id' => $returnId,
            'line_number' => 1,
            'amount' => 5000.00,
        ]);
        $legitSave = $controller->ajaxSaveLine();
        $this->assertSame(200, $legitSave->getStatusCode());
    }

    /**
     * 5. Test Tax export JSON and CSV payloads include legal tax disclaimer
     */
    public function testTaxExportWithDisclaimer(): void
    {
        $fixture = $this->seedTaxFixture();
        $returnId = $this->returnModel->createReturn(10, $fixture['template_id'], '2026-10-01', '2026-10-31');
        $this->returnModel->saveLineValue($returnId, 1, 5000.00);
        $this->returnModel->recalculateReturn($returnId);

        $controller = new Tax();
        $request = Services::incomingrequest(null, false);
        $response = Services::response();
        $logger = Services::logger();
        $controller->initController($request, $response, $logger);

        $refUser = new \ReflectionProperty(Tax::class, 'currentUserId');
        $refUser->setAccessible(true);
        $refUser->setValue($controller, 10);

        // Export JSON
        $jsonRes = $controller->exportJson($returnId);
        $this->assertSame(200, $jsonRes->getStatusCode());
        $jsonBody = json_decode($jsonRes->getBody(), true);
        $this->assertArrayHasKey('path', $jsonBody);
        $filePath = $jsonBody['path'];
        $this->assertFileExists($filePath);

        $fileContent = json_decode(file_get_contents($filePath), true);
        $this->assertArrayHasKey('disclaimer', $fileContent);
        $this->assertStringContainsString('MyMI Wallet is not a CPA', $fileContent['disclaimer']);
        $this->assertStringContainsString('official tax, legal, or accounting advice', $fileContent['disclaimer']);

        // Export CSV
        $csvRes = $controller->exportCsv($returnId);
        $this->assertSame(200, $csvRes->getStatusCode());
        $csvBody = json_decode($csvRes->getBody(), true);
        $csvPath = $csvBody['path'];
        $this->assertFileExists($csvPath);

        $csvText = file_get_contents($csvPath);
        $this->assertStringContainsString('Disclaimer', $csvText);
        $this->assertStringContainsString('MyMI Wallet is not a CPA', $csvText);

        // Clean up test export files
        if (file_exists($filePath)) unlink($filePath);
        if (file_exists($csvPath)) unlink($csvPath);
    }

    /**
     * 6. Test Tax date validator prevents invalid inputs
     */
    public function testTaxDateValidation(): void
    {
        $this->assertSame('2026-11-01', Tax::validDate('2026-11-01'));
        $this->assertSame('2026-02-28', Tax::validDate('2026-02-28'));
        $this->assertNull(Tax::validDate('2026-02-30')); // Invalid date
        $this->assertNull(Tax::validDate('invalid-string'));
        $this->assertNull(Tax::validDate(null));
        $this->assertNull(Tax::validDate(''));
    }

    /**
     * 7. Test Tax Admin authorization enforcement
     */
    public function testTaxAdminAuthorization(): void
    {
        $adminController = new TaxConfig();
        $request = Services::incomingrequest(null, false);
        $response = Services::response();
        $logger = Services::logger();
        $adminController->initController($request, $response, $logger);

        $refMethod = new ReflectionMethod(TaxConfig::class, 'ensureAdmin');
        $refMethod->setAccessible(true);

        $refAdmin = new \ReflectionProperty(TaxConfig::class, 'adminUserId');
        $refAdmin->setAccessible(true);
        $refAdmin->setValue($adminController, 0); // No admin user

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Unauthorized: Tax admin access required.');
        $refMethod->invoke($adminController);
    }

    /**
     * 8. Test tax disclaimers are present in all user tax and investment views
     */
    public function testTaxDisclaimersPresentInViews(): void
    {
        $viewPaths = [
            'app/Modules/User/Tax/Views/index.php',
            'app/Modules/User/Tax/Views/view.php',
            'app/Modules/User/Tax/Views/edit.php',
            'app/Modules/User/Tax/Views/preview.php',
            'app/Modules/User/Views/Investments/resources/tax_report.php',
        ];

        foreach ($viewPaths as $path) {
            $fullPath = ROOTPATH . $path;
            $this->assertFileExists($fullPath);
            $content = file_get_contents($fullPath);
            $this->assertStringContainsString('Tax Disclaimer:', $content, "Missing tax disclaimer in {$path}");
            $this->assertStringContainsString('not a CPA', $content, "Missing CPA disclaimer in {$path}");
        }
    }
}
