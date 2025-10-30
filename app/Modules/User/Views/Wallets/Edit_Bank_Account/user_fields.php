<?php /* /users/views/user_fields.php */
date_default_timezone_set('America/Chicago');
$date                   = date("F jS, Y");
$hostTime               = date("g:i A");
$time                   = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
$currentMethod          = $this->router->fetch_method();

$errorClass             = empty($errorClass) ? ' error' : $errorClass;
$controlClass           = empty($controlClass) ? 'span4' : $controlClass;
$registerClass          = $currentMethod == 'register' ? ' required' : '';
$editSettings           = $currentMethod == 'edit';
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formControl		        = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;

if ($accountType === 'Checking') {
    $accountTypeChecking        = 'checked';
    $accountTypeSavings         = '';
} elseif ($accountType === 'Savings') {
    $accountTypeChecking        = '';
    $accountTypeSavings         = 'checked';
} else {
    $accountTypeChecking        = '';
    $accountTypeSavings         = '';
}
if ($accountOwner === 'Yes') {
    $accountOwnerCheckYes       = 'checked';
    $accountOwnerCheckNo        = '';
} elseif ($accountOwner === 'No') {
    $accountOwnerCheckYes       = '';
    $accountOwnerCheckNo        = 'checked';
} else {
    $accountOwnerCheckYes       = '';
    $accountOwnerCheckNo        = '';
}
?>
<?php
// Set up Validation for whether or not we accept Third-Party Accounts
?>			
<input type="hidden" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : 'Edit'); ?>">	
<input type="hidden" name="wallets_account_type" id="wallets_account_type" value="<?php echo set_value('wallets_account_type', isset($user) ? $user->wallets_account_type : $accountTypeText); ?>">	
<input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo set_value('redirectURL', isset($user) ? $user->redirectURL : $redirectURL); ?>">	
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">
<input type="hidden" class="form-control" name="account_id" id="account_id" value="<?php echo set_value('account_id', isset($user) ? $user->account_id : $accountID); ?>">	
<div class="<?php echo $formGroup; ?>">
	<label class="col-12">Account Bank Name</label>
	<div class="col-12">        
		<input type="text" class="<?php echo $formControl; ?>" name="bank_name" id="bank_name" placeholder="Ex: Capital One Bank" value="<?php echo set_value('bank_name', isset($user) ? $user->bank_name : $accountBank); ?>">	
	</div>
</div>	
<div class="<?php e($formGroup); ?> <?php echo form_error('account_type') ? $errorClass : ''; ?>">
    <label class="control-label col-sm-4 col-md-12 pt-2 required" for="account_type">
		Account Type<br>
		<div class="form-radio">
			<input class="mt-2" type="radio" id="account_type" name="account_type" value="<?php echo set_value('account_type', isset($user) ? $user->account_type : 'Checking'); ?>" <?= $accountTypeChecking; ?>> Checking
		</div>
		<div class="form-radio">
			<input class="mt-2" type="radio" id="account_type" name="account_type" value="<?php echo set_value('account_type', isset($user) ? $user->account_type : 'Savings'); ?>" <?= $accountTypeSavings; ?>> Savings
		</div>
    </label>
</div>
<div class="<?php e($formGroup); ?> <?php echo form_error('bank_account_owner') ? $errorClass : ''; ?>">
    <label class="control-label col-sm-4 col-md-12 pt-2 required" for="bank_account_owner">
		Is your name on the account?<br>
		<div class="form-radio">
			<input class="mt-2 checked" type="radio" id="bank_account_owner" name="bank_account_owner" value="<?php echo set_value('bank_account_owner', isset($user) ? $user->bank_account_owner : 'Yes'); ?>" <?= $accountOwnerCheckYes?>> Yes
		</div>
		<div class="form-radio">
			<input class="mt-2" type="radio" id="bank_account_owner" name="bank_account_owner" value="<?php echo set_value('bank_account_owner', isset($user) ? $user->bank_account_owner : 'No'); ?>"<?= $accountOwnerCheckNo?>> No
		</div>
    </label>
</div>
<div class="<?php echo $formGroup; ?>">
	<label class="col-12">Routing Number</label>
	<div class="col-12">        
		<input type="text" class="<?php echo $formControl; ?>" name="routing_number" id="routing_number" placeholder="Ex: 123456789" value="<?php echo set_value('routing_number', isset($user) ? $user->routing_number : $accountRoutNum); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">
	<label class="col-12">Account Number</label>
	<div class="col-12">        
		<input type="text" class="<?php echo $formControl; ?>" name="account_number" id="account_number" placeholder="Ex: 012345678910" value="<?php echo set_value('account_number', isset($user) ? $user->account_number : $accountNumber); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">
	<label class="col-12">Create Nickname for Account</label>
	<div class="col-12">        
		<input type="text" class="<?php echo $formControl; ?>" name="nickname" id="nickname" placeholder="Ex: Main Banking Account" value="<?php echo set_value('nickname', isset($user) ? $user->nickname : $accountName); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">
	<label class="col-12">Current Account Balance</label>
	<div class="col-12">        
		<input type="text" class="<?php echo $formControl; ?>" name="balance" id="balance" placeholder="Ex: 1500.00" value="<?php echo set_value('balance', isset($user) ? $user->balance : $accountBalance); ?>">	
	</div>
</div>
<!--
<p style="font-size:0.65rem;">
By proceeding, you acknowledge and agree that your transaction is governed by the Terms of Service, the Terms of Service Addendum for Card Payments and the Privacy Policy. All transactions are final.	
</p>
<p style="font-size:0.65rem;">
Your card-issuing bank may charge a foreign transaction fee or another type of fee. Any fees charged by your bank are separate from and in addition to the card processing fee charged by Bittrex. By proceeding, you also acknowledge that you are solely responsible for paying any fees charged by your bank.
</p>
-->

