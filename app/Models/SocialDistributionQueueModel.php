<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialDistributionQueueModel extends Model
{
    protected $table         = 'bf_social_distribution_queue';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'generated_post_id',
        'channel_key',
        'payload_json',
        'status',
        'attempts',
        'last_error',
    ];

    public function pending(): array
    {
        return $this->where('status', 'pending')->findAll(20);
    }
}
