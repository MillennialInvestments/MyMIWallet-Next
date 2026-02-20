<?php

namespace App\Services\AIOps;

use App\Models\AIOpsBranchLockModel;

class BranchLockService
{
    protected AIOpsBranchLockModel $locks;

    public function __construct()
    {
        $this->locks = new AIOpsBranchLockModel();
    }

    public function acquire(string $branch, string $lockedBy, ?int $instructionId = null, int $ttlSeconds = 600): array
    {
        $now = time();
        $expiresAt = date('Y-m-d H:i:s', $now + $ttlSeconds);

        // Clear expired lock if exists
        $this->locks->where('branch', $branch)
            ->where('expires_at <', date('Y-m-d H:i:s'))
            ->delete();

        try {
            $id = $this->locks->insert([
                'branch' => $branch,
                'locked_by' => $lockedBy,
                'instruction_id' => $instructionId,
                'expires_at' => $expiresAt,
            ], true);

            return ['ok' => true, 'lock_id' => (int)$id, 'expires_at' => $expiresAt];

        } catch (\Throwable $e) {
            // Unique constraint hit => lock exists
            return ['ok' => false, 'reason' => 'Branch is locked', 'error' => $e->getMessage()];
        }
    }

    public function release(string $branch, string $lockedBy): void
    {
        $this->locks->where('branch', $branch)
            ->where('locked_by', $lockedBy)
            ->delete();
    }

    public function refresh(string $branch, string $lockedBy, int $ttlSeconds = 600): void
    {
        $expiresAt = date('Y-m-d H:i:s', time() + $ttlSeconds);

        $row = $this->locks->where('branch', $branch)->where('locked_by', $lockedBy)->first();
        if ($row) {
            $this->locks->update($row['id'], ['expires_at' => $expiresAt]);
        }
    }
}