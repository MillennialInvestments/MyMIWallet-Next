<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use App\Services\OnboardingProgressService;
use App\Services\AccountCompletionService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;

class OnboardingWalkthroughController extends BaseUserController
{
    use ResponseTrait;

    private array $tableColumns = [];

    public function progress()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $payload = $progress->computeProgress($userId);

        return $this->respondSuccess('Progress loaded.', $payload);
    }

    public function saveProfile()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $firstName = trim((string) $this->request->getPost('first_name'));
        $lastName = trim((string) $this->request->getPost('last_name'));
        $phone = trim((string) $this->request->getPost('phone'));
        $employmentType = trim((string) $this->request->getPost('employment_type'));
        $companyName = trim((string) $this->request->getPost('company_name'));
        $businessName = trim((string) $this->request->getPost('business_name'));
        $jobTitle = trim((string) $this->request->getPost('job_title'));

        if ($firstName === '' || $lastName === '') {
            log_message('warning', 'Onboarding profile missing name for user_id={id}', ['id' => $userId]);
            return $this->respondError('First and last name are required.', 422);
        }

        $authUser = service('authentication')->user();
        $email = $authUser->email ?? null;

        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $profilePayload = $this->filterPayloadByColumns('bf_user_profiles', [
            'user_id'    => $userId,
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'email'      => $email,
            'phone'      => $phone,
            'updated_at' => $now,
        ]);

        $profileTable = $this->db()->table('bf_user_profiles');
        $existingProfile = $profileTable->where('user_id', $userId)->get()->getRowArray();
        if ($existingProfile) {
            $profileTable->where('user_id', $userId)->update($profilePayload);
        } else {
            $profilePayload['created_at'] = $now;
            $profileTable->insert($profilePayload);
        }

        $employmentPayload = $this->filterPayloadByColumns('bf_user_employment', [
            'user_id'         => $userId,
            'employment_type' => $employmentType,
            'company_name'    => $companyName,
            'business_name'   => $businessName,
            'job_title'       => $jobTitle,
            'updated_at'      => $now,
        ]);

        $employmentTable = $this->db()->table('bf_user_employment');
        $existingEmployment = $employmentTable->where('user_id', $userId)->get()->getRowArray();
        if ($existingEmployment) {
            $employmentTable->where('user_id', $userId)->update($employmentPayload);
        } else {
            $employmentPayload['created_at'] = $now;
            $employmentTable->insert($employmentPayload);
        }

        log_message('info', 'Onboarding profile saved for user_id={id}', ['id' => $userId]);

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $progress->markStep($userId, 'stage_a', 'profile', true);
        $progress->markStep($userId, 'stage_a', 'employment', $employmentType !== '');
        service('eventTracker')->track('setup.step_completed', [
            'step_key' => 'stage_a.profile',
        ], $userId, 'onboarding');
        if ($employmentType !== '') {
            service('eventTracker')->track('setup.step_completed', [
                'step_key' => 'stage_a.employment',
            ], $userId, 'onboarding');
        }

        return $this->respondSuccess('Profile saved.', $progress->computeProgress($userId));
    }

    public function saveBudgetIncome()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $amount = (float) str_replace(',', '', (string) $this->request->getPost('amount'));
        $source = trim((string) $this->request->getPost('source')) ?: 'Salary';
        $label = trim((string) $this->request->getPost('label')) ?: 'Monthly Income';

        if ($amount <= 0) {
            log_message('warning', 'Onboarding income amount invalid for user_id={id}', ['id' => $userId]);
            return $this->respondError('Monthly income must be greater than zero.', 422);
        }

        $authUser = service('authentication')->user();
        $email = $authUser->email ?? null;
        $username = $authUser->username ?? null;
        $now = new DateTimeImmutable('now');

        $payload = $this->filterPayloadByColumns('bf_users_budgeting', [
            'status'                   => 1,
            'deleted'                  => 0,
            'mode'                     => 'Onboarding',
            'created_by'               => $userId,
            'created_by_email'         => $email,
            'username'                 => $username,
            'account_type'             => 'Income',
            'source_type'              => $source,
            'name'                     => $label,
            'net_amount'               => $amount,
            'gross_amount'             => $amount,
            'recurring_account'        => 'Yes',
            'recurring_account_primary'=> 'Yes',
            'intervals'                => 'Monthly',
            'designated_date'          => $now->format('m/d/Y'),
            'month'                    => $now->format('m'),
            'day'                      => $now->format('d'),
            'year'                     => $now->format('Y'),
            'time'                     => $now->format('H:i:s'),
            'unix_timestamp'           => $now->getTimestamp(),
            'submitted_on'             => $now->format('Y-m-d H:i:s'),
        ]);

        if (empty($payload)) {
            log_message('error', 'Onboarding income failed: budgeting table unavailable for user_id={id}', ['id' => $userId]);
            return $this->respondError('Budgeting table not available.', 500);
        }

        $this->db()->table('bf_users_budgeting')->insert($payload);

        log_message('info', 'Onboarding income saved for user_id={id}', ['id' => $userId]);

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $progress->markStep($userId, 'stage_b', 'income', true);
        service('eventTracker')->track('setup.step_completed', [
            'step_key' => 'stage_b.income',
        ], $userId, 'onboarding');

        return $this->respondSuccess('Income saved.', $progress->computeProgress($userId));
    }

    public function saveCreditDebt()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $creditBalance = (float) str_replace(',', '', (string) $this->request->getPost('credit_balance'));
        $debtBalance = (float) str_replace(',', '', (string) $this->request->getPost('debt_balance'));

        if ($creditBalance <= 0 && $debtBalance <= 0) {
            log_message('warning', 'Onboarding credit/debt missing values for user_id={id}', ['id' => $userId]);
            return $this->respondError('Enter a credit or debt balance to continue.', 422);
        }

        $authUser = service('authentication')->user();
        $email = $authUser->email ?? null;
        $username = $authUser->username ?? null;
        $now = new DateTimeImmutable('now');

        $saved = false;

        if ($creditBalance > 0 && $this->db()->tableExists('bf_users_credit_accounts')) {
            $creditPayload = $this->filterPayloadByColumns('bf_users_credit_accounts', [
                'status'            => 1,
                'beta'              => 0,
                'date'              => $now->format('F jS, Y'),
                'time'              => $now->format('g:i A'),
                'user_id'           => $userId,
                'user_email'        => $email,
                'username'          => $username,
                'account_type'      => 'Credit',
                'creditor'          => 'Onboarding',
                'available_balance' => $creditBalance,
                'current_balance'   => $creditBalance,
            ]);
            if (! empty($creditPayload)) {
                $this->db()->table('bf_users_credit_accounts')->insert($creditPayload);
                $saved = true;
            }
        }

        if ($debtBalance > 0 && $this->db()->tableExists('bf_users_debt_accounts')) {
            $debtPayload = $this->filterPayloadByColumns('bf_users_debt_accounts', [
                'status'            => 1,
                'beta'              => 0,
                'date'              => $now->format('F jS, Y'),
                'time'              => $now->format('g:i A'),
                'user_id'           => $userId,
                'user_email'        => $email,
                'username'          => $username,
                'account_type'      => 'Debt',
                'debtor'            => 'Onboarding',
                'available_balance' => $debtBalance,
                'current_balance'   => $debtBalance,
            ]);
            if (! empty($debtPayload)) {
                $this->db()->table('bf_users_debt_accounts')->insert($debtPayload);
                $saved = true;
            }
        }

        if (! $saved) {
            log_message('error', 'Onboarding credit/debt failed: tables unavailable for user_id={id}', ['id' => $userId]);
            return $this->respondError('Credit/debt tables not available.', 500);
        }

        log_message('info', 'Onboarding credit/debt saved for user_id={id}', ['id' => $userId]);

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $progress->markStep($userId, 'stage_b', 'credit_debt', true);
        service('eventTracker')->track('setup.step_completed', [
            'step_key' => 'stage_b.credit_debt',
        ], $userId, 'onboarding');

        return $this->respondSuccess('Credit/debt saved.', $progress->computeProgress($userId));
    }

    public function saveRecurringExpense()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $amount = (float) str_replace(',', '', (string) $this->request->getPost('amount'));
        $label = trim((string) $this->request->getPost('label')) ?: 'Recurring Expense';

        if ($amount <= 0) {
            log_message('warning', 'Onboarding recurring expense amount invalid for user_id={id}', ['id' => $userId]);
            return $this->respondError('Recurring expense must be greater than zero.', 422);
        }

        $authUser = service('authentication')->user();
        $email = $authUser->email ?? null;
        $username = $authUser->username ?? null;
        $now = new DateTimeImmutable('now');

        $payload = $this->filterPayloadByColumns('bf_users_budgeting', [
            'status'                   => 1,
            'deleted'                  => 0,
            'mode'                     => 'Onboarding',
            'created_by'               => $userId,
            'created_by_email'         => $email,
            'username'                 => $username,
            'account_type'             => 'Expense',
            'source_type'              => 'Recurring',
            'name'                     => $label,
            'net_amount'               => -abs($amount),
            'gross_amount'             => $amount,
            'recurring_account'        => 'Yes',
            'recurring_account_primary'=> 'Yes',
            'intervals'                => 'Monthly',
            'designated_date'          => $now->format('m/d/Y'),
            'month'                    => $now->format('m'),
            'day'                      => $now->format('d'),
            'year'                     => $now->format('Y'),
            'time'                     => $now->format('H:i:s'),
            'unix_timestamp'           => $now->getTimestamp(),
            'submitted_on'             => $now->format('Y-m-d H:i:s'),
        ]);

        if (empty($payload)) {
            log_message('error', 'Onboarding recurring expense failed: budgeting table unavailable for user_id={id}', ['id' => $userId]);
            return $this->respondError('Budgeting table not available.', 500);
        }

        $this->db()->table('bf_users_budgeting')->insert($payload);

        log_message('info', 'Onboarding recurring expense saved for user_id={id}', ['id' => $userId]);

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $progress->markStep($userId, 'stage_b', 'recurring_expenses', true);
        service('eventTracker')->track('setup.step_completed', [
            'step_key' => 'stage_b.recurring_expenses',
        ], $userId, 'onboarding');

        return $this->respondSuccess('Recurring expense saved.', $progress->computeProgress($userId));
    }

    public function saveWatchlist()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $symbol = strtoupper(trim((string) $this->request->getPost('symbol')));
        if ($symbol === '') {
            log_message('warning', 'Onboarding watchlist missing symbol for user_id={id}', ['id' => $userId]);
            return $this->respondError('Watchlist symbol is required.', 422);
        }

        $now = (new DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        $payload = $this->filterPayloadByColumns('bf_users_watchlist', [
            'user_id'    => $userId,
            'symbol'     => $symbol,
            'list_type'  => 'starter',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        if (empty($payload)) {
            log_message('error', 'Onboarding watchlist failed: watchlist table unavailable for user_id={id}', ['id' => $userId]);
            return $this->respondError('Watchlist table not available.', 500);
        }

        $this->db()->table('bf_users_watchlist')->insert($payload);

        log_message('info', 'Onboarding watchlist saved for user_id={id}', ['id' => $userId]);

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $progress->markStep($userId, 'stage_b', 'watchlist', true);
        service('eventTracker')->track('setup.step_completed', [
            'step_key' => 'stage_b.watchlist',
        ], $userId, 'onboarding');

        return $this->respondSuccess('Watchlist saved.', $progress->computeProgress($userId));
    }


    public function dismissAccountCompletion()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $action = trim((string) $this->request->getPost('action')) ?: 'snooze';

        /** @var AccountCompletionService $completion */
        $completion = service('accountCompletionService');
        $state = $completion->dismiss($userId, $action);

        return $this->respondSuccess('Account completion reminder updated.', $state);
    }

    public function completeSourceWelcome()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->respondError('Unauthorized', 401);
        }

        $action = trim((string) $this->request->getPost('action')) ?: 'completed';

        /** @var OnboardingProgressService $progress */
        $progress = service('onboardingProgressService');
        $state = $progress->markSourceAwareWelcomeComplete($userId, $action);

        return $this->respondSuccess('Source welcome updated.', $state);
    }

    private function respondSuccess(string $message, array $data = [], int $status = 200)
    {
        return $this->response
            ->setStatusCode($status)
            ->setJSON([
                'status'  => 'success',
                'message' => $message,
                'data'    => $data,
                'csrf'    => csrf_hash(),
            ]);
    }

    private function respondError(string $message, int $status = 400)
    {
        log_message('error', 'OnboardingWalkthroughController error: {message} (status {status})', [
            'message' => $message,
            'status'  => $status,
        ]);

        return $this->response
            ->setStatusCode($status)
            ->setJSON([
                'status'  => 'error',
                'message' => $message,
                'csrf'    => csrf_hash(),
            ]);
    }

    private function filterPayloadByColumns(string $table, array $payload): array
    {
        if (! $this->db()->tableExists($table)) {
            return [];
        }

        $columns = $this->getTableColumns($table);
        if ($columns === []) {
            return [];
        }

        return array_filter(
            $payload,
            static fn ($key) => in_array($key, $columns, true),
            ARRAY_FILTER_USE_KEY
        );
    }

    private function getTableColumns(string $table): array
    {
        if (isset($this->tableColumns[$table])) {
            return $this->tableColumns[$table];
        }

        try {
            $fields = $this->db()->getFieldData($table);
        } catch (\Throwable $e) {
            log_message('error', 'OnboardingWalkthroughController failed to inspect table {table}: {msg}', [
                'table' => $table,
                'msg'   => $e->getMessage(),
            ]);
            $this->tableColumns[$table] = [];
            return [];
        }

        $this->tableColumns[$table] = array_map(static fn ($field) => $field->name, $fields);
        return $this->tableColumns[$table];
    }

    private function db(): ConnectionInterface
    {
        return db_connect();
    }
}
