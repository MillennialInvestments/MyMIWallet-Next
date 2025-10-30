<div class="container py-4">
    <?php if (! isset($script)): ?>
        <div class="alert alert-warning">Script details unavailable.</div>
    <?php else: ?>
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="mb-1"><?= esc($script['title']) ?></h2>
                <p class="text-muted mb-0">Platform: <?= esc($script['platform']) ?> &middot; Language: <?= esc($script['language']) ?> &middot; Type: <?= esc($script['logic_type']) ?></p>
                <?php if (! empty($tags)): ?>
                    <p class="mt-2">
                        <?php foreach ($tags as $tag): ?>
                            <span class="badge bg-info text-dark me-1 mb-1"><?= esc($tag) ?></span>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="text-end">
                <a class="btn btn-sm btn-outline-dark" href="<?= site_url('ScriptStudio/Export/' . $script['id'] . '/pinescript') ?>">Export PineScript</a>
                <a class="btn btn-sm btn-outline-dark" href="<?= site_url('ScriptStudio/Export/' . $script['id'] . '/thinkscript') ?>">Export ThinkScript</a>
            </div>
        </div>

        <?php if (! empty($script['description'])): ?>
            <p><?= esc($script['description']) ?></p>
        <?php endif; ?>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">Source Code</div>
                    <div class="card-body">
                        <pre class="mb-0"><code><?= esc($script['code_raw'] ?? '') ?></code></pre>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">Emulated Output</div>
                    <div class="card-body">
                        <pre class="mb-0"><code><?= esc($script['code_emulated'] ?? '') ?></code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">PineScript Export Preview</div>
                    <div class="card-body">
                        <pre class="mb-0"><code><?= esc($pineScriptExport ?? '') ?></code></pre>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">ThinkScript Export Preview</div>
                    <div class="card-body">
                        <pre class="mb-0"><code><?= esc($thinkScriptExport ?? '') ?></code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Documentation</div>
            <div class="card-body">
                <?php if (! empty($documentationHtml)): ?>
                    <div class="markdown-body"><?= $documentationHtml ?></div>
                <?php else: ?>
                    <p class="text-muted mb-0">No documentation provided.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="alert alert-info mt-4">
            <strong>Emulator roadmap:</strong> JavaScript chart visualisation hooks can be added here to replay signals inside the browser.
        </div>
    <?php endif; ?>
</div>