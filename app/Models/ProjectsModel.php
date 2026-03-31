<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table = 'bf_projects';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'title',
        'slug',
        'description',
        'asset_url',
        'purchase_price',
        'target_raise',
        'min_commit',
        'max_commit',
        'commit_deadline',
        'status',
        'exchange_symbol',
        'ticker',
        'exchange_asset_id',
        'auction_id',
        'auction_snapshot',
        'created_at',
        'updated_at',
        'name',
        'target_amount',
        'current_amount',
        'is_active',
        'is_system',
        'project_type',
        'nav_per_unit',
        'total_units_issued',
        'total_fund_value',
        'linked_visual',
        'created_by',
        'nav_update_in_progress',
        'linked_token_id',
        'exchange_asset_id',
        'exchange_enabled',
        'primary_issuance_enabled',
        'secondary_trading_enabled',
        'compliance_required',
        'fund_issuance_status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected ?bool $hasCreatedBy = null;

    protected function hasCreatedBy(): bool
    {
        if ($this->hasCreatedBy === null) {
            $fields = $this->db->getFieldNames($this->table);
            $this->hasCreatedBy = in_array('created_by', $fields, true);
        }

        return $this->hasCreatedBy;
    }

    public function byProject(int $projectId): self
    {
        return $this->where('id', $projectId);
    }

    public function byUser(int $userId): self
    {
        if (! $this->hasCreatedBy()) {
            return $this;
        }

        return $this->where('created_by', $userId);
    }

    public function pending(): self
    {
        return $this->whereIn('status', ['draft', 'collecting']);
    }

    public function paid(): self
    {
        return $this->whereIn('status', ['funded', 'active', 'completed']);
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)->first();
    }

    public function getAllProjects(): array
    {
        return $this->where('status', 'active')
            ->where('is_active', 1)
            ->orderBy('is_system', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->findAll(50);
    }

    public function getUserProjects(int $userId): array
    {
        return $this->byUser($userId)->orderBy('created_at', 'desc')->findAll(20);
    }

    public function getPendingProjects(): array
    {
        return $this->pending()->orderBy('created_at', 'desc')->findAll(20);
    }

    public function getPrimarySystemProject(): ?array
    {
        return $this->where('status', 'active')
            ->where('is_active', 1)
            ->where('is_system', 1)
            ->where('project_type', 'private_fund')
            ->orderBy('created_at', 'DESC')
            ->first();
    }

    public function getProjectFundHolders(int $projectId): array
    {
        return $this->db->table('bf_projects_fund_holders')
            ->where('project_id', $projectId)
            ->orderBy('units_owned', 'DESC')
            ->get()->getResultArray();
    }

    public function getFundHolderByUser(int $projectId, int $userId): ?array
    {
        return $this->db->table('bf_projects_fund_holders')
            ->where('project_id', $projectId)
            ->where('user_id', $userId)
            ->get()->getRowArray();
    }

    public function createFundHolder(array $data): int
    {
        $data['created_at'] = $data['created_at'] ?? Time::now()->toDateTimeString();
        $data['updated_at'] = $data['updated_at'] ?? Time::now()->toDateTimeString();
        $this->db->table('bf_projects_fund_holders')->insert($data);
        return (int) $this->db->insertID();
    }

    public function updateFundHolder($id, array $data): bool
    {
        $data['updated_at'] = Time::now()->toDateTimeString();
        return (bool) $this->db->table('bf_projects_fund_holders')->where('id', $id)->update($data);
    }

    public function logFundTransaction(array $data): int
    {
        $data['created_at'] = $data['created_at'] ?? Time::now()->toDateTimeString();
        $this->db->table('bf_projects_fund_transactions')->insert($data);
        return (int) $this->db->insertID();
    }

    public function findFundTransactionByIdempotencyKey(string $idempotencyKey): ?array
    {
        return $this->db->table('bf_projects_fund_transactions')
            ->where('idempotency_key', $idempotencyKey)
            ->get()->getRowArray();
    }

    public function getProjectNAVHistory(int $projectId, int $limit = 30): array
    {
        return $this->db->table('bf_projects_fund_nav_history')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }

    public function recordNAVSnapshot(array $data): int
    {
        $data['created_at'] = $data['created_at'] ?? Time::now()->toDateTimeString();
        $this->db->table('bf_projects_fund_nav_history')->insert($data);
        return (int) $this->db->insertID();
    }

    public function getLatestNAV(int $projectId): ?array
    {
        return $this->db->table('bf_projects_fund_nav_history')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->get()->getRowArray();
    }


    public function getProjectFundTransactions(int $projectId, int $limit = 25): array
    {
        return $this->db->table('bf_projects_fund_transactions')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }

    public function createDistribution(array $data): int
    {
        $now = Time::now()->toDateTimeString();
        $data['created_at'] = $data['created_at'] ?? $now;
        $data['updated_at'] = $data['updated_at'] ?? $now;
        $this->db->table('bf_projects_fund_distributions')->insert($data);
        return (int) $this->db->insertID();
    }

    public function getProjectDistributionsDetailed(int $projectId): array
    {
        return $this->db->table('bf_projects_fund_distributions')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getProjectFundSummary(int $projectId): array
    {
        $project = $this->find($projectId) ?? [];

        $holders = $this->db->table('bf_projects_fund_holders')
            ->select('COUNT(*) as total_holders, COALESCE(SUM(capital_contributed),0) as total_contributed_capital')
            ->where('project_id', $projectId)
            ->get()->getRowArray() ?? [];

        $latestDistribution = $this->db->table('bf_projects_fund_distributions')
            ->select('total_amount, created_at')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->get()->getRowArray();

        return [
            'project' => $project,
            'total_holders' => (int) ($holders['total_holders'] ?? 0),
            'total_units_issued' => (float) ($project['total_units_issued'] ?? 0),
            'total_fund_value' => (float) ($project['total_fund_value'] ?? 0),
            'nav_per_unit' => (float) ($project['nav_per_unit'] ?? 1),
            'total_contributed_capital' => (float) ($holders['total_contributed_capital'] ?? 0),
            'latest_distribution_total' => (float) ($latestDistribution['total_amount'] ?? 0),
            'latest_nav_snapshot' => $this->getLatestNAV($projectId),
        ];
    }

    public function getFundInvestorProfile($projectId, $userId)
    {
        return $this->db->table('bf_mdit_investor_profiles')
            ->where('user_id', $userId)
            ->get()
            ->getRow();
    }

    public function upsertFundInvestorProfile(int $projectId, int $userId, array $data): bool
    {
        if ($this->db->tableExists('bf_mdit_investor_profiles')) {
            $existing = $this->db->table('bf_mdit_investor_profiles')
                ->where('project_id', $projectId)
                ->where('user_id', $userId)
                ->get()->getRowArray();
            $now = Time::now()->toDateTimeString();
            $payload = $data + ['updated_at' => $now];

            if ($existing) {
                return (bool) $this->db->table('bf_mdit_investor_profiles')
                    ->where('id', (int) $existing['id'])
                    ->update($payload);
            }

            $payload['project_id'] = $projectId;
            $payload['user_id'] = $userId;
            $payload['created_at'] = $now;

            return (bool) $this->db->table('bf_mdit_investor_profiles')->insert($payload);
        }

        $existing = $this->getFundInvestorProfile($projectId, $userId);
        $now = Time::now()->toDateTimeString();
        $payload = $data + ['updated_at' => $now];

        if ($existing) {
            return (bool) $this->db->table('bf_projects_fund_investor_profiles')
                ->where('id', (int) $existing['id'])
                ->update($payload);
        }

        $payload['project_id'] = $projectId;
        $payload['user_id'] = $userId;
        $payload['created_at'] = $now;

        return (bool) $this->db->table('bf_projects_fund_investor_profiles')->insert($payload);
    }

    public function isEligibleFundInvestor(int $projectId, int $userId): bool
    {
        $profile = $this->getFundInvestorProfile($projectId, $userId);
        if (! $profile) {
            return false;
        }

        $agreementSigned = (int) ($profile['agreement_signed'] ?? 0);
        if ($this->db->tableExists('bf_mdit_disclosures_acceptance')) {
            $disclosure = $this->db->table('bf_mdit_disclosures_acceptance')
                ->where('project_id', $projectId)
                ->where('user_id', $userId)
                ->orderBy('id', 'DESC')
                ->get()->getRowArray();
            $agreementSigned = (int) (! empty($disclosure));
        }

        return ($profile['kyc_status'] ?? 'pending') === 'approved'
            && ($profile['investor_eligibility'] ?? 'pending') === 'approved'
            && $agreementSigned === 1;
    }

    public function recordCapitalFlow(array $data): int
    {
        $data['created_at'] = $data['created_at'] ?? Time::now()->toDateTimeString();
        $this->db->table('bf_projects_fund_capital_flows')->insert($data);
        return (int) $this->db->insertID();
    }

    public function getFundCapitalFlows(int $projectId, int $limit = 40): array
    {
        return $this->db->table('bf_projects_fund_capital_flows')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }

    public function logFundAuditEvent(int $projectId, ?int $actorUserId, string $actionType, array $context = []): int
    {
        $this->db->table('bf_projects_fund_audit_logs')->insert([
            'project_id' => $projectId,
            'actor_user_id' => $actorUserId,
            'action_type' => $actionType,
            'context_json' => json_encode($context, JSON_UNESCAPED_UNICODE),
            'created_at' => Time::now()->toDateTimeString(),
        ]);

        return (int) $this->db->insertID();
    }

    public function getFundAuditTrail(int $projectId, int $limit = 50): array
    {
        return $this->db->table('bf_projects_fund_audit_logs')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }

    public function getExchangeAssetById(int $assetId): ?array
    {
        return $this->db->table('bf_exchanges_assets')->where('id', $assetId)->get()->getRowArray();
    }

    public function getExchangeAssetBySymbol(string $symbol): ?array
    {
        return $this->db->table('bf_exchanges_assets')->where('symbol', $symbol)->get()->getRowArray();
    }

    public function upsertExchangeAsset(array $assetData): int
    {
        $existing = isset($assetData['symbol']) ? $this->getExchangeAssetBySymbol((string) $assetData['symbol']) : null;
        if ($existing) {
            $this->db->table('bf_exchanges_assets')->where('id', (int) $existing['id'])->update($assetData);
            return (int) $existing['id'];
        }

        $this->db->table('bf_exchanges_assets')->insert($assetData);
        return (int) $this->db->insertID();
    }

    public function getActiveProjectsWithStats(): array
    {
        return $this->db->table('bf_projects p')
            ->select(
                'p.id,
                p.title,
                p.description,
                p.project_type,
                p.nav_per_unit,
                p.total_units_issued,
                p.total_fund_value,
                p.exchange_enabled,
                p.linked_token_id,
                p.ticker,
                COUNT(DISTINCT h.user_id) as total_holders'
            )
            ->join('bf_projects_fund_holders h', 'h.project_id = p.id', 'left')
            ->where('p.status', 'active')
            ->groupBy('p.id')
            ->orderBy('p.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getProjectFullDetails(int $projectId): array
    {
        $project = $this->db->table('bf_projects')
            ->where('id', $projectId)
            ->where('status', 'active')
            ->get()
            ->getRow();

        if (! $project) {
            return [];
        }

        $holders = $this->db->table('bf_projects_fund_holders')
            ->where('project_id', $projectId)
            ->countAllResults();

        $navHistory = $this->db->table('bf_projects_fund_nav_history')
            ->where('project_id', $projectId)
            ->orderBy('created_at', 'DESC')
            ->limit(60)
            ->get()
            ->getResult();

        return [
            'project' => $project,
            'holders' => $holders,
            'navHistory' => $navHistory,
        ];
    }

    public function getProjectByTicker(string $ticker): ?object
    {
        return $this->db->table('bf_projects')
            ->where('ticker', $ticker)
            ->where('status', 'active')
            ->get()
            ->getRow();
    }

}
