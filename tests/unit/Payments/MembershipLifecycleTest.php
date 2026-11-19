<?php

declare(strict_types=1);

namespace Tests\Unit\Payments;

use App\Services\Payments\MembershipLifecycleService;
use App\Services\Payments\PaymentReconciliationService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * After checkout: receipt, "ends soon" reminder, current-plan lookup, and
 * the payment report's handling of membership claims.
 */
final class MembershipLifecycleTest extends CIUnitTestCase
{
    private const NOW = 1795000000;

    /** @var list<array{0:string,1:string,2:string}> */
    private array $outbox = [];

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        foreach (['bf_ml_subs', 'bf_ml_users', 'bf_payment_claims', 'bf_users_wallet_transactions'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        $db->query('CREATE TABLE bf_ml_users (id INTEGER PRIMARY KEY, email TEXT)');
        $db->query('CREATE TABLE bf_ml_subs (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, membership_tier TEXT, membership_status TEXT, expires_at TEXT)');
        $db->resetDataCache();
        $this->outbox = [];
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        foreach (['bf_ml_subs', 'bf_ml_users', 'bf_payment_claims', 'bf_users_wallet_transactions'] as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        $db->resetDataCache();
        parent::tearDown();
    }

    private function service(bool $mailOk = true): MembershipLifecycleService
    {
        return new MembershipLifecycleService(db_connect(), function (string $to, string $subject, string $html) use ($mailOk): bool {
            $this->outbox[] = [$to, $subject, $html];
            if (! $mailOk) {
                throw new \RuntimeException('smtp down');
            }

            return true;
        }, 'bf_ml_subs', 'bf_ml_users');
    }

    private function member(int $id, string $tier, string $status, int $endsInSeconds, string $email = ''): void
    {
        db_connect()->table('bf_ml_users')->insert(['id' => $id, 'email' => $email !== '' ? $email : "m{$id}@example.test"]);
        db_connect()->table('bf_ml_subs')->insert([
            'user_id' => $id, 'membership_tier' => $tier, 'membership_status' => $status,
            'expires_at' => date('Y-m-d H:i:s', self::NOW + $endsInSeconds),
        ]);
    }

    public function testCurrentPlanOnlyForLiveMembership(): void
    {
        $this->member(1, 'tier2', 'active', 10 * 86400);
        $this->member(2, 'tier2', 'active', -60);
        $this->member(3, 'tier3', 'canceled', 10 * 86400);

        $plan = $this->service()->current(1, self::NOW);
        $this->assertSame('Pro', $plan['label']);
        $this->assertSame(10, $plan['days_left']);
        $this->assertNull($this->service()->current(2, self::NOW), 'expired');
        $this->assertNull($this->service()->current(3, self::NOW), 'canceled');
        $this->assertNull($this->service()->current(99, self::NOW), 'no row');
        $this->assertNull($this->service()->current(0, self::NOW), 'guest');
    }

    public function testReminderWindowHitsEachMembershipOnce(): void
    {
        $this->member(1, 'tier1', 'active', 3 * 86400 - 3600);   // inside the 3-day window
        $this->member(2, 'tier1', 'active', 2 * 86400 - 3600);   // yesterday's window
        $this->member(3, 'tier1', 'active', 4 * 86400);          // tomorrow's window
        $this->member(4, 'tier1', 'expired', 3 * 86400 - 3600);  // not active
        $this->member(5, 'tier1', 'active', 3 * 86400 - 7200, 'not-an-email');

        $due = $this->service()->expiringIn(3, self::NOW);
        $this->assertSame([1], array_column($due, 'user_id'));
    }

    public function testDryRunSendsNothingAndSendDeliversRenewLink(): void
    {
        $this->member(1, 'tier3', 'active', 3 * 86400 - 3600);

        $dry = $this->service()->sendExpiryReminders(3, false, self::NOW);
        $this->assertSame(['due' => 1, 'sent' => 0, 'failed' => 0], $dry);
        $this->assertSame([], $this->outbox);

        $real = $this->service()->sendExpiryReminders(3, true, self::NOW);
        $this->assertSame(['due' => 1, 'sent' => 1, 'failed' => 0], $real);
        $this->assertSame('m1@example.test', $this->outbox[0][0]);
        $this->assertStringContainsString('Premium', $this->outbox[0][2]);
        $this->assertStringContainsString('Memberships', $this->outbox[0][2]);
        $this->assertStringContainsString('does not renew by itself', $this->outbox[0][2]);
    }

    public function testReceiptHasPlanAmountAndOrderAndMailFailureIsContained(): void
    {
        $this->member(1, 'tier2', 'active', 30 * 86400);
        $this->assertTrue($this->service()->sendReceipt(1, 'Pro', 49.99, '2026-12-19 00:00:00', '5O190127TN364715T'));
        $html = $this->outbox[0][2];
        $this->assertStringContainsString('$49.99 USD', $html);
        $this->assertStringContainsString('5O190127TN364715T', $html);
        $this->assertStringContainsString('December 19, 2026', $html);

        $this->assertFalse($this->service(false)->sendReceipt(1, 'Pro', 49.99, '2026-12-19 00:00:00', 'X'), 'a mail error returns false, never throws');
        $this->assertFalse($this->service()->sendReceipt(404, 'Pro', 49.99, '2026-12-19 00:00:00', 'X'), 'unknown user');
    }

    public function testPaymentReportTreatsMembershipsCorrectly(): void
    {
        $db = db_connect();
        $db->query('CREATE TABLE bf_payment_claims (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, kind TEXT, provider TEXT, provider_txn_id TEXT, claimed_amount REAL, verified_amount REAL, currency TEXT, status TEXT, detail TEXT, created_at TEXT, updated_at TEXT)');
        $db->resetDataCache();
        $base = ['user_id' => 1, 'kind' => 'membership', 'provider' => 'paypal', 'currency' => 'USD'];
        $db->table('bf_payment_claims')->insert($base + ['provider_txn_id' => 'AAAAAAAA1', 'claimed_amount' => 9.99, 'verified_amount' => 9.99, 'status' => 'fulfilled']);
        $db->table('bf_payment_claims')->insert($base + ['provider_txn_id' => 'AAAAAAAA2', 'claimed_amount' => 0.01, 'verified_amount' => 0.01, 'status' => 'review_amount_mismatch']);

        $report = (new PaymentReconciliationService())->reconcile();

        $this->assertSame(1, $report['reconciled_count'], 'a fulfilled membership needs no wallet ledger row');
        $this->assertSame(1, $report['unfulfilled_count'], 'a held payment must be surfaced for a person');
        $this->assertSame('review_amount_mismatch', $report['unfulfilled_claims'][0]['status']);
    }

    public function testCommandIsRegisteredAndDryRunByDefault(): void
    {
        $this->assertContains(\App\Commands\Memberships\ExpiryReminders::class, config('Console')->commands ?? (new \ReflectionClass(config('Console')))->getDefaultProperties()['commands'] ?? []);
        $src = (string) file_get_contents(APPPATH . 'Commands/Memberships/ExpiryReminders.php');
        $this->assertStringContainsString("CLI::getOption('send') !== null", $src);
    }
}
