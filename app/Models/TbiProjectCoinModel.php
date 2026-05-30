<?php

namespace App\Models;

use CodeIgniter\Model;

class TbiProjectCoinModel extends Model
{
    protected $table = 'bf_tbi_project_coins';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'project_id', 'coin_key', 'coin_name', 'symbol', 'coin_type', 'unit_value_usd',
        'solana_mint_address', 'exchange_asset_id', 'project_exchange_symbol',
        'primary_issuance_enabled', 'secondary_trading_enabled', 'compliance_required',
        'status', 'metadata_json', 'network', 'decimals', 'initial_supply', 'metadata_uri', 'created_by',
    ];
    protected $useTimestamps = true;

    public function getCoinByKey(string $coinKey): ?array { return $this->where('coin_key', $coinKey)->first(); }
    public function getCoinsForProject(int $projectId): array { return $this->where('project_id', $projectId)->findAll(); }

    public function createDefaultCoinsForProject(int $projectId): array
    {
        $defaults = [
            'tbi_investment' => ['coin_name' => 'TBI Investment Coin','symbol' => 'TBIINV','coin_type' => 'investment','unit_value_usd' => 1,'primary_issuance_enabled' => 1,'secondary_trading_enabled' => 0,'compliance_required' => 1,'status' => 'draft','metadata_json' => json_encode(['disclaimer' => 'Not publicly approved security. Compliance review required before broader availability.'])],
            'tbi_utility' => ['coin_name' => 'TBI Utility Coin','symbol' => 'TBIUSD','coin_type' => 'utility','unit_value_usd' => 1,'primary_issuance_enabled' => 1,'secondary_trading_enabled' => 0,'compliance_required' => 0,'status' => 'active','metadata_json' => json_encode(['disclaimer' => 'Utility-only credit for approved operational contributions. No ownership or profit-sharing rights.'])],
        ];
        $created = [];
        foreach ($defaults as $coinKey => $coin) {
            $existing = $this->where('project_id', $projectId)->where('coin_key', $coinKey)->first();
            if ($existing) { $created[] = $existing; continue; }
            $this->insert(array_merge(['project_id' => $projectId, 'coin_key' => $coinKey], $coin));
            $created[] = $this->find($this->getInsertID());
        }
        return $created;
    }

    public function upsertProjectCoinDraft(array $draft): array
    {
        $coinKey = (string) ($draft['coin_key'] ?? '');
        $projectId = (int) ($draft['project_id'] ?? 0);
        if ($coinKey === '' || $projectId <= 0) {
            throw new \InvalidArgumentException('Project coin drafts require project_id and coin_key.');
        }

        $metadata = $draft['metadata'] ?? [];
        unset($draft['metadata']);
        $draft['metadata_json'] = json_encode($metadata, JSON_UNESCAPED_SLASHES);

        $existing = $this->withDeleted()->where('coin_key', $coinKey)->first();
        if ($existing) {
            $this->update((int) $existing['id'], $draft + ['deleted_at' => null]);
            return ['action' => 'updated', 'coin' => $this->find((int) $existing['id'])];
        }

        $this->insert($draft);
        return ['action' => 'created', 'coin' => $this->find((int) $this->getInsertID())];
    }

    public function findTransactionsForAudit(array $filters = []): array
    {
        $builder = $this->db->table('bf_tbi_coin_contribution_ledger l')
            ->select('l.*, c.coin_key, c.coin_name, c.symbol, c.solana_mint_address, c.network')
            ->join($this->table . ' c', 'c.id = l.coin_id', 'left')
            ->orderBy('l.created_at', 'DESC')
            ->limit((int) ($filters['limit'] ?? 100));

        foreach (['user_id', 'status', 'coin_id', 'project_id'] as $field) {
            if (isset($filters[$field]) && $filters[$field] !== '') {
                $builder->where('l.' . $field, $filters[$field]);
            }
        }
        if (! empty($filters['mint_address'])) {
            $builder->where('c.solana_mint_address', $filters['mint_address']);
        }
        if (! empty($filters['signature'])) {
            $builder->groupStart()->like('l.external_reference', $filters['signature'])->orLike('l.metadata_json', $filters['signature'])->groupEnd();
        }
        if (! empty($filters['date_from'])) {
            $builder->where('l.created_at >=', $filters['date_from'] . ' 00:00:00');
        }
        if (! empty($filters['date_to'])) {
            $builder->where('l.created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        return $builder->get()->getResultArray();
    }

    public function getContributionCategories(): array { return $this->db->table('bf_tbi_coin_contribution_categories')->where('is_active', 1)->get()->getResultArray(); }
    public function recordContribution(array $data): int { $this->db->table('bf_tbi_coin_contribution_ledger')->insert($data); return (int) $this->db->insertID(); }
    public function approveContribution(int $ledgerId, int $reviewedBy): bool { return (bool) $this->db->table('bf_tbi_coin_contribution_ledger')->where('id', $ledgerId)->where('status', 'pending')->update(['status' => 'approved', 'reviewed_by' => $reviewedBy, 'reviewed_at' => date('Y-m-d H:i:s')]); }
    public function rejectContribution(int $ledgerId, int $reviewedBy, string $reason = ''): bool { return (bool) $this->db->table('bf_tbi_coin_contribution_ledger')->where('id', $ledgerId)->where('status', 'pending')->update(['status' => 'rejected', 'reviewed_by' => $reviewedBy, 'reviewed_at' => date('Y-m-d H:i:s'), 'metadata_json' => json_encode(['reason' => $reason])]); }
    public function calculateCoinQuantity(float $usdValue, float $unitValueUsd = 1.0): float { return round($unitValueUsd > 0 ? $usdValue / $unitValueUsd : 0, 6); }
}
