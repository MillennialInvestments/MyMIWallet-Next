<div class="modal-header">
    <h5 class="modal-title">Preview Buffer #<?= $item['id'] ?></h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
</div>
<div class="modal-body">
    <p><strong>Keyword:</strong> <?= esc($item['keyword']) ?></p>
    <p><strong>Category:</strong> <?= esc($item['category']) ?></p>
    <p><strong>Score:</strong> <?= $item['score'] ?> | <strong>Tag Score:</strong> <?= $item['tag_score'] ?></p>
    <hr>
    <p><?= nl2br(esc($item['summary'])) ?></p>
</div>
