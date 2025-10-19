<?php /* /users/views/user_fields.php */
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
$currentMethod                  = $this->router->fetch_method();

$errorClass                     = empty($errorClass) ? ' error' : $errorClass;
$controlClass                   = empty($controlClass) ? 'span4' : $controlClass;
$registerClass                  = $currentMethod == 'register' ? ' required' : '';
$editSettings                   = $currentMethod == 'edit';
// Current User Information
$cuID 						    = $_SESSION['allSessionData']['userAccount']['cuID'];
$cuEmail					    = $_SESSION['allSessionData']['userAccount']['cuEmail'];
$cuUsername					    = $_SESSION['allSessionData']['userAccount']['cuUsername'];
$cuUserType					    = $_SESSION['allSessionData']['userAccount']['cuUserType'];
// print_r($this->session->allSessionData['userAccount']); 
if ($configMode === 'Add') {
    $integrationTitle           = 'Integrate ' . $accountType . ' Account';
    $formTitle                  = $accountType . ' - Account Information';
    if ($accountType === 'Income') {
        $designatedDate             = 'Date of Month Received';
    } elseif ($accountType === 'Expense') {
        $designatedDate             = 'Date of Month Due';
    }
} elseif ($configMode === 'Edit') {
    $integrationTitle           = 'Integrate ' . $accountName . ' - ' . $accountType . ' Account';
    $formTitle                  = $accountName . ' - Account Information';
}
// Set Form Config
$formGroup				        = $this->config->item('form_container');
$formLabel				        = $this->config->item('form_label');
$formConCol				        = $this->config->item('form_control_column');
$formControl			        = $this->config->item('form_control');
$formSelect				        = $this->config->item('form_select');
$formSelectPicker		        = $this->config->item('form_selectpicker');
$formText				        = $this->config->item('form_text');
$formCustomText			        = $this->config->item('form_custom_text');
$formMode                       = $this->uri->segment(2);
if ($formMode === 'Add') { 
    $accountID                  = '';
} elseif ($formMode === 'Edit') {
    $accountID                  = $this->uri->segment(3);
}

?>        
<?php
if ($cuUserType === 'Beta') {
    ?>
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'Yes'); ?>" /> 
<?php
} else {
        ?>             
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'No'); ?>" /> 
<?php
    }
?>
<input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : $formMode); ?>">	
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">	
<input type="hidden" class="form-control" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">	
<input type="hidden" class="form-control" name="account_id" id="account_id" value="<?php echo set_value('account_id', isset($user) ? $user->type : $accountID); ?>">
<input type="hidden" class="form-control" name="account_type" id="account_type" value="<?php echo set_value('account_type', isset($user) ? $user->type : $accountType); ?>">

<div class="<?php echo $formGroup; ?> mb-2">    
    <label class="col-6 form-label" for="default-01">Due Date</label>    
    <div class="col-6">       
        <input type="date" class="<?php echo $formControl; ?>" name="designated_date" id="designated_date" placeholder="Enter Current Value of Wallet" value="<?php echo set_value('designated_date', isset($user) ? $user->designated_date : $accountDesignatedDate); ?>" required="required">	
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="source_type" class="col-6 form-label">Account Type</label>
	<div class="col-6">

        <select name="source_type" class="<?php echo $formControl; ?>" id="source_type" required="required" style="height: 40px; padding: 10px;">
            <?php
                if ($accountType === 'Income') {
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
                    $selected = ($value == $this->input->post('source_type')) ? ' selected="selected"' : "";

                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
            ?>
        </select>
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Account Name</label>    
	<div class="col-6">       
		<input type="text" class="<?php echo $formControl; ?>" name="nickname" id="nickname" placeholder="Enter Account Nickname" value="<?php echo set_value('nickname', isset($user) ? $user->nickname : $accountName); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Net Amount</label>    
	<div class="col-6">       
		<input type="text" class="<?php echo $formControl; ?>" name="net_amount" id="net_amount" placeholder="(If Applicable)" value="<?php echo set_value('net_amount', isset($user) ? $user->net_amount : $accountNetAmount); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Gross Amount</label>    
	<div class="col-6">       
		<input type="text" class="<?php echo $formControl; ?>" name="gross_amount" id="gross_amount" placeholder="(If Applicable)" value="<?php echo set_value('gross_amount', isset($user) ? $user->gross_amount : $accountNetAmount); ?>">	
	</div>
</div>
<?php if ($accountType === 'Expense') { ?>
<!-- <div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Make A Payment?</label>    
	<div class="col-6">       
		<input type="text" class="<?php echo $formControl; ?>" name="monthly_payment" id="monthly_payment" placeholder="Enter Monthly Payment" value="<?php echo set_value('monthly_payment', isset($user) ? $user->monthly_payment : $accountNetAmount); ?>">	
	</div>
</div> -->
<?php } ?>
<!-- <div class="<?php //echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Gross Amount <span class="text-muted">(if available)</span></label>    
	<div class="col-6">       
		<input type="text" class="<?php //echo $formControl; ?>" name="gross_amount" id="gross_amount" placeholder="Enter Current Value of Wallet" value="<?php //echo set_value('gross_amount', isset($user) ? $user->gross_amount : $accountGrossAmount); ?>">	
	</div>
</div> -->
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="paid" class="col-6 form-label">Paid/Received?</label>
	<div class="col-6">

        <select name="paid" class="<?php echo $formControl; ?>" id="paid" required="required" style="height: 40px; padding: 10px;">
            <?php
                $paid_values = array(
                    $accountPaidStatus              => $accountPaidStatus,
                    'N/A'                           => 'Select-An-Option',
                    '1'    		                    => 'Yes',
                    '0'    		                    => 'No',
                );
                foreach ($paid_values as $value => $display_text) {
                    $selected = ($value == $this->input->post('paid')) ? ' selected="selected"' : "";

                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
            ?>
        </select>
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="recurring_account" class="col-6 form-label">Recurring Account?</label>
	<div class="col-6">

        <select name="recurring_account" class="<?php echo $formControl; ?>" id="recurring_account" onchange="showDiv(this)" style="height: 40px; padding: 10px;">
            <?php
                $recurring_account_values = array(
                    $accountRecurringAccount        => $accountRecurringAccount,
                    'N/A'                           => 'Select-An-Option',
                    'Yes'    		                => 'Yes',
                    'No'    		                => 'No',
                );
                foreach ($recurring_account_values as $value => $display_text) {
                    $selected = ($value == $this->input->post('recurring_account')) ? ' selected="selected"' : "";

                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
            ?>
        </select>
	</div>
</div>
<?php 
if (!empty($accountRecurringAccount) || $accountRecurringAccount === 'Yes') {
    $recurringAccountStyle                          = 'display:block'; 
} else {
    $recurringAccountStyle                          = 'display:none;'; 
}
?>
<div id="recurring_fields" style="<?php echo $recurringAccountStyle; ?>">
    <div class="<?php echo $formGroup; ?> mb-2 hide">    
        <label for="intervals" class="col-6 form-label">Time Intervals</label>
        <div class="col-6">

            <select name="intervals" class="<?php echo $formControl; ?>" id="intervals" style="height: 40px; padding: 10px;">
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
                    foreach ($intervals_values as $value => $display_text) {
                        $selected = ($value == $this->input->post('intervals')) ? ' selected="selected"' : "";

                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
</div>
<hr>
