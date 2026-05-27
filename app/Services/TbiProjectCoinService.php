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
        return ['coin_id' => $coinId, 'symbol' => $coin['symbol'] ?? null, 'coin_type' => $coin['coin_type'] ?? null, 'mint_enabled' => false, 'note' => 'Payload prepared only. No live mint executed.'];
    }

    public function prepareExchangeAssetPayload(int $coinId): array
    {
        $coin = $this->model->find($coinId);
        return ['coin_id' => $coinId, 'symbol' => $coin['symbol'] ?? null, 'coin_type' => $coin['coin_type'] ?? null, 'secondary_trading_enabled' => false, 'note' => 'Prepared for admin review; secondary/public trading remains disabled by default.'];
    }
}
