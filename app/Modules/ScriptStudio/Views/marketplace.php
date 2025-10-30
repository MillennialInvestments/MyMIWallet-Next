<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Script Studio Marketplace</h2>
        <p class="text-muted mb-0">Discover scanners, studies, and strategies crafted for TradingView, ThinkOrSwim, and more.</p>
    </div>

    <div class="row g-4">
        <?php if (! empty($scripts)): ?>
            <?php foreach ($scripts as $script): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1"><?= esc($script['title']) ?></h5>
                            <p class="text-muted small mb-2">
                                <?= esc($script['platform']) ?> &middot; <?= esc($script['language']) ?> &middot; <?= esc($script['logic_type']) ?>
                            </p>
                            <?php if (! empty($script['description'])): ?>
                                <p class="card-text flex-grow-1"><?= esc($script['description']) ?></p>
                            <?php else: ?>
                                <p class="card-text flex-grow-1 text-muted">No description provided.</p>
                            <?php endif; ?>
                            <?php
                                $tagList = [];
                                if (! empty($script['tags'])) {
                                    $decoded = json_decode($script['tags'], true);
                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                        $tagList = $decoded;
                                    }
                                }
                            ?>
                            <?php if (! empty($tagList)): ?>
                                <div class="mb-3">
                                    <?php foreach ($tagList as $tag): ?>
                                        <span class="badge bg-light text-dark border me-1 mb-1">#<?= esc($tag) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="fw-semibold">
                                    <?= ((float) $script['price']) > 0 ? '$' . number_format((float) $script['price'], 2) : 'Free' ?>
                                </span>
                                <a class="btn btn-outline-primary btn-sm" href="<?= site_url('ScriptStudio/Preview/' . $script['id']) ?>">Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">Marketplace listings will appear here once published scripts are available.</div>
            </div>
        <?php endif; ?>
    </div>
</div>