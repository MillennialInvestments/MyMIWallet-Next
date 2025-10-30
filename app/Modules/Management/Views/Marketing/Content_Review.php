<div class="nk-block">
    <div class="row gy-gs">
        <?php foreach ($generatedContent as $content): ?>
            <div class="col-12 col-lg-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title"><?= esc($content['title']) ?></h5>
                    </div>
                    <div class="card-body">
                        <p><?= esc(substr($content['content'], 0, 200)) ?>...</p>
                        <a href="<?= site_url('/Management/Marketing/EditContent/' . $content['id']) ?>" 
                           class="btn btn-sm btn-primary">Edit</a>
                        <a href="<?= site_url('/Management/Marketing/ApproveContent/' . $content['id']) ?>" 
                           class="btn btn-sm btn-success">Approve</a>
                        <a href="<?= site_url('/Management/Marketing/RejectContent/' . $content['id']) ?>" 
                           class="btn btn-sm btn-danger">Reject</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
