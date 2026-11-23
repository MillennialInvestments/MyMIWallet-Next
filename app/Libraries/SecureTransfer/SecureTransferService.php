<?php

namespace App\Libraries\SecureTransfer;

use Config\SecureTransfer as SecureTransferConfig;

/**
 * The rules of MyMI Secure Transfer. Every method takes the session user id from
 * the controller (never from the request) and returns ['ok' => bool, ...] with a
 * fixed reason code on refusal. No method logs or returns plaintext, file keys,
 * file names or signatures of other users.
 */
final class SecureTransferService
{
    /** Purge page size (smaller in tests). */
    public int $purgePage = 1000;

    private const ID_RE = '/^[0-9a-f]{32}$/';

    /** IP and browser of the current request, for the investigation record. */
    private array $request = ['ip' => null, 'user_agent' => null];

    public function __construct(
        private SecureTransferConfig $config,
        private TransferStore $store,
        private ?\Closure $clock = null,
        private ?AuditLog $audit = null,
    ) {
    }

    public function withRequest(?string $ip, ?string $userAgent): self
    {
        $this->request = ['ip' => $ip, 'user_agent' => $userAgent];
        return $this;
    }

    private function log(string $event, ?int $userId, ?string $wallet, ?string $transferId, array $detail = []): void
    {
        if ($this->audit === null) {
            return;
        }
        $this->audit->record($event, ['user_id' => $userId, 'wallet' => $wallet, 'transfer_id' => $transferId,
            'ip' => $this->request['ip'], 'user_agent' => $this->request['user_agent'], 'detail' => $detail, 'created_at' => $this->now()]);
    }

    /** Wallet-shaped strings only, so a refused request cannot write arbitrary text into the record. */
    private static function walletOrNull(string $wallet): ?string
    {
        return Base58::walletPublicKey($wallet) !== null ? $wallet : null;
    }

    private function held(string $transferId): bool
    {
        if ($this->audit === null) {
            return false;
        }
        $p = $this->store->transferParties($transferId);
        if ($p === null) {
            return false;
        }
        return $this->audit->isHeld($transferId, $p['sender_user_id'], array_merge([$p['sender_wallet']], $p['recipients']));
    }

    private function now(): int
    {
        return $this->clock ? (int) ($this->clock)() : time();
    }

    private static function refuse(string $reason): array
    {
        return ['ok' => false, 'error' => $reason];
    }

    /** Step 1 of binding: a single-use nonce tied to this user and wallet. */
    public function challenge(int $userId, string $wallet): array
    {
        if (Base58::walletPublicKey($wallet) === null) {
            return self::refuse('invalid_wallet');
        }
        $owner = $this->store->walletOwner($wallet);
        if ($owner !== null && $owner !== $userId) {
            return self::refuse('wallet_bound_to_another_account');
        }
        $now = $this->now();
        $nonce = bin2hex(random_bytes(16));
        $this->store->createChallenge($userId, $wallet, $nonce, $now + $this->config->nonceTtlSeconds);
        return ['ok' => true, 'nonce' => $nonce, 'issued_at' => $now, 'domain' => $this->config->domain,
            'expires_at' => $now + $this->config->nonceTtlSeconds];
    }

    /** Step 2: the wallet signed the binding statement for a device transfer key. */
    public function bindKey(int $userId, string $wallet, string $transferKey, string $nonce, int $issuedAt, string $signature): array
    {
        $r = $this->checkAndBindKey($userId, $wallet, $transferKey, $nonce, $issuedAt, $signature);
        if ($r['ok'] && empty($r['already_bound'])) {
            $this->log('key_linked', $userId, $wallet, null, ['transfer_key' => $transferKey]);
        } elseif (!$r['ok']) {
            $this->log('key_link_refused', $userId, self::walletOrNull($wallet), null, ['reason' => $r['error']]);
        }
        return $r;
    }

    private function checkAndBindKey(int $userId, string $wallet, string $transferKey, string $nonce, int $issuedAt, string $signature): array
    {
        if (Base58::walletPublicKey($wallet) === null) {
            return self::refuse('invalid_wallet');
        }
        if (!TransferCrypto::isTransferKey($transferKey)) {
            return self::refuse('invalid_transfer_key');
        }
        if (!preg_match('/^[0-9a-f]{32}$/', $nonce)) {
            return self::refuse('invalid_nonce');
        }
        $statement = TransferCrypto::bindingMessage($this->config->domain, $wallet, $transferKey, $nonce, $issuedAt);
        if (!TransferCrypto::verifyWalletSignature($wallet, $statement, $signature)) {
            return self::refuse('bad_wallet_signature');
        }
        $now = $this->now();
        if (abs($now - $issuedAt) > $this->config->nonceTtlSeconds) {
            return self::refuse('statement_expired');
        }
        $owner = $this->store->walletOwner($wallet);
        if ($owner !== null && $owner !== $userId) {
            return self::refuse('wallet_bound_to_another_account');
        }
        // Consume only after the signature checks out, so a bad attempt cannot burn a good nonce.
        if (!$this->store->consumeChallenge($userId, $wallet, $nonce, $now)) {
            return self::refuse('challenge_missing_used_or_expired');
        }
        foreach ($this->store->activeKeys($wallet) as $k) {
            if ($k['transfer_key'] === $transferKey) {
                return ['ok' => true, 'already_bound' => true];
            }
        }
        if (count($this->store->activeKeys($wallet)) >= $this->config->maxKeysPerWallet) {
            return self::refuse('too_many_keys_revoke_one_first');
        }
        $this->store->addKey($userId, $wallet, $transferKey, $statement, $signature, $now);
        return ['ok' => true, 'already_bound' => false];
    }

    /**
     * A recipient's active device keys, each with the wallet-signed statement so the
     * sender's browser can check the binding itself instead of trusting the server.
     */
    public function recipientKeys(string $wallet): array
    {
        if (Base58::walletPublicKey($wallet) === null) {
            return self::refuse('invalid_wallet');
        }
        return ['ok' => true, 'wallet' => $wallet, 'keys' => $this->store->activeKeys($wallet)];
    }

    public function myKeys(int $userId): array
    {
        return ['ok' => true, 'keys' => $this->store->keysForUser($userId)];
    }

    public function revokeKey(int $userId, string $wallet, string $transferKey): array
    {
        $n = $this->store->revokeKey($userId, $wallet, $transferKey, $this->now());
        if ($n > 0) {
            $this->log('key_revoked', $userId, $wallet, null, ['transfer_key' => $transferKey]);
        }
        return $n > 0 ? ['ok' => true, 'revoked' => $n] : self::refuse('key_not_found');
    }

    /**
     * Accept a sealed transfer. $ciphertextPath is the uploaded temp file; on
     * success it is moved into storage and named by transfer id.
     */
    public function send(int $userId, array $manifest, string $signature, string $ciphertextPath, CiphertextStore $files): array
    {
        $r = $this->checkAndSend($userId, $manifest, $signature, $ciphertextPath, $files);
        $sender = is_string($manifest['sender_wallet'] ?? null) ? self::walletOrNull($manifest['sender_wallet']) : null;
        $tid = is_string($manifest['transfer_id'] ?? null) && preg_match(self::ID_RE, $manifest['transfer_id']) ? $manifest['transfer_id'] : null;
        if ($r['ok']) {
            $this->log('transfer_sent', $userId, $sender, $tid, [
                'recipients' => array_values(array_unique(array_column($manifest['recipients'], 'wallet'))),
                'ciphertext_bytes' => $manifest['ciphertext_bytes'], 'ciphertext_sha256' => $manifest['ciphertext_sha256'],
                'expires_at' => $manifest['expires_at'], 'manifest_signature' => $signature,
            ]);
        } else {
            $this->log('transfer_refused', $userId, $sender, $tid, ['reason' => $r['error']]);
        }
        return $r;
    }

    private function checkAndSend(int $userId, array $manifest, string $signature, string $ciphertextPath, CiphertextStore $files): array
    {
        $now = $this->now();
        $errors = (new ManifestValidator($this->config))->validate($manifest, $signature, $now);
        if ($errors !== []) {
            return self::refuse($errors[0]) + ['errors' => $errors];
        }
        if ($this->store->walletOwner($manifest['sender_wallet']) !== $userId) {
            return self::refuse('sender_wallet_not_bound_to_you');
        }
        $senderKeys = array_column($this->store->activeKeys($manifest['sender_wallet']), 'transfer_key');
        if (!in_array($manifest['sender_key'], $senderKeys, true)) {
            return self::refuse('sender_key_not_active');
        }
        foreach ($manifest['recipients'] as $r) {
            $active = array_column($this->store->activeKeys($r['wallet']), 'transfer_key');
            if (!in_array($r['transfer_key'], $active, true)) {
                return self::refuse('recipient_key_not_active');
            }
        }
        if ($this->store->transferExists($manifest['transfer_id'])) {
            return self::refuse('duplicate_transfer_id');
        }
        [$count, $bytes] = $this->store->senderUsage($userId, $now - 86400);
        if ($count >= $this->config->dailyTransfersPerUser) {
            return self::refuse('daily_transfer_limit');
        }
        if ($bytes + $manifest['ciphertext_bytes'] > $this->config->dailyBytesPerUser) {
            return self::refuse('daily_byte_limit');
        }
        if (!is_file($ciphertextPath) || filesize($ciphertextPath) !== $manifest['ciphertext_bytes']) {
            return self::refuse('ciphertext_length_mismatch');
        }
        if (!hash_equals($manifest['ciphertext_sha256'], (string) hash_file('sha256', $ciphertextPath))) {
            return self::refuse('ciphertext_hash_mismatch');
        }
        if (!$files->put($manifest['transfer_id'], $ciphertextPath)) {
            return self::refuse('storage_unavailable');
        }
        $wallets = array_values(array_unique(array_column($manifest['recipients'], 'wallet')));
        try {
            $saved = $this->store->saveTransfer($userId, $manifest, $signature, $wallets, $now);
        } catch (\Throwable $e) {
            $saved = false; // DBDebug turns a failed insert into an exception
        }
        if (!$saved) {
            $files->delete($manifest['transfer_id']);
            return self::refuse('storage_unavailable');
        }
        return ['ok' => true, 'transfer_id' => $manifest['transfer_id'], 'expires_at' => $manifest['expires_at']];
    }

    /** Transfers addressed to the user's bound wallets. Metadata only. */
    public function inbox(int $userId): array
    {
        $wallets = array_values(array_unique(array_column($this->store->keysForUser($userId), 'wallet')));
        return ['ok' => true, 'transfers' => $wallets === [] ? [] : $this->store->inbox($wallets, $this->now())];
    }

    public function outbox(int $userId): array
    {
        return ['ok' => true, 'transfers' => $this->store->outbox($userId, $this->now())];
    }

    /**
     * Manifest, signature and ciphertext path for one recipient wallet the user holds.
     * The browser verifies the signature and hash again before decrypting.
     */
    public function download(int $userId, string $transferId, string $wallet, CiphertextStore $files, string $part = 'blob'): array
    {
        if (!preg_match(self::ID_RE, $transferId)) {
            return self::refuse('invalid_transfer_id');
        }
        if ($this->store->walletOwner($wallet) !== $userId) {
            return self::refuse('not_found');
        }
        $now = $this->now();
        $row = $this->store->transferForRecipient($transferId, $wallet, $now);
        $path = $row ? $files->path($transferId) : null;
        if ($row === null || $path === null) {
            return self::refuse('not_found');
        }
        $this->store->markDownloaded($transferId, $wallet, $now);
        $this->log('transfer_accessed', $userId, $wallet, $transferId, ['part' => $part]);
        return ['ok' => true, 'manifest' => $row['manifest'], 'signature' => $row['signature'], 'path' => $path];
    }

    public function revokeTransfer(int $userId, string $transferId, CiphertextStore $files): array
    {
        if (!preg_match(self::ID_RE, $transferId)) {
            return self::refuse('invalid_transfer_id');
        }
        $now = $this->now();
        if ($this->store->revokeTransfer($transferId, $userId, $now) === 0) {
            return self::refuse('not_found');
        }
        // Withdrawn: recipients lose access at once. Under a legal hold the stored ciphertext is kept as evidence.
        $held = $this->held($transferId);
        if (!$held) {
            $files->delete($transferId);
            $this->store->markPurged($transferId, $now);
        }
        $this->log('transfer_withdrawn', $userId, null, $transferId, ['ciphertext_kept_for_hold' => $held]);
        return ['ok' => true];
    }

    /** Remove ciphertext for expired and revoked transfers. Safe to run any time. */
    public function purge(CiphertextStore $files, bool $apply): array
    {
        $now = $this->now();
        $ids = [];
        $held = 0;
        // Page in id order so held transfers never block the ones after them.
        $after = '';
        do {
            $page = $this->store->purgeable($now, $after, $this->purgePage);
            foreach ($page as $id) {
                $after = (string) $id;
                if ($this->held($id)) {
                    $held++;
                    continue;
                }
                $ids[] = $id;
            }
        } while (count($page) === $this->purgePage);
        if ($apply) {
            foreach ($ids as $id) {
                $files->delete($id);
                $this->store->markPurged($id, $now);
                $this->log('transfer_purged', null, null, $id);
            }
        }
        return ['ok' => true, 'purgeable' => count($ids), 'held' => $held, 'applied' => $apply];
    }

    public function stats(): array
    {
        return ['ok' => true, 'enabled' => $this->config->enabled, 'protocol' => 'MST1'] + $this->store->stats($this->now());
    }
}
