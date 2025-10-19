<?= view('App/Views/errors\html\under_construction'); ?>
<?php
$predefinedAnalytics = [];
?>
<!-- Include CSS and JS for DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Back Button -->
<a class="btn btn-primary" href="<?= site_url('/Investments') ?>">
    <em class="icon ni ni-arrow-left"></em> Back to Investments
</a>

<!-- Add Buttons -->
<div class="mb-4">
    <button id="add-trade-btn" class="btn btn-secondary">Add Trade</button>
    <button id="add-column-btn" class="btn btn-secondary">Add Column</button>
</div>

<!-- Table Container -->
<div class="mt-4">
    <table id="trade-tracker-table" class="display" style="width:100%">
        <thead>
            <tr id="table-headers">
                <th>Symbol</th>
                <th>Shares</th>
                <th>Entry Price</th>
                <th>Current Price</th>
                <th>Net Gain</th>
                <th>Custom 1</th>
                <th>Custom 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($predefinedAnalytics as $row): ?>
                <tr>
                    <td><?= $row['symbol'] ?></td>
                    <td><?= $row['shares'] ?></td>
                    <td><?= $row['entry_price'] ?></td>
                    <td><?= $row['current_price'] ?></td>
                    <td><?= $row['net_gain'] ?></td>
                    <td><?= $row['custom1'] ?></td>
                    <td><?= $row['custom2'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="mt-4">
    <button id="save-btn" class="btn btn-success">Save</button>
    <button id="export-btn" class="btn btn-primary">Export Excel</button>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    let tableHeaders = [
        { title: "Symbol", data: "symbol", defaultContent: "" },
        { title: "Shares", data: "shares", defaultContent: 0 },
        { title: "Entry Price", data: "entry_price", defaultContent: 0 },
        { title: "Current Price", data: "current_price", defaultContent: 0 },
        {
            title: "Net Gain",
            data: null,
            render: function (data) {
                return ((data.current_price - data.entry_price) * data.shares).toFixed(2);
            },
        },
        { title: "Custom 1", data: "custom1", defaultContent: "" },
        { title: "Custom 2", data: "custom2", defaultContent: "" },
    ];

    let customColumnIndex = tableHeaders.length; // Start tracking custom columns

    // Initialize DataTable with AJAX for backend connection
    let table = $('#trade-tracker-table').DataTable({
        ajax: {
            url: "<?= site_url('Trade-Tracker/getTradeData') ?>",
            dataSrc: ''
        },
        columns: tableHeaders,
    });

    // Add Trade Button
    $('#add-trade-btn').on('click', function () {
        table.row.add({
            symbol: '',
            shares: 0,
            entry_price: 0,
            current_price: 0,
            custom1: '',
            custom2: '',
        }).draw(false);
    });

    // Add Column Button
    $('#add-column-btn').on('click', function () {
        const columnName = prompt("Enter the name of the new column:");
        if (!columnName) return;

        // Dynamically add new column
        tableHeaders.push({
            title: columnName,
            data: columnName,
            defaultContent: '',
            createdCell: function (td, cellData, rowData, row, col) {
                $(td).attr('contenteditable', 'true'); // Make cells editable
            }
        });

        // Add the new column to all existing rows
        const currentData = table.rows().data().toArray();
        currentData.forEach(row => {
            row[columnName] = ''; // Initialize the new field with an empty value
        });

        // Destroy the current table instance and reinitialize
        table.destroy();
        $('#trade-tracker-table thead tr').append(`<th>${columnName}</th>`); // Add header
        table = $('#trade-tracker-table').DataTable({
            data: currentData,
            columns: tableHeaders,
        });

        customColumnIndex++;
    });

    // Save Data Button
    $('#save-btn').on('click', function () {
        saveData();
    });

    // Autosave every 60 seconds
    setInterval(saveData, 60000);

    function saveData() {
        const data = table.rows().data().toArray();
        fetch("<?= site_url('Trade-Tracker/saveTradeData') ?>", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => console.log("Autosave completed successfully!"))
        .catch(error => console.error("Error during autosave:", error));
    }

    // Export to Excel Button
    $('#export-btn').on('click', function () {
        table.button('.buttons-excel').trigger();
    });
});

</script>
