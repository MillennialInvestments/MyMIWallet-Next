<?php

namespace App\Libraries\SecureTransfer;

/** In-memory store with the same rules as DbTransferStore. For tests and dry runs. */
final class ArrayTransferStore implements TransferStore
{
    public array $challenges = [];
    public array $keys = [];
    public array $transfers = [];
    public array $recipients = [];

    public function createChallenge(int $userId, string $wallet, string $nonce, int $expiresAt): void
    {
        $this->challenges[$nonce] = ['user_id' => $userId, 'wallet' => $wallet, 'expires_at' => $expiresAt, 'used' => false];
    }

    public function consumeChallenge(int $userId, string $wallet, string $nonce, int $now): bool
    {
        $c = $this->challenges[$nonce] ?? null;
        if ($c === null || $c['used'] || $c['user_id'] !== $userId || $c['wallet'] !== $wallet || $c['expires_at'] < $now) {
            return false;
        }
        $this->challenges[$nonce]['used'] = true;
        return true;
    }

    public function walletOwner(string $wallet): ?int
    {
        foreach ($this->keys as $k) {
            if ($k['wallet'] === $wallet && $k['revoked_at'] === null) {
                return $k['user_id'];
            }
        }
        return null;
    }

    public function addKey(int $userId, string $wallet, string $transferKey, string $statement, string $signature, int $now): void
    {
        $this->keys[] = ['user_id' => $userId, 'wallet' => $wallet, 'transfer_key' => $transferKey, 'statement' => $statement,
            'signature' => $signature, 'created_at' => $now, 'revoked_at' => null];
    }

    public function activeKeys(string $wallet): array
    {
        $out = [];
        foreach ($this->keys as $k) {
            if ($k['wallet'] === $wallet && $k['revoked_at'] === null) {
                $out[] = ['wallet' => $k['wallet'], 'transfer_key' => $k['transfer_key'], 'created_at' => $k['created_at'],
                    'statement' => $k['statement'], 'signature' => $k['signature']];
            }
        }
        return $out;
    }

    public function keysForUser(int $userId): array
    {
        $out = [];
        foreach ($this->keys as $k) {
            if ($k['user_id'] === $userId && $k['revoked_at'] === null) {
                $out[] = ['wallet' => $k['wallet'], 'transfer_key' => $k['transfer_key'], 'created_at' => $k['created_at']];
            }
        }
        return $out;
    }

    public function revokeKey(int $userId, string $wallet, string $transferKey, int $now): int
    {
        $n = 0;
        foreach ($this->keys as $i => $k) {
            if ($k['user_id'] === $userId && $k['wallet'] === $wallet && $k['transfer_key'] === $transferKey && $k['revoked_at'] === null) {
                $this->keys[$i]['revoked_at'] = $now;
                $n++;
            }
        }
        return $n;
    }

    public function senderUsage(int $userId, int $since): array
    {
        $count = $bytes = 0;
        foreach ($this->transfers as $t) {
            if ($t['sender_user_id'] === $userId && $t['created_at'] >= $since) {
                $count++;
                $bytes += $t['ciphertext_bytes'];
            }
        }
        return [$count, $bytes];
    }

    public function transferExists(string $transferId): bool
    {
        return isset($this->transfers[$transferId]);
    }

    public function saveTransfer(int $senderUserId, array $manifest, string $signature, array $recipientWallets, int $now): bool
    {
        $id = $manifest['transfer_id'];
        if (isset($this->transfers[$id])) {
            return false;
        }
        $this->transfers[$id] = ['transfer_id' => $id, 'sender_user_id' => $senderUserId, 'sender_wallet' => $manifest['sender_wallet'],
            'manifest' => $manifest, 'signature' => $signature, 'ciphertext_bytes' => $manifest['ciphertext_bytes'],
            'created_at' => $now, 'expires_at' => $manifest['expires_at'], 'revoked_at' => null, 'purged_at' => null];
        foreach ($recipientWallets as $w) {
            $this->recipients[$id][$w] = ['downloaded_at' => null];
        }
        return true;
    }

    private function live(array $t, int $now): bool
    {
        return $t['revoked_at'] === null && $t['purged_at'] === null && $t['expires_at'] > $now;
    }

    private function summary(array $t, ?string $wallet = null): array
    {
        $row = ['transfer_id' => $t['transfer_id'], 'sender_wallet' => $t['sender_wallet'], 'ciphertext_bytes' => $t['ciphertext_bytes'],
            'created_at' => $t['created_at'], 'expires_at' => $t['expires_at']];
        if ($wallet !== null) {
            $row['wallet'] = $wallet;
            $row['downloaded_at'] = $this->recipients[$t['transfer_id']][$wallet]['downloaded_at'];
        } else {
            $row['recipients'] = array_keys($this->recipients[$t['transfer_id']] ?? []);
            $row['revoked_at'] = $t['revoked_at'];
        }
        return $row;
    }

    public function inbox(array $wallets, int $now): array
    {
        $out = [];
        foreach ($this->transfers as $id => $t) {
            foreach ($wallets as $w) {
                if (isset($this->recipients[$id][$w]) && $this->live($t, $now)) {
                    $out[] = $this->summary($t, $w);
                }
            }
        }
        usort($out, fn ($a, $b) => $b['created_at'] <=> $a['created_at']);
        return $out;
    }

    public function outbox(int $userId, int $now): array
    {
        $out = [];
        foreach ($this->transfers as $t) {
            if ($t['sender_user_id'] === $userId && $t['purged_at'] === null) {
                $out[] = $this->summary($t);
            }
        }
        usort($out, fn ($a, $b) => $b['created_at'] <=> $a['created_at']);
        return $out;
    }

    public function transferForRecipient(string $transferId, string $wallet, int $now): ?array
    {
        $t = $this->transfers[$transferId] ?? null;
        if ($t === null || !isset($this->recipients[$transferId][$wallet]) || !$this->live($t, $now)) {
            return null;
        }
        return ['manifest' => $t['manifest'], 'signature' => $t['signature']];
    }

    public function markDownloaded(string $transferId, string $wallet, int $now): void
    {
        if (isset($this->recipients[$transferId][$wallet]) && $this->recipients[$transferId][$wallet]['downloaded_at'] === null) {
            $this->recipients[$transferId][$wallet]['downloaded_at'] = $now;
        }
    }

    public function revokeTransfer(string $transferId, int $senderUserId, int $now): int
    {
        $t = $this->transfers[$transferId] ?? null;
        if ($t === null || $t['sender_user_id'] !== $senderUserId || $t['revoked_at'] !== null) {
            return 0;
        }
        $this->transfers[$transferId]['revoked_at'] = $now;
        return 1;
    }

    public function purgeable(int $now): array
    {
        $out = [];
        foreach ($this->transfers as $id => $t) {
            if ($t['purged_at'] === null && ($t['revoked_at'] !== null || $t['expires_at'] <= $now)) {
                $out[] = $id;
            }
        }
        return $out;
    }

    public function markPurged(string $transferId, int $now): void
    {
        if (isset($this->transfers[$transferId])) {
            $this->transfers[$transferId]['purged_at'] = $now;
        }
    }

    public function stats(int $now): array
    {
        $live = $bytes = $day = 0;
        foreach ($this->transfers as $t) {
            if ($this->live($t, $now)) {
                $live++;
                $bytes += $t['ciphertext_bytes'];
            }
            if ($t['created_at'] > $now - 86400) {
                $day++;
            }
        }
        $wallets = [];
        foreach ($this->keys as $k) {
            if ($k['revoked_at'] === null) {
                $wallets[$k['wallet']] = true;
            }
        }
        return ['live_transfers' => $live, 'live_ciphertext_bytes' => $bytes, 'transfers_last_24h' => $day, 'wallets_with_keys' => count($wallets)];
    }
}
