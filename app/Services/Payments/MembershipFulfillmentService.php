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

    public function __construct(?BaseConnection $db = null, private readonly string $claimsTable = 'bf_payment_claims', private readonly string $table = self::TABLE)
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

        $builder = $this->db->table($this->table)->where('user_id', $userId);
        if (in_array('active', $fields, true)) {
            $builder->orderBy('active', 'DESC');
        }
        if (in_array('updated_on', $fields, true)) {
            $builder->orderBy('updated_on', 'DESC');
        }
        $current = $builder->limit(1)->get()->getRowArray();

        // Renewing the same tier while it is still active adds time; any other purchase starts now.
        $start = $now;
        if (is_array($current) && ($current['membership_status'] ?? '') === 'active' && (string) ($current['membership_tier'] ?? '') === $plan['tier']) {
            $currentEnd = strtotime((string) ($current['expires_at'] ?? ''));
            if ($currentEnd !== false && $currentEnd > $now) {
                $start = $currentEnd;
            }
        }
        $expires = date('Y-m-d H:i:s', $start + $plan['days'] * 86400);

        $row = ['membership_tier' => $plan['tier'], 'membership_status' => 'active', 'expires_at' => $expires];
        $optional = [
            'active'            => 1,
            'tier'              => $plan['label'],
            'status'            => 'active',
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
            $this->db->table($this->table)->insert($row + ['user_id' => $userId]);
        }

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
