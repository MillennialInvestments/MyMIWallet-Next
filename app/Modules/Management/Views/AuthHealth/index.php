<?php
$latest = $authHealthLatest ?? null;
$failures = $authHealthFails ?? [];
$runs = $authHealthRuns ?? [];
?>

<div class="nk-block">
    <div class="nk-block-head-xs">
        <div class="nk-block-head-content">
            <h1 class="nk-block-title title">Auth Health</h1>
            <p class="text-soft">Monitor nightly authentication smoke tests and run one on demand.</p>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <div class="small text-soft">Last run</div>
                    <div class="fw-bold">
                        <?= $latest ? esc(date('M j, g:i A', strtotime($latest['run_at'] ?? ''))) : 'Never'; ?>
                    </div>
                    <div class="mt-1">
                        <span class="badge <?= ($latest['status'] ?? '') === 'PASS' ? 'bg-success' : (($latest['status'] ?? '') === 'FAIL' ? 'bg-danger' : 'bg-secondary'); ?>">
                            <?= esc($latest['status'] ?? 'UNKNOWN'); ?>
                        </span>
                        <span class="ms-2 text-soft">Score: <?= esc((string) ($latest['score'] ?? 0)); ?>%</span>
                    </div>
                    <div class="mt-2 text-soft"><?= esc($latest['summary'] ?? 'No runs recorded yet.'); ?></div>
                    <?php if (($latest['status'] ?? '') === 'FAIL' && ! empty($failures)): ?>
                        <div class="small mt-2"><strong>Top issues:</strong> <?= esc(implode(', ', $failures)); ?></div>
                    <?php endif; ?>
                </div>
                <div class="mt-3 mt-md-0">
                    <button id="authSmokeRunNow" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Run Auth Smoke Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <table class="table table-bordered" id="auth-health-table">
                <thead>
                    <tr>
                        <th>Run At</th>
                        <th>Status</th>
                        <th>Summary</th>
                        <th>Duration</th>
                        <th>Server</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($runs as $run): ?>
                        <tr data-run-id="<?= esc((string) $run['id']); ?>" class="auth-health-row">
                            <td><?= esc(date('Y-m-d H:i:s', strtotime($run['run_at'] ?? ''))); ?></td>
                            <td>
                                <span class="badge <?= ($run['status'] ?? '') === 'PASS' ? 'bg-success' : (($run['status'] ?? '') === 'FAIL' ? 'bg-danger' : 'bg-secondary'); ?>">
                                    <?= esc($run['status'] ?? 'UNKNOWN'); ?>
                                </span>
                            </td>
                            <td><?= esc($run['summary'] ?? ''); ?></td>
                            <td><?= esc((string) ($run['duration_ms'] ?? 0)); ?> ms</td>
                            <td><?= esc($run['server'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="authSmokeResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Auth Smoke Result</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="authSmokeResultBody" class="text-soft"></div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        if (window.jQuery && $.fn && $.fn.DataTable) {
            $('#auth-health-table').DataTable({
                order: [[0, 'desc']],
            });
        }

        const runNowBtn = document.getElementById('authSmokeRunNow');
        const spinner = runNowBtn ? runNowBtn.querySelector('.spinner-border') : null;
        const modalEl = document.getElementById('authSmokeResultModal');
        const modalBody = document.getElementById('authSmokeResultBody');

        if (runNowBtn) {
            runNowBtn.addEventListener('click', async function() {
                if (runNowBtn.disabled) {
                    return;
                }
                runNowBtn.disabled = true;
                if (spinner) {
                    spinner.classList.remove('d-none');
                }

                try {
                    const response = await fetch("<?= site_url('API/Management/runAuthSmoke'); ?>", {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        }
                    });
                    const payload = await response.json();
                    const status = payload.status || 'UNKNOWN';
                    const summary = payload.summary || '';
                    const runId = payload.run_id || 'n/a';
                    const duration = payload.duration_ms || 0;
                    const details = payload.details && payload.details.steps ? payload.details.steps : [];

                    let html = `<div class="mb-2"><strong>Status:</strong> ${status}</div>`;
                    html += `<div class="mb-2"><strong>Summary:</strong> ${summary}</div>`;
                    html += `<div class="mb-2"><strong>Run ID:</strong> ${runId}</div>`;
                    html += `<div class="mb-3"><strong>Duration:</strong> ${duration} ms</div>`;
                    if (details.length) {
                        html += '<div class="mb-2"><strong>Steps</strong></div><ul>';
                        details.forEach(step => {
                            html += `<li>${step.key}: ${step.status} (${step.message})</li>`;
                        });
                        html += '</ul>';
                    }

                    if (modalBody) {
                        modalBody.innerHTML = html;
                    }

                    if (modalEl && window.bootstrap) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                } catch (error) {
                    if (modalBody) {
                        modalBody.textContent = 'Failed to run auth smoke test. Check logs for details.';
                    }
                    if (modalEl && window.bootstrap) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                } finally {
                    runNowBtn.disabled = false;
                    if (spinner) {
                        spinner.classList.add('d-none');
                    }
                }
            });
        }

        const tableBody = document.querySelector('#auth-health-table tbody');
        if (tableBody) {
            tableBody.addEventListener('click', function(event) {
                const targetRow = event.target.closest('.auth-health-row');
                if (! targetRow || event.target.closest('a, button')) {
                    return;
                }
                const runId = targetRow.getAttribute('data-run-id');
                if (! runId || typeof window.dynamicModalLoader !== 'function') {
                    return;
                }
                window.dynamicModalLoader('Auth Health Run', `<?= site_url('Management/AuthHealth/details'); ?>/${runId}`, 'modal-lg');
            });
        }
    })();
</script>
