<!-- app/Modules/User/Views/Budget/Add/user_fields.php -->
<?php 
$siteSettings                    = $siteSettings ?? null;
$uri                             = $uri ?? service('uri');
$requestUriForLog                = service('request')->getUri()->getPath();
$cuID                            = $cuID ?? null;
$cuEmail                         = $cuEmail ?? '';
$cuUsername                      = $cuUsername ?? '';
$cuUserType                      = $cuUserType ?? '';
$configMode                      = $configMode ?? (method_exists($uri, 'getSegment') ? ($uri->getSegment(2) ?: 'Add') : 'Add');
$accountType                     = $accountType ?? (method_exists($uri, 'getSegment') ? $uri->getSegment(3) : null);
$accountType                     = in_array($accountType, ['Income', 'Expense'], true) ? $accountType : 'Expense';
$siteSettingsObject              = is_object($siteSettings) ? $siteSettings : (object) [];
log_message('debug', 'Budget\\Add\\user_fields view bootstrap: accountType=' . $accountType . ' configMode=' . $configMode . ' requestUri=' . $requestUriForLog);

$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A");
if ($configMode === 'Add') {
    $integrationTitle           = 'Integrate ' . $accountType . ' Account';
    $formTitle                  = $accountType . ' - Account Information';
    if ($accountType === 'Income') {
        $designatedDate         = 'Date of Month Received';
    } elseif ($accountType === 'Expense') {
        $designatedDate         = 'Date of Month Due';
    }
} elseif ($configMode === 'Edit') {
    $integrationTitle           = 'Integrate ' . $accountName . ' - ' . $accountType . ' Account';
    $formTitle                  = $accountName . ' - Account Information';
}
// Set Form Config
$formGroup				        = $siteSettingsObject->formContainer ?? 'form-group row';
$formLabel				        = $siteSettingsObject->formLabel ?? 'col-form-label';
$formConCol				        = $siteSettingsObject->formControlColumn ?? 'col-6';
$formControl			        = $siteSettingsObject->formControl ?? 'form-control';
$formSelect				        = $siteSettingsObject->formSelect ?? 'form-select';
$formSelectPicker		        = $siteSettingsObject->formSelectpicker ?? 'selectpicker';
$formText				        = $siteSettingsObject->formText ?? 'form-text';
$formCustomText			        = $siteSettingsObject->formCustomText ?? 'text-muted';
$formMode                       = $configMode;
if ($formMode === 'Add') {
    $accountID                  = '';
} elseif ($formMode === 'Edit') {
    $accountID                  = method_exists($uri, 'getSegment') ? $uri->getSegment(3) : '';
} else {
    $accountID                  = '';
}
?>
<input id="beta" name="beta" value="<?php echo set_value('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" type="hidden">
<input id="form_mode" name="form_mode" value="<?php echo $formMode; ?>" class="form-control" type="hidden">
<input id="user_id" name="user_id" value="<?php echo $cuID; ?>" class="form-control" type="hidden">
<input id="user_email" name="user_email" value="<?php echo $cuEmail; ?>" class="form-control" type="hidden">
<input id="username" name="username" value="<?php echo $cuUsername; ?>" class="form-control" type="hidden">
<input id="account_id" name="account_id" value="<?php echo $accountID ?? ''; ?>" class="form-control" type="hidden">
<input id="account_type" name="account_type" value="<?php echo $accountType; ?>" class="form-control" type="hidden">
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="designated_date">Due Date</label>
    <div class="col-6">
        <input id="designated_date" name="designated_date" value="<?php echo set_value('designated_date', $accountDesignatedDate); ?>" class="<?php echo $formControl; ?>" type="date" placeholder="Enter Current Value of Wallet" required>
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="source_type">Account Type</label>
    <div class="col-6">
        <select class="<?php echo $formControl; ?>" id="source_type" name="source_type" style="height:40px;padding:10px" required>
            <?php 
            if ($accountType === 'Income') {
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
                    'Expense - Business'        => 'Expense - Business',
                    'Expense - Personal'        => 'Expense - Personal',
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
                    'Loan - Retirement'	        => 'Loan - Retirement',
                    'Loan - Student'	        => 'Loan - Student',
                    'Medical - Dental'	        => 'Medical - Dental',
                    'Medical - Health'	        => 'Medical - Health',
                    'Medical - Vision'	        => 'Medical - Vision',
                    'Phone - Business'          => 'Phone - Business',  
                    'Phone - Personal'          => 'Phone - Personal',  
                    'Rent'      		        => 'Rent',
                    'Taxes - Business'          => 'Taxes - Business',
                    'Taxes - Investments'       => 'Taxes - Investments',
                    'Taxes - Personal'          => 'Taxes - Personal',
                    'Travel'                    => 'Travel',
                    'Warranty - Home'           => 'Warranty - Home',
                    'Water'                     => 'Water - Utility',
                    'Other'                     => 'Other...',
                );
            } else {
                $source_type_values = array(
                    $accountSourceType          => $accountSourceType,
                    'N/A'                       => 'Select-Category',
                    'Full-Time - Hourly'        => 'Full-Time - Hourly',
                    'Full-Time - Salary'        => 'Full-Time - Salary',
                    'Part-Time'    		        => 'Part-Time - Hourly',
                    'Self-Employment'    		=> 'Self-Employment',
                    'One-Time'                  => 'One-Time Payment',
                    'Unemployed'                => 'Unemployed',
                    'Loan'                      => 'Loan',
                    'Childcare'    		        => 'Childcare',
                    'Debt - Business'	        => 'Debt - Business',
                    'Debt - Personal'	        => 'Debt - Personal',
                    'Debt - Student'	        => 'Debt - Student',
                    'Electricity - Utility'     => 'Electricity - Utility',
                    'Expense - Business'        => 'Expense - Business',
                    'Expense - Personal'        => 'Expense - Personal',
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
                    'Loan - Retirement'	        => 'Loan - Retirement',
                    'Loan - Student'	        => 'Loan - Student',
                    'Medical - Dental'	        => 'Medical - Dental',
                    'Medical - Health'	        => 'Medical - Health',
                    'Medical - Vision'	        => 'Medical - Vision',
                    'Phone - Business'          => 'Phone - Business',  
                    'Phone - Personal'          => 'Phone - Personal',  
                    'Rent'      		        => 'Rent',
                    'Taxes - Business'          => 'Taxes - Business',
                    'Taxes - Investments'       => 'Taxes - Investments',
                    'Taxes - Personal'          => 'Taxes - Personal',
                    'Travel'                    => 'Travel',
                    'Warranty - Home'           => 'Warranty - Home',
                    'Water'                     => 'Water - Utility',
                    'Other'                     => 'Other...',
                );
            }
            foreach ($source_type_values as $value => $display_text) {
                $selected = old('source_type') == $value ? ' selected="selected"' : "";
                echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
            } 
            ?>
        </select>
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="nickname">Account Name</label>
    <div class="col-6">
        <input id="nickname" name="nickname" value="<?php echo set_value('nickname', $accountName); ?>" class="<?php echo $formControl; ?>" placeholder="Enter Account Nickname">
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="net_amount">Net Amount</label>
    <div class="col-6">
        <input id="net_amount" name="net_amount" value="<?php echo set_value('net_amount', $accountNetAmount); ?>" class="<?php echo $formControl; ?>" placeholder="(If Applicable)">
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="gross_amount">Gross Amount</label>
    <div class="col-6">
        <input id="gross_amount" name="gross_amount" value="<?php echo set_value('gross_amount', $accountGrossAmount); ?>" class="<?php echo $formControl; ?>" placeholder="(If Applicable)">
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="paid">Paid/Received?</label>
    <div class="col-6">
        <select class="<?php echo $formControl; ?>" id="paid" name="paid" style="height:40px;padding:10px" required>
            <?php 
            $paid_values = array(
                $accountPaidStatus              => $accountPaidStatus,
                'N/A'                           => 'Select-An-Option',
                '1'    		                    => 'Yes',
                '0'    		                    => 'No',
            );
            foreach ($paid_values as $value => $display_text) {
                $selected = old('paid') == $value ? ' selected="selected"' : "";
                echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
            } 
            ?>
        </select>
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="recurring_account">Recurring Account?</label>
    <div class="col-6">
        <select class="<?php echo $formControl; ?>" id="recurring_account" name="recurring_account" style="height:40px;padding:10px" onchange="toggleRecurringSchedule(this)">
            <?php 
            $recurring_account_values = array(
                $accountRecurringAccount        => $accountRecurringAccount,
                'N/A'                           => 'Select-An-Option',
                'Yes'    		                => 'Yes',
                'No'    		                => 'No',
            );
            foreach ($recurring_account_values as $value => $display_text) {
                $selected = old('recurring_account') == $value ? ' selected="selected"' : "";
                echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
            } 
            ?>
        </select>
    </div>
</div>
<?php
// Recurring schedule inventory: account recurrence is stored with recurring_account,
// schedule values are stored in recurring_schedule while intervals powers forecast logic.
$recurringAccountStyle = ($accountRecurringAccount === 'Yes') ? 'display:block' : 'display:none;';
?>
<div id="recurring_schedule_wrapper" style="<?php echo $recurringAccountStyle; ?>">
    <div class="<?php echo $formGroup; ?> mb-2">
        <label class="col-6 form-label" for="recurring_schedule">Recurring Schedule</label>
        <div class="col-6">
            <select class="<?php echo $formControl; ?>" id="recurring_schedule" name="recurring_schedule" style="height:40px;padding:10px">
                <?php
                $scheduleOptions = $recurringScheduleOptions ?? [];
                $currentSchedule = old('recurring_schedule') ?: ($accountRecurringSchedule ?? '');
                echo '<option value="">Select-An-Option</option>';
                foreach ($scheduleOptions as $scheduleOption) {
                    $selected = $currentSchedule === $scheduleOption ? ' selected="selected"' : '';
                    echo '<option value="' . esc($scheduleOption) . '"' . $selected . '>' . esc($scheduleOption) . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>
<hr>
