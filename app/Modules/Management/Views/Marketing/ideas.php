<?php
// Management Configurations
$managementActionItems                 = $siteSettings->managementActionItems; 
$today                                 = $siteSettings->today; 
$month                                 = $siteSettings->month; 
$day                                   = $siteSettings->day;
$year                                  = $siteSettings->year; 
$last_month                            = strtotime($month . ' - 1 month');

// Marketing Dashboard Config
$department                            = $uri->getSegment(2);
// Active Users
$totalActiveUsers                      = $reporting['totalActiveUsers']; 
$totalActivePartners                   = $reporting['totalActivePartners']; 
// Approved
$getApprovedAssets                     = $reporting['getApprovedAssets']; 
$totalTransFees                        = $reporting['totalTransFees'];
$marketingUsersGained                  = 0;
$marketingImpressions                  = 0;
// !!! FIX ENDS HERE
// print_r($getActiveCampaigns);
$viewFileData                          = array(
    'getApprovedAssets'                => $getApprovedAssets,
    'getActiveIdeas'                   => $getActiveIdeas,
    'totalActivePartners'              => $totalActivePartners,
    'totalActiveUsers'                 => $totalActiveUsers,
    'totalTransFees'                   => $totalTransFees,
    'marketingUsersGained'             => $marketingUsersGained,
    'marketingImpressions'             => $marketingImpressions,
);
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - <?= $department; ?></h1>
                        <a href="<?= site_url('/Management/Marketing'); ?>">Back to Marketing Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Action Center -->
                    <div class="col-12 col-md-4 col-xxl-4">
                        <?= view('ManagementModule\Views\Marketing\index\action_center', $viewFileData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <div class="col-12 col-md-8 col-xxl-8">
                        <?= view('ManagementModule\Views\Marketing\Ideas\monthly_overview', $viewFileData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Campaigns Table -->
                    <div class="col-12">
                        <?= view('ManagementModule\Views\Marketing\Ideas\Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

