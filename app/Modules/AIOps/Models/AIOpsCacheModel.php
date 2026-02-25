<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsCacheModel extends ObservedModel
{
    protected $table         = 'bf_aiops_cache';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'cache_key',
        'scope',
        'source_hash',
        'payload_json',
        'expires_at',
        'created_at',
    ];

    public function findValidCache(string $cacheKey): ?array
    {
        $now = date('Y-m-d H:i:s');

        return $this->where('cache_key', $cacheKey)
            ->groupStart()
                ->where('expires_at >=', $now)
                ->orWhere('expires_at', null)
            ->groupEnd()
            ->first();
    }
}
