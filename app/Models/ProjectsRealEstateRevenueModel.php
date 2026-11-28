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
        return $this->where('project_id', $projectId)
            ->orderBy('reporting_period', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    /**
     * Record a new monthly/quarterly revenue reporting period.
     */
    public function recordMonthlyRevenue(array $data): int
    {
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
    }

    /**
     * Mark a revenue record as distributed with timestamp.
     */
    public function markDistributed(int $revenueId): bool
    {
        return (bool) $this->update($revenueId, [
            'status'         => 'distributed',
            'distributed_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Get aggregate distributed returns for a project.
     */
    public function getProjectDistributedTotals(int $projectId): array
    {
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
    }
}
