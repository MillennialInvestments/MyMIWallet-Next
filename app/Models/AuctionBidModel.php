<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class AuctionBidModel extends Model
{
    protected $table      = 'bf_auction_bids';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'lot_id',
        'bidder_id',
        'amount_cents',
        'leading',
    ];

    protected $useTimestamps = false;
    protected $returnType    = 'array';

    public function placeBidAtomic(int $lotId, int $userId, int $amountCents): bool
    {
        if ($amountCents <= 0) {
            return false;
        }

        $db = $this->db;
        $db->transBegin();

        $lotRow = $db->query(
            'SELECT l.*, i.min_increment, i.reserve_cents FROM bf_auction_lots l JOIN bf_auction_items i ON i.id = l.item_id WHERE l.id = ? FOR UPDATE',
            [$lotId]
        )->getRowArray();

        if (! $lotRow || $lotRow['status'] !== 'live') {
            $db->transRollback();
            return false;
        }

        $now = Time::now();
        if ($now->isAfter(Time::parse($lotRow['ends_at']))) {
            $db->transRollback();
            return false;
        }

        $minIncrement = (int) ($lotRow['min_increment'] ?? config('MyMIAuction')->defaultMinIncrementCents);
        if ($minIncrement <= 0) {
            $minIncrement = config('MyMIAuction')->defaultMinIncrementCents;
        }

        $currentRow = $db->query(
            'SELECT id, amount_cents FROM bf_auction_bids WHERE lot_id = ? AND leading = 1 ORDER BY amount_cents DESC LIMIT 1 FOR UPDATE',
            [$lotId]
        )->getRowArray();
        $currentAmount = (int) ($currentRow['amount_cents'] ?? 0);

        $reserve  = (int) ($lotRow['reserve_cents'] ?? 0);
        $required = $currentAmount > 0 ? $currentAmount + $minIncrement : max($minIncrement, $reserve);
        if ($amountCents < $required) {
            $db->transRollback();
            return false;
        }

        $reset = $db->table('bf_auction_bids')
            ->where('lot_id', $lotId)
            ->set('leading', 0)
            ->update();

        $inserted = $db->table('bf_auction_bids')->insert([
            'lot_id'       => $lotId,
            'bidder_id'    => $userId,
            'amount_cents' => $amountCents,
            'leading'      => 1,
        ]);

        if ($reset === false || $inserted === false) {
            $db->transRollback();
            return false;
        }

        $db->table('bf_auction_activity')->insert([
            'user_id' => $userId,
            'lot_id'  => $lotId,
            'action'  => 'place_bid',
            'meta_json' => json_encode([
                'amount_cents' => $amountCents,
            ]),
        ]);

        $lotModel = model(AuctionLotModel::class, false, $db);
        $lotModel->applyAntiSnipeIfNeeded($lotId, $now);

        $db->transCommit();

        return true;
    }

    public function getTopBid(int $lotId): ?array
    {
        return $this->where('lot_id', $lotId)
            ->orderBy('leading', 'DESC')
            ->orderBy('amount_cents', 'DESC')
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function getRecentBids(int $lotId, int $limit = 10): array
    {
        return $this->where('lot_id', $lotId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}