<?php /* /users/views/user_fields.php */
date_default_timezone_set('America/Chicago');
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A");
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
<h4 class="card-title">Add Account Information</h4>
<p class="card-description"> Please fill out information below</p>			
<hr>

<input id="beta" name="beta" value="<?php echo set_value('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" type="hidden">
<input id="form_mode" name="form_mode" value="<?php echo $formMode; ?>" class="form-control" type="hidden">
<input id="redirectURL" name="redirectURL" value="<?php echo set_value('beta', $redirectURL); ?>" type="hidden">
<input id="user_id" name="user_id" value="<?php echo $cuID; ?>" class="form-control" type="hidden">
<input id="user_email" name="user_email" value="<?php echo $cuEmail; ?>" class="form-control" type="hidden">
<input id="username" name="username" value="<?php echo $cuUsername; ?>" class="form-control" type="hidden">
<input id="wallet_id" name="wallet_id" value="<?php echo $walletID ?? ''; ?>" class="form-control" type="hidden">
<input id="wallet_type" name="wallet_type" value="<?php echo $walletType; ?>" class="form-control" type="hidden">
<input id="purchase_type" name="purchase_type" value="<?php echo $purchaseType; ?>" class="form-control" type="hidden">
<div class="form-group">
    <label for="debtor" class="col-12">Creditor Name</label>
    <div class="col-12">
        <input type="text" class="form-control" name="debtor" id="debtor" placeholder="Ex: Bank of America" value="<?= set_value('debtor'); ?>">
    </div>
</div>

<div class="form-group">
    <label for="account_number" class="col-12">Account Number</label>
    <div class="col-12">
        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Ex: 123456789012" value="<?= set_value('account_number'); ?>">
    </div>
</div>

<div class="form-group">
    <label for="credit_limit" class="col-12">Original Amount Owed</label>
    <div class="col-12">
        <input type="text" class="form-control" name="credit_limit" id="credit_limit" placeholder="Ex: 5000.00" value="<?= set_value('credit_limit'); ?>">
    </div>
</div>

<div class="form-group">
    <label for="current_balance" class="col-12">Current Balance</label>
    <div class="col-12">
        <input type="text" class="form-control" name="current_balance" id="current_balance" placeholder="Ex: 3000.00" value="<?= set_value('current_balance'); ?>">
    </div>
</div>

<div class="form-group">
    <label for="monthly_payment" class="col-12">Monthly Payment</label>
    <div class="col-12">
        <input type="text" class="form-control" name="monthly_payment" id="monthly_payment" placeholder="Ex: 150.00" value="<?= set_value('monthly_payment'); ?>">
    </div>
</div>

<div class="form-group">
    <label for="due_date" class="col-12">Payment Due Date</label>
    <div class="col-12">
        <input type="date" class="form-control" name="due_date" id="due_date" value="<?= set_value('due_date'); ?>">
    </div>
</div>
<div class="form-group pt-3">
    <div class="col-md-4"></div>
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-6 px-1">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6 px-1">
                <input class="btn btn-primary btn-block" type="submit" name="register" id="addNewWalletSubmit" value="Submit" />
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
function calculateBalance() {
    var credit_limit = document.getElementById('credit_limit').value;
    var current_balance = document.getElementById('current_balance').value;
    var available_balance = credit_limit - current_balance;  
    document.getElementById('available_balance').value = available_balance.toFixed(2);
}
</script>
