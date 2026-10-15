<?php

declare(strict_types=1);

namespace App\Models\AIOps;

use CodeIgniter\Model;

class AIOpsRepositoryModel extends Model
{
    protected $table = 'bf_aiops_repositories';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['repo_key', 'display_name', 'company_key', 'domain', 'local_path', 'git_remote', 'github_owner', 'github_repo', 'default_branch', 'ci4_detected', 'php_version', 'access_mode', 'agent_base_url', 'agent_status', 'last_seen_at', 'last_scan_at', 'last_health_status', 'is_active', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    public function findByRepoKey(string $repoKey): ?array
    {
        $row = $this->where('repo_key', $repoKey)->first();
        return is_array($row) ? $row : null;
    }

    public function upsertByRepoKey(array $data): int
    {
        $data['updated_at'] = $data['updated_at'] ?? date('Y-m-d H:i:s');
        $existing = $this->findByRepoKey((string) ($data['repo_key'] ?? ''));
        if ($existing !== null) {
            $this->update((int) $existing['id'], $data);
            return (int) $existing['id'];
        }
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        return (int) $this->insert($data, true);
    }

    public function active(): self
    {
        return $this->where('is_active', 1);
    }

    public function byAccessMode(string $mode): self
    {
        return $this->where('access_mode', $mode);
    }
}
