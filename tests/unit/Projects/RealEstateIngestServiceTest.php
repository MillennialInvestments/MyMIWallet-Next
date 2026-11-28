<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Services\RealEstateIngestService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class RealEstateIngestServiceTest extends CIUnitTestCase
{
    protected RealEstateIngestService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RealEstateIngestService();
    }

    public function testParseListingUrlRejectsInvalidUrl(): void
    {
        $res = $this->service->parseListingUrl('not-a-valid-url');
        $this->assertFalse($res['ok']);
        $this->assertSame('none', $res['extraction_method']);
    }

    public function testParseListingUrlExtractsZillowSlug(): void
    {
        $url = 'https://www.zillow.com/homedetails/1420-Benton-Rd-Bossier-City-LA-71111/12345678_zpid/';
        $res = $this->service->parseListingUrl($url);

        $this->assertTrue($res['ok']);
        $this->assertSame('1420 Benton Rd', $res['address_line1']);
        $this->assertSame('Bossier City', $res['city']);
        $this->assertSame('LA', $res['state']);
        $this->assertSame('71111', $res['postal_code']);
        $this->assertSame('www.zillow.com', $res['source_domain']);
        $this->assertNotEmpty($res['title']);
    }

    public function testParseListingUrlExtractsRealtorSlug(): void
    {
        $url = 'https://www.realtor.com/realestateandhomes-detail/2900-Airline-Dr_Bossier-City_LA_71111_M12345';
        $res = $this->service->parseListingUrl($url);

        $this->assertTrue($res['ok']);
        $this->assertSame('2900 Airline Dr', $res['address_line1']);
        $this->assertSame('Bossier City', $res['city']);
        $this->assertSame('LA', $res['state']);
        $this->assertSame('71111', $res['postal_code']);
    }

    public function testParseListingUrlExtractsRedfinSlug(): void
    {
        $url = 'https://www.redfin.com/LA/Bossier-City/1420-Benton-Rd-71111/home/12345';
        $res = $this->service->parseListingUrl($url);

        $this->assertTrue($res['ok']);
        $this->assertSame('1420 Benton Rd', $res['address_line1']);
        $this->assertSame('Bossier City', $res['city']);
        $this->assertSame('LA', $res['state']);
        $this->assertSame('71111', $res['postal_code']);
    }

    public function testIngestByUrlReturnsNormalizedFields(): void
    {
        $url = 'https://www.zillow.com/homedetails/1420-Benton-Rd-Bossier-City-LA-71111/12345678_zpid/';
        $res = $this->service->ingestByUrl($url);

        $this->assertIsArray($res);
        $this->assertSame('1420 Benton Rd', $res['address_line1']);
        $this->assertSame('Bossier City', $res['city']);
        $this->assertSame('LA', $res['state']);
        $this->assertSame('71111', $res['postal_code']);
    }
}
