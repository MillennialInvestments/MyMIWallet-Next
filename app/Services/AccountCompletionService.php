<?php

namespace App\Services;

use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;

class AccountCompletionService
{
    private const STATE_TABLE = 'bf_user_account_completion_modal_state';
    private const SNOOZE_DAYS = 7;
    private const COMPONENT_VERSION = '2026-05-10-account-completion-v1';

    private ConnectionInterface $db;
    private array $columnCache = [];

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function scannerVersion(): string
    {
        return self::COMPONENT_VERSION;
    }

    public function evaluate(int $userId, bool $respectSnooze = true): array
    {
        $checks = $this->scanReadiness($userId);
        $nextAction = null;

        foreach ($this->priorityOrder() as $key) {
            if (($checks[$key]['complete'] ?? true) === false) {
                $nextAction = $this->actionFor($key);
                break;
            }
        }

        $state = $this->getState($userId);
        $stateStatus = $this->stateStatus($state);
        $blockedByState = $respectSnooze && $stateStatus['suppressed'];

        return [
            'should_display' => $nextAction !== null && ! $blockedByState,
            'next_action'    => $nextAction,
            'checks'         => $this->publicChecks($checks),
            'state'          => $stateStatus,
            'scanner_version'=> self::COMPONENT_VERSION,
        ];
    }

    public function dismiss(int $userId, string $action = 'snooze'): array
    {
        $normalized = strtolower(trim($action));
        if (! in_array($normalized, ['snooze', 'dismiss'], true)) {
            $normalized = 'snooze';
        }

        if (! $this->safeTableExists(self::STATE_TABLE)) {
            log_message('warning', 'AccountCompletionService: state table missing during dismiss for user_id={id}', ['id' => $userId]);
            return $this->evaluate($userId, false);
        }

        $now = new DateTimeImmutable('now');
        $payload = [
            'user_id'        => $userId,
            'last_action'    => $normalized,
            'last_step_key'  => (string) (($this->evaluate($userId, false)['next_action']['key'] ?? '') ?: ''),
            'dismissed_at'   => $now->format('Y-m-d H:i:s'),
            'snoozed_until'  => $now->modify('+' . self::SNOOZE_DAYS . ' days')->format('Y-m-d H:i:s'),
            'updated_at'     => $now->format('Y-m-d H:i:s'),
        ];

        $existing = $this->db->table(self::STATE_TABLE)->where('user_id', $userId)->get()->getRowArray();
        if ($existing) {
            $this->db->table(self::STATE_TABLE)->where('user_id', $userId)->update($payload);
        } else {
            $payload['created_at'] = $now->format('Y-m-d H:i:s');
            $this->db->table(self::STATE_TABLE)->insert($payload);
        }

        service('eventTracker')->track('account_completion.' . $normalized, [
            'step' => $payload['last_step_key'],
        ], $userId, 'account_completion');

        return $this->evaluate($userId, true);
    }

    public function scanReadiness(int $userId): array
    {
        return [
            'contact_information' => $this->contactCheck($userId),
            'budget_setup'        => $this->budgetCheck($userId),
            'portfolio_setup'     => $this->portfolioCheck($userId),
        ];
    }

    private function contactCheck(int $userId): array
    {
        $email = $this->readFirstNonEmpty($userId, [
            ['users', 'id', 'email'],
            ['bf_users', 'id', 'email'],
            ['bf_user_profiles', 'user_id', 'email'],
        ]);
        $firstName = $this->readFirstNonEmpty($userId, [
            ['bf_user_profiles', 'user_id', 'first_name'],
            ['users', 'id', 'first_name'],
            ['bf_users', 'id', 'first_name'],
        ]);
        $lastName = $this->readFirstNonEmpty($userId, [
            ['bf_user_profiles', 'user_id', 'last_name'],
            ['users', 'id', 'last_name'],
            ['bf_users', 'id', 'last_name'],
        ]);

        $missing = [];
        if ($email === '') {
            $missing[] = 'email';
        }
        if ($firstName === '') {
            $missing[] = 'first_name';
        }
        if ($lastName === '') {
            $missing[] = 'last_name';
        }

        return [
            'complete' => $missing === [],
            'missing'  => $missing,
            'label'    => 'Contact information',
        ];
    }

    private function budgetCheck(int $userId): array
    {
        $hasBudget = false;
        $signals = [];

        foreach (['bf_users_budgeting', 'bf_budget_accounts', 'bf_budget_categories', 'bf_budget_items'] as $table) {
            if (! $this->safeTableExists($table)) {
                continue;
            }

            $userColumn = $this->firstExistingColumn($table, ['created_by', 'user_id']);
            if ($userColumn === null) {
                continue;
            }

            $builder = $this->db->table($table)->where($userColumn, $userId);
            $this->applyActiveFilters($builder, $table);
            if ($builder->countAllResults() > 0) {
                $hasBudget = true;
                $signals[] = $table;
                break;
            }
        }

        return [
            'complete' => $hasBudget,
            'missing'  => $hasBudget ? [] : ['budget_plan'],
            'label'    => 'Budget setup/completion',
            'signals'  => $signals,
        ];
    }

    private function portfolioCheck(int $userId): array
    {
        $hasPortfolio = false;
        $signals = [];

        foreach (['bf_users_watchlist', 'bf_investment_portfolios', 'bf_user_portfolios', 'bf_portfolio_holdings', 'bf_investment_holdings'] as $table) {
            if (! $this->safeTableExists($table)) {
                continue;
            }

            $userColumn = $this->firstExistingColumn($table, ['user_id', 'created_by']);
            if ($userColumn === null) {
                continue;
            }

            $builder = $this->db->table($table)->where($userColumn, $userId);
            $this->applyActiveFilters($builder, $table);
            if ($builder->countAllResults() > 0) {
                $hasPortfolio = true;
                $signals[] = $table;
                break;
            }
        }

        return [
            'complete' => $hasPortfolio,
            'missing'  => $hasPortfolio ? [] : ['portfolio_or_watchlist'],
            'label'    => 'Investment portfolio manager setup',
            'signals'  => $signals,
        ];
    }

    private function priorityOrder(): array
    {
        return ['contact_information', 'budget_setup', 'portfolio_setup'];
    }

    private function actionFor(string $key): array
    {
        $actions = [
            'contact_information' => [
                'key' => 'contact_information',
                'title' => 'Complete your contact information',
                'body' => 'Add the missing contact basics needed to personalize your MyMI Wallet account.',
                'button_label' => 'Update contact info',
                'url' => site_url('Profile'),
            ],
            'budget_setup' => [
                'key' => 'budget_setup',
                'title' => 'Set up your budget',
                'body' => 'Create or finish a budget so MyMI Wallet can organize your financial workflow.',
                'button_label' => 'Go to budget setup',
                'url' => site_url('Budget'),
            ],
            'portfolio_setup' => [
                'key' => 'portfolio_setup',
                'title' => 'Set up investment tracking',
                'body' => 'Start your portfolio manager or watchlist to track investment opportunities.',
                'button_label' => 'Open portfolio tools',
                'url' => site_url('Investments/Watchlist'),
            ],
        ];

        return $actions[$key];
    }

    private function publicChecks(array $checks): array
    {
        $public = [];
        foreach ($checks as $key => $check) {
            $public[$key] = [
                'label' => $check['label'],
                'complete' => (bool) $check['complete'],
                'missing_count' => count($check['missing'] ?? []),
            ];
        }

        return $public;
    }

    private function getState(int $userId): array
    {
        if (! $this->safeTableExists(self::STATE_TABLE)) {
            return [];
        }

        return $this->db->table(self::STATE_TABLE)->where('user_id', $userId)->get()->getRowArray() ?? [];
    }

    private function stateStatus(array $state): array
    {
        if ($state === []) {
            return [
                'suppressed' => false,
                'reason' => null,
                'snoozed_until' => null,
            ];
        }

        $now = new DateTimeImmutable('now');
        $snoozedUntil = trim((string) ($state['snoozed_until'] ?? ''));
        if ($snoozedUntil !== '') {
            try {
                if (new DateTimeImmutable($snoozedUntil) > $now) {
                    return [
                        'suppressed' => true,
                        'reason' => ($state['last_action'] ?? '') === 'dismiss' ? 'recently_dismissed' : 'snoozed',
                        'snoozed_until' => $snoozedUntil,
                    ];
                }
            } catch (\Throwable $e) {
                log_message('warning', 'AccountCompletionService: invalid snoozed_until value ignored.');
            }
        }

        return [
            'suppressed' => false,
            'reason' => null,
            'snoozed_until' => null,
        ];
    }

    private function readFirstNonEmpty(int $userId, array $candidates): string
    {
        foreach ($candidates as [$table, $userColumn, $valueColumn]) {
            if (! $this->safeTableExists($table) || ! $this->tableHasColumn($table, $userColumn) || ! $this->tableHasColumn($table, $valueColumn)) {
                continue;
            }

            $row = $this->db->table($table)
                ->select($valueColumn)
                ->where($userColumn, $userId)
                ->get(1)
                ->getRowArray();

            $value = trim((string) ($row[$valueColumn] ?? ''));
            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }

    private function firstExistingColumn(string $table, array $columns): ?string
    {
        foreach ($columns as $column) {
            if ($this->tableHasColumn($table, $column)) {
                return $column;
            }
        }

        return null;
    }

    private function applyActiveFilters($builder, string $table): void
    {
        if ($this->tableHasColumn($table, 'deleted')) {
            $builder->where('deleted', 0);
        }
        if ($this->tableHasColumn($table, 'deleted_at')) {
            $builder->where('deleted_at', null);
        }
        if ($this->tableHasColumn($table, 'status')) {
            $builder->groupStart()
                ->where('status', 1)
                ->orWhere('status', '1')
                ->orWhere('status', 'active')
                ->orWhere('status', 'Active')
                ->groupEnd();
        }
    }

    private function safeTableExists(string $table): bool
    {
        try {
            return $this->db->tableExists($table);
        } catch (\Throwable $e) {
            log_message('error', 'AccountCompletionService: failed tableExists({table}): {msg}', [
                'table' => $table,
                'msg' => $e->getMessage(),
            ]);
            return false;
        }
    }

    private function tableHasColumn(string $table, string $column): bool
    {
        if (! isset($this->columnCache[$table])) {
            try {
                $this->columnCache[$table] = array_map(static fn ($field) => $field->name, $this->db->getFieldData($table));
            } catch (\Throwable $e) {
                log_message('error', 'AccountCompletionService: failed to inspect table {table}: {msg}', [
                    'table' => $table,
                    'msg' => $e->getMessage(),
                ]);
                $this->columnCache[$table] = [];
            }
        }

        return in_array($column, $this->columnCache[$table], true);
    }
}
