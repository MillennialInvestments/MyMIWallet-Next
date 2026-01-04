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
        'output_json',
        'output_text',
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
            $data['output_json'] = $data['result_json'];
            if (isset($result['output_text'])) {
                $data['output_text'] = is_scalar($result['output_text'])
                    ? (string) $result['output_text']
                    : json_encode($result['output_text'], JSON_UNESCAPED_SLASHES);
            } elseif (isset($result['report_markdown'])) {
                $data['output_text'] = (string) $result['report_markdown'];
            }
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

    public function updateOutputTextByRunId(int $runId, string $markdown): void
    {
        $this->update($runId, [
            'output_text' => $markdown,
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);
    }

    public function updateOutputTextByQueueId(int $queueId, string $markdown): void
    {
        $run = $this->where('queue_id', $queueId)->orderBy('id', 'DESC')->first();
        if ($run) {
            $this->updateOutputTextByRunId((int) $run['id'], $markdown);
        }
    }

    public function findByQueueId(int $queueId): ?array
    {
        return $this->where('queue_id', $queueId)
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
