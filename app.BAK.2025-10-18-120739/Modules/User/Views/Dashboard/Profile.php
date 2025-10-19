<?php 
log_message('debug', 'Dashboard\Profile L2 - $userInfo array: ' . (print_r($userInfo, true)));
$subViewData = [
    'completedGoals' => $completedGoals,
    'userProjects' => $userProjects,
];
?>

<!-- Header Section -->
<div class="user-header">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <!-- Display Name -->
                <h3 class="nk-block-title"><?php echo $userInfo['display_name'] ?? $userInfo['username']; ?></h3>
                <!-- Member Since and Membership -->
                <p class="text-soft">
                    <strong>Member Since:</strong> <?php echo date('F Y', strtotime($userInfo['created_at'])); ?> |
                    <strong>Membership:</strong> <?php //echo $userInfo['membership_tier'] ?? 'Free'; ?>
                </p>
            </div>
            <div class="nk-block-head-content">
                <!-- Social Media Links -->
                <ul class="social-links">
                    <li>
                        <a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Generate Report</span></a>
                    </li>
                    <?php // if ($userInfo['social_links']['twitter']) : ?>
                        <li><a href="<?php // echo $userInfo['social_links']['twitter']; ?>" target="_blank">Twitter</a></li>
                    <?php //endif; ?>
                    <?php // if ($userInfo['social_links']['linkedin']) : ?>
                        <li><a href="<?php // echo $userInfo['social_links']['linkedin']; ?>" target="_blank">LinkedIn</a></li>
                    <?php //endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="nk-block community-involvement">
    <h4>Community Involvement</h4>
    <div class="row g-gs">
        <!-- Community Rank -->
        <div class="col-12 col-md-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="title">Community Rank</h6>
                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                        <div class="nk-sale-data-group flex-md-nowrap g-4">
                            <div class="nk-sale-data">
                                <span class="amount"><?php echo $userMetrics['community_rank'] ?? 'Your Last.. JK!'; ?> <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                <span class="sub-title">of <?= $totalActiveUsers ?> Investors</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Alerts Shared -->
        <div class="col-12 col-md-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="title">Alerts Shared</h6>
                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                        <div class="nk-sale-data-group flex-md-nowrap g-4">
                            <div class="nk-sale-data">
                                <span class="amount"><?php echo $userMetrics['alerts_shared'] ?? '0 Alerts'; ?></span>
                                <a class="btn btn-primary btn-xs" href="' . site_url('My-Referrals') . '"><em class="icon ni ni-plus"></em><span>Share A Trade?</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Referrals Made -->
        <div class="col-12 col-md-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="title">Referrals</h6>
                    <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                        <div class="nk-sale-data-group flex-md-nowrap g-4">
                            <div class="nk-sale-data">
                                <span class="amount"><?php echo $userMetrics['referrals'] ?? 0; ?> Referrals</span>
                                <a class="btn btn-success btn-xs" href="' . site_url('My-Referrals') . '"><em class="icon ni ni-plus"></em><span>Invite Friends!</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nk-block investment-overview">
    <h4>Investment Overview</h4>
    <div class="row g-gs">
        <!-- Investor Strength Score -->
        <!-- <div class="col-12 col-md-4">
            <?php //echo view('Dashboard\Profile\investor_strength_score', $subViewData); ?>
        </div> -->
        <!-- Project Participation -->
        <div class="col-12 col-md-12">            
            <div class="card card-bordered">
                <?php echo view('Dashboard\Profile\user_mymi_projects', $subViewData); ?>
            </div>
        </div>
    </div>
</div>

<!-- DataTable Initialization Script -->
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $('#MyMIProjectsListingTable').DataTable({
        "order": [[ 0, "asc" ]],     
        "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]]
    });
});
</script>

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