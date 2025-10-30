<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\RawSql;
use Throwable;

class EsportsModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'bf_esports_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [];

    public function getCreatorById(int $creatorId): ?array
    {
        return $this->db->table('bf_esports_creators')->where('id', $creatorId)->get()->getRowArray() ?: null;
    }

    public function createEvent(array $data): int
    {
        $this->db->table('bf_esports_events')->insert($data);
        return (int) $this->db->insertID();
    }

    public function updateEvent(int $eventId, array $data): bool
    {
        return (bool) $this->db->table('bf_esports_events')->where('id', $eventId)->update($data);
    }

    public function getEventWithAggregates(int $eventId): ?array
    {
        $builder = $this->db->table('bf_esports_events e')
            ->select('e.*, p.total_cents, p.rake_cents, p.net_pool_cents, p.state AS pool_state, p.currency AS pool_currency, es.state AS escrow_state')
            ->select('COUNT(en.id) AS entrant_count')
            ->join('bf_esports_pools p', 'p.event_id = e.id', 'left')
            ->join('bf_esports_entries en', 'en.event_id = e.id', 'left')
            ->join('bf_esports_escrows es', 'es.event_id = e.id', 'left')
            ->where('e.id', $eventId)
            ->groupBy('e.id');

        $row = $builder->get()->getRowArray();
        return $row ?: null;
    }

    public function listEvents(array $filters = []): array
    {
        $builder = $this->db->table('bf_esports_events e')
            ->select('e.*, p.total_cents, p.net_pool_cents, p.state AS pool_state')
            ->select('COUNT(DISTINCT en.id) AS entrant_count')
            ->join('bf_esports_pools p', 'p.event_id = e.id', 'left')
            ->join('bf_esports_entries en', 'en.event_id = e.id', 'left');

        if (! empty($filters['status'])) {
            $builder->where('e.status', $filters['status']);
        }
        if (! empty($filters['game'])) {
            $builder->where('e.game_title', $filters['game']);
        }
        if (! empty($filters['date'])) {
            try {
                $builder->where('DATE(e.starts_at)', Time::parse($filters['date'])->toDateString());
            } catch (Throwable $e) {
                // Ignore invalid date filters for now.
            }
        }

        if (! empty($filters['creator_id'])) {
            $builder->where('e.creator_id', $filters['creator_id']);
        }

        $builder->groupBy('e.id')->orderBy('e.starts_at', 'DESC');

        return $builder->get()->getResultArray();
    }

    public function createPool(array $data): bool
    {
        return (bool) $this->db->table('bf_esports_pools')->insert($data);
    }

    public function incrementPoolTotals(int $eventId, int $grossCents, int $rakeCents, int $netCents): bool
    {
        return (bool) $this->db->table('bf_esports_pools')
            ->where('event_id', $eventId)
            ->set('total_cents', 'total_cents + ' . (int) $grossCents, false)
            ->set('rake_cents', 'rake_cents + ' . (int) $rakeCents, false)
            ->set('net_pool_cents', 'net_pool_cents + ' . (int) $netCents, false)
            ->update();
    }

    public function updatePoolByEvent(int $eventId, array $data): bool
    {
        return (bool) $this->db->table('bf_esports_pools')->where('event_id', $eventId)->update($data);
    }

    public function getPoolByEvent(int $eventId): ?array
    {
        return $this->db->table('bf_esports_pools')->where('event_id', $eventId)->get()->getRowArray() ?: null;
    }

    public function createEntry(array $data): int
    {
        $this->db->table('bf_esports_entries')->insert($data);
        return (int) $this->db->insertID();
    }

    public function getEntry(int $eventId, int $userId): ?array
    {
        return $this->db->table('bf_esports_entries')->where(['event_id' => $eventId, 'user_id' => $userId])->get()->getRowArray() ?: null;
    }

    public function countEntries(int $eventId): int
    {
        return (int) $this->db->table('bf_esports_entries')->where('event_id', $eventId)->countAllResults();
    }

    public function createEscrow(array $data): bool
    {
        return (bool) $this->db->table('bf_esports_escrows')->insert($data);
    }

    public function updateEscrow(int $eventId, array $data): bool
    {
        return (bool) $this->db->table('bf_esports_escrows')->where('event_id', $eventId)->update($data);
    }

    public function getEscrowByEvent(int $eventId): ?array
    {
        return $this->db->table('bf_esports_escrows')->where('event_id', $eventId)->get()->getRowArray() ?: null;
    }

    public function getWebhookByDigest(string $digest): ?array
    {
        return $this->db->table('bf_esports_webhooks')->where('payload_digest', $digest)->get()->getRowArray() ?: null;
    }

    public function getWebhookById(int $id): ?array
    {
        return $this->db->table('bf_esports_webhooks')->where('id', $id)->get()->getRowArray() ?: null;
    }

    public function logWebhook(array $data): int
    {
        $this->db->table('bf_esports_webhooks')->insert($data);
        return (int) $this->db->insertID();
    }

    public function markWebhookAttempt(int $webhookId, string $message, ?int $httpCode = null, ?string $nextAttemptAt = null): bool
    {
        $builder = $this->db->table('bf_esports_webhooks')->where('id', $webhookId);
        $builder->set('attempts', 'attempts + 1', false)
            ->set('last_error', $message);

        if ($httpCode !== null) {
            $builder->set('http_code', $httpCode);
        }
        if ($nextAttemptAt !== null) {
            $builder->set('next_attempt_at', $nextAttemptAt);
        }

        return (bool) $builder->update();
    }

    public function markWebhookProcessed(int $webhookId): bool
    {
        return (bool) $this->db->table('bf_esports_webhooks')->where('id', $webhookId)->update([
            'processed'    => 1,
            'processed_at' => Time::now()->toDateTimeString(),
        ]);
    }

    public function createPayout(array $data): int
    {
        $this->db->table('bf_esports_payouts')->insert($data);
        return (int) $this->db->insertID();
    }

    public function updatePayoutsForEvent(int $eventId, array $criteria, array $updates): bool
    {
        $builder = $this->db->table('bf_esports_payouts')->where('event_id', $eventId);
        foreach ($criteria as $key => $value) {
            $builder->where($key, $value);
        }
        return (bool) $builder->update($updates);
    }

    public function getPayoutsForEvent(int $eventId): array
    {
        return $this->db->table('bf_esports_payouts')->where('event_id', $eventId)->get()->getResultArray();
    }

    public function upsertPayout(array $criteria, array $values): int
    {
        $eventId = (int) ($criteria['event_id'] ?? 0);
        $role    = $criteria['role'] ?? 'winner';
        $userId  = array_key_exists('user_id', $criteria) ? $criteria['user_id'] : null;

        $baseBuilder = $this->db->table('bf_esports_payouts')
            ->where('event_id', $eventId)
            ->where('role', $role);

        if ($userId === null) {
            $baseBuilder->where('user_id IS NULL', null, false);
        } else {
            $baseBuilder->where('user_id', (int) $userId);
        }

        $existing = $baseBuilder->get()->getRowArray();

        if ($existing) {
            $this->db->table('bf_esports_payouts')->where('id', (int) $existing['id'])->update($values);
            return (int) $existing['id'];
        }

        $insert = [
            'event_id' => $eventId,
            'role'     => $role,
            'user_id'  => $userId === null ? null : (int) $userId,
        ] + $values;

        $this->db->table('bf_esports_payouts')->insert($insert);

        return (int) $this->db->insertID();
    }

    public function queueJob(string $jobType, array $payload, ?int $delaySeconds = null): int
    {
        $data = [
            'job_type' => strtoupper($jobType),
            'payload'  => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ];

        if ($delaySeconds !== null && $delaySeconds > 0) {
            $data['run_after'] = Time::now()->addSeconds($delaySeconds)->toDateTimeString();
        }

        $this->db->table('bf_esports_jobs')->insert($data);

        return (int) $this->db->insertID();
    }

    public function fetchQueuedJobs(array $jobTypes, int $limit = 10): array
    {
        $builder = $this->db->table('bf_esports_jobs')
            ->where('status', 'queued')
            ->groupStart()
                ->where('run_after IS NULL', null, false)
                ->orWhere('run_after <=', Time::now()->toDateTimeString())
            ->groupEnd()
            ->orderBy('id', 'ASC')
            ->limit($limit);

        if (! empty($jobTypes)) {
            $builder->whereIn('job_type', array_map('strtoupper', $jobTypes));
        }

        return $builder->get()->getResultArray();
    }

    public function markJobRunning(int $jobId): bool
    {
        return (bool) $this->db->table('bf_esports_jobs')->where('id', $jobId)->update([
            'status'     => 'running',
            'updated_at' => Time::now()->toDateTimeString(),
        ]);
    }

    public function markJobResult(int $jobId, string $status, ?string $error = null): bool
    {
        $builder = $this->db->table('bf_esports_jobs')->where('id', $jobId);

        $builder->set('status', $status)
            ->set('last_error', $error)
            ->set('updated_at', Time::now()->toDateTimeString());

        if ($status !== 'done') {
            $builder->set('attempts', 'attempts + 1', false);
        } else {
            $builder->set('run_after', null);
        }

        return (bool) $builder->update();
    }

    public function rescheduleJob(int $jobId, int $delaySeconds, string $error): bool
    {
        $delaySeconds = max(1, $delaySeconds);
        $nextAttempt  = Time::now()->addSeconds($delaySeconds)->toDateTimeString();

        return (bool) $this->db->table('bf_esports_jobs')->where('id', $jobId)->update([
            'status'     => 'queued',
            'last_error' => $error,
            'attempts'   => new RawSql('attempts + 1'),
            'run_after'  => $nextAttempt,
            'updated_at' => Time::now()->toDateTimeString(),
        ]);
    }

    public function getEntriesForEvent(int $eventId, array $statuses = []): array
    {
        $builder = $this->db->table('bf_esports_entries')->where('event_id', $eventId);

        if (! empty($statuses)) {
            $builder->whereIn('status', $statuses);
        }

        return $builder->get()->getResultArray();
    }

    public function updateEntry(int $entryId, array $data): bool
    {
        return (bool) $this->db->table('bf_esports_entries')->where('id', $entryId)->update($data);
    }

    public function resetPoolTotals(int $eventId): bool
    {
        return (bool) $this->db->table('bf_esports_pools')->where('event_id', $eventId)->update([
            'total_cents'    => 0,
            'rake_cents'     => 0,
            'net_pool_cents' => 0,
        ]);
    }
}