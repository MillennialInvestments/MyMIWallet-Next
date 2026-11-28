<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model: ProjectsRealEstateModel
 *
 * Manages real estate syndication property metadata, pro forma parameters,
 * and operational milestones for /Projects co-investments.
 */
class ProjectsRealEstateModel extends Model
{
    protected $table = 'bf_projects_real_estate';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'project_id',
        'property_category',
        'monetization_strategy',
        'property_address',
        'city',
        'state',
        'postal_code',
        'zillow_url',
        'mls_number',
        'purchase_price',
        'renovation_budget',
        'furnishing_budget',
        'closing_costs',
        'total_acquisition_cost',
        'projected_adr',
        'projected_occupancy_pct',
        'projected_monthly_rent',
        'projected_annual_noi',
        'target_coc_return',
        'sponsor_management_fee_pct',
        'operational_stage',
        'airbnb_listing_url',
        'vrbo_listing_url',
        'spv_entity_name',
    ];

    /**
     * Retrieve real estate property details by project ID.
     */
    public function getByProjectId(int $projectId): ?array
    {
        return $this->where('project_id', $projectId)->first();
    }

    /**
     * Upsert property details for a given project ID.
     */
    public function saveOrUpdate(int $projectId, array $data): bool
    {
        $existing = $this->getByProjectId($projectId);
        $data['project_id'] = $projectId;

        if ($existing) {
            return (bool) $this->update($existing['id'], $data);
        }

        return (bool) $this->insert($data);
    }

    /**
     * Update operational stage (e.g. sourcing -> fundraising -> acquisition -> renovation -> active_cashflow -> exited).
     */
    public function updateStage(int $projectId, string $stage): bool
    {
        return (bool) $this->where('project_id', $projectId)->set(['operational_stage' => $stage])->update();
    }

    /**
     * Fetch all active real estate properties with project join.
     */
    public function getActiveRealEstateProjects(int $limit = 50): array
    {
        return $this->db->table($this->table)
            ->select('bf_projects_real_estate.*, bf_projects.name, bf_projects.title, bf_projects.description, bf_projects.target_amount, bf_projects.current_amount, bf_projects.status as project_status, bf_projects.nav_per_unit, bf_projects.total_units_issued')
            ->join('bf_projects', 'bf_projects.id = bf_projects_real_estate.project_id', 'inner')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}
