<!-- app/Modules/Management/Views/Email/modals/createDraftCampaign.php -->
<div class="modal-header">
    <h5 class="modal-title">Create Draft Campaign</h5>
</div>
<div class="modal-body">
    <form id="createDraftCampaignForm" method="post" onsubmit="submitCreateDraftCampaign(event)">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="draftName">Campaign Name</label>
            <input type="text" class="form-control" id="draftName" name="draftName" required>
        </div>

        <div class="form-group mt-3">
            <label for="tags">Tags (optional)</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags separated by commas">
        </div>

        <div class="form-group mt-3">
            <label for="auto_schedule_at">Auto Schedule At (UTC)</label>
            <input type="datetime-local" class="form-control" id="auto_schedule_at" name="auto_schedule_at">
        </div>

        <button type="submit" class="btn btn-primary mt-3">📝 Create Draft</button>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>
async function submitCreateDraftCampaign(e) {
    e.preventDefault();

    const name = document.getElementById('draftName').value;
    const tags = document.getElementById('tags').value;
    const auto_schedule_at = document.getElementById('auto_schedule_at').value;

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
        body: JSON.stringify({ name, tags, auto_schedule_at })
    });

    const result = await response.json();

    if (result.status === 'success') {
        alert('✅ Draft campaign created: ID = ' + result.campaignId);
        location.reload();
    } else {
        alert('❌ Failed to create draft.');
    }
}
</script>
