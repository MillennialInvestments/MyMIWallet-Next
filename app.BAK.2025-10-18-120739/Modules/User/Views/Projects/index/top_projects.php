<?php
// Top-Performing Projects Spotlight View - top_projects.php

?>
<div class="top-projects-spotlight">
    <h6 class="title">Top-Performing Projects</h6>
    <div class="row g-gs">
        <?php if (!empty($topProjects)): ?>
            <?php foreach ($topProjects as $project): ?>
                <div class="col-md-6">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <h6 class="project-title"><?= esc($project['name'] ?? 'N/A'); ?></h6>
                            <p class="project-description"><?= nl2br(esc($project['description'] ?? 'Description not available.')); ?></p>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Target Amount:</th>
                                        <td><?= isset($project['target_amount']) ? '$' . number_format($project['target_amount'], 2) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Current Investment:</th>
                                        <td><?= isset($project['current_investment']) ? '$' . number_format($project['current_investment'], 2) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Projected Revenue:</th>
                                        <td><?= isset($project['projected_revenue']) ? '$' . number_format($project['projected_revenue'], 2) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Percentage Achieved:</th>
                                        <td>
                                            <?php if (isset($project['target_amount']) && $project['target_amount'] > 0): ?>
                                                <?= round(($project['current_investment'] / $project['target_amount']) * 100, 2); ?>%
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?= site_url('Projects/View/' . $project['id']); ?>" class="btn btn-primary mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">No top-performing projects available at the moment.</p>
        <?php endif; ?>
    </div>
</div>
