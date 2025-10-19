<?php 
// User's Investment Commitments - commitment_overview.php
?>
<div class="card h-100" id="commitment-overview">
    <div class="card-inner">
        <h5>Investment Commitments</h5>
        <?php if (!empty($commitments)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commitments as $commitment): ?>
                        <tr>
                            <td><?= esc($commitment['project_name'] ?? 'N/A'); ?></td>
                            <td>$<?= number_format($commitment['amount'] ?? 0.0, 2); ?></td>
                            <td><?= esc($commitment['status'] ?? 'Unknown'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted">You have no active commitments at this time.</p>
        <?php endif; ?>
    </div>
</div>
