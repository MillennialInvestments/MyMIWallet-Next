<?php

namespace App\Modules\PropFirms\Libraries;

use App\Libraries\MyMIAlphaVantage;
use App\Modules\PropFirms\Models\PropEquityHistoryModel;
use App\Modules\PropFirms\Models\PropFillModel;
use App\Modules\PropFirms\Models\PropPositionModel;
use App\Modules\PropFirms\Models\PropReplayDiagnosticModel;
use App\Modules\PropFirms\Models\PropReplayEventModel;
use App\Modules\PropFirms\Models\PropSignalModel;

class PropReplayAnalysisService
{
    private MyMIAlphaVantage $alpha;
    private PropReplayEventModel $events;
    private PropReplayDiagnosticModel $diagnostics;
    private PropFillModel $fills;
    private PropPositionModel $positions;
    private PropSignalModel $signals;
    private PropEquityHistoryModel $equity;

    public function __construct()
    {
        $this->alpha = new MyMIAlphaVantage();
        $this->events = new PropReplayEventModel();
        $this->diagnostics = new PropReplayDiagnosticModel();
        $this->fills = new PropFillModel();
        $this->positions = new PropPositionModel();
        $this->signals = new PropSignalModel();
        $this->equity = new PropEquityHistoryModel();
    }

    public function buildReplayTimeline(int $accountId, string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));
        $candles = $this->alpha->getCandlesForSignalEngine($symbol, '5min', 200);

        $fills = $this->fetchFillsForSymbol($accountId, $symbol);
        $positions = $this->positions->where('user_prop_account_id', $accountId)->where('symbol', $symbol)->findAll();
        $equityRows = $this->equity->where('user_prop_account_id', $accountId)->orderBy('recorded_at', 'ASC')->findAll();
        $signals = $this->signals->where('user_prop_account_id', $accountId)->where('symbol', $symbol)->orderBy('triggered_at', 'ASC')->findAll();

        $markers = $this->generateMarkers($candles, $fills, $positions, $equityRows, $signals);
        $savedCount = $this->persistReplayEvents($accountId, $markers);
        $thresholds = $this->deriveThresholds($equityRows);

        return [
            'candles' => $candles,
            'markers' => $markers,
            'thresholds' => $thresholds,
            'fills' => $fills,
            'signals' => $signals,
            'context' => [
                'account_id' => $accountId,
                'symbol' => $symbol,
                'events_saved' => $savedCount,
                'equity_points' => count($equityRows),
                'position_count' => count($positions),
            ],
        ];
    }

    public function diagnoseAccountFailure(int $accountId, string $symbol, array $timeline = []): array
    {
        $timeline = $timeline ?: $this->buildReplayTimeline($accountId, $symbol);
        $findings = [];

        $fills = $timeline['fills'] ?? [];
        $signals = $timeline['signals'] ?? [];
        $thresholds = $timeline['thresholds'] ?? [];
        $candles = $timeline['candles'] ?? [];

        $hasStopSignal = false;
        foreach ($fills as $fill) {
            $payload = json_decode((string) ($fill['order_payload_json'] ?? '{}'), true) ?: [];
            if (!empty($payload['stop_loss'])) {
                $hasStopSignal = true;
                break;
            }
        }
        if (! $hasStopSignal) {
            $findings[] = $this->makeFinding('warning', 'no_stop_loss', 'No stop-loss context found in replay fills.');
        }

        $maxQty = 0.0;
        foreach ($fills as $fill) {
            $maxQty = max($maxQty, (float) ($fill['fill_qty'] ?? 0));
        }
        if ($maxQty > 10) {
            $findings[] = $this->makeFinding('warning', 'oversized_position', 'Detected oversized position relative to typical contract sizing.');
        }

        if (count($fills) >= 8) {
            $findings[] = $this->makeFinding('info', 'overtrading', 'High trade frequency detected in replay window.');
        }

        if (!empty($thresholds['remaining_dll']) && $thresholds['remaining_dll'] < 250) {
            $findings[] = $this->makeFinding('critical', 'dll_risk_escalation', 'Remaining daily loss limit is critically low.');
        }

        if (!empty($thresholds['remaining_drawdown']) && $thresholds['remaining_drawdown'] < 250) {
            $findings[] = $this->makeFinding('critical', 'threshold_breach', 'Account drawdown threshold has been breached or nearly breached.');
        }

        if (count($fills) >= 4 && $this->isRapidFireSequence($fills)) {
            $findings[] = $this->makeFinding('warning', 'revenge_trading', 'Rapid-fire entries suggest revenge trading behavior.');
        }

        if (!empty($signals) && !empty($fills)) {
            $lastSignal = end($signals);
            $lastFill = end($fills);
            $signalType = strtoupper((string) ($lastSignal['signal_type'] ?? ''));
            $fillSide = strtolower((string) ($lastFill['side'] ?? ''));
            $againstSignal = ($signalType === 'BUY' && $fillSide === 'sell') || ($signalType === 'SELL' && $fillSide === 'buy');
            if ($againstSignal) {
                $findings[] = $this->makeFinding('warning', 'trade_against_signal', 'Latest fill direction conflicts with latest signal direction.');
            }
        }

        if (count($candles) >= 2 && count($fills) > 0) {
            $lastCandle = $candles[0];
            $lastFill = end($fills);
            $entryPrice = (float) ($lastFill['fill_price'] ?? 0);
            $rangeTop = (float) ($lastCandle['high'] ?? 0);
            $rangeBottom = (float) ($lastCandle['low'] ?? 0);
            if ($entryPrice > 0 && ($entryPrice > $rangeTop || $entryPrice < $rangeBottom)) {
                $findings[] = $this->makeFinding('info', 'late_entry', 'Entry printed outside immediate candle range and may be late.');
            }
        }

        if (count($fills) > 0 && ($thresholds['remaining_drawdown'] ?? 0) < ($thresholds['remaining_dll'] ?? 0)) {
            $findings[] = $this->makeFinding('warning', 'threshold_breach', 'Drawdown pressure is accelerating faster than DLL recovery.');
        }

        $diagnosticEventId = $this->events->insert([
            'user_prop_account_id' => $accountId,
            'event_type' => 'diagnostic_scan',
            'event_payload_json' => json_encode(['symbol' => strtoupper($symbol), 'finding_count' => count($findings)], JSON_UNESCAPED_SLASHES),
            'event_at' => date('Y-m-d H:i:s'),
            'sequence_no' => (int) (time()),
        ], true);

        foreach ($findings as $finding) {
            $this->diagnostics->insert([
                'prop_replay_event_id' => (int) $diagnosticEventId,
                'severity' => (string) $finding['severity'],
                'message' => (string) $finding['message'],
                'diagnostic_json' => json_encode($finding, JSON_UNESCAPED_SLASHES),
                'logged_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return ['event_id' => (int) $diagnosticEventId, 'findings' => $findings];
    }

    private function fetchFillsForSymbol(int $accountId, string $symbol): array
    {
        return $this->fills
            ->select('bf_prop_fills.*, bf_prop_orders.symbol, bf_prop_orders.side')
            ->join('bf_prop_orders', 'bf_prop_orders.id = bf_prop_fills.prop_order_id', 'inner')
            ->where('bf_prop_orders.user_prop_account_id', $accountId)
            ->where('bf_prop_orders.symbol', $symbol)
            ->orderBy('bf_prop_fills.filled_at', 'ASC')
            ->findAll();
    }

    private function generateMarkers(array $candles, array $fills, array $positions, array $equityRows, array $signals): array
    {
        $markers = [];

        foreach ($fills as $fill) {
            $markers[] = [
                'type' => 'fill',
                'at' => (string) ($fill['filled_at'] ?? date('Y-m-d H:i:s')),
                'label' => sprintf('Fill %s %.2f @ %.2f', strtoupper((string) ($fill['side'] ?? '')), (float) ($fill['fill_qty'] ?? 0), (float) ($fill['fill_price'] ?? 0)),
                'payload' => $fill,
            ];
        }

        foreach ($signals as $signal) {
            $markers[] = [
                'type' => 'signal',
                'at' => (string) ($signal['triggered_at'] ?? date('Y-m-d H:i:s')),
                'label' => (string) ($signal['signal_type'] ?? 'signal'),
                'payload' => $signal,
            ];
        }

        foreach ($equityRows as $point) {
            $markers[] = [
                'type' => 'equity',
                'at' => (string) ($point['recorded_at'] ?? date('Y-m-d H:i:s')),
                'label' => 'Equity ' . number_format((float) ($point['equity'] ?? 0), 2),
                'payload' => $point,
            ];
        }

        foreach ($positions as $position) {
            $markers[] = [
                'type' => 'position',
                'at' => (string) ($position['opened_at'] ?? date('Y-m-d H:i:s')),
                'label' => 'Position ' . strtoupper((string) ($position['symbol'] ?? '')),
                'payload' => $position,
            ];
        }

        usort($markers, static function (array $a, array $b): int {
            return strcmp((string) ($a['at'] ?? ''), (string) ($b['at'] ?? ''));
        });

        foreach ($markers as $idx => &$marker) {
            $marker['sequence_no'] = $idx + 1;
        }

        return $markers;
    }

    private function persistReplayEvents(int $accountId, array $markers): int
    {
        $count = 0;
        foreach ($markers as $marker) {
            $this->events->insert([
                'user_prop_account_id' => $accountId,
                'event_type' => (string) ($marker['type'] ?? 'marker'),
                'event_payload_json' => json_encode($marker['payload'] ?? [], JSON_UNESCAPED_SLASHES),
                'event_at' => (string) ($marker['at'] ?? date('Y-m-d H:i:s')),
                'sequence_no' => (int) ($marker['sequence_no'] ?? 0),
            ]);
            $count++;
        }

        return $count;
    }

    private function deriveThresholds(array $equityRows): array
    {
        $latest = end($equityRows) ?: [];
        $drawdown = (float) ($latest['drawdown'] ?? 0);
        $equity = (float) ($latest['equity'] ?? 0);

        return [
            'current_equity' => $equity,
            'current_drawdown' => $drawdown,
            'remaining_drawdown' => max(0, 2500 - $drawdown),
            'remaining_dll' => max(0, 1500 - $drawdown),
        ];
    }

    private function makeFinding(string $severity, string $code, string $message): array
    {
        return [
            'severity' => $severity,
            'code' => $code,
            'message' => $message,
            'detected_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function isRapidFireSequence(array $fills): bool
    {
        $timestamps = [];
        foreach ($fills as $fill) {
            $time = strtotime((string) ($fill['filled_at'] ?? ''));
            if ($time !== false) {
                $timestamps[] = $time;
            }
        }

        sort($timestamps);

        $shortBursts = 0;
        for ($i = 1, $len = count($timestamps); $i < $len; $i++) {
            if (($timestamps[$i] - $timestamps[$i - 1]) <= 180) {
                $shortBursts++;
            }
        }

        return $shortBursts >= 3;
    }
}
