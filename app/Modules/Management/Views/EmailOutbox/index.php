<?php
$filters = $filters ?? [];
$outboxRows = $outboxRows ?? [];
?>
<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">📬 Email Outbox</h4>
            <div class="nk-block-des">
                <p>Review transactional email history and send a test email.</p>
            </div>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <form method="get" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="">All</option>
                        <option value="activation" <?= ($filters['type'] ?? '') === 'activation' ? 'selected' : '' ?>>Activation</option>
                        <option value="reset" <?= ($filters['type'] ?? '') === 'reset' ? 'selected' : '' ?>>Reset</option>
                        <option value="generic" <?= ($filters['type'] ?? '') === 'generic' ? 'selected' : '' ?>>Generic</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="queued" <?= ($filters['status'] ?? '') === 'queued' ? 'selected' : '' ?>>Queued</option>
                        <option value="sent" <?= ($filters['status'] ?? '') === 'sent' ? 'selected' : '' ?>>Sent</option>
                        <option value="failed" <?= ($filters['status'] ?? '') === 'failed' ? 'selected' : '' ?>>Failed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">From</label>
                    <input type="date" name="date_from" class="form-control" value="<?= esc($filters['date_from'] ?? '') ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label">To</label>
                    <input type="date" name="date_to" class="form-control" value="<?= esc($filters['date_to'] ?? '') ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Email or subject" value="<?= esc($filters['search'] ?? '') ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="<?= site_url('Management/EmailOutbox') ?>" class="btn btn-light">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <table class="table table-striped" id="emailOutboxTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Sent</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($outboxRows as $row): ?>
                        <tr data-email='<?= esc(json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)) ?>'>
                            <td><?= esc((string) $row['id']) ?></td>
                            <td><?= esc((string) $row['to_email']) ?></td>
                            <td><?= esc((string) $row['subject']) ?></td>
                            <td><?= esc((string) $row['type']) ?></td>
                            <td><?= esc((string) $row['status']) ?></td>
                            <td><?= esc((string) $row['created_at']) ?></td>
                            <td><?= esc((string) ($row['sent_at'] ?? '-')) ?></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" type="button" onclick="showOutboxDetails(this)">View</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="mb-3">Send Test Email</h5>
            <form id="sendTestEmailForm">
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Recipient</label>
                        <input type="email" class="form-control" name="to_email" required placeholder="support@mymiwallet.com">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Template</label>
                        <select class="form-select" name="template">
                            <option value="activation">Activation</option>
                            <option value="reset">Reset</option>
                            <option value="generic">Generic</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="outboxDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="outboxDetailContent"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="testEmailResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Test Email Result</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="testEmailResultBody"></div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    function showOutboxDetails(button) {
        const row = button.closest('tr');
        const data = JSON.parse(row.dataset.email || '{}');
        const meta = data.meta_json ? JSON.parse(data.meta_json) : {};

        const html = `
            <dl class="row">
                <dt class="col-sm-4">To</dt><dd class="col-sm-8">${data.to_email || '-'}</dd>
                <dt class="col-sm-4">Subject</dt><dd class="col-sm-8">${data.subject || '-'}</dd>
                <dt class="col-sm-4">Type</dt><dd class="col-sm-8">${data.type || '-'}</dd>
                <dt class="col-sm-4">Status</dt><dd class="col-sm-8">${data.status || '-'}</dd>
                <dt class="col-sm-4">Provider</dt><dd class="col-sm-8">${data.provider || '-'}</dd>
                <dt class="col-sm-4">Created</dt><dd class="col-sm-8">${data.created_at || '-'}</dd>
                <dt class="col-sm-4">Sent</dt><dd class="col-sm-8">${data.sent_at || '-'}</dd>
                <dt class="col-sm-4">Error</dt><dd class="col-sm-8">${data.error_message || '-'}</dd>
                <dt class="col-sm-4">Meta</dt><dd class="col-sm-8"><pre class="mb-0">${JSON.stringify(meta, null, 2)}</pre></dd>
            </dl>
        `;

        document.getElementById('outboxDetailContent').innerHTML = html;
        const modal = new bootstrap.Modal(document.getElementById('outboxDetailModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (window.jQuery && $.fn && $.fn.DataTable) {
            $('#emailOutboxTable').DataTable({
                order: [[0, 'desc']],
                pageLength: 25,
            });
        }

        const form = document.getElementById('sendTestEmailForm');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(form);

            const response = await fetch('<?= site_url('Management/EmailOutbox/send-test') ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData,
            });

            const data = await response.json();
            const body = document.getElementById('testEmailResultBody');
            body.innerHTML = `<div class="alert ${data.status === 'success' ? 'alert-success' : 'alert-danger'}">${data.message}</div>`;
            const modal = new bootstrap.Modal(document.getElementById('testEmailResultModal'));
            modal.show();
        });
    });
</script>
