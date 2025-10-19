<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectTokenAllocationsModel extends Model
{
    protected $table = 'bf_project_token_allocations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'project_id',
        'user_id',
        'token_symbol',
        'tokens',
        'cost_basis',
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
        return $this->where('user_id', $userId);
    }

    public function pending(): self
    {
        return $this->where('tokens', 0);
    }

    public function paid(): self
    {
        return $this->where('tokens >', 0);
    }
}
