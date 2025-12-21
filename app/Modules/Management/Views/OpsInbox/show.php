<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title">Ops Inbox Item #<?= esc($item['id']) ?></h3>
            <p class="text-soft">Status: <?= esc($item['status']) ?></p>
            <a href="<?= site_url('Management/OpsInbox') ?>">← Back to list</a>
        </div>
    </div>

    <?php if (session('message')): ?>
        <div class="alert alert-success"><?= esc(session('message')) ?></div>
    <?php endif; ?>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <dl class="row">
                <dt class="col-sm-3">From</dt><dd class="col-sm-9"><?= esc($item['from_email']) ?></dd>
                <dt class="col-sm-3">Subject</dt><dd class="col-sm-9"><?= esc($item['subject']) ?></dd>
                <dt class="col-sm-3">Received</dt><dd class="col-sm-9"><?= esc($item['received_at'] ?? $item['created_at']) ?></dd>
            </dl>
            <h5>Raw Body (excerpt)</h5>
            <pre class="bg-light p-2" style="max-height:240px;overflow:auto;"><?= esc(substr((string) $item['raw_body'], 0, 2000)) ?></pre>
            <h5>Parsed JSON</h5>
            <pre class="bg-light p-2" style="max-height:240px;overflow:auto;"><?= esc(json_encode($item['parsed_json'] ?? [], JSON_PRETTY_PRINT)) ?></pre>
            <h5>AI Plan</h5>
            <pre class="bg-light p-2" style="max-height:240px;overflow:auto;"><?= esc(json_encode($item['ai_plan_json'] ?? [], JSON_PRETTY_PRINT)) ?></pre>
            <h5>Security Flags</h5>
            <pre class="bg-light p-2" style="max-height:180px;overflow:auto;"><?= esc(json_encode($item['security_flags'] ?? [], JSON_PRETTY_PRINT)) ?></pre>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <form method="post" action="<?= site_url('Management/OpsInbox/create-task-file/' . $item['id']) ?>">
            <?= csrf_field() ?>
            <button class="btn btn-outline-primary" type="submit">Create Codex Task File</button>
        </form>
        <form method="post" action="<?= site_url('Management/OpsInbox/create-task-registry/' . $item['id']) ?>">
            <?= csrf_field() ?>
            <button class="btn btn-outline-secondary" type="submit">Create Task Registry Entries</button>
        </form>
        <form method="post" action="<?= site_url('Management/OpsInbox/approve/' . $item['id']) ?>">
            <?= csrf_field() ?>
            <button class="btn btn-success" type="submit">Mark Approved</button>
        </form>
        <form method="post" action="<?= site_url('Management/OpsInbox/reject/' . $item['id']) ?>" class="d-flex align-items-center">
            <?= csrf_field() ?>
            <input type="text" name="reason" placeholder="Reason" class="form-control form-control-sm me-2" />
            <button class="btn btn-danger" type="submit">Reject</button>
        </form>
    </div>
</div>
