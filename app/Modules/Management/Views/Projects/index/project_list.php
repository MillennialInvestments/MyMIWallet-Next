<?php 
// User's Project List - project_list.php
// log_message('debug', 'Projects\index\project_list L4 - $projects array: ' . (print_r($projects, true))); 
$projects = $projects ?? [];

// Aggregate statistics for the projects
$totalProjects = count($projects);
$totalFunded = array_sum(array_column($projects, 'current_amount'));
$totalTarget = array_sum(array_column($projects, 'target_amount'));
$fundingProgress = $totalTarget > 0 ? ($totalFunded / $totalTarget) * 100 : 0;
?>

<div class="card h-100" id="project-list-view">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>Click on the legend below to hide or show parts of the chart and edit the timeframe at the bottom of it</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <a class="btn btn-primary full-width" href="<?= site_url('/Management/Projects') ?>">
                    Go To Admin
                </a>
            </div>
        </div>
        <!-- Summary Statistics Section -->
        <div class="nk-order-ovwg">
            <div class="row g-4">
                <div class="col-sm-4">
                    <div class="stat-card">
                        <h6>Total Projects</h6>
                        <p><?= $totalProjects; ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="stat-card">
                        <h6>Total Funded</h6>
                        <p>$<?= number_format($totalFunded, 2); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="stat-card">
                        <h6>Funding Progress</h6>
                        <p><?= number_format($fundingProgress, 2); ?>%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-bordered mt-3">
        <div class="card-inner">
            <?= view('App/Modules/Management/Views/Projects/_quick_intake'); ?>
        </div>
    </div>
    <div class="card-inner">
        <hr class="w-100 mb-3">
        <!-- Available Projects Table -->
        <div class="mt-4 table-responsive">
            <!-- Header with Buttons -->
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="title">Available Projects</h6>
                <div class="btn-group-inline">
                    <a class="btn btn-sm btn-primary text-white dynamicModalLoader" data-formtype="Projects" data-endpoint="Add" data-category="newProject" data-accountid="<?= $cuID; ?>">Add Project</a>
                    <!-- <a href="<?= site_url('Projects/Export'); ?>" class="btn btn-sm btn-secondary">Export Projects</a>
                    <a href="<?= site_url('Projects/Report'); ?>" class="btn btn-sm btn-warning">Generate Report</a> -->
                </div>
            </div>
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
                        <th>Actions</th> <!-- New column for buttons -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project): ?>
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
                            <td>
                                <a href="<?= site_url('Projects/View/' . $project['id']); ?>" class="btn btn-sm btn-primary mx-5"><em class="icon ni ni-eye"></em></a>
                                <!-- <a href="<?= site_url('Projects/Edit/' . $project['id']); ?>" class="btn btn-sm btn-secondary mx-5"><em class="icon ni ni-pen"></em></a>
                                <a href="<?= site_url('Projects/Delete/' . $project['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?');"><em class="icon ni ni-cross"></em></a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Additional Styling for Stats -->
<style <?= $nonce['style'] ?? '' ?>>
.stat-card {
    padding: 15px;
    background-color: #f7f9fc;
    border: 1px solid #eaeaea;
    border-radius: 5px;
    text-align: center;
}
.stat-card h6 {
    margin-bottom: 5px;
    font-weight: bold;
}
.stat-card p {
    font-size: 1.25rem;
    color: #4a90e2;
    font-weight: bold;
}
</style>
