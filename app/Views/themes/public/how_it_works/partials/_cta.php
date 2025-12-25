<?php
$cta = $cta ?? [];
$title = $cta['title'] ?? 'Ready to explore MyMI Wallet?';
$description = $cta['description'] ?? 'Create your free account, browse dashboards, and choose a plan when you are ready.';
$actions = $cta['actions'] ?? [];
?>
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <h2 class="h1 mb-3"><?= esc($title) ?></h2>
                <p class="lead mb-0"><?= esc($description) ?></p>
            </div>
            <div class="col-lg-4 text-lg-right">
                <?php foreach ($actions as $action): ?>
                    <a class="btn <?= esc($action['class'] ?? 'btn-light text-primary') ?> mb-2 ml-lg-2" href="<?= esc($action['url'] ?? '#', 'attr') ?>">
                        <?= esc($action['label'] ?? 'Get started') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
