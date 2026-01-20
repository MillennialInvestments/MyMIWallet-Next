<?php
$totals = $funnelTotals ?? [];
$series = $funnelSeries ?? [];
$conversion = $funnelConversion ?? [];
$events = $funnelEvents ?? [];
$labels = $series['auth.register_success']['labels'] ?? [];

$chartData = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => 'Register success',
            'data' => $series['auth.register_success']['data'] ?? [],
            'borderColor' => '#4b9bff',
            'backgroundColor' => 'rgba(75, 155, 255, 0.1)',
            'fill' => false,
        ],
        [
            'label' => 'Activation email sent',
            'data' => $series['auth.activation_email_sent']['data'] ?? [],
            'borderColor' => '#f4a261',
            'backgroundColor' => 'rgba(244, 162, 97, 0.1)',
            'fill' => false,
        ],
        [
            'label' => 'Activation success',
            'data' => $series['auth.activate_success']['data'] ?? [],
            'borderColor' => '#2a9d8f',
            'backgroundColor' => 'rgba(42, 157, 143, 0.1)',
            'fill' => false,
        ],
        [
            'label' => 'Login success',
            'data' => $series['auth.login_success']['data'] ?? [],
            'borderColor' => '#9b5de5',
            'backgroundColor' => 'rgba(155, 93, 229, 0.1)',
            'fill' => false,
        ],
        [
            'label' => 'Setup complete',
            'data' => $series['setup.complete']['data'] ?? [],
            'borderColor' => '#43aa8b',
            'backgroundColor' => 'rgba(67, 170, 139, 0.1)',
            'fill' => false,
        ],
    ],
];
?>

<div class="nk-block">
    <div class="nk-block-head-xs">
        <div class="nk-block-head-content">
            <h1 class="nk-block-title title">Auth Funnel</h1>
            <p class="text-soft">Last 7 days (<?= esc($funnelStart ?? '') ?> → <?= esc($funnelEnd ?? '') ?>).</p>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <div class="row g-4">
                <div class="col-md-8">
                    <h6 class="mb-3">Daily Funnel Trend</h6>
                    <canvas id="authFunnelTrendChart" height="120"></canvas>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Conversion Rates</h6>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Register → Activation email</span>
                            <span><?= esc((string) ($conversion['register_to_activation_email'] ?? 0)) ?>%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Email → Activated</span>
                            <span><?= esc((string) ($conversion['activation_email_to_success'] ?? 0)) ?>%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Activated → Login</span>
                            <span><?= esc((string) ($conversion['activation_to_login'] ?? 0)) ?>%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Login → Setup complete</span>
                            <span><?= esc((string) ($conversion['login_to_setup'] ?? 0)) ?>%</span>
                        </li>
                    </ul>
                    <div class="mt-3">
                        <div class="small text-soft">Totals (last 7 days)</div>
                        <div class="d-flex justify-content-between"><span>Register success</span><span><?= esc((string) ($totals['auth.register_success'] ?? 0)) ?></span></div>
                        <div class="d-flex justify-content-between"><span>Activation email sent</span><span><?= esc((string) ($totals['auth.activation_email_sent'] ?? 0)) ?></span></div>
                        <div class="d-flex justify-content-between"><span>Activation success</span><span><?= esc((string) ($totals['auth.activate_success'] ?? 0)) ?></span></div>
                        <div class="d-flex justify-content-between"><span>Login success</span><span><?= esc((string) ($totals['auth.login_success'] ?? 0)) ?></span></div>
                        <div class="d-flex justify-content-between"><span>Setup complete</span><span><?= esc((string) ($totals['setup.complete'] ?? 0)) ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <h6 class="mb-3">Latest Events (200)</h6>
            <table class="table table-bordered" id="auth-funnel-events-table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Event</th>
                        <th>Group</th>
                        <th>User</th>
                        <th>Referral</th>
                        <th>IP</th>
                        <th>User Agent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= esc($event['created_at'] ?? '') ?></td>
                            <td><?= esc($event['event_key'] ?? '') ?></td>
                            <td><?= esc($event['event_group'] ?? '') ?></td>
                            <td><?= esc((string) ($event['user_id'] ?? '')) ?></td>
                            <td><?= esc($event['referral_code'] ?? '') ?></td>
                            <td><?= esc($event['ip'] ?? '') ?></td>
                            <td class="text-truncate" style="max-width: 220px;"><?= esc($event['user_agent'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/chart.js/2.1.2/Chart.min.js'); ?>"></script>
<script>
    (function() {
        const chartData = <?= json_encode($chartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
        const ctx = document.getElementById('authFunnelTrendChart');
        if (ctx && window.Chart) {
            new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                precision: 0,
                            }
                        }]
                    }
                }
            });
        }

        if (window.jQuery && $.fn && $.fn.DataTable) {
            $('#auth-funnel-events-table').DataTable({
                order: [[0, 'desc']],
                pageLength: 25,
            });
        }
    })();
</script>
