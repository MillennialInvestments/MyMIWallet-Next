<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectDistributionsModel extends Model
{
    protected $table = 'bf_project_distributions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'project_id',
        'period_start',
        'period_end',
        'gross_revenue',
        'net_distributable',
        'notes',
        'created_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'created_at';

    public function byProject(int $projectId): self
    {
        return $this->where('project_id', $projectId);
    }

    public function byUser(int $userId): self
    {
        return $this; // Not user-specific but keep signature for consistency.
    }

    public function pending(): self
    {
        return $this->where('net_distributable >', 0);
    }

    public function paid(): self
    {
        return $this; // distributions do not have paid flag; placeholder.
    }
}
