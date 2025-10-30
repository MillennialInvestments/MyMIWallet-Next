<?php namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Models\{AuctionBidModel, AuctionItemModel, AuctionLotModel};
use CodeIgniter\HTTP\ResponseInterface;

class AuctionsController extends UserController
{
    protected AuctionItemModel $itemModel;
    protected AuctionLotModel $lotModel;
    protected AuctionBidModel $bidModel;
    public function __construct()
    {
        $this->itemModel = new AuctionItemModel();
        $this->lotModel  = new AuctionLotModel();
        $this->bidModel  = new AuctionBidModel();
    }

    public function index(): ResponseInterface
    {
        $data = [
            'liveLots'      => $this->lotModel->getLiveWithFMV(),
            'scheduledLots' => $this->lotModel->getScheduledWithFMV(),
            'endedLots'     => $this->lotModel->getEndedWithWinners(10),
        ];

        return $this->renderTheme('Auctions/index', $data);
    }

    public function item(int $itemId): ResponseInterface
    {
        $item = $this->itemModel->getWithLotAndFMV($itemId);
        if (! $item) {
            return $this->response->setStatusCode(404)->setBody('Auction item not found');
        }

        if (! empty($item['lot_id'])) {
            $snapshot = $this->lotModel->snapshot((int) $item['lot_id']);
            if ($snapshot) {
                $item['top_bid']     = $snapshot['top_bid'] ?? null;
                $item['recent_bids'] = $snapshot['recent_bids'] ?? [];
                $item['ends_at']     = $snapshot['ends_at'] ?? $item['ends_at'] ?? null;
                $item['starts_at']   = $snapshot['starts_at'] ?? $item['starts_at'] ?? null;
            }
        }

        $item['top_bid']     = $item['top_bid'] ?? null;
        $item['recent_bids'] = $item['recent_bids'] ?? [];

        return $this->renderTheme('Auctions/item', ['item' => $item, 'currentUserId' => $this->cuID]);
    }

    public function create(): ResponseInterface
    {
        helper('url');

        $payload = $this->request->getPost();
        $payload['title'] = trim($payload['title'] ?? '');

        if ($payload['title'] === '') {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Title is required']);
        }

        $itemId = $this->itemModel->createFromForm($this->cuID, $payload);

        try {
            service('curlrequest')->post(site_url('/API/Auctions/fmv'), [
                'form_params' => [
                    'title'   => $payload['title'],
                    'item_id' => $itemId,
                ],
                'timeout' => 5,
            ]);
        } catch (\Throwable $e) {
        }

        $lotId = $this->lotModel->createForItem($itemId, $payload);

        return $this->response->setJSON([
            'status'  => 'success',
            'item_id' => $itemId,
            'lot_id'  => $lotId,
        ]);
    }

    public function bid(int $lotId): ResponseInterface
    {
        $amount = (int) $this->request->getPost('amount_cents');
        $success = $this->bidModel->placeBidAtomic($lotId, $this->cuID, $amount);

        if (! $success) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Bid rejected']);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function poll(int $lotId): ResponseInterface
    {
        $state = $this->lotModel->snapshot($lotId);
        if (! $state) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Lot not found']);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'state'  => $state,
        ]);
    }
}