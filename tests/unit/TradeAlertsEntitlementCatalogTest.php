<?php
declare(strict_types=1);

use App\Services\PremiumEntitlementService;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined("TESTPATH")) {
    require_once __DIR__ . "/../_support/bootstrap.php";
}

final class TradeAlertsEntitlementCatalogTest extends CIUnitTestCase
{
    public function testPaidTierContract(): void
    {
        $feature = config("PremiumFeatures")->catalog["alerts.trade_alerts"];
        self::assertSame("tier1", $feature["min_tier"]);
        self::assertContains("trade_alerts", $feature["user_flags"]);
    }

    public function testTerminalStatusDeniesFlaggedUsers(): void
    {
        $service = (new ReflectionClass(PremiumEntitlementService::class))
            ->newInstanceWithoutConstructor();
        $method = new ReflectionMethod($service, "isFeatureAllowed");
        foreach (["expired", "canceled", "unpaid", "inactive"] as $status) {
            $entitlement = [
                "membershipTier" => "tier3",
                "membershipStatus" => $status,
                "membershipActive" => true,
            ];
            self::assertFalse($method->invoke(
                $service, "alerts.trade_alerts",
                $entitlement, ["trade_alerts" => 1], []
            ), $status);
        }
    }
}
