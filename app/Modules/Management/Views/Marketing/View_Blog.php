<div class="nk-block">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= esc($blog->title) ?></h4>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> <?= esc(ucfirst($blog->status)) ?></p>
            <p><strong>Created On:</strong> <?= esc($blog->created_on) ?></p>
            <hr>
            <div><?= $blog->content ?></div>
        </div>
        <div class="card-footer">
            <a href="<?= site_url('/Management/Marketing/Blogs/Edit/' . $blog->id) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= site_url('/Management/Marketing/Blogs') ?>" class="btn btn-secondary">Back to Blogs</a>
        </div>
    </div>
</div>
