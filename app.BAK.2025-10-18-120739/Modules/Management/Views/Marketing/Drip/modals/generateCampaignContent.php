<div class="modal-header">
    <h5 class="modal-title">⚡ Generate Campaign Content</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body text-center">
    <p>Are you sure you want to generate AI content for this drip campaign?</p>
    <form action="<?= site_url('API/Marketing/generateCampaignContent/' . $campaign['id']) ?>" method="POST">
        <button type="submit" class="btn btn-primary">Generate Now</button>
    </form>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const csrfToken = '<?= csrf_hash() ?>';
    const campaignId = <?= json_encode($campaignId ?? 0) ?>;

    const generateBtn = document.getElementById("generateCampaignContentBtn");
    const resultBlock = document.getElementById("campaignGeneratedResult");

    if (generateBtn && resultBlock) {
        generateBtn.addEventListener("click", function () {
            resultBlock.innerHTML = `
                <div class="text-center my-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Generating content...</span>
                    </div>
                    <p class="mt-2">Please wait while we generate your campaign content...</p>
                </div>`;

            fetch(`<?= site_url('API/Marketing/generateCampaignContent/') ?>${campaignId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ csrf_test_name: csrfToken })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    const content = data.generated || {};
                    resultBlock.innerHTML = `
                        <div class="alert alert-success">✅ Content generated successfully!</div>
                        <div class="mb-3">
                            <label>Email Body</label>
                            <textarea class="form-control" rows="4">${content.email_body || ''}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Social Media</label>
                            <textarea class="form-control" rows="4">${content.social_media || ''}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>CTA</label>
                            <textarea class="form-control" rows="2">${content.cta || ''}</textarea>
                        </div>`;
                } else {
                    resultBlock.innerHTML = `
                        <div class="alert alert-danger">❌ ${data.message || 'Failed to generate content.'}</div>`;
                }
            })
            .catch(err => {
                console.error("Error:", err);
                resultBlock.innerHTML = `
                    <div class="alert alert-danger">❌ A system error occurred while generating content.</div>`;
            });
        });
    }
});
</script>
