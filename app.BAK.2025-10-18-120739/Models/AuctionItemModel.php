<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class AuctionItemModel extends Model
{
    protected $table      = 'bf_auction_items';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'title',
        'slug',
        'description',
        'category',
        'condition_grade',
        'images_json',
        'fmv_source_json',
        'fmv_amount_cents',
        'reserve_cents',
        'min_increment',
        'status',
    ];

    protected $useTimestamps = true;
    protected $returnType    = 'array';

    public function createFromForm(int $sellerId, array $payload): int
    {
        helper(['text', 'url']);

        $title = trim($payload['title'] ?? '');
        $slug  = trim($payload['slug'] ?? '');

        if ($slug === '' && $title !== '') {
            $slug = url_title($title, '-', true) . '-' . Time::now()->getTimestamp();
        }

        $images = [];
        if (isset($payload['images'])) {
            $images = array_values(array_filter((array) $payload['images']));
        }

        $config = config('MyMIAuction');
        $defaultIncrement = $config ? $config->defaultMinIncrementCents : 100;

        $data = [
            'user_id'         => $sellerId,
            'title'           => $title,
            'slug'            => $slug ?: null,
            'description'     => $payload['description'] ?? null,
            'category'        => $payload['category'] ?? null,
            'condition_grade' => $payload['condition_grade'] ?? 'used-good',
            'images_json'     => ! empty($images) ? json_encode($images) : null,
            'reserve_cents'   => (int) ($payload['reserve_cents'] ?? 0),
            'min_increment'   => (int) ($payload['min_increment'] ?? $defaultIncrement),
            'status'          => 'listed',
        ];

        $this->insert($data);

        return (int) $this->getInsertID();
    }

    public function getWithLotAndFMV(int $itemId): ?array
    {
        $builder = $this->builder()
            ->select('bf_auction_items.*, lots.id as lot_id, lots.starts_at, lots.ends_at, lots.status as lot_status, lots.anti_snipe_sec, lots.extend_threshold_sec, lots.currency')
            ->join('bf_auction_lots lots', 'lots.item_id = bf_auction_items.id', 'left')
            ->where('bf_auction_items.id', $itemId);

        $row = $builder->get()->getRowArray();
        if (! $row) {
            return null;
        }

        $row['images'] = $row['images_json'] ? json_decode($row['images_json'], true) : [];
        $row['fmv_sources'] = $row['fmv_source_json'] ? json_decode($row['fmv_source_json'], true) : [];

        return $row;
    }
}