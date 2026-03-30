<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($pageTitle ?? 'System Debug') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-3">System Debug Dashboard</h1>
    <p class="text-muted">Unified snapshot of route failures and AIOps reports.</p>

    <h2 class="h4 mt-4">Route Error Heatmap</h2>
    <div class="table-responsive">
        <table class="table table-sm table-striped" id="heatmap-table">
            <thead>
            <tr>
                <th>Route</th>
                <th>Error Type</th>
                <th>Status</th>
                <th>Hits</th>
                <th>Last Seen</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($heatmap ?? []) as $row): ?>
                <tr>
                    <td><?= esc((string) ($row['route'] ?? '')) ?></td>
                    <td><?= esc((string) ($row['error_type'] ?? '')) ?></td>
                    <td><?= esc((string) ($row['status_code'] ?? '')) ?></td>
                    <td><?= esc((string) ($row['hit_count'] ?? '0')) ?></td>
                    <td><?= esc((string) ($row['last_seen'] ?? '')) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="accordion mt-4" id="reportsAccordion">
        <?php foreach (($reports ?? []) as $name => $content): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-<?= esc($name, 'attr') ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= esc($name, 'attr') ?>" aria-expanded="false">
                        <?= esc(ucwords(str_replace('_', ' ', $name))) ?>
                    </button>
                </h2>
                <div id="collapse-<?= esc($name, 'attr') ?>" class="accordion-collapse collapse" data-bs-parent="#reportsAccordion">
                    <div class="accordion-body"><pre class="mb-0"><?= esc((string) $content) ?></pre></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?= base_url('assets/vendor/bootstrap5/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
