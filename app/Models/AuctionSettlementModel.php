<?php namespace App\Models;

use CodeIgniter\Model;

class AuctionSettlementModel extends Model
{
    protected $table      = 'bf_auction_settlements';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'lot_id',
        'item_id',
        'seller_id',
        'winner_id',
        'winning_cents',
        'fee_bps',
        'fee_cents',
        'payout_cents',
        'escrow_status',
        'status',
        'tx_meta_json',
    ];

    protected $useTimestamps = true;
    protected $returnType    = 'array';

    public function createFromLot(int $lotId): array
    {
        $db = $this->db;
        $db->transBegin();

        $existing = $db->query('SELECT * FROM bf_auction_settlements WHERE lot_id = ? FOR UPDATE', [$lotId])->getRowArray();
        if ($existing) {
            $db->transCommit();
            return $existing;
        }

        $lot = $db->query('SELECT * FROM bf_auction_lots WHERE id = ?', [$lotId])->getRowArray();
        if (! $lot) {
            $db->transRollback();
            throw new \RuntimeException('Lot not found');
        }

        $item = $db->query('SELECT * FROM bf_auction_items WHERE id = ?', [$lot['item_id']])->getRowArray();
        if (! $item) {
            $db->transRollback();
            throw new \RuntimeException('Item not found');
        }

        $topBid = $db->query('SELECT * FROM bf_auction_bids WHERE lot_id = ? ORDER BY amount_cents DESC, id DESC LIMIT 1', [$lotId])->getRowArray();
        $winnerId = $topBid['bidder_id'] ?? null;
        $winning  = (int) ($topBid['amount_cents'] ?? 0);

        $feeBps   = config('MyMIAuction')->platformFeeBps;
        $feeCents = (int) floor($winning * $feeBps / 10000);
        $payout   = max($winning - $feeCents, 0);

        $escrowStatus = 'none';
        $status       = 'pending';

        if ($winnerId && $winning > 0) {
            $balanceModel = model(AuctionBalanceModel::class, false, $db);
            $balanceModel->ensure($winnerId);
            $holdSuccess = $balanceModel->hold($winnerId, $winning);
            $escrowStatus = $holdSuccess ? 'held' : 'none';
            $status       = $holdSuccess ? 'awaiting_payment' : 'pending';
        }

        $data = [
            'lot_id'        => $lotId,
            'item_id'       => $lot['item_id'],
            'seller_id'     => $item['user_id'],
            'winner_id'     => $winnerId,
            'winning_cents' => $winning,
            'fee_bps'       => $feeBps,
            'fee_cents'     => $feeCents,
            'payout_cents'  => $payout,
            'escrow_status' => $escrowStatus,
            'status'        => $status,
        ];

        $this->insert($data);
        $id = (int) $this->getInsertID();
        $row = $this->find($id);

        $db->table('bf_auction_activity')->insert([
            'lot_id'    => $lotId,
            'item_id'   => $lot['item_id'],
            'action'    => 'settlement_create',
            'meta_json' => json_encode([
                'winning_cents' => $winning,
                'winner_id'     => $winnerId,
            ]),
        ]);

        $db->transCommit();

        return $row;
    }

    public function releaseEscrow(int $lotId): array
    {
        $db = $this->db;
        $db->transBegin();

        $settlement = $db->query('SELECT * FROM bf_auction_settlements WHERE lot_id = ? FOR UPDATE', [$lotId])->getRowArray();
        if (! $settlement) {
            $db->transRollback();
            throw new \RuntimeException('Settlement not found');
        }

        if ($settlement['escrow_status'] !== 'held') {
            $db->transRollback();
            return $settlement;
        }

        $winnerId = (int) $settlement['winner_id'];
        $winning  = (int) $settlement['winning_cents'];
        $payout   = (int) $settlement['payout_cents'];
        $sellerId = (int) $settlement['seller_id'];
        $feeCents = (int) $settlement['fee_cents'];

        $balanceModel = model(AuctionBalanceModel::class, false, $db);
        $debited = $balanceModel->debit($winnerId, $winning, true);
        $credited = $balanceModel->credit($sellerId, $payout);

        if (! $debited || ! $credited) {
            $db->transRollback();
            throw new \RuntimeException('Unable to settle escrow');
        }

        $db->table('bf_auction_settlements')
            ->where('lot_id', $lotId)
            ->update([
                'escrow_status' => 'released',
                'status'        => 'settled',
            ]);

        $db->table('bf_auction_activity')->insert([
            'lot_id'    => $lotId,
            'item_id'   => $settlement['item_id'],
            'action'    => 'escrow_released',
            'meta_json' => json_encode([
                'payout_cents' => $payout,
                'fee_cents'    => $feeCents,
            ]),
        ]);

        $db->transCommit();

        return $this->where('lot_id', $lotId)->first();
    }

    public function refundEscrow(int $lotId): array
    {
        $db = $this->db;
        $db->transBegin();

        $settlement = $db->query('SELECT * FROM bf_auction_settlements WHERE lot_id = ? FOR UPDATE', [$lotId])->getRowArray();
        if (! $settlement) {
            $db->transRollback();
            throw new \RuntimeException('Settlement not found');
        }

        if ($settlement['escrow_status'] !== 'held') {
            $db->transRollback();
            return $settlement;
        }

        $winnerId = (int) $settlement['winner_id'];
        $winning  = (int) $settlement['winning_cents'];

        $balanceModel = model(AuctionBalanceModel::class, false, $db);
        $released = $balanceModel->release($winnerId, $winning);

        if (! $released) {
            $db->transRollback();
            throw new \RuntimeException('Unable to refund escrow');
        }

        $db->table('bf_auction_settlements')
            ->where('lot_id', $lotId)
            ->update([
                'escrow_status' => 'refunded',
                'status'        => 'refunded',
            ]);

        $db->table('bf_auction_activity')->insert([
            'lot_id'    => $lotId,
            'item_id'   => $settlement['item_id'],
            'action'    => 'escrow_refunded',
            'meta_json' => json_encode([
                'winning_cents' => $winning,
            ]),
        ]);

        $db->transCommit();

        return $this->where('lot_id', $lotId)->first();
    }
}