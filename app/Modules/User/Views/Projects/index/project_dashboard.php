<?php
// Include safe_ucfirst in this view file or make it globally available
function safe_ucfirst($string, $default = 'unknown') {
    if (!is_string($string) || trim($string) === '') {
        return $default; 
    }
    return ucfirst($string);
}
?>

<style <?= $nonce['style'] ?? '' ?>>
    .dashboard-section {
        padding: 15px 0;
        border-bottom: 1px solid #eaeaea;
    }
    .dashboard-section:last-child {
        border-bottom: none;
    }
    .highlight {
        font-size: 1.25rem;
        font-weight: bold;
        color: #4a90e2;
    }
</style>

<div class="card h-100" id="project-dashboard">
    <div class="card-inner">

        <!-- Project Summary Section -->
        <div class="dashboard-section">
            <h6>Project Summary</h6>
            <p class="highlight">
                <?= esc($project['name'] ?? 'Project Name Unavailable'); ?>
            </p>
            <p>
                Target Amount: 
                <?= isset($project['target_amount']) ? 
                    '<strong class="text-primary">$' . number_format($project['target_amount'], 2) . '</strong>' : 'N/A'; ?>
            </p>
            <p>
                Current Status: 
                <span class="badge bg-info">
                    <?= safe_ucfirst($project['status'] ?? null, 'Unknown'); ?>
                </span>
            </p>
        </div>

        <!-- Financial Metrics Section -->
        <div class="dashboard-section">
            <h6>Financial Metrics</h6>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Total Commitments:</th>
                        <td>
                            <?= isset($chartData['totalCommitments']) ? 
                                '<strong class="text-primary">$' . number_format($chartData['totalCommitments'], 2) . '</strong>' : '$0.00'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Investments:</th>
                        <td>
                            <?= isset($chartData['totalInvestments']) ? 
                                '$' . number_format($chartData['totalInvestments'], 2) : '$0.00'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Revenue:</th>
                        <td>
                            <?= isset($chartData['totalRevenue']) ? 
                                '$' . number_format($chartData['totalRevenue'], 2) : '$0.00'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>ROI Distributed:</th>
                        <td>
                            <?= isset($chartData['totalROI']) ? 
                                '$' . number_format($chartData['totalROI'], 2) : '$0.00'; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Active Distributions -->
        <div class="dashboard-section">
            <h6>Distributions Overview</h6>
            <p>
                Pending Distributions: 
                <?= isset($chartData['pendingDistributions']) ? 
                    '$' . number_format($chartData['pendingDistributions'], 2) : '$0.00'; ?>
            </p>
            <p>
                Distributed to Date: 
                <?= isset($chartData['totalROI']) ? 
                    '$' . number_format($chartData['totalROI'], 2) : '$0.00'; ?>
            </p>
        </div>

        <!-- Owner Information Section -->
        <div class="dashboard-section">
            <h6>Owner Information</h6>
            <p>
                Owner Name: <?= esc($owner['cuUsername'] ?? 'N/A'); ?><br>
                Email: 
                <?= isset($owner['cuEmail']) ? 
                    '<a href="mailto:' . $owner['cuEmail'] . '">' . $owner['cuEmail'] . '</a>' : 'N/A'; ?><br> 
                Location: 
                <?= isset($owner['cuState']) ? 
                    $owner['cuState'] : 'N/A'; ?>
            </p>
        </div>

        <!-- Owner's Other Investments Section -->
        <div class="dashboard-section">
            <h6>Owner's Other Investments</h6>
            <?php if (!empty($ownerOtherProjects)): ?>
                <ul class="list-group">
                    <?php foreach ($ownerOtherProjects as $otherProject): ?>
                        <li class="list-group-item">
                            <a href="<?= site_url('Projects/View/' . $otherProject['id']) ?>"><strong><?= esc($otherProject['name']); ?></strong></a><br>
                            Target Amount: <?= '$' . number_format($otherProject['target_amount'], 2); ?><br>
                            Status: <?= esc(ucfirst($otherProject['status'])); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">No other investments available.</p>
            <?php endif; ?>
        </div>

        <!-- Top Performing Months -->
        <div class="dashboard-section">
            <h6>Top Performing Months</h6>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Revenue</th>
                        <th>Investments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($topMonths)): ?>
                        <?php foreach ($topMonths as $month => $data): ?>
                            <tr>
                                <td><?= esc($month); ?></td>
                                <td><?= '$' . number_format($data['revenue'], 2); ?></td>
                                <td><?= '$' . number_format($data['investments'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-muted">No data available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Recent Revenue Updates -->
        <div class="dashboard-section">
            <h6>Recent Revenue Updates</h6>
            <ul class="list-group">
                <?php if (!empty($recentRevenueUpdates)): ?>
                    <?php foreach ($recentRevenueUpdates as $update): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= 'Revenue Reported: $' . number_format($update['amount'], 2); ?>
                            <small class="text-muted"><?= date('Y-m-d', strtotime($update['reported_at'])); ?></small>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item text-muted">No recent revenue updates.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
