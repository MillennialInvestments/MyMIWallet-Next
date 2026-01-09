<?php

namespace App\Services;

use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;

class OnboardingProgressService
{
    private ConnectionInterface $db;
    private array $columnCache = [];

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function ensureRecord(int $userId): array
    {
        if (! $this->db->tableExists('bf_user_onboarding')) {
            log_message('error', 'OnboardingProgressService: bf_user_onboarding table missing.');
            return [
                'user_id'    => $userId,
                'steps_json' => json_encode($this->defaultSteps(), JSON_PRETTY_PRINT),
            ];
        }

        $table = $this->db->table('bf_user_onboarding');
        $record = $table->where('user_id', $userId)->get()->getRowArray();

        if ($record) {
            return $record;
        }

        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $payload = [
            'user_id'    => $userId,
            'steps_json' => json_encode($this->defaultSteps(), JSON_PRETTY_PRINT),
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $table->insert($payload);

        log_message('info', 'OnboardingProgressService: created onboarding record for user_id={id}', ['id' => $userId]);

        return $table->where('user_id', $userId)->get()->getRowArray() ?? $payload;
    }

    public function markVerifiedLogin(int $userId): void
    {
        $record = $this->ensureRecord($userId);
        if (! empty($record['first_verified_login_at'])) {
            return;
        }

        $this->db->table('bf_user_onboarding')
            ->where('user_id', $userId)
            ->update([
                'first_verified_login_at' => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s'),
                'updated_at'              => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s'),
            ]);

        log_message('info', 'OnboardingProgressService: first verified login recorded for user_id={id}', ['id' => $userId]);
    }

    public function shouldTriggerWalkthrough(int $userId): bool
    {
        $record = $this->ensureRecord($userId);
        if (! empty($record['walkthrough_started_at'])) {
            return false;
        }

        $progress = $this->computeProgress($userId);
        return ($progress['isComplete'] ?? false) === false;
    }

    public function markWalkthroughStarted(int $userId): void
    {
        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $this->db->table('bf_user_onboarding')
            ->where('user_id', $userId)
            ->update([
                'walkthrough_started_at' => $now,
                'updated_at'             => $now,
            ]);

        log_message('info', 'OnboardingProgressService: walkthrough started for user_id={id}', ['id' => $userId]);
    }

    public function markStep(int $userId, string $stage, string $step, bool $status = true): array
    {
        $steps = $this->getSteps($userId);
        if (! isset($steps[$stage])) {
            $steps[$stage] = [];
        }
        $steps[$stage][$step] = $status;
        return $this->updateSteps($userId, $steps);
    }

    public function computeProgress(int $userId): array
    {
        $record = $this->ensureRecord($userId);
        $steps = $this->getStepsFromRecord($record);

        $steps['stage_a']['profile'] = ($steps['stage_a']['profile'] ?? false) || $this->hasProfile($userId);
        $steps['stage_a']['employment'] = ($steps['stage_a']['employment'] ?? false) || $this->hasEmployment($userId);

        $steps['stage_b']['income'] = ($steps['stage_b']['income'] ?? false) || $this->hasBudgetIncome($userId);
        $steps['stage_b']['credit_debt'] = ($steps['stage_b']['credit_debt'] ?? false) || $this->hasCreditOrDebt($userId);
        $steps['stage_b']['recurring_expenses'] = ($steps['stage_b']['recurring_expenses'] ?? false) || $this->hasRecurringExpenses($userId);
        $steps['stage_b']['watchlist'] = ($steps['stage_b']['watchlist'] ?? false) || $this->hasWatchlist($userId);

        $steps['stage_a']['completed'] = ! empty($steps['stage_a']['profile']) && ! empty($steps['stage_a']['employment']);
        $steps['stage_b']['completed'] = ! empty($steps['stage_b']['income'])
            && ! empty($steps['stage_b']['credit_debt'])
            && ! empty($steps['stage_b']['recurring_expenses'])
            && ! empty($steps['stage_b']['watchlist']);

        $steps['completed'] = ! empty($steps['stage_a']['completed']) && ! empty($steps['stage_b']['completed']);

        $updated = $this->updateSteps($userId, $steps, $record);

        return [
            'steps'      => $updated,
            'isComplete' => (bool) ($updated['completed'] ?? false),
            'missing'    => $this->missingSteps($updated),
        ];
    }

    public function getSteps(int $userId): array
    {
        $record = $this->ensureRecord($userId);
        return $this->getStepsFromRecord($record);
    }

    private function getStepsFromRecord(array $record): array
    {
        $raw = $record['steps_json'] ?? '';
        $decoded = [];
        if ($raw) {
            $decoded = json_decode($raw, true) ?? [];
        }

        return array_replace_recursive($this->defaultSteps(), $decoded);
    }

    private function updateSteps(int $userId, array $steps, ?array $record = null): array
    {
        $payload = json_encode($steps, JSON_PRETTY_PRINT);
        $record = $record ?? $this->ensureRecord($userId);

        if (($record['steps_json'] ?? '') === $payload) {
            return $steps;
        }

        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $update = [
            'steps_json' => $payload,
            'updated_at' => $now,
        ];

        if (! empty($steps['completed']) && empty($record['walkthrough_completed_at'])) {
            $update['walkthrough_completed_at'] = $now;
            log_message('info', 'OnboardingProgressService: walkthrough completed for user_id={id}', ['id' => $userId]);
        }

        $this->db->table('bf_user_onboarding')
            ->where('user_id', $userId)
            ->update($update);

        return $steps;
    }

    private function defaultSteps(): array
    {
        return [
            'stage_a' => [
                'profile'    => false,
                'employment' => false,
                'completed'  => false,
            ],
            'stage_b' => [
                'income'             => false,
                'credit_debt'        => false,
                'recurring_expenses' => false,
                'watchlist'          => false,
                'completed'          => false,
            ],
            'completed' => false,
        ];
    }

    private function missingSteps(array $steps): array
    {
        $missing = [];
        foreach (['stage_a', 'stage_b'] as $stage) {
            foreach ($steps[$stage] ?? [] as $key => $value) {
                if ($key === 'completed') {
                    continue;
                }
                if (empty($value)) {
                    $missing[] = $stage . '.' . $key;
                }
            }
        }
        return $missing;
    }

    private function hasProfile(int $userId): bool
    {
        if (! $this->db->tableExists('bf_user_profiles')) {
            return false;
        }

        $row = $this->db->table('bf_user_profiles')->where('user_id', $userId)->get()->getRowArray();
        if (! $row) {
            return false;
        }

        return ! empty($row['first_name']) && ! empty($row['last_name']);
    }

    private function hasEmployment(int $userId): bool
    {
        if (! $this->db->tableExists('bf_user_employment')) {
            return false;
        }

        $row = $this->db->table('bf_user_employment')->where('user_id', $userId)->get()->getRowArray();
        if (! $row) {
            return false;
        }

        return ! empty($row['employment_type']);
    }

    private function hasBudgetIncome(int $userId): bool
    {
        if (! $this->db->tableExists('bf_users_budgeting')) {
            return false;
        }

        $builder = $this->db->table('bf_users_budgeting')->where('created_by', $userId);
        if ($this->tableHasColumn('bf_users_budgeting', 'status')) {
            $builder->where('status', 1);
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'deleted')) {
            $builder->where('deleted', 0);
        }

        $builder->groupStart();
        if ($this->tableHasColumn('bf_users_budgeting', 'account_type')) {
            $builder->like('account_type', 'income', 'both');
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'source_type')) {
            $builder->orLike('source_type', 'income', 'both');
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'net_amount')) {
            $builder->orWhere('net_amount >', 0);
        }
        $builder->groupEnd();

        return $builder->countAllResults() > 0;
    }

    private function hasCreditOrDebt(int $userId): bool
    {
        $credit = false;
        $debt = false;

        if ($this->db->tableExists('bf_users_credit_accounts')) {
            $builder = $this->db->table('bf_users_credit_accounts')->where('user_id', $userId);
            if ($this->tableHasColumn('bf_users_credit_accounts', 'status')) {
                $builder->where('status', 1);
            }
            if ($this->tableHasColumn('bf_users_credit_accounts', 'deleted')) {
                $builder->where('deleted', 0);
            }
            $credit = $builder->countAllResults() > 0;
        }

        if ($this->db->tableExists('bf_users_debt_accounts')) {
            $builder = $this->db->table('bf_users_debt_accounts')->where('user_id', $userId);
            if ($this->tableHasColumn('bf_users_debt_accounts', 'status')) {
                $builder->where('status', 1);
            }
            if ($this->tableHasColumn('bf_users_debt_accounts', 'deleted')) {
                $builder->where('deleted', 0);
            }
            $debt = $builder->countAllResults() > 0;
        }

        return $credit || $debt;
    }

    private function hasRecurringExpenses(int $userId): bool
    {
        if (! $this->db->tableExists('bf_users_budgeting')) {
            return false;
        }

        if (! $this->tableHasColumn('bf_users_budgeting', 'recurring_account')) {
            return false;
        }

        $builder = $this->db->table('bf_users_budgeting')
            ->where('created_by', $userId)
            ->where('recurring_account', 'Yes');

        if ($this->tableHasColumn('bf_users_budgeting', 'status')) {
            $builder->where('status', 1);
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'deleted')) {
            $builder->where('deleted', 0);
        }

        return $builder->countAllResults() > 0;
    }

    private function hasWatchlist(int $userId): bool
    {
        if (! $this->db->tableExists('bf_users_watchlist')) {
            return false;
        }

        $builder = $this->db->table('bf_users_watchlist')->where('user_id', $userId);
        return $builder->countAllResults() > 0;
    }

    private function tableHasColumn(string $table, string $column): bool
    {
        if (isset($this->columnCache[$table])) {
            return in_array($column, $this->columnCache[$table], true);
        }

        try {
            $fields = $this->db->getFieldData($table);
        } catch (\Throwable $e) {
            log_message('error', 'OnboardingProgressService: failed to inspect table {table}: {msg}', [
                'table' => $table,
                'msg'   => $e->getMessage(),
            ]);
            $this->columnCache[$table] = [];
            return false;
        }

        $this->columnCache[$table] = array_map(static fn ($field) => $field->name, $fields);

        return in_array($column, $this->columnCache[$table], true);
    }
}
