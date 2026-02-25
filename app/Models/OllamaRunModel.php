<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OllamaRunModel extends Model
{
    protected $table = 'bf_ollama_runs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'run_uuid',
        'type',
        'model',
        'params_json',
        'prompt_hash',
        'status',
        'started_at',
        'finished_at',
        'latency_ms',
        'token_in',
        'token_out',
        'error',
    ];
}
