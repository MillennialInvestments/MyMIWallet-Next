<!-- app/Modules/User/Views/Budget/Recurring_Account/Schedule.php -->
<?php
// Debug log: Verify data passed to the view
log_message('debug', 'Schedule L4 - View - Recurring Schedule - Start Rendering');
log_message('debug', 'Schedule L5 - View - $recurringSchedule: ' . print_r($recurringSchedule, true));
log_message('debug', 'Schedule L6 - View - $accountID: ' . $accountID);

// Validate recurring schedule data
if (!is_array($recurringSchedule)) {
    $recurringSchedule = [];
    log_message('error', 'View File - $recurringSchedule is not an array or is undefined.');
}

// Extract first record and handle nested data
$account = $recurringSchedule[0] ?? [];
$accountName = $account['accountName'] ?? 'N/A';
// $accountType = $account['account_type'] ?? 'N/A'; // Correct field
// $accountSourceType = $account['source_type'] ?? 'Unknown Source'; // Correct field
$accountType = $account['accountType'] ?? 0; 
$accountSourceType = $account['accountSourceType'] ?? 0; 
$accountNetAmount = $account['netAmount'] ?? 0;
$accountGrossAmount = $account['grossAmount'] ?? 0;
$accountRecAccount = $account['recurringAccount'] ?? 'No';
$accountRecSchedule = $account['recurringSchedule'] ?? 'No';
$accountIntervals = $account['intervals'] ?? 'Monthly';
$accountDesDate = $account['designated_date'] ?? date("m/d/Y");

// Debug log: Validate extracted data
log_message('debug', 'Schedule L27 - View File - Extracted Account Info: ' . json_encode([
    'accountName' => $accountName,
    'accountType' => $accountType,
    'accountSourceType' => $accountSourceType,
    'accountNetAmount' => $accountNetAmount,
    'accountGrossAmount' => $accountGrossAmount,
    'accountRecAccount' => $accountRecAccount,
    'accountIntervals' => $accountIntervals,
    'accountDesDate' => $accountDesDate,
]));

?>
<div>
    <style <?= $nonce['style'] ?? '' ?>>
        .success-nk-block { text-align: center; }
        .success-header { color: #1ee0ac; font-family: "Nunito Sans", "Helvetica Neue", sans-serif; font-weight: 900; font-size: 40px; margin-bottom: 10px; }
        p { color: #404f5e; font-family: "Nunito Sans", "Helvetica Neue", sans-serif; font-size: 1.05rem; margin: 0; }
        .success-checkmark { color: #1ee0ac; font-size: 50px; line-height: 100px; margin-left: -15px; }
        .success-card { background: #fff; padding: 60px; border-radius: 25px; box-shadow: 0 2px 3px #c8d0d8; display: inline-block; margin: 0 auto; }
    </style>
    <div class="nk-block">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="nk-block success-nk-block">
                    <div class="card card-bordered h-100 success-card">
                        <div style="border-radius:200px; height:100px; width:100px; background: #f8faf5; margin:0 auto;">
                            <i class="checkmark success-checkmark">✓</i>
                        </div>
                        <h1 class="success-header">Next!</h1>
                        <p>Confirm your Recurring Account Information to complete your New <?= $accountType; ?> Account!</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card card-bordered h-100">
                    <div class="card-inner-group">
                        <div class="card-inner card-inner-md">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Please Confirm Your Recurring Schedule</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Account Name:</th>
                                        <td><?= $accountName; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Account Type:</th>
                                        <td><?= $accountType; ?></td>
                                        <th>Account Source:</th>
                                        <td><?= $accountSourceType; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Recurring:</th>
                                        <td><?= $accountRecAccount; ?></td>
                                        <th>Recurring Cycle:</th>
                                        <td><?= $accountIntervals; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date Due:</th>
                                        <td><?= $accountDesDate; ?></td>
                                        <th>Amount Due:</th>
                                        <td>$<?= number_format($accountNetAmount, 2); ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a class="btn text-white btn-success" href="<?= site_url('Budget/Edit/' . $accountID); ?>">Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-12">
                <div class="card card-bordered h-100">
                    <div class="card-inner-group">
                        <div class="card-inner card-inner-md">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Please Confirm Your Recurring Schedule</h6>
                                </div>
                                <div class="card-tools me-n1">
                                    <a class="btn btn-success text-white" id="approveSchedule">Approve</a>
                                    <a class="btn btn-danger text-white" href="<?= site_url('/Budget/Cancel-Account/' . $accountID); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <table class="table table-hover display" id="budgetRecurringTable">
                                <thead>
                                    <tr>
                                        <th>Due Date</th>
                                        <th>Account</th>
                                        <th>Type</th>
                                        <th>Source</th>
                                        <th>Interval</th>
                                        <th>Amount</th>
                                        <th>Subtotal</th>
                                        <th class="text-center">More Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sum = 0;
                                    foreach ($recurringSchedule as $id => $record) {
                                        $dueDate = $record['dueDate'] ?? 'N/A';
                                        $recordName = $record['accountName'] ?? 'N/A';
                                        $recordNetAmount = $record['netAmount'] ?? 0;
                                        $recordAccountType = $record['accountType'] ?? 'N/A'; // Correctly access `accountType`
                                        $recordSourceType = $record['accountSourceType'] ?? 'N/A'; // Correctly access `accountSourceType`
                                    
                                        $sum += $recordNetAmount;
                                    
                                        log_message('debug', 'View File - Iteration: ' . $id . ' | Processed Record: ' . json_encode([
                                            'dueDate' => $dueDate,
                                            'recordName' => $recordName,
                                            'recordNetAmount' => $recordNetAmount,
                                            'recordAccountType' => $recordAccountType,
                                            'recordSourceType' => $recordSourceType,
                                        ]));
                                    
                                        echo "<tr>
                                            <td>{$dueDate}</td>
                                            <td>{$recordName}</td>
                                            <td>{$recordAccountType}</td>
                                            <td>{$recordSourceType}</td>
                                            <td>{$accountIntervals}</td>
                                            <td>$" . number_format($recordNetAmount, 2) . "</td>
                                            <td>$" . number_format($sum, 2) . "</td>
                                            <td class='text-center'><a class='data-more' href='" . site_url('Budget/Recurring-Account/Edit/' . ($accountID + $id)) . "'><em class='icon ni ni-pen2'></em></a></td>
                                        </tr>";
                                    }
                                                                       
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total:</strong></td>
                                        <td>$<?= number_format($sum, 2); ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const approveButton = document.querySelector("#approveSchedule");

    if (approveButton) {
        approveButton.addEventListener("click", async () => {
            console.log("Approve button clicked.");

            const recurringData = <?= json_encode($recurringSchedule); ?>;
            const accountID = <?= json_encode($accountID); ?>;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            console.log("Recurring data to be sent:", recurringData);
            console.log("Account ID to be sent:", accountID);

            if (!Array.isArray(recurringData) || recurringData.length === 0) {
                console.error("Recurring data is empty or invalid.");
                alert("Recurring data is missing. Cannot approve.");
                return;
            }

            // Validate each record
            const isValid = recurringData.every(record =>
                record.dueDate && record.netAmount !== undefined && record.grossAmount !== undefined
            );

            if (!isValid) {
                console.error("Recurring data contains invalid entries:", recurringData);
                alert("Invalid recurring schedule data. Please check the logs.");
                return;
            }

            try {
                const payload = {
                    accountID,
                    recurringData: recurringData.map(record => ({
                        dueDate: record.dueDate,
                        netAmount: parseFloat(record.netAmount),
                        grossAmount: parseFloat(record.grossAmount),
                        accountName: record.accountName,
                        accountType: record.accountType,
                        accountSourceType: record.accountSourceType,
                    })),
                };

                console.log("Payload to be sent:", payload);

                const response = await fetch("<?= site_url('/Budget/Approve-Recurring-Schedule/' . $accountID); ?>", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
                    },
                    body: JSON.stringify(payload),
                    credentials: "same-origin",
                    redirect: "manual",
                });

                if (response.ok) {
                    console.log("Response received:", response);
                    alert("Recurring schedules approved successfully.");
                    window.location.href = "<?= site_url('/Budget'); ?>";
                } else {
                    console.error("Failed to approve recurring schedules. Status:", response.status);
                    alert("Approval failed. Check logs for details.");
                }
            } catch (error) {
                console.error("Error during approval:", error);
                alert("An unexpected error occurred. Check the console for details.");
            }
        });
    } else {
        console.error("Approve button not found.");
    }
});
</script>

