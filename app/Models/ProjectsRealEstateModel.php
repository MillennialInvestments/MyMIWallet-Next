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
        if (! $this->db->tableExists($this->table)) {
            return null;
        }

        try {
            return $this->where('project_id', $projectId)->first();
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateModel::getByProjectId error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Upsert property details for a given project ID.
     */
    public function saveOrUpdate(int $projectId, array $data): bool
    {
        if (! $this->db->tableExists($this->table)) {
            return false;
        }

        try {
            $existing = $this->getByProjectId($projectId);
            $data['project_id'] = $projectId;

            if ($existing) {
                return (bool) $this->update($existing['id'], $data);
            }

            return (bool) $this->insert($data);
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateModel::saveOrUpdate error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Update operational stage (e.g. sourcing -> fundraising -> acquisition -> renovation -> active_cashflow -> exited).
     */
    public function updateStage(int $projectId, string $stage): bool
    {
        if (! $this->db->tableExists($this->table)) {
            return false;
        }

        try {
            return (bool) $this->where('project_id', $projectId)->set(['operational_stage' => $stage])->update();
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateModel::updateStage error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Fetch all active real estate properties with project join.
     */
    public function getActiveRealEstateProjects(int $limit = 50): array
    {
        if (! $this->db->tableExists($this->table)) {
            return [];
        }

        try {
            if (! $this->db->tableExists('bf_projects')) {
                return $this->db->table($this->table)->limit($limit)->get()->getResultArray();
            }

            $fields = $this->db->getFieldNames('bf_projects');
            $hasName = in_array('name', $fields, true);
            $hasTitle = in_array('title', $fields, true);
            $hasDesc = in_array('description', $fields, true);
            $hasTargetRaise = in_array('target_raise', $fields, true);
            $hasTargetAmount = in_array('target_amount', $fields, true);
            $hasCurrentAmount = in_array('current_amount', $fields, true);
            $hasStatus = in_array('status', $fields, true);
            $hasNav = in_array('nav_per_unit', $fields, true);
            $hasUnits = in_array('total_units_issued', $fields, true);

            $selects = ["{$this->table}.*"];
            $selects[] = $hasName ? 'bf_projects.name' : ($hasTitle ? 'bf_projects.title as name' : "'' as name");
            $selects[] = $hasTitle ? 'bf_projects.title' : ($hasName ? 'bf_projects.name as title' : "'' as title");
            if ($hasDesc) {
                $selects[] = 'bf_projects.description';
            }
            $selects[] = $hasTargetAmount ? 'bf_projects.target_amount' : ($hasTargetRaise ? 'bf_projects.target_raise as target_amount' : '0.00 as target_amount');
            if ($hasCurrentAmount) {
                $selects[] = 'bf_projects.current_amount';
            }
            if ($hasStatus) {
                $selects[] = 'bf_projects.status as project_status';
            }
            if ($hasNav) {
                $selects[] = 'bf_projects.nav_per_unit';
            }
            if ($hasUnits) {
                $selects[] = 'bf_projects.total_units_issued';
            }

            return $this->db->table($this->table)
                ->select(implode(', ', $selects))
                ->join('bf_projects', "bf_projects.id = {$this->table}.project_id", 'left')
                ->limit($limit)
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'ProjectsRealEstateModel::getActiveRealEstateProjects error: ' . $e->getMessage());
            try {
                return $this->db->table($this->table)->limit($limit)->get()->getResultArray();
            } catch (\Throwable) {
                return [];
            }
        }
    }
}
