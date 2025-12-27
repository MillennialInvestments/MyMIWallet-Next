<div class="row g-2">
    <?php foreach ($jurisdictions as $jurisdiction): ?>
        <div class="col-6">
            <div class="border rounded p-2 h-100">
                <div class="d-flex justify-content-between">
                    <strong><?= esc($jurisdiction['code']); ?></strong>
                    <span class="text-muted small"><?= esc($jurisdiction['parish']); ?></span>
                </div>
                <div class="small"><?= esc($jurisdiction['name']); ?></div>
                <div class="mt-2">
                    <div class="text-muted small">Taxable</div>
                    <input type="number" step="0.01" class="form-control form-control-sm jurisdiction-taxable" data-id="<?= esc($jurisdiction['id']); ?>" value="<?= esc($jurisdiction['taxable_amount']); ?>">
                </div>
                <div class="mt-2">
                    <div class="text-muted small">Tax Due</div>
                    <input type="number" step="0.01" class="form-control form-control-sm" readonly value="<?= esc($jurisdiction['tax_due']); ?>">
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
