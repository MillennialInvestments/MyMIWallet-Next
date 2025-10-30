<?php
// Management Configurations
$managementActionItems              = $siteSettings->managementActionItems; 
$today                              = $siteSettings->today; 
$month                              = $siteSettings->month; 
$day                                = $siteSettings->day;
$year                               = $siteSettings->year; 
$last_month                         = strtotime($month . ' - 1 month');
$pageURIB                           = $uri->getSegment(2);
$department                         = $pageURIB;

// Active Users
$totalActiveUsers                   = $reporting['totalActiveUsers']; 
$totalActivePartners                = $reporting['totalActivePartners']; 

// Active Services 
$totalActiveServices                = $reporting['totalActiveServices'];
$totalActiveSubscriptions           = $reporting['totalActiveSubscriptions']; 

// Approved
$getApprovedAssets                  = $reporting['getApprovedAssets']; 
$totalApprovedAssets                = $reporting['totalApprovedAssets']; 

// Pending
$getPendingAssets                   = $reporting['getPendingAssets'];
$totalPendingAssets                 = $reporting['totalPendingAssets'];
$getPendingSupport                  = $reporting['getPendingSupport']; 
$totalPendingSupport                = $reporting['totalPendingSupport']; 

// Totals
$totalTransactions                  = $reporting['totalTransactions']; 
$totalTransTotals                   = $reporting['totalTransTotals'];
$totalTransTotalsPlain              = $reporting['totalTransTotalsPlain'];
$totalTransFees                     = $reporting['totalTransFees'];
$totalTransFeesPlain                = $reporting['totalTransFeesPlain'];
$totalLastTransTotals               = $reporting['totalLastTransTotals'];
$totalLastTransFees                 = $reporting['totalLastTransFees'];
$totalCompleteSupport               = $reporting['totalCompleteSupport']; 
$totalWalletsCreated                = $reporting['totalWalletsCreated'];

// Percentages
$assetPercentage                    = $reporting['assetPercentage'];
$pendingAssetsPercentage            = $reporting['pendingAssetsPercentage'];
$subscriptionPercentage             = $reporting['subscriptionPercentage'];
$transactionPercentage              = $reporting['transactionPercentage']; 
$transAmountPercentage              = $reporting['transAmountPercentage']; 
$transFeesPercentage                = $reporting['transFeesPercentage'];
$partnerPercentage                  = $reporting['partnerPercentage'];
$usersPercentage                    = $reporting['usersPercentage'];
$walletsPercentage                  = $reporting['walletsPercentage'];

// Targets
$targetAssets                       = $reporting['targetAssets'];
$targetSubscriptions                = $reporting['targetSubscriptions'];
$targetTransactions                 = $reporting['targetTransactions'];
$targetTransAmount                  = $reporting['targetTransAmount'];
$targetTransFees                    = $reporting['targetTransFees']; 
$targetUsers                        = $reporting['targetUsers'];
$targetPartners                     = $reporting['targetPartners'];
$targetWallets                      = $reporting['targetWallets'];

// Marketing Analtyics
$tasks                              = array('Page SEO Edit');
// print_r($departmentPendingTasks); 
$getTasksByDepartment               = $departmentPendingTasks['getTasksByDepartment'] ?? [];
$totalDepartmentTasks               = $departmentPendingTasks['totalTasks'] ?? 0;
$totalPageSEOTasks                  = $departmentPendingTasks['totalTasksByType']['Page SEO Edit'] ?? 0; 

$getActiveCampaigns                 = $marketingDepartment['department']['getActiveCampaigns'] ?? []; 
$totalActiveCampaigns               = $marketingDepartment['department']['totalActiveCampaigns'] ?? 0; 

$viewFileData                       = array(
    'totalActiveUsers'              => $totalActiveUsers,
    'totalActivePartners'           => $totalActivePartners,
    'totalActiveServices'           => $totalActiveServices,
    'totalActiveSubscriptions'      => $totalActiveSubscriptions,
    'targetSubscriptions'           => $targetSubscriptions,
    'subscriptionPercentage'        => $subscriptionPercentage,
    'totalActiveCampaigns'          => $totalActiveCampaigns,
    'getTasksByDepartment'          => $getTasksByDepartment,
    'totalDepartmentTasks'          => $totalDepartmentTasks,
    'totalPageSEOTasks'             => $totalPageSEOTasks,
    'totalTransFees'                => $totalTransFees,
    'totalLastTransFees'            => $totalLastTransFees,
    'department'                    => $department,
    'usersPercentage'               => $usersPercentage,
    'getActiveCampaigns'            => $getActiveCampaigns,
    'getApprovedAssets'             => $getApprovedAssets,
);
?>
<div class="nk-block">
	<div class="row gy-gs">
		<div class="col-lg-12 col-xl-12">
			<div class="nk-block">
				<div class="nk-block-head-xs">
					<div class="nk-block-head-content">
						<h1 class="nk-block-title title">MyMI Management - <?php echo $pageURIB; ?></h1>
						<p id="private_key"></p>
						<p id="address"></p>
						<a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>							
					</div>
				</div>
			</div>
			<div class="nk-block">
                <div class="row">
                    <!-- Action Center -->
                    <div class="col-lg-4">
                        <?php echo view('ManagementModule\Services\index\action_center', $viewFileData); ?>
                    </div><!-- .col -->
                    <!-- Month-to-Month Overview -->
                    <div class="col-lg-8">
                        <?php echo view('ManagementModule\Services\index\monthly_overview', $viewFileData); ?>
                    </div>
                </div>
			</div>
            <div class="nk-block">
                <div class="row">
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Services</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                        <i class="icon icon-md ni ni-coins"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                        <h6>
                                            <small class="fs-14px"><?php echo number_format($totalActiveServices,0); ?></small>
                                            <br>
                                            <small class="fs-14px">Services</small>
                                        </h6>
                                        <!-- <p class="mb-0">Total Assets</p> -->
                                        </div>
                                    </div>
                                    <a href="#active-assets-overview" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Subscriptions</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-users"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo number_format($totalActiveSubscriptions,0); ?> / <?php echo $targetSubscriptions . ' (' . $subscriptionPercentage . ')'; ?></small>
                                                <br>
                                                <small class="fs-14px">Subscribers</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('/Management/Assets/Applications'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Subscribers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Wallets</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-tranx"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo number_format($totalWalletsCreated,0); ?> / <?php echo $targetWallets . ' <small class="myfs-sm">(' . $walletsPercentage . ')</small>'; ?></small>
                                                <br>
                                                <small class="fs-14px">Wallets</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#active-assets-overview" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Wallets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Assets</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-reports"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>                                                
                                                <small class="fs-14px"><?php echo $totalApprovedAssets; //number_format($totalTransTotals,0); ?> / <?php echo $targetAssets . ' (' . $assetPercentage . ')'; ?></small>
                                                <br>
                                                <small class="fs-14px">Assets</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('/Management/Assets/Transactions'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Assets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Spend</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-users"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php //echo $totalMarketingBudget; ?>$0 / $0 (0%)<?php //echo $targetMarketingBudget . ' (' . $marketingBudgetPercentage . ')'; ?></small>
                                                <br>
                                                <small class="fs-14px">Monthly Spend</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('/Management/Services/Campaigns'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Fees</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Tasks</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="<?php echo site_url('Management/Assets/Support'); ?>"><em class="icon ni ni-setting"></em><span>View Support</span></a></li>
                                                        <li><a href="<?php echo site_url('Management/Assets/Support/Requests'); ?>"><em class="icon ni ni-notify"></em><span>Pending Requests</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-wallet"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo number_format($totalDepartmentTasks,0); ?> Tasks</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('Management/Services/Support/Requests'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Tasks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row g-gs">
                    <?php //echo view('ManagementModule\Services\index\operational_tasks', $viewFileData); ?>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <?php // $echo view('ManagementModule\Services\Campaigns\Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
