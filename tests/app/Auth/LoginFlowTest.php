<?php

declare(strict_types=1);

use Config\Services;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

final class LoginFlowTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();

        Services::injectMock('eventTracker', new class extends \App\Services\EventTracker {
            public function __construct() {}

            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });

        Services::injectMock('safeCache', new class extends \App\Libraries\SafeCache {
            public function __construct() {}

            public function clearUserNamespace(int $userId, array $modules = []): void {}
        });

        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_user_ip_history (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NULL,
            email TEXT NULL,
            ip_address TEXT NOT NULL,
            user_agent TEXT NULL,
            first_seen_at TEXT NULL,
            last_seen_at TEXT NULL,
            hits INTEGER DEFAULT 1,
            created_at TEXT NULL,
            updated_at TEXT NULL,
            deleted_at TEXT NULL
        )');
        // attemptLogin() looks the identifier up via Myth\Auth UserModel before
        // calling the (mocked) authentication service, so the table must exist.
        $db->query('CREATE TABLE IF NOT EXISTS bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NULL,
            username TEXT NULL,
            password_hash TEXT NULL,
            reset_hash TEXT NULL,
            activate_hash TEXT NULL,
            status TEXT NULL,
            status_message TEXT NULL,
            active INTEGER DEFAULT 0,
            force_pass_reset INTEGER DEFAULT 0,
            banned INTEGER DEFAULT 0,
            created_at TEXT NULL,
            updated_at TEXT NULL,
            deleted_at TEXT NULL
        )');
    }

    /**
     * POST to the login route with a valid CSRF token. The csrf filter is
     * enforced on login (app/Config/Filters.php), so a token-less POST is
     * correctly rejected before reaching AuthController::attemptLogin().
     */
    private function postLogin(array $fields)
    {
        $token = csrf_hash();

        return $this->withSession([csrf_token() => $token])
            ->post('login', [csrf_token() => $token] + $fields);
    }

    public function testLoginPostWithoutCsrfTokenIsRejected(): void
    {
        $auth = new FakeAuthentication(false, true);
        Services::injectMock('authentication', $auth);

        $response = $this->post('login', [
            'login' => 'valid@example.com',
            'password' => 'correct-pass',
        ]);

        $response->assertRedirect();
        $this->assertFalse($auth->check(), 'login must not be attempted without a CSRF token');
        $this->assertNull(session('auth_message'));
    }

    public function testLoginPageRendersForLoggedOutVisitor(): void
    {
        Services::injectMock('authentication', new FakeAuthentication(false, false));

        $response = $this->get('login');

        $response->assertStatus(200);
        $response->assertSee('Resend activation email');
    }

    public function testLoggedInUserIsRedirectedAwayFromLogin(): void
    {
        Services::injectMock('authentication', new FakeAuthentication(true, false));

        $response = $this->get('login');

        $response->assertRedirectTo(site_url('Dashboard'));
    }

    public function testInvalidCredentialsReturnToLoginWithAuthMessage(): void
    {
        $auth = new FakeAuthentication(false, false);
        $auth->setError('Invalid credentials');
        Services::injectMock('authentication', $auth);

        $response = $this->postLogin([
            'login' => 'bad@example.com',
            'password' => 'wrong-pass',
        ]);

        $response->assertRedirect();
        $this->assertSame('danger', session('auth_message.type'));
    }

    public function testValidCredentialsRedirectToDashboardWithFlashMessage(): void
    {
        $auth = new FakeAuthentication(false, true);
        $auth->setUser((object) [
            'id' => 999,
            'email' => 'valid@example.com',
            'username' => 'valid_user',
            'active' => 0,
            'force_pass_reset' => false,
        ]);
        Services::injectMock('authentication', $auth);

        $response = $this->postLogin([
            'login' => 'valid@example.com',
            'password' => 'correct-pass',
            'remember' => '1',
        ]);

        $response->assertRedirectTo(site_url('Dashboard'));
        $this->assertSame('success', session('auth_message.type'));
    }
}

final class FakeAuthentication
{
    private bool $loggedIn;
    private bool $attemptResult;
    private string $error = '';
    private object $user;

    public function __construct(bool $loggedIn, bool $attemptResult)
    {
        $this->loggedIn = $loggedIn;
        $this->attemptResult = $attemptResult;
        $this->user = (object) [
            'id' => 1,
            'email' => 'fake@example.com',
            'username' => 'fake_user',
            'active' => 0,
            'force_pass_reset' => false,
        ];
    }

    public function setUser(object $user): void
    {
        $this->user = $user;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function check(): bool
    {
        return $this->loggedIn;
    }

    public function attempt(array $credentials, bool $remember = false): bool
    {
        $this->loggedIn = $this->attemptResult;

        return $this->attemptResult;
    }

    public function error(): string
    {
        return $this->error;
    }

    public function user(): object
    {
        return $this->user;
    }

    public function id(): ?int
    {
        return $this->user->id ?? null;
    }

    public function logout(): void
    {
        $this->loggedIn = false;
    }
}
