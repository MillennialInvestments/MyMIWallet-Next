<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class MarketingMarketFeedRunModel extends Model
{
    protected $table = 'bf_marketing_market_feed_runs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'run_uuid',
        'source_key',
        'execution_mode',
        'status',
        'started_at',
        'finished_at',
        'inserted',
        'updated',
        'unchanged',
        'skipped',
        'errors',
        'rolled_back',
        'code_sha',
        'config_sha256',
        'provenance_json',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function addRun(array $data): int|string|false
    {
        return $this->insert($data, true);
    }

    public function updateRun(
        int|string $id,
        array $data
    ): bool {
        return $this->update($id, $data);
    }

    public function getRunByUuid(string $runUuid): ?array
    {
        $row = $this->where(
            'run_uuid',
            strtolower(trim($runUuid))
        )->first();

        return is_array($row) ? $row : null;
    }
}
