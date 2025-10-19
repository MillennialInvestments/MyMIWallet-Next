<?php
// Assume: $emailData = email row from `bf_marketing_temp_scraper` or `bf_marketing_scraper`
// Assume: $generatedPosts = array of social post formats
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title title">📧 Email Preview</h3>
                        <a href="<?php echo site_url('/Management/Marketing'); ?>" class="btn btn-sm btn-outline-primary mt-2">← Back to Marketing Dashboard</a>
                    </div>
                </div>
            </div>

            <!-- Email Summary -->
            <div class="card card-bordered mt-4">
                <div class="card-inner">
                    <h5 class="title">📨 <?= esc($emailData['title'] ?? '(Untitled Email)') ?></h5>
                    <p><strong>Source:</strong> <?= esc($emailData['source_id'] ?? 'Unknown') ?></p>
                    <p><strong>Received:</strong> <?= date('M d, Y h:i A', strtotime($emailData['created_at'])) ?></p>
                    <hr>
                    <div style="max-height: 400px; overflow-y: auto; background: #f9f9f9; padding: 1em; border-radius: 6px;">
                        <?= nl2br(esc($emailData['content'])) ?>
                    </div>
                </div>
            </div>

            <!-- Social Media Previews -->
            <?php if (!empty($generatedPosts)): ?>
                <div class="card card-bordered mt-4">
                    <div class="card-inner">
                        <h5 class="title">📣 Generated Social Media Posts</h5>
                        <ul class="list-group">
                            <?php foreach ($generatedPosts as $platform => $post): ?>
                                <li class="list-group-item">
                                    <strong><?= ucfirst($platform) ?>:</strong><br>
                                    <?= esc($post) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <div class="card card-bordered mt-4">
                    <div class="card-inner text-danger">
                        <p>⚠️ No social posts generated for this email yet.</p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Generate Button -->
            <div class="card card-bordered mt-3">
                <div class="card-inner d-flex justify-content-between align-items-center">
                    <h6 class="title">🛠️ Want to generate content now?</h6>
                    <button class="btn btn-success btn-sm" id="regenerateContentBtn">Generate Posts</button>
                    <span id="regenerate-status" class="text-success ml-2"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById("regenerateContentBtn").addEventListener("click", function () {
    const status = document.getElementById("regenerate-status");
    status.textContent = '⏳ Generating...';

    fetch("<?= site_url('API/Marketing/generateFromEmailId/' . $emailData['id']) ?>")
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                status.textContent = "✅ " + data.message;
                setTimeout(() => location.reload(), 1000);
            } else {
                status.textContent = "❌ " + data.message;
            }
        })
        .catch(err => {
            status.textContent = "❌ Error: " + err.message;
        });
});
</script>
