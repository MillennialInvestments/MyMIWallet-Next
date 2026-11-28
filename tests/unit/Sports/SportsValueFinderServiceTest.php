<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\SportsValueFinderService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Tests for SportsValueFinderService: Correlated SGP +EV calculations,
 * cross-book arbitrage detection, and star rating categorization.
 */
class SportsValueFinderServiceTest extends CIUnitTestCase
{
    private SportsValueFinderService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new SportsValueFinderService(db_connect());
    }

    public function testScanCorrelatedSgpEdgesFindsPositiveEvPlays(): void
    {
        $edges = $this->service->scanCorrelatedSgpEdges(null, 2.0);

        $this->assertIsArray($edges);
        $this->assertNotEmpty($edges);

        foreach ($edges as $edge) {
            $this->assertArrayHasKey('sport', $edge);
            $this->assertArrayHasKey('title', $edge);
            $this->assertArrayHasKey('ev_pct', $edge);
            $this->assertArrayHasKey('star_rating', $edge);
            $this->assertArrayHasKey('sportsbook', $edge);
            $this->assertGreaterThanOrEqual(2.0, (float) $edge['ev_pct']);
            $this->assertContains((int) $edge['star_rating'], [1, 2, 3]);
        }
    }

    public function testScanCorrelatedSgpEdgesWithSportFilter(): void
    {
        $mlbEdges = $this->service->scanCorrelatedSgpEdges('MLB', 1.0);
        $this->assertIsArray($mlbEdges);

        foreach ($mlbEdges as $e) {
            $this->assertSame('MLB', $e['sport']);
        }
    }

    public function testScanArbitrageEdgesDetectsGuaranteedRoi(): void
    {
        $arbs = $this->service->scanArbitrageEdges();

        $this->assertIsArray($arbs);
        $this->assertNotEmpty($arbs);

        foreach ($arbs as $arb) {
            $this->assertSame('arbitrage', $arb['scan_type']);
            $this->assertGreaterThan(0.0, (float) $arb['ev_pct']);
            $this->assertArrayHasKey('sportsbook', $arb);
        }
    }
}
