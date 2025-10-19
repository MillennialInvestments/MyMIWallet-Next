<!-- app/Modules/Management/Views/Email/modals/editCampaign.php -->
<div class="modal-header">
    <h5 class="modal-title">✏️ Edit Campaign</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="editCampaignForm" method="post" onsubmit="submitEditCampaign(event)">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="editName">Campaign Name</label>
            <input type="text" class="form-control" id="editName" name="editName" value="<?= esc($campaign['name']) ?>" required>
        </div>

        <div class="form-group mt-3">
            <label for="editAutoScheduleAt">⏳ Auto-Schedule Time (UTC)</label>
            <input type="datetime-local" class="form-control" name="editAutoScheduleAt" id="editAutoScheduleAt" value="<?= esc($campaign['auto_schedule_at'] ?? '') ?>">
            <small class="form-text text-muted">Optional. If set, updates the auto-schedule time.</small>
        </div>

        <input type="hidden" id="editCampaignId" value="<?= esc($campaign['id']) ?>">

        <button type="submit" class="btn btn-primary mt-4">💾 Save Changes</button>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>
async function submitEditCampaign(e) {
    e.preventDefault();
    const id = document.getElementById('editCampaignId').value;
    const name = document.getElementById('editName').value;
    const autoScheduleAt = document.getElementById('editAutoScheduleAt').value;

    const response = await fetch(`<?= site_url('API/Email/updateCampaign') ?>/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': "<?= csrf_hash() ?>"
        },
        body: JSON.stringify({ name, auto_schedule_at: autoScheduleAt || null })
    });

    const result = await response.json();
    if (result.status === 'success') {
        alert('✅ Campaign updated.');
        location.reload();
    } else {
        alert('❌ Failed to update campaign.');
    }
}
</script>
