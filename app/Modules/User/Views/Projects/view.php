<?php
/** @var array $project */
/** @var float $committed */
/** @var float $target */
/** @var float $progress */
?>
<?php if (($project['project_type'] ?? '') === 'private_fund'): ?>
<div class="nk-block">
    <div class="card card-bordered mb-4"><div class="card-inner">
        <h3 class="card-title mb-2"><?= esc($project['name'] ?? $project['title']) ?></h3>
        <p class="text-muted">Private fund dashboard with NAV-based ownership units and distribution ledger tracking.</p>
        <ul class="list-unstyled small">
            <li><strong>NAV:</strong> $<?= number_format((float)($project['nav_per_unit'] ?? 1), 8) ?></li>
            <li><strong>Total Fund Value:</strong> $<?= number_format((float)($project['total_fund_value'] ?? 0), 2) ?></li>
            <li><strong>Total Units Issued:</strong> <?= number_format((float)($project['total_units_issued'] ?? 0), 8) ?></li>
        </ul>
        <div class="border rounded p-2 mb-3 small">
            <strong>Exchange Status</strong>
            <ul class="mb-0">
                <li>Linked Asset ID: <?= (int) ($project['exchange_asset_id'] ?? 0) ?></li>
                <li>Exchange Enabled: <?= (int) ($project['exchange_enabled'] ?? 0) === 1 ? 'Enabled' : 'Disabled' ?></li>
                <li>Secondary Trading: <?= (int) ($project['secondary_trading_enabled'] ?? 0) === 1 ? 'Enabled' : 'Disabled' ?></li>
                <li>Current NAV: $<?= number_format((float)($project['nav_per_unit'] ?? 1), 8) ?></li>
                <li>Market Price: Coming soon</li>
                <li>Premium / Discount to NAV: Coming soon</li>
            </ul>
        </div>
        <img src="https://cdn.mymi.com/projects/mymi-us-oil-fund-flow.png" class="img-fluid rounded border" alt="MyMI US Oil Fund workflow">
    </div></div>
</div>
<?php else: ?>
<div class="nk-block">
    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <h3 class="card-title mb-2"><?= esc($project['title']) ?></h3>
            <?php if (! empty($project['description'])): ?>
                <p class="text-muted"><?= esc($project['description']) ?></p>
            <?php endif; ?>
            <?php if (! empty($project['asset_url'])): ?>
                <p class="small">Listing: <a href="<?= esc($project['asset_url']) ?>" target="_blank" rel="noopener"><?= esc($project['asset_url']) ?></a></p>
            <?php endif; ?>
            <div class="mb-3">
                <div class="d-flex justify-content-between small mb-1">
                    <span>Funding Progress</span>
                    <span><?= number_format((float) (($progress ?? 0) * 100), 1) ?>%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?= min($progress * 100, 100) ?>%" aria-valuenow="<?= $progress * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <ul class="list-unstyled small mb-0">
                <li><strong>Committed:</strong> $<?= number_format((float) ($committed ?? 0), 2) ?></li>
                <li><strong>Target Raise:</strong> $<?= number_format((float) ($target ?? 0), 2) ?></li>
                <?php if (! empty($project['commit_deadline'])): ?>
                    <li><strong>Commitment Deadline:</strong> <?= esc($project['commit_deadline']) ?></li>
                <?php endif; ?>
                <?php if (! empty($project['status'])): ?>
                    <li><strong>Status:</strong> <span class="badge bg-light text-dark"><?= esc($project['status']) ?></span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <h4 class="card-title mb-3">Commit to this project</h4>
            <form method="post" action="<?= site_url('Projects/Commit/' . (int) $project['id']) ?>" class="gy-3" id="project-commit-form">
                <?= csrf_field() ?>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="commit-amount">Commitment Amount</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="commit-amount" name="amount" required>
                        <div class="form-text">Minimum <?= number_format((float) ($project['min_commit'] ?? 0), 2) ?><?php if (! empty($project['max_commit'])): ?> · Maximum <?= number_format((float) $project['max_commit'], 2) ?><?php endif; ?></div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit Commitment</button>
                </div>
            </form>
        </div>
    </div>

    <div class="alert alert-info">
        Commitment holders will be invited to a private auction once the funding threshold is reached. Monthly withdrawals are available post-activation, subject to policy fees.
    </div>
</div>

<?php endif; ?>
