<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialPostTemplateModel extends Model
{
    protected $table         = 'bf_social_post_templates';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'platform_id',
        'template_key',
        'title',
        'max_chars',
        'hashtag_limit',
        'supports_links',
        'supports_mentions',
        'supports_tickers',
        'rules_json',
        'body_template',
    ];

    public function findByPlatform(int $platformId): array
    {
        return $this->where('platform_id', $platformId)->orderBy('template_key', 'ASC')->findAll(20);
    }

    public function findByPlatformAndKey(int $platformId, string $templateKey): ?array
    {
        return $this->where([
            'platform_id'  => $platformId,
            'template_key' => $templateKey,
        ])->first();
    }
}
