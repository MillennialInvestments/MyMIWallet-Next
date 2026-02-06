<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsWorkQueueModel extends Model
{
    protected $table = 'aiops_work_queue';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'scanner_name',
        'file_path',
        'file_hash',
        'priority',
        'status',
        'attempt_count',
        'last_error',
        'last_touched_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function enqueueIfMissing(string $scannerName, string $filePath, ?string $hash, int $priority = 100): void
    {
        $existing = $this->where('scanner_name', $scannerName)->where('file_path', $filePath)->first();
        $now = date('Y-m-d H:i:s');

        if ($existing) {
            if (($existing['file_hash'] ?? null) !== $hash || ($existing['status'] ?? '') === 'failed') {
                $this->update((int) $existing['id'], [
                    'file_hash' => $hash,
                    'priority' => $priority,
                    'status' => 'pending',
                    'last_error' => null,
                    'updated_at' => $now,
                ]);
            }

            return;
        }

        $this->insert([
            'scanner_name' => $scannerName,
            'file_path' => $filePath,
            'file_hash' => $hash,
            'priority' => $priority,
            'status' => 'pending',
            'attempt_count' => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function nextPendingBatch(string $scannerName, int $limit): array
    {
        return $this->where('scanner_name', $scannerName)
            ->where('status', 'pending')
            ->orderBy('priority', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->findAll($limit);
    }

    public function markProcessing(int $queueId): void
    {
        $now = date('Y-m-d H:i:s');
        $this->builder()
            ->set('status', 'processing')
            ->set('attempt_count', 'attempt_count + 1', false)
            ->set('last_touched_at', $now)
            ->set('updated_at', $now)
            ->where('id', $queueId)
            ->update();
    }

    public function markCompleted(int $queueId): void
    {
        $this->update($queueId, [
            'status' => 'completed',
            'last_error' => null,
            'last_touched_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function markFailed(int $queueId, string $error): void
    {
        $this->update($queueId, [
            'status' => 'failed',
            'last_error' => mb_substr($error, 0, 65000),
            'last_touched_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function clearScanner(string $scannerName): void
    {
        $this->where('scanner_name', $scannerName)->delete();
    }

    public function countByStatus(string $scannerName): array
    {
        $rows = $this->select('status, COUNT(*) as total')
            ->where('scanner_name', $scannerName)
            ->groupBy('status')
            ->findAll();

        $out = [];
        foreach ($rows as $row) {
            $out[(string) $row['status']] = (int) $row['total'];
        }

        return $out;
    }
}
