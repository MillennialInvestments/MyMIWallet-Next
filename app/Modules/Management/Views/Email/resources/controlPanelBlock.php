<div class="card card-bordered mb-4">
    <div class="card-inner">

        <div class="d-flex align-items-center justify-content-between mb-2">
            <h5 class="mb-0 title">🛠️ Email Control Panel</h5>
        </div>

        <!-- 📈 Add LIVE STATS block right here -->
        <div class="row text-center mb-3">
            <div class="col">
                <h6>📬 Pending</h6>
                <div id="pendingCount" class="h5 text-primary">0</div>
            </div>
            <div class="col">
                <h6>✅ Sent</h6>
                <div id="sentCount" class="h5 text-success">0</div>
            </div>
            <div class="col">
                <h6>📈 Open Rate</h6>
                <div id="openRate" class="h5 text-info">0%</div>
            </div>
            <div class="col">
                <h6>🚪 Unsubscribed</h6>
                <div id="unsubscribedCount" class="h5 text-warning">0</div>
            </div>
            <div class="col">
                <h6>❌ Bounced</h6>
                <div id="bouncedCount" class="h5 text-danger">0</div>
            </div>
        </div>

        <!-- Then your Control Panel buttons -->
        <div class="d-flex flex-wrap gap-2 justify-content-end mt-3">
            <button class="btn btn-danger btn-sm" onclick='cancelScheduledCampaign(<?= $campaign['id'] ?>)'>❌ Cancel Schedule</button>
            <button class="btn btn-warning" onclick="cloneCampaign()">🧬 Clone Campaign</button>
            <button class="btn btn-secondary" onclick="createDraftCampaign()">📝 Create Draft</button>
            <button class="btn btn-success" id="generatePostBtn">📝 Generate New Post</button>
            <button class="btn btn-primary" onclick="generateTodaysStory()">📢 Generate Today’s Story</button>
            <button class="btn btn-outline-secondary" onclick="refreshDashboard()">🔄 Refresh Dashboard</button>
            <button class="btn btn-info" onclick="loadPendingSummaries()">🧪 Preview Summaries</button>
            <button class="btn btn-warning" onclick="triggerReprocessIncompleteEmails()">🛠️ Reprocess Emails</button>
            <a class="btn btn-warning" href="<?= site_url('API/Management/triggerBackfill') ?>">🔁 Run Backfill for Incomplete Posts</a>
            <button class="btn btn-sm btn-primary" onclick="scheduleCampaign(<?= $campaign['id'] ?>)">Schedule</button>
            <button class="btn btn-info" onclick="sendTestCampaign()">📧 Send Test to Admins</button>
        </div>

    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
async function cloneCampaign() {
    const campaignId = prompt('Enter Campaign ID to Clone:');
    if (!campaignId) return alert('Campaign ID is required.');

    const response = await fetch(`<?= site_url('API/Email/cloneCampaign/') ?>${campaignId}`);
    const data = await response.json();
    if (data.status === 'success') {
        alert('✅ Campaign cloned successfully. New ID: ' + data.newCampaignId);
        location.reload();
    } else {
        alert('❌ Failed to clone campaign.');
    }
}

async function createDraftCampaign() {
    const name = prompt('Enter Draft Campaign Name:');
    if (!name) return alert('Campaign Name is required.');

    const response = await fetch(`<?= site_url('API/Email/createDraftCampaign') ?>`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': "<?= csrf_hash() ?>"
        },
        body: JSON.stringify({ name })
    });

    const data = await response.json();
    if (data.status === 'success') {
        alert('✅ Draft created. Campaign ID: ' + data.campaignId);
        location.reload();
    } else {
        alert('❌ Failed to create draft.');
    }
}
async function loadEmailQueueStats() {
    try {
        const response = await fetch("<?= site_url('API/Email/getEmailQueueStats') ?>");
        const data = await response.json();

        if (data.status === 'success') {
            document.getElementById('pendingCount').textContent = data.pending;
            document.getElementById('sentCount').textContent = data.sent;
            document.getElementById('openRate').textContent = data.openRate + '%';
            document.getElementById('unsubscribedCount').textContent = data.unsubscribed;
            document.getElementById('bouncedCount').textContent = data.bounced;
        }
    } catch (err) {
        console.error("❌ Failed to fetch email stats:", err);
    }
}
async function sendTestCampaign() {
    const campaignId = prompt("Enter Campaign ID to send test:");

    if (!campaignId) {
        alert("Campaign ID is required.");
        return;
    }

    try {
        const response = await fetch("<?= site_url('API/Email/sendMassTestCampaign') ?>?campaign_id=" + encodeURIComponent(campaignId));
        const data = await response.json();

        if (data.status === 'success') {
            alert('✅ ' + data.message);
        } else {
            alert('❌ ' + data.message);
        }
    } catch (err) {
        console.error(err);
        alert('❌ Failed to send test emails.');
    }
}
window.scheduleCampaign = (id) => {
    dynamicModalLoader('Schedule Campaign', `<?= site_url('Management/Email/scheduleCampaignModal/') ?>${id}`, 'modal-md');
};

</script>