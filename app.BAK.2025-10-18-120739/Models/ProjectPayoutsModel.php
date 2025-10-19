<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectPayoutsModel extends Model
{
    protected $table = 'bf_project_payouts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'distribution_id',
        'project_id',
        'user_id',
        'token_symbol',
        'share_ratio',
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
        return $this->where('status', 'pending');
    }

    public function paid(): self
    {
        return $this->where('status', 'paid');
    }
}
