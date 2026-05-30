<?php

namespace App\Services;

use App\Models\TbiProjectCoinModel;

class TbiProjectCoinService
{
    public function __construct(private ?TbiProjectCoinModel $model = null)
    {
        $this->model = $model ?? new TbiProjectCoinModel();
    }

    public function createDefaultCoinsForProject(int $projectId): array { return $this->model->createDefaultCoinsForProject($projectId); }
    public function getProjectCoins(int $projectId): array { return $this->model->getCoinsForProject($projectId); }

    public function getPhase03DraftDefinitions(): array
    {
        $now = date('Y-m-d H:i:s');
        return [
            [
                'project_id' => 1,
                'coin_key' => 'tbi_solutions_project',
                'project_name' => 'TBI Solutions Project',
                'coin_name' => 'TBI Solutions Project',
                'symbol' => 'TBISP',
                'coin_type' => 'project',
                'unit_value_usd' => '1.000000',
                'network' => 'devnet',
                'decimals' => 6,
                'initial_supply' => '0.000000',
                'status' => 'draft',
                'solana_mint_address' => null,
                'metadata_uri' => null,
                'created_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_id' => 1,
                'coin_key' => 'tbi_coin',
                'project_name' => 'TBI Solutions Project',
                'coin_name' => 'TBI Coin',
                'symbol' => 'TBI',
                'coin_type' => 'utility',
                'unit_value_usd' => '1.000000',
                'network' => 'devnet',
                'decimals' => 6,
                'initial_supply' => '0.000000',
                'status' => 'draft',
                'solana_mint_address' => null,
                'metadata_uri' => null,
                'created_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_id' => 1,
                'coin_key' => 'tbi_invest_coin',
                'project_name' => 'TBI Solutions Project',
                'coin_name' => 'TBI Invest Coin',
                'symbol' => 'TBIINV',
                'coin_type' => 'investment',
                'unit_value_usd' => '1.000000',
                'network' => 'devnet',
                'decimals' => 6,
                'initial_supply' => '0.000000',
                'status' => 'draft',
                'solana_mint_address' => null,
                'metadata_uri' => null,
                'created_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }

    public function createPhase03Drafts(bool $dryRun = true): array
    {
        $results = [];
        foreach ($this->getPhase03DraftDefinitions() as $definition) {
            $metadata = [
                'project_name' => $definition['project_name'],
                'coin_name' => $definition['coin_name'],
                'symbol' => $definition['symbol'],
                'network' => $definition['network'],
                'decimals' => $definition['decimals'],
                'supply' => $definition['initial_supply'],
                'status' => $definition['status'],
                'mint_address' => $definition['solana_mint_address'],
                'metadata_uri' => $definition['metadata_uri'],
                'created_by' => $definition['created_by'],
                'created_at' => $definition['created_at'],
                'updated_at' => $definition['updated_at'],
                'mainnet_minting' => 'blocked',
            ];

            $draft = $definition;
            unset($draft['project_name']);
            $draft['primary_issuance_enabled'] = 0;
            $draft['secondary_trading_enabled'] = 0;
            $draft['compliance_required'] = $definition['coin_type'] === 'investment' ? 1 : 0;
            $draft['project_exchange_symbol'] = 'SOL-' . $definition['symbol'];
            $draft['metadata'] = $metadata;

            if ($dryRun) {
                $existing = null;
                try {
                    $existing = $this->model->getCoinByKey($definition['coin_key']);
                } catch (\Throwable $e) {
                    // Dry-runs must be safe in CI or local environments without a reachable database.
                }
                $results[] = ['action' => $existing ? 'would_update' : 'would_create_or_update', 'coin_key' => $definition['coin_key'], 'draft' => $draft];
                continue;
            }

            $results[] = $this->model->upsertProjectCoinDraft($draft) + ['coin_key' => $definition['coin_key']];
        }

        return $results;
    }

    public function recordContribution(array $payload): int
    {
        $coin = $this->model->find((int) $payload['coin_id']);
        $unitValue = (float) ($payload['unit_value_usd'] ?? ($coin['unit_value_usd'] ?? 1.0));
        $usdValue = (float) ($payload['usd_value'] ?? 0);
        $coinQty = $this->model->calculateCoinQuantity($usdValue, $unitValue);

        $ledgerData = [
            'project_id' => (int) $payload['project_id'], 'coin_id' => (int) $payload['coin_id'], 'user_id' => (int) $payload['user_id'], 'category_id' => (int) $payload['category_id'],
            'contribution_type' => (string) $payload['contribution_type'], 'description' => (string) ($payload['description'] ?? ''), 'external_reference' => (string) ($payload['external_reference'] ?? ''),
            'usd_value' => $usdValue, 'coin_quantity' => $coinQty, 'unit_value_usd' => $unitValue, 'status' => 'pending', 'idempotency_key' => (string) ($payload['idempotency_key'] ?? sha1(json_encode($payload))),
            'metadata_json' => json_encode(['coin_type' => $coin['coin_type'] ?? null, 'minted' => false]),
        ];
        return $this->model->recordContribution($ledgerData);
    }

    public function approveContribution(int $ledgerId, int $reviewedBy): bool { return $this->model->approveContribution($ledgerId, $reviewedBy); }
    public function rejectContribution(int $ledgerId, int $reviewedBy, string $reason = ''): bool { return $this->model->rejectContribution($ledgerId, $reviewedBy, $reason); }

    public function prepareSolanaMintPayload(int $coinId): array
    {
        $coin = $this->model->find($coinId);
        return ['coin_id' => $coinId, 'symbol' => $coin['symbol'] ?? null, 'coin_type' => $coin['coin_type'] ?? null, 'network' => $coin['network'] ?? 'devnet', 'mint_enabled' => false, 'note' => 'Payload prepared only. Mainnet minting remains blocked.'];
    }

    public function prepareExchangeAssetPayload(int $coinId): array
    {
        $coin = $this->model->find($coinId);
        return ['coin_id' => $coinId, 'symbol' => $coin['symbol'] ?? null, 'coin_type' => $coin['coin_type'] ?? null, 'network' => $coin['network'] ?? 'devnet', 'secondary_trading_enabled' => false, 'note' => 'Prepared for admin review; secondary/public trading remains disabled by default.'];
    }

    public function auditTransactions(array $filters = []): array
    {
        return $this->model->findTransactionsForAudit($filters);
    }
}
