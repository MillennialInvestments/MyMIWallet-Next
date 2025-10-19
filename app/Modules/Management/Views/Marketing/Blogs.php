<div class="nk-block">
    <div class="row gy-gs">
        <!-- Page Header -->
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - Blogs</h1>
                        <p>Manage blog posts, add new content, or review and edit existing posts.</p>
                        <a href="<?= site_url('/Management/Marketing') ?>">Back to Management Dashboard</a>
                        <a href="<?= site_url('/Management/Marketing/Blogs/Add') ?>" class="btn btn-sm btn-primary">Add New Blog Post</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Posts Overview -->
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head">
                    <h5 class="title">Blog Posts Overview</h5>
                </div>
                <div class="nk-block">
                    <div class="row">
                        <?php foreach ($blogs as $blog): ?>
                            <div class="col-lg-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><?= esc($blog->title) ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <p><?= esc(substr(strip_tags($blog->content), 0, 150)) ?>...</p>
                                        <small><strong>Created On:</strong> <?= esc($blog->created_on) ?></small>
                                        <br>
                                        <small><strong>Status:</strong> <?= esc(ucfirst($blog->status)) ?></small>
                                        <div class="mt-3">
                                            <a href="<?= site_url('/Management/Marketing/Blogs/Details/' . $blog->id) ?>" 
                                               class="btn btn-sm btn-primary">More Details</a>
                                            <a href="<?= site_url('/Management/Marketing/Blogs/Edit/' . $blog->id) ?>" 
                                               class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= site_url('/Management/Marketing/Blogs/Delete/' . $blog->id) ?>" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if (empty($blogs)): ?>
                            <div class="col-12">
                                <p>No blog posts found. <a href="<?= site_url('/Management/Marketing/Blogs/Add') ?>">Add a new blog post</a>.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
