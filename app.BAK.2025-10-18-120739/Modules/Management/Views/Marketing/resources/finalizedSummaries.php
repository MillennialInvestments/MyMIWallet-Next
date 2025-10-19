<!-- app/Modules/Management/Views/Marketing/resources/finalizedSummaries.php -->
<?php if (!empty($finalizedContent)): ?>
    <div class="row">
        <?php foreach ($finalizedContent as $post): ?>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title"><?= esc($post->title) ?></h6>
                        <p class="small text-muted"><?= date('F j, Y g:i A', strtotime($post->created_on)) ?></p>
                        <div class="mb-2"><?= esc(word_limiter(strip_tags($post->summary), 40)) ?></div>
                        <button class="btn btn-primary btn-sm" onclick='dynamicModalLoader("📋 Preview Generated Post", "<?= site_url('Management/Marketing/previewGeneratedPost/' . $post->id) ?>", "modal-lg")'>📋 Preview</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning">No finalized content available.</div>
<?php endif; ?>
