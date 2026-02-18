<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialGeneratedPostModel extends Model
{
    protected $table         = 'bf_social_generated_posts';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'source_type',
        'source_id',
        'platform_id',
        'community_id',
        'template_id',
        'post_title',
        'post_body',
        'hashtags',
        'tickers',
        'cta_link',
        'status',
        'posted_at',
        'external_post_url',
        'error',
    ];

    public function findBySource(string $sourceType, int $sourceId): array
    {
        return $this->where([
            'source_type' => $sourceType,
            'source_id'   => $sourceId,
        ])->findAll(20);
    }
}
