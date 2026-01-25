<?php
$nonce = is_array($nonce ?? null) ? $nonce : [];
$forecastDetails = $forecastDetails ?? ['ticker' => $ticker ?? '', 'timeframes' => [], 'history' => []];
$featureFlags = $featureFlags ?? [];
$detailUiEnabled = $featureFlags['forecastDetailUi'] ?? true;
$timeframes = array_keys($forecastDetails['timeframes'] ?? []);
$defaultTimeframe = $timeframes[0] ?? '';
$confidenceThresholds = $confidenceThresholds ?? ['high' => 70, 'medium' => 50];
?>
<div class="modal-header">
    <div>
        <h5 class="modal-title">Forecast Details: <?= esc($ticker ?? '-') ?></h5>
        <div class="small text-soft">Explainable forecast detail view</div>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?php if (! $detailUiEnabled): ?>
        <div class="alert alert-info mb-0">Forecast detail UI is currently disabled.</div>
    <?php elseif (empty($timeframes)): ?>
        <div class="alert alert-warning mb-0">No forecast data is available for this ticker yet.</div>
    <?php else: ?>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary" id="forecast-detail-direction">--</span>
                <span class="fw-semibold"><span id="forecast-detail-confidence">0</span>% confidence</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <label class="small text-soft mb-0" for="forecastTimeframeSelect">Timeframe</label>
                <select class="form-select form-select-sm w-auto" id="forecastTimeframeSelect">
                    <?php foreach ($timeframes as $timeframe): ?>
                        <option value="<?= esc($timeframe) ?>" <?= $timeframe === $defaultTimeframe ? 'selected' : '' ?>><?= esc($timeframe) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="card card-bordered mb-3">
            <div class="card-inner">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <div class="text-soft small">Target</div>
                        <div class="fw-semibold" id="forecast-detail-target">--</div>
                    </div>
                    <div class="text-end">
                        <div class="text-soft small">Range</div>
                        <div class="fw-semibold" id="forecast-detail-range">--</div>
                    </div>
                </div>
                <div class="position-relative" style="height: 12px; background: #f5f6fa; border-radius: 999px;">
                    <div id="forecast-detail-range-bar" style="position:absolute; left:0; top:0; height:100%; width:100%; background:linear-gradient(90deg,#e85347,#f4bd0e,#1ee0ac); border-radius:999px;"></div>
                    <div id="forecast-detail-target-marker" style="position:absolute; top:-4px; width:2px; height:20px; background:#364a63;"></div>
                </div>
                <div class="text-soft small mt-2">Updated <span id="forecast-detail-updated">--</span></div>
            </div>
        </div>

        <div class="card card-bordered mb-3">
            <div class="card-inner">
                <h6 class="subtitle mb-2">Indicator Breakdown</h6>
                <div id="forecast-detail-indicators" class="vstack gap-2">
                    <div class="text-soft small">Loading indicators...</div>
                </div>
            </div>
        </div>

        <div class="card card-bordered">
            <div class="card-inner">
                <h6 class="subtitle mb-2">Forecast History (last 10)</h6>
                <ul class="list-group list-group-sm" id="forecast-detail-history"></ul>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if (! empty($timeframes)): ?>
<script <?= $nonce['script'] ?? '' ?>>
(() => {
    const detailData = <?= json_encode($forecastDetails, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const confidenceThresholds = <?= json_encode($confidenceThresholds, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const timeframeSelect = document.getElementById('forecastTimeframeSelect');
    const directionBadge = document.getElementById('forecast-detail-direction');
    const confidenceValue = document.getElementById('forecast-detail-confidence');
    const targetValue = document.getElementById('forecast-detail-target');
    const rangeValue = document.getElementById('forecast-detail-range');
    const targetMarker = document.getElementById('forecast-detail-target-marker');
    const updatedValue = document.getElementById('forecast-detail-updated');
    const indicatorsContainer = document.getElementById('forecast-detail-indicators');
    const historyContainer = document.getElementById('forecast-detail-history');

    const formatNumber = (value) => {
        if (value === null || value === undefined || Number.isNaN(Number(value))) {
            return '--';
        }
        return Number(value).toFixed(2);
    };

    const getConfidenceBadge = (score) => {
        if (score >= (confidenceThresholds.high ?? 70)) {
            return 'bg-success';
        }
        if (score >= (confidenceThresholds.medium ?? 50)) {
            return 'bg-warning';
        }
        return 'bg-secondary';
    };

    const renderIndicators = (indicators = {}) => {
        indicatorsContainer.innerHTML = '';
        const entries = Object.entries(indicators || {});
        if (entries.length === 0) {
            indicatorsContainer.innerHTML = '<div class="text-soft small">No indicator data available.</div>';
            return;
        }
        entries.forEach(([name, data]) => {
            const strength = typeof data === 'object' && data !== null ? (data.strength ?? data.rsi ?? data.bias ?? null) : data;
            const percentage = strength !== null ? Math.min(Math.max(Math.abs(Number(strength)) * 100, 0), 100) : 0;
            const label = name.replace(/_/g, ' ');
            const detail = typeof data === 'object' ? JSON.stringify(data) : String(data ?? '');
            indicatorsContainer.insertAdjacentHTML('beforeend', `
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <span class="text-capitalize">${label}</span>
                        <span class="text-soft small">${detail}</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width:${percentage}%"></div>
                    </div>
                </div>
            `);
        });
    };

    const renderHistory = (timeframe) => {
        const history = (detailData.history || []).filter((item) => !timeframe || item.timeframe === timeframe);
        historyContainer.innerHTML = '';
        if (history.length === 0) {
            historyContainer.innerHTML = '<li class="list-group-item text-soft">No history for this timeframe.</li>';
            return;
        }
        history.forEach((item) => {
            const confidence = item.confidence ?? 0;
            const badgeClass = getConfidenceBadge(confidence);
            historyContainer.insertAdjacentHTML('beforeend', `
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <div class="fw-semibold">${item.recorded_at ?? '--'} • ${item.timeframe ?? '--'}</div>
                        <div class="text-soft small">Target ${formatNumber(item.target)}</div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge ${badgeClass} text-uppercase">${item.direction ?? '--'}</span>
                        <span class="fw-semibold">${confidence}%</span>
                    </div>
                </li>
            `);
        });
    };

    const renderTimeframe = (timeframe) => {
        const detail = detailData.timeframes?.[timeframe];
        if (!detail) {
            return;
        }
        const confidence = detail.confidence ?? 0;
        directionBadge.className = `badge ${getConfidenceBadge(confidence)} text-uppercase`;
        directionBadge.textContent = detail.direction ?? '--';
        confidenceValue.textContent = confidence;
        targetValue.textContent = formatNumber(detail.target);
        rangeValue.textContent = `${formatNumber(detail.range?.[0])} - ${formatNumber(detail.range?.[1])}`;
        updatedValue.textContent = detail.updated_at ?? '--';
        renderIndicators(detail.indicators);
        renderHistory(timeframe);

        const low = Number(detail.range?.[0]);
        const high = Number(detail.range?.[1]);
        const target = Number(detail.target);
        if (!Number.isNaN(low) && !Number.isNaN(high) && high > low && !Number.isNaN(target)) {
            const position = ((target - low) / (high - low)) * 100;
            targetMarker.style.left = `${Math.min(Math.max(position, 0), 100)}%`;
        } else {
            targetMarker.style.left = '50%';
        }
    };

    timeframeSelect?.addEventListener('change', (event) => {
        renderTimeframe(event.target.value);
    });

    if (timeframeSelect?.value) {
        renderTimeframe(timeframeSelect.value);
    }
})();
</script>
<?php endif; ?>
