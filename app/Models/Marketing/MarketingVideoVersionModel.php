<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

class MarketingVideoVersionModel extends Model
{
    protected $table = 'bf_marketing_video_versions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'video_content_id', 'version_data_json', 'edited_by', 'edit_note', 'created_at',
    ];
}
