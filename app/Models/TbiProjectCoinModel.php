<?php

namespace App\Models;

use CodeIgniter\Model;

class TbiProjectCoinModel extends Model
{
    protected $table = 'bf_tbi_project_coins';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['project_id', 'coin_key', 'coin_name', 'symbol', 'coin_type', 'unit_value_usd', 'solana_mint_address', 'exchange_asset_id', 'project_exchange_symbol', 'primary_issuance_enabled', 'secondary_trading_enabled', 'compliance_required', 'status', 'metadata_json'];
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

    public function getContributionCategories(): array { return $this->db->table('bf_tbi_coin_contribution_categories')->where('is_active', 1)->get()->getResultArray(); }
    public function recordContribution(array $data): int { $this->db->table('bf_tbi_coin_contribution_ledger')->insert($data); return (int) $this->db->insertID(); }
    public function approveContribution(int $ledgerId, int $reviewedBy): bool { return (bool) $this->db->table('bf_tbi_coin_contribution_ledger')->where('id', $ledgerId)->where('status', 'pending')->update(['status' => 'approved', 'reviewed_by' => $reviewedBy, 'reviewed_at' => date('Y-m-d H:i:s')]); }
    public function rejectContribution(int $ledgerId, int $reviewedBy, string $reason = ''): bool { return (bool) $this->db->table('bf_tbi_coin_contribution_ledger')->where('id', $ledgerId)->where('status', 'pending')->update(['status' => 'rejected', 'reviewed_by' => $reviewedBy, 'reviewed_at' => date('Y-m-d H:i:s'), 'metadata_json' => json_encode(['reason' => $reason])]); }
    public function calculateCoinQuantity(float $usdValue, float $unitValueUsd = 1.0): float { return round($unitValueUsd > 0 ? $usdValue / $unitValueUsd : 0, 6); }
}
