<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Models\{AuctionItemModel, AuctionSettlementModel, AuctionPaymentModel};

class AuctionsAPIController extends BaseAPIController
{
    protected $format = 'json';

    public function computeFMV()
    {
        $title  = trim($this->request->getPost('title') ?? '');
        $itemId = (int) ($this->request->getPost('item_id') ?? 0);

        if ($itemId <= 0 || $title === '') {
            return $this->failValidationErrors('Title and item_id are required');
        }

        $fmv = service('fmv')->estimate($title);

        model(AuctionItemModel::class)->update($itemId, [
            'fmv_amount_cents' => $fmv['amount_cents'],
            'fmv_source_json'  => json_encode($fmv['sources']),
        ]);

        return $this->respond(['status' => 'success', 'fmv' => $fmv]);
    }

    public function settle($lotId)
    {
        $lotId = (int) $lotId;
        if ($lotId <= 0) {
            return $this->failValidationErrors('lot_id required');
        }

        $result = model(AuctionSettlementModel::class)->createFromLot($lotId);
        return $this->respond($result);
    }

    public function releaseEscrow($lotId)
    {
        $lotId = (int) $lotId;
        if ($lotId <= 0) {
            return $this->failValidationErrors('lot_id required');
        }

        $result = model(AuctionSettlementModel::class)->releaseEscrow($lotId);
        return $this->respond($result);
    }

    public function refundEscrow($lotId)
    {
        $lotId = (int) $lotId;
        if ($lotId <= 0) {
            return $this->failValidationErrors('lot_id required');
        }

        $result = model(AuctionSettlementModel::class)->refundEscrow($lotId);
        return $this->respond($result);
    }

    /**
     * Auction top-ups stay closed until they are backed by a verified payment
     * (crypto checkout). The old handler credited any amount for any user_id
     * sent in the form and debited nothing, so it is refused here.
     */
    public function topUp()
    {
        log_message('warning', 'Refused auction top-up: no verified payment path yet (user {user}).', [
            'user' => (int) (session('cuID') ?? 0),
        ]);

        return $this->respond([
            'status'  => 'error',
            'message' => 'Auction top-ups open soon with crypto checkout.',
            'reason'  => 'verified_payment_required',
        ], 503);
    }
}