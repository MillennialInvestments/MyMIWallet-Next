<?php

namespace Tests\Unit\Security;

use App\Filters\TwoFactorFilter;
use App\Services\TwoFactorService;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * GTM-020: users with two-factor turned on are held at the challenge.
 */
final class TwoFactorFilterTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_user_2fa (
            id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, is_enabled INTEGER DEFAULT 0,
            secret_ciphertext BLOB NULL, secret_iv BLOB NULL, secret_tag BLOB NULL,
            backup_codes_hashes TEXT NULL, created_at DATETIME NULL, updated_at DATETIME NULL)');
        $db->table('bf_user_2fa')->where('user_id >', 0)->delete();
        $db->table('bf_user_2fa')->insert(['user_id' => 4201, 'is_enabled' => 1]);
        $db->table('bf_user_2fa')->insert(['user_id' => 4202, 'is_enabled' => 0]);
        session()->remove(['user_id', 'cuID', TwoFactorService::SESSION_VERIFIED, TwoFactorService::SESSION_STATE]);
        Services::resetSingle('response');
    }

    protected function tearDown(): void
    {
        db_connect()->table('bf_user_2fa')->whereIn('user_id', [4201, 4202])->delete();
        session()->remove(['user_id', 'cuID', TwoFactorService::SESSION_VERIFIED, TwoFactorService::SESSION_STATE]);
        parent::tearDown();
    }

    public function testAnonymousRequestPassesThrough(): void
    {
        $this->assertNull((new TwoFactorFilter())->before($this->request('Dashboard')));
    }

    public function testUserWithoutTwoFactorPassesThrough(): void
    {
        session()->set('user_id', 4202);
        $this->assertNull((new TwoFactorFilter())->before($this->request('Dashboard')));
    }

    public function testEnrolledUserIsRedirectedToChallenge(): void
    {
        session()->set('user_id', 4201);
        $result = (new TwoFactorFilter())->before($this->request('Dashboard'));
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertStringContainsString('Auth/Two-Factor', $result->getHeaderLine('Location'));
    }

    public function testEnrolledUserApiCallGets401(): void
    {
        session()->set('user_id', 4201);
        $result = (new TwoFactorFilter())->before($this->request('API/Wallets/list'));
        $this->assertInstanceOf(ResponseInterface::class, $result);
        $this->assertSame(401, $result->getStatusCode());
    }

    public function testChallengePageAndLogoutStayReachable(): void
    {
        session()->set('user_id', 4201);
        $this->assertNull((new TwoFactorFilter())->before($this->request('Auth/Two-Factor')));
        $this->assertNull((new TwoFactorFilter())->before($this->request('logout')));
    }

    public function testVerifiedSessionPassesThrough(): void
    {
        session()->set('user_id', 4201);
        (new TwoFactorService())->markVerified(4201);
        $this->assertNull((new TwoFactorFilter())->before($this->request('Dashboard')));
    }

    public function testFreshLoginClearsVerification(): void
    {
        session()->set('user_id', 4201);
        $service = new TwoFactorService();
        $service->markVerified(4201);
        $service->clearVerification();
        $this->assertInstanceOf(RedirectResponse::class, (new TwoFactorFilter())->before($this->request('Dashboard')));
    }

    private function request(string $path): IncomingRequest
    {
        $request = $this->createMock(IncomingRequest::class);
        $request->method('getUri')->willReturn(new URI('http://localhost/' . $path));
        $request->method('getHeaderLine')->willReturn('');
        $request->method('getMethod')->willReturn('GET');
        $request->method('isAJAX')->willReturn(false);

        return $request;
    }
}
