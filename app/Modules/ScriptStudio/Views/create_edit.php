<div class="container py-4">
    <h2><?= isset($script) ? 'Edit Script' : 'Create Script' ?></h2>

    <?php $errors = session('errors') ?? ($validation?->getErrors() ?? []); ?>
    <?php if (! empty($errors)): ?>
        <div class="alert alert-danger">
            <p class="mb-1 fw-bold">Please correct the following issues:</p>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= isset($script) ? site_url('ScriptStudio/Update/' . $script['id']) : site_url('ScriptStudio/Store') ?>">
        <?= csrf_field() ?>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                <input id="title" type="text" name="title" class="form-control" value="<?= old('title', $script['title'] ?? '') ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="platform">Platform<span class="text-danger">*</span></label>
                <select id="platform" name="platform" class="form-select" required>
                    <option value="">Select platform</option>
                    <?php foreach (($platformOptions ?? []) as $option): ?>
                        <option value="<?= esc($option) ?>" <?= old('platform', $script['platform'] ?? '') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="language">Language<span class="text-danger">*</span></label>
                <select id="language" name="language" class="form-select" required>
                    <option value="">Select language</option>
                    <?php foreach (($languageOptions ?? []) as $option): ?>
                        <option value="<?= esc($option) ?>" <?= old('language', $script['language'] ?? '') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="logic_type">Logic Type<span class="text-danger">*</span></label>
                <select id="logic_type" name="logic_type" class="form-select" required>
                    <option value="">Select type</option>
                    <?php foreach (($logicTypeOptions ?? []) as $option): ?>
                        <option value="<?= esc($option) ?>" <?= old('logic_type', $script['logic_type'] ?? '') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="price">Price (USD)</label>
                <input id="price" type="number" step="0.01" min="0" name="price" class="form-control" value="<?= old('price', $script['price'] ?? '0.00') ?>">
            </div>
            <div class="col-md-9">
                <label class="form-label" for="tags">Tags (comma separated)</label>
                <input id="tags" type="text" name="tags" class="form-control" value="<?= old('tags', $script['tags'] ?? '') ?>" placeholder="Momentum, Breakout, EMA">
            </div>
            <div class="col-12">
                <label class="form-label" for="description">Short Description</label>
                <textarea id="description" name="description" class="form-control" rows="3"><?= old('description', $script['description'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
                <label class="form-label" for="documentation">Documentation (Markdown supported)</label>
                <textarea id="documentation" name="documentation" class="form-control" rows="8" placeholder="# Strategy Overview&#10;Describe how to use this scanner."><?= old('documentation', $script['documentation'] ?? '') ?></textarea>
                <div class="form-text">Use Markdown for headings, bullet lists, and code fences.</div>
            </div>
            <div class="col-12">
                <label class="form-label" for="code_raw">Source Code</label>
                <textarea id="code_raw" name="code_raw" class="form-control" rows="12" placeholder="//@version=5&#10;indicator(...)&#10;..."><?= old('code_raw', $script['code_raw'] ?? '') ?></textarea>
            </div>
            <div class="col-12 form-check">
                <input id="is_published" type="checkbox" name="is_published" value="1" class="form-check-input" <?= old('is_published', $script['is_published'] ?? 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="is_published">Publish immediately</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save Script</button>
                <a href="<?= site_url('ScriptStudio') ?>" class="btn btn-link">Cancel</a>
            </div>
        </div>
    </form>
</div>