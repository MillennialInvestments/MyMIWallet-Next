<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title">Ops Inbox</h3>
            <p class="text-soft">Admin-only intake of email commands. Statuses: New → Parsed → Ready.</p>
        </div>
    </div>

    <?php if (session('message')): ?>
        <div class="alert alert-success"><?= esc(session('message')) ?></div>
    <?php endif; ?>

    <div class="card card-bordered">
        <div class="card-inner">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Received</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['from_email']) ?></td>
                        <td><?= esc($item['subject']) ?></td>
                        <td><span class="badge bg-light text-dark"><?= esc($item['status']) ?></span></td>
                        <td><?= esc($item['received_at'] ?? $item['created_at']) ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?= site_url('Management/OpsInbox/view/' . $item['id']) ?>">View</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
