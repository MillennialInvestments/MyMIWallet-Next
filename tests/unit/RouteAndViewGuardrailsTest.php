<?php

use App\Services\PremiumEntitlementService;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../_support/bootstrap.php';
}

final class RouteAndViewGuardrailsTest extends CIUnitTestCase
{
    public function testRoutesFileIncludesCriticalAliases(): void
    {
        $routes = file_get_contents(APPPATH . 'Config/Routes.php') ?: '';

        $needles = [
            "'/How-It-Works/'",
            "'/Support/Article'",
            "'Management/Run-CRON-Tasks'",
            "'Alerts/fetchEmailAlerts'",
            "'/Wallets/Purchase/Memberships/Pro'",
        ];

        foreach ($needles as $needle) {
            $this->assertStringContainsString($needle, $routes, 'Missing route alias: ' . $needle);
        }
    }

    public function testSupportArticleTemplateAndFallbackViewExist(): void
    {
        $this->assertFileExists(APPPATH . 'Modules/Support/Views/article.php');
        $this->assertFileExists(APPPATH . 'Modules/Support/Views/articles/welcome.php');
    }

    public function testHowItWorksAliasMapContainsKnownSlugs(): void
    {
        $controller = file_get_contents(APPPATH . 'Modules/Blog/Controllers/HowItWorksController.php') ?: '';

        $knownSlugs = [
            'overview',
            'investor-profile',
            'earnings',
            'alerts',
            'account-settings',
            'marketing',
            'investments',
            'mymi-wallets',
            'automated-financial-insights',
        ];

        foreach ($knownSlugs as $slug) {
            $this->assertStringContainsString("'{$slug}'", $controller, 'Known slug is not mapped: ' . $slug);
        }
    }

    public function testPremiumHelperReturnsExplicitDeniedShape(): void
    {
        $helper = file_get_contents(APPPATH . 'Helpers/premium_helper.php') ?: '';

        $this->assertStringContainsString("'code' => 'PREMIUM_REQUIRED'", $helper);
        $this->assertStringContainsString("'status' => 'denied'", $helper);
    }

    public function testTradeAlertsEntitlementDecisionMatrixFailsClosed(): void
    {
        $reflection = new \ReflectionClass(PremiumEntitlementService::class);
        $service = $reflection->newInstanceWithoutConstructor();

        $invoke = static function (
            PremiumEntitlementService $service,
            string $method,
            array $arguments
        ) {
            return (new \ReflectionMethod($service, $method))
                ->invokeArgs($service, $arguments);
        };

        $active = [
            'membershipTier' => 'tier1',
            'membershipStatus' => 'active',
            'membershipActive' => true,
        ];
        $trial = [
            'membershipTier' => 'trial',
            'membershipStatus' => 'trial',
            'membershipActive' => true,
        ];

        $this->assertTrue(
            $invoke($service, 'isFeatureAllowed', ['alerts.trade_alerts', $active, [], []])
        );
        $this->assertTrue(
            $invoke($service, 'isFeatureAllowed', ['alerts.trade_alerts', $trial, [], []])
        );
        $this->assertFalse(
            $invoke(
                $service,
                'isFeatureAllowed',
                [
                    'alerts.trade_alerts',
                    [
                        'membershipTier' => 'free',
                        'membershipStatus' => 'free',
                        'membershipActive' => false,
                    ],
                    [],
                    [],
                ]
            )
        );
        $this->assertFalse(
            $invoke($service, 'isFeatureAllowed', ['alerts.unknown', $active, [], []])
        );

        foreach (['expired', 'canceled', 'cancelled', 'unpaid', 'inactive'] as $status) {
            $this->assertFalse(
                $invoke(
                    $service,
                    'isFeatureAllowed',
                    [
                        'alerts.trade_alerts',
                        [
                            'membershipTier' => 'tier3',
                            'membershipStatus' => $status,
                            'membershipActive' => true,
                        ],
                        ['trade_alerts' => 1, 'features_activated' => 1],
                        [],
                    ]
                ),
                'Terminal status must fail closed: ' . $status
            );
        }
    }

    public function testTradeAlertsExpiryAndTrialBoundariesFailClosed(): void
    {
        $reflection = new \ReflectionClass(PremiumEntitlementService::class);
        $service = $reflection->newInstanceWithoutConstructor();
        $method = new \ReflectionMethod($service, 'enforceAccessBoundary');

        $past = date('Y-m-d H:i:s', time() - 3600);
        $future = date('Y-m-d H:i:s', time() + 3600);

        $this->assertSame(
            'expired',
            $method->invoke($service, ['expires_at' => $past], 'active')
        );
        $this->assertSame(
            'active',
            $method->invoke($service, ['expires_at' => $future], 'active')
        );
        $this->assertSame(
            'expired',
            $method->invoke($service, ['trial_ends_at' => $past], 'trial')
        );
        $this->assertSame(
            'trial',
            $method->invoke($service, ['trial_ends_at' => $future], 'trial')
        );
        $this->assertSame(
            'expired',
            $method->invoke($service, ['expires_at' => 'invalid-boundary'], 'active')
        );
    }

    public function testTradeAlertsUsesCanonicalFeatureDecisionAcrossPreviewAndSubscriberBridge(): void
    {
        $service = file_get_contents(APPPATH . 'Services/PremiumEntitlementService.php') ?: '';
        $user = file_get_contents(APPPATH . 'Libraries/MyMIUser.php') ?: '';
        $subscriber = file_get_contents(APPPATH . 'Models/SubscribeModel.php') ?: '';
        $alerts = file_get_contents(APPPATH . 'Modules/User/Controllers/AlertsController.php') ?: '';

        $this->assertStringContainsString(
            "\$subscription['membership_tier'] ?? \$subscription['tier'] ?? null",
            $service
        );
        $this->assertStringContainsString(
            "['feature_key' => 'alerts.trade_alerts']",
            $user
        );
        $this->assertStringContainsString(
            "\$entitlements['featureAllowed']",
            $user
        );
        $this->assertStringContainsString(
            "\$entitlements['featureAllowed']",
            $subscriber
        );
        $this->assertGreaterThanOrEqual(
            2,
            substr_count($alerts, "premium_guard('alerts.trade_alerts')")
        );
        $this->assertStringContainsString(
            'public function preview',
            $alerts
        );
    }
}
