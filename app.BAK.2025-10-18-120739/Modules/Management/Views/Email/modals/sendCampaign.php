<!-- app/Modules/Management/Views/Email/modals/sendCampaign.php -->
<div class="modal-header">
    <h5 class="modal-title">📝 Create Draft Campaign</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="createDraftCampaignForm" method="post" onsubmit="submitCreateDraftCampaign(event)">
        <?= csrf_field() ?>
        
        <div class="form-group">
            <label for="draftName">Draft Campaign Name</label>
            <input type="text" class="form-control" id="draftName" name="draftName" placeholder="Enter Campaign Name" required>
        </div>

        <div class="form-group mt-3">
            <label for="auto_schedule_at">⏳ Auto-Schedule Time (UTC)</label>
            <input type="datetime-local" class="form-control" name="auto_schedule_at" id="auto_schedule_at">
            <small class="form-text text-muted">Optional. If set, this draft will auto-schedule at the specified time.</small>
        </div>

        <button type="submit" class="btn btn-secondary mt-4">📝 Create Draft</button>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>
async function submitCreateDraftCampaign(e) {
    e.preventDefault();
    const name = document.getElementById('draftName').value;
    const autoScheduleAt = document.getElementById('auto_schedule_at').value;

    if (!name) {
        alert('Please provide a campaign name.');
        return;
    }

    const response = await fetch(`<?= site_url('API/Email/createDraftCampaign') ?>`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': "<?= csrf_hash() ?>"
        },
        body: JSON.stringify({
            name,
            auto_schedule_at: autoScheduleAt || null
        })
    });

    const result = await response.json();
    if (result.status === 'success') {
        alert('✅ Draft created: ID ' + result.campaignId);
        location.reload();
    } else {
        alert('❌ Failed to create draft.');
    }
}
</script>
