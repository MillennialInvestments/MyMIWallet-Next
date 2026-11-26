<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * Regression: the 404 override in app/Config/Routes.php returned Response
 * objects, and CodeIgniter 4.7 echoes a Closure override's return value, so
 * every such 404 became "Object of class CodeIgniter\HTTP\Response could not
 * be converted to string" (an EMERGENCY BOOT FAILURE and an HTTP 500).
 *
 * @internal
 */
final class NotFoundOverrideTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
        // Production serves clean URLs (nginx rewrite), so match that here.
        config('App')->indexPage = '';
    }

    public function testOverrideReturnsAStringForEveryBranch(): void
    {
        $routes   = service('routes')->loadRoutes();
        $override = $routes->get404Override();

        $this->assertInstanceOf(Closure::class, $override);

        $reflection = new ReflectionFunction($override);
        $this->assertSame('string', (string) $reflection->getReturnType());
    }

    public function testMissingApiRouteAnswers404Json(): void
    {
        $result = $this->get('API/definitely-not-a-route-' . bin2hex(random_bytes(3)));

        $this->assertSame(404, $result->response()->getStatusCode());
        $payload = json_decode((string) $result->response()->getBody(), true);
        $this->assertIsArray($payload);
        $this->assertSame('not_found', $payload['error'] ?? null);
    }

    public function testWordPressProbeAnswers410(): void
    {
        $result = $this->get('wp-login-probe-' . bin2hex(random_bytes(3)) . '/wp-json');

        $this->assertSame(410, $result->response()->getStatusCode());
        $this->assertSame('Gone', (string) $result->response()->getBody());
    }

    public function testMissingScriptAnswers404Javascript(): void
    {
        $result = $this->get('assets-missing-' . bin2hex(random_bytes(3)) . '/app.js');

        $this->assertSame(404, $result->response()->getStatusCode());
        $this->assertStringContainsString('404 Not Found', (string) $result->response()->getBody());
    }

    public function testStatusAndHealthRoutesBootWithoutResponseCacheClass(): void
    {
        // These routes used a 'responsecache' alias that pointed at a class
        // CodeIgniter 4.7 does not ship (Class "CodeIgniter\Filters\ResponseCache" not found).
        foreach (['status', 'health'] as $path) {
            $result = $this->get($path);
            $this->assertNotSame(500, $result->response()->getStatusCode(), $path . ' must not 500');
        }

        $alias = config('Filters')->aliases['responsecache'] ?? null;
        $this->assertTrue($alias === null || class_exists($alias), 'responsecache alias must resolve');
    }
}
