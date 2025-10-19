
<div class="card-inner">
    <!-- Available Projects Table -->
    <h6 class="title">MyMI Projects</h6>
    <table class="table table-striped default" id="MyMIProjectsListingTable">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Stage</th>
                <th>Minimum Investments</th>
                <th># of Investors</th>
                <th>Current Amount</th>
                <th>Target Amount</th>
                <th>% Obtained</th>
                <th>Revenue</th>
                <th>ROI</th>
            </tr>
        </thead>
        <tbody>
            <?php //log_message('debug', 'Dashboard\Profile\user_mymi_projects L14 - $userProjects: ' . (print_r($userProjects, true))); ?>
            <?php foreach ($userProjects as $project): ?>
                <tr>
                    <td><a href="<?= site_url('Projects/View/' . $project['id']); ?>"><?= esc($project['name']); ?></a></td>
                    <td><?= ucfirst($project['project_stage']) ?></td>
                    <td>$<?= number_format($project['minimum_investment'] ?? 0, 2); ?></td>
                    <td><?= number_format($project['investor_count'] ?? 0, 0); ?></td>
                    <td>$<?= number_format($project['current_amount'] ?? 0, 2); ?></td>
                    <td>$<?= number_format($project['target_amount'] ?? 0, 2); ?></td>
                    <td><?= number_format($project['progress_percentage'] ?? 0, 2); ?>%</td>
                    <td>$<?= number_format($project['revenue_generated'] ?? 0, 2); ?></td>
                    <td>
                        <?php if ($project['revenue_generated'] > 0) : ?>
                        <?= number_format(($project['revenue_generated'] / $project['target_amount']) ?? 0, 2); ?>%
                        <?php else : ?>
                            0%
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>