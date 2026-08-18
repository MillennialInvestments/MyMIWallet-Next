<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class MarketingMarketFeedItemModel extends Model
{
    public const DEFAULT_LIMIT = 100;
    public const MAX_LIMIT = 500;

    protected $table = 'bf_marketing_market_feed_items';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'identity_sha256',
        'source_key',
        'external_item_id',
        'title',
        'summary',
        'canonical_url',
        'published_at',
        'collected_at',
        'relevance_score',
        'sentiment_score',
        'sentiment_label',
        'payload_sha256',
        'normalized_metadata_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getFeedItems(
        int $limit = self::DEFAULT_LIMIT,
        int $offset = 0
    ): array {
        $limit = $this->boundedLimit($limit);
        $offset = max(0, $offset);

        return $this->orderBy('published_at', 'DESC')->findAll($limit, $offset);
    }

    public function getItemById(int $id): ?array
    {
        $row = $this->find($id);

        return is_array($row) ? $row : null;
    }

    public function getItemByIdentitySha256(string $identitySha256): ?array
    {
        $row = $this->where('identity_sha256', strtolower(trim($identitySha256)))->first();

        return is_array($row) ? $row : null;
    }

    public function addItem(array $data): int|string|false
    {
        return $this->insert($data, true);
    }

    public function updateItem(int|string $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteItem(int|string $id): bool
    {
        return $this->delete($id);
    }

    private function boundedLimit(int $limit): int
    {
        return max(1, min($limit, self::MAX_LIMIT));
    }
}
