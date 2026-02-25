<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OllamaQueueModel extends Model
{
    protected $table = 'bf_ollama_queue';
    protected $primaryKey = 'job_id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'type',
        'priority',
        'payload_json',
        'status',
        'attempts',
        'last_error',
        'lease_until',
        'created_at',
        'updated_at',
    ];
}
