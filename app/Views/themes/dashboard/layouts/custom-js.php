<?php
// app/Views/themes/dashboard/layouts/custom-js.php
$totalSegments = $uri->getTotalSegments();
$pageURIA = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID = $totalSegments >= 4 ? $uri->getSegment(4) : null;

$nonce = $nonce ?? ['style' => '', 'script' => ''];
$subViewData = [
    'uri' => $uri,
    'cuID' => $cuID,
    'siteSettings' => $siteSettings,
    'pageTitle' => $pageTitle,
    'nonce' => $nonce,
    'csp' => $csp ?? [],
    'theme' => $theme ?? 'dashboard',
    'bodyClass' => $bodyClass ?? '',
    'bodyData' => $bodyData ?? [],
    'pageURIA' => $pageURIA,
    'pageURIB' => $pageURIB,
    'pageURIC' => $pageURIC,
    'pageURID' => $pageURID,
    'currentUser' => $currentUser,
    'useDataTables' => $useDataTables ?? false,
    'useDatepicker' => $useDatepicker ?? false,
    'useTradingView' => $useTradingView ?? false,
    'useExchangeJS' => $useExchangeJS ?? false,
    'useGoogleTreemap' => $useGoogleTreemap ?? false,
    'useRealTimeData' => $useRealTimeData ?? false,
    'useTawkTo' => $useTawkTo ?? false,
    'useWonderpush' => $useWonderpush ?? false,
    'useGoogleAnalytics' => $useGoogleAnalytics ?? true,
    'useSummernote' => $useSummernote ?? false, // Default to false if not set
    'useSelect2' => $useSelect2 ?? false, // Default to false if not set
    'useChartJS' => $useChartJS ?? false, // Default to false if not set
    'useAOS' => $useAOS ?? false, // Default to false if
    'useClipboardJS' => $useClipboardJS ?? false, // Default to false if not set
    'useBootstrapIcons' => $useBootstrapIcons ?? false, // Default to false if not set
    'useFontAwesome' => $useFontAwesome ?? false, // Default to false if not set
    'useFeatherIcons' => $useFeatherIcons ?? false, // Default to false if not set
    'useIonIcons' => $useIonIcons ?? false, // Default to false if not set
    'useRemixIcons' => $useRemixIcons ?? false, // Default to false if not set
    'useThemifyIcons' => $useThemifyIcons ?? false, // Default to false if not set
    'useWeatherIcons' => $useWeatherIcons ?? false, // Default to false if not set
    'useLineIcons' => $useLineIcons ?? false, // Default to false if not set
    'useCryptoIcons' => $useCryptoIcons ?? false, // Default to false if not set
    'useFlagIcons' => $useFlagIcons ?? false, // Default to false if not set
    'usePaymentIcons' => $usePaymentIcons ?? false, // Default to false if not set
    'useCustomIcons' => $useCustomIcons ?? false, // Default to false if not set    
];

echo view('themes/dashboard/partials/custom-js/Digibyte-js', $subViewData);
echo view('themes/dashboard/partials/custom-js/modals', $subViewData);

if (!empty($useDataTables)) {
    echo view('themes/dashboard/partials/custom-js/datatables', $subViewData);
}
if (!empty($useDatepicker)) {
    echo view('themes/dashboard/partials/custom-js/datepicker', $subViewData);
}
if (!empty($useTradingView)) {
    echo view('themes/dashboard/partials/custom-js/tradingview', $subViewData);
}
if (!empty($useExchangeJS)) {
    echo view('themes/dashboard/partials/custom-js/Exchange-js', $subViewData);
}
if (!empty($useGoogleTreemap)) {
    echo view('themes/dashboard/partials/custom-js/google-treemap', $subViewData);
}
if (!empty($useRealTimeData)) {
    echo view('themes/dashboard/partials/custom-js/realTimeData', $subViewData);
}
if (!empty($useTawkTo)) {
    echo view('themes/dashboard/partials/custom-js/tawk-to', $subViewData);
}
if (!empty($useWonderpush)) {
    echo view('themes/dashboard/partials/custom-js/wonderpush', $subViewData);
}
if ($useGoogleAnalytics ?? true) {
    echo view('themes/dashboard/partials/custom-js/Google_Analytics', $subViewData);
}
?>
<script <?= $nonce['script'] ?? '' ?>>
    // Dynamically update CSRF token on page load and after AJAX requests
    document.addEventListener('DOMContentLoaded', () => {
        const csrfMeta = document.querySelector('meta[name="' + window.CSRF_TOKEN.name + '"]');
        if (csrfMeta) {
            csrfMeta.setAttribute('content', window.CSRF_TOKEN.hash);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElements.forEach(function (dropdown) {
            new bootstrap.Dropdown(dropdown);
        });
    });

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Copied to clipboard!');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }

    function copyAddressToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Address Copied to clipboard!');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }

    (function startWhenJQueryReady(){
        if (typeof window.jQuery === 'undefined') {
            return setTimeout(startWhenJQueryReady, 50);
        }

        const $ = window.jQuery;

        $(document).ajaxComplete((event, xhr) => {
            const newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
            const newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');

            if (newCsrfName && newCsrfHash) {
                window.CSRF_TOKEN.name = newCsrfName;
                window.CSRF_TOKEN.hash = newCsrfHash;
                const csrfMeta = document.querySelector('meta[name="' + newCsrfName + '"]');
                if (csrfMeta) {
                    csrfMeta.setAttribute('content', newCsrfHash);
                }
            }
        });

        $(function() {
            console.log('Document is ready');
            $('.nk-menu-item.has-sub.nk-menu-sub').removeClass('active current-page');
            $('.nk-menu-toggle').on('click', function(e) {
                e.preventDefault();
                let $submenu = $(this).next('.nk-menu-sub');
                $submenu.slideToggle();
                $(this).parent().toggleClass('active');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.nk-menu-item.has-sub').length) {
                    $('.nk-menu-sub').slideUp();
                    $('.nk-menu-item.has-sub').removeClass('active');
                }
            });
            $('.nk-nav-toggle').on('click', function(e) {
                e.preventDefault();
                var sidebarId = $(this).data('target');
                $('#' + sidebarId).toggleClass('show');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#sidebarMenu, .nk-nav-toggle').length) {
                    $('#sidebarMenu').removeClass('show');
                }
            });
            <?php if (!empty($useSummernote)) : ?>
            if ($.fn.summernote) {
                $('.summernote').summernote({
                    height: 300,
                    placeholder: 'Write here...',
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            }
            <?php endif; ?>
            $('input[name="q"]').on('keyup', function() {
                var keyword = $(this).val();
                if (keyword.length > 2) {
                    $.get('<?= site_url("/search"); ?>', { q: keyword }, function(data) {
                        $('.search-results').html(data);
                    });
                }
            });
            $('body').on('click', '.close', function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    })();
</script>
<?php if ($pageURIA === 'Dashboard') : ?>
<script <?= $nonce['script'] ?? '' ?>>
    (function ensureTooltipReady(){
        if (typeof window.jQuery === 'undefined') {
            return setTimeout(ensureTooltipReady, 50);
        }

        window.jQuery(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    })();
</script>
<?php endif; ?>
<?php if ($pageURIA === 'Alerts' || $pageURIB === 'Alerts') : ?>
    <!-- JavaScript -->
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    console.log('✅ Document is ready.');

    let csrfName = $('meta[name="csrf-name"]').attr('content');
    let csrfHash = $('meta[name="csrf-hash"]').attr('content');

    function updateCsrfToken(newCsrfName, newCsrfHash) {
        csrfName = newCsrfName;
        csrfHash = newCsrfHash;
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
                    if (row.exchange && row.exchange !== "N/A" && row.exchange !== "Unknown") {
                        return `
                            <a href="https://www.tradingview.com/symbols/${row.exchange}-${data}/financials-overview/" 
                                target="_blank" 
                                class="text-primary">
                                ${data}
                            </a>
                            <a href="https://www.tradingview.com/symbols/${row.exchange}-${data}/news/" 
                                target="_blank" 
                                class="text-primary">
                                <i class="icon ni ni-info"></i>
                            </a>
                        `;
                    } else {
                        return `<span class="text-muted">${data} (No Exchange)</span>`;
                    }
                }
            },
            {
                data: 'exchange',
                title: 'Exchange',
                orderable: true,
                render: function (data, type, row) {
                    let exchangeDisplay = data ? data : '<span class="text-muted">N/A</span>';
                    if (!data || data === "N/A" || data === "Unknown") {
                        exchangeDisplay += ` 
                            <a class="dynamicModalLoader btn btn-xs btn-warning" 
                            data-formtype="Alerts" 
                            data-endpoint="updateExchange" 
                            data-accountid="${row.id}" 
                            data-ticker="${row.ticker}">
                            <em class="icon ni ni-plus"></em>
                            </a>`;
                    }
                    return exchangeDisplay;
                }
            },
            { data: 'category', title: 'Category', orderable: true },
            { 
                data: 'price', 
                name: 'price', 
                title: 'Market Price', 
                render: function (data, type, row) {
                    return data ? `$${parseFloat(data).toFixed(2)}` : '<span class="text-muted">N/A</span>';
                }
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
                visible: true, // Hidden by default
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
            {
                data: 'target_price',
                name: 'target_price',
                title: 'Target (3%)',
                visible: false,
                render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : 'N/A'
            },
            {
                data: 'locked_profit_stop',
                name: 'locked_profit_stop',
                title: 'Profit Lock Stop',
                visible: false,
                render: (data) => data ? `$${parseFloat(data).toFixed(2)}` : 'N/A'
            },
            {
                data: 'trailing_stop_percent',
                name: 'trailing_stop_percent',
                title: 'Trailing %',
                visible: false,
                render: (data) => data ? `${data}%` : 'N/A'
            },      
            {
                data: 'ema_3_8',
                name: 'ema_3_8',
                title: '3/8 EMA',
                visible: false,
                render: function (data) {
                    if (data === 'up') {
                        return '<span class="badge bg-success">↑</span>';
                    } else if (data === 'down') {
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
                    return data === 'up' ? '<span class="badge bg-success">↑</span>' :
                        data === 'down' ? '<span class="badge bg-danger">↓</span>' :
                        '<span class="text-muted">N/A</span>';
                }
            },
            {
                data: 'ema_13_34',
                name: 'ema_13_34',
                title: '13/34 EMA',
                visible: false,
                render: function (data) {
                    return data === 'up' ? '<span class="badge bg-success">↑</span>' :
                        data === 'down' ? '<span class="badge bg-danger">↓</span>' :
                        '<span class="text-muted">N/A</span>';
                }
            },
            {
                data: 'ema_34_48',
                name: 'ema_34_48',
                title: '34/48 EMA',
                visible: false,
                render: function (data) {
                    return data === 'up' ? '<span class="badge bg-success">↑</span>' :
                        data === 'down' ? '<span class="badge bg-danger">↓</span>' :
                        '<span class="text-muted">N/A</span>';
                }
            },
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
                        return `<a href="${data}" target="_blank" class="btn btn-sm btn-info">
                                    <em class="icon ni ni-eye"></em> View
                                </a>`;
                    } else {
                        const tvLink = `https://www.tradingview.com/symbols/${row.exchange}-${row.ticker}/`;
                        return `<a href="${tvLink}" target="_blank" class="btn btn-sm btn-secondary">
                                    <em class="icon ni ni-eye"></em>
                                </a>
                                <a class="dynamicModalLoader btn btn-sm btn-warning" 
                                    data-formtype="Alerts" 
                                    data-endpoint="addChart" 
                                    data-accountid="${row.id}">
                                    <em class="icon ni ni-plus"></em>
                                </a>`;
                    }
                }
            },
            {
                data: 'id',
                title: 'Manage',
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <a class="btn btn-sm btn-primary edit-alert" data-id="${data}">
                            <i class="icon ni ni-edit"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger delete-alert" data-id="${data}">
                            <i class="icon ni ni-trash"></i> Hide
                        </button>
                    `;
                }
            }
        ];
    }

    // ✅ Check if Table Exists Before Initializing DataTable
    if ($('#confirmedTradeAlertTable').length) {
        let confirmedTable = $('#confirmedTradeAlertTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url("API/Alerts/getFilteredAlerts"); ?>',
                type: 'POST',
                data: function (d) {
                    d.timeRange = $('#timeFilter').val();
                    d.category = $('#categoryFilter').val();
                    d.alert_created = 1;
                    d[csrfName] = csrfHash;
                }
            },
            order: [[0, 'desc']],
            pageLength: 10,
            columns: getColumnConfig()
        });
    }

    <?php if ($cuRole <= 3): ?>
    if ($('#pendingTradeAlertTable').length) {
        let pendingTable = $('#pendingTradeAlertTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url("API/Alerts/getFilteredAlerts"); ?>',
                type: 'POST',
                data: function (d) {
                    d.timeRange = $('#timeFilter').val();
                    d.category = $('#categoryFilter').val();
                    d.alert_created = 0;
                    d[csrfName] = csrfHash;
                }
            },
            order: [[0, 'desc']],
            pageLength: 25,
            columns: getColumnConfig()
        });
    }
    <?php endif; ?>

    // 🔄 Toggle Columns Logic
    let columnsVisible = false;
    
    $('#toggleColumnsBtn').on('click', function () {
        const columnNames = [
            'locked_profit_stop',
            'trailing_stop_percent',
            'delta_gain',
            'locked_profit_stop',
            'trailing_stop_percent',
            'ema_3_8',
            'ema_8_13',
            'ema_13_34',
            'ema_34_48'
        ];

        const tables = ['#confirmedTradeAlertTable', '#pendingTradeAlertTable'];

        // Get current visibility status from the first table
        const mainTable = $(tables[0]).DataTable();
        const isCurrentlyHidden = !mainTable.column(`${columnNames[0]}:name`).visible();

        // Toggle button label
        $(this).html(isCurrentlyHidden 
            ? '<i class="icon ni ni-refresh"></i> Hide Extra Columns'
            : '<i class="icon ni ni-refresh"></i> Show More Columns');

        tables.forEach(selector => {
            if ($.fn.DataTable.isDataTable(selector)) {
                const dt = $(selector).DataTable();

                // Toggle responsive class for scroll
                if (isCurrentlyHidden) {
                    $(selector).closest('.dataTables_wrapper').addClass('table-responsive');
                } else {
                    $(selector).closest('.dataTables_wrapper').removeClass('table-responsive');
                }

                // Toggle visibility of specified columns
                columnNames.forEach(name => {
                    const col = dt.column(`${name}:name`);
                    if (col && col.header()) {
                        col.visible(isCurrentlyHidden);
                    }
                });

                // Adjust Manage buttons for space
                dt.rows().every(function () {
                    const $cell = $(this.node()).find('td:last');
                    const $editBtn = $cell.find('.edit-alert');
                    const $deleteBtn = $cell.find('.delete-alert');

                    if (isCurrentlyHidden) {
                        $editBtn.html('<i class="icon ni ni-edit"></i>');
                        $deleteBtn.html('<i class="icon ni ni-trash"></i>');
                    } else {
                        const id = $editBtn.data('id');
                        $editBtn.html(`<i class="icon ni ni-edit"></i> Edit`).attr('data-id', id);

                        const delId = $deleteBtn.data('id');
                        $deleteBtn.html(`<i class="icon ni ni-trash"></i> Hide`).attr('data-id', delId);
                    }
                });
            }
        });
    });

    let userLastActive = Date.now();
    const inactivityLimit = 5 * 60 * 1000; // 5 minutes
    const overlay = document.getElementById('inactivityOverlay');
    let processing = true;
    let currentOffset = 0;
    const batchSize = 25;

    // ⏱️ Reset on activity
    function resetActivityTimer() {
        userLastActive = Date.now();
        overlay.style.display = 'none';
    }
    ['mousemove', 'keydown', 'scroll', 'click'].forEach(evt =>
        document.addEventListener(evt, resetActivityTimer)
    );

    // ⏰ Periodic check
    setInterval(() => {
        if (Date.now() - userLastActive > inactivityLimit) {
            processing = false;
            overlay.style.display = 'block';
        }
    }, 30000); // every 30s

    // ✅ Resume when user clicks overlay button
    document.getElementById('resumeProcessing').addEventListener('click', () => {
        userLastActive = Date.now();
        overlay.style.display = 'none';
        if (!processing) {
            processing = true;
            processNextBatch(); // resume
        }
    });

    // 🔁 Batch rotation logic
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
                console.log(`Processed trade alert batch offset: ${currentOffset}`);

                // Reload tables to show updated data
                $('#confirmedTradeAlertTable').DataTable().ajax.reload(null, false);
                <?php if ($cuRole <= 3): ?> 
                $('#pendingTradeAlertTable').DataTable().ajax.reload(null, false);
                <?php endif; ?>

                // Rotate or reset
                currentOffset = res.reachedEnd ? 0 : currentOffset + batchSize;

                // Schedule next batch if user still active
                if (Date.now() - userLastActive < inactivityLimit) {
                    setTimeout(processNextBatch, 300000); // 5 minutes
                } else {
                    processing = false;
                    overlay.style.display = 'block';
                }
            },
            error: function (xhr) {
                console.error('Batch processing failed:', xhr.responseText);
            }
        });
    }

    // 🚀 Start initial polling on load
    processNextBatch();
    
    function refreshPricesEveryMinute() {
        setInterval(() => {
            $.ajax({
                url: '<?= site_url("API/Alerts/getLatestPrices"); ?>',
                type: 'GET',
                success: function (response) {
                    if (response.status === 'success') {
                        response.data.forEach(function (alert) {
                            const table = $('#confirmedTradeAlertTable').DataTable();
                            const rowIdx = table.rows().eq(0).filter(function (rowIdx) {
                                return table.cell(rowIdx, 0).data() == alert.id; // match ID
                            });

                            if (rowIdx.length > 0) {
                                const currentRowData = table.row(rowIdx[0]).data();
                                currentRowData.price = alert.price;
                                table.row(rowIdx[0]).data(currentRowData).invalidate().draw(false);
                            }
                        });
                    }
                },
                error: function (xhr) {
                    console.error('❌ Error refreshing market prices:', xhr.responseText);
                }
            });
        }, 60000); // ⏱️ every 60 seconds
    }

    // 🟢 Start polling after DOM ready
    refreshPricesEveryMinute();

    // ✅ Refresh Data on Filter Change
    $('#timeFilter, #categoryFilter').on('change', function () {
        if ($('#confirmedTradeAlertTable').length) {
            $('#confirmedTradeAlertTable').DataTable().ajax.reload();
        }
        <?php if ($cuRole <= 3): ?> 
        if ($('#pendingTradeAlertTable').length) {
            $('#pendingTradeAlertTable').DataTable().ajax.reload(); 
        }
        <?php endif; ?>
    });

    // ✅ Handle Creating New Trade Alert
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
                $('#confirmedTradeAlertTable').DataTable().ajax.reload();
                <?php if ($cuRole <= 3): ?> $('#pendingTradeAlertTable').DataTable().ajax.reload(); <?php endif; ?>
            },
            error: function (xhr) {
                alert("Error creating trade alert.");
                console.error(xhr.responseText);
            }
        });
    });

    // ✅ Handle Editing an Alert
    $(document).on('click', '.edit-alert', function () {
        let alertId = $(this).data('id');
        $.ajax({
            url: '<?= site_url("API/Alerts/createTradeAlert"); ?>',
            type: 'POST',
            data: { alert_id: alertId, [csrfName]: csrfHash },
            success: function (response) {
                alert("Trade alert updated successfully!");
                $('#confirmedTradeAlertTable').DataTable().ajax.reload();
                <?php if ($cuRole <= 3): ?> $('#pendingTradeAlertTable').DataTable().ajax.reload(); <?php endif; ?>
            },
            error: function (xhr) {
                alert("Error updating trade alert.");
                console.error(xhr.responseText);
            }
        });
    });

    // ✅ Handle Hiding an Alert
    $(document).on('click', '.delete-alert', function () {
        let alertId = $(this).data('id');
        if (confirm('Are you sure you want to hide this alert?')) {
            $.ajax({
                url: '<?= site_url("API/Alerts/hideTradeAlert"); ?>',
                type: 'POST',
                data: { alert_id: alertId, [csrfName]: csrfHash },
                success: function (response) {
                    alert(response.message);
                    $('#confirmedTradeAlertTable').DataTable().ajax.reload();
                    <?php if ($cuRole <= 3): ?> $('#pendingTradeAlertTable').DataTable().ajax.reload(); <?php endif; ?>
                },
                error: function (xhr) {
                    alert("Error hiding alert.");
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

</script>
<script <?= $nonce['script'] ?? '' ?>>
setInterval(() => {
    fetch('/index.php/API/Alerts/getLatestPrices')
        .then(res => res.json())
        .then(response => {
            if (response.status === 'success') {
                const prices = response.prices;
                // Loop through rows and update the price column
                $('#alertsTable tbody tr').each(function () {
                    const row = $(this);
                    const ticker = row.find('td:eq(1)').text().trim(); // Adjust column index
                    if (prices[ticker]) {
                        row.find('td.price-cell').text(`$${prices[ticker].toFixed(2)}`);
                    }
                });
            }
        });
}, 60000); // every 60s
</script>
<?php endif; ?>
<?php if ($pageURIA === 'Budget') : ?>
    <script type="module" src="<?= base_url('assets/js/app/budget-dashboard.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>
<?php endif; ?>


<?php if (ENVIRONMENT !== 'production') : ?>
    <script src="<?= base_url('assets/js/dev-html-guard.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>
<?php endif; ?>

<script <?= $nonce['script'] ?? '' ?>>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('/sw.js').catch(function (err) {
      console.warn('SW register failed:', err);
    });
  });
}
</script>
