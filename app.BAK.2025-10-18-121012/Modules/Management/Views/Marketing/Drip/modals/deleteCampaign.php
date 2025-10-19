<div class="modal-header">
    <h5 class="modal-title text-danger">🗑️ Delete Drip Campaign</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body text-center">
    <p>Are you sure you want to permanently delete this campaign?</p>
    <form action="<?= site_url('API/Marketing/deleteCampaign/' . $campaign['id']) ?>" method="POST">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
    </form>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.querySelector('form[action*="deleteCampaign"]')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!confirm('Are you sure you want to delete this campaign?')) return;

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
            alert('🗑️ Campaign deleted.');
            location.reload();
        } else {
            alert('❌ Failed to delete: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(err => {
        console.error('Fetch error:', err);
        alert('🚨 Error deleting campaign.');
    });
});
</script>
