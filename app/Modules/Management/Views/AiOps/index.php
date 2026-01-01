<?php /** @var array $summary */ ?>
<div class="container-fluid py-4">
    <div class="row mb-3">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mb-0">AI Ops Control Center</h3>
            <div>
                <label class="form-check-label me-2">Master Switch</label>
                <input type="checkbox" id="ai-master-toggle" class="form-check-input" <?= $siteSettings->aiOpsEnabled ? 'checked' : '' ?> />
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Subsystems</h6>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="toggle-marketing" <?= $siteSettings->aiAutoMarketingEnabled ? 'checked' : '' ?>>
                        <label class="form-check-label" for="toggle-marketing">Marketing (ChatGPT API)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="toggle-alerts" <?= $siteSettings->aiAutoAlertsEnabled ? 'checked' : '' ?>>
                        <label class="form-check-label" for="toggle-alerts">Alerts (ChatGPT API)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="toggle-analytics" <?= $siteSettings->aiAutoAnalyticsEnabled ? 'checked' : '' ?>>
                        <label class="form-check-label" for="toggle-analytics">Analytics (ChatGPT API)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="toggle-codex" <?= $siteSettings->aiCodexApiEnabled ? 'checked' : '' ?>>
                        <label class="form-check-label" for="toggle-codex">Codex API</label>
                    </div>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="toggle-override" <?= $siteSettings->aiOpsAllowOverride ? 'checked' : '' ?>>
                        <label class="form-check-label" for="toggle-override">Override beyond caps (admin only)</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-title mb-0">Usage — <?= esc($monthKey) ?></h6>
                        <div>
                            <button class="btn btn-outline-primary btn-sm me-2" data-run="runMarketingDaily">Run Marketing</button>
                            <button class="btn btn-outline-primary btn-sm me-2" data-run="runAlertsDigest">Run Alerts</button>
                            <button class="btn btn-outline-primary btn-sm me-2" data-run="runAnalyticsWeekly">Run Analytics</button>
                            <button class="btn btn-outline-secondary btn-sm" data-run="checkCapsAndAlert">Check Caps</button>
                        </div>
                    </div>
                    <div class="row" id="ai-usage-cards">
                        <?php foreach ($summary as $subsystem => $row): ?>
                            <?php $percent = $row['percent_used'] ?? 0; ?>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 border">
                                    <div class="card-body">
                                        <h6 class="card-title text-uppercase small mb-2"><?= esc($subsystem) ?></h6>
                                        <p class="mb-1"><strong>Cap:</strong> $<?= number_format($row['cap_usd'] ?? 0, 2) ?></p>
                                        <p class="mb-1"><strong>Used:</strong> $<?= number_format($row['used_usd'] ?? 0, 2) ?> (<?= $percent ?>%)</p>
                                        <p class="mb-1 small">Requests: <?= $row['requests'] ?? 0 ?> | Cache hits: <?= $row['cache_hits'] ?? 0 ?> | Errors: <?= $row['status_error'] ?? 0 ?></p>
                                        <div class="progress" style="height: 8px;">
                                            <?php
                                                $barClass = 'bg-success';
                                                if ($percent >= 95) {
                                                    $barClass = 'bg-danger';
                                                } elseif ($percent >= 80) {
                                                    $barClass = 'bg-warning';
                                                }
                                            ?>
                                            <div class="progress-bar <?= $barClass ?>" role="progressbar" style="width: <?= min(100, $percent) ?>%;" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Recent Events</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subsystem</th>
                                    <th>Event</th>
                                    <th>Message</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody id="ai-events-table">
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?= $event['id'] ?></td>
                                        <td><?= esc($event['subsystem']) ?></td>
                                        <td><?= esc($event['event_type']) ?></td>
                                        <td><?= esc($event['message']) ?></td>
                                        <td><?= esc($event['created_at']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const toggleEndpoints = {
            'ai-master-toggle': 'aiOpsEnabled',
            'toggle-marketing': 'aiAutoMarketingEnabled',
            'toggle-alerts': 'aiAutoAlertsEnabled',
            'toggle-analytics': 'aiAutoAnalyticsEnabled',
            'toggle-codex': 'aiCodexApiEnabled',
            'toggle-override': 'aiOpsAllowOverride',
        };

        Object.keys(toggleEndpoints).forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('change', () => {
                fetch('/API/AiOps/toggle', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: new URLSearchParams({key: toggleEndpoints[id], value: el.checked ? '1' : '0'})
                }).catch(() => {});
            });
        });

        document.querySelectorAll('[data-run]').forEach(btn => {
            btn.addEventListener('click', () => {
                fetch('/API/AiOps/' + btn.dataset.run)
                    .then(r => r.json())
                    .then(data => console.log('AiOps run', data))
                    .catch(() => {});
            });
        });

        function refreshEvents() {
            fetch('/API/AiOps/events?limit=50')
                .then(r => r.json())
                .then(data => {
                    const tbody = document.getElementById('ai-events-table');
                    if (!tbody || !data.events) return;
                    tbody.innerHTML = data.events.map(ev => `
                        <tr>
                            <td>${ev.id}</td>
                            <td>${ev.subsystem}</td>
                            <td>${ev.event_type}</td>
                            <td>${ev.message ?? ''}</td>
                            <td>${ev.created_at ?? ''}</td>
                        </tr>
                    `).join('');
                })
                .catch(() => {});
        }

        setInterval(refreshEvents, 60000);
    })();
</script>
