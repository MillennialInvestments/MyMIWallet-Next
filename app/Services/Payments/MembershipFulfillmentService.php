<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;

/**
 * Turns a PayPal-verified membership payment into access.
 *
 * Input is a bf_payment_claims row that PaymentClaimService already verified
 * with PayPal. The plan price comes from Config\MembershipPlans and is compared
 * with PayPal's amount; the browser's figures are never used. A claim can be
 * fulfilled once. Access is written to bf_users_subscriptions, which is what
 * PremiumEntitlementService reads.
 */
final class MembershipFulfillmentService
{
    private const TABLE = 'bf_users_subscriptions';

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null, private readonly string $claimsTable = 'bf_payment_claims', private readonly string $table = self::TABLE, private readonly string $usersTable = 'bf_users')
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * @return array{ok: bool, reason: string, tier?: string, expires_at?: string}
     */
    public function fulfil(int $userId, int $claimId, string $planSlug, ?int $now = null): array
    {
        $now ??= time();
        $plan = config('MembershipPlans')->find($planSlug);
        if ($plan === null) {
            return ['ok' => false, 'reason' => 'unknown_plan'];
        }
        if (! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'reason' => 'schema_missing'];
        }
        $fields = $this->db->getFieldNames($this->table);
        foreach (['user_id', 'membership_tier', 'membership_status', 'expires_at'] as $required) {
            if (! in_array($required, $fields, true)) {
                return ['ok' => false, 'reason' => 'schema_missing'];
            }
        }

        $claim = $this->db->table($this->claimsTable)->where('id', $claimId)->where('user_id', $userId)->limit(1)->get()->getRowArray();
        if (! is_array($claim) || ($claim['kind'] ?? '') !== 'membership') {
            return ['ok' => false, 'reason' => 'claim_not_found'];
        }
        if (($claim['status'] ?? '') === 'fulfilled') {
            return ['ok' => false, 'reason' => 'already_fulfilled'];
        }
        if (($claim['status'] ?? '') !== 'verified') {
            return ['ok' => false, 'reason' => 'not_verified'];
        }
        if (strtoupper((string) ($claim['currency'] ?? '')) !== 'USD') {
            return $this->hold($claimId, 'wrong_currency');
        }
        if (round((float) ($claim['verified_amount'] ?? 0), 2) < $plan['price']) {
            return $this->hold($claimId, 'amount_mismatch');
        }

        $stamp = date('Y-m-d H:i:s', $now);
        $this->db->transStart();

        // Single-use: only the request that flips verified -> fulfilled may grant access.
        $this->db->table($this->claimsTable)->where('id', $claimId)->where('status', 'verified')
            ->update(['status' => 'fulfilled', 'updated_at' => $stamp]);
        if ($this->db->affectedRows() !== 1) {
            $this->db->transComplete();

            return ['ok' => false, 'reason' => 'already_fulfilled'];
        }

        $expires = $this->writeAccess($userId, $plan, $fields, $now, null);

        $this->db->transComplete();
        if ($this->db->transStatus() === false) {
            log_message('error', 'Membership fulfilment failed for claim {claim}; payment is verified and needs manual activation', ['claim' => $claimId]);

            return ['ok' => false, 'reason' => 'schema_error'];
        }

        log_message('info', 'Membership {tier} active for user {user} until {expires} (claim {claim})', [
            'tier' => $plan['tier'], 'user' => $userId, 'expires' => $expires, 'claim' => $claimId,
        ]);

        return ['ok' => true, 'reason' => 'fulfilled', 'tier' => $plan['tier'], 'expires_at' => $expires];
    }

    /**
     * Gives the member this plan until at least $until. Used for auto-renewing
     * subscriptions, where each PayPal payment covers a period that starts at
     * the payment time. Calling it twice with the same $until changes nothing,
     * so a repeated webhook cannot add extra time.
     *
     * @return array{ok: bool, reason: string, tier?: string, expires_at?: string}
     */
    public function grantUntil(int $userId, string $planSlug, int $until, ?int $now = null): array
    {
        $now ??= time();
        $plan = config('MembershipPlans')->find($planSlug);
        if ($plan === null) {
            return ['ok' => false, 'reason' => 'unknown_plan'];
        }
        if ($userId <= 0 || ! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'reason' => 'schema_missing'];
        }
        $fields = $this->db->getFieldNames($this->table);
        foreach (['user_id', 'membership_tier', 'membership_status', 'expires_at'] as $required) {
            if (! in_array($required, $fields, true)) {
                return ['ok' => false, 'reason' => 'schema_missing'];
            }
        }

        $this->db->transStart();
        $expires = $this->writeAccess($userId, $plan, $fields, $now, $until);
        $this->db->transComplete();
        if ($this->db->transStatus() === false) {
            log_message('error', 'Membership renewal write failed for user {user}', ['user' => $userId]);

            return ['ok' => false, 'reason' => 'schema_error'];
        }

        return ['ok' => true, 'reason' => 'fulfilled', 'tier' => $plan['tier'], 'expires_at' => $expires];
    }

    /**
     * Writes the access row. With $until null a purchase adds $plan['days']
     * (stacking on a live plan of the same tier); otherwise access runs to
     * $until, never shortening a live plan of the same tier.
     *
     * @param array{slug:string,label:string,tier:string,price:float,days:int} $plan
     * @param list<string>                                                      $fields
     */
    private function writeAccess(int $userId, array $plan, array $fields, int $now, ?int $until): string
    {
        $stamp = date('Y-m-d H:i:s', $now);
        $builder = $this->db->table($this->table)->where('user_id', $userId);
        if (in_array('active', $fields, true)) {
            $builder->orderBy('active', 'DESC');
        }
        if (in_array('updated_on', $fields, true)) {
            $builder->orderBy('updated_on', 'DESC');
        }
        $current = $builder->limit(1)->get()->getRowArray();

        $liveEnd = null;
        if (is_array($current) && ($current['membership_status'] ?? '') === 'active' && (string) ($current['membership_tier'] ?? '') === $plan['tier']) {
            $currentEnd = strtotime((string) ($current['expires_at'] ?? ''));
            if ($currentEnd !== false && $currentEnd > $now) {
                $liveEnd = $currentEnd;
            }
        }
        if ($until === null) {
            // Renewing the same tier while it is still active adds time; any other purchase starts now.
            $expires = date('Y-m-d H:i:s', ($liveEnd ?? $now) + $plan['days'] * 86400);
        } else {
            $expires = date('Y-m-d H:i:s', max($until, $liveEnd ?? 0));
        }

        $row = ['membership_tier' => $plan['tier'], 'membership_status' => 'active', 'expires_at' => $expires];
        $optional = [
            'active'            => 1,
            // Legacy enum('Free','Tier 1','Tier 2','Tier 3'); plan names are not valid values.
            'tier'              => ['tier1' => 'Tier 1', 'tier2' => 'Tier 2', 'tier3' => 'Tier 3'][$plan['tier']] ?? 'Free',
            'subscription_name' => $plan['label'] . ' Membership',
            'source_channel'    => 'paypal',
            'updated_on'        => $stamp,
        ];
        foreach ($optional as $column => $value) {
            if (in_array($column, $fields, true)) {
                $row[$column] = $value;
            }
        }

        if (is_array($current) && isset($current['id'])) {
            $this->db->table($this->table)->where('id', $current['id'])->where('user_id', $userId)->update($row);
        } else {
            if (in_array('created_on', $fields, true)) {
                $row['created_on'] = $stamp;
            }
            if (in_array('email', $fields, true)) {
                // The legacy table requires an email on every row.
                $row['email'] = $this->userEmail($userId);
            }
            $this->db->table($this->table)->insert($row + ['user_id' => $userId]);
        }

        return $expires;
    }

    private function userEmail(int $userId): string
    {
        if (! $this->db->tableExists($this->usersTable) || ! $this->db->fieldExists('email', $this->usersTable)) {
            return '';
        }
        $user = $this->db->table($this->usersTable)->select('email')->where('id', $userId)->limit(1)->get()->getRowArray();

        return (string) ($user['email'] ?? '');
    }

    /**
     * The payment is real but does not match the plan: keep it out of the
     * fulfilled set and flag it for a person to review.
     *
     * @return array{ok: bool, reason: string}
     */
    private function hold(int $claimId, string $reason): array
    {
        $this->db->table($this->claimsTable)->where('id', $claimId)->where('status', 'verified')
            ->update(['status' => 'review_' . $reason, 'updated_at' => date('Y-m-d H:i:s')]);
        log_message('warning', 'Membership claim {claim} held for review: {reason}', ['claim' => $claimId, 'reason' => $reason]);

        return ['ok' => false, 'reason' => $reason];
    }
}
