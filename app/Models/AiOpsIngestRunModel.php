<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsIngestRunModel extends Model
{
    protected $table = 'bf_aiops_ingest_runs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'job',
        'started_at',
        'ended_at',
        'duration_ms',
        'emails_scanned',
        'new_emails',
        'duplicates',
        'alerts_created',
        'alerts_updated',
        'status',
        'error_message',
        'created_at',
    ];
    protected $useTimestamps = false;
}
