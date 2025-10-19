<!-- app/Modules/Management/Views/Email/modals/sendCampaign.php -->
 <div class="modal-header">
    <h5 class="modal-title">Clone Campaign</h5>
</div>
<div class="modal-body">
    <form id="cloneCampaignForm" method="post" onsubmit="submitCloneCampaign(event)">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="campaignId">Campaign ID to Clone</label>
            <input type="text" class="form-control" id="campaignId" name="campaignId" placeholder="Enter Campaign ID" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">🔁 Clone Campaign</button>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>
async function submitCloneCampaign(e) {
    e.preventDefault();
    const campaignId = document.getElementById('campaignId').value;
    if (!campaignId) {
        alert('Please provide a campaign ID.');
        return;
    }
    const response = await fetch(`<?= site_url('API/Email/cloneCampaign/') ?>${encodeURIComponent(campaignId)}`);
    const result = await response.json();
    if (result.status === 'success') {
        alert('✅ Campaign cloned successfully: New ID = ' + result.newCampaignId);
        location.reload();
    } else {
        alert('❌ Failed to clone campaign.');
    }
}
</script>
