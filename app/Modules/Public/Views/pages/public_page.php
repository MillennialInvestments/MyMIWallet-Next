<article class="container py-4">
    <h1><?= esc((string) $page['published_title']) ?></h1>
    <div><?= $page['published_html'] ?></div>
    <?php if (! empty($page['schema_json'])): ?>
        <?php $schemaJson = json_encode(json_decode((string) $page['schema_json'], true), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
        <?php if ($schemaJson && $schemaJson !== 'null'): ?>
            <script type="application/ld+json"><?= esc($schemaJson, 'raw') ?></script>
        <?php endif; ?>
    <?php endif; ?>
</article>
