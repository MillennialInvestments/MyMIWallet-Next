<?php
namespace App\Libraries\Resilience;

use App\Models\CircuitBreakerModel;

class CircuitBreaker
{
    public function __construct(
        private string $name,
        private int $failThreshold = 0,
        private int $openSeconds = 0,
        private int $halfOpenTrials = 0
    ) {
        $this->failThreshold = (int)($failThreshold ?: getenv('CB_FAIL_THRESHOLD') ?: 5);
        $this->openSeconds   = (int)($openSeconds   ?: getenv('CB_OPEN_SECONDS')   ?: 120);
        $this->halfOpenTrials= (int)($halfOpenTrials?: getenv('CB_HALF_OPEN_TRIALS') ?: 3);
    }

    public function allow(): bool
    {
        $row = $this->row();
        if (! $row) return true;
        if ($row['state'] === 'open') {
            if (!empty($row['opened_at']) && (time() - strtotime($row['opened_at'])) >= $this->openSeconds) {
                $this->update(['state' => 'half_open', 'successes' => 0]);
                return true;
            }
            return false;
        }
        return true;
    }

    public function recordSuccess(): void
    {
        $row = $this->row();
        if (! $row) {
            $this->create(['state' => 'closed', 'failures' => 0, 'successes' => 1]);
            return;
        }
        if ($row['state'] === 'half_open') {
            $succ = ((int)$row['successes']) + 1;
            if ($succ >= $this->halfOpenTrials) {
                $this->update(['state' => 'closed', 'failures' => 0, 'successes' => 0, 'opened_at' => null]);
            } else {
                $this->update(['successes' => $succ]);
            }
        } else {
            $this->update(['failures' => 0, 'successes' => 0, 'state' => 'closed', 'opened_at' => null]);
        }
    }

    public function recordFailure(): void
    {
        $row = $this->row();
        if (! $row) {
            $this->create(['state' => 'closed', 'failures' => 1]);
            return;
        }
        $fails = ((int)$row['failures']) + 1;
        if ($fails >= $this->failThreshold) {
            $this->update(['state' => 'open', 'failures' => $fails, 'opened_at' => date('Y-m-d H:i:s')]);
        } else {
            $this->update(['failures' => $fails]);
        }
    }

    private function row(): ?array
    {
        return (new CircuitBreakerModel())->byName($this->name);
    }

    private function update(array $set): void
    {
        $m = new CircuitBreakerModel();
        $row = $m->byName($this->name);
        if ($row) {
            $m->update($row['id'], array_merge($set, ['updated_at' => date('Y-m-d H:i:s')]));
        }
    }

    private function create(array $set): void
    {
        (new CircuitBreakerModel())->insert(array_merge(['name' => $this->name], $set, ['updated_at' => date('Y-m-d H:i:s')]));
    }
}

