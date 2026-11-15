<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: records what the browser says it paid (bf_payment_claims)
 * and the server-side PayPal verification result.
 *
 * A PayPal order id can be claimed once. Only a claim whose status is
 * "verified" may be fulfilled, and fulfilment uses PayPal's amount, never the
 * amount the browser sent.
 */
final class PaymentClaimService
{
    private BaseConnection $db;

    public function __construct(private readonly PayPalOrderVerifier $verifier = new PayPalOrderVerifier(), ?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * @return array{ok: bool, reason: string, claim_id?: int, amount?: float, currency?: string}
     */
    public function claim(int $userId, string $kind, string $orderId, ?float $claimedAmount, array $detail = []): array
    {
        $orderId = strtoupper(trim($orderId));
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        if (! $this->db->tableExists('bf_payment_claims')) {
            return ['ok' => false, 'reason' => 'table_missing'];
        }
        if (! preg_match('/^[A-Z0-9]{8,32}$/', $orderId)) {
            return ['ok' => false, 'reason' => 'invalid_order_id'];
        }

        $existing = $this->db->table('bf_payment_claims')->select('id')
            ->where('provider', 'paypal')->where('provider_txn_id', $orderId)->limit(1)->get()->getRowArray();
        if (is_array($existing)) {
            return ['ok' => false, 'reason' => 'duplicate', 'claim_id' => (int) $existing['id']];
        }

        $result = $this->verifier->verify($orderId);
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_payment_claims')->insert([
            'user_id'         => $userId,
            'kind'            => mb_substr($kind, 0, 32),
            'provider'        => 'paypal',
            'provider_txn_id' => $orderId,
            'claimed_amount'  => $claimedAmount,
            'verified_amount' => $result['ok'] ? $result['amount'] : null,
            'currency'        => $result['currency'] ?? 'USD',
            'status'          => $result['ok'] ? 'verified' : 'unverified_' . $result['reason'],
            'detail'          => json_encode($detail + ['paypal_status' => $result['status'] ?? null], JSON_UNESCAPED_SLASHES),
            'created_at'      => $now,
            'updated_at'      => $now,
        ]);
        $claimId = (int) $this->db->insertID();

        if (! $result['ok']) {
            return ['ok' => false, 'reason' => $result['reason'], 'claim_id' => $claimId];
        }

        return ['ok' => true, 'reason' => 'verified', 'claim_id' => $claimId, 'amount' => (float) $result['amount'], 'currency' => (string) $result['currency']];
    }

    public function markFulfilled(int $claimId): void
    {
        $this->db->table('bf_payment_claims')->where('id', $claimId)->update(['status' => 'fulfilled', 'updated_at' => date('Y-m-d H:i:s')]);
    }
}
