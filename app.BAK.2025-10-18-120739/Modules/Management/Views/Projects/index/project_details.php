<?php 
// User's Projects Details - project_details.php
$project = $projectInfo[0];
?>
<div class="card h-100" id="project-details-view">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Project Details: <?= $project['name']; ?></h6>
                </div>
                <div class="card-tools me-n1">
                    <a class="btn btn-primary text-white" href="<?= site_url('Projects/Edit/' . $project['id']); ?>">
                        <i class="icon ni ni-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-block">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr><th>Project Name</th><td><?= $project['name']; ?></td></tr>
                        <tr><th>Description</th><td><?= nl2br($project['description']); ?></td></tr>
                        <tr><th>Target Amount</th><td><?= $project['target_amount']; ?></td></tr>
                        <tr><th>Status</th><td><?= $project['status']; ?></td></tr>
                        <tr><th>Created By</th><td><?= $project['created_by']; ?></td></tr>
                        <tr><th>Date Created</th><td><?= $project['created_at']; ?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
