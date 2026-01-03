<?php
$relativeDir = $relativeDir ?? '';
$folders = $folders ?? [];
$files = $files ?? [];
$breadcrumbs = $breadcrumbs ?? [];
?>

<div class="container-fluid py-3">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h3 class="mb-0">Docs Browser</h3>
            <small class="text-muted">/docs<?= $relativeDir ? '/' . esc($relativeDir) : '' ?></small>
        </div>
    </div>

    <?php if (!empty($breadcrumbs)): ?>
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $i => $bc): ?>
                    <li class="breadcrumb-item">
                        <a href="<?= esc($bc['url']) ?>"><?= esc($bc['label']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <strong>Folders</strong>
                </div>
                <div class="card-body">
                    <?php if (empty($folders)): ?>
                        <div class="text-muted">No subfolders found.</div>
                    <?php else: ?>
                        <ul class="list-group">
                            <?php foreach ($folders as $f): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa fa-folder-open mr-2"></i>
                                        <?= esc($f['name']) ?>
                                    </span>
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="<?= site_url('Management/Docs/browse/' . $f['path']) ?>">
                                        Open
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <strong>Markdown Files</strong>
                </div>
                <div class="card-body">
                    <?php if (empty($files)): ?>
                        <div class="text-muted">No markdown files found in this folder.</div>
                    <?php else: ?>
                        <ul class="list-group">
                            <?php foreach ($files as $file): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa fa-file-text-o mr-2"></i>
                                        <?= esc($file['name']) ?>
                                    </span>
                                    <a class="btn btn-sm btn-primary"
                                       href="<?= site_url('Management/Docs/view/' . preg_replace('/\\.md$/i', '', $file['path'])) ?>">
                                        View
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

