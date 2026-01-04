<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsRunsModel extends Model
{
    protected $table          = 'bf_ops_job_runs';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'job_id',
        'queue_id',
        'status',
        'attempts',
        'payload_json',
        'result_json',
        'last_error',
        'started_at',
        'finished_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function startRun(int $jobId, ?int $queueId, int $attempts, ?array $payload): int
    {
        return $this->insert([
            'job_id'       => $jobId,
            'queue_id'     => $queueId,
            'attempts'     => $attempts,
            'payload_json' => $payload ? json_encode($payload, JSON_UNESCAPED_SLASHES) : null,
            'status'       => 'running',
            'started_at'   => date('Y-m-d H:i:s'),
        ], true);
    }

    public function finishRun(int $runId, string $status, ?array $result = null, ?string $error = null): void
    {
        $data = [
            'status'      => $status,
            'finished_at' => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        if ($result !== null) {
            $data['result_json'] = json_encode($result, JSON_UNESCAPED_SLASHES);
        }

        if ($error !== null) {
            $data['last_error'] = $error;
        }

        $this->update($runId, $data);
    }

    public function lastRunForJob(int $jobId): ?array
    {
        return $this->where('job_id', $jobId)
            ->orderBy('started_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->first();
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public function recentRuns(int $limit = 20): array
    {
        return $this->orderBy('started_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
