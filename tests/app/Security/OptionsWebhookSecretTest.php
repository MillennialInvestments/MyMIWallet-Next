<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * GTM-027: the options webhook used to fall back to a secret written in the
 * (public) source. It must now fail closed when OPTIONS_WEBHOOK_SECRET is
 * unset and reject a wrong secret.
 *
 * @internal
 */
final class OptionsWebhookSecretTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private string|false $previous;

    protected function setUp(): void
    {
        parent::setUp();
        $this->previous = getenv('OPTIONS_WEBHOOK_SECRET');
    }

    protected function tearDown(): void
    {
        putenv($this->previous === false ? 'OPTIONS_WEBHOOK_SECRET' : 'OPTIONS_WEBHOOK_SECRET=' . $this->previous);
        parent::tearDown();
    }

    public function testRejectsEverythingWhenSecretIsNotConfigured(): void
    {
        putenv('OPTIONS_WEBHOOK_SECRET');

        $result = $this->withBodyFormat('json')->post('API/Options/webhook', [
            'secret' => 'mymi-options-secure-key',
            'ticker' => 'SPY',
        ]);

        $result->assertStatus(503);
    }

    public function testRejectsWrongSecret(): void
    {
        putenv('OPTIONS_WEBHOOK_SECRET=test-only-secret-value');

        $result = $this->withBodyFormat('json')->post('API/Options/webhook', [
            'secret' => 'mymi-options-secure-key',
            'ticker' => 'SPY',
        ]);

        $result->assertStatus(401);
    }

    public function testSourceNoLongerShipsADefaultSecret(): void
    {
        $controller = file_get_contents(APPPATH . 'Modules/APIs/Controllers/OptionsWebhookController.php');
        $view = file_get_contents(APPPATH . 'Modules/User/Views/Investments/Options_Momentum_Dashboard.php');

        $this->assertStringNotContainsString('mymi-options-secure-key', $controller);
        $this->assertStringNotContainsString('mymi-options-secure-key', $view);
    }
}
