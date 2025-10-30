<?php 
// User's Revenue Distribution View - revenue_distribution.php
$distributions = $distributions ?? [];
?>
<div class="card h-100" id="revenue-distribution">
    <div class="card-inner">
        <h6 class="title">Revenue Distribution</h6>
        <?php if (!empty($distribution)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Amount Distributed ($)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($distribution as $dist): ?>
                        <tr>
                            <td><?= esc($dist['project_name'] ?? 'Unknown Project'); ?></td>
                            <td>$<?= number_format($dist['amount'] ?? 0.0, 2); ?></td>
                            <td><?= date("Y-m-d", strtotime($dist['date'] ?? 'now')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted">No distributions available at this time.</p>
        <?php endif; ?>
    </div>
</div>
