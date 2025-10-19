<?php

namespace App\Services;

use Config\Services;
use App\Config\SiteSettings;
use App\Libraries\{BaseLoader};
use App\Models\{AccountsModel, BudgetModel, UserModel};
use App\Services\UserService;
use CodeIgniter\I18n\Time;
use DateTime;
use DateInterval;
use DateTimeZone;
use RuntimeException;

class BudgetService
{

    protected $auth;
    protected $cuID;
    protected $siteSettings; 
    protected $debug; 
    protected $session; 
    protected $accountsModel;
    protected $budgetModel;
    protected $userModel;
    protected $userService;
    protected string $timezone = 'America/Chicago';

    public function __construct(?int $userId = null)
    {
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;

        $this->accountsModel = new AccountsModel();
        $this->budgetModel = new BudgetModel();
        // $this->userModel = new UserModel();

        // Initialize UserService and pass required dependencies
        // $this->cuID = getCuID();  // Assuming getCuID() is a helper or service

        $this->setUserId($userId);
    }

    public function setUserId(?int $userId): void
    {
        $userId = $userId !== null ? (int) $userId : null;

        if ($this->cuID === $userId) {
            return;
        }

        $this->cuID = $userId;

        if ($userId === null) {
            $this->userService = null;
            return;
        }

        $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());
    }

    private function requireUserId(): int
    {
        if ($this->cuID === null) {
            throw new RuntimeException('BudgetService requires an authenticated user ID for this action.');
        }

        return $this->cuID;
    }

    private function asFloat($value): float
    {
        if (is_numeric($value)) {
            return (float) $value;
        }

        if (is_string($value)) {
            $clean = preg_replace('/[^0-9.\-]/', '', $value);
            if ($clean === null || $clean === '' || $clean === '-' || $clean === '.') {
                return 0.0;
            }

            return (float) $clean;
        }

        return 0.0;
    }

    private function parseRecordDate(array $record): ?DateTime
    {
        $dateStr = trim((string) ($record['designated_date'] ?? ''));
        if ($dateStr !== '') {
            $dt = DateTime::createFromFormat('m/d/Y', $dateStr);
            if ($dt instanceof DateTime) {
                $dt->setTime(0, 0, 0);
                return $dt;
            }
        }

        $year  = (int) ($record['year'] ?? 0);
        $month = (int) ($record['month'] ?? 0);
        $day   = (int) ($record['day'] ?? 0);

        if ($year > 0 && $month > 0 && $day > 0) {
            $dt = DateTime::createFromFormat('Y-n-j', sprintf('%d-%d-%d', $year, $month, $day));
            if ($dt instanceof DateTime) {
                $dt->setTime(0, 0, 0);
                return $dt;
            }
        }

        return null;
    }

    private function isOutflow(array $record): bool
    {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '')));
        if ($type !== '') {
            $outflows = ['expense', 'debt', 'loan', 'liability', 'bill', 'payment'];
            $inflows  = ['income', 'salary', 'wages', 'paycheck', 'bonus', 'deposit', 'refund', 'rebate', 'self-employment'];
            if (in_array($type, $outflows, true)) {
                return true;
            }
            if (in_array($type, $inflows, true)) {
                return false;
            }
        }

        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|pay(check)?|bonus|deposit|refund|rebate|self-?employment/', $src)) {
            return false;
        }

        return true;
    }

    private function classifyRecord(array $record): string
    {
        $type = strtolower(trim($record['account_type'] ?? ''));
        $src  = strtolower(trim($record['source_type'] ?? ''));

        if ($type === 'investment' || str_contains($type, 'invest')) {
            return 'investment';
        }

        if (str_contains($src, 'invest')) {
            return 'investment';
        }

        return $this->isOutflow($record) ? 'expense' : 'income';
    }

    private function formatCurrency(float $amount): string
    {
        $prefix = $amount < 0 ? '-$' : '$';
        return $prefix . number_format(abs($amount), 2);
    }

    public function getInitialBankBalance(int $userId, ?string $asOf = null, ?int $accountId = null): float
    {
        static $cache = [];

        $cacheKey = implode('|', [
            $userId,
            $asOf !== null ? $asOf : 'today',
            $accountId !== null ? (string) $accountId : 'all',
        ]);

        if (array_key_exists($cacheKey, $cache)) {
            return $cache[$cacheKey];
        }

        $balance = 0.0;

        try {
            $balance = $this->budgetModel->getInitialBankBalance($userId, $asOf, $accountId);
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::getInitialBankBalance error: {msg}', ['msg' => $e->getMessage()]);
        }

        return $cache[$cacheKey] = (float) $balance;
    }

    public function getRecentMonthlyAverages(int $userId, int $months = 3): array
    {
        try {
            if (isset($this->budgetModel) && method_exists($this->budgetModel, 'getRecentMonthlyAverages')) {
                $result = $this->budgetModel->getRecentMonthlyAverages($userId, $months);
                if (is_array($result) && isset($result['income'], $result['expense'])) {
                    return $result;
                }
            }

            if (isset($this->budgetModel) && method_exists($this->budgetModel, 'getAverages')) {
                $legacy = $this->budgetModel->getAverages($userId, $months);
                if (is_array($legacy) && isset($legacy['income'], $legacy['expense'])) {
                    $legacy['monthsConsidered'] = $legacy['monthsConsidered'] ?? $months;
                    $legacy['series'] = $legacy['series'] ?? [];
                    return $legacy;
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::getRecentMonthlyAverages error: {msg}', ['msg' => $e->getMessage()]);
        }

        return [
            'income'           => 0.0,
            'expense'          => 0.0,
            'monthsConsidered' => max(1, (int) $months),
            'series'           => [],
        ];
    }

    public function buildForecast(int $userId, int $months, array $opt = []): array
    {
        try {
            if (isset($this->budgetModel) && method_exists($this->budgetModel, 'buildForecast')) {
                return $this->budgetModel->buildForecast($userId, $months, $opt);
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::buildForecast error: {msg}', ['msg' => $e->getMessage()]);
        }

        $rows    = [];
        $income  = (float) ($opt['startIncome'] ?? 0.0);
        $expense = (float) ($opt['startExpense'] ?? 0.0);
        $gInc    = (float) ($opt['monthlyIncomeGrowth'] ?? 0.0);
        $gExp    = (float) ($opt['monthlyExpenseGrowth'] ?? 0.0);
        $balance = (float) ($opt['startingBalance'] ?? 0.0);
        $startDate = $opt['startDate'] ?? new \DateTime('first day of this month', new \DateTimeZone($this->timezone));

        if ($startDate instanceof \DateTimeInterface) {
            $cursor = (clone $startDate);
        } else {
            try {
                $cursor = new \DateTime(is_string($startDate) ? $startDate : 'first day of this month', new \DateTimeZone($this->timezone));
            } catch (\Exception $e) {
                $cursor = new \DateTime('first day of this month', new \DateTimeZone($this->timezone));
            }
        }

        $cursor->setTime(0, 0)->modify('first day of this month');

        for ($i = 0; $i < $months; $i++) {
            $income  *= (1 + $gInc);
            $expense *= (1 + $gExp);
            $net      = $income - $expense;
            $balance += $net;
            $rows[] = [
                'monthIndex' => $i + 1,
                'date'       => $cursor->format('Y-m-01'),
                'income'     => round($income, 2),
                'expense'    => round($expense, 2),
                'net'        => round($net, 2),
                'cumulative' => round($balance, 2),
            ];
            $cursor->modify('+1 month');
        }

        return $rows;
    }

    public function resolvePeriodWindow(?string $from = null, ?string $to = null): array
    {
        $tz = $this->timezone;
        $warnings = [];

        $now = Time::now($tz);
        $defaultStart = Time::parse($now->format('Y-m-01 00:00:00'), $tz);
        $defaultEnd   = Time::parse($defaultStart->format('Y-m-t 23:59:59'), $tz);

        $start = $this->parseInputDate($from, $defaultStart, true, $tz, $warnings);
        $end   = $this->parseInputDate($to, $defaultEnd, false, $tz, $warnings);

        if ($start->getTimestamp() > $end->getTimestamp()) {
            $warnings[] = 'Start date exceeded end date. Values were swapped automatically.';
            [$start, $end] = [$end, $start];
        }

        return [
            'from'     => $start,
            'to'       => $end,
            'timezone' => $tz,
            'input'    => ['from' => $from, 'to' => $to],
            'warnings' => array_values(array_unique($warnings)),
            'cacheKey' => $start->toDateString() . ':' . $end->toDateString(),
        ];
    }

    private function parseInputDate(?string $value, Time $fallback, bool $isStart, string $timezone, array &$warnings): Time
    {
        if ($value !== null && $value !== '') {
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) === 1) {
                $suffix = $isStart ? ' 00:00:00' : ' 23:59:59';
                $candidate = Time::createFromFormat('Y-m-d H:i:s', $value . $suffix, $timezone);
                if ($candidate instanceof Time) {
                    return $candidate;
                }
            }

            $warnings[] = sprintf(
                'Invalid %s date supplied (%s); defaulting to current month.',
                $isStart ? 'start' : 'end',
                $value
            );
        }

        return Time::createFromTimestamp($fallback->getTimestamp(), $timezone);
    }

    private function computeLedgerSnapshot(int $userId, Time $from, Time $to, array $periodWarnings = []): array
    {
        $fromTs = $from->getTimestamp();
        $toTs   = $to->getTimestamp();

        $records = $this->budgetModel->getPeriodRecords(
            $userId,
            $fromTs,
            $toTs,
            (int) $from->format('Y'),
            (int) $to->format('Y')
        );

        $filtered         = [];
        $notes            = $periodWarnings;
        $incomeBudgeted   = 0.0;
        $expenseBudgeted  = 0.0;
        $fixedExpenses    = 0.0;
        $variableExpenses = 0.0;
        $savingsReserved  = 0.0;
        $adjustments      = 0.0;

        foreach ($records as $record) {
            $recordDate = $this->parseRecordDate($record);
            if (!$recordDate instanceof DateTime) {
                $notes[] = sprintf('Budget record %s missing a valid due date and was excluded.', $record['id'] ?? 'unknown');
                continue;
            }

            $timestamp = $recordDate->getTimestamp();
            if ($timestamp < $fromTs || $timestamp > $toTs) {
                continue;
            }

            $record['_recordDate'] = $recordDate->format('Y-m-d');
            $filtered[] = $record;

            $netAmount = $this->asFloat($record['net_amount'] ?? 0);
            $classification = $this->classifyRecord($record);
            $isRecurring = strtolower((string) ($record['recurring_account'] ?? '')) === 'yes';

            if ($classification === 'income') {
                $incomeBudgeted += $netAmount;
            } else {
                $expenseBudgeted += $netAmount;
                if ($isRecurring) {
                    $fixedExpenses += $netAmount;
                } else {
                    $variableExpenses += $netAmount;
                }
            }

            if ($this->looksLikeSavings($record)) {
                $savingsReserved += $netAmount;
            }

            if ($this->looksLikeAdjustment($record)) {
                $adjustments += $netAmount;
            }
        }

        $actuals = $this->extractActuals($userId, $from, $to);
        $incomeActual  = (float) ($actuals['income'] ?? 0.0);
        $expenseActual = (float) ($actuals['expense'] ?? 0.0);
        $actualsAvailable = (bool) ($actuals['available'] ?? false);

        if (!$actualsAvailable) {
            $notes[] = 'Actual transaction data unavailable; using budgeted amounts for variance.';
        }

        $creditAccounts   = $this->accountsModel->getUserCreditAccounts($userId);
        $debtAccounts     = $this->accountsModel->getUserDebtAccounts($userId);
        $bankAccounts     = $this->accountsModel->getUserBankAccounts($userId);
        $debtMinimums     = $this->budgetModel->sumDebtMinimums($userId);
        $cashEquivalents  = $this->coerceCashEquivalents($bankAccounts);

        return [
            'records' => $filtered,
            'totals'  => [
                'income' => [
                    'budgeted' => round($incomeBudgeted, 2),
                    'actual'   => round($incomeActual, 2),
                ],
                'expenses' => [
                    'budgeted' => round($expenseBudgeted, 2),
                    'actual'   => round($expenseActual, 2),
                ],
                'fixedExpenses'        => round($fixedExpenses, 2),
                'variableExpenses'     => round($variableExpenses, 2),
                'savingsReserved'      => round($savingsReserved, 2),
                'adjustments'          => round($adjustments, 2),
                'minDebtPayments'      => round($debtMinimums['total'], 2),
                'debtMinimumBreakdown' => $debtMinimums,
            ],
            'flags' => [
                'actualsAvailable' => $actualsAvailable,
            ],
            'notes'           => array_values(array_unique($notes)),
            'creditAccounts'  => $creditAccounts,
            'debtAccounts'    => $debtAccounts,
            'bankAccounts'    => $bankAccounts,
            'cashEquivalents' => $cashEquivalents,
        ];
    }

    private function coerceCashEquivalents(array $accounts): float
    {
        $total = 0.0;
        foreach ($accounts as $account) {
            if (isset($account['balance'])) {
                $total += $this->asFloat($account['balance']);
                continue;
            }

            if (isset($account['available_balance'])) {
                $total += $this->asFloat($account['available_balance']);
                continue;
            }

            if (isset($account['current_balance'])) {
                $total += $this->asFloat($account['current_balance']);
            }
        }

        return round($total, 2);
    }

    private function extractActuals(int $userId, Time $from, Time $to): array
    {
        // Placeholder for future integration with transaction aggregations (Plaid, wallet sync, etc.)
        return [
            'income'   => 0.0,
            'expense'  => 0.0,
            'available'=> false,
        ];
    }

    private function looksLikeSavings(array $record): bool
    {
        $type = strtolower((string) ($record['account_type'] ?? ''));
        $source = strtolower((string) ($record['source_type'] ?? ''));

        if ($type === 'savings' || str_contains($type, 'savings') || str_contains($type, 'reserve')) {
            return true;
        }

        return str_contains($source, 'savings') || str_contains($source, 'reserve') || str_contains($source, 'emergency');
    }

    private function looksLikeAdjustment(array $record): bool
    {
        $mode   = strtolower((string) ($record['mode'] ?? ''));
        $type   = strtolower((string) ($record['account_type'] ?? ''));
        $source = strtolower((string) ($record['source_type'] ?? ''));

        return str_contains($mode, 'adjust') || str_contains($type, 'adjust') || str_contains($source, 'adjust');
    }

    private function calculateAvailableAmount(array $totals): array
    {
        $income      = (float) ($totals['income']['budgeted'] ?? 0);
        $fixed       = (float) ($totals['fixedExpenses'] ?? 0);
        $variable    = (float) ($totals['variableExpenses'] ?? 0);
        $minDebt     = (float) ($totals['minDebtPayments'] ?? 0);
        $adjustments = (float) ($totals['adjustments'] ?? 0);
        $reserved    = (float) ($totals['savingsReserved'] ?? 0);

        $raw = $income - $fixed - $variable - $minDebt + $adjustments - $reserved;
        $clamped = $raw < 0 ? 0.0 : $raw;
        $overAllocation = $raw < 0 ? abs($raw) : 0.0;

        return [
            'raw'            => round($raw, 2),
            'clamped'        => round($clamped, 2),
            'overAllocation' => round($overAllocation, 2),
            'components'     => [
                'income'          => round($income, 2),
                'fixedExpenses'   => round($fixed, 2),
                'variableBudget'  => round($variable, 2),
                'minDebtPayments' => round($minDebt, 2),
                'adjustments'     => round($adjustments, 2),
                'reservedSavings' => round($reserved, 2),
            ],
        ];
    }

    private function calculatePercentage(float $portion, float $total): float
    {
        if ($total <= 0.0) {
            return 0.0;
        }

        return round(($portion / $total) * 100, 2);
    }

    private function fallbackDueDate(): string
    {
        $tz  = new DateTimeZone($this->timezone);
        $now = new DateTime('now', $tz);
        $lastDay = (int) $now->format('t');
        $targetDay = min(28, $lastDay);
        $now->setDate((int) $now->format('Y'), (int) $now->format('m'), $targetDay);

        return $now->format('Y-m-d');
    }

    private function normalizeDueDate($value): array
    {
        if (empty($value)) {
            return ['date' => $this->fallbackDueDate(), 'estimated' => true];
        }

        $formats = ['Y-m-d', 'm/d/Y', 'n/j/Y'];
        foreach ($formats as $format) {
            $dt = DateTime::createFromFormat($format, (string) $value);
            if ($dt instanceof DateTime) {
                return ['date' => $dt->format('Y-m-d'), 'estimated' => false];
            }
        }

        return ['date' => $this->fallbackDueDate(), 'estimated' => true];
    }

    private function estimateMonthsToZero(float $balance, float $aprPercent, float $payment): ?int
    {
        if ($balance <= 0.0) {
            return 0;
        }

        if ($payment <= 0.0) {
            return null;
        }

        $monthlyRate = $aprPercent > 0 ? ($aprPercent / 100) / 12 : 0.0;

        if ($monthlyRate <= 0.0) {
            return (int) ceil($balance / $payment);
        }

        if ($payment <= $balance * $monthlyRate) {
            return null; // Payment too small to reduce balance
        }

        $months = log($payment / ($payment - $balance * $monthlyRate)) / log(1 + $monthlyRate);

        return (int) ceil($months);
    }

    private function buildRepaymentAccountRow(array $account, string $type): array
    {
        $balance = $this->asFloat($account['current_balance'] ?? $account['balance'] ?? 0);
        $limit   = $this->asFloat($account['credit_limit'] ?? 0);
        $minimum = $type === 'credit'
            ? $this->asFloat($account['payment_due'] ?? 0)
            : $this->asFloat($account['monthly_payment'] ?? 0);
        $apr     = $this->asFloat($account['interest_rate'] ?? 0);
        $dueMeta = $this->normalizeDueDate($account['due_date'] ?? null);

        return [
            'id'               => (int) ($account['id'] ?? 0),
            'name'             => $account['nickname'] ?? $account['bank_name'] ?? $account['account_type'] ?? ucfirst($type) . ' Account',
            'type'             => $type,
            'balance'          => round($balance, 2),
            'limit'            => round($limit, 2),
            'minimumPayment'   => round($minimum, 2),
            'interestRate'     => round($apr, 2),
            'dueDate'          => $dueMeta['date'],
            'dueDateEstimated' => $dueMeta['estimated'],
        ];
    }

    public function buildBudgetSummary(int $userId, array $options = []): array
    {
        $this->setUserId($userId);
        $period = $this->resolvePeriodWindow($options['from'] ?? null, $options['to'] ?? null);
        $snapshot = $this->computeLedgerSnapshot($userId, $period['from'], $period['to'], $period['warnings']);

        $available = $this->calculateAvailableAmount($snapshot['totals']);
        $creditOverview = $this->buildCreditBreakdown($userId, $snapshot['creditAccounts']);

        $notes = array_values(array_unique(array_merge($snapshot['notes'], $creditOverview['data']['notes'] ?? [])));
        $status = $notes ? 'degraded' : 'success';

        $income   = $snapshot['totals']['income'];
        $expenses = $snapshot['totals']['expenses'];
        $netBudgeted = round($income['budgeted'] - $expenses['budgeted'], 2);
        $netActual   = round($income['actual'] - $expenses['actual'], 2);

        $data = [
            'period' => [
                'from'     => $period['from']->toDateString(),
                'to'       => $period['to']->toDateString(),
                'timezone' => $period['timezone'],
            ],
            'cards' => [
                'income' => [
                    'budgeted' => $income['budgeted'],
                    'actual'   => $income['actual'],
                    'variance' => round($income['budgeted'] - $income['actual'], 2),
                ],
                'expenses' => [
                    'budgeted' => $expenses['budgeted'],
                    'actual'   => $expenses['actual'],
                    'variance' => round($expenses['budgeted'] - $expenses['actual'], 2),
                ],
                'net' => [
                    'budgeted' => $netBudgeted,
                    'actual'   => $netActual,
                    'variance' => round($netBudgeted - $netActual, 2),
                ],
                'available' => [
                    'raw'            => $available['raw'],
                    'display'        => $available['clamped'],
                    'overAllocation' => $available['overAllocation'],
                ],
                'savingsRate' => [
                    'percent' => $this->calculatePercentage($snapshot['totals']['savingsReserved'], $income['budgeted']),
                    'reserved'=> $snapshot['totals']['savingsReserved'],
                ],
                'creditUtilization' => $creditOverview['data']['aggregate'],
            ],
            'availableBreakdown' => $available['components'],
            'flags' => [
                'actualsAvailable' => $snapshot['flags']['actualsAvailable'],
                'notes'            => $notes,
            ],
        ];

        return [
            'status' => $status,
            'data'   => $data,
        ];
    }

    public function buildCreditBreakdown(int $userId, ?array $prefetchedAccounts = null): array
    {
        $accounts = $prefetchedAccounts ?? $this->accountsModel->getUserCreditAccounts($userId);
        $cards = [];
        $notes = [];

        $totalLimit     = 0.0;
        $totalBalance   = 0.0;
        $totalAvailable = 0.0;
        $minimumTotal   = 0.0;
        $weightedAprAccumulator = 0.0;
        $estimatedDueCount = 0;

        foreach ($accounts as $account) {
            $limit    = $this->asFloat($account['credit_limit'] ?? 0);
            $balance  = $this->asFloat($account['current_balance'] ?? 0);
            $available = $this->asFloat($account['available_balance'] ?? 0);
            $minimum  = $this->asFloat($account['payment_due'] ?? 0);
            $apr      = $this->asFloat($account['interest_rate'] ?? 0);
            $dueMeta  = $this->normalizeDueDate($account['due_date'] ?? null);

            if ($dueMeta['estimated']) {
                $estimatedDueCount++;
            }

            $utilization = $limit > 0 ? round(($balance / $limit) * 100, 2) : null;

            $cards[] = [
                'id'                 => (int) ($account['id'] ?? 0),
                'name'               => $account['nickname'] ?? $account['bank_name'] ?? 'Credit Account',
                'bank'               => $account['bank_name'] ?? null,
                'type'               => $account['account_type'] ?? 'credit',
                'currentBalance'     => round($balance, 2),
                'creditLimit'        => round($limit, 2),
                'availableBalance'   => round($available, 2),
                'utilizationPercent' => $utilization !== null ? round($utilization, 2) : null,
                'minimumDue'         => round($minimum, 2),
                'interestRate'       => round($apr, 2),
                'dueDate'            => $dueMeta['date'],
                'dueDateEstimated'   => $dueMeta['estimated'],
            ];

            $totalLimit     += $limit;
            $totalBalance   += $balance;
            $totalAvailable += $available;
            $minimumTotal   += $minimum;
            $weightedAprAccumulator += ($balance > 0 && $apr > 0) ? ($balance * $apr) : 0.0;
        }

        if ($estimatedDueCount > 0) {
            $notes[] = sprintf('%d credit account(s) missing due dates; estimated using the 28th of the month.', $estimatedDueCount);
        }

        $aggregateUtilization = $totalLimit > 0 ? round(($totalBalance / $totalLimit) * 100, 2) : 0.0;
        $weightedApr = $totalBalance > 0 ? round($weightedAprAccumulator / $totalBalance, 2) : 0.0;

        $data = [
            'aggregate' => [
                'totalLimit'        => round($totalLimit, 2),
                'totalBalance'      => round($totalBalance, 2),
                'totalAvailable'    => round($totalAvailable, 2),
                'utilizationPercent'=> $aggregateUtilization,
                'minimumDue'        => round($minimumTotal, 2),
                'weightedApr'       => $weightedApr,
            ],
            'cards' => $cards,
            'notes' => $notes,
        ];

        $status = $notes ? 'degraded' : 'success';

        return [
            'status' => $status,
            'data'   => $data,
        ];
    }

    public function buildAvailableSnapshot(int $userId, array $options = []): array
    {
        $this->setUserId($userId);
        $period = $this->resolvePeriodWindow($options['from'] ?? null, $options['to'] ?? null);
        $snapshot = $this->computeLedgerSnapshot($userId, $period['from'], $period['to'], $period['warnings']);
        $available = $this->calculateAvailableAmount($snapshot['totals']);

        $data = [
            'period' => [
                'from'     => $period['from']->toDateString(),
                'to'       => $period['to']->toDateString(),
                'timezone' => $period['timezone'],
            ],
            'totals' => [
                'raw'            => $available['raw'],
                'display'        => $available['clamped'],
                'overAllocation' => $available['overAllocation'],
            ],
            'components' => $available['components'],
            'notes'      => $snapshot['notes'],
        ];

        $status = $snapshot['notes'] ? 'degraded' : 'success';

        return [
            'status' => $status,
            'data'   => $data,
        ];
    }

    public function buildRepaymentSnapshot(int $userId, array $options = []): array
    {
        $this->setUserId($userId);
        $strategy = strtolower($options['strategy'] ?? 'avalanche');
        if (!in_array($strategy, ['avalanche', 'snowball'], true)) {
            $strategy = 'avalanche';
        }

        $creditAccounts = $this->accountsModel->getUserCreditAccounts($userId);
        $debtAccounts   = $this->accountsModel->getUserDebtAccounts($userId);

        $accounts = [];
        foreach ($creditAccounts as $account) {
            $accounts[] = $this->buildRepaymentAccountRow($account, 'credit');
        }
        foreach ($debtAccounts as $account) {
            $accounts[] = $this->buildRepaymentAccountRow($account, 'debt');
        }

        $notes = [];
        $totalBalance = 0.0;
        $totalMinimum = 0.0;
        $weightedAprAccumulator = 0.0;
        $now = Time::now($this->timezone);

        foreach ($accounts as &$account) {
            $totalBalance += $account['balance'];
            $totalMinimum += $account['minimumPayment'];
            if ($account['balance'] > 0 && $account['interestRate'] > 0) {
                $weightedAprAccumulator += $account['balance'] * $account['interestRate'];
            }

            $monthsToZero = $this->estimateMonthsToZero($account['balance'], $account['interestRate'], $account['minimumPayment']);
            $account['monthsToZero'] = $monthsToZero;
            $account['estimatedPayoffDate'] = $monthsToZero !== null
                ? $now->copy()->addMonths($monthsToZero)->toDateString()
                : null;

            if ($monthsToZero === null && $account['balance'] > 0 && $account['minimumPayment'] > 0) {
                $notes[] = sprintf('Minimum payment for %s is insufficient to reduce balance.', $account['name']);
            }

            if ($account['minimumPayment'] <= 0 && $account['balance'] > 0) {
                $notes[] = sprintf('Account %s has no minimum payment recorded.', $account['name']);
            }
        }
        unset($account);

        usort($accounts, function (array $a, array $b) use ($strategy) {
            if ($strategy === 'snowball') {
                return ($a['balance'] <=> $b['balance']) ?: ($b['interestRate'] <=> $a['interestRate']);
            }

            return ($b['interestRate'] <=> $a['interestRate']) ?: ($b['balance'] <=> $a['balance']);
        });

        $weightedApr = $totalBalance > 0 ? round($weightedAprAccumulator / $totalBalance, 2) : 0.0;

        $data = [
            'strategy' => $strategy,
            'aggregate' => [
                'totalBalance'        => round($totalBalance, 2),
                'totalMinimumPayment' => round($totalMinimum, 2),
                'weightedApr'         => $weightedApr,
            ],
            'nextPayments' => array_slice($accounts, 0, 5),
            'accounts'     => $accounts,
            'notes'        => array_values(array_unique($notes)),
        ];

        $status = $data['notes'] ? 'degraded' : 'success';

        return [
            'status' => $status,
            'data'   => $data,
        ];
    }

    public function buildCategoryVariance(int $userId, array $options = []): array
    {
        $this->setUserId($userId);
        $page    = max(1, (int) ($options['page'] ?? 1));
        $perPage = max(1, min(100, (int) ($options['perPage'] ?? 25)));

        $period = $this->resolvePeriodWindow($options['from'] ?? null, $options['to'] ?? null);
        $snapshot = $this->computeLedgerSnapshot($userId, $period['from'], $period['to'], $period['warnings']);

        $categories = [];
        foreach ($snapshot['records'] as $record) {
            $categoryKey = trim((string) ($record['source_type'] ?? '')) ?: trim((string) ($record['account_type'] ?? 'Uncategorized'));
            if ($categoryKey === '') {
                $categoryKey = 'Uncategorized';
            }

            if (!isset($categories[$categoryKey])) {
                $categories[$categoryKey] = [
                    'category' => $categoryKey,
                    'type'     => $this->classifyRecord($record) === 'income' ? 'income' : 'expense',
                    'budgeted' => 0.0,
                    'actual'   => 0.0,
                ];
            }

            $netAmount = $this->asFloat($record['net_amount'] ?? 0);
            $categories[$categoryKey]['budgeted'] += $netAmount;
        }

        foreach ($categories as &$category) {
            $category['budgeted'] = round($category['budgeted'], 2);
            $category['actual']   = round($category['actual'], 2);
            $category['variance'] = round($category['budgeted'] - $category['actual'], 2);
        }
        unset($category);

        usort($categories, function (array $a, array $b) {
            return abs($b['budgeted']) <=> abs($a['budgeted']);
        });

        $totalBudgeted = array_reduce($categories, static function ($carry, $item) {
            return $carry + $item['budgeted'];
        }, 0.0);

        $totalActual = array_reduce($categories, static function ($carry, $item) {
            return $carry + $item['actual'];
        }, 0.0);

        $total = count($categories);
        $totalPages = (int) max(1, ceil($total / $perPage));
        $offset = ($page - 1) * $perPage;
        $paged = array_slice($categories, $offset, $perPage);

        $data = [
            'period' => [
                'from'     => $period['from']->toDateString(),
                'to'       => $period['to']->toDateString(),
                'timezone' => $period['timezone'],
            ],
            'categories' => $paged,
            'pagination' => [
                'page'       => $page,
                'perPage'    => $perPage,
                'total'      => $total,
                'totalPages' => $totalPages,
            ],
            'totals' => [
                'budgeted' => round($totalBudgeted, 2),
                'actual'   => round($totalActual, 2),
                'variance' => round($totalBudgeted - $totalActual, 2),
            ],
            'notes' => $snapshot['notes'],
        ];

        $status = $snapshot['notes'] ? 'degraded' : 'success';

        return [
            'status' => $status,
            'data'   => $data,
        ];
    }
    
    public function addAccount($accountData) {
        return $this->budgetModel->insertAccount($accountData);
    }

    public function approveRecurringSchedule($accountID, $formData) {
        // Log input data
        log_message('debug', 'BudgetService L45 - Approving recurring schedule for AccountID: ' . $accountID . ' with data: ' . print_r($formData, true));
    
        // Validate the required fields
        // if (empty($formData['netAmount'])) {
        //     return ['success' => false, 'message' => 'Missing net or gross amount in request.'];
        // }
    
        $userId = $this->requireUserId();
    
        $netAmount = floatval(str_replace(',', '', $formData['netAmount']));
        $grossAmount = floatval(str_replace(',', '', $formData['grossAmount']));

        log_message('debug', 'BudgetService L861 - $netAmount: ' . $netAmount . ' | $grossAmount: ' . $grossAmount);

        // Prepare the data for insertion
        $data = [
            'account_id' => $accountID,
            'status' => 1,
            'beta' => $this->siteSettings->beta,
            'mode' => 'Recurring',
            'created_by' => $userId ?? $this->cuID ?? 0,
            'created_by_email' => $formData['cuEmail'] ?? '',
            'unix_timestamp' => time(),
            'designated_date' => $formData['dueDate'] ?? '',
            'month' => date('m', strtotime($formData['dueDate'])),
            'day' => date('d', strtotime($formData['dueDate'])),
            'year' => date('Y', strtotime($formData['dueDate'])),
            'username' => $formData['cuUsername'] ?? '',
            'name' => $formData['accountName'] ?? '',
            'net_amount' => $netAmount,
            'gross_amount' => $grossAmount,
            'recurring_account' => 'Yes',
            'account_type' => $formData['accountType'] ?? '',
            'source_type' => $formData['accountSourceType'] ?? '',
        ];
    
        log_message('debug', 'BudgetService L885 - $data Array: '. (print_r($data, true)));
        
        // Insert the schedule into the database
        if (!$this->budgetModel->approveRecurringSchedule($data)) {
            log_message('error', 'Failed to insert recurring schedule for Account ID: ' . $accountID);
            return ['success' => false, 'message' => 'Failed to insert recurring schedule.'];
        }
        log_message('debug', 'Successfully inserted recurring schedule for Account ID: ' . $accountID);
    
        return ['success' => true, 'message' => 'Recurring schedules successfully created.'];
    }

    // Method to bulk delete multiple accounts
    public function bulkDelete($ids) {
        return $this->budgetModel->bulkDelete($ids);
    }
    
    // Method to bulk update the status of multiple accounts
    public function bulkUpdateStatus($ids, $status) {
        return $this->budgetModel->bulkUpdateStatus($ids, $status);
    }

    public function calculateDebtPayoff($totalDebt, $interestRate, $monthlyPayment) {
        $months = 0;
        $remainingDebt = $totalDebt;
        $totalInterest = 0;

        while ($remainingDebt > 0) {
            $interest = $remainingDebt * $interestRate / 12;
            $totalInterest += $interest;
            $remainingDebt = $remainingDebt + $interest - $monthlyPayment;
            $months++;
        }

        return [
            'monthsToPayOff' => $months,
            'totalInterest' => $totalInterest,
        ];
    }

    /**
     * Calculate the time required to pay off a debt based on monthly payments.
     */
    public function calculateDebtRepayment($totalDebt, $interestRate, $monthlyPayment) {
        $months = 0;
        $remainingDebt = $totalDebt;
        $totalInterest = 0;

        while ($remainingDebt > 0) {
            $interest = $remainingDebt * ($interestRate / 100) / 12; 
            $totalInterest += $interest;
            $remainingDebt = $remainingDebt + $interest - $monthlyPayment;
            $months++;
        }

        return [
            'monthsToPayOff' => $months,
            'totalInterestPaid' => round($totalInterest, 2)
        ];
    }

    public function calculateForecastData($budgetData, $years) {
        $months = [];
        $incomes = [];
        $expenses = [];
        $surpluses = [];
        $initialIncome = array_sum(array_column(array_filter($budgetData, function ($item) {
            return $item['account_type'] === 'Income';
        }), 'net_amount'));
        $initialExpense = array_sum(array_column(array_filter($budgetData, function ($item) {
            return $item['account_type'] === 'Expense';
        }), 'net_amount'));

        for ($i = 0; $i < $years * 12; $i++) {
            $monthIndex = $i % 12;
            $yearIndex = floor($i / 12);
            $monthName = date('F', mktime(0, 0, 0, $monthIndex + 1, 10)) . ' ' . (date('Y') + $yearIndex);
            $months[] = $monthName;

            $growthFactor = pow(1.03, $yearIndex);
            $monthlyIncome = $initialIncome * $growthFactor;
            $monthlyExpense = $initialExpense * $growthFactor;

            $incomes[] = $monthlyIncome;
            $expenses[] = $monthlyExpense;
            $surpluses[] = $monthlyIncome - $monthlyExpense;
        }

        return [
            'months' => $months,
            'incomes' => $incomes,
            'expenses' => $expenses,
            'surpluses' => $surpluses
        ];
    }

    public function calculateMonthlyData($budgetData) {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $incomes = array_fill(0, 12, 0);
        $expenses = array_fill(0, 12, 0);
        $surpluses = array_fill(0, 12, 0);

        foreach ($budgetData as $item) {
            $monthIndex = date('n', strtotime($item['designated_date'])) - 1;
            if ($item['account_type'] === 'Income') {
                $incomes[$monthIndex] += $item['net_amount'];
            } elseif ($item['account_type'] === 'Expense') {
                $expenses[$monthIndex] += $item['net_amount'];
            }
        }

        for ($i = 0; $i < 12; $i++) {
            $surpluses[$i] = $incomes[$i] - $expenses[$i];
        }

        return [
            'months' => $months,
            'incomes' => $incomes,
            'expenses' => $expenses,
            'surpluses' => $surpluses
        ];
    }

    // Repayment schedule calculations for credit accounts
    public function calculateRepaymentSchedules($creditAccounts) {
        if ($this->debug === 1) {
            log_message('debug', 'BudgetService L261 - Processing credit accounts: ' . print_r($creditAccounts, true));
        }
    
        $repaymentSchedules = [];
        
        if (!is_array($creditAccounts)) {
            log_message('error', 'BudgetService::calculateRepaymentSchedules received null or invalid $creditAccounts');
            return [];
        }
        
        foreach ($creditAccounts as $account) {
            // Ensure due_date exists and is valid
            if (empty($account['due_date']) || !strtotime($account['due_date'])) {
                log_message('error', 'BudgetService L261 - Missing or invalid due_date for account ID: ' . ($account['id'] ?? 'UNKNOWN'));
                
                // Assign fallback due date
                $dueDate = (new DateTime())->modify('first day of next month')->modify('+14 days');
                log_message('debug', "BudgetService L261 - Assigned default due_date: " . $dueDate->format('Y-m-d') . " for account ID: " . ($account['id'] ?? 'UNKNOWN'));
            } else {
                $dueDate = DateTime::createFromFormat('Y-m-d', $account['due_date']) ?: 
                           DateTime::createFromFormat('m/d/Y', $account['due_date']) ?: 
                           DateTime::createFromFormat('d/m/Y', $account['due_date']);
            
                if ($dueDate === false) {
                    log_message('error', 'BudgetService L261 - Invalid due_date format: ' . $account['due_date']);
                    $dueDate = (new DateTime())->modify('first day of next month')->modify('+14 days');
                    log_message('debug', "BudgetService L261 - Re-assigned default due_date due to format error: " . $dueDate->format('Y-m-d'));
                }
            }            
    
            // Proceed with repayment schedule calculations
            $currentBalance = floatval($account['current_balance']);
            $interestRate = floatval($account['interest_rate']) / 100;
            $monthlyPayment = floatval($account['payment_due']);
            $iterations = 0;
    
            while ($currentBalance > 0 && $iterations < 1000) {
                $dueDate->modify('+1 month'); // Move due date forward
                $interest = $currentBalance * $interestRate / 12;
                $currentBalance = max($currentBalance + $interest - $monthlyPayment, 0);
    
                $repaymentSchedules[] = [
                    'account_id' => $account['id'],
                    'bank_name' => $account['bank_name'],
                    'due_date' => $dueDate->format('Y-m-d'),
                    'payment_due' => $monthlyPayment,
                    'remaining_balance' => $currentBalance,
                ];
                $iterations++;
            }
        }
    
        if ($this->debug === 1) {
            // log_message('debug', 'BudgetService L295 - $repaymentSchedules: ' . print_r($repaymentSchedules, true));
        }
    
        return $repaymentSchedules;
    }
    
    public function calculateVariance($budgetData, $actualData) {
        $variance = [];
        foreach ($budgetData as $key => $budgetItem) {
            $actualAmount = isset($actualData[$key]) ? $actualData[$key] : 0;
            $variance[$key] = $budgetItem - $actualAmount;
        }
        return $variance;
    }

    // Services for canceling or bulk updating accounts
    public function cancelAccount($accountId) {
        return $this->budgetModel->cancelAccount($accountId);
    }

    public function cancelSubaccount($accountId) {
        return $this->budgetModel->cancelSubaccount($accountId);
    }

    public function createSavingsGoal($userId, $goalName, $targetAmount, $targetDate) {
        return $this->budgetModel->createSavingsGoal([
            'user_id' => $userId,
            'goal_name' => $goalName,
            'target_amount' => $targetAmount,
            'target_date' => $targetDate,
            'current_savings' => 0,
            'status' => 'active',
        ]);
    }

    public function checkForOverspending($userId, $categoryBudgets)
    {
        $spendingData = $this->budgetModel->getSpendingDataByCategory($userId);
        $alerts = [];
        foreach ($categoryBudgets as $category => $budgetLimit) {
            $totalSpent = isset($spendingData[$category]) ? $spendingData[$category] : 0;
            if ($totalSpent >= $budgetLimit) {
                $alerts[] = "You have exceeded your budget for $category. You spent $totalSpent.";
            }
        }
        return $alerts;
    }

    public function copyAccount($accountData) {
        return $this->budgetModel->insertAccount($accountData);
    }

    public function estimateTaxes($userId) {
        $income = $this->budgetModel->getTotalIncome($userId);
        $deductions = $this->budgetModel->getDeductions($userId);
        
        // Assuming a basic flat tax rate for simplicity
        $taxRate = 0.2;
        $taxableIncome = $income - $deductions;
        $estimatedTax = $taxableIncome * $taxRate;
        
        return [
            'income' => $income,
            'deductions' => $deductions,
            'taxableIncome' => $taxableIncome,
            'estimatedTax' => $estimatedTax,
        ];
    }

    // Method to forecast financial data based on historical trends
    public function forecastBasedOnTrends($userId, $forecastPeriod)
    {
        $forecastPeriod = max(1, (int) $forecastPeriod);

        $historicalData = [];
        try {
            if (isset($this->budgetModel) && method_exists($this->budgetModel, 'getHistoricalData')) {
                $historicalData = $this->budgetModel->getHistoricalData($userId, max($forecastPeriod, 12));
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::forecastBasedOnTrends historical error: {msg}', ['msg' => $e->getMessage()]);
        }

        $historicalCount = max(1, count($historicalData));
        $incomeTrend     = $historicalCount > 0 ? array_sum(array_column($historicalData, 'income')) / $historicalCount : 0.0;
        $expenseTrend    = $historicalCount > 0 ? array_sum(array_column($historicalData, 'expense')) / $historicalCount : 0.0;

        $incomeTrend  = max(0.0, (float) $incomeTrend);
        $expenseTrend = max(0.0, (float) $expenseTrend);

        $months    = [];
        $incomes   = [];
        $expenses  = [];
        $surpluses = [];

        $tz     = new \DateTimeZone($this->timezone);
        $anchor = new \DateTime('first day of this month', $tz);

        for ($i = 0; $i < $forecastPeriod; $i++) {
            $point = (clone $anchor)->modify("+{$i} month");

            $growthMultiplier = 1 + (0.02 * $i);
            $incomeValue      = round($incomeTrend * $growthMultiplier, 2);
            $expenseValue     = round($expenseTrend * $growthMultiplier, 2);
            $surplusValue     = round($incomeValue - $expenseValue, 2);

            $months[]    = $point->format('M Y');
            $incomes[]   = $incomeValue;
            $expenses[]  = $expenseValue;
            $surpluses[] = $surplusValue;
        }

        return [
            'months'    => $months,
            'incomes'   => $incomes,
            'expenses'  => $expenses,
            'surpluses' => $surpluses,
            'historical'=> $historicalData,
        ];
    }

    public function forecastRecurringSchedule($recurringSchedule, $designatedDate)
    {
        try {
            $startDate = DateTime::createFromFormat('m/d/Y', $designatedDate);
            if (!$startDate) {
                throw new \Exception('Invalid designated date format.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Invalid designated date: ' . $designatedDate);
            return [];
        }
    
        $forecast = [];
        $yearToForecast = (int)$startDate->format('Y');
        $recurringSchedule = strtolower(trim($recurringSchedule));
    
        log_message('debug', 'Generating Recurring Schedule with Schedule Type: ' . $recurringSchedule);
    
        // Add the original record
        $forecast[] = [
            'dueDate' => $startDate->format('m/d/Y'),
            'netAmount' => 0, // Placeholder
            'grossAmount' => 0, // Placeholder
            'accountName' => 'Original Record', // Placeholder
            'accountType' => 'Income', // Placeholder
        ];
    
        // Map intervals to DateInterval formats
        $intervalMap = [
            'daily' => 'P1D',
            'weekly' => 'P1W',
            'bi-weekly' => 'P2W',
            'monthly' => 'P1M',
            'quarterly' => 'P3M',
            'semi-annually' => 'P6M',
            'annually' => 'P1Y',
        ];
    
        if (!array_key_exists($recurringSchedule, $intervalMap)) {
            log_message('error', 'Unsupported recurring schedule type: ' . $recurringSchedule);
            return [];
        }
    
        $interval = new \DateInterval($intervalMap[$recurringSchedule]);
        $endDate = new \DateTime("$yearToForecast-12-31");
    
        // Generate the schedule
        while ($startDate->format('Y') <= $yearToForecast) {
            if ($startDate > $endDate) {
                break;
            }
    
            $forecast[] = [
                'dueDate' => $startDate->format('m/d/Y'),
                'netAmount' => 0, // Placeholder
                'grossAmount' => 0, // Placeholder
                'accountName' => 'Recurring Record', // Placeholder
                'accountType' => 'Income', // Placeholder
            ];
    
            $startDate->add($interval);
        }
    
        return $forecast;
    }
        
    private function formatBudgetData($budgetData) {
        $map = [
            'thisMonthsIncome'           => 'thisMonthsIncomeFMT',
            'thisMonthsExpense'          => 'thisMonthsExpenseFMT',
            'thisMonthsSurplus'          => 'thisMonthsSurplusFMT',
            'thisMonthsInvestments'      => 'thisMonthsInvestmentsFMT',
            'thisMonthsInvestmentsSplit' => 'thisMonthsInvestmentsSplitFMT',
            'lastMonthsIncome'           => 'lastMonthsIncomeFMT',
            'lastMonthsExpense'          => 'lastMonthsExpenseFMT',
            'lastMonthsSurplus'          => 'lastMonthsSurplusFMT',
            'lastMonthsInvestments'      => 'lastMonthsInvestmentsFMT',
            'nextMonthsIncome'           => 'nextMonthsIncomeFMT',
            'nextMonthsExpense'          => 'nextMonthsExpenseFMT',
            'nextMonthsSurplus'          => 'nextMonthsSurplusFMT',
            'nextMonthsInvestments'      => 'nextMonthsInvestmentsFMT',
            'totalIncome'                => 'totalIncomeFMT',
            'totalExpense'               => 'totalExpenseFMT',
            'totalSurplus'               => 'totalSurplusFMT',
            'totalInvestments'           => 'totalInvestmentsFMT',
            'checkingSummary'            => 'checkingSummaryFMT',
            'incomeYTDSummary'           => 'incomeYTDSummaryFMT',
            'expenseYTDSummary'          => 'expenseYTDSummaryFMT',
            'creditLimit'                => 'creditLimitFMT',
            'creditAvailable'            => 'creditAvailableFMT',
            'deveAvailable'              => 'deveAvailableFMT',
            'debtCreditLimit'            => 'debtCreditLimitFMT',
            'debtSummary'                => 'debtSummaryFMT',
            'investSummary'              => 'investSummaryFMT',
            'initialBankBalance'         => 'initialBankBalanceFMT',
            'totalAccountBalance'        => 'totalAccountBalanceFMT',
        ];

        foreach ($map as $key => $formattedKey) {
            $budgetData[$formattedKey] = $this->formatCurrency($this->asFloat($budgetData[$key] ?? 0));
        }
    
        return $budgetData;
    }
    
    // Generates the recurring schedule based on intervals
    public function generateRecurringSchedule($accountID, $intervals, $designatedDate, $netAmount, $grossAmount, $accountName, $accountType, $sourceType) {
        try {
            log_message('debug', 'Service - Generating Schedule - Inputs: ' . json_encode(compact(
                'accountID',
                'intervals',
                'designatedDate',
                'netAmount',
                'grossAmount',
                'accountName',
                'accountType',
                'sourceType'
            )));
    
            $startDate = new DateTime($designatedDate);
            $endDate = new DateTime('12/31/' . $startDate->format('Y'));
            $recurringSchedule = [];
    
            if (strtolower($intervals) === '15th/last') {
                // Handle 15th and last day of the month interval
                while ($startDate <= $endDate) {
                    $month = (int)$startDate->format('m');
                    $year = (int)$startDate->format('Y');
    
                    // Add the 15th
                    $fifteenthDate = new DateTime("$year-$month-15");
                    if ($fifteenthDate >= $startDate && $fifteenthDate <= $endDate) {
                        $recurringSchedule[] = [
                            'dueDate' => $fifteenthDate->format('m/d/Y'),
                            'netAmount' => $netAmount,
                            'grossAmount' => $grossAmount,
                            'accountName' => $accountName,
                            'accountType' => $accountType,
                            'accountSourceType' => $sourceType,
                        ];
                    }
    
                    // Add the last day of the month
                    $lastDay = (int)(new DateTime("$year-$month-01"))->format('t');
                    $lastDate = new DateTime("$year-$month-$lastDay");
                    if ($lastDate >= $startDate && $lastDate <= $endDate) {
                        $recurringSchedule[] = [
                            'dueDate' => $lastDate->format('m/d/Y'),
                            'netAmount' => $netAmount,
                            'grossAmount' => $grossAmount,
                            'accountName' => $accountName,
                            'accountType' => $accountType,
                            'accountSourceType' => $sourceType,
                        ];
                    }
    
                    // Move to the next month
                    $startDate->modify('+1 month');
                }
            } else {
                // Default intervals (daily, weekly, bi-weekly, monthly, etc.)
                $intervalSpec = match (strtolower($intervals)) {
                    'daily' => 'P1D',
                    'weekly' => 'P1W',
                    'bi-weekly' => 'P2W',
                    'monthly' => 'P1M',
                    'quarterly' => 'P3M',
                    'semi-annually' => 'P6M',
                    'annually' => 'P1Y',
                    default => 'P1M',
                };
    
                log_message('debug', 'Service - Interval Spec: ' . $intervalSpec);
    
                $interval = new DateInterval($intervalSpec);
    
                while ($startDate <= $endDate) {
                    // Handle monthly interval and adjust for February or months with fewer days
                    if (strtolower($intervals) === 'monthly') {
                        $day = (int)$startDate->format('d');
                        $month = (int)$startDate->format('m');
                        $year = (int)$startDate->format('Y');
    
                        // Determine the last day of the current month
                        $lastDayOfMonth = (int)$startDate->format('t');
                        if ($day > $lastDayOfMonth) {
                            $startDate->setDate($year, $month, $lastDayOfMonth);
                        }
                    }
    
                    $recurringSchedule[] = [
                        'dueDate' => $startDate->format('m/d/Y'),
                        'netAmount' => $netAmount,
                        'grossAmount' => $grossAmount,
                        'accountName' => $accountName,
                        'accountType' => $accountType,
                        'accountSourceType' => $sourceType,
                    ];
    
                    log_message('debug', 'Service - Added Date: ' . $startDate->format('m/d/Y'));
    
                    // Add the interval to the current date
                    $startDate->add($interval);
                }
            }
    
            log_message('debug', 'Generated Schedule: ' . print_r($recurringSchedule, true));
            return $recurringSchedule;
    
        } catch (Exception $e) {
            log_message('error', 'Service - Error Generating Schedule: ' . $e->getMessage());
            return [];
        }
    }
    
    
    // public function generateRecurringSchedule($accountID, $intervals, $designatedDate, $netAmount, $grossAmount, $accountName, $accountType, $sourceType) {
    //     try {
    //         log_message('debug', 'Service - Generating Schedule - Inputs: ' . json_encode(compact('accountID', 'intervals', 'designatedDate', 'netAmount', 'grossAmount', 'accountName', 'accountType', 'sourceType');
    
    //         $startDate = new DateTime($designatedDate);            
    //         log_message('debug', 'BudgetService L437 - $generateRecurringSchedule - $startDate: ' . $startDate->format('Y-m-d H:i:s'));
    //         $endDate = new DateTime('12/31/' . $startDate->format('Y'));
    //         $intervalSpec = match (strtolower($intervals)) {
    //             'daily' => 'P1D',
    //             'weekly' => 'P1W',
    //             'bi-weekly' => 'P2W',
    //             'monthly' => 'P1M',
    //             'quarterly' => 'P3M',
    //             'semi-annually' => 'P6M',
    //             'annually' => 'P1Y',
    //             default => 'P1M',
    //         };
    
    //         log_message('debug', 'Service - Interval Spec: ' . $intervalSpec);
    
    //         $recurringSchedule = [];
    //         $interval = new DateInterval($intervalSpec);
    
    //         while ($startDate <= $endDate) {
    //             $recurringSchedule[] = [
    //                 'dueDate' => $startDate->format('m/d/Y'),
    //                 'netAmount' => $netAmount,
    //                 'grossAmount' => $grossAmount,
    //                 'accountName' => $accountName,
    //                 'accountType' => $accountType, // Correctly set `accountType`
    //                 'accountSourceType' => $sourceType, // Correctly set `accountSourceType`
    //             ];
    //             log_message('debug', 'Service - Added Date: ' . $startDate->format('m/d/Y'));
    //             $startDate->add($interval);
    //         }
    
    //         log_message('debug', 'BudgetService L467 - Generated Schedule: ' . print_r($recurringSchedule, true));
    //         return $recurringSchedule;
    //     } catch (Exception $e) {
    //         log_message('error', 'Service - Error Generating Schedule: ' . $e->getMessage());
    //         return [];
    //     }
    // }

    // // public function generateRecurringSchedule(
    // //     $accountID, 
    // //     $accountIntervals, 
    // //     $accountDesDate, 
    // //     $accountNetAmount, 
    // //     $accountGrossAmount, 
    // //     $cuID, 
    // //     $userAccount,
    // //     $accountName,         // Add this parameter
    // //     $accountType,         // Add this parameter
    // //     $accountSourceType    // Add this parameter
    // // ) {
    // //     $startDate = \DateTime::createFromFormat('m/d/Y', $accountDesDate);
    // //     $endDate = new \DateTime('12/31/' . date('Y'));
    // //     $scheduleData = [];
    
    // //     // Log the passed values
    // //     log_message('debug', 'Generating Recurring Schedule with Account Name: ' . $accountName);
    
    // //     if ($accountIntervals === '15th/Last') {
    // //         // Handle 15th/Last logic
    // //     } else {
    // //         // Map the interval strings and handle default values
    // //         $intervalMap = [
    // //             'Daily' => '+1 day',
    // //             'Weekly' => '+1 week',
    // //             'Bi-Weekly' => '+2 weeks',
    // //             'Monthly' => '+1 month',
    // //             'Quarterly' => '+3 months',
    // //             'Semi-Annual' => '+6 months',
    // //             'Annually' => '+1 year',
    // //         ];
    // //         $intervalString = $intervalMap[$accountIntervals] ?? '+1 month';
    
    // //         while ($startDate <= $endDate) {
    // //             $scheduleData[] = $this->prepareScheduleData(
    // //                 $startDate, 
    // //                 $cuID, 
    // //                 $userAccount, 
    // //                 $accountID, 
    // //                 $accountNetAmount, 
    // //                 $accountGrossAmount, 
    // //                 $accountName, // Pass accountName here
    // //                 $accountType, // Pass accountType here
    // //                 $accountSourceType // Pass accountSourceType here
    // //             );
    // //             $startDate = $startDate->modify($intervalString);
    // //         }
    // //     }
    
    // //     return $scheduleData;
    // // }

    // Method to get active budget records for current user   
    public function getActiveUserBudgetRecords($userId) {
        // Assuming you want to fetch active budget records from the database
        return $this->budgetModel->getUserActiveBudgetRecords($userId); // You should implement this method in your model
    }
    
    // Method to calculate available balances based on repayment schedules
    public function getAvailableBalances($repaymentSchedules) {
        $availableBalances = [];
        foreach ($repaymentSchedules as $schedule) {
            $availableBalances[$schedule['account_id']] = $schedule['remaining_balance'];
        }
        return $availableBalances;
    }
    
    public function getBudgetRecordsIsDebt($userId) {
        // Assuming you have a method in your model to retrieve debt-related budget records
        return $this->budgetModel->getDebtRecordsByUser($userId); // Adjust this to your model's method
    }

    public function getCashFlowProjections($userId, $months = 12) {
        $incomeProjection = $this->budgetModel->getIncomeProjections($userId, $months);
        $expenseProjection = $this->budgetModel->getExpenseProjections($userId, $months);

        $cashFlowProjection = [];
        for ($i = 0; $i < $months; $i++) {
            $cashFlowProjection[] = [
                'month' => date('F Y', strtotime("+$i month")),
                'projectedIncome' => $incomeProjection[$i] ?? 0,
                'projectedExpenses' => $expenseProjection[$i] ?? 0,
                'netCashFlow' => ($incomeProjection[$i] ?? 0) - ($expenseProjection[$i] ?? 0),
            ];
        }

        return $cashFlowProjection;
    }

    public function getCompletedGoals($userId) {
        // Fetch completed goals from the database
        $completedGoals = $this->budgetModel->getGoalsByStatus($userId, 'completed');

        // Process and return the goals
        return [
            'completedGoals' => $completedGoals,
            'totalCompleted' => count($completedGoals),
        ];
    }

    // Method to get current balances for credit accounts
    public function getCurrentBalances($creditAccounts) {
        $currentBalances = [];
        foreach ($creditAccounts as $account) {
            $currentBalances[$account['id']] = $account['current_balance'];
        }
        return $currentBalances;
    }

    public function getDebtAccountSummary($cuID) {
        $debtAccounts = $this->budgetModel->getDebtAccounts($cuID);
        $totalDebt = 0;
        foreach ($debtAccounts as $account) {
            $totalDebt += $account['available_balance'];
        }
        return [
            'totalDebt' => $totalDebt
        ];
    }

    public function getExpenseAccountSummary($cuID) {
        $expenseAccounts = $this->budgetModel->getExpenseAccountsSummary($cuID);
        $expenses = 0;
        foreach ($expenseAccounts as $account) {
            $expenses += $account['net_amount'];
        }
        return [
            'expenses' => $expenses
        ];
    }

    // Method to get financial analysis data for a user
    public function getFinancialAnalysisData($userId) {
        return $this->budgetModel->getFinancialAnalysisData($userId);
    }
    
    public function getForecastDataForUser(int $userId): array
    {
        $income = $this->budgetModel->getUserMonthlyIncome($userId);
        $expenses = $this->budgetModel->getUserMonthlyExpenses($userId);
        $annual = $this->budgetModel->getAnnualForecast($userId);

        return [
            'monthly_income'     => $income ?? 0,
            'monthly_expenses'   => $expenses ?? 0,
            'annual_forecast'    => $annual ?? [],
        ];
    }

    public function getFormattedTotalBalance($userId) {
        return number_format($this->getTotalAccountBalance($userId), 2);
    }
    
    public function getIncomeAccountSummary($cuID) {
        $incomeAccounts = $this->budgetModel->getIncomeAccountsSummary($cuID);
        $income = 0;
        foreach ($incomeAccounts as $account) {
            $income += $account['net_amount'];
        }
        return [
            'income' => $income
        ];
    }

    // Method to get recurring account details
    public function getRecurringAccountDetails($userId, $accountId) {
        return $this->budgetModel->getLastRecurringAccountInfo($userId, $accountId);
    }

    // Get the account information for recurring scheduling
    public function getRecurringAccountInfo($userId, $accountId = null) {
        log_message('debug', 'BudgetService L631 - $userId: ' . $userId . ' | $accountId: ' . $accountId); 
        // Fetch account information
        $getAccountInfo = $this->budgetModel->getUserBudgetRecord($userId, $accountId);
        $lastAccountInfo = $this->budgetModel->getLastRecurringAccountInfo($userId);
        
        // Check if $getAccountInfo is an array and get the first element
        $account = $getAccountInfo[0] ?? $lastAccountInfo[0] ?? [];
        
        // Extract necessary details from $account
        $accountID = $account['id'] ?? null;
        $accountName = $account['name'] ?? 'Unknown Account';
        $accountType = $account['account_type'] ?? 'Expense'; // Default to 'Expense'
        $accountSourceType = $account['source_type'] ?? 'Unknown Source'; // Default to 'Unknown Source'
        $accountIntervals = $account['intervals'] ?? 'Monthly';
        $accountDesDate = $account['designated_date'] ?? date("m/d/Y");
        $accountNetAmount = $account['net_amount'] ?? 0;
        $accountGrossAmount = $account['gross_amount'] ?? 0;

        // Log extracted details for debugging
        log_message('debug', 'BudgetService L639 - Account Information Retrieved: ' . print_r($account, true));
        log_message('debug', 'Account Name: ' . $accountName);
        log_message('debug', 'Account Type: ' . $accountType);
        log_message('debug', 'Account Source Type: ' . $accountSourceType);
        log_message('debug', 'Account Intervals: ' . $accountIntervals);
        log_message('debug', 'Designated Date: ' . $accountDesDate);

        // Generate recurring schedule with corrected account data
        $recurringSchedule = $this->generateRecurringSchedule(
            $accountID,
            $accountIntervals,
            $accountDesDate,
            $accountNetAmount,
            $accountGrossAmount,
            $accountName,         // Pass correct account name
            $accountType,         // Pass correct account type
            $accountSourceType    // Pass correct source type
        );

        // Return structured data
        return [
            'accountInfo' => $account, // Use $account directly for structured response
            'lastAccountInfo' => $lastAccountInfo,
            'recurring_schedule' => $recurringSchedule ?? [], // Fallback to empty array if schedule is not generated
        ];
    }
 
    public function getRepaymentSummary($userId) {
        $creditAccounts = $this->accountsModel->getUserCreditAccounts($userId);
        $repaymentSchedules = $this->calculateRepaymentSchedules($creditAccounts);
        
        $repaymentSummary = [];
        foreach ($repaymentSchedules as $schedule) {
            if (!isset($repaymentSummary[$schedule['account_id']])) {
                $repaymentSummary[$schedule['account_id']] = 0;
            }
            $repaymentSummary[$schedule['account_id']] += $schedule['remaining_balance'];
        }

        return $repaymentSummary;
    }

    public function getSpendingByCategory($userId, $startDate, $endDate) {
        $spending = $this->budgetModel->getSpendingData($userId, $startDate, $endDate);
        $categoryTotals = [];
        foreach ($spending as $expense) {
            if (!isset($categoryTotals[$expense['category']])) {
                $categoryTotals[$expense['category']] = 0;
            }
            $categoryTotals[$expense['category']] += $expense['amount'];
        }
        return $categoryTotals;
    }

    // Method to get source records based on user ID and budget type
    public function getSourceRecords($userId, $budgetType)
    {
        return $this->budgetModel->getSourceRecords($userId, $budgetType);
    }
    
    public function getThisMonthsIncome($userId) {
        // Call the BudgetModel to get this month's income for the user
        return $this->budgetModel->getThisMonthsIncome($userId);
    }

    public function getTotalAccountBalance($userId) {
        // Fetch the income accounts
        $incomeAccounts = $this->budgetModel->getIncomeAccountsSummary($userId);
        $totalIncome = 0;

        foreach ($incomeAccounts as $incomeAccount) {
            $totalIncome += (float)$incomeAccount['net_amount'];
        }

        // Fetch the expense accounts
        $expenseAccounts = $this->budgetModel->getExpenseAccountsSummary($userId);
        $totalExpenses = 0;

        foreach ($expenseAccounts as $expenseAccount) {
            $totalExpenses += (float)$expenseAccount['net_amount'];
        }

        // Calculate the total account balance
        $totalBalance = $totalIncome - $totalExpenses;

        return $totalBalance;
    }

    // Method to calculate total available balance from debt accounts
    public function getTotalAvailableBalance($debtAccounts) {
        $totalAvailableBalance = 0;

        if (!empty($debtAccounts) && is_array($debtAccounts)) {
            foreach ($debtAccounts as $debt) {
                if (!isset($debt['available_balance']) || !is_numeric($debt['available_balance'])) {
                    log_message('error', 'BudgetService L568: Non-numeric available_balance encountered for account ID: ' . ($debt['id'] ?? 'UNKNOWN') . '. Value: ' . print_r($debt['available_balance'], true));

                    // **Fallback Mechanism:**
                    $debt['available_balance'] = 0;
                }

                $totalAvailableBalance += floatval($debt['available_balance']);
            }
        }

        return $totalAvailableBalance;
    }    

    public function getUserBankAccounts($userId)
    {
        return $this->accountsModel->getUserBankAccounts($userId);
    }

    public function getUserBudget($userId) {
        $records = $this->budgetModel->getUserBudgetData($userId) ?? [];
        $records = array_map(static fn($row) => (array) $row, $records);
        $activeRecords = array_values(array_filter($records, static function ($row) {
            return (int) ($row['status'] ?? 0) === 1;
        }));

        $openRecords = array_values(array_filter($activeRecords, static function ($row) {
            return (int) ($row['paid'] ?? 0) === 0;
        }));

        $sorter = function (array $a, array $b): int {
            $da = $this->parseRecordDate($a);
            $db = $this->parseRecordDate($b);

            if ($da && $db) {
                return $da <=> $db;
            }

            if ($da && !$db) {
                return -1;
            }

            if (!$da && $db) {
                return 1;
            }

            return 0;
        };

        usort($activeRecords, $sorter);
        usort($openRecords, $sorter);

        $now        = new DateTime('first day of this month');
        $currentKey = $now->format('Y-m');
        $lastKey    = (clone $now)->modify('-1 month')->format('Y-m');
        $nextKey    = (clone $now)->modify('+1 month')->format('Y-m');
        $currentYear = (int) $now->format('Y');

        $monthStats = [
            $currentKey => ['income' => 0.0, 'expense' => 0.0, 'investment' => 0.0],
            $lastKey    => ['income' => 0.0, 'expense' => 0.0, 'investment' => 0.0],
            $nextKey    => ['income' => 0.0, 'expense' => 0.0, 'investment' => 0.0],
        ];

        $totals = ['income' => 0.0, 'expense' => 0.0, 'investment' => 0.0];
        $ytd    = ['income' => 0.0, 'expense' => 0.0];

        foreach ($activeRecords as $record) {
            $amount   = $this->asFloat($record['net_amount'] ?? 0);
            $category = $this->classifyRecord($record);

            if ($category === 'investment') {
                $totals['investment'] += $amount;
            } elseif ($category === 'expense') {
                $totals['expense'] += $amount;
            } else {
                $totals['income'] += $amount;
            }

            $dt = $this->parseRecordDate($record);
            if ($dt) {
                $monthKey = $dt->format('Y-m');
                if (!isset($monthStats[$monthKey])) {
                    $monthStats[$monthKey] = ['income' => 0.0, 'expense' => 0.0, 'investment' => 0.0];
                }

                if ($category === 'investment') {
                    $monthStats[$monthKey]['investment'] += $amount;
                } elseif ($category === 'expense') {
                    $monthStats[$monthKey]['expense'] += $amount;
                } else {
                    $monthStats[$monthKey]['income'] += $amount;
                }

                if ((int) $dt->format('Y') === $currentYear) {
                    if ($category === 'expense') {
                        $ytd['expense'] += $amount;
                    } elseif ($category === 'income') {
                        $ytd['income'] += $amount;
                    }
                }
            }
        }

        $thisMonthsIncome       = $monthStats[$currentKey]['income'] ?? 0.0;
        $thisMonthsExpense      = $monthStats[$currentKey]['expense'] ?? 0.0;
        $thisMonthsInvestments  = $monthStats[$currentKey]['investment'] ?? 0.0;
        $thisMonthsSurplus      = $thisMonthsIncome - $thisMonthsExpense;
        $thisMonthsSplit        = $thisMonthsSurplus - $thisMonthsInvestments;

        $userBudget = [
            'userBudgetRecords'         => $activeRecords,
            'userActiveBudgetRecords'   => $openRecords,
            'thisMonthsIncome'          => $thisMonthsIncome,
            'thisMonthsExpense'         => $thisMonthsExpense,
            'thisMonthsSurplus'         => $thisMonthsSurplus,
            'thisMonthsInvestments'     => $thisMonthsInvestments,
            'thisMonthsInvestmentsSplit'=> $thisMonthsSplit,
            'lastMonthsIncome'          => $monthStats[$lastKey]['income'] ?? 0.0,
            'lastMonthsExpense'         => $monthStats[$lastKey]['expense'] ?? 0.0,
            'lastMonthsInvestments'     => $monthStats[$lastKey]['investment'] ?? 0.0,
            'lastMonthsSurplus'         => ($monthStats[$lastKey]['income'] ?? 0.0) - ($monthStats[$lastKey]['expense'] ?? 0.0),
            'nextMonthsIncome'          => $monthStats[$nextKey]['income'] ?? 0.0,
            'nextMonthsExpense'         => $monthStats[$nextKey]['expense'] ?? 0.0,
            'nextMonthsInvestments'     => $monthStats[$nextKey]['investment'] ?? 0.0,
            'nextMonthsSurplus'         => ($monthStats[$nextKey]['income'] ?? 0.0) - ($monthStats[$nextKey]['expense'] ?? 0.0),
            'totalIncome'               => $totals['income'],
            'totalExpense'              => $totals['expense'],
            'totalSurplus'              => $totals['income'] - $totals['expense'],
            'totalInvestments'          => $totals['investment'],
            'incomeYTDSummary'          => $ytd['income'],
            'expenseYTDSummary'         => $ytd['expense'],
        ];

        $initialBankBalance = $this->getInitialBankBalance($userId);
        $userBudget['initialBankBalance'] = $initialBankBalance;

        $userBudget['checkingSummary'] = $this->asFloat($this->budgetModel->getCheckingSummary($userId)['balance'] ?? 0);
        $userBudget['cryptoSummary']   = $this->asFloat($this->budgetModel->getCryptoSummary($userId) ?? 0);
        $debtSummaryRow = $this->budgetModel->getDebtAccountsSummary($userId) ?? [];
        $userBudget['debtSummary']     = $this->asFloat(($debtSummaryRow['current_balance'] ?? $debtSummaryRow['available_balance'] ?? 0));
        $userBudget['debtAvailable']   = $this->asFloat($debtSummaryRow['available_balance'] ?? 0);
        $userBudget['debtCreditLimit'] = $this->asFloat($debtSummaryRow['credit_limit'] ?? 0);
        $userBudget['investSummary']   = $this->asFloat($this->budgetModel->getInvestAccountsSummary($userId)['net_worth'] ?? 0);

        $userBudget['creditLimit']     = $this->asFloat($this->budgetModel->getCreditLimitSummary($userId)['credit_limit'] ?? 0);
        $userBudget['creditAvailable'] = $this->asFloat($this->budgetModel->getCreditAvailableSummary($userId)['available_balance'] ?? 0);

        $totalAccountBalance = $this->budgetModel->getTotalAccountBalance($userId);
        $userBudget['totalAccountBalance'] = $this->asFloat($totalAccountBalance ?? 0);

        // Format values
        $userBudget = $this->formatBudgetData($userBudget);

        // log_message('info', 'BudgetService L939 - $userBudget: ' . (print_r($userBudget, true)));
        return $userBudget;
    }

    public function getUserBudgetRecord($cuID, $accountID) {
        $accountInformation = $this->budgetModel->getUserBudgetRecord($cuID, $accountID);
        $userBudgetRecord = array();
        if ($this->debug === 1) {
            // log_message('debug', '$accountInformation: ' . print_r($accountInformation, true));
        }
        if ($accountInformation === null) {
            return null; // Ensure we return an empty array if no record is found
        } else {
            foreach ($accountInformation as $accountInfo) {
                $userBudgetRecord = array(
                    'accountID' => $accountInfo['id'],
                    'accountPaidStatus' => $accountInfo['paid'] ?? 0,
                    'accountDesDate' => $accountInfo['designated_date'],
                    'accountMonth' => $accountInfo['month'],
                    'accountDay' => $accountInfo['day'],
                    'accountYear' => $accountInfo['year'],
                    'accountTime' => $accountInfo['time'],
                    'accountCreator' => $accountInfo['created_by'],
                    'accountCreatorEmail' => $accountInfo['created_by_email'],
                    'accountName' => $accountInfo['name'],
                    'accountNetAmount' => $accountInfo['net_amount'],
                    'accountGrossAmount' => $accountInfo['gross_amount'] ?? 0, // Assuming you might also need this
                    'accountSummary' => $accountInfo['account_summary'],
                    'accountWallet' => $accountInfo['wallet_id'],
                    'accountRecurring' => $accountInfo['recurring_account'],
                    'accountRecurringPrimary' => $accountInfo['recurring_account_primary'] ?? 'No', // Assuming you might also need this
                    'accountRecurringID' => $accountInfo['recurring_account_id'],
                    'accountRecurringSchedule' => $accountInfo['recurring_schedule'],
                    'accountType' => $accountInfo['account_type'],
                    'accountSource' => $accountInfo['source_type'],
                    'accountIsDebt' => $accountInfo['is_debt'] ?? 0, // Assuming you might also need this
                    'accountIsCCPay' => $accountInfo['is_cc_payment'] ?? 0, // Assuming you might also need this
                    'accountIntervals' => $accountInfo['intervals'],
                    'accountWeeksLeft' => $accountInfo['initial_weeks_left'],
                );
            }
        }
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIBudget L539 - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
        }
        return $userBudgetRecord;
    }
    
    // Method to get user budget records
    public function getUserBudgetRecords($userId) {
        return $this->budgetModel->getUserBudgetRecords($userId);
    }

    public function getUserCreditAccounts($userId) {
        return $this->accountsModel->getUserCreditAccounts($userId);
    }

    public function getUserRelatedBudgetRecords($userId, $accountName) {
        return $this->budgetModel->getUserRelatedBudgetRecords($userId, $accountName);
    }

    // Method to fetch debt accounts for a specific user
    public function getUserDebtAccounts($userId) {
        return $this->accountsModel->getUserDebtAccounts($userId);
    }

    /**
     * Marks a budget item as paid.
     *
     * @param int $budgetId
     * @return bool
     */
    public function markAsPaid($accountID)
    {
        $budgetRecord = $this->budgetModel->getAccountInformation($accountID);
        
        if (!$budgetRecord) {
            log_message('error', "markAsPaid: Budget record not found for Account ID: {$accountID}");
            return false;
        }
    
        $isDebt = $budgetRecord['is_debt'] ?? 0;
        $netAmount = $budgetRecord['net_amount'] ?? 0;
        $walletID = $budgetRecord['wallet_id'] ?? null;
        $userID = $budgetRecord['created_by'] ?? null;
        $sourceType = $budgetRecord['source_type'] ?? null;
    
        // Ensure all fields are correctly set
        $updateData = [
            'status'       => 1, // Ensures status is always 1
            'paid'         => 1, // Marks as paid
            'paid_date'    => date("Y-m-d"),
            'paid_time'    => date("H:i:s"),
            'submitted_on' => date("Y-m-d H:i:s") // Ensures timestamp is stored
        ];
    
        $updateStatus = $this->budgetModel->updateAccount($accountID, $updateData);
    
        if (!$updateStatus) {
            log_message('error', "markAsPaid: Failed to update budget record as paid for Account ID: {$accountID}");
            return false;
        }
    
        if ($isDebt) {
            log_message('info', "markAsPaid: Processing debt payment update for Account ID: {$accountID}");
    
            if ($walletID) {
                $this->budgetModel->updateWalletBalance($walletID, -$netAmount);
                log_message('info', "markAsPaid: Wallet ID {$walletID} balance updated by -{$netAmount}");
            } else {
                $debtAccount = $this->budgetModel->getDebtAccountByUserAndSource($userID, $sourceType);
                if ($debtAccount) {
                    $this->budgetModel->updateDebtAccount($debtAccount['id'], [
                        'current_balance' => $debtAccount['current_balance'] - $netAmount,
                    ]);
                    log_message('info', "markAsPaid: Debt account ID {$debtAccount['id']} balance updated by -{$netAmount}");
                } else {
                    log_message('error', "markAsPaid: No debt account found for User ID: {$userID} and Source: {$sourceType}");
                }
            }
        }
    
        return true;
    }
    
    public function markAsUnpaid($accountID)
    {
        $budgetRecord = $this->budgetModel->getAccountInformation($accountID);
    
        if (!$budgetRecord) {
            log_message('error', "markAsUnpaid: Budget record not found for Account ID: {$accountID}");
            return false;
        }
    
        $isDebt = $budgetRecord['is_debt'] ?? 0;
        $netAmount = $budgetRecord['net_amount'] ?? 0;
        $walletID = $budgetRecord['wallet_id'] ?? null;
        $userID = $budgetRecord['created_by'] ?? null;
        $sourceType = $budgetRecord['source_type'] ?? null;
    
        // Reset fields to unpaid
        $updateData = [
            'status'       => 0, // Reset status if necessary
            'paid'         => 0, // Mark as unpaid
            'paid_date'    => null,
            'paid_time'    => null,
            'submitted_on' => date("Y-m-d H:i:s") // Maintain timestamp
        ];
    
        $updateStatus = $this->budgetModel->updateAccount($accountID, $updateData);
    
        if (!$updateStatus) {
            log_message('error', "markAsUnpaid: Failed to update budget record as unpaid for Account ID: {$accountID}");
            return false;
        }
    
        if ($isDebt) {
            log_message('info', "markAsUnpaid: Processing debt payment reversal for Account ID: {$accountID}");
    
            if ($walletID) {
                $this->budgetModel->updateWalletBalance($walletID, $netAmount);
                log_message('info', "markAsUnpaid: Wallet ID {$walletID} balance restored by +{$netAmount}");
            } else {
                $debtAccount = $this->budgetModel->getDebtAccountByUserAndSource($userID, $sourceType);
                if ($debtAccount) {
                    $this->budgetModel->updateDebtAccount($debtAccount['id'], [
                        'current_balance' => $debtAccount['current_balance'] + $netAmount,
                    ]);
                    log_message('info', "markAsUnpaid: Debt account ID {$debtAccount['id']} balance restored by +{$netAmount}");
                } else {
                    log_message('error', "markAsUnpaid: No debt account found for User ID: {$userID} and Source: {$sourceType}");
                }
            }
        }
    
        return true;
    }
    
    // Preparing and adding account data for new entries or updates
    public function prepareAccountData($json, $userId) {
        $dateTranslator = strtotime($json['designated_date']);
        $designatedDate = date('m/d/Y', $dateTranslator);
        $month = date('m', $dateTranslator);
        $day = date('d', $dateTranslator);
        $year = date('Y', $dateTranslator);

        return [
            'status'            => 1,
            'beta'              => $json['beta'] ?? 'No',
            'mode'              => $json['form_mode'] ?? 'Add',
            'created_by'        => $userId,
            'created_by_email'  => $json['user_email'] ?? null,
            'unix_timestamp'    => time(),
            'designated_date'   => $designatedDate,
            'month'             => (int)$month,
            'day'               => (int)$day,
            'year'              => (int)$year,
            'username'          => $json['username'] ?? null,
            'name'              => $json['nickname'] ?? null,
            'net_amount'        => (float)str_replace(',', '', $json['net_amount'] ?? '0'),
            'gross_amount'      => (float)str_replace(',', '', $json['gross_amount'] ?? '0'),
            'paid'              => $json['paid'] ?? '0',
            'recurring_account' => $json['recurring_account'] ?? 'No',
            'account_type'      => $json['account_type'] ?? null,
            'source_type'       => $json['source_type'] ?? null,
            'is_debt'           => preg_match('/(Debt|Loan|Mortgage)/i', $json['source_type']) === 1 ? 1 : 0,
            'intervals'         => $json['intervals'] ?? null,
        ];
    }
    
    // Helper method to prepare schedule data
    // Ensure the method signature includes the new parameters
    private function prepareScheduleData(
        $startDate, 
        $cuID, 
        $userAccount, 
        $accountID, 
        $accountNetAmount, 
        $accountGrossAmount, 
        $accountName,         // Add this parameter
        $accountType,         // Add this parameter
        $accountSourceType    // Add this parameter
    ) {
        log_message('debug', 'Preparing Schedule Data: Account Name = ' . $accountName);
    
        return [
            'dueDate' => $startDate->format('m/d/Y'),
            'cuID' => $cuID,
            'cuEmail' => $userAccount['cuEmail'],
            'cuUsername' => $userAccount['cuUsername'],
            'accountID' => $accountID,
            'accountNetAmount' => $accountNetAmount,
            'accountGrossAmount' => $accountGrossAmount,
            'accountName' => $accountName,           // Assign the account name here
            'accountType' => $accountType,           // Assign the account type here
            'accountSourceType' => $accountSourceType // Assign the account source type here
        ];
    }

    /**
     * Record a payment for credit or debt accounts.
     */
    public function recordPayment($accountId, $amount, $isCredit = false) {
        $table = $isCredit ? 'bf_users_credit_accounts' : 'bf_users_debt_accounts';

        $account = $this->budgetModel->getAccountById($table, $accountId);

        if ($account) {
            $newBalance = $account['current_balance'] - $amount;

            return $this->budgetModel->updateAccountBalance($table, $accountId, $newBalance);
        }

        return false;
    }

    public function trackInvestmentGrowth($initialInvestment, $monthlyContribution, $growthRate, $years) {
        $investmentData = [];
        $totalInvestment = $initialInvestment;

        for ($i = 0; $i < $years * 12; $i++) {
            $monthIndex = $i % 12;
            $totalInvestment += $monthlyContribution;
            $totalInvestment *= (1 + ($growthRate / 12));

            if ($monthIndex === 11) {
                $investmentData[] = [
                    'year' => date('Y', strtotime("+$i month")),
                    'totalInvestment' => $totalInvestment,
                ];
            }
        }

        return $investmentData;
    }

    public function updateAccount($accountId, $accountData) {
        return $this->budgetModel->updateAccount($accountId, $accountData);
    }

    public function updateSavingsProgress($goalId, $amount) {
        $goal = $this->budgetModel->getSavingsGoal($goalId);
        if ($goal) {
            $newSavings = $goal['current_savings'] + $amount;
            $goal['current_savings'] = $newSavings;
            $goal['status'] = ($newSavings >= $goal['target_amount']) ? 'completed' : 'active';
            return $this->budgetModel->updateSavingsGoal($goalId, $goal);
        }
        return false;
    }

    /**
     * Get user financial summary, including debt, credit utilization, and financial health indicators.
     */
    public function getUserFinancialSummary($userId) {
        return [
            'credit_utilization' => $this->budgetModel->getCreditUtilization($userId),
            'debt_to_income' => $this->budgetModel->getDebtToIncomeRatio($userId),
            'total_debt' => $this->budgetModel->getTotalDebt($userId),
            'total_credit' => $this->budgetModel->getTotalCredit($userId)
        ];
    }

    public function getMonthlySummary(int $userId, string $start, string $end): array
    {
        try {
            if (method_exists($this->budgetModel, 'getMonthlySummary')) {
                return $this->budgetModel->getMonthlySummary($userId, $start, $end);
            }
            log_message('debug', 'BudgetService::getMonthlySummary fallback used because BudgetModel::getMonthlySummary is missing.');
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::getMonthlySummary error: {msg}', ['msg' => $e->getMessage()]);
        }

        return ['income' => 0.0, 'expense' => 0.0, 'net' => 0.0];
    }

    public function getMonthlyTransactions(int $userId, string $start, string $end, ?string $type = null): array
    {
        try {
            if (method_exists($this->budgetModel, 'getMonthlyTransactions')) {
                return $this->budgetModel->getMonthlyTransactions($userId, $start, $end, $type);
            }
            log_message('debug', 'BudgetService::getMonthlyTransactions fallback used because BudgetModel::getMonthlyTransactions is missing.');
        } catch (\Throwable $e) {
            log_message('error', 'BudgetService::getMonthlyTransactions error: {msg}', ['msg' => $e->getMessage()]);
        }

        return [];
    }
}
?>