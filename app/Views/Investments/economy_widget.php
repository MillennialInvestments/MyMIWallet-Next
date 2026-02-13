<?php
$indicators = $snapshot['indicators'] ?? [];
$score = (int) ($snapshot['economic_score'] ?? 0);
$state = $snapshot['state'] ?? 'N/A';
$yieldSpread = $snapshot['yield_spread'] ?? null;
$yieldNegative = is_numeric($yieldSpread) && (float) $yieldSpread < 0;
?>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="card-title mb-3">State of Economy</h5>
        <div class="row g-2 small">
            <div class="col-md-4"><strong>GDP:</strong> <?= esc(number_format((float) ($indicators['GDP']['value'] ?? 0), 2)); ?></div>
            <div class="col-md-4"><strong>Inflation (CPI):</strong> <?= esc(number_format((float) ($indicators['CPIAUCSL']['value'] ?? 0), 2)); ?></div>
            <div class="col-md-4"><strong>Unemployment:</strong> <?= esc(number_format((float) ($indicators['UNRATE']['value'] ?? 0), 2)); ?>%</div>
            <div class="col-md-4"><strong>Fed Funds:</strong> <?= esc(number_format((float) ($indicators['FEDFUNDS']['value'] ?? 0), 2)); ?>%</div>
            <div class="col-md-4">
                <strong>Yield Spread:</strong>
                <span class="<?= $yieldNegative ? 'text-danger' : 'text-success'; ?>">
                    <?= esc(number_format((float) ($yieldSpread ?? 0), 2)); ?>% <?= $yieldNegative ? '⚠️' : ''; ?>
                </span>
            </div>
            <div class="col-md-4"><strong>Economic Score:</strong> <?= esc((string) $score); ?>/4 (<?= esc($state); ?>)</div>
        </div>

        <hr>
        <canvas id="unemploymentChart" height="90"></canvas>
    </div>
</div>

<script>
(function() {
    const unemploymentData = <?= json_encode($unemploymentSeries, JSON_UNESCAPED_SLASHES); ?>;
    const labels = unemploymentData.map(e => e.date);
    const values = unemploymentData.map(e => Number.parseFloat(e.value));

    if (window.Chart && document.getElementById('unemploymentChart')) {
        new Chart(document.getElementById('unemploymentChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Unemployment Rate',
                    data: values,
                    borderColor: '#3e8ef7',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.2
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: { beginAtZero: false }
                }
            }
        });
    }
})();
</script>
