<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

class MarketingVideoTemplateModel extends Model
{
    protected $table = 'bf_marketing_video_templates';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'template_name', 'platform', 'video_type', 'hook_template', 'body_template', 'cta_template',
        'caption_template', 'overlay_template_json', 'scene_template_json', 'meta_json', 'is_active',
    ];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function activeForPlatform(?string $platform = null): array
    {
        $builder = $this->where('is_active', 1);
        if ($platform) {
            $builder->where('platform', $platform);
        }

        return $builder->orderBy('template_name', 'ASC')->findAll();
    }
}
