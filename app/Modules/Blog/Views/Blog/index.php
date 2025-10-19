<?php
$viewFileData = [
    'blogs' => $blogs ?? [],
    'totalBlogs' => $totalBlogs ?? 0,
    'uri' => $uri ?? null,
];
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h1 class="nk-block-title title">Blog Management</h1>
                    <a href="<?= site_url('/Management') ?>">Back to Management Dashboard</a>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Blog Posts</h5>
                                <span>Total: <?= esc($totalBlogs) ?></span>
                            </div>
                            <div class="card-body">
                                <?php foreach ($blogs as $blog): ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($blog->title) ?></h5>
                                            <p class="card-text"><?= esc(substr(strip_tags($blog->content), 0, 150)) ?>...</p>
                                            <a href="<?= base_url('Blog/Post/' . $blog->slug) ?>" class="btn btn-primary">Read More</a>
                                            <a href="<?= base_url('Management/Marketing/PublishBlog/' . $blog->id) ?>" class="btn btn-success">Publish</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
