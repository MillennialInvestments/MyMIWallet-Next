<div class="card card-bordered">
    <div class="card-header">
        <h5 class="title">Project Overview: <?= esc($project['name']); ?></h5>
    </div>
    <div class="card-body">
        <!-- General Project Information -->
        <h6 class="mb-3">Project Details</h6>
        <table class="table table-striped">
            <tbody>
                <tr><th>Status</th><td><span class="badge bg-<?= $project['status'] === 'pending' ? 'warning' : ($project['status'] === 'active' ? 'success' : 'danger'); ?>"><?= ucfirst($project['status']); ?></span></td></tr>
                <tr><th>Project Name</th><td><strong><a href=""><?= esc($project['name']); ?></a></strong></td></tr>
                <tr><th>Description</th><td><?= nl2br(esc($project['description'])); ?></td></tr>
                <tr><th>Stage</th><td><?= ucfirst($project['project_stage']); ?></td></tr>
                <tr><th>Submitted By</th><td><strong><a href="<?= site_url('/Profile/' . $owner['cuUsername']) ?>"><?= esc($owner['cuUsername']); ?></a></strong></td></tr>
                <tr><th>Submission Date</th><td><?= esc(date('Y-m-d', strtotime($project['created_at']); ?></td></tr>
            </tbody>
        </table>

        <hr class="w-80">
        <!-- Financial Overview -->
        <h6 class="mt-4 mb-3">Financial Details</h6>
        <table class="table table-striped">
            <tbody>
                <tr><th>Target Amount</th><td>$<?= number_format($project['target_amount'], 2); ?></td></tr>
                <tr><th>Minimum Investment</th><td>$<?= number_format($project['minimum_investment'], 2); ?></td></tr>
                <tr><th>Maximum Investment</th><td>$<?= number_format($project['maximum_investment'], 2); ?></td></tr>
                <tr><th>Current Amount</th><td>$<?= number_format($project['current_amount'] ?? 0, 2); ?></td></tr>
                <tr><th>Investors</th><td><?= $project['investor_count'] ?? 0; ?></td></tr>
                <tr><th>Revenue Generated</th><td>$<?= number_format($project['revenue_generated'] ?? 0, 2); ?></td></tr>
                <tr><th>ROI</th>
                    <td>
                        <?php if ($project['revenue_generated'] > 0): ?>
                            <?= number_format(($project['revenue_generated'] / $project['target_amount']) * 100, 2); ?>%
                        <?php else: ?>
                            0%
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr class="w-80">
        <!-- Additional Information / Links -->
        <h6 class="mt-4 mb-3">Additional Information</h6>
        <p><strong>Remarks/Requirements</strong></p>
        <p><?= esc($project['remarks']) ?></p>
        <p><strong>Promotional Links</strong></p>
        <p><?= esc($project['promotional_links']) ?></p>
        
        <hr class="w-80">
        <!-- Actions Section -->
        <h6 class="mt-4 mb-3">Management Actions</h6>
        <div class="d-flex align-items-center">
            <a href="<?= site_url('Management/Projects/Approve/' . $project['id']); ?>" class="btn btn-success me-2" onclick="return confirm('Approve this project?');">Approve</a>
            <a href="<?= site_url('Management/Projects/Reject/' . $project['id']); ?>" class="btn btn-danger me-2" onclick="return confirm('Reject this project?');">Reject</a>
            <a href="<?= site_url('Management/Projects/Edit/' . $project['id']); ?>" class="btn btn-secondary me-2">Edit</a>
            <a href="<?= site_url('Management/Projects/Message/' . $project['id']); ?>" class="btn btn-primary">Request More Information</a>
        </div>
    </div>
</div>

<!-- Additional Styling for Details -->
<style <?= $nonce['style'] ?? '' ?>>
.card-bordered {
    border: 1px solid #eaeaea;
    border-radius: 8px;
}
.table th, .table td {
    vertical-align: middle;
}
.badge {
    font-size: 0.85rem;
}
</style>
