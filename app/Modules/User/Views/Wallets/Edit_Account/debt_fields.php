<?php /* /users/views/user_fields.php */
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
<?php
// Set up Validation for whether or not we accept Third-Party Accounts
?>		                
<h4 class="card-title">Edit Account Information</h4>
<p class="card-description"> Please fill out information below</p>			
<hr>
<input type="hidden" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : 'Edit'); ?>">	
<input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo set_value('redirectURL', isset($user) ? $user->redirectURL : $redirectURL); ?>">	
<input type="hidden" name="beta" id="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : $beta); ?>">	
<input type="hidden" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">
<input type="hidden" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">
<input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo set_value('wallet_id', isset($user) ? $user->wallet_id : $accountWalletID); ?>">	
<input type="hidden" name="account_id" id="account_id" value="<?php echo set_value('account_id', isset($user) ? $user->account_id : $accountID); ?>">	
<input type="hidden" name="wallet_type" id="wallet_type" value="<?php echo set_value('wallet_type', isset($user) ? $user->wallet_type : 'Debt'); ?>">

<div class="form-group">
    <label for="account_status">Debt Account Status</label>
    <select name="account_status" id="account_status" class="form-control">
        <option value="Active" <?= isset($accountCreditStatus) && $accountCreditStatus == 'Active' ? 'selected' : '' ?>>Active</option>
        <option value="Closed" <?= isset($accountCreditStatus) && $accountCreditStatus == 'Closed' ? 'selected' : '' ?>>Closed</option>
    </select>
</div>
<div class="form-group">
    <label for="account_type">Account Type</label>
    <select class="form-control" id="account_type" name="account_type" required>
        <?php
        $accountSourceType              = $accountSourceType ?? 'N/A';    
        $account_type_values = array(
            $accountSourceType          => $accountSourceType,
            'N/A'                       => 'Select-Category',
            'Debt - Business'	        => 'Debt - Business',
            'Debt - Personal'	        => 'Debt - Personal',
            'Debt - Student'	        => 'Debt - Student',
            'Loan - Auto'	            => 'Loan - Auto',
            'Loan - Business'	        => 'Loan - Business',
            'Loan - Mortgage'           => 'Loan - Mortgage',
            'Loan - Personal'	        => 'Loan - Personal',
            'Loan - Retirement'	        => 'Loan - Retirement',
            'Loan - Student'	        => 'Loan - Student',
            'Other'                     => 'Other...',
        );
        ?>
        <?php foreach ($account_type_values as $value => $display_text): ?>
            <?php $selected = ($value === session()->get('broker')) ? ' selected="selected"' : ""; ?>
            <option value="<?= esc($value); ?>"<?= $selected; ?>><?= esc($display_text); ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="debtor">Name of Lender</label>
    <input type="text" class="<?= $formControl; ?>" name="debtor" id="debtor" value="<?= set_value('debtor', $accountDebtor ?? ''); ?>" placeholder="Ex: Lender Name">
</div>

<div class="form-group">
    <label for="nickname">Nickname for Account</label>
    <input type="text" class="<?= $formControl; ?>" name="nickname" id="nickname" value="<?= set_value('nickname', $accountNickname ?? ''); ?>" placeholder="Ex: My Loan">
</div>

<div class="form-group">
    <label for="account_number">Account Number</label>
    <input type="text" class="<?= $formControl; ?>" name="account_number" id="account_number" value="<?= set_value('account_number', $accountNumber ?? ''); ?>" placeholder="Ex: 1234567890">
</div>
<div class="form-group">
    <label for="current_balance">Current Balance</label>
    <input type="text" class="<?= $formControl; ?>" name="current_balance" id="current_balance" value="<?= set_value('current_balance', $accountCurrentBalance ?? ''); ?>" placeholder="Ex: 5000.00">
</div>
<div class="form-group">
    <label for="monthly_payment">Monthly Payment</label>
    <input type="text" class="<?= $formControl; ?>" name="monthly_payment" id="monthly_payment" value="<?= set_value('monthly_payment', $accountMonthlyPayment ?? ''); ?>" placeholder="Ex: 200.00">
</div>
<div class="form-group">
    <label for="interest_rate">Interest Rate</label>
    <input type="text" class="<?= $formControl; ?>" name="interest_rate" id="interest_rate" value="<?= set_value('interest_rate', $accountInterestRate ?? ''); ?>" placeholder="Ex: 5000.00">
</div>
<div class="form-group pt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="<?= site_url('/Wallets') ?>" class="btn btn-secondary">Cancel</a>
</div>
<script <?= $nonce['script'] ?? '' ?>>
function calculateBalance()
{
	var credit_limit 		                                        = document.getElementById('credit_limit').value;
	var current_balance 		                                    = document.getElementById('current_balance').value;
    
	var available_balance                                           = credit_limit - current_balance;  
	// Update Field Displays
	document.getElementById('available_balance').value			    = available_balance.toFixed(2);

}
</script> 
