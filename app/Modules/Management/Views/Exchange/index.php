<?php
$managementActionItems = $siteSettings->managementActionItems; 
$pageURIB = $uri->getSegment(2); 

// Logging for debugging
// log_message('debug', 'Management\Views\Exchange\index L5 - $exchangeAssets: ' . print_r($exchangeAssets, true)); 

// Approved
$topApprovedAssets = $exchangeAssets['approvedAssets']['getTopApprovedAssets']['topApprovedAssets']; 
$totalApprovedAssets = $exchangeAssets['approvedAssets']['getTotalAssetsCount']; 

// Pending
$getPendingAssets = $exchangeAssets['approvedAssets']['getPendingAssets'];
$totalPendingAssets = $exchangeAssets['approvedAssets']['totalPendingAssets'];
$getPendingSupport = $reporting['getPendingSupport']; 
$totalPendingSupport = $reporting['totalPendingSupport']; 

// Totals
$totalTransactions = $reporting['totalTransactions']; 
$totalTransTotals = $reporting['totalTransTotals'];
$totalTransTotalsPlain = $reporting['totalTransTotalsPlain'];
$totalTransFees = $reporting['totalTransFees'];
$totalTransFeesPlain = $reporting['totalTransFeesPlain'];
$totalLastTransTotals = $reporting['totalLastTransTotals'];
$totalLastTransFees = $reporting['totalLastTransFees'];
$totalCompleteSupport = $reporting['totalCompleteSupport']; 

// Percentages
$assetPercentage = $reporting['assetPercentage'];
$pendingAssetsPercentage = $reporting['pendingAssetsPercentage'];
$transactionPercentage = $reporting['transactionPercentage']; 
$transAmountPercentage = $reporting['transAmountPercentage']; 
$transFeesPercentage = $reporting['transFeesPercentage'];

// Targets
$targetAssets = $reporting['targetAssets'];
$targetTransactions = $reporting['targetTransactions'];
$targetTransAmount = $reporting['targetTransAmount'];
$targetTransFees = $reporting['targetTransFees']; 

// Handling $getTotalAmounts
$getTotalAmounts = $reporting['getTotalAmounts']; 
// log_message('debug', 'Management\Views\Exchange\index L35 - $getTotalAmounts: ' . print_r($getTotalAmounts, true)); 

foreach ($getTotalAmounts as $totalAmounts) {
    if (is_array($totalAmounts)) {
        if (isset($totalAmounts['fees'])) {
            if ($totalAmounts['fees'] > 0) {
                $totalTransFees = '<strong>$' . number_format($totalAmounts['fees'], 2) . '</strong>';
            } elseif ($totalAmounts['fees'] < 0) {
                $totalTransFees = '<strong class="statusRed">-$' . number_format($totalAmounts['fees'], 2) . '</strong>';
            }
        }
        if (isset($totalAmounts['amount'])) {
            if ($totalAmounts['amount'] > 0) {
                $totalTransTotals = '<strong>$' . number_format($totalAmounts['amount'], 2) . '</strong>';
            } elseif ($totalAmounts['amount'] < 0) {
                $totalTransTotals = '<strong class="statusRed">-$' . number_format($totalAmounts['amount'], 2) . '</strong>';
            }
        }
    }
}

// Data for the view
$viewFileData = array(
    'pageURIB' => $pageURIB,
    'exchangeAssets' => $exchangeAssets,
    'getApprovedAssets' => $topApprovedAssets,
);

?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="title nk-block-title">MyMI Management - <?php echo esc($pageURIB); ?></h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?php echo site_url('/Trade-Tracker'); ?>">Back to Dashboard</a>                            
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
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
                                            <em class="icon ni ni-cc-alt-fill"></em>
                                            <div class="title">Pending Asset Request</div>
                                            <p><strong><?php echo esc($totalPendingAssets); ?> Pending Assets</strong> and <strong><?php echo esc($totalApprovedAssets); ?> Asset Approvals</strong>, that need to be reviewed.</p>
                                        </div>
                                        <a href="<?php echo site_url('/Management/Assets'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-help-fill"></em>
                                            <div class="title">Support Messages</div>
                                            <p>There is <strong><?php echo esc($totalPendingSupport); ?></strong> support messages and <strong><?php echo esc($totalCompleteSupport); ?></strong> completed request.</p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-wallet-fill"></em>
                                            <div class="title">Transaction Totals</div>
                                            <p>We have reached <strong><?php echo esc($totalTransactions); ?> Total Transactions</strong>, <strong><?php echo $totalTransTotals; ?> Total Spend</strong>, and <strong><?php echo $totalTransFees; ?> Total</strong> in Transactional Fees.</p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-lg-8">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Month-to-Month Overview</h6>
                                        <p>Last 12 Months of Total Monthly Spend &amp; Total Transaction Fees.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                    <li><a href="#"><span>30 Days</span></a></li>
                                                    <li><a href="#"><span>3 Months</span></a></li>
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
                                                        <div class="amount"><?php echo $totalTransTotals; ?> <small class="currenct currency-usd">USD</small></div>
                                                        <div class="info">Last month <strong><?php echo esc($totalLastTransTotals); ?> <span class="currenct currency-usd">USD</span></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-down-left"></em> Total Monthly Spend</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data sell">
                                                        <div class="amount"><?php echo $totalTransFees; ?> <small class="currenct currency-usd">USD</small></div>
                                                        <div class="info">Last month <strong><?php echo esc($totalLastTransFees); ?> <span class="currenct currency-usd">USD</span></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-up-left"></em> Monthly Transaction Fees</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div>
                                </div><!-- .nk-order-ovwg -->
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
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
                                        <a href="<?php echo site_url('Management/Assets/Create'); ?>" class="project-title">
                                            <div class="sq user-avatar bg-purple"><span>CA</span></div>
                                            <div class="project-info">
                                                <h6 class="title">Create Asset</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger dropdown-toggle btn-sm me-n1 mt-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Design and develop the DashLite template for Envato Marketplace.</p>
                                    </div>
                                    <div class="project-progress">
                                        <div class="project-progress-details">
                                            <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>3 Tasks</span></div>
                                            <div class="project-progress-percent">93.5%</div>
                                        </div>
                                        <div class="progress progress-pill progress-md bg-light">
                                            <div class="progress-bar" data-progress="93.5"></div>
                                        </div>
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
                                        <a href="<?php echo site_url('Management/Assets/Distribute'); ?>" class="project-title">
                                            <div class="sq user-avatar bg-warning"><span>DA</span></div>
                                            <div class="project-info">
                                                <h6 class="title">Distribute Assets</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger dropdown-toggle btn-sm me-n1 mt-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Design the website for Runnergy main website including their user dashboard.</p>
                                    </div>
                                    <div class="project-progress">
                                        <div class="project-progress-details">
                                            <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>25 Tasks</span></div>
                                            <div class="project-progress-percent">23%</div>
                                        </div>
                                        <div class="progress progress-pill progress-md bg-light">
                                            <div class="progress-bar" data-progress="23"></div>
                                        </div>
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
                                        <a href="html/apps-kanban.html" class="project-title">
                                            <div class="sq user-avatar bg-info"><span>KR</span></div>
                                            <div class="project-info">
                                                <h6 class="title">MyMI Exchange</h6>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger dropdown-toggle btn-sm me-n1 mt-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>Improve SEO keyword research, A/B testing, Local market improvement.</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Active Assets</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="row">
                                                <span class="col">
                                                    <a class="link py-3" href="<?php echo site_url('Management/Assets/Create'); ?>"><i class="icon ni ni-plus-circle"></i> Add Asset</a>
                                                </span>
                                                <span class="col">
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <?php echo view('Assets/Listing-Table', $viewFileData); ?>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Daily Transaction Report</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="row">
                                                <span class="col">
                                                    <a class="link py-3" href="<?php echo site_url('Management/Assets/Create'); ?>"><i class="icon ni ni-plus-circle"></i> Add Asset</a>
                                                </span>
                                                <span class="col">
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <?php echo view('Exchange/index/Large_Transactions', $viewFileData); ?>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
