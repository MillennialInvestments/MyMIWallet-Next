<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsSignalEventModel extends Model
{
    protected $table = 'bf_options_signal_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'event_uuid',
        'position_id',
        'ticker',
        'source',
        'signal_type',
        'timeframe',
        'payload_json',
        'idempotency_hash',
        'processed',
        'created_at',
        'processed_at',
    ];
    protected $useTimestamps = false;

    public function isDuplicate(string $idempotencyHash): bool
    {
        return $this->where('idempotency_hash', $idempotencyHash)->countAllResults() > 0;
    }
}
