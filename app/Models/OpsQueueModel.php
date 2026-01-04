<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;

class OpsQueueModel extends Model
{
    protected $table          = 'bf_ops_queue';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'job_key',
        'payload_json',
        'status',
        'attempts',
        'locked_until',
        'last_error',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function enqueue(string $jobKey, array $payload = []): int
    {
        return $this->insert([
            'job_key'      => $jobKey,
            'payload_json' => $payload === [] ? null : json_encode($payload, JSON_UNESCAPED_SLASHES),
            'status'       => 'pending',
            'attempts'     => 0,
        ], true);
    }

    /**
     * Claim pending jobs up to the provided limit with a simple lock window.
     *
     * @return array<int,array<string,mixed>>
     */
    public function claimPending(int $limit, int $lockSeconds = 300): array
    {
        /** @var BaseConnection $db */
        $db = $this->db;
        $db->transStart();

        $now = date('Y-m-d H:i:s');
        $rows = $db->table($this->table)
            ->where('status', 'pending')
            ->groupStart()
                ->where('locked_until IS NULL', null, false)
                ->orWhere('locked_until <', $now)
            ->groupEnd()
            ->orderBy('id', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $claimed = [];
        $lockUntil = date('Y-m-d H:i:s', time() + $lockSeconds);

        foreach ($rows as $row) {
            $db->table($this->table)
                ->where('id', $row['id'])
                ->update([
                    'status'       => 'running',
                    'attempts'     => (int) $row['attempts'] + 1,
                    'locked_until' => $lockUntil,
                    'updated_at'   => $now,
                ]);
            $row['status']       = 'running';
            $row['attempts']     = (int) $row['attempts'] + 1;
            $row['locked_until'] = $lockUntil;
            $claimed[] = $row;
        }

        $db->transComplete();

        return $claimed;
    }

    public function markCompleted(int $queueId): void
    {
        $this->update($queueId, [
            'status'       => 'completed',
            'locked_until' => null,
            'last_error'   => null,
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    public function markFailed(int $queueId, string $error, bool $retryable = false): void
    {
        $data = [
            'last_error'   => $error,
            'locked_until' => null,
            'updated_at'   => date('Y-m-d H:i:s'),
        ];

        if ($retryable) {
            $data['status'] = 'pending';
        } else {
            $data['status'] = 'failed';
        }

        $this->update($queueId, $data);
    }

    /**
     * @return array<string,int>
     */
    public function statusCounts(): array
    {
        $builder = $this->builder();
        $builder->select('status, COUNT(*) as total');
        $builder->groupBy('status');
        $result = $builder->get()->getResultArray();

        $counts = [
            'pending'   => 0,
            'running'   => 0,
            'completed' => 0,
            'failed'    => 0,
        ];

        foreach ($result as $row) {
            $counts[$row['status']] = (int) $row['total'];
        }

        return $counts;
    }
}
