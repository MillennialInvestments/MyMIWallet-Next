<?php // echo view('App\Views\errors\html\under_construction'); ?>
<?php
/* Development Tasks */
// !! Add price_target and stop_loss to capture customer sentiment and price estimations
// !! Connect SYMBOL input to Ticker Library
// !! Activate Formula Bar and Add Column 
?>
<!-- app/Modules/User/Views/Investments/tradeTracker.php -->
<?php
$predefinedAnalytics = [];
$customizableFeaturesEnabled = 0;
?>
<!-- Include CSS and JS for DataTables -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/jquery.dataTables.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/dataTables.bootstrap5.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<script src="<?= base_url('assets/vendor/jquery/jquery-3.6.0.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script src="<?= base_url('assets/vendor/datatables/1.11.5/js/jquery.dataTables.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script src="<?= base_url('assets/vendor/datatables/1.11.5/js/dataTables.bootstrap5.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script> -->
<div class="nk-block">
    <div class="g-gs row">
        <div class="col-md-12 col-xl-12">
            <a class="btn btn-primary" href="<?= site_url('/Investments') ?>">
                <em class="icon ni ni-arrow-left"></em> Back to Investments
            </a>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Portfolio Manager</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <button id="add-trade-btn" class="btn btn-secondary">Add Trade</button>
                                <?php if($customizableFeaturesEnabled === 1) : ?>
                                <button id="add-column-btn" class="btn btn-secondary">Add Column</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <?php if($customizableFeaturesEnabled === 1) : ?>
                                <!-- Formula Bar -->
                                <div class="mb-3 d-none">
                                    <label for="formula-bar" class="form-label">Formula Bar</label>
                                    <input type="text" id="formula-bar" class="form-control" placeholder="Enter or edit formula" readonly>
                                </div>
                                <?php endif; ?>
                                <!-- Table Container -->
                                <div class="mt-4">
                                    <table id="trade-tracker-table" class="display" style="width:100%">
                                        <thead>
                                            <tr id="table-headers">
                                                <th></th>
                                                <th>Symbol</th>
                                                <th>Status</th>
                                                <th>Shares</th>
                                                <th>Entry Price</th>
                                                <th>Current Price</th>
                                                <th>Net Gain</th>
                                                <th>Manage</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($predefinedAnalytics)): ?>
                                                <?php foreach ($predefinedAnalytics as $row): ?>
                                                    <tr>
                                                        <td><?= $row['symbol'] ?? '' ?></td>
                                                        <td><?= $row['order_status'] ?? '' ?></td>
                                                        <td><?= $row['shares'] ?? 0 ?></td>
                                                        <td><?= $row['entry_price'] ?? 0.00 ?></td>
                                                        <td><?= $row['current_price'] ?? 0.00 ?></td>
                                                        <td><?= $row['net_gain'] ?? 0.00 ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No data available.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mt-4">
                            <button id="save-btn" class="btn btn-success">Save</button>
                            <button id="export-btn" class="btn btn-primary">Export Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Summary Modal -->
<div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="summaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="summaryModalLabel">Trade Summary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="white-space: pre-line; font-family: monospace;"></div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    console.log("Document is ready");

    let isFeatureEnabled = 0;

    function toggleFeatures() {
        if (isFeatureEnabled === 1) {
            $('#formula-bar').closest('.mb-3').show();
            $('#add-column-btn').show();
        } else {
            $('#formula-bar').closest('.mb-3').hide();
            $('#add-column-btn').hide();
        }
    }

    // Initialize DataTable
    let tableHeaders = [
        {
            title: "Symbol",
            data: "symbol",
            render: function (data, type, row) {
                // Render an input field with a placeholder
                return `<input type="text" class="form-control symbol-input" placeholder="--Enter Symbol--" value="${data || ''}">`;
            },
            className: "editable-cell",
        },
        {
            title: "Order Status", // New Column
            data: "order_status",
            render: function (data, type, row) {
                // Check the data type to ensure dropdown renders correctly
                const selectedOpen = data === "Open" ? "selected" : "";
                const selectedClosed = data === "Closed" ? "selected" : "";
                
                return `
                    <select class="form-control order-status-select">
                        <option value="Open" ${selectedOpen}>Open</option>
                        <option value="Closed" ${selectedClosed}>Closed</option>
                    </select>`;
            },
            className: "editable-cell",
        }, 
        { title: "Shares", data: "shares", defaultContent: 0, className: "editable-cell" },
        { title: "Entry Price", data: "entry_price", defaultContent: 0.00, className: "editable-cell" },
        { title: "Current Price", data: "current_price", defaultContent: 0.00, className: "editable-cell" },
        {
            title: "Trade Cost",
            data: null,
            render: function (data) {
                return (data.shares * data.entry_price).toFixed(2);
            },
            className: "disabled-cell",
            orderable: false,
        },
        {
            title: "Net Gain",
            data: null,
            render: function (data) {
                return ((data.current_price - data.entry_price) * data.shares).toFixed(2);
            },
            className: "disabled-cell",
            orderable: false,
        },
        {
            title: "Manage",
            data: null,
            orderable: false,
            defaultContent: `
                <button class="btn btn-success btn-save d-none">Save</button>
                <button class="btn btn-danger btn-delete">Delete</button>`,
        },
    ];

    let table = $('#trade-tracker-table').DataTable({
        ajax: {
            url: "<?= site_url('Trade-Tracker/getTradeData') ?>",
            dataSrc: "trades",
        },
        columns: [
            { title: "", data: "id", orderable: false, searchable: false },
            ...tableHeaders,
        ],
        responsive: true,
        autoWidth: false,
    });

    // Add a new trade row
    $('#add-trade-btn').on('click', function () {
        const newRow = {
            id: "",
            symbol: "--Enter Symbol--",
            order_status: "Open", // Default to "Open"
            trade_type: "Manual Trade",
            shares: 0,
            entry_price: 0.00,
            current_price: 0.00,
        };
        table.row.add(newRow).draw(false);
    });

    // Enable inline editing for editable cells
    $('#trade-tracker-table tbody').on('click', '.editable-cell', function () {
        // Skip cells containing a select element
        if ($(this).find('select').length > 0) {
            return; // Skip editing for dropdown cells
        }

        if (!$(this).hasClass('editing')) {
            const value = $(this).text().trim();
            $(this).html(`<input type="text" class="form-control" value="${value}">`).addClass('editing');
            $(this).find('input').focus();
        }
    });

    // Handle input blur and update derived fields
    $('#trade-tracker-table tbody').on('blur', '.editable-cell input', function () {
        const cell = $(this).closest('td');
        const value = $(this).val().trim();
        const columnIndex = cell.index();
        const row = cell.closest('tr');
        const rowData = table.row(row).data();

        // Update the DataTable row data
        switch (columnIndex) {
            case 1: rowData.symbol = value; break;
            case 3: rowData.shares = parseFloat(value) || 0; break;
            case 4: rowData.entry_price = parseFloat(value) || 0.00; break;
            case 5: rowData.current_price = parseFloat(value) || 0.00; break;
        }

        // Re-render the row to reflect updated values
        table.row(row).data(rowData).invalidate().draw(false);
        cell.text(value).removeClass('editing');

        // Manually trigger update for derived fields
        updateDerivedFields(row);
        row.find('.btn-save').show();
    });

    // Handle change for order_status dropdown
    $('#trade-tracker-table tbody').on('change', '.order-status-select', function () {
        const cell = $(this).closest('td');
        const row = cell.closest('tr');
        const rowData = table.row(row).data();

        // Update order_status in row data
        rowData.order_status = $(this).val();

        // Re-render the row to reflect updated values
        table.row(row).data(rowData).invalidate().draw(false);
        row.find('.btn-save').show();
    });


    // Update derived fields: Trade Cost and Net Gain
    function updateDerivedFields(row) {
        const rowData = table.row(row).data();
        const id = rowData.id; 
        const trade_type = rowData.trade_type || 'Manual Trade'; 
        const shares = parseFloat(rowData.shares) || 0;
        const entryPrice = parseFloat(rowData.entry_price) || 0;
        const currentPrice = parseFloat(rowData.current_price) || 0;
        // Ensure values are non-negative
        rowData.total_trade_costs = Math.max(0, shares * entryPrice);
        rowData.net_gains = Math.max(0, (shares * currentPrice) - rowData.total_trade_costs);

        // Update the UI for derived fields
        row.find('td').eq(6).text(rowData.total_trade_costs.toFixed(2)); // Trade Cost
        row.find('td').eq(7).text(rowData.net_gains.toFixed(2)); // Net Gain
    }

    // Save individual trade row
    $('#trade-tracker-table tbody').on('click', '.btn-save', function () {
        const row = $(this).closest('tr');
        const rowData = table.row(row).data();

        const payload = {
            trade: {
                id: rowData.id || null,
                symbol: rowData.symbol || '',
                order_status: rowData.order_status || 'Open', // Include order_status
                shares: parseFloat(rowData.shares) || 0,
                entry_price: parseFloat(rowData.entry_price) || 0.00,
                current_price: parseFloat(rowData.current_price) || 0.00,
                total_trade_costs: parseFloat(rowData.shares) * parseFloat(rowData.entry_price) || 0.00,
                net_gains: (parseFloat(rowData.shares) * parseFloat(rowData.current_price)) - 
                        (parseFloat(rowData.shares) * parseFloat(rowData.entry_price)) || 0.00,
                user_id: <?= $cuID ?>, // Add user ID dynamically
            },
        };

        console.log("Saving Trade Data:", payload);

        $.ajax({
            url: "<?= site_url('Trade-Tracker/saveTradeData') ?>",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(payload),
            success: function (response) {
                alert("Trade saved successfully.");
                table.ajax.reload();
            },
            error: function (xhr) {
                console.error("Error saving trade:", xhr.responseText);
            },
        });

        $(this).hide(); // Hide save button after saving
    });

    // Style for disabled cells
    $('<style <?= $nonce['style'] ?? '' ?>>')
        .prop('type', 'text/css')
        .html(`
            .editing input { width: 100%; }
            .active-row { background-color: #f9f9f9; }
            td.disabled-cell {
                pointer-events: none;
                background-color: #e9ecef;
            }
        `)
        .appendTo('head');
});

</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const refreshBtn = document.getElementById('refreshPricesBtn');
    const statusBox = document.getElementById('statusBox');
    $('#summaryModal .modal-body').text(summary);
    $('#summaryModal').modal('show');
    async function fetchLatestPrices() {
        if (!statusBox) return;
        statusBox.innerText = '🔄 Fetching prices...';

        try {
            const res = await fetch('/index.php/API/Alerts/getLatestPrices');
            const data = await res.json();

            if (data.status === 'success') {
                const updated = data.updated || {};
                Object.entries(updated).forEach(([symbol, price]) => {
                    const row = document.querySelector(`tr[data-symbol="${symbol}"]`);
                    if (row) {
                        const priceCell = row.querySelector('.price');
                        if (priceCell) {
                            priceCell.innerText = price;
                        }
                    }
                });
                statusBox.innerText = `✅ Updated ${Object.keys(updated).length} tickers.`;
            } else {
                statusBox.innerText = '❌ Could not fetch prices.';
            }
        } catch (e) {
            console.error(e);
            statusBox.innerText = '❌ Error occurred while fetching prices.';
        }
    }

    if (refreshBtn) {
        refreshBtn.addEventListener('click', fetchLatestPrices);
    }

    fetchLatestPrices(); // initial fetch
    setInterval(fetchLatestPrices, 30000); // auto-update every 30s
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    const csrfName = $('meta[name="csrf-token-name"]').attr('content');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const csrfHash = $('input[name="' + csrfName + '"]').val();

    let table = $('#trade-tracker-table').DataTable({
        ajax: {
            url: '/index.php/Trade-Tracker/getTradeData',
            dataSrc: 'trades'
        },
        columns: [
            { title: '', data: 'id', orderable: false },
            {
                title: 'Symbol', data: 'symbol',
                render: function (data) {
                    return `<input type="text" class="form-control symbol-input" value="${data || ''}" placeholder="Symbol">`;
                }
            },
            {
                title: 'Status', data: 'order_status',
                render: function (data) {
                    return `
                        <select class="form-control order-status-select">
                            <option value="Open" ${data === 'Open' ? 'selected' : ''}>Open</option>
                            <option value="Closed" ${data === 'Closed' ? 'selected' : ''}>Closed</option>
                        </select>`;
                }
            },
            { title: 'Shares', data: 'shares' },
            { title: 'Entry Price', data: 'entry_price' },
            { title: 'Current Price', data: 'current_price' },
            {
                title: 'Net Gain',
                data: null,
                render: function (data) {
                    const gain = (parseFloat(data.current_price) - parseFloat(data.entry_price)) * parseFloat(data.shares);
                    return gain.toFixed(2);
                }
            },
            {
                title: 'Summary', data: null,
                render: function () {
                    return `<button class="btn btn-info show-summary">📋</button>`;
                },
                orderable: false
            },

            {
                title: 'Manage', data: null,
                render: function () {
                    return `<button class="btn btn-sm btn-success save-row">Save</button>`;
                },
                orderable: false
            }
        ]
    });

    $('#add-trade-btn').on('click', function () {
        table.row.add({
            id: '', symbol: '', order_status: 'Open', shares: 0, entry_price: 0.0, current_price: 0.0
        }).draw(false);
    });

    const entry = parseFloat($('#entry_price').val());
    const trail = parseFloat($('#trailing_stop_percent').val()) || 1;
    const trailData = calculateTrailingStopAfterProfit(entry, trail);
    $('#dynamicTargetOutput').html(`
        🎯 <strong>Target Price (3%):</strong> $${trailData.profitTrigger}<br>
        🔐 <strong>Locked Stop:</strong> $${trailData.profitTrigger}<br>
        📈 <strong>Trail Stop if High = $${trailData.simulatedHigh}:</strong> $${trailData.trailingStop}
    `);

    $('#exchange, #ticker').on('input change', function () {
        const exchange = $('#exchange').val().toUpperCase();
        const symbol = $('#ticker').val().toUpperCase();
        if (exchange && symbol) {
            updateSymbolActionButtons(symbol, exchange);
        }
    });

    $('#trade-tracker-table tbody').on('change', 'input, select', function () {
        const row = $(this).closest('tr');
        row.addClass('edited');
    });

    $('#trade-tracker-table tbody').on('click', '.save-row', function () {
        const row = $(this).closest('tr');
        const rowData = table.row(row).data();

        const updated = {
            id: rowData.id || null,
            symbol: row.find('input.symbol-input').val(),
            order_status: row.find('select.order-status-select').val(),
            shares: parseFloat(row.find('td').eq(3).text()) || 0,
            entry_price: parseFloat(row.find('td').eq(4).text()) || 0.00,
            current_price: parseFloat(row.find('td').eq(5).text()) || 0.00,
            user_id: row.data('userid') || 0
        };

        $.ajax({
            url: '/index.php/Trade-Tracker/saveTradeData',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ trade: updated }),
            headers: { [csrfName]: csrfToken },
            success: function (res) {
                alert('✅ Trade saved');
                table.ajax.reload();
            },
            error: function (err) {
                alert('❌ Error saving');
                console.error(err);
            }
        });
    });

    $('#trade-tracker-table tbody').on('click', '.show-summary', function () {
        const row = $(this).closest('tr');
        const rowData = table.row(row).data();
        const summary = generateGPTTemplate({
            symbol: rowData.symbol,
            exchange: 'NASDAQ',
            entry: rowData.entry_price,
            target: rowData.current_price * 1.03,
            stop: rowData.entry_price * 0.95,
            trailing: 1,
            sentiment: 'Neutral',
            chart: '',
            summary: 'Auto-generated'
        });
    
        alert(summary); // Or use a modal
    });

    // Real-time TradingView + ThinkorSwim Links
    $('#trade-tracker-table').on('blur', 'input.symbol-input, input, select', function () {
        const row = $(this).closest('tr');
        const rowData = table.row(row).data();
        const symbol = row.find('input.symbol-input').val();
        const entry = parseFloat(row.find('td').eq(4).text()) || 0;
        const current = parseFloat(row.find('td').eq(5).text()) || 0;
        const target = current * 1.03;
        const stop = entry * 0.95;
    
        const dynamicPayload = {
            formType: 'Manual Entry',
            market_session: detectMarketSession(),
            exchange: 'NASDAQ',
            symbol: symbol,
            company: '',
            price: current,
            entry_price: entry,
            stop_loss: stop.toFixed(2),
            target_price: target.toFixed(2),
            trade_type: 'Stock',
            market_sentiment: 'Neutral',
            alert_priority: 'Medium',
            strategy: 'Auto-generated by table edit',
            note: '',
            chart: '',
            gptTradeTemplate: ''
        };
    
        fetchSummary(dynamicPayload, csrfToken, csrfHash).then((res) => {
            if (res.status === 'success') {
                console.log(`AI Summary for ${symbol}:`, res.summary);
            }
        });
    });


    function calculateTrailingStopAfterProfit(entry, trailingPercent = 1.0) {
        const profitTrigger = entry * 1.03;
        const simulatedHigh = profitTrigger * 1.10;
        const trailingStop = (simulatedHigh * (1 - trailingPercent / 100)).toFixed(2);
        return { profitTrigger: profitTrigger.toFixed(2), simulatedHigh: simulatedHigh.toFixed(2), trailingStop };
    }

    function detectMarketSession() {
        const now = new Date();
        const cstOffset = -6 * 60;
        now.setMinutes(now.getMinutes() + now.getTimezoneOffset() + cstOffset);
        const hour = now.getHours();
    
        if (hour >= 8 && hour < 11) return 'Intraday Session';
        if (hour >= 11 && hour < 13) return 'Halftime Report';
        if (hour >= 15) return 'After-Market';
        return 'Pre-Market';
    }

    function fetchSummary(payload, csrfToken, csrfHash) {
        return $.ajax({
            url: '/index.php/API/Alerts/generateTradeAlertSummary',
            method: 'POST',
            data: {
                ...payload,
                [csrfToken]: csrfHash
            },
        });
    }

    function generateGPTTemplate(data) {
        const {
            symbol, exchange, type, category, sentiment, priority,
            entry, target, stop, chart, summary, trailing
        } = data;
    
        return `📊 Trade Analysis Overview
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━
    Ticker: $${symbol || 'N/A'}
    Exchange: ${exchange || 'N/A'}
    Trade Type: ${type || 'N/A'}
    Category: ${category || 'N/A'}
    Sentiment: ${sentiment || 'N/A'}
    Priority Level: ${priority || 'N/A'}
    
    📈 Price Targets
    • Entry Price: $${entry || 'TBD'}
    • Target Price: $${target || 'TBD'}
    • Stop Loss: $${stop || 'TBD'}
    
    🔁 Profit Lock Strategy
    • Trigger: $${(entry * 1.03).toFixed(2)} (3% Gain)
    • Trail: ${trailing || 1}% from high
    • Dynamic Exit: If price climbs, profits trail until reversal.
    
    🧠 Strategy Summary
    ${summary || 'No summary available yet.'}
    
    📺 Chart Link:
    ${chart || 'Not provided'}
    
    ⏱️ Submitted via MyMI Wallet Trade Alert System`;
    }

    function updateSymbolActionButtons(symbol, exchange) {
        const tvLink = `https://www.tradingview.com/symbols/${exchange}-${symbol}/financials-overview/`;
        const tosLink = `https://trade.thinkorswim.com/trade?symbol=${symbol}`;
    
        $('#tradingViewLink').attr('href', tvLink);
        $('#thinkorSwimLink').attr('href', tosLink);
        $('#symbolActionButtons').fadeIn();
    }

    const payload = {
        formType: 'Manual Entry',
        market_session: 'Intraday',
        exchange: 'NASDAQ',
        symbol: 'AAPL',
        company: 'Apple Inc',
        price: 173.53,
        entry_price: 170.00,
        stop_loss: 165.00,
        target_price: 175.10,
        trade_type: 'Stock',
        market_sentiment: 'Bullish',
        alert_priority: 'Medium',
        strategy: 'Buy on pullback near support',
        note: 'Positive earnings expected',
        chart: 'https://tradingview.com/chart/...',
        gptTradeTemplate: '', // optional
    };
    
    const csrfToken = $('input[name="<?= csrf_token() ?>"]').attr('name');
    const csrfHash = $('input[name="<?= csrf_token() ?>"]').val();
    
    fetchSummary(payload, csrfToken, csrfHash).then((res) => {
        if (res.status === 'success') {
            $('#analysis_summary').val(res.summary);
        } else {
            alert('Summary fetch failed');
        }
    });
  
    $('#market_session').val(detectMarketSession());

});
</script>