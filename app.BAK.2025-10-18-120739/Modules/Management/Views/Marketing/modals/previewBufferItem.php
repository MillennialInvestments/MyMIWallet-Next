<!-- views/Marketing/modals/previewBufferItem.php -->
<div class="modal-header">
    <h5 class="modal-title">👁️ Preview Buffer Item</h5>
</div>
<div class="modal-body">
    <h6><strong>Keyword:</strong> <?= esc($item['keyword']) ?></h6>
    <p><strong>Summary:</strong> <?= esc($item['summary']) ?></p>
    <p><strong>Score:</strong> <?= esc($item['score']) ?> | <strong>Tag Score:</strong> <?= esc($item['tag_score']) ?></p>
    <p><strong>Category:</strong> <?= esc($item['category']) ?></p>
    <p><strong>Status:</strong> <span class="badge bg-info"><?= esc($item['status']) ?></span></p>
</div>
<div class="modal-footer">
    <button class="btn btn-success" onclick="approveBufferItem(<?= $item['id'] ?>)">✅ Approve</button>
    <button class="btn btn-danger" onclick="rejectBufferItem(<?= $item['id'] ?>)">❌ Reject</button>
</div>
