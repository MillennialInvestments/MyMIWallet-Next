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
            $this->logEvent($payload, 'rejected', $auth['error']);
            return $auth;
        }

        foreach (['project_key', 'coin_symbol', 'user_email', 'contribution_type', 'source', 'source_id'] as $field) {
            if (($payload[$field] ?? '') === '') {
                $this->logEvent($payload, 'rejected', 'missing_' . $field);
                return ['ok' => false, 'error' => 'missing_' . $field];
            }
        }

        if (! $this->vault->hasRequiredTables(['projects', 'contributions'])) {
            return ['ok' => false, 'error' => 'coin_vault_tables_missing', 'tables' => $this->vault->tableStatus()];
        }

        $contributions = new CoinContributionModel();
        $duplicate = $contributions->where('source', (string) $payload['source'])
            ->where('source_id', (string) $payload['source_id'])
            ->first();
        if ($duplicate) {
            $this->logEvent($payload, 'rejected', 'duplicate_source_event');
            return ['ok' => false, 'error' => 'duplicate_source_event', 'contribution_id' => $duplicate['id'] ?? null];
        }

        $project = $this->vault->findProject((string) $payload['project_key'], (string) $payload['coin_symbol']);
        if (! $project) {
            $this->logEvent($payload, 'rejected', 'project_coin_not_found');
            return ['ok' => false, 'error' => 'project_coin_not_found'];
        }

        $user = $this->vault->findUserByEmail((string) $payload['user_email']);
        if (! $user) {
            $this->logEvent($payload, 'rejected', 'user_not_found');
            return ['ok' => false, 'error' => 'user_not_found'];
        }

        $amount = (new CoinRewardRuleService())->calculate($payload, $project);
        $id = $contributions->insert([
            'project_id' => $project['id'],
            'project_key' => $payload['project_key'],
            'coin_symbol' => strtoupper((string) $payload['coin_symbol']),
            'user_id' => $user['id'],
            'user_email' => strtolower((string) $payload['user_email']),
            'contribution_type' => $payload['contribution_type'],
            'source' => $payload['source'],
            'source_id' => (string) $payload['source_id'],
            'usd_amount' => (float) ($payload['usd_amount'] ?? 0),
            'hours' => (float) ($payload['hours'] ?? 0),
            'task_count' => (int) ($payload['task_count'] ?? 0),
            'calculated_coin_amount' => $amount,
            'status' => $auth['auto_approve'] ? 'pending_auto_approval' : 'pending',
            'memo' => (string) ($payload['memo'] ?? ''),
            'metadata' => json_encode(['client' => $auth['client'], 'ip' => $request->getIPAddress()]),
        ], true);

        $this->logEvent($payload, 'accepted', null, (int) $id);
        return ['ok' => true, 'status' => 'pending', 'contribution_id' => (int) $id, 'calculated_coin_amount' => $amount];
    }

    private function authenticate(array $payload, IncomingRequest $request, string $rawBody): array
    {
        $config = config('CoinVault');
        $source = (string) ($payload['source'] ?? '');
        $client = $config->externalClients[$source] ?? null;
        if (! $client || empty($client['enabled'])) {
            return ['ok' => false, 'error' => 'external_client_not_allowed'];
        }

        $apiKey = (string) getenv((string) ($client['apiKeyEnv'] ?? ''));
        $hmacSecret = (string) getenv((string) ($client['hmacSecretEnv'] ?? ''));
        $sentKey = (string) $request->getHeaderLine('X-CoinVault-Api-Key');
        $sentSignature = (string) $request->getHeaderLine('X-CoinVault-Signature');

        $apiOk = $apiKey !== '' && hash_equals($apiKey, $sentKey);
        $hmacOk = false;
        if ($hmacSecret !== '' && $sentSignature !== '') {
            $expected = hash_hmac('sha256', $rawBody, $hmacSecret);
            $hmacOk = hash_equals($expected, preg_replace('/^sha256=/i', '', $sentSignature));
        }

        if (! $apiOk && ! $hmacOk) {
            return ['ok' => false, 'error' => 'invalid_external_auth'];
        }

        return ['ok' => true, 'client' => $source, 'auto_approve' => (bool) ($client['autoApprove'] ?? false)];
    }

    private function logEvent(array $payload, string $status, ?string $reason = null, ?int $contributionId = null): void
    {
        try {
            $db = Database::connect();
            $table = config('CoinVault')->tables['externalLogs'];
            if (! $db->tableExists($table)) {
                log_message('info', 'CoinVault external event {status}: {reason}', ['status' => $status, 'reason' => $reason]);
                return;
            }
            $db->table($table)->insert([
                'source' => (string) ($payload['source'] ?? ''),
                'source_id' => (string) ($payload['source_id'] ?? ''),
                'status' => $status,
                'reason' => $reason,
                'contribution_id' => $contributionId,
                'payload_hash' => hash('sha256', json_encode($payload)),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'CoinVault external event log failed: ' . $e->getMessage());
        }
    }
}
