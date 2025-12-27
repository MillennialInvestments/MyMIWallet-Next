<?php $returnRow = $return ?? []; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3>Return #<?= esc($returnRow['id']); ?> Summary</h3>
            <p class="text-muted mb-0">Status: <span class="badge bg-secondary"><?= esc($returnRow['status']); ?></span></p>
        </div>
        <div class="btn-group">
            <a class="btn btn-outline-primary" href="/Tax/edit/<?= esc($returnRow['id']); ?>">Edit</a>
            <a class="btn btn-outline-secondary" href="/Tax/export/json/<?= esc($returnRow['id']); ?>">Export JSON</a>
            <a class="btn btn-outline-secondary" href="/Tax/export/csv/<?= esc($returnRow['id']); ?>">Export CSV</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lines</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Line</th>
                                <th>Label</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lines as $line): ?>
                                <tr>
                                    <td><?= esc($line['line_number']); ?></td>
                                    <td><?= esc($line['label']); ?></td>
                                    <td class="text-end">$<?= number_format((float) $line['value'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">Jurisdictions</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($jurisdictions as $jurisdiction): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?= esc($jurisdiction['code']); ?> - <?= esc($jurisdiction['name']); ?></span>
                                <span>$<?= number_format((float) $jurisdiction['tax_due'], 2); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Totals</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>Total Remitted</span>
                        <strong>$<?= number_format((float) $returnRow['total_remitted'], 2); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
