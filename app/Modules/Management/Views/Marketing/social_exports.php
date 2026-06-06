<div class="container-fluid py-4">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title">Social Export Queue</h3>
            <p class="text-muted">Draft-only Zapier and TBI Marketing export orchestration.</p>
        </div>
    </div>

    <div class="alert alert-warning">
        Zapier and TBI Marketing sends are disabled unless explicitly enabled through environment configuration.
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <button class="btn btn-primary" onclick="loadSocialExports()">Refresh Jobs</button>
            <button class="btn btn-outline-primary" onclick="queueApprovedExports()">Queue Approved Drafts</button>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <h5>Export Jobs</h5>
            <pre id="social-export-jobs" class="bg-light p-3" style="max-height: 420px; overflow:auto;">Loading...</pre>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <h5>Delivery Logs</h5>
            <pre id="social-delivery-logs" class="bg-light p-3" style="max-height: 420px; overflow:auto;">Loading...</pre>
        </div>
    </div>
</div>

<script>
async function socialFetch(url, options = {}) {
    const res = await fetch(url, options);
    return await res.json();
}

async function loadSocialExports() {
    const jobs = await socialFetch('<?= site_url('API/Management/getSocialExportJobs') ?>');
    const logs = await socialFetch('<?= site_url('API/Management/getSocialDeliveryLogs') ?>');

    document.getElementById('social-export-jobs').textContent = JSON.stringify(jobs, null, 2);
    document.getElementById('social-delivery-logs').textContent = JSON.stringify(logs, null, 2);
}

async function queueApprovedExports() {
    const result = await socialFetch('<?= site_url('API/Management/queueApprovedSocialExports') ?>');
    alert(JSON.stringify(result, null, 2));
    loadSocialExports();
}

document.addEventListener('DOMContentLoaded', loadSocialExports);
</script>
