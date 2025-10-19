<?php
/** @var array $project */
/** @var float $committed */
/** @var float $target */
/** @var float $progress */
?>
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
                    <span><?= number_format($progress * 100, 1) ?>%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?= min($progress * 100, 100) ?>%" aria-valuenow="<?= $progress * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <ul class="list-unstyled small mb-0">
                <li><strong>Committed:</strong> $<?= number_format($committed, 2) ?></li>
                <li><strong>Target Raise:</strong> $<?= number_format($target, 2) ?></li>
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
