<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

class MarketingVideoAssetModel extends Model
{
    protected $table = 'bf_marketing_video_assets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'video_content_id', 'asset_type', 'asset_path', 'asset_url', 'asset_label', 'sort_order',
    ];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function forContent(int $contentId): array
    {
        return $this->where('video_content_id', $contentId)->orderBy('sort_order', 'ASC')->findAll();
    }
}
