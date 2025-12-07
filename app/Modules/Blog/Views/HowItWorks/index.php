<div class="container py-4">
    <div class="row">
        <div class="col-md-3 mb-3">
            <h5 class="mb-3">How It Works</h5>
            <ul class="nav flex-column">
                <?php foreach ($navItems as $item): ?>
                    <li class="nav-item">
                        <a
                            class="nav-link <?= ($item['slug'] === $slug) ? 'fw-bold active' : ''; ?>"
                            href="<?= site_url('How-It-Works/' . $item['slug']); ?>"
                        >
                            <?= esc($item['label']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-9">
            <h1 class="mb-4"><?= esc($title); ?></h1>
            <article class="how-it-works-content">
                <?= $contentHtml; ?>
            </article>
        </div>
    </div>
</div>