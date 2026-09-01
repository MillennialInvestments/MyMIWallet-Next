<?php

declare(strict_types=1);

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Services\PublicMarketChartService;
use CodeIgniter\API\ResponseTrait;
use Throwable;

class PublicMarketController extends BaseController
{
    use ResponseTrait;

    private PublicMarketChartService $service;

    public function __construct()
    {
        $this->service = new PublicMarketChartService();
    }

    public function stock(string $symbol)
    {
        try {
            $result = $this->service->getStockChart($symbol);
            return $this->respond($result, 200);
        } catch (Throwable $exception) {
            log_message('error', 'PublicMarketController::stock exception symbol={symbol} error={error}', [
                'symbol' => $symbol,
                'error' => $exception->getMessage(),
            ]);

            return $this->respond([
                'status' => 'error',
                'type' => 'stock',
                'symbol' => strtoupper((string) preg_replace('/[^A-Za-z0-9\.\-]/', '', $symbol)),
                'message' => 'Unable to load chart data right now. Please try again shortly.',
                'series' => [],
            ], 200);
        }
    }

    public function crypto(string $symbol)
    {
        try {
            $result = $this->service->getCryptoChart($symbol);
            return $this->respond($result, 200);
        } catch (Throwable $exception) {
            log_message('error', 'PublicMarketController::crypto exception symbol={symbol} error={error}', [
                'symbol' => $symbol,
                'error' => $exception->getMessage(),
            ]);

            return $this->respond([
                'status' => 'error',
                'type' => 'crypto',
                'symbol' => strtolower((string) preg_replace('/[^a-z0-9\-]/', '', strtolower($symbol))),
                'message' => 'Unable to load chart data right now. Please try again shortly.',
                'series' => [],
            ], 200);
        }
    }

    public function etf(string $symbol)
    {
        try {
            $result = $this->service->getEtfChart($symbol);
            return $this->respond($result, 200);
        } catch (Throwable $exception) {
            log_message('error', 'PublicMarketController::etf exception symbol={symbol} error={error}', [
                'symbol' => $symbol,
                'error' => $exception->getMessage(),
            ]);

            return $this->respond([
                'status' => 'error',
                'type' => 'etf',
                'symbol' => strtoupper((string) preg_replace('/[^A-Za-z0-9\.\-]/', '', $symbol)),
                'message' => 'Unable to load chart data right now. Please try again shortly.',
                'series' => [],
            ], 200);
        }
    }
}
