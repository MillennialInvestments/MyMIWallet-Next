<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

class MarketingVideoContentModel extends Model
{
    protected $table = 'bf_marketing_video_content';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'source_type', 'source_id', 'platform', 'video_type', 'content_category', 'topic', 'symbol',
        'title', 'hook', 'intro_text', 'body_text', 'insight_text', 'cta_text', 'caption', 'hashtags',
        'voiceover_script', 'overlay_text_json', 'scene_plan_json', 'asset_plan_json', 'platform_adaptations_json',
        'thumbnail_text', 'promo_link', 'audience', 'tone', 'duration_target', 'target_publish_window',
        'creator_editor', 'status', 'generated_by', 'approved_by', 'scheduled_for', 'posted_at',
    ];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getQueue(array $filters = [], int $limit = 50): array
    {
        $builder = $this->builder();
        if (! empty($filters['platform'])) {
            $builder->where('platform', $filters['platform']);
        }
        if (! empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }
        if (! empty($filters['content_type'])) {
            $builder->where('video_type', $filters['content_type']);
        }
        if (! empty($filters['symbol_topic'])) {
            $needle = trim((string) $filters['symbol_topic']);
            $builder->groupStart()
                ->like('symbol', $needle)
                ->orLike('topic', $needle)
                ->orLike('title', $needle)
                ->groupEnd();
        }
        if (! empty($filters['creator_editor'])) {
            $builder->like('creator_editor', $filters['creator_editor']);
        }
        if (! empty($filters['date_from'])) {
            $builder->where('DATE(created_at) >=', $filters['date_from']);
        }
        if (! empty($filters['date_to'])) {
            $builder->where('DATE(created_at) <=', $filters['date_to']);
        }

        return $builder->orderBy('updated_at', 'DESC')->limit($limit)->get()->getResultArray();
    }
}
