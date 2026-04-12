<section class="container py-4" id="propfirms-dashboard">
    <header class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Prop Firms Dashboard</h1>
            <p class="text-muted mb-0">Signal monitoring, risk blocks, and account health.</p>
        </div>
        <a href="<?= site_url('PropFirms/Accounts') ?>" class="btn btn-primary btn-sm">Manage Accounts</a>
    </header>

    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted small">Active Accounts</div><div class="display-6"><?= esc((string) ($summary['active_accounts'] ?? 0)) ?></div></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted small">Open Positions</div><div class="display-6"><?= esc((string) ($summary['open_positions'] ?? 0)) ?></div></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted small">Today PnL Score</div><div class="display-6"><?= esc(number_format((float) ($summary['today_pnl'] ?? 0), 2)) ?></div></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted small">Unread Notifications</div><div class="display-6"><?= esc((string) ($summary['unread_notifications'] ?? 0)) ?></div></div></div></div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header"><strong>Latest Signals</strong></div>
                <div class="card-body">
                    <?php if (empty($summary['latest_signals'])): ?>
                        <p class="text-muted mb-0">No recent signals yet.</p>
                    <?php else: ?>
                        <?php foreach ($summary['latest_signals'] as $signal): ?>
                            <div class="border rounded p-2 mb-2">
                                <div class="d-flex justify-content-between">
                                    <span><strong><?= esc((string) $signal['symbol']) ?></strong> — <?= esc((string) $signal['signal_type']) ?></span>
                                    <span class="text-muted small"><?= esc((string) $signal['triggered_at']) ?></span>
                                </div>
                                <div class="small text-muted">Strength: <?= esc(number_format((float) $signal['signal_strength'], 3)) ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Notifications</strong>
                    <button id="reload-prop-notifications" class="btn btn-sm btn-outline-secondary">Refresh</button>
                </div>
                <div class="card-body" id="prop-notification-list">
                    <?php if (empty($summary['notifications'])): ?>
                        <p class="text-muted mb-0">No notifications available.</p>
                    <?php else: ?>
                        <?php foreach ($summary['notifications'] as $note): ?>
                            <div class="border rounded p-2 mb-2 <?= empty($note['read_at']) ? 'prop-note-unread' : '' ?>" data-note-id="<?= (int) $note['id'] ?>">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div><strong><?= esc((string) $note['subject']) ?></strong></div>
                                        <div class="small text-muted"><?= esc((string) ($note['body'] ?? '')) ?></div>
                                    </div>
                                    <?php if (empty($note['read_at'])): ?>
                                        <button class="btn btn-sm btn-link prop-mark-read" data-id="<?= (int) $note['id'] ?>">Mark read</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header"><strong>Signal History</strong></div>
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead><tr><th>When</th><th>Account</th><th>Symbol</th><th>Type</th><th>Strength</th></tr></thead>
                <tbody>
                <?php if (empty($summary['signal_history'])): ?>
                    <tr><td colspan="5" class="text-muted">No signal history yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($summary['signal_history'] as $row): ?>
                        <tr>
                            <td><?= esc((string) $row['triggered_at']) ?></td>
                            <td>#<?= (int) $row['user_prop_account_id'] ?></td>
                            <td><?= esc((string) $row['symbol']) ?></td>
                            <td><?= esc((string) $row['signal_type']) ?></td>
                            <td><?= esc(number_format((float) $row['signal_strength'], 3)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= base_url('modules/propfirms/assets/css/propfirms.css') ?>">
<script src="<?= base_url('modules/propfirms/assets/js/propfirms.js') ?>" defer></script>
