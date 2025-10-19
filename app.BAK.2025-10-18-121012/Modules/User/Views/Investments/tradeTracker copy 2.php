<?php
// Example dataset for initial load
// $predefinedAnalytics = [
//     ['symbol' => 'AAPL', 'shares' => 10, 'entry_price' => 150, 'current_price' => 170, 'net_gain' => '', 'custom1' => '', 'custom2' => ''],
//     ['symbol' => 'GOOGL', 'shares' => 5, 'entry_price' => 2500, 'current_price' => 2800, 'net_gain' => '', 'custom1' => '', 'custom2' => ''],
// ];
$predefinedAnalytics = [ 

];
?>

<a class="btn btn-primary" href="<?= site_url('/Investments') ?>">
    <em class="icon ni ni-arrow-left"></em> Back to Investments
</a>
<div class="nk-block">
    <div id="trade-tracker-table" class="mt-4"></div>
</div>
<button id="save-data" class="btn btn-success mt-4">Save Trade Tracker</button>

<!-- Include Handsontable -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/handsontable.min.css">
<script src="https://cdn.jsdelivr.net/npm/hyperformula@1.2.0/dist/hyperformula.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/handsontable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/languages/all.min.js"></script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    // Initial table data
    const predefinedAnalytics = <?= json_encode($predefinedAnalytics) ?>;

    // Initialize Handsontable
    const container = document.getElementById('trade-tracker-table');
    const hot = new Handsontable(container, {
        data: predefinedAnalytics,
        colHeaders: [
            'Symbol', 'Shares', 'Entry Price', 'Current Price', 'Net Gain ($)', 'Custom Column 1', 'Custom Column 2'
        ],
        columns: [
            { data: 'symbol', type: 'text' },
            { data: 'shares', type: 'numeric' },
            { data: 'entry_price', type: 'numeric' },
            { data: 'current_price', type: 'numeric' },
            {
                data: 'net_gain',
                type: 'numeric',
                readOnly: true // Computed column
            },
            { data: 'custom1', type: 'text' }, // Custom column
            { data: 'custom2', type: 'text' }, // Custom column
        ],
        stretchH: 'all',
        height: 'auto',
        rowHeaders: true,
        manualColumnResize: true,
        manualRowResize: true,
        contextMenu: true,
        licenseKey: 'non-commercial-and-evaluation',
    });

    // Automatically calculate "Net Gain"
    hot.addHook('afterChange', function (changes) {
        if (!changes) return;
        changes.forEach(([row, prop, oldVal, newVal]) => {
            if (['shares', 'entry_price', 'current_price'].includes(prop)) {
                const rowData = hot.getDataAtRow(row);
                const [shares, entryPrice, currentPrice] = [rowData[1], rowData[2], rowData[3]];
                if (shares && entryPrice && currentPrice) {
                    const netGain = (currentPrice - entryPrice) * shares;
                    hot.setDataAtCell(row, 4, netGain.toFixed(2));
                }
            }
        });
    });

    // Save button functionality
    document.getElementById('save-data').addEventListener('click', function () {
        const tableData = hot.getData();
        fetch('<?= site_url('/Investments/saveTradeTracker') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ data: tableData })
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    });
});
</script>
