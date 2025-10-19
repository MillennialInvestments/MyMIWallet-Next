<?php namespace App\Modules\APIs\Controllers;

use App\Models\{AuctionItemModel, AuctionSettlementModel, AuctionPaymentModel};
use CodeIgniter\RESTful\ResourceController;

class AuctionsController extends ResourceController
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

    public function topUp()
    {
        $payload = $this->request->getPost();
        $result  = model(AuctionPaymentModel::class)->processTopUp($payload);

        if (($result['status'] ?? 'error') === 'error') {
            return $this->fail($result['message'] ?? 'Unable to process top up');
        }

        return $this->respond($result);
    }
}