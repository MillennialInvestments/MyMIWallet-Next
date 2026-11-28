<?php
/**
 * Real Estate Revenue Distribution Console (Admin / Sponsor)
 *
 * @var array $project
 * @var array|null $property
 * @var array $revenues
 */
?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <nav class="mb-2">
                <a href="<?= site_url('Management/Projects') ?>" class="text-soft">&larr; Back to Management Projects</a>
            </nav>
            <h3 class="nk-block-title page-title">Real Estate Distribution Console</h3>
            <div class="nk-block-des text-soft">
                <p>Audit and execute pro-rata profit distributions for <strong><?= esc($project['name'] ?? $project['title'] ?? 'Real Estate Project') ?></strong>.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="<?= site_url('Projects/Real-Estate/' . (int) $project['id']) ?>" class="btn btn-outline-primary" target="_blank">
                <em class="icon ni ni-eye"></em><span>View Public Deal Page</span>
            </a>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5 class="card-title mb-3">Recorded Revenue Periods & Distributable Cash Flow</h5>
                    <?php if (empty($revenues)): ?>
                        <div class="alert alert-light text-center py-4">
                            No monthly revenues recorded yet.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Period</th>
                                        <th>Source</th>
                                        <th>Gross Revenue</th>
                                        <th>Operating Deductions</th>
                                        <th>Net Distributable</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($revenues as $rev): ?>
                                        <?php
                                        $deductions = (float) ($rev['gross_revenue'] - $rev['net_distributable']);
                                        $isDistributed = ($rev['status'] === 'distributed');
                                        ?>
                                        <tr>
                                            <td>#<?= (int) $rev['id'] ?></td>
                                            <td><strong><?= esc($rev['reporting_period']) ?></strong></td>
                                            <td><?= esc($rev['revenue_source']) ?></td>
                                            <td>$<?= number_format((float) $rev['gross_revenue'], 2) ?></td>
                                            <td>-$<?= number_format($deductions, 2) ?></td>
                                            <td class="text-success font-weight-bold">$<?= number_format((float) $rev['net_distributable'], 2) ?></td>
                                            <td>
                                                <span class="badge <?= $isDistributed ? 'bg-success' : 'bg-warning' ?>">
                                                    <?= esc($rev['status']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if ($isDistributed): ?>
                                                    <span class="text-soft small">Distributed <?= esc($rev['distributed_at'] ?? '') ?></span>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-primary btn-execute-dist" data-revenue-id="<?= (int) $rev['id'] ?>" data-amount="<?= number_format((float) $rev['net_distributable'], 2) ?>">
                                                        <em class="icon ni ni-send"></em><span>Execute Pro-Rata Distribution</span>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-execute-dist').forEach(btn => {
        btn.addEventListener('click', function () {
            const revenueId = this.getAttribute('data-revenue-id');
            const amount = this.getAttribute('data-amount');
            if (!confirm('Are you sure you want to execute a pro-rata distribution of $' + amount + ' to all active unit holders? This action is immutable on the fund ledger.')) {
                return;
            }

            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Distributing...';

            const formData = new FormData();
            formData.append('revenue_id', revenueId);
            formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

            fetch('<?= site_url('Management/Projects/Execute-Distribution/' . (int) $project['id']) ?>', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Distribution successfully executed and recorded on fund ledger!');
                    location.reload();
                } else {
                    alert('Distribution failed: ' + (data.message || 'Unknown error.'));
                    location.reload();
                }
            })
            .catch(err => {
                alert('Network error during distribution.');
                location.reload();
            });
        });
    });
});
</script>
