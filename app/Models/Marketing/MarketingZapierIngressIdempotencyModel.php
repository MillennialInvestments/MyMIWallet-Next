<?php

declare(strict_types=1);

namespace App\Models\Marketing;

use CodeIgniter\Model;

final class MarketingZapierIngressIdempotencyModel extends Model
{
    protected $table =
        'bf_marketing_zapier_ingress_idempotency';

    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'key_hash',
        'request_hash',
        'status_code',
        'response_json',
        'state',
        'created_at',
        'updated_at',
        'expires_at',
    ];

    public function findByKeyHash(string $keyHash): ?array
    {
        $record = $this
            ->where('key_hash', $keyHash)
            ->first();

        return is_array($record) ? $record : null;
    }
}
