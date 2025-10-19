<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectCommitmentsModel extends Model
{
    protected $table = 'bf_project_commitments';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'project_id',
        'user_id',
        'amount',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function byProject(int $projectId): self
    {
        return $this->where('project_id', $projectId);
    }

    public function byUser(int $userId): self
    {
        return $this->where('user_id', $userId);
    }

    public function pending(): self
    {
        return $this->where('status', 'proposed');
    }

    public function paid(): self
    {
        return $this->where('status', 'converted');
    }
}
