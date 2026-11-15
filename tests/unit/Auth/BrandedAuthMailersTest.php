<?php

declare(strict_types=1);

use App\Legacy\Auth\Authentication\Activators\EmailActivator as BrandedActivator;
use App\Legacy\Auth\Authentication\Resetters\EmailResetter as BrandedResetter;
use App\Libraries\MailService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\Mock\MockEmail;
use Config\Services;
use Myth\Auth\Entities\User;

/**
 * GTM-017: activation and reset mail use the branded MailService sender, and
 * fall back to Myth's plain template when the branded send fails.
 *
 * @internal
 */
final class BrandedAuthMailersTest extends CIUnitTestCase
{
    private MockEmail $plain;

    protected function setUp(): void
    {
        parent::setUp();
        $this->plain = new MockEmail(config('Email'));
        Services::injectMock('email', $this->plain);
    }

    public function testServicesResolveToTheBrandedSenders(): void
    {
        $this->assertInstanceOf(BrandedResetter::class, Services::resetter(null, false));
        $this->assertInstanceOf(BrandedActivator::class, Services::activator(null, false));
    }

    public function testBrandedSendIsUsedWhenItSucceeds(): void
    {
        $mail = $this->mailService(['ok' => true]);

        $this->assertTrue((new BrandedResetter(config(\App\Legacy\Auth\Config\Auth::class), $mail))->send($this->user()));
        $this->assertTrue((new BrandedActivator(config(\App\Legacy\Auth\Config\Auth::class), $mail))->send($this->user()));
        $this->assertSame(['reset:tok-reset', 'activation:tok-activate'], $mail->calls);
        $this->assertNull($this->plain->archive['recipients'] ?? null, 'plain fallback must not send');
    }

    public function testFallsBackToPlainTemplateWhenBrandedSendFails(): void
    {
        $resetter = new BrandedResetter(config(\App\Legacy\Auth\Config\Auth::class), $this->mailService(['ok' => false]));

        $this->assertTrue($resetter->send($this->user()));
        $this->assertSame('', $resetter->error());
    }

    public function testFallsBackToPlainTemplateWhenBrandedSendThrows(): void
    {
        $activator = new BrandedActivator(config(\App\Legacy\Auth\Config\Auth::class), $this->mailService(null));

        $this->assertTrue($activator->send($this->user()));
    }

    public function testRefusesAUserWithoutAToken(): void
    {
        $resetter = new BrandedResetter(config(\App\Legacy\Auth\Config\Auth::class), $this->mailService(['ok' => true]));

        $this->assertFalse($resetter->send(new User(['email' => 'someone@example.com'])));
        $this->assertNotSame('', $resetter->error());
    }

    private function user(): User
    {
        return new User(['id' => 7, 'email' => 'someone@example.com', 'reset_hash' => 'tok-reset', 'activate_hash' => 'tok-activate']);
    }

    /** @param array<string, mixed>|null $result null makes every send throw */
    private function mailService(?array $result): MailService
    {
        return new class ($result) extends MailService {
            /** @var list<string> */
            public array $calls = [];

            public function __construct(private ?array $result) {}

            public function sendPasswordResetEmail($user, string $token, array $context = []): array
            {
                return $this->answer('reset:' . $token);
            }

            public function sendActivationEmail($user, string $token, array $context = []): array
            {
                return $this->answer('activation:' . $token);
            }

            private function answer(string $call): array
            {
                $this->calls[] = $call;
                if ($this->result === null) {
                    throw new RuntimeException('outbox table missing');
                }

                return $this->result;
            }
        };
    }
}
