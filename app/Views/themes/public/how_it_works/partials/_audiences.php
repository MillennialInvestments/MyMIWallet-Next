<?php
$audiences = $audiences ?? [];
$title = $title ?? 'Who it\'s for';
$subtitle = $subtitle ?? 'Designed to help different types of investors and teams.';
?>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center mb-4 text-center">
            <div class="col-lg-8">
                <span class="badge badge-success mb-2">Who it's for</span>
                <h2 class="h1 mb-3"><?= esc($title) ?></h2>
                <p class="text-muted mb-0"><?= esc($subtitle) ?></p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($audiences as $audience): ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-2"><?= esc($audience['title'] ?? 'Audience') ?></h5>
                            <p class="card-text text-muted mb-0"><?= esc($audience['description'] ?? '') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
