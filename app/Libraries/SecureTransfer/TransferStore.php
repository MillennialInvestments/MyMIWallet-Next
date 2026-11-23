<?php

namespace App\Libraries\SecureTransfer;

/**
 * Persistence for Secure Transfer metadata. Ciphertext lives in files, not here.
 * DbTransferStore is the production implementation; tests use ArrayTransferStore.
 */
interface TransferStore
{
    public function createChallenge(int $userId, string $wallet, string $nonce, int $expiresAt): void;

    /** Atomically use a challenge once. False when missing, expired, used or for another user/wallet. */
    public function consumeChallenge(int $userId, string $wallet, string $nonce, int $now): bool;

    /** User id that holds active keys for this wallet, or null. */
    public function walletOwner(string $wallet): ?int;

    public function addKey(int $userId, string $wallet, string $transferKey, string $statement, string $signature, int $now): void;

    /** @return list<array{wallet: string, transfer_key: string, created_at: int, statement: string, signature: string}> */
    public function activeKeys(string $wallet): array;

    /** @return list<array{wallet: string, transfer_key: string, created_at: int}> */
    public function keysForUser(int $userId): array;

    public function revokeKey(int $userId, string $wallet, string $transferKey, int $now): int;

    /** @return array{0: int, 1: int} transfers and ciphertext bytes sent since $since */
    public function senderUsage(int $userId, int $since): array;

    public function transferExists(string $transferId): bool;

    /** @param list<string> $recipientWallets */
    public function saveTransfer(int $senderUserId, array $manifest, string $signature, array $recipientWallets, int $now): bool;

    /** @return list<array> transfers addressed to any of these wallets, not expired, newest first */
    public function inbox(array $wallets, int $now): array;

    /** @return list<array> */
    public function outbox(int $userId, int $now): array;

    /** Manifest and signature when $wallet is a recipient and the transfer is live. */
    public function transferForRecipient(string $transferId, string $wallet, int $now): ?array;

    public function markDownloaded(string $transferId, string $wallet, int $now): void;

    /** Senders may withdraw a transfer early. Returns rows changed. */
    public function revokeTransfer(string $transferId, int $senderUserId, int $now): int;

    /** @return list<string> transfer ids expired or revoked whose ciphertext should be removed */
    public function purgeable(int $now): array;

    public function markPurged(string $transferId, int $now): void;

    /** Counts only, for operators and the AIOps MCP. */
    public function stats(int $now): array;

    /** Sender and recipient wallets of one transfer (any state), for legal-hold checks. */
    public function transferParties(string $transferId): ?array;
}
