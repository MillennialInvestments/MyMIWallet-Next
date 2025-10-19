<!-- app/Modules/Management/Views/Marketing/modals/viewGeneratedPost.php -->
<div class="modal-header">
    <h3 class="modal-title"><?= esc($post['title']) ?></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <p><strong>Category:</strong> <?= esc($post['category']) ?></p>
    <p><strong>Generated At:</strong> <?= date('M d, Y H:i A', strtotime($post['created_at'])) ?></p>
    <hr>
    <h5>📝 Blog Content</h5>
    <p><?= esc($post['blog_content']) ?></p>
    <hr>

    <?php if (!empty($platforms)): ?>
        <?php foreach ($platforms as $platform => $message): ?>
            <h6><?= ucfirst($platform) ?> Post:</h6>
            <textarea class="form-control mb-3" readonly style="height: 100px;"><?= esc($message) ?></textarea>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No social content found.</p>
    <?php endif; ?>
</div>
