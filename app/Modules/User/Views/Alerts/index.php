<?php
// app/Modules/User/Views/Alerts/index.php
$alertsInfo          = $alertsInfo ?? [];
$pendingTradeAlerts  = $pendingTradeAlerts ?? ($alertsInfo['pendingTradeAlerts'] ?? []);
$pendingAlertsCount  = isset($alertsInfo['pendingAlertsCount']) ? (int) $alertsInfo['pendingAlertsCount'] : ((int) ($pendingAlertsCount ?? count($pendingTradeAlerts)));
$resolvedAlertsCount = isset($alertsInfo['resolvedAlertsCount']) ? (int) $alertsInfo['resolvedAlertsCount'] : ((int) ($resolvedAlertsCount ?? 0));
$totalAccountBalance = $totalAccountBalance ?? 0.0;
$totalAccountBalanceFMT = $totalAccountBalanceFMT ?? number_format((float) $totalAccountBalance, 2);
$checkingSummaryFMT  = $checkingSummaryFMT ?? null;
$creditAvailableFMT  = $creditAvailableFMT ?? '$0.00';
$creditLimitFMT      = $creditLimitFMT ?? '$0.00';
$debtSummaryFMT      = $debtSummaryFMT ?? '$0.00';

$alertsTableData = $pendingTradeAlerts;
$trendAlerts     = array_slice($pendingTradeAlerts, 0, 5);

$chartLabels = [];
$chartPrices = [];
$chartEma13  = [];

foreach ($pendingTradeAlerts as $alert) {
    $ticker = $alert['ticker'] ?? null;
    if ($ticker === null || $ticker === '') {
        continue;
    }

    $chartLabels[] = $ticker;
    $chartPrices[] = isset($alert['price']) ? (float) $alert['price'] : null;
    $chartEma13[]  = isset($alert['ema13']) ? (float) $alert['ema13'] : null;
}

$alertNews = $alertNews ?? [];
?>

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h1 class="nk-block-title">MyMI Alerts Dashboard</h1>
            <div class="nk-block-des">
                <p>Your active trade alerts, account snapshot, and risk overview.</p>
            </div>
        </div>
    </div>

    <div class="row g-gs">
        <div class="col-md-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <span class="nk-block-title">Account Value</span>
                    <h3 class="nk-block-number mb-1">
                        <?= esc($totalAccountBalanceFMT ?? '$0.00'); ?>
                    </h3>
                    <span class="sub-text">All linked wallets &amp; accounts</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <span class="nk-block-title">Available to Invest</span>
                    <h3 class="nk-block-number mb-1">
                        <?= esc($checkingSummaryFMT ?? $creditAvailableFMT ?? '$0.00'); ?>
                    </h3>
                    <span class="sub-text">Cash / credit available</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php $pendingCount = $pendingAlertsCount; ?>
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <span class="nk-block-title">Open Alerts</span>
                    <h3 class="nk-block-number mb-1"><?= (int) $pendingCount; ?></h3>
                    <span class="sub-text">Active trade alerts being tracked</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php $resolvedCount = $resolvedAlertsCount; ?>
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <span class="nk-block-title">Resolved Alerts</span>
                    <h3 class="nk-block-number mb-1"><?= (int) $resolvedCount; ?></h3>
                    <span class="sub-text">Closed or expired trade alerts</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-gs mt-3">
        <div class="col-lg-8">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-items-start">
                        <div class="card-title">
                            <h5 class="title mb-1">Open Trade Alerts</h5>
                            <p class="sub-text">Live signals from your MyMI Alert System.</p>
                        </div>
                        <div class="card-tools">
                            <a href="<?= esc(site_url('User/Alerts/trades'), 'attr'); ?>" class="btn btn-sm btn-primary">
                                View All Alerts
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-hover nk-table-init" id="openAlertsTable">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>Company</th>
                                    <th>Exchange</th>
                                    <th>Last</th>
                                    <th>Chg %</th>
                                    <th>Volume</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Chart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($alertsTableData)): ?>
                                    <?php foreach ($alertsTableData as $alert): ?>
                                        <tr>
                                            <td><strong><?= esc($alert['ticker'] ?? '-'); ?></strong></td>
                                            <td><?= esc($alert['company'] ?? '-'); ?></td>
                                            <td><?= esc($alert['exchange'] ?? '-'); ?></td>
                                            <td><?= esc(number_format((float) ($alert['price'] ?? 0), 2)); ?></td>
                                            <?php
                                            $changePercent = (float) ($alert['change_percent'] ?? 0);
                                            $changeClass   = $changePercent >= 0 ? 'text-success' : 'text-danger';
                                            ?>
                                            <td class="<?= esc($changeClass, 'attr'); ?>">
                                                <?= esc(number_format($changePercent, 2)); ?>%
                                            </td>
                                            <td><?= esc(number_format((float) ($alert['volume'] ?? 0))); ?></td>
                                            <td><?= esc($alert['alert_type'] ?? $alert['status'] ?? '—'); ?></td>
                                            <td><?= esc($alert['status'] ?? 'Opened'); ?></td>
                                            <td>
                                                <?php if (! empty($alert['chart_link'])): ?>
                                                    <a href="<?= esc($alert['chart_link'], 'attr'); ?>" target="_blank" rel="noopener" class="btn btn-xs btn-outline-primary">
                                                        TV
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-soft">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-soft">
                                            No open alerts yet. Create or import alerts to get started.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h5 class="title mb-1">Alerted Tickers – Trend Snapshot</h5>
                    <p class="sub-text">Quick view of last price &amp; EMAs on your active alerts.</p>
                    <canvas id="alertsTrendChart" height="170"></canvas>

                    <?php if (! empty($trendAlerts)): ?>
                        <ul class="nk-activity mt-3">
                            <?php foreach ($trendAlerts as $alert): ?>
                                <li class="nk-activity-item">
                                    <div class="nk-activity-media">
                                        <div class="icon-circle icon-circle-sm bg-light">
                                            <span class="text-primary"><?= esc($alert['ticker'] ?? '?'); ?></span>
                                        </div>
                                    </div>
                                    <div class="nk-activity-data">
                                        <div class="label">
                                            <?= esc($alert['company'] ?? 'Unknown'); ?>
                                        </div>
                                        <span class="time">
                                            Last: <?= esc(number_format((float) ($alert['price'] ?? 0), 2)); ?> ·
                                            EMA13: <?= esc(number_format((float) ($alert['ema13'] ?? 0), 2)); ?>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-soft mt-3">No trend data available yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-bordered mt-3">
                <div class="card-inner">
                    <h6 class="title mb-1">Risk &amp; Budget Snapshot</h6>
                    <p class="sub-text">High-level view of risk, credit &amp; debt.</p>
                    <dl class="row gy-2">
                        <dt class="col-6">Credit Available</dt>
                        <dd class="col-6 text-right"><?= esc($creditAvailableFMT); ?></dd>

                        <dt class="col-6">Credit Limit</dt>
                        <dd class="col-6 text-right"><?= esc($creditLimitFMT); ?></dd>

                        <dt class="col-6">Total Debt</dt>
                        <dd class="col-6 text-right"><?= esc($debtSummaryFMT); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <?php if (! empty($alertNews)): ?>
        <div class="nk-block mt-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5 class="title mb-1">Latest News for Alerted Symbols</h5>
                    <p class="sub-text">Headlines related to your active trade alerts.</p>
                    <ul class="nk-news-list">
                        <?php foreach (array_slice($alertNews, 0, 10) as $item): ?>
                            <li class="nk-news-item">
                                <div class="nk-news-text">
                                    <a href="<?= esc($item['url'] ?? '#', 'attr'); ?>" target="_blank" rel="noopener">
                                        <?= esc($item['title'] ?? 'Untitled'); ?>
                                    </a>
                                </div>
                                <div class="nk-news-meta">
                                    <span class="nk-news-symbol text-primary">
                                        <?= esc($item['symbol'] ?? ''); ?>
                                    </span>
                                    <span class="nk-news-time text-soft">
                                        <?= esc($item['published_at'] ?? ''); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof $ !== 'undefined' && $.fn.DataTable) {
        $('#openAlertsTable').DataTable({
            pageLength: 10,
            order: [[0, 'asc']],
        });
    }

    const alertLabels = <?= json_encode($chartLabels, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    const alertPrices = <?= json_encode($chartPrices, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    const alertEma13  = <?= json_encode($chartEma13, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;

    const chartCanvas = document.getElementById('alertsTrendChart');
    if (chartCanvas && typeof Chart !== 'undefined' && alertLabels.length > 0) {
        const ctx = chartCanvas.getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: alertLabels,
                datasets: [
                    {
                        label: 'Last Price',
                        data: alertPrices,
                        borderWidth: 2,
                        borderColor: '#1f6bff',
                        tension: 0.3,
                        fill: false,
                        pointRadius: 3,
                    },
                    {
                        label: 'EMA13',
                        data: alertEma13,
                        borderWidth: 1,
                        borderColor: '#6576ff',
                        borderDash: [5, 5],
                        tension: 0.3,
                        fill: false,
                        pointRadius: 3,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false,
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Ticker',
                        },
                    },
                    y: {
                        display: true,
                        beginAtZero: false,
                    },
                },
            },
        });
    }
});
</script>