<?php
$nonce = $nonce ?? ['style' => '', 'script' => ''];
$periodLabel  = $periodLabel  ?? '';
$filterType   = $filterType   ?? null;
$summary      = is_array($summary ?? null) ? $summary : ['income'=>0,'expense'=>0,'net'=>0];
$transactions = is_array($transactions ?? null) ? $transactions : [];
?>
<div class="container py-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="mb-0">
            This Month <?= $filterType ? ('— ' . ucfirst($filterType)) : '' ?>
            <small class="text-muted"> (<?= esc($periodLabel) ?>)</small>
        </h2>
        <div class="d-flex gap-2">
            <a class="btn btn-secondary" href="<?= site_url('Budget'); ?>">Back to Budget</a>
            <a class="btn btn-primary" href="<?= site_url('Budget/This-Month'); ?>">All</a>
            <a class="btn btn-outline-success" href="<?= site_url('Budget/This-Month/Income'); ?>">Income</a>
            <a class="btn btn-outline-danger" href="<?= site_url('Budget/This-Month/Expense'); ?>">Expenses</a>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="fw-semibold text-muted mb-1">Total Income</div>
                    <div class="fs-4">$<?= number_format((float)($summary['income'] ?? 0), 2) ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="fw-semibold text-muted mb-1">Total Expenses</div>
                    <div class="fs-4">$<?= number_format((float)($summary['expense'] ?? 0), 2) ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="fw-semibold text-muted mb-1">Net</div>
                    <div class="fs-4">$<?= number_format((float)($summary['net'] ?? 0), 2) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Transactions</span>
            <small class="text-muted"><?= count($transactions) ?> item(s)</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Account</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th class="text-end">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($transactions)): ?>
                        <?php foreach ($transactions as $tx): ?>
                            <tr>
                                <td><?= esc($tx['date'] ?? '') ?></td>
                                <td><?= esc($tx['account_name'] ?? $tx['account'] ?? '') ?></td>
                                <td><?= esc($tx['category'] ?? '') ?></td>
                                <td><?= esc(ucfirst(strtolower((string)($tx['type'] ?? '')); ?></td>
                                <td class="text-end">
                                    $<?= number_format((float)($tx['amount'] ?? 0), 2) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No transactions found for this filter.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>