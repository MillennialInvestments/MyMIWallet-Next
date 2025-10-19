<?php
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A");
$integrationTitle               = $configMode === 'Add' ? 'Integrate ' . esc($accountType) . ' Account' :
                                ($configMode === 'Edit' ? 'Edit ' . esc($accountName) . ' - ' . esc($accountType) . ' Account' :
                                'Copy ' . esc($accountName) . ' - ' . esc($accountType) . ' Account');
$formTitle                      = 'Account Information';
$accountID                      = old('account_id', $accountID ?? '');
$newAccountDate                 = esc($newAccountDate ?? date('m/d/Y'));
$designatedDateText             = $designatedDate ?? 'Designated Date';
$accountDesDateFormatted        = date('Y-m-d', strtotime($accountDesDate));
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formControl		            = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;
?>
<h4 class="card-title"><?= $formTitle; ?></h4>
<p class="card-description">Please fill out information below</p>
<hr>
<input type="hidden" id="beta" name="beta" value="<?= old('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" />
<input type="hidden" id="form_mode" name="form_mode" value="<?= old('form_mode', $configMode); ?>">
<input type="hidden" id="user_id" name="user_id" value="<?= old('user_id', $cuID); ?>">
<input type="hidden" id="user_email" name="user_email" value="<?= old('user_email', $cuEmail); ?>">
<input type="hidden" id="username" name="username" value="<?= old('username', $cuUsername); ?>">
<input type="hidden" id="account_id" name="account_id" value="<?= old('account_id', $accountID); ?>">
<input type="hidden" id="account_type" name="account_type" value="<?= old('account_type', $accountData['account_type'] ?? ''); ?>">
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="designated_date">Due Date</label>
    <div class="col-6">
        <input id="designated_date" name="designated_date" value="<?php echo set_value('designated_date', $accountDesDateFormatted); ?>" class="<?php echo $formControl; ?>" type="date" placeholder="Enter Current Value of Wallet" required>
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="account_type" class="col-6 form-label">Account Type</label>
	<div class="col-6">

        <select name="account_type" class="form-control" id="account_type" required>
            <?php
                $account_type_values = array(
                    'N/A'                       => 'Select-Category',
                    'Income'                    => 'Income',
                    'Expense'                   => 'Expense',
                );
                foreach ($account_type_values as $value => $displayText) {
                    $selected = $accountType == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="source_type" class="col-6 form-label">Source Type</label>
	<div class="col-6">

        <select name="source_type" class="form-control" id="source_type" required>
            <?php
                if ($accountType === 'Income') {
                    $source_type_values = array(
                        'N/A'                       => 'Select-Category',
                        'Full-Time - Hourly'        => 'Full-Time - Hourly',
                        'Full-Time - Salary'        => 'Full-Time - Salary',
                        'Part-Time'    		        => 'Part-Time - Hourly',
                        'One-Time'                  => 'One-Time Payment',
                        'Retirement'                => 'Retirement',
                        'Self-Employment'    		=> 'Self-Employment',
                        'Unemployed'                => 'Unemployed',
                        'Loan'                      => 'Loan',
                        'Other'                     => 'Other...',
                    );
                } elseif ($accountType === 'Expense') {
                    $source_type_values = array(
                        $accountSourceType          => $accountSourceType,
                        'N/A'                       => 'Select-Category',
                        'Childcare'    		        => 'Childcare',
                        'Debt - Business'	        => 'Debt - Business',
                        'Debt - Personal'	        => 'Debt - Personal',
                        'Debt - Student'	        => 'Debt - Student',
                        'Electricity - Utility'     => 'Electricity - Utility',
                        'Food/Groceries'            => 'Food/Groceries',
                        'Gas - Transportation'      => 'Gas - Transportation',
                        'Gas - Utility'             => 'Gas - Utility',
                        'Insurance - Auto'	        => 'Insurance - Auto',
                        'Insurance - Health'        => 'Insurance - Health',
                        'Insurance - Home'	        => 'Insurance - Home',
                        'Insurance - Life'	        => 'Insurance - Life',
                        'Insurance - Renter\'s'	    => 'Insurance - Renter\'s',
                        'Internet - Home'	        => 'Internet - Home',
                        'Internet - Business'       => 'Internet - Business',
                        'Loan - Auto'	            => 'Loan - Auto',
                        'Loan - Business'	        => 'Loan - Business',
                        'Loan - Mortgage'           => 'Loan - Mortgage',
                        'Loan - Personal'	        => 'Loan - Personal',
                        'Loan - Student'	        => 'Loan - Student',
                        'Medical'    		        => 'Medical',
                        'Rent'      		        => 'Rent',
                        'Taxes - Business'          => 'Taxes - Business',
                        'Taxes - Investments'       => 'Taxes - Investments',
                        'Taxes - Personal'          => 'Taxes - Personal',
                        'Travel'                    => 'Travel',
                        'Water'                     => 'Water',
                        'Other'                     => 'Other...',
                    );
                } else {
                    $source_type_values = array(
                        $accountSourceType          => $accountSourceType,
                        'N/A'                       => 'Select-Category',
                        'Full-Time - Hourly'        => 'Full-Time - Hourly',
                        'Full-Time - Salary'        => 'Full-Time - Salary',
                        'Part-Time'    		        => 'Part-Time - Hourly',
                        'One-Time'                  => 'One-Time Payment',
                        'Retirement'                => 'Retirement',
                        'Self-Employment'    		=> 'Self-Employment',
                        'Unemployed'                => 'Unemployed',
                        'Loan'                      => 'Loan',
                        'Childcare'    		        => 'Childcare',
                        'Debt - Business'	        => 'Debt - Business',
                        'Debt - Personal'	        => 'Debt - Personal',
                        'Debt - Student'	        => 'Debt - Student',
                        'Electricity - Utility'     => 'Electricity - Utility',
                        'Food/Groceries'            => 'Food/Groceries',
                        'Gas - Transportation'      => 'Gas - Transportation',
                        'Gas - Utility'             => 'Gas - Utility',
                        'Insurance - Auto'	        => 'Insurance - Auto',
                        'Insurance - Health'        => 'Insurance - Health',
                        'Insurance - Home'	        => 'Insurance - Home',
                        'Insurance - Life'	        => 'Insurance - Life',
                        'Insurance - Renter\'s'	    => 'Insurance - Renter\'s',
                        'Internet - Home'	        => 'Internet - Home',
                        'Internet - Business'       => 'Internet - Business',
                        'Loan - Auto'	            => 'Loan - Auto',
                        'Loan - Business'	        => 'Loan - Business',
                        'Loan - Mortgage'	        => 'Loan - Mortgage',
                        'Loan - Personal'	        => 'Loan - Personal',
                        'Loan - Student'	        => 'Loan - Student',
                        'Medical'    		        => 'Medical',
                        'Rent'      		        => 'Rent',
                        'Taxes - Business'          => 'Taxes - Business',
                        'Taxes - Investments'       => 'Taxes - Investments',
                        'Taxes - Personal'          => 'Taxes - Personal',
                        'Travel'                    => 'Travel',
                        'Water'                     => 'Water',
                        'Other'                     => 'Other...',
                    );
                }
                foreach ($source_type_values as $value => $displayText) {
                    $selected = $accountSourceType == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
	</div>
</div>
<?php if ($accountType === 'Expense') { ?>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="is_debt" class="col-6 form-label">Is this considered a Debt?</label>
	<div class="col-6">
        <select class="<?php echo $formControl; ?>" name="is_debt" id="is_debt" style="height: 40px; padding: 10px;">
            <?php
                $account_type_values = array(
                    'N/A'                       => 'Select-An-Option',
                    '1'                         => 'Yes',
                    '0'                         => 'No',
                );
                foreach ($account_type_values as $value => $displayText) {
                    $selected = $accountIsDebt == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
	</div>
</div>
<!-- Credit Card Payment Field -->
<div class="<?php echo $formGroup; ?> mb-2">
    <label for="is_cc_payment" class="col-6 form-label">Is this a Credit Card Payment?</label>
    <div class="col-6">
        <select class="<?php echo $formControl; ?>" name="is_cc_payment" id="is_cc_payment" style="height: 40px; padding: 10px;">
        <?php
            $is_cc_values = array(
                'N/A'                       => 'Select-An-Option',
                '1'                         => 'Yes',
                '0'                         => 'No',
            );
            foreach ($is_cc_values as $value => $displayText) {
                $selected = $accountIsDebt == $value ? 'selected' : '';
                echo "<option value=\"$value\" $selected>$displayText</option>";
            }
        ?>
        </select>
    </div>
</div>
<?php } else { ?>
    <!-- <input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : $configMode); ?>">	 -->
<?php } ?>
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="nickname"><?= $accountType; ?> Account Name</label>
    <div class="col-6">
        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Enter Account Nickname" value="<?= $accountName; ?>">
    </div>
</div>
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="net_amount">Net Amount</label>
    <div class="col-6">
        <input type="text" class="form-control" name="net_amount" id="net_amount" placeholder="Enter Net Amount" value="<?= $accountNetAmount; ?>">
    </div>
</div>
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="gross_amount">Gross Amount</label>
    <div class="col-6">
        <input type="text" class="form-control" name="gross_amount" id="gross_amount" placeholder="Enter Gross Amount" value="<?= $accountGrossAmount; ?>">
    </div>
</div>
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="paid">Paid/Received?</label>
    <div class="col-6">
        <select name="paid" class="form-control" id="paid" required>
            <?php
                $paid_values = array(
                    $accountPaidStatus              => $accountPaidStatus,
                    'N/A'                           => 'Select-An-Option',
                    '1'    		                    => 'Yes',
                    '0'    		                    => 'No',
                );
                foreach ($paid_values as $value => $displayText) {
                    $selected = $accountPaidStatus == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
    </div>
</div>
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="recurring_account">Recurring Account?</label>
    <div class="col-6">
        <select name="recurring_account" class="form-control" id="recurring_account" required>
            <?php
                $recurring_account_values = array(
                    $accountRecurringAccount        => $accountRecurringAccount,
                    'N/A'                           => 'Select-An-Option',
                    'Yes'    		                => 'Yes',
                    'No'    		                => 'No',
                );
                foreach ($recurring_account_values as $value => $displayText) {
                    $selected = $accountRecurringAccount == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
    </div>
</div>
<?php 
if (!empty($accountRecurringAccount) || $accountRecurringAccount === 'Yes') {
    $recurringAccountStyle                          = 'display:block'; 
} elseif (empty($accountRecurringAccount) || $accountRecurringAccount === 'No') {
    $recurringAccountStyle                          = 'display:none;'; 
}
?>
<div class="form-group row mb-2" id="recurring_fields" style="display: none;">
    <label class="col-6 form-label" for="intervals">Time Intervals</label>
    <div class="col-6">
        <select name="intervals" class="form-control" id="intervals">
            <?php
                if ($accountType === 'Income') {
                    $intervals_values = array(
                        $accountIntervals           => $accountIntervals,
                        'N/A'                       => 'Select-An-Option',
                        'Hourly'    		        => 'Hourly',
                        'Daily'    		            => 'Daily',
                        'Weekly'    	        	=> 'Weekly',
                        'Bi-Weekly'    	        	=> 'Bi-Weekly',
                        '15th/Last'    	        	=> '15th/Last Day',
                        'Monthly'    	        	=> 'Monthly',
                        'Quarterly'    	        	=> 'Quarterly',
                        'Semi-Annual'    	        => 'Semi-Annual',
                        'Annually'    	            => 'Annually',
                    );
                } elseif ($accountType === 'Expense') {
                    $intervals_values = array(
                        $accountIntervals           => $accountIntervals,
                        'N/A'                       => 'Select-An-Option',
                        'Hourly'    		        => 'Hourly',
                        'Daily'    		            => 'Daily',
                        'Weekly'    	        	=> 'Weekly',
                        'Bi-Weekly'    	        	=> 'Bi-Weekly',
                        '15th/Last'    	        	=> '15th/Last Day',
                        'Monthly'    	        	=> 'Monthly',
                        'Quarterly'    	        	=> 'Quarterly',
                        'Semi-Annual'    	        => 'Semi-Annual',
                        'Annually'    	            => 'Annually',
                    );
                } else {
                    $intervals_values = array(
                        $accountIntervals           => $accountIntervals,
                        'N/A'                       => 'Select-An-Option',
                        'Hourly'    		        => 'Hourly',
                        'Daily'    		            => 'Daily',
                        'Weekly'    	        	=> 'Weekly',
                        'Bi-Weekly'    	        	=> 'Bi-Weekly',
                        '15th/Last'    	        	=> '15th/Last Day',
                        'Monthly'    	        	=> 'Monthly',
                        'Quarterly'    	        	=> 'Quarterly',
                        'Semi-Annual'    	        => 'Semi-Annual',
                        'Annually'    	            => 'Annually',
                    );
                }
                foreach ($intervals_values as $value => $displayText) {
                    $selected = $accountIntervals == $value ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$displayText</option>";
                }
            ?>
        </select>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('recurring_account').addEventListener('change', function() {
        var display = this.value === 'Yes' ? 'block' : 'none';
        document.getElementById('recurring_fields').style.display = display;
    });
</script>
<hr>
