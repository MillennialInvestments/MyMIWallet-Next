<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use App\Libraries\MyMIProjects;
use App\Models\AuctionPaymentModel;
use App\Models\WalletModel;
use App\Services\Payments\MembershipFulfillmentService;

/**
 * What each verified Solana Pay checkout delivers. Each runs once per checkout
 * (SolanaPayService only calls it after winning the pending -> confirmed step)
 * against a verified bf_payment_claims row whose amount came from the chain.
 */
final class Fulfillers
{
    /** @return array<string, callable(int, int, array): array{ok: bool, reason: string, message?: string}> */
    public static function defaults(): array
    {
        return [
            'mymigold'      => [self::class, 'mymigold'],
            'membership'    => [self::class, 'membership'],
            'auction_topup' => [self::class, 'auctionTopUp'],
            'fund_units'    => [self::class, 'fundUnits'],
        ];
    }

    /** USD price of one MyMI Gold, as the PayPal path uses it. */
    public static function goldValue(): float
    {
        return (float) (config('SiteSettings')->MyMIGCoinValue ?? 1) ?: 1.0;
    }

    /** Same Gold math as the PayPal callback: paid minus MyMI's purchase fee, at the Gold value. */
    public static function mymigold(int $userId, int $claimId, array $row): array
    {
        $settings = config('SiteSettings');
        $paid = ((int) $row['usd_cents']) / 100;
        $fees = round($paid * (float) ($settings->transPercent ?? 0) + (float) ($settings->transFee ?? 0), 2);
        $coins = round(max(0, $paid - $fees) / self::goldValue(), 8);

        (new WalletModel())->submitMyMIGold([
            'transaction_id' => 'SOLPAY-' . substr((string) $row['reference'], 0, 16),
            'total_cost'     => $paid,
            'user_id'        => $userId,
            'wallet_id'      => preg_replace('/[^A-Za-z0-9_\-]/', '', (string) $row['purpose_ref']),
            'status'         => 'completed',
            'active'         => 1,
            'unix_timestamp' => time(),
            'submitted_date' => date('Y-m-d H:i:s'),
            'trans_type'     => 'MyMI Gold Purchase (Solana USDC)',
            'currency'       => 'USD',
            'amount'         => $coins,
            'fees'           => $fees,
            'type'           => 'Purchase',
        ]);

        return ['ok' => true, 'reason' => 'fulfilled', 'message' => 'Payment confirmed. ' . $coins . ' MyMI Gold added.'];
    }

    public static function membership(int $userId, int $claimId, array $row): array
    {
        $r = (new MembershipFulfillmentService())->fulfil($userId, $claimId, (string) $row['purpose_ref']);

        return $r['ok']
            ? ['ok' => true, 'reason' => 'fulfilled', 'message' => 'Thanks! Your membership is active.']
            : ['ok' => false, 'reason' => (string) ($r['reason'] ?? 'not_activated')];
    }

    /** Auction balance is kept in MyMI Gold cents. */
    public static function auctionTopUp(int $userId, int $claimId, array $row): array
    {
        $goldCents = (int) floor(((int) $row['usd_cents']) / self::goldValue());
        $r = model(AuctionPaymentModel::class)->processTopUp([
            'user_id'      => $userId,
            'amount_cents' => $goldCents,
            'method'       => 'SOLANA_USDC',
            'lot_id'       => ctype_digit((string) $row['purpose_ref']) ? (int) $row['purpose_ref'] : null,
            'rate_used'    => self::goldValue(),
            'tx_ref'       => (string) $row['signature'] ?: (string) $row['reference'],
        ]);

        return ($r['status'] ?? 'error') === 'success'
            ? ['ok' => true, 'reason' => 'fulfilled', 'message' => 'Auction balance topped up.']
            : ['ok' => false, 'reason' => (string) ($r['message'] ?? 'topup_failed')];
    }

    public static function fundUnits(int $userId, int $claimId, array $row): array
    {
        $r = (new MyMIProjects())->issueUnitsAtNav((int) $row['purpose_ref'], $userId, ((int) $row['usd_cents']) / 100, 'solanapay:' . $row['reference']);

        return ['ok' => true, 'reason' => 'fulfilled', 'message' => 'Fund units issued: ' . ($r['units_issued'] ?? 0) . '.'];
    }
}
