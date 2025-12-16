<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ContentPostModel extends Model
{
    protected $table = 'bf_content_posts';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'idea_id',
        'platform',
        'title',
        'body',
        'hashtags',
        'cta',
        'payload_json',
        'status',
        'last_error',
        'created_at',
        'updated_at',
    ];
}