<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Services;

/**
 * GTM-018: the forgot-password form must not reveal which emails have
 * accounts, and must not be usable to flood an inbox.
 *
 * @internal
 */
final class PasswordResetRequestTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private object $resetter;

    protected function setUp(): void
    {
        parent::setUp();

        Services::injectMock('eventTracker', new class () extends \App\Services\EventTracker {
            public function __construct() {}

            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });

        $this->resetter = new class () {
            public int $sent = 0;

            public function send($user = null): bool
            {
                $this->sent++;

                return true;
            }

            public function error(): ?string
            {
                return null;
            }
        };
        Services::injectMock('resetter', $this->resetter);
        // Fresh throttle buckets for every test.
        Services::injectMock('throttler', new \CodeIgniter\Throttle\Throttler(new \CodeIgniter\Test\Mock\MockCache()));

        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_user_ip_history (
            id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NULL, email TEXT NULL,
            ip_address TEXT NOT NULL, user_agent TEXT NULL, first_seen_at TEXT NULL,
            last_seen_at TEXT NULL, hits INTEGER DEFAULT 1, created_at TEXT NULL,
            updated_at TEXT NULL, deleted_at TEXT NULL
        )');
        $db->query('DROP TABLE IF EXISTS bf_users');
        $db->query('CREATE TABLE bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT, email TEXT NULL, username TEXT NULL,
            password_hash TEXT NULL, reset_hash TEXT NULL, reset_at TEXT NULL, reset_expires TEXT NULL,
            activate_hash TEXT NULL, status TEXT NULL, status_message TEXT NULL,
            active INTEGER DEFAULT 1, force_pass_reset INTEGER DEFAULT 0, permissions TEXT NULL,
            created_at TEXT NULL, updated_at TEXT NULL, deleted_at TEXT NULL
        )');
        $db->query("INSERT INTO bf_users (email, username, password_hash, active) VALUES ('member@example.com', 'member1', 'x', 1)");
    }

    private function postForgot(string $email)
    {
        $token = csrf_hash();

        return $this->withSession([csrf_token() => $token])
            ->post('forgot', [csrf_token() => $token, 'email' => $email]);
    }

    public function testUnknownAndKnownEmailsGetTheSameAnswer(): void
    {
        $unknown = $this->postForgot('nobody@example.com');
        $unknown->assertRedirectTo(site_url('reset-password'));
        $unknownMessage = session('auth_message');
        $this->assertSame(0, $this->resetter->sent, 'no email for an unknown address');

        $known = $this->postForgot('member@example.com');
        $known->assertRedirectTo(site_url('reset-password'));
        $this->assertSame(1, $this->resetter->sent, 'one reset email for a real account');

        $this->assertSame($unknownMessage, session('auth_message'));
        $this->assertSame(['type' => 'success', 'text' => lang('Auth.forgotEmailSent')], session('auth_message'));

        $hash = db_connect()->query("SELECT reset_hash, reset_expires FROM bf_users WHERE email = 'member@example.com'")->getRowArray();
        $this->assertSame(32, strlen((string) $hash['reset_hash']), '128-bit token');
        $this->assertNotEmpty($hash['reset_expires'], 'token must expire');
    }

    public function testResetEmailsAreCappedPerAddress(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->postForgot('member@example.com')->assertRedirectTo(site_url('reset-password'));
            $this->assertSame(['type' => 'success', 'text' => lang('Auth.forgotEmailSent')], session('auth_message'));
        }

        $this->assertSame(3, $this->resetter->sent, 'at most 3 reset emails per address per hour');
    }
}
