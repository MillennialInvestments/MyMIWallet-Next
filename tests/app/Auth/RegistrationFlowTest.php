<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Services;

final class RegistrationFlowTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();

        Services::injectMock('authentication', new RegistrationFakeAuthentication(false));
        Services::injectMock('eventTracker', new class extends \App\Services\EventTracker {
            public function __construct() {}

            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });
    }

    public function testRegisterPageLoads(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Create Your Free Account!');
    }

    public function testDiscordRegisterPageLoadsWithDiscordContent(): void
    {
        $response = $this->get('/Discord/register');

        $response->assertStatus(200);
        $response->assertSee('Why Join the MyMI Wallet Discord Community?');
        // assertSee() matches text, not markup; check the hidden campaign field in the raw HTML.
        $this->assertStringContainsString('name="source_slug" value="discord"', (string) $response->getBody());
    }

    public function testUnknownSourceRegisterIsNotRouted(): void
    {
        // Generic "(:segment)/register" routes are intentionally disabled in
        // app/Config/Routes.php so /register stays canonical; only explicit
        // campaign routes (e.g. Discord/register) render the form.
        $response = $this->get('/UnknownSource/register');

        $response->assertStatus(404);
        $response->assertDontSee('Create Your Free Account!');
    }
}


final class RegistrationFakeAuthentication
{
    public function __construct(private bool $loggedIn) {}

    public function check(): bool
    {
        return $this->loggedIn;
    }

    public function id(): ?int
    {
        return null;
    }

    public function user(): ?object
    {
        return null;
    }
}
