<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model: ProjectsRealEstateRevenueModel
 *
 * Tracks audited revenue reporting periods, deductions (cleaning, taxes, reserves, fees),
 * and net distributable profits for pro-rata crypto distribution.
 */
class ProjectsRealEstateRevenueModel extends Model
{
    protected $table = 'bf_projects_real_estate_revenues';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'project_id',
        'reporting_period',
        'revenue_source',
        'gross_revenue',
        'platform_fees',
        'cleaning_fees',
        'utilities',
        'property_taxes',
        'insurance',
        'maintenance_reserves',
        'sponsor_fee',
        'net_distributable',
        'proof_attachment_url',
        'reported_by',
        'status',
        'distributed_at',
        'notes',
    ];

    /**
     * Get all recorded revenue periods for a given project.
     */
    public function getRevenuesByProject(int $projectId, int $limit = 50): array
    {
        if (! $this->db->tableExists($this->table)) {
            return [];
        }

        try {
            return $this->where('project_id', $projectId)
                ->orderBy('reporting_period', 'DESC')
                ->findAll($limit);
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateRevenueModel::getRevenuesByProject error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Record a new monthly/quarterly revenue reporting period.
     */
    public function recordMonthlyRevenue(array $data): int
    {
        if (! $this->db->tableExists($this->table)) {
            return 0;
        }

        try {
            // Compute net distributable if not explicitly set
            if (! isset($data['net_distributable'])) {
                $gross = (float) ($data['gross_revenue'] ?? 0.0);
                $deductions = (float) ($data['platform_fees'] ?? 0.0)
                    + (float) ($data['cleaning_fees'] ?? 0.0)
                    + (float) ($data['utilities'] ?? 0.0)
                    + (float) ($data['property_taxes'] ?? 0.0)
                    + (float) ($data['insurance'] ?? 0.0)
                    + (float) ($data['maintenance_reserves'] ?? 0.0)
                    + (float) ($data['sponsor_fee'] ?? 0.0);
                $data['net_distributable'] = max(0.0, round($gross - $deductions, 2));
            }

            $this->insert($data);
            return (int) $this->getInsertID();
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateRevenueModel::recordMonthlyRevenue error: ' . $e->getMessage());
            return 0;
        }
    }

    /**
     * Mark a revenue record as distributed with timestamp.
     */
    public function markDistributed(int $revenueId): bool
    {
        if (! $this->db->tableExists($this->table)) {
            return false;
        }

        try {
            return (bool) $this->update($revenueId, [
                'status'         => 'distributed',
                'distributed_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateRevenueModel::markDistributed error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get aggregate distributed returns for a project.
     */
    public function getProjectDistributedTotals(int $projectId): array
    {
        if (! $this->db->tableExists($this->table)) {
            return [
                'total_gross'       => 0.0,
                'total_distributed' => 0.0,
                'periods_count'     => 0,
            ];
        }

        try {
            $row = $this->db->table($this->table)
                ->select('SUM(gross_revenue) as total_gross, SUM(net_distributable) as total_distributed, COUNT(id) as periods_count')
                ->where('project_id', $projectId)
                ->where('status', 'distributed')
                ->get()
                ->getRowArray();

            return [
                'total_gross'       => (float) ($row['total_gross'] ?? 0.0),
                'total_distributed' => (float) ($row['total_distributed'] ?? 0.0),
                'periods_count'     => (int) ($row['periods_count'] ?? 0),
            ];
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateRevenueModel::getProjectDistributedTotals error: ' . $e->getMessage());
            return [
                'total_gross'       => 0.0,
                'total_distributed' => 0.0,
                'periods_count'     => 0,
            ];
        }
    }
}
