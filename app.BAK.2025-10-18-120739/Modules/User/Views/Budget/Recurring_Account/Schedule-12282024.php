<!-- app/Modules/User/Views/Budget/Recurring_Account/Schedule.php -->
<?php
// Assuming this file is located within a view that's part of the App\Modules\User\Views namespace or similar structure where $this refers to the view renderer with access to passed data

$accountID = $accountID ?? $account['accountID'] ?? $uri->getSegment(4) ??  null; // Adjust based on actual structure
$accountDetails = $recurringSchedule; // This should be directly accessible from the passed data
$account = $accountDetails[0] ?? [];
// log_message('debug', 'Recurring_Account\Schedule L7: $account' . $account); 
$accountName = $account['accountName'] ?? '';
$accountType = $account['accountType'] ?? '';
$accountSourceType = $account['accountSourceType'] ?? '';
$accountNetAmount = $account['net_amount'] ?? 0;
$accountGrossAmount = $account['gross_amount'] ?? 0;
$accountRecAccount = $accountRecAccount ?? 'No'; // Assuming this is passed correctly
$accountRecSchedule = $accountRecSchedule ?? 'No'; // Assuming this is passed correctly
$accountIntervals = $accountIntervals ?? 'Monthly'; // Assuming this is passed correctly
$accountDesDate = $accountDesDate ?? date("m/d/Y"); // Assuming this is passed correctly

$data = $recurringSchedule; // Adjust based on actual passed data structure

?>
<div>
    <style <?= $nonce['style'] ?? '' ?>>
        .success-nk-block {
            text-align: center;
        }
        .success-header {
            color: #1ee0ac;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }
        p {
            color: #404f5e;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 1.05rem;
            margin: 0;
        }
        .success-checkmark {
            color: #1ee0ac;
            font-size: 50px;
            line-height: 100px;
            margin-left: -15px;
        }
        .success-card {
            background: #fff;
            padding: 60px;
            border-radius: 25px;
            box-shadow: 0 2px 3px #c8d0d8;
            display: inline-block;
            margin: 0 auto;
        }
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
                                        <td><a class="btn text-white btn-success" href="<?= site_url('Budget/Edit/'.$accountID); ?>">Edit</a></td>
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
                                    <a class="btn btn-success text-white" id="approveSchedule" href="#">Approve</a>
                                    <a class="btn btn-danger text-white" href="<?= site_url('/Budget/Cancel-Account/' . $accountID); ?>">Cancel</a>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
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
                                    foreach ($data as $id => $account) {
                                        $accountDate = $account['dueDate'];
                                        $sum += $account['accountNetAmount']; // Use net_amount here
                                        echo '
                                        <tr>
                                            <td>' . $accountDate . '</td>
                                            <td>' . $account['accountName'] . '</td>
                                            <td>' . $account['accountType'] . '</td>
                                            <td>' . $account['accountSourceType'] . '</td>
                                            <td>' . $accountIntervals . '</td>
                                            <td>$' . number_format($account['accountNetAmount'], 2) . '</td> <!-- Update key here -->
                                            <td>$' . number_format($sum, 2) . '</td>
                                            <td class="text-center"><a class="data-more" href="' . site_url('Budget/Recurring-Account/Edit/' . ($accountID + $id)) . '" onClick="email_Switch(this)"><em class="icon ni ni-pen2"></em></a></td>
                                        </tr>
                                        ';
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
document.addEventListener("DOMContentLoaded", function() {
    const approveButton = document.querySelector("#approveSchedule");

    if (approveButton) {
        approveButton.addEventListener("click", async () => {
            // Assuming $recurringSchedule contains the prepared schedules
            const recurringData = <?= json_encode($recurringSchedule); ?>;

            try {
                const response = await fetch("<?= site_url('/Budget/Approve-Recurring-Schedule/' . $accountID); ?>", {
                    method: "POST",
                    body: JSON.stringify(recurringData),
                    headers: { "Content-Type": "application/json" },
                    credentials: "same-origin"
                });

                if (response.ok) {
                    alert("Recurring schedules approved successfully.");
                    // Redirect as necessary
                    window.location.href = "<?= site_url('/Budget'); ?>";
                } else {
                    console.error("Failed to approve recurring schedules. Status:", response.status);
                    // Handle error case
                }
            } catch (error) {
                console.error("Error approving recurring schedules:", error);
                // Handle exception
            }
        });
    }
});

</script>
