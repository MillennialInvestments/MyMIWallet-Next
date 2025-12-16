<?php
/** @var array $post */
/** @var array $idea */
/** @var array $payload */
?>
<div class="modal-header">
    <h5 class="modal-title">Post Preview: <?= esc($post['platform']); ?></h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <div class="small text-soft">Symbol</div>
        <div class="h6 mb-0"><?= esc($idea['symbol'] ?? ''); ?></div>
    </div>
    <?php if (! empty($post['title'])): ?>
        <div class="mb-3">
            <div class="small text-soft">Title</div>
            <div><?= esc($post['title']); ?></div>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <div class="small text-soft">Body</div>
        <pre class="small bg-light p-2"><?= esc($post['body']); ?></pre>
    </div>
    <?php if (! empty($post['hashtags'])): ?>
        <div class="mb-3">
            <div class="small text-soft">Hashtags</div>
            <div><?= esc($post['hashtags']); ?></div>
        </div>
    <?php endif; ?>
    <?php if (! empty($post['cta'])): ?>
        <div class="mb-3">
            <div class="small text-soft">CTA</div>
            <div><?= esc($post['cta']); ?></div>
        </div>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
