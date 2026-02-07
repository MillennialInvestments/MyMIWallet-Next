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
                    <button class="btn btn-outline-primary mt-2" id="aiops-manual-run-btn" type="button">Re-evaluate Priorities</button>
                    <p class="small text-soft mt-2 mb-0" id="aiops-manual-run-status">Manual AIOPS run is idle.</p>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('aiops-manual-run-btn');
    const status = document.getElementById('aiops-manual-run-status');
    if (!button || !status) return;

    button.addEventListener('click', async function () {
        button.disabled = true;
        status.textContent = 'Queueing manual AIOPS run...';

        try {
            const formData = new URLSearchParams();
            formData.append('<?= esc(csrf_token()) ?>', '<?= esc(csrf_hash()) ?>');

            const response = await fetch('<?= esc(site_url('api/aiops/manual-run')) ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData.toString(),
            });
            const payload = await response.json();
            if (!response.ok) {
                throw new Error(payload.message || 'Request failed');
            }

            status.innerHTML = `Run queued: <code>${payload.run_id}</code><br>Log: <code>${payload.log_path}</code>`;
        } catch (error) {
            status.textContent = `Unable to queue run: ${error.message}`;
        } finally {
            button.disabled = false;
        }
    });
});
</script>
