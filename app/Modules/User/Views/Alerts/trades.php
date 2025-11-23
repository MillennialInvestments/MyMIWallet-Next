<?php
// app/Modules/User/Views/Alerts/trades.php
$alerts = $alerts ?? [];
?>

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content d-flex justify-content-between align-items-center">
            <div>
                <h1 class="nk-block-title">All Trade Alerts</h1>
                <div class="nk-block-des">
                    <p>Community-distributed alerts with quick access to preview hubs.</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="<?= esc(site_url('User/Alerts'), 'attr'); ?>" class="btn btn-outline-primary btn-sm">
                    ← Back to Alerts Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="card card-bordered card-full">
        <div class="card-inner">
            <div class="table-responsive">
                <table class="table table-hover nk-table-init" id="userAlertsTable">
                    <thead>
                        <tr>
                            <th>Ticker</th>
                            <th>Company</th>
                            <th>Exchange</th>
                            <th>Last</th>
                            <th>Status</th>
                            <th>Chart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (! empty($alerts)): ?>
                            <?php foreach ($alerts as $alert): ?>
                                <?php
                                    $ticker = $alert['ticker'] ?? '';
                                    $exchange = $alert['exchange'] ?? '';
                                    $previewSlug = $exchange ? $exchange . '-' . $ticker : $ticker;
                                    $previewUrl = site_url('Preview/Alert/' . urlencode($previewSlug));
                                ?>
                                <tr>
                                    <td>
                                        <strong>
                                            <a href="<?= esc($previewUrl, 'attr'); ?>" class="text-primary">
                                                <?= esc($ticker ?: '-'); ?>
                                            </a>
                                        </strong>
                                    </td>
                                    <td><?= esc($alert['company'] ?? '-'); ?></td>
                                    <td><?= esc($exchange ?: 'N/A'); ?></td>
                                    <td><?= esc(number_format((float) ($alert['price'] ?? 0), 2)); ?></td>
                                    <td><?= esc($alert['status'] ?? 'Opened'); ?></td>
                                    <td>
                                        <?php if (! empty($alert['chart_link'])): ?>
                                            <a href="<?= esc($alert['chart_link'], 'attr'); ?>" class="btn btn-outline-primary btn-xs" target="_blank" rel="noopener">TV</a>
                                        <?php elseif (! empty($exchange) && ! empty($ticker)): ?>
                                            <a href="https://www.tradingview.com/symbols/<?= esc($exchange . '-' . $ticker, 'attr'); ?>/"
                                               class="btn btn-outline-primary btn-xs" target="_blank" rel="noopener">
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
                                <td colspan="6" class="text-center text-soft">No alerts available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>