<?php

namespace App\Modules\APIs\Models;

use CodeIgniter\Model;

class MarketingNewsContentModel extends Model
{
    protected $table      = 'bf_marketing_news_content';
    protected $primaryKey = 'id';

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'source_email',
        'provider',
        'headline',
        'subject',
        'body',
        'category',
        'status',
        'received_at',
    ];
}