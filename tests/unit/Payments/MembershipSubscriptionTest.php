<?php

declare(strict_types=1);

namespace Tests\Unit\Payments;

use App\Filters\PayPalWebhookFilter;
use App\Services\Payments\MembershipFulfillmentService;
use App\Services\Payments\MembershipLifecycleService;
use App\Services\Payments\MembershipSubscriptionService;
use App\Services\Payments\PayPalSubscriptionClient;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * Auto-renewing memberships: access only for money PayPal confirms, only for
 * the member the subscription was created for, and never twice for one payment.
 */
final class MembershipSubscriptionTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private const USER  = 5101;
    private const OTHER = 5102;
    private const NOW   = 1795000000;
    private const SUB   = 'I-ABC123DEF456';
    private const ENV   = [
        'PAYPAL_PLAN_ID_PRO'    => 'P-PROPLAN',
        'PAYPAL_REST_CLIENT_ID' => 'test-client',
        'PAYPAL_REST_SECRET'    => 'test-secret',
        'PAYPAL_REST_MODE'      => 'sandbox',
        'PAYPAL_WEBHOOK_ID'     => 'WH-TEST',
    ];

    /** @var array<string,mixed> what the fake PayPal says about the subscription */
    private array $remote = [];

    /** @var list<string> */
    private array $cancelCalls = [];

    protected function setUp(): void
    {
        parent::setUp();
        foreach (self::ENV as $key => $value) {
            $_SERVER[$key] = $_ENV[$key] = $value;
            putenv("{$key}={$value}");
        }
        $db = db_connect();
        foreach (['bf_ms_auto', 'bf_ms_claims', 'bf_ms_access', 'bf_ms_users'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        $db->query('CREATE TABLE bf_ms_auto (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, plan_slug TEXT, provider TEXT, provider_subscription_id TEXT UNIQUE, status TEXT, last_paid_at TEXT, created_at TEXT, updated_at TEXT)');
        $db->query('CREATE TABLE bf_ms_claims (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, kind TEXT, provider TEXT, provider_txn_id TEXT, claimed_amount REAL, verified_amount REAL, currency TEXT, status TEXT, detail TEXT, created_at TEXT, updated_at TEXT)');
        $db->query('CREATE TABLE bf_ms_access (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, membership_tier TEXT, membership_status TEXT, expires_at TEXT)');
        $db->query('CREATE TABLE bf_ms_users (id INTEGER PRIMARY KEY, email TEXT)');
        $db->resetDataCache();

        $this->cancelCalls = [];
        $this->remote = [
            'ok' => true, 'reason' => 'found', 'status' => 'ACTIVE', 'plan_id' => 'P-PROPLAN',
            'custom_id' => MembershipSubscriptionService::customId(self::USER, 'pro'),
            'last_payment_amount' => 49.99, 'last_payment_currency' => 'USD',
            'last_payment_time' => gmdate('Y-m-d\TH:i:s\Z', self::NOW - 60),
        ];
    }

    protected function tearDown(): void
    {
        foreach (array_keys(self::ENV) as $key) {
            unset($_SERVER[$key], $_ENV[$key]);
            putenv($key);
        }
        PayPalWebhookFilter::$client = null;
        $db = db_connect();
        foreach (['bf_ms_auto', 'bf_ms_claims', 'bf_ms_access', 'bf_ms_users'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        $db->resetDataCache();
        parent::tearDown();
    }

    private function service(): MembershipSubscriptionService
    {
        $client = new class ($this->remote, $this->cancelCalls) extends PayPalSubscriptionClient {
            /** @param array<string,mixed> $remote */
            public function __construct(private array $remote, private array &$cancelCalls)
            {
                parent::__construct();
            }

            public function getSubscription(string $subscriptionId): array
            {
                return $this->remote;
            }

            public function cancel(string $subscriptionId, string $reason = 'Cancelled by member'): bool
            {
                $this->cancelCalls[] = $subscriptionId;

                return true;
            }
        };

        return new MembershipSubscriptionService(
            db_connect(),
            $client,
            new MembershipFulfillmentService(db_connect(), 'bf_ms_claims', 'bf_ms_access', 'bf_ms_users'),
            'bf_ms_auto',
            'bf_ms_claims'
        );
    }

    /** @return array<string,mixed>|null */
    private function access(int $user = self::USER): ?array
    {
        return db_connect()->table('bf_ms_access')->where('user_id', $user)->get()->getRowArray();
    }

    /** @return array<string,mixed> */
    private function sale(string $id, float $amount = 49.99, string $currency = 'USD', ?int $at = null, string $sub = self::SUB): array
    {
        return ['event_type' => 'PAYMENT.SALE.COMPLETED', 'resource' => [
            'id' => $id, 'billing_agreement_id' => $sub,
            'amount' => ['total' => number_format($amount, 2, '.', ''), 'currency' => $currency],
            'create_time' => gmdate('Y-m-d\TH:i:s\Z', $at ?? self::NOW),
        ]];
    }

    public function testPaidSubscriptionGivesAccessFromThePaymentTime(): void
    {
        $result = $this->service()->start(self::USER, 'Pro', self::SUB, self::NOW);

        $this->assertTrue($result['ok'], $result['reason']);
        $row = $this->access();
        $this->assertSame('tier2', $row['membership_tier']);
        $this->assertSame('active', $row['membership_status']);
        $expected = (self::NOW - 60) + (30 + MembershipSubscriptionService::GRACE_DAYS) * 86400;
        $this->assertSame(date('Y-m-d H:i:s', $expected), $row['expires_at']);
        $this->assertSame('pro', $this->service()->activeFor(self::USER)['plan_slug']);
    }

    public function testApprovedButUnpaidSubscriptionGivesNoAccessYet(): void
    {
        $this->remote['last_payment_time'] = '';
        $this->remote['last_payment_amount'] = 0.0;

        $result = $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);

        $this->assertFalse($result['ok']);
        $this->assertSame('payment_pending', $result['reason']);
        $this->assertNull($this->access());
        $this->assertNotNull($this->service()->activeFor(self::USER), 'the subscription is remembered so the webhook can find it');
    }

    public function testSubscriptionMadeForSomeoneElseOrAnotherPlanIsRefused(): void
    {
        $result = $this->service()->start(self::OTHER, 'pro', self::SUB, self::NOW);
        $this->assertSame('wrong_member', $result['reason']);

        $this->remote['plan_id'] = 'P-CHEAPER';
        $result = $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);
        $this->assertSame('wrong_plan', $result['reason']);

        $this->assertNull($this->access(self::USER));
        $this->assertNull($this->access(self::OTHER));
        $this->assertSame(0, db_connect()->table('bf_ms_auto')->countAllResults());
    }

    public function testUnderpaidFirstPaymentGivesNoAccess(): void
    {
        $this->remote['last_payment_amount'] = 1.00;

        $this->assertSame('payment_pending', $this->service()->start(self::USER, 'pro', self::SUB, self::NOW)['reason']);
        $this->assertNull($this->access());
    }

    public function testRenewalPaymentExtendsAccessAndARepeatedWebhookAddsNothing(): void
    {
        $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);
        $nextMonth = self::NOW + 30 * 86400;

        $first = $this->service()->handleEvent($this->sale('SALE0000001', 49.99, 'USD', $nextMonth), $nextMonth);
        $this->assertSame('renewed', $first['reason']);
        $expected = date('Y-m-d H:i:s', $nextMonth + (30 + MembershipSubscriptionService::GRACE_DAYS) * 86400);
        $this->assertSame($expected, $this->access()['expires_at']);

        $again = $this->service()->handleEvent($this->sale('SALE0000001', 49.99, 'USD', $nextMonth), $nextMonth + 500);
        $this->assertSame('duplicate', $again['reason']);
        $this->assertSame($expected, $this->access()['expires_at']);
        $this->assertSame(1, db_connect()->table('bf_ms_claims')->where('provider_txn_id', 'SALE0000001')->countAllResults());
        $this->assertSame('fulfilled', db_connect()->table('bf_ms_claims')->get()->getRow()->status);
    }

    public function testFirstPaymentWebhookAfterStartDoesNotStackTime(): void
    {
        $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);
        $before = $this->access()['expires_at'];

        $this->service()->handleEvent($this->sale('SALE0000002', 49.99, 'USD', self::NOW - 60), self::NOW + 30);

        $this->assertSame($before, $this->access()['expires_at']);
    }

    public function testWrongAmountOrCurrencyIsHeldForReviewWithoutAccess(): void
    {
        $this->remote['last_payment_time'] = '';
        $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);

        $low = $this->service()->handleEvent($this->sale('SALE0000003', 4.99), self::NOW);
        $eur = $this->service()->handleEvent($this->sale('SALE0000004', 49.99, 'EUR'), self::NOW);

        $this->assertSame('amount_mismatch', $low['reason']);
        $this->assertSame('wrong_currency', $eur['reason']);
        $this->assertNull($this->access());
        $statuses = array_column(db_connect()->table('bf_ms_claims')->orderBy('id')->get()->getResultArray(), 'status');
        $this->assertSame(['review_amount_mismatch', 'review_wrong_currency'], $statuses);
    }

    public function testPaymentWebhookRegistersASubscriptionWhoseBrowserCallbackNeverArrived(): void
    {
        // start() was never called: the member closed the tab after approving.
        $result = $this->service()->handleEvent($this->sale('SALE0000006'), self::NOW);

        $this->assertSame('renewed', $result['reason']);
        $this->assertSame(self::USER, $result['user_id']);
        $this->assertSame('tier2', $this->access()['membership_tier']);
        $this->assertSame('pro', $this->service()->activeFor(self::USER)['plan_slug'], 'the member can now see and cancel it');
    }

    public function testActivatedWebhookRegistersTheSubscriptionWithoutGivingAccess(): void
    {
        $result = $this->service()->handleEvent(['event_type' => 'BILLING.SUBSCRIPTION.ACTIVATED', 'resource' => ['id' => self::SUB]], self::NOW);

        $this->assertSame('registered', $result['reason']);
        $this->assertNotNull($this->service()->activeFor(self::USER));
        $this->assertNull($this->access());
    }

    public function testPaymentForUnknownSubscriptionChangesNothing(): void
    {
        // PayPal knows it, but it was not created by our checkout for one of our plans.
        $this->remote['custom_id'] = 'someone-else';
        $this->remote['plan_id'] = 'P-NOTOURS';
        $result = $this->service()->handleEvent($this->sale('SALE0000005', 49.99, 'USD', null, 'I-NOTOURS00001'), self::NOW);

        $this->assertSame('unknown_subscription', $result['reason']);
        $this->assertSame(0, db_connect()->table('bf_ms_claims')->countAllResults());
        $this->assertSame(0, db_connect()->table('bf_ms_access')->countAllResults());
    }

    public function testCancelStopsBillingForTheOwnerOnlyAndKeepsPaidTime(): void
    {
        $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);
        $paidUntil = $this->access()['expires_at'];

        $stranger = $this->service()->cancel(self::OTHER, self::NOW);
        $this->assertFalse($stranger['ok']);
        $this->assertSame([], $this->cancelCalls);
        $this->assertNotNull($this->service()->activeFor(self::USER));

        $owner = $this->service()->cancel(self::USER, self::NOW);
        $this->assertTrue($owner['ok']);
        $this->assertSame([self::SUB], $this->cancelCalls);
        $this->assertNull($this->service()->activeFor(self::USER));
        $this->assertSame($paidUntil, $this->access()['expires_at']);
        $this->assertSame('active', $this->access()['membership_status']);
    }

    public function testCancelledWebhookMarksTheSubscriptionAndKeepsPaidTime(): void
    {
        $this->service()->start(self::USER, 'pro', self::SUB, self::NOW);

        $result = $this->service()->handleEvent(['event_type' => 'BILLING.SUBSCRIPTION.CANCELLED', 'resource' => ['id' => self::SUB]], self::NOW);

        $this->assertSame('cancelled', $result['reason']);
        $this->assertNull($this->service()->activeFor(self::USER));
        $this->assertSame('active', $this->access()['membership_status']);
    }

    public function testClientSendsTheEventUnchangedAndTrustsOnlyPayPalsAnswer(): void
    {
        $sent = [];
        $answer = 'SUCCESS';
        $client = new PayPalSubscriptionClient(static function (string $method, string $url, array $options) use (&$sent, &$answer): array {
            if (str_ends_with($url, '/v1/oauth2/token')) {
                return ['status' => 200, 'body' => '{"access_token":"t"}'];
            }
            $sent[] = [$url, (string) ($options['body'] ?? '')];

            return ['status' => 200, 'body' => json_encode(['verification_status' => $answer])];
        });
        $headers = [
            'paypal-auth-algo' => 'SHA256withRSA', 'paypal-cert-url' => 'https://api.paypal.com/cert', 'paypal-transmission-id' => 'tid',
            'paypal-transmission-sig' => 'sig', 'paypal-transmission-time' => '2026-11-19T00:00:00Z',
        ];
        $raw = '{"id":"WH-1","event_type":"PAYMENT.SALE.COMPLETED","resource":{"amount":{"total":"49.990"}}}';

        $this->assertTrue($client->verifyWebhook($headers, $raw));
        $this->assertStringEndsWith('/v1/notifications/verify-webhook-signature', $sent[0][0]);
        $this->assertStringContainsString('"webhook_event":' . $raw . '}', $sent[0][1]);
        $this->assertSame('WH-TEST', json_decode($sent[0][1], true)['webhook_id']);

        $answer = 'FAILURE';
        $this->assertFalse($client->verifyWebhook($headers, $raw));
        unset($headers['paypal-transmission-sig']);
        $answer = 'SUCCESS';
        $this->assertFalse($client->verifyWebhook($headers, $raw), 'a missing signature header is never sent to PayPal');
    }

    public function testWebhookFilterRefusesUnsignedAndUnconfiguredRequests(): void
    {
        $request = clone service('request');
        $request->setBody('{"event_type":"PAYMENT.SALE.COMPLETED"}');

        PayPalWebhookFilter::$client = new class () extends PayPalSubscriptionClient {
            public function verifyWebhook(array $headers, string $rawBody): bool
            {
                return false;
            }
        };
        $refused = (new PayPalWebhookFilter())->before($request);
        $this->assertInstanceOf(ResponseInterface::class, $refused);
        $this->assertSame(401, $refused->getStatusCode());

        PayPalWebhookFilter::$client = new class () extends PayPalSubscriptionClient {
            public function verifyWebhook(array $headers, string $rawBody): bool
            {
                return true;
            }
        };
        $this->assertNull((new PayPalWebhookFilter())->before($request));

        unset($_SERVER['PAYPAL_WEBHOOK_ID'], $_ENV['PAYPAL_WEBHOOK_ID']);
        putenv('PAYPAL_WEBHOOK_ID');
        $off = (new PayPalWebhookFilter())->before($request);
        $this->assertInstanceOf(ResponseInterface::class, $off);
        $this->assertSame(503, $off->getStatusCode());
    }

    public function testWebhookRouteIsReachedWithoutASessionAndStoppedOnlyByTheSignatureFilter(): void
    {
        PayPalWebhookFilter::$client = new class () extends PayPalSubscriptionClient {
            public function verifyWebhook(array $headers, string $rawBody): bool
            {
                return false;
            }
        };

        $response = $this->withHeaders(['Content-Type' => 'application/json', 'Accept' => 'application/json'])
            ->withBody('{"event_type":"PAYMENT.SALE.COMPLETED"}')
            ->post('API/PayPal/Webhook');

        // 401 from the global session guard would carry "Authentication required."
        $response->assertStatus(401);
        $this->assertStringContainsString('signature', (string) $response->getJSON());
    }

    public function testSwitchIsOffByDefaultAndRoutesAreGuarded(): void
    {
        $this->assertFalse((new \Config\Features())->enabled('FEATURE_MEMBERSHIP_SUBSCRIPTIONS'));

        $routes = (string) file_get_contents(APPPATH . 'Config/Routes.php');
        $this->assertMatchesRegularExpression("#post\\('Memberships/SubscribeCallback'.*'login', 'feature:membership_purchases,membership_subscriptions'#", $routes);
        $this->assertMatchesRegularExpression("#post\\('Memberships/CancelSubscription'.*'filter' => 'login'#", $routes);
        $this->assertMatchesRegularExpression("#post\\('API/PayPal/Webhook'.*'filter' => 'paypalWebhook'#", $routes);
    }

    public function testExpiryReminderSkipsAutoRenewMembersAndReadsEveryPage(): void
    {
        $db = db_connect();
        for ($i = 1; $i <= 5; $i++) {
            $db->table('bf_ms_users')->insert(['id' => 6000 + $i, 'email' => "m{$i}@example.test"]);
            $db->table('bf_ms_access')->insert([
                'user_id' => 6000 + $i, 'membership_tier' => 'tier1', 'membership_status' => 'active',
                'expires_at' => date('Y-m-d H:i:s', self::NOW + 3 * 86400 - $i * 60),
            ]);
        }
        $db->table('bf_ms_auto')->insert(['user_id' => 6003, 'plan_slug' => 'starter', 'provider' => 'paypal', 'provider_subscription_id' => 'I-AUTORENEW0001', 'status' => 'active']);
        $db->table('bf_ms_auto')->insert(['user_id' => 6004, 'plan_slug' => 'starter', 'provider' => 'paypal', 'provider_subscription_id' => 'I-CANCELLED0001', 'status' => 'cancelled']);

        $lifecycle = new MembershipLifecycleService($db, static fn (): bool => true, 'bf_ms_access', 'bf_ms_users', 'bf_ms_auto');
        $due = array_column($lifecycle->expiringIn(3, self::NOW, 2), 'user_id');
        sort($due);

        $this->assertSame([6001, 6002, 6004, 6005], $due);
    }
}
