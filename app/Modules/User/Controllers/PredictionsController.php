<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use CodeIgniter\Exceptions\PageNotFoundException;

class PredictionsController extends BaseUserController
{
    protected function svc()
    {
        return service('mymipredictions');
    }

    public function index()
    {
        return redirect()->to(site_url('My-Predictions'));
    }

    public function markets()
    {
        $request = service('request');
        $filters = [
            'state'    => $request->getGet('state'),
            'search'   => $request->getGet('q') ?? $request->getGet('search'),
            'category' => $request->getGet('category'),
            'mode'     => $request->getGet('mode'),
        ];

        $queryFilters = array_filter($filters, static fn ($value) => $value !== null && $value !== '');

        $data = [
            'markets'      => $this->svc()->listMarkets($queryFilters),
            'filters'      => [
                'state'    => (string) ($filters['state'] ?? ''),
                'search'   => (string) ($filters['search'] ?? ''),
                'category' => (string) ($filters['category'] ?? ''),
                'mode'     => (string) ($filters['mode'] ?? ''),
            ],
            'stateOptions' => $this->svc()->allowedStates(true),
            'modeOptions'  => $this->svc()->allowedModes(),
        ];

        return $this->renderTheme('Predictions/markets', $data);
    }

    public function view($id)
    {
        try {
            $data = ['market' => $this->svc()->getMarket((int) $id)];
        } catch (\Throwable $e) {
            throw PageNotFoundException::forPageNotFound($e->getMessage());
        }

        return $this->renderTheme('Predictions/view', $data);
    }

    public function portfolio()
    {
        return $this->renderTheme('Predictions/portfolio', []);
    }

    public function settlements()
    {
        return $this->renderTheme('Predictions/settlements', []);
    }

    protected function currentUserId(): int
    {
        $userId = $this->resolveCurrentUserId();
        if (! $userId) {
            $auth = function_exists('auth') ? auth()->id() : null;
            $userId = $auth ?: (service('authentication')->id() ?? session()->get('user_id'));
        }
        return (int) ($userId ?? 0);
    }

    public function placeOrder()
    {
        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $post = (array) ($this->request->getJSON(true) ?: $this->request->getPost());
        if (empty($post['market_id']) || empty($post['option_id']) || empty($post['stake_amount'])) {
            return redirect()->back()->with('error', 'Market, option, and stake amount are required.');
        }

        try {
            $result = $this->svc()->placeOrder($post, $userId);
            if ($this->request->isAJAX() || ($this->request->hasHeader('Accept') && str_contains((string) $this->request->getHeaderLine('Accept'), 'application/json'))) {
                return $this->response->setJSON(['status' => 'success', 'data' => $result]);
            }
            return redirect()->back()->with('message', 'Order placed successfully.');
        } catch (\Throwable $e) {
            if ($this->request->isAJAX() || ($this->request->hasHeader('Accept') && str_contains((string) $this->request->getHeaderLine('Accept'), 'application/json'))) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cancelOrder()
    {
        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return redirect()->to(site_url('login'));
        }

        $post = (array) ($this->request->getJSON(true) ?: $this->request->getPost());
        $orderId = (int) ($post['order_id'] ?? 0);
        if ($orderId <= 0) {
            if ($this->request->isAJAX() || ($this->request->hasHeader('Accept') && str_contains((string) $this->request->getHeaderLine('Accept'), 'application/json'))) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Valid order_id required.']);
            }
            return redirect()->back()->with('error', 'Valid order_id required.');
        }

        try {
            $ok = $this->svc()->cancelOrder($orderId, $userId);
            if ($this->request->isAJAX() || ($this->request->hasHeader('Accept') && str_contains((string) $this->request->getHeaderLine('Accept'), 'application/json'))) {
                return $this->response->setJSON(['status' => $ok ? 'success' : 'error', 'canceled' => $ok]);
            }
            return redirect()->back()->with($ok ? 'message' : 'error', $ok ? 'Order canceled.' : 'Order could not be canceled.');
        } catch (\Throwable $e) {
            if ($this->request->isAJAX() || ($this->request->hasHeader('Accept') && str_contains((string) $this->request->getHeaderLine('Accept'), 'application/json'))) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}