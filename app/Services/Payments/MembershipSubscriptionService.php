<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;

/**
 * Auto-renewing memberships through PayPal Subscriptions.
 *
 * A member approves a monthly PayPal subscription on the plan page. Access is
 * only ever given for money PayPal confirms: either the first payment shown on
 * the subscription when the member returns, or a PAYMENT.SALE.COMPLETED
 * webhook for each later month. Every payment covers the plan's days plus
 * GRACE_DAYS from the payment time, so access is "paid until", not a counter.
 * That makes a repeated webhook harmless.
 *
 * Cancelling stops future payments; the member keeps what they paid for.
 */
final class MembershipSubscriptionService
{
    /** Covers 31-day months and a late PayPal charge. */
    public const GRACE_DAYS = 2;

    private BaseConnection $db;
    private PayPalSubscriptionClient $client;
    private MembershipFulfillmentService $fulfilment;

    public function __construct(
        ?BaseConnection $db = null,
        ?PayPalSubscriptionClient $client = null,
        ?MembershipFulfillmentService $fulfilment = null,
        private readonly string $table = 'bf_membership_subscriptions',
        private readonly string $claimsTable = 'bf_payment_claims',
    ) {
        $this->db = $db ?? db_connect();
        $this->client = $client ?? new PayPalSubscriptionClient();
        $this->fulfilment = $fulfilment ?? new MembershipFulfillmentService($this->db);
    }

    public static function customId(int $userId, string $planSlug): string
    {
        return 'mymi:' . $userId . ':' . strtolower($planSlug);
    }

    /**
     * Called when the member comes back from approving the subscription.
     *
     * @return array{ok: bool, reason: string, expires_at?: string}
     */
    public function start(int $userId, string $planSlug, string $subscriptionId, ?int $now = null): array
    {
        $now ??= time();
        $subscriptionId = strtoupper(trim($subscriptionId));
        $plan = config('MembershipPlans')->find($planSlug);
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        if ($plan === null) {
            return ['ok' => false, 'reason' => 'unknown_plan'];
        }
        $expectedPlanId = PayPalSubscriptionClient::planId($plan['slug']);
        if ($expectedPlanId === '' || ! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'reason' => 'not_configured'];
        }

        $remote = $this->client->getSubscription($subscriptionId);
        if (! $remote['ok']) {
            return ['ok' => false, 'reason' => $remote['reason']];
        }
        // The subscription must be for this plan and must have been created for this member.
        if (($remote['plan_id'] ?? '') !== $expectedPlanId) {
            return ['ok' => false, 'reason' => 'wrong_plan'];
        }
        if (($remote['custom_id'] ?? '') !== self::customId($userId, $plan['slug'])) {
            return ['ok' => false, 'reason' => 'wrong_member'];
        }
        if (! in_array($remote['status'] ?? '', ['ACTIVE', 'APPROVED', 'APPROVAL_PENDING'], true)) {
            return ['ok' => false, 'reason' => 'not_active'];
        }

        $stamp = date('Y-m-d H:i:s', $now);
        $existing = $this->db->table($this->table)->where('provider_subscription_id', $subscriptionId)->limit(1)->get()->getRowArray();
        if (is_array($existing)) {
            if ((int) $existing['user_id'] !== $userId) {
                return ['ok' => false, 'reason' => 'wrong_member'];
            }
        } else {
            $this->db->table($this->table)->insert([
                'user_id'                  => $userId,
                'plan_slug'                => $plan['slug'],
                'provider'                 => 'paypal',
                'provider_subscription_id' => $subscriptionId,
                'status'                   => 'active',
                'created_at'               => $stamp,
                'updated_at'               => $stamp,
            ]);
        }

        $paidAt = strtotime((string) ($remote['last_payment_time'] ?? ''));
        $paid = ($remote['status'] ?? '') === 'ACTIVE'
            && $paidAt !== false
            && strtoupper((string) ($remote['last_payment_currency'] ?? '')) === 'USD'
            && round((float) ($remote['last_payment_amount'] ?? 0), 2) >= $plan['price'];
        if (! $paid) {
            // No confirmed payment yet: the PAYMENT.SALE.COMPLETED webhook gives access when it lands.
            return ['ok' => false, 'reason' => 'payment_pending'];
        }

        $grant = $this->fulfilment->grantUntil($userId, $plan['slug'], $this->paidUntil($paidAt, $plan['days']), $now);
        if (! $grant['ok']) {
            return ['ok' => false, 'reason' => $grant['reason']];
        }
        $this->db->table($this->table)->where('provider_subscription_id', $subscriptionId)
            ->update(['last_paid_at' => date('Y-m-d H:i:s', $paidAt), 'updated_at' => $stamp]);

        return ['ok' => true, 'reason' => 'active', 'expires_at' => (string) $grant['expires_at']];
    }

    /**
     * Handles one PayPal webhook event whose signature was already verified.
     *
     * @param array<string,mixed> $event
     *
     * @return array{ok: bool, reason: string, user_id?: int, expires_at?: string, amount?: float, plan?: string, sale_id?: string}
     */
    public function handleEvent(array $event, ?int $now = null): array
    {
        $now ??= time();
        $type = (string) ($event['event_type'] ?? '');
        $resource = is_array($event['resource'] ?? null) ? $event['resource'] : [];
        if (! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'reason' => 'not_configured'];
        }

        if ($type === 'PAYMENT.SALE.COMPLETED') {
            return $this->recordPayment($resource, $now);
        }
        if ($type === 'BILLING.SUBSCRIPTION.ACTIVATED' || $type === 'BILLING.SUBSCRIPTION.RE-ACTIVATED') {
            // Registers the subscription even if the member's browser never came back to us.
            $subscriptionId = strtoupper(trim((string) ($resource['id'] ?? '')));
            $known = $this->find($subscriptionId, $now);
            if ($known !== null && ($known['status'] ?? '') === 'suspended') {
                // PayPal resumed billing after a suspension. A cancelled subscription never comes back.
                $this->db->table($this->table)->where('id', $known['id'])->where('status', 'suspended')
                    ->update(['status' => 'active', 'updated_at' => date('Y-m-d H:i:s', $now)]);
            }

            return ['ok' => true, 'reason' => $known === null ? 'unknown_subscription' : 'registered'];
        }

        $ends = [
            'BILLING.SUBSCRIPTION.CANCELLED' => 'cancelled',
            'BILLING.SUBSCRIPTION.SUSPENDED' => 'suspended',
            'BILLING.SUBSCRIPTION.EXPIRED'   => 'expired',
        ];
        if (isset($ends[$type])) {
            $subscriptionId = strtoupper(trim((string) ($resource['id'] ?? '')));
            $this->db->table($this->table)->where('provider_subscription_id', $subscriptionId)
                ->update(['status' => $ends[$type], 'updated_at' => date('Y-m-d H:i:s', $now)]);

            return ['ok' => true, 'reason' => $this->db->affectedRows() > 0 ? $ends[$type] : 'unknown_subscription'];
        }

        return ['ok' => true, 'reason' => 'ignored'];
    }

    /**
     * Stops future payments for every live subscription the member has.
     *
     * @return array{ok: bool, cancelled: int, failed: int}
     */
    public function cancel(int $userId, ?int $now = null): array
    {
        $now ??= time();
        $cancelled = $failed = 0;
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'cancelled' => 0, 'failed' => 0];
        }
        $rows = $this->db->table($this->table)->where('user_id', $userId)->where('status', 'active')->limit(20)->get()->getResultArray();
        foreach ($rows as $row) {
            if ($this->client->cancel((string) $row['provider_subscription_id'])) {
                $this->db->table($this->table)->where('id', $row['id'])->where('user_id', $userId)
                    ->update(['status' => 'cancelled', 'updated_at' => date('Y-m-d H:i:s', $now)]);
                $cancelled++;
            } else {
                $failed++;
            }
        }

        return ['ok' => $failed === 0 && $cancelled > 0, 'cancelled' => $cancelled, 'failed' => $failed];
    }

    /** @return array{plan_slug:string, provider_subscription_id:string}|null */
    public function activeFor(int $userId): ?array
    {
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return null;
        }
        $row = $this->db->table($this->table)->select('plan_slug, provider_subscription_id')
            ->where('user_id', $userId)->where('status', 'active')->orderBy('id', 'DESC')->limit(1)->get()->getRowArray();

        return is_array($row) ? ['plan_slug' => (string) $row['plan_slug'], 'provider_subscription_id' => (string) $row['provider_subscription_id']] : null;
    }

    /**
     * @param array<string,mixed> $sale
     *
     * @return array{ok: bool, reason: string, user_id?: int, expires_at?: string, amount?: float, plan?: string, sale_id?: string}
     */
    private function recordPayment(array $sale, int $now): array
    {
        $subscriptionId = strtoupper(trim((string) ($sale['billing_agreement_id'] ?? '')));
        $saleId = strtoupper(trim((string) ($sale['id'] ?? '')));
        if ($subscriptionId === '' || ! preg_match('/^[A-Z0-9]{8,32}$/', $saleId)) {
            // A one-time order or a payment that is not ours.
            return ['ok' => true, 'reason' => 'ignored'];
        }
        $row = $this->find($subscriptionId, $now);
        if ($row === null) {
            return ['ok' => true, 'reason' => 'unknown_subscription'];
        }
        $userId = (int) $row['user_id'];
        $plan = config('MembershipPlans')->find((string) $row['plan_slug']);
        if ($plan === null) {
            return ['ok' => false, 'reason' => 'unknown_plan'];
        }

        $claims = $this->db->tableExists($this->claimsTable);
        if ($claims) {
            $seen = $this->db->table($this->claimsTable)->select('id')
                ->where('provider', 'paypal')->where('provider_txn_id', $saleId)->limit(1)->get()->getRowArray();
            if (is_array($seen)) {
                return ['ok' => true, 'reason' => 'duplicate', 'user_id' => $userId];
            }
        }

        $amount = round((float) ($sale['amount']['total'] ?? $sale['amount']['value'] ?? 0), 2);
        $currency = strtoupper((string) ($sale['amount']['currency'] ?? $sale['amount']['currency_code'] ?? ''));
        $stamp = date('Y-m-d H:i:s', $now);
        $problem = $currency !== 'USD' ? 'wrong_currency' : ($amount < $plan['price'] ? 'amount_mismatch' : '');

        $claim = [
            'user_id'         => $userId,
            'kind'            => 'membership',
            'provider'        => 'paypal',
            'provider_txn_id' => $saleId,
            'claimed_amount'  => $amount,
            'verified_amount' => $amount,
            'currency'        => $currency !== '' ? $currency : 'USD',
            'detail'          => json_encode(['plan' => $plan['slug'], 'subscription' => $subscriptionId], JSON_UNESCAPED_SLASHES),
            'created_at'      => $stamp,
            'updated_at'      => $stamp,
        ];

        if ($problem !== '') {
            // Real money that does not match the plan: no access, a person reviews it.
            if ($claims) {
                $this->db->table($this->claimsTable)->insert($claim + ['status' => 'review_' . $problem]);
            }
            log_message('warning', 'Subscription payment {sale} held for review: {reason}', ['sale' => $saleId, 'reason' => $problem]);

            return ['ok' => false, 'reason' => $problem, 'user_id' => $userId];
        }

        $paidAt = strtotime((string) ($sale['create_time'] ?? ''));
        if ($paidAt === false || $paidAt > $now + 86400) {
            $paidAt = $now;
        }
        $grant = $this->fulfilment->grantUntil($userId, $plan['slug'], $this->paidUntil($paidAt, $plan['days']), $now);
        if (! $grant['ok']) {
            // Not recorded as seen, so PayPal's retry can try again.
            return ['ok' => false, 'reason' => $grant['reason'], 'user_id' => $userId];
        }
        if ($claims) {
            $this->db->table($this->claimsTable)->insert($claim + ['status' => 'fulfilled']);
        }
        $this->db->table($this->table)->where('id', $row['id'])
            // Billing state is left alone: a late payment must not re-open a cancelled subscription.
            ->update(['last_paid_at' => date('Y-m-d H:i:s', $paidAt), 'updated_at' => $stamp]);

        return [
            'ok'         => true,
            'reason'     => 'renewed',
            'user_id'    => $userId,
            'expires_at' => (string) $grant['expires_at'],
            'amount'     => $amount,
            'plan'       => $plan['label'],
            'sale_id'    => $saleId,
        ];
    }

    /**
     * The row for a subscription. If the browser callback never reached us
     * (tab closed, PayPal lookup failed) there is no row yet, so it is rebuilt
     * from PayPal: the subscription must carry one of our member ids and be on
     * the PayPal plan configured for that membership plan.
     *
     * @return array<string,mixed>|null
     */
    private function find(string $subscriptionId, int $now): ?array
    {
        if ($subscriptionId === '') {
            return null;
        }
        $row = $this->db->table($this->table)->where('provider_subscription_id', $subscriptionId)->limit(1)->get()->getRowArray();
        if (is_array($row)) {
            return $row;
        }

        $remote = $this->client->getSubscription($subscriptionId);
        if (! $remote['ok'] || ! preg_match('/^mymi:(\d{1,10}):([a-z0-9]{1,32})$/', (string) ($remote['custom_id'] ?? ''), $m)) {
            return null;
        }
        $plan = config('MembershipPlans')->find($m[2]);
        $expectedPlanId = $plan === null ? '' : PayPalSubscriptionClient::planId($plan['slug']);
        if ((int) $m[1] <= 0 || $expectedPlanId === '' || ($remote['plan_id'] ?? '') !== $expectedPlanId) {
            return null;
        }

        $stamp = date('Y-m-d H:i:s', $now);
        $this->db->table($this->table)->insert([
            'user_id'                  => (int) $m[1],
            'plan_slug'                => $plan['slug'],
            'provider'                 => 'paypal',
            'provider_subscription_id' => $subscriptionId,
            'status'                   => 'active',
            'created_at'               => $stamp,
            'updated_at'               => $stamp,
        ]);
        log_message('notice', 'Membership subscription {sub} registered from PayPal for user {user}', ['sub' => $subscriptionId, 'user' => (int) $m[1]]);

        return $this->db->table($this->table)->where('provider_subscription_id', $subscriptionId)->limit(1)->get()->getRowArray();
    }

    private function paidUntil(int $paidAt, int $days): int
    {
        return $paidAt + ($days + self::GRACE_DAYS) * 86400;
    }
}
