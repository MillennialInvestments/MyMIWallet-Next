<section class="container py-4" id="prop-accounts-app">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Prop Account Management</h1>
            <p class="text-muted mb-0">Create and manage bf_user_prop_accounts with broker connections.</p>
        </div>
        <button class="btn btn-primary" id="account-new-btn">New Account</button>
    </div>

    <div class="card mb-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0" id="account-table">
                <thead><tr><th>ID</th><th>Account Ref</th><th>Status</th><th>Balances</th><th>Actions</th></tr></thead>
                <tbody>
                    <?php foreach ($accounts as $account): ?>
                        <tr data-id="<?= (int) $account['id'] ?>">
                            <td><?= (int) $account['id'] ?></td>
                            <td><?= esc((string) $account['account_ref']) ?></td>
                            <td><?= esc((string) $account['account_status']) ?></td>
                            <td>$<?= esc(number_format((float) $account['current_balance'], 2)) ?></td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary js-edit">Edit</button>
                                <button class="btn btn-sm btn-outline-info js-refresh">Refresh State</button>
                                <button class="btn btn-sm btn-outline-success js-connect">Connect Broker</button>
                                <button class="btn btn-sm btn-outline-danger js-delete">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><strong>Account Form</strong></div>
        <div class="card-body">
            <form id="account-form" class="row g-3">
                <input type="hidden" id="account-id">
                <div class="col-md-3"><label class="form-label">Account Ref</label><input id="account-ref" class="form-control" required></div>
                <div class="col-md-3"><label class="form-label">Firm</label><select id="prop-firm-id" class="form-select"><?php foreach ($firms as $firm): ?><option value="<?= (int) $firm['id'] ?>"><?= esc((string) $firm['name']) ?></option><?php endforeach; ?></select></div>
                <div class="col-md-3"><label class="form-label">Rule Set</label><select id="prop-rule-set-id" class="form-select"><option value="">None</option><?php foreach ($ruleSets as $rs): ?><option value="<?= (int) $rs['id'] ?>"><?= esc((string) $rs['name']) ?></option><?php endforeach; ?></select></div>
                <div class="col-md-3"><label class="form-label">Platform</label><input id="platform" class="form-control" value="tradovate"></div>
                <div class="col-md-2"><label class="form-label">Account Type</label><input id="account-type" class="form-control" value="eval"></div>
                <div class="col-md-2"><label class="form-label">Account Size</label><input id="account-size" type="number" class="form-control" value="50000"></div>
                <div class="col-md-2"><label class="form-label">Starting Balance</label><input id="starting-balance" type="number" class="form-control" value="50000"></div>
                <div class="col-md-2"><label class="form-label">Current Balance</label><input id="current-balance" type="number" class="form-control" value="50000"></div>
                <div class="col-md-2"><label class="form-label">Init DLL</label><input id="initial-dll" type="number" class="form-control" value="2500"></div>
                <div class="col-md-2"><label class="form-label">Status</label><select id="account-status" class="form-select"><option value="active">active</option><option value="paused">paused</option><option value="breached">breached</option></select></div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Save Account</button>
                    <button class="btn btn-outline-secondary" type="button" id="account-reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= base_url('modules/propfirms/assets/css/prop-accounts.css') ?>">
<script src="<?= base_url('modules/propfirms/assets/js/prop-accounts.js') ?>" defer></script>
