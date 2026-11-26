<?php

declare(strict_types=1);

namespace Tests\Unit\Payments;

use App\Services\Payments\PayPalSmokeTestService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class PayPalSmokeTestServiceTest extends CIUnitTestCase
{
    private PayPalSmokeTestService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new PayPalSmokeTestService();
    }

    public function testAuditConfigurationStructure(): void
    {
        $audit = $this->service->auditConfiguration();

        $this->assertIsArray($audit);
        $this->assertArrayHasKey('ok', $audit);
        $this->assertArrayHasKey('mode', $audit);
        $this->assertArrayHasKey('api_endpoint', $audit);
        $this->assertArrayHasKey('feature_purchases', $audit);
        $this->assertArrayHasKey('tables', $audit);
        $this->assertArrayHasKey('plans', $audit);
        $this->assertArrayHasKey('recommendations', $audit);

        // Check plans audit contains starter, basic, pro, premium
        $plans = $audit['plans'];
        $this->assertArrayHasKey('starter', $plans);
        $this->assertArrayHasKey('basic', $plans);
        $this->assertArrayHasKey('pro', $plans);
        $this->assertArrayHasKey('premium', $plans);
    }

    public function testProbeLiveConnectivityReturnsDetailedStructure(): void
    {
        $probe = $this->service->probeLiveConnectivity();

        $this->assertIsArray($probe);
        $this->assertArrayHasKey('ok', $probe);
        $this->assertArrayHasKey('status_code', $probe);
        $this->assertArrayHasKey('latency_ms', $probe);
        $this->assertArrayHasKey('mode', $probe);

        if (! $probe['ok']) {
            $this->assertArrayHasKey('error', $probe);
            $this->assertArrayHasKey('remedy', $probe);
        }
    }

    public function testSimulateSandboxPurchaseGuardsInvalidUser(): void
    {
        $result = $this->service->simulateSandboxPurchase(0, 'starter');

        $this->assertFalse($result['ok']);
        $this->assertStringContainsString('Valid user session required', $result['error']);
    }

    public function testSimulateSandboxPurchaseGuardsUnknownPlan(): void
    {
        $result = $this->service->simulateSandboxPurchase(1, 'non_existent_super_plan');

        $this->assertFalse($result['ok']);
        $this->assertStringContainsString('not found', $result['error']);
    }
}
