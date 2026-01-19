<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($metaTitle) ?></title>
    <meta name="description" content="<?= esc($metaDescription) ?>">
    <meta name="keywords" content="<?= esc($metaKeywords) ?>">
    <link rel="canonical" href="<?= esc(current_url()) ?>">
</head>
<body>
    <header>
        <h1><?= esc($categoryName) ?></h1>
        <p>Browse MyMI Wallet insights on Trade Alerts, Investment Strategies, and Financial Tools.</p>
    </header>

    <section>
        <?php if (empty($posts)): ?>
            <p>No posts found for this category.</p>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <article>
                    <header>
                        <h2>
                            <a href="<?= esc(base_url('blog/' . $post['slug'])) ?>">
                                <?= esc($post['title']) ?>
                            </a>
                        </h2>
                        <p><?= esc(date('F j, Y', strtotime($post['published_at']))) ?></p>
                    </header>
                    <?php if (! empty($post['featured_image'])): ?>
                        <img src="<?= esc(base_url('uploads/' . $post['featured_image'])) ?>"
                             alt="Featured image for <?= esc($post['title']) ?>"
                             loading="lazy">
                    <?php endif; ?>
                    <?php if (! empty($post['content'])): ?>
                        <p><?= esc(character_limiter(strip_tags($post['content']), 160)) ?></p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</body>
</html>
