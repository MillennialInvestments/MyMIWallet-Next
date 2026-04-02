<!-- app/Modules/Management/Views/Alerts/index.php -->
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
// // Get Approved Reports
$totalPendingSupport                = $reporting['totalPendingSupport']; 
$totalCompleteSupport               = $reporting['totalCompleteSupport'];
$pendingTradeAlerts                 = $alertsInfo['pendingTradeAlerts'];
// log_message('debug', 'Management/Alerts/index - L65: ' . print_r($pendingTradeAlerts, true));
$pendingTradeAlertsCount            = $alertsInfo['pendingTradeAlertsCount']; // Placeholder count for pending alerts
$resolvedAlertsCount = 3; // Placeholder count for resolved alerts
$totalAlertsCount = $pendingTradeAlertsCount + $resolvedAlertsCount;
$timeToResolve = "3 hrs 30 mins"; // Example of average resolution time
$alertTrends = [10, 20, 15, 5, 25, 30, 20]; // Placeholder data for alert trends
$alertsBySource = ['User' => 15, 'System' => 20]; // Example data for alert sources
// Detect Device Type
$userAgent = service('request')->getUserAgent();
$isMobile = $userAgent->isMobile(); // Detect if the user is on mobile
// Get User Activity
// $userActivity                       = $reporting['userActivity'];
$subViewData                        = [
    'cuID'                          => $cuID,
    'advisorUserId'                 => $cuID,
    'totalPendingSupport'           => $totalPendingSupport,
    'totalCompleteSupport'          => $totalCompleteSupport,
    'pendingTradeAlertsCount'       => $pendingTradeAlertsCount,
    'resolvedAlertsCount'           => $resolvedAlertsCount,
    'advisorMedia'                  => $advisorMedia,
    'advisorPick'                   => $advisorPick,
    'advisorSummary'                => $advisorSummary,
    'advisorScript'                 => $advisorScript,
    'advisorAudio'                  => $advisorAudio,
    'advisorCapcutUrl'              => $advisorCapcutUrl,
    'advisorZipUrl'                 => $advisorZipUrl,
]; 
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

            <div class="nk-block d-none d-md-block">
                <div class="row">
                    <!-- Action Center Card -->
                    <div class="col-lg-4">
                        <?= view('ManagementModule\Views\Alerts\resources\action-center', $subViewData) ?>
                    </div><!-- .col -->

                    <!-- Alert Analytics Card -->
                    <div class="col-lg-8">
                        <?= view('ManagementModule\Views\Alerts\resources\market-data', $subViewData) ?>                        
                    </div>
                </div><!-- .row -->
            </div><!-- .nk-block -->
            <?php // echo view('ManagementModule\Views\Alerts\resources\statistical-overview', $subViewData) ?>
            <?php // echo view('ManagementModule\Views\Alerts\resources\management-tools', $subViewData) ?>
            <?php // echo view('ManagementModule\Views\Alerts\resources\management-controls', $subViewData) ?>


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
                                                <h6 class="title">MyMI Trade Alerts  - Management Console</h6>                                                
                                                <?php
                                                //print_r($pendingTradeAlerts, true);
                                                ?>
                                                <!-- <span class="sub-text">Techyspec</span> -->
                                            </div>
                                        </a>
                                        <?php if (($cuRole ?? 4) < 2): ?>
                                            <div class="d-flex flex-wrap gap-2 mt-2">
                                                <button id="btn-generate-advisor" class="btn btn-sm btn-outline-primary">
                                                    Generate Advisor Package (On-Demand)
                                                </button>
                                                <button id="btn-refresh-momentum" class="btn btn-sm btn-outline-secondary">
                                                    Refresh Momentum Scores
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                        <!-- <div class="dropdown">
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
                                       <div class="card">
                                            <div class="card-inner">
                                                <div class="d-flex flex-wrap align-items-center gap-3">
                                                    <!-- Search / Backfill / Quick TV Toolbar -->
                                                    <form class="row g-2 mb-3" method="get" action="<?= site_url('Management/Alerts'); ?>">
                                                    <div class="col-md-6">
                                                        <input type="text" name="q" value="<?= esc($search ?? ''); ?>" class="form-control"
                                                            placeholder="Search ticker, exchange, category, text...">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-primary w-100" type="submit">Search</button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-outline-secondary w-100" type="button" id="btnBackfill">Backfill Categories</button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#tvModal">Quick TV Submit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                       <div class="card">
                                            <div class="card-inner">
                                                <div class="d-flex flex-wrap align-items-center gap-3">
                                                    <!-- Time Filter Dropdown -->
                                                    <select id="timeFilter" class="form-control form-select w-auto">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="this_week">This Week</option>
                                                        <option value="last_week">Last Week</option>
                                                        <option value="this_month" selected>This Month</option>
                                                        <option value="last_month">Last Month</option>
                                                        <option value="this_quarter">This Quarter</option>
                                                        <option value="last_quarter">Last Quarter</option>
                                                        <option value="this_year">This Year</option>
                                                        <option value="last_year">Last Year</option>
                                                    </select>
                                                    <select id="categoryFilter" class="form-control form-select w-auto">
                                                        <option value="">All Categories</option>
                                                        <option value="Golden_Cross">Golden Cross</option>
                                                        <option value="EMA_Stack_Bullish">EMA Stack Bullish</option>
                                                        <option value="RSI_Bounce_Divergence">RSI Bounce Divergence</option>
                                                        <option value="High_Dollar_Volume">High Dollar Volume</option>
                                                        <option value="Whale_Buy_Signal">Whale Buy Signal</option>
                                                        <option value="Earnings_Drift">Earnings Drift Continuation</option>
                                                        <option value="Volume_Breakout_GapUp">Volume Breakout + Gap Up</option>
                                                        <option value="52_Week_High_Volume_Surge">52-Week High Volume Surge</option>
                                                        <option value="EMA_Liquidity_1Hr">EMA Liquidity 1Hr</option>
                                                        <option value="EMA_Liquidity_4Hr">EMA Liquidity 4Hr</option>
                                                        <option value="AI_Liquidity_Scanner_1Hr">AI Liquidity Scanner 1Hr</option>
                                                        <option value="AI_Liquidity_Scanner_4Hr">AI Liquidity Scanner 4Hr</option>
                                                        <option value="EMA_Penny_1Hr">EMA Penny 1Hr</option>
                                                        <option value="EMA_Penny_4Hr">EMA Penny 4Hr</option>
                                                        <option value="AI_Penny_1Hr">AI Penny 1Hr</option>
                                                        <option value="AI_Penny_4Hr">AI Penny 4Hr</option>
                                                    </select>
                                                    <select id="sourceFilter" class="form-control form-select w-auto">
                                                        <option value="" <?= empty($alertsSourceFilter) ? "selected" : ""; ?>>All Sources</option>
                                                        <option value="manual" <?= ($alertsSourceFilter ?? "") === "manual" ? "selected" : ""; ?>>manual</option>
                                                        <option value="email" <?= ($alertsSourceFilter ?? "") === "email" ? "selected" : ""; ?>>email</option>
                                                        <option value="scanner" <?= ($alertsSourceFilter ?? "") === "scanner" ? "selected" : ""; ?>>scanner</option>
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

                                                    <?php /*
                                                    <!-- Action Buttons -->
                                                    <button id="fetchEmailsButton" class="btn btn-primary">
                                                        <i class="icon ni ni-mail"></i> Fetch Emails / Create Alerts
                                                    </button>

                                                    <button id="force-fetch-emails" class="btn btn-secondary">
                                                        Force Pull Emails
                                                    </button>

                                                    <button id="force-fetch-tickers" class="btn btn-warning">
                                                        <i class="icon ni ni-reload"></i> Force Pull Tickers
                                                    </button>

                                                    <button id="sendDiscordAlerts" class="btn btn-success">
                                                        <i class="icon ni ni-bell"></i> Send Alerts to Discord
                                                    </button>

                                                    <button class="btn btn-primary generate-alert-content">
                                                        <i class="fa fa-plus"></i> Generate Alert Content
                                                    </button>

                                                    <button id="postToSocials" class="btn btn-success">
                                                        <i class="icon ni ni-share-alt"></i> Post to Socials
                                                    </button>

                                                    <button id="generateVoiceover" class="btn btn-primary">
                                                        <i class="icon ni ni-mic"></i> Generate Voiceover
                                                    </button>

                                                    <a id="downloadVoiceover" class="btn btn-success" href="#" target="_blank" style="display: none;">
                                                        <i class="icon ni ni-download"></i> Download Voiceover
                                                    </a>
                                                    */ ?>
                                                </div>

                                                <!-- Status Messages -->
                                                <div id="fetch-status" class="mt-3"></div>
                                                <div id="discord-status" class="mt-2"></div>
                                            </div>
                                        </div>
                                        <!-- Weekly Top Performance (AJAX-filled) -->
                                        <div class="card card-bordered mb-3">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <strong>Weekly Top Performance</strong>
                                                <select id="weeklyLimit" class="form-select form-select-sm" style="width:auto">
                                                <option value="5">Top 5</option>
                                                <option value="10" selected>Top 10</option>
                                                <option value="20">Top 20</option>
                                                </select>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                <table class="table table-sm mb-0" id="weeklyTable">
                                                    <thead><tr><th>Ticker</th><th>From</th><th>To</th><th>%</th></tr></thead>
                                                    <tbody><tr><td colspan="4" class="text-center py-3">Loading…</td></tr></tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>                                                                                                
                                        <div class="card">
                                            <div class="card-inner">
                                                <h5 class="title">Confirmed Trade Alerts</h5>
                                                <table class="display table <?= $isMobile ? 'table-responsive' : ''; ?>" id="confirmedTradeAlertTable">
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

                                        <div class="card mt-3">
                                            <div class="card-inner">
                                                <h5 class="title">Scanner Signals</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-responsive display" id="scannerSignalsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th><th>Date</th><th>Ticker</th><th>Category</th><th>Price</th><th>Status</th><th>Source</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div> 
                                    <!-- <div class="project-progress">
                                        <div class="project-progress-details">
                                            <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>2 Tasks</span></div>
                                            <div class="project-progress-percent">52.5%</div>
                                        </div>
                                        <div class="progress progress-pill progress-md bg-light">
                                            <div class="progress-bar" data-progress="52.5"></div>
                                        </div>
                                    </div> -->
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
<?= view('ManagementModule\Views\Alerts\resources\advisorMedia', $subViewData) ?>
<!-- Quick TradingView Submit Modal -->
<div class="modal fade" id="tvModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form class="modal-content" method="post" action="<?= site_url('Management/Alerts/submitTradingView'); ?>">
      <?= csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title">Quick TradingView Submission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Ticker</label>
            <input type="text" name="ticker" class="form-control" placeholder="e.g., NVDA">
          </div>
          <div class="col-md-9">
            <label class="form-label">Title</label>
            <input type="text" name="tv_title" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">TradingView Link</label>
            <input type="url" name="chart_link" class="form-control" placeholder="https://www.tradingview.com/..." required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Chart Image URL</label>
            <input type="url" name="chart_image" class="form-control" placeholder="https://.../image.png">
          </div>
          <div class="col-md-4">
            <label class="form-label">Category</label>
            <select name="category" class="form-select">
              <option value="">Auto/None</option>
              <option>Active Buy</option>
              <option>Active Sell</option>
              <option>Liquidity Stocks</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="tv_description" class="form-control" rows="4" placeholder="Paste description from TradingView…"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Submit</button>
        <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
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
<script <?= $nonce['script'] ?? '' ?>>
(function initAlertsManagementScripts(attempt = 0) {
    if (typeof window.jQuery === 'undefined') {
        if (attempt > 200) {
            console.error('jQuery not available for Alerts scripts.');
            return;
        }
        return setTimeout(() => initAlertsManagementScripts(attempt + 1), 50);
    }

    const $ = window.jQuery;

    if (!$.fn || typeof $.fn.DataTable !== 'function') {
        if (attempt > 200) {
            console.error('DataTables plugin not available for Alerts scripts.');
            return;
        }
        return setTimeout(() => initAlertsManagementScripts(attempt + 1), 50);
    }

    $(function () {
        if (window.__mymiAlertsPageInitialized) {
            console.debug('Alerts page scripts already initialized; skipping duplicate init.');
            return;
        }
        window.__mymiAlertsPageInitialized = true;

        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-hash"]').attr('content');
        const $fetchStatus = $('#fetch-status');

        function updateFetchStatus(message, level = 'warning') {
            if (!$fetchStatus.length) return;
            const cls = level === 'danger' ? 'alert-danger' : level === 'success' ? 'alert-success' : 'alert-warning';
            $fetchStatus.html(`<div class="alert ${cls} py-2 px-3 mb-0">${message}</div>`);
        }

        function getOrCreateDataTable($table, config) {
            if (!$table || !$table.length) return null;
            if ($.fn.DataTable.isDataTable($table)) {
                return $table.DataTable();
            }
            return $table.DataTable(config);
        }

        function safeReload(selector) {
            if ($.fn.DataTable.isDataTable(selector)) {
                $(selector).DataTable().ajax.reload(null, false);
            }
        }

        function buildDataTableAjaxConfig(extraData) {
            return {
                url: '<?= site_url("API/Alerts/getFilteredAlerts"); ?>',
                type: 'POST',
                data: function (d) {
                    d.q = $('input[name="q"]').val();
                    d.timeRange = $('#timeFilter').val();
                    d.category = $('#categoryFilter').val();
                    d.source = $('#sourceFilter').val();
                    d[csrfName] = csrfHash;
                    if (typeof extraData === 'function') {
                        extraData(d);
                    }
                },
                dataSrc: function (json) {
                    if (!json || !Array.isArray(json.data)) {
                        console.error('Invalid DataTables JSON received from getFilteredAlerts.', json);
                        updateFetchStatus('Alert data response was invalid. Check logs for details.', 'danger');
                        return [];
                    }
                    return json.data;
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('DataTables AJAX error.', {
                        endpoint: '<?= site_url("API/Alerts/getFilteredAlerts"); ?>',
                        status: xhr?.status,
                        statusText: xhr?.statusText,
                        textStatus,
                        errorThrown,
                        responseText: xhr?.responseText,
                    });
                    updateFetchStatus('Unable to load alerts table data. Please retry or check server logs.', 'danger');
                }
            };
        }

        function getColumnConfig() {
            return [
                { data: 'id', title: 'ID', name: 'id', orderable: true },
                { data: 'created_on', title: 'Date', name: 'created_on', orderable: true },
                {
                    data: 'ticker',
                    title: 'Ticker',
                    name: 'ticker',
                    orderable: true,
                    render: function (data, type, row) {
                        const exchange = (row.exchange && row.exchange !== "N/A" && row.exchange !== "Unknown") ? row.exchange : null;
                        const previewUrl = '<?= site_url('Preview/Alert'); ?>/' + encodeURIComponent(exchange ? `${exchange}-${data}` : data);
                        const tvUrl = exchange ? `https://www.tradingview.com/symbols/${exchange}-${data}/` : null;

                        let html = `<a href="${previewUrl}" class="text-primary fw-bold">${data}</a>`;

                        if (tvUrl) {
                            html += ` <a href="${tvUrl}" target="_blank" rel="noopener" class="ms-1 text-soft"><em class="icon ni ni-external"></em></a>`;
                        }

                        if (!exchange) {
                            html += ' <span class="text-muted">(No Exchange)</span>';
                        }

                        return html;
                    }
                },
                {
                    data: 'exchange',
                    title: 'Exchange',
                    name: 'exchange',
                    orderable: true,
                    render: function (data, type, row) {
                        let exchangeDisplay = data ? data : '<span class="text-muted">N/A</span>';
                        if (!data || data === "N/A" || data === "Unknown") {
                            exchangeDisplay += ` <a class="dynamicModalLoader btn btn-xs btn-warning" data-formtype="Alerts" data-endpoint="updateExchange" data-accountid="${row.id}" data-ticker="${row.ticker}"><em class="icon ni ni-plus"></em></a>`;
                        }
                        return exchangeDisplay;
                    }
                },
                { data: 'category', title: 'Category', name: 'category', orderable: true },
                {
                    data: 'price',
                    name: 'price',
                    title: 'Market Price',
                    render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : '<span class="text-muted">N/A</span>'
                },
                {
                    data: 'entry_price',
                    name: 'entry_price',
                    title: 'Entry Price',
                    render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : 'N/A'
                },
                {
                    data: 'delta_gain',
                    name: 'delta_gain',
                    title: 'Δ / % Gain',
                    visible: true,
                    orderable: true,
                    render: function (data, type, row) {
                        const market = parseFloat(row.price);
                        const entry = parseFloat(row.entry_price);
                        if (!isNaN(market) && !isNaN(entry) && entry !== 0) {
                            const delta = (market - entry).toFixed(2);
                            const percent = ((delta / entry) * 100).toFixed(2);
                            const sign = delta >= 0 ? '+' : '';
                            const colorClass = delta >= 0 ? 'text-success' : 'text-danger';
                            return `<span class="text-muted">${sign}$${delta}</span> <span class="${colorClass}">(${sign}${percent}%)</span>`;
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                { data: 'target_price', name: 'target_price', title: 'Target (3%)', visible: false, render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : 'N/A' },
                { data: 'locked_profit_stop', name: 'locked_profit_stop', title: 'Profit Lock Stop', visible: false, render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : 'N/A' },
                { data: 'trailing_stop_percent', name: 'trailing_stop_percent', title: 'Trailing %', visible: false, render: (data) => data ? `${data}%` : 'N/A' },
                { data: 'ema_3_8', name: 'ema_3_8', title: '3/8 EMA', visible: false, render: (data) => data === 'up' ? '<span class="badge bg-success">↑</span>' : data === 'down' ? '<span class="badge bg-danger">↓</span>' : '<span class="text-muted">N/A</span>' },
                { data: 'ema_8_13', name: 'ema_8_13', title: '8/13 EMA', visible: false, render: (data) => data === 'up' ? '<span class="badge bg-success">↑</span>' : data === 'down' ? '<span class="badge bg-danger">↓</span>' : '<span class="text-muted">N/A</span>' },
                { data: 'ema_13_34', name: 'ema_13_34', title: '13/34 EMA', visible: false, render: (data) => data === 'up' ? '<span class="badge bg-success">↑</span>' : data === 'down' ? '<span class="badge bg-danger">↓</span>' : '<span class="text-muted">N/A</span>' },
                { data: 'ema_34_48', name: 'ema_34_48', title: '34/48 EMA', visible: false, render: (data) => data === 'up' ? '<span class="badge bg-success">↑</span>' : data === 'down' ? '<span class="badge bg-danger">↓</span>' : '<span class="text-muted">N/A</span>' },
                {
                    data: 'ema_consensus',
                    name: 'ema_consensus',
                    title: 'EMA Analysis',
                    visible: false,
                    orderable: true,
                    render: function (data) {
                        const isUp = parseInt(data) > 2;
                        return `<span class="badge ${isUp ? 'bg-success' : 'bg-danger'}">${data}/4 ${isUp ? '↑' : '↓'}</span>`;
                    }
                },
                {
                    data: 'tv_chart',
                    name: 'tv_chart',
                    title: 'TV Chart',
                    orderable: false,
                    render: function (data, type, row) {
                        if (data && data !== 'N/A') {
                            return `<a href="${data}" target="_blank" class="btn btn-sm btn-info"><em class="icon ni ni-eye"></em> View</a>`;
                        }
                        const tvLink = `https://www.tradingview.com/symbols/${row.exchange}-${row.ticker}/`;
                        return `<a href="${tvLink}" target="_blank" class="btn btn-sm btn-secondary"><em class="icon ni ni-eye"></em> View</a>
                                <a class="dynamicModalLoader btn btn-sm btn-warning" data-formtype="Alerts" data-endpoint="addChart" data-accountid="${row.id}"><em class="icon ni ni-plus"></em></a>`;
                    }
                },
                {
                    data: 'id',
                    title: 'Manage',
                    name: 'manage',
                    orderable: false,
                    render: function (data, type, row, meta) {
                        const tableId = meta.settings.sTableId;
                        const editBtn = `<button class="btn btn-sm btn-primary edit-alert dynamicModalLoader" data-formtype="Alerts" data-endpoint="createTradeAlert" data-accountid="${data}"><i class="icon ni ni-edit"></i> Edit</button>`;
                        const manageBtn = `<button class="btn btn-sm btn-success manage-alert dynamicModalLoader" data-formtype="Alerts" data-endpoint="manageTradeAlert" data-accountid="${data}"><i class="icon ni ni-chat"></i> Manage</button>`;
                        const deleteBtn = `<button class="btn btn-sm btn-danger delete-alert" data-id="${data}"><i class="icon ni ni-trash"></i> Hide</button>`;
                        return tableId === 'confirmedTradeAlertTable' ? editBtn + manageBtn + deleteBtn : editBtn + deleteBtn;
                    }
                }
            ];
        }

        const commonConfig = {
            processing: true,
            serverSide: true,
            deferRender: true,
            searchDelay: 300,
            pageLength: 50,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            order: [[0, 'desc']],
            columns: getColumnConfig()
        };

        const confirmedTable = getOrCreateDataTable($('#confirmedTradeAlertTable'), {
            ...commonConfig,
            ajax: buildDataTableAjaxConfig((d) => {
                d.alert_created = 1;
            })
        });

        <?php if ($cuRole <= 3): ?>
        const pendingTable = getOrCreateDataTable($('#pendingTradeAlertTable'), {
            ...commonConfig,
            ajax: buildDataTableAjaxConfig((d) => {
                d.alert_created = 0;
            })
        });
        <?php endif; ?>

        const scannerTable = getOrCreateDataTable($('#scannerSignalsTable'), {
            processing: true,
            order: [[0, 'desc']],
            ajax: {
                url: '<?= site_url("API/Alerts/scanner"); ?>',
                dataSrc: function (json) {
                    return (json && Array.isArray(json.data)) ? json.data : [];
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Scanner DataTable AJAX error.', {
                        endpoint: '<?= site_url("API/Alerts/scanner"); ?>',
                        status: xhr?.status,
                        statusText: xhr?.statusText,
                        textStatus,
                        errorThrown,
                        responseText: xhr?.responseText,
                    });
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'created_on', name: 'created_on' },
                { data: 'ticker', name: 'ticker' },
                { data: 'category', name: 'category' },
                { data: 'price', name: 'price' },
                { data: 'status', name: 'status' },
                { data: 'source', name: 'source' }
            ]
        });

        let userLastActive = Date.now();
        const inactivityLimit = 5 * 60 * 1000;
        const overlay = document.getElementById('inactivityOverlay');
        let processing = true;
        let currentOffset = 0;
        const batchSize = 25;

        function resetActivityTimer() {
            userLastActive = Date.now();
            if (overlay) overlay.style.display = 'none';
        }
        ['mousemove', 'keydown', 'scroll', 'click'].forEach(evt => document.addEventListener(evt, resetActivityTimer));

        setInterval(() => {
            if (Date.now() - userLastActive > inactivityLimit) {
                processing = false;
                if (overlay) overlay.style.display = 'block';
            }
        }, 30000);

        document.getElementById('resumeProcessing')?.addEventListener('click', () => {
            userLastActive = Date.now();
            if (overlay) overlay.style.display = 'none';
            if (!processing) {
                processing = true;
                processNextBatch();
            }
        });

        function processNextBatch() {
            if (!processing) return;

            $.ajax({
                url: '<?= site_url("API/Alerts/processTradeBatch"); ?>',
                type: 'POST',
                data: {
                    offset: currentOffset,
                    batchSize: batchSize,
                    [csrfName]: csrfHash
                },
                success: function (res) {
                    safeReload('#confirmedTradeAlertTable');
                    <?php if ($cuRole <= 3): ?>
                    safeReload('#pendingTradeAlertTable');
                    <?php endif; ?>
                    safeReload('#scannerSignalsTable');

                    currentOffset = res?.reachedEnd ? 0 : currentOffset + batchSize;

                    if (Date.now() - userLastActive < inactivityLimit) {
                        setTimeout(processNextBatch, 300000);
                    } else {
                        processing = false;
                        if (overlay) overlay.style.display = 'block';
                    }
                },
                error: function (xhr) {
                    console.error('Batch processing failed:', xhr?.responseText);
                }
            });
        }
        processNextBatch();

        // Removed legacy direct row-manipulation polling in favor of DataTables reloads only.

        let columnsVisible = false;
        $('#toggleColumnsBtn').on('click', function () {
            const columnNames = [
                'delta_gain',
                'target_price',
                'locked_profit_stop',
                'trailing_stop_percent',
                'ema_3_8',
                'ema_8_13',
                'ema_13_34',
                'ema_34_48',
                'ema_consensus'
            ];

            const tables = ['#confirmedTradeAlertTable', '#pendingTradeAlertTable'];
            const availableMainTable = $.fn.DataTable.isDataTable(tables[0]) ? $(tables[0]).DataTable() : null;
            if (!availableMainTable) return;

            columnsVisible = !columnsVisible;
            $(this).html(columnsVisible
                ? '<i class="icon ni ni-refresh"></i> Hide Extra Columns'
                : '<i class="icon ni ni-refresh"></i> Show More Columns');

            tables.forEach(selector => {
                if (!$.fn.DataTable.isDataTable(selector)) return;
                const dt = $(selector).DataTable();
                columnNames.forEach(name => {
                    const col = dt.column(`${name}:name`);
                    if (col && col.header()) {
                        col.visible(columnsVisible, false);
                    }
                });
                dt.columns.adjust().draw(false);
            });
        });

        $('#timeFilter, #categoryFilter, #sourceFilter').on('change', function () {
            safeReload('#confirmedTradeAlertTable');
            <?php if ($cuRole <= 3): ?>
            safeReload('#pendingTradeAlertTable');
            <?php endif; ?>
            safeReload('#scannerSignalsTable');
        });

        $('#create-new-trade-alert').on('click', function () {
            $.ajax({
                url: '<?= site_url("API/Alerts/createTradeAlert"); ?>',
                type: 'POST',
                data: {
                    ticker: 'AAPL',
                    price: 175.25,
                    [csrfName]: csrfHash
                },
                success: function (response) {
                    alert(response.message);
                    safeReload('#confirmedTradeAlertTable');
                    <?php if ($cuRole <= 3): ?> safeReload('#pendingTradeAlertTable'); <?php endif; ?>
                },
                error: function (xhr) {
                    alert('Error creating trade alert.');
                    console.error(xhr?.responseText);
                }
            });
        });

        $('#generateAdvisorMediaBtn').on('click', function () {
            const userId = $(this).data('userid');
            const statusDiv = $('#advisorMediaStatus');
            statusDiv.text('Generating advisor media package...');

            $.ajax({
                url: '/index.php/API/Advisor/generateNow',
                type: 'POST',
                data: { user_id: userId },
                success: function (res) {
                    if (res.status === 'success') {
                        const media = res.media;
                        statusDiv.html(`✅ Generated: ${media.timestamp}<br><b>Ticker:</b> ${media.ticker}<br><b>Score:</b> ${media.score}<br><b>Risk:</b> ${media.risk_rating}<br><b>Sentiment:</b> ${media.sentiment}<br><a href="${media.voiceover_url}" target="_blank" class="btn btn-sm btn-info mt-2">🎧 Listen</a><a href="${media.chart_url}" target="_blank" class="btn btn-sm btn-primary mt-2">📈 Chart</a><a href="${media.zip_url}" target="_blank" class="btn btn-sm btn-success mt-2">📦 Download Zip</a>`);
                    } else {
                        statusDiv.text('⚠️ Failed to generate advisor media.');
                    }
                },
                error: function () {
                    statusDiv.text('❌ AJAX error while generating advisor package.');
                }
            });
        });

        $(document).on('click', '.delete-alert', function () {
            const alertId = $(this).data('id');
            if (!confirm('Are you sure you want to hide this alert?')) return;

            $.ajax({
                url: '<?= site_url("API/Alerts/hideTradeAlert"); ?>',
                type: 'POST',
                data: { alert_id: alertId, [csrfName]: csrfHash },
                success: function (response) {
                    alert(response.message);
                    safeReload('#confirmedTradeAlertTable');
                    <?php if ($cuRole <= 3): ?> safeReload('#pendingTradeAlertTable'); <?php endif; ?>
                },
                error: function (xhr) {
                    alert('Error hiding alert.');
                    console.error(xhr?.responseText);
                }
            });
        });
    });
})();
</script>
<script <?= $nonce['script'] ?? '' ?>>
(function(){
  const tableBody = document.querySelector('#weeklyTable tbody');
  const limitSel  = document.getElementById('weeklyLimit');

  async function loadWeekly() {
    if (!tableBody || !limitSel) return;
    tableBody.innerHTML = '<tr><td colspan="4" class="text-center py-3">Loading…</td></tr>';
    const limit = limitSel.value;
    try {
      const res  = await fetch('<?= site_url('Management/Alerts/weeklyTopPerformance'); ?>?limit=' + limit);
      const json = await res.json();
      if (json.status !== 'success') throw new Error('Failed');
      const rows = json.data || [];
      tableBody.innerHTML = rows.length ? rows.map(r => `
        <tr>
          <td>${r.ticker}</td>
          <td>${r.from ?? '-'}</td>
          <td>${r.to ?? '-'}</td>
          <td>${r.perf}%</td>
        </tr>`).join('') :
        '<tr><td colspan="4" class="text-center py-3">No data</td></tr>';
    } catch (e) {
      tableBody.innerHTML = '<tr><td colspan="4" class="text-danger text-center py-3">Error loading</td></tr>';
      console.error(e);
    }
  }
  limitSel?.addEventListener('change', loadWeekly);
  loadWeekly();

  // Backfill categories
  const btnBackfill = document.getElementById('btnBackfill');
  btnBackfill?.addEventListener('click', async () => {
    btnBackfill.disabled = true;
    btnBackfill.textContent = 'Backfilling…';
    try {
      const res = await fetch('<?= site_url('API/Alerts/backfillCategories'); ?>', {
        method: 'POST',
        headers: {'X-Requested-With':'XMLHttpRequest','Content-Type':'application/json'},
        body: JSON.stringify({ run: true })
      });
      const j = await res.json();
      alert('Backfill: ' + (j.status || 'unknown') + '\nUpdated: ' + (j.result?.updated ?? 0));
    } catch (e) {
      alert('Backfill error. Check logs.');
      console.error(e);
    } finally {
      btnBackfill.disabled = false;
      btnBackfill.textContent = 'Backfill Categories';
      // Refresh tables if present
      if (window.jQuery && $.fn && $.fn.DataTable) {
        if ($.fn.DataTable.isDataTable('#confirmedTradeAlertTable')) {
          $('#confirmedTradeAlertTable').DataTable().ajax.reload(null, false);
        }
        if ($.fn.DataTable.isDataTable('#pendingTradeAlertTable')) {
          $('#pendingTradeAlertTable').DataTable().ajax.reload(null, false);
        }
      }
    }
  });

  const btnBackfillEmails = document.getElementById('backfill-alerts-emails');
  btnBackfillEmails?.addEventListener('click', async () => {
    btnBackfillEmails.disabled = true;
    const originalText = btnBackfillEmails.textContent;
    btnBackfillEmails.textContent = 'Starting backfill…';
    try {
      const res = await fetch('<?= site_url('API/Alerts/backfillEmailAlerts'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify({ days_back: 30 })
      });
      const json = await res.json();
      const data = json.data || {};
      alert(`Backfill completed. Inserted: ${data.inserted ?? 0}, Duplicates: ${data.duplicates_skipped ?? 0}, Errors: ${data.errors ?? 0}`);
    } catch (e) {
      alert('Backfill failed. Check logs for details.');
      console.error(e);
    } finally {
      btnBackfillEmails.disabled = false;
      btnBackfillEmails.textContent = originalText;
    }
  });
})();
</script>

