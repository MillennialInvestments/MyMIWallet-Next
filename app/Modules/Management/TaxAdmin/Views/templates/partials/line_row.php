<?php $rowId = $idx ?? 0; ?>
<div class="border rounded p-3 mb-2">
    <input type="hidden" name="line_id[<?= $rowId; ?>]" value="<?= esc($line['id'] ?? ''); ?>">
    <div class="row g-2">
        <div class="col-md-2">
            <label class="form-label">Line #</label>
            <input type="number" name="line_number[<?= $rowId; ?>]" value="<?= esc($line['line_number'] ?? ''); ?>" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Label</label>
            <input type="text" name="label[<?= $rowId; ?>]" value="<?= esc($line['label'] ?? ''); ?>" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label class="form-label">Type</label>
            <select name="type[<?= $rowId; ?>]" class="form-select">
                <?php foreach (['input','calc','info'] as $type): ?>
                    <option value="<?= $type; ?>" <?= ($line['type'] ?? '') === $type ? 'selected' : ''; ?>><?= ucfirst($type); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Calc Rule</label>
            <input type="text" name="calc_rule[<?= $rowId; ?>]" value="<?= esc($line['calc_rule'] ?? ''); ?>" class="form-control" placeholder="sum(2..10)">
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requires_explain[<?= $rowId; ?>]" <?= !empty($line['requires_explain']) ? 'checked' : ''; ?>>
                <label class="form-check-label">Explain</label>
            </div>
        </div>
    </div>
</div>
