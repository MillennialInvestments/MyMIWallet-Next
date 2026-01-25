<?php
$latestForecasts = $latestForecasts ?? [];
$historySnapshots = $historySnapshots ?? [];
$confidenceThresholds = $confidenceThresholds ?? ['high' => 75, 'mid' => 60, 'medium' => 50, 'low' => 40];

$grouped = [];
foreach ($latestForecasts as $forecast) {
    $timeframe = $forecast['timeframe'] ?? 'n/a';
    $grouped[$timeframe] = $forecast;
}
$timeframes = array_keys($grouped);
$activeTimeframe = $timeframes[0] ?? '5m';
?>
<div class="modal-header">
    <div>
        <h5 class="modal-title">Forecast Details: <?= esc($ticker ?? '-') ?></h5>
        <p class="small text-soft mb-0">Model direction, confidence, and indicator breakdown by timeframe.</p>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <ul class="nav nav-tabs mb-3" role="tablist">
        <?php foreach ($timeframes as $index => $timeframe): ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= $timeframe === $activeTimeframe ? 'active' : '' ?>" id="forecast-tab-<?= esc($timeframe) ?>" data-bs-toggle="tab" data-bs-target="#forecast-pane-<?= esc($timeframe) ?>" type="button" role="tab">
                    <?= esc($timeframe) ?>
                </button>
            </li>
        <?php endforeach; ?>
        <?php if (empty($timeframes)): ?>
            <li class="nav-item" role="presentation">
                <span class="nav-link active">No Data</span>
            </li>
        <?php endif; ?>
    </ul>

    <div class="tab-content">
        <?php foreach ($grouped as $timeframe => $forecast): ?>
            <?php
            $confidence = (int) ($forecast['confidence_score'] ?? 0);
            $direction = strtoupper($forecast['forecast_direction'] ?? 'neutral');
            $badgeClass = 'bg-secondary';
            if ($confidence >= ($confidenceThresholds['high'] ?? 75)) {
                $badgeClass = 'bg-success';
            } elseif ($confidence >= ($confidenceThresholds['mid'] ?? $confidenceThresholds['medium'] ?? 60)) {
                $badgeClass = 'bg-warning';
            } elseif ($confidence >= ($confidenceThresholds['low'] ?? 40)) {
                $badgeClass = 'bg-info';
            }
            $rangeLow = (float) ($forecast['range_low'] ?? 0);
            $rangeHigh = (float) ($forecast['range_high'] ?? 0);
            $target = (float) ($forecast['target_price'] ?? 0);
            $rangeSpan = max(1, $rangeHigh - $rangeLow);
            $targetPercent = min(100, max(0, (($target - $rangeLow) / $rangeSpan) * 100));
            $indicators = json_decode($forecast['indicators_json'] ?? '{}', true) ?? [];
            $trend = $indicators['trend'] ?? [];
            $momentum = $indicators['momentum'] ?? [];
            $volatility = $indicators['volatility'] ?? [];
            $support = $indicators['support_resistance'] ?? [];
            ?>
            <div class="tab-pane fade <?= $timeframe === $activeTimeframe ? 'show active' : '' ?>" id="forecast-pane-<?= esc($timeframe) ?>" role="tabpanel">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                    <div>
                        <span class="badge <?= esc($badgeClass, 'attr') ?> text-uppercase me-2"><?= esc($direction) ?></span>
                        <span class="badge bg-outline-primary">Confidence: <?= esc($confidence) ?>%</span>
                    </div>
                    <div class="text-soft small">Updated: <?= esc($forecast['updated_at'] ?? $forecast['created_at'] ?? '-') ?></div>
                </div>

                <div class="card card-bordered mb-3">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <div class="small text-soft">Target</div>
                                <div class="fw-bold">$<?= esc(number_format($target, 2)) ?></div>
                            </div>
                            <div class="text-end">
                                <div class="small text-soft">Range</div>
                                <div class="fw-bold">$<?= esc(number_format($rangeLow, 2)) ?> - $<?= esc(number_format($rangeHigh, 2)) ?></div>
                            </div>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?= esc(number_format($targetPercent, 2)) ?>%"></div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <h6 class="mb-2">Trend</h6>
                            <div class="small text-soft">EMA9/EMA21: <?= esc(number_format((float) ($trend['ema9'] ?? 0), 2)) ?> / <?= esc(number_format((float) ($trend['ema21'] ?? 0), 2)) ?></div>
                            <div class="small text-soft">Bias: <?= esc($trend['bias'] ?? '0') ?> • Strength: <?= esc(number_format((float) ($trend['strength'] ?? 0), 2)) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <h6 class="mb-2">Momentum</h6>
                            <div class="small text-soft">RSI: <?= esc(number_format((float) ($momentum['rsi'] ?? 0), 2)) ?></div>
                            <div class="small text-soft">Bias: <?= esc($momentum['bias'] ?? '0') ?> • Strength: <?= esc(number_format((float) ($momentum['strength'] ?? 0), 2)) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <h6 class="mb-2">Volatility</h6>
                            <div class="small text-soft">ATR: <?= esc(number_format((float) ($volatility['atr'] ?? 0), 2)) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <h6 class="mb-2">Support / Resistance</h6>
                            <div class="small text-soft">Support: $<?= esc(number_format((float) ($support['support'] ?? 0), 2)) ?></div>
                            <div class="small text-soft">Resistance: $<?= esc(number_format((float) ($support['resistance'] ?? 0), 2)) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-4">
        <h6 class="mb-2">Last 10 Forecast Snapshots</h6>
        <?php if (! empty($historySnapshots)): ?>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Recorded</th>
                            <th>Timeframe</th>
                            <th>Direction</th>
                            <th>Confidence</th>
                            <th>Target</th>
                            <th>Range</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historySnapshots as $snapshot): ?>
                            <tr>
                                <td><?= esc($snapshot['recorded_at'] ?? '-') ?></td>
                                <td><?= esc($snapshot['timeframe'] ?? '-') ?></td>
                                <td><?= esc(strtoupper($snapshot['forecast_direction'] ?? '-')) ?></td>
                                <td><?= esc($snapshot['confidence_score'] ?? 0) ?>%</td>
                                <td>$<?= esc(number_format((float) ($snapshot['target_price'] ?? 0), 2)) ?></td>
                                <td>$<?= esc(number_format((float) ($snapshot['range_low'] ?? 0), 2)) ?> - $<?= esc(number_format((float) ($snapshot['range_high'] ?? 0), 2)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-soft">No history snapshots yet.</p>
        <?php endif; ?>
    </div>
</div>
