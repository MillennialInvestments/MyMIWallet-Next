<div class="modal-header">
    <h5 class="modal-title text-danger">🗑️ Delete Step</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body text-center">
    <p>This action will permanently delete the campaign step.</p>
    <form action="<?= site_url('API/Marketing/deleteStep/' . $step['id']) ?>" method="POST">
        <button type="submit" class="btn btn-danger">Confirm Deletion</button>
    </form>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.querySelector('form[action*="deleteStep"]')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!confirm('Are you sure you want to delete this step?')) return;

    const form = e.target;
    const formData = new FormData(form);
    const url = form.getAttribute('action');

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            alert('🗑️ Step deleted.');
            location.reload();
        } else {
            alert('❌ Failed to delete step: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(err => {
        console.error('Fetch error:', err);
        alert('🚨 Error deleting step.');
    });
});
</script>
