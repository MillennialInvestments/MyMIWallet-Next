<form id="editCampaignForm" method="POST" action="<?= site_url('API/Marketing/updateCampaign/' . $campaign['id']) ?>">
    <div class="modal-header">
        <h5 class="modal-title">✏️ Edit Drip Campaign</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <input type="text" name="name" class="form-control mb-2" value="<?= esc($campaign['name']) ?>" placeholder="Campaign Name" required>
        <textarea name="description" class="form-control mb-2" placeholder="Description"><?= esc($campaign['description']) ?></textarea>
        <input type="text" name="trigger" class="form-control mb-2" value="<?= esc($campaign['trigger']) ?>" placeholder="Trigger">
        <input type="text" name="audience_tags" class="form-control mb-2" value="<?= esc($campaign['audience_tags']) ?>" placeholder="Audience Tags">
        <select name="status" class="form-control">
            <option value="1" <?= $campaign['status'] ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= !$campaign['status'] ? 'selected' : '' ?>>Inactive</option>
        </select>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" type="submit">Update</button>
    </div>
</form>
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('editCampaignForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const actionUrl = form.getAttribute('action');

    fetch(actionUrl, {
        method: 'POST',
        body: formData,
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            alert('✅ Campaign updated successfully!');
            location.reload();
        } else {
            alert('❌ Update failed: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('🚨 Error updating campaign.');
    });
});
</script>
