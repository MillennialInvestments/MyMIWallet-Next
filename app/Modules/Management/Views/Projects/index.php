<?php
// Project Index View - Projects::index
// Including multiple views for a consolidated project dashboard view
log_message('debug', 'Projects\index L4 - $projects Array: ' . (print_r($projects, true))); 
$subViewData = [
    'projectInfo' => $projectInfo ?? [],
    'projects' => $projects['allProjects'] ?? [],
    'userBalance' => $projects['userBalance'] ?? 0,
    'commitments' => $projects['commitments'] ?? [],
    'distributions' => $projects['distributions'] ?? [],
    'totalDistributions' => $projects['totalDistributions'],
    'investments' => $projects['investments'],
    'totalCommitments' => $projects['commitments'][0]['amount'] ?? 0.00,
    'topProjects' => $topProjects ?? [], // New addition for spotlighted projects
];
// echo $projects['commitments'][0]['amount'];
?>
<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
    #project-datatable_filter { padding-top: 1rem; text-align: left; }
}
.nk-order-ovwg-data.projects { border-color: #84b8ff; }
.nk-order-ovwg-data .amount { font-size: 1.25rem; font-weight: 700; }
</style>

<div class="nk-block">
    <div class="row g-gs">

        <!-- Management Action Center -->
        <div class="col-md-12 col-xl-3">
            <?php echo view('ManagementModule/Views/Projects\index\action_center', $subViewData); ?>
        </div>

        <!-- Active Projects Section -->
        <div class="col-md-12 col-xl-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <?php echo view('ManagementModule/Views/Projects\index\project_list', $subViewData); ?>
                </div>
            </div>
        </div>

        <!-- Pending Projects Section -->
        <div class="col-md-12 col-xl-12">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <?php echo view('ManagementModule/Views/Projects\index\pending_projects', $subViewData); ?>
                </div>
            </div>
        </div>

        <!-- Project List Section -->
        <!-- <div class="col-md-12 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <?php //echo view('Projects\index\revenue_distribution', $subViewData); ?>
                </div>
            </div>
        </div> -->

        <!-- Project Overview Section -->
        <!-- <div class="col-md-12 col-xl-8">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <?php //echo view('Projects\index\commitment_overview', $subViewData); ?>
                </div>
            </div>
        </div> -->

    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// JavaScript initialization for charts and real-time updates
// document.addEventListener("DOMContentLoaded", function() {
//     initInvestmentChart();
//     // Additional scripts for dynamic updates, form validation, etc.
// });
</script>
