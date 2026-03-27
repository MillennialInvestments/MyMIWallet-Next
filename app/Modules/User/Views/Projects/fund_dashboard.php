<?php
$project = $project ?? [];
$fundSummary = $fundSummary ?? [];
$myPosition = $myPosition ?? [];
$navHistory = $navHistory ?? [];
$recentTransactions = $recentTransactions ?? [];
$distributions = $distributions ?? [];
$compliance = $compliance ?? [];
$capitalFlows = $capitalFlows ?? [];
?>
<div class="nk-block">
    <div class="row g-4">
        <div class="col-12">
            <div class="card card-bordered"><div class="card-inner">
                <h3 class="card-title mb-1"><?= esc($project['name'] ?? $project['title'] ?? 'MyMI Fund') ?></h3>
                <p class="text-muted mb-0">Status: <span class="badge bg-light text-dark"><?= esc($project['status'] ?? 'active') ?></span></p>
            </div></div>
        </div>
        <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><strong>NAV</strong><div>$<?= number_format((float)($project['nav_per_unit'] ?? 1), 8) ?></div></div></div></div>
        <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><strong>Total Fund Value</strong><div>$<?= number_format((float)($project['total_fund_value'] ?? 0), 2) ?></div></div></div></div>
        <div class="col-md-4"><div class="card card-bordered"><div class="card-inner"><strong>Total Units Issued</strong><div><?= number_format((float)($project['total_units_issued'] ?? 0), 8) ?></div></div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>My Position</h5>
            <p class="small text-muted mb-2">Compliance: KYC <strong><?= esc($compliance['kyc_status'] ?? 'pending') ?></strong> · Eligibility <strong><?= esc($compliance['investor_eligibility'] ?? 'pending') ?></strong> · Agreement <strong><?= (int)($compliance['agreement_signed'] ?? 0) === 1 ? 'signed' : 'pending' ?></strong></p>
            <ul class="list-unstyled small mb-0">
                <li><strong>Units Owned:</strong> <?= number_format((float)($myPosition['units_owned'] ?? 0), 8) ?></li>
                <li><strong>Average NAV:</strong> $<?= number_format((float)($myPosition['average_nav'] ?? 0), 8) ?></li>
                <li><strong>Contributed Capital:</strong> $<?= number_format((float)($myPosition['capital_contributed'] ?? 0), 2) ?></li>
                <li><strong>Implied Position Value:</strong> $<?= number_format((float)($myPosition['implied_position_value'] ?? 0), 2) ?></li>
            </ul>
            <hr>
            <form method="post" action="<?= site_url('Projects/PurchaseFundUnits') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int)($project['id'] ?? 0) ?>">
                <input type="hidden" name="idempotency_key" value="<?= esc(hash('sha256', microtime(true) . '-' . ($project['id'] ?? 0) . '-' . mt_rand())) ?>">
                <label class="form-label">Investment Amount</label>
                <input type="number" step="0.01" min="1" required name="investment_amount" class="form-control mb-2">
                <button class="btn btn-primary btn-sm" type="submit">Purchase Fund Units</button>
            </form>
        </div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
            <h5>Workflow Visual</h5>
            <img src="https://cdn.mymi.com/projects/mymi-us-oil-fund-flow.png" class="img-fluid rounded border" alt="MyMI US Oil Fund workflow">
            <div class="alert alert-light mt-3 mb-0">Lifecycle visual coming next.</div>
        </div></div></div>

        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner"><h5>NAV History</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>NAV</th><th>Fund Value</th></tr></thead><tbody><?php foreach($navHistory as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td><?= number_format((float)($row['nav_per_unit'] ?? 0),8) ?></td><td>$<?= number_format((float)($row['total_fund_value'] ?? 0),2) ?></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>
        <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner"><h5>Recent Transactions</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>Type</th><th>Units</th><th>Amount</th></tr></thead><tbody><?php foreach($recentTransactions as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td><?= esc($row['transaction_type'] ?? '') ?></td><td><?= number_format((float)($row['units'] ?? 0),8) ?></td><td>$<?= number_format((float)($row['net_amount'] ?? 0),2) ?></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>


        <div class="col-12"><div class="card card-bordered"><div class="card-inner"><h5>Recent Capital Flows</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>Type</th><th>Amount</th><th>Reference</th></tr></thead><tbody><?php foreach($capitalFlows as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td><?= esc($row['flow_type'] ?? '') ?></td><td>$<?= number_format((float)($row['amount'] ?? 0),2) ?></td><td><?= esc($row['reference'] ?? '') ?></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>
        <div class="col-12"><div class="card card-bordered"><div class="card-inner"><h5>Distribution Summary</h5><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Date</th><th>Total</th><th>Amount / Unit</th><th>Status</th></tr></thead><tbody><?php foreach($distributions as $row): ?><tr><td><?= esc($row['created_at'] ?? '') ?></td><td>$<?= number_format((float)($row['total_amount'] ?? 0),2) ?></td><td>$<?= number_format((float)($row['amount_per_unit'] ?? 0),8) ?></td><td><?= esc($row['status'] ?? '') ?></td></tr><?php endforeach; ?></tbody></table></div></div></div></div>
    </div>
</div>
