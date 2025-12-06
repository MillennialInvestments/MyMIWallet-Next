<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Exception;

class DiscordLinkModel extends Model
{
    protected $table            = 'bf_discord_links';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $allowedFields    = [
        'user_id',
        'discord_user_id',
        'discord_username',
        'link_token',
        'token_expires_at',
        'linked_at',
        'status',
        'ai_persona',
        'last_seen_at',
        'scopes_json',
    ];

    public function issueToken(string $discordId, string $discordUsername, int $ttlSeconds = 900): array
    {
        $token   = bin2hex(random_bytes(16));
        $expires = Time::now('UTC')->addSeconds($ttlSeconds);

        $this->insert([
            'discord_user_id'  => $discordId,
            'discord_username' => $discordUsername,
            'link_token'       => $token,
            'token_expires_at' => $expires->toDateTimeString(),
        ]);

        return ['token' => $token, 'expires_at' => $expires];
    }

    public function consumeToken(string $token, int $userId): array
    {
        $row = $this->where('link_token', $token)->orderBy('id', 'DESC')->first();
        if (!$row) {
            return ['status' => 'error', 'message' => 'Invalid or already used link token.'];
        }

        $now = Time::now('UTC');
        if (!empty($row['token_expires_at']) && $now->isAfter($row['token_expires_at'])) {
            return ['status' => 'error', 'message' => 'This link token has expired. Please request a new one from Discord.'];
        }

        $updates = [
            'id'               => $row['id'],
            'user_id'          => $userId,
            'link_token'       => null,
            'token_expires_at' => null,
            'linked_at'        => $now->toDateTimeString(),
        ];

        if (!empty($row['discord_user_id']) && $this->isLinkedToAnotherUser($row['discord_user_id'], $userId)) {
            return ['status' => 'error', 'message' => 'This Discord account is already linked to another user.'];
        }

        $this->save($updates);

        return ['status' => 'linked', 'discord_user_id' => $row['discord_user_id'], 'discord_username' => $row['discord_username']];
    }

    public function isLinkedToAnotherUser(string $discordId, int $userId): bool
    {
        return $this->where('discord_user_id', $discordId)
            ->where('user_id IS NOT NULL', null, false)
            ->where('user_id !=', $userId)
            ->countAllResults() > 0;
    }

    public function findByUserId(?int $userId): ?array
    {
        if (!$userId) {
            return null;
        }

        return $this->where('user_id', $userId)->orderBy('linked_at', 'DESC')->first();
    }

    public function findByDiscordId(string $discordId): ?array
    {
        return $this->where('discord_user_id', $discordId)
            ->where('user_id IS NOT NULL', null, false)
            ->orderBy('linked_at', 'DESC')
            ->first();
    }
}