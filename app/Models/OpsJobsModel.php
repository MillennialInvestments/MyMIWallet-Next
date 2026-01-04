<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsJobsModel extends Model
{
    protected $table            = 'bf_ops_jobs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'job_key',
        'name',
        'description',
        'handler',
        'max_attempts',
        'is_enabled',
        'last_run_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function findByKey(string $jobKey): ?array
    {
        return $this->where('job_key', $jobKey)->first();
    }

    public function touchLastRun(int $jobId): void
    {
        $this->update($jobId, [
            'last_run_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
