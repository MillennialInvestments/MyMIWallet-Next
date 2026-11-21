<?php

namespace App\Libraries\SecureTransfer;

use CodeIgniter\Database\BaseConnection;

/** MySQL/SQLite store for Secure Transfer metadata (tables from CreateSecureTransferTables). */
final class DbTransferStore implements TransferStore
{
    private const CHALLENGES = 'bf_secure_transfer_challenges';
    private const KEYS = 'bf_secure_transfer_keys';
    private const TRANSFERS = 'bf_secure_transfers';
    private const RECIPIENTS = 'bf_secure_transfer_recipients';

    public function __construct(private BaseConnection $db)
    {
    }

    public function createChallenge(int $userId, string $wallet, string $nonce, int $expiresAt): void
    {
        $this->db->table(self::CHALLENGES)->where('expires_at <', time() - 86400)->delete();
        $this->db->table(self::CHALLENGES)->insert(['nonce' => $nonce, 'user_id' => $userId, 'wallet' => $wallet, 'expires_at' => $expiresAt]);
    }

    public function consumeChallenge(int $userId, string $wallet, string $nonce, int $now): bool
    {
        // One conditional UPDATE, so two parallel requests cannot both use the nonce.
        $this->db->table(self::CHALLENGES)
            ->where(['nonce' => $nonce, 'user_id' => $userId, 'wallet' => $wallet])
            ->where('used_at', null)
            ->where('expires_at >=', $now)
            ->update(['used_at' => $now]);
        return $this->db->affectedRows() === 1;
    }

    public function walletOwner(string $wallet): ?int
    {
        $row = $this->db->table(self::KEYS)->select('user_id')->where('wallet', $wallet)->where('revoked_at', null)
            ->orderBy('id', 'ASC')->get(1)->getRowArray();
        return $row ? (int) $row['user_id'] : null;
    }

    public function addKey(int $userId, string $wallet, string $transferKey, string $statement, string $signature, int $now): void
    {
        $this->db->table(self::KEYS)->insert(['user_id' => $userId, 'wallet' => $wallet, 'transfer_key' => $transferKey,
            'statement' => $statement, 'signature' => $signature, 'created_at' => $now]);
    }

    public function activeKeys(string $wallet): array
    {
        $rows = $this->db->table(self::KEYS)->select('wallet, transfer_key, created_at, statement, signature')
            ->where('wallet', $wallet)->where('revoked_at', null)->orderBy('id', 'ASC')->get(50)->getResultArray();
        return array_map(static fn ($r) => ['wallet' => $r['wallet'], 'transfer_key' => $r['transfer_key'], 'created_at' => (int) $r['created_at'],
            'statement' => $r['statement'], 'signature' => $r['signature']], $rows);
    }

    public function keysForUser(int $userId): array
    {
        $rows = $this->db->table(self::KEYS)->select('wallet, transfer_key, created_at')
            ->where('user_id', $userId)->where('revoked_at', null)->orderBy('id', 'ASC')->get(100)->getResultArray();
        return array_map(static fn ($r) => ['wallet' => $r['wallet'], 'transfer_key' => $r['transfer_key'], 'created_at' => (int) $r['created_at']], $rows);
    }

    public function revokeKey(int $userId, string $wallet, string $transferKey, int $now): int
    {
        $this->db->table(self::KEYS)->where(['user_id' => $userId, 'wallet' => $wallet, 'transfer_key' => $transferKey])
            ->where('revoked_at', null)->update(['revoked_at' => $now]);
        return $this->db->affectedRows();
    }

    public function senderUsage(int $userId, int $since): array
    {
        $row = $this->db->table(self::TRANSFERS)->select('COUNT(*) AS n, COALESCE(SUM(ciphertext_bytes), 0) AS b')
            ->where('sender_user_id', $userId)->where('created_at >=', $since)->get()->getRowArray();
        return [(int) ($row['n'] ?? 0), (int) ($row['b'] ?? 0)];
    }

    public function transferExists(string $transferId): bool
    {
        return $this->db->table(self::TRANSFERS)->where('transfer_id', $transferId)->countAllResults() > 0;
    }

    public function saveTransfer(int $senderUserId, array $manifest, string $signature, array $recipientWallets, int $now): bool
    {
        $this->db->transStart();
        $this->db->table(self::TRANSFERS)->insert([
            'transfer_id' => $manifest['transfer_id'], 'sender_user_id' => $senderUserId, 'sender_wallet' => $manifest['sender_wallet'],
            'manifest' => TransferCrypto::canonicalJson($manifest), 'signature' => $signature,
            'ciphertext_bytes' => $manifest['ciphertext_bytes'], 'created_at' => $now, 'expires_at' => $manifest['expires_at'],
        ]);
        foreach ($recipientWallets as $w) {
            $this->db->table(self::RECIPIENTS)->insert(['transfer_id' => $manifest['transfer_id'], 'wallet' => $w]);
        }
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function inbox(array $wallets, int $now): array
    {
        $rows = $this->db->table(self::RECIPIENTS . ' r')
            ->select('t.transfer_id, t.sender_wallet, t.ciphertext_bytes, t.created_at, t.expires_at, r.wallet, r.downloaded_at')
            ->join(self::TRANSFERS . ' t', 't.transfer_id = r.transfer_id')
            ->whereIn('r.wallet', $wallets)->where('t.revoked_at', null)->where('t.purged_at', null)->where('t.expires_at >', $now)
            ->orderBy('t.created_at', 'DESC')->get(200)->getResultArray();
        return array_map([$this, 'ints'], $rows);
    }

    public function outbox(int $userId, int $now): array
    {
        $rows = $this->db->table(self::TRANSFERS)
            ->select('transfer_id, sender_wallet, ciphertext_bytes, created_at, expires_at, revoked_at')
            ->where('sender_user_id', $userId)->where('purged_at', null)->orderBy('created_at', 'DESC')->get(200)->getResultArray();
        $out = [];
        foreach ($rows as $row) {
            $row = $this->ints($row);
            $row['recipients'] = array_column($this->db->table(self::RECIPIENTS)->select('wallet')
                ->where('transfer_id', $row['transfer_id'])->get(50)->getResultArray(), 'wallet');
            $out[] = $row;
        }
        return $out;
    }

    public function transferForRecipient(string $transferId, string $wallet, int $now): ?array
    {
        $row = $this->db->table(self::TRANSFERS . ' t')->select('t.manifest, t.signature')
            ->join(self::RECIPIENTS . ' r', 'r.transfer_id = t.transfer_id')
            ->where(['t.transfer_id' => $transferId, 'r.wallet' => $wallet])
            ->where('t.revoked_at', null)->where('t.purged_at', null)->where('t.expires_at >', $now)
            ->get(1)->getRowArray();
        if (!$row) {
            return null;
        }
        $manifest = json_decode($row['manifest'], true);
        return is_array($manifest) ? ['manifest' => $manifest, 'signature' => $row['signature']] : null;
    }

    public function markDownloaded(string $transferId, string $wallet, int $now): void
    {
        $this->db->table(self::RECIPIENTS)->where(['transfer_id' => $transferId, 'wallet' => $wallet])
            ->where('downloaded_at', null)->update(['downloaded_at' => $now]);
    }

    public function revokeTransfer(string $transferId, int $senderUserId, int $now): int
    {
        $this->db->table(self::TRANSFERS)->where(['transfer_id' => $transferId, 'sender_user_id' => $senderUserId])
            ->where('revoked_at', null)->update(['revoked_at' => $now]);
        return $this->db->affectedRows();
    }

    public function purgeable(int $now): array
    {
        $rows = $this->db->table(self::TRANSFERS)->select('transfer_id')->where('purged_at', null)
            ->groupStart()->where('revoked_at IS NOT NULL', null, false)->orWhere('expires_at <=', $now)->groupEnd()
            ->get(1000)->getResultArray();
        return array_column($rows, 'transfer_id');
    }

    public function markPurged(string $transferId, int $now): void
    {
        $this->db->table(self::TRANSFERS)->where('transfer_id', $transferId)->where('purged_at', null)->update(['purged_at' => $now]);
    }

    public function stats(int $now): array
    {
        $live = $this->db->table(self::TRANSFERS)->select('COUNT(*) AS n, COALESCE(SUM(ciphertext_bytes), 0) AS b')
            ->where('revoked_at', null)->where('purged_at', null)->where('expires_at >', $now)->get()->getRowArray();
        $day = $this->db->table(self::TRANSFERS)->where('created_at >', $now - 86400)->countAllResults();
        $wallets = $this->db->table(self::KEYS)->select('COUNT(DISTINCT wallet) AS n')->where('revoked_at', null)->get()->getRowArray();
        return ['live_transfers' => (int) ($live['n'] ?? 0), 'live_ciphertext_bytes' => (int) ($live['b'] ?? 0),
            'transfers_last_24h' => $day, 'wallets_with_keys' => (int) ($wallets['n'] ?? 0)];
    }

    private function ints(array $row): array
    {
        foreach (['ciphertext_bytes', 'created_at', 'expires_at', 'downloaded_at', 'revoked_at'] as $k) {
            if (array_key_exists($k, $row) && $row[$k] !== null) {
                $row[$k] = (int) $row[$k];
            }
        }
        return $row;
    }
}
