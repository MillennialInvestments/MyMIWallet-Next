<form id="editStepForm" method="POST" action="<?= site_url('API/Marketing/updateCampaignStep/' . $step['id']) ?>">
    <div class="modal-header">
        <h5 class="modal-title">✏️ Edit Campaign Step</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <input type="text" name="name" class="form-control mb-2" value="<?= esc($step['name']) ?>" required>
        <input type="text" name="subject" class="form-control mb-2" value="<?= esc($step['subject']) ?>" required>
        <input type="text" name="view_file" class="form-control mb-2" value="<?= esc($step['view_file']) ?>">
        <div class="row">
            <div class="col">
                <input type="number" name="delay_days" class="form-control" value="<?= $step['delay_days'] ?>" placeholder="Days Delay">
            </div>
            <div class="col">
                <input type="number" name="delay_hours" class="form-control" value="<?= $step['delay_hours'] ?>" placeholder="Hours Delay">
            </div>
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" <?= $step['is_active'] ? 'checked' : '' ?>>
            <label class="form-check-label">Step is active</label>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" type="submit">Update Step</button>
    </div>
</form>
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('editStepForm')?.addEventListener('submit', function (e) {
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
            alert('✅ Step updated successfully!');
            location.reload();
        } else {
            alert('❌ Update failed: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('🚨 Error updating step.');
    });
});
</script>
