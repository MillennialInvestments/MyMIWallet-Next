<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsRunModel extends Model
{
    protected $table = 'bf_aiops_runs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'run_key',
        'mailbox',
        'source_email',
        'status',
        'started_at',
        'finished_at',
        'duration_seconds',
        'scanned_count',
        'processed_count',
        'duplicate_count',
        'ticker_count',
        'meta_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param array<string, mixed>|string|null $meta
     */
    public function startRun(string $runKey, string $mailbox, ?string $sourceEmail, $meta = null): int
    {
        helper('json_validation');

        return (int) $this->insert([
            'run_key' => $runKey,
            'mailbox' => $mailbox,
            'source_email' => $sourceEmail,
            'status' => 'running',
            'started_at' => date('Y-m-d H:i:s'),
            'meta_json' => aiops_normalize_json($meta),
        ], true);
    }

    /**
     * @param array<string, mixed>|string|null $meta
     */
    public function finishRun(int $id, string $status, array $counts, $meta = null): bool
    {
        helper('json_validation');

        $payload = [
            'status' => $status,
            'finished_at' => date('Y-m-d H:i:s'),
            'duration_seconds' => $counts['duration_seconds'] ?? null,
            'scanned_count' => $counts['scanned_count'] ?? 0,
            'processed_count' => $counts['processed_count'] ?? 0,
            'duplicate_count' => $counts['duplicate_count'] ?? 0,
            'ticker_count' => $counts['ticker_count'] ?? 0,
            'meta_json' => aiops_normalize_json($meta),
        ];

        return (bool) $this->update($id, $payload);
    }
}
