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
            echo '<tr>
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
        $sum                                = 0;
        // log_message('info', 'Budget\index\historical_table L36 - $getUserBankAccounts: ' . print_r($getUserBankAccounts, true));
        // if(empty($getUserBankAccounts)) {
        //     $bankAccountBalance             = 0;
        // } else {
        //     foreach($getUserBankAccounts as $bankAccounts) {
        //         $bankAccountBalance         = $bankAccounts['balance'];
        //     }
        // } 
        // $sum                                += $bankAccountBalance;
        // if ($userAgent->isMobile()) {
        //     $displayedDate                  = date("m") . '/1/' . date("Y");
        //     echo '
        //     <tr>
        //         <td class="d-none">' . date("Y-m-1", strtotime(date("Y") . '-' . date("m") . '-01')) . '</td>
        //         <td>
        //             <a class="badge badge-xs badge-dim rounded-pill bg-primary text-white px-4" href="' . site_url('/Wallets') . '">Bank Accounts</a><br>
        //         </td>
        //         <td>' . number_format($bankAccountBalance,2) . '</td>
        //         <td>$' . number_format($sum,2) . '</td>
        //     </tr>
        //     ';         
        // } elseif ($userAgent->isBrowser()) {
        //     $displayedDate                  = date("F") . ' 1st, ' . date("Y");
        //     echo '
        //     <tr>
        //         <td class="d-none">' . date("Y-m-1", strtotime(date("Y") . '-' . date("m") . '-01')) . '</td>
        //         <td>' . $displayedDate. '</td>
        //         <td><a class="badge badge-sm badge-dim rounded-pill bg-primary text-white px-4" href="' . site_url('/Wallets') . '">Bank Accounts</a></td>
        //         <td></td>
        //         <td></td>
        //         <td>' . number_format($bankAccountBalance,2) . '</td>
        //         <td>$' . number_format($sum,2) . '</td>
        //         <td>
        //             <a class="badge badge-sm badge-dim rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
        //             <a class="badge badge-sm badge-dim rounded-pill bg-primary text-white" href="' . site_url('Wallets') . '">Manage</a>
        //         </td>
        //     </tr>
        //     ';         
        // }     
        // log_message('info', 'Budget\index\historical_table L75 - $getUserCreditAccounts: ' . print_r($getUserCreditAccounts, true));
        // if(empty($getUserCreditAccounts)) {
        //     $creditAccountBalance           = 0;
        // } else {
        //     $creditAccountBalance           = $getUserCreditAccounts[0]['credit_limit'];
        // } 
        // $sum                                += $creditAccountBalance;
        // if ($userAgent->isMobile()) {
        //     $displayedDate                  = date("m") . '/1/' . date("Y");
        //     echo '
        //     <tr>
        //         <td class="d-none">' . date("Y-m-1", strtotime(date("Y") . '-' . date("m") . '-01')) . '</td>
        //         <td><a class="badge badge-xs badge-dim rounded-pill bg-primary text-white px-4" href="' . site_url('/Wallets') . '">Credit Accounts</a></td>
        //         <td>' . number_format($creditAccountBalance,2) . '</td>
        //         <td>$' . number_format($sum,2) . '</td>
        //     </tr>
        //     ';         
        // } elseif ($userAgent->isBrowser()) {
        //     $displayedDate                  = date("F") . ' 1st, ' . date("Y");
        //     echo '
        //     <tr>
        //         <td class="d-none">' . date("Y-m-1", strtotime(date("Y") . '-' . date("m") . '-01')) . '</td>
        //         <td>' . $displayedDate. '</td>
        //         <td><a class="badge badge-sm badge-dim rounded-pill bg-warning text-white px-4" href="' . site_url('/Wallets') . '">Credit Accounts</a></td>
        //         <td class="d-none d-lg-block"></td>
        //         <td></td>
        //         <td>' . number_format($creditAccountBalance,2) . '</td>
        //         <td>$' . number_format($sum,2) . '</td>
        //         <td>
        //             <a class="badge badge-sm badge-dim rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
        //             <a class="badge badge-sm badge-dim rounded-pill bg-primary text-white" href="' . site_url('Wallets') . '">Manage</a>
        //         </td>
        //     </tr>
        //     ';      
        // }   
        $maxLength                          = 15;
        foreach($userBudgetRecords as $account) {
            if ($account['account_type'] === 'Income') {
                $accountNetAmount           = $account['net_amount'];
                $accountNetAmountDisplay    = number_format($accountNetAmount,2);
            } elseif ($account['account_type'] === 'Expense') {
                $accountNetAmount           = '-' . $account['net_amount'];
                $accountNetAmountDisplay    = '<span class="statusRed">' . number_format($accountNetAmount,2). '</span>';
            }
            if ($account['paid'] == 0) {
                $accountPaidStatus          = '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
                $sum                        += $accountNetAmount;
            } else {
                $accountPaidStatus          = '<a class="statusRed" href="' . site_url('Budget/Status/Unpaid/' . $account['id']) . '"><i class="icon myfs-md ni ni-na"></i></a>';
                $sum                        += 0;
            }
            if ($sum >= 0) {
                $sumDisplay                 = '$' . number_format($sum,2);
            } elseif ($sum < 0) {
                $sumDisplay                 = '<span class="statusRed">$' . number_format(($sum * -1),2) . '</span>';
            }
            $accountNewDate                 = $account['designated_date']; 
            $accountName                    = $account['name']; 
            if (strlen($accountName) > $maxLength) {
                $accountNameDisplay         = substr($accountName, 0, $maxLength) . "...";
              } else {
                $accountNameDisplay         = $accountName;
              }
            if ($userAgent->isMobile()) {
                $displayedDate                  = date("m") . '/1/' . date("Y");
                echo '
                <tr>
                    <td class="d-none">' . date("Y-m-1", strtotime(date("Y") . '-' . date("m") . '-01')) . '</td>
                    <td><a href="' . site_url('Budget/Details/' . $account['id']) . '">' . $accountNameDisplay . '</a></td>
                    <td>' . $accountNetAmountDisplay . '</td>
                    <td>' . $sumDisplay . '</td>
                </tr>
                ';         
            } elseif ($userAgent->isBrowser()) {
                echo '
                <tr>
                    <td class="d-none">' . $account['id'] . '</td>
                    <td>' . date("F jS, Y", strtotime($account['year'] . '-' . $account['month'] . '-' . $account['day'])) . '</td>
                    <td><a href="' . site_url('Budget/Details/' . $account['id']) . '">' . $account['name'] . '</a></td>
                    <td>' . $account['source_type'] . '</td>
                    <td>';    
                        // if (!empty($account['wallet_id'])) {
                        //     foreach ($getUserWallet->result_array() as $userWallets) {
                        //         if (!empty($userWallets['wallet_type'] === 'Banking')) {
                        //             if ($getUserWallet->num_rows() > 0) {
                        //                 echo '
                        //                     <a href="' . site_url('Wallets/' . $account['account_type'] . '/Details/' . $account['id']) . '/' . $userWallets['id'] . '"><span>' . $userWallets['nickname'] . '</span></a>
                        //                 ';
                        //             }
                        //         }
                        //     } 
                        // } else {     
                        //     echo '
                        //     <div class="dropdown">      
                        //         <a class="badge badge-sm badge-dim rounded-pill bg-primary text-white dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em> Wallet</a>      
                        //         <div class="dropdown-menu">
                        //             <ul class="link-list-opt">
                        //                 <li class="p-1 fw-bold">Bank Accounts</li>
                        //             ';
                        //             foreach ($getUserWallets->result_array() as $userWallets) {
                        //                 if (!empty($userWallets['wallet_type'] === 'Banking')) {
                        //                     if ($getUserWallets->num_rows() > 0) {
                        //                         echo '
                        //                         <li><a href="' . site_url('Wallets/Attach-Account/' . $account['account_type'] . '/' . $account['id']) . '/' . $userWallets['id'] . '"><span>' . $userWallets['nickname'] . '</span></a></li>    
                        //                         ';
                        //                     }
                        //                 }
                        //             }      
                        //         echo '
                        //             </ul>   
                        //             <ul class="link-list-opt">
                        //                 <li class="p-1 fw-bold">Credit Accounts</li>
                        //             ';
                        //             foreach ($getUserWallets->result_array() as $userWallets) {
                        //                 if (!empty($userWallets['wallet_type'] === 'Credit')) {
                        //                     if ($getUserWallets->num_rows() > 0) {
                        //                         echo '
                        //                         <li><a href="' . site_url('Wallets/Attach-Account/' . $account['account_type'] . '/' . $account['id']) . '/' . $userWallets['id'] . '"><span>' . $userWallets['nickname'] . '</span></a></li>    
                        //                         ';
                        //                     }
                        //                 }
                        //             }            
                        //         echo '  
                        //                 <li><a href="' . site_url('Wallets') . '"><span><em class="icon icon-xs ni ni-plus"></em> Create Wallet</span></a></li>    
                        //             </ul>      
                        //         </div>    
                        //     </div>';
                        // }
                    echo '
                    </td>
                    <td>' . $accountNetAmountDisplay . '</td>
                    <td>' . $sumDisplay . '</td>
                    <td>
                        ' . $accountPaidStatus . '
                        <a href="' . site_url('Budget/Edit/' . $account['id']) . '"><i class="icon  myfs-md ni ni-edit"></i></a>
                        <a href="' . site_url('Budget/Copy/' . $account['id']) . '"><i class="icon  myfs-md ni ni-copy"></i></a>
                        <a class="text-red" href="' . site_url('Budget/Delete-Account/' . $account['id']) . '"><i class="icon myfs-md ni ni-trash"></i></a>
                    </td>
                </tr>';
            }
        };
        ?>
    </tbody>
</table>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    var table = $('#userBudgetingHistoryDatatable').DataTable({
        "order": [[ 0, "desc" ]],     
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