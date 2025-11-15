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

<?= $this->section('scripts') ?>
<script <?= $nonce['script'] ?? '' ?>>
(function initUserAlertsScripts(attempt = 0) {
    if (typeof window === 'undefined') {
        return;
    }

    if (typeof window.jQuery === 'undefined') {
        if (attempt > 200) {
            console.error('jQuery not available for User Alerts scripts.');
            return;
        }
        return setTimeout(function () {
            initUserAlertsScripts(attempt + 1);
        }, 50);
    }

    const $ = window.jQuery;

    if (!$.fn || typeof $.fn.DataTable !== 'function') {
        if (attempt > 200) {
            console.error('DataTables plugin not available for User Alerts scripts.');
            return;
        }
        return setTimeout(function () {
            initUserAlertsScripts(attempt + 1);
        }, 50);
    }

    $(function () {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-hash"]').attr('content');

        function updateCsrfToken(newName, newHash) {
            if (!newName || !newHash) {
                return;
            }
            csrfName = newName;
            csrfHash = newHash;
            $('meta[name="csrf-name"]').attr('content', csrfName);
            $('meta[name="csrf-hash"]').attr('content', csrfHash);
        }

        function getColumnConfig() {
            return [
                { data: 'id', title: 'ID', orderable: true },
                { data: 'created_on', title: 'Date', orderable: true },
                {
                    data: 'ticker',
                    title: 'Ticker',
                    orderable: true,
                    render: function (data, type, row) {
                        if (row.exchange && row.exchange !== 'N/A' && row.exchange !== 'Unknown') {
                            return `<a href="https://www.tradingview.com/symbols/${row.exchange}-${data}/" target="_blank" class="text-primary">${data}</a>`;
                        }
                        return `<span class="text-muted">${data} (No Exchange)</span>`;
                    }
                },
                {
                    data: 'exchange',
                    title: 'Exchange',
                    orderable: true,
                    render: function (data, type, row) {
                        let display = data ? data : '<span class="text-muted">N/A</span>';
                        if (!data || data === 'N/A' || data === 'Unknown') {
                            display += `
                                <a class="dynamicModalLoader btn btn-xs btn-warning"
                                    data-formtype="Alerts"
                                    data-endpoint="updateExchange"
                                    data-accountid="${row.id}"
                                    data-ticker="${row.ticker}">
                                    <em class="icon ni ni-plus"></em>
                                </a>`;
                        }
                        return display;
                    }
                },
                { data: 'category', title: 'Category', orderable: true },
                {
                    data: 'price',
                    name: 'price',
                    title: 'Market Price',
                    render: function (data) {
                        return data ? `$${parseFloat(data).toFixed(2)}` : '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'entry_price',
                    name: 'entry_price',
                    title: 'Entry Price',
                    render: function (data) {
                        return data ? `$${parseFloat(data).toFixed(2)}` : 'N/A';
                    }
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
                            const percent = ((market - entry) / entry * 100).toFixed(2);
                            const sign = delta >= 0 ? '+' : '';
                            const colorClass = delta >= 0 ? 'text-success' : 'text-danger';
                            return `<span class="text-muted">${sign}$${delta}</span> <span class="${colorClass}">(${sign}${percent}%)</span>`;
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'target_price',
                    name: 'target_price',
                    title: 'Target (3%)',
                    visible: false,
                    render: function (data) {
                        return data ? `$${parseFloat(data).toFixed(2)}` : 'N/A';
                    }
                },
                {
                    data: 'locked_profit_stop',
                    name: 'locked_profit_stop',
                    title: 'Profit Lock Stop',
                    visible: false,
                    render: function (data) {
                        return data ? `$${parseFloat(data).toFixed(2)}` : 'N/A';
                    }
                },
                {
                    data: 'trailing_stop_percent',
                    name: 'trailing_stop_percent',
                    title: 'Trailing %',
                    visible: false,
                    render: function (data) {
                        return data ? `${data}%` : 'N/A';
                    }
                },
                {
                    data: 'ema_3_8',
                    name: 'ema_3_8',
                    title: '3/8 EMA',
                    visible: false,
                    render: function (data) {
                        if (data === 'up') {
                            return '<span class="badge bg-success">↑</span>';
                        }
                        if (data === 'down') {
                            return '<span class="badge bg-danger">↓</span>';
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'ema_8_13',
                    name: 'ema_8_13',
                    title: '8/13 EMA',
                    visible: false,
                    render: function (data) {
                        if (data === 'up') {
                            return '<span class="badge bg-success">↑</span>';
                        }
                        if (data === 'down') {
                            return '<span class="badge bg-danger">↓</span>';
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'ema_13_34',
                    name: 'ema_13_34',
                    title: '13/34 EMA',
                    visible: false,
                    render: function (data) {
                        if (data === 'up') {
                            return '<span class="badge bg-success">↑</span>';
                        }
                        if (data === 'down') {
                            return '<span class="badge bg-danger">↓</span>';
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'ema_34_48',
                    name: 'ema_34_48',
                    title: '34/48 EMA',
                    visible: false,
                    render: function (data) {
                        if (data === 'up') {
                            return '<span class="badge bg-success">↑</span>';
                        }
                        if (data === 'down') {
                            return '<span class="badge bg-danger">↓</span>';
                        }
                        return '<span class="text-muted">N/A</span>';
                    }
                },
                {
                    data: 'ema_consensus',
                    name: 'ema_consensus',
                    title: 'EMA Analysis',
                    visible: false,
                    orderable: true,
                    render: function (data) {
                        const parsed = parseInt(data, 10);
                        if (isNaN(parsed)) {
                            return '<span class="text-muted">N/A</span>';
                        }
                        const isUp = parsed > 2;
                        return `<span class="badge ${isUp ? 'bg-success' : 'bg-danger'}">${parsed}/4 ${isUp ? '↑' : '↓'}</span>`;
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
                        return `<a href="${tvLink}" target="_blank" class="btn btn-sm btn-secondary"><em class="icon ni ni-eye"></em> View</a>`;
                    }
                },
                {
                    data: 'id',
                    title: 'Manage',
                    orderable: false,
                    render: function (data, type, row, meta) {
                        const tableId = meta.settings.sTableId;

                        const editBtn = `
                            <button class="btn btn-sm btn-primary edit-alert dynamicModalLoader"
                                data-formtype="Alerts"
                                data-endpoint="createTradeAlert"
                                data-accountid="${data}">
                                <i class="icon ni ni-edit"></i> Edit
                            </button>`;

                        const manageBtn = `
                            <button class="btn btn-sm btn-success manage-alert dynamicModalLoader"
                                data-formtype="Alerts"
                                data-endpoint="manageTradeAlert"
                                data-accountid="${data}">
                                <i class="icon ni ni-chat"></i> Manage
                            </button>`;

                        const deleteBtn = `
                            <button class="btn btn-sm btn-danger delete-alert" data-id="${data}">
                                <i class="icon ni ni-trash"></i> Hide
                            </button>`;

                        if (tableId === 'confirmedTradeAlertTable') {
                            return editBtn + manageBtn + deleteBtn;
                        }

                        return editBtn + deleteBtn;
                    }
                }
            ];
        }

        const $searchInput = $('input[name="q"]');

        function baseAjaxConfig(isConfirmed) {
            return {
                url: '<?= site_url("API/Alerts/getFilteredAlerts"); ?>',
                type: 'POST',
                data: function (params) {
                    params.q = $searchInput.length ? $searchInput.val() : '';
                    params.timeRange = $('#timeFilter').val();
                    params.category = $('#categoryFilter').val();
                    params.alert_created = isConfirmed ? 1 : 0;
                    if (csrfName && csrfHash) {
                        params[csrfName] = csrfHash;
                    }
                },
                dataSrc: function (json) {
                    if (json && json.csrfName && json.csrfHash) {
                        updateCsrfToken(json.csrfName, json.csrfHash);
                    } else if (json && json.csrfHash && csrfName) {
                        updateCsrfToken(csrfName, json.csrfHash);
                    }

                    if (!json || !Array.isArray(json.data)) {
                        console.warn('Unexpected Alerts response shape', json);
                        return [];
                    }

                    return json.data;
                },
                error: function (xhr) {
                    console.error('Failed to load alerts table data', xhr.responseText);
                }
            };
        }

        const dataTableOptions = {
            processing: true,
            serverSide: true,
            destroy: true,
            deferRender: true,
            searchDelay: 300,
            pageLength: 50,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            order: [[0, 'desc']],
            columns: getColumnConfig()
        };

        const confirmedTable = $('#confirmedTradeAlertTable').length
            ? $('#confirmedTradeAlertTable').DataTable({
                ...dataTableOptions,
                ajax: baseAjaxConfig(true)
            })
            : null;

        <?php if ($cuRole <= 3): ?>
        const pendingTable = $('#pendingTradeAlertTable').length
            ? $('#pendingTradeAlertTable').DataTable({
                ...dataTableOptions,
                ajax: baseAjaxConfig(false)
            })
            : null;
        <?php else: ?>
        const pendingTable = null;
        <?php endif; ?>

        $('#timeFilter, #categoryFilter').on('change', function () {
            if (confirmedTable) {
                confirmedTable.ajax.reload();
            }
            if (pendingTable) {
                pendingTable.ajax.reload();
            }
        });

        $('#toggleColumnsBtn').on('click', function () {
            const selectors = ['#confirmedTradeAlertTable'<?php if ($cuRole <= 3): ?>, '#pendingTradeAlertTable'<?php endif; ?>];
            if (!$.fn.DataTable.isDataTable(selectors[0])) {
                return;
            }

            const mainTable = $(selectors[0]).DataTable();
            const columnNames = [
                'locked_profit_stop',
                'trailing_stop_percent',
                'delta_gain',
                'target_price',
                'ema_3_8',
                'ema_8_13',
                'ema_13_34',
                'ema_34_48',
                'ema_consensus'
            ];

            const currentlyVisible = mainTable.column(`${columnNames[0]}:name`).visible();
            const willShow = !currentlyVisible;

            $(this).html(willShow
                ? '<i class="icon ni ni-refresh"></i> Hide Extra Columns'
                : '<i class="icon ni ni-refresh"></i> Show More Columns');

            selectors.forEach(function (selector) {
                if ($.fn.DataTable.isDataTable(selector)) {
                    const dt = $(selector).DataTable();
                    columnNames.forEach(function (name) {
                        const column = dt.column(`${name}:name`);
                        if (column && column.header()) {
                            column.visible(willShow);
                        }
                    });
                }
            });
        });

        const overlay = document.getElementById('inactivityOverlay');
        const resumeBtn = document.getElementById('resumeProcessing');
        const inactivityLimit = 5 * 60 * 1000;
        const refreshInterval = 5 * 60 * 1000;
        let userLastActive = Date.now();
        let refreshTimer = null;

        function hideOverlay() {
            if (overlay) {
                overlay.style.display = 'none';
            }
        }

        function showOverlay() {
            if (overlay) {
                overlay.style.display = 'block';
            }
        }

        function scheduleRefresh() {
            if (refreshTimer) {
                clearTimeout(refreshTimer);
            }

            refreshTimer = setTimeout(function () {
                if (Date.now() - userLastActive > inactivityLimit) {
                    showOverlay();
                    refreshTimer = null;
                    return;
                }

                if (confirmedTable) {
                    confirmedTable.ajax.reload(null, false);
                }
                if (pendingTable) {
                    pendingTable.ajax.reload(null, false);
                }

                scheduleRefresh();
            }, refreshInterval);
        }

        ['mousemove', 'keydown', 'scroll', 'click'].forEach(function (evt) {
            document.addEventListener(evt, function () {
                userLastActive = Date.now();
                hideOverlay();
                if (!refreshTimer) {
                    scheduleRefresh();
                }
            });
        });

        if (resumeBtn) {
            resumeBtn.addEventListener('click', function () {
                userLastActive = Date.now();
                hideOverlay();
                scheduleRefresh();
            });
        }

        scheduleRefresh();
    });
})();
</script>
<?= $this->endSection() ?>