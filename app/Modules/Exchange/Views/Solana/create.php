<?php
$current_year = date('Y');
$thisMonth = strtotime(date("m/1/Y"));
$sixMonthsAgo = date($thisMonth, strtotime("-6 months"));
$sixMonthsAhead = date($thisMonth, strtotime("-6 months"));
$last_year = date('Y') - 1;
$next_year = date('Y') + 1;
$current_date = date('m/d/Y');
$last_year_date = date('m/d' . $last_year);
$next_year_date = date('m/d' . $next_year);
$end_of_year = date('m/d/Y', strtotime('12/31'));
$daysLeft = date('dd', strtotime($end_of_year)) - date('dd', strtotime($current_date));
$weeksLeft = date('W', strtotime($end_of_year)) - date('W', strtotime($current_date));
$monthsLeft = date('m', strtotime($end_of_year)) - date('m', strtotime($current_date));

$cuSolanaWallet = NULL; 
$cuSolanaTotal = 0; 
$cuSolanaValue = 0; 
$cuSolanaPercentage = 0; 
$solanaCurrentPrice = 0; 
$solanaMTDPL = 0; 
$solanaDailyPL = 0; 
$solanaHourlyPL = 0; 
$solanaMarketCap = 0; 
$solanaDailyVolume = 0; 
$solanaHourlyVolume = 0; 
$cuSolanaAssets = []; 
$cuSolanaTopPerformers = []; 
$cuSolanaNotification = []; 
$solanaNetworkStatus = 'N/A'; 
$solanaTransSpeed = 'N/A'; 
$solanaNetworkThroughput = 'N/A'; 
$allViewData = array(
    'beta' => $siteSettings->beta,
    'investmentOperations' => $siteSettings->investmentOperations,
    'cuID' => $cuID,
    'cuEmail' => $cuEmail,
    'cuUsername' => $cuUsername,
    'cuDisplayName' => $cuDisplayName,
    'cuFirstName' => $cuFirstName,
    'cuMiddleName' => $cuMiddleName,
    'cuLastName' => $cuLastName,
    'cuNameSuffix' => $cuNameSuffix,
    'cuDOB' => $cuDOB,
    'cuSSN' => $cuSSN,
    'cuPhone' => $cuPhone,
    'cuAddress' => $cuAddress,
    'cuCity' => $cuCity,
    'cuState' => $cuState,
    'cuCountry' => $cuCountry,
    'cuZipCode' => $cuZipCode,
    'cuMailingAddress' => $cuMailingAddress,
    'cuEmployment' => $cuEmployment,
    'cuOccupation' => $cuOccupation,
    'cuSalary' => $cuSalary,
    'cuProofIdentity' => $cuProofIdentity,
    'cuProofAddress' => $cuProofAddress,
    'cuPublicKey' => $cuPublicKey,
    'cuPrivateKey' => $cuPrivateKey,
    'cuPFBT' => $cuPFBT,
    'userAgent' => $userAgent,
    'userDashboard' => $userDashboard,
);
?>
<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width:768px) {
    #userBudgetingDatatable_filter {
        padding-top: 1rem;
        text-align: left;
    }
}
.nk-order-ovwg-data.income { border-color: #8ff0d6; }
.nk-order-ovwg-data.expenses { border-color: #e85347; }
.nk-order-ovwg-data.surplus { border-color: #84b8ff; }
.nk-order-ovwg-data.investments { border-color: #f4bd0e; }
.nk-order-ovwg-data .amount { font-size: 1.25rem; font-weight: 700; }
</style>
<div class="nk-block-head nk-block-head-sm pt-xl-5">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Exchange - Solana Dashboard</h3>
            <div class="nk-block-des text-soft">
                <p>Welcome to the Solana Blockchain Dashboard of MyMI Wallet.</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#connectWalletModal"><em class="icon ni ni-plus"></em><span>Connect Wallet</span></a></li>
                        <li class="nk-block-tools-opt">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-user-add-fill"></em><span>Add User</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-coin-alt-fill"></em><span>Add Order</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-note-add-fill-c"></em><span>Add Page</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- .toggle-expand-content -->
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">My Solana</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Deposited"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"> <?php echo $cuSolanaTotal; ?> <span class="currency currency-usd">SOL</span>
                        </span>
                        <!-- <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span> -->
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">Total Value</div>
                                <div class="amount"><?php echo $cuSolanaValue; ?> <span class="currency currency-usd">USD</span></div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">24-Hr P/L</div>
                                <?php if ($cuSolanaPercentage >= 0) : ?>
                                <div class="amount"><?php echo $cuSolanaPercentage; ?> <span class="currency currency-usd">%</span></div>
                                <?php elseif ($cuSolanaPercentage < 0) : ?>
                                <div class="amount"><?php echo $cuSolanaPercentage; ?> <span class="currency currency-usd">%</span></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="invest-data-ck">
                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Current SOL Value</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Withdraw"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"> <?php echo $solanaCurrentPrice; ?> <span class="currency currency-usd">USD</span>
                        </span>
                        <?php if ($solanaMTDPL >= 0) : ?>
                        <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em><?php echo $solanaMTDPL; ?></span>
                        <?php elseif ($solanaMTDPL < 0) : ?>
                        <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em><?php echo $solanaMTDPL; ?> MTD</span>
                        <?php endif; ?>
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">Daily P/L</div>
                                <?php if ($solanaDailyPL >= 0) : ?>
                                <div class="amount"><?php echo $solanaDailyPL; ?> <span class="currency currency-usd">%</span></div>
                                <?php elseif ($solanaDailyPL < 0) : ?>
                                <div class="amount"><?php echo $solanaDailyPL; ?> <span class="currency currency-usd">%</span></div>
                                <?php endif; ?>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">1-Hr P/L</div>
                                <?php if ($solanaHourlyPL >= 0) : ?>
                                <div class="amount"><?php echo $solanaHourlyPL; ?> <span class="currency currency-usd">%</span></div>
                                <?php elseif ($solanaHourlyPL < 0) : ?>
                                <div class="amount"><?php echo $solanaHourlyPL; ?> <span class="currency currency-usd">%</span></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="invest-data-ck">
                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4">
            <div class="card card-bordered  card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Solana Market Cap</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Balance in Account"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount"> <?php echo $solanaMarketCap; ?> <span class="currency currency-usd">USD</span>
                        </span>
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">24-Hr Vol.</div>
                                <div class="amount"><?php echo $solanaDailyVolume; ?> <span class="currency currency-usd">USD</span></div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">1-Hr Vol.</div>
                                <div class="amount"><?php echo $solanaHourlyVolume; ?> <span class="currency currency-usd">USD</span></div>
                            </div>
                        </div>
                        <div class="invest-data-ck">
                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Top Solana Assets</h6>
                            <p>View your Top Solana Assets.</p>
                        </div>
                        <div class="card-tools">
                            <ul class="card-tools-nav">
                                <li><a href="#"><span>Cancel</span></a></li>
                                <li class="active"><a href="#"><span>All</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nk-activity">
                    <?php foreach ($cuSolanaAssets as $solanaAsset) { ?>
                    <li class="nk-activity-item">
                        <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                        <div class="nk-activity-data">
                            <div class="label">Keith Jensen requested to Widthdrawl.</div>
                            <span class="time">2 hours ago</span>
                        </div>
                    </li>
                    <?php }; ?>
                </ul>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-xl-12 col-xxl-8">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Top Performing Solana Assets</h6>
                            <p>View the Top Solana Assets.</p>
                        </div>
                        <div class="card-tools">
                            <a href="#" class="link">View All</a>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-list">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Plan</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Who</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                        <div class="nk-tb-col"><span>Amount</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>&nbsp;</span></div>
                        <div class="nk-tb-col"><span>&nbsp;</span></div>
                    </div>
                    <?php foreach ($cuSolanaTopPerformers as $solanaTP) { ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="align-center">
                                <div class="user-avatar user-avatar-sm bg-light">
                                    <span>P1</span>
                                </div>
                                <span class="tb-sub ms-2">Silver <span class="d-none d-md-inline">- Daily 4.76% for 21 Days</span></span>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-xs bg-pink-dim">
                                    <span>JC</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Janice Carroll</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub">18/10/2019</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="progress progress-sm w-80px">
                                <div class="progress-bar" data-progress="75"></div>
                            </div>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Notifications</h6>
                            <p>Your Recent Activity on Solana's Blockchain.</p>
                        </div>
                        <div class="card-tools">
                            <a href="#" class="link">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <div class="timeline">
                        <h6 class="timeline-head"><?php echo date("D - F jS, Y"); ?></h6>
                        <ul class="timeline-list">
                            <?php foreach ($cuSolanaNotification as $notification) { ?>
                            <li class="timeline-item">
                                <div class="timeline-status bg-primary is-outline"></div>
                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                <div class="timeline-data">
                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                    <div class="timeline-des">
                                        <p>Re-submitted KYC Application form.</p>
                                        <span class="time">09:30am</span>
                                    </div>
                                </div>
                            </li>
                            <?php }; ?> 
                        </ul>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom d-flex flex-column h-100">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Create on Solana</h6>
                            <p>Create and Manage Your World in Solana!</p>
                        </div>
                        <div class="card-tools mt-n4 me-n1">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>15 Days</span></a></li>
                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                        <li><a href="#"><span>3 Months</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-list gy-3">
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Solana Wallet</div>
                                <?php if (!empty($cuSolanaWallet)) : ?>
                                <div class="progress-amount"><?php echo $cuSolanaWallet; ?></div>
                                <?php else : ?>
                                <div class="progress-amount"><a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#connectWalletModal" href="#"><em class="icon ni ni-plus"></em> Connect</a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Transactions</div>
                                <?php if (!empty($cuSolanaWallet)) : ?>
                                <div class="progress-amount"><a class="btn btn-primary" href="#"><em class="icon ni ni-history"></em> Orders</a></div>
                                <?php else : ?>
                                <div class="progress-amount"><a class="btn btn-secondary disabled" href="#"><em class="icon ni ni-spark-off"></em> Orders</a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Swap Assets</div>
                                <?php if (!empty($cuSolanaWallet)) : ?>
                                <div class="progress-amount"><a class="btn btn-primary" href="#"><em class="icon ni ni-swap"></em> Swap </a></div>
                                <?php else : ?>
                                <div class="progress-amount"><a class="btn btn-secondary disabled" href="#"><em class="icon ni ni-spark-off"></em> Swap </a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Buy Solana</div>
                                <?php if (!empty($cuSolanaWallet)) : ?>
                                <div class="progress-amount"><a class="btn btn-primary" href="#"><em class="icon ni ni-plus"></em> Buy </a></div>
                                <?php else : ?>
                                <div class="progress-amount"><a class="btn btn-secondary disabled" href="#"><em class="icon ni ni-spark-off"></em> Buy </a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Sell Solana</div>
                                <?php if (!empty($cuSolanaWallet)) : ?>
                                <div class="progress-amount"><a class="btn btn-primary" href="#"><em class="icon ni ni-minus"></em> Sell</a></div>
                                <?php else : ?>
                                <div class="progress-amount"><a class="btn btn-secondary disabled" href="#"><em class="icon ni  ni-spark-off"></em> Sell</a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="invest-top-ck mt-auto">
                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group mb-1">
                        <div class="card-title">
                            <h6 class="title">Solana - Network Performance</h6>
                            <p>Solana Network and Performance Analytics Overview.</p>
                        </div>
                    </div>
                    <!-- <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#thisyear">This Year</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#alltime">All Time</a>
                        </li>
                    </ul> -->
                    <div class="tab-content mt-0">
                        <div class="tab-pane active" id="overview">
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Network Status</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount"><?php echo $solanaNetworkStatus; ?> <span class="currency currency-usd"></span></div>
                                        <div class="title"></div>
                                    </div>
                                    <!-- <div class="invest-ov-stats">
                                        <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Transaction Speed</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount"><?php echo $solanaTransSpeed; ?> <span class="currency currency-usd"></span></div>
                                        <div class="title"></div>
                                    </div>
                                    <!-- <div class="invest-ov-stats">
                                        <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Network Throughput</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount"><?php echo $solanaNetworkThroughput; ?> <span class="currency currency-usd"></span></div>
                                        <div class="title"></div>
                                    </div>
                                    <!-- <div class="invest-ov-stats">
                                        <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="thisyear">
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Currently Actived Investment</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">89,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Amount</div>
                                    </div>
                                    <div class="invest-ov-stats">
                                        <div><span class="amount">96</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div>
                                </div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">99,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Paid Profit</div>
                                    </div>
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Investment in this Month</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Amount</div>
                                    </div>
                                    <div class="invest-ov-stats">
                                        <div><span class="amount">83</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="alltime">
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Currently Actived Investment</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Amount</div>
                                    </div>
                                    <div class="invest-ov-stats">
                                        <div><span class="amount">556</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div>
                                </div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Paid Profit</div>
                                    </div>
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Investment in this Month</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                        <div class="title">Amount</div>
                                    </div>
                                    <div class="invest-ov-stats">
                                        <div><span class="amount">223</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                        <div class="title">Plans</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
    </div>
</div>
<div class="card card-bordered h-100">
    <div class="card-inner px-2 px-lg-4">
        <div class="nk-order-ovwg">
            <div class="align-end g-4 row">
                <div class="col-12">
                    <div class="mb-3 align-start card-title-group">
                        <div class="card-title">
                            <h6 class="title">Solana Blockchain Dashboard - MyMI Wallet</h6>
                            <p class="">Welcome to the Solana Blockchain Dashboard of MyMI Wallet. Below are quick links and short descriptions for each available service. Click on a link to proceed.</p>
                        </div>
                        <div class="d-flex justify-content-md-end card-tools flex-column flex-md-row mt-3 mt-md-0 w-100">
                            <h6 class="d-block d-md-none text-center title">Monthly Financial Overview</h6>
                            <p class="d-block d-md-none text-center mb-3">Last 12 Months of Total Monthly Financial Growth.</p>
                            <div class="d-flex justify-content-md-end flex-wrap justify-content-center">
                                <div class="mb-2 me-2 dropdown">
                                    <a class="btn btn-sm btn-success dropdown-toggle mb-2 me-2 text-white" href="#" aria-expanded="false" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-plus"></em> <span>Connect Wallet</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end mt-1">
                                        <ul class="link-check link-list-opt no-bdr">
                                            <li><span>Choose A Wallet</span></li>
                                            <li class="p-1"><a class="" href="<?= base_url('/Exchange/Solana/Wallet/New') ?>"><em class="icon ni ni-plus"></em> New Wallet</a></li>
                                            <li class="divider"></li>
                                            <li class="p-1"><a class="" href="<?= base_url('/Exchange/Solana/Wallet/MetaMask') ?>">MetaMask</a></li>
                                            <li class="p-1"><a class="" href="<?= base_url('/Exchange/Solana/Wallet/Phantom') ?>">Phantom</a></li>
                                            <li class="p-1"><a class="" href="<?= base_url('/Exchange/Solana/Wallet/Solflare') ?>">Solflare</a></li>
                                            <li class="p-1"><a class="" href="<?= base_url('/Exchange/Solana/Wallet/TrustWallet') ?>">Trust Wallet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-end g-4 row pt-xl-3">
                        <div class="col-12 col-md-6 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Create Solana Wallet</h3>
                                    <p class="card-description">Generate a new Solana wallet and attach it to your MyMI Wallet account.</p>
                                    <a class="btn btn-primary card-link" href="<?= base_url('Exchange/Solana/Wallet/Create') ?>">Create Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Import Existing Solana Wallet</h3>
                                    <p class="card-description">Import an existing Solana wallet by storing its public key in the MyMI Wallet system.</p>
                                    <a class="btn btn-primary card-link" href="<?= base_url('Exchange/Solana/Wallet/Import') ?>">Import Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Verify Wallet Ownership</h3>
                                    <p class="card-description">Verify ownership of a Solana wallet using a signature verification method.</p>
                                    <a class="btn btn-primary card-link" href="<?= base_url('Exchange/Solana/Wallet/Verify-Ownership') ?>">Verify Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Execute Coin Swap</h3>
                                    <p class="card-description">Perform a coin swap between two cryptocurrencies using the Solana blockchain.</p>
                                    <a class="btn btn-primary card-link" href="<?= base_url('Exchange/Solana/Wallet/Execute-Swap') ?>">Execute Swap</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-end g-4 row pt-xl-3">
                        <div class="col-12 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Connected Wallets</h3>
                                    <p class="card-description">View and manage all connected Solana wallets.</p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Wallet Type</th>
                                                <th scope="col">Public Key</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($userWallets as $wallet): ?>
                                                <tr>
                                                    <td><?php // echo $wallet['wallet_type'] ?></td>
                                                    <td><?php // echo $wallet['public_token'] ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="<?php // echo base_url('Exchange/Solana/Wallet/ViewAssets?public_key=' . $wallet['public_token']) ?>">View Assets</a>
                                                        <a class="btn btn-sm btn-warning" href="<?php // echo base_url('Exchange/Solana/Wallet/Disconnect?wallet_id=' . $wallet['id']) ?>">Disconnect</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
