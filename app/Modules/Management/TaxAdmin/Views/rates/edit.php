<?php $isNew = empty($rate['id']); ?>
<div class="container py-4">
    <h3><?= $isNew ? 'Create Rate' : 'Edit Rate'; ?></h3>
    <form method="post">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Jurisdiction</label>
                <select name="jurisdiction_id" class="form-select" required>
                    <?php foreach ($jurisdictions as $jurisdiction): ?>
                        <option value="<?= esc($jurisdiction['id']); ?>" <?= ($rate['jurisdiction_id'] ?? '') == $jurisdiction['id'] ? 'selected' : ''; ?>>
                            <?= esc($jurisdiction['code']); ?> - <?= esc($jurisdiction['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Rate Total (%)</label>
                <input type="number" name="rate_total" step="0.0001" class="form-control" value="<?= esc($rate['rate_total'] ?? ''); ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Rate Components (JSON)</label>
                <input type="text" name="rate_components" class="form-control" value="<?= esc($rate['rate_components'] ?? ''); ?>" placeholder='{"school_board":1.0}'>
            </div>
            <div class="col-md-3">
                <label class="form-label">Effective Start</label>
                <input type="date" name="effective_start" class="form-control" value="<?= esc($rate['effective_start'] ?? ''); ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Effective End</label>
                <input type="date" name="effective_end" class="form-control" value="<?= esc($rate['effective_end'] ?? ''); ?>">
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary"><?= $isNew ? 'Create' : 'Save'; ?></button>
            <a href="/Admin/Tax/Rates" class="btn btn-link">Cancel</a>
        </div>
    </form>
</div>
