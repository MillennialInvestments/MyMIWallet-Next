<?php
// log_message('debug', 'Management\Projects\project_overview L2 - $projectStats Array: ' . (print_r($projectStats, true)));
?>

<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title">Project Overview & Statistics</h5>
        <table class="table table-striped">
            <tbody>
                <tr><th>Total Projects</th><td><?= $projectStats['totalProjects']; ?></td></tr>
                <tr><th>Total Investments</th><td>$<?= number_format($projectStats['totalInvestments'], 2); ?></td></tr>
                <tr><th>Active Projects</th><td><?= $projectStats['activeProjects']; ?></td></tr>
            </tbody>
        </table>
    </div>
</div>
