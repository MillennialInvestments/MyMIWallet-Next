<?php
$currentSlug = $currentSlug ?? null;
$navItems = $navItems ?? [];

if (empty($navItems) && isset($howItWorksNavItems) && is_array($howItWorksNavItems)) {
    $navItems = $howItWorksNavItems;
}
?>
<ul class="how-it-works-nav list-unstyled">
    <?php foreach ($navItems as $item): ?>
        <li class="mb-2">
            <a class="<?= ($currentSlug === ($item['slug'] ?? null)) ? 'fw-bold' : '' ?>" href="<?= esc(site_url('How-It-Works/' . ($item['slug'] ?? ''))) ?>">
                <?= esc($item['label'] ?? '') ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
