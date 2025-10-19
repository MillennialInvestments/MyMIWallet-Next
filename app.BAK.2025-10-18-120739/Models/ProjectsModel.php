<?php namespace App\Models;

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
        'exchange_asset_id',
        'auction_id',
        'auction_snapshot',
        'created_at',
        'updated_at',
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
        return $this->orderBy('created_at', 'desc')->findAll();
    }

    public function getUserProjects(int $userId): array
    {
        return $this->byUser($userId)->orderBy('created_at', 'desc')->findAll();
    }

    public function getPendingProjects(): array
    {
        return $this->pending()->orderBy('created_at', 'desc')->findAll();
    }
}
