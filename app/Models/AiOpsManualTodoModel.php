<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsManualTodoModel extends Model
{
    protected $table = 'bf_aiops_manual_todos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'content',
        'status',
        'source',
        'created_at',
        'updated_at',
        'completed_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function upsertTodo(string $content, string $status, string $source = 'docs_next_steps'): void
    {
        $content = trim($content);
        if ($content === '') {
            return;
        }

        $existing = $this->where('content', $content)->where('source', $source)->first();
        $payload = [
            'content' => $content,
            'status' => $status,
            'source' => $source,
            'updated_at' => date('Y-m-d H:i:s'),
            'completed_at' => $status === 'done' ? date('Y-m-d H:i:s') : null,
        ];

        if ($existing) {
            $this->update($existing['id'], $payload);
            return;
        }

        $payload['created_at'] = date('Y-m-d H:i:s');
        $this->insert($payload);
    }
}
