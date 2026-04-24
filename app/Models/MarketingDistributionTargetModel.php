<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingDistributionTargetModel extends Model
{
    protected $table = 'bf_marketing_distribution_targets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';

    protected $allowedFields = [
        'generated_content_id',
        'story_id',
        'channel',
        'destination',
        'payload_json',
        'status',
        'idempotency_key',
        'attempt_count',
        'max_attempts',
        'http_status',
        'failure_class',
        'response_excerpt',
        'response_headers',
        'response_body',
        'locked_at',
        'locked_by',
        'next_retry_at',
        'last_attempt_at',
        'queued_at',
        'sent_at',
        'failed_at',
        'response_json',
        'external_id',
        'external_uri',
        'error_message',
        'retry_count',
        'created_on',
        'modified_on',
    ];
}
