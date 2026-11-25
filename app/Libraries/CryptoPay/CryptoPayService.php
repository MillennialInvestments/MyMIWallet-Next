<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

use App\Libraries\CryptoPay\Chains\ChainAdapter;
use App\Libraries\SecureTransfer\AuditLog;
use App\Libraries\SecureTransfer\Base58;
use CodeIgniter\Database\BaseConnection;
use Config\CryptoPay as CryptoPayConfig;
use Config\SolanaPay as SolanaPayConfig;

/**
 * Crypto checkout for MyMI's own products on Ethereum, Base, the XRP Ledger
 * and Bitcoin. Same products, fulfilment and payment records as Solana Pay.
 *
 * 1. checkout(): the server sets the price, adds the MyMI processing fee
 *    (same payment, own line), converts to the chain's asset and gives the
 *    checkout a unique amount or destination tag. The buyer pays from their
 *    own wallet; MyMI never sees a key.
 * 2. confirm() / reconcile(): the chain is read from the checkout's starting
 *    block or ledger; a payment of exactly this checkout, with enough
 *    confirmations, settles it once (unique payment_id).
 * 3. The order is delivered exactly once, with a verified payment record and
 *    an audit-chain entry; an interrupted delivery goes to support, never twice.
 */
final class CryptoPayService
{
    private const MAX_OPEN_PER_USER = 5;
    private const RESUME_AFTER_SECONDS = 300;
    private const TAG_TRIES = 25;
    /**
     * Seconds after expiry a payment may still settle the checkout at its quoted
     * rate. Bitcoin allows for miner clocks, which can run up to two hours off.
     */
    private const LATE_GRACE = ['xrpl' => 600, 'bitcoin' => 7200];

    public const TABLE = 'bf_crypto_pay_requests';

    /**
     * @param array<string, ChainAdapter> $chains chain => adapter
     * @param array<string, callable(int, int, array): array{ok: bool, reason: string, message?: string}> $fulfillers
     */
    public function __construct(
        private CryptoPayConfig $config,
        private array $chains,
        private BaseConnection $db,
        private array $fulfillers,
        private ?AuditLog $audit = null,
        private ?\Closure $clock = null,
    ) {
    }

    public static function available(BaseConnection $db, CryptoPayConfig $config): bool
    {
        return $config->ready() && $db->tableExists(self::TABLE) && $db->tableExists('bf_payment_claims');
    }

    public static function provider(string $chain): string
    {
        return 'crypto-' . $chain;
    }

    /** @return list<array{chain: string, asset: string}> chains a buyer can pick */
    public function offered(): array
    {
        $out = [];
        foreach ($this->chains as $id => $adapter) {
            if ($adapter->validAddress((string) ($this->config->recipients[$id] ?? ''))) {
                $out[] = ['chain' => $id, 'asset' => $adapter->asset()];
            }
        }
        return $out;
    }

    private function now(): int
    {
        return $this->clock ? (int) ($this->clock)() : time();
    }

    public function checkout(int $userId, string $chain, string $purpose, string $purposeRef, int $usdCents): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'not_signed_in'];
        }
        if (! isset(SolanaPayConfig::PURPOSES[$purpose], $this->fulfillers[$purpose])) {
            return ['ok' => false, 'error' => 'unknown_purpose'];
        }
        $adapter = $this->chains[$chain] ?? null;
        $recipient = (string) ($this->config->recipients[$chain] ?? '');
        if ($adapter === null || ! $adapter->validAddress($recipient)) {
            return ['ok' => false, 'error' => 'chain_not_available'];
        }
        if ($usdCents < $this->config->minCents || $usdCents > $this->config->maxCents) {
            return ['ok' => false, 'error' => 'amount_out_of_range', 'min_cents' => $this->config->minCents, 'max_cents' => $this->config->maxCents];
        }
        $now = $this->now();
        $open = $this->db->table(self::TABLE)->where('user_id', $userId)->where('status', 'pending')
            ->where('expires_at >=', $now)->countAllResults();
        if ($open >= self::MAX_OPEN_PER_USER) {
            return ['ok' => false, 'error' => 'too_many_open_checkouts'];
        }

        $feeCents = (int) ($this->config->feeCents[$chain] ?? 0);
        $quote = $adapter->quote($usdCents + $feeCents);
        if ($quote === null || $quote['amount'] <= 0) {
            return ['ok' => false, 'error' => 'price_unavailable'];
        }
        $cursor = $adapter->cursor();
        if ($cursor === null) {
            return ['ok' => false, 'error' => 'network_unavailable'];
        }

        $amount = (int) $quote['amount'];
        $tag = null;
        if ($adapter->matchMode() === ChainAdapter::MATCH_AMOUNT) {
            $step = max(1, $adapter->amountStep());
            $base = (int) (ceil($amount / $step) * $step);
            $amount = 0;
            for ($i = 0; $i < self::TAG_TRIES && $amount === 0; $i++) {
                $candidate = $base + random_int(1, $adapter->maxAmountTag());
                // Unique among checkouts still being matched, so one payment fits one checkout.
                $taken = $this->db->table(self::TABLE)->where('chain', $chain)->where('asset_amount', $candidate)
                    ->whereIn('status', ['pending', 'confirmed'])->where('expires_at >=', $now - 86400)->countAllResults();
                $amount = $taken === 0 ? $candidate : 0;
            }
        } else {
            for ($i = 0; $i < self::TAG_TRIES && $tag === null; $i++) {
                $candidate = random_int(1, 4294967295);
                $tag = $this->db->table(self::TABLE)->where('chain', $chain)->where('dest_tag', $candidate)->countAllResults() === 0 ? $candidate : null;
            }
        }
        if ($amount <= 0 || ($adapter->matchMode() === ChainAdapter::MATCH_TAG && $tag === null)) {
            return ['ok' => false, 'error' => 'busy_try_again'];
        }

        $reference = Base58::encode(random_bytes(16));
        $row = [
            'reference'      => $reference,
            'user_id'        => $userId,
            'chain'          => $chain,
            'network'        => $this->config->network,
            'purpose'        => $purpose,
            'purpose_ref'    => mb_substr($purposeRef, 0, 64),
            'usd_cents'      => $usdCents,
            'fee_cents'      => $feeCents,
            'asset'          => $adapter->asset(),
            'asset_contract' => method_exists($adapter, 'contract') ? $adapter->contract() : '',
            'asset_amount'   => $amount,
            'rate'           => (string) $quote['rate'],
            'dest_tag'       => $tag,
            'match_key'      => $tag === null ? $chain . ':amount:' . $amount : $chain . ':tag:' . $tag,
            'recipient'      => $recipient,
            'start_cursor'   => $cursor,
            'scan_cursor'    => 0,
            'status'         => 'pending',
            'created_at'     => $now,
            'expires_at'     => $now + $this->config->requestTtlSeconds,
            'updated_at'     => $now,
        ];
        if (! $this->insertOpen($row)) {
            return ['ok' => false, 'error' => 'busy_try_again'];
        }

        return ['ok' => true] + $this->instructions($row, $adapter);
    }

    /** Insert an open checkout; false when another one took the same amount or tag a moment earlier. */
    private function insertOpen(array $row): bool
    {
        $error = null;
        try {
            $ok = (bool) $this->db->table(self::TABLE)->insert($row);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $ok = false;
            $error = $e;
        }
        if ($ok) {
            return true;
        }
        if ($this->db->table(self::TABLE)->where('match_key', $row['match_key'])->countAllResults() > 0) {
            return false;
        }
        throw $error ?? new \RuntimeException('crypto checkout not saved');
    }

    /** What the page shows: amounts, address, tag and the wallet link. */
    public function instructions(array $row, ?ChainAdapter $adapter = null): array
    {
        $adapter ??= $this->chains[$row['chain']] ?? null;
        $decimals = $adapter?->decimals() ?? 6;
        $out = [
            'reference'  => (string) $row['reference'],
            'chain'      => (string) $row['chain'],
            'network'    => (string) $row['network'],
            'asset'      => (string) $row['asset'],
            'amount'     => self::units((int) $row['asset_amount'], $decimals),
            'amount_raw' => (string) $row['asset_amount'],
            'usd'        => self::cents((int) $row['usd_cents']),
            'fee_usd'    => self::cents((int) $row['fee_cents']),
            'total_usd'  => self::cents((int) $row['usd_cents'] + (int) $row['fee_cents']),
            'rate'       => (string) $row['rate'],
            'recipient'  => (string) $row['recipient'],
            'dest_tag'   => $row['dest_tag'] === null ? null : (int) $row['dest_tag'],
            'uri'        => $adapter?->paymentUri($row) ?? '',
            'expires_at' => (int) $row['expires_at'],
        ];
        if ($adapter !== null && method_exists($adapter, 'chainId')) {
            $out['chain_id'] = $adapter->chainId();
            $out['contract'] = (string) $row['asset_contract'];
        }
        return $out;
    }

    public function reconcile(int $limit = 100): array
    {
        $counts = [];
        $stuck = $this->db->table(self::TABLE)->select('reference')
            ->where('status', 'confirmed')->where('updated_at <', $this->now() - self::RESUME_AFTER_SECONDS)
            ->orderBy('updated_at', 'ASC')->limit(50)->get()->getResultArray();
        foreach ($stuck as $r) {
            $status = $this->safely(fn (): array => $this->resume((string) $r['reference']), (string) $r['reference']);
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        $rows = $this->db->table(self::TABLE)->select('reference, user_id')
            ->where('status', 'pending')->where('expires_at >=', $this->now() - 86400)
            ->orderBy('created_at', 'ASC')->limit(max(1, min($limit, 500)))->get()->getResultArray();
        foreach ($rows as $r) {
            $status = $this->safely(fn (): array => $this->confirm((string) $r['reference'], (int) $r['user_id']), (string) $r['reference']);
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        return $counts;
    }

    private function safely(callable $fn, string $reference): string
    {
        try {
            return (string) $fn()['status'];
        } catch (\Throwable $e) {
            log_message('warning', 'Crypto checkout {ref}: {m}', ['ref' => $reference, 'm' => $e->getMessage()]);
            return 'error';
        }
    }

    public function confirm(string $reference, int $userId): array
    {
        $row = $this->find($reference);
        if ($row === null || (int) $row['user_id'] !== $userId) {
            return ['ok' => false, 'status' => 'not_found', 'error' => 'checkout_not_found'];
        }
        if ($row['status'] !== 'pending') {
            return $this->state($row);
        }
        $adapter = $this->chains[$row['chain']] ?? null;
        if ($adapter === null) {
            return ['ok' => true, 'status' => 'pending', 'message' => 'Waiting for the payment.'];
        }

        [$payments, $complete, $scannedTo] = $adapter->payments($row);
        $required = (int) ($this->config->confirmations[$row['chain']] ?? 1);
        $waiting = null;
        foreach ($payments as $p) {
            if ($p['confirmations'] < $required) {
                $waiting = max($waiting ?? 0, $p['confirmations']);
                continue;
            }
            $accepted = $this->isLate($row, $p) ? $this->late($row, $p) : $this->accept($row, $p);
            if ($accepted !== null) {
                return $accepted;
            }
        }
        // Saved only after every payment found was handled: a failure above
        // throws first, so those blocks or ledgers are read again next time.
        if ($scannedTo !== null && $scannedTo > (int) $row['scan_cursor']) {
            $this->db->table(self::TABLE)->where('reference', $reference)->where('status', 'pending')
                ->update(['scan_cursor' => $scannedTo]);
        }
        if ($waiting !== null) {
            return ['ok' => true, 'status' => 'pending', 'seen' => true, 'message' => sprintf('Payment seen; waiting for confirmations (%d of %d).', $waiting, $required)];
        }
        if ($complete && (int) $row['expires_at'] < $this->now() - 120) {
            $this->db->table(self::TABLE)->where('reference', $reference)->where('status', 'pending')
                ->update(['status' => 'expired', 'match_key' => null, 'updated_at' => $this->now()]);
            return ['ok' => false, 'status' => 'expired', 'error' => 'checkout_expired'];
        }
        return ['ok' => true, 'status' => 'pending', 'message' => 'Waiting for the payment.'];
    }

    /** A payment the chain dates after the checkout expired (plus grace) is not delivered at the old rate. */
    private function isLate(array $row, array $payment): bool
    {
        $grace = self::LATE_GRACE[$row['chain']] ?? null;
        return $grace !== null && isset($payment['time']) && (int) $payment['time'] > (int) $row['expires_at'] + $grace;
    }

    /** Record a late payment for support (deliver or refund); it never settles at the expired quote. */
    private function late(array $row, array $payment): ?array
    {
        if (! $this->claimPayment($row, $payment, ['status' => 'unfulfilled', 'result' => 'late_payment'])) {
            return null;
        }
        if ($this->db->affectedRows() !== 1) {
            return $this->state($this->find((string) $row['reference']) ?? $row);
        }
        log_message('warning', 'Crypto checkout {ref}: payment {p} arrived after the checkout expired; sent to support', ['ref' => $row['reference'], 'p' => $payment['id']]);
        return $this->state(['status' => 'unfulfilled', 'result' => 'late_payment', 'payment_id' => $payment['id']] + $row);
    }

    /** @param array{id: string, amount: int, payer: string, confirmations: int} $payment */
    private function accept(array $row, array $payment): ?array
    {
        if (! $this->claimPayment($row, $payment, ['status' => 'confirmed'])) {
            return null;
        }
        if ($this->db->affectedRows() !== 1) {
            return $this->state($this->find((string) $row['reference']) ?? $row);
        }
        return $this->deliver(['status' => 'confirmed', 'payment_id' => $payment['id'], 'payer' => $payment['payer'], 'updated_at' => $this->now()] + $row);
    }

    /**
     * Ties the payment to this pending checkout. False only when the payment
     * already settled another checkout (unique payment_id); any other database
     * error is thrown, so the payment is read and tried again on the next sweep.
     */
    private function claimPayment(array $row, array $payment, array $set): bool
    {
        $error = null;
        try {
            $ok = $this->db->table(self::TABLE)->where('reference', (string) $row['reference'])->where('status', 'pending')
                ->update($set + ['payment_id' => $payment['id'], 'payer' => mb_substr($payment['payer'], 0, 100), 'match_key' => null, 'updated_at' => $this->now()]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $ok = false;
            $error = $e;
        }
        if ($ok !== false) {
            return true;
        }
        $elsewhere = $this->db->table(self::TABLE)->where('payment_id', $payment['id'])->where('reference !=', (string) $row['reference'])->countAllResults();
        if ($elsewhere > 0) {
            return false;
        }
        throw $error ?? new \RuntimeException('crypto checkout payment not recorded');
    }

    private function resume(string $reference): array
    {
        $row = $this->find($reference);
        if ($row === null || $row['status'] !== 'confirmed' || (int) $row['updated_at'] >= $this->now() - self::RESUME_AFTER_SECONDS) {
            return $row === null ? ['ok' => false, 'status' => 'not_found'] : $this->state($row);
        }
        $now = $this->now();
        $this->db->table(self::TABLE)->where('reference', $reference)->where('status', 'confirmed')
            ->where('updated_at', (int) $row['updated_at'])->update(['updated_at' => $now]);
        if ($this->db->affectedRows() !== 1) {
            return $this->state($row);
        }
        log_message('notice', 'Crypto checkout {ref}: resuming an interrupted delivery', ['ref' => $reference]);
        return $this->deliver(['updated_at' => $now] + $row);
    }

    private function deliver(array $row): array
    {
        $reference = (string) $row['reference'];
        $userId = (int) $row['user_id'];
        $provider = self::provider((string) $row['chain']);

        $earlier = $this->db->table('bf_payment_claims')->select('id')->where('provider', $provider)
            ->where('provider_txn_id', $reference)->limit(1)->get()->getRowArray();
        if ($earlier !== null) {
            log_message('warning', 'Crypto checkout {ref}: delivery was interrupted after the payment record; sent to support', ['ref' => $reference]);
            $this->db->table(self::TABLE)->where('reference', $reference)
                ->update(['status' => 'unfulfilled', 'claim_id' => (int) $earlier['id'], 'result' => 'interrupted_check_delivery', 'updated_at' => $this->now()]);
            return $this->state(['status' => 'unfulfilled'] + $row);
        }

        $at = date('Y-m-d H:i:s', $this->now());
        $saved = $this->db->table('bf_payment_claims')->insert([
            'user_id'         => $userId,
            'kind'            => (string) $row['purpose'],
            'provider'        => $provider,
            'provider_txn_id' => $reference,
            'claimed_amount'  => ((int) $row['usd_cents']) / 100,
            'verified_amount' => ((int) $row['usd_cents']) / 100,
            'currency'        => 'USD',
            'status'          => 'verified',
            'detail'          => json_encode([
                'payment' => $row['payment_id'], 'payer' => $row['payer'], 'chain' => $row['chain'], 'network' => $row['network'],
                'asset' => $row['asset'], 'asset_amount' => (string) $row['asset_amount'], 'rate' => $row['rate'],
                'fee_cents' => (int) $row['fee_cents'], 'purpose_ref' => $row['purpose_ref'],
            ], JSON_UNESCAPED_SLASHES),
            'created_at'      => $at,
            'updated_at'      => $at,
        ]);
        $claimId = $saved ? (int) $this->db->insertID() : 0;
        if ($claimId <= 0) {
            log_message('error', 'Crypto checkout {ref}: payment record not saved; delivery left for retry', ['ref' => $reference]);
            return $this->state(['status' => 'confirmed'] + $row);
        }

        try {
            $result = ($this->fulfillers[$row['purpose']])($userId, $claimId, ['provider' => $provider, 'signature' => (string) $row['payment_id']] + $row);
        } catch (\Throwable $e) {
            log_message('error', 'Crypto checkout {ref}: fulfilment threw: {m}', ['ref' => $reference, 'm' => $e->getMessage()]);
            $result = ['ok' => false, 'reason' => 'fulfilment_error'];
        }
        $status = $result['ok'] ? 'fulfilled' : 'unfulfilled';
        $this->db->table(self::TABLE)->where('reference', $reference)
            ->update(['status' => $status, 'claim_id' => $claimId, 'result' => mb_substr((string) ($result['reason'] ?? ''), 0, 255), 'updated_at' => $this->now()]);
        if ($result['ok']) {
            $this->db->table('bf_payment_claims')->where('id', $claimId)->where('status', 'verified')
                ->update(['status' => 'fulfilled', 'updated_at' => date('Y-m-d H:i:s', $this->now())]);
        }
        $this->audit?->record('payment_confirmed', [
            'user_id' => $userId, 'wallet' => (string) $row['payer'],
            'detail' => ['reference' => $reference, 'payment' => $row['payment_id'], 'chain' => $row['chain'], 'network' => $row['network'],
                'purpose' => $row['purpose'], 'purpose_ref' => $row['purpose_ref'], 'usd_cents' => (int) $row['usd_cents'], 'fee_cents' => (int) $row['fee_cents'],
                'asset' => $row['asset'], 'asset_amount' => (string) $row['asset_amount'], 'fulfilled' => $result['ok']],
            'created_at' => $this->now(),
        ]);

        return $result['ok']
            ? ['ok' => true, 'status' => 'fulfilled', 'payment' => (string) $row['payment_id'], 'message' => $result['message'] ?? 'Payment confirmed.']
            : ['ok' => true, 'status' => 'unfulfilled', 'payment' => (string) $row['payment_id'], 'message' => 'Payment confirmed. Support will finish your order shortly.'];
    }

    private function state(array $row): array
    {
        return match ($row['status']) {
            'fulfilled'   => ['ok' => true, 'status' => 'fulfilled', 'payment' => (string) $row['payment_id'], 'message' => 'Payment confirmed.'],
            'confirmed'   => ['ok' => true, 'status' => 'confirmed', 'payment' => (string) $row['payment_id'], 'message' => 'Payment confirmed; finishing your order.'],
            'unfulfilled' => ($row['result'] ?? '') === 'late_payment'
                ? ['ok' => true, 'status' => 'unfulfilled', 'payment' => (string) $row['payment_id'], 'message' => 'Payment received after this checkout expired. Support will finish your order or refund you.']
                : ['ok' => true, 'status' => 'unfulfilled', 'payment' => (string) $row['payment_id'], 'message' => 'Payment confirmed. Support will finish your order shortly.'],
            'expired'     => ['ok' => false, 'status' => 'expired', 'error' => 'checkout_expired'],
            default       => ['ok' => true, 'status' => (string) $row['status']],
        };
    }

    public function find(string $reference): ?array
    {
        if (! preg_match('/^[1-9A-HJ-NP-Za-km-z]{16,32}$/', $reference)) {
            return null;
        }
        $row = $this->db->table(self::TABLE)->where('reference', $reference)->limit(1)->get()->getRowArray();
        return is_array($row) ? $row : null;
    }

    private static function cents(int $cents): string
    {
        return number_format($cents / 100, 2, '.', '');
    }

    private static function units(int $amount, int $decimals): string
    {
        $s = str_pad((string) $amount, $decimals + 1, '0', STR_PAD_LEFT);
        $whole = substr($s, 0, -$decimals);
        $frac = rtrim(substr($s, -$decimals), '0');
        return $frac === '' ? $whole : $whole . '.' . $frac;
    }
}
