<?php echo view('App/Views/errors/html/under_construction'); ?>
<?php
$predefinedAnalytics = [];
?>
<!-- Include CSS and JS for DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                                <button id="add-column-btn" class="btn btn-secondary">Add Column</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <!-- Formula Bar -->
                                <div class="mb-3">
                                    <label for="formula-bar" class="form-label">Formula Bar</label>
                                    <input type="text" id="formula-bar" class="form-control" placeholder="Enter or edit formula" readonly>
                                </div>

                                <!-- Table Container -->
                                <div class="mt-4">
                                    <table id="trade-tracker-table" class="display" style="width:100%">
                                        <thead>
                                            <tr id="table-headers">
                                                <th></th>
                                                <th>Symbol</th>
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

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    // Global variable to control activation
    let isFeatureEnabled = 0; // 1: Enabled, 0: Disabled

    // Cache references to UI elements
    const $formulaBar = $('#formula-bar');
    const $addColumnBtn = $('#add-column-btn');
    const $addTradeBtn = $('#add-trade-btn');

    // Table headers definition
    let tableHeaders = [
        { title: "Symbol", data: "symbol", defaultContent: "" },
        { title: "Shares", data: "shares", defaultContent: 0 },
        { title: "Entry Price", data: "entry_price", defaultContent: 0 },
        { title: "Current Price", data: "current_price", defaultContent: 0 },
        {
            title: "Net Gain",
            data: null,
            render: function (data) {
                if (!data.current_price || !data.entry_price || !data.shares) return "0.00";
                return ((data.current_price * data.shares) - (data.entry_price * data.shares)).toFixed(2);
            },
            orderable: false,
        },
        {
            title: "Manage",
            data: null,
            orderable: false,
            defaultContent: `
                <button class="btn btn-success btn-icon btn-trigger btn-save mr-5 d-none">
                    <em class="icon ni ni-check"></em>
                </button>
                <button class="btn btn-default btn-icon btn-trigger btn-revert">
                    <em class="icon ni ni-undo"></em>
                </button>`,
        },
    ];

    // Initialize DataTable
    let table = $('#trade-tracker-table').DataTable({
        ajax: {
            url: "<?= site_url('Trade-Tracker/getTradeData') ?>",
            dataSrc: function (json) {
                console.log("Data received from server:", json);
                return json.trades || [];
            },
        },
        columns: [
            {
                title: "",
                data: "id",
                orderable: false,
                searchable: false,
                className: "row-id",
                render: function (data) {
                    return `<span class="row-id">${data}</span>`;
                },
            },
            ...tableHeaders,
        ],
        responsive: true,
        autoWidth: false,
        rowCallback: function (row, data, index) {
            if (!$(row).hasClass("row-id-added")) {
                $(row).addClass("row-id-added");
            }
        },
        initComplete: function () {
            addColumnIdentifiers();
        },
    });

    // Add column identifiers for letter references
    function addColumnIdentifiers() {
        $('#column-identifiers').remove();
        const letters = ["", ...tableHeaders.map((_, index) => String.fromCharCode(65 + index))];
        $('#trade-tracker-table thead').prepend(`
            <tr id="column-identifiers">
                ${letters.map((letter) => `<th>${letter}</th>`).join("")}
            </tr>
        `);
    }

    // Function to toggle visibility of formula bar and column button
    function toggleFeatureVisibility() {
        if (isFeatureEnabled === 1) {
            $formulaBar.closest('.mb-3').show();
            $addColumnBtn.show();
        } else {
            $formulaBar.closest('.mb-3').hide();
            $addColumnBtn.hide();
        }
    }

    // Initialize feature visibility
    toggleFeatureVisibility();

    // Track active formula input and column index
    let activeFormulaInput = null;
    let activeColumnIndex = null;

    // Enable editing via formula bar
    $('#trade-tracker-table').on('focus', '.formula-input', function () {
        if (isFeatureEnabled === 0) return;

        activeFormulaInput = $(this);
        activeColumnIndex = activeFormulaInput.closest('td').index();

        const activeRow = activeFormulaInput.closest('tr');
        $('#trade-tracker-table tbody tr').removeClass('active-row');
        activeRow.addClass('active-row');
        activeRow.find('td').addClass('disabled-cell');
        activeFormulaInput.closest('td').removeClass('disabled-cell');

        $formulaBar.val(activeFormulaInput.val()).prop('readonly', false).focus();
    });

    // Handle cell clicks for references in the formula bar
    $('#trade-tracker-table tbody').on('click', 'td:not(.disabled-cell)', function () {
        if (isFeatureEnabled === 0) return;

        const cell = $(this);
        const columnLetter = $('#column-identifiers th').eq(cell.index()).text().trim();
        const rowId = cell.closest('tr').find('.row-id').text().trim();

        if (columnLetter && rowId) {
            const reference = `${columnLetter}${rowId}`;
            if ($formulaBar.is(':focus')) {
                $formulaBar.val($formulaBar.val() + reference);
            }
            if (activeFormulaInput) {
                activeFormulaInput.val(activeFormulaInput.val() + reference);
            }
        }
    });

    // Apply formula to all rows on formula bar blur
    $formulaBar.on('blur', function () {
        if (isFeatureEnabled === 0) return;

        const newFormula = $formulaBar.val();
        if (activeColumnIndex !== null) {
            $('#trade-tracker-table tbody tr').each(function () {
                const cell = $(this).find('td').eq(activeColumnIndex).find('.formula-input');
                if (cell.length > 0) {
                    cell.val(newFormula);
                }
            });
        }

        $('.disabled-cell').removeClass('disabled-cell');
        $('.active-row').removeClass('active-row');
        activeFormulaInput = null;
        activeColumnIndex = null;
        $formulaBar.prop('readonly', true);
    });

    // Prevent direct editing of custom cells
    $('#trade-tracker-table').on('click', '.formula-input', function (e) {
        if (!$(this).is(':focus')) {
            e.preventDefault();
        }
    });

    // Add new columns
    $addColumnBtn.on('click', function () {
        if (isFeatureEnabled === 0) return;

        const columnName = prompt("Enter the name of the new column:");
        if (!columnName) return;

        tableHeaders.splice(tableHeaders.length - 1, 0, {
            title: columnName,
            data: columnName,
            defaultContent: "",
            render: function (data) {
                const inputValue = data?.value || "";
                return `<input type="text" class="form-control formula-input" value="${inputValue}" placeholder="Enter value or formula">`;
            },
        });

        table.destroy();
        $('#trade-tracker-table thead tr:last-child').children().last().before(`<th>${columnName}</th>`);
        table = $('#trade-tracker-table').DataTable({
            ajax: {
                url: "<?= site_url('Trade-Tracker/getTradeData') ?>",
                dataSrc: function (json) {
                    return json.trades || [];
                },
            },
            data: table.rows().data().toArray(),
            columns: [
                {
                    title: "",
                    data: "id",
                    orderable: false,
                    searchable: false,
                    className: "row-id",
                    render: function (data) {
                        return `<span class="row-id">${data}</span>`;
                    },
                },
                ...tableHeaders,
            ],
            responsive: true,
            autoWidth: false,
            rowCallback: function (row, data, index) {
                if (!$(row).hasClass("row-id-added")) {
                    $(row).addClass("row-id-added");
                }
            },
            initComplete: function () {
                addColumnIdentifiers();
            },
        });

        console.log(`Column "${columnName}" added successfully.`);
    });

    // CSS for enabling/disabling features
    $('<style <?= $nonce['style'] ?? '' ?>>')
        .prop('type', 'text/css')
        .html(`
            .disabled {
                pointer-events: none;
                opacity: 0.5;
            }
            .disabled-cell {
                pointer-events: none;
                opacity: 0.5;
            }
            .active-row {
                background-color: #f9f9f9;
            }
        `)
        .appendTo('head');
    // Continue with existing event handlers (e.g., dropdowns, save buttons)
    $('#add-trade-btn').on('click', function () {
        table.row.add({
            id: "",
            symbol: "",
            shares: 0,
            entry_price: 0,
            current_price: 0,
        }).draw(false);
    });

    $('#add-column-btn').on('click', function () {
        const columnName = prompt("Enter the name of the new column:");
        if (!columnName) return;

        tableHeaders.splice(tableHeaders.length - 1, 0, {
            title: columnName,
            data: columnName,
            defaultContent: "",
            render: function (data) {
                const selectedFormula = data?.formula || "manual";
                const inputValue = data?.value || "";
                const formulaDropdown = `
                    <select class="form-control bordered formula-dropdown">
                        <option value="manual" ${selectedFormula === "manual" ? "selected" : ""}>Manual</option>
                        <option value="sum" ${selectedFormula === "sum" ? "selected" : ""}>SUM</option>
                        <option value="avg" ${selectedFormula === "avg" ? "selected" : ""}>AVG</option>
                    </select><br><hr>`;
                const valueInput = `<input type="text" class="form-control bordered formula-input" value="${inputValue}" placeholder="Enter value or formula">`;
                return `<div class="dual-input">${formulaDropdown} ${valueInput}</div>`;
            },
        });

        table.rows().every(function () {
            const rowData = this.data();
            rowData[columnName] = { formula: "manual", value: "" };
            this.data(rowData);
        });

        table.destroy();
        $('#trade-tracker-table thead tr:last-child').children().last().before(`<th>${columnName}</th>`);
        table = $('#trade-tracker-table').DataTable({
            ajax: {
                url: "<?= site_url('Trade-Tracker/getTradeData') ?>",
                dataSrc: function (json) {
                    return json.trades || [];
                },
            },
            data: table.rows().data().toArray(),
            columns: [
                {
                    title: "",
                    data: "id",
                    orderable: false,
                    searchable: false,
                    className: "row-id",
                    render: function (data) {
                        return `<span class="row-id">${data}</span>`;
                    },
                },
                ...tableHeaders,
            ],
            responsive: true,
            autoWidth: false,
            rowCallback: function (row, data, index) {
                if (!$(row).hasClass("row-id-added")) {
                    $(row).addClass("row-id-added");
                }
            },
            initComplete: function () {
                addColumnIdentifiers();
            },
        });

        console.log(`Column "${columnName}" added successfully.`);
    });

    // Handle dropdown selection and input changes
    $('#trade-tracker-table tbody').on('change', '.formula-dropdown', function () {
        const cell = table.cell($(this).closest('td'));
        const inputField = $(this).siblings('.formula-input');
        const selectedFormula = $(this).val();

        // Update the placeholder and input value based on the selected formula
        if (selectedFormula === "manual") {
            inputField.val("").attr("placeholder", "Enter value or formula");
        } else if (selectedFormula === "sum") {
            inputField.val("=SUM(A1:A3)").attr("placeholder", "E.g., =SUM(A1:A3)");
        } else if (selectedFormula === "avg") {
            inputField.val("=AVG(A1:A3)").attr("placeholder", "E.g., =AVG(A1:A3)");
        }

        // Update the cell's data
        const cellData = cell.data() || {};
        cell.data({ ...cellData, formula: selectedFormula, value: inputField.val() }).draw();

        // Show the save button for the row
        $(this).closest('tr').find('.btn-save').show();
    });

    $('#trade-tracker-table tbody').on('blur', '.formula-input', function () {
        const cell = table.cell($(this).closest('td'));
        const inputValue = $(this).val();

        // Update the cell with the new value
        const cellData = cell.data() || {};
        cell.data({ ...cellData, value: inputValue }).draw();

        // Show the save button for the row
        $(this).closest('tr').find('.btn-save').show();
    });

    // Real-time save button functionality
    $('#trade-tracker-table tbody').on('click', '.btn-save', function () {
        const rowData = table.row($(this).closest('tr')).data();

        // Construct the data object
        const dataToSend = JSON.stringify({
            user_id: <?= $cuID ?>, // Assuming the backend sets `cuID` dynamically
            trades: [rowData], // Sending the row as part of the trades array
            custom_columns: tableHeaders.map(header => header.title), // Header titles for custom columns
            custom_column_data: table.rows().data().toArray(), // Full table data for reference
        });

        console.log("Payload being sent:", dataToSend); // Debugging the payload

        // Perform AJAX request to save the data
        $.ajax({
            url: "<?= site_url('Trade-Tracker/saveTradeData') ?>",
            type: "POST",
            contentType: "application/json", // Ensures JSON format is sent
            data: dataToSend,
            success: function (response) {
                console.log("Save successful:", response);
            },
            error: function (xhr, status, error) {
                console.error("Save failed:", xhr.responseText || status || error);
            },
        });

        // Hide the save button after saving
        $(this).hide();
    });

    // Show save button when the row is modified
    $('#trade-tracker-table tbody').on('input change', '.formula-input, .formula-dropdown', function () {
        const row = $(this).closest('tr');
        row.find('.btn-save').show();
    });


    // Calculate Net Gain
    function calculateNetGain(row) {
        const shares = parseFloat(row.find('td').eq(2).text()) || 0;
        const entryPrice = parseFloat(row.find('td').eq(3).text()) || 0;
        const currentPrice = parseFloat(row.find('td').eq(4).text()) || 0;
        const netGain = ((currentPrice - entryPrice) * shares).toFixed(2);
        row.find('.net-gain').text(netGain);
    }

    // Enable cell editing on Enter
    $('#trade-tracker-table').on('keydown', '.editable-cell', function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            $(this).blur(); // Trigger blur event to finalize editing
        }
    });

    // Auto-calculate Net Gain when editing is done
    $('#trade-tracker-table').on('blur', '.editable-cell', function () {
        const row = $(this).closest('tr');
        calculateNetGain(row);
    });

    // Save button functionality
    $('#trade-tracker-table').on('click', '.btn-save', function () {
        const row = $(this).closest('tr');
        const rowData = {
            symbol: row.find('td').eq(1).text().trim(),
            shares: parseFloat(row.find('td').eq(2).text()) || 0,
            entry_price: parseFloat(row.find('td').eq(3).text()) || 0,
            current_price: parseFloat(row.find('td').eq(4).text()) || 0,
            net_gain: parseFloat(row.find('.net-gain').text()) || 0
        };

        // Send data to server via AJAX
        $.ajax({
            url: "<?= site_url('Trade-Tracker/saveTradeData') ?>",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ trade: rowData }),
            success: function (response) {
                alert('Row saved successfully!');
                console.log('Save response:', response);
            },
            error: function (xhr, status, error) {
                console.error('Save error:', xhr.responseText || error);
            }
        });
    });

    // Add new row
    $('#add-trade-btn').on('click', function () {
        const newRow = `
            <tr>
                <td></td>
                <td contenteditable="true" class="editable-cell"></td>
                <td contenteditable="true" class="editable-cell">0</td>
                <td contenteditable="true" class="editable-cell">0.00</td>
                <td contenteditable="true" class="editable-cell">0.00</td>
                <td class="net-gain">0.00</td>
                <td>
                    <button class="btn btn-success btn-save">Save</button>
                </td>
            </tr>`;
        $('#trade-tracker-table tbody').append(newRow);
    });

});

</script>
