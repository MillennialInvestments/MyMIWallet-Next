<?php

namespace App\Libraries\SecureTransfer;

/**
 * Investigation record for MyMI Secure Transfer: who did what, to which wallet,
 * when and from where. It never holds file contents, names or keys (the server
 * cannot read them). Entries are add-only and hash-chained, so a later edit or
 * deletion is detectable with verify().
 */
interface AuditLog
{
    /** Events written by the service and the owner tools. */
    public const EVENTS = ['key_linked', 'key_link_refused', 'key_revoked', 'transfer_sent', 'transfer_refused',
        'transfer_accessed', 'transfer_withdrawn', 'transfer_purged', 'hold_set', 'hold_released', 'audit_export',
        'payment_confirmed'];

    /** Hold scopes: one transfer, every transfer of a MyMI user, or every transfer touching a wallet. */
    public const HOLD_SCOPES = ['transfer', 'user', 'wallet'];

    public function record(string $event, array $entry): void;

    /**
     * Entries matching the filters (user_id, wallet, transfer_id, from, to, after_id for paging), oldest first.
     *
     * @return list<array<string, mixed>>
     */
    public function find(array $filters, int $limit = 5000): array;

    /** Walk the whole chain. ['ok' => true, 'entries' => n] or ['ok' => false, 'broken_at' => id]. */
    public function verify(): array;

    /** Returns the new hold id. */
    public function setHold(string $scope, string $value, string $reason, string $by, int $now): int;

    public function releaseHold(int $holdId, string $by, int $now): bool;

    /** @return list<array<string, mixed>> active holds */
    public function activeHolds(): array;

    /** True when any active hold covers this transfer, its sender account or any of its wallets. */
    public function isHeld(string $transferId, int $senderUserId, array $wallets): bool;
}
