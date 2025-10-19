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
// print_r($_SESSION['allSessionData']); 
// echo '<br><br>'; 
if ($siteSettings->debug === 1) {
// log_message('debug', print_r($reporting, true)); 
}
// print_r($reporting, true); 
// Get Approved Reports
$getApprovedAssets                  = $reporting['getApprovedAssets']; 
$totalApprovedAssets                = $reporting['totalApprovedAssets']; 
$getPendingSupport                  = $reporting['getPendingSupport'];
$totalPendingSupport                = $reporting['totalPendingSupport']; 
$totalPendingUsers                  = $reporting['totalPendingUsers'];
$totalPendingPartners               = $reporting['totalPendingPartners'];
// Get Pending Reports 
$getPendingAssets                   = $reporting['getPendingAssets']; 
$totalPendingAssets                 = $reporting['totalPendingAssets']; 
$getCompleteSupport                 = $reporting['getCompleteSupport'];
$totalCompleteSupport               = $reporting['totalCompleteSupport'];
// Get Percentage Reports
$assetPercentage                    = $reporting['assetPercentage'];
$transactionPercentage              = $reporting['transactionPercentage'];
$tradesPercentage                   = $reporting['tradesPercentage'];
$partnerPercentage                  = $reporting['partnerPercentage'];
$usersPercentage                    = $reporting['usersPercentage'];
$walletsPercentage                  = $reporting['walletsPercentage'];
// $transAmountPercentage              = $reporting['transAmountPercentage'];
// $transFeesPercentage                = $reporting['transFeesPercentage'];
// Get Targets
$targetAssets                       = $reporting['targetAssets'];
$targetTransactions                 = $reporting['targetTransactions'];
$targetTransAmount                  = $reporting['targetTransAmount'];
$targetTransFees                    = $reporting['targetTransFees'];
$targetTrades                       = $reporting['targetTrades'];
$targetWallets                      = $reporting['targetWallets'];
$targetUsers                        = $reporting['targetUsers'];
$targetPartners                     = $reporting['targetPartners'];
// Get Totals Reports
$getTotalTrans                      = $reporting['getTotalTrans'];
$totalTransactions                  = $reporting['totalTransactions'];
$getTotalAmounts                    = $reporting['getTotalAmounts'];
$totalTransFees                     = $reporting['totalTransFees'];
$totalTransFeesPlain                = $reporting['totalTransFeesPlain'];
$totalTransTotalsPlain              = $reporting['totalTransTotalsPlain'];
$totalTransTotals                   = $reporting['totalTransTotals'];
$getLastTotalAmounts                = $reporting['getLastTotalAmounts'];
$totalLastTransFees                 = $reporting['totalLastTransFees'];
$totalLastTransTotals               = $reporting['totalLastTransTotals'];
$totalTradesTracked                 = $reporting['totalTradesTracked'];
$totalWalletsCreated                = $reporting['totalWalletsCreated']; 
$totalActiveUsers                   = $reporting['totalActiveUsers'];
$totalActivePartners                = $reporting['totalActivePartners'];

$pendingTradeAlerts                 = 0;
$pendingTradeAlertsCount            = 0; // Placeholder count for pending alerts
$resolvedAlertsCount                = 3; // Placeholder count for resolved alerts
$totalAlertsCount                   = $pendingTradeAlertsCount + $resolvedAlertsCount;
$timeToResolve                      = "3 hrs 30 mins"; // Example of average resolution time
$alertTrends                        = [10, 20, 15, 5, 25, 30, 20]; // Placeholder data for alert trends
$alertsBySource                     = ['User' => 15, 'System' => 20]; // Example data for alert sources
// Get User Activity
// $userActivity                       = $reporting['userActivity'];
?>
<div class="nk-block">
	<div class="row gy-gs">
		<div class="col-lg-12 col-xl-12">			
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Alert Management</h1>
                        <a href="<?php echo site_url('/Trade-Tracker'); ?>">Back to Dashboard</a>						
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <!-- Action Center Card -->
                    <div class="col-lg-4">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Action Center</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-account-setting"></em>
                                            <div class="title">Alert Settings</div>
                                            <p>Configure & Manage your <strong>MyMI Alert Configuration Settings</strong>.</p>
                                        </div>
                                        <a href="<?php echo site_url('/Management/Alerts/Settings'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-help-fill"></em>
                                            <div class="title">Support Messages</div>
                                            <p>There are <strong><?php echo $totalPendingSupport; ?></strong> pending support messages and <strong><?php echo $totalCompleteSupport; ?></strong> completed requests. </p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-wallet-fill"></em>
                                            <div class="title">Pending Alerts</div>
                                            <p>We have <strong><?php echo $pendingTradeAlertsCount; ?> Pending Alerts</strong> awaiting review and resolution.</p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <!-- Alert Analytics Card -->
                    <div class="col-lg-8">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Alert Analytics Overview</h6>
                                        <p>Performance metrics on alert handling and resolution.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>Last 15 Days</span></a></li>
                                                    <li><a href="#"><span>Last 30 Days</span></a></li>
                                                    <li><a href="#"><span>Last 3 Months</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-title-group -->

                                <div class="nk-order-ovwg">
                                    <div class="row g-4 align-end">
                                        <div class="col-xxl-8">
                                            <div class="nk-order-ovwg-ck">
                                                <canvas class="order-overview-chart" id="orderOverview"></canvas>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-xxl-4">
                                            <div class="row g-4">
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data buy">
                                                        <div class="amount"><?php echo $pendingTradeAlertsCount; ?></div>
                                                        <div class="info">Pending Alerts: <strong><?php echo $pendingTradeAlertsCount; ?></strong></div>
                                                        <div class="title"><em class="icon ni ni-alert-circle"></em> Total Pending Alerts</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data sell">
                                                        <div class="amount"><?php echo $resolvedAlertsCount; ?></div>
                                                        <div class="info">Resolved Alerts: <strong><?php echo $resolvedAlertsCount; ?></strong></div>
                                                        <div class="title"><em class="icon ni ni-check-circle"></em> Total Resolved Alerts</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div>
                                </div><!-- .nk-order-ovwg -->
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div>
                </div><!-- .row -->
            </div><!-- .nk-block -->
            <div class="nk-block">
                <div class="row">
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Alerts Overview</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-alert-circle"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo $pendingTradeAlertsCount; ?> / <?php echo $totalAlertsCount; ?> Alerts Pending</small>
                                                <br>
                                                <small class="fs-14px">Pending Alerts</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block"><i class="icon ni ni-eye mr-1"></i> Review Alerts</a>
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
                                            <h6 class="title">Alert Trends</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-chart"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo implode(', ', $alertTrends); ?></small>
                                                <br>
                                                <small class="fs-14px">Recent Trends</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> View Trends</a>
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
                                            <h6 class="title">Alert Sources</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-notify"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo implode(', ', array_keys($alertsBySource)); ?></small>
                                                <br>
                                                <small class="fs-14px">Sources: <?php echo implode(', ', array_values($alertsBySource)); ?></small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Explore Sources</a>
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
                                            <h6 class="title">Create Alert</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-notify"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo implode(', ', array_keys($alertsBySource)); ?></small>
                                                <br>
                                                <small class="fs-14px">Sources: <?php echo implode(', ', array_values($alertsBySource)); ?></small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="createAlertModel"><i class="fa fa-eye"></i> Explore Sources</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php // Alert Performance ?>
                    <div class="<?php echo $managementActionItems; ?>">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Resolution Time</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="d-flex pb-md-4">
                                        <div class="align-self-center pr-2">
                                            <i class="icon icon-md ni ni-clock"></i>
                                        </div>
                                        <div class="align-self-center text-end">
                                            <h6>
                                                <small class="fs-14px"><?php echo $timeToResolve; ?></small>
                                                <br>
                                                <small class="fs-14px">Average Resolution Time</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block"><i class="icon ni ni-eye mr-1"></i> View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <a href="<?php echo site_url('Management/Alerts/Create'); ?>" class="project-title">
                                            <div class="user-avatar sq bg-purple"><span>CA</span></div>
                                            <div class="project-info">
                                                <h6 class="title">Create Alert</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Quickly set up new alerts for the monitoring system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <a href="<?php echo site_url('Management/Alerts/Review'); ?>" class="project-title">
                                            <div class="user-avatar sq bg-info"><span>RA</span></div>
                                            <div class="project-info">
                                                <h6 class="title">Review Alerts</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Alerts</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Alerts</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Manage and review all pending and active alerts in the system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <a href="<?php echo site_url('Management/Alerts/Reports'); ?>" class="project-title">
                                            <div class="user-avatar sq bg-warning"><span>AR</span></div>
                                            <div class="project-info">
                                                <h6 class="title">Alert Reports</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Reports</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Reports</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Analyze and interpret data from the alerts generated in the system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <a href="html/apps-kanban.html" class="project-title">
                                            <div class="user-avatar sq bg-info"><span>ME</span></div>
                                            <div class="project-info">
                                                <h6 class="title">MyMI Pending Trade Alerts</h6>                                                
                                                <?php
                                                print_r($pendingTradeAlerts, true);
                                                ?>
                                                <!-- <span class="sub-text">Techyspec</span> -->
                                            </div>
                                        </a>
                                        <!-- <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="project-details">
                                        <table class="table display" id="userActivityLoggerDatatable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Ticker</th>
                                                    <th>Market Price</th>
                                                    <th>Details</th>
                                                    <th>TV Chart</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="project-progress">
                                        <div class="project-progress-details">
                                            <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>2 Tasks</span></div>
                                            <div class="project-progress-percent">52.5%</div>
                                        </div>
                                        <div class="progress progress-pill progress-md bg-light">
                                            <div class="progress-bar" data-progress="52.5"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="project-meta">
                                        <ul class="project-users g-1">
                                            <li>
                                                <div class="user-avatar sm bg-primary"><img src="./images/avatar/a-sm.jpg" alt=""></div>
                                            </li>
                                        </ul>
                                        <span class="badge badge-dim bg-danger"><em class="icon ni ni-clock"></em><span>Due Tomorrow</span></span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#userActivityLoggerDatatable').DataTable({
            "order": [[ 0, "desc" ]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>