<!-- app/Modules/Management/Views/Marketing/modals/previewGeneratedPost.php -->
<div class="modal-header">
    <h5 class="modal-title"><?= esc($post['title']) ?></h5>
    <?php if (!empty($post['keywords'])): ?>
        <div class="mt-2">
            <?php foreach (explode(',', $post['keywords']) as $keyword): ?>
                <span class="badge bg-primary text-light me-1">#<?= ucfirst(trim($keyword)) ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <?php if (!empty($keywords)) : ?>
        <div class="mb-3">
            <div class="d-flex flex-wrap gap-2">
                <?php foreach ($keywords as $keyword): ?>
                    <span class="badge bg-primary text-light">#<?= esc($keyword) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <p class="small text-muted"><?= date('F j, Y g:i A', strtotime($post['created_at'])) ?></p>

    <?php if (!empty($post['top_keywords'])) : ?>
        <div class="mb-3">
            <strong>📈 Trending Keywords:</strong><br>
            <?php foreach ($post['top_keywords'] as $keyword): ?>
                <span class="badge bg-primary-subtle text-primary-emphasis me-1">#<?= esc($keyword) ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <p><?= esc($post['summary']) ?></p>

    <?php if (!empty($post['keywords'])) : ?>
        <div class="small mt-2 text-muted">
            <strong>Tags:</strong>
            <?php foreach (explode(',', $post['keywords']) as $tag): ?>
                <span class="badge bg-light text-dark me-1">#<?= trim($tag) ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($post['cta'])) : ?>
        <div class="mt-3 alert alert-primary">
            <strong>Call to Action:</strong><br>
            <?= esc($post['cta']) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($cleaned_summary)) : ?>
        <div class="alert alert-info mt-3">
            <h6 class="mb-2">🎤 Cleaned Summary</h6>
            <pre class="text-wrap small" id="cleaned_summary"><?= esc($cleaned_summary) ?></pre>
            <button class="btn btn-sm btn-secondary mt-2" onclick="copyToClipboard('cleaned_summary')">📋 Copy Script</button>
        </div>
    <?php endif; ?>

    <?php if (!empty($post['voiceover'])) : ?>
        <div class="alert alert-info mt-3">
            <h6 class="mb-2">🎤 Voiceover Script</h6>
            <pre class="small" id="voiceover-script"><?= esc($post['voiceover']) ?></pre>
            <button class="btn btn-sm btn-secondary mt-2" onclick="copyToClipboard('voiceover-script')">📋 Copy Script</button>
        </div>
    <?php endif; ?>

    <?php if (!empty($voiceover_url)) : ?>
        <div class="mt-2">
            <a href="<?= esc($voiceover_url) ?>" class="btn btn-sm btn-info" download>
                🎧 Download Voiceover MP3
            </a>
        </div>
    <?php endif; ?>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function copyToClipboard(id) {
    const el = document.getElementById(id);
    if (!el) return alert('❌ Script block not found');
    navigator.clipboard.writeText(el.innerText).then(() => {
        alert('✅ Copied to clipboard!');
    });
}
</script>
