<?php

use App\Filters\OpsStatusTokenFilter;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\SiteURI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\App;

final class OpsStatusTokenFilterTest extends CIUnitTestCase
{
    private const TOKEN = 'abcdefabcdefabcdefabcdefabcdefabcdef1234';

    protected function setUp(): void
    {
        parent::setUp();
        putenv('MYMI_OPS_STATUS_TOKEN=' . self::TOKEN);
        $_ENV['MYMI_OPS_STATUS_TOKEN'] = self::TOKEN;
    }

    protected function tearDown(): void
    {
        putenv('MYMI_OPS_STATUS_TOKEN');
        unset($_ENV['MYMI_OPS_STATUS_TOKEN'], $_SERVER['MYMI_OPS_STATUS_TOKEN']);
        parent::tearDown();
    }

    private function request(string $method, array $headers = []): IncomingRequest
    {
        $config = new App();
        $request = new IncomingRequest($config, new SiteURI($config, 'API/Ops/watch-status'), null, new UserAgent());
        $request->setMethod($method);
        foreach ($headers as $k => $v) {
            $request->setHeader($k, $v);
        }

        return $request;
    }

    private function code($result): ?int
    {
        return $result === null ? null : $result->getStatusCode();
    }

    public function testAcceptsBearerAndHeaderToken(): void
    {
        $f = new OpsStatusTokenFilter();
        $this->assertNull($f->before($this->request('GET', ['Authorization' => 'Bearer ' . self::TOKEN])));
        $this->assertNull($f->before($this->request('GET', ['X-Ops-Status-Token' => self::TOKEN])));
    }

    public function testRejectsWrongMissingTokenAndNonGet(): void
    {
        $f = new OpsStatusTokenFilter();
        $this->assertSame(401, $this->code($f->before($this->request('GET', ['Authorization' => 'Bearer nope']))));
        $this->assertSame(401, $this->code($f->before($this->request('GET'))));
        $this->assertSame(405, $this->code($f->before($this->request('POST', ['Authorization' => 'Bearer ' . self::TOKEN]))));
    }

    public function testShortOrMissingConfiguredTokenFailsClosed(): void
    {
        putenv('MYMI_OPS_STATUS_TOKEN=short');
        $_ENV['MYMI_OPS_STATUS_TOKEN'] = 'short';
        $this->assertSame(503, $this->code((new OpsStatusTokenFilter())->before($this->request('GET', ['Authorization' => 'Bearer short']))));
    }
}
