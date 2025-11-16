<?php
use CodeIgniter\I18n\Time;

if (!function_exists('miw_format_currency')) {
    function miw_format_currency($value): string
    {
        if (!is_numeric($value)) {
            $value = preg_replace('/[^0-9\.-]/', '', (string) $value);
        }
        $value = (float) ($value ?: 0.0);
        $prefix = $value < 0 ? '-$' : '$';
        return $prefix . number_format(abs($value), 2);
    }
}

if (!function_exists('miw_format_number')) {
    function miw_format_number($value, int $decimals = 0): string
    {
        if (!is_numeric($value)) {
            $value = preg_replace('/[^0-9\.-]/', '', (string) $value);
        }
        return number_format((float) ($value ?: 0.0), $decimals);
    }
}

if (!function_exists('miw_relative_time')) {
    function miw_relative_time(?string $datetime): string
    {
        if (empty($datetime)) {
            return '—';
        }
        try {
            return Time::parse($datetime)->humanize();
        } catch (\Throwable $e) {
            return $datetime;
        }
    }
}

$assetsSummary     = $assets ?? [];
$budgetSummary     = $budget ?? [];
$portfolioSummary  = $portfolio ?? [];
$projectsSummary   = $projects ?? [];
$alertsSummary     = $alerts ?? [];
$newsSummary       = $news ?? [];

$netWorthTrend     = $assetsSummary['trend'] ?? [];
$allocationRaw     = $portfolioSummary['allocation'] ?? [];
$allocationFiltered = array_filter(is_array($allocationRaw) ? $allocationRaw : [], static fn ($value) => abs((float) $value) > 0.01);
$allocationLabels  = array_keys($allocationFiltered);
$allocationValues  = array_map(static fn ($value) => (float) $value, array_values($allocationFiltered));

$netWorthLabels    = array_map(static fn ($row) => (string) ($row['label'] ?? ''), $netWorthTrend);
$netWorthValues    = array_map(static fn ($row) => (float) ($row['value'] ?? 0), $netWorthTrend);

$netWorthChartData = [
    'labels' => $netWorthLabels,
    'values' => $netWorthValues,
];
$allocationChartData = [
    'labels' => $allocationLabels,
    'values' => $allocationValues,
];

$activeProjects    = $projectsSummary['topProjects'] ?? [];
$recentAlerts      = $alertsSummary['recent'] ?? [];
$newsItems         = $newsSummary['items'] ?? [];
$todayLabel        = date('l, F j, Y');
$displayName       = $cuDisplayName ?? $cuUsername ?? 'Investor';
$availableToInvest = $budgetSummary['availableToInvest'] ?? 0.0;
?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Executive Dashboard</h3>
            <div class="nk-block-des text-soft">
                <p>Welcome back, <?= esc($displayName); ?>. Here's your financial pulse for <?= esc($todayLabel); ?>.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="/user/budget" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Budget Reports</span></a></li>
                        <li><a href="/user/investments" class="btn btn-white btn-dim btn-outline-secondary"><em class="icon ni ni-chart-up"></em><span>Portfolio</span></a></li>
                        <li class="nk-block-tools-opt">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="/dashboard/alerts/createTradeAlert"><em class="icon ni ni-activity-round"></em><span>Create Trade Alert</span></a></li>
                                        <li><a href="/user/projects"><em class="icon ni ni-briefcase"></em><span>New Project Commitment</span></a></li>
                                        <li><a href="/user/assets"><em class="icon ni ni-building"></em><span>Add Asset</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <div class="col-lg-4">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Net Worth Snapshot</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-info" data-bs-toggle="tooltip" title="Total assets minus liabilities"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"><?= miw_format_currency($assetsSummary['netWorth'] ?? 0.0); ?></span>
                        <span class="change up text-success"><em class="icon ni ni-trend-up"></em><?= miw_format_currency($assetsSummary['totalAssets'] ?? 0.0); ?> assets</span>
                    </div>
                    <ul class="nk-activity">
                        <li class="nk-activity-item">
                            <div class="nk-activity-media"><em class="icon ni ni-wallet"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Total Assets</div>
                                <div class="amount text-success"><?= miw_format_currency($assetsSummary['totalAssets'] ?? 0.0); ?></div>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media"><em class="icon ni ni-minus-round"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Total Liabilities</div>
                                <div class="amount text-danger"><?= miw_format_currency($assetsSummary['totalLiabilities'] ?? 0.0); ?></div>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-3">
                        <canvas id="netWorthSparkline" height="120" data-chart='<?= esc(json_encode($netWorthChartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)); ?>'></canvas>
                    </div>
                    <?php if (!empty($assetsSummary['breakdown'])): ?>
                    <div class="mt-4">
                        <h6 class="mb-2 text-muted">Asset Breakdown</h6>
                        <div class="row g-2">
                            <?php foreach ($assetsSummary['breakdown'] as $label => $amount): ?>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between align-items-center text-soft">
                                        <span><?= esc(ucwords(str_replace('_', ' ', $label))); ?></span>
                                        <span><?= miw_format_currency($amount); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Monthly Budget Health</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-help" data-bs-toggle="tooltip" title="Income versus expenses for the current month"></em>
                        </div>
                    </div>
                    <div class="nk-order-ovwg-data">
                        <div class="amount"><?= miw_format_currency($budgetSummary['monthlyNet'] ?? 0.0); ?></div>
                        <div class="info">Net cash flow</div>
                    </div>
                    <div class="progress progress-lg mt-3">
                        <?php
                        $income = max((float) ($budgetSummary['monthlyIncome'] ?? 0.0), 0);
                        $expenses = max((float) ($budgetSummary['monthlyExpenses'] ?? 0.0), 0);
                        $totalFlow = $income + $expenses;
                        $incomePercent = $totalFlow > 0 ? ($income / $totalFlow) * 100 : 50;
                        ?>
                        <div class="progress-bar bg-success" style="width: <?= esc(number_format($incomePercent, 2)); ?>%"></div>
                        <div class="progress-bar bg-danger" style="width: <?= esc(number_format(100 - $incomePercent, 2)); ?>%"></div>
                    </div>
                    <ul class="nk-activity mt-3">
                        <li class="nk-activity-item">
                            <div class="nk-activity-media"><em class="icon ni ni-arrow-down-left"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Income</div>
                                <div class="amount text-success"><?= miw_format_currency($budgetSummary['monthlyIncome'] ?? 0.0); ?></div>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media"><em class="icon ni ni-arrow-up-right"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Expenses</div>
                                <div class="amount text-danger"><?= miw_format_currency($budgetSummary['monthlyExpenses'] ?? 0.0); ?></div>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media"><em class="icon ni ni-layers"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Available to Invest</div>
                                <div class="amount text-info"><?= miw_format_currency($availableToInvest); ?></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Portfolio Summary</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-info" data-bs-toggle="tooltip" title="Live totals across equities, ETFs, crypto, and projects"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"><?= miw_format_currency($portfolioSummary['totalValue'] ?? 0.0); ?></span>
                        <span class="change up text-primary"><em class="icon ni ni-layers"></em><?= miw_format_number($portfolioSummary['positionCount'] ?? 0); ?> positions</span>
                    </div>
                    <div class="nk-order-ovwg-data mt-1">
                        <div class="title">Unrealized P&amp;L</div>
                        <div class="amount <?= ($portfolioSummary['pnl'] ?? 0) >= 0 ? 'text-success' : 'text-danger'; ?>"><?= miw_format_currency($portfolioSummary['pnl'] ?? 0.0); ?></div>
                    </div>
                    <div class="mt-3">
                        <canvas id="allocationChart" height="140" data-chart='<?= esc(json_encode($allocationChartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)); ?>'></canvas>
                    </div>
                    <?php if ($allocationFiltered): ?>
                    <div class="mt-4">
                        <div class="row g-1">
                            <?php foreach ($allocationFiltered as $label => $amount): ?>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between text-soft">
                                        <span><?= esc(ucfirst($label)); ?></span>
                                        <span><?= miw_format_currency($amount); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-gs mt-1">
        <div class="col-xxl-6">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Active Projects</h6>
                            <span class="text-soft">Capital deployed and upcoming deadlines.</span>
                        </div>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-outline-primary" href="/user/projects">Manage Projects</a>
                        </div>
                    </div>
                    <div class="nk-order-ovwg-data">
                        <div class="amount"><?= miw_format_number($projectsSummary['activeCount'] ?? 0); ?></div>
                        <div class="info">Active initiatives</div>
                    </div>
                    <div class="nk-order-ovwg-data mt-1">
                        <div class="amount text-primary"><?= miw_format_currency($projectsSummary['totalCommitments'] ?? 0.0); ?></div>
                        <div class="info">Total committed capital</div>
                    </div>
                    <div class="nk-order-ovwg-data mt-1">
                        <div class="amount text-soft">Next deadline: <?= $projectsSummary['nextDeadline'] ? esc(date('M j, Y', strtotime($projectsSummary['nextDeadline']))) : 'No upcoming due dates'; ?></div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>Project</th>
                                    <th>Status</th>
                                    <th class="text-end">Allocation</th>
                                    <th class="text-end">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($activeProjects): ?>
                                    <?php foreach ($activeProjects as $project): ?>
                                        <tr>
                                            <td><?= esc($project['title'] ?? 'Project'); ?></td>
                                            <td><span class="badge bg-outline-primary"><?= esc(ucwords($project['status'] ?? 'pending')); ?></span></td>
                                            <td class="text-end"><?= miw_format_currency($project['allocation'] ?? 0.0); ?></td>
                                            <td class="text-end">
                                                <?php if (!empty($project['deadline'])): ?>
                                                    <?= esc(date('M j', strtotime($project['deadline']))); ?>
                                                <?php else: ?>
                                                    —
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center text-soft">No project commitments yet.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Recent Trade Alerts</h6>
                            <span class="text-soft">Live strategies and open signals.</span>
                        </div>
                        <div class="card-tools">
                            <span class="badge bg-success">Open Alerts: <?= miw_format_number($alertsSummary['openCount'] ?? 0); ?></span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ticker</th>
                                    <th>Direction</th>
                                    <th class="text-end">Entry</th>
                                    <th class="text-end">Stop</th>
                                    <th>Status</th>
                                    <th class="text-end">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($recentAlerts): ?>
                                    <?php foreach ($recentAlerts as $alert): ?>
                                        <tr>
                                            <td><span class="badge bg-outline-secondary"><?= esc($alert['ticker'] ?? '—'); ?></span></td>
                                            <td><?= esc(ucfirst($alert['direction'] ?? '')); ?></td>
                                            <td class="text-end"><?= miw_format_currency($alert['entry'] ?? 0.0); ?></td>
                                            <td class="text-end"><?= miw_format_currency($alert['stop'] ?? 0.0); ?></td>
                                            <td><span class="badge bg-outline-primary"><?= esc($alert['status'] ?? ''); ?></span></td>
                                            <td class="text-end text-soft"><?= esc(miw_relative_time($alert['updated_at'] ?? null)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="6" class="text-center text-soft">No alerts to show.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-gs mt-1">
        <div class="col-xxl-8">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Market News &amp; Highlights</h6>
                            <span class="text-soft">Curated from alerts@mymiwallet.com and MarketAux feeds.</span>
                        </div>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-outline-secondary" href="/news">News Center</a>
                        </div>
                    </div>
                    <div class="gy-3">
                        <?php if ($newsItems): ?>
                            <?php foreach ($newsItems as $item): ?>
                                <div class="border-bottom pb-2 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0"><?= esc($item['title'] ?? 'Headline'); ?></h6>
                                        <?php if (!empty($item['symbol'])): ?>
                                            <span class="badge bg-outline-primary"><?= esc($item['symbol']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                        $rawText = $item['summary']
                                            ?? $item['content']
                                            ?? $item['body']
                                            ?? null;

                                        $preview = $rawText ? miw_news_preview($rawText, 240) : null;
                                    ?>
                                    <?php if (!empty($preview)): ?>
                                    <p class="text-soft mt-1 mb-1 small"><?= esc($preview); ?></p>
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between align-items-center small text-soft">
                                        <span><?= esc($item['source'] ?? 'Market News'); ?></span>
                                        <span><?= esc(miw_relative_time($item['published_at'] ?? null)); ?></span>
                                        <?php if (!empty($item['url'])): ?>
                                            <a class="link-primary" target="_blank" rel="noopener" href="<?= esc($item['url']); ?>">View</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center text-soft mb-0">News feeds are quiet. Check back soon.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Quick Links</h6>
                            <span class="text-soft">Jump into deeper workflows.</span>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12">
                            <a class="btn btn-outline-primary w-100" href="/user/budget">Go to Budget Overview</a>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-outline-secondary w-100" href="/user/assets">Manage Assets</a>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-outline-success w-100" href="/dashboard/alerts">View Trade Alerts</a>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-outline-info w-100" href="/user/projects">Review Projects</a>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-outline-warning w-100" href="/news">Marketing / News Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style <?= $nonce['style'] ?? ''; ?>>
    .nk-order-ovwg-data .amount { font-weight: 700; }
    .nk-order-ovwg-data .info { color: #8094ae; font-size: 0.9rem; }
    .table thead th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.04em; }
    .table td, .table th { vertical-align: middle; }
</style>

<script <?= $nonce['script'] ?? ''; ?>>
(function() {
    const sparklineEl = document.getElementById('netWorthSparkline');
    const allocationEl = document.getElementById('allocationChart');

    function parseChartData(el) {
        if (!el || !el.dataset.chart) { return null; }
        try {
            return JSON.parse(el.dataset.chart);
        } catch (err) {
            console.error('Failed to parse chart data', err);
            return null;
        }
    }

    function ensureChartJs(cb) {
        if (window.Chart) {
            cb(window.Chart);
            return;
        }
        document.addEventListener('ChartJSReady', function () { cb(window.Chart); }, { once: true });
    }

    ensureChartJs(function(Chart) {
        const sparklineData = parseChartData(sparklineEl);
        if (sparklineEl && sparklineData && sparklineData.labels.length) {
            new Chart(sparklineEl.getContext('2d'), {
                type: 'line',
                data: {
                    labels: sparklineData.labels,
                    datasets: [{
                        label: 'Net Worth',
                        data: sparklineData.values,
                        borderColor: '#6576ff',
                        backgroundColor: 'rgba(101, 118, 255, 0.15)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 3,
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { display: false },
                        x: { grid: { display: false } }
                    },
                    elements: { point: { radius: 0 } },
                    maintainAspectRatio: false,
                }
            });
        }

        const allocationData = parseChartData(allocationEl);
        if (allocationEl && allocationData && allocationData.labels.length) {
            new Chart(allocationEl.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: allocationData.labels.map(label => label.toUpperCase()),
                    datasets: [{
                        data: allocationData.values,
                        backgroundColor: ['#6576ff', '#1ee0ac', '#ff63a5', '#ffa353', '#8094ae'],
                        borderWidth: 0,
                    }]
                },
                options: {
                    plugins: { legend: { position: 'bottom' } },
                    cutout: '65%',
                    maintainAspectRatio: false,
                }
            });
        }
    });
})();
</script>