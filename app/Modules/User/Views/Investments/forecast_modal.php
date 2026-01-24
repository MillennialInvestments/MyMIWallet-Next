<?php
$latestForecasts = $latestForecasts ?? [];
$historySnapshots = $historySnapshots ?? [];
$confidenceThresholds = $confidenceThresholds ?? ['high' => 70, 'medium' => 50];
?>
<div class="modal-header">
    <h5 class="modal-title">Forecast Details: <?= esc($ticker ?? '-') ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <h6 class="mb-2">Latest Forecasts</h6>
        <?php if (! empty($latestForecasts)): ?>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Timeframe</th>
                            <th>Direction</th>
                            <th>Confidence</th>
                            <th>Target</th>
                            <th>Range</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latestForecasts as $forecast): ?>
                            <?php
                            $confidence = (int) ($forecast['confidence_score'] ?? 0);
                            $badgeClass = 'bg-secondary';
                            if ($confidence >= ($confidenceThresholds['high'] ?? 70)) {
                                $badgeClass = 'bg-success';
                            } elseif ($confidence >= ($confidenceThresholds['medium'] ?? 50)) {
                                $badgeClass = 'bg-warning';
                            }
                            ?>
                            <tr>
                                <td><?= esc($forecast['timeframe'] ?? '-') ?></td>
                                <td><span class="badge <?= esc($badgeClass, 'attr') ?> text-uppercase"><?= esc($forecast['forecast_direction'] ?? '-') ?></span></td>
                                <td><?= esc($confidence) ?>%</td>
                                <td><?= esc(number_format((float) ($forecast['target_price'] ?? 0), 2)) ?></td>
                                <td><?= esc(number_format((float) ($forecast['range_low'] ?? 0), 2)) ?> - <?= esc(number_format((float) ($forecast['range_high'] ?? 0), 2)) ?></td>
                                <td><?= esc($forecast['updated_at'] ?? $forecast['created_at'] ?? '-') ?></td>
                            </tr>
                            <?php if (! empty($forecast['indicators_json'])): ?>
                                <?php $indicators = json_decode($forecast['indicators_json'], true) ?? []; ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="small text-soft">Indicators: <pre class="mb-0"><?= esc(json_encode($indicators, JSON_PRETTY_PRINT)) ?></pre></div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-soft">No forecasts available.</p>
        <?php endif; ?>
    </div>

    <div>
        <h6 class="mb-2">Recent History</h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historySnapshots as $snapshot): ?>
                            <tr>
                                <td><?= esc($snapshot['recorded_at'] ?? '-') ?></td>
                                <td><?= esc($snapshot['timeframe'] ?? '-') ?></td>
                                <td><?= esc($snapshot['forecast_direction'] ?? '-') ?></td>
                                <td><?= esc($snapshot['confidence_score'] ?? 0) ?>%</td>
                                <td><?= esc(number_format((float) ($snapshot['target_price'] ?? 0), 2)) ?></td>
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
