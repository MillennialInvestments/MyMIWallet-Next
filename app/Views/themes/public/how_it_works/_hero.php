<?php
$hero = $hero ?? [];
$title = $hero['title'] ?? 'How MyMI Wallet Works';
$subtitle = $hero['subtitle'] ?? 'See how budgeting, investing, and alerts fit together.';
$eyebrow = $hero['eyebrow'] ?? 'How it works';
$actions = $hero['actions'] ?? [];
?>
<section class="py-5 bg-gradient" style="background: linear-gradient(135deg, #0d6efd 0%, #0b2a5b 100%);">
    <div class="container text-white">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge badge-light text-primary mb-3"><?= esc($eyebrow) ?></span>
                <h1 class="display-4 font-weight-bold mb-3"><?= esc($title) ?></h1>
                <p class="lead mb-4"><?= esc($subtitle) ?></p>
                <?php if (! empty($actions)): ?>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <?php foreach ($actions as $action): ?>
                            <a class="btn <?= esc($action['class'] ?? 'btn-light text-primary') ?> mr-2 mb-2" href="<?= esc($action['url'] ?? '#', 'attr') ?>">
                                <?= esc($action['label'] ?? 'Learn more') ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="card bg-white text-dark shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-3 text-primary">What to expect</h5>
                        <ul class="list-unstyled mb-0">
                            <?php foreach (($hero['highlights'] ?? []) as $highlight): ?>
                                <li class="d-flex align-items-start mb-2">
                                    <span class="text-primary mr-2"><i class="fas fa-check-circle"></i></span>
                                    <span><?= esc($highlight) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
