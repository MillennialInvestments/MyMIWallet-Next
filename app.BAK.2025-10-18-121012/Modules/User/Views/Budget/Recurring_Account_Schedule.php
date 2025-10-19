<?php
function safeDateFormat($date, $format) {
    $dateTime = DateTime::createFromFormat('m/d/Y', $date);
    if ($dateTime instanceof DateTime) {
        return $dateTime->format($format);
    } else {
        error_log("Failed to parse date: $date");
        return false;
    }
}

$beta = $siteSettings->beta == 1 ? 'Yes' : 'No';
$userAccount = $_SESSION['allSessionData']['userAccount'];
$cuID = $userAccount['cuID'];
$cuEmail = $userAccount['cuEmail'];
$cuUsername = $userAccount['cuUsername'];
$accountID = !empty($this->uri->segment(4)) ? $this->uri->segment(4) : null;
$accountDetails = $accountID ? $this->budget_model->get_user_budget_record($cuID, $accountID) : [];

$accountName = $accountType = $accountSourceType = $accountNetAmount = $accountGrossAmount = $accountRecAccount = $accountRecSchedule = $accountIntervals = '';
$accountDesDate = date("m/d/Y");

foreach ($accountDetails as $account) {
    $accountName = $account['name'];
    $accountType = $account['account_type'];
    $accountSourceType = $account['source_type'];
    $accountNetAmount = $account['net_amount'];
    $accountGrossAmount = $account['gross_amount'];
    $accountRecAccount = $account['recurring_account'];
    $accountRecSchedule = $account['recurring_schedule'];
    $accountIntervals = $account['intervals'];
    $accountDesDate = safeDateFormat($account['designated_date'], 'm/d/Y') ?: date("m/d/Y");
    break; // Assuming $accountDetails will have one record or the first one is the target
}

$i = 1;
$endDate = new DateTime('12/31/' . date('Y'));
$startDate = DateTime::createFromFormat('m/d/Y', $accountDesDate);
$interval = $startDate->diff($endDate);
$monthsLeft = (($interval->format('%y') * 12) + $interval->format('%m'));
$timeInterval = match ($accountIntervals) {
    'Daily' => $interval->days,
    'Weekly', 'Bi-Weekly', '15th/Last' => floor($interval->days / 7),
    'Monthly' => $monthsLeft,
    'Quarterly' => floor($monthsLeft / 3),
    'Semi-Annually' => floor($monthsLeft / 6),
    'Annually' => floor($monthsLeft / 12),
    default => 0,
};

$data = [];
while ($i <= $timeInterval) {
    $dueDate = clone $startDate;
    switch ($accountIntervals) {
        case '15th/Last':
            if ($i % 2 == 0) {
                $dueDate->modify('last day of this month');
            } else {
                $dueDate->modify('first day of next month')->setDate($dueDate->format('Y'), $dueDate->format('m'), 15);
            }
            break;
        default:
            $addUnit = match ($accountIntervals) {
                'Daily' => 'P1D',
                'Weekly' => 'P1W',
                'Bi-Weekly' => 'P2W',
                'Monthly' => 'P1M',
                'Quarterly' => 'P3M',
                'Semi-Annually' => 'P6M',
                'Annually' => 'P1Y',
                default => 'P1M',
            };
            $dueDate->add(new DateInterval($addUnit));
    }
    $data[] = [
        'dueDate' => $dueDate->format('m/d/Y'),
        'accountName' => $accountName,
        'accountType' => $accountType,
        'accountSourceType' => $accountSourceType,
        'netAmount' => $accountNetAmount,
        'grossAmount' => $accountGrossAmount,
    ];
    $i++;
}
?>
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
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:1.05rem;
        margin: 0;
        }
    .success-checkmark {
        color: #1ee0ac;
        font-size: 50px;
        line-height: 100px;
        margin-left:-15px;
    }
    .success-card {
        background: white;
        padding: 60px;
        border-radius: 25px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
<div class="nk-block">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4">
            <div class="nk-block success-nk-block">
                <div class="card card-bordered success-card h-100">
                    <div style="border-radius:200px; height:100px; width:100px; background: #F8FAF5; margin:0 auto;">
                        <i class="checkmark success-checkmark">✓</i>
                    </div>
                    <h1 class="success-header">Next!</h1> 
                    <p>
                        Confirm your Recurring Account Information to complete your New <?php echo $accountType; ?> Account!
                    </p>
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
                            <div class="card-tools me-n1">
                                <!-- <a class="btn btn-success text-white" href="<?php //echo site_url('/Budget/Approve-Recurring-Schedule/' . $accountID); ?>">Approve</a>
                                <a class="btn btn-danger text-white" href="<?php //echo site_url('/Budget/Cancel-Account/' . $accountID); ?>">Cancel</a> -->
                            </div>
                        </div>
                    </div><!-- .card-inner -->
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
                                    <td>$<?= number_format($accountNetAmount,2); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a class="btn btn-success text-white" href="<?php echo site_url('Budget/Edit/' . $accountID); ?>">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-lg-12">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Please Confirm Your Recurring Schedule</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <a class="btn btn-success text-white" href="<?php echo site_url('/Budget/Approve-Recurring-Schedule/' . $accountID); ?>">Approve</a>
                                <a class="btn btn-danger text-white" href="<?php echo site_url('/Budget/Cancel-Account/' . $accountID); ?>">Cancel</a>
                                <!-- <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="<?php //echo site_url('/Budget/Edit/' . $accountID); ?>"><em class="icon ni ni-setting"></em><span>Account Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <table class="table table-hover display" id="#budgetRecurringTable">
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
                                    // print_r($listedDates);
                                    // echo '<br>';
                                    // print_r($data);
                                    $sum = 0;
                                    echo '
                                    <tr>
                                        <td>' . $accountDesDate . '</td>
                                        <td>' . $accountName . '</td>
                                        <td>' . $accountType . '</td>
                                        <td>' . $accountSourceType     . '</td>
                                        <td>' . $accountIntervals . '</td>
                                        <td>' . $accountNetAmount . '</td>
                                        <td>' . number_format($accountNetAmount,2) . '</td>
                                        <td class="text-center">
                                            <a class="data-more" href="' . site_url('Budget/Recurring-Account/Edit/' . $accountID . $account['recurring_account_order']) . '" onClick="email_Switch(this)"><em class="icon ni ni-pen2"></em></a>
                                        </td>
                                    </tr>
                                    '; 
                                    $sum                                                    += $accountNetAmount;
                                    foreach($data as $id=>$account) {
                                        $accountDate                                        = $account['designated_date'];
                                        $accountMonth                                       = $newIntervalDate->format('m'); 
                                        $accountDay                                         = $newIntervalDate->format('d'); 
                                        $accountYear                                        = $newIntervalDate->format('Y'); 
                                        // Update sum
                                        $sum += $account['net_amount']; 
                                        
                                        if (!empty($initialAmount)) {
                                            $sum                                            += $initialAmount;
                                        } else {
                                            $sum                                            = $sum;
                                        }
                                        $amountSummary                                      = $sum; 
                                        if ($account['initial_weeks_left'] == $account['last_date']) {
                                            continue; 
                                        } else {
                                            $submitData                                     = array(      
                                                'status'							        => $account['status'],
                                                'mode'							            => $account['mode'],
                                                'beta'								        => $account['beta'],
                                                'month'                                     => $account['month'], 
                                                'day'                                       => $account['day'], 
                                                'year'                                      => $account['year'], 
                                                'unix_timestamp'				            => time(),
                                                'created_by'						        => $account['created_by'],
                                                'created_by_email'	    			        => $account['created_by_email'],
                                                'username'							        => $account['username'],
                                                'name'							            => $account['name'],
                                                'net_amount'						        => $account['net_amount'],
                                                'gross_amount'						        => $account['gross_amount'],
                                                'account_summary'                           => $amountSummary,
                                                'recurring_account'				            => $account['recurring_account'],
                                                'recurring_account_primary' 	            => 'No',
                                                'recurring_account_id'  		            => $account['recurring_account_id'],
                                                'recurring_account_order'                   => $account['recurring_account_order'],
                                                'account_type'					            => $account['account_type'],
                                                'source_type'					            => $account['source_type'],
                                                'intervals'							        => $account['intervals'],
                                                'designated_date'			                => $accountDate,
                                                'initial_weeks_left'                        => '',
                                            );
                                            // echo '<br><br>'; 
                                            echo '
                                            <tr>
                                                <td>' . $accountDate . '</td>
                                                <td>' . $account['name'] . '</td>
                                                <td>' . $account['account_type'] . '</td>
                                                <td>' . $account['source_type'] . '</td>
                                                <td>' . $account['intervals'] . '</td>
                                                <td>' . $account['net_amount'] . '</td>
                                                <td>' . number_format($sum, 2) . '</td>
                                                <td class="text-center">
                                                    <a class="data-more" href="' . site_url('Budget/Recurring-Account/Edit/' . $accountID . $account['recurring_account_order']) . '" onClick="email_Switch(this)"><em class="icon ni ni-pen2"></em></a>
                                                </td>
                                            </tr>
                                            ';
                                            if ($accountRecSchedule != 1) {
                                                $this->db->insert('bf_users_budgeting', $submitData);

                                                $updateData                                 = array(
                                                    'recurring_schedule'                    => 1,
                                                );

                                                $this->db->where('id', $accountID); 
                                                $this->db->update('bf_users_budgeting', $updateData); 
                                            };
                                        }
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
                                    <td><strong>Total:</strong></th>
                                    <td>$<?php echo number_format($amountSummary,2); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
