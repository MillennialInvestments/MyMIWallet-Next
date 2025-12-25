<?php
$navItems = $navItems ?? [];
$active   = $active ?? '';
?>
<div class="bg-white border-bottom">
    <div class="container">
        <nav class="nav nav-pills flex-wrap justify-content-center py-3">
            <?php foreach ($navItems as $item): 
                $isActive = $active === ($item['slug'] ?? '');
                $url      = $item['url'] ?? ($item['path'] ?? '');
            ?>
                <a class="nav-link mb-2 mx-1 <?= $isActive ? 'active font-weight-bold' : 'text-primary' ?>" href="<?= esc($url, 'attr') ?>">
                    <?= esc($item['label'] ?? $item['slug'] ?? 'Page') ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</div>
