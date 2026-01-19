<?php

namespace App\Services;

use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;

class SetupStatusService
{
    private ConnectionInterface $db;
    private array $columnCache = [];

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function getSetupStatus(int $userId): array
    {
        helper('url');

        $incomeCount = $this->countBudgetEntries($userId, 'income');
        $expenseCount = $this->countBudgetEntries($userId, 'expense');
        $walletCount = $this->countWallets($userId);

        $hasProfile = $this->hasProfile($userId);
        $hasBudget = $incomeCount > 0 && $expenseCount > 0;
        $hasWallets = $walletCount > 0;
        $hasInvestments = $this->hasWatchlist($userId);

        $missing = [
            'budget'      => ! $hasBudget,
            'wallets'     => ! $hasWallets,
            'profile'     => ! $hasProfile,
            'investments' => ! $hasInvestments,
        ];

        $totalSections = count($missing);
        $missingCount = count(array_filter($missing));
        $progressPct = $totalSections > 0 ? (int) round((($totalSections - $missingCount) / $totalSections) * 100) : 0;
        $overallComplete = $missingCount === 0;

        $nextSteps = $this->buildNextSteps($missing, $incomeCount, $expenseCount, $walletCount);

        log_message('debug', '[SETUP] Status computed', [
            'user_id'  => $userId,
            'context'  => 'status',
            'progress' => $progressPct,
            'missing'  => $missing,
        ]);

        return [
            'overall_complete' => $overallComplete,
            'progress_pct'     => $progressPct,
            'missing'          => $missing,
            'counts'           => [
                'income'   => $incomeCount,
                'expenses' => $expenseCount,
                'wallets'  => $walletCount,
            ],
            'next_steps'       => $nextSteps,
        ];
    }

    public function getDismissPreferences(int $userId): array
    {
        $defaults = [
            'dismiss_all'       => 0,
            'dismiss_budget'    => 0,
            'dismiss_wallets'   => 0,
            'dismiss_dashboard' => 0,
        ];

        if (! $this->db->tableExists('bf_user_setup_preferences')) {
            return $defaults;
        }

        $row = $this->db->table('bf_user_setup_preferences')
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if (! $row) {
            return $defaults;
        }

        return array_merge($defaults, array_intersect_key($row, $defaults));
    }

    public function updateDismissPreference(int $userId, string $scope, bool $dismiss): array
    {
        $column = $this->resolveDismissColumn($scope);
        if ($column === null) {
            return ['status' => 'error', 'message' => 'Invalid scope.'];
        }

        if (! $this->db->tableExists('bf_user_setup_preferences')) {
            return ['status' => 'error', 'message' => 'Preferences table missing.'];
        }

        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $payload = [
            'user_id'    => $userId,
            $column      => $dismiss ? 1 : 0,
            'updated_at' => $now,
        ];

        $table = $this->db->table('bf_user_setup_preferences');
        $existing = $table->where('user_id', $userId)->get()->getRowArray();

        if ($existing) {
            $table->where('user_id', $userId)->update($payload);
        } else {
            $table->insert($payload);
        }

        return ['status' => 'success'];
    }

    private function buildNextSteps(array $missing, int $incomeCount, int $expenseCount, int $walletCount): array
    {
        $steps = [];

        if (! empty($missing['profile'])) {
            $steps[] = [
                'label'   => 'Complete Profile',
                'url'     => site_url('Dashboard/onboarding'),
                'context' => 'dashboard',
            ];
        }

        if (! empty($missing['budget'])) {
            if ($incomeCount === 0) {
                $steps[] = [
                    'label'   => 'Add Income',
                    'url'     => site_url('Budget/Add/Income'),
                    'context' => 'budget',
                ];
            }
            if ($expenseCount === 0) {
                $steps[] = [
                    'label'   => 'Add Expense',
                    'url'     => site_url('Budget/Add/Expense'),
                    'context' => 'budget',
                ];
            }
        }

        if (! empty($missing['wallets']) || $walletCount === 0) {
            $steps[] = [
                'label'   => 'Add Wallet',
                'url'     => site_url('Wallets/Add'),
                'context' => 'wallets',
            ];
        }

        if (! empty($missing['investments'])) {
            $steps[] = [
                'label'   => 'Add Watchlist',
                'url'     => site_url('Investments/Watchlist'),
                'context' => 'dashboard',
            ];
        }

        return $steps;
    }

    private function countWallets(int $userId): int
    {
        if (! $this->db->tableExists('bf_users_wallet')) {
            return 0;
        }

        $builder = $this->db->table('bf_users_wallet')->where('user_id', $userId);
        if ($this->tableHasColumn('bf_users_wallet', 'status')) {
            $builder->where('status', 1);
        }
        if ($this->tableHasColumn('bf_users_wallet', 'active')) {
            $builder->where('active', 1);
        }

        return $builder->countAllResults();
    }

    private function countBudgetEntries(int $userId, string $type): int
    {
        if (! $this->db->tableExists('bf_users_budgeting')) {
            return 0;
        }

        $builder = $this->db->table('bf_users_budgeting')->where('created_by', $userId);
        if ($this->tableHasColumn('bf_users_budgeting', 'status')) {
            $builder->where('status', 1);
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'deleted')) {
            $builder->where('deleted', 0);
        }

        $builder->groupStart();
        $hasCondition = false;
        if ($this->tableHasColumn('bf_users_budgeting', 'account_type')) {
            $builder->like('account_type', $type, 'both');
            $hasCondition = true;
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'source_type')) {
            $builder->orLike('source_type', $type, 'both');
            $hasCondition = true;
        }
        if ($this->tableHasColumn('bf_users_budgeting', 'net_amount')) {
            if ($type === 'income') {
                $builder->orWhere('net_amount >', 0);
            } else {
                $builder->orWhere('net_amount <', 0);
            }
            $hasCondition = true;
        }
        $builder->groupEnd();

        if (! $hasCondition) {
            return 0;
        }

        return $builder->countAllResults();
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

    private function hasWatchlist(int $userId): bool
    {
        if (! $this->db->tableExists('bf_users_watchlist')) {
            return false;
        }

        return $this->db->table('bf_users_watchlist')->where('user_id', $userId)->countAllResults() > 0;
    }

    private function resolveDismissColumn(string $scope): ?string
    {
        return match (strtolower(trim($scope))) {
            'all' => 'dismiss_all',
            'budget' => 'dismiss_budget',
            'wallets' => 'dismiss_wallets',
            'dashboard' => 'dismiss_dashboard',
            default => null,
        };
    }

    private function tableHasColumn(string $table, string $column): bool
    {
        if (isset($this->columnCache[$table])) {
            return in_array($column, $this->columnCache[$table], true);
        }

        try {
            $fields = $this->db->getFieldData($table);
        } catch (\Throwable $e) {
            log_message('error', 'SetupStatusService: failed to inspect table {table}: {msg}', [
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
