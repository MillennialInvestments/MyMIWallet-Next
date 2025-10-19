<!-- /app/Modules/Management/Views/Marketing/Drip/index.php -->
<div class="container mt-4">
    <h1 class="mb-4">Drip Campaigns</h1>
    <a href="<?= site_url('Management/Drip-Campaigns/Create') ?>" class="btn btn-primary mb-3">+ New Campaign</a>

    <?php if (!empty($campaigns)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Trigger</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($campaigns as $campaign): ?>
                        <tr>
                            <td><?= esc($campaign['name']) ?></td>
                            <td><?= esc($campaign['trigger_event']) ?></td>
                            <td><?= $campaign['is_active'] ? 'Active' : 'Inactive' ?></td>
                            <td>
                                <a href="<?= site_url("Management/Drip-Campaigns/{$campaign['id']}/Steps") ?>" class="btn btn-sm btn-outline-info">View Steps</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-muted">No campaigns found.</p>
    <?php endif ?>
</div>
