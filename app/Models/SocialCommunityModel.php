<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialCommunityModel extends Model
{
    protected $table         = 'bf_social_communities';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'platform_id',
        'community_name',
        'community_type',
        'community_url',
        'join_url',
        'invite_code',
        'is_primary',
        'status',
        'notes',
    ];

    public function forPlatform(int $platformId): array
    {
        return $this->where('platform_id', $platformId)->orderBy('is_primary', 'DESC')->findAll();
    }
}
