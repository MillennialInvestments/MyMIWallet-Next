<!-- /app/Modules/Management/Views/Marketing/Drip/steps.php -->
<div class="container mt-4">
    <h2>Campaign Steps – <?= esc($campaign['name']) ?></h2>
    <a href="<?= site_url("Management/Drip-Campaigns/{$campaign['id']}/Steps/Add") ?>" class="btn btn-primary mb-3">+ Add Step</a>

    <?php if (!empty($steps)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Step Name</th>
                    <th>Subject</th>
                    <th>View File</th>
                    <th>Delay (D+H)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($steps as $step): ?>
                    <tr>
                        <td><?= esc($step['step_number']) ?></td>
                        <td><?= esc($step['name']) ?></td>
                        <td><?= esc($step['subject']) ?></td>
                        <td><?= esc($step['view_file']) ?></td>
                        <td><?= "{$step['delay_days']}d / {$step['delay_hours']}h" ?></td>
                        <td><?= $step['is_active'] ? 'Active' : 'Inactive' ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No steps found.</p>
    <?php endif ?>
</div>
