<?php
$imageUrl = ! empty($post['featured_image']) ? base_url('uploads/' . $post['featured_image']) : null;

$articleSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post['title'],
    'description' => $metaDescription,
    'datePublished' => date('c', strtotime($post['published_at'])),
    'dateModified' => date('c', strtotime($post['updated_at'] ?? $post['published_at'])),
    'author' => [
        '@type' => 'Organization',
        'name' => 'MyMI Wallet',
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => current_url(),
    ],
];

if ($imageUrl) {
    $articleSchema['image'] = [$imageUrl];
}

$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => array_map(static function ($crumb, int $position) {
        return [
            '@type' => 'ListItem',
            'position' => $position + 1,
            'name' => $crumb['name'],
            'item' => $crumb['url'],
        ];
    }, $breadcrumbs, array_keys($breadcrumbs)),
];
?>
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
    <nav aria-label="Breadcrumb">
        <ol>
            <?php foreach ($breadcrumbs as $crumb): ?>
                <li><a href="<?= esc($crumb['url']) ?>"><?= esc($crumb['name']) ?></a></li>
            <?php endforeach; ?>
        </ol>
    </nav>

    <article>
        <header>
            <h1><?= esc($post['title']) ?></h1>
            <p>Published on: <?= esc(date('F j, Y', strtotime($post['published_at']))) ?></p>
        </header>

        <?php if ($imageUrl): ?>
            <img src="<?= esc($imageUrl) ?>"
                 alt="Featured image for <?= esc($post['title']) ?>"
                 loading="lazy">
        <?php endif; ?>

        <section>
            <?= $post['content'] ?>
        </section>

        <section>
            <h2>Core Topics Covered</h2>
            <p>
                This article supports your investor profile with automated financial insights,
                investment portfolio management guidance, and up-to-date financial news.
            </p>
            <ul>
                <?php foreach ($seoKeywords as $keyword): ?>
                    <li><?= esc($keyword) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <footer>
            <p>Explore MyMI Wallet resources for Trade Alerts, Investment Strategies, and Financial Tools.</p>
        </footer>
    </article>

    <?php if (! empty($relatedPosts)): ?>
        <section>
            <h2>Related Posts</h2>
            <ul>
                <?php foreach ($relatedPosts as $relatedPost): ?>
                    <li>
                        <a href="<?= esc(base_url('blog/' . $relatedPost['slug'])) ?>">
                            <?= esc($relatedPost['title']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <script type="application/ld+json">
        <?= json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>
    <script type="application/ld+json">
        <?= json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>
</body>
</html>
