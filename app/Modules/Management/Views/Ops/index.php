<?php declare(strict_types=1); ?>
<section class="section py-4">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h1 class="h4 mb-0">Ops Dashboard</h1>
                <small class="text-muted">Monitor queue health, run jobs, and inspect recent runs.</small>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="ops-live-toggle" />
                <label class="form-check-label" for="ops-live-toggle">Live Mode (30s refresh)</label>
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-sm btn-primary" id="ops-run-worker">Run Worker Once</button>
            <small class="text-muted ms-2">CLI: <code>php spark ops:work --limit=1</code></small>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small">Pending</div>
                        <div class="h4 mb-0" id="ops-count-pending">0</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small">Running</div>
                        <div class="h4 mb-0" id="ops-count-running">0</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small">Completed</div>
                        <div class="h4 mb-0" id="ops-count-completed">0</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small">Failed</div>
                        <div class="h4 mb-0" id="ops-count-failed">0</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow-sm mb-4">
            <div class="card-header"><strong>Filesystem Governance</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><small class="text-muted">Status</small><div id="fs-gov-status" class="fw-bold">-</div></div>
                    <div class="col-md-2"><small class="text-muted">Errors</small><div id="fs-gov-errors" class="fw-bold">0</div></div>
                    <div class="col-md-2"><small class="text-muted">Warnings</small><div id="fs-gov-warnings" class="fw-bold">0</div></div>
                    <div class="col-md-2"><small class="text-muted">Trend</small><div id="fs-gov-trend" class="fw-bold">→</div></div>
                    <div class="col-md-3"><small class="text-muted">Last Run</small><div id="fs-gov-last-run" class="fw-bold">-</div></div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>Registered Jobs</strong>
                    <small class="text-muted">(max 50)</small>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm mb-0" id="ops-jobs-table">
                        <thead class="table-light">
                            <tr>
                                <th>Job Key</th>
                                <th>Name</th>
                                <th>Enabled</th>
                                <th>Attempts</th>
                                <th>Last Run</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>Recent Runs</strong>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm mb-0" id="ops-runs-table">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Job ID</th>
                                <th>Status</th>
                                <th>Attempts</th>
                                <th>Started</th>
                                <th>Finished</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const initialData = <?php echo json_encode($ops ?? [], JSON_UNESCAPED_SLASHES); ?>;
    <?php if (function_exists('csrf_hash')): ?>
    const csrfHeader = '<?php echo csrf_header(); ?>';
    const csrfToken = '<?php echo csrf_hash(); ?>';
    <?php else: ?>
    const csrfHeader = null;
    const csrfToken = null;
    <?php endif; ?>
    const jobsTableBody = document.querySelector('#ops-jobs-table tbody');
    const runsTableBody = document.querySelector('#ops-runs-table tbody');
    const runWorkerBtn = document.getElementById('ops-run-worker');
    const liveToggle = document.getElementById('ops-live-toggle');
    let pollTimer = null;

    function setCounts(counts) {
        document.getElementById('ops-count-pending').textContent = counts.pending ?? 0;
        document.getElementById('ops-count-running').textContent = counts.running ?? 0;
        document.getElementById('ops-count-completed').textContent = counts.completed ?? 0;
        document.getElementById('ops-count-failed').textContent = counts.failed ?? 0;
    }

    function renderJobs(jobs) {
        jobsTableBody.innerHTML = '';
        jobs.forEach(job => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><code>${job.job_key}</code></td>
                <td>${job.name ?? ''}</td>
                <td>${parseInt(job.is_enabled) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>'}</td>
                <td>${job.max_attempts ?? ''}</td>
                <td>${job.last_run ? `${job.last_run.status ?? ''} @ ${job.last_run.started_at ?? ''}` : '<span class="text-muted">never</span>'}</td>
                <td><button class="btn btn-sm btn-outline-primary" data-job="${job.job_key}">Run Now</button></td>
            `;
            jobsTableBody.appendChild(row);
        });

        jobsTableBody.querySelectorAll('button[data-job]').forEach(btn => {
            btn.addEventListener('click', () => dispatchJob(btn.getAttribute('data-job')));
        });
    }


    function renderFilesystemGovernance(data) {
        const statusMap = {
            healthy: '✅ Healthy',
            warning: '⚠️ Warning',
            unhealthy: '❌ Unhealthy'
        };
        const trendMap = {
            improving: '↑ Improving',
            regressing: '↓ Regressing',
            stable: '→ Stable'
        };
        document.getElementById('fs-gov-status').textContent = statusMap[data.status] || data.status || '-';
        document.getElementById('fs-gov-errors').textContent = data.errors ?? 0;
        document.getElementById('fs-gov-warnings').textContent = data.warnings ?? 0;
        document.getElementById('fs-gov-trend').textContent = trendMap[data.trend] || '→ Stable';
        document.getElementById('fs-gov-last-run').textContent = data.last_run || '-';
    }

    function renderRuns(runs) {
        runsTableBody.innerHTML = '';
        runs.forEach(run => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${run.id}</td>
                <td>${run.job_id}</td>
                <td>${run.status}</td>
                <td>${run.attempts}</td>
                <td>${run.started_at ?? ''}</td>
                <td>${run.finished_at ?? ''}</td>
            `;
            runsTableBody.appendChild(row);
        });
    }

    function updateUI(data) {
        setCounts(data.queue_counts || {});
        renderJobs(data.jobs || []);
        renderRuns(data.recent_runs || []);
        renderFilesystemGovernance(data.filesystem_governance || {});
    }

    function fetchStatus() {
        const headers = {'X-Requested-With': 'XMLHttpRequest'};
        if (csrfHeader && csrfToken) {
            headers[csrfHeader] = csrfToken;
        }
        fetch('<?php echo site_url('Management/Ops/ajaxStatus'); ?>', {headers})
            .then(res => res.json())
            .then(updateUI)
            .catch(() => {});

        fetch('<?php echo site_url('API/Ops/filesystem-status'); ?>', {headers})
            .then(res => res.json())
            .then(renderFilesystemGovernance)
            .catch(() => {});

    }

    function dispatchJob(jobKey) {
        const headers = {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        };
        if (csrfHeader && csrfToken) {
            headers[csrfHeader] = csrfToken;
        }
        fetch('<?php echo site_url('Management/Ops/ajaxDispatch'); ?>', {
            method: 'POST',
            headers,
            body: JSON.stringify({job_key: jobKey})
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'queued') {
                fetchStatus();
            } else {
                alert('Dispatch error: ' + (data.message || 'unknown'));
            }
        })
        .catch(() => alert('Failed to dispatch job'));
    }

    runWorkerBtn.addEventListener('click', () => dispatchJob('ops.worker.kick'));

    liveToggle.addEventListener('change', (e) => {
        if (e.target.checked) {
            fetchStatus();
            pollTimer = setInterval(fetchStatus, 30000);
        } else {
            clearInterval(pollTimer);
        }
    });

    updateUI(initialData || {});
})();
</script>
