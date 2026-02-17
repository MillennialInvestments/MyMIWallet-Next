<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMISqueeze;
use App\Models\SqueezeModel;
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class SqueezeAPIController extends BaseController
{
    use ResponseTrait;

    protected SqueezeModel $squeeze;
    protected MyMISqueeze $mymisqueeze;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ): void {
        parent::initController($request, $response, $logger);

        helper('squeeze');

        $this->squeeze = new SqueezeModel();
        $this->mymisqueeze = new MyMISqueeze();
    }

    public function scorecard()
    {
        try {
            $symbol = $this->request->getGet('symbol');
            $limit = (int) $this->request->getGet('limit');
            $limit = $limit > 0 ? min($limit, 200) : 50;
            $items = $this->squeeze->getLatestScorecards($limit, $symbol);
            $formatted = [];
            foreach ($items as $item) {
                $flags = json_decode($item['flags_json'] ?? '[]', true) ?: [];
                $inputs = json_decode($item['inputs_json'] ?? '[]', true) ?: [];
                $breakdown = $inputs['breakdown'] ?? [];
                $notes = 'Probabilistic squeeze setup; sustainability depends on broader catalysts.';
                if (!empty($flags['downtrend']) || !empty($flags['weakFundamentals'])) {
                    $notes = 'Mechanical unwind likely; squeeze possible but sustainability low.';
                }
                $formatted[] = array_merge($item, [
                    'flags' => $flags,
                    'breakdown' => $breakdown,
                    'notes' => $notes,
                ]);
            }

            $latest = $formatted ? $formatted[0] : null;
            $payload = [
                'status' => 'success',
                'data' => [
                    'items' => $formatted,
                    'latest' => $latest,
                ],
            ];
            return $this->respond($payload, 200);
        } catch (\Throwable $exception) {
            log_message('error', 'Scorecard API error: ' . $exception->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Unable to fetch scorecards.'], 500);
        }
    }

    public function zoomout()
    {
        try {
            $symbol = $this->request->getGet('symbol');
            $date = $this->request->getGet('date') ?? date('Y-m-d');
            $row = $this->squeeze->getZoomOut($symbol, $date);

            return $this->respond([
                'status' => 'success',
                'data' => $row,
            ], 200);
        } catch (\Throwable $exception) {
            log_message('error', 'Zoomout API error: ' . $exception->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Unable to fetch zoom out.'], 500);
        }
    }

    public function fade()
    {
        try {
            $symbol = $this->request->getGet('symbol');
            $date = $this->request->getGet('date') ?? date('Y-m-d');
            $rows = $this->squeeze->getFadeSetups($symbol, $date);

            return $this->respond([
                'status' => 'success',
                'data' => $rows,
            ], 200);
        } catch (\Throwable $exception) {
            log_message('error', 'Fade API error: ' . $exception->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Unable to fetch fade setups.'], 500);
        }
    }

    public function run()
    {
        try {
            $payload = $this->request->getJSON(true);
            if (!is_array($payload)) {
                $payload = json_decode((string) $this->request->getBody(), true) ?? [];
            }
            $symbols = $payload['symbols'] ?? [];
            $mode = $payload['mode'] ?? 'daily';

            $manual = $payload['symbol'] ?? null;
            if ($manual) {
                $symbols = [$manual];
            }

            if (empty($symbols)) {
                return $this->respond(['status' => 'error', 'message' => 'No symbols supplied.'], 400);
            }

            $processed = 0;
            $insertedScorecards = 0;
            $insertedZoomout = 0;
            $insertedFade = 0;

            foreach ($symbols as $symbol) {
                $symbol = strtoupper($symbol);
                $inputs = $payload;
                $inputs['symbol'] = $symbol;

                $inputs = array_merge([
                    'float_shares' => $payload['float_shares'] ?? null,
                    'short_interest_pct' => $payload['short_interest_pct'] ?? null,
                    'volume_today' => $payload['volume_today'] ?? null,
                    'avg_volume_30d' => $payload['avg_volume_30d'] ?? null,
                    'price' => $payload['price'] ?? null,
                    'prev_close' => $payload['prev_close'] ?? null,
                    'cost_to_borrow' => $payload['cost_to_borrow'] ?? null,
                    'days_to_cover' => $payload['days_to_cover'] ?? null,
                ], $inputs);

                $universeRow = [
                    'symbol' => $symbol,
                    'as_of_date' => date('Y-m-d'),
                    'source' => $payload['source'] ?? 'manual',
                    'float_shares' => $inputs['float_shares'],
                    'shares_out' => $payload['shares_out'] ?? null,
                    'short_interest_shares' => $payload['short_interest_shares'] ?? null,
                    'short_interest_pct' => $inputs['short_interest_pct'],
                    'days_to_cover' => $inputs['days_to_cover'],
                    'cost_to_borrow' => $inputs['cost_to_borrow'],
                    'utilization_pct' => $payload['utilization_pct'] ?? null,
                    'avg_volume_30d' => $inputs['avg_volume_30d'],
                    'volume_today' => $inputs['volume_today'],
                    'price' => $inputs['price'],
                    'open' => $payload['open'] ?? null,
                    'high' => $payload['high'] ?? null,
                    'low' => $payload['low'] ?? null,
                    'prev_close' => $inputs['prev_close'],
                ];
                $this->squeeze->upsertUniverseRow($universeRow);

                $dailyBars = $payload['daily_bars'] ?? $this->mockDailyBars($inputs['price'] ?? 1.0);
                $fundamentals = $payload['fundamentals'] ?? [];
                $dilutionSignals = $payload['dilution_signals'] ?? [
                    'microcap' => true,
                    'spike_history' => true,
                ];

                $zoom = $this->mymisqueeze->computeZoomOut($dailyBars, $fundamentals, $dilutionSignals);
                $zoomRow = [
                    'symbol' => $symbol,
                    'as_of_date' => date('Y-m-d'),
                    'trend_state' => $zoom['trend_state'],
                    'dilution_risk' => $zoom['dilution_risk'],
                    'fundamentals_state' => $zoom['fundamentals_state'],
                    'narrative' => $zoom['narrative'],
                    'evidence_json' => json_encode($zoom['evidence']),
                ];
                $this->squeeze->insertZoomOut($zoomRow);
                $insertedZoomout++;

                $scoreInput = array_merge($inputs, [
                    'trend_state' => $zoom['trend_state'],
                    'dilution_risk' => $zoom['dilution_risk'],
                    'fundamentals_state' => $zoom['fundamentals_state'],
                ]);
                $score = $this->mymisqueeze->computeScorecard($scoreInput);

                $scoreRow = [
                    'symbol' => $symbol,
                    'as_of_datetime' => date('Y-m-d H:i:s'),
                    'score_total' => $score['score_total'],
                    'score_squeeze' => $score['score_squeeze'],
                    'score_sustainability' => $score['score_sustainability'],
                    'score_risk' => $score['score_risk'],
                    'flags_json' => json_encode($score['flags']),
                    'inputs_json' => json_encode($score['inputs']),
                ];
                $this->squeeze->insertScorecard($scoreRow);
                $insertedScorecards++;

                $fadeRows = [];
                if ($this->mymisqueeze->detectSqueezeEvent($inputs)) {
                    $intraday = $payload['intraday'] ?? [];
                    $levels = [
                        'vwap' => $payload['vwap'] ?? $inputs['price'],
                        'hod' => $payload['hod'] ?? $inputs['price'],
                        'prev_close' => $inputs['prev_close'],
                        'base_support' => $payload['base_support'] ?? null,
                    ];
                    $setups = $this->mymisqueeze->computeFadeSetup($intraday, $levels);
                    foreach ($setups as $setup) {
                        $fadeRows[] = [
                            'symbol' => $symbol,
                            'as_of_datetime' => date('Y-m-d H:i:s'),
                            'setup_grade' => $setup['setup_grade'],
                            'entry_type' => $setup['entry_type'],
                            'entry_price' => $setup['entry_price'],
                            'stop_price' => $setup['stop_price'],
                            'target1' => $setup['target1'],
                            'target2' => $setup['target2'],
                            'risk_notes' => $setup['risk_notes'],
                            'logic_json' => json_encode($setup['logic']),
                        ];
                    }
                }

                $insertedFade += $this->squeeze->insertFadeSetups($fadeRows);

                $processed++;
            }

            $cacheStats = $this->squeeze->getCacheStats();
            log_message('info', sprintf(
                'Squeeze run complete: symbols=%s scorecards=%d zoomout=%d fade=%d mode=%s cache_hits=%d cache_misses=%d memory=%s',
                implode(',', $symbols),
                $insertedScorecards,
                $insertedZoomout,
                $insertedFade,
                $mode,
                $cacheStats['hits'],
                $cacheStats['misses'],
                memory_get_usage(true)
            ));

            return $this->respond([
                'status' => 'success',
                'data' => [
                    'symbols_processed' => $processed,
                    'scorecards' => $insertedScorecards,
                    'zoomout' => $insertedZoomout,
                    'fade_setups' => $insertedFade,
                ],
            ], 200);
        } catch (\Throwable $exception) {
            log_message('error', 'Squeeze run error: ' . $exception->getMessage());
            return $this->respond(['status' => 'error', 'message' => 'Unable to run squeeze analysis.'], 500);
        }
    }

    protected function mockDailyBars($price)
    {
        $bars = [];
        $base = $price ?: 1.0;
        for ($i = 30; $i >= 0; $i--) {
            $bars[] = [
                'close' => $base * (1 - ($i * 0.002)),
            ];
        }
        return $bars;
    }
}
