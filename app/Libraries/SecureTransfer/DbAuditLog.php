<?php

namespace App\Libraries\SecureTransfer;

use CodeIgniter\Database\BaseConnection;

/**
 * MySQL/SQLite AuditLog (tables from CreateSecureTransferAuditTables). Rows are
 * only ever inserted; nothing in the application updates or deletes them.
 */
final class DbAuditLog implements AuditLog
{
    private const AUDIT = 'bf_secure_transfer_audit';
    private const HOLDS = 'bf_secure_transfer_holds';

    public function __construct(private BaseConnection $db)
    {
    }

    public static function available(BaseConnection $db): bool
    {
        return $db->tableExists(self::AUDIT) && $db->tableExists(self::HOLDS);
    }

    public function record(string $event, array $entry): void
    {
        $row = AuditChain::normalize($event, $entry);
        $mysql = stripos($this->db->DBDriver, 'mysql') !== false;
        $this->db->transStart();
        // Lock the chain tail so two parallel writers cannot both link to the same previous row.
        $last = $this->db->query('SELECT row_hash FROM ' . $this->db->prefixTable(self::AUDIT) . ' ORDER BY id DESC LIMIT 1' . ($mysql ? ' FOR UPDATE' : ''))->getRowArray();
        $prev = $last ? (string) $last['row_hash'] : AuditChain::GENESIS;
        $row['prev_hash'] = $prev;
        $row['row_hash'] = AuditChain::hash($prev, $row);
        $this->db->table(self::AUDIT)->insert($row);
        $this->db->transComplete();
    }

    public function find(array $filters, int $limit = 5000): array
    {
        $q = $this->db->table(self::AUDIT);
        if (isset($filters['user_id'])) {
            $q->where('user_id', (int) $filters['user_id']);
        }
        if (isset($filters['wallet'])) {
            $q->groupStart()->where('wallet', (string) $filters['wallet'])->orLike('detail', '"' . $filters['wallet'] . '"')->groupEnd();
        }
        if (isset($filters['transfer_id'])) {
            $q->where('transfer_id', (string) $filters['transfer_id']);
        }
        if (isset($filters['after_id'])) {
            $q->where('id >', (int) $filters['after_id']);
        }
        if (isset($filters['from'])) {
            $q->where('created_at >=', (int) $filters['from']);
        }
        if (isset($filters['to'])) {
            $q->where('created_at <=', (int) $filters['to']);
        }
        return $q->orderBy('id', 'ASC')->get(max(1, min($limit, 50000)))->getResultArray();
    }

    public function verify(): array
    {
        $prev = AuditChain::GENESIS;
        $count = 0;
        $after = 0;
        do {
            $rows = $this->db->table(self::AUDIT)->where('id >', $after)->orderBy('id', 'ASC')->get(1000)->getResultArray();
            foreach ($rows as $r) {
                $count++;
                if ($r['prev_hash'] !== $prev || !hash_equals(AuditChain::hash($prev, $r), (string) $r['row_hash'])) {
                    return ['ok' => false, 'broken_at' => (int) $r['id'], 'entries' => $count];
                }
                $prev = (string) $r['row_hash'];
                $after = (int) $r['id'];
            }
        } while (count($rows) === 1000);
        return ['ok' => true, 'entries' => $count];
    }

    public function setHold(string $scope, string $value, string $reason, string $by, int $now): int
    {
        $this->db->table(self::HOLDS)->insert(['scope' => $scope, 'value' => substr($value, 0, 64), 'reason' => mb_substr($reason, 0, 255),
            'set_by' => substr($by, 0, 64), 'set_at' => $now]);
        return (int) $this->db->insertID();
    }

    public function releaseHold(int $holdId, string $by, int $now): bool
    {
        $this->db->table(self::HOLDS)->where('id', $holdId)->where('released_at', null)
            ->update(['released_at' => $now, 'released_by' => substr($by, 0, 64)]);
        return $this->db->affectedRows() === 1;
    }

    public function activeHolds(): array
    {
        return $this->db->table(self::HOLDS)->where('released_at', null)->orderBy('id', 'ASC')->get(1000)->getResultArray();
    }

    public function isHeld(string $transferId, int $senderUserId, array $wallets): bool
    {
        $q = $this->db->table(self::HOLDS)->select('id')->where('released_at', null)->groupStart()
            ->groupStart()->where('scope', 'transfer')->where('value', $transferId)->groupEnd()
            ->orGroupStart()->where('scope', 'user')->where('value', (string) $senderUserId)->groupEnd();
        if ($wallets !== []) {
            $q->orGroupStart()->where('scope', 'wallet')->whereIn('value', array_values($wallets))->groupEnd();
        }
        return $q->groupEnd()->get(1)->getRowArray() !== null;
    }
}
