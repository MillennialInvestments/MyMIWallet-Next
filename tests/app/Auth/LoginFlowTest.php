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

        Services::injectMock('eventTracker', new class {
            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });

        Services::injectMock('safeCache', new class {
            public function clearUserNamespace(int $userId): void {}
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

        $response = $this->post('login', [
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

        $response = $this->post('login', [
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
