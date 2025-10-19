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
    <label for="credit_status" class="col-12">Credit Status</label>
    <div class="col-12">
        <select name="credit_status" class="form-control" id="credit_status" required="required">
            <option value="N/A">Select-An-Option</option>
            <option value="Active">Active</option>
            <option value="Closed">Closed</option>
            <option value="Pending">Pending</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="bank_name" class="col-12">Name of Bank</label>
    <div class="col-12">
        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Ex: Capital One Bank">
    </div>
</div>

<div class="form-group">
    <label for="nickname" class="col-12">Create Nickname for Account</label>
    <div class="col-12">
        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Ex: Main Banking Account">
    </div>
</div>

<div class="form-group">
    <label for="account_number" class="col-12">Credit Card Number</label>
    <div class="col-12">
        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Ex: 0123 -OR- 012345678910">
    </div>
</div>

<div class="form-group">
    <label for="credit_limit" class="col-12">Total Credit Limit</label>
    <div class="col-12">
        <input type="text" class="form-control" name="credit_limit" id="credit_limit" placeholder="Ex: 1500.00" onChange="calculateBalance();">
    </div>
</div>

<div class="form-group">
    <label for="current_balance" class="col-12">Current Balance</label>
    <div class="col-12">
        <input type="text" class="form-control calculation" name="current_balance" id="current_balance" placeholder="Ex: 1500.00" onChange="calculateBalance();">
    </div>
</div>

<div class="form-group">
    <label for="available_balance" class="col-12">Available Balance</label>
    <div class="col-12">
        <input type="text" class="form-control" name="available_balance" id="available_balance" placeholder="Ex: 1500.00" disabled>
    </div>
</div>

<div class="form-group">
    <label for="due_date" class="col-12">Due Date</label>
    <div class="col-12">
        <input type="date" name="due_date" id="due_date" class="form-control" value="">
    </div>
</div>

<div class="form-group">
    <label for="payment_due" class="col-12">Payment Due</label>
    <div class="col-12">
        <input type="text" class="form-control" name="payment_due" id="payment_due" placeholder="Ex: 5000.00">
    </div>
</div>

<div class="form-group">
    <label for="interest_rate" class="col-12">Interest Rate (%)</label>
    <div class="col-12">
        <input type="text" class="form-control" name="interest_rate" id="interest_rate" placeholder="Ex: 15.99">
    </div>
</div>

<div class="form-group pt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="<?= site_url('/Wallets') ?>" class="btn btn-secondary">Cancel</a>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function calculateBalance() {
    var credit_limit = parseFloat(document.getElementById('credit_limit').value) || 0;
    var current_balance = parseFloat(document.getElementById('current_balance').value) || 0;
    var available_balance = credit_limit - current_balance;
    document.getElementById('available_balance').value = available_balance.toFixed(2);
}
</script>
