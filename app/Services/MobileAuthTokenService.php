<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\MobileAuthTokenModel;

class MobileAuthTokenService
{
    public function __construct(private readonly MobileAuthTokenModel $tokens = new MobileAuthTokenModel())
    {
    }

    public function issueToken(int $userId, string $deviceName = 'mobile-app', int $ttlDays = 30): array
    {
        $plain = bin2hex(random_bytes(32));
        $prefix = substr($plain, 0, 12);
        $hash = hash('sha256', $plain);
        $now = date('Y-m-d H:i:s');
        $expiresAt = date('Y-m-d H:i:s', strtotime('+' . max(1, $ttlDays) . ' days'));

        $this->tokens->insert([
            'user_id' => $userId,
            'token_prefix' => $prefix,
            'token_hash' => $hash,
            'device_name' => $deviceName,
            'created_at' => $now,
            'updated_at' => $now,
            'last_used_at' => $now,
            'expires_at' => $expiresAt,
        ]);

        return [
            'access_token' => $plain,
            'token_type' => 'Bearer',
            'expires_at' => $expiresAt,
        ];
    }

    public function verifyPlainToken(string $plainToken): ?array
    {
        $tokenHash = hash('sha256', $plainToken);
        return $this->tokens->findActiveToken($tokenHash);
    }

    public function touch(int $tokenId): void
    {
        $this->tokens->update($tokenId, [
            'last_used_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function revokePlainToken(string $plainToken): bool
    {
        return $this->tokens->revokeByTokenHash(hash('sha256', $plainToken));
    }

    public function revokeAllForUser(int $userId): bool
    {
        return $this->tokens->revokeAllForUser($userId);
    }
}
