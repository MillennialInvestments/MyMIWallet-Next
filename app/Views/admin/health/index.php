<?php
/**
 * @var int $healthScore
 * @var string $healthStatus
 * @var string $colorState
 * @var string|null $latestTimestamp
 * @var array $topFindings
 */
$colorClass = match ($colorState ?? 'gray') {
    'green' => 'text-success',
    'yellow' => 'text-warning',
    'red' => 'text-danger',
    default => 'text-secondary',
};
?>
<div class="nk-block">
    <div class="row g-4">
        <div class="col-12 col-lg-4">
            <div class="card card-bordered h-100">
                <div class="card-inner text-center">
                    <h5 class="title">Server Health</h5>
                    <div class="display-4 fw-bold <?= esc($colorClass) ?>">
                        <?= esc((string) $healthScore) ?>
                    </div>
                    <p class="text-soft mb-1">Status: <?= esc(strtoupper($healthStatus)) ?></p>
                    <p class="text-soft mb-0">Latest run: <?= esc($latestTimestamp ?? 'Not yet run') ?></p>
                    <form class="mt-3" method="post" action="<?= esc(site_url('admin/ops/health/run')) ?>">
                        <?= csrf_field() ?>
                        <button class="btn btn-primary" type="submit">Run Env Doctor Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h5 class="title">Top 5 Warnings</h5>
                    <?php if (!empty($topFindings)) : ?>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($topFindings as $finding) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="fw-semibold"><?= esc($finding['message'] ?? 'Finding') ?></div>
                                        <small class="text-soft"><?= esc($finding['key'] ?? '') ?></small>
                                    </div>
                                    <span class="badge bg-secondary text-uppercase"><?= esc($finding['status'] ?? '') ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-soft mb-0">No warnings or critical findings available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
