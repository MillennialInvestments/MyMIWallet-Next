<?php
use CodeIgniter\I18n\Time;
$nonce = is_array($nonce ?? null) ? $nonce : [];

if (!function_exists('miw_news_preview')) {
    function miw_news_preview(string $text, int $limit = 160): string
    {
        $text = trim(strip_tags($text));
        if ($text === '') {
            return '';
        }

        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        return mb_substr($text, 0, $limit) . '…';
    }
}

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

$forecastConfig = config('MyMIForecasting');
$showConfidenceHeatmap = $forecastConfig->features['confidenceHeatmaps'] ?? false;
$heatmapTimeframes = $forecastConfig->heatmap['timeframes'] ?? ['5m', '15m', '1h'];
$heatmapWindow = $forecastConfig->heatmap['defaultWindow'] ?? '6h';

$activeProjects    = $projectsSummary['topProjects'] ?? [];
$recentAlerts      = $alertsSummary['recent'] ?? [];
$newsItems         = $newsSummary['items'] ?? [];
$todayAlerts       = $dailyTradeAlerts ?? [];
$todayLabel        = date('l, F j, Y');
$displayName       = $cuDisplayName ?? $cuUsername ?? 'Investor';
$availableToInvest = $budgetSummary['availableToInvest'] ?? 0.0;
$aiSessionKey      = $aiSessionKey ?? '';
$aiNotesList       = $aiNotes ?? [];
$setupStatus       = $setupStatus ?? [];
$setupPrefs        = $setupPrefs ?? [];
$setupContext      = $setupContext ?? 'dashboard';
$opsHealth         = is_array($opsHealth ?? null) ? $opsHealth : [];
$opsScore          = $opsHealth['score'] ?? null;
$opsStatus         = $opsHealth['status'] ?? 'unknown';
$opsGeneratedAt    = $opsHealth['generated_at'] ?? null;
$opsFindings       = is_array($opsHealth['top_findings'] ?? null) ? $opsHealth['top_findings'] : [];
$emailAuditHealth  = is_array($emailAuditHealth ?? null) ? $emailAuditHealth : [];
$emailAuditSummary = is_array($emailAuditHealth['summary'] ?? null) ? $emailAuditHealth['summary'] : [];
$emailAuditStatus  = $emailAuditHealth['status'] ?? 'unknown';
$emailAuditMessage = $emailAuditHealth['message'] ?? 'Audit unavailable';
$emailAuditGeneratedAt = $emailAuditHealth['generated_at'] ?? null;
$emailAuditTotal   = (int) ($emailAuditSummary['total_scanned'] ?? 0);
$emailAuditTrade   = (int) ($emailAuditSummary['trade_count'] ?? 0);
$emailAuditNews    = (int) ($emailAuditSummary['news_count'] ?? 0);
$emailAuditFailures = (int) ($emailAuditSummary['failed'] ?? 0);
$emailAuditFallbacks = (int) ($emailAuditSummary['fallbacks_applied'] ?? 0);
$squeezeHighRiskCount = (int) ($squeezeHighRiskCount ?? 0);
$squeezeState = 'success';
$squeezeStateLabel = 'Calm';
if ($squeezeHighRiskCount >= 3) {
    $squeezeState = 'danger';
    $squeezeStateLabel = 'High';
} elseif ($squeezeHighRiskCount >= 1) {
    $squeezeState = 'warning';
    $squeezeStateLabel = 'Elevated';
}
$showSetupBanner   = ! empty($setupStatus)
    && ! ($setupStatus['overall_complete'] ?? false)
    && ! ($setupPrefs['dismiss_all'] ?? false)
    && ! ($setupPrefs['dismiss_dashboard'] ?? false);
$sourceAwareWelcome = is_array($sourceAwareWelcome ?? null) ? $sourceAwareWelcome : [];
$showSourceAwareWelcome = (bool) ($sourceAwareWelcome['show'] ?? false);
$sourceWelcomeActions = is_array($sourceAwareWelcome['nextActions'] ?? null) ? $sourceAwareWelcome['nextActions'] : [];
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
                        <li><a href="/Budget" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Budget Reports</span></a></li>
                        <li><a href="/Investments" class="btn btn-white btn-dim btn-outline-secondary"><em class="icon ni ni-chart-up"></em><span>Portfolio</span></a></li>
                        <?php if (aiKimiEnabled()): ?>
                        <li><a href="/Advisor#panel-health" class="btn btn-white btn-dim btn-outline-info"><em class="icon ni ni-bulb"></em><span>AI Financial Review</span></a></li>
                        <?php endif; ?>
                        <li class="nk-block-tools-opt">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus text-white"></em></a>
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

<?php if (aiKimiEnabled()): ?>
<ul class="nk-menu mb-4">
    <li class="nk-menu-item">
        <a href="/Advisor" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-bulb"></em></span>
            <span class="nk-menu-text">MyMI AI Advisor</span>
        </a>
    </li>
</ul>
<?php endif; ?>

<?php if ($showSourceAwareWelcome): ?>
<div class="alert alert-primary mb-4 border border-primary-subtle" id="sourceAwareWelcomeCard">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <em class="icon ni ni-discord"></em>
                <strong>Welcome to MyMI Wallet from Discord</strong>
            </div>
            <div class="small mb-2">Use these next actions to personalize your first dashboard session.</div>
            <div class="d-flex flex-wrap gap-2">
                <?php foreach (array_slice($sourceWelcomeActions, 0, 5) as $action): ?>
                    <?php $actionLabel = (string) ($action['label'] ?? 'Next step'); ?>
                    <?php $actionUrl = (string) ($action['url'] ?? '/Dashboard'); ?>
                    <a class="btn btn-sm btn-outline-primary" href="<?= esc($actionUrl); ?>"><?= esc($actionLabel); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="d-flex align-items-start gap-2">
            <button type="button" class="btn btn-sm btn-primary" id="sourceWelcomeDoneBtn">Done</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="sourceWelcomeDismissBtn">Dismiss</button>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('sourceAwareWelcomeCard');
    if (!card) {
        return;
    }

    const endpoint = <?= json_encode(site_url('Dashboard/onboarding/source-welcome/complete')) ?>;
    const csrfName = <?= json_encode(csrf_token()) ?>;
    const csrfHash = <?= json_encode(csrf_hash()) ?>;
    const submit = async (action) => {
        const body = new URLSearchParams();
        body.append('action', action);
        body.append(csrfName, csrfHash);
        await fetch(endpoint, {
            method: 'POST',
            credentials: 'same-origin',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            body: body.toString(),
        });
        card.remove();
    };

    document.getElementById('sourceWelcomeDoneBtn')?.addEventListener('click', () => submit('completed'));
    document.getElementById('sourceWelcomeDismissBtn')?.addEventListener('click', () => submit('dismissed'));
});
</script>
<?php endif; ?>

<?php if ($showSetupBanner): ?>
<div class="alert alert-info d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4" data-setup-banner="dashboard">
    <div>
        <strong>Continue setup</strong>
        <div class="small text-muted">Complete your onboarding checklist to unlock personalized budget and investment insights.</div>
    </div>
    <button class="btn btn-primary dynamicModalLoader" data-formtype="Setup" data-endpoint="continueSetup" data-accountid="dashboard">Continue setup</button>
</div>
<?php endif; ?>

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
                            <div class="nk-activity-media"><em class="icon ni ni-minus-round"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Total Liabilities</div>
                                <div class="amount text-danger"><?= miw_format_currency($assetsSummary['totalLiabilities'] ?? 0.0); ?></div>
                            </div>
                        </li>
                    </ul>
                    <!-- <div class="mt-3">
                        <canvas id="netWorthSparkline" height="120" data-chart='<?= esc(json_encode($netWorthChartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)); ?>'></canvas>
                    </div> -->
                    <?php if (!empty($assetsSummary['breakdown'])): ?>
                    <div class="mt-1">
                        <h6 class="mb-2 text-muted">Asset Breakdown</h6>
                        <div class="row g-2">
                            <?php foreach ($assetsSummary['breakdown'] as $label => $amount): ?>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between align-items-center text-soft">
                                        <span><strong><?= esc(ucwords(str_replace('_', ' ', $label))); ?></strong></span>
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
                    <div class="progress progress-lg">
                        <?php
                        $income = max((float) ($budgetSummary['monthlyIncome'] ?? 0.0), 0);
                        $expenses = max((float) ($budgetSummary['monthlyExpenses'] ?? 0.0), 0);
                        $totalFlow = $income + $expenses;
                        $incomePercent = $totalFlow > 0 ? ($income / $totalFlow) * 100 : 50;
                        ?>
                        <div class="progress-bar bg-success" style="width: <?= esc(number_format($incomePercent, 2)); ?>%"></div>
                        <div class="progress-bar bg-danger" style="width: <?= esc(number_format(100 - $incomePercent, 2)); ?>%"></div>
                    </div>
                    <ul class="nk-activity ">
                        <li class="nk-activity-item px-1">
                            <div class="nk-activity-media"><em class="icon ni ni-arrow-down-left"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Income</div>
                                <div class="amount text-success"><?= miw_format_currency($budgetSummary['monthlyIncome'] ?? 0.0); ?></div>
                            </div>
                            <div class="nk-activity-media"><em class="icon ni ni-arrow-up-right"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Expenses</div>
                                <div class="amount text-danger"><?= miw_format_currency($budgetSummary['monthlyExpenses'] ?? 0.0); ?></div>
                            </div>
                            <div class="nk-activity-media"><em class="icon ni ni-layers"></em></div>
                            <div class="nk-activity-data">
                                <div class="label">Avail. to Invest</div>
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
                    <!-- <div class="mt-3">
                        <canvas id="allocationChart" height="140" data-chart='<?= esc(json_encode($allocationChartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)); ?>'></canvas>
                    </div> -->
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

    <!-- Short Squeeze Activity Tile (insertion point) -->
    <div class="row g-gs mt-1">
        <div class="col-lg-4 col-md-6">
            <a class="card card-bordered card-full h-100" href="<?= site_url('investments/squeeze'); ?>" title="High short interest + low float can cause violent moves. These events are often mechanical and short-lived." data-bs-toggle="tooltip">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">📉 Market Stress: Short Squeeze Activity</h6>
                        </div>
                        <div class="card-tools">
                            <span class="badge bg-<?= esc($squeezeState); ?>"><?= esc($squeezeStateLabel); ?></span>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"><?= esc($squeezeHighRiskCount); ?></span>
                        <span class="change <?= $squeezeHighRiskCount > 0 ? 'text-warning' : 'text-success'; ?>">
                            <em class="icon ni ni-alert-circle"></em> Mechanical squeeze risk detected
                        </span>
                    </div>
                    <div class="small text-soft mt-2">
                        High short interest + low float can cause violent moves. These events are often mechanical and short-lived.
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-bordered card-full h-100" data-ops-health>
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">🩺 Ops Health</h6>
                        </div>
                        <div class="card-tools">
                            <?php
                            $opsBadge = 'success';
                            if ($opsStatus === 'warning') {
                                $opsBadge = 'warning';
                            } elseif ($opsStatus === 'critical') {
                                $opsBadge = 'danger';
                            }
                            ?>
                            <span class="badge bg-<?= esc($opsBadge); ?>" data-ops-health-status><?= esc(strtoupper($opsStatus)); ?></span>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount" data-ops-health-score><?= $opsScore !== null ? esc((string) $opsScore) : '—'; ?></span>
                        <span class="change text-soft" data-ops-health-label>Health score</span>
                    </div>
                    <div class="small text-soft mt-2" data-ops-health-run>
                        Last run: <?= esc(miw_relative_time($opsGeneratedAt)); ?>
                    </div>
                    <div class="mt-2">
                        <div class="small text-muted">Top warnings</div>
                        <ul class="list-unstyled mt-1 mb-0" data-ops-health-warnings>
                            <?php if ($opsFindings): ?>
                                <?php foreach (array_slice($opsFindings, 0, 3) as $finding): ?>
                                    <li class="small text-soft">• <?= esc($finding['message'] ?? 'Issue detected'); ?></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="small text-soft">• No warnings detected.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-bordered card-full h-100" data-email-pipeline-health>
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">📨 Email Pipeline Health</h6>
                        </div>
                        <div class="card-tools">
                            <?php
                            $emailBadge = 'success';
                            if ($emailAuditStatus === 'attention') {
                                $emailBadge = 'danger';
                            } elseif ($emailAuditStatus === 'recovered') {
                                $emailBadge = 'warning';
                            } elseif ($emailAuditStatus === 'stale') {
                                $emailBadge = 'secondary';
                            }
                            ?>
                            <span class="badge bg-<?= esc($emailBadge); ?>"><?= esc($emailAuditMessage); ?></span>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"><?= esc((string) $emailAuditTotal); ?></span>
                        <span class="change text-soft">Emails scanned (24h)</span>
                    </div>
                    <div class="small text-soft mt-2">
                        Trade: <?= esc((string) $emailAuditTrade); ?> · News: <?= esc((string) $emailAuditNews); ?>
                    </div>
                    <div class="mt-2">
                        <div class="small text-muted">Failures / Fallbacks</div>
                        <div class="d-flex gap-3 small text-soft">
                            <span class="<?= $emailAuditFailures > 0 ? 'text-danger' : 'text-success'; ?>">
                                <?= esc((string) $emailAuditFailures); ?> failures
                            </span>
                            <span class="<?= $emailAuditFallbacks > 0 ? 'text-warning' : 'text-success'; ?>">
                                <?= esc((string) $emailAuditFallbacks); ?> fallbacks
                            </span>
                        </div>
                    </div>
                    <div class="small text-soft mt-2">
                        Last run: <?= esc(miw_relative_time($emailAuditGeneratedAt)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-gs mt-1">
        <div class="col-12">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Forecast Highlights</h6>
                            <span class="text-soft">Top bullish/bearish signals and recent forecast updates.</span>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-outline-primary" type="button" id="refreshForecastHighlights">Refresh</button>
                        </div>
                    </div>
                    <div class="row g-3" id="forecastHighlights">
                        <div class="col-md-4">
                            <h6 class="text-soft mb-2">Top Bullish</h6>
                            <ul class="list-group list-group-sm" id="forecastHighlightsBullish">
                                <li class="list-group-item text-soft">Loading...</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-soft mb-2">Top Bearish</h6>
                            <ul class="list-group list-group-sm" id="forecastHighlightsBearish">
                                <li class="list-group-item text-soft">Loading...</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-soft mb-2">Recently Updated</h6>
                            <ul class="list-group list-group-sm" id="forecastHighlightsRecent">
                                <li class="list-group-item text-soft">Loading...</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($showConfidenceHeatmap): ?>
    <div class="row g-gs mt-1">
        <div class="col-12">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">Confidence Heatmap</h6>
                            <span class="text-soft">Where conviction is strongest right now across tickers and timeframes.</span>
                        </div>
                        <div class="card-tools d-flex align-items-center gap-2">
                            <span class="badge bg-danger">0-40</span>
                            <span class="badge bg-warning text-dark">41-65</span>
                            <span class="badge bg-success">66-100</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered align-middle text-center" id="confidenceHeatmapTable">
                            <thead>
                                <tr>
                                    <th class="text-start">Ticker</th>
                                    <?php foreach ($heatmapTimeframes as $timeframe): ?>
                                        <th><?= esc($timeframe); ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?= count($heatmapTimeframes) + 1 ?>" class="text-soft">Loading heatmap…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="small text-soft mt-2" id="confidenceHeatmapStatus">Using cached confidence snapshots.</div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

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
                            <h6 class="subtitle">MyMI AI Copilot</h6>
                            <span class="text-soft">Ask questions or request summaries using your wallet context.</span>
                        </div>
                        <div class="card-tools">
                            <span class="badge bg-outline-primary">Beta</span>
                        </div>
                    </div>
                    <div id="aiChatLog" class="border rounded-3 p-3 mb-2 bg-light" data-session="<?= esc($aiSessionKey); ?>">
                        <p class="text-soft mb-1">Start typing below to chat with your assistant.</p>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="aiChatInput" placeholder="Ask MyMI anything about your budget, alerts, or watchlist...">
                        <button class="btn btn-primary" type="button" id="aiChatSend">Send</button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center small text-soft">
                        <span id="aiChatStatus">Scopes: budget, alerts, watchlists.</span>
                        <a class="link-primary" href="/Account/Social-Media">Manage Discord link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card card-bordered card-full h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="subtitle">AI Notes</h6>
                            <span class="text-soft">Saved insights from chat or /note commands.</span>
                        </div>
                    </div>
                    <div class="gy-3" id="aiNotesList">
                        <?php if (!empty($aiNotesList)): ?>
                            <?php foreach ($aiNotesList as $note): ?>
                                <div class="border rounded-3 p-2 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0"><?= esc($note['title'] ?? 'Note'); ?></h6>
                                        <span class="small text-soft"><?= esc(miw_relative_time($note['updated_at'] ?? $note['created_at'] ?? null)); ?></span>
                                    </div>
                                    <p class="small mb-1"><?= esc($note['content'] ?? ''); ?></p>
                                    <?php if (!empty($note['tags'])): ?><span class="badge bg-outline-primary"><?= esc($note['tags']); ?></span><?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-soft mb-0">No notes yet. Ask MyMI to save a plan or idea.</p>
                        <?php endif; ?>
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
                            <h6 class="subtitle">Today's Trade Alerts</h6>
                            <span class="text-soft">Live signals that can be marketed or distributed.</span>
                        </div>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-outline-primary" href="/Alerts">Manage Alerts</a>
                        </div>
                    </div>
                    <div class="gy-2">
                        <?php if (!empty($todayAlerts)): ?>
                            <?php foreach ($todayAlerts as $alert): ?>
                                <div class="border-bottom pb-2 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-primary text-white"><?= esc($alert['ticker'] ?? 'N/A'); ?></span>
                                            <span class="fw-bold"><?= esc($alert['category'] ?? 'Open Alert'); ?></span>
                                        </div>
                                        <span class="text-soft small"><?= esc(miw_relative_time($alert['created_on'] ?? null)); ?></span>
                                    </div>
                                    <div class="small text-soft mt-1">
                                        <?php if (!empty($alert['entry_price'])): ?>
                                            <span class="me-2">Entry: <?= esc(number_format((float)$alert['entry_price'], 2)); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($alert['target_price'])): ?>
                                            <span class="me-2">Target: <?= esc(number_format((float)$alert['target_price'], 2)); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($alert['stop_loss'])): ?>
                                            <span class="me-2">Stop: <?= esc(number_format((float)$alert['stop_loss'], 2)); ?></span>
                                        <?php endif; ?>
                                        <span class="badge bg-outline-secondary">Status: <?= esc($alert['status'] ?? 'Open'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center text-soft mb-0">No trade alerts posted today.</p>
                        <?php endif; ?>
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
                            <span class="text-soft">Curated from tradealerts@mymiwallet.com and MarketAux feeds.</span>
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
                                        <?php
                                            $rawTitle = $item['title'] ?? null;
                                            $titlePreview = $rawTitle ? miw_news_preview($rawTitle, 140) : '';
                                            $titleToDisplay = $titlePreview !== '' ? $titlePreview : 'Headline';
                                        ?>
                                        <h6 class="mb-0"><?= esc($titleToDisplay); ?></h6>
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
                        <div class="col-12 mb-2">
                            <a class="btn btn-outline-primary w-100" href="Budget">Go to Budget Overview</a>
                        </div>
                        <div class="col-12 mb-2">
                            <a class="btn btn-outline-secondary w-100" href="Assets">Manage Assets</a>
                        </div>
                        <div class="col-12 mb-2">
                            <a class="btn btn-outline-success w-100" href="Alerts">View Trade Alerts</a>
                        </div>
                        <div class="col-12 mb-2">
                            <a class="btn btn-outline-info w-100" href="Projects">Review Projects</a>
                        </div>
                        <div class="col-12 mb-2">
                            <a class="btn btn-outline-warning w-100" href="News">Marketing / News Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($forecastHeatmapEnabled)): ?>
<div class="nk-block mt-4">
    <div class="row g-gs">
        <div class="col-lg-8">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Confidence Heatmap</h6>
                            <span class="text-soft">Latest forecast confidence by ticker and timeframe.</span>
                        </div>
                        <div class="card-tools">
                            <select id="forecastHeatmapTimeframe" class="form-select form-select-sm">
                                <option value="5m" <?= ($forecastHeatmapDefaultTimeframe ?? '5m') === '5m' ? 'selected' : '' ?>>5m</option>
                                <option value="10m" <?= ($forecastHeatmapDefaultTimeframe ?? '5m') === '10m' ? 'selected' : '' ?>>10m</option>
                            </select>
                        </div>
                    </div>
                    <div class="small text-soft mb-2" id="forecastHeatmapStatus">Loading heatmap…</div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="forecastHeatmapTable">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>Timeframes</th>
                                    <th>Updated</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Forecast Highlights</h6>
                            <span class="text-soft">Top bullish/bearish and recently updated alerts.</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="small text-soft">Rolling 7-day hit rate</div>
                        <h4 class="mb-0" id="forecastQualityRate">--%</h4>
                        <div class="small text-soft" id="forecastQualityUpdated">Last evaluated: --</div>
                    </div>
                    <div id="forecastHighlights">
                        <div class="text-soft small">Loading highlights…</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<style <?= $nonce['style'] ?? ''; ?>>
    .nk-order-ovwg-data .amount { font-weight: 700; }
    .nk-order-ovwg-data .info { color: #8094ae; font-size: 0.9rem; }
    .table thead th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.04em; }
    .table td, .table th { vertical-align: middle; }
    #aiChatLog { min-height: 140px; max-height: 260px; overflow-y: auto; }
    .ai-chat-line { display: flex; gap: 0.5rem; margin-bottom: 0.35rem; align-items: baseline; }
    .ai-chat-line .badge { min-width: 70px; }
</style>

<script <?= $nonce['script'] ?? ''; ?>>
(function() {
    const heatmapTable = document.getElementById('forecastHeatmapTable');
    const heatmapStatus = document.getElementById('forecastHeatmapStatus');
    const heatmapSelect = document.getElementById('forecastHeatmapTimeframe');
    const highlightsWrap = document.getElementById('forecastHighlights');
    const qualityRate = document.getElementById('forecastQualityRate');
    const qualityUpdated = document.getElementById('forecastQualityUpdated');

    function badgeForConfidence(confidence) {
        if (confidence >= 75) return 'bg-success';
        if (confidence >= 60) return 'bg-warning';
        if (confidence >= 40) return 'bg-info';
        return 'bg-secondary';
    }

    function openForecastModal(ticker) {
        if (typeof window.dynamicModalLoader === 'function') {
            window.dynamicModalLoader('/Investments/forecastModal/' + ticker);
        } else {
            window.location.href = '/Investments/forecastModal/' + ticker;
        }
    }

    function renderHeatmap(data) {
        if (!heatmapTable) return;
        const tbody = heatmapTable.querySelector('tbody');
        tbody.innerHTML = '';

        (data.matrix || []).forEach(row => {
            const tr = document.createElement('tr');
            const latestUpdate = Object.values(row.timeframes || {}).map(item => item.updated_at).filter(Boolean).sort().pop() || '—';

            const tfBadges = document.createElement('div');
            tfBadges.className = 'd-flex flex-wrap gap-1';
            Object.entries(row.timeframes || {}).forEach(([timeframe, info]) => {
                const badge = document.createElement('span');
                badge.className = `badge ${badgeForConfidence(info.confidence)} text-uppercase`;
                badge.textContent = `${timeframe}: ${info.confidence}%`;
                tfBadges.appendChild(badge);
            });

            tr.innerHTML = `
                <td><strong>${row.ticker}</strong></td>
                <td></td>
                <td class="small text-soft">${latestUpdate}</td>
                <td class="text-end"></td>
            `;
            tr.children[1].appendChild(tfBadges);

            const actionCell = tr.children[3];
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-sm btn-outline-primary';
            button.textContent = 'View';
            button.addEventListener('click', () => openForecastModal(row.ticker));
            actionCell.appendChild(button);

            tbody.appendChild(tr);
        });

        if (heatmapStatus) {
            heatmapStatus.textContent = data.matrix && data.matrix.length ? 'Updated just now.' : 'No forecast data available.';
        }
    }

    function loadHeatmap() {
        if (!heatmapSelect) return;
        const timeframe = heatmapSelect.value || '5m';
        fetch(`API/Investments/getConfidenceHeatmap?timeframe=${encodeURIComponent(timeframe)}&window=60`)
            .then(resp => resp.json())
            .then(data => renderHeatmap(data))
            .catch(() => {
                if (heatmapStatus) {
                    heatmapStatus.textContent = 'Unable to load heatmap.';
                }
            });
    }

    function renderHighlights(data) {
        if (!highlightsWrap) return;
        const sections = [
            { label: 'Bullish', items: data.bullish || [] },
            { label: 'Bearish', items: data.bearish || [] },
            { label: 'Recently Updated', items: data.recent || [] },
        ];

        highlightsWrap.innerHTML = '';
        sections.forEach(section => {
            const header = document.createElement('div');
            header.className = 'text-soft small mb-1';
            header.textContent = section.label;
            highlightsWrap.appendChild(header);

            const list = document.createElement('ul');
            list.className = 'list-unstyled mb-3';
            section.items.slice(0, 5).forEach(item => {
                const li = document.createElement('li');
                li.className = 'd-flex justify-content-between align-items-center mb-1';
                const link = document.createElement('button');
                link.type = 'button';
                link.className = 'btn btn-link btn-sm p-0';
                link.textContent = item.ticker || item.symbol || '—';
                link.addEventListener('click', () => openForecastModal(item.ticker || item.symbol || ''));
                const badge = document.createElement('span');
                badge.className = `badge ${badgeForConfidence(item.forecast_confidence || 0)}`;
                badge.textContent = `${item.forecast_confidence || 0}%`;
                li.appendChild(link);
                li.appendChild(badge);
                list.appendChild(li);
            });
            highlightsWrap.appendChild(list);
        });
    }

    function loadHighlights() {
        fetch('API/Investments/getForecastHighlights')
            .then(resp => resp.json())
            .then(data => renderHighlights(data))
            .catch(() => {
                if (highlightsWrap) {
                    highlightsWrap.innerHTML = '<div class="text-soft small">Unable to load highlights.</div>';
                }
            });
    }

    function loadForecastQuality() {
        fetch('API/Investments/getForecastAccuracySummary?window=7d')
            .then(resp => resp.json())
            .then(data => {
                if (qualityRate) {
                    qualityRate.textContent = `${data.rollingHitRate?.['7d'] ?? 0}%`;
                }
                if (qualityUpdated) {
                    qualityUpdated.textContent = `Last evaluated: ${data.lastEvaluatedAt || '—'}`;
                }
            })
            .catch(() => {
                if (qualityRate) {
                    qualityRate.textContent = '--%';
                }
            });
    }

    if (heatmapSelect) {
        heatmapSelect.addEventListener('change', loadHeatmap);
    }
    loadHeatmap();
    loadHighlights();
    loadForecastQuality();

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

    async function loadForecastHighlights() {
        const bullishList = document.getElementById('forecastHighlightsBullish');
        const bearishList = document.getElementById('forecastHighlightsBearish');
        const recentList = document.getElementById('forecastHighlightsRecent');

        if (!bullishList || !bearishList || !recentList) {
            return;
        }

        try {
            const response = await fetch('API/Investments/getForecastHighlights');
            const json = await response.json();
            const data = json?.data || {};

            const renderList = (list, items) => {
                list.innerHTML = '';
                if (!items || items.length === 0) {
                    list.innerHTML = '<li class=\"list-group-item text-soft\">No data.</li>';
                    return;
                }
                items.forEach((item) => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.innerHTML = `<span class=\"fw-semibold\">${item.ticker ?? '-'}</span><span class=\"badge bg-outline-primary\">${item.forecast_confidence ?? 0}%</span>`;
                    list.appendChild(li);
                });
            };

            renderList(bullishList, data.bullish);
            renderList(bearishList, data.bearish);
            renderList(recentList, data.recent);
        } catch (err) {
            console.error('Forecast highlights load failed', err);
        }
    }

    const refreshButton = document.getElementById('refreshForecastHighlights');
    if (refreshButton) {
        refreshButton.addEventListener('click', loadForecastHighlights);
    }

    loadForecastHighlights();

    <?php if ($showConfidenceHeatmap): ?>
    async function loadConfidenceHeatmap() {
        const table = document.getElementById('confidenceHeatmapTable');
        const status = document.getElementById('confidenceHeatmapStatus');
        if (!table || !status) {
            return;
        }

        try {
            const response = await fetch(`API/Investments/getConfidenceHeatmap?timeframe=all&window=<?= esc($heatmapWindow, 'url') ?>`);
            const json = await response.json();
            const data = json?.data || {};
            const grid = data.grid || {};
            const timeframes = <?= json_encode($heatmapTimeframes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
            const tickers = data.tickers || Object.keys(grid);

            const tbody = table.querySelector('tbody');
            tbody.innerHTML = '';

            if (!tickers.length) {
                tbody.innerHTML = `<tr><td colspan="${timeframes.length + 1}" class="text-soft">No cached heatmap data yet.</td></tr>`;
                status.textContent = json?.cached ? 'Cache ready.' : 'Waiting for cached confidence data.';
                return;
            }

            tickers.slice(0, 12).forEach((ticker) => {
                const row = document.createElement('tr');
                const label = document.createElement('td');
                label.className = 'text-start fw-semibold';
                label.textContent = ticker;
                row.appendChild(label);

                timeframes.forEach((tf) => {
                    const cell = document.createElement('td');
                    const value = grid?.[ticker]?.[tf];
                    const confidence = Number.isFinite(Number(value)) ? Number(value) : null;
                    cell.textContent = confidence !== null ? `${confidence}%` : '—';
                    if (confidence !== null) {
                        if (confidence <= 40) {
                            cell.classList.add('bg-danger', 'text-white');
                        } else if (confidence <= 65) {
                            cell.classList.add('bg-warning', 'text-dark');
                        } else {
                            cell.classList.add('bg-success', 'text-white');
                        }
                        cell.title = `${ticker} ${tf}: ${confidence}%`;
                    }
                    row.appendChild(cell);
                });

                tbody.appendChild(row);
            });

            status.textContent = json?.cached ? 'Using cached confidence snapshots.' : 'Heatmap cache refreshed.';
        } catch (err) {
            console.error('Confidence heatmap load failed', err);
            status.textContent = 'Heatmap unavailable.';
        }
    }

    loadConfidenceHeatmap();
    <?php endif; ?>

    const aiChatLog     = document.getElementById('aiChatLog');
    const aiChatInput   = document.getElementById('aiChatInput');
    const aiChatSend    = document.getElementById('aiChatSend');
    const aiChatStatus  = document.getElementById('aiChatStatus');
    const aiNotesList   = document.getElementById('aiNotesList');
    let aiSessionKey    = aiChatLog ? aiChatLog.dataset.session || '' : '';
    const csrfToken     = '<?= csrf_hash(); ?>';

    function appendAiMessage(role, text) {
        if (!aiChatLog) return;
        const line  = document.createElement('div');
        const badge = document.createElement('span');
        const body  = document.createElement('span');

        line.className = 'ai-chat-line';
        badge.className = 'badge ' + (role === 'assistant' ? 'bg-outline-primary' : 'bg-outline-secondary');
        badge.textContent = role === 'assistant' ? 'Assistant' : 'You';
        body.textContent = text;

        line.appendChild(badge);
        line.appendChild(body);
        aiChatLog.appendChild(line);
        aiChatLog.scrollTop = aiChatLog.scrollHeight;
    }

    function renderNotes(notes) {
        if (!aiNotesList || !Array.isArray(notes)) return;
        aiNotesList.innerHTML = '';
        if (!notes.length) {
            aiNotesList.innerHTML = '<p class="text-soft mb-0">No notes yet. Ask MyMI to save a plan or idea.</p>';
            return;
        }
        notes.forEach(function(note) {
            const wrapper = document.createElement('div');
            wrapper.className = 'border rounded-3 p-2 mb-2';
            const header = document.createElement('div');
            header.className = 'd-flex justify-content-between align-items-center';
            const title = document.createElement('h6');
            title.className = 'mb-0';
            title.textContent = note.title || 'Note';
            const time = document.createElement('span');
            time.className = 'small text-soft';
            time.textContent = note.updated_at || note.created_at || '';
            header.appendChild(title);
            header.appendChild(time);

            const body = document.createElement('p');
            body.className = 'small mb-1';
            body.textContent = note.content || '';

            wrapper.appendChild(header);
            wrapper.appendChild(body);

            if (note.tags) {
                const tag = document.createElement('span');
                tag.className = 'badge bg-outline-primary';
                tag.textContent = note.tags;
                wrapper.appendChild(tag);
            }

            aiNotesList.appendChild(wrapper);
        });
    }

    function sendAiMessage() {
        if (!aiChatInput || aiChatInput.value.trim() === '') return;
        const message = aiChatInput.value.trim();
        appendAiMessage('user', message);
        aiChatInput.value = '';
        if (aiChatStatus) {
            aiChatStatus.textContent = 'Sending...';
        }

        fetch('API/AI/Chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                message: message,
                session_key: aiSessionKey,
                channel_id: 'dashboard',
                source: 'web',
            }),
        })
            .then(resp => resp.json())
            .then(data => {
                aiSessionKey = data.session_key || aiSessionKey;
                if (data.reply) {
                    appendAiMessage('assistant', data.reply);
                }
                if (Array.isArray(data.notes) && data.notes.length) {
                    renderNotes(data.notes);
                }
                if (aiChatStatus) {
                    aiChatStatus.textContent = 'AI ready.';
                }
            })
            .catch(() => {
                if (aiChatStatus) {
                    aiChatStatus.textContent = 'AI request failed.';
                }
            });
    }

    if (aiChatSend) {
        aiChatSend.addEventListener('click', sendAiMessage);
    }
    if (aiChatInput) {
        aiChatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                sendAiMessage();
            }
        });
    }
})();
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const card = document.querySelector('[data-ops-health]');
    if (!card) {
        return;
    }

    fetch('<?= esc(site_url('ops/health')); ?>', { headers: { 'Accept': 'application/json' } })
        .then(response => response.ok ? response.json() : null)
        .then(data => {
            if (!data) {
                return;
            }

            const scoreEl = card.querySelector('[data-ops-health-score]');
            const statusEl = card.querySelector('[data-ops-health-status]');
            const runEl = card.querySelector('[data-ops-health-run]');
            const warningsEl = card.querySelector('[data-ops-health-warnings]');

            if (scoreEl) {
                scoreEl.textContent = data.score ?? '—';
            }

            if (statusEl) {
                const status = (data.status || 'unknown').toUpperCase();
                statusEl.textContent = status;
                statusEl.classList.remove('bg-success', 'bg-warning', 'bg-danger');
                if (status === 'CRITICAL') {
                    statusEl.classList.add('bg-danger');
                } else if (status === 'WARNING') {
                    statusEl.classList.add('bg-warning');
                } else {
                    statusEl.classList.add('bg-success');
                }
            }

            if (runEl) {
                runEl.textContent = `Last run: ${data.generated_at || '—'}`;
            }

            if (warningsEl) {
                warningsEl.innerHTML = '';
                const findings = Array.isArray(data.top_findings) ? data.top_findings.slice(0, 3) : [];
                if (findings.length === 0) {
                    const li = document.createElement('li');
                    li.className = 'small text-soft';
                    li.textContent = '• No warnings detected.';
                    warningsEl.appendChild(li);
                } else {
                    findings.forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'small text-soft';
                        li.textContent = `• ${item.message || 'Issue detected'}`;
                        warningsEl.appendChild(li);
                    });
                }
            }
        })
        .catch(() => {
            // Ignore fetch errors; keep server-rendered state.
        });
});
</script>
