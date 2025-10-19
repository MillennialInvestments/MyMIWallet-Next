<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Script Studio Admin</h2>
        <a href="<?= site_url('ScriptStudio/Create') ?>" class="btn btn-primary">Create Script</a>
    </div>

    <?php if (session('message')): ?>
        <div class="alert alert-success"><?= esc(session('message')) ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Platform</th>
                    <th>Language</th>
                    <th>Logic Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($scripts)): ?>
                    <?php foreach ($scripts as $script): ?>
                        <tr>
                            <td><?= esc($script['title']) ?></td>
                            <td><?= esc($script['platform']) ?></td>
                            <td><?= esc($script['language']) ?></td>
                            <td><?= esc($script['logic_type']) ?></td>
                            <td><?= number_format((float) ($script['price'] ?? 0), 2) ?></td>
                            <td>
                                <?php if (! empty($script['is_published'])): ?>
                                    <span class="badge bg-success">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('ScriptStudio/Edit/' . $script['id']) ?>">Edit</a>
                                <a class="btn btn-sm btn-outline-primary" href="<?= site_url('ScriptStudio/Preview/' . $script['id']) ?>">Preview</a>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-outline-dark" href="<?= site_url('ScriptStudio/Export/' . $script['id'] . '/pinescript') ?>">Pine</a>
                                    <a class="btn btn-sm btn-outline-dark" href="<?= site_url('ScriptStudio/Export/' . $script['id'] . '/thinkscript') ?>">Think</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">No scripts found. Create your first entry above.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>