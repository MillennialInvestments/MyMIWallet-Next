<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AuthHealthRunModel extends Model
{
    protected $table            = 'bf_auth_health_runs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;
    protected $allowedFields    = [
        'run_at',
        'status',
        'score',
        'summary',
        'details_json',
        'duration_ms',
        'server',
        'build_tag',
    ];

    public function getLatestRun(): ?array
    {
        $row = $this->orderBy('run_at', 'DESC')->first();
        return $row ?: null;
    }

    public function getRecentRuns(int $limit = 30): array
    {
        return $this->orderBy('run_at', 'DESC')->findAll($limit);
    }
}
