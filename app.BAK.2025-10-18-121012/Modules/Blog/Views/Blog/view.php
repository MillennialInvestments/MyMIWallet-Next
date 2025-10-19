<!-- app/Modules/Blog/Views/Blog/view.php -->
<?php
$viewFileData = [
    'blogPost' => $blogPost ?? null,
    'uri' => $uri ?? null,
];
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h1 class="nk-block-title title"><?= esc($blogPost->title) ?></h1>
                    <a href="<?= base_url('Blog') ?>" class="btn btn-secondary">Back to Blogs</a>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-body">
                        <?= $blogPost->content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
