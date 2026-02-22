<?php

declare(strict_types=1);

namespace App\Services\Scanning;

use App\Modules\APIs\Models\ScannerModel;
use App\Services\Scanning\Providers\ProviderRouter;

class ScannerService
{
    public function __construct(
        private readonly ScannerModel $model,
        private readonly ProviderRouter $router,
        private readonly SignalEngine $engine,
    ) {
    }

    public function status(): array
    {
        return [
            'providers' => $this->router->health(),
            'queue_depth' => (int) $this->model->where('status', 'queued')->countAllResults(),
        ];
    }

    public function run(array $input): array
    {
        $timeframe = (string) ($input['timeframe'] ?? '1day');
        $params = is_array($input['params'] ?? null) ? $input['params'] : [];
        $source = (string) ($input['symbol_source'] ?? $input['source'] ?? 'universe');
        $symbols = is_array($input['symbols'] ?? null) ? $input['symbols'] : [];
        $limit = (int) ($input['limit'] ?? 200);
        $userId = isset($input['user_id']) ? (int) $input['user_id'] : null;

        if ($symbols === []) {
            $symbols = $this->model->symbolsFromSource($source, $userId, $limit);
        }
        $symbols = array_slice(array_values(array_unique(array_map('strtoupper', $symbols))), 0, $limit);

        $jobId = $this->model->createJob([
            'job_uuid' => bin2hex(random_bytes(16)),
            'created_on' => date('Y-m-d H:i:s'),
            'started_on' => date('Y-m-d H:i:s'),
            'status' => 'running',
            'provider_used' => 'mixed',
            'timeframe' => $timeframe,
            'symbol_source' => $source,
            'symbol_count' => count($symbols),
            'params_json' => json_encode($params, JSON_UNESCAPED_SLASHES),
        ]);

        log_message('info', 'SCANNER: job {job} started with {count} symbols', ['job' => $jobId, 'count' => count($symbols)]);

        $rows = [];
        $providers = [];
        try {
            foreach ($symbols as $symbol) {
                $resp = $this->router->fetchCandles($symbol, $timeframe, 250);
                $providers[] = $resp['provider'] ?? 'none';
                if (($resp['status'] ?? 'error') !== 'ok' || empty($resp['candles'])) {
                    continue;
                }
                $eval = $this->engine->evaluate($symbol, $timeframe, $resp['candles'], $params);
                foreach ($eval['signals'] as $sig) {
                    $f = $eval['features'];
                    $rows[] = [
                        'job_id' => $jobId,
                        'symbol' => $symbol,
                        'timeframe' => $timeframe,
                        'signal' => $sig['signal'],
                        'direction' => $sig['direction'],
                        'score' => null,
                        'price' => $f['price'] ?? null,
                        'vwap' => $f['vwap'] ?? null,
                        'ema8' => $f['ema8'] ?? null,
                        'ema13' => $f['ema13'] ?? null,
                        'ema55' => $f['ema55'] ?? null,
                        'last_liq_high' => $f['last_liq_high'] ?? null,
                        'last_liq_low' => $f['last_liq_low'] ?? null,
                        'volume' => $f['volume'] ?? null,
                        'vol_sma20' => $f['vol_sma20'] ?? null,
                        'atr14' => $f['atr14'] ?? null,
                        'occurred_on' => date('Y-m-d H:i:s', strtotime((string) ($f['occurred_on'] ?? 'now'))),
                        'payload_json' => json_encode($eval, JSON_UNESCAPED_SLASHES),
                    ];
                }
            }

            $this->model->insertResults($rows);
            $provider = 'mixed';
            $uniq = array_values(array_unique(array_filter($providers)));
            if (count($uniq) === 1) {
                $provider = $uniq[0];
            }
            $this->model->updateJob($jobId, [
                'status' => 'completed',
                'finished_on' => date('Y-m-d H:i:s'),
                'provider_used' => $provider,
            ]);
            log_message('info', 'SCANNER: job {job} completed results={count}', ['job' => $jobId, 'count' => count($rows)]);
            return ['job_id' => $jobId, 'results_written' => count($rows), 'symbols_scanned' => count($symbols)];
        } catch (\Throwable $e) {
            $this->model->updateJob($jobId, [
                'status' => 'failed',
                'finished_on' => date('Y-m-d H:i:s'),
                'error_message' => $e->getMessage(),
            ]);
            log_message('error', 'SCANNER: job {job} failed: {msg}', ['job' => $jobId, 'msg' => $e->getMessage()]);
            throw $e;
        }
    }

    public function results(array $filters): array
    {
        return $this->model->getResults($filters);
    }

    public function syncUniverse(): int
    {
        return $this->model->syncUniverseFromTickers();
    }
}
