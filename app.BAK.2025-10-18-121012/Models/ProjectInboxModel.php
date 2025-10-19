<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectInboxModel extends Model
{
    protected $table = 'bf_projects_inbox';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'source',
        'source_key',
        'trigger',
        'raw_subject',
        'raw_body',
        'url',
        'payload_json',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function byProject(int $projectId): self
    {
        return $this->where('payload_json LIKE', '"project_id":' . $projectId . '%');
    }

    public function byUser(int $userId): self
    {
        return $this->where('payload_json LIKE', '"user_id":' . $userId . '%');
    }

    public function pending(): self
    {
        return $this->where('status', 'new');
    }

    public function paid(): self
    {
        return $this->where('status', 'promoted');
    }
}
