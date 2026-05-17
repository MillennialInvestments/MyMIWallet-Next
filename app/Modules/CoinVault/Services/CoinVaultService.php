<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Services;

use App\Models\UserModel;
use App\Modules\CoinVault\Models\CoinContributionModel;
use App\Modules\CoinVault\Models\CoinLedgerModel;
use App\Modules\CoinVault\Models\CoinPayoutRequestModel;
use App\Modules\CoinVault\Models\CoinProjectModel;
use App\Modules\CoinVault\Models\CoinWalletModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;
use Throwable;

class CoinVaultService
{
    public const LEDGER_TYPES = [
        'vault_mint', 'vault_release', 'expense_contribution', 'hourly_contribution',
        'task_reward', 'testing_reward', 'approval_reward', 'in_app_credit', 'payout_request',
        'payout_approved', 'payout_paid', 'blockchain_mint', 'blockchain_transfer', 'manual_adjustment',
    ];

    public function __construct(
        protected ?BaseConnection $db = null,
        protected ?CoinRewardRuleService $rewardRules = null,
    ) {
        $this->db = $db ?? Database::connect();
        $this->rewardRules = $rewardRules ?? new CoinRewardRuleService();
    }

    public function requiredTables(): array
    {
        return config('CoinVault')->tables;
    }

    public function tableStatus(): array
    {
        $status = [];
        foreach ($this->requiredTables() as $key => $table) {
            try {
                $status[$key] = ['table' => $table, 'exists' => $this->db->tableExists($table)];
            } catch (Throwable $e) {
                $status[$key] = ['table' => $table, 'exists' => false, 'error' => $e->getMessage()];
            }
        }

        return $status;
    }

    public function hasRequiredTables(array $keys = ['projects', 'wallets', 'ledger', 'contributions']): bool
    {
        $status = $this->tableStatus();
        foreach ($keys as $key) {
            if (empty($status[$key]['exists'])) {
                return false;
            }
        }

        return true;
    }

    public function getDashboardData(): array
    {
        if (! $this->hasRequiredTables()) {
            return ['table_status' => $this->tableStatus(), 'projects' => [], 'pending_contributions' => [], 'pending_payouts' => []];
        }

        return [
            'table_status' => $this->tableStatus(),
            'projects' => (new CoinProjectModel())->orderBy('project_name', 'ASC')->findAll(50),
            'pending_contributions' => (new CoinContributionModel())->where('status', 'pending')->orderBy('created_at', 'DESC')->findAll(25),
            'pending_payouts' => (new CoinPayoutRequestModel())->where('status', 'pending')->orderBy('created_at', 'DESC')->findAll(25),
        ];
    }

    public function findProject(string $projectKey, string $coinSymbol): ?array
    {
        if (! $this->hasRequiredTables(['projects'])) {
            return null;
        }

        return (new CoinProjectModel())
            ->where('project_key', $projectKey)
            ->where('coin_symbol', strtoupper($coinSymbol))
            ->where('status !=', 'deleted')
            ->first() ?: null;
    }

    public function findUserByEmail(string $email): ?array
    {
        $user = (new UserModel())->where('email', strtolower(trim($email)))->first();
        if (! $user) {
            return null;
        }

        if (is_object($user) && method_exists($user, 'toArray')) {
            return $user->toArray();
        }

        return (array) $user;
    }

    public function getOrCreateWallet(int $projectId, int $userId): array
    {
        $model = new CoinWalletModel();
        $wallet = $model->where('project_id', $projectId)->where('user_id', $userId)->first();
        if ($wallet) {
            return $wallet;
        }

        $id = $model->insert([
            'project_id' => $projectId,
            'user_id' => $userId,
            'available_balance' => 0,
            'locked_balance' => 0,
            'voting_balance' => 0,
            'lifetime_earned' => 0,
            'lifetime_withdrawn' => 0,
            'status' => 'active',
        ], true);

        return $model->find((int) $id);
    }

    public function ownershipPercent(array $wallet, array $project): float
    {
        $released = (float) ($project['released_supply'] ?? 0);
        if ($released <= 0) {
            return 0.0;
        }

        return round(((float) ($wallet['voting_balance'] ?? $wallet['available_balance'] ?? 0) / $released) * 100, 8);
    }

    public function approveContribution(int $contributionId, int $adminUserId = 0): array
    {
        if (! $this->hasRequiredTables()) {
            return ['ok' => false, 'error' => 'coin_vault_tables_missing', 'tables' => $this->tableStatus()];
        }

        $contributions = new CoinContributionModel();
        $contribution = $contributions->find($contributionId);
        if (! $contribution || ($contribution['status'] ?? '') !== 'pending') {
            return ['ok' => false, 'error' => 'contribution_not_pending'];
        }

        $project = (new CoinProjectModel())->find((int) $contribution['project_id']);
        if (! $project) {
            return ['ok' => false, 'error' => 'project_not_found'];
        }

        $amount = (float) ($contribution['calculated_coin_amount'] ?: $this->rewardRules->calculate($contribution, $project));
        if ($amount <= 0) {
            return ['ok' => false, 'error' => 'coin_amount_must_be_positive'];
        }

        if ((float) ($project['vault_balance'] ?? 0) < $amount) {
            return ['ok' => false, 'error' => 'insufficient_vault_balance'];
        }

        $this->db->transStart();
        $wallet = $this->getOrCreateWallet((int) $project['id'], (int) $contribution['user_id']);
        $newAvailable = (float) $wallet['available_balance'] + $amount;
        $newVoting = (float) $wallet['voting_balance'] + $amount;

        $ledgerId = (new CoinLedgerModel())->insert([
            'project_id' => $project['id'],
            'wallet_id' => $wallet['id'],
            'user_id' => $contribution['user_id'],
            'transaction_type' => $this->rewardRules->ledgerTypeForContribution((string) $contribution['contribution_type']),
            'direction' => 'credit',
            'amount' => $amount,
            'balance_after' => $newAvailable,
            'reference_table' => 'bf_coin_vault_contributions',
            'reference_id' => $contributionId,
            'source' => $contribution['source'],
            'source_id' => $contribution['source_id'],
            'memo' => $contribution['memo'],
            'created_by' => $adminUserId,
        ], true);

        (new CoinWalletModel())->update((int) $wallet['id'], [
            'available_balance' => $newAvailable,
            'voting_balance' => $newVoting,
            'lifetime_earned' => (float) $wallet['lifetime_earned'] + $amount,
            'updated_by' => $adminUserId,
        ]);

        (new CoinProjectModel())->update((int) $project['id'], [
            'released_supply' => (float) $project['released_supply'] + $amount,
            'vault_balance' => (float) $project['vault_balance'] - $amount,
            'updated_by' => $adminUserId,
        ]);

        $contributions->update($contributionId, [
            'status' => 'approved',
            'calculated_coin_amount' => $amount,
            'approved_by' => $adminUserId,
            'approved_at' => date('Y-m-d H:i:s'),
            'updated_by' => $adminUserId,
        ]);
        $this->db->transComplete();

        return ['ok' => $this->db->transStatus(), 'ledger_id' => $ledgerId, 'coin_amount' => $amount];
    }

    public function rejectContribution(int $contributionId, int $adminUserId = 0, string $reason = ''): bool
    {
        return (bool) (new CoinContributionModel())->update($contributionId, [
            'status' => 'rejected',
            'rejected_by' => $adminUserId,
            'rejected_at' => date('Y-m-d H:i:s'),
            'rejection_reason' => $reason,
            'updated_by' => $adminUserId,
        ]);
    }

    public function requestPayout(int $projectId, int $userId, float $coinAmount, string $memo = ''): array
    {
        if (! $this->hasRequiredTables(['projects', 'wallets', 'ledger', 'payouts'])) {
            return ['ok' => false, 'error' => 'coin_vault_tables_missing', 'tables' => $this->tableStatus()];
        }

        if ($coinAmount <= 0) {
            return ['ok' => false, 'error' => 'coin_amount_must_be_positive'];
        }

        $project = (new CoinProjectModel())->find($projectId);
        $wallet = (new CoinWalletModel())->where('project_id', $projectId)->where('user_id', $userId)->first();
        if (! $project || ! $wallet || (float) $wallet['available_balance'] < $coinAmount) {
            return ['ok' => false, 'error' => 'insufficient_available_balance'];
        }

        $this->db->transStart();
        $newAvailable = (float) $wallet['available_balance'] - $coinAmount;
        $newLocked = (float) $wallet['locked_balance'] + $coinAmount;
        (new CoinWalletModel())->update((int) $wallet['id'], [
            'available_balance' => $newAvailable,
            'locked_balance' => $newLocked,
        ]);
        $payoutId = (new CoinPayoutRequestModel())->insert([
            'project_id' => $projectId,
            'wallet_id' => $wallet['id'],
            'user_id' => $userId,
            'coin_amount' => $coinAmount,
            'usd_reference_amount' => $coinAmount * (float) ($project['usd_reference_value'] ?? 0),
            'status' => 'pending',
            'memo' => $memo,
        ], true);
        (new CoinLedgerModel())->insert([
            'project_id' => $projectId,
            'wallet_id' => $wallet['id'],
            'user_id' => $userId,
            'transaction_type' => 'payout_request',
            'direction' => 'lock',
            'amount' => $coinAmount,
            'balance_after' => $newAvailable,
            'reference_table' => 'bf_coin_vault_payout_requests',
            'reference_id' => $payoutId,
            'memo' => $memo,
        ]);
        $this->db->transComplete();

        return ['ok' => $this->db->transStatus(), 'payout_id' => $payoutId];
    }

    public function approvePayout(int $payoutId, int $adminUserId = 0): array
    {
        $payouts = new CoinPayoutRequestModel();
        $payout = $payouts->find($payoutId);
        if (! $payout || ($payout['status'] ?? '') !== 'pending') {
            return ['ok' => false, 'error' => 'payout_not_pending'];
        }
        $wallet = (new CoinWalletModel())->find((int) $payout['wallet_id']);
        $locked = max(0, (float) $wallet['locked_balance'] - (float) $payout['coin_amount']);
        $voting = max(0, (float) $wallet['voting_balance'] - (float) $payout['coin_amount']);
        (new CoinWalletModel())->update((int) $wallet['id'], [
            'locked_balance' => $locked,
            'voting_balance' => $voting,
            'lifetime_withdrawn' => (float) $wallet['lifetime_withdrawn'] + (float) $payout['coin_amount'],
            'updated_by' => $adminUserId,
        ]);
        (new CoinLedgerModel())->insert([
            'project_id' => $payout['project_id'],
            'wallet_id' => $payout['wallet_id'],
            'user_id' => $payout['user_id'],
            'transaction_type' => 'payout_approved',
            'direction' => 'debit',
            'amount' => $payout['coin_amount'],
            'balance_after' => $wallet['available_balance'],
            'reference_table' => 'bf_coin_vault_payout_requests',
            'reference_id' => $payoutId,
            'created_by' => $adminUserId,
        ]);
        $payouts->update($payoutId, ['status' => 'approved', 'approved_by' => $adminUserId, 'approved_at' => date('Y-m-d H:i:s')]);
        return ['ok' => true];
    }

    public function rejectPayout(int $payoutId, int $adminUserId = 0, string $reason = ''): array
    {
        $payouts = new CoinPayoutRequestModel();
        $payout = $payouts->find($payoutId);
        if (! $payout || ($payout['status'] ?? '') !== 'pending') {
            return ['ok' => false, 'error' => 'payout_not_pending'];
        }
        $wallet = (new CoinWalletModel())->find((int) $payout['wallet_id']);
        (new CoinWalletModel())->update((int) $wallet['id'], [
            'available_balance' => (float) $wallet['available_balance'] + (float) $payout['coin_amount'],
            'locked_balance' => max(0, (float) $wallet['locked_balance'] - (float) $payout['coin_amount']),
            'updated_by' => $adminUserId,
        ]);
        $payouts->update($payoutId, ['status' => 'rejected', 'rejected_by' => $adminUserId, 'rejected_at' => date('Y-m-d H:i:s'), 'rejection_reason' => $reason]);
        return ['ok' => true];
    }

    public function solanaIntegrationMap(): array
    {
        return [
            'createProjectToken' => 'App\\Modules\\Exchange\\Controllers\\SolanaController::createToken plus App\\Libraries\\MyMISolana metadata helpers; wrapper intentionally pending until mint transaction format is confirmed.',
            'mintToVault' => 'Map to SolanaController::mintTokens / MyMISolana transaction helpers; ledger type blockchain_mint records the tx.',
            'releaseFromVaultToUser' => 'Map to SolanaController transfer/swap flows and bf_exchanges_coin_addresses default address lookup.',
            'getMintAddress' => 'Read CoinProjectModel::solana_mint_address after admin token creation.',
            'getTokenBalance' => 'App\\Services\\SolanaService::getTokenAccounts/getWalletPortfolioData.',
            'recordBlockchainTx' => 'CoinLedgerModel blockchain_network/blockchain_tx fields, cross-referenced to existing bf_exchanges transaction records when available.',
        ];
    }
}
