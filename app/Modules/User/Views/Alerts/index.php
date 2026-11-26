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
$scannerSignals = $scannerSignals ?? [];
$isPremium = (bool) ($isPremium ?? false);
$userWebhook = $userWebhook ?? [];
$userIncomingAlerts = $userIncomingAlerts ?? [];
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

    <!-- Centralized Trade Alert & Webhook Integrator -->
    <div class="row g-gs mt-3">
        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group align-items-start mb-3">
                        <div class="card-title">
                            <h5 class="title mb-1">
                                <em class="icon ni ni-link-alt text-primary me-1"></em>
                                Centralized 3rd-Party Alert &amp; Webhook Hub
                            </h5>
                            <p class="sub-text">
                                Send trade alerts from TradingView, TrendSpider, Discord bots, or custom trading systems directly into your personal feed.
                            </p>
                        </div>
                        <div class="card-tools">
                            <?php if ($isPremium): ?>
                                <span class="badge bg-success-dim text-success border border-success-subtle">
                                    <em class="icon ni ni-shield-check"></em> Premium Unlimited
                                </span>
                            <?php else: ?>
                                <span class="badge bg-warning-dim text-warning border border-warning-subtle">
                                    <em class="icon ni ni-info"></em> Free Tier (5 Alert Limit)
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (! $isPremium): ?>
                        <div class="alert alert-fill alert-light alert-icon alert-dismissible mb-4 border" role="alert">
                            <em class="icon ni ni-spark"></em>
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center w-100 gap-2">
                                <div>
                                    <strong>Free Tier Active:</strong> You can receive and view up to 5 incoming alerts. Upgrade to <strong>Premium</strong> for unlimited webhooks, SMS &amp; Discord dispatch, and real-time push alerts.
                                </div>
                                <a href="<?= esc(site_url('Memberships'), 'attr'); ?>" class="btn btn-sm btn-primary text-nowrap">
                                    Upgrade to Premium
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Webhook Generation & Configuration Bar -->
                    <div class="bg-lighter p-3 rounded mb-4">
                        <label class="form-label fw-bold mb-1" for="userWebhookUrl">Your Personal Inbound Webhook URL</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg font-monospace text-muted" id="userWebhookUrl" readonly value="<?= esc($userWebhook['webhook_url'] ?? site_url('API/Alerts/webhook/not-generated')); ?>">
                            <button type="button" class="btn btn-primary" id="btnCopyWebhook">
                                <em class="icon ni ni-copy"></em> <span>Copy URL</span>
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="btnRotateWebhook" title="Rotate your token if compromised">
                                <em class="icon ni ni-reload"></em> <span>Rotate Token</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2 small text-muted">
                            <div>
                                <span id="webhookCopyFeedback" class="text-success d-none fw-bold"><em class="icon ni ni-check"></em> Copied to clipboard!</span>
                                <span class="text-soft">Total alerts received via this webhook: <strong id="webhookAlertCount"><?= (int) ($userWebhook['alert_count'] ?? 0); ?></strong></span>
                            </div>
                            <a class="link link-primary small" data-bs-toggle="collapse" href="#webhookGuideCollapse" role="button" aria-expanded="false" aria-controls="webhookGuideCollapse">
                                <em class="icon ni ni-help"></em> TradingView Setup Guide &amp; Payload Format
                            </a>
                        </div>

                        <!-- Integration Guide Collapse -->
                        <div class="collapse mt-3" id="webhookGuideCollapse">
                            <div class="card card-inner bg-white border">
                                <h6 class="title mb-2">TradingView Alert Instructions</h6>
                                <ol class="small text-muted ps-3 mb-3">
                                    <li>Create an Alert on TradingView (or TrendSpider).</li>
                                    <li>Check the <strong>Webhook URL</strong> checkbox and paste your personal URL above.</li>
                                    <li>In the <strong>Message</strong> box, paste the JSON snippet below:</li>
                                </ol>
                                <div class="bg-dark text-light p-3 rounded small font-monospace position-relative">
                                    <pre class="m-0 text-light" id="tvJsonSnippet">{
  "ticker": "{{ticker}}",
  "action": "BUY",
  "price": {{close}},
  "strategy": "Trend Divergence",
  "timeframe": "{{interval}}",
  "stop_loss": {{plot("Stop Loss")}},
  "target_price": {{plot("Target 1")}},
  "message": "Strong breakout signal"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inbound Alerts Feed Table -->
                    <div class="card-title-group mb-2">
                        <div class="card-title">
                            <h6 class="title">My Inbound Custom Alerts</h6>
                        </div>
                        <div class="card-tools">
                            <div class="btn-group btn-group-sm" role="group" id="alertProviderFilter">
                                <button type="button" class="btn btn-outline-light active" data-filter="all">All</button>
                                <button type="button" class="btn btn-outline-light" data-filter="tradingview">TradingView</button>
                                <button type="button" class="btn btn-outline-light" data-filter="trendspider">TrendSpider</button>
                                <button type="button" class="btn btn-outline-light" data-filter="custom">Custom</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0" id="inboundAlertsTable">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>Action</th>
                                    <th>Price</th>
                                    <th>Strategy / Event</th>
                                    <th>Target / Stop</th>
                                    <th>Source</th>
                                    <th>Received</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($userIncomingAlerts)): ?>
                                    <?php foreach ($userIncomingAlerts as $inAlert): ?>
                                        <?php
                                        $act = strtoupper((string) ($inAlert['action'] ?? 'ALERT'));
                                        $badgeClass = 'bg-primary-dim text-primary';
                                        if ($act === 'BUY') {
                                            $badgeClass = 'bg-success-dim text-success';
                                        } elseif ($act === 'SELL') {
                                            $badgeClass = 'bg-danger-dim text-danger';
                                        } elseif (in_array($act, ['CALL', 'PUT'], true)) {
                                            $badgeClass = 'bg-info-dim text-info';
                                        }
                                        ?>
                                        <tr data-provider="<?= esc(strtolower((string) ($inAlert['provider'] ?? 'custom')), 'attr'); ?>" id="alert-row-<?= (int) $inAlert['id']; ?>">
                                            <td>
                                                <span class="badge bg-dark text-white fw-bold fs-6">
                                                    <?= esc($inAlert['ticker'] ?? 'N/A'); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge <?= $badgeClass; ?> fw-bold">
                                                    <?= esc($act); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <strong><?= isset($inAlert['price']) && $inAlert['price'] !== null ? '$' . number_format((float) $inAlert['price'], 2) : '-'; ?></strong>
                                            </td>
                                            <td>
                                                <div><strong><?= esc($inAlert['strategy'] ?? 'Signal'); ?></strong></div>
                                                <?php if (! empty($inAlert['message'])): ?>
                                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                                        <?= esc($inAlert['message']); ?>
                                                    </small>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <small class="text-muted d-block">
                                                    Target: <?= isset($inAlert['target_price']) && $inAlert['target_price'] !== null ? '$' . number_format((float) $inAlert['target_price'], 2) : 'None'; ?>
                                                </small>
                                                <small class="text-muted d-block">
                                                    Stop: <?= isset($inAlert['stop_loss']) && $inAlert['stop_loss'] !== null ? '$' . number_format((float) $inAlert['stop_loss'], 2) : 'None'; ?>
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark border">
                                                    <?= esc(ucfirst((string) ($inAlert['provider'] ?? 'Webhook'))); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-soft">
                                                    <?= esc($inAlert['created_at'] ?? 'Just now'); ?>
                                                </small>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-trigger btn-icon btn-sm btnViewPayload" data-payload="<?= esc($inAlert['raw_payload'] ?? '{}', 'attr'); ?>" title="View Raw JSON">
                                                    <em class="icon ni ni-code"></em>
                                                </button>
                                                <button type="button" class="btn btn-trigger btn-icon btn-sm text-danger btnDismissAlert" data-alert-id="<?= (int) $inAlert['id']; ?>" title="Dismiss">
                                                    <em class="icon ni ni-cross"></em>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr id="emptyAlertsRow">
                                        <td colspan="8" class="text-center py-4 text-muted">
                                            <em class="icon ni ni-inbox fs-2 d-block mb-1 text-soft"></em>
                                            No incoming custom alerts yet. Send an alert to your Webhook URL above to start receiving live signals.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-gs mt-3">
        <div class="col-lg-12">
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
                                    <th class="d-none">ID</th>
                                    <th>Ticker</th>
                                    <th>Company</th>
                                    <th>Exchange</th>
                                    <th>Last</th>
                                    <th>Chg %</th>
                                    <th>Volume</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Forecast</th>
                                    <th>Confidence</th>
                                    <th>Target</th>
                                    <th>Range</th>
                                    <th>Updated</th>
                                    <th>Chart</th>
                                    <th>Actions</th>
                                    <?php if (aiKimiEnabled()): ?>
                                        <th class="text-center">AI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //echo print_r($alertsTableData, true); ?>
                                <?php if (! empty($alertsTableData)): ?>
                                    <?php foreach ($alertsTableData as $alert): ?>
                                        <tr>
                                            <td class="d-none"><?= esc($alert['id'] ?? '-'); ?></td>
                                            <?php
                                            $ticker = $alert['ticker'] ?? '';
                                            $exchange = $alert['exchange'] ?? '';
                                            $previewSlug = $exchange ? $exchange . '-' . $ticker : $ticker;
                                            $previewUrl = site_url('Preview/Alert/' . urlencode($previewSlug));
                                            ?>
                                            <td>
                                                <strong>
                                                    <a href="<?= esc($previewUrl, 'attr'); ?>" class="text-primary">
                                                        <?= esc($ticker ?: '-'); ?>
                                                    </a>
                                                </strong>
                                            </td>
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
                                            <?php
                                            $forecastDirection = $alert['forecast_direction'] ?? 'neutral';
                                            $forecastConfidence = (int) ($alert['forecast_confidence'] ?? 0);
                                            $forecastBadge = 'bg-secondary';
                                            if ($forecastConfidence >= 70) {
                                                $forecastBadge = 'bg-success';
                                            } elseif ($forecastConfidence >= 50) {
                                                $forecastBadge = 'bg-warning';
                                            }
                                            ?>
                                            <td><span class="badge <?= esc($forecastBadge, 'attr'); ?> text-uppercase"><?= esc($forecastDirection); ?></span></td>
                                            <td><?= esc($forecastConfidence); ?>%</td>
                                            <td><?= esc(number_format((float) ($alert['forecast_target_price'] ?? 0), 2)); ?></td>
                                            <td><?= esc(number_format((float) ($alert['forecast_range_low'] ?? 0), 2)); ?> - <?= esc(number_format((float) ($alert['forecast_range_high'] ?? 0), 2)); ?></td>
                                            <td><?= esc($alert['forecast_updated_at'] ?? '—'); ?></td>
                                            <td>
                                                <?php if (! empty($alert['chart_link'])): ?>
                                                    <a href="<?= esc($alert['chart_link'], 'attr'); ?>" target="_blank" rel="noopener" class="btn btn-xs btn-outline-primary">
                                                        TV
                                                    </a>
                                                <?php elseif (! empty($exchange) && ! empty($ticker)): ?>
                                                    <a href="https://www.tradingview.com/symbols/<?= esc($exchange . '-' . $ticker, 'attr'); ?>/"
                                                       class="btn btn-xs btn-outline-primary" target="_blank" rel="noopener">
                                                        TV
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-soft">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-xs btn-outline-secondary forecast-refresh-btn" data-ticker="<?= esc($ticker, 'attr'); ?>">Re-Forecast</button>
                                                <button class="btn btn-xs btn-outline-primary mt-1 forecast-modal-btn" data-ticker="<?= esc($ticker, 'attr'); ?>">Details</button>
                                            </td>
                                            <?php if (aiKimiEnabled()): ?>
                                                <td class="text-center">
                                                    <?php if (! empty($alert['id'])): ?>
                                                        <button class="btn btn-xs btn-outline-secondary ai-trade-analysis" data-alert-id="<?= esc($alert['id'], 'attr'); ?>">
                                                            AI Analysis
                                                        </button>
                                                        <button class="btn btn-xs btn-outline-primary mt-1 ai-alert-breakdown" data-alert-id="<?= esc($alert['id'], 'attr'); ?>">
                                                            Kimi AI Breakdown
                                                        </button>
                                                    <?php else: ?>
                                                        <span class="text-soft">—</span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php $colspan = aiKimiEnabled() ? 16 : 15; ?>
                                    <tr>
                                        <td colspan="<?= esc($colspan, 'attr'); ?>" class="text-center text-soft">
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
    </div>
    <div class="row g-gs mt-3">
        <div class="col-lg-12 h-20">
            

    <div class="row g-gs mt-3">
        <div class="col-lg-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5 class="title mb-2">Scanner Signals (Watchlist)</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>Ticker</th><th>Category</th><th>Price</th><th>Status</th><th>Source</th></tr></thead>
                            <tbody>
                                <?php if (! empty($scannerSignals)): foreach ($scannerSignals as $signal): ?>
                                    <tr>
                                        <td><?= esc($signal['ticker'] ?? '-'); ?></td>
                                        <td><?= esc($signal['category'] ?? '-'); ?></td>
                                        <td><?= esc(number_format((float) ($signal['price'] ?? 0), 2)); ?></td>
                                        <td><?= esc($signal['status'] ?? 'Opened'); ?></td>
                                        <td><?= esc($signal['source'] ?? 'scanner'); ?></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                    <tr><td colspan="5" class="text-soft">No scanner watchlist signals yet.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<?php if (aiKimiEnabled()): ?>
<div class="modal fade" tabindex="-1" id="aiTradeAnalysisModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">AI Trade Analysis</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </button>
            </div>
            <div class="modal-body">
                <div id="aiTradeAnalysisBody" class="wysiwyg-content"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof $ !== 'undefined' && $.fn.DataTable) {
        initDataTableSafe($('#openAlertsTable'),{
            pageLength: 10,
            order: [[0, 'asc']],
        });
    }

    <?php if (aiKimiEnabled()): ?>
    const aiModalElement = document.getElementById('aiTradeAnalysisModal');
    const aiModalBody = document.getElementById('aiTradeAnalysisBody');
    const aiModal = (window.bootstrap && aiModalElement) ? new bootstrap.Modal(aiModalElement) : null;

    document.querySelectorAll('.ai-trade-analysis').forEach((btn) => {
        btn.addEventListener('click', async () => {
            const alertId = btn.getAttribute('data-alert-id');
            if (!alertId || !aiModalBody) return;

            aiModalBody.innerHTML = '<p class="text-soft">Generating analysis...</p>';

            try {
                const response = await fetch(`/Advisor/tradeAnalysis/${alertId}`, { method: 'POST' });
                const json = await response.json();

                if (json?.status === 'disabled') {
                    aiModalBody.textContent = json.message || 'Kimi AI is disabled.';
                } else if (json?.content) {
                    aiModalBody.innerHTML = json.content;
                } else if (json?.data?.choices?.[0]?.message?.content) {
                    aiModalBody.innerHTML = json.data.choices[0].message.content;
                } else {
                    aiModalBody.textContent = 'No analysis available.';
                }
            } catch (e) {
                aiModalBody.textContent = 'Unable to load trade analysis.';
            }

            if (aiModal) {
                aiModal.show();
            } else if (window.jQuery) {
                $('#aiTradeAnalysisModal').modal('show');
            } else if (aiModalElement) {
                aiModalElement.classList.add('show');
                aiModalElement.style.display = 'block';
            }
        });

        document.querySelectorAll('.ai-alert-breakdown').forEach((btn) => {
            btn.addEventListener('click', async () => {
                const alertId = btn.getAttribute('data-alert-id');
                if (!alertId || !aiModalBody) return;
                aiModalBody.textContent = 'Requesting Kimi breakdown...';
                const response = await fetch(`/Alerts/generateAlertCommentary/${alertId}`);
                const json = await response.json();
                const content = json?.data?.data?.choices?.[0]?.message?.content || json?.data?.commentary || JSON.stringify(json?.data || json);
                aiModalBody.textContent = content;
                aiModal?.show();
            });
        });
    });
    <?php endif; ?>

    document.querySelectorAll('.forecast-refresh-btn').forEach((btn) => {
        btn.addEventListener('click', async () => {
            const ticker = btn.getAttribute('data-ticker');
            if (!ticker) return;

            btn.disabled = true;
            btn.textContent = 'Refreshing...';

            try {
                const response = await fetch('/API/Investments/reforecastTicker', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ ticker, timeframes: '5m,10m' }),
                });
                const json = await response.json();
                if (json?.status === 'success') {
                    window.location.reload();
                }
            } catch (e) {
                console.error('Forecast refresh failed', e);
            } finally {
                btn.disabled = false;
                btn.textContent = 'Re-Forecast';
            }
        });
    });

    document.querySelectorAll('.forecast-modal-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            const ticker = btn.getAttribute('data-ticker');
            if (!ticker) return;
            const url = `/Investments/forecastModal/${ticker}`;
            if (typeof window.dynamicModalLoader === 'function') {
                window.dynamicModalLoader(url);
            } else {
                window.location.href = url;
            }
        });
    });

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

<!-- Modal: View Raw Webhook Payload -->
<div class="modal fade" id="viewPayloadModal" tabindex="-1" role="dialog" aria-labelledby="viewPayloadModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPayloadModalTitle">Inbound Webhook Payload</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <pre class="bg-dark text-light p-3 rounded font-monospace small" id="payloadJsonDisplay" style="max-height: 400px; overflow-y: auto;"></pre>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Copy Webhook URL
    var copyBtn = document.getElementById('btnCopyWebhook');
    var webhookInput = document.getElementById('userWebhookUrl');
    var feedback = document.getElementById('webhookCopyFeedback');

    if (copyBtn && webhookInput) {
        copyBtn.addEventListener('click', function () {
            webhookInput.select();
            webhookInput.setSelectionRange(0, 99999);
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(webhookInput.value).then(showFeedback);
            } else {
                document.execCommand('copy');
                showFeedback();
            }
        });
    }

    function showFeedback() {
        if (!feedback) return;
        feedback.classList.remove('d-none');
        setTimeout(function () {
            feedback.classList.add('d-none');
        }, 3000);
    }

    // 2. Rotate Webhook Token
    var rotateBtn = document.getElementById('btnRotateWebhook');
    if (rotateBtn) {
        rotateBtn.addEventListener('click', function () {
            if (!confirm('Are you sure you want to rotate your webhook token? You will need to update TradingView and your other services with the new URL.')) {
                return;
            }

            rotateBtn.disabled = true;
            rotateBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Rotating...';

            var csrfName = window.CSRF_TOKEN ? window.CSRF_TOKEN.name : '<?= csrf_token() ?>';
            var csrfHash = window.CSRF_TOKEN ? window.CSRF_TOKEN.hash : '<?= csrf_hash() ?>';

            var formData = new FormData();
            formData.append(csrfName, csrfHash);

            fetch('<?= site_url('API/Alerts/regenerateWebhook'); ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-Token': csrfHash
                },
                body: formData
            })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                rotateBtn.disabled = false;
                rotateBtn.innerHTML = '<em class="icon ni ni-reload"></em> <span>Rotate Token</span>';
                if (data.status === 'success' && data.data && data.data.webhook_url) {
                    webhookInput.value = data.data.webhook_url;
                    var countEl = document.getElementById('webhookAlertCount');
                    if (countEl) countEl.textContent = '0';
                    alert('Your webhook token has been regenerated successfully!');
                } else {
                    alert(data.message || 'Failed to rotate webhook token');
                }
            })
            .catch(function (err) {
                rotateBtn.disabled = false;
                rotateBtn.innerHTML = '<em class="icon ni ni-reload"></em> <span>Rotate Token</span>';
                console.error('Error rotating token:', err);
                alert('An error occurred while rotating your token.');
            });
        });
    }

    // 3. View Payload Modal
    document.querySelectorAll('.btnViewPayload').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var raw = this.getAttribute('data-payload') || '{}';
            var formatted = raw;
            try {
                var parsed = JSON.parse(raw);
                formatted = JSON.stringify(parsed, null, 2);
            } catch (e) {
                formatted = raw;
            }
            var display = document.getElementById('payloadJsonDisplay');
            if (display) display.textContent = formatted;

            var modalEl = document.getElementById('viewPayloadModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            }
        });
    });

    // 4. Dismiss Inbound Alert
    document.querySelectorAll('.btnDismissAlert').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var alertId = this.getAttribute('data-alert-id');
            if (!alertId || !confirm('Dismiss this alert from your active feed?')) {
                return;
            }

            var csrfName = window.CSRF_TOKEN ? window.CSRF_TOKEN.name : '<?= csrf_token() ?>';
            var csrfHash = window.CSRF_TOKEN ? window.CSRF_TOKEN.hash : '<?= csrf_hash() ?>';

            var formData = new FormData();
            formData.append(csrfName, csrfHash);

            fetch('<?= site_url('API/Alerts/dismissAlert'); ?>/' + alertId, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-Token': csrfHash
                },
                body: formData
            })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                if (data.status === 'success') {
                    var row = document.getElementById('alert-row-' + alertId);
                    if (row) row.remove();
                }
            })
            .catch(function (err) {
                console.error('Dismiss error:', err);
            });
        });
    });

    // 5. Provider Filtering
    var filterButtons = document.querySelectorAll('#alertProviderFilter button');
    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterButtons.forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');

            var filter = this.getAttribute('data-filter');
            var rows = document.querySelectorAll('#inboundAlertsTable tbody tr[data-provider]');
            var visibleCount = 0;

            rows.forEach(function (row) {
                var prov = row.getAttribute('data-provider');
                if (filter === 'all' || prov === filter) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            var emptyRow = document.getElementById('emptyAlertsRow');
            if (emptyRow) {
                emptyRow.style.display = visibleCount === 0 && rows.length > 0 ? '' : 'none';
            }
        });
    });
});
</script>
