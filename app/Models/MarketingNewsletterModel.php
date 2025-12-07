<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingNewsletterModel extends Model
{
    protected $table            = 'bf_marketing_newsletters';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'title',
        'slug',
        'subject',
        'body_html',
        'status',
        'week_start_date',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;
}
