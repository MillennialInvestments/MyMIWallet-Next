<?php

use App\Services\ExternalApiGuard;
use CodeIgniter\Test\CIUnitTestCase;
use Config\ExternalApiPolicy;

final class ExternalApiGuardTest extends CIUnitTestCase
{
    private string|false $previousKillSwitch = false;

    protected function setUp(): void
    {
        parent::setUp();
        // CI sets MYMI_DISABLE_EXTERNAL=1, which makes allow() return false for
        // every provider. Clear it here so the cap logic itself is exercised.
        $this->previousKillSwitch = getenv('MYMI_DISABLE_EXTERNAL');
        putenv('MYMI_DISABLE_EXTERNAL');
    }

    protected function tearDown(): void
    {
        if ($this->previousKillSwitch !== false) {
            putenv('MYMI_DISABLE_EXTERNAL=' . $this->previousKillSwitch);
        }
        parent::tearDown();
    }

    public function testKillSwitchBlocksEveryProvider(): void
    {
        putenv('MYMI_DISABLE_EXTERNAL=1');
        $guard = new ExternalApiGuard(new ExternalApiPolicy());

        $this->assertFalse($guard->allow('alphavantage'));
        $this->assertSame([], $guard->counts());
    }

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
