<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

final class MarketingZapierIngressModel extends Model
{
    protected $table            = 'bf_marketing_zapier_ingress';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'source',
        'idempotency_key',
        'request_hash',
        'raw_payload_hash',
        'payload_json',
        'received_at',
        'processed_at',
        'status',
        'notes',
    ];

    public function findBySourceAndKey(
        string $source,
        string $idempotencyKey
    ): ?array {
        $record = $this
            ->where('source', $source)
            ->where('idempotency_key', $idempotencyKey)
            ->first();

        return is_array($record) ? $record : null;
    }
}
