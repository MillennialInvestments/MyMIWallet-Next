<?php
$project = $project ?? [];
$fundSummary = $fundSummary ?? [];
$holders = $holders ?? [];
$capitalFlows = $capitalFlows ?? [];
$auditTrail = $auditTrail ?? [];
?>
<div class="nk-block">
    <div class="row g-4">
        <div class="col-12">
            <div class="card card-bordered"><div class="card-inner">
                <h3 class="card-title"><?= esc($project['name'] ?? $project['title'] ?? 'Fund') ?> Admin Overview</h3>
                <p class="text-muted">AUM: $<?= number_format((float)($project['total_fund_value'] ?? 0), 2) ?> · Units: <?= number_format((float)($project['total_units_issued'] ?? 0), 8) ?> · NAV: $<?= number_format((float)($project['nav_per_unit'] ?? 1), 8) ?></p>
            </div></div>
        </div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>Update Fund NAV</h5>
            <form method="post" action="<?= site_url('Management/Projects/UpdateFundNAV') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int)($project['id'] ?? 0) ?>">
                <label class="form-label">Total Fund Value</label>
                <input type="number" step="0.01" name="total_fund_value" required class="form-control mb-2">
                <button class="btn btn-primary btn-sm">Recalculate NAV</button>
            </form>
        </div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>Record Distribution</h5>
            <form method="post" action="<?= site_url('Management/Projects/RecordFundDistribution') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int)($project['id'] ?? 0) ?>">
                <label class="form-label">Distribution Amount</label>
                <input type="number" step="0.01" name="total_amount" required class="form-control mb-2">
                <input type="text" name="note" class="form-control mb-2" placeholder="Optional note">
                <button class="btn btn-primary btn-sm">Record Distribution</button>
            </form>
        </div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>Fund Operations</h5>
            <form method="post" action="<?= site_url('Management/Projects/RecordFundCapitalFlow') ?>" class="mb-3">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int)($project['id'] ?? 0) ?>">
                <input type="text" name="flow_type" class="form-control mb-2" placeholder="flow_type (e.g. brokerage_buy_uso)" required>
                <input type="number" step="0.01" name="amount" class="form-control mb-2" placeholder="Amount" required>
                <input type="number" step="0.00000001" name="units_delta" class="form-control mb-2" placeholder="Units delta (optional)">
                <input type="text" name="reference" class="form-control mb-2" placeholder="Reference">
                <textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>
                <button class="btn btn-outline-primary btn-sm">Record Capital Flow</button>
            </form>
            <form method="post" action="<?= site_url('Management/Projects/HideTestProjects') ?>" class="d-inline">
                <?= csrf_field() ?>
                <button class="btn btn-danger btn-sm">Hide Legacy Test Projects</button>
            </form>
            <form method="post" action="<?= site_url('Management/Projects/SeedPrimaryFundProject') ?>" class="d-inline">
                <?= csrf_field() ?>
                <button class="btn btn-outline-secondary btn-sm">Seed Primary Fund</button>
            </form>
            <?php if (! empty($project['id'])): ?>
                <form method="post" action="<?= site_url('Management/Projects/RegisterFundExchangeAsset/' . (int) $project['id']) ?>" class="d-inline">
                    <?= csrf_field() ?>
                    <button class="btn btn-outline-info btn-sm">Register Exchange Asset</button>
                </form>
            <?php endif; ?>
            <?php if (! empty($project['id'])): ?>
                <a href="<?= site_url('Management/Projects/ReconcileFundExchange/' . (int) $project['id']) ?>" class="btn btn-outline-dark btn-sm">Reconcile Fund ↔ Exchange</a>
            <?php endif; ?>
        </div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>Compliance Review</h5>
            <form method="post" action="<?= site_url('Management/Projects/UpdateInvestorCompliance') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int)($project['id'] ?? 0) ?>">
                <input type="number" name="user_id" class="form-control mb-2" placeholder="User ID" required>
                <select name="kyc_status" class="form-control mb-2"><option value="pending">KYC Pending</option><option value="approved">KYC Approved</option><option value="rejected">KYC Rejected</option></select>
                <select name="investor_eligibility" class="form-control mb-2"><option value="pending">Eligibility Pending</option><option value="approved">Eligibility Approved</option><option value="restricted">Eligibility Restricted</option></select>
                <select name="agreement_signed" class="form-control mb-2"><option value="0">Agreement Not Signed</option><option value="1">Agreement Signed</option></select>
                <textarea name="notes" class="form-control mb-2" placeholder="Compliance notes"></textarea>
                <button class="btn btn-outline-primary btn-sm">Update Compliance</button>
            </form>
        </div></div></div>

        <div class="col-12"><div class="card card-bordered"><div class="card-inner"><h5>Recent Capital Flows</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>Type</th><th>Amount</th><th>Ref</th></tr></thead><tbody><?php foreach($capitalFlows as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td><?= esc($row['flow_type'] ?? '') ?></td><td>$<?= number_format((float)($row['amount'] ?? 0), 2) ?></td><td><?= esc($row['reference'] ?? '') ?></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>
        <div class="col-12"><div class="card card-bordered"><div class="card-inner"><h5>Audit Trail</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>Action</th><th>Actor</th><th>Context</th></tr></thead><tbody><?php foreach($auditTrail as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td><?= esc($row['action_type'] ?? '') ?></td><td><?= esc((string)($row['actor_user_id'] ?? 'system')) ?></td><td><code><?= esc((string)($row['context_json'] ?? '')) ?></code></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>
    </div>
</div>
