<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsTaskRunModel extends Model
{
    protected $table = 'bf_aiops_task_runs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'task_id',
        'status',
        'stdout',
        'stderr',
        'exit_code',
        'result_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param array<string, mixed>|string|null $resultJson
     */
    public function writeRunLog(int $taskId, string $stdout, string $stderr, ?int $exitCode, $resultJson): int
    {
        helper('json_validation');

        $payload = aiops_normalize_json($resultJson);
        $status = ($exitCode === null || $exitCode === 0) ? 'success' : 'failed';

        return (int) $this->insert([
            'task_id' => $taskId,
            'status' => $status,
            'stdout' => $stdout,
            'stderr' => $stderr,
            'exit_code' => $exitCode,
            'result_json' => $payload,
        ], true);
    }
}
