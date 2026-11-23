<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use App\Libraries\SecureTransfer\AuditLog;
use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SolanaFees\SolanaFeeService;
use CodeIgniter\Database\BaseConnection;
use Config\SolanaPay as SolanaPayConfig;

/**
 * Solana Pay checkout for MyMI's own products.
 *
 * 1. checkout(): the server sets the price, makes a unique reference key and
 *    returns a solana: link (QR on desktop, tap on phone, or the connected wallet).
 * 2. transaction(): the wallet asks for the transaction; the server builds it:
 *    USDC price to MyMI (carrying the reference) + SOL payment fee to the
 *    treasury + memo, with a priority fee sized from recent network fees.
 * 3. The buyer's own wallet signs and sends it. MyMI never sees a key.
 * 4. confirm(): the server finds the transaction by its reference, checks the
 *    exact amount, token, recipient and signer on-chain, claims the fee once,
 *    records a verified payment claim and fulfils the order exactly once.
 */
final class SolanaPayService
{
    /** A `confirmed` checkout untouched this long was interrupted mid-delivery. */
    private const RESUME_AFTER_SECONDS = 300;

    public const TABLE = 'bf_solana_pay_requests';

    /**
     * @param array<string, callable(int, int, array): array{ok: bool, reason: string, message?: string}> $fulfillers purpose => fulfil(userId, claimId, request)
     */
    public function __construct(
        private SolanaPayConfig $config,
        private PayRpc $rpc,
        private SolanaFeeService $fees,
        private BaseConnection $db,
        private array $fulfillers,
        private string $txUrlBase,
        private ?AuditLog $audit = null,
        private ?\Closure $clock = null,
    ) {
    }

    public static function available(BaseConnection $db, SolanaPayConfig $config): bool
    {
        return $config->ready() && $db->tableExists(self::TABLE) && $db->tableExists('bf_payment_claims');
    }

    private function now(): int
    {
        return $this->clock ? (int) ($this->clock)() : time();
    }

    /** @return array{ok: bool, error?: string, reference?: string, url?: string, usd?: string, fee_sol?: string, expires_at?: int, cluster?: string} */
    public function checkout(int $userId, string $purpose, string $purposeRef, int $usdCents): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'not_signed_in'];
        }
        if (! isset(SolanaPayConfig::PURPOSES[$purpose], $this->fulfillers[$purpose])) {
            return ['ok' => false, 'error' => 'unknown_purpose'];
        }
        if ($usdCents < $this->config->minCents || $usdCents > $this->config->maxCents) {
            return ['ok' => false, 'error' => 'amount_out_of_range', 'min_cents' => $this->config->minCents, 'max_cents' => $this->config->maxCents];
        }
        $recipientAccount = $this->recipientTokenAccount();
        if ($recipientAccount === null) {
            return ['ok' => false, 'error' => 'recipient_usdc_account_missing'];
        }

        $now = $this->now();
        $reference = Base58::encode(random_bytes(32));
        $fee = $this->fees->lamports('payment_processing');
        $this->db->table(self::TABLE)->insert([
            'reference'     => $reference,
            'user_id'       => $userId,
            'purpose'       => $purpose,
            'purpose_ref'   => mb_substr($purposeRef, 0, 64),
            'usd_cents'     => $usdCents,
            'token'         => 'USDC',
            'token_mint'    => $this->config->usdcMint,
            'token_amount'  => $usdCents * 10 ** ($this->config->usdcDecimals - 2),
            'recipient'     => $this->config->recipient,
            'recipient_token_account' => $recipientAccount,
            'fee_lamports'  => $fee,
            'cluster'       => $this->config->cluster,
            'status'        => 'pending',
            'created_at'    => $now,
            'expires_at'    => $now + $this->config->requestTtlSeconds,
            'updated_at'    => $now,
        ]);

        return [
            'ok'         => true,
            'reference'  => $reference,
            'url'        => 'solana:' . rawurlencode(rtrim($this->txUrlBase, '/') . '/' . $reference),
            'usd'        => number_format($usdCents / 100, 2, '.', ''),
            'fee_sol'    => SolanaFeeService::sol($fee),
            'expires_at' => $now + $this->config->requestTtlSeconds,
            'cluster'    => $this->config->cluster,
        ];
    }

    /** Solana Pay transaction-request GET: what the wallet shows before connecting. */
    public function describe(): array
    {
        return ['label' => $this->config->label, 'icon' => $this->config->icon];
    }

    /**
     * Solana Pay transaction-request POST: the unsigned transaction for $account to sign.
     *
     * @return array{ok: bool, error?: string, transaction?: string, message?: string}
     */
    public function transaction(string $reference, string $account): array
    {
        $row = $this->find($reference);
        if ($row === null) {
            return ['ok' => false, 'error' => 'checkout_not_found'];
        }
        if ($row['status'] !== 'pending' || (int) $row['expires_at'] < $this->now()) {
            return ['ok' => false, 'error' => 'checkout_closed'];
        }
        if (Base58::walletPublicKey($account) === null) {
            return ['ok' => false, 'error' => 'invalid_account'];
        }

        $amount = (int) $row['token_amount'];
        $source = $this->payerTokenAccount($account, (string) $row['token_mint'], $amount);
        if ($source === null) {
            return ['ok' => false, 'error' => 'insufficient_usdc'];
        }
        $latest = $this->rpc->call('getLatestBlockhash', [['commitment' => 'confirmed']]);
        $blockhash = is_array($latest) ? (string) ($latest['value']['blockhash'] ?? '') : '';
        if ($blockhash === '') {
            return ['ok' => false, 'error' => 'network_unavailable'];
        }

        $usd = number_format(((int) $row['usd_cents']) / 100, 2, '.', '');
        $ixs = [
            TransactionBuilder::computeUnitLimit($this->config->computeUnitLimit),
            TransactionBuilder::computeUnitPrice($this->priorityFee((string) $row['recipient_token_account'])),
            TransactionBuilder::transferChecked($source, (string) $row['token_mint'], (string) $row['recipient_token_account'],
                $account, $amount, $this->config->usdcDecimals, [$reference]),
        ];
        $fee = (int) $row['fee_lamports'];
        $treasury = (string) $this->fees->quote('payment_processing')['treasury'];
        if ($fee > 0 && $treasury !== '') {
            $ixs[] = TransactionBuilder::systemTransfer($account, $treasury, $fee);
        }
        $ixs[] = TransactionBuilder::memo('MyMI ' . $row['purpose'] . ' ' . substr($reference, 0, 8));

        try {
            $message = TransactionBuilder::compileMessage($account, $blockhash, $ixs);
        } catch (\InvalidArgumentException) {
            return ['ok' => false, 'error' => 'invalid_account'];
        }
        $this->db->table(self::TABLE)->where('reference', $reference)->where('status', 'pending')
            ->update(['payer_wallet' => $account, 'updated_at' => $this->now()]);

        $label = $fee > 0 ? sprintf('Pay %s USDC + %s SOL fee to MyMI', $usd, SolanaFeeService::sol($fee)) : sprintf('Pay %s USDC to MyMI', $usd);

        return ['ok' => true, 'transaction' => TransactionBuilder::unsignedTransaction($message), 'message' => $label];
    }

    /**
     * Server-side sweep of open checkouts, so a paid order is delivered even
     * when the buyer closed the checkout tab. Run from cron (solanapay:reconcile).
     *
     * @return array<string, int> count of checkouts by resulting status
     */
    public function reconcile(int $limit = 100): array
    {
        $rows = $this->db->table(self::TABLE)->select('reference, user_id')
            ->where('status', 'pending')->where('expires_at >=', $this->now() - 86400)
            ->orderBy('created_at', 'ASC')->limit(max(1, min($limit, 500)))->get()->getResultArray();
        $counts = [];
        $stuck = $this->db->table(self::TABLE)->select('reference')
            ->where('status', 'confirmed')->where('updated_at <', $this->now() - self::RESUME_AFTER_SECONDS)
            ->orderBy('updated_at', 'ASC')->limit(50)->get()->getResultArray();
        foreach ($stuck as $r) {
            try {
                $status = $this->resume((string) $r['reference'])['status'];
            } catch (\Throwable $e) {
                log_message('warning', 'Solana Pay resume {ref}: {m}', ['ref' => $r['reference'], 'm' => $e->getMessage()]);
                $status = 'error';
            }
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        foreach ($rows as $r) {
            try {
                $status = $this->confirm((string) $r['reference'], (int) $r['user_id'])['status'];
            } catch (\Throwable $e) {
                log_message('warning', 'Solana Pay reconcile {ref}: {m}', ['ref' => $r['reference'], 'm' => $e->getMessage()]);
                $status = 'error';
            }
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        return $counts;
    }

    /**
     * Look for the payment on-chain and, the first time it is found valid,
     * record it and fulfil the order.
     *
     * @return array{ok: bool, status: string, error?: string, message?: string, signature?: string}
     */
    public function confirm(string $reference, int $userId): array
    {
        $row = $this->find($reference);
        if ($row === null || (int) $row['user_id'] !== $userId) {
            return ['ok' => false, 'status' => 'not_found', 'error' => 'checkout_not_found'];
        }
        if ($row['status'] !== 'pending') {
            return $this->state($row);
        }

        $found = $this->rpc->call('getSignaturesForAddress', [$reference, ['limit' => 20, 'commitment' => 'confirmed']]);
        // Only a complete answer from the chain can prove "no payment"; an RPC outage must leave the checkout open.
        $complete = is_array($found);
        foreach ($complete ? $found : [] as $entry) {
            if (($entry['err'] ?? null) !== null || ! is_string($entry['signature'] ?? null)) {
                continue;
            }
            $tx = $this->rpc->getTransaction($entry['signature']);
            if ($tx === null) {
                $complete = false;
                continue;
            }
            $check = self::verify($tx, $row);
            if (! $check['ok']) {
                log_message('notice', 'Solana Pay {ref}: transaction {sig} not accepted ({why})', ['ref' => $reference, 'sig' => $entry['signature'], 'why' => $check['error']]);
                continue;
            }
            return $this->accept($row, (string) $entry['signature'], $check['payer'], $tx);
        }

        if ($complete && (int) $row['expires_at'] < $this->now() - 120) {
            $this->db->table(self::TABLE)->where('reference', $reference)->where('status', 'pending')
                ->update(['status' => 'expired', 'updated_at' => $this->now()]);
            return ['ok' => false, 'status' => 'expired', 'error' => 'checkout_expired'];
        }
        return ['ok' => true, 'status' => 'pending', 'message' => 'Waiting for the payment to confirm on Solana.'];
    }

    /**
     * Is $tx exactly this checkout's payment? Checks: succeeded, not older than
     * the checkout, carries the reference, and has a transferChecked of exactly
     * the price, in the right token, to MyMI's account, authorised by a signer.
     *
     * @return array{ok: bool, error?: string, payer?: string}
     */
    public static function verify(array $tx, array $row): array
    {
        if (($tx['meta']['err'] ?? null) !== null) {
            return ['ok' => false, 'error' => 'failed_on_chain'];
        }
        $blockTime = (int) ($tx['blockTime'] ?? 0);
        if ($blockTime <= 0 || $blockTime < (int) $row['created_at'] - 120) {
            return ['ok' => false, 'error' => 'too_old'];
        }
        $signers = [];
        $keys = [];
        foreach ($tx['transaction']['message']['accountKeys'] ?? [] as $k) {
            $pk = is_array($k) ? (string) ($k['pubkey'] ?? '') : (string) $k;
            $keys[] = $pk;
            if (is_array($k) && ! empty($k['signer'])) {
                $signers[] = $pk;
            }
        }
        if (! in_array((string) $row['reference'], $keys, true)) {
            return ['ok' => false, 'error' => 'reference_missing'];
        }
        foreach ($tx['transaction']['message']['instructions'] ?? [] as $ix) {
            $parsed = $ix['parsed'] ?? null;
            if (($ix['program'] ?? '') !== 'spl-token' || ! is_array($parsed) || ($parsed['type'] ?? '') !== 'transferChecked') {
                continue;
            }
            $info = $parsed['info'] ?? [];
            $authority = (string) ($info['authority'] ?? $info['multisigAuthority'] ?? '');
            if (($info['destination'] ?? '') === $row['recipient_token_account']
                && ($info['mint'] ?? '') === $row['token_mint']
                && (string) ($info['tokenAmount']['amount'] ?? '') === (string) $row['token_amount']
                && in_array($authority, $signers, true)) {
                return ['ok' => true, 'payer' => $authority];
            }
        }
        return ['ok' => false, 'error' => 'no_matching_transfer'];
    }

    private function accept(array $row, string $signature, string $payer, array $tx): array
    {
        // Exactly one caller moves pending -> confirmed; everyone else just reports state.
        $now = $this->now();
        $this->db->table(self::TABLE)->where('reference', (string) $row['reference'])->where('status', 'pending')
            ->update(['status' => 'confirmed', 'signature' => $signature, 'payer_wallet' => $payer, 'updated_at' => $now]);
        if ($this->db->affectedRows() !== 1) {
            return $this->state($this->find((string) $row['reference']) ?? $row);
        }

        return $this->deliver(['status' => 'confirmed', 'signature' => $signature, 'payer_wallet' => $payer, 'updated_at' => $now] + $row, $tx);
    }

    /**
     * Finish a checkout left in `confirmed` (process stopped mid-delivery).
     * Takes a lease on the row first, so two sweeps never deliver the same one.
     */
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
        log_message('notice', 'Solana Pay {ref}: resuming an interrupted delivery', ['ref' => $reference]);

        return $this->deliver(['updated_at' => $now] + $row, null);
    }

    /**
     * Fee claim, payment record and fulfilment for a confirmed checkout. Safe
     * to call again after an interruption: the fee is claimed once (result
     * "fee_claimed"), and if a payment record already exists the fulfiller
     * may have run, so the order goes to support instead of a second delivery.
     */
    private function deliver(array $row, ?array $tx): array
    {
        $reference = (string) $row['reference'];
        $userId = (int) $row['user_id'];
        $signature = (string) $row['signature'];
        $payer = (string) $row['payer_wallet'];

        if ((int) $row['fee_lamports'] > 0 && ($row['result'] ?? '') !== 'fee_claimed') {
            $tx ??= $this->rpc->getTransaction($signature);
            if ($tx === null) {
                return $this->state(['status' => 'confirmed'] + $row); // RPC down: the sweep retries later
            }
            // Check the fee in the transaction we already verified, against this checkout's own
            // window and quoted fee, so a late check or a price change cannot fail a paid order.
            $fee = $this->fees->claim('payment_processing', $userId, $payer, $signature, 'solanapay:' . $reference, null,
                ['tx' => $tx, 'not_before' => (int) $row['created_at'] - 120, 'lamports' => (int) $row['fee_lamports']]);
            if (! $fee['ok']) {
                log_message('warning', 'Solana Pay {ref}: price paid but fee refused ({why})', ['ref' => $reference, 'why' => $fee['error'] ?? '']);
                $this->db->table(self::TABLE)->where('reference', $reference)
                    ->update(['status' => 'review', 'result' => 'fee_' . ($fee['error'] ?? 'refused'), 'updated_at' => $this->now()]);
                return $this->state(['status' => 'review'] + $row);
            }
            $this->db->table(self::TABLE)->where('reference', $reference)->update(['result' => 'fee_claimed', 'updated_at' => $this->now()]);
        }

        $earlier = $this->db->table('bf_payment_claims')->select('id')->where('provider', 'solana')
            ->where('provider_txn_id', $reference)->limit(1)->get()->getRowArray();
        if ($earlier !== null) {
            log_message('warning', 'Solana Pay {ref}: delivery was interrupted after the payment record; sent to support', ['ref' => $reference]);
            $this->db->table(self::TABLE)->where('reference', $reference)
                ->update(['status' => 'unfulfilled', 'claim_id' => (int) $earlier['id'], 'result' => 'interrupted_check_delivery', 'updated_at' => $this->now()]);
            if ((int) $row['fee_lamports'] > 0) {
                $this->fees->settle($signature, 'solanapay:' . $reference, true);
            }
            return $this->state(['status' => 'unfulfilled'] + $row);
        }

        $now = date('Y-m-d H:i:s', $this->now());
        $this->db->table('bf_payment_claims')->insert([
            'user_id'         => $userId,
            'kind'            => (string) $row['purpose'],
            'provider'        => 'solana',
            'provider_txn_id' => $reference,
            'claimed_amount'  => ((int) $row['usd_cents']) / 100,
            'verified_amount' => ((int) $row['usd_cents']) / 100,
            'currency'        => 'USD',
            'status'          => 'verified',
            'detail'          => json_encode(['signature' => $signature, 'payer' => $payer, 'token' => 'USDC', 'cluster' => $row['cluster'], 'purpose_ref' => $row['purpose_ref']], JSON_UNESCAPED_SLASHES),
            'created_at'      => $now,
            'updated_at'      => $now,
        ]);
        $claimId = (int) $this->db->insertID();

        try {
            $result = ($this->fulfillers[$row['purpose']])($userId, $claimId, $row);
        } catch (\Throwable $e) {
            log_message('error', 'Solana Pay {ref}: fulfilment threw: {m}', ['ref' => $reference, 'm' => $e->getMessage()]);
            $result = ['ok' => false, 'reason' => 'fulfilment_error'];
        }
        $status = $result['ok'] ? 'fulfilled' : 'unfulfilled';
        $this->db->table(self::TABLE)->where('reference', $reference)
            ->update(['status' => $status, 'claim_id' => $claimId, 'result' => mb_substr((string) ($result['reason'] ?? ''), 0, 255), 'updated_at' => $this->now()]);
        if ($result['ok']) {
            $this->db->table('bf_payment_claims')->where('id', $claimId)->where('status', 'verified')
                ->update(['status' => 'fulfilled', 'updated_at' => date('Y-m-d H:i:s', $this->now())]);
        }
        if ((int) $row['fee_lamports'] > 0) {
            $this->fees->settle($signature, 'solanapay:' . $reference, true);
        }
        $this->audit?->record('payment_confirmed', [
            'user_id' => $userId, 'wallet' => $payer,
            'detail' => ['reference' => $reference, 'signature' => $signature, 'purpose' => $row['purpose'], 'purpose_ref' => $row['purpose_ref'],
                'usd_cents' => (int) $row['usd_cents'], 'token' => 'USDC', 'fee_lamports' => (int) $row['fee_lamports'], 'cluster' => $row['cluster'], 'fulfilled' => $result['ok']],
            'created_at' => $this->now(),
        ]);

        return $result['ok']
            ? ['ok' => true, 'status' => 'fulfilled', 'signature' => $signature, 'message' => $result['message'] ?? 'Payment confirmed.']
            : ['ok' => true, 'status' => 'unfulfilled', 'signature' => $signature, 'message' => 'Payment confirmed. Support will finish your order shortly.'];
    }

    private function state(array $row): array
    {
        return match ($row['status']) {
            'fulfilled'   => ['ok' => true, 'status' => 'fulfilled', 'signature' => (string) $row['signature'], 'message' => 'Payment confirmed.'],
            'confirmed'   => ['ok' => true, 'status' => 'confirmed', 'signature' => (string) $row['signature'], 'message' => 'Payment confirmed; finishing your order.'],
            'unfulfilled' => ['ok' => true, 'status' => 'unfulfilled', 'signature' => (string) $row['signature'], 'message' => 'Payment confirmed. Support will finish your order shortly.'],
            'review'      => ['ok' => false, 'status' => 'review', 'error' => 'fee_not_paid', 'message' => 'Payment received without the processing fee. Support will review it.'],
            'expired'     => ['ok' => false, 'status' => 'expired', 'error' => 'checkout_expired'],
            default       => ['ok' => true, 'status' => (string) $row['status']],
        };
    }

    private function find(string $reference): ?array
    {
        if (Base58::walletPublicKey($reference) === null) {
            return null;
        }
        $row = $this->db->table(self::TABLE)->where('reference', $reference)->limit(1)->get()->getRowArray();
        return is_array($row) ? $row : null;
    }

    private function recipientTokenAccount(): ?string
    {
        if ($this->config->recipientUsdcAccount !== '') {
            return $this->config->recipientUsdcAccount;
        }
        $accounts = $this->tokenAccounts($this->config->recipient, $this->config->usdcMint);
        return $accounts === [] ? null : array_key_first($accounts);
    }

    /** The owner's account for $mint holding at least $amount (largest first). */
    private function payerTokenAccount(string $owner, string $mint, int $amount): ?string
    {
        foreach ($this->tokenAccounts($owner, $mint) as $address => $balance) {
            if ($balance >= $amount) {
                return $address;
            }
        }
        return null;
    }

    /** @return array<string, int> token account => raw balance, largest first */
    private function tokenAccounts(string $owner, string $mint): array
    {
        $r = $this->rpc->call('getTokenAccountsByOwner', [$owner, ['mint' => $mint], ['encoding' => 'jsonParsed', 'commitment' => 'confirmed']]);
        $out = [];
        foreach ((is_array($r) ? $r['value'] ?? [] : []) as $acct) {
            $address = (string) ($acct['pubkey'] ?? '');
            $amount = (string) ($acct['account']['data']['parsed']['info']['tokenAmount']['amount'] ?? '0');
            if ($address !== '' && ctype_digit($amount)) {
                $out[$address] = (int) $amount;
            }
        }
        arsort($out);
        return $out;
    }

    /** 75th percentile of recent priority fees on the account, clamped to the configured bounds. */
    private function priorityFee(string $account): int
    {
        $r = $this->rpc->call('getRecentPrioritizationFees', [[$account]]);
        $fees = array_values(array_filter(array_map(static fn ($e) => (int) ($e['prioritizationFee'] ?? 0), is_array($r) ? $r : [])));
        sort($fees);
        $p75 = $fees === [] ? 0 : $fees[(int) floor((count($fees) - 1) * 0.75)];
        return max($this->config->priorityMinMicroLamports, min($this->config->priorityMaxMicroLamports, $p75));
    }
}
