<?php $returnRow = $return ?? []; ?>
<div class="container py-4">
    <h3 class="mb-3">Return Preview</h3>
    <p class="text-muted">Formatted preview for jurisdiction submission.</p>

    <div class="card mb-3">
        <div class="card-header">Header</div>
        <div class="card-body row">
            <div class="col-md-3">
                <div class="text-muted small">Period Start</div>
                <div><?= esc($returnRow['filing_period_start']); ?></div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">Period End</div>
                <div><?= esc($returnRow['filing_period_end']); ?></div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">Due Date</div>
                <div><?= esc($returnRow['due_date']); ?></div>
            </div>
            <div class="col-md-3">
                <div class="text-muted small">File Date</div>
                <div><?= esc($returnRow['file_date'] ?? '—'); ?></div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Lines 1–12 / 26</div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Line</th>
                        <th>Description</th>
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

    <div class="card">
        <div class="card-header">Jurisdiction Allocations</div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th class="text-end">Taxable</th>
                        <th class="text-end">Tax Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jurisdictions as $jurisdiction): ?>
                        <tr>
                            <td><?= esc($jurisdiction['code']); ?></td>
                            <td><?= esc($jurisdiction['name']); ?></td>
                            <td class="text-end">$<?= number_format((float) $jurisdiction['taxable_amount'], 2); ?></td>
                            <td class="text-end">$<?= number_format((float) $jurisdiction['tax_due'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
