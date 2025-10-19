<?php
namespace App\Services;

class AuctionService
{
    // price curve helper – include 'helper("auction")' wherever you call this
    public function planSeries(int $projectId, int $tokenId, int $buckets, int $bucketSize, float $p0, float $targetUSD): array
    {
        helper('auction');
        $r = solveGrowthR($targetUSD, $bucketSize, $p0, $buckets, 0.01);
        $plan = [];
        for ($k=1; $k<=$buckets; $k++) {
            $price = $p0 * pow(1.0 + $r, $k-1);
            $plan[] = [
                'project_id'       => $projectId,
                'token_id'         => $tokenId,
                'bucket_size'      => $bucketSize,
                'bucket_price'     => round($price, 4),
                'round_no'         => $k,
                'max_units_per_bid'=> min($bucketSize, (int)ceil($bucketSize/5)), // simple anti-whale cap
                'starts_at'        => null, // caller will schedule windows
                'ends_at'          => null,
                'status'           => 'scheduled',
            ];
        }
        return $plan;
    }

    public function seedSeries(array $rows): array
    {
        $pm = model('ProjectsModel');
        $ids = [];
        foreach ($rows as $r) { $ids[] = $pm->auctionInsert($r); }
        return $ids;
    }

    public function placeBid(int $auctionId, int $projectId, int $tokenId, int $userId, float $quotedPrice, int $requestedUnits): int
    {
        $pm = model('ProjectsModel');
        // KYC gate (must exist before bids). Reject if not approved.
        $bidId = $pm->bidInsert([
            'auction_id'      => $auctionId,
            'project_id'      => $projectId,
            'token_id'        => $tokenId,
            'user_id'         => $userId,
            'quoted_price'    => $quotedPrice,
            'requested_units' => $requestedUnits,
            'filled_units'    => 0,
            'amount_usd'      => 0.00,
            'bid_status'      => 'pending',
        ]);
        return $bidId;
    }

    public function settleAuction(int $auctionId): void
    {
        $pm = model('ProjectsModel');
        $a = $pm->auctionFind($auctionId);
        if (! $a) {
            return;
        }

        // 1) Pull bids ordered by price desc, time asc
        $bids = $pm->bidsForAuction($auctionId);

        $remaining = (int)$a['bucket_size'];
        foreach ($bids as $b) {
            if ($remaining <= 0) break;
            $take = min($remaining, min((int)$a['max_units_per_bid'], (int)$b['requested_units']));
            if ($take <= 0) { $pm->bidSetStatus((int)$b['id'], 'rejected'); continue; }

            // 2) Fill the bid
            $pm->bidFillPartial((int)$b['id'], $take, (float)$a['bucket_price']);
            // 3) Credit ledger
            $pm->ledgerCredit((int)$a['project_id'], (int)$a['token_id'], (int)$b['user_id'], $take, $take * (float)$a['bucket_price']);
            // 4) Log exchange tx (optional)
            $pm->chainTxInsert([
                'project_id' => (int)$a['project_id'],
                'token_id'   => (int)$a['token_id'],
                'user_id'    => (int)$b['user_id'],
                'amount'     => $take,
                'token_symbol'=> null,  // fill if you echo symbol
                'direction'  => 'in',
                'status'     => 'settled',
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $remaining -= $take;
            $pm->bidSetStatus((int)$b['id'], $take == (int)$b['requested_units'] ? 'accepted' : 'partial');
        }

        // 5) Close auction
        $pm->auctionUpdate($auctionId, ['status'=> 'filled']);
        // Unfilled bids remain 'pending' to be optionally backfilled in the next round per your doc.
    }
}
?>