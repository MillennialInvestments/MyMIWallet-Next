<?php
// Management Configurations
$managementActionItems = $siteSettings->managementActionItems;
$today = date("m/d/Y"); 
$month = date("n"); 
$day = date("d");
$year = date("Y"); 
$last_month = strtotime($month . ' - 1 month');
$department = $uri->getSegment(2);

// Optimize by assigning with fallback defaults
$totalApprovedAssets = (float)($reporting['totalApprovedAssets'] ?? 0);
$totalPendingAssets = (float)($reporting['totalPendingAssets'] ?? 0);
$totalPendingSupport = (float)($reporting['totalPendingSupport'] ?? 0);
$totalCompleteSupport = (float)($reporting['totalCompleteSupport'] ?? 0);
$totalTransactions = (float)($reporting['totalTransactions'] ?? 0);
$totalTransTotals = (float)($reporting['totalTransTotals'] ?? 0);
$totalTransFees = (float)($reporting['totalTransFees'] ?? 0);
$totalLastTransFees = (float)($reporting['totalLastTransFees'] ?? 0);
$totalLastTransTotals = (float)($reporting['totalLastTransTotals'] ?? 0);
$totalTradesTracked = (float)($reporting['totalTradesTracked'] ?? 0);
$totalWalletsCreated = (float)($reporting['totalWalletsCreated'] ?? 0);
$totalActiveUsers = (float)($reporting['totalActiveUsers'] ?? 0);
$totalActivePartners = (float)($reporting['totalActivePartners'] ?? 0);

$assetPercentage = $reporting['assetPercentage'] ?? '0%';
$transactionPercentage = $reporting['transactionPercentage'] ?? '0%';
$tradesPercentage = $reporting['tradesPercentage'] ?? '0%';
$partnerPercentage = $reporting['partnerPercentage'] ?? '0%';
$usersPercentage = $reporting['usersPercentage'] ?? '0%';
$walletsPercentage = $reporting['walletsPercentage'] ?? '0%';

$targetAssets = (float)($reporting['targetAssets'] ?? 0);
$targetTransactions = (float)($reporting['targetTransactions'] ?? 0);
$targetTrades = (float)($reporting['targetTrades'] ?? 0);
$targetWallets = (float)($reporting['targetWallets'] ?? 0);
$targetUsers = (float)($reporting['targetUsers'] ?? 0);
$targetPartners = (float)($reporting['targetPartners'] ?? 0);
$discordHealth = $discordHealth ?? ['queued' => 0, 'failed24h' => 0, 'dead7d' => 0, 'nextQuietResume' => null, 'channels' => []];
?>

<div class="nk-block">
    <div class="nk-block-head-xs">
        <div class="nk-block-head-content">
            <h1 class="nk-block-title title">MyMI Management</h1>
            <p id="private_key"></p>
            <p id="address"></p>
            <a href="<?php echo site_url('/Trade-Tracker'); ?>">Back to Dashboard</a>
            <button id="runNowBtn" class="btn btn-warning">Run CRON Now</button>
        </div>
    </div>

    <div class="nk-block mt-3">
        <div class="card card-bordered mb-3">
            <div class="card-inner">
                <div class="d-flex justify-content-between flex-wrap align-items-center mb-2">
                    <div>
                        <h5 class="mb-1">Saturday Stream Prep</h5>
                        <p class="mb-0 text-soft">Week starting: <strong><?= esc($streamPrep['week_start_date'] ?? 'N/A'); ?></strong></p>
                        <p class="mb-0 text-soft">Last prepared: <?= !empty($streamPrep['last_prepared']) ? esc($streamPrep['last_prepared']) : 'Not yet generated'; ?></p>
                    </div>
                    <div class="text-end">
                        <div class="small">Symbols in snapshot: <strong><?= number_format((int)($streamPrep['symbol_count'] ?? 0)); ?></strong></div>
                        <div class="small">Newsletter status: <strong><?= esc($streamPrep['newsletter_status'] ?? 'n/a'); ?></strong></div>
                    </div>
                </div>
                <div class="btn-group" role="group" aria-label="Stream prep actions">
                    <button class="btn btn-primary" id="btnGenerateStreamData">Generate Weekly Stream Data</button>
                    <a class="btn btn-outline-primary" id="btnExportStreamCSV" href="<?= site_url('/API/Management/exportWeeklyWatchlistCSV?week_start_date=' . ($streamPrep['week_start_date'] ?? '')); ?>">Export Watchlist CSV</a>
                    <button class="btn btn-success" id="btnGenerateNewsletter">Generate Newsletter Draft</button>
                </div>
            </div>
        </div>
        <?= view('App\\Modules\\Management\\Views\\ContentEngine\\index', ['contentEngine' => $contentEngine ?? []]); ?>
        <div class="row my-3">
            <!-- Example Action Card -->

            <!-- Users Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Users</h5>
                        <p><?php echo $totalActiveUsers; ?> Active<br><?php echo $usersPercentage; ?> of Goal</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageUsersTable">
                            <thead>
                                <tr>
                                    <td>Email</td>
                                    <td>Username</td>
                                    <td>Member Since</td>
                                    <td>City</td>
                                    <td>State</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Users'); ?>" class="btn btn-primary">Manage Users</a>
                    </div>
                </div>
            </div>

            <!-- Referrald Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Referrals</h5>
                        <p><?php echo $totalActiveUsers; ?> Active<br><?php echo $usersPercentage; ?> of Goal</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageReferralsTable">
                            <thead>
                                <tr>
                                    <td>Email</td>
                                    <td>Username</td>
                                    <td>Member Since</td>
                                    <td>City</td>
                                    <td>State</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Users'); ?>" class="btn btn-primary">Manage Referrals</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 col-lg-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Discord Health</h5>
                        <ul class="list-unstyled mb-3">
                            <li><strong>Queued:</strong> <?php echo number_format((int)$discordHealth['queued']); ?></li>
                            <li><strong>Failed (24h):</strong> <?php echo number_format((int)$discordHealth['failed24h']); ?></li>
                            <li><strong>Dead (7d):</strong> <?php echo number_format((int)$discordHealth['dead7d']); ?></li>
                            <li><strong>Next Quiet-End:</strong> <?php echo !empty($discordHealth['nextQuietResume']) ? esc(date('M j, g:i A', strtotime($discordHealth['nextQuietResume']))) : 'Active'; ?></li>
                        </ul>
                    </div>
                    <div class="card-inner border-top">
                        <table class="table table-sm mb-3">
                            <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Last Sent</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($discordHealth['channels'] as $channel): ?>
                                    <tr>
                                        <td><?php echo esc($channel['channel_key']); ?></td>
                                        <td><?php echo !empty($channel['last_sent_at']) ? esc(date('M j, g:i A', strtotime($channel['last_sent_at']))) : '<span class="text-soft">never</span>'; ?></td>
                                        <td><?php echo !empty($channel['is_enabled']) ? '<span class="badge bg-success">Enabled</span>' : '<span class="badge bg-danger">Disabled</span>'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('Management/Discord'); ?>" class="btn btn-outline-primary btn-sm">Manage Discord</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">            
            <!-- Assets Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Trade Alerts</h5>
                        <p><?php echo $totalPendingAssets; ?> Pending, <?php echo $totalApprovedAssets; ?> Approved</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageAlertsTable">
                            <thead>
                                <tr>
                                    <td>Symbol</td>
                                    <td>Name</td>
                                    <td>Creator</td>
                                    <td>Market Cap</td>
                                    <td>Volume</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Management/Assets'); ?>" class="btn btn-primary">Review</a>
                    </div>
                </div>
            </div>

            <!-- Support Messages Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Financial News</h5>
                        <p><?php echo $totalPendingSupport; ?> Pending, <?php echo $totalCompleteSupport; ?> Completed</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageNewsTable">
                            <thead>
                                <tr>
                                    <td>Symbol</td>
                                    <td>Name</td>
                                    <td>Creator</td>
                                    <td>Market Cap</td>
                                    <td>Volume</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Support'); ?>" class="btn btn-primary">View Support</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            
            <!-- Assets Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Pending Assets</h5>
                        <p><?php echo $totalPendingAssets; ?> Pending, <?php echo $totalApprovedAssets; ?> Approved</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageAssetsTable">
                            <thead>
                                <tr>
                                    <td>Symbol</td>
                                    <td>Name</td>
                                    <td>Creator</td>
                                    <td>Market Cap</td>
                                    <td>Volume</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Management/Assets'); ?>" class="btn btn-primary">Review</a>
                    </div>
                </div>
            </div>

            <!-- Support Messages Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Support Tickets</h5>
                        <p><?php echo $totalPendingSupport; ?> Pending, <?php echo $totalCompleteSupport; ?> Completed</p>
                    </div>
                    <div class="card-inner">
                        <table class="table table-bordered" id="manageSupportTable">
                            <thead>
                                <tr>
                                    <td>Symbol</td>
                                    <td>Name</td>
                                    <td>Creator</td>
                                    <td>Market Cap</td>
                                    <td>Volume</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP Foreach to enter rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <a href="<?php echo site_url('/Support'); ?>" class="btn btn-primary">View Support</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">

            <!-- Transactions Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Transactions</h5>
                        <p><?php echo $totalTransactions; ?> Total<br>$<?php echo number_format($totalTransTotals, 2); ?> Spend<br>$<?php echo number_format($totalTransFees, 2); ?> Fees</p>
                        <a href="<?php echo site_url('/Transactions'); ?>" class="btn btn-primary">Manage Transactions</a>
                    </div>
                </div>
            </div>

            <!-- Trades Tracked Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Trades Tracked</h5>
                        <p><?php echo $totalTradesTracked; ?> Tracked<br><?php echo $tradesPercentage; ?> of Goal</p>
                        <a href="<?php echo site_url('/Management/Trades'); ?>" class="btn btn-primary">View Trades</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-1">

            <!-- Partners Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Partners</h5>
                        <p><?php echo $totalActivePartners; ?> Active<br><?php echo $partnerPercentage; ?> of Goal</p>
                        <a href="<?php echo site_url('/Partners'); ?>" class="btn btn-primary">View Partners</a>
                    </div>
                </div>
            </div>

            <!-- Wallets Created Card -->
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5>Wallets Created</h5>
                        <p><?php echo $totalWalletsCreated; ?> Created<br><?php echo $walletsPercentage; ?> of Goal</p>
                        <a href="<?php echo site_url('/Management/Wallets'); ?>" class="btn btn-primary">Manage Wallets</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function () {
        const cronKey = "<?= esc(env('CRON_SHARED_KEY') ?? ''); ?>";

        const buildUrl = (baseUrl) => {
            if (!cronKey) {
                return baseUrl;
            }
            const separator = baseUrl.includes('?') ? '&' : '?';
            return `${baseUrl}${separator}cronKey=${encodeURIComponent(cronKey)}`;
        };

        function callEndpoint(button, url, label) {
            const originalText = button.text();
            button.attr('disabled', true).text('Working...');

            $.get(buildUrl(url), function (data) {
                const message = data?.message || `${label} completed.`;
                alert(message);
            }).fail(function (xhr) {
                alert('Error: ' + (xhr.responseJSON?.message || 'Request failed'));
            }).always(function () {
                button.attr('disabled', false).text(originalText);
            });
        }

        $('#btnGenerateStreamData').on('click', function () {
            callEndpoint($(this), '<?= site_url('/API/Management/generateWeeklyStreamData'); ?>', 'Stream data refresh');
        });

        $('#btnGenerateNewsletter').on('click', function () {
            callEndpoint($(this), '<?= site_url('/API/Management/generateCoffeeAndStocksNewsletter'); ?>', 'Newsletter draft');
        });

        $('#btnExportStreamCSV').on('click', function (event) {
            const link = $(this);
            const updatedUrl = buildUrl(link.attr('href'));
            link.attr('href', updatedUrl);
        });
        $('#runNowBtn').on('click', function () {
            let btn = $(this);
            btn.attr('disabled', true).text('Running...');
            $.get('<?php echo site_url("/Management/runCronManually"); ?>', function (data) {
                alert(data.message);
            }).fail(function (xhr) {
                alert('Error: ' + (xhr.responseJSON.message || 'Unknown Error'));
            }).always(function () {
                btn.attr('disabled', false).text('Run CRON Now');
            });
        });
    });

</script>
<script <?= $nonce['script'] ?? '' ?>>
    // $(document).ready(function () {
    //     // Function to load data via AJAX into a DataTable
    //     function loadTableData(apiEndpoint, tableID, columns) {
    //         $(`#${tableID}`).DataTable({
    //             ajax: {
    //                 url: apiEndpoint,
    //                 dataSrc: ''
    //             },
    //             destroy: true,
    //             processing: true,
    //             pageLength: 10,
    //             columns: columns,
    //             language: {
    //                 emptyTable: 'No data available yet.',
    //                 loadingRecords: 'Loading...',
    //                 processing: "Fetching data..."
    //             }
    //         });
    //     }

    //     // Load Users Table
    //     loadTableData(
    //         '<?php echo site_url("/API/Management/getUsers"); ?>',
    //         'manageUsersTable',
    //         [
    //             { data: 'email' },
    //             { data: 'username' },
    //             { data: 'created_at' },
    //             { data: 'city' },
    //             { data: 'state' }
    //         ]
    //     );

    //     // Load Referrals Table
    //     loadTableData(
    //         '<?php echo site_url("/API/Management/getReferrals"); ?>',
    //         'manageReferralsTable',
    //         [
    //             { data: 'email' },
    //             { data: 'username' },
    //             { data: 'created_at' },
    //             { data: 'city' },
    //             { data: 'state' }
    //         ]
    //     );

    //     // Load Alerts Table
    //     loadTableData(
    //         '<?php echo site_url("/API/Management/getAlerts"); ?>',
    //         'manageAlertsTable',
    //         [
    //             { data: 'symbol' },
    //             { data: 'name' },
    //             { data: 'creator' },
    //             { data: 'market_cap' },
    //             { data: 'volume' }
    //         ]
    //     );

    //     // // Load News Table
    //     // loadTableData(
    //     //     '<?php echo site_url("/API/Management/getNews"); ?>',
    //     //     'manageNewsTable',
    //     //     [
    //     //         { data: 'symbol' },
    //     //         { data: 'name' },
    //     //         { data: 'creator' },
    //     //         { data: 'market_cap' },
    //     //         { data: 'volume' }
    //     //     ]
    //     // );

    //     // // Load Assets Table
    //     // loadTableData(
    //     //     '<?php echo site_url("/API/Management/getAssets"); ?>',
    //     //     'manageAssetsTable',
    //     //     [
    //     //         { data: 'symbol' },
    //     //         { data: 'name' },
    //     //         { data: 'creator' },
    //     //         { data: 'market_cap' },
    //     //         { data: 'volume' }
    //     //     ]
    //     // );

    //     // // Load Support Table
    //     // loadTableData(
    //     //     '<?php echo site_url("/API/Management/getSupport"); ?>',
    //     //     'manageSupportTable',
    //     //     [
    //     //         { data: 'symbol' },
    //     //         { data: 'name' },
    //     //         { data: 'creator' },
    //     //         { data: 'market_cap' },
    //     //         { data: 'volume' }
    //     //     ]
    //     // );
    // });
</script>
