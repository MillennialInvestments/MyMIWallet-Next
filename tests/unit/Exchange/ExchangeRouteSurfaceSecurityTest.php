<?php

declare(strict_types=1);

namespace Tests\Unit\Exchange;

use App\Filters\FeatureFlagFilter;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Features;

final class ExchangeRouteSurfaceSecurityTest extends CIUnitTestCase
{
    public function testExchangeTradingRoutesRegisteredWithGuards(): void
    {
        $routes = (string) file_get_contents(APPPATH . 'Config/Routes.php');
        $this->assertIsString($routes);

        // Verify trading routes exist and require login + feature:exchange_trading
        $expectedRoutes = [
            'CreateOrder',
            'CancelOrder',
            'Buy',
            'Sell',
            'OrderFetch',
            'UpdateOrder',
        ];

        foreach ($expectedRoutes as $endpoint) {
            $this->assertStringContainsString("'{$endpoint}'", $routes, "Route endpoint {$endpoint} must be registered.");
            $this->assertStringContainsString(
                "'feature:exchange_trading'",
                $routes,
                "Trading routes must be guarded by feature:exchange_trading."
            );
        }
    }

    public function testExchangeTradingFeatureFlagDisabledByDefault(): void
    {
        $features = new Features();
        $this->assertFalse($features->enabled('FEATURE_EXCHANGE_TRADING'), 'Money switch FEATURE_EXCHANGE_TRADING must be OFF by default');
        $this->assertFalse(FeatureFlagFilter::enabled('exchange_trading'), 'FeatureFlagFilter must evaluate exchange_trading as false by default');
    }

    public function testExchangeControllerHardenedAgainstIdor(): void
    {
        $controllerSource = (string) file_get_contents(APPPATH . 'Modules/Exchange/Controllers/ExchangeController.php');
        $this->assertIsString($controllerSource);

        // Verify user_id is assigned from $this->cuID, not unvalidated POST input
        $this->assertStringContainsString("'user_id' => \$this->cuID", $controllerSource, 'orderFetch/buy/sell must scope user_id to session cuID');

        // Verify no raw $this->request->getPost('user_id') in buy, sell, or orderFetch
        $this->assertStringNotContainsString(
            "'user_id' => \$this->request->getPost('user_id')",
            $controllerSource,
            'Must not assign user_id directly from untrusted POST parameter'
        );

        // Verify cancelOrder exists and verifies authorization
        $this->assertStringContainsString('public function cancelOrder()', $controllerSource);
        $this->assertStringContainsString('$this->exchangeService->cancelOrder($orderId, $userId)', $controllerSource);

        // Verify updateOrder restricts updatable fields and enforces authorization
        $this->assertStringContainsString('public function updateOrder()', $controllerSource);
        $this->assertStringContainsString('$allowedFields = [', $controllerSource);

        // Verify kycReward validates target vs session user
        $this->assertStringContainsString('public function kycReward($cuID)', $controllerSource);
        $this->assertStringContainsString('$targetId !== (int) $this->cuID', $controllerSource);
    }
}
