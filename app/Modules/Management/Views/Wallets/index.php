<?php
$pageURIB                           = $uri->getSegment(2); 
// $reporting                          = $this->getMyMIAnalytics()->reporting(); 
$getPendingUsers                    = $reporting['getPendingUsers'];
$totalPendingUsers                  = $reporting['totalPendingUsers']; 
$getActiveUsers                     = $reporting['getActiveUsers']; 
$totalActiveUsers                   = $reporting['totalActiveUsers']; 
$getPendingPartners                 = $reporting['getPendingPartners']; 
$totalPendingPartners               = $reporting['totalPendingPartners']; 
$getActivePartners                  = $reporting['getActivePartners']; 
$totalActivePartners                = $reporting['totalActivePartners']; 
$getPendingSupport                  = $reporting['getPendingSupport']; 
$totalPendingSupport                = $reporting['totalPendingSupport']; 
$getCompleteSupport                 = $reporting['getCompleteSupport']; 
$totalCompleteSupport               = $reporting['totalCompleteSupport']; 

$getTotalActiveWallets              = $reporting['getTotalActiveWallets'];
$totalWalletsCreated                = $reporting['totalWalletsCreated'];
$totalDefaultWalletsCreated         = $reporting['totalDefaultWalletsCreated'];
$getTotalWalletTransactions         = $reporting['getTotalWalletTransactions'];
$getTotalWalletTransactions         = $reporting['getTotalWalletTransactions'];
// $totalWalletTransactions            = $reporting['totalWalletTransactions'];
// $averageWalletTransactions          = $reporting['averageWalletTransactions'];
$totalWalletTransactions            = 0;
$averageWalletTransactions          = 0;
$averageWalletTransactions          = 0;
$averageWalletPerUser               = 0;
$viewFileData                       = array(
    'pageURIB'                      => $pageURIB,
    'getTotalActiveWallets'         => $getTotalActiveWallets,
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
                                                        <li><a href="<?php echo site_url('/Management/Wallets/Generate-Wallets'); ?>"><em class="icon ni ni-wallet"></em><span>Generate Wallets</span></a></li>
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
                                            <div class="title">Wallet Activity Report</div>
                                            <p><strong><?php echo $totalActiveUsers ; ?> Total Users</strong> hosting <strong><?php echo $totalWalletsCreated ; ?> Total Wallets</strong>.</p>
                                        </div>
                                        <a href="<?php echo site_url('/Management/Assets'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-wallet-fill"></em>
                                            <div class="title">Transactions Activity Report</div>
                                            <p>We have reached <strong><?php echo $totalWalletTransactions; ?> Active Transactions</strong>, with an Average <strong><?php echo $averageWalletTransactions; ?> Per Wallet</strong></p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-help-fill"></em>
                                            <div class="title">Reconcile Wallets</div>
                                            <p>There is <strong><?php echo $totalPendingSupport; ?></strong> support messages and <strong><?php echo $totalCompleteSupport; ?></strong> completed request. </p>
                                        </div>
                                        <a href="<?= site_url('Management/Wallets/Reconcile') ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-help-fill"></em>
                                            <div class="title">Support Messages</div>
                                            <p>There is <strong><?php echo $totalPendingSupport; ?></strong> support messages and <strong><?php echo $totalCompleteSupport; ?></strong> completed request. </p>
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
                                                        <div class="amount"><?php echo $totalWalletsCreated; ?> <small class="currenct currency-usd">Active Wallets</small></div>
                                                        <div class="info">Transactions: <strong><?php echo $averageWalletTransactions; ?></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-down-left"></em> Wallets/Transactions</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data sell">
                                                        <div class="amount"><?php echo $totalActiveUsers ?> <small class="currenct currency-usd">Active Users</small></div>
                                                        <div class="info">Per User: <strong><?php echo $averageWalletPerUser ?> <span class="currenct currency-usd">Avg. Wallets</span></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-up-left"></em> Users/Avg Wallets</div>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Active Wallets</h6>
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
                                    <?php echo view('ManagementModule\Views\Wallets\Listing-Table', $viewFileData); ?>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
