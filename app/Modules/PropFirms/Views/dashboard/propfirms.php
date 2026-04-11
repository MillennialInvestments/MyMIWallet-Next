<section class="container py-4" id="propfirms-dashboard">
    <header class="mb-4">
        <h1 class="h3 mb-1">Prop Firms Dashboard</h1>
        <p class="text-muted mb-0">Module scaffold is installed and ready for wiring.</p>
    </header>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Active Accounts</div>
                <div class="display-6"><?= esc((string) ($summary['active_accounts'] ?? 0)) ?></div>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Open Positions</div>
                <div class="display-6"><?= esc((string) ($summary['open_positions'] ?? 0)) ?></div>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Today PnL</div>
                <div class="display-6"><?= esc(number_format((float) ($summary['today_pnl'] ?? 0), 2)) ?></div>
            </div></div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Last Sync</div>
                <div><?= esc((string) ($summary['last_sync_at'] ?? 'Not synced yet')) ?></div>
            </div></div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= base_url('modules/propfirms/assets/css/propfirms.css') ?>">
<script src="<?= base_url('modules/propfirms/assets/js/propfirms.js') ?>" defer></script>
