<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Services;

use App\Modules\CoinVault\Models\CoinContributionModel;
use CodeIgniter\HTTP\IncomingRequest;
use Config\Database;

class ExternalContributionService
{
    public function __construct(protected ?CoinVaultService $vault = null)
    {
        $this->vault = $vault ?? new CoinVaultService();
    }

    public function ingest(array $payload, IncomingRequest $request, string $rawBody = ''): array
    {
        $auth = $this->authenticate($payload, $request, $rawBody);

        if (! $auth['ok']) {
            $this->logEvent($payload, 'rejected', $auth['error'], null, $auth['client'] ?? null);
            return $auth;
        }

        foreach (['project_key', 'coin_symbol', 'user_email', 'contribution_type', 'source', 'source_id'] as $field) {
            if (($payload[$field] ?? '') === '') {
                $this->logEvent($payload, 'rejected', 'missing_' . $field, null, $auth['client']);
                return ['ok' => false, 'error' => 'missing_' . $field];
            }
        }

        if (! $this->vault->hasRequiredTables(['projects', 'contributions', 'externalLogs'])) {
            return ['ok' => false, 'error' => 'coin_vault_tables_missing', 'tables' => $this->vault->tableStatus()];
        }

        $source = (string) $payload['source'];
        $sourceId = (string) $payload['source_id'];
        $externalEventId = (string) ($payload['external_event_id'] ?? $source . ':' . $sourceId);

        $contributions = new CoinContributionModel();
        $duplicate = $contributions
            ->groupStart()
                ->where('idempotency_key', $this->idempotencyKey($source, $sourceId))
                ->orGroupStart()
                    ->where('source', $source)
                    ->where('source_id', $sourceId)
                ->groupEnd()
            ->groupEnd()
            ->first();

        if ($duplicate) {
            $this->logEvent($payload, 'rejected', 'duplicate_source_event', (int) ($duplicate['id'] ?? 0), $auth['client']);
            return ['ok' => false, 'error' => 'duplicate_source_event', 'contribution_id' => $duplicate['id'] ?? null];
        }

        $project = $this->vault->findProject((string) $payload['project_key'], (string) $payload['coin_symbol']);

        if (! $project) {
            $this->logEvent($payload, 'rejected', 'project_coin_not_found', null, $auth['client']);
            return ['ok' => false, 'error' => 'project_coin_not_found'];
        }

        $user = $this->vault->findUserByEmail((string) $payload['user_email']);

        if (! $user) {
            $this->logEvent($payload, 'rejected', 'user_not_found', null, $auth['client'], (int) $project['id']);
            return ['ok' => false, 'error' => 'user_not_found'];
        }

        $amount = (new CoinRewardRuleService())->calculate($payload, $project);
        $coinId = (int) $project['id'];
        $projectId = (int) ($project['project_id'] ?? 0);
        $categoryId = $this->vault->getCategoryId((string) $payload['contribution_type']);
        $unitValue = (float) ($project['unit_value_usd'] ?? 1);

        $id = $contributions->insert([
            'project_id' => $projectId,
            'coin_id' => $coinId,
            'user_id' => (int) $user['id'],
            'category_id' => $categoryId,
            'contribution_type' => substr((string) $payload['contribution_type'], 0, 80),
            'transaction_type' => (new CoinRewardRuleService())->ledgerTypeForContribution((string) $payload['contribution_type']),
            'direction' => 'pending',
            'description' => (string) ($payload['memo'] ?? ''),
            'external_reference' => $externalEventId,
            'usd_value' => (float) ($payload['usd_amount'] ?? 0),
            'coin_quantity' => $amount,
            'amount' => $amount,
            'unit_value_usd' => $unitValue,
            'status' => $auth['auto_approve'] ? 'pending_auto_approval' : 'pending',
            'idempotency_key' => $this->idempotencyKey($source, $sourceId),
            'source' => $source,
            'source_id' => $sourceId,
            'external_client' => $auth['client'],
            'external_event_id' => $externalEventId,
            'reference_table' => 'external',
            'memo' => (string) ($payload['memo'] ?? ''),
            'metadata_json' => json_encode([
                'payload' => $payload,
                'client' => $auth['client'],
                'ip' => $request->getIPAddress(),
                'user_email' => strtolower((string) $payload['user_email']),
                'coin_symbol' => strtoupper((string) $payload['coin_symbol']),
                'project_key' => (string) $payload['project_key'],
            ]),
        ], true);

        $this->logEvent($payload, 'accepted', null, (int) $id, $auth['client'], $coinId, $projectId, (int) $user['id']);

        return [
            'ok' => true,
            'status' => 'pending',
            'contribution_id' => (int) $id,
            'calculated_coin_amount' => $amount,
        ];
    }

    private function authenticate(array $payload, IncomingRequest $request, string $rawBody): array
    {
        $config = config('CoinVault');
        $source = (string) ($payload['source'] ?? '');
        $client = $config->externalClients[$source] ?? null;

        if (! $client || empty($client['enabled'])) {
            return ['ok' => false, 'error' => 'external_client_not_allowed', 'client' => $source];
        }

        $apiKey = (string) getenv((string) ($client['apiKeyEnv'] ?? ''));
        $hmacSecret = (string) getenv((string) ($client['hmacSecretEnv'] ?? ''));

        $legacyKey = (string) $request->getHeaderLine('X-CoinVault-Api-Key');
        $legacySig = (string) $request->getHeaderLine('X-CoinVault-Signature');

        $tbiClient = (string) $request->getHeaderLine('X-TBI-Client');
        $timestamp = (string) $request->getHeaderLine('X-TBI-Timestamp');
        $nonce = (string) $request->getHeaderLine('X-TBI-Nonce');
        $tbiSig = (string) $request->getHeaderLine('X-TBI-Signature');

        $apiOk = $apiKey !== '' && hash_equals($apiKey, $legacyKey);

        $hmacOk = false;
        if ($hmacSecret !== '' && $legacySig !== '') {
            $expected = hash_hmac('sha256', $rawBody, $hmacSecret);
            $hmacOk = hash_equals($expected, preg_replace('/^sha256=/i', '', $legacySig));
        }

        $tbiOk = false;
        if ($hmacSecret !== '' && $timestamp !== '' && $nonce !== '' && $tbiSig !== '') {
            if (abs(time() - (int) $timestamp) <= 300) {
                $expected = hash_hmac('sha256', $timestamp . '.' . $nonce . '.' . $rawBody, $hmacSecret);
                $tbiOk = hash_equals($expected, preg_replace('/^sha256=/i', '', $tbiSig));
            }
        }

        $expectedClient = (string) ($client['clientId'] ?? '');
        if ($tbiClient !== '' && $expectedClient !== '' && ! hash_equals($expectedClient, $tbiClient)) {
            return ['ok' => false, 'error' => 'invalid_tbi_client', 'client' => $source];
        }

        if (! $apiOk && ! $hmacOk && ! $tbiOk) {
            return ['ok' => false, 'error' => 'invalid_external_auth', 'client' => $source];
        }

        return ['ok' => true, 'client' => $source, 'auto_approve' => (bool) ($client['autoApprove'] ?? false)];
    }

    private function idempotencyKey(string $source, string $sourceId): string
    {
        return hash('sha256', $source . ':' . $sourceId);
    }

    private function logEvent(
        array $payload,
        string $status,
        ?string $reason = null,
        ?int $contributionId = null,
        ?string $externalClient = null,
        ?int $coinId = null,
        ?int $projectId = null,
        ?int $userId = null
    ): void {
        try {
            $db = Database::connect();
            $table = config('CoinVault')->tables['externalLogs'];

            if (! $db->tableExists($table)) {
                log_message('info', 'CoinVault external event {status}: {reason}', ['status' => $status, 'reason' => $reason]);
                return;
            }

            $source = (string) ($payload['source'] ?? '');
            $sourceId = (string) ($payload['source_id'] ?? '');
            $externalEventId = (string) ($payload['external_event_id'] ?? $source . ':' . $sourceId);

            $db->table($table)->insert([
                'external_client' => $externalClient,
                'external_event_id' => $externalEventId,
                'source' => $source,
                'source_id' => $sourceId,
                'project_id' => $projectId,
                'coin_id' => $coinId,
                'user_id' => $userId,
                'contribution_id' => $contributionId,
                'status' => $status,
                'reason' => $reason,
                'error_message' => $reason,
                'payload_hash' => hash('sha256', json_encode($payload)),
                'payload_json' => json_encode($payload),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'CoinVault external event log failed: ' . $e->getMessage());
        }
    }
}
