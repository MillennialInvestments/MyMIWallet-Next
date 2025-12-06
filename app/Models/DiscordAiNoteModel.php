<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscordAiNoteModel extends Model
{
    protected $table         = 'bf_discord_ai_notes';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'user_id',
        'discord_user_id',
        'title',
        'note_type',
        'content',
        'tags',
        'encrypted',
        'created_at',
        'updated_at',
    ];

    protected $useSoftDeletes = false;
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function forUser(?int $userId, ?string $discordUserId = null): array
    {
        $builder = $this->where('1 = 1');
        if ($userId) {
            $builder->where('user_id', $userId);
        }
        if ($discordUserId) {
            $builder->where('discord_user_id', $discordUserId);
        }

        return $builder
            ->orderBy('updated_at', 'DESC')
            ->limit(50)
            ->find();
    }
}