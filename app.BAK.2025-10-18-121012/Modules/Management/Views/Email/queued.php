<!-- app/Modules/Management/Views/Email/queued.php -->

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">📩 Queued Emails</h4>
            <div class="nk-block-des">
                <p>View, search, and preview emails scheduled for sending.</p>
            </div>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">

            <!-- ✅ Search Box -->
            <div class="input-group mb-3">
                <input type="text" id="searchQueued" class="form-control" placeholder="Search by Email, Subject, Campaign ID">
                <button class="btn btn-primary" onclick="loadQueuedEmails(0)">🔍 Search</button>
            </div>

            <!-- ✅ Live Email Table -->
            <div id="queuedEmailsTable"></div>

            <!-- ✅ Pagination -->
            <nav>
                <ul class="pagination justify-content-center mt-4" id="paginationNav"></ul>
            </nav>

        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
let currentPage = 0;
const limitPerPage = 25;

async function loadQueuedEmails(page = 0) {
    const search = document.getElementById('searchQueued').value.trim();
    const offset = page * limitPerPage;

    try {
        const response = await fetch("<?= site_url('API/Email/fetchQueuedEmails') ?>?limit=" + limitPerPage + "&offset=" + offset + "&search=" + encodeURIComponent(search));
        const data = await response.json();

        if (data.status === 'success') {
            renderQueuedEmailsTable(data.emails);
            renderPagination(data.total, page);
        }
    } catch (err) {
        console.error("Failed to load queued emails:", err);
    }
}

function renderQueuedEmailsTable(emails) {
    let html = '<div class="table-responsive"><table class="table table-striped">';
    html += '<thead><tr><th>Email</th><th>Subject</th><th>Campaign ID</th><th>Status</th><th>Scheduled</th><th>Created</th><th>Preview</th></tr></thead><tbody>';

    if (emails.length === 0) {
        html += '<tr><td colspan="7" class="text-center">No queued emails found.</td></tr>';
    } else {
        emails.forEach(email => {
            html += `<tr>
                <td>${email.email}</td>
                <td>${email.subject}</td>
                <td>${email.campaign_id ?? '-'}</td>
                <td>${email.status}</td>
                <td>${email.scheduled_at ?? '-'}</td>
                <td>${email.created_at}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="dynamicModalLoader('Email Preview', '<?= site_url('Management/Email/previewQueuedEmail/') ?>${email.id}', 'modal-lg')">
                        View
                    </button>
                </td>
            </tr>`;
        });
    }

    html += '</tbody></table></div>';
    document.getElementById('queuedEmailsTable').innerHTML = html;
}

function renderPagination(total, page) {
    const totalPages = Math.ceil(total / limitPerPage);
    let html = '';

    for (let i = 0; i < totalPages; i++) {
        html += `<li class="page-item ${i === page ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="loadQueuedEmails(${i})">${i + 1}</a>
                 </li>`;
    }

    document.getElementById('paginationNav').innerHTML = html;
}

// Auto-load first page
document.addEventListener('DOMContentLoaded', () => {
    loadQueuedEmails(0);
});
</script>
