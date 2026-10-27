<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class APIController extends BaseAPIController
{
    /**
     * API Root overview & documentation descriptor.
     */
    public function index(): ResponseInterface
    {
        $this->response ??= service('response');
        return $this->respond([
            'status'      => 'online',
            'api_version' => 'v1',
            'endpoints'   => [
                'status' => site_url('API/v1/Status'),
                'health' => site_url('API/v1/Health'),
                'ops'    => site_url('API/v1/Ops/status'),
            ],
            'server_time' => date('c'),
        ], 200);
    }

    /**
     * API v1 Status heartbeat endpoint.
     */
    public function status(): ResponseInterface
    {
        $this->response ??= service('response');
        return $this->respond([
            'status'      => 'healthy',
            'subsystem'   => 'api-gateway',
            'version'     => '1.0.0',
            'environment' => ENVIRONMENT,
            'timestamp'   => time(),
        ], 200);
    }

    /**
     * Get Symbols by Trade Type (Stocks, Options, Crypto).
     */
    public function getSymbolsByTradeType(?string $tradeType = null): ResponseInterface
    {
        $this->response ??= service('response');
        $type = strtolower((string) $tradeType);
        $symbols = match ($type) {
            'crypto', 'cryptocurrency' => ['SOL', 'BTC', 'ETH', 'DGB', 'ADA'],
            'option', 'options'        => ['NVDA', 'TSLA', 'AMD', 'SPY', 'QQQ', 'IWM', 'COIN', 'BA'],
            default                    => ['AAPL', 'MSFT', 'GOOGL', 'AMZN', 'NVDA', 'META', 'TSLA', 'SPY'],
        };

        return $this->respond([
            'status'     => 'success',
            'trade_type' => $tradeType ?? 'stock',
            'symbols'    => $symbols,
            'count'      => count($symbols),
        ], 200);
    }
}
