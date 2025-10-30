<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
use App\Models\AuctionBidModel;

class AuctionLotModel extends Model
{
    protected $table      = 'bf_auction_lots';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'item_id',
        'starts_at',
        'ends_at',
        'anti_snipe_sec',
        'extend_threshold_sec',
        'currency',
        'status',
    ];

    protected $useTimestamps = true;
    protected $returnType    = 'array';

    public function createForItem(int $itemId, array $payload): int
    {
        $config = config('MyMIAuction');
        $now    = Time::now();

        $startsAt = ! empty($payload['starts_at']) ? Time::parse($payload['starts_at']) : $now;
        $endsAt   = ! empty($payload['ends_at']) ? Time::parse($payload['ends_at']) : $startsAt->addHours(24);

        $status = $startsAt->isAfter($now) ? 'scheduled' : 'live';

        $data = [
            'item_id'              => $itemId,
            'starts_at'            => $startsAt->toDateTimeString(),
            'ends_at'              => $endsAt->toDateTimeString(),
            'anti_snipe_sec'       => (int) ($payload['anti_snipe_sec'] ?? $config->antiSnipeSec),
            'extend_threshold_sec' => (int) ($payload['extend_threshold_sec'] ?? $config->extendThresholdSec),
            'currency'             => 'MYMIGOLD',
            'status'               => $status,
        ];

        $this->insert($data);

        return (int) $this->getInsertID();
    }

    public function getLiveWithFMV(): array
    {
        $builder = $this->baseLotQuery();
        $builder->where('lots.status', 'live');
        $builder->where('lots.starts_at <=', Time::now()->toDateTimeString());
        $builder->orderBy('lots.ends_at', 'ASC');

        $rows = $builder->get()->getResultArray();

        return $this->enrichLots($rows, true);
    }

    public function getScheduledWithFMV(): array
    {
        $builder = $this->baseLotQuery();
        $builder->where('lots.status', 'scheduled');
        $builder->orderBy('lots.starts_at', 'ASC');

        $rows = $builder->get()->getResultArray();

        return $this->enrichLots($rows);
    }

    public function getEndedWithWinners(int $limit): array
    {
        $builder = $this->baseLotQuery();
        $builder->select('settlements.winner_id, settlements.winning_cents');
        $builder->join('bf_auction_settlements settlements', 'settlements.lot_id = lots.id', 'left');
        $builder->where('lots.status', 'ended');
        $builder->orderBy('lots.ends_at', 'DESC');
        $builder->limit($limit);

        $rows = $builder->get()->getResultArray();

        return $this->enrichLots($rows, true);
    }

    public function snapshot(int $lotId): ?array
    {
        $builder = $this->baseLotQuery();
        $builder->where('lots.id', $lotId);
        $lot = $builder->get()->getRowArray();

        if (! $lot) {
            return null;
        }

        $lot['images'] = $lot['images_json'] ? json_decode($lot['images_json'], true) : [];

        $bidModel = model(AuctionBidModel::class);
        $topBid   = $bidModel->getTopBid($lotId);
        $recent   = $bidModel->getRecentBids($lotId, 10);

        $lot['top_bid']     = $topBid;
        $lot['recent_bids'] = $recent;

        return $lot;
    }

    public function applyAntiSnipeIfNeeded(int $lotId, $bidTime): ?array
    {
        $db            = $this->db;
        $ownTransaction = $db->transDepth() === 0;
        if ($ownTransaction) {
            $db->transStart();
        }

        $row = $db->query(
            'SELECT * FROM bf_auction_lots WHERE id = ? FOR UPDATE',
            [$lotId]
        )->getRowArray();

        if (! $row) {
            if ($ownTransaction) {
                $db->transComplete();
            }
            return null;
        }

        $bidTimeObj = $bidTime instanceof Time ? $bidTime : Time::parse($bidTime);
        $endsAt     = Time::parse($row['ends_at']);

        $extendThreshold = (int) ($row['extend_threshold_sec'] ?? config('MyMIAuction')->extendThresholdSec);
        if ($extendThreshold <= 0) {
            $extendThreshold = config('MyMIAuction')->extendThresholdSec;
        }

        $threshold = $endsAt->subSeconds($extendThreshold);

        if ($bidTimeObj->isAfter($threshold) || $bidTimeObj->equals($threshold)) {
            $antiSnipe = (int) ($row['anti_snipe_sec'] ?? config('MyMIAuction')->antiSnipeSec);
            if ($antiSnipe <= 0) {
                $antiSnipe = config('MyMIAuction')->antiSnipeSec;
            }

            $newEnds = $endsAt->addSeconds($antiSnipe);
            $db->table('bf_auction_lots')
                ->where('id', $lotId)
                ->update(['ends_at' => $newEnds->toDateTimeString()]);

            $db->table('bf_auction_activity')->insert([
                'lot_id'    => $lotId,
                'action'    => 'auto_extend',
                'meta_json' => json_encode([
                    'previous_ends_at' => $endsAt->toDateTimeString(),
                    'new_ends_at'      => $newEnds->toDateTimeString(),
                ]),
            ]);

            if ($ownTransaction) {
                $db->transComplete();
            }

            return [
                'previous' => $endsAt->toDateTimeString(),
                'new'      => $newEnds->toDateTimeString(),
            ];
        }

        if ($ownTransaction) {
            $db->transComplete();
        }

        return null;
    }


    private function hydrateImages(array $rows): array
    {
        foreach ($rows as &$row) {
            $row['images'] = ! empty($row['images_json']) ? json_decode($row['images_json'], true) : [];
        }

        return $rows;
    }

    private function enrichLots(array $rows, bool $withTopBid = false): array
    {
        $rows = $this->hydrateImages($rows);

        if ($withTopBid) {
            $bidModel = model(AuctionBidModel::class);
            foreach ($rows as &$row) {
                $row['top_bid'] = $bidModel->getTopBid($row['id']);
            }
        }

        return $rows;
    }

    protected function baseLotQuery(): \CodeIgniter\Database\BaseBuilder
    {
        $builder = $this->builder();
        $builder->from('bf_auction_lots lots');
        $builder->select('lots.*, items.title, items.fmv_amount_cents, items.min_increment, items.reserve_cents, items.slug, items.images_json');
        $builder->join('bf_auction_items items', 'items.id = lots.item_id', 'inner');
        return $builder;
    }
}