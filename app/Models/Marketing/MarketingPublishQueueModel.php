<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

class MarketingPublishQueueModel extends Model
{
    protected $table = 'bf_marketing_publish_queue';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'video_content_id', 'platform', 'payload_json', 'scheduled_for', 'status', 'error',
    ];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
