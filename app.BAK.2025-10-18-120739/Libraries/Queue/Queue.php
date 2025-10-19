<?php
namespace App\Libraries\Queue;

use App\Models\JobModel;

class Queue
{
    public static function push(string $queue, array $payload, int $delaySeconds = 0, ?int $ttlSeconds = null): int
    {
        $now = time();
        $available = date('Y-m-d H:i:s', $now + max(0, $delaySeconds));
        $expires = $ttlSeconds ? date('Y-m-d H:i:s', $now + $ttlSeconds) : null;

        return (new JobModel())->insert([
            'queue'        => $queue,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'attempts'     => 0,
            'available_at' => $available,
            'expires_at'   => $expires,
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    public static function reserve(string $queue, string $workerId): ?array
    {
        $db = db_connect();
        $db->transStart();
        $row = $db->table('bf_jobs')
            ->where('queue', $queue)
            ->where('available_at <=', date('Y-m-d H:i:s'))
            ->where('reserved_at', null)
            ->orderBy('id', 'ASC')
            ->get(1)->getRowArray();
        if (! $row) {
            $db->transComplete();
            return null;
        }
        $db->table('bf_jobs')->where('id', $row['id'])->set([
            'reserved_at' => date('Y-m-d H:i:s'),
            'reserved_by' => $workerId,
        ])->update();
        $db->transComplete();
        return $row;
    }

    public static function releaseWithDelay(int $jobId, int $delaySeconds): void
    {
        db_connect()->table('bf_jobs')->where('id', $jobId)->set([
            'reserved_at' => null,
            'reserved_by' => null,
            'available_at' => date('Y-m-d H:i:s', time() + $delaySeconds),
        ])->update();
    }

    public static function delete(int $jobId): void
    {
        db_connect()->table('bf_jobs')->where('id', $jobId)->delete();
    }

    public static function failAndDelete(array $job, string $exception): void
    {
        db_connect()->table('bf_failed_jobs')->insert([
            'queue'        => $job['queue'],
            'payload_json' => $job['payload_json'],
            'exception'    => $exception,
            'failed_at'    => date('Y-m-d H:i:s'),
        ]);
        self::delete((int)$job['id']);
    }
}

