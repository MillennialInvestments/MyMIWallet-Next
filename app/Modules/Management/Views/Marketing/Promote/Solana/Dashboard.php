<?php
// Management Configurations
// $managementActionItems              = $siteSettings->managementActionItems; 
// $today                              = $siteSettings->today; 
// $month                              = $siteSettings->month; 
// $day                                = $siteSettings->day;
// $year                               = $siteSettings->year; 
// $last_month                         = strtotime($month . ' - 1 month');
$pageURIB                           = $uri->getSegment(2);
$pageURID                           = $uri->getSegment(4);
$department                         = 'Marketing';
$getActiveCampaigns                 = []; 
$newsUpdates                        = []; 
$getBlogPosts                       = []; 
// $department                         = $pageURIB;

// // Active Users
// $totalActiveUsers                   = $reporting['totalActiveUsers']; 
// $totalActivePartners                = $reporting['totalActivePartners']; 
// // Approved// Approved
// $topApprovedAssets                  = $exchangeAssets['approvedAssets']['getTopApprovedAssets']['topApprovedAssets']; 
// $totalApprovedAssets                = $exchangeAssets['approvedAssets']['getTotalAssetsCount']; 

// // Pending
// $getPendingAssets                   = $reporting['getPendingAssets'];
// $totalPendingAssets                 = $reporting['totalPendingAssets'];
// $getPendingSupport                  = $reporting['getPendingSupport']; 
// $totalPendingSupport                = $reporting['totalPendingSupport']; 

// // Totals
// $totalTransactions                  = $reporting['totalTransactions']; 
// $totalTransTotals                   = $reporting['totalTransTotals'];
// $totalTransTotalsPlain              = $reporting['totalTransTotalsPlain'];
// $totalTransFees                     = $reporting['totalTransFees'];
// $totalTransFeesPlain                = $reporting['totalTransFeesPlain'];
// $totalLastTransTotals               = $reporting['totalLastTransTotals'];
// $totalLastTransFees                 = $reporting['totalLastTransFees'];
// $totalCompleteSupport               = $reporting['totalCompleteSupport']; 
// $totalWalletsCreated                = $reporting['totalWalletsCreated'];

// // Percentages
// $assetPercentage                    = $reporting['assetPercentage'];
// $pendingAssetsPercentage            = $reporting['pendingAssetsPercentage'];
// $transactionPercentage              = $reporting['transactionPercentage']; 
// $transAmountPercentage              = $reporting['transAmountPercentage']; 
// $transFeesPercentage                = $reporting['transFeesPercentage'];
// $partnerPercentage                  = $reporting['partnerPercentage'];
// $usersPercentage                    = $reporting['usersPercentage'];
// $walletsPercentage                  = $reporting['walletsPercentage'];

// // Targets
// $targetAssets                       = $reporting['targetAssets'];
// $targetTransactions                 = $reporting['targetTransactions'];
// $targetTransAmount                  = $reporting['targetTransAmount'];
// $targetTransFees                    = $reporting['targetTransFees']; 
// $targetUsers                        = $reporting['targetUsers'];
// $targetPartners                     = $reporting['targetPartners'];
// $targetWallets                      = $reporting['targetWallets'];

// // Marketing Analtyics
// // print_r($departmentPendingTasks); 
// $getTasksByDepartment               = $departmentTasks['getTasksByDepartment'] ?? [];
// $totalDepartmentTasks               = $departmentTasks['totalTasks'] ?? [];
// $totalPageSEOTasks                  = $departmentTasks['totalTasksByType']['Page SEO Edit'] ?? []; 

// // $getActiveCampaigns                 = $marketingDepartment['department']['getActiveCampaigns'] ?? []; 
// // $totalActiveCampaigns               = $marketingDepartment['department']['totalActiveCampaigns'] ?? []; 

// $getActiveCampaigns                 = []; 
// $totalActiveCampaigns               = []; 
// $totalActivePartners                = []; 
// $userCompletions                    = $progressGoalData['completions'] ?? [];
// $userGoals                          = $progressGoalData['goals'] ?? [];

// $actionCenterView                   = 
// $viewFileData                       = array(
//     'managementActionItems'         => $managementActionItems,
//     'targetUsers'                   => $targetUsers,
//     'totalActiveUsers'              => $totalActiveUsers,
//     'totalActivePartners'           => $totalActivePartners,
//     'totalActiveCampaigns'          => $totalActiveCampaigns,
//     'getTasksByDepartment'          => $getTasksByDepartment,
//     'totalDepartmentTasks'          => $totalDepartmentTasks,
//     'totalPageSEOTasks'             => $totalPageSEOTasks,
//     'totalTransFees'                => $totalTransFees,
//     'totalLastTransFees'            => $totalLastTransFees,
//     'department'                    => $department,
//     'usersPercentage'               => $usersPercentage,
//     'getActiveCampaigns'            => $getActiveCampaigns,
//     'totalApprovedAssets'           => $totalApprovedAssets,
//     'totalPendingAssets'            => $totalPendingAssets,
//     'userGoals'                     => $userGoals,
// );
$subViewData = [ 
    'pageURID' => $pageURIB,
    'department' => $department,
    'getActiveCampaigns' => $getActiveCampaigns,
    'newsUpdates' => $newsUpdates,
    'getBlogPosts' => $getBlogPosts,
];
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management <?php //echo '- ' . ucfirst($pageURIB) ?? ''; ?></h1>
                        <a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>                           
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Action Center -->
                    <div class="col-lg-4">
                        <?php echo view('ManagementModule\Marketing\Promote\\' . $pageURID .  '\action_center', $subViewData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <div class="col-lg-8">
                        <?php echo view('ManagementModule\Marketing\Promote\\' . $pageURID . '\monthly_overview', $subViewData); ?>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <div class="col-12">
                        <?php echo view('ManagementModule\Marketing\Campaigns\Listing-Table', $subViewData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-12">
                        <?php echo view('ManagementModule\Marketing\News\Listing-Table', $subViewData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-6">
                        <?php echo view('ManagementModule\Marketing\Blog\Listing-Table', $subViewData); ?>
                    </div>
                    <div class="col-6">
                        <?php echo view('ManagementModule\Marketing\User\MyMIGold-Tasks', $subViewData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>