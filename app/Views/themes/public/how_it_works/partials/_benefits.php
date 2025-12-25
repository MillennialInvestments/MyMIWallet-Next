<?php
$items = $items ?? [];
$title = $title ?? 'What you get';
$subtitle = $subtitle ?? 'A quick look at the value you unlock with MyMI Wallet.';
?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-4 text-center">
            <div class="col-lg-8">
                <span class="badge badge-primary mb-2">What you get</span>
                <h2 class="h1 mb-3"><?= esc($title) ?></h2>
                <p class="text-muted mb-0"><?= esc($subtitle) ?></p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-primary mb-3">
                                <i class="<?= esc($item['icon'] ?? 'fas fa-check-circle') ?> fa-lg"></i>
                            </div>
                            <h5 class="card-title mb-2"><?= esc($item['title'] ?? 'Benefit') ?></h5>
                            <p class="card-text text-muted mb-0">
                                <?= esc($item['description'] ?? '') ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
