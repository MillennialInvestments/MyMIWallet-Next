<?php 
if ($userAgent->isMobile()) {
    echo '<table class="table table-default budgeting-table default" id="userBudgetingHistoryDatatable">';
} elseif ($userAgent->isBrowser()) {
    echo '<table class="table table-default budgeting-table default" id="userBudgetingHistoryDatatable">';
}
?>

    <thead>
        <?php
        if ($userAgent->isMobile()) {
            echo '
            <tr>
                <th class="d-none"></th>
                <th>Account</th>
                <th>Amount</th>
                <th>Subtotal</th>
            </tr>';
        } elseif ($userAgent->isBrowser()) {
            echo '
            <tr>
                <th class="d-none"></th>
                <th>Due Date</th>
                <th>Account</th>
                <th>Source</th>
                <th>Wallet</th>
                <th>Amount</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>';
        }
        ?>
    </thead>
    <tbody>
        <?php
        $sum = 0;
        $filterType = $uri->getSegment(3); // Get the segment for filtering (e.g., "Income" or "Expense")

        foreach ($userBudgetRecords as $account) {
            $accountType = $account['account_type'] ?? 'Unknown';
            $amount = isset($account['net_amount']) ? (float)$account['net_amount'] : 0;
            $amountDisplay = $accountType === 'Expense'
                ? '<span class="statusRed">-' . number_format($amount, 2) . '</span>'
                : number_format($amount, 2);

            $sum += ($accountType === 'Expense') ? -$amount : $amount;

            $sumDisplay = $sum >= 0
                ? '$' . number_format($sum, 2)
                : '<span class="statusRed">$' . number_format(abs($sum), 2) . '</span>';

            $accountName = $account['name'] ?? 'Unknown Account';
            $accountDate = $account['designated_date'] ?? date('Y-m-d');
            $displayDate = date("F jS, Y", strtotime($accountDate));


            // Only show rows that match the filter or show all if no filter is set
            if (!$filterType || $filterType === $accountType) {
                $sortDate = date('Y-m-d', strtotime($accountDate)); // Proper sortable format
                echo "
                <tr>
                    <td class='d-none'>" . htmlspecialchars($account['id'] ?? '') . "</td>
                    <td data-sort='" . $sortDate . "'>$displayDate</td>
                    <td><a href='" . site_url('Budget/Details/' . htmlspecialchars($account['id'] ?? '')) . "'>" . htmlspecialchars($accountName) . "</a></td>
                    <td>" . htmlspecialchars($account['source_type'] ?? 'Unknown') . "</td>
                    <td>" . htmlspecialchars($account['wallet'] ?? 'No Wallet') . "</td>
                    <td>$amountDisplay</td>
                    <td>$sumDisplay</td>
                    <td>
                        <a href='" . site_url('Budget/Edit/' . htmlspecialchars($account['id'] ?? '')) . "'><i class='icon myfs-md ni ni-edit'></i></a>
                        <a href='" . site_url('Budget/Copy/' . htmlspecialchars($account['id'] ?? '')) . "'><i class='icon myfs-md ni ni-copy'></i></a>
                        <a class='text-red' href='" . site_url('Budget/Delete-Account/' . htmlspecialchars($account['id'] ?? '')) . "'><i class='icon myfs-md ni ni-trash'></i></a>
                    </td>
                </tr>";
            }
        }
        ?>
    </tbody>



</table>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    var table = $('#userBudgetingHistoryDatatable').DataTable({
        "order": [[1, "desc"]], // Sort by "Due Date" column
        "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
        "columnDefs": [
            { "targets": 0, "visible": false },
            { "type": "date", "targets": 1 } // This forces column 1 to be treated as a date
        ],

        "drawCallback": function(settings) {
            var api = this.api();
            var subtotal = 0; // Reset subtotal for each draw

            // Iterate over rows in the displayed order
            api.rows({ order: 'applied', page: 'current' }).every(function(rowIdx, tableLoop, rowLoop) {
                var data = this.data();

                // Parse the "Amount" column (index 5) safely
                var amountStr = $(data[5]).text() || "0"; // Ensure text is extracted correctly
                var amount = parseFloat(amountStr.replace(/[\$,]/g, '')) || 0;

                // Determine if the row is an expense or income
                var accountType = data[2] || ""; // "Account Type" column
                if (accountType.toLowerCase() === 'expense') {
                    subtotal -= amount;
                } else {
                    subtotal += amount;
                }

                // Update the "Subtotal" column (index 6)
                data[6] = subtotal < 0
                    ? `<span style="color: red;">${new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal)}</span>`
                    : new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal);

                // Apply the updated data back to the row
                this.data(data);
            });
        }
    });
});

</script>
