<h1><?= esc($pageTitle) ?></h1>
<?php if (! empty($articles)): ?>
<ul>
<?php foreach ($articles as $slug => $article): ?>
    <li><a href="<?= site_url('Support/Article/' . $slug) ?>"><?= esc($article['title']) ?></a></li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No support articles found.</p>
<?php endif; ?>