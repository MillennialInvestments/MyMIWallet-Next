<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ContentIdeaModel extends Model
{
    protected $table = 'bf_content_ideas';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'ingest_id',
        'symbol',
        'score_total',
        'tier',
        'reasons_json',
        'recommended_platforms_json',
        'status',
        'created_at',
        'updated_at',
    ];
}
