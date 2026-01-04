<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiUsageModel extends Model
{
    protected $table          = 'bf_ai_usage';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'subsystem',
        'action',
        'user_id',
        'tokens_prompt',
        'tokens_completion',
        'cost_usd',
        'meta_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function logUsage(array $payload): int
    {
        return $this->insert([
            'subsystem'         => $payload['subsystem'] ?? 'default',
            'action'            => $payload['action'] ?? null,
            'user_id'           => $payload['user_id'] ?? null,
            'tokens_prompt'     => (int) ($payload['tokens_prompt'] ?? 0),
            'tokens_completion' => (int) ($payload['tokens_completion'] ?? 0),
            'cost_usd'          => (float) ($payload['cost_usd'] ?? 0),
            'meta_json'         => isset($payload['meta']) ? json_encode($payload['meta'], JSON_UNESCAPED_SLASHES) : null,
        ], true);
    }
}
