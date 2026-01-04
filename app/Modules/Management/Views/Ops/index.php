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
    }

    function fetchStatus() {
        fetch('<?php echo site_url('Management/Ops/ajaxStatus'); ?>', {headers: {'X-Requested-With': 'XMLHttpRequest'}})
            .then(res => res.json())
            .then(updateUI)
            .catch(() => {});
    }

    function dispatchJob(jobKey) {
        fetch('<?php echo site_url('Management/Ops/ajaxDispatch'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
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
