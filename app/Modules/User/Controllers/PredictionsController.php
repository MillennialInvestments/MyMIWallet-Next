<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class PredictionsController extends UserController
{
    protected function svc()
    {
        return service('mymipredictions');
    }

    public function index()
    {
        return redirect()->to(site_url('Predictions/Markets'));
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

    public function placeOrder()
    {
        return redirect()->back();
    }

    public function cancelOrder()
    {
        return redirect()->back();
    }
}