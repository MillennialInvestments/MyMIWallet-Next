<div class="container-fluid py-4">
    <div class="row mb-3 align-items-center">
        <div class="col-12 d-flex justify-content-between">
            <h3 class="mb-0">AI Ops Control Center</h3>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle-master" data-setting="aiOpsEnabled">
                <label class="form-check-label" for="toggle-master">Master Switch</label>
            </div>
        </div>
    </div>

    <div id="aiops-banner" class="alert alert-warning d-none" role="alert">
        <strong>Heads up:</strong> A subsystem is above 80% capacity. Review caps or pause non-critical runs.
    </div>

    <div class="row g-3 mb-3">
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h6 class="card-title">Subsystem Toggles</h6>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-selfhost" data-setting="aiSelfHostedEnabled">
                        <label class="form-check-label" for="toggle-selfhost">Self-hosted workflows (n8n/Ollama)</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-gap-sync" data-setting="aiGapTrackerSyncEnabled">
                        <label class="form-check-label" for="toggle-gap-sync">Gap Tracker Sync</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-marketing" data-setting="aiAutoMarketingDraftsEnabled">
                        <label class="form-check-label" for="toggle-marketing">Marketing Drafts</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-alerts" data-setting="aiAutoAlertsDigestEnabled">
                        <label class="form-check-label" for="toggle-alerts">Alerts Digest</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-pr-review" data-setting="aiGithubReviewEnabled">
                        <label class="form-check-label" for="toggle-pr-review">PR Review Helper</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-codex" data-setting="aiCodexEnabled">
                        <label class="form-check-label" for="toggle-codex">Codex (info toggle)</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="toggle-override" data-setting="aiOpsAllowOverride">
                        <label class="form-check-label" for="toggle-override">Allow overrides beyond caps</label>
                    </div>
                    <small class="text-muted d-block mt-2">Changes are stored in DB overrides for instant effect.</small>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-title mb-0">Current Usage</h6>
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-outline-primary" data-run="gap_sync">Run Gap Sync</button>
                            <button class="btn btn-outline-primary" data-run="marketing_drafts">Run Marketing Drafts</button>
                            <button class="btn btn-outline-primary" data-run="pr_review">Run PR Review</button>
                        </div>
                    </div>
                    <div class="row" id="usage-cards">
                        <div class="col-12 text-center text-muted py-3">Loading usage...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h6 class="card-title">Recent Runs</h6>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0" id="runs-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job</th>
                                    <th>Subsystem</th>
                                    <th>Status</th>
                                    <th>Runtime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan="5" class="text-center text-muted">Loading...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h6 class="card-title">Recent Events</h6>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0" id="events-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subsystem</th>
                                    <th>Event</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan="4" class="text-center text-muted">Loading...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const usageCards = document.getElementById('usage-cards');
        const runsTable = document.querySelector('#runs-table tbody');
        const eventsTable = document.querySelector('#events-table tbody');
        const banner = document.getElementById('aiops-banner');

        function fetchStatus() {
            fetch('API/AiOps/status')
                .then(resp => resp.json())
                .then(renderStatus)
                .catch(() => {});
        }

        function renderStatus(data) {
            updateToggles(data.settings || {});
            renderUsage(data.usage || {});
            renderRuns(data.runs || []);
            renderEvents(data.events || []);
        }

        function updateToggles(settings) {
            document.querySelectorAll('[data-setting]').forEach(input => {
                const key = input.dataset.setting;
                if (settings.hasOwnProperty(key)) {
                    input.checked = Boolean(settings[key]);
                }
            });
        }

        function renderUsage(summary) {
            const entries = Object.entries(summary);
            if (!entries.length) {
                usageCards.innerHTML = '<div class=\"col-12 text-center text-muted py-3\">No usage recorded yet.</div>';
                banner.classList.add('d-none');
                return;
            }

            let showBanner = false;
            usageCards.innerHTML = entries.map(([subsystem, row]) => {
                const cap = row.cap?.cap_value ?? 0;
                const used = row.usage?.capacity_used ?? (row.runtime_seconds / 60 || 0);
                const pct = row.percent_used ?? 0;
                const barClass = pct >= 95 ? 'bg-danger' : pct >= 80 ? 'bg-warning' : 'bg-success';
                if (pct >= 80) {
                    showBanner = true;
                }
                return `
                    <div class=\"col-md-6 col-xl-4 mb-3\">
                        <div class=\"card h-100 border\">
                            <div class=\"card-body\">
                                <div class=\"d-flex justify-content-between\">
                                    <span class=\"text-uppercase small fw-bold\">${subsystem}</span>
                                    <span class=\"badge bg-light text-dark\">${pct}%</span>
                                </div>
                                <p class=\"mb-1\"><strong>Cap:</strong> ${Number(cap).toFixed(2)}</p>
                                <p class=\"mb-1\"><strong>Used:</strong> ${Number(used).toFixed(2)} (runs: ${row.runs ?? 0})</p>
                                <p class=\"small mb-2\">Requests: ${row.requests ?? 0} | Cache hits: ${row.cache_hits ?? 0} | Errors: ${row.errors ?? 0}</p>
                                <div class=\"progress\" style=\"height: 8px;\">
                                    <div class=\"progress-bar ${barClass}\" role=\"progressbar\" style=\"width: ${Math.min(100, pct)}%;\" aria-valuenow=\"${pct}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            banner.classList.toggle('d-none', !showBanner);
        }

        function renderRuns(runs) {
            if (!runs.length) {
                runsTable.innerHTML = '<tr><td colspan=\"5\" class=\"text-center text-muted\">No runs yet.</td></tr>';
                return;
            }
            runsTable.innerHTML = runs.map(run => `
                <tr>
                    <td>${run.id}</td>
                    <td>${run.job_key}</td>
                    <td>${run.subsystem}</td>
                    <td>${run.status}</td>
                    <td>${run.runtime_seconds ?? 0}s</td>
                </tr>
            `).join('');
        }

        function renderEvents(events) {
            if (!events.length) {
                eventsTable.innerHTML = '<tr><td colspan=\"4\" class=\"text-center text-muted\">No events yet.</td></tr>';
                return;
            }
            eventsTable.innerHTML = events.map(ev => `
                <tr>
                    <td>${ev.id}</td>
                    <td>${ev.subsystem}</td>
                    <td>${ev.event_type}</td>
                    <td>${ev.message ?? ''}</td>
                </tr>
            `).join('');
        }

        document.querySelectorAll('[data-setting]').forEach(input => {
            input.addEventListener('change', () => {
                const body = new URLSearchParams({ key: input.dataset.setting, value: input.checked ? '1' : '0' });
                fetch('API/AiOps/toggle', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body
                }).catch(() => {});
            });
        });

        document.querySelectorAll('[data-run]').forEach(btn => {
            btn.addEventListener('click', () => {
                const jobKey = btn.dataset.run;
                fetch('API/AiOps/run', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ jobKey })
                })
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.allowed === false) {
                            alert('Run blocked: ' + data.reason);
                        } else {
                            fetchStatus();
                        }
                    })
                    .catch(() => {});
            });
        });

        fetchStatus();
        setInterval(fetchStatus, 60000);
    })();
</script>
