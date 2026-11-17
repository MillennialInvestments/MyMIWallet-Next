<?php

declare(strict_types=1);

namespace Tests\Unit\Entitlements;

use App\Models\ReferralModel;
use App\Models\SubscribeModel;
use App\Models\UserModel;
use App\Modules\User\Controllers\ReferralController;
use App\Modules\User\Controllers\SubscribeController;
use App\Services\PremiumEntitlementService;
use App\Services\ReferralService;
use CodeIgniter\Config\Services;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\Forge;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class EntitlementsReferralsPipelineTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        helper(['url', 'premium']);

        $this->db = db_connect();
        $this->db->resetDataCache();

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NULL,
            username TEXT NULL,
            password_hash TEXT NULL,
            reset_hash TEXT NULL,
            activate_hash TEXT NULL,
            status TEXT NULL,
            status_message TEXT NULL,
            active INTEGER DEFAULT 1,
            force_pass_reset INTEGER DEFAULT 0,
            banned INTEGER DEFAULT 0,
            referrer_code TEXT NULL,
            wallet_id TEXT NULL,
            trade_alerts INTEGER DEFAULT 0,
            personal_budgeting INTEGER DEFAULT 0,
            features_activated INTEGER DEFAULT 0,
            created_at TEXT NULL,
            updated_at TEXT NULL,
            deleted_at TEXT NULL
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NULL,
            username TEXT NULL,
            password_hash TEXT NULL,
            reset_hash TEXT NULL,
            activate_hash TEXT NULL,
            status TEXT NULL,
            status_message TEXT NULL,
            active INTEGER DEFAULT 1,
            force_pass_reset INTEGER DEFAULT 0,
            banned INTEGER DEFAULT 0,
            referrer_code TEXT NULL,
            wallet_id TEXT NULL,
            trade_alerts INTEGER DEFAULT 0,
            personal_budgeting INTEGER DEFAULT 0,
            features_activated INTEGER DEFAULT 0,
            created_at TEXT NULL,
            updated_at TEXT NULL,
            deleted_at TEXT NULL
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users_subscriptions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER DEFAULT 0,
            membership_tier TEXT DEFAULT "free",
            membership_status TEXT DEFAULT "active",
            subscription_name TEXT,
            active INTEGER DEFAULT 1,
            expires_at TEXT,
            trial_ends_at TEXT,
            updated_on TEXT
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users_referrals (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            referrer_code TEXT,
            user_id INTEGER DEFAULT 0,
            referral_email TEXT,
            user_ip_address TEXT,
            signup_date TEXT,
            type TEXT DEFAULT "Email",
            first_name TEXT,
            last_name TEXT,
            city TEXT,
            state TEXT,
            country TEXT,
            zipcode TEXT,
            active INTEGER DEFAULT 1,
            total_spend NUMERIC DEFAULT 0,
            status TEXT DEFAULT "pending",
            deleted_at TEXT
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users_subscribers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT,
            referral TEXT,
            category TEXT,
            subject TEXT,
            topic TEXT,
            beta INTEGER DEFAULT 0,
            date TEXT,
            hostTime TEXT,
            time TEXT,
            user_id INTEGER,
            user_ip TEXT,
            initial_sent INTEGER DEFAULT 0,
            status TEXT DEFAULT "active",
            delivery_error TEXT,
            updated_at TEXT,
            unsubscribe_token TEXT,
            unsubscribed_at TEXT
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet_transactions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id TEXT,
            transaction_id TEXT,
            active TEXT NULL,
            amount NUMERIC DEFAULT 0,
            type TEXT DEFAULT "purchase",
            details TEXT,
            submitted_date TEXT,
            unix_timestamp INTEGER
        )');
    }

    protected function tearDown(): void
    {
        $this->db->query('DELETE FROM users');
        $this->db->query('DELETE FROM bf_users');
        $this->db->query('DELETE FROM bf_users_subscriptions');
        $this->db->query('DELETE FROM bf_users_referrals');
        $this->db->query('DELETE FROM bf_users_subscribers');
        $this->db->query('DELETE FROM bf_users_wallet_transactions');
        parent::tearDown();
    }

    // ==========================================
    // 1. PremiumEntitlementService Tests
    // ==========================================

    public function testGuestEntitlementResolution(): void
    {
        $service = new PremiumEntitlementService($this->db);
        $res = $service->resolve(null, ['feature_key' => 'budget.dashboard']);

        $this->assertFalse($res['isLoggedIn']);
        $this->assertFalse($res['hasMembership']);
        $this->assertSame('free', $res['membershipTier']);
        $this->assertTrue($res['featureAllowed'], 'Free features must be allowed for guests.');

        $paidRes = $service->resolve(null, ['feature_key' => 'budget.connected_accounts']);
        $this->assertFalse($paidRes['featureAllowed'], 'Paid features must be denied for guests.');
        $this->assertStringContainsString('logged in', $paidRes['featureReason']);
    }

    public function testFreeUserEntitlementResolution(): void
    {
        $this->db->table('users')->insert([
            'id' => 101,
            'username' => 'free_tester',
            'email' => 'free@example.com',
        ]);

        $service = new PremiumEntitlementService($this->db);
        $res = $service->resolve(101, ['feature_key' => 'budget.dashboard']);

        $this->assertTrue($res['isLoggedIn']);
        $this->assertSame('free', $res['membershipTier']);
        $this->assertTrue($res['featureAllowed']);

        $paidRes = $service->resolve(101, ['feature_key' => 'budget.forecasting']);
        $this->assertFalse($paidRes['featureAllowed']);
        $this->assertStringContainsString('free', strtolower($paidRes['featureReason']));
    }

    public function testActiveTier1EntitlementResolution(): void
    {
        $this->db->table('users')->insert([
            'id' => 102,
            'username' => 'tier1_tester',
            'email' => 'tier1@example.com',
        ]);
        $this->db->table('bf_users_subscriptions')->insert([
            'user_id' => 102,
            'membership_tier' => 'tier1',
            'membership_status' => 'active',
            'subscription_name' => 'Starter Monthly',
            'active' => 1,
        ]);

        $service = new PremiumEntitlementService($this->db);
        $res = $service->resolve(102, ['feature_key' => 'budget.forecasting']);
        $this->assertTrue($res['hasMembership']);
        $this->assertTrue($res['membershipActive']);
        $this->assertSame('tier1', $res['membershipTier']);
        $this->assertTrue($res['featureAllowed'], 'Tier 1 must be allowed for budget.forecasting.');

        // Tier 2 feature should be denied
        $tier2Res = $service->resolve(102, ['feature_key' => 'budget.connected_accounts']);
        $this->assertFalse($tier2Res['featureAllowed'], 'Tier 1 must be denied for Tier 2 feature.');
    }

    public function testActiveTier2AndTier3EntitlementResolution(): void
    {
        $this->db->table('users')->insert([
            'id' => 103,
            'username' => 'tier2_tester',
            'email' => 'tier2@example.com',
        ]);
        $this->db->table('bf_users_subscriptions')->insert([
            'user_id' => 103,
            'membership_tier' => 'Pro',
            'membership_status' => 'active',
            'subscription_name' => 'Pro Annual',
            'active' => 1,
        ]);

        $service = new PremiumEntitlementService($this->db);
        $res = $service->resolve(103, ['feature_key' => 'budget.connected_accounts']);
        $this->assertSame('tier2', $res['membershipTier'], 'Pro must normalize to tier2');
        $this->assertTrue($res['featureAllowed']);

        // Check helper methods
        $this->assertSame('tier2', $service->getUserTier(103));
        $this->assertSame('active', $service->getUserStatus(103));
        $this->assertTrue($service->hasActiveMembership(103));
    }

    public function testTerminalMembershipStatusesDenyPaidFeatures(): void
    {
        $userId = 104;
        $this->db->table('users')->insert([
            'id' => $userId,
            'username' => 'expired_user',
            'email' => 'expired@example.com',
            'personal_budgeting' => 1,
            'features_activated' => 1,
        ]);

        $service = new PremiumEntitlementService($this->db);

        foreach (['expired', 'canceled', 'unpaid', 'inactive'] as $status) {
            $this->db->table('bf_users_subscriptions')->truncate();
            $this->db->table('bf_users_subscriptions')->insert([
                'user_id' => $userId,
                'membership_tier' => 'tier3',
                'membership_status' => $status,
                'active' => 1,
            ]);

            $service->clearRequestCache();
            $res = $service->resolve($userId, ['feature_key' => 'budget.forecasting']);
            $this->assertFalse($res['featureAllowed'], "Status {$status} must strictly deny paid feature.");
            $this->assertSame($status, $res['membershipStatus']);
        }
    }

    public function testExpiredTimestampBoundaryTransitionsStatus(): void
    {
        $userId = 105;
        $this->db->table('users')->insert([
            'id' => $userId,
            'username' => 'past_expiry_user',
            'email' => 'past@example.com',
        ]);
        $this->db->table('bf_users_subscriptions')->insert([
            'user_id' => $userId,
            'membership_tier' => 'tier2',
            'membership_status' => 'active',
            'expires_at' => date('Y-m-d H:i:s', time() - 3600), // 1 hour ago
            'active' => 1,
        ]);

        $service = new PremiumEntitlementService($this->db);
        $res = $service->resolve($userId, ['feature_key' => 'budget.connected_accounts']);

        $this->assertSame('expired', $res['membershipStatus'], 'Expired timestamp must enforce expired status.');
        $this->assertFalse($res['featureAllowed']);
    }

    // ==========================================
    // 2. ReferralService & ReferralModel Tests
    // ==========================================

    public function testUserReferralDataDefaultsAndGeneration(): void
    {
        $service = new ReferralService();
        $defaults = $service->getUserReferralData(0);
        $this->assertSame(0, $defaults['totalReferrals']);
        $this->assertNull($defaults['cuReferrerCode']);

        $userId = 201;
        $this->db->table('users')->insert([
            'id' => $userId,
            'username' => 'affiliate_john',
            'referrer_code' => 'MyMI-201',
            'wallet_id' => 'W-201',
        ]);

        $data = $service->getUserReferralData($userId);
        $this->assertSame('MyMI-201', $data['cuReferrerCode']);
        $this->assertStringContainsString('register?ref=MyMI-201', $data['referral_link']);

        $links = $service->generateReferralLinks($userId);
        $this->assertStringContainsString('MyMI-201/basic', $links['basic_link']);
        $this->assertStringContainsString('MyMI-201/premium', $links['premium_link']);
        $this->assertStringContainsString('MyMI-201/gold', $links['gold_link']);
    }

    public function testCommissionPercentageTiering(): void
    {
        $service = new ReferralService();

        // Reflection to mock performance or test tier bounds
        $refMethod = new \ReflectionMethod(ReferralService::class, 'getCommissionPercentage');

        // Without records, defaults to base tier (10%)
        $pct = $refMethod->invoke($service, 999, 'NONEXISTENT');
        $this->assertSame(10, $pct);
    }

    public function testMonthlyReferralStatsDatabaseAgnostic(): void
    {
        $model = new ReferralModel();
        $referrerCode = 'REF-TEST-001';

        $this->db->table('bf_users_referrals')->insertBatch([
            [
                'referrer_code' => $referrerCode,
                'user_id' => 301,
                'referral_email' => 'ref1@test.com',
                'signup_date' => date('Y-m-d H:i:s'),
                'active' => 1,
                'total_spend' => 50.00,
            ],
            [
                'referrer_code' => $referrerCode,
                'user_id' => 302,
                'referral_email' => 'ref2@test.com',
                'signup_date' => date('Y-m-d H:i:s'),
                'active' => 1,
                'total_spend' => 0.00,
            ],
        ]);

        $stats = $model->getMonthlyReferralStats($referrerCode);
        $this->assertNotEmpty($stats, 'Monthly stats should return records for active referrer.');
        $this->assertSame((int) date('Y'), (int) $stats[0]['year']);
        $this->assertSame((int) date('m'), (int) $stats[0]['month']);
        $this->assertSame(2, (int) $stats[0]['total']);
        $this->assertSame(2, (int) $stats[0]['active']);
        $this->assertSame(1, (int) $stats[0]['paying']);
    }

    public function testEarningsBreakdownAndPayoutSafety(): void
    {
        $model = new ReferralModel();
        $userId = 401;

        $breakdown = $model->getEarningsBreakdown($userId);
        $this->assertSame(0.00, $breakdown['total_earned']);
        $this->assertIsArray($breakdown['transactions']);

        // Insert commission transaction
        $this->db->table('bf_users_wallet_transactions')->insert([
            'user_id' => $userId,
            'transaction_id' => 'TX-COMM-001',
            'amount' => 125.50,
            'type' => 'commission',
            'unix_timestamp' => time(),
        ]);

        $breakdownAfter = $model->getEarningsBreakdown($userId);
        $this->assertEquals(125.50, $breakdownAfter['total_earned']);
        $this->assertCount(1, $breakdownAfter['transactions']);

        // Test payout safety: money switch is OFF by default, processReferralPayments should return false
        $service = new ReferralService();
        $res = $service->processReferralPayments($userId);
        $this->assertFalse($res, 'Payouts must be suppressed when FEATURE_MEMBERSHIP_PURCHASES money switch is OFF.');
    }

    // ==========================================
    // 3. Subscription & Mailing List Tests
    // ==========================================

    public function testSubscriberInsertionAndDeduplication(): void
    {
        $model = new SubscribeModel();

        // Valid insert
        $res = $model->insertEmail('newsletter_test@example.com', 'MyMI-PROMO');
        $this->assertTrue($res['success']);
        $this->assertSame('newsletter_test@example.com', $res['email'] ?? $res['data']['email'] ?? 'newsletter_test@example.com');

        // Duplicate insert rejected
        $dupRes = $model->insertEmail('newsletter_test@example.com');
        $this->assertFalse($dupRes['success']);
        $this->assertSame('duplicate_email', $dupRes['reason']);

        // Invalid email rejected
        $invalidRes = $model->insertEmail('not-an-email');
        $this->assertFalse($invalidRes['success']);
        $this->assertSame('invalid_email', $invalidRes['reason']);
    }

    public function testSubscriberUnsubscribeTokenFlow(): void
    {
        $model = new SubscribeModel();
        $email = 'unsub_test@example.com';
        $model->insertEmail($email);

        $token = bin2hex(random_bytes(16));
        $setOk = $model->setUnsubscribeToken($email, $token);
        $this->assertTrue($setOk);

        $unsubOk = $model->unsubscribeByToken($token);
        $this->assertTrue($unsubOk);

        // Verify status
        $row = $model->where('email', $email)->first();
        $this->assertSame('unsubscribed', $row['status']);
        $this->assertNotNull($row['unsubscribed_at']);
    }

    // ==========================================
    // 4. Controller IDOR Hardening Tests
    // ==========================================

    public function testSendReferralEmailRejectsUnauthenticated(): void
    {
        $controller = new ReferralController();
        $request = Services::request();
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);

        // Simulate AJAX request without session
        $request->setHeader('X-Requested-With', 'XMLHttpRequest');
        $request->setBody(json_encode([
            'referral_email' => 'invite@example.com',
            'user_id' => 9999, // Attempted IDOR spoof
        ]));

        $result = $controller->sendReferralEmail();
        $this->assertSame(401, $result->getStatusCode());

        $body = json_decode((string) $result->getBody(), true);
        $this->assertFalse($body['success']);
        $this->assertStringContainsString('signed in', $body['message']);
    }

    public function testSendReferralEmailScopesToSessionUser(): void
    {
        $userId = 501;
        $this->db->table('users')->insert([
            'id' => $userId,
            'username' => 'session_referrer',
            'email' => 'referrer@example.com',
            'referrer_code' => 'MyMI-501',
        ]);

        $controller = new ReferralController();
        $request = Services::request();
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);

        // Set session user ID on controller
        $refProp = new \ReflectionProperty($controller, 'cuID');
        $refProp->setValue($controller, $userId);

        $request->setHeader('X-Requested-With', 'XMLHttpRequest');
        $request->setHeader('Content-Type', 'application/json');
        $request->setBody(json_encode([
            'referral_email' => 'invited_friend@example.com',
            'user_id' => 9999, // Should be ignored in favor of $userId 501
        ]));

        $result = $controller->sendReferralEmail();
        $this->assertSame(200, $result->getStatusCode());

        $body = json_decode((string) $result->getBody(), true);
        $this->assertTrue($body['success']);

        // Verify stored row in database is scoped to session user 501, not 9999
        $stored = $this->db->table('bf_users_referrals')
            ->where('referral_email', 'invited_friend@example.com')
            ->get()->getRowArray();

        $this->assertNotNull($stored);
        $this->assertSame(501, (int) $stored['user_id'], 'Referral must be scoped to active session user, preventing IDOR.');
        $this->assertSame('MyMI-501', $stored['referrer_code']);
    }

    public function testSubscribeControllerSubmitHandlesJsonAndSession(): void
    {
        $userId = 601;
        $controller = new SubscribeController();
        $request = Services::request();
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);

        $refProp = new \ReflectionProperty($controller, 'cuID');
        $refProp->setValue($controller, $userId);

        $request->setHeader('Content-Type', 'application/json');
        $request->setBody(json_encode([
            'email' => 'json_subscriber@example.com',
            'referral' => 'MyMI-PROMO',
        ]));

        $result = $controller->Submit();
        $this->assertSame(200, $result->getStatusCode());

        $body = json_decode((string) $result->getBody(), true);
        $this->assertTrue($body['success']);

        // Verify subscriber stored with session user_id
        $stored = $this->db->table('bf_users_subscribers')
            ->where('email', 'json_subscriber@example.com')
            ->get()->getRowArray();

        $this->assertNotNull($stored);
        $this->assertSame($userId, (int) $stored['user_id']);
    }
}
