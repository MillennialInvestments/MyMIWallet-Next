<?php
namespace App\Libraries;

use App\Models\AlertJobModel;

class AlertJobQueue
{
    protected AlertJobModel $jobs;
    protected int $batchSize;
    protected int $maxAttempts;

    public function __construct(?AlertJobModel $model = null)
    {
        $this->jobs = $model ?? new AlertJobModel();
        $this->batchSize = (int) (getenv('ALERT_QUEUE_BATCH_SIZE') ?: 20);
        $this->maxAttempts = (int) (getenv('ALERT_QUEUE_MAX_ATTEMPTS') ?: 3);
    }

    public function enqueue(string $type, array $payload = [], string $status = 'pending'): int
    {
        return $this->jobs->enqueueJob($type, $payload, $status);
    }

    public function reserve(string $type, ?int $limit = null): array
    {
        $limit = $limit ?? $this->batchSize;
        $jobs = $this->jobs->fetchForProcessing($type, $limit);
        return array_map(function (array $job) {
            $job['payload'] = $this->decodePayload($job['payload'] ?? '[]');
            $job['attempts'] = ($job['attempts'] ?? 0) + 1;
            return $job;
        }, $jobs);
    }

    public function markComplete(array $job): bool
    {
        return $this->jobs->markCompleted($job['id']);
    }

    public function markFailed(array $job, string $error): bool
    {
        $giveUp = ($job['attempts'] ?? 0) >= $this->maxAttempts;
        return $this->jobs->markFailed($job['id'], $error, $giveUp);
    }

    public function process(string $type, callable $handler, ?int $limit = null): array
    {
        $summary = [
            'type'      => $type,
            'fetched'   => 0,
            'processed' => 0,
            'failed'    => 0,
        ];

        $jobs = $this->reserve($type, $limit);
        $summary['fetched'] = count($jobs);

        foreach ($jobs as $job) {
            try {
                $handled = $handler($job);
                if ($handled === false) {
                    $this->markFailed($job, 'Handler returned false');
                    $summary['failed']++;
                    continue;
                }
                $this->markComplete($job);
                $summary['processed']++;
            } catch (\Throwable $e) {
                $this->markFailed($job, $e->getMessage());
                $summary['failed']++;
                log_message('error', sprintf('AlertJobQueue %s failed: %s', $type, $e->getMessage()));
            }
        }

        return $summary;
    }

    public function getBatchSize(): int
    {
        return $this->batchSize;
    }

    public function getMaxAttempts(): int
    {
        return $this->maxAttempts;
    }

    protected function decodePayload(?string $payload): array
    {
        if ($payload === null || $payload === '') {
            return [];
        }

        $decoded = json_decode($payload, true);
        return is_array($decoded) ? $decoded : [];
    }
}
