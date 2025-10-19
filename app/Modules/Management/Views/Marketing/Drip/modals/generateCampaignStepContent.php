<div class="modal-header">
    <h5 class="modal-title">⚡ Generate Step Content</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body text-center">
    <p>Generate AI content for this drip campaign step?</p>
    <form action="<?= site_url('API/Marketing/generateStepContent/' . $step['id']) ?>" method="POST">
        <button type="submit" class="btn btn-primary">Generate Step Content</button>
    </form>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const csrfToken = '<?= csrf_hash() ?>';
    const stepId = <?= json_encode($stepId ?? 0) ?>;

    const generateStepBtn = document.getElementById("generateCampaignStepContentBtn");
    const resultBlock = document.getElementById("stepGeneratedResult");

    if (generateStepBtn && resultBlock) {
        generateStepBtn.addEventListener("click", function () {
            resultBlock.innerHTML = `
                <div class="text-center my-4">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="visually-hidden">Generating step content...</span>
                    </div>
                    <p class="mt-2">Processing your step content...</p>
                </div>`;

            fetch(`<?= site_url('API/Marketing/generateCampaignStepContent/') ?>${stepId}`, {
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
                        <div class="alert alert-success">✅ Step content generated!</div>
                        <div class="mb-3">
                            <label>Subject</label>
                            <input class="form-control" value="${content.subject || ''}" />
                        </div>
                        <div class="mb-3">
                            <label>Email Body</label>
                            <textarea class="form-control" rows="4">${content.email_body || ''}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>CTA</label>
                            <textarea class="form-control" rows="2">${content.cta || ''}</textarea>
                        </div>`;
                } else {
                    resultBlock.innerHTML = `
                        <div class="alert alert-danger">❌ ${data.message || 'Could not generate step content.'}</div>`;
                }
            })
            .catch(err => {
                console.error("Error:", err);
                resultBlock.innerHTML = `
                    <div class="alert alert-danger">❌ A system error occurred during generation.</div>`;
            });
        });
    }
});
</script>

