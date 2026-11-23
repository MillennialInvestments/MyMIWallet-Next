<?php

namespace App\Libraries\SecureTransfer;

/** In-memory AuditLog for tests. Same chain rules as DbAuditLog. */
final class ArrayAuditLog implements AuditLog
{
    /** @var list<array<string, mixed>> */
    public array $rows = [];
    /** @var array<int, array<string, mixed>> */
    private array $holds = [];

    public function record(string $event, array $entry): void
    {
        $row = AuditChain::normalize($event, $entry);
        $prev = $this->rows === [] ? AuditChain::GENESIS : $this->rows[count($this->rows) - 1]['row_hash'];
        $row['id'] = count($this->rows) + 1;
        $row['prev_hash'] = $prev;
        $row['row_hash'] = AuditChain::hash($prev, $row);
        $this->rows[] = $row;
    }

    public function find(array $filters, int $limit = 5000): array
    {
        $out = [];
        foreach ($this->rows as $r) {
            if (isset($filters['user_id']) && $r['user_id'] !== (int) $filters['user_id']) {
                continue;
            }
            if (isset($filters['wallet']) && $r['wallet'] !== $filters['wallet'] && !str_contains((string) $r['detail'], '"' . $filters['wallet'] . '"')) {
                continue;
            }
            if (isset($filters['transfer_id']) && $r['transfer_id'] !== $filters['transfer_id']) {
                continue;
            }
            if (isset($filters['from']) && $r['created_at'] < (int) $filters['from']) {
                continue;
            }
            if (isset($filters['to']) && $r['created_at'] > (int) $filters['to']) {
                continue;
            }
            $out[] = $r;
            if (count($out) >= $limit) {
                break;
            }
        }
        return $out;
    }

    public function verify(): array
    {
        $prev = AuditChain::GENESIS;
        foreach ($this->rows as $r) {
            if ($r['prev_hash'] !== $prev || !hash_equals(AuditChain::hash($prev, $r), $r['row_hash'])) {
                return ['ok' => false, 'broken_at' => $r['id'], 'entries' => count($this->rows)];
            }
            $prev = $r['row_hash'];
        }
        return ['ok' => true, 'entries' => count($this->rows)];
    }

    public function setHold(string $scope, string $value, string $reason, string $by, int $now): int
    {
        $id = count($this->holds) + 1;
        $this->holds[$id] = ['id' => $id, 'scope' => $scope, 'value' => $value, 'reason' => $reason, 'set_by' => $by, 'set_at' => $now, 'released_at' => null];
        return $id;
    }

    public function releaseHold(int $holdId, string $by, int $now): bool
    {
        if (!isset($this->holds[$holdId]) || $this->holds[$holdId]['released_at'] !== null) {
            return false;
        }
        $this->holds[$holdId]['released_at'] = $now;
        return true;
    }

    public function activeHolds(): array
    {
        return array_values(array_filter($this->holds, fn ($h) => $h['released_at'] === null));
    }

    public function isHeld(string $transferId, int $senderUserId, array $wallets): bool
    {
        foreach ($this->activeHolds() as $h) {
            if (($h['scope'] === 'transfer' && $h['value'] === $transferId)
                || ($h['scope'] === 'user' && (int) $h['value'] === $senderUserId)
                || ($h['scope'] === 'wallet' && in_array($h['value'], $wallets, true))) {
                return true;
            }
        }
        return false;
    }
}
