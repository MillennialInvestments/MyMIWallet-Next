<?php

use App\Services\ExternalApiGuard;
use CodeIgniter\Test\CIUnitTestCase;
use Config\ExternalApiPolicy;

final class ExternalApiGuardTest extends CIUnitTestCase
{
    public function testProviderCapStopsCallsAfterLimit(): void
    {
        $policy = new ExternalApiPolicy();
        $policy->providerCaps = [
            'alphavantage' => 2,
        ];
        $policy->enableBackoff = false;
        $policy->microSleepBackoffUs = 0;

        $guard = new ExternalApiGuard($policy);

        $this->assertTrue($guard->allow('alphavantage'));
        $this->assertTrue($guard->allow('alphavantage'));
        $this->assertFalse($guard->allow('alphavantage'));

        $counts = $guard->counts();
        $this->assertSame(3, $counts['alphavantage']);
    }
}
