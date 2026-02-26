<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsDedupeModel extends ObservedModel
{
    protected $table         = 'bf_aiops_dedupe';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'source_type',
        'source_id',
        'content_hash',
        'first_seen_at',
        'last_seen_at',
        'seen_count',
    ];

    public function findByHash(string $hash): ?array
    {
        return $this->where('content_hash', $hash)->first();
    }
}
