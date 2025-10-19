<?php
// User's Projects Dashboard - user_dashboard.php
?>
<style <?= $nonce['style'] ?? '' ?>>
    .dashboard-section {
        padding: 15px 0; /* Adds vertical spacing between each section */
        border-bottom: 1px solid #eaeaea; /* Adds a subtle divider between sections */
    }
    .dashboard-section:last-child {
        border-bottom: none; /* Removes bottom border on the last section */
    }
    .balance {
        font-size: 1.25rem;
        font-weight: bold;
        color: #4a90e2;
    }
</style>
<div class="card h-100" id="user-dashboard">
    <div class="card-inner">
        <h5 class="title">Dashboard Overview</h5>

        <!-- Balance Section -->
        <div class="dashboard-section">
            <h6>Your Balance</h6>
            <p class="balance">
                <?= isset($userBalance) && is_numeric($userBalance) ? 
                    '$' . number_format($userBalance, 2) . ' MYMIG' : 'Balance data not available'; ?>
            </p>
        </div>

        <!-- Investment Summary Section -->
        <div class="dashboard-section">
            <h6>Investment Summary</h6>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Total Commitments:</th>
                        <td>
                            <?= isset($totalCommitments) && is_numeric($totalCommitments) ? 
                                '$' . number_format($totalCommitments, 2) : '$0.00'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Active Investments:</th>
                        <td>
                            <?= isset($investments) && is_numeric($investments) ? 
                                '$' . number_format($investments, 2) : '$0.00'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Pending Distributions:</th>
                        <td>
                            <?= isset($distributions) && is_numeric($distributions) ? 
                                '$' . number_format($distributions, 2) : '$0.00'; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Revenue Overview Section -->
        <div class="dashboard-section">
            <h6>Revenue Overview</h6>
            <p>
                Cumulative Revenue: 
                <?= isset($cumulativeRevenue) && is_numeric($cumulativeRevenue) ? 
                    '$' . number_format($cumulativeRevenue, 2) : '$0.00'; ?>
            </p>
        </div>

        <!-- Projected Earnings Section -->
        <div class="dashboard-section">
            <h6>Projected Earnings</h6>
            <p>
                Estimated Earnings: 
                <?= isset($projectedEarnings) && is_numeric($projectedEarnings) ? 
                    '$' . number_format($projectedEarnings, 2) : '$0.00'; ?>
            </p>
        </div>

        <!-- Recent Activity Section -->
        <div class="dashboard-section">
            <h6>Recent Activity</h6>
            <ul class="list-group">
                <?php if (!empty($recentActivity)): ?>
                    <?php foreach ($recentActivity as $activity): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= esc($activity['description']); ?>
                            <small class="text-muted"><?= date("Y-m-d", strtotime($activity['date'])); ?></small>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item text-muted">No recent activity.</li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Top Projects Section -->
        <div class="dashboard-section">
            <h6>Your Top Projects</h6>
            <?php if (!empty($topProjects)): ?>
                <table class="table table-borderless">
                    <tbody>
                        <?php foreach ($topProjects as $project): ?>
                            <tr>
                                <th><?= esc($project['name']); ?></th>
                                <td>
                                    <?= isset($project['projected_revenue']) && is_numeric($project['projected_revenue']) ? 
                                        '$' . number_format($project['projected_revenue'], 2) : '$0.00'; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">No projects to display.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
