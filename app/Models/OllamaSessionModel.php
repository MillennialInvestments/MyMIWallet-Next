<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OllamaSessionModel extends Model
{
    protected $table = 'bf_ollama_sessions';
    protected $primaryKey = 'session_id';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'session_id',
        'title',
        'model',
        'messages_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;
}
