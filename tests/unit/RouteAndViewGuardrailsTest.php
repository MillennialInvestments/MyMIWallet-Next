<?php

use App\Services\PremiumEntitlementService;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../_support/bootstrap.php';
}

final class RouteAndViewGuardrailsTest extends CIUnitTestCase
{
    public function testMembershipsPricingPageHasExplicitFeatureContractAndEmptyFallback(): void
    {
        $home = file_get_contents(APPPATH . 'Controllers/Home.php') ?: '';
        $outer = file_get_contents(APPPATH . 'Views/themes/public/memberships.php') ?: '';
        $partial = file_get_contents(APPPATH
            . 'Modules/User/Views/Wallets/Purchase/Memberships.php') ?: '';

        $this->assertStringContainsString("getMyMIDashboard()->getFeatures()", $home);
        $this->assertStringContainsString("\$data['getFeatures'] = []", $home);
        $this->assertStringContainsString("\$data['fieldData'] = \$data", $home);
        $this->assertStringContainsString("Membership feature comparisons are currently unavailable.", $partial);
        $this->assertStringContainsString("Membership feature details are currently unavailable.", $partial);
        $this->assertSame(2, substr_count($partial, 'foreach ($getFeatures as $features)'));
        $this->assertStringContainsString('Memberships', $outer);

        $settings = (object) [
            'customizableMemberships' => 0,
        ];
        $view = view('UserModule\\Views\\Wallets\\Purchase\\Memberships', [
            'siteSettings' => $settings,
            'membershipStarterFee' => 0,
            'membershipBasicFee' => 10,
            'membershipProFee' => 20,
            'membershipPremiumFee' => 30,
            'getFeatures' => [],
            'nonce' => ['style' => ''],
        ]);
        $this->assertStringContainsString('Membership feature comparisons are currently unavailable.', $view);
        $this->assertStringContainsString('Membership feature details are currently unavailable.', $view);
        $this->assertStringContainsString('MyMI Membership Bundles', $view);
    }


    public function testPublicMembershipPlansUseSafeUriSelection(): void
    {
        $plans = [
            'Starter' => 'P-2VR82118M3603741WMZFA76Y',
            'Basic' => 'P-2Y0165568W711230FMZFKWZA',
            'Pro' => 'P-2DS96023VD631600WMZFK3YQ',
            'Premium' => 'P-8FX85935H8514161YMZFK4CI',
        ];

        foreach ($plans as $plan => $paypalPlanId) {
            $partial = file_get_contents(
                APPPATH . 'Modules/User/Views/Wallets/Purchase/Memberships/'
                . $plan . '.php'
            ) ?: '';

            $this->assertStringContainsString(
                '<?php if ($membership_type === \'' . $plan . '\') : ?>',
                $partial
            );
            $this->assertStringNotContainsString(
                '<?php if ($uri->getSegment(4) === \'' . $plan . '\') : ?>',
                $partial
            );
            $this->assertStringContainsString($paypalPlanId, $partial);

            foreach ([
                ['Memberships/' . $plan, 2],
                ['Wallets/Purchase/Memberships/' . $plan, 4],
            ] as [$path, $segments]) {
                $uri = new \CodeIgniter\HTTP\URI(
                    'https://www.mymiwallet.com/' . $path
                );

                $selected = $uri->getSegment(1) === 'Memberships'
                    ? ($uri->getTotalSegments() >= 2
                        ? $uri->getSegment(2) : null)
                    : ($uri->getTotalSegments() >= 4
                        ? $uri->getSegment(4) : null);

                $this->assertSame($segments, $uri->getTotalSegments());
                $this->assertSame($plan, $selected);
            }
        }
    }

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

    public function testTradeAlertsCanonicalFreeNeverPromotesStaleLegacyPaidTier(): void
    {
        $service = (new \ReflectionClass(PremiumEntitlementService::class))
            ->newInstanceWithoutConstructor();
        $method = new \ReflectionMethod($service, 'normalizeSubscriptionTier');
        $row = [
            'membership_tier' => 'free',
            'membership_status' => 'active',
            'active' => 1,
            'tier' => 'Tier 2',
        ];
        $this->assertSame('free', $method->invoke($service, $row),
            'An intentional downgrade is indistinguishable from a schema default');
        foreach (['free', 'inactive', 'past_due', 'canceled'] as $status) {
            $row['membership_status'] = $status;
            $this->assertSame('free', $method->invoke($service, $row), $status);
        }
        $row['membership_status'] = 'active';
        $row['membership_tier'] = 'tier1';
        $row['tier'] = 'Tier 3';
        $this->assertSame('tier1', $method->invoke($service, $row));
        unset($row['membership_tier']);
        $this->assertSame('tier3', $method->invoke($service, $row),
            'Missing canonical column may use a recognized legacy tier');
        $row['membership_tier'] = ' FREE ';
        $this->assertSame('free', $method->invoke($service, $row));
    }

    public function testOnboardingCannotInferPaidTierFromMissingOrUnknownSubscriptionValues(): void
    {
        $service = (new \ReflectionClass(PremiumEntitlementService::class))
            ->newInstanceWithoutConstructor();
        $normalize = new \ReflectionMethod($service, 'normalizeSubscriptionTier');
        $normalizeStatus = new \ReflectionMethod($service, 'normalizeStatus');
        $allowed = new \ReflectionMethod($service, 'isFeatureAllowed');

        $user = ['features_activated' => 1, 'trade_alerts' => 0];
        $cases = [
            [],
            ['membership_tier' => ''],
            ['membership_tier' => 'unknown-tier', 'tier' => 'other'],
            ['membership_tier' => '', 'tier' => 'not-a-tier'],
            ['tier' => 'not-a-tier', 'subscription_name' => 'unrecognized record'],
        ];

        foreach ($cases as $case) {
            $subscription = $case + ['membership_status' => 'active', 'active' => 1];
            $tier = $normalize->invoke($service, $subscription);
            $status = $normalizeStatus->invoke($service, $subscription, $tier);
            $entitlements = [
                'membershipTier' => $tier,
                'membershipStatus' => $status,
                'membershipActive' => $status === 'active',
            ];
            $this->assertSame('free', $tier, json_encode($case));
            $this->assertFalse($allowed->invoke(
                $service, 'alerts.trade_alerts', $entitlements, $user, $subscription
            ), json_encode($case));
        }

        // Recognized subscription evidence still grants a paid membership.
        foreach ([
            ['membership_tier' => 'tier2', 'membership_status' => 'active'],
            ['tier' => 'Tier 2', 'membership_status' => 'active'],
            ['subscription_name' => 'Tier 2 Membership', 'membership_status' => 'active'],
        ] as $paid) {
            $this->assertSame('tier2', $normalize->invoke($service, $paid));
        }
        $this->assertSame('free', $normalize->invoke($service, [
            'membership_tier' => 'free', 'tier' => 'Tier 3',
            'membership_status' => 'active',
        ]));

        // Product-specific grants still require valid status, not onboarding.
        $freeActive = [
            'membershipTier' => 'free', 'membershipStatus' => 'active',
            'membershipActive' => true,
        ];
        $this->assertTrue($allowed->invoke(
            $service, 'alerts.trade_alerts', $freeActive, ['trade_alerts' => 1], []
        ));
        foreach (['expired', 'canceled', 'unpaid', 'inactive', 'past_due'] as $status) {
            $inactive = $freeActive;
            $inactive['membershipStatus'] = $status;
            $this->assertFalse($allowed->invoke(
                $service, 'alerts.trade_alerts',
                $inactive, ['trade_alerts' => 1], ['membership_status' => $status]
            ), $status);
        }
    }

    public function testTradeAlertsUnknownStatusNeverFallsBackToActive(): void
    {
        $service = (new \ReflectionClass(PremiumEntitlementService::class))
            ->newInstanceWithoutConstructor();
        $normalize = new \ReflectionMethod($service, 'normalizeStatus');
        $allowed = new \ReflectionMethod($service, 'isFeatureAllowed');
        foreach (['past_due', 'pending', 'suspended', 'free', 'unexpected'] as $status) {
            $this->assertSame('inactive', $normalize->invoke($service,
                ['membership_status' => $status, 'active' => 1], 'tier3'), $status);
        }
        $this->assertSame('active', $normalize->invoke($service,
            ['membership_status' => '', 'active' => 1], 'tier3'));
        $this->assertFalse($allowed->invoke($service, 'alerts.trade_alerts', [
            'membershipTier' => 'tier3', 'membershipStatus' => 'past_due',
            'membershipActive' => true,
        ], ['trade_alerts' => 1], []));
    }

    public function testTradeAlertsOnlyProductSpecificFlagOverridesTier(): void
    {
        $service = (new \ReflectionClass(PremiumEntitlementService::class))
            ->newInstanceWithoutConstructor();
        $allowed = new \ReflectionMethod($service, 'isFeatureAllowed');
        $boundary = new \ReflectionMethod($service, 'enforceAccessBoundary');
        $freeActive = [
            'membershipTier' => 'free', 'membershipStatus' => 'active',
            'membershipActive' => true,
        ];
        $this->assertFalse($allowed->invoke($service, 'alerts.trade_alerts',
            $freeActive, [], []));
        $this->assertFalse($allowed->invoke($service, 'alerts.trade_alerts',
            $freeActive, ['features_activated' => 1], []),
            'Completing onboarding must not grant premium Trade Alerts');
        $this->assertTrue($allowed->invoke($service, 'alerts.trade_alerts',
            $freeActive, ['trade_alerts' => 1], []));
        foreach (['past_due', 'expired', 'canceled', 'unpaid', 'inactive', 'free'] as $status) {
            $invalid = $freeActive;
            $invalid['membershipStatus'] = $status;
            $this->assertFalse($allowed->invoke($service, 'alerts.trade_alerts',
                $invalid, ['trade_alerts' => 1, 'features_activated' => 1], []), $status);
        }
        $expiredStatus = $boundary->invoke($service,
            ['expires_at' => date('Y-m-d H:i:s', time() - 3600)], 'active');
        $expired = $freeActive;
        $expired['membershipStatus'] = $expiredStatus;
        $this->assertFalse($allowed->invoke($service, 'alerts.trade_alerts',
            $expired, ['trade_alerts' => 1], []));
        $this->assertFalse($allowed->invoke($service, 'alerts.unknown',
            $freeActive, ['trade_alerts' => 1], []));
    }

    public function testTradeAlertsUsesCanonicalFeatureDecisionAcrossPreviewAndSubscriberBridge(): void
    {
        $service = file_get_contents(APPPATH . 'Services/PremiumEntitlementService.php') ?: '';
        $user = file_get_contents(APPPATH . 'Libraries/MyMIUser.php') ?: '';
        $subscriber = file_get_contents(APPPATH . 'Models/SubscribeModel.php') ?: '';
        $alerts = file_get_contents(APPPATH . 'Modules/User/Controllers/AlertsController.php') ?: '';

        $this->assertStringContainsString(
            "\$this->normalizeSubscriptionTier(\$subscription)",
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
