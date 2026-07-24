<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class MarketingMarketSourceModel extends Model
{
    public const DEFAULT_LIMIT = 100;
    public const MAX_LIMIT = 500;

    protected $table = 'bf_marketing_market_sources';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'source_key',
        'source_name',
        'source_url',
        'adapter_class',
        'enabled',
        'configuration_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;

    public function getSources(
        bool $enabledOnly = false,
        int $limit = self::DEFAULT_LIMIT,
        int $offset = 0
    ): array {
        $limit = $this->boundedLimit($limit);
        $offset = max(0, $offset);

        if ($enabledOnly) {
            $this->where('enabled', 1);
        }

        return $this->orderBy('source_key', 'ASC')->findAll($limit, $offset);
    }

    public function getSourceById(int $id): ?array
    {
        $row = $this->find($id);

        return is_array($row) ? $row : null;
    }

    public function getSourceByKey(string $sourceKey): ?array
    {
        $row = $this->where('source_key', trim($sourceKey))->first();

        return is_array($row) ? $row : null;
    }

    public function addSource(array $data): int|string|false
    {
        return $this->insert($data, true);
    }

    public function updateSource(int|string $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteSource(int|string $id): bool
    {
        return $this->delete($id);
    }

    private function boundedLimit(int $limit): int
    {
        return max(1, min($limit, self::MAX_LIMIT));
    }
}
