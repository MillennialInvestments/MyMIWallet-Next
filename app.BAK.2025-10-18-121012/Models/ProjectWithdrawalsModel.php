<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectWithdrawalsModel extends Model
{
    protected $table = 'bf_project_withdrawals';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'project_id',
        'user_id',
        'requested_at',
        'eligible_amount',
        'fee_percent',
        'fee_amount',
        'net_amount',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

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
        return $this->where('status', 'requested');
    }

    public function paid(): self
    {
        return $this->where('status', 'paid');
    }
}
