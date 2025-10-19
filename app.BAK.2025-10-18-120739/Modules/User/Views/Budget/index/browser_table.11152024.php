<div class="card card-bordered h-100">
    <div class="card-inner px-2 px-lg-4">
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="title d-none d-md-block">Monthly Financial Overview</h6>
                            <p class="d-none d-md-block">Last 12 Months of Total Monthly Financial Growth.</p>
                        </div>
                        <div class="card-tools mt-3 mt-md-0 d-flex flex-column flex-md-row justify-content-md-end w-100">
                            <h6 class="title d-block d-md-none text-center">Monthly Financial Overview</h6>
                            <p class="d-block d-md-none text-center mb-3">Last 12 Months of Total Monthly Financial Growth.</p>
                            <div class="d-flex flex-wrap justify-content-center justify-content-md-end">
                                <a class="btn btn-success btn-sm text-white me-2 mb-2 dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Income" data-accountid="<?= $cuID; ?>"><i class="icon ni ni-plus"></i> Income</a>
                                <!-- <a class="btn btn-success btn-sm text-white me-2 mb-2" href="<?php echo site_url('Budget/Add/Income'); ?>"><i class="icon ni ni-plus"></i> Income</a> -->
                                <a class="btn btn-danger btn-sm text-white me-2 mb-2 dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Expense" data-accountid="<?= $cuID; ?>"><i class="icon ni ni-plus"></i> Expense</a>
                                <!-- <a class="btn btn-danger btn-sm text-white me-2 mb-2" href="<?php echo site_url('Budget/Add/Expense'); ?>"><i class="icon ni ni-plus"></i> Expense</a> -->
                                <!-- <a class="btn btn-primary btn-sm text-white me-2 mb-2" data-bs-toggle="modal" data-bs-target="#bulkActionModal"><i class="icon ni ni-pencil"></i> Edit All</a> -->
                                <a class="btn btn-outline-secondary btn-sm me-2 mb-2 dynamicModalLoader" data-formtype="Budget" data-endpoint="View" data-category="History" data-accountid="<?= $cuID; ?>"><i class="icon ni ni-history"></i> History (test)</a>
                                <a class="btn btn-outline-secondary btn-sm me-2 mb-2" href="<?php echo site_url('Budget/History'); ?>"><i class="icon ni ni-history"></i> History</a>
                                <!-- <div class="dropdown me-2 mb-2">
                                    <a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><span>Chart Settings</span><em class="icon ni ni-setting"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end mt-1">
                                        <ul class="link-check link-list-opt no-bdr">
                                            <li><span>Include Credit?</span></li>
                                            <li class="p-1">
                                                <a class="" href="https://www.mymiwallet.com/Budget/Add/Income">On</a>
                                            </li>
                                            <li class="p-1 active">
                                                <a class="" href="https://www.mymiwallet.com/Budget/Add/Income">Off</a>
                                            </li>
                                            <li><span>Include Investments?</span></li>
                                            <li class="p-1">
                                                <a class="" href="https://www.mymiwallet.com/Budget/Add/Income">On</a>
                                            </li>
                                            <li class="p-1 active">
                                                <a class="" href="https://www.mymiwallet.com/Budget/Add/Income">Off</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- <div class="me-2 d-none d-md-block">
                                    <span class="d-block mb-1">
                                        Include Credit Accounts: <a class="" href="https://www.mymiwallet.com/Budget/Add/Income"><i class="icon ni ni-toggle-off"></i></a>
                                    </span>
                                    <span class="d-block">
                                        Include Investment Accounts: <a class="" href="https://www.mymiwallet.com/Budget/Add/Income"><i class="icon ni ni-toggle-off"></i></a>
                                    </span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">                                        
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
                            <div>
                                <table class="table table-default budgeting-table default" id="userBudgetingDatatable">
                                    <thead>
                                        <tr>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                            <th>All <input type="checkbox" id="selectAll"></th>
                                            <th>Due Date</th>
                                            <th>Account</th>
                                            <th>Source</th>
                                            <th>YTD</th>
                                            <th>Amount</th>
                                            <th>Subtotal</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sum = $bankAccountBalance = $checkingSummary ?? 0;
                                        // $creditAvailable = $creditSummary ?? 0; // Assuming $creditSummary holds the total available credit
                                        $sum += $creditAvailable;
                                        
                                        // Display for Bank Accounts
                                        $displayedDateBankAccounts = date("F") . ' 1st, ' . date("Y");// Bank Accounts Display
                                        $topOrderDate = date("Y-m")."-01"; // Ensures the date is always the first of the current month in YYYY-MM-DD format
                                        
                                        echo '
                                        <tr>
                                            <td class="d-none">' . $topOrderDate . '</td>
                                            <td class="d-none"></td>
                                            <td></td>
                                            <td>' . $displayedDateBankAccounts . '</td>
                                            <td><a class="badge badge-sm rounded-pill bg-primary text-white px-4" href="' . site_url('/Wallets') . '">Bank Accounts</a></td>
                                            <td></td>
                                            <td></td>
                                            <td>$' . number_format($bankAccountBalance, 2) . '</td>
                                            <td>$' . number_format($sum, 2) . '</td>
                                            <td>
                                                <a class="badge badge-sm rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
                                                <a class="badge badge-sm rounded-pill bg-primary text-white" href="' . site_url('Wallets') . '"><i class="icon ni ni-edit"></i></a>
                                            </td>
                                        </tr>
                                        ';
                                        if ($stage >= 2) {
                                            if ($debug === 1) {
                                                log_message('debug', 'Budget\index\active_table - L87: ' . $creditAvailable); 
                                            }
                                            // Display for Credit Accounts  
                                            $displayedDateCreditAccounts = date("F") . ' 1st, ' . date("Y");
                                            echo '
                                            <tr>
                                                <td class="d-none">' . $topOrderDate . '</td>
                                                <td class="d-none"></td>
                                                <td></td>
                                                <td>' . $displayedDateCreditAccounts . '</td>
                                                <td><a class="badge badge-sm rounded-pill bg-warning text-white px-4" href="' . site_url('/Wallets') . '">Credit Accounts</a></td>
                                                <td class="d-none d-lg-block"></td>
                                                <td></td>
                                                <td>$' . number_format($creditAvailable, 2) . '</td>
                                                <td>$' . number_format($sum, 2) . '</td>
                                                <td>
                                                    <a class="badge badge-sm rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
                                                    <a class="badge badge-sm rounded-pill bg-primary text-white" href="' . site_url('Wallets') . '"><i class="icon ni ni-edit"></i></a>
                                                </td>
                                            </tr>
                                            ';
                                        }
    
                                        // Adding repayment schedules to the table
                                        if ($debug === 1) {
                                            //log_message('debug', 'Budget\index\browser_table - L139: $repaymentSchedule ' . (print_r($repaymentSchedules, true)));
                                        }
                                        foreach ($repaymentSchedules as $schedule) {
                                            $sum += $schedule['payment_due'];
                                            echo '
                                            <tr>
                                                <td class="d-none">' . $schedule['due_date'] . '</td>
                                                <td class="d-none">Credit</td>
                                                <td><input type="checkbox" class="rowCheckbox" value="' . $schedule['account_id'] . '"></td>
                                                <td>' . date("F jS, Y", strtotime($schedule['due_date'])) . '</td>
                                                <td><a href="' . site_url('Budget/Details/' . $schedule['account_id']) . '">' . $schedule['bank_name'] . '</a></td>
                                                <td>Credit Payment</td>
                                                <td></td>
                                                <td>$' . number_format($schedule['payment_due'], 2) . '</td>
                                                <td>$' . number_format($sum, 2) . '</td>
                                                <td>
                                                    <a class="badge badge-sm rounded-pill bg-primary text-white dynamicModalLoader" data-formtype="Edit" data-endpoint="editCreditAccount" data-accountid="' . $schedule['account_id'] . '"><i class="icon ni ni-edit"></i></a>
                                                </td>
                                            </tr>
                                            ';
                                        }
                                        
                                        $maxLength                          = 15;
                                        
                                        foreach ($userActiveBudgetRecords as $account) {
                                            $accountDate = DateTime::createFromFormat('m/d/Y', $account['designated_date']);
                                            $formattedDate = $accountDate ? $accountDate->format('F jS, Y') : 'Invalid Date';

                                            $sum += $account['net_amount'] ?? 0;
                                            $displaySum = $sum >= 0 ? '$' . number_format($sum, 2) : '<span class="statusRed">$' . number_format(-$sum, 2) . '</span>';
                                            $accountPaidStatus = $account['paid'] ? '' : '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
                                            ?>
                                            <tr>
                                                <td class="d-none"><?= $account['year'] . '-' . $account['month'] . '-' . $account['day']; ?></td>
                                                <td class="d-none"><?= $account['account_type']; ?></td>
                                                <td><input type="checkbox" class="rowCheckbox" value="<?= $account['id']; ?>"></td>
                                                <td><?= $formattedDate; ?></td>
                                                <td><a href="<?= site_url('Budget/Details/' . $account['id']); ?>"><?= $account['name']; ?></a></td>
                                                <?= $userAgent->isMobile() ? '' : '<td>' . $account['source_type'] . '</td><td class="ytd-total-cell" data-name="' . $account['name'] . '"></td> <!-- YTD total placeholder -->' ?>
                                                <td>$<?= number_format($account['net_amount'], 2); ?></td>
                                                <td><?= $displaySum; ?></td>
                                                <?= $userAgent->isMobile() ? '' : '<td>                    
                                                    ' . $accountPaidStatus . '
                                                    <a href="' . site_url('Budget/Edit/' . $account['id']) . '"><i class="icon myfs-md ni ni-edit"></i></a>
                                                    <a href="' . site_url('Budget/Copy/' . $account['id']) . '"><i class="icon myfs-md ni ni-copy"></i></a>
                                                    <a class="text-red" href="' . site_url('Budget/Delete-Account/' . $account['id']) . '"><i class="icon myfs-md ni ni-trash"></i></a>
                                                </td>' ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <script <?= $nonce['script'] ?? '' ?>>
                            $(document).ready(function() {
                                var table = $('#userBudgetingDatatable').DataTable({
                                    "order": [[ 0, "asc" ]],     
                                    "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
                                    "columnDefs": [
                                        {
                                            "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                                            "visible": false,
                                        }
                                    ],
                                    "drawCallback": function(settings) {
                                        var api = this.api();
                                        var subtotal = 0;
                                        api.rows({page:'current'}).every(function (rowIdx, tableLoop, rowLoop) {
                                            var data = this.data();
                                            var accountType = data[1]; // Grab the account type from the hidden column
                                            var amount = parseFloat(data[7].replace(/[\$,]/g, '')); // Ensure to strip out any formatting
                                            
                                            // Special handling for the first two rows representing bank account balance and available credit
                                            if (rowIdx === 0 || rowIdx === 1) {
                                                subtotal += amount;
                                            } else {
                                                // Process based on account type for subsequent rows
                                                if (accountType === 'Expense' && !isNaN(amount)) {
                                                    subtotal -= amount;
                                                } else if (accountType === 'Income' && !isNaN(amount)) {
                                                    subtotal += amount;
                                                }
                                            }
                                            
                                            // Update the displayed subtotal for the current row with commas and color it red if less than 0
                                            if(subtotal < 0) {
                                                data[8] = `<span style="color: red;">${new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal)}</span>`;
                                            } else {
                                                data[8] = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(subtotal);
                                            }
                                            this.data(data); // Set the updated data array back to the row
                                        });
                                    }
                                });
                            });
                            </script>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->