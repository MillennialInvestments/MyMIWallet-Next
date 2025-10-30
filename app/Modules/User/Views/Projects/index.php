<?php
/** @var array $projects */
?>
<div class="nk-block">
    <div class="row g-4">
        <?php if (empty($projects)): ?>
            <div class="col-12">
                <div class="alert alert-info">No projects are currently available.</div>
            </div>
        <?php endif; ?>
        <?php foreach ($projects as $entry):
            $project = $entry['project'];
            $progress = (float) ($entry['progress_ratio'] ?? 0);
            $percent = number_format($progress * 100, 1);
            $target = number_format((float) ($entry['target'] ?? 0), 2);
            $committed = number_format((float) ($entry['committed'] ?? 0), 2);
        ?>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h5 class="card-title mb-2">
                        <a href="<?= site_url('Projects/View/' . esc($project['slug'])) ?>">
                            <?= esc($project['title']) ?>
                        </a>
                    </h5>
                    <p class="text-muted small mb-3">Status: <span class="badge bg-light text-dark"><?= esc($project['status']) ?></span></p>
                    <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <ul class="list-unstyled small mb-3">
                        <li><strong>Committed:</strong> $<?= $committed ?></li>
                        <li><strong>Target:</strong> $<?= $target ?></li>
                        <?php if (! empty($project['commit_deadline'])): ?>
                            <li><strong>Commit Deadline:</strong> <?= esc($project['commit_deadline']) ?></li>
                        <?php endif; ?>
                    </ul>
                    <a class="btn btn-primary btn-sm" href="<?= site_url('Projects/View/' . esc($project['slug'])) ?>">View Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
