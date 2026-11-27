<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class LegacyRedirectAndShieldLoginTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
        config('App')->indexPage = '';
    }

    public function testLegacyApiHealthAnswersInsteadOfRedirectingToAHandlerString(): void
    {
        $result = $this->get('API/Health');

        $location = $result->response()->getHeaderLine('Location');
        $this->assertStringNotContainsString('Controller', $location);
        $this->assertNotSame(400, $result->response()->getStatusCode());
        $this->assertNotSame(500, $result->response()->getStatusCode());
    }

    public function testShieldConfigHasTheResetterTheLoginViewReads(): void
    {
        $this->assertNotNull(config('Auth')->activeResetter);
        $this->assertSame(
            config(\App\Legacy\Auth\Config\Auth::class)->activeResetter,
            config('Auth')->activeResetter,
        );
    }

    public function testBlogEarningsLandingRedirectsInsteadOfRenderingAnEmptyArticle(): void
    {
        $result = $this->get('Blog/Earnings');

        $this->assertSame(302, $result->response()->getStatusCode());
        $this->assertStringEndsWith('/Corporate-Earnings', $result->response()->getHeaderLine('Location'));
    }
}
