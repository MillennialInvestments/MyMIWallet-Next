<?php
namespace App\Models;

use CodeIgniter\Model;

class AlertJobModel extends Model
{
    protected $table = 'bf_investment_alert_jobs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'type',
        'payload',
        'status',
        'attempts',
        'last_error',
        'available_at',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function enqueueJob(string $type, array $payload = [], string $status = 'pending'): int
    {
        $data = [
            'type'    => $type,
            'payload' => $this->encodePayload($payload),
            'status'  => $status,
        ];

        $this->insert($data, true);
        return (int) $this->getInsertID();
    }

    public function fetchForProcessing(string $type, int $limit = 20): array
    {
        $builder = $this->builder();
        $builder
            ->where('type', $type)
            ->where('status', 'pending')
            ->groupStart()
                ->where('available_at IS NULL', null, false)
                ->orWhere('available_at <=', date('Y-m-d H:i:s'))
            ->groupEnd()
            ->orderBy('id', 'ASC')
            ->limit($limit);

        $jobs = $builder->get()->getResultArray();
        if (empty($jobs)) {
            return [];
        }

        $ids = array_column($jobs, 'id');
        $this->builder()
            ->whereIn('id', $ids)
            ->set('status', 'processing')
            ->set('attempts', 'attempts + 1', false)
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->update();

        return $jobs;
    }

    public function markCompleted(int $jobId): bool
    {
        return (bool) $this->update($jobId, [
            'status'     => 'completed',
            'last_error' => null,
        ]);
    }

    public function markFailed(int $jobId, string $error, bool $giveUp = false): bool
    {
        $status = $giveUp ? 'failed' : 'pending';
        return (bool) $this->update($jobId, [
            'status'     => $status,
            'last_error' => mb_substr($error, 0, 2000),
        ]);
    }

    protected function encodePayload(array $payload): string
    {
        $json = json_encode($payload, JSON_UNESCAPED_SLASHES);
        return $json === false ? '[]' : $json;
    }
}