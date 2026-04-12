<?php

namespace App\Modules\PropFirms\Libraries;

use CodeIgniter\Database\BaseConnection;
use Config\Database;
use Throwable;

class PropFirmEngine
{
    private BaseConnection $db;
    private PropFirmRuleRegistry $registry;

    public function __construct(?BaseConnection $db = null, ?PropFirmRuleRegistry $registry = null)
    {
        $this->db = $db ?? Database::connect();
        $this->registry = $registry ?? new PropFirmRuleRegistry();
    }

    public function evaluateAccountState(int $userPropAccountId, array $context = []): array
    {
        try {
            [$account, $ruleSet, $firm] = $this->loadAccountBundle($userPropAccountId);
            $engine = $this->registry->resolveEngine((string) $firm['slug']);

            $payload = $engine->evaluateAccountState($account, $ruleSet, $context);
            $payload = $this->normalizePayload($payload);

            $this->persistSnapshot($account, $payload);
            $this->logEvaluation('evaluateAccountState', $account, $firm, $payload, $context);

            return $payload;
        } catch (Throwable $e) {
            log_message('error', 'PropFirmEngine::evaluateAccountState failed: {message}', [
                'message' => $e->getMessage(),
                'account_id' => $userPropAccountId,
                'context' => json_encode($context),
            ]);

            return $this->normalizePayload([
                'can_trade' => false,
                'risk_state' => 'breached',
                'warnings' => ['Unable to evaluate account state.'],
                'breach_reason' => 'evaluation_error',
            ]);
        }
    }

    public function refreshThresholds(int $userPropAccountId, array $context = []): array
    {
        [$account, $ruleSet, $firm] = $this->loadAccountBundle($userPropAccountId);
        $engine = $this->registry->resolveEngine((string) $firm['slug']);
        $thresholds = $engine->refreshThresholds($account, $ruleSet);

        $this->logEvaluation('refreshThresholds', $account, $firm, ['thresholds' => $thresholds], $context);

        return $thresholds;
    }

    public function getAllowedSymbols(int $userPropAccountId): array
    {
        [$account, $ruleSet] = $this->loadAccountBundle($userPropAccountId);

        $rows = $this->db->table('bf_prop_allowed_symbols')
            ->select('symbol')
            ->where('prop_rule_set_id', (int) $ruleSet['id'])
            ->where('is_enabled', 1)
            ->orderBy('symbol', 'ASC')
            ->get()
            ->getResultArray();

        if ($rows === []) {
            return (array) ($account['metadata_allowed_symbols'] ?? []);
        }

        return array_values(array_map(static fn (array $row): string => (string) $row['symbol'], $rows));
    }

    public function checkTradeEligibility(int $userPropAccountId, array $tradeContext = []): array
    {
        [$account, $ruleSet, $firm] = $this->loadAccountBundle($userPropAccountId);
        $engine = $this->registry->resolveEngine((string) $firm['slug']);

        $allowedSymbols = $this->getAllowedSymbols($userPropAccountId);
        if (! empty($allowedSymbols) && isset($tradeContext['symbol']) && ! in_array($tradeContext['symbol'], $allowedSymbols, true)) {
            $payload = $this->normalizePayload([
                'can_trade' => false,
                'risk_state' => 'breached',
                'warnings' => ['Symbol is not enabled for this rule set.'],
                'breach_reason' => 'symbol_not_allowed',
            ]);
            $this->persistSnapshot($account, $payload);
            $this->logEvaluation('checkTradeEligibility', $account, $firm, $payload, $tradeContext);

            return $payload;
        }

        $payload = $engine->checkTradeEligibility($account, $ruleSet, $tradeContext);
        $payload = $this->normalizePayload($payload);
        $this->persistSnapshot($account, $payload);
        $this->logEvaluation('checkTradeEligibility', $account, $firm, $payload, $tradeContext);

        return $payload;
    }

    private function loadAccountBundle(int $userPropAccountId): array
    {
        $account = $this->db->table('bf_user_prop_accounts')
            ->select('id, prop_firm_id, prop_rule_set_id, starting_balance, current_balance, metadata_json')
            ->where('id', $userPropAccountId)
            ->get()
            ->getRowArray();

        if ($account === null) {
            throw new \RuntimeException('Prop account not found: ' . $userPropAccountId);
        }

        $ruleSet = $this->db->table('bf_prop_rule_sets')
            ->select('*')
            ->where('id', (int) ($account['prop_rule_set_id'] ?? 0))
            ->get()
            ->getRowArray();
        if ($ruleSet === null) {
            throw new \RuntimeException('Rule set not found for account: ' . $userPropAccountId);
        }

        $firm = $this->db->table('bf_prop_firms')
            ->select('id, slug, name')
            ->where('id', (int) $account['prop_firm_id'])
            ->get()
            ->getRowArray();
        if ($firm === null) {
            throw new \RuntimeException('Prop firm not found for account: ' . $userPropAccountId);
        }

        $metadata = json_decode((string) ($account['metadata_json'] ?? ''), true);
        $account['metadata_allowed_symbols'] = is_array($metadata['allowed_symbols'] ?? null) ? $metadata['allowed_symbols'] : [];

        return [$account, $ruleSet, $firm];
    }

    private function normalizePayload(array $payload): array
    {
        return [
            'can_trade' => (bool) ($payload['can_trade'] ?? false),
            'risk_state' => (string) ($payload['risk_state'] ?? 'warning'),
            'remaining_drawdown' => (float) ($payload['remaining_drawdown'] ?? 0),
            'remaining_dll' => (float) ($payload['remaining_dll'] ?? 0),
            'max_contracts_allowed' => (int) ($payload['max_contracts_allowed'] ?? 0),
            'stop_loss_required' => (bool) ($payload['stop_loss_required'] ?? false),
            'warnings' => array_values((array) ($payload['warnings'] ?? [])),
            'breach_reason' => $payload['breach_reason'] ?? null,
            'thresholds' => (array) ($payload['thresholds'] ?? []),
            'pnl_total' => (float) ($payload['pnl_total'] ?? 0),
        ];
    }

    private function persistSnapshot(array $account, array $payload): void
    {
        $equity = (float) ($account['current_balance'] ?? 0);
        $drawdown = max(0, (float) ($account['starting_balance'] ?? 0) - $equity);

        $this->db->table('bf_prop_equity_history')->insert([
            'user_prop_account_id' => (int) $account['id'],
            'equity' => $equity,
            'drawdown' => $drawdown,
            'recorded_at' => date('Y-m-d H:i:s'),
            'source' => 'risk_engine:' . (string) ($payload['risk_state'] ?? 'unknown'),
        ]);
    }

    private function logEvaluation(
        string $action,
        array $account,
        array $firm,
        array $payload,
        array $context = []
    ): void {
        log_message('info', 'PropFirmEngine::{action} evaluated account', [
            'action' => $action,
            'account_id' => (int) $account['id'],
            'firm_slug' => (string) $firm['slug'],
            'risk_state' => (string) ($payload['risk_state'] ?? 'unknown'),
            'can_trade' => (bool) ($payload['can_trade'] ?? false),
            'breach_reason' => $payload['breach_reason'] ?? null,
            'warnings' => json_encode($payload['warnings'] ?? []),
            'context' => json_encode($context),
        ]);
    }
}
