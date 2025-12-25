<?php
$items = $items ?? [];
$title = $title ?? 'How it works';
$subtitle = $subtitle ?? 'Follow these steps to see the value quickly.';
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-4 text-center">
            <div class="col-lg-8">
                <span class="badge badge-secondary mb-2">How it works</span>
                <h2 class="h1 mb-3"><?= esc($title) ?></h2>
                <p class="text-muted mb-0"><?= esc($subtitle) ?></p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($items as $index => $item): ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge badge-primary badge-pill mr-3">Step <?= (int)($index + 1) ?></span>
                                <i class="<?= esc($item['icon'] ?? 'fas fa-arrow-right') ?> text-primary"></i>
                            </div>
                            <h5 class="card-title mb-2"><?= esc($item['title'] ?? 'Step') ?></h5>
                            <p class="card-text text-muted mb-0"><?= esc($item['description'] ?? '') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
