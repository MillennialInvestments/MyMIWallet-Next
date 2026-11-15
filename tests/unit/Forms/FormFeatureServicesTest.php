<?php

declare(strict_types=1);

namespace Tests\Unit\Forms;

use App\Controllers\NotesController;
use App\Filters\FeatureFlagFilter;
use App\Services\Forms\ReferralApplicationService;
use App\Services\Forms\UserPreferenceService;
use App\Services\Payments\PaymentClaimService;
use App\Services\Payments\PayPalOrderVerifier;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GT-FORM-ROUTES-001: services behind the forms fixed in the second pass
 * (referral applications, user preferences, payment claims, feature switches,
 * note sanitising).
 */
final class FormFeatureServicesTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        foreach (['bf_fs_referral', 'bf_fs_prefs', 'bf_payment_claims'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        $db->query('CREATE TABLE bf_fs_referral (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, referrer_code TEXT, active INTEGER DEFAULT 0, signup_date TEXT, user_type TEXT, first_name TEXT, last_name TEXT, email TEXT, phone TEXT, address TEXT, city TEXT, state TEXT, country TEXT, zipcode TEXT, paypal TEXT, other_payment TEXT, user_ip_address TEXT, created_on TEXT)');
        $db->query('CREATE TABLE bf_fs_prefs (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, scope TEXT, data TEXT, created_at TEXT, updated_at TEXT)');
        $db->query('CREATE TABLE bf_payment_claims (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, kind TEXT, provider TEXT, provider_txn_id TEXT, claimed_amount REAL, verified_amount REAL, currency TEXT, status TEXT, detail TEXT, created_at TEXT, updated_at TEXT)');
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        foreach (['bf_fs_referral', 'bf_fs_prefs', 'bf_payment_claims'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        // tableExists() caches the table list; later tests create their own tables.
        $db->resetDataCache();
        putenv('PAYPAL_REST_CLIENT_ID');
        putenv('PAYPAL_REST_SECRET');
        unset($_ENV['PAYPAL_REST_CLIENT_ID'], $_ENV['PAYPAL_REST_SECRET'], $_SERVER['PAYPAL_REST_CLIENT_ID'], $_SERVER['PAYPAL_REST_SECRET']);
        parent::tearDown();
    }

    public function testReferralApplicationUsesSessionUserAndWaitsForReview(): void
    {
        $svc = new ReferralApplicationService(null, 'bf_fs_referral');
        $result = $svc->apply(7, 'Premium', [
            'user_id' => 1, 'active' => 1, 'referrer_code' => 'HACK', 'first_name' => 'Ann', 'last_name' => 'Lee',
            'email' => 'ANN@example.test', 'paypal' => 'ann@example.test', 'wallet_id' => 'not-a-column',
        ], '127.0.0.1');

        $this->assertTrue($result['ok']);
        $row = db_connect()->table('bf_fs_referral')->where('id', $result['id'])->limit(1)->get()->getRowArray();
        $this->assertSame(7, (int) $row['user_id']);
        $this->assertSame(0, (int) $row['active']);
        $this->assertSame(ReferralApplicationService::referrerCode(7), $row['referrer_code']);
        $this->assertSame('ann@example.test', $row['email']);

        $again = $svc->apply(7, 'Premium', ['first_name' => 'Ann', 'last_name' => 'Lee', 'email' => 'ann@example.test']);
        $this->assertSame('already_applied', $again['reason']);

        $this->assertTrue($svc->activate((int) $result['id']));
        $this->assertSame(1, (int) db_connect()->table('bf_fs_referral')->where('id', $result['id'])->limit(1)->get()->getRow()->active);
    }

    public function testReferralApplicationValidates(): void
    {
        $svc = new ReferralApplicationService(null, 'bf_fs_referral');
        $this->assertSame('not_signed_in', $svc->apply(0, '', [])['reason']);
        $bad = $svc->apply(3, '', ['first_name' => '', 'email' => 'x', 'paypal' => 'not-email']);
        $this->assertSame('invalid_input', $bad['reason']);
        $this->assertArrayHasKey('paypal', $bad['errors']);
    }

    public function testPreferencesRoundTripAndShape(): void
    {
        $svc = new UserPreferenceService(null, 'bf_fs_prefs');
        $shaped = UserPreferenceService::shape(
            ['mode' => '', 'limit' => 0, 'alerts' => false, 'cats' => []],
            ['mode' => '<b>manual</b>', 'limit' => '-5', 'alerts' => 'on', 'cats' => ['rent', 'rent', ''], 'evil' => 'x']
        );
        $this->assertSame(['mode' => 'manual', 'limit' => 0.0, 'alerts' => true, 'cats' => ['rent']], $shaped);

        $this->assertTrue($svc->put(5, 'budget.Income', $shaped));
        $this->assertTrue($svc->put(5, 'budget.Income', ['mode' => 'auto'] + $shaped));
        $this->assertSame('auto', $svc->get(5, 'budget.Income')['mode']);
        $this->assertSame([], $svc->get(6, 'budget.Income'));
        $this->assertSame(1, db_connect()->table('bf_fs_prefs')->countAllResults());
    }

    private function verifierReturning(array $result): PayPalOrderVerifier
    {
        return new class ($result) extends PayPalOrderVerifier {
            public function __construct(private readonly array $result)
            {
                parent::__construct();
            }

            public function verify(string $orderId): array
            {
                return $this->result;
            }
        };
    }

    public function testPaymentClaimIsNotCreditedWithoutPayPalConfirmation(): void
    {
        $svc = new PaymentClaimService($this->verifierReturning(['ok' => false, 'reason' => 'not_configured']));
        $result = $svc->claim(9, 'mymigold', '5O190127TN364715T', 1000.0);

        $this->assertFalse($result['ok']);
        $this->assertSame('not_configured', $result['reason']);
        $row = db_connect()->table('bf_payment_claims')->limit(1)->get()->getRowArray();
        $this->assertSame('unverified_not_configured', $row['status']);
        $this->assertNull($row['verified_amount']);
    }

    public function testVerifiedClaimUsesPayPalAmountAndOrderIdsAreSingleUse(): void
    {
        $svc = new PaymentClaimService($this->verifierReturning(['ok' => true, 'reason' => 'verified', 'status' => 'COMPLETED', 'amount' => 25.0, 'currency' => 'USD']));
        $result = $svc->claim(9, 'mymigold', '5o190127tn364715t', 1000.0);

        $this->assertTrue($result['ok']);
        $this->assertSame(25.0, $result['amount']);
        $this->assertSame('duplicate', $svc->claim(10, 'mymigold', '5O190127TN364715T', 25.0)['reason']);
        $this->assertSame('invalid_order_id', $svc->claim(9, 'mymigold', "x' OR 1=1", 1.0)['reason']);
        $this->assertSame('not_signed_in', $svc->claim(0, 'mymigold', '5O190127TN364715X', 1.0)['reason']);
    }

    public function testPayPalVerifierNeedsACompletedCapture(): void
    {
        putenv('PAYPAL_REST_CLIENT_ID=test-id');
        putenv('PAYPAL_REST_SECRET=test-secret');
        $order = ['status' => 'APPROVED', 'purchase_units' => [['amount' => ['value' => '50.00', 'currency_code' => 'USD']]]];
        $http = static function (string $method, string $url) use (&$order): array {
            if (str_contains($url, '/oauth2/token')) {
                return ['status' => 200, 'body' => json_encode(['access_token' => 'abc'])];
            }

            return ['status' => 200, 'body' => json_encode($order)];
        };
        $verifier = new PayPalOrderVerifier($http);

        $this->assertSame('not_captured', $verifier->verify('5O190127TN364715T')['reason']);

        $order = ['status' => 'COMPLETED', 'purchase_units' => [['amount' => ['value' => '50.00', 'currency_code' => 'USD'], 'payments' => ['captures' => [['status' => 'COMPLETED', 'amount' => ['value' => '49.50', 'currency_code' => 'USD']]]]]]];
        $ok = $verifier->verify('5O190127TN364715T');
        $this->assertTrue($ok['ok']);
        $this->assertSame(49.5, $ok['amount']);
        $this->assertSame('invalid_order_id', $verifier->verify('../x')['reason']);
    }

    public function testPayPalVerifierRefusesWhenNotConfigured(): void
    {
        $this->assertSame('not_configured', (new PayPalOrderVerifier())->verify('5O190127TN364715T')['reason']);
    }

    public function testMoneySwitchesAreOffByDefault(): void
    {
        foreach (['solana_trading', 'auctions', 'project_investing', 'mymigold_purchases', 'membership_purchases', 'predictions', 'not_a_real_flag'] as $flag) {
            $this->assertFalse(FeatureFlagFilter::enabled($flag), $flag);
        }
        $this->assertSame('FEATURE_MYMIGOLD_PURCHASES', FeatureFlagFilter::envName('mymigold_purchases'));
    }

    public function testNoteCleanerDropsScriptsAndHandlers(): void
    {
        $out = NotesController::clean('<p onclick="x()">Hi <a href="javascript:alert(1)">l</a></p><script>alert(1)</script><img src=x onerror=y>');
        $this->assertStringNotContainsString('script', $out);
        $this->assertStringNotContainsString('onclick', $out);
        $this->assertStringNotContainsString('javascript:', $out);
        $this->assertStringNotContainsString('<img', $out);
        $this->assertStringContainsString('<p>Hi', $out);
    }
}
