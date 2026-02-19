<div class="d-flex justify-content-between align-items-center">
    <div>
        <h5 class="mb-1">Chat AI Budget</h5>
        <div class="small text-soft">Month <?= esc($chatUsageSummary['month'] ?? $month); ?></div>
        <div class="small">USD: $<?= number_format($chatUsed, 2); ?> / $<?= number_format($chatBudget, 2); ?></div>
    </div>
    <div class="text-end">
        <span class="badge <?= ($chatPercent >= $chatAlert) ? 'bg-warning text-dark' : 'bg-success'; ?>"><?= $chatPercent; ?>%</span>
        <div><a class="btn btn-primary btn-sm mt-1" href="<?= site_url('Management/Chat/Usage'); ?>">Open controls</a></div>
    </div>
</div>
<div class="progress mt-2">
    <div class="progress-bar <?= ($chatPercent >= $chatAlert) ? 'bg-warning' : 'bg-primary'; ?>" style="width: <?= min(100, $chatPercent); ?>%"></div>
</div>