<?php $isNew = empty($template['id']); ?>
<div class="container py-4">
    <h3><?= $isNew ? 'Create Template' : 'Edit Template'; ?></h3>
    <form method="post">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?= esc($template['name'] ?? ''); ?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Authority</label>
                <input type="text" name="authority" value="<?= esc($template['authority'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Frequency</label>
                <select name="frequency" class="form-select">
                    <?php foreach (['monthly','quarterly','annual'] as $freq): ?>
                        <option value="<?= $freq; ?>" <?= ($template['frequency'] ?? '') === $freq ? 'selected' : ''; ?>><?= ucfirst($freq); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Active</label>
                <select name="active" class="form-select">
                    <option value="1" <?= (int) ($template['active'] ?? 1) === 1 ? 'selected' : ''; ?>>Yes</option>
                    <option value="0" <?= (int) ($template['active'] ?? 1) === 0 ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="2"><?= esc($template['notes'] ?? ''); ?></textarea>
            </div>
        </div>

        <hr>
        <h5>Lines</h5>
        <div id="linesWrapper">
            <?php foreach ($template['lines'] ?? [] as $idx => $line): ?>
                <?= view('App\\Modules\\Management\\TaxAdmin\\Views\\templates\\partials\\line_row', ['line' => $line, 'idx' => $idx]); ?>
            <?php endforeach; ?>
        </div>
        <button type="button" class="btn btn-outline-secondary mt-2" id="addLineRow">Add Line</button>

        <div class="mt-4">
            <button class="btn btn-primary">Save Template</button>
            <a href="/Admin/Tax/Templates" class="btn btn-link">Cancel</a>
        </div>
    </form>
</div>

<template id="lineRowTemplate">
    <?= view('App\\Modules\\Management\\TaxAdmin\\Views\\templates\\partials\\line_row', ['line' => ['id' => '', 'line_number' => '', 'label' => '', 'type' => 'input', 'calc_rule' => '', 'requires_explain' => 0, 'sort_order' => 0], 'idx' => '__IDX__']); ?>
</template>

<script>
    document.getElementById('addLineRow')?.addEventListener('click', () => {
        const tpl = document.getElementById('lineRowTemplate').innerHTML.replace(/__IDX__/g, Date.now());
        const wrapper = document.getElementById('linesWrapper');
        wrapper.insertAdjacentHTML('beforeend', tpl);
    });
</script>
