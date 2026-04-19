<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class MobileAuthTokenModel extends Model
{
    protected $table = 'bf_mobile_auth_tokens';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id',
        'token_prefix',
        'token_hash',
        'device_name',
        'last_used_at',
        'expires_at',
        'revoked_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function findActiveToken(string $tokenHash): ?array
    {
        $now = date('Y-m-d H:i:s');

        return $this->where('token_hash', $tokenHash)
            ->where('revoked_at', null)
            ->groupStart()
                ->where('expires_at', null)
                ->orWhere('expires_at >', $now)
            ->groupEnd()
            ->first();
    }

    public function revokeByTokenHash(string $tokenHash): bool
    {
        return (bool) $this->where('token_hash', $tokenHash)->set('revoked_at', date('Y-m-d H:i:s'))->update();
    }

    public function revokeAllForUser(int $userId): bool
    {
        return (bool) $this->where('user_id', $userId)->set('revoked_at', date('Y-m-d H:i:s'))->update();
    }
}
