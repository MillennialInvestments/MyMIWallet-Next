<?php declare(strict_types=1);

namespace App\Modules\Predictions\Controllers\API;

use App\Controllers\UserController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class PredictionsApiController extends UserController
{
    use ResponseTrait;

    protected ?int $cuID = null;
    protected array $data = [];
    protected array $helpers = ['url', 'form', 'security'];

    public function __construct()
    {
        parent::__construct();
    }

    public function latest(): ResponseInterface
    {
        $payload = [
            'status' => 'success',
            'data'   => [
                'predictions' => [],
                'generatedAt' => date(DATE_ATOM),
            ],
        ];

        return $this->respond($payload);
    }

    protected function svc()
    {
        return service('mymipredictions');
    }

    protected function uid(): int
    {
        return (int) (service('auth')->id() ?? 0);
    }

    public function listMarkets()
    {
        $filters = [
            'state'    => $this->request->getGet('state'),
            'category' => $this->request->getGet('category'),
            'search'   => $this->request->getGet('search') ?? $this->request->getGet('q'),
            'limit'    => $this->request->getGet('limit'),
            'mode'     => $this->request->getGet('mode'),
        ];

        $filters = array_filter($filters, static fn ($value) => $value !== null && $value !== '');

        return $this->respond([
            'status'  => 'success',
            'data'    => $this->svc()->listMarkets($filters),
            'filters' => $filters,
        ]);
    }

    public function createMarket()
    {
        $payload = $this->request->getJSON(true) ?? [];

        try {
            $id = $this->svc()->createMarket($payload, $this->uid());
            return $this->respondCreated(['status' => 'success', 'market_id' => $id]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions createMarket failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function placeOrder()
    {
        $payload = $this->request->getJSON(true) ?? [];
        try {
            $out = $this->svc()->placeOrder($payload, $this->uid());
            return $this->respond(['status' => 'success', 'data' => $out]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions placeOrder failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function cancelOrder()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }

    public function settle($marketId)
    {
        $payload = $this->request->getJSON(true) ?? [];

        try {
            $out = $this->svc()->settleMarket(
                (int) $marketId,
                $this->uid(),
                (int) ($payload['winning_option_id'] ?? 0),
                $payload['note'] ?? ''
            );

            return $this->respond(['status' => 'success', 'data' => $out]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions settle failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function addLiquidity()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }

    public function removeLiquidity()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }
}