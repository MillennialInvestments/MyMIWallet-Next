<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialPlatformModel extends Model
{
    protected $table            = 'bf_social_platforms';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'platform_key',
        'display_name',
        'base_url',
        'supports_groups',
        'supports_short_video',
        'supports_long_video',
        'supports_live',
        'supports_polls',
        'supports_threads',
    ];

    public function findByKey(string $platformKey): ?array
    {
        return $this->where('platform_key', $platformKey)->first();
    }
}
