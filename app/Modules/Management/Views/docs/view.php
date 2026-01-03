<?php
$relativePath = $relativePath ?? '';
$contentHtml  = $contentHtml ?? '';
$breadcrumbs  = $breadcrumbs ?? [];
?>

<div class="container-fluid py-3">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h3 class="mb-0">Docs Viewer</h3>
            <small class="text-muted">/docs/<?= esc($relativePath) ?></small>
        </div>

        <div>
            <?php
            $dir = dirname($relativePath);
            $dir = ($dir === '.' ? '' : $dir);
            ?>
            <a href="<?= site_url('Management/Docs' . ($dir ? '/browse/' . $dir : '')) ?>"
               class="btn btn-outline-secondary">
                Back to Folder
            </a>
        </div>
    </div>

    <?php if (!empty($breadcrumbs)): ?>
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $bc): ?>
                    <li class="breadcrumb-item">
                        <a href="<?= esc($bc['url']) ?>"><?= esc($bc['label']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    <?php endif; ?>

    <!-- GitHub Markdown Styling (optional) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.2.0/github-markdown.min.css">

    <div class="card">
        <div class="card-body">
            <article class="markdown-body">
                <?= $contentHtml ?>
            </article>
        </div>
    </div>

</div>

