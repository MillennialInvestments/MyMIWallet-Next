<?php

declare(strict_types=1);

namespace Tests\Unit\Payments;

use App\Services\Payments\MembershipFulfillmentService;
use App\Services\PremiumEntitlementService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Paid membership checkout: a PayPal-verified claim activates the plan once,
 * at the server's price, and the entitlement service then sees it.
 */
final class MembershipFulfillmentTest extends CIUnitTestCase
{
    private const USER = 4101;
    private const NOW  = 1795000000;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_mf_claims');
        $db->query('DROP TABLE IF EXISTS bf_mf_subs');
        $db->query('CREATE TABLE bf_mf_claims (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, kind TEXT, provider TEXT, provider_txn_id TEXT, claimed_amount REAL, verified_amount REAL, currency TEXT, status TEXT, detail TEXT, created_at TEXT, updated_at TEXT)');
        $db->query('CREATE TABLE bf_mf_subs (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, active INTEGER DEFAULT 0, subscription_name TEXT, membership_tier TEXT DEFAULT "free", membership_status TEXT DEFAULT "free", expires_at TEXT, updated_on TEXT)');
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_mf_claims');
        $db->query('DROP TABLE IF EXISTS bf_mf_subs');
        $db->resetDataCache();
        parent::tearDown();
    }

    private function service(): MembershipFulfillmentService
    {
        return new MembershipFulfillmentService(db_connect(), 'bf_mf_claims', 'bf_mf_subs');
    }

    private function claim(float $amount, string $status = 'verified', string $currency = 'USD', int $user = self::USER, string $kind = 'membership'): int
    {
        db_connect()->table('bf_mf_claims')->insert([
            'user_id' => $user, 'kind' => $kind, 'provider' => 'paypal', 'provider_txn_id' => strtoupper(bin2hex(random_bytes(6))),
            'verified_amount' => $amount, 'currency' => $currency, 'status' => $status,
        ]);

        return (int) db_connect()->insertID();
    }

    /** @return array<string,mixed>|null */
    private function sub(int $user = self::USER): ?array
    {
        return db_connect()->table('bf_mf_subs')->where('user_id', $user)->get()->getRowArray();
    }

    private function claimStatus(int $id): string
    {
        return (string) db_connect()->table('bf_mf_claims')->where('id', $id)->get()->getRow()->status;
    }

    public function testVerifiedPaymentActivatesPlanForThirtyDays(): void
    {
        $id = $this->claim(49.99);
        $result = $this->service()->fulfil(self::USER, $id, 'Pro', self::NOW);

        $this->assertTrue($result['ok'], $result['reason']);
        $this->assertSame('tier2', $result['tier']);
        $row = $this->sub();
        $this->assertSame('tier2', $row['membership_tier']);
        $this->assertSame('active', $row['membership_status']);
        $this->assertSame(1, (int) $row['active']);
        $this->assertSame(date('Y-m-d H:i:s', self::NOW + 30 * 86400), $row['expires_at']);
        $this->assertSame('fulfilled', $this->claimStatus($id));
    }

    public function testClaimCanOnlyBeFulfilledOnce(): void
    {
        $id = $this->claim(9.99);
        $this->assertTrue($this->service()->fulfil(self::USER, $id, 'starter', self::NOW)['ok']);
        $again = $this->service()->fulfil(self::USER, $id, 'starter', self::NOW);

        $this->assertFalse($again['ok']);
        $this->assertSame('already_fulfilled', $again['reason']);
        $this->assertSame(date('Y-m-d H:i:s', self::NOW + 30 * 86400), $this->sub()['expires_at'], 'a replay must not add time');
        $this->assertSame(1, db_connect()->table('bf_mf_subs')->countAllResults());
    }

    public function testUnderpaymentIsHeldForReviewAndGrantsNothing(): void
    {
        $id = $this->claim(0.01);
        $result = $this->service()->fulfil(self::USER, $id, 'premium', self::NOW);

        $this->assertFalse($result['ok']);
        $this->assertSame('amount_mismatch', $result['reason']);
        $this->assertNull($this->sub());
        $this->assertSame('review_amount_mismatch', $this->claimStatus($id));
    }

    public function testWrongCurrencyUnverifiedForeignAndUnknownPlanGrantNothing(): void
    {
        $this->assertSame('wrong_currency', $this->service()->fulfil(self::USER, $this->claim(99.99, 'verified', 'JPY'), 'premium', self::NOW)['reason']);
        $this->assertSame('not_verified', $this->service()->fulfil(self::USER, $this->claim(99.99, 'unverified_not_captured'), 'premium', self::NOW)['reason']);
        $this->assertSame('claim_not_found', $this->service()->fulfil(self::USER, $this->claim(99.99, 'verified', 'USD', 999), 'premium', self::NOW)['reason']);
        $this->assertSame('claim_not_found', $this->service()->fulfil(self::USER, $this->claim(99.99, 'verified', 'USD', self::USER, 'mymigold'), 'premium', self::NOW)['reason']);
        $this->assertSame('unknown_plan', $this->service()->fulfil(self::USER, $this->claim(99.99), 'enterprise', self::NOW)['reason']);
        $this->assertNull($this->sub());
    }

    public function testRenewingSameTierAddsTimeAndUpgradeStartsNow(): void
    {
        $this->assertTrue($this->service()->fulfil(self::USER, $this->claim(49.99), 'pro', self::NOW)['ok']);
        $this->assertTrue($this->service()->fulfil(self::USER, $this->claim(49.99), 'pro', self::NOW + 86400)['ok']);
        $this->assertSame(date('Y-m-d H:i:s', self::NOW + 60 * 86400), $this->sub()['expires_at']);

        $this->assertTrue($this->service()->fulfil(self::USER, $this->claim(99.99), 'premium', self::NOW + 2 * 86400)['ok']);
        $row = $this->sub();
        $this->assertSame('tier3', $row['membership_tier']);
        $this->assertSame(date('Y-m-d H:i:s', self::NOW + 32 * 86400), $row['expires_at']);
        $this->assertSame(1, db_connect()->table('bf_mf_subs')->countAllResults(), 'one subscription row per user');
    }

    public function testMissingSchemaLeavesClaimVerifiedForManualActivation(): void
    {
        $id = $this->claim(9.99);
        $svc = new MembershipFulfillmentService(db_connect(), 'bf_mf_claims', 'bf_mf_no_such_table');
        $this->assertSame('schema_missing', $svc->fulfil(self::USER, $id, 'starter', self::NOW)['reason']);
        $this->assertSame('verified', $this->claimStatus($id));
    }

    public function testPlanPricesComeFromServerConfig(): void
    {
        $plans = config('MembershipPlans');
        $this->assertSame(9.99, $plans->find('starter')['price']);
        $this->assertSame(29.99, $plans->find('BASIC')['price']);
        $this->assertSame('tier2', $plans->find('pro')['tier']);
        $this->assertSame('tier3', $plans->find('premium')['tier']);
        $this->assertNull($plans->find('free'));
    }

    public function testPlanPagesUseTheSharedCheckoutAndNoUnrecordedSubscriptionButtons(): void
    {
        $dir = APPPATH . 'Modules/User/Views/Wallets/Purchase/Memberships/';
        foreach (['Starter', 'Basic', 'Pro', 'Premium'] as $plan) {
            $src = (string) file_get_contents($dir . $plan . '.php');
            $this->assertStringContainsString("'checkoutPlan' => '" . strtolower($plan) . "'", $src);
            $this->assertStringNotContainsString('createSubscription', $src, $plan . ' must not create PayPal subscriptions nobody records');
            $this->assertStringNotContainsString('paypal.com/sdk', $src);
        }
        $checkout = (string) file_get_contents($dir . 'checkout.php');
        $this->assertStringContainsString("feature_enabled('FEATURE_MEMBERSHIP_PURCHASES')", $checkout);
        $this->assertStringContainsString('Memberships/PurchaseCallback', $checkout);
        $this->assertStringContainsString('csrf_hash()', $checkout);
        $this->assertStringNotContainsString('PAYPAL_REST_SECRET\')) ?>', $checkout);

        $controller = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/WalletsController.php');
        $this->assertStringContainsString('MembershipFulfillmentService())->fulfil($userId', $controller);
    }
}
