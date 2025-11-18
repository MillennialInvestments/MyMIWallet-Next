<?php

namespace Tests\Libraries;

use App\Libraries\MyMIAlphaVantage;
use CodeIgniter\Cache\Handlers\DummyHandler;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Cache as CacheConfig;
use Config\Services;

class MyMIAlphaVantageRateLimitTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $cacheConfig = new CacheConfig();
        $cache       = new DummyHandler($cacheConfig);
        $cache->initialize();

        Services::injectMock('cache', $cache);
    }

    public function testRateLimitPreventsBursting(): void
    {
        $alpha = new class extends MyMIAlphaVantage {
            public function __construct()
            {
                // Skip parent wiring, we only need the limiter helpers.
            }

            public function limitTo(int $limit): void
            {
                $this->rateLimitPerMinute = $limit;
            }

            public function claimSlots(int $slots): bool
            {
                return $this->acquireRateSlots($slots);
            }
        };

        $alpha->limitTo(2);

        $this->assertTrue($alpha->hasRateLimitCapacity(1));
        $this->assertTrue($alpha->claimSlots(1));

        $this->assertFalse(
            $alpha->hasRateLimitCapacity(2),
            'Subsequent burst should be deferred once slots are consumed.'
        );

        $this->assertFalse(
            $alpha->claimSlots(2),
            'Limiter should reject claims that exceed the configured threshold.'
        );
    }
}
