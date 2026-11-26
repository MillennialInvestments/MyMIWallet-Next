<?php

namespace App\Modules\Exchange\Controllers;

use App\Controllers\UserController;
use App\Libraries\Exchange\Providers\PaperExchangeProvider;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Controller for Paper Trading Exchange.
 *
 * Guarantees:
 * - Session IDOR enforcement via active session ($this->resolveCuID()).
 * - Untradable assets protection (MyMI Gold and MyMI Coin blocked).
 * - Real-time non-negative paper balances.
 */
class PaperExchangeController extends UserController
{
    protected ?PaperExchangeProvider $provider = null;

    protected function getProvider(): PaperExchangeProvider
    {
        return $this->provider ??= new PaperExchangeProvider();
    }

    public function index(): string
    {
        $userId = $this->resolveCuID();
        $provider = $this->getProvider();
        $balances = $userId > 0 ? $provider->balances($userId) : [];
        $history = $userId > 0 ? $provider->history($userId, 20) : [];

        $data = [
            'title'    => 'Paper Trading Exchange',
            'view'     => 'App\Modules\Exchange\Views\Paper\index',
            'user'     => $this->currentUser,
            'balances' => $balances,
            'history'  => $history,
        ];

        return view('template/layout', $data);
    }

    public function order(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to place paper exchange orders.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();

        try {
            $result = $this->getProvider()->placeOrder($userId, [
                'symbol'     => (string) ($input['symbol'] ?? ''),
                'side'       => (string) ($input['side'] ?? 'buy'),
                'quantity'   => (float) ($input['quantity'] ?? 0),
                'price'      => isset($input['price']) ? (float) $input['price'] : null,
                'order_type' => (string) ($input['order_type'] ?? 'market'),
            ]);

            $status = ($result['ok'] ?? false) ? 200 : 400;
            return $this->response->setStatusCode($status)->setJSON($result);
        } catch (\InvalidArgumentException $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'ok'      => false,
                'error'   => 'untradable_asset',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function cancel(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to cancel orders.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();
        $orderId = (string) ($input['order_id'] ?? '');

        if ($orderId === '') {
            return $this->response->setStatusCode(400)->setJSON([
                'ok'      => false,
                'error'   => 'missing_order_id',
                'message' => 'Order ID is required.',
            ]);
        }

        $result = $this->getProvider()->cancelOrder($userId, $orderId);
        $status = ($result['ok'] ?? false) ? 200 : 400;

        return $this->response->setStatusCode($status)->setJSON($result);
    }

    public function balances(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to view balances.',
            ]);
        }

        return $this->response->setJSON([
            'ok'       => true,
            'balances' => $this->getProvider()->balances($userId),
        ]);
    }
}
