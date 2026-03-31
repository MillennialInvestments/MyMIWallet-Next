<?php
/** @var object $project */
/** @var int $holders */
/** @var array $navHistory */
$project = $project ?? null;
$holders = (int) ($holders ?? 0);
$navHistory = is_array($navHistory ?? null) ? $navHistory : [];
?>

<?php if (! $project): ?>
    <div class="alert alert-warning">Project details are unavailable.</div>
<?php else: ?>
    <div class="nk-block">
        <div class="card card-bordered mb-4">
            <div class="card-inner">
                <h3 class="card-title mb-2"><?= esc($project->title ?? 'Project') ?></h3>
                <p class="text-muted mb-3"><?= esc($project->description ?? 'No description available.') ?></p>

                <div class="row g-3 mb-3">
                    <div class="col-md-4"><strong>Type:</strong> <?= esc($project->project_type ?? 'N/A') ?></div>
                    <div class="col-md-4"><strong>NAV:</strong> $<?= number_format((float) ($project->nav_per_unit ?? 0), 2) ?></div>
                    <div class="col-md-4"><strong>Fund Value:</strong> $<?= number_format((float) ($project->total_fund_value ?? 0), 2) ?></div>
                    <div class="col-md-4"><strong>Units:</strong> <?= number_format((float) ($project->total_units_issued ?? 0), 4) ?></div>
                    <div class="col-md-4"><strong>Holders:</strong> <?= number_format($holders) ?></div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <a href="/Projects/Fund/<?= (int) $project->id ?>" class="btn btn-primary">Invest (Primary)</a>

                    <?php if ((int) ($project->exchange_enabled ?? 0) === 1 && ! empty($project->ticker)): ?>
                        <a href="/Exchange/Projects/<?= esc($project->ticker) ?>" class="btn btn-success">Trade on Exchange</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card card-bordered mb-4">
            <div class="card-inner">
                <h5 class="card-title">NAV History</h5>
                <canvas id="projectNavChart" height="100"></canvas>
            </div>
        </div>

        <div class="card card-bordered">
            <div class="card-inner">
                <h5 class="card-title">Documentation</h5>
                <div class="project-docs">
                    <?= $project->documentation_html ?? 'No docs available' ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const labels = <?= json_encode(array_map(static fn($row) => (string) ($row->created_at ?? ''), array_reverse($navHistory))) ?>;
            const navValues = <?= json_encode(array_map(static fn($row) => (float) ($row->nav_per_unit ?? 0), array_reverse($navHistory))) ?>;

            const canvas = document.getElementById('projectNavChart');
            if (!canvas || typeof Chart === 'undefined') {
                return;
            }

            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'NAV',
                        data: navValues,
                        fill: false,
                        borderColor: '#2563eb',
                        tension: 0.2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
<?php endif; ?>
