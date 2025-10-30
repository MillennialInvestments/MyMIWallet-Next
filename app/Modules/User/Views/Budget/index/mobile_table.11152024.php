<style <?= $nonce['style'] ?? '' ?>>
    /* Custom scrollbar for table */
    .table-responsive::-webkit-scrollbar {
    height: 8px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
    background: #555;
    }

</style>
<div class="card h-100">
    <div class="card-inner px-2 px-lg-4">
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12 pr-3">
                    <div class="card-title">
                        <h6 class="title">Monthly Financial Overview</h6>
                        <p class="d-none d-md-block">Last 12 Months of Total Monthly ßFinancial Growth.</p>
                    </div>
                    <div class="card-tools mt-0">
                        <a class="btn btn-success btn-xs text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Income" data-accountid="<?= $cuID; ?>"><i class="icon ni ni-plus"></i> Income</a>
                        <a class="btn btn-danger btn-xs text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Expense" data-accountid="<?= $cuID; ?>"><i class="icon ni ni-plus"></i> Expense</a>
                        <a class="btn btn-outline-secondary btn-xs" href="https://www.mymiwallet.com/Budget/History"><i class="icon ni ni-history"></i> History</a>
                    </div>
                    <!-- <div class="card-title-group align-start mb-3">
                        <div class="card-tools mt-n1 me-n1">
                            <ul class="nav nav-pills p-lg-3">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" type="button" role="tab" data-bs-toggle="modal" data-bs-target="#bulkActionModal" aria-controls="home" aria-selected="true">Edit All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">                        
                            <div class="table-responsive">
                                <table class="table table-default budgeting-table default" id="userBudgetingDatatable">
                                    <thead>
                                        <tr>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                            <th>Due Date</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sum = $bankAccountBalance = $checkingSummary ?? 0;
                                        $creditAvailable = $creditSummary ?? 0; // Assuming $creditSummary holds the total available credit
                                        
                                        // Display for Bank Accounts
                                        $displayedDateBankAccounts = date("m") . '/1/' . date("y");// Bank Accounts Display
                                        $topOrderDate = date("Y-m")."-01"; // Ensures the date is always the first of the current month in YYYY-MM-DD format
                                        
                                        echo '
                                        <tr>
                                            <td class="d-none">' . $topOrderDate . '</td>
                                            <td class="d-none"></td>
                                            <td>' . $displayedDateBankAccounts . '</td>
                                            <td><a class="badge badge-sm rounded-pill bg-primary text-white px-4" href="' . site_url('/Wallets') . '">Bank</a></td>
                                            <td>$' . number_format($bankAccountBalance, 2) . '</td>
                                            <td>$' . number_format($sum, 2) . '</td>
                                        </tr>
                                        ';
                                        
                                        // Display for Credit Accounts
                                        $sum += $creditAvailable;
                                        $displayedDateCreditAccounts = date("m") . '/1/' . date("y");;
                                        echo '
                                        <tr>
                                            <td class="d-none">' . $topOrderDate . '</td>
                                            <td class="d-none"></td>
                                            <td>' . $displayedDateCreditAccounts . '</td>
                                            <td><a class="badge badge-sm rounded-pill bg-warning text-white px-4" href="' . site_url('/Wallets') . '">Credit</a></td>
                                            <td>$' . number_format($creditAvailable, 2) . '</td>
                                            <td>$' . number_format($sum, 2) . '</td>
                                        </tr>
                                        ';
                                            
                                        
                                        $maxLength                          = 15;
                                        
                                        foreach ($userActiveBudgetRecords as $account) {
                                            $accountDate = date('m/d/y', strtotime($account['month'] . '/' . $account['day'] . '/' . $account['year']));
                                            $formattedDate = $accountDate ?? 'Invalid Date';

                                            $sum += $account['net_amount'] ?? 0;
                                            $displaySum = $sum >= 0 ? '$' . number_format($sum, 2) : '<span class="statusRed">$' . number_format(-$sum, 2) . '</span>';
                                            $accountPaidStatus = $account['paid'] ? '' : '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
                                            ?>
                                            <tr>
                                                <td class="d-none"><?= $account['year'] . '-' . $account['month'] . '-' . $account['day']; ?></td>
                                                <td class="d-none"><?= $account['account_type']; ?></td>
                                                <td><?= $formattedDate; ?></td>
                                                <td><a href="<?= site_url('Budget/Details/' . $account['id']); ?>"><?= $account['name']; ?></a></td>
                                                <td>$<?= number_format($account['net_amount'], 2); ?></td>
                                                <td><?= $displaySum; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <script <?= $nonce['script'] ?? '' ?>>
                                    $(document).ready(function() {
                                        var table = $('#userBudgetingDatatable').DataTable({
                                            "order": [[0, "asc"]], // sorting by the first hidden column (dates in YYYY-MM-DD format for correct chronological order)
                                            "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
                                            "columnDefs": [
                                                {
                                                    "targets": [0, 1], // Hiding both the first (date) and second (account type) columns
                                                    "visible": false,
                                                }
                                            ],
                                            "drawCallback": function(settings) {
                                                var api = this.api();
                                                var subtotal = 0; // Initialize subtotal outside of the row processing loop
                                                api.rows({page:'current'}).every(function(rowIdx, tableLoop, rowLoop) {
                                                    var data = this.data();
                                                    var amount = parseFloat(data[4].replace(/[\$,]/g, '')); // Parse amount from the fourth visible column, which is actually the fifth data index

                                                    // Check account type from the hidden second column to decide if it's an expense or income
                                                    if (data[1] === 'Expense') {
                                                        subtotal -= amount;
                                                    } else {
                                                        subtotal += amount;
                                                    }

                                                    // Apply formatting to the subtotal and update the data array
                                                    data[5] = subtotal < 0 ?
                                                        `<span style="color: red;">${new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal)}</span>` :
                                                        new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal);

                                                    this.data(data); // Invalidate the data to ensure redraw
                                                });
                                                api.draw(false); // Redraw the table without resetting the paging after the callback
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->