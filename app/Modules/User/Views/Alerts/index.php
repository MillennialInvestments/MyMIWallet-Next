<!-- app/Modules/User/Views/Alerts/index.php -->
<?php
// Load alert-related data
$siteSettings = $siteSettings ?? [];
$uri = $uri ?? service('uri');
$pageURIB = $uri->getSegment(2);
$alerts = $alerts ?? []; // Alerts fetched from `AlertsController.php`
$subViewData = [
    'stage' => $siteSettings->stage,
    // 'incomeYTDSummaryFMT' => $incomeYTDSummaryFMT,
    // 'expenseYTDSummaryFMT' => $expenseYTDSummaryFMT,
    // 'checkingSummaryFMT' => $checkingSummaryFMT,
    'checkingSummary' => $checkingSummary,
    // 'creditAvailableFMT' => $creditAvailableFMT,
    // 'debtSummaryFMT' => $debtSummaryFMT,
    // 'investSummaryFMT' => $investSummaryFMT,
];
// Detect Device Type
$userAgent = service('request')->getUserAgent();
$isMobile = $userAgent->isMobile(); // Detect if the user is on mobile
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="title nk-block-title">Trade Alerts</h1>
                        <a href="<?= site_url('/Trade-Tracker'); ?>">Back to Dashboard</a>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <!-- <div class="col-lg-4"><?php //echo view('UserModule\Views\Alerts\resources\control_center'); ?></div> -->
                    <!-- <div class="col-lg-8"> -->
                    <div class="col-lg-12">
                        
                    <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <div class="project-info">
                                            <h6 class="title">MyMI Trade Alerts - Dashboard</h6>
                                        </div>
                                    </div>

                                    <div class="project-details">
                                        <!-- Filters -->
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="d-flex flex-wrap gap-3 align-items-center">
                                                    <select class="form-control form-select w-auto" id="timeFilter">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="this_week">This Week</option>
                                                        <option value="last_week">Last Week</option>
                                                        <option value="this_month" selected>This Month</option>
                                                        <option value="last_month">Last Month</option>
                                                        <option value="this_year">This Year</option>
                                                        <option value="last_year">Last Year</option>
                                                    </select>
                                                    <select class="form-control form-select w-auto" id="categoryFilter">
                                                        <option value="">All Categories</option>
                                                        <option value="Active Buy Alert">Active Buy Alerts</option>
                                                        <option value="Active Sell Alert">Active Sell Alerts</option>
                                                        <option value="AI Liquidity Stock Scanner">AI Liquidity Alerts</option>
                                                        <option value="EMA Liquidity 1Hr">EMA Liquidity 1Hr</option>
                                                        <option value="EMA Liquidity 4Hr">EMA Liquidity 4Hr</option>
                                                    </select>
                                                    <?php if ($cuRole <= 3) { ?>
                                                    <button class="dynamicModalLoader btn btn-primary" data-formtype="Alerts" data-endpoint="createTradeAlert" data-accountid="">
                                                        <i class="icon ni ni-plus"></i> New Alert
                                                    </button>
                                                    <button id="fetchEmailsButton" class="btn btn-success">
                                                        <i class="icon ni ni-mail"></i> Fetch Emails / Create Alerts
                                                    </button>
                                                    <button class="btn btn-secondary" id="toggleColumnsBtn"><i class="icon ni ni-refresh"></i> Show More Columns</button>
                                                    <?php }; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Alerts Table -->
                                        <div class="card">
                                            <div class="card-inner">
                                                <h5 class="title">Confirmed Trade Alerts</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-responsive display" id="confirmedTradeAlertTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Ticker</th>
                                                                <th>Exchange</th>
                                                                <th>Category</th>
                                                                <th>Market Price</th>
                                                                <th>Entry Price</th>
                                                                <th>Δ / % Gain</th>
                                                                <th>Target (3%)</th>
                                                                <th>Profit Lock Stop</th>
                                                                <th>Trailing %</th>
                                                                <th>3/8 EMA</th>
                                                                <th>8/13 EMA</th>
                                                                <th>13/34 EMA</th>
                                                                <th>34/48 EMA</th>
                                                                <th>EMA Analysis</th>
                                                                <th>TV Chart</th>
                                                                <th>Manage</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if ($cuRole <= 3): ?>
                                        <div class="card">
                                            <div class="card-inner">
                                                <h5 class="title">Pending Trade Alerts</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-responsive display" id="pendingTradeAlertTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Ticker</th>
                                                                <th>Exchange</th>
                                                                <th>Category</th>
                                                                <th>Market Price</th>
                                                                <th>Alert Price</th>
                                                                <th>Δ / % Gain</th>
                                                                <th>Target (3%)</th>
                                                                <th>Profit Lock Stop</th>
                                                                <th>Trailing %</th>
                                                                <th>3/8 EMA</th>
                                                                <th>8/13 EMA</th>
                                                                <th>13/34 EMA</th>
                                                                <th>34/48 EMA</th>
                                                                <th>EMA Analysis</th>
                                                                <th>TV Chart</th>
                                                                <th>Manage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                    </div> <!-- End project details -->
                                </div> <!-- End project -->
                            </div> <!-- End card-inner -->
                        </div> <!-- End card -->
                    </div>
                </div>
            </div>
        </div> <!-- End col -->
    </div> <!-- End row -->
</div> <!-- End nk-block -->
<div id="inactivityOverlay" style="display: none; position: fixed; top: 0; left: 0;
    width: 100%; height: 100%; background: rgba(0, 0, 0, 0.9);
    z-index: 9999; color: #fff; text-align: center; padding-top: 20%;">
    <h2>Are you still there?</h2>
    <p>Real-time trade alert processing is paused due to inactivity.</p>
    <p>Click below to resume automatic market data updates.</p>
    <button id="resumeProcessing" style="margin-top: 20px; padding: 10px 20px; font-size: 16px;">
        ✅ I'm Still Here
    </button>
</div>